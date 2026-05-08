@extends('layouts.app')

@section('content')
<div class="pb-8">
    <h1 class="text-2xl font-extrabold text-gray-800 mb-6">Riwayat Pesanan</h1>

    <!-- Stats Section -->
    <div class="grid grid-cols-3 gap-4 mb-8">
        <div class="bg-white border border-green-100 rounded-2xl p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fas fa-shopping-bag text-green-600 text-lg"></i>
            </div>
            <div>
                <div class="text-2xl font-extrabold text-green-600">24</div>
                <p class="text-xs text-gray-500 mt-0.5">Total Pesanan</p>
            </div>
        </div>
        <div class="bg-white border border-blue-100 rounded-2xl p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fas fa-box text-blue-600 text-lg"></i>
            </div>
            <div>
                <div class="text-2xl font-extrabold text-blue-600">48 kg</div>
                <p class="text-xs text-gray-500 mt-0.5">Makanan Diselamatkan</p>
            </div>
        </div>
        <div class="bg-white border border-purple-100 rounded-2xl p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fas fa-leaf text-purple-600 text-lg"></i>
            </div>
            <div>
                <div class="text-2xl font-extrabold text-purple-600">96 kg</div>
                <p class="text-xs text-gray-500 mt-0.5">CO₂ Dikurangi</p>
            </div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="flex gap-2 mb-6 bg-gray-100 rounded-xl p-1 w-fit">
        <button class="px-4 py-2 text-sm font-semibold bg-white text-green-700 rounded-lg shadow-sm transition-all">Semua</button>
        <button class="px-4 py-2 text-sm font-semibold text-gray-500 rounded-lg hover:text-green-700 transition-all">Selesai</button>
        <button class="px-4 py-2 text-sm font-semibold text-gray-500 rounded-lg hover:text-green-700 transition-all">Diambil</button>
        <button class="px-4 py-2 text-sm font-semibold text-gray-500 rounded-lg hover:text-green-700 transition-all">Dibatalkan</button>
    </div>

    <!-- Orders List -->
    <div class="space-y-4">
        <!-- Order Item 1 -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-receipt text-green-600"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">#ORD-2026-001</h3>
                        <p class="text-xs text-gray-500">05 Mei 2026, 14:30</p>
                    </div>
                </div>
                <span class="bg-green-100 text-green-800 font-semibold px-3 py-1.5 rounded-full text-xs">
                    <i class="fas fa-check-circle mr-1"></i>Selesai
                </span>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-100 pl-13">
                <p class="text-gray-700 font-medium">Paket Burger Spesial + Assorted Pastry Box</p>
                <p class="text-sm text-gray-500 mt-1 flex items-center gap-1">
                    <i class="fas fa-store text-gray-400"></i>
                    Burger King, Jakarta Selatan
                </p>
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs text-gray-500">Total Pesanan</p>
                    <p class="text-lg font-extrabold text-gray-800">Rp 60.000</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-500">Diselamatkan</p>
                    <p class="text-lg font-extrabold text-green-600">2.4 kg 🌱</p>
                </div>
            </div>
        </div>

        <!-- Order Item 2 -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-receipt text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">#ORD-2026-002</h3>
                        <p class="text-xs text-gray-500">03 Mei 2026, 18:45</p>
                    </div>
                </div>
                <span class="bg-blue-100 text-blue-800 font-semibold px-3 py-1.5 rounded-full text-xs">
                    <i class="fas fa-check mr-1"></i>Diambil
                </span>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-100">
                <p class="text-gray-700 font-medium">Green Power Salad Bowl</p>
                <p class="text-sm text-gray-500 mt-1 flex items-center gap-1">
                    <i class="fas fa-store text-gray-400"></i>
                    SaladStop!, Senayan City
                </p>
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs text-gray-500">Total Pesanan</p>
                    <p class="text-lg font-extrabold text-gray-800">Rp 45.000</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-500">Diselamatkan</p>
                    <p class="text-lg font-extrabold text-green-600">1.8 kg 🌱</p>
                </div>
            </div>
        </div>

        <!-- Order Item 3 -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-receipt text-red-600"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">#ORD-2026-003</h3>
                        <p class="text-xs text-gray-500">01 Mei 2026, 16:20</p>
                    </div>
                </div>
                <span class="bg-red-100 text-red-800 font-semibold px-3 py-1.5 rounded-full text-xs">
                    <i class="fas fa-times-circle mr-1"></i>Dibatalkan
                </span>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-100">
                <p class="text-gray-700 font-medium">Paket Nasi Campur Bali</p>
                <p class="text-sm text-gray-500 mt-1 flex items-center gap-1">
                    <i class="fas fa-store text-gray-400"></i>
                    Bebek Bengil, Kemang
                </p>
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs text-gray-500">Total Pesanan</p>
                    <p class="text-lg font-extrabold text-gray-800">Rp 40.000</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-500">Diselamatkan</p>
                    <p class="text-lg font-extrabold text-gray-400">-</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Load More -->
    <div class="text-center mt-8">
        <button class="bg-white border border-green-200 hover:bg-green-50 text-green-700 font-bold py-2.5 px-8 rounded-xl transition-colors">
            <i class="fas fa-chevron-down mr-2"></i>Muat Lebih Banyak
        </button>
    </div>
</div>
@endsection
