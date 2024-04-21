<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'kode_user',
        'nis',
        'fullname',
        'password',
        'image',
        'alamat',
        'role',
        'join_date',
        'major_id',
        'class_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function class()
    {
        return $this->belongsTo(Classe::class);
    }
}
