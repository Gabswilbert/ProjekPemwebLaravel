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
                <div class="text-2xl font-extrabold text-green-600">{{ $totalOrders }}</div>
                <p class="text-xs text-gray-500 mt-0.5">Total Pesanan</p>
            </div>
        </div>
        <div class="bg-white border border-blue-100 rounded-2xl p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fas fa-box text-blue-600 text-lg"></i>
            </div>
            <div>
                <div class="text-2xl font-extrabold text-blue-600">{{ number_format($totalFoodSaved, 1) }} kg</div>
                <p class="text-xs text-gray-500 mt-0.5">Makanan Diselamatkan</p>
            </div>
        </div>
        <div class="bg-white border border-purple-100 rounded-2xl p-5 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fas fa-leaf text-purple-600 text-lg"></i>
            </div>
            <div>
                <div class="text-2xl font-extrabold text-purple-600">{{ number_format($totalCo2Saved, 1) }} kg</div>
                <p class="text-xs text-gray-500 mt-0.5">CO₂ Dikurangi</p>
            </div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="flex gap-2 mb-6 bg-gray-100 rounded-xl p-1 w-fit overflow-x-auto">
        <button class="status-filter px-4 py-2 text-sm font-semibold bg-white text-green-700 rounded-lg shadow-sm transition-all active whitespace-nowrap" data-status="semua">Semua</button>
        <button class="status-filter px-4 py-2 text-sm font-semibold text-gray-500 rounded-lg hover:text-green-700 transition-all whitespace-nowrap" data-status="selesai">Selesai</button>
        <button class="status-filter px-4 py-2 text-sm font-semibold text-gray-500 rounded-lg hover:text-green-700 transition-all whitespace-nowrap" data-status="diambil">Diambil</button>
        <button class="status-filter px-4 py-2 text-sm font-semibold text-gray-500 rounded-lg hover:text-green-700 transition-all whitespace-nowrap" data-status="menunggu">Menunggu</button>
        <button class="status-filter px-4 py-2 text-sm font-semibold text-gray-500 rounded-lg hover:text-green-700 transition-all whitespace-nowrap" data-status="dibatalkan">Dibatalkan</button>
    </div>

    <!-- Orders List -->
    <div class="space-y-4">
        @forelse ($orders as $index => $order)
            @php
                $statusClasses = 'bg-gray-100 text-gray-700';
                $statusIcon = 'fas fa-clock';
                if ($order['status'] === 'selesai') {
                    $statusClasses = 'bg-green-100 text-green-800';
                    $statusIcon = 'fas fa-check-circle';
                } elseif ($order['status'] === 'diambil') {
                    $statusClasses = 'bg-blue-100 text-blue-800';
                    $statusIcon = 'fas fa-check';
                } elseif ($order['status'] === 'menunggu') {
                    $statusClasses = 'bg-yellow-100 text-yellow-800';
                    $statusIcon = 'fas fa-hourglass-half';
                } elseif ($order['status'] === 'dibatalkan') {
                    $statusClasses = 'bg-red-100 text-red-800';
                    $statusIcon = 'fas fa-times-circle';
                }
                $hideClass = $index >= 4 ? 'hidden order-item' : 'order-item';
            @endphp

            <div class="order-card {{ $hideClass }} bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-shadow" data-status="{{ $order['status'] }}">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 {{ $order['status'] === 'dibatalkan' ? 'bg-red-100' : ($order['status'] === 'diambil' ? 'bg-blue-100' : ($order['status'] === 'menunggu' ? 'bg-yellow-100' : 'bg-green-100')) }} rounded-xl flex items-center justify-center">
                            <i class="fas fa-receipt {{ $order['status'] === 'dibatalkan' ? 'text-red-600' : ($order['status'] === 'diambil' ? 'text-blue-600' : ($order['status'] === 'menunggu' ? 'text-yellow-600' : 'text-green-600')) }}"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">{{ $order['id'] }}</h3>
                            <p class="text-xs text-gray-500">{{ $order['tanggal'] }}</p>
                        </div>
                    </div>
                    <span class="{{ $statusClasses }} font-semibold px-3 py-1.5 rounded-full text-xs">
                        <i class="{{ $statusIcon }} mr-1"></i>{{ ucfirst($order['status']) }}
                    </span>
                </div>
                <div class="mb-4 pb-4 border-b border-gray-100 pl-13">
                    <p class="text-gray-700 font-medium">{{ $order['merchant_name'] }}</p>
                    <p class="text-sm text-gray-500 mt-1 flex items-center gap-1">
                        <i class="fas fa-map-marker-alt text-gray-400"></i>
                        {{ $order['pickup_location'] }}
                    </p>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-xs text-gray-500">Total Bayar</p>
                        <p class="text-lg font-extrabold text-gray-800">Rp {{ number_format($order['total_bayar'], 0, ',', '.') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-500">Diselamatkan</p>
                        <p class="text-lg font-extrabold {{ $order['co2_saved'] ? 'text-green-600' : 'text-gray-400' }}">{{ $order['co2_saved'] ? number_format($order['co2_saved'], 1) . ' kg 🌱' : '-' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center">
                <p class="text-lg font-bold text-gray-700">Belum ada riwayat pesanan.</p>
                <p class="text-sm text-gray-500 mt-2">Pesanan yang sudah dibayar dan diambil akan muncul di sini.</p>
            </div>
        @endforelse
    </div>

    <!-- Load More -->
    <div class="text-center mt-8">
        <button id="loadMoreBtn" class="bg-white border border-green-200 hover:bg-green-50 text-green-700 font-bold py-2.5 px-8 rounded-xl transition-colors">
            <i class="fas fa-chevron-down mr-2"></i>Muat Lebih Banyak
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const orderCards = document.querySelectorAll('.order-card');
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    const statusFilterBtns = document.querySelectorAll('.status-filter');
    let currentStatus = 'semua';
    let itemsPerPage = 4;
    let visibleItemsByStatus = {}; // Track berapa item yang ditampilkan per status

    // Fungsi untuk menampilkan/menyembunyikan kartu berdasarkan status
    function filterByStatus(status) {
        visibleItemsByStatus = {}; // Reset counter
        currentStatus = status;
        let visibleCount = 0;
        
        orderCards.forEach((card) => {
            const cardStatus = card.getAttribute('data-status');
            const matchesStatus = status === 'semua' || cardStatus === status;
            
            if (matchesStatus) {
                if (visibleCount < itemsPerPage) {
                    card.classList.remove('hidden');
                    card.classList.add('animate-fade-in');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            } else {
                card.classList.add('hidden');
            }
        });

        visibleItemsByStatus[currentStatus] = visibleCount;
        updateLoadMoreButton();
    }

    // Fungsi untuk memperbarui tombol load more
    function updateLoadMoreButton() {
        let totalMatchingItems = 0;
        let visibleMatchingItems = 0;

        orderCards.forEach(card => {
            const cardStatus = card.getAttribute('data-status');
            const matchesStatus = currentStatus === 'semua' || cardStatus === currentStatus;
            
            if (matchesStatus) {
                totalMatchingItems++;
                if (!card.classList.contains('hidden')) {
                    visibleMatchingItems++;
                }
            }
        });

        // Tampilkan tombol jika ada item tersembunyi yang sesuai dengan status
        if (visibleMatchingItems < totalMatchingItems) {
            loadMoreBtn.style.display = 'inline-block';
        } else {
            loadMoreBtn.style.display = 'none';
        }
    }

    // Event listener untuk status filter buttons
    statusFilterBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            // Update active button
            statusFilterBtns.forEach(b => {
                b.classList.remove('bg-white', 'text-green-700', 'shadow-sm');
                b.classList.add('text-gray-500');
            });
            this.classList.remove('text-gray-500');
            this.classList.add('bg-white', 'text-green-700', 'shadow-sm');

            // Update status dan filter
            const newStatus = this.getAttribute('data-status');
            filterByStatus(newStatus);
        });
    });

    // Event listener untuk load more button
    loadMoreBtn.addEventListener('click', function(e) {
        e.preventDefault();
        let currentVisibleCount = 0;
        let itemsAdded = 0;

        orderCards.forEach(card => {
            const cardStatus = card.getAttribute('data-status');
            const matchesStatus = currentStatus === 'semua' || cardStatus === currentStatus;
            
            // Hitung item yang sudah tampil
            if (matchesStatus && !card.classList.contains('hidden')) {
                currentVisibleCount++;
            }
        });

        // Tampilkan item berikutnya
        let itemsToShow = itemsPerPage;
        orderCards.forEach(card => {
            const cardStatus = card.getAttribute('data-status');
            const matchesStatus = currentStatus === 'semua' || cardStatus === currentStatus;
            
            if (matchesStatus && card.classList.contains('hidden') && itemsToShow > 0) {
                card.classList.remove('hidden');
                card.classList.add('animate-fade-in');
                itemsToShow--;
                itemsAdded++;
            }
        });

        updateLoadMoreButton();
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

    // Initialize
    filterByStatus('semua');
});
</script>
@endsection
