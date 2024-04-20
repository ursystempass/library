<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowing = Borrowing::all();
        return view('admin.borrowing.index', compact('borrowing'));
    }

    public function create()
    {
        $users = User::all();
        $books = Book::all();
        $borrowCode = $this->generateBorrowCode();
        $borrowDate = now()->toDateString();

        return view('admin.borrowing.create', compact('users', 'books', 'borrowCode', 'borrowDate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'borrow_date' => 'required|date',
        ]);

        // Menambahkan logika untuk mengatur due_date 3 hari setelah borrow_date
        $borrowDate = Carbon::parse($request->borrow_date);
        $dueDate = $borrowDate->addDays(3)->toDateString(); // Menggunakan addDays() untuk menambahkan 3 hari
        // End logika

        $borrowing = new Borrowing();
        $borrowing->borrow_code = $this->generateBorrowCode();
        $borrowing->user_id = $request->user_id;
        $borrowing->borrow_date = $borrowDate;
        $borrowing->due_date = $dueDate; // Menyimpan hasil due_date yang sudah diatur
        $borrowing->save();

        return redirect()->route('borrowingdetails.create', ['borrowing_id' => $borrowing->id])->with('success', 'Borrowing created successfully.');    }

    // Method lain tetap sama

    private function generateBorrowCode()
    {
        $latestBorrow = Borrowing::latest()->first();
        if ($latestBorrow) {
            $latestBorrowCode = $latestBorrow->borrow_code;
            $latestBorrowNumber = intval(substr($latestBorrowCode, 10));
            $newBorrowNumber = $latestBorrowNumber + 1;
            return "CODEPINJAM$newBorrowNumber";
        } else {
            return "CODEPINJAM1";
        }
    }

    public function edit($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $users = User::all();
        $books = Book::all();
        return view('admin.borrowing.edit', compact('borrowing', 'users', 'books'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);

        $borrowing = Borrowing::findOrFail($id);
        $borrowing->user_id = $request->user_id;
        $borrowing->save();

        // Update detail peminjaman (bisa disesuaikan dengan kebutuhan)
        $borrowingDetail = $borrowing->details()->first();
        $borrowingDetail->book_id = $request->book_id;
        // Tambahkan informasi detail peminjaman lainnya sesuai kebutuhan
        $borrowingDetail->save();

        return redirect()->route('borrowings.index')->with('success', 'Borrowing updated successfully.');
    }

    public function destroy($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Borrowing deleted successfully.');
    }

    public function approveBooking($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->setStatus('borrow');

        // Lakukan pembaruan stok buku di sini jika diperlukan
        // Misalnya, mengurangi jumlah buku yang tersedia setelah peminjaman dibuat

        return redirect()->route('borrowings.index')->with('success', 'Booking approved successfully.');
    }
}
