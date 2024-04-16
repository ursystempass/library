<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index()
    {
        $groupedBooks = Book::select('title', DB::raw('COUNT(*) as total_books'))
                        ->groupBy('title')
                        ->get();

        return view('member.catalog', ['groupedBooks' => $groupedBooks]);
    }
    public function showDescription($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return redirect()->route('member.catalog')->with('error', 'Book not found');
        }

        return view('member.desc', ['book' => $book]);
    }
}
