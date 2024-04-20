<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nis', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, redirect sesuai peran pengguna
            if (Auth::user()->role === 'admin') {   
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('catalog.greeting');
            }
        }

        // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}