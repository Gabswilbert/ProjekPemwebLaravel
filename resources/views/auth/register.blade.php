@extends('layouts.auth')

@section('content')
<div class="min-h-screen bg-white flex flex-col items-center justify-center px-6 py-12">
    <div class="w-full max-w-md">
        <!-- Bagian Visual di Atas Tengah -->
        <div class="text-center mb-10">
            <div class="text-6xl mb-4 animate-bounce">🥗</div>
            <h2 class="text-3xl font-black text-green-900 leading-tight">
                Jadi Bagian dari <span class="text-green-600">Perubahan.</span>
            </h2>
            <p class="mt-3 text-sm text-green-700 font-medium px-6">
                Gabung bersama ribuan orang menyelamatkan bumi dari food waste.
            </p>
        </div>

        <!-- Card Form -->
        <div class="bg-white rounded-3xl border border-gray-100 shadow-2xl shadow-green-100/50 p-8">
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-900">Buat Akun Baru</h3>
                <p class="text-xs text-gray-500 mt-1">Mulai selamatkan makanan surplus hari ini.</p>
            </div>

            <form action="#" method="POST" class="space-y-5">
                <div>
                    <label for="name" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
                    <input id="name" name="name" type="text" required 
                        class="mt-1 block w-full rounded-2xl border-0 py-3.5 bg-gray-50 shadow-sm ring-1 ring-gray-100 focus:ring-2 focus:ring-green-600 px-4 text-sm transition-all">
                </div>

                <div>
                    <label for="email" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Email</label>
                    <input id="email" name="email" type="email" required 
                        class="mt-1 block w-full rounded-2xl border-0 py-3.5 bg-gray-50 shadow-sm ring-1 ring-gray-100 focus:ring-2 focus:ring-green-600 px-4 text-sm transition-all">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Kata Sandi</label>
                        <input id="password" name="password" type="password" required 
                            class="mt-1 block w-full rounded-2xl border-0 py-3.5 bg-gray-50 shadow-sm ring-1 ring-gray-100 focus:ring-2 focus:ring-green-600 px-4 text-sm transition-all">
                    </div>
                    <div>
                        <label for="confirm" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Konfirmasi</label>
                        <input id="confirm" name="confirm" type="password" required 
                            class="mt-1 block w-full rounded-2xl border-0 py-3.5 bg-gray-50 shadow-sm ring-1 ring-gray-100 focus:ring-2 focus:ring-green-600 px-4 text-sm transition-all">
                    </div>
                </div>

                <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-bold py-4 rounded-2xl shadow-lg shadow-green-200 transition-all active:scale-[0.98] mt-4">
                    Daftar Sekarang
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-500">
                Sudah punya akun? <a href="/login" class="font-bold text-green-700 hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection