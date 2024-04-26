<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnBack extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function return_details()
    {
        return $this->hasMany(ReturnDetail::class);
    }

    public function returnback()
    {
        return $this->belongsTo(Returnback::class);
    }
}
