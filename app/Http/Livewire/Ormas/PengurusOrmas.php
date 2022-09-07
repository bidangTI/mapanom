<?php

namespace App\Http\Livewire\Ormas;

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

class PengurusOrmas extends Component
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

    // Variabel Form
    public
        $noreg,
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

        $data = User::find(Auth::user()->id);

        $this->noreg = $data->no_register;
        $this->kategori = $data->kategori->kategori;
        $this->loadExistingData();
    }

    public function loadExistingData()
    {
        $existketua = OrmasKetua::where('no_register', $this->noreg)->first();
        if (!empty($existketua)) {
            $this->namaketua = $existketua->nama;
            $this->nikketua = $existketua->nik;
            $this->awalketua = Carbon::parse($existketua->masa_bakti_awal)->format('d-m-Y');
            $this->akhirketua = Carbon::parse($existketua->masa_bakti_akhir)->format('d-m-Y');

            $this->ktpketuaOld = $existketua->file_ktp;
            $this->fotoketuaOld = $existketua->file_foto;
            $this->cvketuaOld = $existketua->file_cv;
        }

        $existsekretaris = OrmasSekretaris::where('no_register', $this->noreg)->first();
        if (!empty($existsekretaris)) {
            $this->namasekretaris = $existsekretaris->nama;
            $this->niksekretaris = $existsekretaris->nik;
            $this->awalsekretaris = Carbon::parse($existsekretaris->masa_bakti_awal)->format('d-m-Y');
            $this->akhirsekretaris = Carbon::parse($existsekretaris->masa_bakti_akhir)->format('d-m-Y');

            $this->ktpsekretarisOld = $existsekretaris->file_ktp;
            $this->fotosekretarisOld = $existsekretaris->file_foto;
            $this->cvsekretarisOld = $existsekretaris->file_cv;
        }

        $existbendahara = OrmasBendahara::where('no_register', $this->noreg)->first();
        if (!empty($existbendahara)) {
            $this->namabendahara = $existbendahara->nama;
            $this->nikbendahara = $existbendahara->nik;
            $this->awalbendahara = Carbon::parse($existbendahara->masa_bakti_awal)->format('d-m-Y');
            $this->akhirbendahara = Carbon::parse($existbendahara->masa_bakti_akhir)->format('d-m-Y');

            $this->ktpbendaharaOld = $existbendahara->file_ktp;
            $this->fotobendaharaOld = $existbendahara->file_foto;
            $this->cvbendaharaOld = $existbendahara->file_cv;
        }

        $existpendiri = OrmasPendiri::where('no_register', $this->noreg)->first();
        if (!empty($existpendiri)) {
            $this->namapendiri = $existpendiri->nama;
            $this->nikpendiri = $existpendiri->nik;
        }

        $existpembina = OrmasPembina::where('no_register', $this->noreg)->first();
        if (!empty($existpembina)) {
            $this->namapembina = $existpembina->nama;
            $this->nikpembina = $existpembina->nik;
        }

        $existpenasihat = OrmasPenasihat::where('no_register', $this->noreg)->first();
        if (!empty($existpenasihat)) {
            $this->namapenasihat = $existpenasihat->nama;
            $this->nikpenasihat = $existpenasihat->nik;
        }

        $this->resetValidation();
    }

    public function store_ketua()
    {
        $this->validate(
            [
                'namaketua' => 'required',
                'nikketua' => 'required',
                'awalketua' => 'required|date',
                'akhirketua' => 'required|date',
                'ktpketua' => empty($this->ktpketuaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'fotoketua' => empty($this->fotoketuaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'cvketua' => empty($this->cvketuaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable'
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
                'cvketua.max' => 'Ukuran File Maximal 512 kb'
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
            $dataketua = array(
                'nama' => $this->namaketua,
                'nik' => $this->nikketua,
                'masa_bakti_awal' => Carbon::parse($this->awalketua)->format('Y-m-d'),
                'masa_bakti_akhir' => Carbon::parse($this->akhirketua)->format('Y-m-d'),
                'file_ktp_v' => 0,
                'file_foto_v' => 0,
                'file_cv_v' => 0,
                'verifikasi' => 0
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

            // $dataUpdateReg = ['reg' => $this->noreg];
            // $updateReg = OrmasKetua::where('no_register', $this->noreg)->update($dataUpdateReg);

            $this->success();
            $this->resetKetuaFUpload();
            $this->cleanuplivewireTmp();
            $this->loadExistingData();
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function store_sekretaris()
    {
        $this->validate(
            [
                'namasekretaris' => 'required',
                'niksekretaris' => 'required',
                'awalsekretaris' => 'required|date',
                'akhirsekretaris' => 'required|date',
                'ktpsekretaris' => empty($this->ktpsekretarisOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'fotosekretaris' => empty($this->fotosekretarisOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'cvsekretaris' => empty($this->cvsekretarisOld) ? 'required|file|mimes:pdf|max:512' : 'nullable'
            ],
            [
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
                'cvsekretaris.max' => 'Ukuran File Maximal 512 kb'
            ]
        );

        try {

            if ($this->ktpsekretaris && $this->ktpsekretarisOld != null) {
                Storage::delete($this->ktpsekretarisOld);
            }
            if ($this->fotosekretaris && $this->fotosekretarisOld != null) {
                Storage::delete($this->fotosekretarisOld);
            }
            if ($this->cvsekretaris && $this->cvsekretarisOld != null) {
                Storage::delete($this->cvsekretarisOld);
            }
            $datasekretaris = array(
                'nama' => $this->namasekretaris,
                'nik' => $this->niksekretaris,
                'masa_bakti_awal' => Carbon::parse($this->awalsekretaris)->format('Y-m-d'),
                'masa_bakti_akhir' => Carbon::parse($this->akhirsekretaris)->format('Y-m-d'),
                'file_ktp_v' => 0,
                'file_foto_v' => 0,
                'file_cv_v' => 0,
                'verifikasi' => 0
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

            // $dataUpdateReg = ['reg' => $this->noreg];
            // $updateReg = OrmasSekretaris::where('no_register', $this->noreg)->update($dataUpdateReg);

            $this->success();
            $this->resetSekretarisFUpload();
            $this->cleanuplivewireTmp();
            $this->loadExistingData();
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function store_bendahara()
    {
        $this->validate(
            [
                'namabendahara' => 'required',
                'nikbendahara' => 'required',
                'awalbendahara' => 'required|date',
                'akhirbendahara' => 'required|date',
                'ktpbendahara' => empty($this->ktpbendaharaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'fotobendahara' => empty($this->fotobendaharaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable',
                'cvbendahara' => empty($this->cvbendaharaOld) ? 'required|file|mimes:pdf|max:512' : 'nullable'
            ],
            [
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
                'cvbendahara.max' => 'Ukuran File Maximal 512 kb'
            ]
        );

        try {

            if ($this->ktpbendahara && $this->ktpbendaharaOld != null) {
                Storage::delete($this->ktpbendaharaOld);
            }
            if ($this->fotobendahara && $this->fotobendaharaOld != null) {
                Storage::delete($this->fotobendaharaOld);
            }
            if ($this->cvbendahara && $this->cvbendaharaOld != null) {
                Storage::delete($this->cvbendaharaOld);
            }
            $databendahara = array(
                'nama' => $this->namabendahara,
                'nik' => $this->nikbendahara,
                'masa_bakti_awal' => Carbon::parse($this->awalbendahara)->format('Y-m-d'),
                'masa_bakti_akhir' => Carbon::parse($this->akhirbendahara)->format('Y-m-d'),
                'file_ktp_v' => 0,
                'file_foto_v' => 0,
                'file_cv_v' => 0,
                'verifikasi' => 0
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

            // $dataUpdateReg = ['reg' => $this->noreg];
            // $updateReg = OrmasBendahara::where('no_register', $this->noreg)->update($dataUpdateReg);

            $this->success();
            $this->resetbendaharaFUpload();
            $this->cleanuplivewireTmp();
            $this->loadExistingData();
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function store_lainnya()
    {
        $this->validate(
            [
                'namapendiri' => 'required',
                'nikpendiri' => 'required',
                'namapembina' => 'required',
                'nikpembina' => 'required',
                'namapenasihat' => 'required',
                'nikpenasihat' => 'required'

            ],
            [
                'namapendiri.required' => 'Nama Pendiri Harap Diisi',
                'nikpendiri.required' => 'NIK Pendiri Harap Diisi',
                'namapembina.required' => 'Nama Pembina Harap Diisi',
                'nikpembina.required' => 'NIK Pembina Harap Diisi',
                'namapenasihat.required' => 'Nama Penasihat Harap Diisi',
                'nikpenasihat.required' => 'NIK Penasihat Harap Diisi'

            ]
        );

        try {

            $datapendiri = array(
                'nama' => $this->namapendiri,
                'nik' => $this->nikpendiri,
                'verifikasi' => 0
            );
            OrmasPendiri::updateorCreate(['no_register' => $this->noreg], $datapendiri);

            // $dataUpdateReg = ['reg' => $this->noreg];
            // $updateReg = OrmasPendiri::where('no_register', $this->noreg)->update($dataUpdateReg);

            $datapembina = array(
                'nama' => $this->namapembina,
                'nik' => $this->nikpembina,
                'verifikasi' => 0
            );
            OrmasPembina::updateorCreate(['no_register' => $this->noreg], $datapembina);

            // $dataUpdateReg = ['reg' => $this->noreg];
            // $updateReg = OrmasPembina::where('no_register', $this->noreg)->update($dataUpdateReg);

            $datapenasihat = array(
                'nama' => $this->namapenasihat,
                'nik' => $this->nikpenasihat,
                'verifikasi' => 0
            );
            OrmasPenasihat::updateorCreate(['no_register' => $this->noreg], $datapenasihat);

            // $dataUpdateReg = ['reg' => $this->noreg];
            // $updateReg = OrmasPenasihat::where('no_register', $this->noreg)->update($dataUpdateReg);

            $this->success();
            $this->cleanuplivewireTmp();
            $this->loadExistingData();
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
        $this->reset('namapendiri', 'nikpendiri', 'namapembina', 'nikpembina', 'namapenasihat', 'nikpenasihat');
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

    public function cleanuplivewireTmp()
    {
        $oldFiles = Storage::files('livewire-tmp');
        foreach ($oldFiles as $file) {
            Storage::delete($file);
        }
    }

    public function render()
    {
        $dataPermohonan = User::where('no_register', $this->noreg)->get();
        return view('livewire.ormas.pengurus-ormas', compact('dataPermohonan'));
    }
}
