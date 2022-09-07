<?php

namespace App\Http\Livewire\Ormas;

use Livewire\Component;

use App\Models\User;
use App\Models\OrmasKetua;
use App\Models\OrmasSekretaris;
use App\Models\OrmasBendahara;
use App\Models\OrmasPendiri;
use App\Models\OrmasPembina;
use App\Models\OrmasPenasihat;
use App\Models\Persyaratan;
use App\Models\Dokumen;

use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Response;


class KirimOrmas extends Component
{
    protected $listeners = [
        'kirim_data' => 'proses_data'
    ];

    public function mount()
    {
        $data = User::find(Auth::user()->id);
        $this->noreg = $data->no_register;
    }

    public function confirm_kirim()
    {
        $cek = User::where('no_register', $this->noreg)->first();

        if (!empty($cek)) {
            $this->dispatchBrowserEvent('swal:confirm_krm', [
                'no_register' => $this->noreg,
                'type' => 'info',
                'message' => 'Data Akan Dikirim'
            ]);
        }
    }
    public function proses_data($no_register)
    {
        try {
            $IdPKetua = ['permohonan_id' => 2];
            $DataKetua = User::where('no_register', $no_register)->update($IdPKetua);

            $this->success();
        } catch (\Throwable $th) {
            $this->error($th);
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
        $cekData = User::with(['ketua', 'sekretaris', 'bendahara', 'pendiri', 'pembina', 'penasihat', 'persyaratan', 'dokumen'])->where('no_register', $this->noreg)->get();


        if (!empty($cekData)) {
            return view('livewire.ormas.kirim-ormas', compact('cekData'));
        }
    }
}
