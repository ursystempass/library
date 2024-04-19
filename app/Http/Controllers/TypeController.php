<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $type = Type::all();
        return view('admin.book.type.index', compact('type'));
    }
    public function create()
    {
        $type = Type::all();
        return view('admin.book.type.create', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Type::create([
            'name' => $request->name,
        ]);

        return redirect()->route('types.index')->with('success', 'Type created successfully.');
    }


    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('admin.book.type.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $type = Type::findOrFail($id);
        $type->update([
            'name' => $request->name,
        ]);

        return redirect()->route('types.index')->with('success', 'Type updated successfully.');
    }


    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        return redirect()->route('types.index')->with('success', 'Type deleted successfully.');
    }

}
