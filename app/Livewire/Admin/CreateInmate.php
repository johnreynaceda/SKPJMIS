<?php
namespace App\Livewire\Admin;

use App\Models\CaseDetail;
use App\Models\Inmate;
use App\Models\InmateFingerprint;
use App\Models\OtherInformation;
use App\Models\PersonalInformation;
use App\Models\PreviousCaseDetail;
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
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateInmate extends Component implements HasForms
{
    use InteractsWithForms;
    public $cases = [[]];

    //personal info
    public $firstname, $middlename, $lastname, $aliases, $sex, $civil_status, $birthdate, $place_of_birth, $region, $city, $barangay, $street;

    //other info
    public $name_of_father, $name_of_mother, $name_of_spouse, $no_of_children, $nearest_kin, $address_of_kin, $relationship, $contact_number, $height, $weight, $religion, $nationality, $native_origin, $political_affilation, $educational_attainment, $course, $occupation, $color_of_hair, $color_eyes, $blood_type, $complexion, $bertillion_marks, $crime_committed, $date_time_arrested, $arresting_officer, $commited_in_jail, $station, $inmate_search_by, $inmate_property_held_by, $property_receipt_no, $kind;

    public $previous_cases = [[]];

    public $medical_certificate_issued_remarks, $date_issued, $illness_prior_commitment, $medications_used, $jail_nurse;

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
                            'Male'   => 'Male',
                            'Female' => 'Female',
                        ])->required(),

                        Select::make('civil_status')->options([
                            'Single'   => 'Single',
                            'Married'  => 'Married',
                            'Divorced' => 'Divorced',
                            'Widowed'  => 'Widowed',
                        ])->required(),
                        DatePicker::make('birthdate'),
                        TextInput::make('place_of_birth')->required()->columnSpan(2),
                        Fieldset::make('ADDRESS')->schema([
                            TextInput::make('region'),
                            TextInput::make('city'),
                            TextInput::make('barangay'),
                            TextInput::make('street'),
                        ])->columnSpan(3)->columns(4),

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
                Fieldset::make('')->schema([
                    TextInput::make('medical_certificate_issued_remarks'),
                    DatePicker::make('date_issued'),
                    Textarea::make('illness_prior_commitment'),
                    Textarea::make('medications_used'),
                    TextInput::make('jail_nurse'),

                ]),
            ]);

    }

    public function submitForm()
    {
        sleep(1);

        $this->validate([
            'firstname'                          => 'required|string|max:255',
            'middlename'                         => 'nullable|string|max:255',
            'lastname'                           => 'required|string|max:255',
            'aliases'                            => 'nullable|string|max:255',
            'sex'                                => 'required|string|in:Male,Female',
            'civil_status'                       => 'required|string|in:Single,Married,Divorced,Widowed',
            'birthdate'                          => 'required|date',
            'place_of_birth'                     => 'required|string|max:255',
            'region'                             => 'nullable|string|max:255',
            'city'                               => 'nullable|string|max:255',
            'barangay'                           => 'nullable|string|max:255',
            'street'                             => 'nullable|string|max:255',

            // Other information fields
            'name_of_father'                     => 'required|string|max:255',
            'name_of_mother'                     => 'required|string|max:255',
            'name_of_spouse'                     => 'required|string|max:255',
            'no_of_children'                     => 'required|numeric',
            'nearest_kin'                        => 'required|string|max:255',
            'address_of_kin'                     => 'required|string|max:255',
            'relationship'                       => 'required|string|max:255',
            'contact_number'                     => 'required|numeric',
            'height'                             => 'required|numeric',
            'weight'                             => 'required|numeric',
            'religion'                           => 'required|string|max:255',
            'nationality'                        => 'required|string|max:255',
            'native_origin'                      => 'required|string|max:255',
            'political_affilation'               => 'required|string|max:255',
            'educational_attainment'             => 'required|string|max:255',
            'course'                             => 'required|string|max:255',
            'occupation'                         => 'required|string|max:255',
            'color_of_hair'                      => 'required|string|max:255',
            'color_eyes'                         => 'required|string|max:255',
            'blood_type'                         => 'required|string|max:5',
            'complexion'                         => 'required|string|max:255',
            'bertillion_marks'                   => 'nullable|string',
            'crime_committed'                    => 'required|date',
            'date_time_arrested'                 => 'required|date',
            'arresting_officer'                  => 'required|string|max:255',
            'commited_in_jail'                   => 'required|date',
            'station'                            => 'required|string|max:255',
            'inmate_search_by'                   => 'required|string|max:255',
            'inmate_property_held_by'            => 'required|string|max:255',
            'property_receipt_no'                => 'required|string|max:255',
            'kind'                               => 'required|string|max:255',

            // Case Details Repeater Validation
            'cases'                              => 'required|array|min:1',
            'cases.*.criminal_case_no'           => 'required|string|max:255',
            'cases.*.offense_charge'             => 'required|string|max:255',
            'cases.*.judge'                      => 'required|string|max:255',
            'cases.*.court_branch'               => 'required|string|max:255',
            'cases.*.date_filed'                 => 'required|date',

            // Previous Criminal Records Repeater Validation
            'previous_cases'                     => 'required|array|min:1',
            'previous_cases.*.criminal_case_no'  => 'required|string|max:255',
            'previous_cases.*.offense_charge'    => 'required|string|max:255',
            'previous_cases.*.judge'             => 'required|string|max:255',
            'previous_cases.*.court_branch'      => 'required|string|max:255',
            'previous_cases.*.date_filed'        => 'required|date',

            // Medical Information Validation
            'medical_certificate_issued_remarks' => 'required|string|max:255',
            'date_issued'                        => 'required|date',
            'illness_prior_commitment'           => 'required|string',
            'medications_used'                   => 'required|string',
            'jail_nurse'                         => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        $inmate = Inmate::create([
            'fullname' => $this->firstname . ' ' . $this->lastname,
            'status'   => 'pending',
        ]);

        InmateFingerprint::create([
            'inmate_id' => $inmate->id,
        ]);

        PersonalInformation::create([
            'inmate_id'      => $inmate->id,
            'firstname'      => $this->firstname,
            'middlename'     => $this->middlename,
            'lastname'       => $this->lastname,
            'aliases'        => $this->aliases,
            'sex'            => $this->sex,
            'civil_status'   => $this->civil_status,
            'birthdate'      => Carbon::parse($this->birthdate),
            'place_of_birth' => $this->place_of_birth,
            'region'         => $this->region,
            'city'           => $this->city,
            'barangay'       => $this->barangay,
            'street'         => $this->street,
        ]);

        OtherInformation::create([
            'inmate_id'                          => $inmate->id,
            'name_of_father'                     => $this->name_of_father,
            'name_of_mother'                     => $this->name_of_mother,
            'name_of_spouse'                     => $this->name_of_spouse,
            'no_of_children'                     => $this->no_of_children,
            'nearest_kin'                        => $this->nearest_kin,
            'address_of_kin'                     => $this->address_of_kin,
            'relationship'                       => $this->relationship,
            'contact_number'                     => $this->contact_number,
            'height'                             => $this->height,
            'weight'                             => $this->weight,
            'religion'                           => $this->religion,
            'nationality'                        => $this->nationality,
            'native_origin'                      => $this->native_origin,
            'political_affilation'               => $this->political_affilation,
            'educational_attainment'             => $this->educational_attainment,
            'course'                             => $this->course,
            'occupation'                         => $this->occupation,
            'color_of_hair'                      => $this->color_of_hair,
            'color_of_eyes'                      => $this->color_eyes,
            'blood_type'                         => $this->blood_type,
            'complexion'                         => $this->complexion,
            'bertillon_marks'                    => $this->bertillion_marks,
            'crime_commited'                     => Carbon::parse($this->crime_committed),
            'date_time_arrested'                 => Carbon::parse($this->date_time_arrested),
            'arresting_officer'                  => $this->arresting_officer,
            'commited_in_jail'                   => Carbon::parse($this->commited_in_jail),
            'station'                            => $this->station,
            'inmate_search_by'                   => $this->inmate_search_by,
            'inmate_property_held_by'            => $this->inmate_property_held_by,
            'property_receipt_no'                => $this->property_receipt_no,
            'kind'                               => $this->kind,
            'medical_certificate_issued_remarks' => $this->medical_certificate_issued_remarks,
            'date_issued'                        => Carbon::parse($this->date_issued),
            'illness_prior_commitment'           => $this->illness_prior_commitment,
            'medications_used'                   => $this->medications_used,
            'jail_nurse'                         => $this->jail_nurse,
        ]);

        foreach ($this->cases as $key => $case) {
            CaseDetail::create([
                'inmate_id'        => $inmate->id,
                'criminal_case_no' => $case['criminal_case_no'] ?? null,
                'offense_charge'   => $case['offense_charge'] ?? null,
                'judge'            => $case['judge'] ?? null,
                'court_branch'     => $case['court_branch'] ?? null,
                'date_filed'       => Carbon::parse($case['date_filed'] ?? null),
            ]);
        }

        foreach ($this->previous_cases as $key => $previous) {
            PreviousCaseDetail::create([
                'inmate_id'        => $inmate->id,
                'criminal_case_no' => $previous['criminal_case_no'] ?? null,
                'offense_charge'   => $previous['offense_charge'] ?? null,
                'judge'            => $previous['judge'] ?? null,
                'court_branch'     => $previous['court_branch'] ?? null,
                'date_filed'       => Carbon::parse($previous['date_filed'] ?? null),
            ]);
        }
        DB::commit();

        if (auth()->user()->user_type == 'admin') {
            return redirect()->route('admin.inmates');
        } else {
            return redirect()->route('staff.inmates');
        }
    }

    public function render()
    {
        return view('livewire.admin.create-inmate');
    }
}
