<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnDetail extends Model
{
    protected $fillable = ['returnback_id', 'book_id', 'fine'];

    public function returnBack()
    {
        return $this->belongsTo(ReturnBack::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }


    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class, 'borrowing_id');
    }
}
