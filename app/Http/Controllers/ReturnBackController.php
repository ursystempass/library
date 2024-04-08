<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ReturnBack;
use Illuminate\Http\Request;

class ReturnBackController extends Controller
{
    // Method untuk menampilkan semua data ReturnBack
    public function index()
    {
        $returnBacks = ReturnBack::all();
        return view('admin.re-back.index', compact('returnBacks'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.re-back.create', compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'return_code' => 'required|unique:return_backs',
            'user_id' => 'required|exists:users,id',
            'return_date' => 'required|date',
        ]);


        // Simpan data ReturnBack baru
        ReturnBack::create($request->all());

        return redirect()->route('rebacks.index')->with('success', 'ReturnBack created successfully.');
    }

    public function edit(ReturnBack $returnBack)
    {
        $users = User::all();
        return view('admin.re-back.edit', compact('returnBack', 'users'));
    }

    // Method untuk menyimpan perubahan pada data ReturnBack yang diedit
    public function update(Request $request, ReturnBack $returnBack)
    {
        // Validasi data dari request
        $request->validate([
            'return_code' => 'required|unique:return_back,return_code,' . $returnBack->id,
            'user_id' => 'required|exists:users,id',
            'return_date' => 'required|date',
        ]);

        $returnBack->update($request->all());

        return redirect()->route('rebacks.index')->with('success', 'ReturnBack updated successfully.');
    }

    public function destroy(ReturnBack $returnBack)
    {
        $returnBack->delete();
        return redirect()->route('rebacks.index')->with('success', 'ReturnBack deleted successfully.');
    }
}
