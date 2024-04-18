<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowing = Borrowing::with('user')->get();
        return view('admin.borrowing.index', compact('borrowing'));
    }

    public function create()
    {
        $users = User::all();
        $books = Book::all();
        $borrowCode = $this->generateBorrowCode(); // Generate kode peminjaman otomatis

        // Mendapatkan tanggal saat ini
        $borrowDate = now()->toDateString();

        return view('admin.borrowing.create', compact('users', 'borrowCode', 'borrowDate', 'books'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'borrow_code' => 'required',
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);

        $borrowDate = Carbon::now()->toDateString(); // Ambil tanggal saat ini
        $request->merge(['borrow_date' => $borrowDate]);

        // Menyimpan Borrowing dengan book_id
        $borrowing = new Borrowing();
        $borrowing->borrow_code = $request->borrow_code;
        $borrowing->user_id = $request->user_id;
        $borrowing->borrow_date = $borrowDate;
        $borrowing->book_id = $request->book_id;
        $borrowing->save();

        return redirect()->route('borrowings.index')->with('success', 'Borrowing created successfully.');
    }

    private function generateBorrowCode()
    {
        $latestBorrow = Borrowing::latest()->first(); // Dapatkan data peminjaman terbaru
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
        return view('admin.borrowing.edit', compact('borrowing', 'users', 'books'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'borrow_code' => 'required',
            'user_id' => 'required|exists:users,id',
            'borrow_date' => 'required',
        ]);

        $borrowing = Borrowing::findOrFail($id);
        $borrowing->update($request->all());

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

    public function scan(Request $request)
{
    try {
        $borrowCode = $request->input('borrow_code');
        $bookCode = $request->input('book_code');
        $borrowing = Borrowing::where('borrow_code', $borrowCode)->first();

        // Mencari buku berdasarkan kode buku
        $book = Book::where('book_code', $bookCode)->first();

        // Memeriksa apakah peminjaman dan buku ditemukan
        if ($borrowing && $book) {
            // Mengaitkan buku dengan peminjaman
            $borrowing->books()->attach($book->id);

            return redirect()->route('borrowings.index')->with('success', 'Buku berhasil ditambahkan ke peminjaman.');
        } else {
            // Jika peminjaman atau buku tidak ditemukan
            return redirect()->back()->with('error', 'Peminjaman atau buku tidak ditemukan.');
        }
    } catch (\Exception $e) {
        // Menangani kesalahan jika terjadi
        return redirect()->back()->with('error', 'Terjadi kesalahan dalam pemindaian.');
    }
}
    public function scanReservation(Request $request)
    {
        // Mengambil kode peminjaman dari request
        $borrowCode = $request->input('borrow_code');

        // Melakukan validasi input
        $request->validate([
            'borrow_code' => 'required|exists:borrowings,borrow_code',
        ]);

        // Mendapatkan data peminjaman berdasarkan kode peminjaman
        $borrowing = Borrowing::where('borrow_code', $borrowCode)->first();

        // Jika data peminjaman ditemukan
        if ($borrowing) {
            // Lakukan logika yang sesuai, misalnya menampilkan halaman reserv-scan
            // Anda bisa menambahkan logika lainnya di sini sesuai kebutuhan

            // Misalnya, jika Anda ingin mengembalikan halaman view reserv-scan
            return view('reserv-scan', compact('borrowing'));
        } else {
            // Jika tidak ditemukan, kembalikan dengan pesan error
            return redirect()->back()->with('error', 'Reservation not found.');
        }
    }

}

