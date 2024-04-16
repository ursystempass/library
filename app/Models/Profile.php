<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_user',
        'nis',
        'fullname',
        'password',
        'image',
        'alamat',
        // Tambahkan kolom lain yang dapat diisi secara massal di sini
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        // Tambahkan atribut lain yang ingin dihidden di sini
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // Tambahkan atribut lain yang ingin di-cast ke tipe data tertentu di sini
    ];
}
