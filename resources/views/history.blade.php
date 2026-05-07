@extends('layouts.app')

@section('content')
<div class="pt-4 pb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Riwayat Pesanan</h1>

    <!-- Stats Section -->
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-green-600">24</div>
            <p class="text-sm text-gray-600">Total Pesanan</p>
        </div>
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-blue-600">48 kg</div>
            <p class="text-sm text-gray-600">Makanan Diselamatkan</p>
        </div>
        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-purple-600">96 kg</div>
            <p class="text-sm text-gray-600">CO₂ Dikurangi</p>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="flex gap-2 mb-6 border-b border-gray-200 pb-2">
        <button class="px-4 py-2 font-semibold text-green-600 border-b-2 border-green-600">
            Semua
        </button>
        <button class="px-4 py-2 font-semibold text-gray-600 hover:text-green-600 transition-colors">
            Selesai
        </button>
        <button class="px-4 py-2 font-semibold text-gray-600 hover:text-green-600 transition-colors">
            Diambil
        </button>
        <button class="px-4 py-2 font-semibold text-gray-600 hover:text-green-600 transition-colors">
            Dibatalkan
        </button>
    </div>

    <!-- Orders List -->
    <div class="space-y-4">
        <!-- Order Item 1 -->
        <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h3 class="font-bold text-gray-800">#ORD-2026-001</h3>
                    <p class="text-sm text-gray-600">05 Mei 2026, 14:30</p>
                </div>
                <span class="bg-green-100 text-green-800 font-semibold px-3 py-1 rounded-full text-xs">
                    Selesai
                </span>
            </div>
            <div class="mb-3 pb-3 border-b border-gray-200">
                <p class="text-gray-700">Paket Burger Spesial + Assorted Pastry Box</p>
                <p class="text-sm text-gray-600 mt-1">Burger King, Jakarta Selatan</p>
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-600">Total Pesanan</p>
                    <p class="text-lg font-bold text-gray-800">Rp 60.000</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">Diselamatkan</p>
                    <p class="text-lg font-bold text-green-600">2.4 kg</p>
                </div>
            </div>
        </div>

        <!-- Order Item 2 -->
        <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h3 class="font-bold text-gray-800">#ORD-2026-002</h3>
                    <p class="text-sm text-gray-600">03 Mei 2026, 18:45</p>
                </div>
                <span class="bg-blue-100 text-blue-800 font-semibold px-3 py-1 rounded-full text-xs">
                    Diambil
                </span>
            </div>
            <div class="mb-3 pb-3 border-b border-gray-200">
                <p class="text-gray-700">Green Power Salad Bowl</p>
                <p class="text-sm text-gray-600 mt-1">SaladStop!, Senayan City</p>
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-600">Total Pesanan</p>
                    <p class="text-lg font-bold text-gray-800">Rp 45.000</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">Diselamatkan</p>
                    <p class="text-lg font-bold text-green-600">1.8 kg</p>
                </div>
            </div>
        </div>

        <!-- Order Item 3 -->
        <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h3 class="font-bold text-gray-800">#ORD-2026-003</h3>
                    <p class="text-sm text-gray-600">01 Mei 2026, 16:20</p>
                </div>
                <span class="bg-red-100 text-red-800 font-semibold px-3 py-1 rounded-full text-xs">
                    Dibatalkan
                </span>
            </div>
            <div class="mb-3 pb-3 border-b border-gray-200">
                <p class="text-gray-700">Paket Nasi Campur Bali</p>
                <p class="text-sm text-gray-600 mt-1">Bebek Bengil, Kemang</p>
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-600">Total Pesanan</p>
                    <p class="text-lg font-bold text-gray-800">Rp 40.000</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">Diselamatkan</p>
                    <p class="text-lg font-bold text-green-600">-</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Load More -->
    <div class="text-center mt-8">
        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded transition-colors">
            <i class="fas fa-refresh mr-2"></i>Muat Lebih Banyak
        </button>
    </div>
</div>
@endsection
