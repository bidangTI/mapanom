<?php

namespace Database\Seeders;

use App\Models\SyaratAdministrasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SyaratAdministrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SyaratAdministrasi::create([
            'kategori_id' => 2,
            'dasar_hukum' => '<ol><li>Undang-Undang No 17 Tahun 2013 tentang Organisasi Kemasyarakatan.</li><li>Peraturan Pemerintah No 58 Tahun 2016 tentang Pelaksanaan Undang-Undang Nomor 17 Tahun 2013 tentang Organisasi Kemasyarakatan.</li></ol>',
            'syarat' => '<ol><li>Surat Permohonan ditujukan kepada Walikota Surakarta</li><li>Mengisi Blangko;&nbsp;<a href="http://ebakesbang.test/" target="_blank">Download Blangko</a></li><li>Akte Pendirian dari Notaris (salinan/ foto copy dilegalisir ketua &amp; sekretaris)</li><li>AD/ART (ditandatangani ketua &amp; sekretaris)</li><li>Program Kerja (ditandatangani ketua &amp; sekretaris)</li><li>Surat Keterangan domisili kantor/sekretariat dari kelurahan setempat</li><li>Surat Kepemilikan domisili kantor/sekretariat (ditandatangani pemilik rumah) atau apabila sewa dilampiri bukti sewa</li><li>Foto kantor tampak depan dengan plakat sekretariat</li><li>Biodata /CV pengurus *(ketua, sekretaris, bendahara)</li><li>Pas foto berwarna ukuran 4x6 terbaru *(ketua, sekretaris, bendahara)</li><li>foto copy KTP *(ketua, sekretaris, bendahara)</li><li>NPWP atas nama organisasi</li><li>Surat Pernyataan (bermaterai Rp 10.000 dan ditandatangani ketua dan sekretaris;&nbsp;<a href="http://ebakesbang.test" target="_blank">Download Surat Pernyataan</a>&nbsp;</li><li>Surat Rekomendasi dari Kementrian dan/atau perangkat daerah yang melaksanakan urusan kekhususan bidang keagamaan/kebudayaan kepada Tuhan Yang Maha Esa.</li></ol><p><br></p>'
        ]);
    }
}
