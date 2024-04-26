<?php

namespace App\Http\Controllers;

use App\Models\Book;
use BarcodeGenerator;
use App\Models\Setting;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Type; // Import model Type

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

    public function showBooksByType($type_id)
    {
        $books = Book::where('type_id', $type_id)->get();
        return view('member.book_type', compact('books'));
    }
    public function listBorrowedBooks()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        $borrowing = Borrowing::all();
        $borrowedBooks = Book::whereHas('borrowingDetails.borrowing', function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->whereIn('status', ['booking', 'borrow']);
        })->get();

        return view('member.list-borrowing', compact('borrowedBooks', 'borrowing'));
    }


}
