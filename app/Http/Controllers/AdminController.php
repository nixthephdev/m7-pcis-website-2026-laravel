<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment; // Import the Model

class AdminController extends Controller
{
    public function dashboard()
    {
        // Fetch all enrollments, newest first
        $students = Enrollment::orderBy('created_at', 'desc')->get();

        // Return the view and pass the student data
        return view('admin.dashboard', compact('students'));
    }

    // Function to delete a test application
    public function destroy($id)
    {
        Enrollment::destroy($id);
        return back()->with('success', 'Application deleted successfully.');
    }
}