<?php

namespace App\Http\Livewire\Pengguna;

use Livewire\Component;

use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;



class DataReport extends Component
{

    public $idUser,
        $nama,
        $alamat,
        $rt,
        $rw,
        $roles,
        $rolesEdit,
        $email,
        $password,
        $passwordOld,
        $dataRoles,
        $resPassword;

    protected $listeners = [
        'DelPengguna' => 'delete_pengguna'
    ];

    public function mount()
    {
        $this->dataRoles = Role::where('id', 5)->get();
    }

    public function AddPengguna()
    {
        $this->dispatchBrowserEvent('openAddPengguna');
    }

    public function EditPengguna($id)
    {
        $resPengguna = User::where('id', $id)->first();
        $this->idUser = $resPengguna->id;
        $this->nama = $resPengguna->name;
        $this->alamat = $resPengguna->alamat;
        $this->rt = $resPengguna->rt;
        $this->rw = $resPengguna->rw;
        $this->email = $resPengguna->email;
        $this->rolesEdit = $resPengguna->roles;
        $this->roles = $resPengguna->roles;

        $this->dispatchBrowserEvent('openEditPengguna');
    }

    public function EditPassword($id)
    {
        $resPassword = User::where('id', $id)->first();
        $this->idUser = $resPassword->id;
        $this->passwordOld = $resPassword->password;

        $this->dispatchBrowserEvent('openEditPassword');
    }

    public function store_pengguna()
    {
        $this->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'roles' => 'required'
            ],
            [
                'nama.required' => 'Nama Harap Diisi',
                'alamat.required' => 'Alamat Harap Diisi',
                'rt.required' => 'RT Harap Diisi',
                'rw.required' => 'RW Harap Diisi',
                'email.required' => 'email Harap Diisi',
                'email.unique' => 'e-Mail Sudah terpakai',
                'email.email' => 'Format e-Mail Tidak Sesuai',
                'password.required' => 'Password Harap Diisi',
                'password.min' => 'Panjang Karakter Min.8',
                'roles.required' => 'Roles Harap Diisi'
            ]
        );

        try {
            User::create([
                'name' => $this->nama,
                'alamat' => $this->alamat,
                'rt' => $this->rt,
                'rw' => $this->rw,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'roles' => $this->roles,
                'email_verified_at' => Carbon::now(),
                'status_user' => 'Y'
            ]);

            $this->success();
            $this->resetForm();
            $this->dispatchBrowserEvent('closeAddPengguna');
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function update_pengguna()
    {
        $this->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                // 'email' => 'required|email|unique:users,email',
                'roles' => 'required'
            ],
            [
                'nama.required' => 'Nama Harap Diisi',
                'alamat.required' => 'Alamat Harap Diisi',
                'rt.required' => 'RT Harap Diisi',
                'rw.required' => 'RW Harap Diisi',
                // 'email.required' => 'email Harap Diisi',
                // 'email.unique' => 'e-Mail Sudah terpakai',
                // 'email.email' => 'Format e-Mail Tidak Sesuai',
                'roles.required' => 'Roles Harap Diisi'
            ]
        );
        try {
            $dataUpdatePengguna = [
                'name' => $this->nama,
                'alamat' => $this->alamat,
                'rt' => $this->rt,
                'rw' => $this->rw,
                // 'email' => $this->email,
                'roles' => $this->rolesEdit
            ];
            User::where('id', $this->idUser)->update($dataUpdatePengguna);

            $this->success();
            $this->resetForm();
            $this->dispatchBrowserEvent('closeEditPengguna');
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function update_password()
    {
        $this->validate(
            [
                'password' => 'required|min:8'
            ],
            [
                'password.required' => 'Password Harap Diisi',
                'password.min' => 'Panjang Karakter Min.8'
            ]
        );

        try {
            if (!empty($this->password)) {
                $dataUpdatePass = ['password' => Hash::make($this->password)];
                User::where('id', $this->idUser)->update($dataUpdatePass);
            }

            $this->success();
            $this->resetForm();
            $this->dispatchBrowserEvent('closeEditPassword');
        } catch (\Throwable $th) {
            $this->error($th);
        }
    }

    public function confirm_delete($id)
    {
        $VData = User::where('id', $id)->first();

        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'id' => $id,
            'type' => 'info',
            'message' => 'User' . ' ' . $VData->email . ' ' . 'Akan Dihapus ? '
        ]);
    }

    public function delete_pengguna($id)
    {
        try {
            $flagSoft = ['status_user' => 'N'];
            User::where('id', $id)->update($flagSoft);
            $this->success();
        } catch (\Throwable $th) {
            $this->error();
        }
    }

    public function AktifPengguna($id)
    {
        try {
            $flagSoft = ['status_user' => 'Y'];
            User::where('id', $id)->update($flagSoft);
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
            'toast' => 'false',
            'position' => 'top-end'
        ]);
        $this->dispatchBrowserEvent('closeAddPengguna');
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

    public function resetForm()
    {
        $this->reset(['nama', 'alamat', 'rt', 'rw', 'email', 'password', 'roles']);

        $this->resetValidation();
    }

    public function render()
    {
        $dataLoadlist = User::with(['level'])->where('roles', 5)->get();
        return view('livewire.pengguna.data-report', compact('dataLoadlist'));
    }
}
