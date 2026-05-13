<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;

// Mengalihkan halaman utama ke login
Route::get('/', function () {
    return redirect('/login');
});

// 1. Rute untuk pengguna yang BELUM LOGIN (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    
    Route::get('/kategori', function () {
        // Ini benar karena kategori.blade.php ada langsung di folder views
        return view('kategori'); 
    })->name('kategori');

    Route::get('/kelola', function () {
        return view('kelola');
    })->name('kelola');

    Route::get('/keranjang', function () {
        $carts = \App\Models\Cart::where('user_id', auth()->id())->get();
        return view('keranjang', ['carts' => $carts]);
    })->name('keranjang');

    Route::get('/pembayaran', function () {
        $path = resource_path('views/qris.jpeg');
        $qrisImage = file_exists($path)
            ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents($path))
            : '';

        return view('pembayaran', ['qrisImage' => $qrisImage]);
    })->name('pembayaran');

    Route::get('/status', function () {
        return view('status');
    })->name('status');
    
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');

    Route::post('/cart/add', [CartsController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/{id}', [CartsController::class, 'removeFromCart'])->name('cart.remove');
    
    // Profile Routes
    Route::get('/profil/edit-profil', [ProfileController::class, 'showEditProfile'])->name('profil.edit');
    Route::post('/profil/update', [ProfileController::class, 'updateProfile'])->name('profil.update');
    Route::get('/profil/ubah-password', [ProfileController::class, 'showChangePassword'])->name('profil.change-password');
    Route::post('/profil/change-password', [ProfileController::class, 'updatePassword'])->name('profil.update-password');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});