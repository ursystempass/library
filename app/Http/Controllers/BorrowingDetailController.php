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
        $borrowingId = $request->input('borrowing_id'); // Mendapatkan ID peminjaman dari URL

        $selectedBorrowing = Borrowing::findOrFail($borrowingId);
        $dueDate = now()->addDays(3)->toDateString();

        return view('admin.borrowing-detail.create', compact('selectedBorrowing', 'dueDate'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'borrowing_id' => 'required|numeric',
                'book_condition' => 'required|string|max:125',
                'type' => 'required|in:personal,monthly,annual',
            ]);

            $borrowing = Borrowing::findOrFail($request->borrowing_id);
            $dueDate = Carbon::parse($borrowing->borrow_date)->addDays(3);

            $data = $request->all();
            $data['due_date'] = $dueDate;

            BorrowingDetail::create($data);

            return redirect()->route('borrowings.index')->with('success', 'Borrowing detail created successfully.');
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
            'type' => 'required|in:personal,monthly,annual',

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
