<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\BookShelves; // Pastikan model BookShelves sudah diimpor

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
        $types = Type::all();
        $bookCode = $this->generateBookCode(); // Generate automatic book code
        return view('admin.book.create', compact('bookshelves', 'types', 'bookCode'));
    }    public function store(Request $request)
    {
        $request->validate([
            'no' => 'required',
            'book_code' => 'required|unique:books,book_code',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|integer',
            'acquisition_date' => 'required|date',
            'number_of_copies' => 'required|integer|min:1',
            'status' => 'required|in:ready,booking,borrow',
            'acquisition_source' => 'required',
            'type_id' => 'required|exists:types,id',
            'bookshelf_id' => 'required|exists:book_shelves,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book = new Book();
        $book->no = $request->no;
        $book->book_code = $request->book_code;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->publication_year = $request->publication_year;
        $book->acquisition_date = $request->acquisition_date;
        $book->number_of_copies = $request->number_of_copies;
        $book->status = $request->status;
        $book->acquisition_source = $request->acquisition_source;
        $book->type_id = $request->type_id;
        $book->bookshelf_id = $request->bookshelf_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/books'), $imageName);
            $book->image = $imageName;
        }

        $book->save();

        // Membuat salinan buku
        $numberOfCopies = $request->number_of_copies;
        for ($i = 1; $i < $numberOfCopies; $i++) {
            $copy = new Book();
            $copy->no = $book->no + $i;
            $copy->book_code = $book->book_code . '-' . $i;
            $copy->title = $book->title;
            $copy->author = $book->author;
            $copy->publisher = $book->publisher;
            $copy->publication_year = $book->publication_year;
            $copy->acquisition_date = $book->acquisition_date;
            $copy->number_of_copies = 1; // Setiap salinan memiliki jumlah 1
            $copy->status = $book->status;
            $copy->acquisition_source = $book->acquisition_source;
            $copy->type_id = $book->type_id;
            $copy->bookshelf_id = $book->bookshelf_id;

            // Jika ada gambar, salin gambar ke salinan buku
            if ($request->hasFile('image')) {
                $copy->image = $imageName;
            }

            $copy->save();
        }

        return redirect()->route('books.index')->with('success', 'Buku berhasil dibuat');
    }

    private function generateBookCode()
    {
        $latestBook = Book::latest()->first();
        if ($latestBook) {
            $latestBookCode = $latestBook->book_code;
            $latestBookNumber = intval(substr($latestBookCode, 4));
            $newBookNumber = $latestBookNumber + 1;
            return "CODE$newBookNumber";
        } else {
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
