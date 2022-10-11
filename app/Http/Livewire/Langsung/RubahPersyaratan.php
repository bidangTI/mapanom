<?php

namespace App\Http\Livewire\Langsung;

use Livewire\Component;

use App\Models\Persyaratan;
use App\Models\User;
use App\Models\AktaNotaris;
use App\Models\Kepengurusan;
use App\Models\Bidang;
use App\Models\Subbidang;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\Kategori;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use function PHPUnit\Framework\isNull;

class RubahPersyaratan extends Component
{
    public $dataSub;
    //variabel form
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
        $noregcari,
        $kategori,
        $verifikasi,
        $statuspersyaratan,
        $ketverifikasi,
        $notifkirim,
        $kecamatan,
        $kelurahan,
        $kota;

    public function mount()
    {
        // $data = User::find(Auth::user()->id);
        // $this->noregcari = $data->no_register;

        // $this->dataAkta = AktaNotaris::all();
        // $this->DataKepengurusan = Kepengurusan::all();

        // $this->dataBidangv = Bidang::all();
        // $this->dataSub = Subbidang::all();

        // $this->datakecamatanv = Kecamatan::all();
        // $this->datakelurahan = Kelurahan::all();
        // $this->datakotav = Kota::all();

        // $this->cariData();
    }

    // Listener Combo child untuk menampilkan sub bidang dari bidang
    public function updatedBidang()
    {
        $this->dataSubbidv = $this->dataSub->where('bidang_id', $this->bidang);
    }

    // Listener Combo child untuk menampilkan kelurahan dari kecamatan
    public function updatedKecamatan()
    {
        $this->datakelurahanv = $this->datakelurahan->where('kecamatan_id', $this->kecamatan);
    }

    public function cariData()
    {
        // $this->noregcari = $data->no_register;

        $this->dataAkta = AktaNotaris::all();
        $this->DataKepengurusan = Kepengurusan::all();

        $this->dataBidangv = Bidang::all();
        $this->dataSub = Subbidang::all();

        $this->datakecamatanv = Kecamatan::all();
        $this->datakelurahan = Kelurahan::all();
        $this->datakotav = Kota::all();

        $exist = Persyaratan::where('no_register', $this->noregcari)->first();
        if (!empty($exist)) {
            $this->namaormas = $exist->nama_ormaspol;
            $this->singormas = $exist->singkatan_ormaspol;
            $this->akta = $exist->akta_id_ormas;
            $this->namanotaris = $exist->nama_notaris_ormaspol;
            $this->noakta = $exist->no_akta_notaris_ormaspol;
            $this->tglnotaris = Carbon::parse($exist->tgl_akta_notaris_ormaspol)->format('d-m-Y');
            $this->nopermohonan = $exist->no_surat_permohonan_ormaspol;
            $this->tglpermohonan = Carbon::parse($exist->tgl_surat_permohonan_ormaspol)->format('d-m-Y');
            $this->bidang = $exist->bidang_id_ormas;
            $this->subbidang = $exist->subbidang_id_ormas;
            $this->alamatktr = $exist->alamat_kantor_ormaspol;
            $this->tempatpendirian = $exist->tempat_pendirian_ormas;
            $this->tglpendirian = Carbon::parse($exist->tgl_pendirian_ormas)->format('d-m-Y');
            $this->skpengurus = $exist->no_sk_kepengurusan_ormaspol;
            $this->keputusan = $exist->keputusan_tinggi_ormas;
            $this->kepengurusan = $exist->kepengurusan_id_ormas;
            $this->npwp = $exist->npwp_ormaspol;
            $this->sumberdana = $exist->sumber_dana;
            $this->tujuanormas = $exist->tujuan_ormas;
            $this->skahu = $exist->no_sk_ahu;
            $this->tglskahu = Carbon::parse($exist->tgl_ahu)->format('d-m-Y');
            $this->tahunahu = $exist->tahun_ahu;
            $this->verifikasi = $exist->verifikasi;
            $this->ketverifikasi = $exist->keterangan_verifikasi;
            $this->kecamatan = $exist->kecamatan;
            $this->kelurahan = $exist->kelurahan;
            $this->kota = $exist->kota;
            $this->noreg = $exist->no_register;

            $this->dataSubbidv = $this->dataSub->where('bidang_id', $exist->bidang_id_ormas);
            $this->datakelurahanv = $this->datakelurahan->where('kecamatan_id', $exist->kecamatan);
        } else {
            $this->cekRegister();
        }

        $dataUser = User::where('no_register', $this->noregcari)->first();
        if (!empty($dataUser)) {
            $cekKategori = Kategori::where('id', $dataUser->kategori_id)->first();
            if (!empty($cekKategori)) {
                $this->kategori =
                    $cekKategori->kategori;
            }
        } else {
            $this->cekRegister();
        }

        $this->resetValidation();
    }


