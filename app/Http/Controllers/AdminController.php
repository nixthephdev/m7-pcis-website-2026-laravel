<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


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
        // Keep students as is (fetching all for the counters/stats)
        $students = \App\Models\Enrollment::orderBy('created_at', 'desc')->get();
        
        // CHANGE THIS: Use paginate(5) instead of get()
        $leads = \App\Models\Lead::orderBy('created_at', 'desc')->paginate(5);

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

    // Show Profile Page
    public function profile()
    {
        return view('admin.profile');
    }

    // Update Profile Logic
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // CHANGED: max:3072 (3MB)
            'avatar' => 'nullable|image|max:3072', 
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Update Basic Info
        $user->name = $request->name;
        $user->email = $request->email;

        // Update Password
        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        // Update Avatar
        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($user->avatar && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->avatar)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->avatar);
            }
            
            // Store new avatar (High Quality)
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

    public function payments(Request $request)
    {
        // Start Query
        $query = \Illuminate\Support\Facades\DB::table('payments')
            ->join('enrollments', 'payments.enrollment_id', '=', 'enrollments.id')
            ->select('payments.*', 'enrollments.first_name', 'enrollments.last_name', 'enrollments.grade_level');

        // Search Logic
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('enrollments.last_name', 'like', "%$search%")
                  ->orWhere('payments.transaction_id', 'like', "%$search%");
            });
        }

        // Filter by Status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('payments.status', $request->status);
        }

        $payments = $query->orderBy('payments.created_at', 'desc')->paginate(10);

        // Calculate Stats
        $totalCollected = \Illuminate\Support\Facades\DB::table('payments')->where('status', 'paid')->sum('amount');
        $pendingAmount = \Illuminate\Support\Facades\DB::table('payments')->where('status', 'pending')->sum('amount');

        return view('admin.payments', compact('payments', 'totalCollected', 'pendingAmount'));
    }

   public function leads(Request $request)
    {
        // 1. Update the "Last Viewed" timestamp for the current user
        // This resets the notification counter because we are viewing the page now.
        $user = auth()->user();
        $user->last_leads_viewed_at = now();
        $user->save(); // Explicitly save

        // 2. Fetch Data (Existing Logic)
        $query = \App\Models\Lead::orderBy('created_at', 'desc');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
            });
        }

        $leads = $query->paginate(10);
        $totalLeads = \App\Models\Lead::count();
        $todayLeads = \App\Models\Lead::whereDate('created_at', today())->count();

        return view('admin.leads', compact('leads', 'totalLeads', 'todayLeads'));
    }

}