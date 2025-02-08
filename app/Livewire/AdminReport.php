<?php
namespace App\Livewire;

use App\Models\Action;
use App\Models\CellBlock;
use App\Models\CellInmate;
use App\Models\Event;
use App\Models\InmateVisit;
use Livewire\Component;

class AdminReport extends Component
{
    public $selected_report;
    public $month, $year;
    public $cell_get;
    public function render()
    {
        return view('livewire.admin-report', [
            'inmates'     => Action::when($this->month && $this->year, function ($record) {
                return $record->whereMonth('created_at', $this->month)->whereYear('created_at', $this->year);
            })->get(),
            'cells'       => CellBlock::all(),
            'cellInmates' => CellInmate::when($this->cell_get, function ($record) {
                return $record->where('cell_block_id', $this->cell_get);
            })->get(),
            'activities'  => Event::all(),
            'visits'      => InmateVisit::when($this->month && $this->year, function ($record) {
                return $record->whereMonth('date_of_visit', $this->month)->whereYear('date_of_visit', $this->year);
            })->get(),
        ]);
    }
}
