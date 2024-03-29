<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed majors
        $majors = [
            ['nama' => 'Teknik Informatika', 'kepala' => 'Bapak X'],
            ['nama' => 'Manajemen', 'kepala' => 'Ibu Y'],
            // tambahkan data jurusan lainnya sesuai kebutuhan
        ];

        foreach ($majors as $majorData) {
            Major::create($majorData);
        }
    }
}
