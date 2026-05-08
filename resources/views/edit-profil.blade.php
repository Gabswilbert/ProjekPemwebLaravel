@extends('layouts.app')

@section('content')
<div class="pb-8">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('profil') }}" class="w-9 h-9 bg-white border border-gray-200 rounded-xl flex items-center justify-center text-gray-600 hover:text-green-600 hover:border-green-300 transition-all shadow-sm">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>
        <h1 class="text-2xl font-extrabold text-gray-800">Edit Profil</h1>
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

            <form action="{{ route('profil.update') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm transition-all @error('name') border-red-400 @enderror"
                    >
                    @error('name')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Email <span class="text-gray-400 font-normal normal-case tracking-normal">(Tidak dapat diubah)</span></label>
                    <input
                        type="email"
                        id="email"
                        value="{{ $user->email }}"
                        disabled
                        class="w-full px-4 py-3 border border-gray-100 rounded-xl bg-gray-50 text-gray-400 text-sm cursor-not-allowed"
                    >
                </div>

                <div class="flex gap-3 pt-2">
                    <a href="{{ route('profil') }}"
                       class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition-colors text-sm">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-xl transition-colors flex items-center justify-center gap-2 text-sm">
                        <i class="fas fa-save"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-4 bg-blue-50 border border-blue-100 rounded-2xl p-4">
            <p class="text-sm text-blue-800 flex items-start gap-2">
                <i class="fas fa-info-circle text-blue-500 mt-0.5 flex-shrink-0"></i>
                <span><strong>Catatan:</strong> Nama Anda akan diubah di seluruh aplikasi FoodSave. Email tidak dapat diubah untuk menjaga keamanan akun.</span>
            </p>
        </div>
    </div>
</div>
@endsection
