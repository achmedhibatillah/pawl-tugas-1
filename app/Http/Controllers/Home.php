<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\CustomersModel;

class Home extends Controller
{
    public function index() 
    {
        $data = [
            'status' => 'index',
            'ses'=> $this->ses()
        ];

        $productsData = ProductsModel::where('product_status', 1)->get();

        return
        view('templates/header') . 
        view('templates/navbar-guest', $data) .
        view('home/index', [
            'products' => $productsData,
        ]) . 
        view('templates/footer');
    }

    public function menu(Request $request) 
    {
        $data = [
            'status' => 'menu',
            'ses'=> $this->ses()
        ];

        // dd(session()->get('cart'));

        $productsData = ProductsModel::where('product_status', 1);
    
        if ($request->has('k') && !empty($request->k)) {
            $productsData = $productsData->where('product_name', 'like', "%{$request->k}%");
        }
    
        $productsData = $productsData->get();
    
        if ($request->ajax()) {
            return view('home.menu-search', [
                'products' => $productsData,
                'k' => $request->k
            ]);
        }

        $cart = null;
        if (session()->has('cart')) {
            $cartSession = session()->get('cart');
        
            // Pastikan $cartSession adalah array satu dimensi berisi ID produk (integer atau string)
            if (is_array($cartSession)) {
                $cartSession = array_filter($cartSession, fn($id) => is_numeric($id)); // Buang nilai non-numerik
                
                $cartCount = array_count_values($cartSession); // Hitung jumlah produk berdasarkan ID
        
                $cart = $productsData->whereIn('product_id', array_keys($cartCount))->map(function ($product) use ($cartCount) {
                    $product->qty = $cartCount[$product->product_id] ?? 1; // Tambahkan qty berdasarkan jumlah kemunculan
                    return $product;
                });
            }

            $total_price = 0;
            foreach($cart as $x) {
                $total_price += $x->product_price * $x->qty;
            }
        }

        // dd($cart);
            
        return 
        view('templates/header') . 
        view('templates/navbar-guest', $data) .
        view('home.menu', [
            'products' => $productsData,
            'cart' => $cart,
            'total_price' => $total_price,
            'k' => $request->k
        ]) . 
        view('templates/footer');
    }  
    
    public function ses()
    {
        if (session()->has('is_user')) {
            return CustomersModel::where('customer_id', session()->get('customer_id'))->first();
        }

        return null;
    }
}
