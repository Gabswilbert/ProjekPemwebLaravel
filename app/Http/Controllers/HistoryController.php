<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HistoryController extends Controller
{
    /**
     * Tampilkan halaman riwayat pesanan user yang sedang login.
     */
    public function index()
    {
        // ─────────────────────────────────────────────────
        // TODO: Ganti data dummy ini dengan query database
        // Contoh query:
        //   $orders = Order::with('items.product')
        //                  ->where('user_id', auth()->id())
        //                  ->latest()
        //                  ->get();
        // ─────────────────────────────────────────────────

        $orders = collect([
            [
                'id'               => 'FS-8829103',
                'status'           => 'selesai',
                'merchant_name'    => "L'Artisan Boulangerie",
                'merchant_image'   => 'https://ui-avatars.com/api/?name=LA&background=F59E0B&color=fff&size=128',
                'tanggal'          => '5 Jul 2026, 14:20',
                'pickup_location'  => 'Jl. Kemang Raya No. 8, Jakarta Selatan',
                'pickup_time'      => '14:00 – 16:00',
                'pickup_code'      => 'FS-12345',
                'subtotal'         => 50000,
                'diskon'           => 15000,
                'biaya_layanan'    => 2000,
                'total_bayar'      => 37000,
                'co2_saved'        => 1.2,
                'food_saved'       => 0.8,
                'items'            => collect([
                    [
                        'nama'   => 'Surprise Bag: Pastry',
                        'harga'  => 35000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=200&q=80',
                    ],
                    [
                        'nama'   => 'Croissant Butter',
                        'harga'  => 15000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1549931319-a545dcf3bc7c?w=200&q=80',
                    ],
                ]),
            ],
            [
                'id'               => 'FS-8812047',
                'status'           => 'diambil',
                'merchant_name'    => 'Burger King - Malang',
                'merchant_image'   => 'https://ui-avatars.com/api/?name=BK&background=dc2626&color=fff&size=128',
                'tanggal'          => '3 Jul 2026, 18:45',
                'pickup_location'  => 'Jl. Sudirman No. 42, Malang',
                'pickup_time'      => '18:00 – 20:00',
                'pickup_code'      => 'FS-67890',
                'subtotal'         => 65000,
                'diskon'           => 19500,
                'biaya_layanan'    => 2000,
                'total_bayar'      => 47500,
                'co2_saved'        => 0.8,
                'food_saved'       => 0.6,
                'items'            => collect([
                    [
                        'nama'   => 'Paket Burger Spesial',
                        'harga'  => 25000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1571091718767-18b5b1457add?w=200&q=80',
                    ],
                    [
                        'nama'   => 'Ayam Goreng Crispy',
                        'harga'  => 22000,
                        'qty'    => 2,
                        'gambar' => 'https://images.unsplash.com/photo-1562967914-608f82629710?w=200&q=80',
                    ],
                ]),
            ],
            [
                'id'               => 'FS-8799312',
                'status'           => 'menunggu',
                'merchant_name'    => 'SaladStop! Malang',
                'merchant_image'   => 'https://ui-avatars.com/api/?name=SS&background=16a34a&color=fff&size=128',
                'tanggal'          => '7 Jul 2026, 11:00',
                'pickup_location'  => 'Senayan City Lt. 2, Malang',
                'pickup_time'      => '11:00 – 13:00',
                'pickup_code'      => null,
                'subtotal'         => 30000,
                'diskon'           => 9000,
                'biaya_layanan'    => 2000,
                'total_bayar'      => 23000,
                'co2_saved'        => null,
                'food_saved'       => null,
                'items'            => collect([
                    [
                        'nama'   => 'Green Power Salad Bowl',
                        'harga'  => 30000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=200&q=80',
                    ],
                ]),
            ],
            [
                'id'               => 'FS-8755820',
                'status'           => 'dibatalkan',
                'merchant_name'    => 'BreadTalk Malang',
                'merchant_image'   => 'https://ui-avatars.com/api/?name=BT&background=7c3aed&color=fff&size=128',
                'tanggal'          => '28 Jun 2026, 09:15',
                'pickup_location'  => 'Mall Olimpic Garden Lt. 1, Malang',
                'pickup_time'      => '09:00 – 11:00',
                'pickup_code'      => null,
                'subtotal'         => 15000,
                'diskon'           => 4500,
                'biaya_layanan'    => 2000,
                'total_bayar'      => 12500,
                'co2_saved'        => null,
                'food_saved'       => null,
                'items'            => collect([
                    [
                        'nama'   => 'Roti Tawar Gandum',
                        'harga'  => 15000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1549931319-a545dcf3bc7c?w=200&q=80',
                    ],
                ]),
            ],
        ]);

        // Hitung statistik global
        $totalOrders    = $orders->count();
        $totalCo2Saved  = $orders->sum('co2_saved');
        $totalFoodSaved = $orders->sum('food_saved');

        return view('history', compact(
            'orders',
            'totalOrders',
            'totalCo2Saved',
            'totalFoodSaved'
        ));
    }
}
