<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'no' => '1',
            'book_code' => 'CODE1', // Sesuaikan dengan kode buku yang diinginkan
            'title' => 'Hujan',
            'author' => 'Tere Liye', // Sesuaikan dengan pengarangnya
            'publisher' => 'Gramedia Pustaka Utama', // Sesuaikan dengan penerbitnya
            'publication_year' => 2014, // Sesuaikan dengan tahun terbitnya
            'acquisition_date' => '2024-04-20', // Sesuaikan dengan tanggal perolehan buku
            'number_of_copies' => 1, // Jumlah salinan
            'acquisition_source' => 'Pembelian', // Sumber perolehan buku
            'type_id' => 1, // Sesuaikan dengan ID tipe buku yang diinginkan
            'bookshelf_id' => 1, // Sesuaikan dengan ID rak buku yang diinginkan
            'image' => 'images/books/hujan.jpg' // Sesuaikan dengan path gambar buku jika ada
        ]);
    }
}
