<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Permohonan;

use PhpParser\Node\Stmt\TryCatch;



class AlurPersyaratan extends Component
{
    public
    $langkah,
    $status,
    $keterangan,
    $statusupdate,
    $langkahupdate,
    $keteranganupdate,
    $permohonanID;

    protected $listeners = [
        'destroy1' => 'delete_permohonan'
    ];


    public function store_permohonan()
    {
        $this->validate(
            [
                'langkah'    => 'required',
                'status'     => 'required',
                'keterangan' => 'required',
            ],
            [
                'status.required'  => 'Status tidak boleh kosong',
                'langkah.required' => 'Langkah tidak boleh kosong',
            ]
        );

        try {
            Permohonan::create([
                'langkah'        => $this->langkah,
                'status'         => $this->status,
                'keterangan'     => $this->keterangan
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
            'langkah',
            'status',
            'keterangan'
        ]);
        $this->emit('langkah');
        $this->emit('status');
        $this->emit('keterangan');
        $this->resetValidation();
    }

    // Show Modal ID
    public function tempID($id)
    {
        $resPermohonan = Permohonan::where('id', $id)->first();
        $this->permohonanID = $resPermohonan->id;
        $this->langkah = $resPermohonan->langkah;
        $this->status = $resPermohonan->status;
        $this->keterangan = $resPermohonan->keterangan;
        $this->dispatchBrowserEvent('openFormModal');
    }

    //Edit
    public function edit_permohonan($id)
    {
        $resPermohonan = Permohonan::where('id', $id)->first();
        $this->permohonanID = $resPermohonan->id;
        $this->statusupdate = $resPermohonan->status;
        $this->langkahupdate = $resPermohonan->langkah;
        $this->keteranganupdate = $resPermohonan->keterangan;
        $this->dispatchBrowserEvent('open_edit_permohonan_modal');
    }

    public function loadExistingData()
    {
        $exist = Permohonan::where('id', $this->permohonanID)->first();
        if (!empty($exist)) {
            $this->keterangan = $exist->keterangan;
        }
        $this->resetValidation();
    }

    public function update_permohonan()
    {
        $this->validate(
            [
                'statusupdate' => 'required',
                'langkahupdate' => 'required',
                'keteranganupdate' => 'required',
            ],
            [
                'statusupdate.required' => 'Status Tidak Boleh Kosong',
                'langkahupdate.required' => 'Langkah Tidak Boleh Kosong',
                
            ]
        );

        try {
            Permohonan::find($this->permohonanID)
            -> update([
             'status' => $this->statusupdate,
             'langkah' => $this->langkahupdate,
             'keterangan' => $this->keteranganupdate]);
            $this->success();
            $this->resetFields();
            $this->dispatchBrowserEvent('close_edit_permohonan_modal');
        } catch (\Throwable $th) {
            $this->error();
            // dd($th);
        }
    }
    
    public function confirm_permohonan($id)
    {
        $this->dispatchBrowserEvent('swal:confirm1', [
            'id' => $id,
            'type' => 'info',
            'message' => 'Data Alur Permohonan yang dihapus tidak dapat dikembalikan '
        ]);
    }

    public function delete_permohonan($id)
    {
        try {
            Permohonan::find($id)->delete();
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
            $resData = Permohonan::get();
            return view('livewire.admin.alur-persyaratan', compact('resData'));
        
    }
}