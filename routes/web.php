<?php

use Illuminate\Support\Facades\Route;

use App\Http\Kernel;

use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Users;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Products;
use App\Http\Controllers\Orders;

Route::get('/', [Home::class, 'index']);
Route::get('d', [Authentication::class, 'destroy']);

Route::get('menu', [Home::class, 'menu']);

Route::get('login', [Authentication::class, 'login_user']);
Route::get('registrasi', [Authentication::class, 'registrasi_user']);
Route::post('verification-user', [Authentication::class, 'verification_user']);
Route::post('authentication-user', [Authentication::class, 'authentication_user']);

Route::get('pilih-produk-{slug}', [Products::class, 'pilih_produk']);
Route::get('batal-pilih-produk-{slug}', [Products::class, 'batal_produk']);
Route::get('tambah-produk-{slug}', [Products::class, 'tambah_produk']);
Route::get('kurang-produk-{slug}', [Products::class, 'kurang_produk']);

Route::get('pesan-keranjang', [Orders::class, 'pesan']);
Route::get('pesanan', [Home::class, 'pesanan']);

Route::get('dashboard', [Users::class, 'index']);

// ADMIN
Route::get('login-admin', [Authentication::class, 'login_admin']);
Route::get('admin', [Admin::class, 'admin']);
Route::post('authentication-admin', [Authentication::class, 'authentication_admin']);
Route::post('logout', [Authentication::class, 'logout']);

Route::get('dashboard-admin', [Admin::class, 'index']);
Route::get('atur-orderan', [Admin::class, 'atur_orderan']);

Route::get('atur-produk', [Admin::class, 'atur_produk']);
Route::get('atur-produk/{slug}', [Admin::class, 'atur_produk']);
Route::post('tambah-produk', [Products::class, 'add']);
Route::post('update-produk', [Products::class, 'update']);
Route::post('hapus-produk', [Products::class, 'delete']);