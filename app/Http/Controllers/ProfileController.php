<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Menampilkan halaman edit profil
    public function showEditProfile()
    {
        $user = Auth::user();
        return view('edit-profil', ['user' => $user]);
    }

    // Update profil (username)
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui!');
    }

    // Menampilkan halaman ubah password
    public function showChangePassword()
    {
        return view('ubah-password');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Cek password lama
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.'])->onlyInput('current_password');
        }

        // Update password baru
        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return redirect()->route('profil')->with('success', 'Password berhasil diubah!');
    }
}
