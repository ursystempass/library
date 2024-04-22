<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Book;

class ScanController extends Controller
{
    public function index(Request $request)
    {
        // Validasi request
        $request->validate([
            'borrowing_id' => 'required|exists:borrowings,id',
        ]);

        // Dapatkan data peminjaman berdasarkan ID
        $borrowing = Borrowing::findOrFail($request->borrowing_id);

        // Periksa apakah status peminjaman adalah 'booking'
        if ($borrowing->status === 'booking') {
            // Ubah status peminjaman menjadi 'borrow'
            $borrowing->status = 'borrow';
            $borrowing->save();

            // Dapatkan data buku yang dipinjam
            $book = $borrowing->details()->first()->book;

            // Periksa apakah status buku adalah 'booking'
            if ($book->status === 'booking') {
                // Ubah status buku menjadi 'borrow'
                $book->status = 'borrow';
                $book->save();
            }

            // Kirim respon sukses
            return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
        }

        // Kirim respon jika status peminjaman bukan 'booking'
        return response()->json(['success' => false, 'message' => 'Borrowing status is not booking.']);
    }
}
