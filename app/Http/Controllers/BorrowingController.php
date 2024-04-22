<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use App\Models\BorrowingDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

        return redirect()->route('borrowingdetails.create', ['borrowing_id' => $borrowing->id])->with('success', 'Borrowing created successfully.');
    }

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


    public function borrowBook($bookId)
    {
        // Memulai transaksi database
        DB::beginTransaction();

        try {
            // Check if the user is logged in
            if (!Auth::check()) {
                throw new \Exception('Anda harus login untuk melakukan peminjaman.');
            }

            // Get the ID of the currently logged in user
            $userId = Auth::id();

            // Check if the user exists
            $user = User::find($userId);
            if (!$user) {
                throw new \Exception('Pengguna tidak valid.');
            }

            // Create a new borrowing with 'booking' status
            $borrowing = new Borrowing();
            $borrowing->borrow_code = $this->generateBorrowCode();
            $borrowing->user_id = $userId;
            $borrowing->borrow_date = now()->toDateString();
            $borrowing->due_date = now()->addDays(3)->toDateString(); // Add 3 days from the borrowing date
            $borrowing->status = 'booking';
            $borrowing->save();

            // Update the book status to 'booking'
            $book = Book::findOrFail($bookId);
            $book->status = 'booking';
            $book->save();

            // Create borrowing detail for the borrowed book
            $borrowingDetail = new BorrowingDetail();
            $borrowingDetail->borrowing_id = $borrowing->id;
            $borrowingDetail->book_id = $bookId;
            $borrowingDetail->book_condition = 'good'; // Default condition
            $borrowingDetail->type = 'personal'; // Default type
            $borrowingDetail->save();

            // Commit transaksi jika semua operasi berhasil
            DB::commit();

            // Redirect or provide response as needed
            return redirect()->route('member.catalog')->with('success', 'Buku berhasil dipinjam.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            return redirect()->route('login')->with('error', $e->getMessage());
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
    public function generateBorrowQR($borrowId)
    {
        // Ambil data peminjaman berdasarkan ID
        $borrow = Borrowing::find($borrowId);

        if (!$borrow) {
            // Handle jika peminjaman tidak ditemukan
            return response()->json(['error' => 'Peminjaman tidak ditemukan'], 404);
        }

        // Generate QR code dengan ID peminjaman
        $qrCodePath = public_path('images/qrborrow/'.$borrow->id.'.png');
        QRcode::png($borrow->id, $qrCodePath);

        // Mengembalikan path gambar QR code
        return $qrCodePath;
    }


}
