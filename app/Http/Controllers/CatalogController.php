<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Setting;
use App\Models\Type; // Import model Type
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index()
    {
        $books = Book::all(); // Mengambil semua data buku dari database
        $setting = Setting::all(); // Mengambil semua data buku dari database
        $types = Type::all(); // Mengambil semua data jenis buku dari database
        return view('member.catalog', compact('books', 'types', 'setting')); // Mengirim data buku dan jenis buku ke tampilan
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
