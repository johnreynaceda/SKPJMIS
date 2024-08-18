<?php

namespace App\Livewire\Admin;

use App\Models\Inmate;
use App\Models\Shop\Product;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
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

class InmateList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $add_modal = false;

    public function table(Table $table): Table
    {
        return $table
            ->query(Inmate::query())->headerActions([
                Action::make('new')->label('New Inmates')->icon('heroicon-o-user-plus')->color('main')->url(fn (): string => route('admin.inmates-create'))
            ])
            ->columns([
                TextColumn::make('created_at')->date()->label('CREATED DATE')->searchable(),
                TextColumn::make('fullname')->label('NAME')->searchable(),
                TextColumn::make('status')->label('STATUS')->badge()->searchable()->formatStateUsing(
                    fn($record) => ucfirst($record->status)
                )->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'approved' => 'success',
                    'dismissed' => 'danger',
                }),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    // Action::make('view')->color('warning')->icon('heroicon-o-eye'),
                    Action::make('view_fingerprint')->label('View Fingerprint')->icon('heroicon-c-finger-print')->color('success')->form([
                        Section::make('FINGERPRINTS')->schema([
                            Fieldset::make('RIGHT HAND')->schema([
                                FileUpload::make('thumb'),
                                FileUpload::make('index'),
                                FileUpload::make('middle'),
                                FileUpload::make('ring'),
                                FileUpload::make('little'),
                            ])->columns(5),
                            Fieldset::make('LEFT HAND')->schema([
                                FileUpload::make('thumb'),
                                FileUpload::make('index'),
                                FileUpload::make('middle'),
                                FileUpload::make('ring'),
                                FileUpload::make('little'),
                            ])->columns(5),
                        ])
                    ])->modalHeading('')->modalWidth('7xl'),
                    Action::make('decriptive_record')->label('Descriptive Record')->icon('heroicon-o-document-text')->form([
                        Section::make('DESCRIPTIVE RECORD')
                        ->description('This descriptive Record form will be used for all prisoners confined in a provincial prison and a copy of same certified as true and correct will accompany all prisoners upon their transfer from a provincial prison in addition to the commitment required by Executive Order No. 55 of 1997. In the identification record scars, marks and moles as well as the designation of missing members and deformities or peculiarities with dimension is millimeters will be recorded and located on the figure. Special care will be taken in lining and valuing prisoners effects and in securing their verifications to effect as listed and valued.')
                        ->schema([
                            FileUpload::make('front'),
                            FileUpload::make('back'),
                        ])->columns(2)
                    ])->modalWidth('6xl'),

                    Action::make('edit')->color('success')->icon('heroicon-o-pencil'),
                    DeleteAction::make('delete'),
                ])
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Inmates yet')->emptyStateDescription('Once you write your first inmate, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.inmate-list');
    }
}
