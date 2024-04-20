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
            'name' => 'Perpustakaan SMK Negeri 1 Cibinong',
            'image' => 'images/setting/OIP.jpg',
            'desc' => '"Perpustakaan SMK Negeri 1 Cibinong merupakan pusat pengetahuan yang menyediakan beragam koleksi buku dan sumber informasi untuk mendukung kegiatan belajar mengajar."',
            'address' => 'Jl. Raya Karadenan No.7, Karadenan, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16111',
            'email' => 'smkn1cibinongperpustakaan.com',
        ]);
    }
}
