<?php

use Illuminate\Support\Facades\Route;

use App\Http\Kernel;

use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Products;

Route::get('/', [Home::class, 'index']);

Route::get('menu', [Home::class, 'menu']);

// ADMIN
Route::get('login-admin', [Authentication::class, 'login_admin']);
Route::get('admin', [Admin::class, 'admin']);
Route::post('authentication-admin', [Authentication::class, 'authentication_admin'])->middleware('guest');
Route::post('logout', [Authentication::class, 'logout']);

Route::get('dashboard-admin', [Admin::class, 'index']);
Route::get('atur-orderan', [Admin::class, 'atur_orderan']);

Route::get('atur-produk', [Admin::class, 'atur_produk']);
Route::get('atur-produk/{slug}', [Admin::class, 'atur_produk']);
Route::post('tambah-produk', [Products::class, 'add']);
Route::post('update-produk', [Products::class, 'update']);
Route::post('hapus-produk', [Products::class, 'delete']);