<?php

namespace App\Http\Livewire\Laporan;

use App\Models\User;
use Livewire\Component;
use App\Models\Persyaratan;
use Livewire\WithFileUploads;
use App\Models\LaporanSemester;
use Database\Seeders\LaporanSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataLaporan extends Component
{
    use WithFileUploads;

    public
    $tempUrl, 
    $folder, 
    $namefile, 
    $request,
    $url;

    public
        $laporanID,
        $noreg,
        $ormas,
        $nama,
        $nama_ormas,
        $jenis_kegiatan,
        $deskripsi_kegiatan,
        $semester,
        $tanggal_mulai,
        $tanggal_selesai,
        $nama_ormasUpdate,
        $jenis_kegiatanUpdate,
        $deskripsi_kegiatanUpdate,
        $semesterUpdate,
        $tanggal_mulaiUpdate,
        $tanggal_selesaiUpdate,

        $dokumentasi,
        $iterdokumentasi,
        $dokumentasiOld,
        $valDokumentasi,
        $dokumentasiUpdate;

    protected $listeners = [
        'destroy1' => 'delete_laporan'
    ];

    public function mount()
    {
        $data = User::find(Auth::user()->id);
        $this->noreg = $data->no_register;

        $ormas = Persyaratan::where('no_register', $this->noreg)->first();
        //$this->nama = $ormas->nama_ormaspol;

        if(is_null($ormas)) {
            return response()->json(404);
        } else {
            $this->nama = $ormas->nama_ormaspol;
        }

    }

    // public function loadExistingData()
    // {
    //     $exist = LaporanSemester::where('no_register', $this->noreg)->first();
    //     if (!empty($exist)) {
    //         $this->namaormas = $exist->nama_ormaspol;
    //     }
    // }

    public function loadExistingData()
    {
        $exist = LaporanSemester::where('id', $this->laporanID)->first();
        if (!empty($exist)) {
            $this->dokumentasiOld = $exist->dokumentasi;

        }
        $this->resetValidation();
    }

    public function viewFile($folder, $namefile)
    {
        $this->url = $folder . '/' . $namefile;
        $this->dispatchBrowserEvent('openViewFile');
    }

    public function tambah_laporan()
    {
        $this->dispatchBrowserEvent('open_tambah_laporan_modal');
    }

    public function lihat_laporan($id)
    {
        $resLap = LaporanSemester::where('id', $id)->first();
        $this->id = $resLap->id;
        $this->noreg = $resLap->no_register;
        $this->nama = $resLap->nama_ormas;
        $this->jenis_kegiatanUpdate = $resLap->jenis_kegiatan;
        $this->deskripsi_kegiatanUpdate = $resLap->deskripsi_kegiatan;
        $this->semesterUpdate = $resLap->semester;
        $this->tanggal_mulaiUpdate = $resLap->tanggal_mulai;
        $this->tanggal_selesaiUpdate = $resLap->tanggal_selesai;
        $this->dokumentasiUpdate = $resLap->dokumentasi;
        $this->dispatchBrowserEvent('open_lihat_laporan_modal');
    }
    
    public function store_laporan()
    {
        $this->validate(
            [
                'noreg' => 'required',
                'nama' => 'required',
                'jenis_kegiatan' => 'required',
                'deskripsi_kegiatan' => 'required',
                'semester' => 'required',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'dokumentasi' => empty($this->dokumentasiOld) || !empty($this->dokumentasi) ? 'required|image|mimes:png,jpg,jpeg,jfif|max:512' : 'nullable',
            ],
            [
                // 'no_register.required' => 'no  tidak boleh kosong',
                // 'nama_ormas.required' => 'nama kegiatan tidak boleh kosong',
                'jenis_kegiatan.required' => 'jenis kegiatan tidak boleh kosong',
                'deskripsi_kegiatan.required' => 'deskripsi kegiatan tidak boleh kosong',
                'semester.required' => 'semester kegiatan tidak boleh kosong',
                'tanggal_mulai.required' => 'tanggal mulai kegiatan tidak boleh kosong',
                'tanggal_selesai.required' => 'tanggal selesai kegiatan tidak boleh kosong',
                'dokumentasi.required' => 'dokumentasi Mohon Dilengkapi',

                'dokumentasi.mimes' => 'Format File Tidak Sesuai',

                'dokumentasi.max' => 'Ukuran File Maximal 512 kb',
            ]
        );

        try {
            if ($this->dokumentasi && $this->dokumentasiOld != null) {
                Storage::delete($this->dokumentasiOld);
            }

            if ($this->dokumentasi != null) {
                $file_dokumentasi = $this->dokumentasi->getClientOriginalName();
                $filename_dokumentasi = pathinfo($file_dokumentasi, PATHINFO_FILENAME);
                $ext_dokumentasi = $this->dokumentasi->getClientOriginalExtension();
                $filename_dokumentasi = $filename_dokumentasi . '_' . time() . '.' . $ext_dokumentasi;
                $path_dokumentasi = $this->dokumentasi->storeAs('public',$filename_dokumentasi);
            }
            LaporanSemester::create([
                'no_register' => $this->noreg,
                'nama_ormas' => $this->nama,
                'jenis_kegiatan' => $this->jenis_kegiatan,
                'deskripsi_kegiatan' => $this->deskripsi_kegiatan,
                'semester' => $this->semester,
                'tanggal_mulai' => $this->tanggal_mulai,
                'tanggal_selesai' => $this->tanggal_selesai,
                'dokumentasi' => $path_dokumentasi,
            ]);
            $this->success();
            $this->resetFields();
            $this->dispatchBrowserEvent('close_tambah_laporan_modal');
        } catch (\Throwable $th) {
            $this->error($th);
            //dd($th);
        }
    }

    public function resetFields()
    {
        $this->reset([ 
            'nama_ormas',
            'jenis_kegiatan',
            'deskripsi_kegiatan',
            'semester',
            'tanggal_mulai',
            'tanggal_selesai',
            'dokumentasi'
        ]);
        $this->iterdokumentasi = +1;
        $this->emit('deskripsi_kegiatan');
        $this->resetValidation();
    }

    // Show Modal ID
    public function tempID($id)
    {
        $resLap = LaporanSemester::where('id', $id)->first();
        $this->laporanID = $resLap->id;
        $this->noreg = $resLap->no_register;
        $this->nama = $resLap->nama_ormas;
        $this->jenis_kegiatan = $resLap->jenis_kegiatan;
        $this->deskripsi_kegiatan = $resLap->deskripsi_kegiatan;
        $this->semester = $resLap->semester;
        $this->tanggal_mulai = $resLap->tanggal_mulai;
        $this->tanggal_selesai = $resLap->tanggal_selesai;
        $this->dokumentasi = $resLap->dokumentasi;
        $this->dispatchBrowserEvent('open_tambah_laporan_modal');
    }

    public function edit_laporan($id)
    {
        $resLap = LaporanSemester::where('id', $id)->first();
        $this->laporanID = $resLap->id;
        $this->nama_ormasUpdate = $resLap->nama_ormas;
        $this->jenis_kegiatanUpdate = $resLap->jenis_kegiatan;
        $this->deskripsi_kegiatanUpdate = $resLap->deskripsi_kegiatan;
        $this->semesterUpdate = $resLap->semester;
        $this->tanggal_mulaiUpdate = $resLap->tanggal_mulai;
        $this->tanggal_selesaiUpdate = $resLap->tanggal_selesai;
        $this->dokumentasiOld = $resLap->dokumentasi;
        $this->dispatchBrowserEvent('open_edit_laporan_modal');
        //dd($resLap);
    }

    public function update_laporan()
    {
        $this->validate(
            [
                'noreg' => 'required',
                'nama' => 'required',
                'jenis_kegiatanUpdate' => 'required',
                'deskripsi_kegiatanUpdate' => 'required',
                'semesterUpdate' => 'required',
                'tanggal_mulaiUpdate' => 'required|date',
                'tanggal_selesaiUpdate' => 'required|date',
                'dokumentasiOld' => empty($this->dokumentasiOld) || !empty($this->dokumentasi) ? 'required|image|mimes:png,jpg,jpeg,jfif|max:512' : 'nullable',
            ],
            [
                // 'nama_ormasUpdate.required' => 'nama kegiatan tidak boleh kosong',
                'jenis_kegiatanUpdate.required' => 'jenis kegiatan tidak boleh kosong',
                'deskripsi_kegiatanUpdate.required' => 'deskripsi kegiatan tidak boleh kosong',
                'semesterUpdate.required' => 'semester kegiatan tidak boleh kosong',
                'tanggal_mulaiUpdate.required' => 'tanggal mulai kegiatan tidak boleh kosong',
                'tanggal_selesaiUpdate.required' => 'tanggal selesai kegiatan tidak boleh kosong',
                'dokumentasiOld.required' => 'dokumentasi Mohon Dilengkapi',

                'dokumentasiOld.mimes' => 'Format File Tidak Sesuai',

                'dokumentasiOld.max' => 'Ukuran File Maximal 512 kb',
            ]
        );

        try {
            if ($this->dokumentasi && $this->dokumentasiOld != null) {
                Storage::delete($this->dokumentasiOld);
            }

            if ($this->dokumentasiOld != null) {
                $file_dokumentasi = $this->dokumentasiOld->getClientOriginalName();
                $filename_dokumentasi = pathinfo($file_dokumentasi, PATHINFO_FILENAME);
                $ext_dokumentasi = $this->dokumentasiOld->getClientOriginalExtension();
                $filename_dokumentasi = $filename_dokumentasi . '_' . time() . '.' . $ext_dokumentasi;
                $path_dokumentasiOld = $this->dokumentasiOld->storeAs('public',$filename_dokumentasi);
            }
            LaporanSemester::find($this->laporanID)->update([
                'no_register' => $this->noreg,
                'nama_ormas' => $this->nama,
                'jenis_kegiatan' => $this->jenis_kegiatanUpdate,
                'deskripsi_kegiatan' => $this->deskripsi_kegiatanUpdate,
                'semester' => $this->semesterUpdate,
                'tanggal_mulai' => $this->tanggal_mulaiUpdate,
                'tanggal_selesai' => $this->tanggal_selesaiUpdate,
                'dokumentasi' => $path_dokumentasiOld,
            ]);
            $this->success();
            $this->resetFields();
            $this->dispatchBrowserEvent('close_edit_laporan_modal');
        } catch (\Throwable $th) {
            $this->error($th);
            //dd($this->laporanID);
        }
    }

    public function cleanuplivewireTmp()
    {
        $oldFiles = Storage::files('livewire-tmp');
        foreach ($oldFiles as $file) {
            Storage::delete($file);
        }
    }

    public function delete($id)
    {
        try {
            LaporanSemester::find($id)->delete();
            $this->success();
            $this->resetFields();
        } catch (\Throwable $th) {
            $this->error();
        }
    }

    public function confirm_hapus($id)
    {
        $this->dispatchBrowserEvent('swal:confirm1', [
            'id' => $id,
            'type' => 'info',
            'message' => 'Laporan yang dihapus tidak dapat dikembalikan '
        ]);
    }

    public function delete_laporan(LaporanSemester $laporan)
    {
        try {
            if($laporan->dokumentasi){
                Storage::delete($laporan->dokumentasi);
            }
            LaporanSemester::destroy($laporan->id);
            $this->success();
            $this->resetFields();
    
        } catch (\Throwable $th) {
            $this->error();
            }
    }


    public function success()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Proses Berhasil',
            'toast' => 'true',
            'position' => 'top-end'
        ]);
        $this->dispatchBrowserEvent('closeFormModal');
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

    public function render()
    {
        //$dataPermohonan = User::with(['Persyaratan'])->where('no_register', $this->noreg)->get();
        // $resData = LaporanSemester::get();
        $resData = LaporanSemester::with(['laporan'])->where('no_register', $this->noreg)->get();
        return view('livewire.laporan.data-laporan', compact('resData'));
    }
}
