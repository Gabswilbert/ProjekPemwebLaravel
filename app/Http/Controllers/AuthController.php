<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    // Proses Registrasi Manual (Syarat BAB 3: Validasi Nama, Email Unik, Password Min 8)
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password wajib dienkripsi (Hashing)
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    // Proses Login Manual (Syarat BAB 3: Facade Auth & Regenerate Session)
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate(); // Regenerasi session untuk keamanan
            return redirect()->intended('kategori');
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah.'])->onlyInput('email');
    }

    // Proses Logout (Syarat BAB 3: Invalidate Session)
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate(); // Menghapus session
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}