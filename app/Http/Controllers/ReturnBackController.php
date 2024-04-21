<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\ReturnBack;
use Illuminate\Http\Request;

class ReturnBackController extends Controller
{
    public function index()
    {
        $returnBacks = ReturnBack::all();
        $borrowings = Borrowing::all();

        return view('admin.re-back.index', compact('returnBacks', 'borrowings'));
    }

    public function create()
    {
        $borrowings = Borrowing::all();

        return view('admin.re-back.create', compact('borrowings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'borrowing_id' => 'required|exists:borrowings,id',
            'return_date' => 'required|string|max:125',
        ]);

        $returnBack = ReturnBack::create([
            'borrowing_id' => $request->borrowing_id,
            'return_date' => $request->return_date,
        ]);

        return redirect()->route('redets.create', $returnBack->id);
    }
}
