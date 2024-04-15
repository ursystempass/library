<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\ReturnBack;
use App\Models\ReturnDetail;
use Illuminate\Http\Request;

class ReturnDetailController extends Controller
{
    public function index()
    {
        $returnDetails = ReturnDetail::all();
        return view('admin.re-det.index', compact('returnDetails'));
    }

    public function create()
    {
        $returnBacks = ReturnBack::all(); // Ambil semua data return_back
        $borrowings = Borrowing::all(); // Ambil semua data borrowing
        return view('admin.re-det.create', compact('returnBacks','borrowings'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'return_back_id' => 'required|exists:return_backs,id',
        'borrow_id' => 'required|exists:borrowings,id',
        'fine' => 'required|numeric',
    ], [
        'return_back_id.exists' => 'The selected return back id is invalid.',
        'borrow_id.exists' => 'The selected borrow id is invalid.',
    ]);

    ReturnDetail::create($validatedData);

    return redirect()->route('redets.index')->with('success', 'Return Detail created successfully.');
}


    public function show(ReturnDetail $returnDetail)
    {
        return view('redets.show', compact('returnDetail'));
    }

    public function edit(ReturnDetail $returnDetail)
    {
        return view('admin.re-det.edit', compact('returnDetail'));
    }

    public function update(Request $request, ReturnDetail $returnDetail)
{
    $validatedData = $request->validate([
        'return_back_id' => 'required|exists:return_backs,id',
        'borrow_id' => 'required|exists:borrowings,id',
        'fine' => 'required|numeric',
    ]);

    $returnDetail->update($validatedData);

    return redirect()->route('redets.index')->with('success', 'Return Detail updated successfully.');
}


    public function destroy(ReturnDetail $returnDetail)
    {
        $returnDetail->delete();

        return redirect()->route('redets.index')->with('success', 'Return Detail deleted successfully.');
    }
}
