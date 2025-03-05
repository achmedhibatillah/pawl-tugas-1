<?php

use App\Http\Controllers\Orders;
use App\Http\Controllers\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('menu', [Products::class, 'getJson']);
Route::get('menu-detail/{slug}', [Products::class, 'getJsonDetail']);
Route::post('add-menu', [Products::class, 'api_add']);
Route::put('update-menu', [Products::class, 'api_update']);
Route::delete('delete-menu', [Products::class, 'api_delete']);
Route::get('orders', [Orders::class, 'getJson']);