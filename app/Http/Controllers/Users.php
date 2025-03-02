<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    public function index()
    {
        if ( !session()->has('is_user') ) {
            return redirect('/');
        }

        dd(session()->get('customer_id'));
    }

    public function pilih_produk($product_id)
    {
        $cart = session()->get('cart', []);
    
        $cart[] = $product_id;
    
        session(['cart' => $cart]);
    
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function kurang_produk($product_id)
    {
        $cart = session()->get('cart', []);

        if (($key = array_search($product_id, $cart)) !== false) {
            unset($cart[$key]);
        }

        $cart = array_values($cart);

        session(['cart' => $cart]);

        return back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function batal_produk($product_id)
    {
        if (session()->has('cart')) {
            $cartSession = session()->get('cart');

            if (is_array($cartSession)) {
                $cartSession = array_filter($cartSession, fn($id) => $id != $product_id);

                session()->put('cart', array_values($cartSession));
            }
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

}
