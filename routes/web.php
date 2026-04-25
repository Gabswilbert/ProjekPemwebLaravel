<?php

use Illuminate\Support\Facades\Route;
// 1. Pastikan baris ini ada untuk memanggil AuthController
use App\Http\Controllers\AuthController;

// Mengubah rute '/' agar langsung membuka halaman login
Route::get('/', function () {
    return redirect('/login');
});

// 2. Rute untuk pengguna yang BELUM LOGIN (Guest)
// Menggunakan middleware 'guest' agar orang yang sudah login tidak bisa masuk ke sini lagi
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// 3. Rute untuk pengguna yang SUDAH LOGIN (Auth)
// Menggunakan middleware 'auth' untuk melindungi halaman agar tidak bisa dibuka sembarangan
Route::middleware('auth')->group(function () {
    Route::get('/kategori', function () {
        return "Selamat datang di Halaman Kategori, " . auth()->user()->name;
    })->name('kategori');

    // Rute untuk keluar dari sistem
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});