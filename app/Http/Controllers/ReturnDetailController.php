<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        ], [
            'returnback_id.exists' => 'Return Back ID tidak valid.',
            'book_id.exists' => 'Book ID tidak valid.',
        ]);

        $returnDetail = new ReturnDetail();
        $returnDetail->returnback_id = $request->returnback_id;
        $returnDetail->book_id = $request->book_id;
        $returnDetail->fine = $request->fine;
        $returnDetail->save();

        // Update status buku menjadi "ready"
        $book = Book::findOrFail($request->book_id);
        $book->status = 'ready';
        $book->save();

        return redirect()->route('rebacks.index')->with('success', 'Detail pengembalian berhasil ditambahkan');
    }

    public function approveReturn($id)
    {
        // Temukan detail pengembalian berdasarkan ID
        $returnDetail = ReturnDetail::findOrFail($id);

        // Lakukan logika persetujuan pengembalian di sini, misalnya mengubah status atau melakukan tindakan lainnya.

        // Setelah itu, Anda dapat mengarahkan pengguna ke halaman yang sesuai, misalnya, halaman indeks pengembalian
        return redirect()->route('redets.index')->with('success', 'Pengembalian berhasil disetujui');
    }
}
