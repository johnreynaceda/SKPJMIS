<?php

namespace App\Livewire\Admin;

use App\Models\Crime;
use App\Models\Shop\Product;
use App\Models\Staff;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Contracts\Editable;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
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
                Action::make('new')->label('New User')->color('main')->icon('heroicon-o-plus')->url(fn($record) => route('admin.create-user'))
                // ->action(
                //     function($data){
                //         $user = User::create([
                //             'name' => $data['name'],
                //             'email' => $data['email'],
                //             'username' => $data['username'],
                //             'password' => bcrypt($data['password']),
                //             'user_type' =>'staff',
                //         ]);

                //         Staff::create([
                //             'fullname' => $data['name'],
                //             'position' => $data['designation'],
                //             'user_id' => $user->id
                //         ]);
                //     }
                // )->form([
                //     TextInput::make('name')->required(),
                //     TextInput::make('email')->email()->required(),
                //     TextInput::make('username')->required(),
                //     TextInput::make('password')->password()->required(),
                //     Select::make('designation')->options([
                //         'Staff' => 'Penology Officer',
                //         // 'Penology Officer' => 'Penology Officer',
                //     ])
                // ])->modalWidth('xl')
            ])
            ->columns([
                // TextColumn::make('name')->label('NAME')->searchable(),
                // TextColumn::make('email')->label('EMAIL')->searchable(),
                // TextColumn::make('user_type')->label('USER TYPE')->searchable()->formatStateUsing(
                //     fn($record) => $record->user_type == 'staff' ? 'Penology Officer' : ''
                // ),
                Grid::make(1)->schema([
                    Stack::make([
                        ViewColumn::make('image')->view('filament.tables.profile'),
                        TextColumn::make('name'),
                        
                    ]),
                    TextColumn::make('phone')
                        ->icon('heroicon-m-phone'),
                    TextColumn::make('email')
                        , 
                ])
            ])->contentGrid([
                'md' => 3,
                '2xl' => 5,
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
            ])->emptyStateHeading('No Users yet!')->emptyStateDescription('Once you add your first user, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.user-list');
    }
}
