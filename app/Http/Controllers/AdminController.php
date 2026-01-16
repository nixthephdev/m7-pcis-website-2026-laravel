<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Payment;

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
        $leads = Lead::orderBy('created_at', 'desc')->paginate(5);

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

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('last_name', 'like', "%$search%")
                  ->orWhere('first_name', 'like', "%$search%")
                  ->orWhere('lrn', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        $students = $query->orderBy('created_at', 'desc')->paginate(10);

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
            'avatar' => 'nullable|image|max:3072', 
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

    public function leads(Request $request)
    {
        $user = auth()->user();
        $user->last_leads_viewed_at = now();
        $user->save(); 

        $query = Lead::orderBy('created_at', 'desc');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
            });
        }

        $leads = $query->paginate(10);
        $totalLeads = Lead::count();
        $todayLeads = Lead::whereDate('created_at', today())->count();

        return view('admin.leads', compact('leads', 'totalLeads', 'todayLeads'));
    }

    // --- USER MANAGEMENT (IT ONLY) ---

    public function users()
    {
        $users = User::where('role', '!=', 'applicant')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('admin.users', compact('users'));
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'avatar' => null 
        ]);

        return back()->with('success', 'New staff account created successfully!');
    }

    public function deleteUser($id)
    {
        if (auth()->id() == $id) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        User::destroy($id);
        return back()->with('success', 'User deleted.');
    }

    // --- PAYMENTS MODULE ---

    public function payments()
    {
        // Get all payments with student info
        $payments = Payment::with('enrollment')->latest()->paginate(10);
        
        // Get list of students for the "Add Payment" dropdown
        $students = Enrollment::where('status', '!=', 'rejected')->get();

        return view('admin.payments', compact('payments', 'students'));
    }

    public function storePayment(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required',
            'amount' => 'required|numeric',
            'type' => 'required', 
            'method' => 'required', 
            'proof_file' => 'nullable|image|max:2048' 
        ]);

        $path = null;
        if ($request->hasFile('proof_file')) {
            $path = $request->file('proof_file')->store('receipts', 'public');
        }

        Payment::create([
            'enrollment_id' => $request->enrollment_id,
            'transaction_id' => 'TRX-' . strtoupper(uniqid()),
            'amount' => $request->amount,
            'type' => $request->type,
            'method' => $request->method,
            'status' => 'pending',
            'proof_file' => $path
        ]);

        return back()->with('success', 'Payment recorded successfully!');
    }

    public function verifyPayment(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['status' => $request->status]); 

        return back()->with('success', 'Payment status updated.');
    }
}