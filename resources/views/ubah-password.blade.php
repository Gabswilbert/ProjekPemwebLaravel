@extends('layouts.app')

@section('content')
<div class="pt-4 pb-8">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('profil') }}" class="text-green-600 hover:text-green-700">
            <i class="fas fa-arrow-left text-lg"></i>
        </a>
        <h1 class="text-3xl font-bold text-gray-800">Ubah Kata Sandi</h1>
    </div>

    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <strong>Terjadi Kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profil.update-password') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="current_password" class="block text-sm font-bold text-gray-700 mb-2">
                        Kata Sandi Saat Ini
                    </label>
                    <input 
                        type="password" 
                        id="current_password" 
                        name="current_password" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500 @error('current_password') border-red-500 @enderror"
                        placeholder="Masukkan kata sandi saat ini"
                    >
                    @error('current_password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="new_password" class="block text-sm font-bold text-gray-700 mb-2">
                        Kata Sandi Baru (Minimum 8 karakter)
                    </label>
                    <input 
                        type="password" 
                        id="new_password" 
                        name="new_password" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500 @error('new_password') border-red-500 @enderror"
                        placeholder="Masukkan kata sandi baru"
                    >
                    @error('new_password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="new_password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">
                        Konfirmasi Kata Sandi Baru
                    </label>
                    <input 
                        type="password" 
                        id="new_password_confirmation" 
                        name="new_password_confirmation" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500"
                        placeholder="Konfirmasi kata sandi baru"
                    >
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('profil') }}" class="flex-1 bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition-colors text-center">
                        Batal
                    </a>
                    <button 
                        type="submit" 
                        class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors"
                    >
                        <i class="fas fa-lock mr-2"></i>Ubah Kata Sandi
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <p class="text-sm text-yellow-800">
                <strong>⚠️ Keamanan:</strong> Pastikan kata sandi baru Anda kuat dan unik. Gunakan kombinasi huruf, angka, dan simbol untuk keamanan maksimal.
            </p>
        </div>
    </div>
</div>
@endsection
