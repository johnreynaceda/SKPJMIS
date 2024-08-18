<?php

namespace App\Livewire\Admin;

use App\Models\CaseDetail;
use App\Models\Inmate;
use App\Models\OtherInformation;
use App\Models\PersonalInformation;
use App\Models\Post;
use App\Models\PreviousCaseDetail;
use Carbon\Carbon;
use DateTime;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateInmate extends Component implements HasForms
{
    use InteractsWithForms;
    public $cases =[];

    //personal info
    public $firstname, $middlename, $lastname, $aliases, $sex, $civil_status, $birthdate, $place_of_birth, $region, $city, $barangay, $street;

    //other info
    public $name_of_father, $name_of_mother, $name_of_spouse, $no_of_children, $nearest_kin, $address_of_kin, $relationship, $contact_number, $height, $weight, $religion, $nationality, $native_origin, $political_affilation, $educational_attainment, $course, $occupation, $color_of_hair, $color_eyes, $blood_type, $complexion, $bertillion_marks, $crime_committed, $date_time_arrested, $arresting_officer, $commited_in_jail, $station, $inmate_search_by, $inmate_property_held_by, $property_receipt_no, $kind;

    public $previous_cases = [];

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
                    TextInput::make('region'),
                    TextInput::make('city'),
                    TextInput::make('barangay'),
                    TextInput::make('street'),
                  ])->columnSpan(3)->columns(4)

                ])->columns(3),
                Section::make('OTHER INFORMATION')->description('put all required inputs.')
                ->schema([
                    TextInput::make('name_of_father'),
                    TextInput::make('name_of_mother'),
                    TextInput::make('name_of_spouse'),
                    TextInput::make('no_of_children'),
                    TextInput::make('nearest_kin'),
                    TextInput::make('address_of_kin'),
                    TextInput::make('relationship'),
                    TextInput::make('contact_number'),
                    TextInput::make('height'),
                    TextInput::make('weight'),
                    TextInput::make('religion'),
                    TextInput::make('nationality'),
                    TextInput::make('native_origin')->label('Native Origin, Tribal Affiliation'),
                    TextInput::make('political_affilation'),
                    TextInput::make('educational_attainment'),
                    TextInput::make('course'),
                    TextInput::make('occupation'),
                    TextInput::make('color_of_hair'),
                    TextInput::make('color_of_eyes'),
                    TextInput::make('blood_type'),
                    TextInput::make('complexion'),
                    Textarea::make('bertillion_marks')->columnSpan(4),
                    DatePicker::make('crime_crommited'),
                    DateTimePicker::make('date_time_arrested'),
                    Fieldset::make('CIRCUMSTANCES SORROUNDING THE ARREST')->schema([
                        TextInput::make('arresting_officer'),
                        DatePicker::make('commited_in_jail'),
                        TextInput::make('station')->label('Station/Precint'),
                      ])->columnSpan(4)->columns(4),
                      TextInput::make('inmate_search_by'),
                      TextInput::make('inmate_property_held_by'),
                      TextInput::make('property_receipt_no'),
                      TextInput::make('kind'),
                ])->columns(4),
                Section::make('CASE DETAILS')->description('put all required inputs.')
                ->schema([
                    Repeater::make('cases')->label('')
                    ->schema([
                        TextInput::make('criminal_case_no')->label('CRIMINAL CASE NO/S')->required(),
                        TextInput::make('offense_charge')->label('OFFENSE CHARGED')->required(),
                        TextInput::make('judge')->label('JUDGE')->required(),
                        TextInput::make('court_branch')->label('COURT & BRANCH')->required(),
                        DatePicker::make('date_filed')->label('DATE FILED')->required(),

                    ])->defaultItems(1)->addActionLabel('Add Case')->columns(4)
                ]),
                Section::make('PREVIOUS CRIMINAL RECORDS')->description('put all required inputs.')
                ->schema([
                    Repeater::make('previous_cases')->label('')
                    ->schema([
                        TextInput::make('criminal_case_no')->label('CRIMINAL CASE NO/S')->required(),
                        TextInput::make('offense_charge')->label('OFFENSE CHARGED')->required(),
                        TextInput::make('judge')->label('JUDGE')->required(),
                        TextInput::make('court_branch')->label('COURT & BRANCH')->required(),
                        DatePicker::make('date_filed')->label('DATE FILED')->required(),

                    ])->defaultItems(1)->addActionLabel('Add Case')->columns(4)
                ]),
                Fieldset::make('')->schema([
                    TextInput::make('medical_certificate_issued_remarks'),
                    DatePicker::make('date_issued'),
                    Textarea::make('illness_prior_commitment'),
                    Textarea::make('medications_used'),
                    TextInput::make('jail_nurse'),

                ])
            ]);

    }

    public function submitForm(){
        sleep(1);
        $inmate = Inmate::create([
            'fullname' => $this->firstname. ' ' . $this->lastname,
            'status' => 'pending',
        ]);

        PersonalInformation::create([
            'inmate_id' => $inmate->id,
            'firstname' => $this->firstname,
           'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'aliases' => $this->aliases,
           'sex' => $this->sex,
            'civil_status' => $this->civil_status,
            'birthdate' => Carbon::parse($this->birthdate),
            'place_of_birth' => $this->place_of_birth,
           'region' => $this->region,
            'city' => $this->city,
            'barangay' => $this->barangay,
           'street' => $this->street,
        ]);

        OtherInformation::create([
            'inmate_id' => $inmate->id,
            'name_of_father' => $this->name_of_father,
            'name_of_mother' => $this->name_of_mother,
            'name_of_spouse' => $this->name_of_spouse,
            'no_of_children' => $this->no_of_children,
            'nearest_kin' => $this->nearest_kin,
            'address_of_kin' => $this->address_of_kin,
           'relationship' => $this->relationship,
            'contact_number' => $this->contact_number,
            'height' => $this->height,
            'weight' => $this->weight,
           'religion' => $this->religion,
            'nationality' => $this->nationality,
            'native_origin' => $this->native_origin,
            'political_affilation' => $this->political_affilation,
            'educational_attainment' => $this->educational_attainment,
            'course' => $this->course,
            'occupation' => $this->occupation,
            'color_of_hair' => $this->color_of_hair,
            'color_of_eyes' => $this->color_eyes,
            'blood_type' => $this->blood_type,
            'complexion' => $this->complexion,
            'bertillon_marks' => $this->bertillion_marks,
            'crime_commited' => Carbon::parse($this->crime_committed),
            'date_time_arrested' => Carbon::parse($this->date_time_arrested),
            'arresting_officer' => $this->arresting_officer,
            'commited_in_jail' => Carbon::parse($this->commited_in_jail),
           'station' => $this->station,
            'inmate_search_by' => $this->inmate_search_by,
            'inmate_property_held_by' => $this->inmate_property_held_by,
            'property_receipt_no' => $this->property_receipt_no,
            'kind' => $this->kind,
            'illness_prior_commitment' => $this->illness_prior_commitment,
           'medications_used' => $this->medications_used,
            'jail_nurse' => $this->jail_nurse,
        ]);

        foreach ($this->cases as $key => $case) {
           CaseDetail::create([
            'inmate_id' => $inmate->id,
            'criminal_case_no' => $case['criminal_case_no'],
            'offense_charge' => $case['offense_charge'],
            'judge' => $case['judge'],
            'court_branch' => $case['court_branch'],
            'date_filed' => Carbon::parse($case['date_filed']),
           ]);
        }

        foreach ($this->previous_cases as $key => $previous) {
            PreviousCaseDetail::create([
                'inmate_id' => $inmate->id,
                'criminal_case_no' => $case['criminal_case_no'],
                'offense_charge' => $case['offense_charge'],
                'judge' => $case['judge'],
                'court_branch' => $case['court_branch'],
                'date_filed' => Carbon::parse($case['date_filed']),
               ]);
        }

        return redirect()->route('admin.inmates');
    }

    public function render()
    {
        return view('livewire.admin.create-inmate');
    }
}
