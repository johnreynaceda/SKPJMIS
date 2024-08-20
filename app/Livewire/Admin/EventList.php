<?php

namespace App\Livewire\Admin;

use App\Models\Event;
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
use Filament\Forms\Components\DateTimePicker;
class EventList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Event::query())->headerActions([
                CreateAction::make('new')->color('main')->icon('heroicon-o-plus')->form([
                    TextInput::make('name')->required(),
                    DateTimePicker::make('date')
                ])->modalWidth('xl')->modalHeading('Create Event')
            ])
            ->columns([

                TextColumn::make('name')->label('EVENT'),
                TextColumn::make('date')->label('DATE')->date('F d, Y h:i A'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Events yet')->emptyStateDescription('Once you write your first event, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.event-list');
    }
}
