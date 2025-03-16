<?php

namespace App\Livewire\Admin;

use App\Models\Staff;
use App\Models\StaffInfo;
use App\Models\User;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateUser extends Component implements HasForms
{
    use InteractsWithForms;

    public $firstname, $middlename, $lastname, $address, $contact, $email, $password, $confirm_password, $image = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               Grid::make(4)->schema([
                FileUpload::make('image'),
               ]),
               Grid::make(3)->schema([
               TextInput::make('firstname')->required(),
               TextInput::make('middlename'),
               TextInput::make('lastname')->required(),
               TextInput::make('address')->required()->columnSpan(2),
                TextInput::make('contact')->numeric()->required(),
                
      
               ]),
               Fieldset::make('Account Information')->schema([
                TextInput::make('email')->email()->required(),
                TextInput::make('password')->password()->required()->revealable(),
                TextInput::make('confirm_password')->password()->required()->same('password')->revealable(),
               ])
            ]);
    }

    public function submitUser(){
        $this->validate([
            'firstname' => ['required','string','max:255'],
           'middlename' => ['nullable','string','max:255'],
            'lastname' => ['required','string','max:255'],
            'address' => ['required','string','max:255'],
            'contact' => ['required','numeric'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required'],
            'confirm_password' => ['required','same:password'],
            'image' => ['required'],
        ]);

                 $user = User::create([
                        'name' => $this->firstname. ' ' . $this->lastname,
                        'email' => $this->email,
                        'username' => strtolower($this->firstname. '' . $this->lastname),
                        'password' => bcrypt($this->password),
                        'user_type' =>'staff',
                    ]);

                 $staff =   Staff::create([
                        'fullname' => $this->firstname. ' ' . $this->lastname,
                        'position' => 'Penology Officer',
                        'user_id' => $user->id
                    ]);

                    foreach ($this->image as $key => $value) {
                        StaffInfo::create([
                            'staff_id' => $staff->id,
                            'firstname' => $this->firstname,
                            'lastname' => $this->lastname,
                           'middlename' => $this->middlename,
                            'address' => $this->address,
                            'contact' => $this->contact,
                            'image_path' => $value->store('staff_images', 'public'),
                        ]);
                    }





        return redirect()->route('admin.users');
    }
    public function render()
    {
        return view('livewire.admin.create-user');
    }
}
