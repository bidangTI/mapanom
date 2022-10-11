<?php

namespace App\Http\Livewire\Notif;

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

class DataNotif extends Component
{
    use WithFileUploads;

    protected $listeners = ['deleteRubah' => 'batal'];

    public $tempUrl, $folder, $namefile, $url;
    public $tempUrlBaru, $folderBaru, $namefileBaru, $urlBaru;
    public $namaormas, $singormas, $alamatktr, $kecamatan, $kelurahan, $kota, $skuha, $skahu, $tglskahu, $tahunahu;
    public $namaormasbaru, $singormasbaru, $alamatktrbaru, $kecamatanbaru, $kelurahanbaru, $kotabaru, $skuhabaru, $skahubaru, $tglskahubaru, $tahunahubaru;
    public $datakecamatanv, $datakelurahanv, $datakotav;
    public $datakecamatanvbaru, $datakelurahanvbaru, $datakotavbaru,$idPerubahan;


    public function ShowHistori($id)
    {
        $dataPerubahan = RubahData::where('id', '=', $id)->first();
        $this->noreg = $dataPerubahan->no_register;
        $this->idPerubahan = $dataPerubahan->id;

        $dataLama = Persyaratan::where('no_register', $this->noreg)->first();
        if (!empty($dataLama)) {
            $this->datakecamatanv = Kecamatan::where('id', $dataLama->kecamatan)->first();
            $this->datakelurahanv = Kelurahan::where('id', $dataLama->kelurahan)->first();
            $this->datakotav = Kota::where('id', $dataLama->kota)->first();

            $this->namaormas = $dataLama->nama_ormaspol;
            $this->singormas = $dataLama->singkatan_ormaspol;
            $this->alamatktr = $dataLama->alamat_kantor_ormaspol;
            $this->skahu = $dataLama->no_sk_ahu;
            $this->tglskahu = Carbon::parse($dataLama->tgl_ahu)->format('d-m-Y');
            $this->tahunahu = $dataLama->tahun_ahu;
            $this->kecamatan = $this->datakecamatanv->nama_kecamatan;
            $this->kelurahan = $this->datakelurahanv->nama_kelurahan;
            $this->kota =  $this->datakotav->kota;


            // $this->tujuanOrmas = $exist->tujuan_ormas;
            // $tujuanOrmas = $this->tujuanOrmas;

            $existDokumen = Dokumen::where('no_register', $this->noreg)->first();
            if (!empty($existDokumen)) {
                $this->skuhaOld = $existDokumen->sk_kemenkumham_ormas;
            }
        }

        $dataBaru = RubahData::where('id', '=', $id)->first();
        if (!empty($dataBaru)) {
            $this->datakecamatanvbaru = Kecamatan::where('id', $dataBaru->kecamatan)->first();
            $this->datakelurahanvbaru = Kelurahan::where('id', $dataBaru->kelurahan)->first();
            $this->datakotavbaru = Kota::where('id', $dataBaru->kota)->first();

            $this->namaormasbaru = $dataBaru->nama_ormaspol;
            $this->singormasbaru = $dataBaru->singkatan_ormaspol;
            $this->alamatktrbaru = $dataBaru->alamat_kantor_ormaspol;
            $this->skahubaru = $dataBaru->no_sk_ahu;
            $this->tglskahubaru = Carbon::parse($dataBaru->tgl_ahu)->format('d-m-Y');
            $this->tahunahubaru = $dataBaru->tahun_ahu;
            $this->kecamatanbaru = $this->datakecamatanvbaru->nama_kecamatan;
            $this->kelurahanbaru = $this->datakelurahanvbaru->nama_kelurahan;
            $this->kotabaru = $this->datakotavbaru->kota;
            $this->skuhaBaru = $dataBaru->sk_kemenkumham_ormas;
        }

        $this->dispatchBrowserEvent('OpenHistory');
    }

    public function confirmBatal($id)
    {
        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'id' => $id,
            'type' => 'info',
            'message' => 'Apakah Akan Menolak Perubahan ?'
        ]);
    }

    public function batal($id)
    {
        try {
            RubahData::where('id', $id)->delete();
            SuratKeberadaan::where('perubahan_id', $id)->delete();
            $this->success();
            $this->resetFields();
        } catch (\Throwable $th) {
            $this->error();
        }
    }

    public function viewFile($folder, $namefile)
    {
        $this->url = $folder . '/' . $namefile;
        $this->dispatchBrowserEvent('openViewFile');
    }

    public function closeView()
    {
        $this->dispatchBrowserEvent('closeViewFile');
        $this->dispatchBrowserEvent('OpenHistory');
    }

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

    public function render()
    {
        $Perubahan = RubahData::with(['ambildata'])->where('status', 0)->get();
        $Kategori = Kategori::all();
        return view('livewire.notif.data-notif', compact('Perubahan', 'Kategori'));
    }
}
