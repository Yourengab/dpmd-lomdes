
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\AdminDocumentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ScoringTemplateController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VideoSubmissionController;

Route::get('/', function () {
    $villageDocuments = \App\Models\AdminDocument::where('category', 'village')->latest()->take(5)->get();
    $districtDocuments = \App\Models\AdminDocument::where('category', 'district')->latest()->take(5)->get();
    $schedules = \App\Models\Schedule::all();
    $videoSubmissions = \App\Models\VideoSubmission::all();

    return view('welcome', compact('villageDocuments', 'districtDocuments', 'schedules', 'videoSubmissions'));
});

// Public Routes for Users
Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/video-submissions', [VideoSubmissionController::class, 'index'])->name('video-submissions.index');

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

        // Scoring Templates CRUD routes
        Route::resource('scoring-templates', ScoringTemplateController::class, ['as' => 'admin']);

        // Participants CRUD routes
        Route::resource('participants', ParticipantController::class, ['as' => 'admin']);

        // Schedules CRUD routes
        Route::resource('schedules', ScheduleController::class, ['as' => 'admin']);

        // Video Submissions CRUD routes
        Route::resource('video-submissions', VideoSubmissionController::class, ['as' => 'admin']);
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

        // Scoring templates page
        Route::get('/scoring', [JudgeController::class, 'scoring'])->name('judge.scoring');

        // Scoring form routes
        Route::get('/scoring/administrasi/{id}/desa', [JudgeController::class, 'administrasiDesaForm'])->name('judge.scoring.administrasiDesa');
        Route::get('/scoring/administrasi/{id}/kelurahan', [JudgeController::class, 'administrasiKelurahanForm'])->name('judge.scoring.administrasiKelurahan');
        Route::get('/scoring/pemaparan/{id}/questions', [JudgeController::class, 'pemaparanQuestions'])->name('judge.scoring.pemaparan.questions');
        Route::get('/scoring/pemaparan/{id}/village', [JudgeController::class, 'pemaparanVillage'])->name('judge.scoring.pemaparan.village');
        Route::get('/scoring/pemaparan/{id}/district', [JudgeController::class, 'pemaparanDistrict'])->name('judge.scoring.pemaparan.district');
        Route::get('/scoring/klarifikasi/{id}', [JudgeController::class, 'klarifikasiForm'])->name('judge.scoring.klarifikasi');
        Route::get('/scoring/inovasi/{id}', [JudgeController::class, 'inovasiForm'])->name('judge.scoring.inovasi');

        // Participant Spreadsheet route
        Route::get('/participant-spreadsheet', [ParticipantController::class, 'latest'])->name('judge.participant.spreadsheet');

        Route::get('/judge/scoring/administrasi/{id}', [JudgeController::class, 'administrasi'])->name('judge.scoring.administrasi');
    });
});
