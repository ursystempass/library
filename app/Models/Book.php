<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function bookshelf()
    {
        return $this->belongsTo(BookShelves::class, 'bookshelf_id');
    }
}
