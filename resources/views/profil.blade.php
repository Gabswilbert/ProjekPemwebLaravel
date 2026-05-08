@extends('layouts.app')

@section('content')
<div class="pt-4 pb-8">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold text-gray-800 mb-6">Profil Saya</h1>

    <div class="max-w-2xl">
        <!-- Profile Card -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-200">
                <div class="w-20 h-20 rounded-full bg-green-600 flex items-center justify-center text-white text-3xl">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <!-- User Stats -->
            <div class="grid grid-cols-3 gap-4 mb-6 pb-6 border-b border-gray-200">
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-600">12.4</div>
                    <p class="text-sm text-gray-600">kg Diselamatkan</p>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-600">24</div>
                    <p class="text-sm text-gray-600">Pesanan</p>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-600">75%</div>
                    <p class="text-sm text-gray-600">Progress Level</p>
                </div>
            </div>

            <!-- Level Badge -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <h3 class="font-bold text-gray-800 mb-2 flex items-center gap-2">
                    <i class="fas fa-star text-yellow-500"></i>Level Saat Ini: Pahlawan Pangan
                </h3>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-600 h-2 rounded-full" style="width: 75%"></div>
                </div>
                <p class="text-sm text-gray-600 mt-2">Kamu 25% lagi untuk mencapai level berikutnya</p>
            </div>

            <!-- Account Actions -->
            <div class="space-y-2">
                <a href="{{ route('profil.edit') }}" class="block w-full bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-3 px-4 rounded transition-colors">
                    <i class="fas fa-edit mr-2"></i>Edit Profil
                </a>
                <a href="{{ route('profil.change-password') }}" class="block w-full bg-purple-50 hover:bg-purple-100 text-purple-700 font-semibold py-3 px-4 rounded transition-colors">
                    <i class="fas fa-lock mr-2"></i>Ubah Kata Sandi
                </a>
                <a href="#" class="block w-full bg-orange-50 hover:bg-orange-100 text-orange-700 font-semibold py-3 px-4 rounded transition-colors">
                    <i class="fas fa-bell mr-2"></i>Notifikasi
                </a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full bg-red-50 hover:bg-red-100 text-red-700 font-semibold py-3 px-4 rounded transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                    </button>
                </form>
            </div>
        </div>

        <!-- Info Box -->
        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
            <h3 class="font-bold text-green-900 mb-2"><i class="fas fa-info-circle mr-2"></i>Tentang FoodSave</h3>
            <p class="text-sm text-green-800">FoodSave Indonesia adalah platform untuk menyelamatkan makanan berkualitas dari limbah. Setiap pembelian Anda membantu mengurangi emisi karbon dan mendukung keberlanjutan lingkungan.</p>
        </div>
    </div>
</div>
@endsection
