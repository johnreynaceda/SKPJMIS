<?php
namespace App\Livewire\Staff;

use App\Models\DescriptiveInformation;
use App\Models\Inmate;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class InmateRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Inmate::query())->headerActions([
            Action::make('new')->label('New Inmates')->icon('heroicon-o-user-plus')->color('main')->url(fn(): string => route('staff.inmate-create')),
        ])
            ->columns([
                TextColumn::make('created_at')->date()->label('CREATED DATE')->searchable(),
                TextColumn::make('fullname')->label('NAME')->searchable(),
                TextColumn::make('status')->label('STATUS')->badge()->searchable()->formatStateUsing(
                    fn($record) => ucfirst($record->status)
                )->color(fn(string $state): string => match ($state) {
                    'pending'                          => 'warning',
                    'approved'                         => 'success',
                    'dismissed'                        => 'danger',
                }),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([

                    Action::make('view')->color('warning')->icon('heroicon-o-eye')->url(fn($record): string => route('staff.inmates-information', ['id' => $record])),
                    Action::make('view_fingerprint')->label('View Fingerprint')->icon('heroicon-c-finger-print')->color('success')->form([
                        Section::make('FINGERPRINTS')->schema([
                            Fieldset::make('RIGHT HAND')->schema([
                                ViewField::make('right_hand')
                                    ->view('filament.forms.right-finger'),
                            ])->columns(1),
                            Fieldset::make('LEFT HAND')->schema([
                                ViewField::make('left_hand')
                                    ->view('filament.forms.left-finger'),
                            ])->columns(1),
                        ]),
                    ])->modalHeading('')->modalWidth('7xl')->modalSubmitAction(false),
                    Action::make('decriptive_record')->label('Descriptive Record')->icon('heroicon-o-document-text')->form([
                        Section::make('DESCRIPTIVE RECORD')
                            ->description('This descriptive Record form will be used for all prisoners confined in a provincial prison and a copy of same certified as true and correct will accompany all prisoners upon their transfer from a provincial prison in addition to the commitment required by Executive Order No. 55 of 1997. In the identification record scars, marks and moles as well as the designation of missing members and deformities or peculiarities with dimension is millimeters will be recorded and located on the figure. Special care will be taken in lining and valuing prisoners effects and in securing their verifications to effect as listed and valued.')
                            ->schema([
                                ViewField::make('front')->view('filament.forms.front'),
                                ViewField::make('back')->view('filament.forms.back'),
                            ])->columns(2),
                    ])->modalWidth('6xl')->action(
                        function ($record, $data) {
                            DescriptiveInformation::create([
                                'inmate_id'  => $record->id,
                                'front_path' => $this->front->store('Front', 'public'),
                                'back_path'  => $this->back->store('Back', 'public'),
                            ]);
                        }
                    ),

                    DeleteAction::make('delete'),
                ]),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Inmates yet')->emptyStateDescription('Once you write your first inmate, it will appear here.');
    }

    public function render()
    {
        return view('livewire.staff.inmate-record');
    }
}
