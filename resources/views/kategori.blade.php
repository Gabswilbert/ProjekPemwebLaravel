@extends('layouts.app')

@section('content')
<!-- Hero Header -->
<div class="bg-gradient-to-r from-green-700 to-teal-600 text-white rounded-2xl p-8 mb-8 relative overflow-hidden">
    <div class="absolute right-0 top-0 w-64 h-full opacity-10">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
            <path fill="white" d="M50,-65.5C63.7,-56.1,73.4,-40.5,76.4,-24C79.5,-7.5,75.9,9.8,68.4,25.3C60.9,40.7,49.4,54.3,35.4,62.5C21.4,70.7,4.8,73.5,-11.8,71.4C-28.4,69.2,-44.9,62.1,-56.1,50.4C-67.3,38.7,-73.2,22.5,-73.3,6.4C-73.4,-9.7,-67.8,-25.7,-58.2,-38.7C-48.5,-51.7,-34.9,-61.7,-20,-67.1C-5.2,-72.5,10.8,-73.3,25.9,-70.1C41,-66.9,36.3,-74.9,50,-65.5Z"/>
        </svg>
    </div>
    <div class="relative z-10">
        <p class="text-green-200 text-sm font-medium mb-1">Selamat Datang,</p>
        <h1 class="text-3xl font-extrabold mb-2">{{ Auth::user()->name }} 👋</h1>
        <p class="text-green-100 opacity-90">Temukan makanan hemat berkualitas dari restoran dan toko terpercaya</p>

        <div class="mt-5 flex items-center gap-3 bg-white/15 backdrop-blur-sm rounded-xl px-4 py-3 w-fit border border-white/20">
            <i class="fas fa-leaf text-green-300"></i>
            <div>
                <p class="text-xs text-green-200">Kamu telah menyelamatkan</p>
                <p class="font-bold text-sm">2.4 Kg Food Surplus 🌱</p>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-2">
        <i class="fas fa-check-circle text-green-500"></i>
        {{ session('success') }}
    </div>
@endif

<!-- Search & Filter Bar -->
<div class="flex items-center gap-4 mb-6">
    <div class="flex-1 bg-white border border-gray-200 rounded-xl flex items-center gap-3 px-4 py-2.5 shadow-sm">
        <i class="fas fa-search text-gray-400"></i>
        <input type="text" id="searchInput" placeholder="Cari makanan favoritmu..." class="flex-1 focus:outline-none text-sm text-gray-700">
    </div>
    <div class="flex gap-2">
        <button data-filter="semua" class="filter-btn bg-green-700 text-white px-4 py-2.5 rounded-xl text-sm font-semibold shadow-sm hover:bg-green-800 transition-colors active">Semua</button>
        <button data-filter="Restoran" class="filter-btn bg-white border border-gray-200 text-gray-600 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-green-50 hover:text-green-700 hover:border-green-200 transition-colors">Restoran</button>
        <button data-filter="Toko Roti" class="filter-btn bg-white border border-gray-200 text-gray-600 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-green-50 hover:text-green-700 hover:border-green-200 transition-colors">Toko Roti</button>
        <button data-filter="UMKM" class="filter-btn bg-white border border-gray-200 text-gray-600 px-4 py-2.5 rounded-xl text-sm font-semibold hover:bg-green-50 hover:text-green-700 hover:border-green-200 transition-colors">UMKM</button>
    </div>
</div>

<!-- Products Grid -->
@php
    $embedResourceImage = function ($filename) {
        $path = resource_path('views/' . $filename);
        return file_exists($path)
            ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents($path))
            : 'https://via.placeholder.com/500x400?text=Image+Not+Found';
    };

    $products = [
        [
            'id' => 1,
            'nama' => 'Paket Burger Spesial',
            'toko' => 'Burger King, Jakarta Selatan',
            'harga_diskon' => 25000,
            'harga_asli' => 65000,
            'tag' => 'Sisa 2 Porsi',
            'icon' => 'restaurant',
            'kategori' => 'Restoran',
            'gambar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDlc5tA1YhY4AOIeyUj61QhzBSfVt4NETw53Nf8dS7BAIKRV3m8o7obNkWULJ5LDaBFOF670U9yu1TmQFQXX8S4huf8CaR1NfFnbGy3lf81ZWCi9SHLAbcE-Obm-cljXTt6QCQg0lT1e-QSrBX2S3XUZA26R7lWRnSkQ6WKeX3mRIWZK-1jJoeT6TUXSIjOW6MuhOHdjno6H_Agh_gxTTMZKjDqOepcXDhOmfJl_PAW6IvUQRGZd3aZaaLawLbnkzwKFu53VrVFoHqx'
        ],
        [
            'id' => 2,
            'nama' => 'Assorted Pastry Box',
            'toko' => 'BreadTalk, Grand Indonesia',
            'harga_diskon' => 35000,
            'harga_asli' => 90000,
            'tag' => 'Waktu Terbatas',
            'icon' => 'storefront',
            'kategori' => 'Toko Roti',
            'gambar' => $embedResourceImage('dessert box.jpg')
        ],
        [
            'id' => 3,
            'nama' => 'Green Power Salad Bowl',
            'toko' => 'SaladStop!, Senayan City',
            'harga_diskon' => 45000,
            'harga_asli' => 110000,
            'tag' => 'Sangat Segar',
            'icon' => 'restaurant',
            'kategori' => 'Restoran',
            'gambar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBkoVAnEKgjddkhIwWqA7RFlsj_FAmicau4924Pk55cNYxo2Jkes2VqaVGnUvF_AVGy_oDETsCWLEd8CSmQIEL3DndprOwGYTNCRAwf6Xw-PN7vX0E8RpZGTry_Msf0_MSu3aNZcV_pbDnRta9cj9678NERjodx3FJmhkcOc9YzhTSkTUu6y6Lk9i-ZpYLtxNJ4jiXKYjdGZo7Uh6c-WUKnlTRFmhbB1seXqlPFmPFGHVmaO0DE4ELinZLNS6E5e28Xho4560GnhvlV'
        ],
        [
            'id' => 4,
            'nama' => 'Paket Nasi Campur Bali',
            'toko' => 'Bebek Bengil, Kemang',
            'harga_diskon' => 40000,
            'harga_asli' => 85000,
            'tag' => 'Baru Masuk',
            'icon' => 'restaurant',
            'kategori' => 'UMKM',
            'gambar' => $embedResourceImage('Nasi Campur Bali Garpoo.jpg')
        ]
    ];

    function formatRupiah($angka) {
        return "Rp " . number_format($angka, 0, ',', '.');
    }
