<?php
namespace App\Livewire\Admin;

use App\Models\CellBlock;
use App\Models\CellInmate;
use App\Models\Inmate;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CellBlockList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(CellBlock::query())->columns([
            Grid::make(1)->schema([
                ViewColumn::make('status')->view('filament.tables.cell'),
            ]),
        ])->contentGrid([
            'md' => 3,
            'xl' => 4,
        ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('add')->label('Assign Inmate')->color('main')->hidden(fn() => auth()->user()->user_type == 'admin')->icon('heroicon-o-user-plus')->form(
                        function ($record) {
                            $datas = CellInmate::where('cell_block_id', $record->id)->count();
                            return [

                                Select::make('inmate_id')->label('Assign Inmate')->options(Inmate::whereNotIn('id', CellInmate::pluck('inmate_id'))->pluck('fullname', 'id'))->multiple()->searchable()->hint($datas . '/' . $record->capacity),

                            ];
                        }
                    )->action(
                        function ($record, $data) {

                            $datas = CellInmate::where('cell_block_id', $record->id)->count();

                            foreach ($data['inmate_id'] as $key => $value) {

                                if ($datas < $record->capacity) {
                                    CellInmate::create([
                                        'inmate_id'     => $value,
                                        'cell_block_id' => $record->id,
                                    ]);
                                } else {
                                    // $this->addFlash('error', 'Cannot assign more inmates than available capacity.');
                                    return redirect()->back();
                                }

                            }

                        }
                    ),
                    ViewAction::make('view')->color('warning')->label('View Inmates')->form([
                        ViewField::make('rating')
                            ->view('filament.forms.inmates'),
                    ])->modalHeading('List of Inmates'),
                    EditAction::make('edit')->color('success')->form([
                        TextInput::make('name')->required()->disabled(),
                        TextInput::make('capacity')->numeric()->required(),
                    ])->modalWidth('xl')->modalHeading('Edit Cell Block')->hidden(fn() => auth()->user()->user_type == 'admin'),
                ]),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Inmates yet')->emptyStateDescription('Once you write your first inmate, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.cell-block-list');
    }
}
