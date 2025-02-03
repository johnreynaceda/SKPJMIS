<?php

namespace App\Livewire;

use App\Models\Action;
use Livewire\Component;

class AdminReport extends Component
{
    public $selected_report;
    public $month, $year;
    public function render()
    {
        return view('livewire.admin-report',[
            'inmates' => Action::when($this->month && $this->year, function($record){
                return $record->whereMonth('created_at', $this->month)->whereYear('created_at', $this->year);
            })->get(),
        ]);
    }
}
