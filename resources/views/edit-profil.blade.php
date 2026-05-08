@extends('layouts.app')

@section('content')
<div class="pt-4 pb-8">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('profil') }}" class="text-green-600 hover:text-green-700">
            <i class="fas fa-arrow-left text-lg"></i>
        </a>
        <h1 class="text-3xl font-bold text-gray-800">Edit Profil</h1>
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

            <form action="{{ route('profil.update') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2">
                        Nama Lengkap
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $user->name) }}" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500 @error('name') border-red-500 @enderror"
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                        Email (Tidak dapat diubah)
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        value="{{ $user->email }}" 
                        disabled
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600"
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
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <p class="text-sm text-blue-800">
                <strong>💡 Catatan:</strong> Nama Anda akan diubah di seluruh aplikasi FoodSave. Email tidak dapat diubah untuk menjaga keamanan akun.
            </p>
        </div>
    </div>
</div>
@endsection
