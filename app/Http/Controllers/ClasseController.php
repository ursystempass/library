<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    // Menampilkan semua data kelas
    public function index()
    {
        $classe = Classe::all();
        return view('admin.classe.index', compact('classe'));
    }

    // Menampilkan form untuk menambah kelas
    public function create()
    {
        return view('admin.classe.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'wali' => 'required|string',
            'jumlah' => 'required|integer', // Ensure 'jumlah' is required
            'tahun_ajaran' => 'required', // You may need to adjust this validation based on your requirements
        ]);

        Classe::create([
            'nama' => $request->nama,
            'wali' => $request->wali,
            'tahun_ajaran' => $request->tahun_ajaran,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    // Menampilkan form untuk mengedit kelas
    public function edit(Classe $class)
    {
        return view('admin.classe.edit', compact('class'));
    }

    // Menyimpan perubahan pada kelas
    public function update(Request $request, Classe $class)
    {
        $request->validate([
            'nama' => 'required|string|unique:classes,nama,' . $class->id,
            'wali' => 'required|string',
            'jumlah' => 'required|integer',
            'tahun_ajaran' => 'required', // You may need to adjust this validation based on your requirements
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    // Menghapus kelas
    public function destroy(Classe $class)
    {
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
