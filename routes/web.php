
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
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Guest Routes
Route::get('/dashboard/guest', [DashboardController::class, 'guestDashboard'])->name('dashboard.guest');
Route::post('/guest/assessment', [AssessmentRequestController::class, 'store'])->name('guest.submit.assessment');

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/user', [DashboardController::class, 'userDashboard'])->name('dashboard.user');
    
    // Admin Routes
    Route::get('/dashboard/admin', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');
    Route::post('/assessment/{id}/approve', [AssessmentRequestController::class, 'approve'])->name('assessment.approve');
    Route::post('/assessment/{id}/reject', [AssessmentRequestController::class, 'reject'])->name('assessment.reject');
    
    // Project Management Routes
    Route::resource('dashboard/user/projects', ProjectController::class, [
        'as' => 'dashboard.user'
    ]);

    // Project Document Routes
    Route::prefix('dashboard/user/projects/{project}/documents')->name('dashboard.user.project-documents.')->group(function () {
        Route::get('/create', [ProjectDocumentController::class, 'create'])->name('create');
        Route::post('/', [ProjectDocumentController::class, 'store'])->name('store');
        Route::get('/{document}', [ProjectDocumentController::class, 'show'])->name('show');
        Route::delete('/{document}', [ProjectDocumentController::class, 'destroy'])->name('destroy');
    });
    
    // Redirect after login
    Route::get('/home', [HomeController::class, 'index'])->name('home.redirect');
});
