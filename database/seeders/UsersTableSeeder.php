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
     */
    public function run()
    {
        // Seed admin user
        User::create([
            'kode_user' => 'USR0001',
            'nis' => 'cbn137',
            'fullname' => 'Admin',
            'password' => Hash::make('password'),
            'kelas' => 'Admin',
            'role' => 'admin',
            'join_date' => now(),
            'alamat' => 'Alamat Admin',
        ]);

    }
}
