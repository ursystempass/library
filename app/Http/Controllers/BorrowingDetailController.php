<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use App\Models\BorrowingDetail;
use Illuminate\Database\QueryException;

class BorrowingDetailController extends Controller
{
    public function index()
    {
        $borrowingDetails = BorrowingDetail::with('borrowing.book')->get();
        return view('admin.borrowing-detail.index', compact('borrowingDetails'));
    }


    public function create(Request $request)
    {
        $borrowingId = $request->input('borrowing_id');
        $selectedBorrowing = Borrowing::findOrFail($borrowingId);

        // Dapatkan semua buku yang belum dipinjam sebelumnya
        $books = Book::where('status', '!=', 'borrow')->get();

        $dueDate = now()->addDays(3)->toDateString();

        return view('admin.borrowing-detail.create', compact('selectedBorrowing', 'dueDate', 'books'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'borrowing_id' => 'required|numeric',
            'book_id' => 'required|numeric|exists:books,id',
            'book_condition' => 'required|string|in:good,damaged',
            'type' => 'required|string|in:personal,monthly,annual',
        ]);

        try {
            // Periksa apakah buku sudah dipinjam sebelumnya
            $bookId = $request->input('book_id');
            $existingBorrowingDetail = BorrowingDetail::where('book_id', $bookId)->first();
            if ($existingBorrowingDetail) {
                return back()->withInput()->withErrors(['error' => 'Buku ini sudah dipinjam sebelumnya.']);
            }

            // Buat detail peminjaman baru
            $borrowingDetail = new BorrowingDetail();
            $borrowingDetail->borrowing_id = $request->input('borrowing_id');
            $borrowingDetail->book_id = $bookId;
            $borrowingDetail->book_condition = $request->input('book_condition');
            $borrowingDetail->type = $request->input('type');
            $borrowingDetail->save();

            // Perbarui status buku menjadi 'borrow'
            $book = Book::findOrFail($bookId);
            $book->status = 'borrow';
            $book->save();

            // Perbarui status peminjaman menjadi 'borrowed'
            $borrowingId = $request->input('borrowing_id');
            $borrowing = Borrowing::findOrFail($borrowingId);
            $borrowing->status = 'borrow';
            $borrowing->save();

            // Redirect ke halaman borrowing.index setelah penyimpanan berhasil
            return redirect()->route('borrowings.index')->with('success', 'Detail peminjaman berhasil dibuat.');

        } catch (\Exception $e) {
            // Tangani kesalahan penyimpanan data
            return back()->withInput()->withErrors(['error' => 'Gagal membuat detail peminjaman. Silakan coba lagi nanti.']);
        }
    }
    public function destroy($id)
    {
        $borrowingDetail = BorrowingDetail::findOrFail($id);
        $borrowingDetail->delete();

        return redirect()->route('borrowingdetails.index')
            ->with('success', 'Borrowing detail deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:borrow',
        ]);

        $borrowingDetail = BorrowingDetail::findOrFail($id);
        $borrowingDetail->type = $request->type;
        $borrowingDetail->save();

        return redirect()->route('borrowingdetails.index')->with('success', 'Status updated successfully.');
    }

}
