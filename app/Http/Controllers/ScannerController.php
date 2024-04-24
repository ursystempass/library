<?php

namespace App\Http\Controllers;

use Exception;
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
            return response()->json('Kode peminjaman tidak valid.', 500);
        }

        // Update status peminjaman menjadi 'borrow'
        $borrow->status = 'borrow';
        $borrow->save();

        // Update status buku yang dipinjam menjadi 'borrow'
        $borrowingDetails = $borrow->borrowingDetails;
        foreach ($borrowingDetails as $detail) {
            $book = Book::find($detail->book_id);
            $book->status = 'borrow';
            $book->save();
        }

        return response()->json('Status berhasil diperbarui.');
    }

}
