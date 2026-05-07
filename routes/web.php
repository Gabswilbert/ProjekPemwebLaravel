<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

    Route::get('/status', function () {
        return view('status');
    })->name('status');
    
    Route::get('/history', function () {
        return view('history');
    })->name('history');
    
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');

    Route::post('/cart/add', ['App\\Http\\Controllers\\CartsController', 'addToCart'])->name('cart.add');
    Route::delete('/cart/{id}', ['App\\Http\\Controllers\\CartsController', 'removeFromCart'])->name('cart.remove');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});