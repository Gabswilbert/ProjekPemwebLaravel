<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string',
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'store_name' => 'nullable|string'
        ]);
        
        $cart = Cart::where('user_id', Auth::id())
                    ->where('product_id', $validated['product_id'])
                    ->first();
        
        if ($cart) {
            $cart->increment('quantity', $validated['quantity']);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_name' => $validated['product_name'],
                'product_id' => $validated['product_id'],
                'price' => $validated['price'],
                'quantity' => $validated['quantity'],
                'store_name' => $validated['store_name']
            ]);
        }
        
        return redirect()->route('keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
    
    public function removeFromCart($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('keranjang')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
