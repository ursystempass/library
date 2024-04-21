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
        DB::table('users')->insert([
            'kode_user' => 'USR002',
            'nis' => '0987654321',
            'fullname' => 'Member',
            'password' => Hash::make('memberpassword'),
            'image' => 'member.jpg',
            'alamat' => 'Member Address',
            'role' => 'member',
            'join_date' => now(),
            'major_id' => null,
            'class_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    {
        DB::table('users')->insert([
            'kode_user' => 'ADM001',
            'nis' => 'cbn123',
            'fullname' => 'Admin',
            'password' => Hash::make('password'),
            'image' => null,
            'alamat' => 'Alamat Admin',
            'role' => 'admin',
            'join_date' => now(),
            'major_id' => null,
            'class_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
}
}
}
