<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
 use HasApiTokens, HasFactory, Notifiable;

 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

 /*
  * The attributes that should be hidden for serialization.
  *
  * @var array<int, string>
  */
 protected $hidden = [
  'password',
  'remember_token',
 ];

 /**
  * Get the name of the unique identifier for the user.
  *
  * @return string
  */
 public function getAuthIdentifierName()
 {
  return 'nis'; // Menggunakan 'nis' sebagai identifier untuk autentikasi }
 }

 public function isAdmin()
 {
  return $this->role === 'admin';
 }

 public function setPasswordAttribute($value)
 {
  $this->attributes['password'] = Hash::make($value);
 }

 public function major()
 {
     return $this->belongsTo(Major::class);
 }

 public function class()
 {
     return $this->belongsTo(Classe::class);
 }

}
