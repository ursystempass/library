<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'book_code',
        'no_induk',
        'judul_buku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'tgl_thn_perolehan',
        'jumlah_exsemplar',
        'sumber_perolehan',
    ];
}
