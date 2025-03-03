<?php

use App\Http\Controllers\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('menu', [Products::class, 'getJson']);
Route::get('menu-detail/{slug}', [Products::class, 'getJsonDetail']);