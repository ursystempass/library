<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nis' => 'required|string',
            'password' => 'required|string',
        ]);

        // Periksa apakah pengguna dengan NIS yang diberikan ada dalam database
        $user = User::where('nis', $request->nis)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['message' => 'User not found. Please register first.']);
        }

        // Jika pengguna ditemukan, lanjutkan dengan mencoba login
        $credentials = $request->only('nis', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/dashboard');
            } else {
                return redirect('/greeting');
            }
        } else {
            // Jika login gagal
            return redirect()->back()->withErrors(['message' => 'Login failed. Please check your credentials.']);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
