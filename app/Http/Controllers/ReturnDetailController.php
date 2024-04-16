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
        return view('re-det.index', compact('returnDetails'));
    }

    public function create()
    {
        $returnBacks = ReturnBack::all(); // Ambil semua data return_back
        $borrowings = Borrowing::all(); // Ambil semua data borrowing
        return view('re-det.create', compact('returnBacks','borrowings'));
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
    
        // Periksa apakah 'return_back_id' dan 'borrow_id' ada dalam $validatedData
        if (isset($validatedData['return_back_id']) && isset($validatedData['borrow_id'])) {
            ReturnDetail::create($validatedData);
            return redirect()->route('redets.index')->with('success', 'Return Detail created successfully.');
        } else {
            // Jika 'return_back_id' atau 'borrow_id' tidak ada dalam $validatedData
            return back()->withInput()->withErrors(['error' => 'Please select a valid return back and borrowing.']);
        }
    }
    


    public function show(ReturnDetail $returnDetail)
    {
        return view('redets.show', compact('returnDetail'));
    }

    public function edit(ReturnDetail $returnDetail)
    {
        return view('re-det.edit', compact('returnDetail'));
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