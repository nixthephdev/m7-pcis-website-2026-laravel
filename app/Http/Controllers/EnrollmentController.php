<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    // Show the enrollment form
    public function index() {
        return view('enrollment');
    }

    // Store the data
    public function store(Request $request) {
    // 1. Validate (Basic validation, you can add more specific rules)
    $validated = $request->validate([
        'applicant_type' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'grade_level' => 'required',
        // Allow other fields to be nullable
        'lrn' => 'nullable',
        'birth_date' => 'nullable|date',
        'father_details' => 'nullable|array',
        'mother_details' => 'nullable|array',
        'health_conditions' => 'nullable',
    ]);

    // 2. Save
    Enrollment::create($request->all()); // We use $request->all() to catch all the new fields

    // 3. Redirect
    return redirect()->back()->with('success', 'Application submitted successfully! Please check your email for the confirmation slip.');
}
}
