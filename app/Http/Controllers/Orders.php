<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Logic;

use App\Models\ProductsModel;
use App\Models\OrdersModel;
use App\Models\OrdersDetailModel;

class Orders extends Controller
{
    protected $logic;

    public function __construct()
    {
        $this->logic = new Logic();
    }

    public function pesan()
    {
        $productModel = new ProductsModel();
        $logic = $this->logic;

        $productsData = ProductsModel::where('product_status', 1);
        $productsData = $productsData->get();
    
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

        $dataOrders = [
            'order_id' => $logic->generateUniqueId('orders', 'order_id'),
            'order_status' => 0,
            'order_total' => $total_price,
            'customer_id' => session()->get('customer_id'),
        ];

        $order = OrdersModel::create($dataOrders);
        $order_id = $order->order_id;        

        foreach($cart as $x) {
            $dataOd = [
                'od_id' => $logic->generateUniqueId('orders_detail', 'od_id'),
                'order_id' => $order_id,
                'product_id' => $x->product_id,
                'od_qty' => $x->qty,
            ];
            OrdersDetailModel::create($dataOd);
        }

        return redirect()->to('pesanan');
    }
}
