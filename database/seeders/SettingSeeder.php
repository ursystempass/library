<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Setting::create([
            'name' => 'Nama Pengaturan',
            'image' => 'path/to/image.jpg',
            'desc' => 'Deskripsi Pengaturan',
            'address' => 'Alamat Pengaturan',
            'email' => 'pengaturan@example.com',
        ]);
    }
}
