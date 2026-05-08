@extends('layouts.app')

@section('content')
<div class="pb-8">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('profil') }}" class="w-9 h-9 bg-white border border-gray-200 rounded-xl flex items-center justify-center text-gray-600 hover:text-green-600 hover:border-green-300 transition-all shadow-sm">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>
        <h1 class="text-2xl font-extrabold text-gray-800">Ubah Kata Sandi</h1>
    </div>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
                    <strong class="font-semibold flex items-center gap-2 mb-2"><i class="fas fa-exclamation-circle"></i>Terjadi Kesalahan:</strong>
                    <ul class="mt-2 space-y-1 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profil.update-password') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="current_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kata Sandi Saat Ini</label>
                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm transition-all @error('current_password') border-red-400 @enderror"
                        placeholder="Masukkan kata sandi saat ini"
                    >
                    @error('current_password')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="new_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kata Sandi Baru</label>
                        <input
                            type="password"
                            id="new_password"
                            name="new_password"
                            required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm transition-all @error('new_password') border-red-400 @enderror"
                            placeholder="Min. 8 karakter"
                        >
                        @error('new_password')
                            <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Konfirmasi Sandi Baru</label>
                        <input
                            type="password"
                            id="new_password_confirmation"
                            name="new_password_confirmation"
                            required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm transition-all"
                            placeholder="Ulangi kata sandi baru"
                        >
                    </div>
                </div>

                <div class="flex gap-3 pt-2">
                    <a href="{{ route('profil') }}"
                       class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition-colors text-sm">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-xl transition-colors flex items-center justify-center gap-2 text-sm">
                        <i class="fas fa-lock"></i>
                        Ubah Kata Sandi
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-4 bg-yellow-50 border border-yellow-100 rounded-2xl p-4">
            <p class="text-sm text-yellow-800 flex items-start gap-2">
                <i class="fas fa-shield-alt text-yellow-500 mt-0.5 flex-shrink-0"></i>
                <span><strong>Keamanan:</strong> Pastikan kata sandi baru Anda kuat dan unik. Gunakan kombinasi huruf, angka, dan simbol untuk keamanan maksimal.</span>
            </p>
        </div>
    </div>
</div>
@endsection
