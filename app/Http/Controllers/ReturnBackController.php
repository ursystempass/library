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

        // Ambil ID pengembalian yang baru saja dibuat
        $returnBackId = $returnBack->id;

        // Redirect ke halaman pembuatan detail pengembalian dengan menyertakan ID pengembalian
        return redirect()->route('redets.create', ['return_details_id' => $returnBackId])->with('success', 'Return back created successfully.');
    }



public function destroy($id)
    {
        // Temukan data pengembalian berdasarkan ID
        $returnBack = ReturnBack::findOrFail($id);

        // Hapus data pengembalian
        $returnBack->delete();

        // Redirect ke halaman indeks pengembalian dengan pesan sukses
        return redirect()->route('rebacks.index')->with('success', 'Data pengembalian berhasil dihapus');
    }

}
