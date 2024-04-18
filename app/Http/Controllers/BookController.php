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
        'no' => 'required',
        'book_code' => 'required|unique:books',
        'judul_buku' => 'required',
        'pengarang' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required|integer',
        'tgl_thn_perolehan' => 'required|date',
        'jumlah_exsemplar' => 'required|integer|min:1',
        'sumber_perolehan' => 'required',
    ]);

    $book = new Book();
    $book->no = $request->input('no');
    $book->book_code = $request->input('book_code');
    $book->judul_buku = $request->input('judul_buku');
    $book->pengarang = $request->input('pengarang');
    $book->penerbit = $request->input('penerbit');
    $book->tahun_terbit = $request->input('tahun_terbit');
    $book->tgl_thn_perolehan = $request->input('tgl_thn_perolehan');
    $book->jumlah_exsemplar = $request->input('jumlah_exsemplar');
    $book->sumber_perolehan = $request->input('sumber_perolehan');

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
        'no' => 'required',
        'book_code' => 'required|unique:books,book_code,' . $id,
        'judul_buku' => 'required',
        'pengarang' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required|integer',
        'tgl_thn_perolehan' => 'required|date',
        'jumlah_exsemplar' => 'required|integer|min:1',
        'sumber_perolehan' => 'required',
    ]);

    $book->no = $request->input('no');
    $book->book_code = $request->input('book_code');
    $book->judul_buku = $request->input('judul_buku');
    $book->pengarang = $request->input('pengarang');
    $book->penerbit = $request->input('penerbit');
    $book->tahun_terbit = $request->input('tahun_terbit');
    $book->tgl_thn_perolehan = $request->input('tgl_thn_perolehan');
    $book->jumlah_exsemplar = $request->input('jumlah_exsemplar');
    $book->sumber_perolehan = $request->input('sumber_perolehan');

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
