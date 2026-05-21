@extends('layouts.auth')

@section('content')
<div class="min-h-screen bg-white dark:bg-slate-950 dark:text-slate-100 flex flex-col items-center justify-center px-6 py-12">
    <div class="w-full max-w-md">
        <!-- Bagian Visual di Atas Tengah -->
        <div class="text-center mb-10">
            <div class="text-6xl mb-4 animate-bounce">🥗</div>
                <h2 class="text-3xl font-black text-green-900 dark:text-slate-100 leading-tight">
                    Jadi Bagian dari <span class="text-green-600 dark:text-green-300">Perubahan.</span>
                </h2>
                <p class="mt-3 text-sm text-green-700 dark:text-green-200 font-medium px-6">
        </div>

        <!-- Card Form -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl border border-gray-100 dark:border-slate-700 shadow-2xl shadow-green-100/50 p-8">
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-slate-100">Buat Akun Baru</h3>
                <p class="text-xs text-gray-500 dark:text-slate-400 mt-1">Mulai selamatkan makanan surplus hari ini.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 rounded-2xl bg-red-50 dark:bg-slate-800 border border-red-200 dark:border-slate-700 p-4 text-sm text-red-700 dark:text-red-200">
                    <strong class="font-semibold">Terjadi kesalahan:</strong>
                    <ul class="mt-3 space-y-1 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-[10px] font-bold text-gray-400 dark:text-slate-200 uppercase tracking-widest ml-1">Nama Lengkap</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required 
                        class="mt-1 block w-full rounded-2xl border-0 py-3.5 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-slate-100 shadow-sm ring-1 ring-gray-100 dark:ring-slate-700 focus:ring-2 focus:ring-green-600 px-4 text-sm transition-all">
                </div>

                <div>
                    <label for="email" class="block text-[10px] font-bold text-gray-400 dark:text-slate-200 uppercase tracking-widest ml-1">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required 
                        class="mt-1 block w-full rounded-2xl border-0 py-3.5 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-slate-100 shadow-sm ring-1 ring-gray-100 dark:ring-slate-700 focus:ring-2 focus:ring-green-600 px-4 text-sm transition-all">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-[10px] font-bold text-gray-400 dark:text-slate-200 uppercase tracking-widest ml-1">Kata Sandi</label>
                        <input id="password" name="password" type="password" required 
                            class="mt-1 block w-full rounded-2xl border-0 py-3.5 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-slate-100 shadow-sm ring-1 ring-gray-100 dark:ring-slate-700 focus:ring-2 focus:ring-green-600 px-4 text-sm transition-all">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-[10px] font-bold text-gray-400 dark:text-slate-200 uppercase tracking-widest ml-1">Konfirmasi</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                            class="mt-1 block w-full rounded-2xl border-0 py-3.5 bg-gray-50 dark:bg-slate-900 text-gray-900 dark:text-slate-100 shadow-sm ring-1 ring-gray-100 dark:ring-slate-700 focus:ring-2 focus:ring-green-600 px-4 text-sm transition-all">
                    </div>
                </div>

                <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-bold py-4 rounded-2xl shadow-lg shadow-green-200 transition-all active:scale-[0.98] mt-4">
                    Daftar Sekarang
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-500 dark:text-slate-400">
                Sudah punya akun? <a href="/login" class="font-bold text-green-700 dark:text-green-300 hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection