<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $books = Book::all(); // Mengambil semua buku dari database
        return view('member.catalog', ['books' => $books]);
    }
}
