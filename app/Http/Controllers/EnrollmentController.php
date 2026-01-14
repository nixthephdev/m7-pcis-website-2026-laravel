<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationReceived;
use App\Models\Lead;

class EnrollmentController extends Controller
{
    // Show the enrollment form
    public function index() {
        return view('enrollment');
    }

    // Store the data
    public function store(Request $request) {
        // 1. Validate (Keep your existing validation)
        $validated = $request->validate([
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
            'siblings_data' => 'nullable|json',
            'academic_history' => 'nullable|json',
            // Add other fields as needed based on your form
        ]);

        // 2. GENERATE REFERENCE NUMBER
        // Format: PCIS-YEAR-RANDOM (e.g., PCIS-2026-8492)
        $refNo = 'PCIS-' . date('Y') . '-' . rand(1000, 9999);

        // Ensure uniqueness (simple check)
        while(Enrollment::where('reference_no', $refNo)->exists()){
            $refNo = 'PCIS-' . date('Y') . '-' . rand(1000, 9999);
        }

        // 3. Merge Ref No into Request Data
        $data = $request->all();
        $data['reference_no'] = $refNo;

        // 4. Save to Database
        $enrollment = Enrollment::create($data);

        // 5. Send Email (Pass the enrollment object which now has the Ref No)
        try {
            Mail::to($request->email)->send(new ApplicationReceived($enrollment));
        } catch (\Exception $e) {
            // Log error
        }

        // 6. Redirect with Success AND the Reference Number
        return redirect()->back()->with([
            'success' => 'Application submitted successfully!',
            'reference_no' => $refNo // Pass this to the view
        ]);
    }

    // Handle Fee Download from Global Header
    public function downloadFees(Request $request)
    {
        // 1. Validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'level' => 'required',
        ]);

        // 2. SAVE THE LEAD (New Step)
        \App\Models\Lead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'level' => $request->level,
        ]);

        
        // 3. SMART DOWNLOAD (Checks for PDF, PNG, or JPG)
        $extensions = ['pdf', 'png', 'jpg', 'jpeg'];
        $filePath = null;

        // Loop through extensions to find the matching file
        foreach ($extensions as $ext) {
            $testPath = public_path('downloads/' . $request->level . '.' . $ext);
            if (file_exists($testPath)) {
                $filePath = $testPath;
                break; // Stop looking once found
            }
        }

        // 4. Download or Error
        if ($filePath) {
            return response()->download($filePath);
        } else {
            return back()->with('error', 'Sorry, the fee schedule for ' . $request->level . ' is currently unavailable.');
        }
}
}