<?php

use Illuminate\Support\Facades\Route;

use App\Http\Kernel;

use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Authentication;

Route::get('/', [Home::class, 'index']);

Route::get('login-admin', [Authentication::class, 'login_admin']);
Route::post('authentication-admin', [Authentication::class, 'authentication_admin'])->middleware('guest');
Route::post('logout', [Authentication::class, 'logout']);

Route::get('dashboard-admin', [Admin::class, 'index'])->middleware('admin');