@endphp

<h2 class="text-lg font-extrabold text-gray-800 mb-4">Produk Tersedia <span class="text-gray-400 font-normal text-base">({{ count($products) }} item)</span></h2>

<div id="productsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
    @foreach($products as $product)
    <div class="product-card bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md hover:-translate-y-0.5 transition-all duration-200" data-nama="{{ strtolower($product['nama']) }}" data-kategori="{{ $product['kategori'] }}" data-id="{{ $product['id'] }}">
        <!-- Image -->
        <div class="relative h-44 bg-gray-100 overflow-hidden">
            <img src="{{ $product['gambar'] }}" alt="{{ $product['nama'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            <span class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-2.5 py-1 rounded-full shadow-sm">
                {{ $product['tag'] }}
            </span>
            @php
                $diskon = round((($product['harga_asli'] - $product['harga_diskon']) / $product['harga_asli']) * 100);
            @endphp
            <span class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-sm">
                -{{ $diskon }}%
            </span>
        </div>

        <!-- Info -->
        <div class="p-4">
            <h3 class="font-bold text-gray-800 text-sm mb-1 truncate">{{ $product['nama'] }}</h3>
            <p class="text-xs text-gray-500 mb-3 flex items-center gap-1">
                <i class="fas fa-map-marker-alt text-green-500"></i>
                {{ $product['toko'] }}
            </p>

            <!-- Price -->
            <div class="flex items-baseline gap-2 mb-4">
                <span class="text-lg font-extrabold text-green-700">{{ formatRupiah($product['harga_diskon']) }}</span>
                <span class="text-xs text-gray-400 line-through">{{ formatRupiah($product['harga_asli']) }}</span>
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add') }}" method="POST" class="flex gap-2">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <input type="hidden" name="product_name" value="{{ $product['nama'] }}">
                <input type="hidden" name="price" value="{{ $product['harga_diskon'] }}">
                <input type="hidden" name="store_name" value="{{ $product['toko'] }}">

                <input type="number" name="quantity" value="1" min="1" max="10"
                    class="w-16 px-2 py-2 border border-gray-200 rounded-lg text-center text-sm focus:outline-none focus:border-green-500">

                <button type="submit"
                    class="flex-1 bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-3 rounded-lg transition-colors text-sm flex items-center justify-center gap-1.5">
                    <i class="fas fa-shopping-cart text-xs"></i>
                    Tambah
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<!-- Eco Banner -->
<div class="mt-8 p-5 rounded-2xl bg-gradient-to-r from-green-50 to-teal-50 border border-green-100 flex items-center gap-5">
    <div class="text-4xl">🌱</div>
    <div>
        <h4 class="font-bold text-green-800 text-sm">Misi Kita Bersama</h4>
        <p class="text-xs text-green-700 mt-0.5">Setiap pesanan mengurangi emisi karbon & menjaga bumi tetap hijau. Terima kasih sudah peduli!</p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');
    let currentFilter = 'semua';

    // Fungsi untuk filter dan search produk
    function filterProducts() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        productCards.forEach(card => {
            const produkNama = card.getAttribute('data-nama');
            const kategori = card.getAttribute('data-kategori');
            
            // Cek apakah produk sesuai dengan filter kategori
            const matchesCategory = currentFilter === 'semua' || kategori === currentFilter;
            
            // Cek apakah produk sesuai dengan pencarian
            const matchesSearch = produkNama.includes(searchTerm);
            
            // Tampilkan atau sembunyikan produk
            if (matchesCategory && matchesSearch) {
                card.style.display = '';
                card.classList.add('animate-fade-in');
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Event listener untuk search input
    searchInput.addEventListener('input', filterProducts);
    
    // Event listener untuk filter buttons
    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Hapus class active dari semua button
            filterButtons.forEach(btn => {
                btn.classList.remove('bg-green-700', 'text-white', 'shadow-sm');
                btn.classList.add('bg-white', 'border', 'border-gray-200', 'text-gray-600');
            });
            
            // Tambah class active ke button yang diklik
            this.classList.remove('bg-white', 'border', 'border-gray-200', 'text-gray-600');
            this.classList.add('bg-green-700', 'text-white', 'shadow-sm');
            
            // Update current filter
            currentFilter = this.getAttribute('data-filter');
            
            // Filter produk
            filterProducts();
        });
    });

    // Tambah CSS untuk animasi fade-in
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
    `;
    document.head.appendChild(style);
});
</script>
@endsection
