<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */    public function run()
    {
    //     // Contoh data untuk dimasukkan ke dalam tabel users
    //     $users = [
    //         [
    //             'kode_user' => 'USR001',
    //             'nis' => '1234567890',
    //             'fullname' => 'John Doe',
    //             'password' => Hash::make('password123'), // Menggunakan Hash untuk mengenkripsi password
    //             'kelas' => 'XII-A',
    //             'image' => 'avatar.jpg',
    //             'alamat' => 'Jl. Contoh No. 123',
    //             'role' => 'admin', // Contoh role berupa 'admin'
    //             'join_date' => '2024-03-29',
    //             'class_id' => 1, // Contoh id dari kelas
    //             'major_id' => 1, // Contoh id dari jurusan
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         // Tambahkan data lainnya sesuai kebutuhan
    //     ];

    //     // Masukkan data ke dalam tabel menggunakan DB::table
    //     DB::table('users')->insert($users);
    // }
}
}
