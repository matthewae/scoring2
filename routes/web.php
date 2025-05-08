
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssessmentRequestController;
use App\Http\Controllers\Dashboard\User\ProjectController;
use App\Http\Controllers\Dashboard\User\ProjectDocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// All authenticated routes
Route::middleware(['auth'])->group(function () {
    // Guest Dashboard Routes
    Route::prefix('dashboard/guest')->name('dashboard.guest.')->group(function () {
        Route::get('/', [DashboardController::class, 'guestDashboard'])->name('index');
        Route::get('/guide', [DashboardController::class, 'guide'])->name('guide');
        
        // Guest Project Scores
        Route::prefix('project-scores')->name('project-scores.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Dashboard\Guest\ProjectScoreController::class, 'index'])->name('index');
            Route::get('/{projectScore}', [\App\Http\Controllers\Dashboard\Guest\ProjectScoreController::class, 'show'])->name('show');
        });
        
        // Guest Project Documents
        Route::prefix('project-documents')->name('project-documents.')->group(function () {
            Route::get('/create', [\App\Http\Controllers\Dashboard\Guest\ProjectDocumentController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Dashboard\Guest\ProjectDocumentController::class, 'store'])->name('store');
            Route::get('/history', [\App\Http\Controllers\Guest\GuestProjectDocumentController::class, 'history'])->name('history');
            Route::get('/{projectDocument}', [\App\Http\Controllers\Guest\GuestProjectDocumentController::class, 'show'])->name('show');
        });
    });

    // User Dashboard Routes
    Route::prefix('dashboard/user')->name('dashboard.user.')->group(function () {
        Route::get('/', [DashboardController::class, 'userDashboard'])->name('index');
        Route::get('/guide', [DashboardController::class, 'guide'])->name('guide');

        // Assessment Requests
        Route::prefix('assessment-requests')->name('assessment-requests.')->group(function () {
            Route::get('/', [AssessmentRequestController::class, 'index'])->name('index');
            Route::get('/{assessmentRequest}', [AssessmentRequestController::class, 'show'])->name('show');
        });
        
        // User Documents
        Route::get('/documents/upload', [\App\Http\Controllers\Dashboard\User\UserDocumentController::class, 'create'])->name('documents.upload');
        Route::post('/documents', [\App\Http\Controllers\Dashboard\User\UserDocumentController::class, 'store'])->name('documents.store');
        
        // Projects Management
        Route::resource('projects', ProjectController::class);
        
        // Project Documents
        Route::prefix('projects/{project}/documents')->name('project-documents.')->group(function () {
            Route::get('/create', [ProjectDocumentController::class, 'create'])->name('create');
            Route::post('/', [ProjectDocumentController::class, 'store'])->name('store');
            Route::get('/{document}', [ProjectDocumentController::class, 'show'])->name('show');
            Route::delete('/{document}', [ProjectDocumentController::class, 'destroy'])->name('destroy');
        });
    });

    // Admin Routes
    Route::prefix('dashboard/admin')->name('dashboard.admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'adminDashboard'])->name('index');
        Route::post('/assessment/{id}/approve', [AssessmentRequestController::class, 'approve'])->name('assessment.approve');
        Route::post('/assessment/{id}/reject', [AssessmentRequestController::class, 'reject'])->name('assessment.reject');
    });
});

// Guest Assessment Route
Route::post('/guest/assessment', [AssessmentRequestController::class, 'store'])->name('guest.submit.assessment');
    
    // Redirect after login
    Route::get('/home', [HomeController::class, 'index'])->name('home.redirect');
;
