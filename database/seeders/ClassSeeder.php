<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $kelas = [
        ['nama' => 'Kelas A', 'quantity' => 30, 'academic_year' => 2023],
        ['nama' => 'Kelas B', 'quantity' => 25, 'academic_year' => 2023],
        // tambahkan data kelas lainnya sesuai kebutuhan
    ];

    foreach ($kelas as $kelasData) {
        Classe::create($kelasData);
    }
}
}
