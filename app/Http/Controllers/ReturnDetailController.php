<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\ReturnBack;
use App\Models\ReturnDetail;
use Illuminate\Http\Request;

class ReturnDetailController extends Controller
{
    public function index()
    {
        $returnDetails = ReturnDetail::all();
        return view('re-det.index', compact('returnDetails'));
    }

    public function create()
    {
        $returnbacks = ReturnBack::all();
        $books = Book::all();

        return view('re-det.create', compact('returnbacks', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'returnback_id' => 'required|exists:return_backs,id',
            'book_id' => 'required|exists:books,id',
            'fine' => 'required|string',
        ]);

        // Create new ReturnDetail
        $returnDetail = ReturnDetail::create($request->all());

        // Update status buku kembali menjadi "ready"
        $book = Book::findOrFail($request->book_id);
        $book->status = 'ready';
        $book->save();

        return redirect()->route('rebacks.index');
    }
}

