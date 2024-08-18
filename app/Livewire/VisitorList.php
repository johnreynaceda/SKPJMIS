<?php

namespace App\Livewire;

use App\Models\Inmate;
use App\Models\Shop\Product;
use App\Models\Visitor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class VisitorList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Visitor::query())->headerActions([
                CreateAction::make('new')->label('New Visitor')->icon('heroicon-o-user-plus')->color('main')->form([
                    Select::make('inmate')->options(Inmate::all()->pluck('fullname', 'id'))->searchable(),
                    TextInput::make('fullname')->label('Visitor Fullname')->required(),
                    TextInput::make('contact')->label('Contact Number')->required()->numeric(),
                    TextInput::make('relationship')->label('Relationship')->required(),
                ])->modalWidth('xl')->modalHeading('Create Visitor')->action(
                    fn($data) => Visitor::create([
                        'inmate_id' => $data['inmate'],
                        'fullname' => $data['fullname'],
                        'contact' => $data['contact'],
                       'relationship' => $data['relationship'],
                    ])
                )
            ])
            ->columns([
                TextColumn::make('created_at')->date()->label('CREATED DATE')->searchable(),
                TextColumn::make('inmate.fullname')->label('INMATE')->searchable(),
                TextColumn::make('fullname')->label('FULLNAME')->searchable(),
                TextColumn::make('contact')->label('CONTACT')->searchable(),
                TextColumn::make('relationship')->label('RELATIONSHIP')->searchable(),

            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('view')->color('warning')->icon('heroicon-o-eye'),
                    Action::make('edit')->color('success')->icon('heroicon-o-pencil'),
                    DeleteAction::make('delete'),
                ])
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Visitor yet')->emptyStateDescription('Once you write your first visitor, it will appear here.');
    }

    public function render()
    {
        return view('livewire.visitor-list');
    }
}
