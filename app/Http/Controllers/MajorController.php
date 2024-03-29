<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;

class MajorController extends Controller
{

    public function index()
    {
        $majors = Major::all();
        return view('admin.major.index', compact('majors'));
    }


    public function create()
    {
        return view('admin.major.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'kepala' => 'required|string',
        ]);

        Major::create($validatedData);

        return redirect()->route('majors.index')
            ->with('success', 'Major created successfully.');
    }

    public function edit($id)
    {
        $major = Major::findOrFail($id);
        return view('admin.major.edit', compact('major'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'kepala' => 'required|string',
        ]);

        $major = Major::findOrFail($id);
        $major->update($validatedData);

        return redirect()->route('majors.index')
            ->with('success', 'Major updated successfully.');
    }

    public function destroy($id)
    {
        $major = Major::findOrFail($id);
        $major->delete();

        return redirect()->route('majors.index')
            ->with('success', 'Major deleted successfully.');
    }
}
