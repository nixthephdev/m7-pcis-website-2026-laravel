<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- PUBLIC PAGES ---
Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/team', function () { return view('team'); })->name('team');
Route::get('/academics', function () { return view('academics'); })->name('programmes');
Route::get('/admissions', function () { return view('admissions'); })->name('admissions');
Route::get('/life-at-pcis', function () { return view('life'); })->name('life');
Route::get('/international-families', function () { return view('families'); })->name('families');
Route::get('/contact', function () { return view('contact'); })->name('contact');
// Download Fees Route (Global Header)
Route::post('/download-fees', [EnrollmentController::class, 'downloadFees'])->name('download.fees');

// --- ENROLLMENT FORM ---
Route::get('/apply', [EnrollmentController::class, 'index'])->name('apply.form');
Route::post('/apply', [EnrollmentController::class, 'store'])->name('apply.submit');

// --- ADMIN AUTHENTICATION ---
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// *** THIS WAS MISSING ***
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout'); 

// --- PROTECTED ADMIN DASHBOARD ---
Route::middleware(['auth'])->group(function () {
    
    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Delete Student
    Route::delete('/admin/enrollment/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
    
    // Update Status (Approve/Reject)
    Route::post('/admin/enrollment/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.status');

    // Add this inside the admin middleware group
    Route::get('/admin/applications', [AdminController::class, 'applications'])->name('admin.applications');

    // Profile Routes
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});