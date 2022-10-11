<?php

namespace App\Http\Livewire\Langsung;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\User;
use App\Models\OrmasKetua;
use App\Models\OrmasSekretaris;
use App\Models\OrmasBendahara;
use App\Models\OrmasPendiri;
use App\Models\OrmasPembina;
use App\Models\OrmasPenasihat;

use App\Models\Persyaratan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use function PHPUnit\Framework\isNull;

class RubahPengurus extends Component
{

    use WithFileUploads;

    // Variabel For File Upload
    public $iterKtpKetua, $iterFotoKetua, $iterCvKetua;
    public $iterKtpSekretaris, $iterFotoSekretaris, $iterCvSekretaris;
    public $iterKtpBendahara, $iterFotoBendahara, $iterCvBendahara;

    // Variabel Temporari FIle Upload
    public $ktpketuaOld, $fotoketuaOld, $cvketuaOld;
    public $ktpsekretarisOld, $fotosekretarisOld, $cvsekretarisOld;
    public $ktpbendaharaOld, $fotobendaharaOld, $cvbendaharaOld;

    public $tempUrl, $folder, $namefile, $url;

    public
        $verifikasi_ketua,
        $ketverifikasi_ketua,
        $file_ktp_v_ketua,
        $file_foto_v_ketua,
        $file_cv_v_ketua,
        $verifikasi_bendahara,
        $ketverifikasi_bendahara,
        $file_ktp_v_bendahara,
        $file_foto_v_bendahara,
        $file_cv_v_bendahara,
        $verifikasi_sekretaris,
        $ketverifikasi_sekretaris,
        $file_ktp_v_sekretaris,
        $file_foto_v_sekretaris,
        $file_cv_v_sekretaris,
        $verifikasi_pendiri,
        $ketverifikasi_pendiri,
        $verifikasi_pembina,
        $ketverifikasi_pembina,
        $verifikasi_penasihat,
        $ketverifikasi_penasihat,
        $notifkirim,
        $statuspengurus;
    // Variabel Form
    public
        $noreg,
        $noregcari,
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
        $nikpenasihat,
        $awalketuaOld,
        $akhirketuaOld;

    public function mount()
    {
        // Nilai Variabel For File Upload
        $this->iterKtpKetua = 0;
        $this->iterFotoKetua = 0;
        $this->iterCvKetua = 0;
        $this->iterKtpSekretaris = 0;
        $this->iterFotoSekretaris = 0;
        $this->iterCvSekretaris = 0;
        $this->iterKtpBendahara = 0;
        $this->iterFotoBendahara = 0;
        $this->iterCvBendahara = 0;

        // $data = User::find(Auth::user()->id);

        // $this->noregcari = $data->no_register;
        // $this->noreg = $data->no_register;

        // $this->cariData();
    }

