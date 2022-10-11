<?php

namespace App\Http\Livewire\Rbhnomor;

use App\Models\RubahData;
use App\Models\SuratKeberadaan;
use App\Models\Persyaratan;
use App\Models\OrmasKetua;
use App\Models\OrmasSekretaris;
use App\Models\OrmasBendahara;
use App\Models\OrmasPendiri;
use App\Models\OrmasPembina;
use App\Models\OrmasPenasihat;
use App\Models\Dokumen;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use function PHPUnit\Framework\isNull;

class RubahNomor extends Component
{
    use WithFileUploads;

    public $nomorsurat, $tglsurat, $dataView, $idSurat;
    public $noreg;

    public $namaormas, $singormas, $alamatktr, $kecamatan, $kelurahan, $kota, $skuha, $skahu, $tglskahu, $tahunahu;

    public $namaormasbaru, $singormasbaru, $alamatktrbaru, $kecamatanbaru, $kelurahanbaru, $kotabaru, $skuhabaru, $skahubaru, $tglskahubaru, $tahunahubaru;

    public $datakecamatanv;
    public $tempUrl, $folder, $namefile, $url;

    protected $listeners = [
        'flag' => 'flagacc'
    ];

    public function CloseHistory()
    {
        $this->dispatchBrowserEvent('CloseHistory');
    }

    public function store()
    {
        try {
            $updateData = ['status' => 1];
            RubahData::where('id', $this->idPerubahan)->update($updateData);
            $this->success();
        } catch (\Throwable $th) {
            $this->error();
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
        $this->dispatchBrowserEvent('CloseHistory');
    }

    public function error($msg = null)
    {
        $this->dispatchBrowserEvent('swal:success', [
            'type' => 'error',
            'message' => 'Proses Gagal !' . $msg,
            'toast' => 'true',
            'position' => 'top-end'
        ]);
    }

    public function NomorSurat($id)
    {
        $dataView = SuratKeberadaan::where('perubahan_id', $id)->first();
        $this->idSurat = $id;
        $this->noreg = $dataView->no_register;
        $this->dispatchBrowserEvent('openNomorSurat');
    }

    public function store_nomor()
    {
        $tanggalV = carbon::parse($this->tglsurat)->format('Y-m-d');
        $day = date('D', strtotime($tanggalV));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $hari = $dayList[$day];

        $this->validate(
            [
                'nomorsurat' => 'required',
                'tglsurat' => 'required'
            ],
            [
                'nomorsurat.required' => 'Nomor Surat Tidak Boleh Kosong',
                'tglsurat.required' => 'Tanggal Surat Tidak Boleh Kosong'
            ]
        );

        try {
            $UpdateKeberadaan = [
                'nomor_surat' => $this->nomorsurat,
                'hari' => $hari,
                'tanggal_surat' => carbon::parse($this->tglsurat)->format('Y-m-d')
            ];

            SuratKeberadaan::where('perubahan_id', $this->idSurat)->update($UpdateKeberadaan);

            $this->success();
            $this->resetNomor();
            $this->dispatchBrowserEvent('closeNomorSurat');
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function GantiNomorSurat($id)
    {
        $dataViewG = SuratKeberadaan::where('perubahan_id', $id)->first();
        $this->idSurat = $id;
        $this->noreg = $dataViewG->no_register;
        $this->nomorsurat = $dataViewG->nomor_surat;
        $this->tglsurat = Carbon::parse($dataViewG->tanggal_surat)->format('d-m-Y');

        $this->dispatchBrowserEvent('openNomorSurat');
    }

    public function AjukanTTD($id)
    {
        $cekDataSurat = SuratKeberadaan::where('perubahan_id', $id)->first();

        if ($cekDataSurat == "") {
            $this->dispatchBrowserEvent('swal:confirmNoKosong', [
                'id' => $id,
                'type' => 'warning',
                'message' => 'Nomer Surat Belum Ada, Silahkan Ambil Nomor'
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:confirmAjukan', [
                'id' => $id,
                'type' => 'info',
                'message' => 'Ajukan Tanda Tangan'
            ]);
        }
    }

    public function flagacc($id)
    {
        $ambilNoreg = SuratKeberadaan::where('perubahan_id', $id)->first();

        try {
            $resSurat = ['status' => 'P', 'id_ttd' => 0];
            SuratKeberadaan::where(['perubahan_id' => $id, 'status' => 'B'])->update($resSurat);

            $RubahPermohonan = ['permohonan_id' => 5];
            User::where('no_register', $ambilNoreg->no_register)->update($RubahPermohonan);


            $this->success();
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function closeNomor()
    {
        $this->resetNomor();
        $this->dispatchBrowserEvent('closeNomorSurat');
    }

    public function resetNomor()
    {
        $this->reset(['nomorsurat', 'tglsurat']);
        $this->resetValidation();
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

            // $this->tujuanOrmas = $exist->tujuan_ormas;
            // $tujuanOrmas = $this->tujuanOrmas;

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

    public function viewFile($folder, $namefile)
    {
        $this->url = $folder . '/' . $namefile;
        $this->dispatchBrowserEvent('openViewFile');
    }

    public function closeView()
    {
        $this->dispatchBrowserEvent('closeViewFile');
    }

    public function closePerubahan()
    {
        $this->dispatchBrowserEvent('closePerubahan');
    }

    public function render()
    {
        $Perubahan = RubahData::with(['datasurat'])->where('status', [1, 2])->get();
        $Kategori = Kategori::all();
        $SrtKeberadaan = SuratKeberadaan::where('status', '=', 'B')->get();
        $SrtKeberadaanSurat = SuratKeberadaan::all();
        $dataList = User::with(['kategori', 'persyaratan', 'dokumen', 'ketua', 'sekretaris', 'bendahara', 'pendiri', 'pembina', 'penasihat', 'srtkeberadaan'])->where('permohonan_id', '>=', 5)->get();
        $dataUser = User::all();
        return view('livewire.rbhnomor.rubah-nomor', compact('Perubahan', 'Kategori', 'SrtKeberadaan', 'SrtKeberadaanSurat', 'dataList', 'dataUser'));
    }
}
