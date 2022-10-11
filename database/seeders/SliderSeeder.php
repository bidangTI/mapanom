<?php

namespace Database\Seeders;

use App\Models\SliderGambar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SliderGambar::create([
            'gambar' => 'SIPP MAS 1.jpg'
        ]);
        SliderGambar::create([
            'gambar' => 'SIPP MAS 2.jpg'
        ]);
    }
}