    public function store()
    {
        $this->validate(
            [
                'noreg' => 'required',
                'namaormas' => 'required',
                'singormas' => 'required',
                'akta' => 'required',
                'namanotaris' => 'required',
                'noakta' => 'required',
                'tglnotaris' => 'required|date',
                'nopermohonan' => 'required',
                'tglpermohonan' => 'required|date',
                'bidang' => 'required',
                'subbidang' => 'required',
                'alamatktr' => 'required',
                'tempatpendirian' => 'required',
                'tglpendirian' => 'required|date',
                'skpengurus' => 'required',
                'keputusan' => 'required',
                'kepengurusan' => 'required',
                'npwp' => 'required',
                'sumberdana' => 'required',
                'tujuanormas' => 'required',
                // 'skahu' => 'required',
                // 'tglskahu' => 'required|date',
                // 'tahunahu' => 'required|numeric',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'kota' => 'required'
            ],
            [
                'namaormas.required' => 'Nama Ormas Tidak Boleh Kosong',
                'singormas.required' => 'Singkatan Ormas Tidak Boleh Kosong',
                'akta.required' => 'AKta Notaris Tidak Boleh Kosong',
                'namanotaris.required' => 'Nama Notaris Tidak Boleh Kosong',
                'noakta.required' => 'Nomer Akta Tidak Boleh Kosong',
                'tglnotaris.required' => 'Tanggal Tidak Boleh Kosong',
                'nopermohonan.required' => 'Nomer Permohonan Tidak Boleh Kosong',
                'tglpermohonan.required' => 'Tanggal Tidak Boleh Kosong',
                'bidang.required' => 'Bidang Tidak Boleh Kosong',
                'subbidang.required' => 'Sub Bidang Tidak Boleh Kosong',
                'alamatktr.required' => 'Alamat Tidak Boleh Kosong',
                'tempatpendirian.required' => 'Tempat Pendirian Tidak Boleh Kosong',
                'tglpendirian.required' => 'Tanggal Tidak Boleh Kosong',
                'skpengurus.required' => 'SK Pengurus Tidak Boleh Kosong',
                'keputusan.required' => 'Keputusan Tidak Boleh Kosong',
                'kepengurusan.required' => 'Kepengurusan Tidak Boleh Kosong',
                'npwp.required' => 'NPWP Tidak Boleh Kosong',
                'sumberdana.required' => 'Sumber Dana Tidak Boleh Kosong',
                // 'skahu.required' => 'Sk Tidak Boleh Kosong',
                // 'tglskahu.required' => 'Tanggal Tidak Boleh Kosong',
                // 'tahunahu.required' => 'Tahun Tidak Boleh Kosong',
                // 'tahunahu.numeric' => 'Harus Angka',
                'kecamatan.required' => 'Kecamatan Tidak Boleh Kosong',
                'kelurahan.required' => 'Kelurahan Tidak Boleh Kosong',
                'kota.required' => 'Kota Tidak Boleh Kosong',
            ]
        );

        try {
            Persyaratan::updateorCreate(['no_register' => $this->noreg], [
                'nama_ormaspol' => $this->namaormas,
                'singkatan_ormaspol' => $this->singormas,
                'akta_id_ormas' => $this->akta,
                'nama_notaris_ormaspol' => $this->namanotaris,
                'no_akta_notaris_ormaspol' => $this->noakta,
                'tgl_akta_notaris_ormaspol' => Carbon::parse($this->tglnotaris)->format('Y-m-d'),
                'no_surat_permohonan_ormaspol' => $this->nopermohonan,
                'tgl_surat_permohonan_ormaspol' => Carbon::parse($this->tglpermohonan)->format('Y-m-d'),
                'bidang_id_ormas' => $this->bidang,
                'subbidang_id_ormas' => $this->subbidang,
                'alamat_kantor_ormaspol' => $this->alamatktr,
                'tempat_pendirian_ormas' => $this->tempatpendirian,
                'tgl_pendirian_ormas' => Carbon::parse($this->tglpendirian)->format('Y-m-d'),
                'no_sk_kepengurusan_ormaspol' => $this->skpengurus,
                'tujuan_ormas' => $this->tujuanormas,
                'keputusan_tinggi_ormas' => $this->keputusan,
                'kepengurusan_id_ormas' => $this->kepengurusan,
                'npwp_ormaspol' => $this->npwp,
                'sumber_dana' => $this->sumberdana,
                'no_sk_ahu' => $this->skahu,
                'tgl_ahu' => Carbon::parse($this->tglskahu)->format('Y-m-d'),
                'tahun_ahu' => $this->tahunahu,
                'no_register' => $this->noreg,
                'verifikasi' => 0,
                'kecamatan' => $this->kecamatan,
                'kelurahan' => $this->kelurahan,
                'kota' => $this->kota
            ]);

            $this->success();
            $this->resetFields();
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function resetFields()
    {
        $this->reset([
            'noreg',
            'singormas',
            'kategori',
            'namaormas',
            'akta',
            'namanotaris',
            'noakta',
            'singormas',
            'tglnotaris',
            'nopermohonan',
            'tglpermohonan',
            'bidang',
            'subbidang',
            'alamatktr',
            'tempatpendirian',
            'tglpendirian',
            'skpengurus',
            'keputusan',
            'kepengurusan',
            'npwp',
            'sumberdana',
            'skahu',
            'tglskahu',
            'tahunahu',
            'kecamatan',
            'kelurahan',
            'kota'
        ]);

        // emit summernote
        $this->emit('tujuanormas');
        $this->resetValidation();
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
        $dataPermohonan = User::with(['Persyaratan'])->where('no_register', $this->noreg)->get();

        return view('livewire.langsung.rubah-persyaratan', compact('dataPermohonan'));
    }
}
