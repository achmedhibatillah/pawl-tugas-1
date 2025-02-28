<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
    public function login_admin()
    {
        return 
        view('templates/header') . 
        view('auth/login-admin') . 
        view('templates/footer');
    }

    public function authentication_admin(Request $request)
    {
        $request->validate([
            'key_admin' => 'required'
        ], [
            'key_admin' => [
                'required' => 'Sandi autentikasi wajib diisi.'
            ]
        ]);

        if ($request->key_admin === env('ADMIN_SECRET_KEY')) {
            session(['is_admin' => true]);
            return redirect()->intended('dashboard-admin');
        }

        return back()->withErrors(['key_admin' => 'Sandi autentikasi salah!'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
