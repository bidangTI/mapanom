<?php

namespace App\Http\Livewire\Perubahan;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Persyaratan;
use App\Models\Dokumen;
use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\RubahData;
use App\Models\SuratKeberadaan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use function PHPUnit\Framework\isNull;

class DataPerubahan extends Component
{
    use WithFileUploads;

    protected $listeners = ['deleteRubah' => 'batal'];

    public $tempUrl, $folder, $namefile, $url;
    public $namaormas, $singormas, $alamatktr, $kecamatan, $kelurahan, $kota, $skuha, $skahu, $tglskahu, $tahunahu;
    public $iterskuha;

    public $namaormasbaru, $singormasbaru, $alamatktrbaru, $kecamatanbaru, $kelurahanbaru, $kotabaru, $skuhabaru, $skahubaru, $tglskahubaru, $tahunahubaru;
    public $iterskuhabaru, $tujuanOrmas, $AmbilIDSuratLama;

    public function mount()
    {
        $this->iterskuha = 0;
        $this->iterskuhabaru = 0;
        $data = User::find(Auth::user()->id);
        $this->noreg = $data->no_register;
        $this->AmbilIDSuratLama = SuratKeberadaan::where('no_register', '=', $this->noreg)->where('status', '=', 'Y')->where('tanggal_exp', null)->first();

        $this->datakecamatanv = Kecamatan::all();
        $this->datakelurahan = Kelurahan::all();
        $this->datakotav = Kota::all();

        $this->loadExistingDataLama();
        $this->loadExistingDataBaru();
        
    }

    // Listener Combo child untuk menampilkan kelurahan dari kecamatan
    public function updatedkecamatan()
    {
        $this->datakelurahanv = $this->datakelurahan->where('kecamatan_id', $this->kecamatan);
    }

    public function loadExistingDataLama()
    {
        $dataLama = Persyaratan::where('no_register', $this->noreg)->first();
        if (!empty($dataLama)) {
            $this->datakelurahanvL = $this->datakelurahan->where('kecamatan_id', $dataLama->kecamatan);
            $this->namaormas = $dataLama->nama_ormaspol;
            $this->singormas = $dataLama->singkatan_ormaspol;
            $this->alamatktr = $dataLama->alamat_kantor_ormaspol;
            $this->skahu = $dataLama->no_sk_ahu;
            $this->tglskahu = Carbon::parse($dataLama->tgl_ahu)->format('d-m-Y');
            $this->tahunahu = $dataLama->tahun_ahu;
            $this->kecamatan = $dataLama->kecamatan;
            $this->kelurahan = $dataLama->kelurahan;
            $this->kota = $dataLama->kota;
            // $this->tujuanOrmas = $exist->tujuan_ormas;
            // $tujuanOrmas = $this->tujuanOrmas;

            $existDokumen = Dokumen::where('no_register', $this->noreg)->first();
            if (!empty($existDokumen)) {
                $this->skuhaOld = $existDokumen->sk_kemenkumham_ormas;
            }
        }
        $this->resetValidation();
    }

    public function loadExistingDataBaru()
    {
        $dataBaru = RubahData::where('no_register', '=', $this->noreg)->where('status', '<', 2)->first();
        if (!empty($dataBaru)) {
            $this->datakelurahanv = $this->datakelurahan->where('kecamatan_id', $dataBaru->kecamatan);
            $this->namaormasbaru = $dataBaru->nama_ormaspol;
            $this->singormasbaru = $dataBaru->singkatan_ormaspol;
            $this->alamatktrbaru = $dataBaru->alamat_kantor_ormaspol;
            $this->skahubaru = $dataBaru->no_sk_ahu;
            $this->tglskahubaru = Carbon::parse($dataBaru->tgl_ahu)->format('d-m-Y');
            $this->tahunahubaru = $dataBaru->tahun_ahu;
            $this->kecamatanbaru = $dataBaru->kecamatan;
            $this->kelurahanbaru = $dataBaru->kelurahan;
            $this->kotabaru = $dataBaru->kota;
            $this->skuhaBaru = $dataBaru->sk_kemenkumham_ormas;
        }
        $this->resetValidation();
    }