    public function cariData()
    {
        $existketua = OrmasKetua::where('no_register', $this->noregcari)->first();
        if (!empty($existketua)) {
            $this->noregcari = $existketua->no_register;
            $this->noreg = $existketua->no_register;

            $this->namaketua = $existketua->nama;
            $this->nikketua = $existketua->nik;
            $this->awalketua = Carbon::parse($existketua->masa_bakti_awal)->format('d-m-Y');
            $this->akhirketua = Carbon::parse($existketua->masa_bakti_akhir)->format('d-m-Y');

            $this->awalketuaOld = $this->awalketua;

            $this->ktpketuaOld = $existketua->file_ktp;
            $this->fotoketuaOld = $existketua->file_foto;
            $this->cvketuaOld = $existketua->file_cv;

            $this->verifikasi_ketua = $existketua->verifikasi;
            $this->ketverifikasi_ketua = $existketua->keterangan_verifikasi;
            $this->file_ktp_v_ketua = $existketua->file_ktp_v;
            $this->file_foto_v_ketua = $existketua->file_foto_v;
            $this->file_cv_v_ketua = $existketua->file_cv_v;
        } else {
            $this->cekRegister();
        }

        $existsekretaris = OrmasSekretaris::where('no_register', $this->noregcari)->first();
        if (!empty($existsekretaris)) {
            $this->namasekretaris = $existsekretaris->nama;
            $this->niksekretaris = $existsekretaris->nik;
            $this->awalsekretaris = Carbon::parse($existsekretaris->masa_bakti_awal)->format('d-m-Y');
            $this->akhirsekretaris = Carbon::parse($existsekretaris->masa_bakti_akhir)->format('d-m-Y');

            $this->ktpsekretarisOld = $existsekretaris->file_ktp;
            $this->fotosekretarisOld = $existsekretaris->file_foto;
            $this->cvsekretarisOld = $existsekretaris->file_cv;

            $this->verifikasi_sekretaris = $existsekretaris->verifikasi;
            $this->ketverifikasi_sekretaris = $existsekretaris->keterangan_verifikasi;
            $this->file_ktp_v_sekretaris = $existsekretaris->file_ktp_v;
            $this->file_foto_v_sekretaris = $existsekretaris->file_foto_v;
            $this->file_cv_v_sekretaris = $existsekretaris->file_cv_v;
        }

        $existbendahara = OrmasBendahara::where('no_register', $this->noregcari)->first();
        if (!empty($existbendahara)) {
            $this->namabendahara = $existbendahara->nama;
            $this->nikbendahara = $existbendahara->nik;
            $this->awalbendahara = Carbon::parse($existbendahara->masa_bakti_awal)->format('d-m-Y');
            $this->akhirbendahara = Carbon::parse($existbendahara->masa_bakti_akhir)->format('d-m-Y');

            $this->ktpbendaharaOld = $existbendahara->file_ktp;
            $this->fotobendaharaOld = $existbendahara->file_foto;
            $this->cvbendaharaOld = $existbendahara->file_cv;

            $this->verifikasi_bendahara = $existbendahara->verifikasi;
            $this->ketverifikasi_bendahara = $existbendahara->keterangan_verifikasi;
            $this->file_ktp_v_bendahara = $existbendahara->file_ktp_v;
            $this->file_foto_v_bendahara = $existbendahara->file_foto_v;
            $this->file_cv_v_bendahara = $existbendahara->file_cv_v;
        }

        $existpendiri = OrmasPendiri::where('no_register', $this->noregcari)->first();
        if (!empty($existpendiri)) {
            $this->namapendiri = $existpendiri->nama;
            $this->nikpendiri = $existpendiri->nik;

            $this->verifikasi_pendiri = $existpendiri->verifikasi;
            $this->ketverifikasi_pendiri = $existpendiri->keterangan_verifikasi;
        }

        $existpembina = OrmasPembina::where('no_register', $this->noregcari)->first();
        if (!empty($existpembina)) {
            $this->namapembina = $existpembina->nama;
            $this->nikpembina = $existpembina->nik;

            $this->verifikasi_pembina = $existpembina->verifikasi;
            $this->ketverifikasi_pembina = $existpembina->keterangan_verifikasi;
        }

        $existpenasihat = OrmasPenasihat::where('no_register', $this->noregcari)->first();
        if (!empty($existpenasihat)) {
            $this->namapenasihat = $existpenasihat->nama;
            $this->nikpenasihat = $existpenasihat->nik;

            $this->verifikasi_penasihat = $existpenasihat->verifikasi;
            $this->ketverifikasi_penasihat = $existpenasihat->keterangan_verifikasi;
        }

        $existNotifikasi = User::where('no_register', $this->noregcari)->first();
        if (!empty($existNotifikasi)) {
            $this->statuspengurus = $existNotifikasi->status_pengurus;
            $this->notifkirim = $existNotifikasi->notifikasi_kirim;
        }

        $this->resetValidation();
    }

