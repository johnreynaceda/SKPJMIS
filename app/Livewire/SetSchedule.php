<?php
namespace App\Livewire;

use App\Jobs\VisitingSms;
use App\Models\Inmate;
use App\Models\InmateVisit;
use App\Models\Visitor;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SetSchedule extends Component implements HasForms
{
    use InteractsWithForms;
    public $visitor, $inmate, $date;
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    Select::make('visitor')->options(Visitor::all()->pluck('fullname', 'id'))->searchable(),
                ]),
                Grid::make(2)->schema([
                    Select::make('inmate')->options(Inmate::all()->pluck('fullname', 'id'))->required()->searchable(),
                    DatePicker::make('date')->label('Date of Visit')->required(),
                ]),
            ]);
    }

    public function submitForm()
    {
        sleep(2);
        InmateVisit::create([
            'visitor_id'    => $this->visitor,
            'inmate_id'     => $this->inmate,
            'date_of_visit' => $this->date,
        ]);

        $visitor_info = Visitor::where('id', $this->visitor)->first();

        VisitingSms::dispatch($visitor_info->contact, $this->date)->delay(now()->addMinutes(2));

        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.set-schedule');
    }
}