    public function resetFUpload()
    {
        $this->reset(
            'skuha'
        );
        $this->resetvalidation();
        $this->iterskuha += 1;
        $this->iterskuhabaru += 1;
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

    public function store()
    {
        $this->validate(
            [
                'namaormasbaru' => 'required',
                'singormasbaru' => 'required',
                'alamatktrbaru' => 'required',
                'kelurahanbaru' => 'required',
                'kecamatanbaru' => 'required',
                'kotabaru' => 'required',
                'skahubaru' => 'nullable',
                'tglskahubaru' => 'nullable',
                'tahunahubaru' => 'nullable',
                'skuhabaru' => !empty($this->skuhabaru) ? 'file|mimes:pdf|max:512' : 'nullable',
            ],
            [
                'namaormasbaru.required' => 'Isikan Nama Ormas',
                'singormasbaru.required' => 'Isikan Singkatan Ormas',
                'alamatktrbaru.required' => 'Isikan Alamat',
                'kelurahanbaru.required' => 'Isikan Kelurahan',
                'kecamatanbaru.required' => 'Isikan Kecamatan',
                'kotabaru.required' => 'Isikan Kota',
                // 'skahubaru.required' => 'Isikan Nomer SK',
                // 'tglskahubaru.required' => 'Isikan Tanggal SK',
                // 'tahunahubaru.required' => 'Isikan Tahun',
                'skuhabaru.mimes' => 'Format File Tidak Sesuai',
                'skuhabaru.max' => 'Ukuran File Maximal 512 kb'
            ]
        );
        try {

            if ($this->skuhabaru != null) {
                $file_skuhabaru = $this->skuhabaru->getClientOriginalName();
                $filename_skuhabaru = pathinfo($file_skuhabaru, PATHINFO_FILENAME);
                $ext_skuhabaru = $this->skuhabaru->getClientOriginalExtension();
                $filename_skuhabaru = $this->noreg . '_' . $filename_skuhabaru . '_' . time() . '.' . $ext_skuhabaru;
                $path_skuhabaru = $this->skuhabaru->storeAs('dok_perubahan', $filename_skuhabaru);
            } else {
                $path_skuhabaru = null;
            }

            RubahData::create([
                'no_register' => $this->noreg,
                'nama_ormaspol' => $this->namaormasbaru,
                'singkatan_ormaspol' => $this->singormasbaru,
                'alamat_kantor_ormaspol' => $this->alamatktrbaru,
                'kelurahan' => $this->kelurahanbaru,
                'kecamatan' => $this->kecamatanbaru,
                'kota' => $this->kotabaru,
                'no_sk_ahu' => $this->skahubaru,
                'tgl_ahu' => Carbon::parse($this->tglskahubaru)->format('Y-m-d'),
                'tahun_ahu' => $this->tahunahubaru,
                'sk_kemenkumham_ormas' => $path_skuhabaru,
                'status' => 0,
                'id_surat' => $this->AmbilIDSuratLama->id
            ]);

            $AmbilIdPerubahan = RubahData::where('no_register','=', $this->noreg)->where('status','=', 0)->first();

            SuratKeberadaan::create([
                'no_register' => $this->noreg,
                'status' => 'B',
                'perubahan_id'=> $AmbilIdPerubahan->id
            ]);

            $this->success();
            // $this->cleanuplivewireTmp();
            $this->resetFields();
            $this->loadExistingDataBaru();
            
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function confirmBatal($id)
    {
        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'id' => $id,
            'type' => 'info',
            'message' => 'Apakah Akan Membatalkan Perubahan ?'
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
        $this->dispatchBrowserEvent('swal:error', [
            'type' => 'error',
            'message' => 'Proses Gagal !' . $msg,
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

    public function resetFields()
    {
        $this->reset(
            'namaormasbaru',
            'singormasbaru',
            'alamatktrbaru',
            'kecamatanbaru',
            'kelurahanbaru',
            'kotabaru',
            'skahubaru',
            'tglskahubaru',
            'tahunahubaru',
            'skuhabaru'
        );
        $this->resetValidation();
        $this->iterskuhabaru += 1;
    }

    // Change Validasi FUpload
    public function updatedskuhabaru()
    {
        $this->validate(
            [
                'skuhabaru' => 'file|mimes:pdf|max:512'
            ],
            [
                'skuhabaru.mimes' => 'Format File pdf',
                'skuhabaru.max' => 'Ukuran File Melebihi 512 kb'
            ]
        );
    }

    public function render()
    {
        $this->datakecamatanvbaru = Kecamatan::all();
        $this->datakelurahanbaru = Kelurahan::all();
        $this->datakotavbaru = Kota::all();

        $this->datakelurahanvbaru = $this->datakelurahanbaru->where('kecamatan_id', $this->kecamatanbaru);

        $dokAHU = Dokumen::where('no_register', $this->noreg)->first();
        $statusNol = RubahData::where('no_register', '=', $this->noreg)->where('status', '=', 0)->first();
        $statusSatu = RubahData::where('no_register', '=', $this->noreg)->where('status', '=', 1)->first();
        $statusDua = RubahData::where('no_register', '=', $this->noreg)->where('status', '=', 2)->first();
        $dataKeberadaan = SuratKeberadaan::where('no_register', '=', $this->noreg)->where('status', '=', 'Y')->where('id_ttd', '!=', null)->first();
        $JmlPerubahan = SuratKeberadaan::where('no_register', '=', $this->noreg)->where('perubahan_id', '!=', null)->count();
        // $dataPerubahan = SuratKeberadaan::where('no_register', '=', $this->noreg)->first();
        return view('livewire.perubahan.data-perubahan', compact('dokAHU', 'statusNol', 'statusSatu', 'statusDua', 'dataKeberadaan','JmlPerubahan'));
    }
}
