<?php

namespace App\Http\Controllers;

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
        $borrowCode = $this->generateBorrowCode(); // Generate kode peminjaman otomatis
        return view('admin.borrowing.create', compact('users', 'borrowCode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'borrow_code' => 'required',
            'user_id' => 'required|exists:users,id',
            'borrow_date' => 'required',
        ]);

        Borrowing::create($request->all());

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
}

