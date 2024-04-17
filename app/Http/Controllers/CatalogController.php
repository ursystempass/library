<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index()
    {
        $books = Book::all(); // Mengambil semua data buku dari database
        return view('member.catalog', compact('books'));
    }
    public function greeting()
    {
        // Anda dapat menyesuaikan logika di sini sesuai dengan kebutuhan
        return view('member.greeting');
    }


    public function showDescription($id)
    {
        $book = Book::findOrFail($id);
        return view('member.desc', compact('book'));
    }


}
