<?php
namespace App\Livewire\Admin;

use App\Models\DescriptiveInformation;
use App\Models\DischargeInfo;
use App\Models\Inmate;
use App\Models\InmateFingerprint;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class InmateList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $add_modal = false;

    public $front, $back;

    public function table(Table $table): Table
    {
        return $table
            ->query(Inmate::query()->orderByDesc('created_at'))->headerActions([
            // Action::make('new')->label('New Inmates')->icon('heroicon-o-user-plus')->color('main')->url(fn (): string => route('admin.inmates-create'))
        ])
            ->columns([
                TextColumn::make('created_at')->date()->label('CREATED DATE')->searchable(),
                TextColumn::make('fullname')->label('NAME')->searchable(),
                TextColumn::make('status')->label('STATUS')->badge()->searchable()->formatStateUsing(
                    fn($record) => ucfirst($record->status)
                )->color(fn(string $state): string => match ($state) {
                    'pending'                          => 'warning',
                    'approved'                         => 'success',
                    'discharge'                        => 'danger',
                }),
                ViewColumn::make('print')->label('')->view('filament.tables.print'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'approved'  => 'Approved',
                        'discharge' => 'Dismissed',
                    ]),
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('view')->color('warning')->icon('heroicon-o-eye')->url(fn($record): string => route('admin.inmates-information', ['id' => $record])),
                    Action::make('approve')->color('success')->icon('heroicon-s-hand-thumb-up')->action(
                        function ($record) {
                            $record->update(['status' => 'approved']);
                        }
                    )->visible(fn($record) => $record->status == 'pending'),
                    Action::make('reject')->color('danger')->icon('heroicon-s-hand-thumb-down')->visible(fn($record) => $record->status == 'pending'),
                    Action::make('view_fingerprint')->label('View Fingerprint')->visible(fn($record) => $record->status != 'pending')->icon('heroicon-c-finger-print')->color('success')->form([
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
                    Action::make('decriptive_record')->visible(fn($record) => $record->status != 'pending')->label('Descriptive Record')->icon('heroicon-o-document-text')->form([
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
                    Action::make('discharge_inmate')->visible(fn($record) => $record->status != 'pending' && $record->status != 'discharge')->label('Discharge Inmate')->icon('heroicon-o-arrow-turn-down-right')->color('danger')->form([
                        Grid::make(2)->schema([
                            TextInput::make('criminal_case')->label('Criminal Case/s NO./s'),
                            TextInput::make('class')->label('Class'),
                            TextInput::make('commited_on')->label('Who was sentenced/commited on'),
                            TextInput::make('by')->label('by'),
                            TextInput::make('for')->label('To be confined in jail during pendency of his/her/their case/s')->hint('For'),
                            TextInput::make('release')->label('Is released from confinement this date'),
                            TextInput::make('order_of')->label('For the case filed againts him/her/them, as per Order of'),
                            DatePicker::make('date')->label('Date')->required(),
                            TextInput::make('previous_term')->label('Number of previous term of improvement'),
                            TextInput::make('remarks')->label('Remarks'),
                            DatePicker::make('date_of_discharge')->label('Date of Discharge')->required(),
                        ]),

                    ])->modalWidth('2xl')->action(
                        function ($record, $data) {
                            DischargeInfo::create([
                                'inmate_id'         => $record->id,
                                'criminal_case'     => $data['criminal_case'],
                                'class'             => $data['class'],
                                'committed_on'      => $data['commited_on'],
                                'by'                => $data['by'],
                                'for'               => $data['for'],
                                'release'           => $data['release'],
                                'order_of'          => $data['order_of'],
                                'date'              => $data['date'],
                                'previous_term'     => $data['previous_term'],
                                'remarks'           => $data['remarks'],
                                'date_of_discharge' => $data['date_of_discharge'],
                            ]);

                            // Ensure the record updates properly
                            $record->update(['status' => 'discharge']);
                        }
                    ),

                    // Action::make('edit')->color('success')->icon('heroicon-o-pencil'),
                    // DeleteAction::make('delete'),
                ]),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Inmates yet')->emptyStateDescription('Once you write your first inmate, it will appear here.');
    }

    public function sms()
    {
        sleep(1);

        $ch         = curl_init();
        $parameters = [
            'apikey'     => '1aaad08e0678a1c60ce55ad2000be5bd', //Your API KEY
            'number'     => '09489203090',
            'message'    => 'I just sent my first message with Semaphore',
            'sendername' => 'ELOIS',
        ];
        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);

//Send the parameters set above with the request
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

// Receive response from server
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

//Show the server response
        echo $output;

    }

    public function render()
    {
        return view('livewire.admin.inmate-list', [
            'fingerprints' => InmateFingerprint::get(),
        ]);
    }
}
