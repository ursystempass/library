<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\books;
use App\Models\User;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBuku = Book::count();
        $jumlahAnggota = User::where('role', 'member')->count();
        $jumlahPeminjaman = Borrowing::count();
        $jumlahPengembalian = Borrowing::where('status', 'return')->count();
        $dataPengembalian = Borrowing::with('user', 'buku')->where('status', 'return')->get();

        return view('admin.index', compact('jumlahBuku', 'jumlahAnggota', 'jumlahPeminjaman', 'jumlahPengembalian', 'dataPengembalian'));
    }
}
