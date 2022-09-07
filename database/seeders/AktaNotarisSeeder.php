<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AktaNotaris;

class AktaNotarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AktaNotaris::create(['jenis_akta' => 'Akta Pendirian']);
        AktaNotaris::create(['jenis_akta' => 'Akta Perubahan']);
    }
}
