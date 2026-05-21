<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'product_name' => 'nullable|string',
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'store_name' => 'nullable|string'
        ]);
        
        // Cek apakah produk sudah ada di keranjang user ini
        $existingCart = Cart::where('user_id', Auth::id())
                            ->where('product_id', $validated['product_id'])
                            ->first();
        
        if ($existingCart) {
            // Jika sudah ada, tambah quantity-nya
            $existingCart->increment('quantity', $validated['quantity']);
            $message = 'Kuantitas produk berhasil diperbarui!';
        } else {
            // Jika belum ada, buat entry baru di tabel carts
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $validated['product_id'],
                'product_name' => $validated['product_name'] ?? 'Produk',
                'price' => $validated['price'],
                'quantity' => $validated['quantity'],
                'store_name' => $validated['store_name'] ?? null,
            ]);
            $message = 'Produk berhasil ditambahkan ke keranjang!';
        }
        
        return redirect()->route('keranjang')->with('success', $message);
    }
    
    public function removeFromCart($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('keranjang')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
