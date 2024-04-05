<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use App\Models\BorrowingDetail;
use Illuminate\Database\QueryException;

class BorrowingDetailController extends Controller
{
    public function index()
    {
        $borrowingDetails = BorrowingDetail::with('book')->get();
        return view('admin.borrowing-detail.index', compact('borrowingDetails'));
    }

    public function create()
    {
        $borrowings = Borrowing::all();
        $books = Book::all();
        return view('admin.borrowing-detail.create', compact('borrowings', 'books'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'borrowing_id' => 'required|numeric',
                'book_id' => 'required|numeric',
                'return_date' => 'required|date',
                'book_condition' => 'required|string|max:125',
            ]);

            BorrowingDetail::create($request->all());

            return redirect()->route('borrowingdetails.index')
                ->with('success', 'Borrowing detail created successfully.');
        } catch (QueryException $e) {
            return back()->withInput()->withErrors(['error' => 'Failed to create borrowing detail. Please try again later.']);
        }
    }
    public function edit($id)
    {
        $borrowingDetail = BorrowingDetail::findOrFail($id);
        $borrowings = Borrowing::all();
        $books = Book::all();
        return view('admin.borrowing-detail.edit', compact('borrowingDetail', 'borrowings', 'books'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'borrowing_id' => 'required|numeric',
            'book_id' => 'required|numeric',
            'return_date' => 'required|date',
            'book_condition' => 'required|string|max:125',
        ]);

        $borrowingDetail = BorrowingDetail::findOrFail($id);
        $borrowingDetail->update($request->all());

        return redirect()->route('borrowingdetails.index')
            ->with('success', 'Borrowing detail updated successfully.');
    }

    public function destroy($id)
{
    $borrowingDetail = BorrowingDetail::findOrFail($id);
    $borrowingDetail->delete();

    return redirect()->route('borrowingdetails.index')
        ->with('success', 'Borrowing detail deleted successfully.');
}

}
