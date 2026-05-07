@extends('layouts.app')

@section('content')
<div class="pt-4 pb-8">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold text-gray-800 mb-6">Keranjang Belanja</h1>

    @if($carts->isEmpty())
        <div class="text-center py-12">
            <i class="fas fa-shopping-basket text-5xl text-gray-300 mb-4"></i>
            <p class="text-gray-600 text-lg">Keranjang Anda kosong</p>
            <a href="{{ route('kategori') }}" class="mt-4 inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                Lanjut Belanja
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                @php $total = 0; @endphp
                @foreach($carts as $item)
                    @php $subtotal = $item->price * $item->quantity; $total += $subtotal; @endphp
                    <div class="bg-white rounded-lg shadow-md p-4 mb-4 flex items-start gap-4">
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-800">{{ $item->product_name }}</h3>
                            <p class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-store mr-2"></i>{{ $item->store_name }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-green-600 font-bold">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray-600">Qty: {{ $item->quantity }}</span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">
                                Total: Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </p>
                        </div>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash text-lg"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Summary -->
            <div class="bg-white rounded-lg shadow-md p-6 h-fit sticky top-20">
                <h2 class="font-bold text-lg text-gray-800 mb-4">Ringkasan Pesanan</h2>
                
                <div class="space-y-3 mb-6 pb-6 border-b border-gray-200">
                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal:</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Diskon (30%):</span>
                        <span class="text-green-600">-Rp {{ number_format($total * 0.3, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Biaya Layanan:</span>
                        <span>Rp 2.000</span>
                    </div>
                </div>

                <div class="flex justify-between items-center mb-6">
                    <span class="font-bold text-gray-800">Total Bayar:</span>
                    <span class="text-2xl font-bold text-green-600">Rp {{ number_format($total - ($total * 0.3) + 2000, 0, ',', '.') }}</span>
                </div>

                <button class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded transition-colors">
                    <i class="fas fa-check-circle mr-2"></i>Lanjut Pembayaran
                </button>

                <a href="{{ route('kategori') }}" class="block text-center mt-3 text-green-600 hover:text-green-700 font-semibold">
                    Lanjut Belanja
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
