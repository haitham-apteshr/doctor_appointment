<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Public Routes for Clients
Route::get('/', [ClientController::class, 'index'])->name('home');
Route::get('/appointment/create', [ClientController::class, 'create'])->name('appointment.create');
Route::post('/appointment/store', [ClientController::class, 'store'])->name('appointment.store');
Route::get('/appointment/success', function () {
    return view('success');
})->name('appointment.success');

// Admin Routes (Requires Authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/appointments', [AdminController::class, 'index'])->name('appointments.index');
    Route::delete('/admin/appointments/{id}', [AdminController::class, 'destroy'])->name('appointments.destroy');
    Route::get('/appointments/{id}/edit', [AdminController::class, 'edit'])->name('appointments.edit');
    Route::put('/appointments/{id}', [AdminController::class, 'update'])->name('appointments.update');
    
    Route::match(['get', 'post'], '/admin/add-admin', [AdminController::class, 'addAdmin'])->name('admin.addAdmin');


});

// Breeze Authentication Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include Authentication Routes
require __DIR__ . '/auth.php';
