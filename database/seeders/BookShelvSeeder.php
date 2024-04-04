<?php

namespace Database\Seeders;

use App\Models\BookShelves;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookShelvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Create book shelves
            BookShelves::create([
                'shelf_number' => 'A001',
                'shelf_location' => 'Location A',
            ]);

            BookShelves::create([
                'shelf_number' => 'B001',
                'shelf_location' => 'Location B',
            ]);
    }
}
