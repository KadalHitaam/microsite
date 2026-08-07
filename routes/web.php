<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PublicController; // Import PublicController
use Illuminate\Support\Facades\Route;


// 1. Rute Utama untuk Menampilkan Bio-Link Publik
Route::get('/', [PublicController::class, 'index'])->name('public.index');

// 2. Rute Perantara Pelacak Klik (Intermediary Tracking)
Route::get('/go/{link}', [PublicController::class, 'redirect'])->name('public.redirect');

/*
| 2. RUTE OTENTIKASI (Khusus Guest / Belum Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function (){
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Route Logout (Wajib Memiliki Sesi Terautentikasi)
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Route Group Admin untuk Management Tautan
Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/links', [LinkController::class, 'index'])->name('admin.links.index');

    // Rute Form & Pemrosesan Data
    Route::get('/links/create', [LinkController::class, 'create'])->name('admin.links.create');
    Route::post('/links', [LinkController::class, 'store'])->name('admin.links.store');

   // Rute Edit, Update, dan Destroy (RESTful Standard)
    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('admin.links.edit');
    Route::put('/links/{link}', [LinkController::class, 'update'])->name('admin.links.update');
    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('admin.links.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});