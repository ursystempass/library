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
            ['nama' => 'Teknik Informatika', 'dept_head' => 'Bapak X'],
            ['nama' => 'Manajemen', 'dept_head' => 'Ibu Y'],
            // tambahkan data jurusan lainnya sesuai kebutuhan
        ];

        foreach ($majors as $majorData) {
            Major::create($majorData);
        }
    }
}
