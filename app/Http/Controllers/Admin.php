<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductsModel;

class Admin extends Controller
{
    protected $productsModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
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

        $data = [
            'title' => 'Orderan Berlangsung',
            'status' => 'atur_orderan'
        ];

        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin') .
        view('templates/navbar-admin', $data) .
        view('admin/atur-orderan') . 
        view('templates/footbar-admin') . 
        view('templates/footer');
    }

    public function atur_produk()
    {
        if ( !session()->has('is_admin') ) {
            return redirect('/');
        }

        $data = [
            'title' => 'Manajemen Produk',
            'status' => 'manajemen_produk'
        ];

        $productsData = ProductsModel::where('product_status', 1)->get();


        return
        view('templates/header', $data) . 
        view('templates/sidebar-admin') .
        view('templates/navbar-admin', $data) .
        view('admin/produk', [
            'products' => $productsData,
        ]) . 
        view('templates/footbar-admin') . 
        view('templates/footer');
    }
}
