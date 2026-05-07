@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex flex-col justify-center px-6 py-12 bg-white">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <!-- Logo & Brand -->
        <div class="flex items-center gap-2 mb-8">
            <div class="bg-green-700 p-2 rounded-lg">
                <i class="fas fa-leaf text-white text-xl"></i>
            </div>
            <h1 class="text-xl font-black text-green-900">FoodSave Indonesia</h1>
        </div>

        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Selamat Datang Kembali.</h2>
        <p class="mt-2 text-sm text-gray-500">Masuk ke akun Anda untuk mulai berhemat.</p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
        @if (session('success'))
            <div class="mb-6 rounded-2xl bg-green-50 border border-green-200 p-4 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-2xl bg-red-50 border border-red-200 p-4 text-sm text-red-700">
                <strong class="font-semibold">Login gagal:</strong>
                <ul class="mt-3 space-y-1 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Alamat Email</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 px-4">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Kata Sandi</label>
                    <div class="text-sm">
                        <a href="#" class="font-semibold text-green-600 hover:text-green-500">Lupa sandi?</a>
                    </div>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" required class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 px-4">
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-xl bg-green-700 px-3 py-3.5 text-sm font-bold leading-6 text-white shadow-lg hover:bg-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 transition-all active:scale-95">
                    Masuk Sekarang <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Belum punya akun?
            <a href="/register" class="font-bold leading-6 text-green-700 hover:text-green-600">Daftar di sini</a>
        </p>
    </div>
</div>
@endsection