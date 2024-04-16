<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'return_back_id',
        'borrow_id',
        'fine',
    ];

    // Relationship with ReturnBack model
    public function returnBack()
    {
        return $this->belongsTo(ReturnBack::class);
    }

    // Relationship with Borrowing model
    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class, 'borrow_id');
    }
}
