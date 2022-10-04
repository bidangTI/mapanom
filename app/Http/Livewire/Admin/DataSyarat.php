<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\SyaratAdministrasi;
use App\Models\Kategori;
use PhpParser\Node\Stmt\TryCatch;

class DataSyarat extends Component
{
    public
        $syarat,
        $dasar_hukum,
        $tempID,
        $syaratID,
        $kategoriID,
        $namaKategori,
        $kategoriIDUpdate,
        $dasarHukumUpdate,
        $syaratUpdate;

    protected $listeners = [
        'destroy1' => 'delete_persyaratan'
    ];

    public function mount()
    {
        $this->dataKategori = Kategori::all();
    }

    public function store_persyaratan()
    {
        $this->validate(
            [
                // 'kategori_id' => 'required',
                'dasar_hukum' => 'required',
                'syarat' => 'required'
            ],
            [
                // 'kategori_id.required' => 'Kategori tidak boleh kosong',
                'dasar_hukum.required' => 'Dasar Hukum tidak boleh kosong',
                'syarat.required' => 'Syarat tidak boleh kosong'
            ]
        );

        try {
            SyaratAdministrasi::create([
                'kategori_id'   => $this->kategoriID,
                'dasar_hukum'   => $this->dasar_hukum,
                'syarat'        => $this->syarat
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
            'dasar_hukum',
            'syarat',
            'kategoriID'
        ]);
        $this->emit('dasar_hukum');
        $this->emit('syarat');
        $this->resetValidation();
    }

    // Show Modal ID
    public function tempID($id)
    {
        $resSyarat = SyaratAdministrasi::where('id', $id)->first();
        $this->syaratID = $resSyarat->id;
        $this->kategoriID = $resSyarat->kategori_id;
        $this->dasar_hukum = $resSyarat->dasar_hukum;
        $this->syarat = $resSyarat->syarat;
        $this->dispatchBrowserEvent('openFormModal');
    }

    public function loadExistingData()
    {
        $exist = SyaratAdministrasi::where('id', $this->syaratID)->first();
        if (!empty($exist)) {
            $this->dasarHukumUpdate = $exist->dasar_hukum;}
    }

    // Untuk Edit
    public function edit_syarat($id)
    {
        $resData = SyaratAdministrasi::where('id', $id)->first();
        $this->syaratID = $resData->id;
        $this->kategoriIDUpdate = $resData->kategori_id;
        $this->dasarHukumUpdate = $resData->dasar_hukum;
        $this->syaratUpdate = $resData->syarat;
        $this->loadExistingData();
        $this->dispatchBrowserEvent('open_edit_syarat_modal');
    }

    public function update_syarat()
    {
        $this->validate(
            [
                'kategoriIDUpdate'  => 'required',
                'dasarHukumUpdate'  => 'required',
                'syaratUpdate'      => 'required',
            ],
            [
                'kategoriIDUpdate.required' => 'Kategori Tidak Boleh Kosong',
                'dasarHukumUpdate.required' => 'Dasar Hukum Tidak Boleh Kosong',
                'syaratUpdate.required'     => 'Syarat Tidak Boleh Kosong'
            ]
        );

        try {
            SyaratAdministrasi::find($this->syaratID)
            ->update([
                'kategori_id'   => $this->kategoriIDUpdate,
                'dasar_hukum'   => $this->dasarHukumUpdate,
                'syarat'        => $this->syaratUpdate
            ]);
            $this->success();
            $this->resetFields();
            $this->dispatchBrowserEvent('close_edit_syarat_modal');
        } catch (\Throwable $th) {
            $this->error();
            // dd($th);
        }
    }


    public function confirm_syarat($id)
    {
        $this->dispatchBrowserEvent('swal:confirm1', [
            'id'        => $id,
            'type'      => 'info',
            'message'   => 'Data syarat administrasi yang dihapus tidak dapat dikembalikan '
        ]);
    }

    public function delete_persyaratan($id)
    {
        try {
            SyaratAdministrasi::find($id)->delete();
            $this->success();
            $this->resetFields();
        } catch (\Throwable $th) {
            $this->error();
        }
    }

    public function success()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type'      => 'success',
            'message'   => 'Proses Berhasil',
            'toast'     => 'true',
            'position'  => 'top-end'
        ]);
        $this->dispatchBrowserEvent('closeFormModal');
    }

    public function error($msg = null)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type'      => 'error',
            'message'   => 'Proses Gagal !' . $msg,
            'toast'     => 'true',
            'position'  => 'top-end'
        ]);
    }

    public function render()
    {
        $resData = SyaratAdministrasi::with(['Kategori'])->get();
        return view('livewire.admin.data-syarat', compact('resData'));
    }
}
