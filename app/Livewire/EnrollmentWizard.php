<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enrollment;

class EnrollmentWizard extends Component
{
    public $currentStep = 1;
    public $totalSteps = 12; // Increased steps to include Academic History

    // Step 1
    public $applicant_type, $is_local_resident = 'yes', $grade_level;

    // Step 2
    public $lrn, $first_name, $middle_name, $last_name, $nickname;
    public $gender, $birth_date, $birth_country, $birth_city;
    public $religion, $citizenship, $primary_language, $secondary_language;
    public $height, $weight;

    // Step 3
    public $country = 'Philippines', $province, $city, $barangay, $subdivision, $street, $zip;

    // Step 4
    public $telephone, $mobile_number;
    public $birth_order, $marital_status, $authorized_person;

    // Step 5 (Father)
    public $father_first, $father_middle, $father_last;
    public $father_birthdate, $father_religion, $father_citizenship, $father_civil_status, $father_type;
    public $father_home_ownership; // Owned, Rented, etc.
    public $father_mobile, $father_landline, $father_email;
    // Background
    public $father_education, $father_occupation, $father_company, $father_company_address, $father_company_tel;
    public $father_is_employee = 'no', $father_is_alumnus = 'no', $father_is_lasalle_alumnus = 'no';

    // Step 6 (Mother)
    public $mother_first, $mother_middle, $mother_last;
    public $mother_birthdate, $mother_religion, $mother_citizenship, $mother_civil_status, $mother_type;
    public $mother_home_ownership;
    public $mother_mobile, $mother_landline, $mother_email;
    // Background
    public $mother_education, $mother_occupation, $mother_company, $mother_company_address, $mother_company_tel;
    public $mother_is_employee = 'no', $mother_is_alumnus = 'no', $mother_is_lasalle_alumnus = 'no';

    // Step 7 (Guardian)
    public $guardian_name, $guardian_relation, $guardian_address, $guardian_mobile, $guardian_email;

    // Step 8 (Siblings)
    public $siblings = []; 

    // Step 9 (Academic History - NEW)
    public $schools = [];

    // Step 10 (Health)
    public $health_allergies, $health_conditions, $health_hearing, $health_eyesight, $general_health;

    // Step 11 (Additional)
    public $disciplinary_history, $learning_difficulty, $referral_source;
    
    // Step 12 (Summary)
    public $primary_email;

    public function mount()
    {
        $this->siblings[] = ['name' => '', 'school' => '', 'grade' => '', 'status' => 'Currently Enrolled'];
        $this->schools[] = ['name' => '', 'year' => '', 'level' => '', 'awards' => ''];
    }

    public function addSibling() { $this->siblings[] = ['name' => '', 'school' => '', 'grade' => '', 'status' => 'Currently Enrolled']; }
    public function removeSibling($index) { unset($this->siblings[$index]); $this->siblings = array_values($this->siblings); }

    public function addSchool() { $this->schools[] = ['name' => '', 'year' => '', 'level' => '', 'awards' => '']; }
    public function removeSchool($index) { unset($this->schools[$index]); $this->schools = array_values($this->schools); }

    protected function rules()
    {
        return [
            1 => ['applicant_type' => 'required', 'grade_level' => 'required'],
            2 => ['first_name' => 'required', 'last_name' => 'required', 'birth_date' => 'required'],
            3 => ['city' => 'required', 'barangay' => 'required'],
            4 => ['mobile_number' => 'required'],
            // Add other validations as needed
            12 => ['primary_email' => 'required|email'],
        ];
    }

    public function nextStep()
    {
        if(isset($this->rules()[$this->currentStep])) {
             $this->validate($this->rules()[$this->currentStep]);
        }
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep() { if ($this->currentStep > 1) $this->currentStep--; }

    public function submit()
    {
        $this->validate(['primary_email' => 'required|email']);

        Enrollment::create([
            'user_id' => auth()->id(),
            'reference_no' => 'PCIS-' . date('Y') . '-' . rand(1000, 9999),
            'status' => 'pending',
            
            // Basic Info
            'applicant_type' => $this->applicant_type,
            'is_local' => $this->is_local_resident,
            'grade_level' => $this->grade_level,
            'lrn' => $this->lrn,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'nickname' => $this->nickname,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'birth_country' => $this->birth_country,
            'birth_city' => $this->birth_city,
            'religion' => $this->religion,
            'citizenship' => $this->citizenship,
            'primary_language' => $this->primary_language,
            'secondary_language' => $this->secondary_language,
            'height' => $this->height,
            'weight' => $this->weight,
            
            // Address
            'country' => $this->country,
            'province' => $this->province,
            'city' => $this->city,
            'barangay' => $this->barangay,
            'subdivision' => $this->subdivision,
            'street' => $this->street,
            'zip' => $this->zip,
            'address' => "$this->street, $this->barangay, $this->city, $this->province",

            // Contact
            'telephone' => $this->telephone,
            'phone' => $this->mobile_number,
            'email' => $this->primary_email,
            'birth_order' => $this->birth_order,
            'parents_marital_status' => $this->marital_status,
            'authorized_guardian' => $this->authorized_person,

            // FATHER (Full Detail)
            'father_details' => [
                'name' => "$this->father_first $this->father_last",
                'birthdate' => $this->father_birthdate,
                'religion' => $this->father_religion,
                'citizenship' => $this->father_citizenship,
                'type' => $this->father_type,
                'home_ownership' => $this->father_home_ownership,
                'mobile' => $this->father_mobile,
                'landline' => $this->father_landline,
                'email' => $this->father_email,
                'education' => $this->father_education,
                'occupation' => $this->father_occupation,
                'company' => $this->father_company,
                'company_address' => $this->father_company_address,
                'company_tel' => $this->father_company_tel,
                'is_employee' => $this->father_is_employee,
                'is_alumnus' => $this->father_is_alumnus,
                'is_lasalle_alumnus' => $this->father_is_lasalle_alumnus,
            ],

            // MOTHER (Full Detail)
            'mother_details' => [
                'name' => "$this->mother_first $this->mother_last",
                'birthdate' => $this->mother_birthdate,
                'religion' => $this->mother_religion,
                'citizenship' => $this->mother_citizenship,
                'type' => $this->mother_type,
                'home_ownership' => $this->mother_home_ownership,
                'mobile' => $this->mother_mobile,
                'landline' => $this->mother_landline,
                'email' => $this->mother_email,
                'education' => $this->mother_education,
                'occupation' => $this->mother_occupation,
                'company' => $this->mother_company,
                'company_address' => $this->mother_company_address,
                'company_tel' => $this->mother_company_tel,
                'is_employee' => $this->mother_is_employee,
                'is_alumnus' => $this->mother_is_alumnus,
                'is_lasalle_alumnus' => $this->mother_is_lasalle_alumnus,
            ],

            'guardian_details' => [
                'name' => $this->guardian_name,
                'relation' => $this->guardian_relation,
                'mobile' => $this->guardian_mobile,
                'email' => $this->guardian_email,
                'address' => $this->guardian_address
            ],

            'siblings_data' => $this->siblings,
            'academic_history' => $this->schools, // New
            'health_conditions' => $this->health_conditions . ' ' . $this->health_allergies,
            'learning_difficulty' => $this->learning_difficulty,
            'disciplinary_history' => $this->disciplinary_history,
            'referral_source' => $this->referral_source,
        ]);

        return redirect()->route('applicant.dashboard')->with('success', 'Application Submitted Successfully!');
    }

    public function render()
    {
        return view('livewire.enrollment-wizard')->layout('layouts.applicant');
    }
}