<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function returnBack()
    {
        return $this->belongsTo(ReturnBack::class);
    }

    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }
}
