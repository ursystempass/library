<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash; // Tambahkan ini
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate dummy data for users
        DB::table('users')->insert([
            'kode_user' => $faker->unique()->regexify('[A-Za-z0-9]{25}'),
            'nis' => 'cbn137',
            'fullname' => $faker->name,
            'username' => $faker->unique()->userName,
            'password' => Hash::make('12345'),
            'kelas' => $faker->randomElement(['10A', '10B', '11A', '11B', '12A', '12B']),
            'alamat' => $faker->address,
            'verif' => $faker->randomElement(['verified', 'not verified']),
            'role' => 'member',
            'join_date' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'terakhir_login' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'kode_user' => $faker->unique()->regexify('[A-Za-z0-9]{25}'),
            'nis' => 'cbn136',
            'fullname' => $faker->name,
            'username' => $faker->unique()->userName,
            'password' => Hash::make('12345'),
            'kelas' => $faker->randomElement(['10A', '10B', '11A', '11B', '12A', '12B']),
            'alamat' => $faker->address,
            'verif' => $faker->randomElement(['verified', 'not verified']),
            'role' => 'admin',
            'join_date' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'terakhir_login' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
