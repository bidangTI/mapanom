<?php

namespace App\Http\Livewire\TtdPerubahan;

use Livewire\Component;

use App\Models\User;
use App\Models\Persyaratan;
use App\Models\OrmasKetua;
use App\Models\OrmasSekretaris;
use App\Models\OrmasBendahara;
use App\Models\OrmasPendiri;
use App\Models\OrmasPembina;
use App\Models\OrmasPenasihat;
use App\Models\Dokumen;
use App\Models\Kategori;
use App\Models\AktaNotaris;
use App\Models\Histori;
use App\Models\SuratKeberadaan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\TandaTangan;
use App\Models\Bidang;
use App\Models\Subbidang;
use App\Models\Kepengurusan;
use App\Models\RubahData;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

use Livewire\WithFileUploads;

use Carbon\Carbon;
use file;

// Export PDF
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;

class TtdPerubahan extends Component
{

    use WithFileUploads;

    public $url, $folder, $namefile, $kecamatan, $kelurahan, $kota;
    public $nomorsurat, $tglsurat, $dataView;

    public $namaormas,
        $singormas,
        $akta,
        $namanotaris,
        $noakta,
        $tglnotaris,
        $nopermohonan,
        $tglpermohonan,
        $bidang,
        $subbidang,
        $alamatktr,
        $tempatpendirian,
        $tglpendirian,
        $skpengurus,
        $keputusan,
        $kepengurusan,
        $npwp,
        $sumberdana,
        $tujuanormas,
        $skahu,
        $tglskahu,
        $tahunahu,
        $noreg,
        $kategori,

        $srtpermohonan,
        $lambang,
        $stempel,
        $aktanotaris,
        $adart,
        $srtkepengurusan,
        $srtpernyataan,
        $srtdomisili,
        $srtkepemilikan,
        $fotokantor,
        $skuha,
        $rekom,
        $kerjaormas;

    public
        $ket_verifikasi_ketua,
        $st_verifikasi_ketua,
        $st_ktp_ketua,
        $st_foto_ketua,
        $st_cv_ketua,
        $ket_verifikasi_sekretaris,
        $st_verifikasi_sekretaris,
        $st_ktp_sekretaris,
        $st_foto_sekretaris,
        $st_cv_sekretaris,
        $ket_verifikasi_bendahara,
        $st_verifikasi_bendahara,
        $st_ktp_bendahara,
        $st_foto_bendahara,
        $st_cv_bendahara,
        $ket_verifikasi_pendiri,
        $st_verifikasi_pendiri,
        $ket_verifikasi_pembina,
        $st_verifikasi_pembina,
        $ket_verifikasi_penasihat,
        $st_verifikasi_penasihat,

        $st_srtpermohonan,
        $st_lambang,
        $st_stempel,
        $st_aktanotaris,
        $st_adart,
        $st_srtkepengurusan,
        $st_srtpernyataan,
        $st_srtdomisili,
        $st_srtkepemilikan,
        $st_fotokantor,
        $st_skuha,
        $st_rekom,
        $st_kerjaormas,

        $ket_srtpermohonan,
        $ket_lambang,
        $ket_stempel,
        $ket_aktanotaris,
        $ket_adart,
        $ket_srtkepengurusan,
        $ket_srtpernyataan,
        $ket_srtdomisili,
        $ket_srtkepemilikan,
        $ket_fotokantor,
        $ket_skuha,
        $ket_rekom,
        $ket_kerjaormas,

        $st_verifikasiSyarat,
        $ket_verifikasiSyarat;


    public
        $namaketua,
        $nikketua,
        $awalketua,
        $akhirketua,
        $ktpketua,
        $fotoketua,
        $cvketua,
        $namasekretaris,
        $niksekretaris,
        $awalsekretaris,
        $akhirsekretaris,
        $ktpsekretaris,
        $fotosekretaris,
        $cvsekretaris,
        $namabendahara,
        $nikbendahara,
        $awalbendahara,
        $akhirbendahara,
        $ktpbendahara,
        $fotobendahara,
        $cvbendahara,
        $namapendiri,
        $nikpendiri,
        $namapembina,
        $nikpembina,
        $namapenasihat,
        $nikpenasihat;


    protected $listeners = [
        'flagttd' => 'acc'
    ];

