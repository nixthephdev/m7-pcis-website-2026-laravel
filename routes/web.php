<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantAuthController;
use App\Livewire\EnrollmentWizard; 
use App\Http\Controllers\ApplicantPasswordResetController;
use App\Http\Controllers\AdminPasswordResetController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ====================================================
// 1. PUBLIC PAGES (Website Frontend)
// ====================================================
Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/team', function () { return view('team'); })->name('team');
Route::get('/academics', function () { return view('academics'); })->name('programmes');
Route::get('/admissions', function () { return view('admissions'); })->name('admissions');
Route::get('/life-at-pcis', function () { return view('life'); })->name('life');
Route::get('/international-families', function () { return view('families'); })->name('families');
Route::get('/contact', function () { return view('contact'); })->name('contact');

// Lead Gen (Header Form)
Route::post('/download-fees', [EnrollmentController::class, 'downloadFees'])->name('download.fees');

// Legacy Apply Route (Kept to prevent errors, but flow is now via Register)
Route::get('/apply', [EnrollmentController::class, 'index'])->name('apply.form');
Route::post('/apply', [EnrollmentController::class, 'store'])->name('apply.submit');


// ====================================================
// 2. AUTHENTICATION (Guest Routes)
// ====================================================

// Applicant / Parent Registration & Login
Route::middleware('guest')->group(function () {
    Route::get('/register', [ApplicantAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [ApplicantAuthController::class, 'register']);
    
    Route::get('/login', [ApplicantAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [ApplicantAuthController::class, 'login']);
});

// ADMIN FORGOT PASSWORD ROUTES
Route::prefix('admin')->group(function () {
    Route::get('forgot-password', [AdminPasswordResetController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('forgot-password', [AdminPasswordResetController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    
    // Note: The email link will point here. 
    // Laravel default email uses route('password.reset'). 
    // For simplicity, we can reuse the generic reset route or override the email.
    // For now, we will create a specific admin reset view:
    Route::get('reset-password/{token}', [AdminPasswordResetController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('reset-password', [AdminPasswordResetController::class, 'reset'])->name('admin.password.update');
});


// Admin Login
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Shared Logout
Route::post('/logout', [ApplicantAuthController::class, 'logout'])->name('logout');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

  // Forgot Password
    Route::get('forgot-password', [ApplicantPasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ApplicantPasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ApplicantPasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ApplicantPasswordResetController::class, 'reset'])->name('password.update');


// ====================================================
// 3. APPLICANT PORTAL (Protected)
// ====================================================
Route::middleware(['auth'])->group(function () {
    
    // Step 1: Policy Acceptance
    Route::get('/applicant/policy', function () {
        return view('applicant.policy');
    })->name('applicant.policy');

    // Step 2: Dashboard (Menu)
    Route::get('/applicant/dashboard', function () {
        return view('applicant.dashboard');
    })->name('applicant.dashboard');

    // Step 3: Application Form (Livewire Wizard)
    Route::get('/applicant/form', EnrollmentWizard::class)->name('applicant.form');
});


// ====================================================
// 4. ADMIN DASHBOARD (Role Protected)
// ====================================================
Route::middleware(['auth'])->group(function () {

    // SHARED
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    // REGISTRAR
    Route::middleware(['role:registrar,admin'])->group(function () {
        Route::get('/admin/applications', [AdminController::class, 'applications'])->name('admin.applications');
        Route::post('/admin/enrollment/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.status');
        Route::delete('/admin/enrollment/{id}', [AdminController::class, 'destroy'])->name('admin.delete');

        Route::get('/admin/enrollment/{id}/pdf', [AdminController::class, 'downloadPdf'])->name('admin.pdf');
    });

    // CASHIER
    Route::middleware(['role:cashier,admin,registrar'])->group(function () {
        Route::get('/admin/payments', [AdminController::class, 'payments'])->name('admin.payments');
        Route::post('/admin/payments', [AdminController::class, 'storePayment'])->name('admin.payments.store');
        Route::post('/admin/payments/{id}/verify', [AdminController::class, 'verifyPayment'])->name('admin.payments.verify');
    });

    // MARKETING
    Route::middleware(['role:marketing,admin,registrar'])->group(function () {
        Route::get('/admin/leads', [AdminController::class, 'leads'])->name('admin.leads');
    });

    // IT ADMIN
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::post('/admin/users', [AdminController::class, 'createUser'])->name('admin.users.create');
        Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    });

});