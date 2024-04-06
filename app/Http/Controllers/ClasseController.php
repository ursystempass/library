<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    public function index()
    {
        $classe = Classe::all();
        return view('admin.classe.index', compact('classe'));
    }

    public function create()
    {
        return view('admin.classe.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'quantity' => 'required|integer',
            'academic_year' => 'required',
        ]);

        Classe::create([
            'nama' => $request->nama,
            'academic_year' => $request->academic_year,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function edit(Classe $class)
    {
        return view('admin.classe.edit', compact('class'));
    }

    public function update(Request $request, Classe $class)
    {
        $request->validate([
            'nama' => 'required|string|unique:classes,nama,' . $class->id,
            'quantity' => 'required|integer',
            'academic_year' => 'required',
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(Classe $class)
    {
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
