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
        ['nama' => 'Kelas A', 'wali' => 'Pak A', 'jumlah' => 30, 'tahun_ajaran' => 2023],
        ['nama' => 'Kelas B', 'wali' => 'Pak B', 'jumlah' => 25, 'tahun_ajaran' => 2023],
        // tambahkan data kelas lainnya sesuai kebutuhan
    ];

    foreach ($kelas as $kelasData) {
        Classe::create($kelasData);
    }
}
}
