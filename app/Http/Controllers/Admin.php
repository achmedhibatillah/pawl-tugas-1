<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductsModel;
use App\Models\OrdersModel;

use App\Http\Controllers\Logic;

class Admin extends Controller
{
    protected $productsModel;
    protected $logic;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
        $this->logic = new Logic();
    }

    public function admin()
    {
        return redirect('login-admin');
    }

    public function index()
    {
        if ( !session()->has('is_admin') ) {
            return redirect('/');
        }

        $data = [
            'title' => 'Dashboard Admin',
            'status' => 'dashboard'
        ];

        return 
        view('templates/header', $data) . 
        view('templates/sidebar-admin') .
        view('templates/navbar-admin', $data) .
        view('admin/index') . 
        view('templates/footbar-admin') . 
        view('templates/footer');
    }

    public function atur_orderan()
    {
        if ( !session()->has('is_admin') ) {
            return redirect('/');
        }

        $page = [
            [
                'page_link' => url('atur-orderan'),
                'page_name' => 'Orderan Berlangsung'
            ]
        ];

        $data = [
            'title' => 'Orderan Berlangsung',
            'status' => 'atur_orderan',
            'page' => $page
        ];

        $productsData = ProductsModel::where('product_status', 1)->get();
        $ordersData = OrdersModel::where('order_status', 0)
        ->with(['customer', 'details.product']) // Ambil relasi customer & product dalam order details
        ->join('customers', 'orders.customer_id', '=', 'customers.customer_id') // Join orders dengan customers
        ->get();
    

        // dd($ordersData);

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin') .
        view('templates/navbar-admin', $data) .
        view('admin/atur-orderan', [
            'orders' => $ordersData,
        ]) . 
        view('templates/footbar-admin') . 
        view('templates/footer');
    }

    public function atur_produk($detail = '')
    {
        if ( !session()->has('is_admin') ) {
            return redirect('/');
        }

        if ($detail !== '') {
            $productsData = ProductsModel::where('product_slug', $detail)->first();
            $view = 'admin/produk-detail';
            $page = [
                [
                    'page_link' => url('atur-produk'),
                    'page_name' => 'Manajemen Produk'
                ], [
                    'page_link' => url('atur-produk/' . $productsData->product_slug),
                    'page_name' => $productsData->product_name
                ]
            ];
        } elseif ($detail == '') {
            $productsData = ProductsModel::where('product_status', 1)->get();
            $view = 'admin/produk';
            $page = [
                [
                    'page_link' => url('atur-produk'),
                    'page_name' => 'Manajemen Produk'
                ]
            ];
        }

        $data = [
            'title' => 'Manajemen Produk',
            'status' => 'manajemen_produk',
            'page' => $page
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin') .
        view('templates/navbar-admin', $data) .
        view($view, [
            'products' => $productsData,
        ]) . 
        view('templates/footbar-admin') . 
        view('templates/footer');
    }
}
