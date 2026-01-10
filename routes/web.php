<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Home Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2. Academics Page (I CHANGED THIS NAME TO MATCH YOUR ERROR)
Route::get('/academics', function () {
    return view('academics');
})->name('programmes'); 

// 3. Admissions Page
Route::get('/admissions', function () {
    return view('admissions');
})->name('admissions');

// 4. About Us Page
Route::get('/about', function () {
    return view('about');
})->name('about');

// 5. Academic Team Page
Route::get('/team', function () {
    return view('team');
})->name('team');

// 6. Life at PCIS Page
Route::get('/life-at-pcis', function () {
    return view('life');
})->name('life');

// 7. International Families Page
Route::get('/international-families', function () {
    return view('families');
})->name('families');

// 8. Contact Page
Route::get('/contact', function () {
    return view('contact'); 
})->name('contact');

// 9. Enrollment Form
Route::get('/apply', [EnrollmentController::class, 'index'])->name('apply.form');
Route::post('/apply', [EnrollmentController::class, 'store'])->name('apply.submit');

// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Delete Route (for cleaning up test data)
Route::delete('/admin/enrollment/{id}', [AdminController::class, 'destroy'])->name('admin.delete');