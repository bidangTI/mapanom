<?php

namespace App\Http\Livewire\Kecamatan;

use Livewire\Component;

use App\Models\Kecamatan;
use App\Models\Kelurahan;

use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Response;

class DataKecamatan extends Component
{
    public
        $kecamatan,
        $kelurahan,
        $tempID,
        $namakecamatan,
        $kecamatanID,
        $kecamatanupdate,
        $namakelurahanupdate;

    // Ambil deklarasi dari backend layout.app script
    protected $listeners = [
        'destroy1' => 'delete_kecamatan',
        'destroy2' => 'delete_kelurahan'
    ];

    // Save kecamatan
    public function store_kecamatan()
    {
        $this->validate(
            [
                'kecamatan' => 'required'
            ],
            [
                'kecamatan.required' => 'Kecamatan Tidak Boleh Kosong'
            ]
        );

        try {
            Kecamatan::create(
                [
                    'nama_kecamatan' => $this->kecamatan
                ]
            );

            $this->success();
            $this->resetFields();
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    // Save Sub kecamatan
    public function store_kelurahan()
    {
        $this->validate(
            [
                'kelurahan' => 'required'
            ],
            [
                'kelurahan.required' => 'Sub kecamatan Tidak Boleh Kosong'
            ]
        );

        try {
            Kelurahan::create([
                'kecamatan_id' => $this->kecamatanID,
                'nama_kelurahan' => $this->kelurahan
            ]);

            $this->success();
            $this->resetFields();
            $this->dispatchBrowserEvent('closeFormModal');
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }


    public function resetFields()
    {
        $this->reset([
            'kecamatan',
            'kelurahan',
            'kecamatanID',
            'namakecamatan'
        ]);
        $this->resetValidation();
    }

    // Show Modal ID
    public function tempID($id)
    {
        $reskecamatan = Kecamatan::where('id', $id)->first();
        $this->kecamatanID = $reskecamatan->id;
        $this->namakecamatan = $reskecamatan->nama_kecamatan;
        $this->dispatchBrowserEvent('openFormModal');
    }


    // Untuk Edit kecamatan
    public function edit_kecamatan($id)
    {
        $reskecamatan = Kecamatan::where('id', $id)->first();
        $this->kecamatanID = $reskecamatan->id;
        $this->kecamatanupdate = $reskecamatan->nama_kecamatan;
        $this->dispatchBrowserEvent('open_edit_kecamatan_modal');
    }

    public function update_kecamatan()
    {
        $this->validate(
            [
                'kecamatanupdate' => 'required'
            ],
            [
                'kecamatanupdate.required' => 'kecamatan Tidak Boleh Kosong'
            ]
        );

        try {
            kecamatan::find($this->kecamatanID)->update(['nama_kecamatan' => $this->kecamatanupdate]);
            $this->success();
            $this->resetFields();
            $this->dispatchBrowserEvent('close_edit_kecamatan_modal');
        } catch (\Throwable $th) {
            $this->error();
        }
    }

    // Untuk Edit Sub kecamatan
    public function edit_kelurahan($id)
    {
        $reskelurahan = Kelurahan::where('id', $id)->first();
        $this->kelurahanID = $reskelurahan->id;
        $this->namakelurahanupdate = $reskelurahan->nama_kelurahan;
        $this->dispatchBrowserEvent('open_edit_kelurahan_modal');
    }

    public function update_kelurahan()
    {
        $this->validate(
            [
                'namakelurahanupdate' => 'required'
            ],
            [
                'namakelurahanupdate.required' => 'Kelurahan Tidak Boleh Kosong'
            ]
        );

        try {
            Kelurahan::find($this->kelurahanID)->update(['nama_kelurahan' => $this->namakelurahanupdate]);
            $this->success();
            $this->resetFields();
            $this->dispatchBrowserEvent('close_edit_kelurahan_modal');
        } catch (\Throwable $th) {
            $this->error();
        }
    }

    public function confirm_kecamatan($id)
    {
        $cekkecamatan = Kelurahan::where('kecamatan_id', $id)->first();

        if (!empty($cekkecamatan)) {
            $this->dispatchBrowserEvent('swal:confirm3', [
                'id' => $id,
                'type' => 'info',
                'message' => 'Data kecamatan Tidak Dapat Dihapus, Karena Memiliki Kelurahan ! '
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:confirm1', [
                'id' => $id,
                'type' => 'info',
                'message' => 'Data kecamatan yang dihapus tidak dapat dikembalikan '
            ]);
        }
    }

    public function confirm_kelurahan($id)
    {
        $this->dispatchBrowserEvent('swal:confirm2', [
            'id' => $id,
            'type' => 'info',
            'message' => 'Data Sub kecamatan yang dihapus tidak dapat dikembalikan '
        ]);
    }

    public function delete_kecamatan($id)
    {
        try {
            kecamatan::find($id)->delete();
            $this->success();
            $this->resetFields();
        } catch (\Throwable $th) {
            $this->error();
        }
    }

    public function delete_kelurahan($id)
    {
        try {
            Kelurahan::find($id)->delete();
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
        $resData = Kecamatan::with(['datakelurahan'])->get();
        return view('livewire.kecamatan.data-kecamatan', compact('resData'));
    }
}
