@extends('layouts.app')

@section('content')
<div class="pb-8">
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-2">
            <i class="fas fa-check-circle text-green-500"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-extrabold text-gray-800">Keranjang Belanja</h1>
        <a href="{{ route('kategori') }}" class="text-sm text-green-600 hover:text-green-700 font-semibold flex items-center gap-1">
            <i class="fas fa-plus"></i> Tambah Item
        </a>
    </div>

    @if($carts->isEmpty())
        <div class="text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm">
            <i class="fas fa-shopping-basket text-6xl text-gray-200 mb-4"></i>
            <h3 class="text-lg font-bold text-gray-600 mb-2">Keranjang Anda kosong</h3>
            <p class="text-sm text-gray-400 mb-6">Mulai tambahkan makanan surplus favoritmu!</p>
            <a href="{{ route('kategori') }}" class="inline-block bg-green-700 hover:bg-green-800 text-white font-bold py-2.5 px-6 rounded-xl transition-colors">
                Mulai Belanja
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Cart Items -->
            <div class="lg:col-span-2 space-y-3">
                @php $total = 0; @endphp
                @foreach($carts as $item)
                    @php $subtotal = $item->price * $item->quantity; $total += $subtotal; @endphp
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 flex items-start gap-4 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-utensils text-green-600"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-gray-800 truncate">{{ $item->product_name }}</h3>
                            <p class="text-sm text-gray-500 mt-0.5">
                                <i class="fas fa-store mr-1"></i>{{ $item->store_name }}
                            </p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-green-700 font-bold">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-gray-500 bg-gray-50 border border-gray-200 px-3 py-1 rounded-lg">Qty: {{ $item->quantity }}</span>
                                    <span class="text-sm font-semibold text-gray-700">= Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Summary Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sticky top-24">
                    <h2 class="font-extrabold text-lg text-gray-800 mb-5">Ringkasan Pesanan</h2>

                    <div class="space-y-3 pb-4 border-b border-gray-100">
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Subtotal</span>
                            <span class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Diskon (30%)</span>
                            <span class="font-semibold text-green-600">-Rp {{ number_format($total * 0.3, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Biaya Layanan</span>
                            <span class="font-semibold">Rp 2.000</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center py-4 border-b border-gray-100">
                        <span class="font-bold text-gray-800">Total Bayar</span>
                        <span class="text-xl font-extrabold text-green-700">Rp {{ number_format($total - ($total * 0.3) + 2000, 0, ',', '.') }}</span>
                    </div>

                    <div class="mt-4 bg-green-50 rounded-xl p-3 border border-green-100 mb-4">
                        <p class="text-xs text-green-700 flex items-start gap-2">
                            <i class="fas fa-leaf mt-0.5"></i>
                            <span>Dengan pesanan ini kamu menyelamatkan sekitar <strong>{{ count($carts) * 0.4 }} kg</strong> makanan dari pembuangan!</span>
                        </p>
                    </div>

                    <a href="{{ route('pembayaran') }}" class="w-full inline-flex items-center justify-center bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-4 rounded-xl transition-colors gap-2">
                        <i class="fas fa-check-circle"></i>
                        Lanjut Pembayaran
                    </a>

                    <a href="{{ route('kategori') }}" class="block text-center mt-3 text-sm text-green-600 hover:text-green-700 font-semibold">
                        Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
