<?php
namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class VisitingSms implements ShouldQueue
{
    use Queueable;
    public $contact;
    public $date;
    /**
     * Create a new job instance.
     */
    public function __construct($contact, $date)
    {
        $this->contact = $contact;
        $this->date    = $date;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $ch         = curl_init();
            $parameters = [
                'apikey'     => '1aaad08e0678a1c60ce55ad2000be5bd', //Your API KEY
                'number'     => $this->contact,
                'message'    => "SKPJMIS SMS \n\n" . "Dear Visitor," . "\n\n" . "Your Visitation Schedule will be on " . Carbon::parse($this->date)->format('F d, Y h:i A') . ". " . "Please make sure to arrive on time.",
                'sendername' => 'SEGU',
            ];
            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
            curl_setopt($ch, CURLOPT_POST, 1);

            //Send the parameters set above with the request
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

            // Receive response from server
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch)); // Catch any curl errors
            }

            curl_close($ch);

            \Log::info('Semaphore SMS Response: ' . $output);

        } catch (\Exception $e) {
            \Log::error('SMS Sending Failed: ' . $e->getMessage());
        }
    }
}
