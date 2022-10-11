<?php

namespace App\Http\Livewire\Password;

use Livewire\Component;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Response;

class Show extends Component
{
    public $idUser, $passwordReset;

    public function mount()
    {
        $data = User::find(Auth::user()->id);
        $this->idUser = $data->id;
    }

    public function store_password()
    {

        $this->validate(
            [
                'passwordReset' => 'required|min:8'
            ],
            [
                'passwordReset.required' => 'Password Harap Diisi',
                'passwordReset.min' => 'Panjang Karakter Min.8'
            ]
        );

        try {
            if (!empty($this->passwordReset)) {
                $dataUpdatePass = ['password' => Hash::make($this->passwordReset)];
                User::where('id', $this->idUser)->update($dataUpdatePass);
            }

            $this->success();
            $this->resetForm();
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function success()
    {
        $this->dispatchBrowserEvent('swal:success', [
            'type' => 'success',
            'message' => 'Proses Berhasil',
            'toast' => 'false',
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

    public function resetForm()
    {
        $this->reset(['passwordReset']);
        $this->resetValidation();
    }
    
    public function render()
    {
        return view('livewire.password.show');
    }
}
