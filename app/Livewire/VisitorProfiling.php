<?php

namespace App\Livewire;

use App\Models\Inmate;
use App\Models\Post;
use App\Models\Visitor;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class VisitorProfiling extends Component implements HasForms
{
    use InteractsWithForms;

    public $firstname, $lastname, $contact, $relationship, $inmate_id;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('PERSONAL INFORMATION')->schema([
                    TextInput::make('firstname'),
                    TextInput::make('lastname'),
                    TextInput::make('contact')->numeric(),
                    
                    
                ]),
                Fieldset::make('')->schema([
                    TextInput::make('relationship'),
                    Select::make('inmate_id')->label('Inmate')->options(
                        Inmate::all()->pluck('fullname', 'id')
                    )
                ])
            ]);
    }

    public function submitProfile(){
        sleep(2);
        Visitor::create([
            'inmate_id' => $this->inmate_id,
            'fullname' => $this->firstname.' '.$this->lastname,
            'contact' => $this->contact,
           'relationship' => $this->relationship,
        ]);

        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.visitor-profiling');
    }
}
