<?php

namespace App\Livewire\Admin;

use App\Models\Inmate;
use Livewire\Component;

class InmateInformation extends Component
{
    public $inmate;

    public function mount(){
        $this->inmate = Inmate::where('id', request('id'))->first();
    }
    public function render()
    {
        return view('livewire.admin.inmate-information');
    }
}
