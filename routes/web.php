<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetoranController; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// =========================================================================
// GRUP RUTE KHUSUS YANG SUDAH LOGIN (AUTH) & TERVERIFIKASI
// =========================================================================
Route::middleware(['auth', 'verified'])->group(function () {
    
    // 1. Dashboard Utama Warga (Melihat Angka Statistik / Ringkasan)
    Route::get('/masyarakat/dashboard', [SetoranController::class, 'dashboardMasyarakat'])->name('masyarakat.dashboard');
    
    // 2. Halaman Riwayat Halaman Terpisah (Melihat Tabel Log Riwayat)
    Route::get('/masyarakat/riwayat', [SetoranController::class, 'riwayatMasyarakat'])->name('masyarakat.riwayat');
    
    // 3. Fitur CRUD Setoran Minyak Jelantah
    Route::get('/masyarakat/setoran/baru', [SetoranController::class, 'createMasyarakat'])->name('masyarakat.setoran.create');
    Route::post('/masyarakat/setoran', [SetoranController::class, 'storeMasyarakat'])->name('masyarakat.setoran.store');
    Route::get('/masyarakat/setoran/{id}/edit', [SetoranController::class, 'editMasyarakat'])->name('masyarakat.setoran.edit');
    Route::put('/masyarakat/setoran/{id}', [SetoranController::class, 'updateMasyarakat'])->name('masyarakat.setoran.update');
    Route::delete('/masyarakat/setoran/{id}', [SetoranController::class, 'destroyMasyarakat'])->name('masyarakat.setoran.destroy');

    // Dashboard Pengepul
    Route::get('/pengepul/dashboard', function () {
        if (Auth::user()->role !== 'pengepul') {
            return redirect('/' . Auth::user()->role . '/dashboard');
        }
        return view('dashboard.pengepul'); 
    })->name('pengepul.dashboard');

    // Dashboard Stakeholder
    Route::get('/stakeholder/dashboard', function () {
        if (Auth::user()->role !== 'stakeholder') {
            return redirect('/' . Auth::user()->role . '/dashboard');
        }
        return view('dashboard.stakeholder'); 
    })->name('stakeholder.dashboard');
});

// =========================================================================
// GRUP RUTE BAWAAN UNTUK PENGELOLAAN PROFIL USER
// =========================================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';