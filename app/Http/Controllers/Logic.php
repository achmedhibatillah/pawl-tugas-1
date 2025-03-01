<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class Logic extends Controller
{
    public function generateUniqueId($table, $column, $length = 8) {
        do {
            $randomId = random_int(pow(10, $length - 1), pow(10, $length) - 1);
        } while (DB::table($table)->where($column, $randomId)->exists());
    
        return $randomId;
    }
}
