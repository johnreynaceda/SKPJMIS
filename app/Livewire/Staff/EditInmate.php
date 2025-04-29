<?php

namespace App\Livewire\Staff;

use App\Models\Inmate;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class EditInmate extends Component implements HasForms
{
    use InteractsWithForms;

    public $data;
    public $inmate;

    public function mount()
    {
        $this->inmate = Inmate::where('id', request('id'))->first();

        $this->data = [
            'firstname' => $this->inmate->personalInformation->firstname,
            'middlename' => $this->inmate->personalInformation->middlename,
            'lastname' => $this->inmate->personalInformation->lastname,
            'aliases' => $this->inmate->personalInformation->aliases,
            'sex' => $this->inmate->personalInformation->sex,
            'civil_status' => $this->inmate->personalInformation->civil_status,
            'birthdate' => $this->inmate->personalInformation->birthdate,
            'place_of_birth' => $this->inmate->personalInformation->place_of_birth,
            'street' => $this->inmate->personalInformation->street,
            'barangay' => $this->inmate->personalInformation->barangay,
            'municipality' => $this->inmate->personalInformation->city,
            'province' => $this->inmate->personalInformation->province,
            'region' => $this->inmate->personalInformation->region,

            'name_of_father' => $this->inmate->otherInformation->name_of_father,
            'name_of_mother' => $this->inmate->otherInformation->name_of_mother,
            'name_of_spouse' => $this->inmate->otherInformation->name_of_spouse,
            'name_of_guardian' => $this->inmate->otherInformation->name_of_guardian,
            'no_of_children' => $this->inmate->otherInformation->no_of_children,
            'nearest_kin' => $this->inmate->otherInformation->nearest_kin,
            'address_of_kin' => $this->inmate->otherInformation->address_of_kin,
            'relationship' => $this->inmate->otherInformation->relationship,
            'contact_number' => $this->inmate->otherInformation->contact_number,
            'occupation' => $this->inmate->otherInformation->occupation,
            'bertillion_marks' => $this->inmate->otherInformation->bertillon_marks,
            'native_origin' => $this->inmate->otherInformation->native_origin,
            'nationality' => $this->inmate->otherInformation->nationality,
            'educational_attainment' => $this->inmate->otherInformation->educational_attainment,
            'course' => $this->inmate->otherInformation->course,
            'color_eyes' => $this->inmate->otherInformation->color_of_eyes,
            'height' => $this->inmate->otherInformation->height,
            'weight' => $this->inmate->otherInformation->weight,
            'religion' => $this->inmate->otherInformation->religion,
            'blood_type' => $this->inmate->otherInformation->blood_type,
            'color_of_hair' => $this->inmate->otherInformation->color_of_hair,
            'complexion' => $this->inmate->otherInformation->complexion,

            'crime_commited' => Carbon::parse($this->inmate->otherInformation->crime_commited),
            'date_time_arrested' => Carbon::parse($this->inmate->otherInformation->date_time_arrested),
            'arresting_officer' => $this->inmate->otherInformation->arresting_officer,
            'place_of_arrest' => $this->inmate->otherInformation->place_of_arrest,
            'station' => $this->inmate->otherInformation->station,
            'commited_in_jail' => $this->inmate->otherInformation->commited_in_jail,
            'inmate_search_by' => $this->inmate->otherInformation->inmate_search_by,
            'inmate_property_held_by' => $this->inmate->otherInformation->inmate_property_held_by,
            'property_receipt_no' => $this->inmate->otherInformation->property_receipt_no,
            'property_value' => $this->inmate->otherInformation->property_value,
            'kind' => $this->inmate->otherInformation->kind,
        ];
    }


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('PERSONAL INFORMATION')
                    ->description('put all required inputs.')
                    ->schema([
                        TextInput::make('firstname')->required(),
                        TextInput::make('middlename'),
                        TextInput::make('lastname')->required(),
                        TextInput::make('aliases'),
                        Select::make('sex')->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ])->required(),

                        Select::make('civil_status')->options([
                            'Single' => 'Single',
                            'Married' => 'Married',
                            'Divorced' => 'Divorced',
                            'Widowed' => 'Widowed',
                        ])->required(),
                        DatePicker::make('birthdate'),
                        TextInput::make('place_of_birth')->required()->columnSpan(2),
                        Fieldset::make('ADDRESS')->schema([
                            // Region
                            // Province
                            Select::make('region')
                                ->label('Region')
                                ->searchable()
                                ->options(function () {
                                    $path = base_path('resources/js/address/refregion.json');
                                    $json = File::get($path);
                                    $data = json_decode($json, true);

                                    return collect($data['RECORDS'] ?? [])
                                        ->pluck('regDesc', 'regCode')
                                        ->toArray();
                                })
                                ->reactive()
                                ->afterStateUpdated(fn(callable $set) => $set('province', null)) // Clear province when region changes
                            ,

                            Select::make('province')
                                ->label('Province')
                                ->searchable()
                                ->options(function (callable $get) {
                                    $region = $get('region');

                                    if (!$region) {
                                        return [];
                                    }

                                    $path = base_path('resources/js/address/refprovince.json');
                                    $json = File::get($path);
                                    $data = json_decode($json, true);

                                    return collect($data['RECORDS'] ?? [])
                                        ->where('regCode', $region)
                                        ->pluck('provDesc', 'provCode')
                                        ->toArray();
                                })
                                ->reactive()
                                ->afterStateUpdated(fn(callable $set) => $set('municipality', null))
                            ,

                            Select::make('municipality')
                                ->label('Municipality')
                                ->searchable()
                                ->options(function (callable $get) {
                                    $province = $get('province');

                                    if (!$province) {
                                        return [];
                                    }

                                    $path = base_path('resources/js/address/refcitymun.json');
                                    $json = File::get($path);
                                    $data = json_decode($json, true);

                                    return collect($data['RECORDS'] ?? [])
                                        ->where('provCode', $province)
                                        ->pluck('citymunDesc', 'citymunCode')
                                        ->toArray();
                                })
                                ->reactive()
                                ->afterStateUpdated(fn(callable $set) => $set('barangay', null))
                            ,

                            Select::make('barangay')
                                ->label('Barangay')
                                ->searchable()
                                ->options(function (callable $get) {
                                    $municipality = $get('municipality');

                                    if (!$municipality) {
                                        return [];
                                    }

                                    $path = base_path('resources/js/address/refbrgy.json');
                                    $json = File::get($path);
                                    $data = json_decode($json, true);

                                    return collect($data['RECORDS'] ?? [])
                                        ->where('citymunCode', $municipality)
                                        ->pluck('brgyDesc', 'brgyCode')
                                        ->toArray();
                                })
                            ,
                            // Street
                            TextInput::make('street'),
                        ])
                            ->columnSpan(3)
                            ->columns(4),


                    ])->columns(3),
                Section::make('OTHER INFORMATION')->description('put all required inputs.')
                    ->schema([
                        TextInput::make('name_of_father')->required(),
                        TextInput::make('name_of_mother')->required(),
                        TextInput::make('name_of_spouse')->required(),
                        TextInput::make('no_of_children')->required(),
                        TextInput::make('nearest_kin')->required(),
                        TextInput::make('address_of_kin')->required(),
                        TextInput::make('relationship')->required(),
                        TextInput::make('contact_number')->required(),
                        TextInput::make('height')->required(),
                        TextInput::make('weight')->required(),
                        TextInput::make('religion')->required(),
                        TextInput::make('nationality')->required(),
                        TextInput::make('native_origin')->label('Native Origin, Tribal Affiliation')->required(),
                        TextInput::make('political_affilation')->required(),
                        TextInput::make('educational_attainment')->required(),
                        TextInput::make('course')->required(),
                        TextInput::make('occupation')->required(),
                        TextInput::make('color_of_hair')->required(),
                        TextInput::make('color_eyes')->required(),
                        TextInput::make('blood_type')->required(),
                        TextInput::make('complexion')->required(),
                        Textarea::make('bertillion_marks')->columnSpan(4)->required(),
                        DatePicker::make('crime_commited')->required(),
                        DateTimePicker::make('date_time_arrested')->required(),
                        Fieldset::make('CIRCUMSTANCES SORROUNDING THE ARREST')->schema([
                            TextInput::make('arresting_officer')->required(),
                            DatePicker::make('commited_in_jail')->required(),
                            TextInput::make('station')->label('Station/Precint')->required(),
                        ])->columnSpan(4)->columns(4),
                        TextInput::make('inmate_search_by')->required(),
                        TextInput::make('inmate_property_held_by')->required(),
                        TextInput::make('property_receipt_no')->required(),
                        TextInput::make('kind')->required(),

                    ])->columns(4),
                Section::make('CASE DETAILS')->description('put all required inputs.')
                    ->schema([
                        Repeater::make('cases')->label('')->required()
                            ->schema([
                                TextInput::make('criminal_case_no')->label('CRIMINAL CASE NO/S')->required(),
                                TextInput::make('offense_charge')->label('OFFENSE CHARGED')->required(),
                                TextInput::make('judge')->label('JUDGE')->required(),
                                TextInput::make('court_branch')->label('COURT & BRANCH')->required(),
                                DatePicker::make('date_filed')->label('DATE FILED')->required(),

                            ])->defaultItems(1)->addActionLabel('Add Case')->columns(4),
                    ]),
                Section::make('PREVIOUS CRIMINAL RECORDS')->description('put all required inputs.')
                    ->schema([
                        Repeater::make('previous_cases')->label('')->required()
                            ->schema([
                                TextInput::make('criminal_case_no')->label('CRIMINAL CASE NO/S')->required(),
                                TextInput::make('offense_charge')->label('OFFENSE CHARGED')->required(),
                                TextInput::make('judge')->label('JUDGE')->required(),
                                TextInput::make('court_branch')->label('COURT & BRANCH')->required(),
                                DatePicker::make('date_filed')->label('DATE FILED')->required(),

                            ])->defaultItems(1)->addActionLabel('Add Case')->columns(4),
                    ]),
                // Fieldset::make('')->schema([
                //     

                // ]),
                Section::make('Medical Information')
                    ->schema([
                        TextInput::make('medical_certificate_issued_remarks'),
                        DatePicker::make('medical_date_issued'),
                        Textarea::make('illness_prior_commitment'),
                        Textarea::make('medications_used'),
                        TextInput::make('jail_nurse'),
                    ])->columns(4)->collapsible()
                    ->persistCollapsed()
            ])->statePath('data');

    }

    public function updateRecord()
    {
        $this->inmate->personalInformation->update([
            'firstname' => $this->data['firstname'],
            'middlename' => $this->data['middlename'],
            'lastname' => $this->data['lastname'],
            'aliases' => $this->data['aliases'],
            'sex' => $this->data['sex'],
            'civil_status' => $this->data['civil_status'],
            'birthdate' => $this->data['birthdate'],
            'place_of_birth' => $this->data['place_of_birth'],
            'street' => $this->data['street'],
            'region' => $this->data['region'],
            'province' => $this->data['province'],
            'city' => $this->data['municipality'],
            'barangay' => $this->data['barangay'],
        ]);
    }

    public function render()
    {
        return view('livewire.staff.edit-inmate');
    }
}
