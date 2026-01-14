<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;

class AdminController extends Controller
{
    // 1. Show Login Form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // 2. Process Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // 3. Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    // 4. Dashboard
     public function dashboard()
    {
        $students = Enrollment::orderBy('created_at', 'desc')->get();
        
        // Fetch Leads
        $leads = Lead::orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact('students', 'leads'));
    }

    // 5. Delete Student
    public function destroy($id)
    {
        Enrollment::destroy($id);
        return back()->with('success', 'Application deleted successfully.');
    }

    // 6. Update Status (Approve/Reject)
    public function updateStatus(Request $request, $id)
    {
        $student = Enrollment::findOrFail($id);
        $student->status = $request->status;
        $student->save();

        return back()->with('success', 'Application status updated to ' . ucfirst($request->status));
    }

    // Show Applications List (With Search & Filter)
    public function applications(Request $request)
    {
        $query = Enrollment::query();

        // Search Logic
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('lrn', 'like', "%$search%");
            });
        }

        // Filter by Status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        $students = $query->orderBy('created_at', 'desc')->paginate(10); // 10 per page

        return view('admin.applications', compact('students'));
    }
}