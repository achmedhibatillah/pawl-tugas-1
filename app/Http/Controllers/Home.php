<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;

class Home extends Controller
{
    protected $productsModel;

    public function __construct() {
        $this->productsModel = new ProductsModel();
    }

    public function index() {
        $productsModel = $this->productsModel;
        $productsData = $productsModel->all();

        return
        view('templates/header') . 
        view('templates/navbar-guest') .
        view('home/index') . 
        view('templates/footer');
    }
}
