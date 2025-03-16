<?php

namespace App\Livewire\Staff;

use App\Models\CellBlock;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CellInmate extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public $cell_id;
    public $block_name;

    public function mount(){
        $this->cell_id = request('id');
        $this->block_name = CellBlock::where('id', $this->cell_id)->first()->name;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\CellInmate::query()->where('cell_block_id', $this->cell_id))
            ->columns([
                TextColumn::make('inmate.fullname')->label('INMATE NAME'),
                TextColumn::make('created_at')->label('ADDED AT')->date(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('transfer')->label('Transfer Cell')->icon('heroicon-o-arrow-right-end-on-rectangle')->iconPosition(IconPosition::After)->action(
                    function($record, $data){
                        $record->update([
                            'cell_block_id' => $data['cell_block']
                        ]);
                    }
                )->form([
                    Select::make('cell_block')->options(CellBlock::where('id', '!=', $this->cell_id)->get()->pluck('name', 'id'))->label('Transfer to Cell')->required(),
                ])->modalWidth('lg'),
               DeleteAction::make('delete')->label('Remove')
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Inmates yet');
    }

    public function render()
    {
        return view('livewire.staff.cell-inmate');
    }
}
