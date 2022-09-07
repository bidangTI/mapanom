<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kepengurusan;

class KepengurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kepengurusan::create(['kepengurusan' => 'Pusat']);
        Kepengurusan::create(['kepengurusan' => 'Cabang']);
    }
}
