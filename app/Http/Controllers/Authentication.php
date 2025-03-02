<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Logic;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
    protected $logic;

    public function __construct()
    {
        $this->logic = new Logic();
    }

    public function login_user()
    {
        return 
        view('templates/header') . 
        view('auth/login-user') . 
        view('templates/footer');
    }

    public function authentication_user(Request $request)
    {
        $request->validate([
            'customer_email' => 'required|email',
            'customer_pass'  => 'required',
        ], [
            'customer_email.required' => 'Email wajib diisi.',
            'customer_email.email'    => 'Format email tidak valid.',

            'customer_pass.required'  => 'Sandi wajib diisi.',
        ]);

        $customer = CustomersModel::where('customer_email', $request->customer_email)->first();

        // Periksa password
        if ($customer && Hash::check($request->customer_pass, $customer->customer_pass)) {
            session([
                'is_user'      => true,
                'customer_id' => $customer->customer_id,
            ]);
    
            return redirect()->to('dashboard')->with('success', 'Login berhasil!');
        }
    
        return back()->with('errors-auth', 'Autentikasi gagal, ulangi lagi.')->withInput();
    }

    public function registrasi_user()
    {
        return 
        view('templates/header') . 
        view('auth/registrasi-user') . 
        view('templates/footer');
    }

    public function verification_user(Request $request)
    {
        $logic = $this->logic;

        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|unique:customers,customer_email',
            'customer_pass'  => 'required|min:6|confirmed',
        ], [
            'customer_name.required'  => 'Nama lengkap wajib diisi.',
            'customer_name.string'    => 'Nama lengkap harus berupa teks.',
            'customer_name.max'       => 'Nama lengkap maksimal 255 karakter.',

            'customer_email.required' => 'Email wajib diisi.',
            'customer_email.email'    => 'Format email tidak valid.',
            'customer_email.unique'   => 'Email sudah terdaftar.',

            'customer_pass.required'  => 'Sandi wajib diisi.',
            'customer_pass.min'       => 'Sandi minimal 6 karakter.',
            'customer_pass.confirmed' => 'Konfirmasi sandi tidak cocok.',
        ]);

        $data = [
            'customer_id' => $logic->generateUniqueId('customers', 'customer_id'),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_pass' => Hash::make($request->customer_pass),
        ];

        CustomersModel::create($data);

        return redirect()->to('login')->with('success-auth', 'Registrasi berhasil! Silakan login.');
    }


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
