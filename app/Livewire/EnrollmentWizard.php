<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enrollment;

class EnrollmentWizard extends Component
{
    public $currentStep = 1;
    public $totalSteps = 11;

    // Step 1: Type
    public $applicant_type;

    // Step 2: Student Info
    public $first_name, $last_name, $email, $phone, $grade_level;

    // Step 3: Address
    public $country = 'Philippines', $province, $city, $barangay, $subdivision, $street, $zip;

    // Step 4 & 5: Parents
    public $father_name, $father_phone, $father_email;
    public $mother_name, $mother_phone, $mother_email;

    // Step 6: Guardian
    public $guardian_name, $guardian_relation, $guardian_phone;

    // Step 7: Siblings (Simple text area for now to avoid complexity)
    public $siblings_info;

    // Step 8: Health
    public $health_allergies, $health_conditions;

    // Step 9: Additional
    public $previous_school, $referral_source;

    // Step 10: Primary Email (Confirmation)
    public $primary_email;

    protected function rules()
    {
        return [
            1 => ['applicant_type' => 'required'],
            2 => [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'grade_level' => 'required',
            ],
            3 => [
                'province' => 'required',
                'city' => 'required',
                'barangay' => 'required',
                'street' => 'required',
            ],
            4 => ['father_name' => 'nullable'],
            5 => ['mother_name' => 'nullable'],
            6 => ['guardian_name' => 'nullable'], // Optional
            7 => ['siblings_info' => 'nullable'],
            8 => ['health_conditions' => 'nullable'],
            9 => ['previous_school' => 'nullable'],
            10 => ['primary_email' => 'required|email|same:email'], // Must match student email
        ];
    }

    public function nextStep()
    {
        if (isset($this->rules()[$this->currentStep])) {
            $this->validate($this->rules()[$this->currentStep]);
        }
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submit()
    {
        $this->validate([
            'first_name' => 'required',
            'email' => 'required|email',
        ]);

        Enrollment::create([
            'reference_no' => 'PCIS-' . date('Y') . '-' . rand(1000, 9999),
            'status' => 'pending',
            'applicant_type' => $this->applicant_type,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'grade_level' => $this->grade_level,
            'address' => $this->street . ', ' . $this->barangay . ', ' . $this->city . ', ' . $this->province,
            
            // JSON Data
            'father_details' => ['name' => $this->father_name, 'phone' => $this->father_phone, 'email' => $this->father_email],
            'mother_details' => ['name' => $this->mother_name, 'phone' => $this->mother_phone, 'email' => $this->mother_email],
            'guardian_details' => ['name' => $this->guardian_name, 'relation' => $this->guardian_relation, 'phone' => $this->guardian_phone],
            'siblings_data' => $this->siblings_info,
            'health_conditions' => $this->health_allergies . ' ' . $this->health_conditions,
            'academic_history' => ['previous_school' => $this->previous_school],
        ]);

        return redirect()->route('home')->with('success', 'Application Submitted Successfully! Please check your email.');
    }

    public function render()
    {
        return view('livewire.enrollment-wizard')->layout('layouts.app');
    }
}