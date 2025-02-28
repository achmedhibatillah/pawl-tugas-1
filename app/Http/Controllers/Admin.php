<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index()
    {
        return 
        view('templates/header') . 
        view('admin/index') . 
        view('templates/footer');
    }
}
