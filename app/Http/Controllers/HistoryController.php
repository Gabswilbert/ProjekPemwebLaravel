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
            [
                'id'               => 'FS-8745600',
                'status'           => 'selesai',
                'merchant_name'    => 'KFC Jakarta Pusat',
                'merchant_image'   => 'https://ui-avatars.com/api/?name=KFC&background=da2517&color=fff&size=128',
                'tanggal'          => '25 Jun 2026, 12:30',
                'pickup_location'  => 'Kota Tua, Jakarta Barat',
                'pickup_time'      => '12:00 – 14:00',
                'pickup_code'      => 'FS-98765',
                'subtotal'         => 55000,
                'diskon'           => 16500,
                'biaya_layanan'    => 2000,
                'total_bayar'      => 40500,
                'co2_saved'        => 1.5,
                'food_saved'       => 0.9,
                'items'            => collect([
                    [
                        'nama'   => 'Paket Hemat Ayam Goreng',
                        'harga'  => 45000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1562967914-608f82629710?w=200&q=80',
                    ],
                    [
                        'nama'   => 'Coleslaw Organik',
                        'harga'  => 10000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=200&q=80',
                    ],
                ]),
            ],
            [
                'id'               => 'FS-8740100',
                'status'           => 'menunggu',
                'merchant_name'    => 'Starbucks Coffee',
                'merchant_image'   => 'https://ui-avatars.com/api/?name=SBC&background=00704a&color=fff&size=128',
                'tanggal'          => '8 Jul 2026, 09:00',
                'pickup_location'  => 'Plaza Senayan, Jakarta Selatan',
                'pickup_time'      => '09:00 – 11:00',
                'pickup_code'      => null,
                'subtotal'         => 80000,
                'diskon'           => 24000,
                'biaya_layanan'    => 2000,
                'total_bayar'      => 58000,
                'co2_saved'        => null,
                'food_saved'       => null,
                'items'            => collect([
                    [
                        'nama'   => 'Grilled Cheese Sandwich Pack',
                        'harga'  => 60000,
                        'qty'    => 2,
                        'gambar' => 'https://images.unsplash.com/photo-1551024506-5623ee06fdf4?w=200&q=80',
                    ],
                    [
                        'nama'   => 'Blueberry Muffin',
                        'harga'  => 20000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&q=80',
                    ],
                ]),
            ],
            [
                'id'               => 'FS-8735400',
                'status'           => 'dibatalkan',
                'merchant_name'    => 'Pizza Hut Express',
                'merchant_image'   => 'https://ui-avatars.com/api/?name=PH&background=e4002b&color=fff&size=128',
                'tanggal'          => '22 Jun 2026, 19:00',
                'pickup_location'  => 'Blok M, Jakarta Selatan',
                'pickup_time'      => '18:00 – 20:00',
                'pickup_code'      => null,
                'subtotal'         => 120000,
                'diskon'           => 36000,
                'biaya_layanan'    => 2000,
                'total_bayar'      => 86000,
                'co2_saved'        => null,
                'food_saved'       => null,
                'items'            => collect([
                    [
                        'nama'   => 'Large Veggie Supreme Pizza',
                        'harga'  => 100000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1604068549290-dea0e4a305ca?w=200&q=80',
                    ],
                    [
                        'nama'   => 'Garlic Bread',
                        'harga'  => 20000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1555939594-58d7cb561d1d?w=200&q=80',
                    ],
                ]),
            ],
            [
                'id'               => 'FS-8730200',
                'status'           => 'selesai',
                'merchant_name'    => 'Sushi King',
                'merchant_image'   => 'https://ui-avatars.com/api/?name=SK&background=e74c3c&color=fff&size=128',
                'tanggal'          => '20 Jun 2026, 20:00',
                'pickup_location'  => 'Grand Indonesia, Jakarta Pusat',
                'pickup_time'      => '19:00 – 21:00',
                'pickup_code'      => 'FS-54321',
                'subtotal'         => 95000,
                'diskon'           => 28500,
                'biaya_layanan'    => 2000,
                'total_bayar'      => 68500,
                'co2_saved'        => 2.1,
                'food_saved'       => 1.3,
                'items'            => collect([
                    [
                        'nama'   => 'California Roll Box',
                        'harga'  => 60000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1553872291-8bfbaa8be19f?w=200&q=80',
                    ],
                    [
                        'nama'   => 'Tempura Shrimp Set',
                        'harga'  => 35000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1584080298068-b95b5b647dae?w=200&q=80',
                    ],
                ]),
            ],
            [
                'id'               => 'FS-8725900',
                'status'           => 'menunggu',
                'merchant_name'    => 'Warung Makan Bersama',
                'merchant_image'   => 'https://ui-avatars.com/api/?name=WMB&background=27ae60&color=fff&size=128',
                'tanggal'          => '9 Jul 2026, 11:30',
                'pickup_location'  => 'Jl. Gatot Subroto, Jakarta Selatan',
                'pickup_time'      => '11:00 – 13:00',
                'pickup_code'      => null,
                'subtotal'         => 35000,
                'diskon'           => 10500,
                'biaya_layanan'    => 2000,
                'total_bayar'      => 26500,
                'co2_saved'        => null,
                'food_saved'       => null,
                'items'            => collect([
                    [
                        'nama'   => 'Nasi Goreng Special',
                        'harga'  => 25000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1551632706-5d13e67f2d9c?w=200&q=80',
                    ],
                    [
                        'nama'   => 'Es Teh Manis',
                        'harga'  => 10000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1556742212-5b321f3c261d?w=200&q=80',
                    ],
                ]),
            ],
            [
                'id'               => 'FS-8720100',
                'status'           => 'selesai',
                'merchant_name'    => 'Bakery Indonesia',
                'merchant_image'   => 'https://ui-avatars.com/api/?name=BI&background=f39c12&color=fff&size=128',
                'tanggal'          => '18 Jun 2026, 10:15',
                'pickup_location'  => 'Menteng, Jakarta Pusat',
                'pickup_time'      => '09:00 – 11:00',
                'pickup_code'      => 'FS-11223',
                'subtotal'         => 42000,
                'diskon'           => 12600,
                'biaya_layanan'    => 2000,
                'total_bayar'      => 31400,
                'co2_saved'        => 0.6,
                'food_saved'       => 0.5,
                'items'            => collect([
                    [
                        'nama'   => 'Roti Sourdough Loaf',
                        'harga'  => 30000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=200&q=80',
                    ],
                    [
                        'nama'   => 'Bolu Susu',
                        'harga'  => 12000,
                        'qty'    => 1,
                        'gambar' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=200&q=80',
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
