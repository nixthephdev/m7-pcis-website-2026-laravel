<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationReceived;

class EnrollmentController extends Controller
{
    // Show the enrollment form
    public function index() {
        return view('enrollment');
    }

    // Store the data
    public function store(Request $request) {
        // 1. Validate
        $validated = $request->validate([
            // ... (keep your existing validation rules)
            'applicant_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'grade_level' => 'required',
            'lrn' => 'nullable',
            'birth_date' => 'nullable|date',
            'father_details' => 'nullable|array',
            'mother_details' => 'nullable|array',
            'health_conditions' => 'nullable',
        ]);

        // 2. Save to Database
        $enrollment = Enrollment::create($request->all());

        // 3. SEND EMAIL (The New Part)
        // We wrap this in a try-catch block so if email fails (no internet), the app doesn't crash
        try {
            Mail::to($request->email)->send(new ApplicationReceived($enrollment));
        } catch (\Exception $e) {
            // Log error if needed, but don't stop the process
        }

        // 4. Redirect
        return redirect()->back()->with('success', 'Application submitted successfully! Please check your email for confirmation.');
    }
}
