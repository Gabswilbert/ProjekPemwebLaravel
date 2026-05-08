@extends('layouts.app')

@section('content')
<div class="pb-8">
    <div class="bg-white rounded-3xl shadow-sm p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-extrabold text-gray-800 mb-4">Pembayaran</h1>
        <p class="text-sm text-gray-600 mb-6">Silakan scan QRIS berikut untuk menyelesaikan pembayaran Anda.</p>

        <div class="rounded-3xl overflow-hidden border border-gray-100 shadow-sm">
            <img src="{{ $qrisImage }}" alt="QRIS Pembayaran" class="w-full h-auto object-cover" />
        </div>

        <div class="mt-6 text-gray-600">
            <p class="text-sm leading-relaxed">Tunjukkan atau scan QRIS di atas dengan aplikasi dompet digital Anda untuk menyelesaikan transaksi.</p>
        </div>

        <div class="mt-8 flex flex-col sm:flex-row gap-3">
            <a href="{{ route('keranjang') }}" class="inline-flex items-center justify-center w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-5 rounded-xl transition-colors">
                Kembali ke Keranjang
            </a>
            <a href="{{ route('kategori') }}" class="inline-flex items-center justify-center w-full sm:w-auto bg-green-700 hover:bg-green-800 text-white font-semibold py-3 px-5 rounded-xl transition-colors">
                Lanjut Belanja
            </a>
        </div>
    </div>
</div>
@endsection
