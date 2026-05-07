@extends('layouts.app')

@section('content')
<div class="pt-4 pb-8">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header Section -->
    <div class="mb-8 bg-green-700 text-white p-6 rounded-lg">
        <h1 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
        <p class="text-sm opacity-90">Temukan makanan hemat berkualitas dari restoran dan toko terpercaya</p>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @php
            $products = [
                [
                    'id' => 1,
                    'nama' => 'Paket Burger Spesial',
                    'toko' => 'Burger King, Jakarta Selatan',
                    'harga_diskon' => 25000,
                    'harga_asli' => 65000,
                    'tag' => 'Sisa 2 Porsi',
                    'icon' => 'restaurant',
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
                    'gambar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuALnJTrOKpvQO6pVLnVleRbV0KfCjVWjOlxhUYqmY-fujl4KcKkoKorGKiNbQgXpiWK2_-_md2x2130_yGYPLMsbW0iMy5RvR0xfFoGftRNb6vq_DvghuZAfgbmBhokU8VpPhDmEWhNsxZLrzYm2NLRB8TIznR1Y5g_1fTRCjsHp4Qu-ZxJPMbRBr1-2L2-SSGn1S3oOOIWwplLCLZaQDej2PcEH1XAwzrt5cBC-RnGchZp8Il2oXJtQYpFQYgMrMzfkJuZ60JWCiBH'
                ],
                [
                    'id' => 3,
                    'nama' => 'Green Power Salad Bowl',
                    'toko' => 'SaladStop!, Senayan City',
                    'harga_diskon' => 45000,
                    'harga_asli' => 110000,
                    'tag' => 'Sangat Segar',
                    'icon' => 'restaurant',
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
                    'gambar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCXAo71ESdjtO9sjMo_KkfkeIquQhFX3CoW0uZRQnN0KNfQK5KPtzSMhtt-HZFAlazEV9b9rxA6xPAuuZLV9YJYVSf4GQ44Bl_2W18aVG3vH7Wss7RNQRUAjD8TMjO8ElyII9Ph73pccdvG9snXugzDRNGbdIF81zyuUWiNa8EE3TpHcvRy63QtDCAUbhVTDWjBaUfG-I6uu59dTxvXxj2-nZz3Urkr9GH5Y2MuDlw1oCzSOnWRw8Fnw7a2DQ-_CILVuXAevof5Q1AK'
                ]
            ];
            
            function formatRupiah($angka) {
                return "Rp " . number_format($angka, 0, ',', '.');
            }
        @endphp

        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <!-- Product Image -->
            <div class="relative h-48 bg-gray-200 overflow-hidden">
                <img src="{{ $product['gambar'] }}" alt="{{ $product['nama'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                <span class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                    {{ $product['tag'] }}
                </span>
            </div>

            <!-- Product Info -->
            <div class="p-4">
                <h3 class="font-bold text-lg text-gray-800 mb-1">{{ $product['nama'] }}</h3>
                <p class="text-sm text-gray-600 mb-3 flex items-center gap-1">
                    <i class="fas fa-map-marker-alt"></i> {{ $product['toko'] }}
                </p>

                <!-- Price -->
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-2xl font-bold text-green-600">{{ formatRupiah($product['harga_diskon']) }}</span>
                    <span class="text-sm text-gray-400 line-through">{{ formatRupiah($product['harga_asli']) }}</span>
                </div>

                <!-- Add to Cart Form -->
                <form action="{{ route('cart.add') }}" method="POST" class="flex gap-2">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <input type="hidden" name="product_name" value="{{ $product['nama'] }}">
                    <input type="hidden" name="price" value="{{ $product['harga_diskon'] }}">
                    <input type="hidden" name="store_name" value="{{ $product['toko'] }}">
                    
                    <input type="number" name="quantity" value="1" min="1" max="10" class="w-16 px-2 py-2 border border-gray-300 rounded text-center">
                    
                    <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors">
                        <i class="fas fa-shopping-cart mr-2"></i>Tambah
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
