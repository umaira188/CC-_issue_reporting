<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;

// ---------------------------
// Public Routes (Guest)
// ---------------------------
Route::get('/', fn() => view('welcome'))->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('/login', fn() => view('auth.login'))->name('login');
    Route::get('/register', fn() => view('auth.register'))->name('register');
});
Route::get('/track-complaint', [\App\Http\Controllers\ComplaintController::class, 'trackForm'])->name('complaint.track.form');
Route::post('/track-complaint', [\App\Http\Controllers\ComplaintController::class, 'track'])->name('complaint.track');


// ---------------------------
// Authenticated Routes
// ---------------------------
Route::middleware(['auth'])->group(function () {

    // 📝 Complaint Routes
    Route::get('/lodge-complaint', fn() => view('lodge-complaint'))->name('lodge-complaint');
    Route::post('/submit-complaint', [ComplaintController::class, 'store'])->name('submit-complaint');
    Route::get('/complaint-history', [ComplaintController::class, 'history'])->name('complaint.history');

    // 💬 Feedback Routes
    Route::get('/feedback', fn() => view('feedback'))->name('feedback');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.submit');

    // 🧑‍💼 Department Admin Dashboards
    Route::get('/admin/env-police', [ComplaintController::class, 'envPoliceDashboard'])->name('admin.env');
    Route::get('/admin/municipal', [ComplaintController::class, 'municipalDashboard'])->name('admin.municipal');
    Route::get('/admin/division-office', [ComplaintController::class, 'divisionOfficeDashboard'])->name('admin.division');
    


    // 👑 Super Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/manage', [AdminManagementController::class, 'index'])->name('manage');
        Route::post('/create', [AdminManagementController::class, 'store'])->name('create');
        Route::get('/{id}/edit', [AdminManagementController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminManagementController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminManagementController::class, 'destroy'])->name('delete');

        // View all complaints & feedbacks
        Route::get('/all-complaints', [AdminController::class, 'allComplaints'])->name('all-complaints');
        Route::get('/all-feedbacks', [AdminController::class, 'allFeedbacks'])->name('all-feedbacks');
    });

    // 👤 Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/admin/complaints/{id}/update-status', [\App\Http\Controllers\ComplaintController::class, 'updateStatus'])->name('admin.update-status');
    Route::get('/admin/complaints/{id}', [ComplaintController::class, 'show'])->name('admin.complaints.show');


});

// ---------------------------
// Breeze Default Dashboard
// ---------------------------
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



// ---------------------------
// Laravel Breeze Auth Routes
// ---------------------------
require __DIR__.'/auth.php';
