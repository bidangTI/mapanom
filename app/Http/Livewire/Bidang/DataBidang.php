<?php

namespace App\Http\Livewire\Bidang;

use Livewire\Component;

use App\Models\User;
use App\Models\Bidang;
use App\Models\Subbidang;

use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Response;

class DataBidang extends Component
{
    public
        $bidang,
        $subbidang,
        $tempID,
        $namabidang,
        $bidangID,
        $namabidangupdate;

    // Ambil deklarasi dari backend layout.app script
    protected $listeners = [
        'destroy1' => 'delete_bidang',
        'destroy2' => 'delete_subbidang'
    ];

    // Save Bidang
    public function store_bidang()
    {
        $this->validate(
            [
                'bidang' => 'required'
            ],
            [
                'bidang.required' => 'Bidang Tidak Boleh Kosong'
            ]
        );

        try {
            Bidang::create(
                [
                    'bidang' => $this->bidang
                ]
            );

            $this->success();
            $this->resetFields();
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    // Save Sub Bidang
    public function store_subbidang()
    {
        $this->validate(
            [
                'subbidang' => 'required'
            ],
            [
                'subbidang.required' => 'Sub Bidang Tidak Boleh Kosong'
            ]
        );

        try {
            Subbidang::create([
                'bidang_id' => $this->bidangID,
                'subbidang' => $this->subbidang
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
            'bidang',
            'subbidang',
            'bidangID',
            'namabidang'
        ]);
        $this->resetValidation();
    }

    // Show Modal ID
    public function tempID($id)
    {
        $resBidang = Bidang::where('id', $id)->first();
        $this->bidangID = $resBidang->id;
        $this->namabidang = $resBidang->bidang;
        $this->dispatchBrowserEvent('openFormModal');
    }


    // Untuk Edit Bidang
    public function edit_bidang($id)
    {
        $resBidang = Bidang::where('id', $id)->first();
        $this->bidangID = $resBidang->id;
        $this->namabidangupdate = $resBidang->bidang;
        $this->dispatchBrowserEvent('open_edit_bidang_modal');
    }

    public function update_bidang()
    {
        $this->validate(
            [
                'namabidangupdate' => 'required'
            ],
            [
                'namabidangupdate.required' => 'Bidang Tidak Boleh Kosong'
            ]
        );

        try {
            Bidang::find($this->bidangID)->update(['bidang' => $this->namabidangupdate]);
            $this->success();
            $this->resetFields();
            $this->dispatchBrowserEvent('close_edit_bidang_modal');
        } catch (\Throwable $th) {
            $this->error();
            // dd($th);
        }
    }

    // Untuk Edit Sub Bidang
    public function edit_subbidang($id)
    {
        $resSubBidang = Subbidang::where('id', $id)->first();
        $this->SubbidangID = $resSubBidang->id;
        $this->namasubbidangupdate = $resSubBidang->subbidang;
        $this->dispatchBrowserEvent('open_edit_subbidang_modal');
    }

    public function update_subbidang()
    {
        $this->validate(
            [
                'namasubbidangupdate' => 'required'
            ],
            [
                'namasubbidangupdate.required' => 'Sub Bidang Tidak Boleh Kosong'
            ]
        );

        try {
            Subbidang::find($this->SubbidangID)->update(['subbidang' => $this->namasubbidangupdate]);
            $this->success();
            $this->resetFields();
            $this->dispatchBrowserEvent('close_edit_subbidang_modal');
        } catch (\Throwable $th) {
            $this->error();
        }
    }

    public function confirm_bidang($id)
    {
        $cekBidang = Subbidang::where('bidang_id',$id)->first();

        if (!empty($cekBidang)) {
            $this->dispatchBrowserEvent('swal:confirm3', [
                'id' => $id,
                'type' => 'info',
                'message' => 'Data Bidang Tidak Dapat Dihapus, Karena Memiliki Sub Bidang ! '
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:confirm1', [
                'id' => $id,
                'type' => 'info',
                'message' => 'Data Bidang yang dihapus tidak dapat dikembalikan '
            ]);
        }
    }

    public function confirm_subbidang($id)
    {
        $this->dispatchBrowserEvent('swal:confirm2', [
            'id' => $id,
            'type' => 'info',
            'message' => 'Data Sub Bidang yang dihapus tidak dapat dikembalikan '
        ]);
    }

    public function delete_bidang($id)
    {
        try {
            Bidang::find($id)->delete();
            $this->success();
            $this->resetFields();
        } catch (\Throwable $th) {
            $this->error();
        }
    }

    public function delete_subbidang($id)
    {
        try {
            Subbidang::find($id)->delete();
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
        $resData = Bidang::with(['sub_bidang'])->get();
        return view('livewire.bidang.data-bidang', compact('resData'));
    }
}
