<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Teknik Informatika'],
            // tambahkan data jurusan lainnya sesuai kebutuhan
        ];

        foreach ($types as $typeData) {
            Type::create($typeData);
        }
    }
}
