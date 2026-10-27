<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

/**
 * ==========================================
 * AUTHENTICATION ROUTES (Google OAuth)
 * ==========================================
 */
Route::prefix('auth')->group(function () {
    Route::get('/google', [GoogleController::class, 'redirect'])->name('google.redirect');
    Route::get('/google/callback', [GoogleController::class, 'callback'])->name('google.callback');
});

/**
 * ==========================================
 * LOGOUT ROUTE (Public)
 * ==========================================
 */
Route::post('/logout', [GoogleController::class, 'logout'])->middleware('auth')->name('logout');

/**
 * ==========================================
 * USER DASHBOARD (Protected - pencari_kerja only)
 * ==========================================
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/**
 * ==========================================
 * ADMIN DASHBOARD (Protected - admin only)
 * ==========================================
 */
Route::middleware(['auth', 'role:admin,super_admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

/**
 * ==========================================
 * TEMPORARY: TEST ROUTES (REMOVE LATER)
 * ==========================================
 */
Route::get('/test-login', function () {
    // Test route untuk verify auth
    if (auth()->check()) {
        $user = auth()->user();
        return "✅ Logged in as: {$user->name} | Role: {$user->role}";
    }
    return "❌ Not logged in";
})->name('test.login');