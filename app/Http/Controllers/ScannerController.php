<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Book;

class ScannerController extends Controller
{
    public function index()
    {
        $borrow = Borrowing::all(); // Mengambil semua data peminjaman
        return view('admin.scan.scanner', compact('borrow'));
    }


    public function scan(Request $request)
    {
        $borrowingCode = $request->input('borrowing_code');
        $borrow = Borrowing::where('borrow_code', $borrowingCode)->first();

        if (!$borrow) {
            return redirect()->back()->with('error', 'Kode peminjaman tidak valid.');
        }

        // Update status peminjaman menjadi 'borrow'
        $borrow->status = 'borrow';
        $borrow->save();

        // Update status buku yang dipinjam menjadi 'borrow'
        $borrowingDetails = $borrow->details;
        foreach ($borrowingDetails as $detail) {
            $book = Book::find($detail->book_id);
            $book->status = 'borrow';
            $book->save();
        }

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

}
