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

 
}
