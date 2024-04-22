<?php

namespace App\Http\Controllers;

use App\Models\Book;
use BarcodeGenerator;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Type; // Import model Type

class CatalogController extends Controller
{
    public function index()
    {
        $books = Book::all(); // Mengambil semua data buku dari database
        $setting = Setting::all(); // Mengambil semua data buku dari database
        $types = Type::all(); // Mengambil semua data jenis buku dari database
        return view('member.catalog', compact('books', 'types', 'setting')); // Mengirim data buku dan jenis buku ke tampilan
    }

    public function greeting()
    {
        // Anda dapat menyesuaikan logika di sini sesuai dengan kebutuhan
        return view('member.greeting');
    }

    public function showDescription($id)
    {
        $book = Book::findOrFail($id);
        return view('member.desc', compact('book'));
    }

    public function showBarcode($bookingId)
    {
        // Cari pemesanan buku berdasarkan ID
        $booking = Booking::findOrFail($bookingId);

        // Generate barcode image using the booking ID
        $barcode = new BarcodeGenerator();
        $barcode->setText($bookingId); // Set the data to be encoded in the barcode
        $barcode->setType(\BarcodeGenerator::Code128); // Set the type of barcode (Code 128 in this case)
        $barcode->setScale(2); // Set the scaling factor for the barcode
        $barcode->setThickness(30); // Set the thickness of the bars
        $barcode->setFontSize(10); // Set the font size for the human-readable text
        $barcodeImage = $barcode->generate();

        // Return the barcode image
        return response()->make($barcodeImage, 200, ['Content-Type' => 'image/png']);
    }

    public function showBooksByType($type_id)
    {
        $books = Book::where('type_id', $type_id)->get();
        return view('member.book_type', compact('books'));
    }
}
