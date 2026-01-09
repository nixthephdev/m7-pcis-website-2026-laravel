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
        // 1. Validate the data (Crucial for security)
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'grade_level' => 'required',
            'previous_school' => 'nullable|string'
        ]);

        // 2. Save to Database
        Enrollment::create($validated);

        // 3. Redirect back with success message
        return redirect()->back()->with('success', 'Application submitted successfully! Our admissions team will contact you.');
    }
}
