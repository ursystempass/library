<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Mengambil pengaturan situs
        $setting = Setting::first();

        // Menghitung jumlah buku
        $jumlah_buku = Book::count();

        // Menghitung jumlah peminjaman
        $jumlah_peminjaman = Borrowing::count();

        // Menghitung jumlah anggota (user dengan role member)
        $jumlah_anggota = User::where('role', 'member')->count();

        return view('welcome', compact('setting', 'jumlah_buku', 'jumlah_peminjaman', 'jumlah_anggota'));
    }
}
