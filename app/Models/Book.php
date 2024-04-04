<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'book_code',
        'image',
        'book_category',
        'publisher',
        'author',
        'publication_year',
        'condition',
        'bookshel_id',
        'copy_number',
    ];

    public function bookShelves()
    {
        return $this->belongsTo(BookShelves::class, 'bookshel_id'); // Corrected method name and foreign key
    }
}
