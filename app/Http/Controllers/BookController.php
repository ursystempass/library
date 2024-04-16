<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookShelves; // Pastikan model BookShelves sudah diimpor
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }

    public function create()
    {
        $bookshelves = BookShelves::all();
        $bookCode = $this->generateBookCode(); // Generate kode buku otomatis
        return view('admin.book.create', compact('bookshelves', 'bookCode'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'isbn' => 'nullable|unique:books',
            'book_code' => 'required|unique:books',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'book_category' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'publication_year' => 'required|integer',
            'condition' => 'required|in:good,damaged',
            'shelf_location_id' => 'required|exists:book_shelves,id', // Ganti bookshel_id menjadi shelf_location_id
            'copy_number' => 'required|integer|min:1',
        ]);

        $book = new Book();
        $book->title = $request->input('title');
        $book->isbn = $request->input('isbn');
        $book->book_code = $this->generateBookCode(); // Generate kode buku otomatis
        $book->book_category = $request->input('book_category');
        $book->publisher = $request->input('publisher');
        $book->author = $request->input('author');
        $book->publication_year = $request->input('publication_year');
        $book->condition = $request->input('condition');
        $book->shelf_location_id = $request->input('shelf_location_id'); // Ganti bookshel_id menjadi shelf_location_id
        $book->copy_number = $request->input('copy_number');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/books'), $imageName);
            $book->image = 'images/books/' . $imageName;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }


    private function generateBookCode()
    {
        $latestBook = Book::latest()->first(); // Dapatkan data buku terbaru
        if ($latestBook) {
            // Jika ada buku terbaru, ekstrak nomor urut dari kode buku terbaru dan tambahkan 1
            $latestBookCode = $latestBook->book_code;
            $latestBookNumber = intval(substr($latestBookCode, 4));
            $newBookNumber = $latestBookNumber + 1;
            return "CODE$newBookNumber";
        } else {
            // Jika tidak ada buku terbaru, mulai dari CODE1
            return "CODE1";
        }
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $bookshelves = BookShelves::all();
        return view('admin.book.edit', compact('book', 'bookshelves'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'isbn' => 'nullable|unique:books,isbn,' . $id,
            'book_code' => 'required|unique:books,book_code,' . $id,
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'book_category' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'publication_year' => 'required|integer',
            'condition' => 'required|in:good,damaged',
            'shelf_location_id' => 'required|exists:book_shelves,id',
            'copy_number' => 'required|integer|min:1',
        ]);

        $book->title = $request->input('title');
        $book->isbn = $request->input('isbn');
        $book->book_code = $request->input('book_code');
        $book->book_category = $request->input('book_category');
        $book->publisher = $request->input('publisher');
        $book->author = $request->input('author');
        $book->publication_year = $request->input('publication_year');
        $book->condition = $request->input('condition');
        $book->shelf_location_id = $request->input('shelf_location_id');
        $book->copy_number = $request->input('copy_number');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/books'), $imageName);
            $book->image = 'images/books/' . $imageName;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }

}
