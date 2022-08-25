<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PenggunaController extends Controller
{

    public function register()
    {
        return view('pengguna.register-view');
    }

    public function storeregister(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pengguna',
            'password' => 'required|min:5',
        ],[
            'name.required' => 'Nama Wajib Diisi !!',
            'email.required' => 'Email Wajib Diisi !!',
            'email.email' => 'Harap isi email dengan benar !!',
            'email.unique' => 'Email yang anda isi sudah ada !!',
            'password.required' => 'Password wajib diisi !!',
            'password.min' => 'Password minimal 5 karakter !!',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        Pengguna::create($validateData);
        return redirect()->route('loginpengguna')->with('success', 'Registrasi Berhasil!! Silahkan Login');
    }

    public function login()
    {
        return view('pengguna.login-view');
    }

    public function postlogin(Request $request)
    {
         $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ],[
            'email.required' => 'Email Wajib Diisi !!',
            'email.email' => 'Harap isi email dengan benar !!',
            'password.required' => 'Password wajib diisi !!',
        ]);

        if (Auth::guard('pengguna')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/beranda');
        }

        return back()->with('loginError', 'Login gagal !');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('loginpengguna');
    }
}