    public function ShowPersyaratan($id)
    {
        $resPersyaratan = User::with(['kategori', 'persyaratan'])->where('no_register', $id)->first();
        $this->dataAkta = AktaNotaris::all();

        $this->kategori = $resPersyaratan->kategori->kategori;
        $this->noreg = $resPersyaratan->no_register;
        $this->namaormas = $resPersyaratan->persyaratan->nama_ormaspol;
        $this->singormas = $resPersyaratan->persyaratan->singkatan_ormaspol;

        $tempAkta = $resPersyaratan->persyaratan->akta_id_ormas;
        $existAkta = AktaNotaris::where('id', $tempAkta)->first();
        $this->akta = $existAkta->jenis_akta;
        $this->namanotaris = $resPersyaratan->persyaratan->nama_notaris_ormaspol;
        $this->noakta = $resPersyaratan->persyaratan->no_akta_notaris_ormaspol;
        $this->tglnotaris = Carbon::parse($resPersyaratan->persyaratan->tgl_akta_notaris_ormaspol)->format('d-m-Y');
        $this->nopermohonan = $resPersyaratan->persyaratan->no_surat_permohonan_ormaspol;
        $this->tglpermohonan = Carbon::parse($resPersyaratan->persyaratan->tgl_surat_permohonan_ormaspol)->format('d-m-Y');

        $this->tempbidang = $resPersyaratan->persyaratan->bidang_id_ormas;
        $existBidang = Bidang::where('id', $this->tempbidang)->first();
        $this->bidang = $existBidang->bidang;

        $this->tempsubbidang = $resPersyaratan->persyaratan->subbidang_id_ormas;
        $existSubbidang = Subbidang::where('id', $this->tempsubbidang)->first();
        $this->subbidang = $existSubbidang->subbidang;

        $this->tempkepengurusan = $resPersyaratan->persyaratan->kepengurusan_id_ormas;
        $existKepengurusan = Kepengurusan::where('id', $this->tempkepengurusan)->first();
        $this->kepengurusan = $existKepengurusan->kepengurusan;


        $this->alamatktr = $resPersyaratan->persyaratan->alamat_kantor_ormaspol;
        $this->tempatpendirian = $resPersyaratan->persyaratan->tempat_pendirian_ormas;
        $this->tglpendirian = Carbon::parse($resPersyaratan->persyaratan->tgl_pendirian_ormas)->format('d-m-Y');
        $this->skpengurus = $resPersyaratan->persyaratan->no_sk_kepengurusan_ormaspol;
        $this->keputusan = $resPersyaratan->persyaratan->keputusan_tinggi_ormas;

        $this->npwp = $resPersyaratan->persyaratan->npwp_ormaspol;
        $this->sumberdana = $resPersyaratan->persyaratan->sumber_dana;
        $this->tujuanormas = $resPersyaratan->persyaratan->tujuan_ormas;
        $this->skahu = $resPersyaratan->persyaratan->no_sk_ahu;
        $this->tglskahu = Carbon::parse($resPersyaratan->persyaratan->tgl_ahu)->format('d-m-Y');
        $this->tahunahu = $resPersyaratan->persyaratan->tahun_ahu;
        $this->st_verifikasiSyarat = $resPersyaratan->persyaratan->verifikasi;
        $this->ket_verifikasiSyarat = $resPersyaratan->persyaratan->keterangan_verifikasi;

        $this->tempkecamatan = $resPersyaratan->persyaratan->kecamatan;
        $this->tempkelurahan = $resPersyaratan->persyaratan->kelurahan;
        $this->tempkota = $resPersyaratan->persyaratan->kota;

        $existkecamatan = Kecamatan::all()->where('id', $this->tempkecamatan)->first();
        $existkelurahan = Kelurahan::all()->where('id', $this->tempkelurahan)->first();
        $existkota = Kota::all()->where('id', $this->tempkota)->first();

        $this->kecamatan = $existkecamatan->nama_kecamatan;
        $this->kelurahan = $existkelurahan->nama_kelurahan;
        $this->kota = $existkota->kota;


        $this->dispatchBrowserEvent('OpenPersyaratan');
    }