    public function store_all()
    {
        $this->validate(
            [
                'namaketua' => 'required',
                'nikketua' => 'required',
                'awalketua' => 'required|date',
                'akhirketua' => 'required|date',
                'ktpketua' => empty($this->ktpketuaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'fotoketua' => empty($this->fotoketuaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'cvketua' => empty($this->cvketuaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'namasekretaris' => 'required',
                'niksekretaris' => 'required',
                'awalsekretaris' => 'required|date',
                'akhirsekretaris' => 'required|date',
                'ktpsekretaris' => empty($this->ktpsekretarisOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'fotosekretaris' => empty($this->fotosekretarisOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'cvsekretaris' => empty($this->cvsekretarisOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'namabendahara' => 'required',
                'nikbendahara' => 'required',
                'awalbendahara' => 'required|date',
                'akhirbendahara' => 'required|date',
                'ktpbendahara' => empty($this->ktpbendaharaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'fotobendahara' => empty($this->fotobendaharaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'cvbendahara' => empty($this->cvbendaharaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'namapendiri' => 'required',
                'nikpendiri' => 'required',
                'namapembina' => 'required',
                'nikpembina' => 'required',
                'namapenasihat' => 'required',
                'nikpenasihat' => 'required'
            ],
            [
                'namaketua.required' => 'Nama Ketua Harap Diisi',
                'nikketua.required' => 'NIK Ketua Harap Diisi',
                'awalketua.required' => 'Tanggal Harap Diisi',
                'akhirketua.required' => 'Tanggal Harap Diisi',

                'ktpketua.required' => 'File KTP Harap Diisi',
                'ktpketua.mimes' => 'Format File Tidak Sesuai',
                'ktpketua.max' => 'Ukuran File Maximal 512 kb',

                'fotoketua.required' => 'File Foto Harap Diisi',
                'fotoketua.mimes' => 'Format File Tidak Sesuai',
                'fotoketua.max' => 'Ukuran File Maximal 512 kb',

                'cvketua.required' => 'File CV Harap Diisi',
                'cvketua.mimes' => 'Format File Tidak Sesuai',
                'cvketua.max' => 'Ukuran File Maximal 512 kb',
                'namasekretaris.required' => 'Nama sekretaris Harap Diisi',
                'niksekretaris.required' => 'NIK sekretaris Harap Diisi',
                'awalsekretaris.required' => 'Tanggal Harap Diisi',
                'akhirsekretaris.required' => 'Tanggal Harap Diisi',

                'ktpsekretaris.required' => 'File KTP Harap Diisi',
                'ktpsekretaris.mimes' => 'Format File Tidak Sesuai',
                'ktpsekretaris.max' => 'Ukuran File Maximal 512 kb',

                'fotosekretaris.required' => 'File Foto Harap Diisi',
                'fotosekretaris.mimes' => 'Format File Tidak Sesuai',
                'fotosekretaris.max' => 'Ukuran File Maximal 512 kb',

                'cvsekretaris.required' => 'File CV Harap Diisi',
                'cvsekretaris.mimes' => 'Format File Tidak Sesuai',
                'cvsekretaris.max' => 'Ukuran File Maximal 512 kb',
                'namabendahara.required' => 'Nama Bendahara Harap Diisi',
                'nikbendahara.required' => 'NIK Bendahara Harap Diisi',
                'awalbendahara.required' => 'Tanggal Harap Diisi',
                'akhirbendahara.required' => 'Tanggal Harap Diisi',

                'ktpbendahara.required' => 'File KTP Harap Diisi',
                'ktpbendahara.mimes' => 'Format File Tidak Sesuai',
                'ktpbendahara.max' => 'Ukuran File Maximal 512 kb',

                'fotobendahara.required' => 'File Foto Harap Diisi',
                'fotobendahara.mimes' => 'Format File Tidak Sesuai',
                'fotobendahara.max' => 'Ukuran File Maximal 512 kb',

                'cvbendahara.required' => 'File CV Harap Diisi',
                'cvbendahara.mimes' => 'Format File Tidak Sesuai',
                'cvbendahara.max' => 'Ukuran File Maximal 512 kb',
                'namapendiri.required' => 'Nama Pendiri Harap Diisi',
                'nikpendiri.required' => 'NIK Pendiri Harap Diisi',
                'namapembina.required' => 'Nama Pembina Harap Diisi',
                'nikpembina.required' => 'NIK Pembina Harap Diisi',
                'namapenasihat.required' => 'Nama Penasihat Harap Diisi',
                'nikpenasihat.required' => 'NIK Penasihat Harap Diisi'
            ]
        );
        try {

            if ($this->ktpketua && $this->ktpketuaOld != null) {
                Storage::delete($this->ktpketuaOld);
            }
            if ($this->fotoketua && $this->fotoketuaOld != null) {
                Storage::delete($this->fotoketuaOld);
            }
            if ($this->cvketua && $this->cvketuaOld != null) {
                Storage::delete($this->cvketuaOld);
            }

            if ($this->ktpsekretaris && $this->ktpsekretarisOld != null) {
                Storage::delete($this->ktpsekretarisOld);
            }
            if ($this->fotosekretaris && $this->fotosekretarisOld != null) {
                Storage::delete($this->fotosekretarisOld);
            }
            if ($this->cvsekretaris && $this->cvsekretarisOld != null) {
                Storage::delete($this->cvsekretarisOld);
            }

            if ($this->ktpbendahara && $this->ktpbendaharaOld != null) {
                Storage::delete($this->ktpbendaharaOld);
            }
            if ($this->fotobendahara && $this->fotobendaharaOld != null) {
                Storage::delete($this->fotobendaharaOld);
            }
            if ($this->cvbendahara && $this->cvbendaharaOld != null) {
                Storage::delete($this->cvbendaharaOld);
            }

            if ($this->verifikasi_ketua == 1) {
                $val_ketua_rev = 1;
            } else {
                $val_ketua_rev = 0;
            }

            if ($this->file_ktp_v_ketua == 1) {
                $file_ktp_v_ketua_rev = 1;
            } else {
                $file_ktp_v_ketua_rev = 0;
            }

            if ($this->file_foto_v_ketua == 1) {
                $file_foto_v_ketua_rev = 1;
            } else {
                $file_foto_v_ketua_rev = 0;
            }

            if ($this->file_cv_v_ketua == 1) {
                $file_cv_v_ketua_rev = 1;
            } else {
                $file_cv_v_ketua_rev = 0;
            }

            $dataketua = array(
                'nama' => $this->namaketua,
                'nik' => $this->nikketua,
                'masa_bakti_awal' => Carbon::parse($this->awalketua)->format('Y-m-d'),
                'masa_bakti_akhir' => Carbon::parse($this->akhirketua)->format('Y-m-d'),
                'file_ktp_v' => $file_ktp_v_ketua_rev,
                'file_foto_v' => $file_foto_v_ketua_rev,
                'file_cv_v' => $file_cv_v_ketua_rev,
                'verifikasi' => $val_ketua_rev
            );


            if ($this->ktpketua) {
                $dataketua['file_ktp'] = $this->ktpketua->store('ktp_pengurus');
            }
            if ($this->fotoketua) {
                $dataketua['file_foto'] = $this->fotoketua->store('foto_pengurus');
            }
            if ($this->cvketua) {
                $dataketua['file_cv'] = $this->cvketua->store('cv_pengurus');
            }
            OrmasKetua::updateorCreate(['no_register' => $this->noreg], $dataketua);

            if ($this->verifikasi_sekretaris == 1) {
                $val_sekretaris_rev = 1;
            } else {
                $val_sekretaris_rev = 0;
            }

            if ($this->file_ktp_v_sekretaris == 1) {
                $file_ktp_v_sekretaris_rev = 1;
            } else {
                $file_ktp_v_sekretaris_rev = 0;
            }

            if ($this->file_foto_v_sekretaris == 1) {
                $file_foto_v_sekretaris_rev = 1;
            } else {
                $file_foto_v_sekretaris_rev = 0;
            }

            if ($this->file_cv_v_sekretaris == 1) {
                $file_cv_v_sekretaris_rev = 1;
            } else {
                $file_cv_v_sekretaris_rev = 0;
            }
            $datasekretaris = array(
                'nama' => $this->namasekretaris,
                'nik' => $this->niksekretaris,
                'masa_bakti_awal' => Carbon::parse($this->awalsekretaris)->format('Y-m-d'),
                'masa_bakti_akhir' => Carbon::parse($this->akhirsekretaris)->format('Y-m-d'),
                'file_ktp_v' => $file_ktp_v_sekretaris_rev,
                'file_foto_v' => $file_foto_v_sekretaris_rev,
                'file_cv_v' => $file_cv_v_sekretaris_rev,
                'verifikasi' =>  $val_sekretaris_rev
            );
            if ($this->ktpsekretaris) {
                $datasekretaris['file_ktp'] = $this->ktpsekretaris->store('ktp_pengurus');
            }
            if ($this->fotosekretaris) {
                $datasekretaris['file_foto'] = $this->fotosekretaris->store('foto_pengurus');
            }
            if ($this->cvsekretaris) {
                $datasekretaris['file_cv'] = $this->cvsekretaris->store('cv_pengurus');
            }
            OrmasSekretaris::updateorCreate(['no_register' => $this->noreg], $datasekretaris);


            if ($this->verifikasi_bendahara == 1) {
                $val_bendahara_rev = 1;
            } else {
                $val_bendahara_rev = 0;
            }

            if ($this->file_ktp_v_bendahara == 1) {
                $file_ktp_v_bendahara_rev = 1;
            } else {
                $file_ktp_v_bendahara_rev = 0;
            }

            if ($this->file_foto_v_bendahara == 1) {
                $file_foto_v_bendahara_rev = 1;
            } else {
                $file_foto_v_bendahara_rev = 0;
            }

            if ($this->file_cv_v_bendahara == 1) {
                $file_cv_v_bendahara_rev = 1;
            } else {
                $file_cv_v_bendahara_rev = 0;
            }
            $databendahara = array(
                'nama' => $this->namabendahara,
                'nik' => $this->nikbendahara,
                'masa_bakti_awal' => Carbon::parse($this->awalbendahara)->format('Y-m-d'),
                'masa_bakti_akhir' => Carbon::parse($this->akhirbendahara)->format('Y-m-d'),
                'file_ktp_v' => $file_ktp_v_bendahara_rev,
                'file_foto_v' => $file_foto_v_bendahara_rev,
                'file_cv_v' => $file_cv_v_bendahara_rev,
                'verifikasi' => $val_bendahara_rev
            );
            if ($this->ktpbendahara) {
                $databendahara['file_ktp'] = $this->ktpbendahara->store('ktp_pengurus');
            }
            if ($this->fotobendahara) {
                $databendahara['file_foto'] = $this->fotobendahara->store('foto_pengurus');
            }
            if ($this->cvbendahara) {
                $databendahara['file_cv'] = $this->cvbendahara->store('cv_pengurus');
            }
            OrmasBendahara::updateorCreate(['no_register' => $this->noreg], $databendahara);


            if ($this->verifikasi_pendiri == 1) {
                $val_pendiri_rev = 1;
            } else {
                $val_pendiri_rev = 0;
            }
            $datapendiri = array(
                'nama' => $this->namapendiri,
                'nik' => $this->nikpendiri,
                'verifikasi' => $val_pendiri_rev
            );
            OrmasPendiri::updateorCreate(['no_register' => $this->noreg], $datapendiri);


            if ($this->verifikasi_pembina == 1) {
                $val_pembina_rev = 1;
            } else {
                $val_pembina_rev = 0;
            }
            $datapembina = array(
                'nama' => $this->namapembina,
                'nik' => $this->nikpembina,
                'verifikasi' => $val_pembina_rev
            );
            OrmasPembina::updateorCreate(['no_register' => $this->noreg], $datapembina);

            if ($this->verifikasi_penasihat == 1) {
                $val_penasihat_rev = 1;
            } else {
                $val_penasihat_rev = 0;
            }
            $datapenasihat = array(
                'nama' => $this->namapenasihat,
                'nik' => $this->nikpenasihat,
                'verifikasi' => $val_penasihat_rev
            );
            OrmasPenasihat::updateorCreate(['no_register' => $this->noreg], $datapenasihat);

            if (empty($this->notifkirim)) {
                User::updateorCreate(['no_register' => $this->noreg], [
                    'feedback_pengurus' => null
                ]);
            } elseif ($this->notifkirim == 'Y') {
                User::updateorCreate(['no_register' => $this->noreg], [
                    'feedback_pengurus' => 'Y'
                ]);
            }

            $this->success();
            $this->resetKetuaFUpload();
            $this->resetSekretarisFUpload();
            $this->resetBendaharaFUpload();
            $this->resetLainnya();

            // $this->cleanuplivewireTmp(); tidak dipakai
            // $this->cariData();
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function resetKetuaFUpload()
    {
        $this->reset(
            'ktpketua',
            'fotoketua',
            'cvketua'
        );
        $this->resetvalidation();
        $this->iterKtpKetua += 1;
        $this->iterFotoKetua += 1;
        $this->iterCvKetua += 1;
    }

    public function resetKetua()
    {
        $this->reset(
            'ktpketua',
            'fotoketua',
            'cvketua',
            'namaketua',
            'nikketua',
            'awalketua',
            'akhirketua'
        );
        $this->resetvalidation();
        $this->iterKtpKetua += 1;
        $this->iterFotoKetua += 1;
        $this->iterCvKetua += 1;
    }

    public function resetSekretarisFUpload()
    {
        $this->reset(
            'ktpsekretaris',
            'fotosekretaris',
            'cvsekretaris'
        );
        $this->resetvalidation();
        $this->iterKtpSekretaris += 1;
        $this->iterFotoSekretaris += 1;
        $this->iterCvSekretaris += 1;
    }
    public function resetSekretaris()
    {
        $this->reset(
            'ktpsekretaris',
            'fotosekretaris',
            'cvsekretaris',
            'namasekretaris',
            'niksekretaris',
            'awalsekretaris',
            'akhirsekretaris'
        );
        $this->resetvalidation();
        $this->iterKtpSekretaris += 1;
        $this->iterFotoSekretaris += 1;
        $this->iterCvSekretaris += 1;
    }

    public function resetBendaharaFUpload()
    {
        $this->reset(
            'ktpbendahara',
            'fotobendahara',
            'cvbendahara'
        );
        $this->resetvalidation();
        $this->iterKtpBendahara += 1;
        $this->iterFotoBendahara += 1;
        $this->iterCvBendahara += 1;
    }

    public function resetBendahara()
    {
        $this->reset(
            'ktpbendahara',
            'fotobendahara',
            'cvbendahara',
            'namabendahara',
            'nikbendahara',
            'awalbendahara',
            'akhirbendahara'
        );
        $this->resetvalidation();
        $this->iterKtpBendahara += 1;
        $this->iterFotoBendahara += 1;
        $this->iterCvBendahara += 1;
    }

    public function resetLainnya()
    {
        $this->reset(
            'namapendiri',
            'nikpendiri',
            'namapembina',
            'nikpembina',
            'namapenasihat',
            'nikpenasihat',
            'namaketua',
            'nikketua',
            'awalketua',
            'akhirketua',
            'namasekretaris',
            'niksekretaris',
            'awalsekretaris',
            'akhirsekretaris',
            'namabendahara',
            'nikbendahara',
            'awalbendahara',
            'akhirbendahara',
            'noreg',
            'ktpketuaOld',
            'fotoketuaOld',
            'cvketuaOld',
            'ktpsekretarisOld',
            'fotosekretarisOld',
            'cvsekretarisOld',
            'ktpbendaharaOld',
            'fotobendaharaOld',
            'cvbendaharaOld'
        );
        $this->resetvalidation();
    }

    //FILE  UPLOAD KETUA
    public function updatedKtpketua()
    {
        $this->validate(
            [
                'ktpketua' => 'file|mimes:pdf|max:512'
            ],
            [
                'ktpketua.mimes' => 'Format File pdf',
                'ktpketua.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    public function updatedFotoketua()
    {
        $this->validate(
            [
                'fotoketua' => 'file|mimes:pdf|max:512'
            ],
            [
                'fotoketua.mimes' => 'Format File pdf',
                'fotoketua.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    public function updatedCVketua()
    {
        $this->validate(
            [
                'cvketua' => 'file|mimes:pdf|max:512'
            ],
            [
                'cvketua.mimes' => 'Format File pdf',
                'cvketua.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    // FILE UPLOAD SEKRETARIS
    public function updatedKtpsekretaris()
    {
        $this->validate(
            [
                'ktpsekretaris' => 'file|mimes:pdf|max:512'
            ],
            [
                'ktpsekretaris.mimes' => 'Format File pdf',
                'ktpsekretaris.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    public function updatedFotosekretaris()
    {
        $this->validate(
            [
                'fotosekretaris' => 'file|mimes:pdf|max:512'
            ],
            [
                'fotosekretaris.mimes' => 'Format File pdf',
                'fotosekretaris.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    public function updatedCVsekretaris()
    {
        $this->validate(
            [
                'cvsekretaris' => 'file|mimes:pdf|max:512'
            ],
            [
                'cvsekretaris.mimes' => 'Format File pdf',
                'cvsekretaris.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    // FILE UPLOAD BENDAHARA
    public function updatedKtpbendahara()
    {
        $this->validate(
            [
                'ktpbendahara' => 'file|mimes:pdf|max:512'
            ],
            [
                'ktpbendahara.mimes' => 'Format File pdf',
                'ktpbendahara.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    public function updatedFotobendahara()
    {
        $this->validate(
            [
                'fotobendahara' => 'file|mimes:pdf|max:512'
            ],
            [
                'fotobendahara.mimes' => 'Format File pdf',
                'fotobendahara.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    public function updatedCVbendahara()
    {
        $this->validate(
            [
                'cvbendahara' => 'file|mimes:pdf|max:512'
            ],
            [
                'cvbendahara.mimes' => 'Format File pdf',
                'cvbendahara.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    public function success()
    {
        $this->dispatchBrowserEvent('swal:modal', [
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
            'message' => 'Proses Gagal' . $msg,
            'toast' => 'true',
            'position' => 'top-end'
        ]);
    }

    // public function cleanuplivewireTmp()
    // {
    //     $oldFiles = Storage::files('livewire-tmp');
    //     foreach ($oldFiles as $file) {
    //         Storage::delete($file);
    //     }
    // }

    public function viewFile($folder, $namefile)
    {
        $this->url = $folder . '/' . $namefile;
        $this->dispatchBrowserEvent('openViewFile');
    }

    public function closeView()
    {
        $this->dispatchBrowserEvent('closeViewFile');
    }

    public function cekRegister()
    {
        $this->dispatchBrowserEvent('swal:cek', [
            'type' => 'info',
            'message' => 'Data Tidak Ditemukan'
            // 'toast' => 'true',
            // 'position' => 'top-end'
        ]);
    }

    public function render()
    {
        // $dataPermohonan = User::with(['ketua', 'sekretaris', 'bendahara', 'pendiri', 'pembina', 'penasihat'])->where('no_register', $this->noregcari)->get();
        // return view('livewire.langsung.rubah-pengurus', compact('dataPermohonan'));
        return view('livewire.langsung.rubah-pengurus');
    }
}
