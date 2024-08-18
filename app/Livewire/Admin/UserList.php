<?php

namespace App\Livewire\Admin;

use App\Models\Crime;
use App\Models\Shop\Product;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Contracts\Editable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('user_type', 'staff'))->headerActions([
                CreateAction::make('new')->color('main')->icon('heroicon-o-plus')->action(
                    function($data){
                        User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'username' => $data['username'],
                            'password' => bcrypt($data['password']),
                            'user_type' =>'staff',
                        ]);
                    }
                )->form([
                    TextInput::make('name')->required(),
                    TextInput::make('email')->email()->required(),
                    TextInput::make('username')->required(),
                    TextInput::make('password')->password()->required(),
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('user_type')->label('USER TYPE')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('name')->required(),
                    TextInput::make('email')->email()->required(),
                    TextInput::make('username')->required(),
                    TextInput::make('password')->password()->required(),
                ])->modalWidth('xl'),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Crimes yet!')->emptyStateDescription('Once you add your first user, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.user-list');
    }
}
