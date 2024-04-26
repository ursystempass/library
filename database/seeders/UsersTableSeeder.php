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
            'fullname' => 'Nevityas Puspakania',
            'password' => Hash::make('password'),
            'alamat' => '2024-04-25 12:59:07.390 [info] Laravel Extra Intellisense Started...',
            'role' => 'member',
            'join_date' => now(),
            'major_id' => 1,
            'image' => 'images/profile/1714020100.jpg',
            'class_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    {
            DB::table('users')->insert([
                'kode_user' => 'ADM001',
                'nis' => 'cbn123',
                'fullname' => 'Fadilah Nurhasani',
                'password' => Hash::make('password'),
                'alamat' => ' Jl. Raya Karadenan No.7, Karadenan, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16111',
                'role' => 'admin',
                'join_date' => now(),
                'major_id' => null,
                'image' => 'images/profile/1714020100.jpg',
                'class_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
}
}
}
