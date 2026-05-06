@extends('layouts.app')

@section('content')
<!-- Header User Section -->
<div class="p-6 bg-green-700 text-white rounded-b-3xl">
    <div class="flex justify-between items-center mb-4">
        <div>
            <p class="text-sm opacity-80">Selamat Datang,</p>
            <h2 class="text-xl font-bold">Budi! 👋</h2>
        </div>
        <div class="w-10 h-10 bg-white rounded-full overflow-hidden border-2 border-green-400">
            <img src="https://ui-avatars.com/api/?name=Budi&background=random" alt="User Profile">
        </div>
    </div>
    
    <!-- Info Penyelamatan (Pahlawan Pangan) -->
    <div class="bg-green-600 p-4 rounded-2xl flex items-center gap-4">
        <div class="bg-white p-3 rounded-xl">
            <i class="fas fa-leaf text-green-700"></i>
        </div>
        <div>
            <p class="text-xs">Kamu telah menyelamatkan</p>
            <p class="font-bold">2.4 Kg Food Surplus</p>
        </div>
    </div>
</div>

<!-- Search & Filter Area -->
<div class="p-4 -mt-4">
    <div class="bg-white p-2 rounded-xl shadow-md flex items-center gap-2">
        <i class="fas fa-search text-gray-400 ml-2"></i>
        <input type="text" placeholder="Cari makanan favoritmu..." class="w-full focus:outline-none text-sm py-2">
    </div>
</div>

<!-- Kategori -->
<div class="px-4 flex gap-2 overflow-x-auto no-scrollbar py-2">
    <button class="bg-green-700 text-white px-4 py-2 rounded-full text-xs shrink-0">Semua</button>
    <button class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-xs shrink-0 font-semibold">Restoran</button>
    <button class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-xs shrink-0 font-semibold">Toko Roti</button>
    <button class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-xs shrink-0 font-semibold">UMKM</button>
</div>

<!-- Daftar Menu Surplus (Looping dari Database) -->
<div class="p-4 grid grid-cols-2 gap-4">
    <!-- Card Item 1 -->
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <img src="https://images.unsplash.com/photo-1571091718767-18b5b1457add" class="w-full h-32 object-cover">
        <div class="p-3">
            <span class="text-[10px] bg-red-100 text-red-600 px-2 py-0.5 rounded font-bold">DISKON 30%</span>
            <h3 class="text-sm font-bold mt-1 truncate">Paket Burger Spesial</h3>
            <p class="text-[10px] text-gray-400">Burger King - Malang</p>
            <div class="mt-2 flex justify-between items-center">
                <div>
                    <p class="text-xs line-through text-gray-400 italic">Rp 35.000</p>
                    <p class="text-sm font-bold text-green-700 font-sans">Rp 25.000</p>
                </div>
                <button class="bg-green-700 text-white w-8 h-8 rounded-lg flex items-center justify-center">
                    <i class="fas fa-plus text-xs"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Card Item 2 -->
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a" class="w-full h-32 object-cover">
        <div class="p-3">
            <span class="text-[10px] bg-red-100 text-red-600 px-2 py-0.5 rounded font-bold">SISA 2 PORSI</span>
            <h3 class="text-sm font-bold mt-1 truncate">Assorted Pastry Box</h3>
            <p class="text-[10px] text-gray-400">L'Artisan Boulangerie</p>
            <div class="mt-2 flex justify-between items-center">
                <div>
                    <p class="text-xs line-through text-gray-400 italic">Rp 50.000</p>
                    <p class="text-sm font-bold text-green-700 font-sans">Rp 35.000</p>
                </div>
                <button class="bg-green-700 text-white w-8 h-8 rounded-lg flex items-center justify-center text-xs">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="mx-4 my-4 p-4 rounded-2xl bg-green-50 border border-green-100 flex items-center gap-4">
    <div class="text-2xl">🌱</div>
    <div>
        <h4 class="text-sm font-bold text-green-800">Misi Kita Bersama</h4>
        <p class="text-[10px] text-green-700">Setiap pesanan mengurangi emisi karbon & menjaga bumi tetap hijau.</p>
    </div>
</div>
@endsection