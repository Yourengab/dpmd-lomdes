<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\AdminDocumentController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    $villageDocuments = \App\Models\AdminDocument::where('category', 'village')->latest()->take(5)->get();
    $districtDocuments = \App\Models\AdminDocument::where('category', 'district')->latest()->take(5)->get();
    
    return view('welcome', compact('villageDocuments', 'districtDocuments'));
});

// Registration Routes
Route::get('/register', [RegistrationController::class, 'index'])->name('register.index');
Route::get('/register/village', [RegistrationController::class, 'village'])->name('register.village');
Route::get('/register/district', [RegistrationController::class, 'district'])->name('register.district');
Route::get('/register/form/{id}', [RegistrationController::class, 'showForm'])->name('register.form');

// Admin Routes
Route::prefix('admin')->group(function () {
    // Public admin routes (login)
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    
    // Protected admin routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        
        // Judges CRUD routes
        Route::resource('judges', JudgeController::class, ['as' => 'admin']);
        
        // Documents CRUD routes
        Route::resource('documents', AdminDocumentController::class, ['as' => 'admin']);
    });
});

// Judge Routes
Route::prefix('judge')->group(function () {
    // Public judge routes (login)
    Route::get('/login', [JudgeController::class, 'showLoginForm'])->name('judge.login');
    Route::post('/login', [JudgeController::class, 'login'])->name('judge.login.post');
    
    // Protected judge routes
    Route::middleware('judge.auth')->group(function () {
        Route::get('/dashboard', [JudgeController::class, 'dashboard'])->name('judge.dashboard');
        Route::post('/logout', [JudgeController::class, 'logout'])->name('judge.logout');
    });
});
