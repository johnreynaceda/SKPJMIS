<?php

namespace App\Livewire;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RegisterAccount extends Component implements HasForms
{
    use InteractsWithForms;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        FileUpload::make('profile')->label('Attach Image'),
                    ]),

                Grid::make(2)->schema([
                    TextInput::make('firstname')->label('Firstname'),
                    TextInput::make('lastname')->label('Lastname'),
                    TextInput::make('contact')->label('Contact No.'),
                    Select::make('position')->label('Position')->options([
                        'sdsds' => 'sdsd',
                    ]),
                    TextInput::make('email')->label('Email'),
                    TextInput::make('password')->label('Password')->password(),
                    TextInput::make('confirm_password')->label('Confirm Password')->password()->same('password'),
                ])
            ]);
            }

    public function render()
    {
        return view('livewire.register-account');
    }
}
