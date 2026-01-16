<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApplicantAuthController extends Controller
{
    // Show Register Form (Page 1)
    public function showRegister()
    {
        return view('auth.register-applicant');
    }

    // Process Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'applicant',
        ]);

        // Redirect to LOGIN page with a success message
        return redirect()->route('login')->with('success', 'Account created successfully! Please sign in.');
    }
    // Show Login Form
    public function showLogin()
    {
        return view('auth.login-applicant');
    }

    // Process Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // If they are admin, go to admin dashboard
            if(auth()->user()->role === 'admin') { // Adjust logic based on your role system
                 return redirect()->route('admin.dashboard');
            }

            // If applicant, go to dashboard
            return redirect()->route('applicant.policy');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}