    public function store_persyaratan()
    {
        if ($this->st_verifikasiSyarat == 0) {
            $this->validate(
                [
                    'ket_verifikasiSyarat' => 'required'
                ],
                [
                    'ket_verifikasiSyarat.required' => 'Silahkan Isikan Catatan Verifikasi'
                ]
            );
            try {
                $dataVerifikasi = [
                    'verifikasi' => $this->st_verifikasiSyarat = 0,
                    'keterangan_verifikasi' => $this->ket_verifikasiSyarat
                ];
                Persyaratan::where('no_register', $this->noreg)->update($dataVerifikasi);

                $dt_status_syarat = ['status_persyaratan' => "N"];
                User::where('no_register', $this->noreg)->update($dt_status_syarat);

                $this->success();
                $this->dispatchBrowserEvent('ClosePersyaratan');
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = [
                    'verifikasi' => $this->st_verifikasiSyarat = 1,
                    'keterangan_verifikasi' => $this->ket_verifikasiSyarat
                ];
                Persyaratan::where('no_register', $this->noreg)->update($dataVerifikasi);

                $dt_status_syarat = ['status_persyaratan' => "Y"];
                User::where('no_register', $this->noreg)->update($dt_status_syarat);

                $this->success();
                $this->dispatchBrowserEvent('ClosePersyaratan');
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }
    }

    public function ShowPengurus($id)
    {
        $resDataPengurus = User::with(['ketua', 'sekretaris', 'bendahara', 'pendiri', 'pembina', 'penasihat'])->where('no_register', $id)->first();
        $this->noreg = $resDataPengurus->no_register;

        $existketua = OrmasKetua::where('no_register', $this->noreg)->first();
        if (!empty($existketua)) {
            $this->namaketua = $existketua->nama;
            $this->nikketua = $existketua->nik;
            $this->awalketua = Carbon::parse($existketua->masa_bakti_awal)->format('d-m-Y');
            $this->akhirketua = Carbon::parse($existketua->masa_bakti_akhir)->format('d-m-Y');

            $this->ktpketua = $existketua->file_ktp;
            $this->fotoketua = $existketua->file_foto;
            $this->cvketua = $existketua->file_cv;

            $this->ket_verifikasi_ketua = $existketua->keterangan_verifikasi;
            $this->st_verifikasi_ketua = $existketua->verifikasi;
            $this->st_ktp_ketua = $existketua->file_ktp_v;
            $this->st_foto_ketua = $existketua->file_foto_v;
            $this->st_cv_ketua = $existketua->file_cv_v;
        }

        $existsekretaris = OrmasSekretaris::where('no_register', $this->noreg)->first();
        if (!empty($existsekretaris)) {
            $this->namasekretaris = $existsekretaris->nama;
            $this->niksekretaris = $existsekretaris->nik;
            $this->awalsekretaris = Carbon::parse($existsekretaris->masa_bakti_awal)->format('d-m-Y');
            $this->akhirsekretaris = Carbon::parse($existsekretaris->masa_bakti_akhir)->format('d-m-Y');

            $this->ktpsekretaris = $existsekretaris->file_ktp;
            $this->fotosekretaris = $existsekretaris->file_foto;
            $this->cvsekretaris = $existsekretaris->file_cv;

            $this->ket_verifikasi_sekretaris = $existsekretaris->keterangan_verifikasi;
            $this->st_verifikasi_sekretaris = $existsekretaris->verifikasi;
            $this->st_ktp_sekretaris = $existsekretaris->file_ktp_v;
            $this->st_foto_sekretaris = $existsekretaris->file_foto_v;
            $this->st_cv_sekretaris = $existsekretaris->file_cv_v;
        }

        $existbendahara = OrmasBendahara::where('no_register', $this->noreg)->first();
        if (!empty($existbendahara)) {
            $this->namabendahara = $existbendahara->nama;
            $this->nikbendahara = $existbendahara->nik;
            $this->awalbendahara = Carbon::parse($existbendahara->masa_bakti_awal)->format('d-m-Y');
            $this->akhirbendahara = Carbon::parse($existbendahara->masa_bakti_akhir)->format('d-m-Y');

            $this->ktpbendahara = $existbendahara->file_ktp;
            $this->fotobendahara = $existbendahara->file_foto;
            $this->cvbendahara = $existbendahara->file_cv;

            $this->ket_verifikasi_bendahara = $existbendahara->keterangan_verifikasi;
            $this->st_verifikasi_bendahara = $existbendahara->verifikasi;
            $this->st_ktp_bendahara = $existbendahara->file_ktp_v;
            $this->st_foto_bendahara = $existbendahara->file_foto_v;
            $this->st_cv_bendahara = $existbendahara->file_cv_v;
        }

        $existpendiri = OrmasPendiri::where('no_register', $this->noreg)->first();
        if (!empty($existpendiri)) {
            $this->namapendiri = $existpendiri->nama;
            $this->nikpendiri = $existpendiri->nik;

            $this->ket_verifikasi_pendiri = $existpendiri->keterangan_verifikasi;
            $this->st_verifikasi_pendiri = $existpendiri->verifikasi;
        }

        $existpembina = OrmasPembina::where('no_register', $this->noreg)->first();
        if (!empty($existpembina)) {
            $this->namapembina = $existpembina->nama;
            $this->nikpembina = $existpembina->nik;

            $this->ket_verifikasi_pembina = $existpembina->keterangan_verifikasi;
            $this->st_verifikasi_pembina = $existpembina->verifikasi;
        }

        $existpenasihat = OrmasPenasihat::where('no_register', $this->noreg)->first();
        if (!empty($existpenasihat)) {
            $this->namapenasihat = $existpenasihat->nama;
            $this->nikpenasihat = $existpenasihat->nik;

            $this->ket_verifikasi_penasihat = $existpenasihat->keterangan_verifikasi;
            $this->st_verifikasi_penasihat = $existpenasihat->verifikasi;
        }

        $this->dispatchBrowserEvent('openVerifikasiPengurus');
    }

    public function store_pengurus()
    {

        // VALIDASI KETUA
        if ($this->st_ktp_ketua == 0) {
            $this->validate(
                ['ket_verifikasi_ketua' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_ketua.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        if ($this->st_foto_ketua == 0) {
            $this->validate(
                ['ket_verifikasi_ketua' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_ketua.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        if ($this->st_cv_ketua == 0) {
            $this->validate(
                ['ket_verifikasi_ketua' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_ketua.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        if ($this->st_verifikasi_ketua == 0) {
            $this->validate(
                ['ket_verifikasi_ketua' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_ketua.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        // AKHIR VALIDASI KETUA

        // VALIDASI SEKRETARIS
        if ($this->st_ktp_sekretaris == 0) {
            $this->validate(
                ['ket_verifikasi_sekretaris' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_sekretaris.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        if ($this->st_foto_sekretaris == 0) {
            $this->validate(
                ['ket_verifikasi_sekretaris' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_sekretaris.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        if ($this->st_cv_sekretaris == 0) {
            $this->validate(
                ['ket_verifikasi_sekretaris' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_sekretaris.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        if ($this->st_verifikasi_sekretaris == 0) {
            $this->validate(
                ['ket_verifikasi_sekretaris' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_sekretaris.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        // AKHIR VALIDASI SEKRETARIS

        // VALIDASI BENDAHARA
        if ($this->st_ktp_bendahara == 0) {
            $this->validate(
                ['ket_verifikasi_bendahara' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_bendahara.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        if ($this->st_foto_bendahara == 0) {
            $this->validate(
                ['ket_verifikasi_bendahara' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_bendahara.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        if ($this->st_cv_bendahara == 0) {
            $this->validate(
                ['ket_verifikasi_bendahara' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_bendahara.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        if ($this->st_verifikasi_bendahara == 0) {
            $this->validate(
                ['ket_verifikasi_bendahara' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_bendahara.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        // AKHIR VALIDASI BENDAHARA

        // VALIDASI PENDIRI
        if ($this->st_verifikasi_pendiri == 0) {
            $this->validate(
                ['ket_verifikasi_pendiri' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_pendiri.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        // AKHIR VALIDASI PENDIRI

        // VALIDASI PEMBINA
        if ($this->st_verifikasi_pembina == 0) {
            $this->validate(
                ['ket_verifikasi_pembina' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_pembina.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        // AKHIR VALIDASI PEMBINA

        // VALIDASI PENASIHAT
        if ($this->st_verifikasi_penasihat == 0) {
            $this->validate(
                ['ket_verifikasi_penasihat' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_verifikasi_penasihat.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }
        // AKHIR VALIDASI PENASIHAT


        // =======================================================================================

        // =========AWAL KETUA
        if ($this->st_ktp_ketua == 1) {
            try {
                $dataVerifikasi = ['file_ktp_v' => $this->st_ktp_ketua = 1];
                OrmasKetua::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['file_ktp_v' => $this->st_ktp_ketua = 0];
                OrmasKetua::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_foto_ketua == 1) {
            try {
                $dataVerifikasi = ['file_foto_v' => $this->st_foto_ketua = 1];
                OrmasKetua::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['file_foto_v' => $this->st_foto_ketua = 0];
                OrmasKetua::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_cv_ketua == 1) {
            try {
                $dataVerifikasi = ['file_cv_v' => $this->st_cv_ketua = 1];
                OrmasKetua::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['file_cv_v' => $this->st_cv_ketua = 0];
                OrmasKetua::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_verifikasi_ketua == 1) {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_ketua = 1];
                OrmasKetua::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_ketua = 0];
                OrmasKetua::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        try {
            $dataVerifikasi = ['keterangan_verifikasi' => $this->ket_verifikasi_ketua];
            OrmasKetua::where('no_register', $this->noreg)->update($dataVerifikasi);
        } catch (\Throwable $th) {
            $this->error($th);
        }
        // ========AKHIR KETUA

        // =========AWAL SEKRETARIS
        if ($this->st_ktp_sekretaris == 1) {
            try {
                $dataVerifikasi = ['file_ktp_v' => $this->st_ktp_sekretaris = 1];
                OrmasSekretaris::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['file_ktp_v' => $this->st_ktp_sekretaris = 0];
                OrmasSekretaris::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_foto_sekretaris == 1) {
            try {
                $dataVerifikasi = ['file_foto_v' => $this->st_foto_sekretaris = 1];
                OrmasSekretaris::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['file_foto_v' => $this->st_foto_sekretaris = 0];
                OrmasSekretaris::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_cv_sekretaris == 1) {
            try {
                $dataVerifikasi = ['file_cv_v' => $this->st_cv_sekretaris = 1];
                OrmasSekretaris::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['file_cv_v' => $this->st_cv_sekretaris = 0];
                OrmasSekretaris::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_verifikasi_sekretaris == 1) {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_sekretaris = 1];
                OrmasSekretaris::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_sekretaris = 0];
                OrmasSekretaris::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        try {
            $dataVerifikasi = ['keterangan_verifikasi' => $this->ket_verifikasi_sekretaris];
            OrmasSekretaris::where('no_register', $this->noreg)->update($dataVerifikasi);
        } catch (\Throwable $th) {
            $this->error($th);
        }
        // ========AKHIR SEKRETARIS

        // =========AWAL BENDAHARA
        if ($this->st_ktp_bendahara == 1) {
            try {
                $dataVerifikasi = ['file_ktp_v' => $this->st_ktp_bendahara = 1];
                OrmasBendahara::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['file_ktp_v' => $this->st_ktp_bendahara = 0];
                OrmasBendahara::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_foto_bendahara == 1) {
            try {
                $dataVerifikasi = ['file_foto_v' => $this->st_foto_bendahara = 1];
                OrmasBendahara::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['file_foto_v' => $this->st_foto_bendahara = 0];
                OrmasBendahara::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_cv_bendahara == 1) {
            try {
                $dataVerifikasi = ['file_cv_v' => $this->st_cv_bendahara = 1];
                OrmasBendahara::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['file_cv_v' => $this->st_cv_bendahara = 0];
                OrmasBendahara::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_verifikasi_bendahara == 1) {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_bendahara = 1];
                OrmasBendahara::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_bendahara = 0];
                OrmasBendahara::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        try {
            $dataVerifikasi = ['keterangan_verifikasi' => $this->ket_verifikasi_bendahara];
            OrmasBendahara::where('no_register', $this->noreg)->update($dataVerifikasi);
        } catch (\Throwable $th) {
            $this->error($th);
        }
        // ========AKHIR BENDAHARA

        // =========AWAL PENDIRI
        if ($this->st_verifikasi_pendiri == 1) {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_pendiri = 1];
                OrmasPendiri::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_pendiri = 0];
                OrmasPendiri::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        try {
            $dataVerifikasi = ['keterangan_verifikasi' => $this->ket_verifikasi_pendiri];
            OrmasPendiri::where('no_register', $this->noreg)->update($dataVerifikasi);
        } catch (\Throwable $th) {
            $this->error($th);
        }
        // ========AKHIR PENDIRI

        // =========AWAL PEMBINA
        if ($this->st_verifikasi_pembina == 1) {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_pembina = 1];
                OrmasPembina::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_pembina = 0];
                OrmasPembina::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        try {
            $dataVerifikasi = ['keterangan_verifikasi' => $this->ket_verifikasi_pembina];
            OrmasPembina::where('no_register', $this->noreg)->update($dataVerifikasi);
        } catch (\Throwable $th) {
            $this->error($th);
        }
        // ========AKHIR PEMBINA

        // =========AWAL PENASIHAT
        if ($this->st_verifikasi_penasihat == 1) {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_penasihat = 1];
                OrmasPenasihat::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $dataVerifikasi = ['verifikasi' => $this->st_verifikasi_penasihat = 0];
                OrmasPenasihat::where('no_register', $this->noreg)->update($dataVerifikasi);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        try {
            $dataVerifikasi = ['keterangan_verifikasi' => $this->ket_verifikasi_penasihat];
            OrmasPenasihat::where('no_register', $this->noreg)->update($dataVerifikasi);
        } catch (\Throwable $th) {
            $this->error($th);
        }
        // ========AKHIR PENASIHAT

        if (
            $this->st_ktp_ketua == 0 || $this->st_foto_ketua == 0 || $this->st_cv_ketua == 0 || $this->st_verifikasi_ketua == 0 ||
            $this->st_ktp_sekretaris == 0 || $this->st_foto_sekretaris == 0 || $this->st_cv_sekretaris == 0 || $this->st_verifikasi_sekretaris == 0 ||
            $this->st_ktp_bendahara == 0 || $this->st_foto_bendahara == 0 || $this->st_cv_bendahara == 0 || $this->st_verifikasi_bendahara == 0 ||
            $this->st_verifikasi_pendiri == 0 || $this->st_verifikasi_pembina == 0 || $this->st_verifikasi_penasihat == 0
        ) {
            $dt_status_pengurus = ['status_pengurus' => "N"];
            User::where('no_register', $this->noreg)->update($dt_status_pengurus);
        } elseif (
            $this->st_ktp_ketua == 1 && $this->st_foto_ketua == 1 && $this->st_cv_ketua == 1 && $this->st_verifikasi_ketua == 1 &&
            $this->st_ktp_sekretaris == 1 && $this->st_foto_sekretaris == 1 && $this->st_cv_sekretaris == 1 && $this->st_verifikasi_sekretaris == 1 &&
            $this->st_ktp_bendahara == 1 && $this->st_foto_bendahara == 1 && $this->st_cv_bendahara == 1 && $this->st_verifikasi_bendahara == 1 &&
            $this->st_verifikasi_pendiri == 1 && $this->st_verifikasi_pembina == 1 && $this->st_verifikasi_penasihat == 1
        ) {
            $dt_status_pengurus = ['status_pengurus' => "Y"];
            User::where('no_register', $this->noreg)->update($dt_status_pengurus);
        };

        $this->success();
        $this->resetVerifikasi();
        $this->dispatchBrowserEvent('closeVerifikasiPengurus');
    }

    public function ShowDokumen($id)
    {
        $resDataDokumen = User::with(['persyaratan', 'ketua', 'sekretaris', 'bendahara', 'pendiri', 'pembina', 'penasihat'])->where('no_register', $id)->first();
        $this->noreg = $resDataDokumen->no_register;

        $this->namaormas = $resDataDokumen->persyaratan->nama_ormaspol;
        $this->alamatktr = $resDataDokumen->persyaratan->alamat_kantor_ormaspol;
        $this->singormas = $resDataDokumen->persyaratan->singkatan_ormaspol;

        $existDokumen = Dokumen::where('no_register', $this->noreg)->first();

        $this->srtpermohonan = $existDokumen->surat_permohonan_ormaspol;
        $this->st_srtpermohonan = $existDokumen->val_surat_permohonan_ormaspol;
        $this->ket_srtpermohonan = $existDokumen->valket_surat_permohonan_ormaspol;

        $this->lambang = $existDokumen->lambang_ormaspol;
        $this->st_lambang = $existDokumen->val_lambang_ormaspol;
        $this->ket_lambang = $existDokumen->valket_lambang_ormaspol;

        $this->stempel = $existDokumen->stempel_ormaspol;
        $this->st_stempel = $existDokumen->val_stempel_ormaspol;
        $this->ket_stempel = $existDokumen->valket_stempel_ormaspol;

        $this->aktanotaris = $existDokumen->akta_notaris_ormaspol;
        $this->st_aktanotaris = $existDokumen->val_akta_notaris_ormaspol;
        $this->ket_aktanotaris = $existDokumen->valket_akta_notaris_ormaspol;

        $this->adart = $existDokumen->ad_art_ormaspol;
        $this->st_adart = $existDokumen->val_ad_art_ormaspol;
        $this->ket_adart = $existDokumen->valket_ad_art_ormaspol;

        $this->srtkepengurusan = $existDokumen->surat_keputusan_pengurus_ormaspol;
        $this->st_srtkepengurusan = $existDokumen->val_surat_keputusan_pengurus_ormaspol;
        $this->ket_srtkepengurusan = $existDokumen->valket_surat_keputusan_pengurus_ormaspol;

        $this->srtpernyataan = $existDokumen->surat_pernyataan_ormaspol;
        $this->st_srtpernyataan = $existDokumen->val_surat_pernyataan_ormaspol;
        $this->ket_srtpernyataan = $existDokumen->valket_surat_pernyataan_ormaspol;

        $this->srtdomisili = $existDokumen->suket_domisili_ormaspol;
        $this->st_srtdomisili = $existDokumen->val_suket_domisili_ormaspol;
        $this->ket_srtdomisili = $existDokumen->valket_suket_domisili_ormaspol;

        $this->srtkepemilikan = $existDokumen->surat_kepemilikan_kantor_ormaspol;
        $this->st_srtkepemilikan = $existDokumen->val_surat_kepemilikan_kantor_ormaspol;
        $this->ket_srtkepemilikan = $existDokumen->valket_surat_kepemilikan_kantor_ormaspol;

        $this->fotokantor = $existDokumen->foto_kantor_ormaspol;
        $this->st_fotokantor = $existDokumen->val_foto_kantor_ormaspol;
        $this->ket_fotokantor = $existDokumen->valket_foto_kantor_ormaspol;

        $this->skuha = $existDokumen->sk_kemenkumham_ormas;
        $this->st_skuha = $existDokumen->val_sk_kemenkumham_ormas;
        $this->ket_skuha = $existDokumen->valket_sk_kemenkumham_ormas;

        $this->rekom = $existDokumen->surat_rekom_ormas;
        $this->st_rekom = $existDokumen->val_surat_rekom_ormas;
        $this->ket_rekom = $existDokumen->valket_surat_rekom_ormas;

        $this->kerjaormas = $existDokumen->program_kerja_ormas;
        $this->st_kerjaormas = $existDokumen->val_program_kerja_ormas;
        $this->ket_kerjaormas = $existDokumen->valket_program_kerja_ormas;


        $this->dispatchBrowserEvent('openVerifikasiDokumen');
    }

    public function store_dokumen()
    {
        if ($this->st_srtpermohonan == 0) {
            $this->validate(
                ['ket_srtpermohonan' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_srtpermohonan.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_lambang == 0) {
            $this->validate(
                ['ket_lambang' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_lambang.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_stempel == 0) {
            $this->validate(
                ['ket_stempel' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_stempel.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_aktanotaris == 0) {
            $this->validate(
                ['ket_aktanotaris' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_aktanotaris.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_adart == 0) {
            $this->validate(
                ['ket_adart' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_adart.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_srtkepengurusan == 0) {
            $this->validate(
                ['ket_srtkepengurusan' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_srtkepengurusan.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_srtpernyataan == 0) {
            $this->validate(
                ['ket_srtpernyataan' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_srtpernyataan.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_srtdomisili == 0) {
            $this->validate(
                ['ket_srtdomisili' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_srtdomisili.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_srtkepemilikan == 0) {
            $this->validate(
                ['ket_srtkepemilikan' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_srtkepemilikan.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_fotokantor == 0) {
            $this->validate(
                ['ket_fotokantor' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_fotokantor.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_skuha == 0) {
            $this->validate(
                ['ket_skuha' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_skuha.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_rekom == 0) {
            $this->validate(
                ['ket_rekom' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_rekom.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        if ($this->st_kerjaormas == 0) {
            $this->validate(
                ['ket_kerjaormas' => 'required'],
                [
                    $this->cekverifikasi(),
                    'ket_kerjaormas.required' => 'Silahkan Isi Catatan Verifikasi'
                ]
            );
        }

        // ======================Store Dokumen
        if ($this->st_srtpermohonan == 1) {
            try {
                $saveDokumen = [
                    'val_surat_permohonan_ormaspol' => $this->st_srtpermohonan = 1,
                    'valket_surat_permohonan_ormaspol' => $this->ket_srtpermohonan
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_surat_permohonan_ormaspol' => $this->st_srtpermohonan = 0,
                    'valket_surat_permohonan_ormaspol' => $this->ket_srtpermohonan
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_lambang == 1) {
            try {
                $saveDokumen = [
                    'val_lambang_ormaspol' => $this->st_lambang = 1,
                    'valket_lambang_ormaspol' => $this->ket_lambang
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_lambang_ormaspol' => $this->st_lambang = 0,
                    'valket_lambang_ormaspol' => $this->ket_lambang
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_stempel == 1) {
            try {
                $saveDokumen = [
                    'val_stempel_ormaspol' => $this->st_stempel = 1,
                    'valket_stempel_ormaspol' => $this->ket_stempel
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_stempel_ormaspol' => $this->st_stempel = 0,
                    'valket_stempel_ormaspol' => $this->ket_stempel
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_aktanotaris == 1) {
            try {
                $saveDokumen = [
                    'val_akta_notaris_ormaspol' => $this->st_aktanotaris = 1,
                    'valket_akta_notaris_ormaspol' => $this->ket_aktanotaris
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_akta_notaris_ormaspol' => $this->st_aktanotaris = 0,
                    'valket_akta_notaris_ormaspol' => $this->ket_aktanotaris
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_adart == 1) {
            try {
                $saveDokumen = [
                    'val_ad_art_ormaspol' => $this->st_adart = 1,
                    'valket_ad_art_ormaspol' => $this->ket_adart
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_ad_art_ormaspol' => $this->st_adart = 0,
                    'valket_ad_art_ormaspol' => $this->ket_adart
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_srtkepengurusan == 1) {
            try {
                $saveDokumen = [
                    'val_surat_keputusan_pengurus_ormaspol' => $this->st_srtkepengurusan = 1,
                    'valket_surat_keputusan_pengurus_ormaspol' => $this->ket_srtkepengurusan
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_surat_keputusan_pengurus_ormaspol' => $this->st_srtkepengurusan = 0,
                    'valket_surat_keputusan_pengurus_ormaspol' => $this->ket_srtkepengurusan
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_srtpernyataan == 1) {
            try {
                $saveDokumen = [
                    'val_surat_pernyataan_ormaspol' => $this->st_srtpernyataan = 1,
                    'valket_surat_pernyataan_ormaspol' => $this->ket_srtpernyataan
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_surat_pernyataan_ormaspol' => $this->st_srtpernyataan = 0,
                    'valket_surat_pernyataan_ormaspol' => $this->ket_srtpernyataan
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_srtdomisili == 1) {
            try {
                $saveDokumen = [
                    'val_suket_domisili_ormaspol' => $this->st_srtdomisili = 1,
                    'valket_suket_domisili_ormaspol' => $this->ket_srtdomisili
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_suket_domisili_ormaspol' => $this->st_srtdomisili = 0,
                    'valket_suket_domisili_ormaspol' => $this->ket_srtdomisili
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_srtkepemilikan == 1) {
            try {
                $saveDokumen = [
                    'val_surat_kepemilikan_kantor_ormaspol' => $this->st_srtkepemilikan = 1,
                    'valket_surat_kepemilikan_kantor_ormaspol' => $this->ket_srtkepemilikan
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_surat_kepemilikan_kantor_ormaspol' => $this->st_srtkepemilikan = 0,
                    'valket_surat_kepemilikan_kantor_ormaspol' => $this->ket_srtkepemilikan
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_fotokantor == 1) {
            try {
                $saveDokumen = [
                    'val_foto_kantor_ormaspol' => $this->st_fotokantor = 1,
                    'valket_foto_kantor_ormaspol' => $this->ket_fotokantor
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_foto_kantor_ormaspol' => $this->st_fotokantor = 0,
                    'valket_foto_kantor_ormaspol' => $this->ket_fotokantor
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_skuha == 1) {
            try {
                $saveDokumen = [
                    'val_sk_kemenkumham_ormas' => $this->st_skuha = 1,
                    'valket_sk_kemenkumham_ormas' => $this->ket_skuha
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_sk_kemenkumham_ormas' => $this->st_skuha = 0,
                    'valket_sk_kemenkumham_ormas' => $this->ket_skuha
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_rekom == 1) {
            try {
                $saveDokumen = [
                    'val_surat_rekom_ormas' => $this->st_rekom = 1,
                    'valket_surat_rekom_ormas' => $this->ket_rekom
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_surat_rekom_ormas' => $this->st_rekom = 0,
                    'valket_surat_rekom_ormas' => $this->ket_rekom
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if ($this->st_kerjaormas == 1) {
            try {
                $saveDokumen = [
                    'val_program_kerja_ormas' => $this->st_kerjaormas = 1,
                    'valket_program_kerja_ormas' => $this->ket_kerjaormas
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        } else {
            try {
                $saveDokumen = [
                    'val_program_kerja_ormas' => $this->st_kerjaormas = 0,
                    'valket_program_kerja_ormas' => $this->ket_kerjaormas
                ];
                Dokumen::where('no_register', $this->noreg)->update($saveDokumen);
            } catch (\Throwable $th) {
                $this->error($th);
            }
        }

        if (
            $this->st_srtpermohonan == 0 || $this->st_lambang == 0 || $this->st_stempel == 0 ||
            $this->st_aktanotaris == 0 || $this->st_adart == 0 || $this->st_srtkepengurusan == 0 ||
            $this->st_srtpernyataan == 0 || $this->st_srtdomisili == 0 || $this->st_srtkepemilikan == 0 ||
            $this->st_fotokantor == 0 || $this->st_skuha == 0 || $this->st_rekom == 0 || $this->st_kerjaormas == 0
        ) {
            $dt_status_dokumen = ['status_dokumen' => "N"];
            User::where('no_register', $this->noreg)->update($dt_status_dokumen);
        } elseif (
            $this->st_srtpermohonan == 1 && $this->st_lambang == 1 && $this->st_stempel == 1 &&
            $this->st_aktanotaris == 1 && $this->st_adart == 1 && $this->st_srtkepengurusan == 1 &&
            $this->st_srtpernyataan == 1 && $this->st_srtdomisili == 1 && $this->st_srtkepemilikan == 1 &&
            $this->st_fotokantor == 1 && $this->st_skuha == 1 && $this->st_rekom == 1 && $this->st_kerjaormas == 1
        ) {
            $dt_status_dokumen = ['status_dokumen' => "Y"];
            User::where('no_register', $this->noreg)->update($dt_status_dokumen);
        };

        $this->success();
        $this->resetVerifikasi();
        $this->dispatchBrowserEvent('closeVerifikasiDokumen');
    }

    public function TandaTangan($id)
    {
        $cekDataSurat = SuratKeberadaan::where('no_register', $id)->first();
        $this->dispatchBrowserEvent('swal:confirmTTD', [
            'id' => $id,
            'type' => 'info',
            'message' => 'Tanda Tangan'
        ]);
    }

    // ============================>
    public function acc($id)
    {
        try {
            $ambilTglSurat = SuratKeberadaan::where(['no_register' => $id, 'status' => 'P'])->first();

            $cekReg = SuratKeberadaan::where(['no_register' => $id, 'status' => 'Y'])->first();
            if (!empty($cekReg)) {
                $UpdSection1 = [
                    'status' => 'N',
                    // 'tanggal_exp' => Carbon::now()->format('Y-m-d')
                    'tanggal_exp' => $ambilTglSurat->tanggal_surat
                ];
                SuratKeberadaan::where(['no_register' => $id, 'status' => 'Y'])->update($UpdSection1);
            }
            $cekSection3 = SuratKeberadaan::where(['no_register' => $id, 'status' => 'P'])->first();
            $tglsurat = Carbon::parse($cekSection3->tanggal_surat)->format('Ymd');

            $cekRubahData = RubahData::where(['no_register' => $id, 'status' => 1])->first();

            $AmbilDataPerubahan = RubahData::where('no_register', $id)->where('status', 1)->first();
            $NamaOrmasBaru = $AmbilDataPerubahan->nama_ormaspol;
            $singkatanBaru = $AmbilDataPerubahan->singkatan_ormaspol;
            $alamatBaru = $AmbilDataPerubahan->alamat_kantor_ormaspol;
            $kelurahanBaru = $AmbilDataPerubahan->kelurahan;
            $kecamatanBaru = $AmbilDataPerubahan->kecamatan;
            $kotaBaru = $AmbilDataPerubahan->kota;
            $no_ahu = $AmbilDataPerubahan->no_sk_ahu;
            $tgl_ahu = $AmbilDataPerubahan->tgl_ahu;
            $tahun_ahu = $AmbilDataPerubahan->tahun_ahu;
            $sk_ahu_baru = $AmbilDataPerubahan->sk_kemenkumham_ormas;

            $UpdPersyaratanMaster = [
                'nama_ormaspol' => $NamaOrmasBaru,
                'singkatan_ormaspol' => $singkatanBaru,
                'alamat_kantor_ormaspol' =>  $alamatBaru,
                'kelurahan' => $kelurahanBaru,
                'kecamatan' =>  $kecamatanBaru,
                'kota' => $kotaBaru,
                'no_sk_ahu' => $no_ahu,
                'tgl_ahu' => $tgl_ahu,
                'tahun_ahu' => $tahun_ahu
            ];
            Persyaratan::where('no_register', $id)->update($UpdPersyaratanMaster);

            if (!empty($cekRubahData)) {
                $UpdSection3 = ['status' => 2];
                RubahData::where(['no_register' => $id, 'status' => 1])->update($UpdSection3);
            }

            $UpdDokumenMaster = ['sk_kemenkumham_ormas' => $sk_ahu_baru];
            Dokumen::where('no_register', $id)->update($UpdDokumenMaster);

            $dataForPDF = User::with(['kategori', 'persyaratan', 'dokumen', 'ketua', 'sekretaris', 'bendahara', 'pendiri', 'pembina', 'penasihat'])->where('no_register', $id)->first();
            $kel = Kelurahan::where('id', $dataForPDF->persyaratan->kelurahan)->first();
            $kec = Kecamatan::where('id', $dataForPDF->persyaratan->kecamatan)->first();
            $kota = Kota::where('id', $dataForPDF->persyaratan->kota)->first();

            $jmlCetak = SuratKeberadaan::where('no_register', $id)->count();

            $UpdFileSuratPerubahan = SuratKeberadaan::where(['no_register' => $id, 'id_ttd' => 0])->first();
            if (!empty($UpdFileSuratPerubahan)) {
                $filename = 'surat_pdf/' . $id . '_' . $tglsurat . '_' . $jmlCetak . '.pdf';
                $resSuratFile = ['file_surat' => $filename];
                SuratKeberadaan::where(['no_register' => $id, 'id_ttd' => 0])->update($resSuratFile);

                $UpdSection2 = [
                    'status' => 'Y',
                    'id_ttd' =>  Auth::user()->id,
                    'cetak' => $jmlCetak
                ];
                SuratKeberadaan::where(['no_register' => $id, 'status' => 'P'])->update($UpdSection2);
            }

            $Ambilpejabat = SuratKeberadaan::where('id_ttd', Auth::user()->id)->first();
            $pejabatTtd = User::where('id', $Ambilpejabat->id_ttd)->first();

            $tte = TandaTangan::where('user_id', Auth::user()->id)->first();
            $Vtte = explode('/', $tte->file_tte);
            $folder = $Vtte[0];
            $namefile = $Vtte[1];
            $url = $folder . '/' . $namefile;

            $dataPerubahanV = SuratKeberadaan::where(['no_register' => $id, 'status' => 'Y'])->first();
            $contentPDF = [
                'dataForPDF' => $dataForPDF,
                'pejabatTtd' => $pejabatTtd,
                'kelurahan' => $kel,
                'kecamatan' => $kec,
                'kota' => $kota,
                'folder' => $folder,
                'namefile' => $namefile,
                'url' => $url,
                'perubahan' => $dataPerubahanV
            ];
            $documentPDF = PDF::loadView('backend.pdf.pdf-ormas-perubahan', $contentPDF)->setPaper('A4', 'portrait');
            // $filename = 'surat_pdf/'.Str::random(8).'.pdf';
            Storage::put($filename, $documentPDF->output());

            $resSurvey = [
                'permohonan_id' => 6,
                'notifikasi_kirim' => 'N',
                'feedback_persyaratan' => 'N',
                'feedback_pengurus' => 'N',
                'feedback_dokumen' => 'N'
            ];
            User::where('no_register', $id)->update($resSurvey);

            Histori::create([
                'no_register' => $id,
                'permohonan_id' => 6
            ]);

            $this->success();
            // Langsung Download
            //     return response()->streamDownload(
            //         fn () => print($documentPDF->output()),
            //         "filename.pdf"
            //    );
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function success()
    {
        $this->dispatchBrowserEvent('swal:success', [
            'type' => 'success',
            'message' => 'Proses Berhasil',
            'toast' => 'true',
            'position' => 'top-end'
        ]);
    }

    public function error($msg = null)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'error',
            'message' => 'Proses Gagal !' . $msg,
            'toast' => 'true',
            'position' => 'top-end'
        ]);
    }

    public function viewFile($folder, $namefile)
    {
        $this->url = $folder . '/' . $namefile;
        $this->dispatchBrowserEvent('openViewFile');
    }

    public function closeView()
    {
        $this->dispatchBrowserEvent('closeViewFile');
    }

    public function ViewRubahData($id)
    {
        $tabelRubahData = RubahData::where('id', $id)->first();
        $dataLama = Persyaratan::where('no_register', $tabelRubahData->no_register)->first();
        if (!empty($dataLama)) {
            $this->noreg = $dataLama->no_register;
            $this->namaormas = $dataLama->nama_ormaspol;
            $this->singormas = $dataLama->singkatan_ormaspol;
            $this->alamatktr = $dataLama->alamat_kantor_ormaspol;
            $this->skahu = $dataLama->no_sk_ahu;
            $this->tglskahu = Carbon::parse($dataLama->tgl_ahu)->format('d-m-Y');
            $this->tahunahu = $dataLama->tahun_ahu;

            $this->tempkelurahan = $dataLama->kelurahan;
            $this->datakelurahan = Kelurahan::where('id', $this->tempkelurahan)->first();
            $this->kelurahan = $this->datakelurahan->nama_kelurahan;

            $this->tempkecamatan = $dataLama->kecamatan;
            $this->datakecamatan = Kecamatan::where('id', $this->tempkecamatan)->first();
            $this->kecamatan = $this->datakecamatan->nama_kecamatan;

            $this->kota = $dataLama->kota;
            $this->datakotaL = Kota::where('id', $this->kota)->first();

            $existDokumen = Dokumen::where('no_register', $this->noreg)->first();
            if (!empty($existDokumen)) {
                $this->skuhaOld = $existDokumen->sk_kemenkumham_ormas;
            }
        }

        // $dataBaru = RubahData::where('no_register', $tabelRubahData->no_register)->first();
        $dataBaru = RubahData::where('id', $id)->first();
        if (!empty($dataBaru)) {

            $this->namaormasbaru = $dataBaru->nama_ormaspol;
            $this->singormasbaru = $dataBaru->singkatan_ormaspol;
            $this->alamatktrbaru = $dataBaru->alamat_kantor_ormaspol;
            $this->skahubaru = $dataBaru->no_sk_ahu;
            $this->tglskahubaru = Carbon::parse($dataBaru->tgl_ahu)->format('d-m-Y');
            $this->tahunahubaru = $dataBaru->tahun_ahu;
            $this->skuhaBaru = $dataBaru->sk_kemenkumham_ormas;

            $this->kelurahanbaru = $dataBaru->kelurahan;
            $this->datakelurahanv = Kelurahan::where('id', $this->kelurahanbaru)->first();

            $this->kecamatanbaru = $dataBaru->kecamatan;
            $this->datakecamatanv = Kecamatan::where('id', $this->kecamatanbaru)->first();

            $this->kota = $dataBaru->kota;
            $this->datakotav = Kota::where('id', $this->kota)->first();
        }
        $this->dispatchBrowserEvent('openPerubahan');
    }

    public function closePerubahan()
    {
        $this->dispatchBrowserEvent('closePerubahan');
    }

    public function render()
    {
        $dataList = SuratKeberadaan::with(['listperubahan', 'persyaratan', 'dokumen', 'ketua', 'sekretaris', 'bendahara', 'pendiri', 'pembina', 'penasihat'])->where(['status' => 'P', 'id_ttd' => '0'])->get();
        $dataPerubahan = RubahData::all();
        $dataUser = User::all();
        $Viewkategori = Kategori::all();
        return view('livewire.ttd-perubahan.ttd-perubahan', compact('dataList', 'dataUser', 'Viewkategori', 'dataPerubahan'));
    }
}
