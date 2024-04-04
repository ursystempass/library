<?php

namespace App\Http\Controllers;

use App\Models\BookShelves;
use Illuminate\Http\Request;

class BookShelvesController extends Controller
{
    public function index()
    {
        $bookshelves = BookShelves::all();
        return view('admin.book-shelve.index', compact('bookshelves'));
    }

    public function create()
    {
        return view('admin.book-shelve.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shelf_number' => 'required|unique:book_shelves',
            'shelf_location' => 'required',
        ]);

        BookShelves::create($request->all());

        return redirect()->route('bookshelves.index')
            ->with('success', 'Book Shelf created successfully.');
    }

    public function edit($id)
    {
        $bookshelves = BookShelves::findOrFail($id);
        return view('admin.book-shelve.edit', compact('bookshelves'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'shelf_number' => 'required',
            'shelf_location' => 'required',
        ]);

        $bookshelves = BookShelves::findOrFail($id);
        $bookshelves->update($request->all());

        return redirect()->route('bookshelves.index')
        ->with('success', 'Book Shelf updated successfully.');
    }

    public function destroy($id)
    {
        $bookshelves = BookShelves::findOrFail($id);
        $bookshelves->delete();

        return redirect()->route('bookshelves.index')
            ->with('success', 'Book Shelf deleted successfully.');
    }
}
