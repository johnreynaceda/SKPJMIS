<?php

namespace App\Livewire\Admin;
use App\Models\Action;
use App\Models\Inmate;
use App\Models\Shop\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ActionList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Action::query())->headerActions([
                CreateAction::make('new')->label('New Action')->icon('heroicon-o-plus')->color('main')->form([
                    Select::make('inmate_id')->label('Inmate')->options(Inmate::all()->pluck('fullname', 'id'))->searchable(),
                    Textarea::make('event')->required()->placeholder('Enter event of action for this inmate')
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('created_at')->label('DATE CREATED')->date()->searchable(),
                TextColumn::make('inmate.fullname')->searchable()->label('INMATE'),
                TextColumn::make('event')->searchable()->label('EVENT'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Actions yet!')->emptyStateDescription('Once you write your first actions, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.action-list');
    }
}
