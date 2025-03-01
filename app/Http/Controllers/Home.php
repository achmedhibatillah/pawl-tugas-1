<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;

class Home extends Controller
{
    public function index() 
    {
        $productsData = ProductsModel::all();

        return
        view('templates/header') . 
        view('templates/navbar-guest') .
        view('home/index', [
            'products' => $productsData,
        ]) . 
        view('templates/footer');
    }

    public function menu() 
    {
        $productsData = ProductsModel::all();

        return
        view('templates/header') . 
        view('templates/navbar-guest') .
        view('home/menu', [
            'products' => $productsData,
        ]) . 
        view('templates/footer');
    }
}
