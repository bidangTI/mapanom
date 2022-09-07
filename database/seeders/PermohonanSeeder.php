<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permohonan;

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permohonan::create(['status' => 'Daftar Akun']);
        Permohonan::create(['status' => 'Verifikasi Data']);
        Permohonan::create(['status' => 'Verfikasi Lapangan']);
        Permohonan::create(['status' => 'Surat Keberadaan']);
        Permohonan::create(['status' => 'Selesai']);
    }
}
