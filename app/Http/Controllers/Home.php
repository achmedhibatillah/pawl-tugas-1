<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\CustomersModel;
use App\Models\OrdersModel;
use App\Models\OrdersDetailModel;

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
        $total_price = 0;
        if (session()->has('cart')) {
            $cartSession = session()->get('cart');
        
            if (is_array($cartSession)) {
                $cartSession = array_filter($cartSession, fn($id) => is_numeric($id));
                
                $cartCount = array_count_values($cartSession);
        
                $cart = $productsData->whereIn('product_id', array_keys($cartCount))->map(function ($product) use ($cartCount) {
                    $product->qty = $cartCount[$product->product_id] ?? 1;
                    return $product;
                });
            }

            foreach($cart as $x) {
                $total_price += $x->product_price * $x->qty;
            }
        }
            
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

    public function pesanan() 
    {
        $data = [
            'status' => 'pesanan',
            'ses'=> $this->ses()
        ];

        $customerData = $this->ses();
        $productsData = ProductsModel::where('product_status', 1)->get();
        $ordersData = OrdersModel::where('customer_id', $customerData->customer_id)
        ->where('order_status', 0)
        ->with(['details.product'])
        ->get();

        return
        view('templates/header') . 
        view('templates/navbar-guest', $data) .
        view('home/pesanan', [
            'products' => $productsData,
            'orders' => $ordersData,
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
