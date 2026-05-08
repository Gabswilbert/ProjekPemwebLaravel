@extends('layouts.app')

@section('content')
<div class="pb-8">
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-2">
            <i class="fas fa-check-circle text-green-500"></i>{{ session('success') }}
        </div>
    @endif

    <h1 class="text-2xl font-extrabold text-gray-800 mb-6">Profil Saya</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left: Profile Card -->
        <div class="lg:col-span-1 space-y-4">
            <!-- Avatar & Name -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center">
                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center text-white text-3xl font-extrabold mx-auto mb-4 shadow-lg">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <h2 class="text-xl font-extrabold text-gray-800">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-gray-500 mt-1">{{ Auth::user()->email }}</p>

                <div class="mt-4 bg-green-50 border border-green-100 rounded-xl p-3 text-left">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-star text-yellow-500 text-sm"></i>
                        <span class="text-sm font-bold text-gray-800">Pahlawan Pangan</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mb-1">
                        <div class="bg-green-600 h-2 rounded-full" style="width: 75%"></div>
                    </div>
                    <p class="text-xs text-gray-500">75% menuju level berikutnya</p>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
                <h3 class="font-bold text-gray-700 text-sm mb-3">Statistik Saya</h3>
                <div class="grid grid-cols-3 gap-3">
                    <div class="text-center bg-green-50 rounded-xl p-3">
                        <div class="text-xl font-extrabold text-green-600">12.4</div>
                        <p class="text-[10px] text-gray-500 mt-0.5">kg Diselamatkan</p>
                    </div>
                    <div class="text-center bg-blue-50 rounded-xl p-3">
                        <div class="text-xl font-extrabold text-blue-600">24</div>
                        <p class="text-[10px] text-gray-500 mt-0.5">Pesanan</p>
                    </div>
                    <div class="text-center bg-purple-50 rounded-xl p-3">
                        <div class="text-xl font-extrabold text-purple-600">75%</div>
                        <p class="text-[10px] text-gray-500 mt-0.5">Progress</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Account Settings -->
        <div class="lg:col-span-2 space-y-4">
            <!-- Account Actions -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-extrabold text-gray-800 mb-5 text-base">Pengaturan Akun</h3>
                <div class="space-y-3">
                    <a href="{{ route('profil.edit') }}"
                       class="flex items-center justify-between p-4 bg-blue-50 hover:bg-blue-100 rounded-xl transition-colors group">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                <i class="fas fa-edit text-blue-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-blue-800 text-sm">Edit Profil</p>
                                <p class="text-xs text-blue-500">Ubah nama dan informasi akun</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-blue-400"></i>
                    </a>

                    <a href="{{ route('profil.change-password') }}"
                       class="flex items-center justify-between p-4 bg-purple-50 hover:bg-purple-100 rounded-xl transition-colors group">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 bg-purple-100 rounded-lg flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                                <i class="fas fa-lock text-purple-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-purple-800 text-sm">Ubah Kata Sandi</p>
                                <p class="text-xs text-purple-500">Perbarui keamanan akun Anda</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-purple-400"></i>
                    </a>

                    <a href="#"
                       class="flex items-center justify-between p-4 bg-orange-50 hover:bg-orange-100 rounded-xl transition-colors group">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 bg-orange-100 rounded-lg flex items-center justify-center group-hover:bg-orange-200 transition-colors">
                                <i class="fas fa-bell text-orange-600 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-orange-800 text-sm">Notifikasi</p>
                                <p class="text-xs text-orange-500">Atur preferensi notifikasi</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-orange-400"></i>
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center justify-between p-4 bg-red-50 hover:bg-red-100 rounded-xl transition-colors group text-left">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-red-100 rounded-lg flex items-center justify-center group-hover:bg-red-200 transition-colors">
                                    <i class="fas fa-sign-out-alt text-red-600 text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-red-800 text-sm">Keluar</p>
                                    <p class="text-xs text-red-400">Logout dari akun ini</p>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-red-400"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- About FoodSave -->
            <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-2xl border border-green-100 p-6">
                <div class="flex items-start gap-3">
                    <div class="w-9 h-9 bg-green-200 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-info-circle text-green-700"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-green-900 mb-2 text-sm">Tentang FoodSave</h3>
                        <p class="text-sm text-green-800 leading-relaxed">FoodSave Indonesia adalah platform untuk menyelamatkan makanan berkualitas dari limbah. Setiap pembelian Anda membantu mengurangi emisi karbon dan mendukung keberlanjutan lingkungan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
