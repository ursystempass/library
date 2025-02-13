<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Novel'],
            ['name' => 'Pelajaran'],
            ['name' => 'Ensiklopedia'],
            ['name' => 'Majalah'],
            ['name' => 'Cerpen'],
            ['name' => 'Paket'],
            ['name' => 'Kamus'],
            ['name' => 'Sejarah'],
            ['name' => 'Hiburan'],
            ['name' => 'Religi'],
            // Tambahkan data jenis buku lainnya sesuai kebutuhan
        ];

        foreach ($types as $typeData) {
            Type::create($typeData);
        }
    }
}
