<?php

namespace App\Http\Livewire\Penandatangan;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Role;
use App\Models\User;
use App\Models\TandaTangan;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;



class DataPenandatangan extends Component
{
    use WithFileUploads;
    public $idUser,
        $nip,
        $jabatan,
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

    public $filettd, $filettdOld, $iterfilettd;
    public $tempUrl, $folder, $namefile, $url;

    protected $listeners = [
        'DelPengguna' => 'delete_pengguna'
    ];

    public function mount()
    {
        $this->iterfilettd = 0;
        $this->dataRoles = Role::where('id', 4)->get();
    }

    public function AddPengguna()
    {
        $this->dispatchBrowserEvent('openAddPengguna');
    }

    public function FileTtd($id)
    {
        $resID = User::where('id', $id)->first();
        $this->idUser = $resID->id;
        $this->namatte = $resID->name;

        $resFile = TandaTangan::where('user_id', $id)->first();
        if(empty($resFile)){
            $this->filettdOld = $this->filettd;
        }else{
            $this->filettdOld = $resFile->file_tte;
        }
        $this->dispatchBrowserEvent('OpenFormTTD');
    }

    public function upload_ttd()
    {
        $this->validate(
            [
                'filettd' => empty($this->filettdOld) || !empty($this->filettd) ? 'required|file|mimes:jpg,jpeg,png|max:512' : 'nullable'
            ],
            [
                'filettd.required' => 'File Mohon Dilengkapi',
                'filettd.mimes' => 'Format File Tidak Sesuai',
                'filettd.max' => 'Ukuran File Maximal 512 kb'
            ]
        );

        try {

            if ($this->filettd && $this->filettdOld != null) {
                Storage::delete($this->filettdOld);
                // File::delete($this->filettdOld);
                // unlink($this->filettdOld);
            }
            if ($this->filettd != null) {
                $file_ttd = $this->filettd->getClientOriginalName();
                $filename_ttd = pathinfo($file_ttd, PATHINFO_FILENAME);
                $ext_ttd = $this->filettd->getClientOriginalExtension();
                $filename_ttd = $this->idUser . '_' . $this->namatte . '_' . $filename_ttd . '_' . time() . '.' . $ext_ttd;
                $path_ttd = $this->filettd->storeAs('public/tte', $filename_ttd);  
                // $path_ttd = $this->filename_ttd->storeAs('public/tte');
            }

            if ($this->filettd) {
                $updateData['file_tte'] = str_replace('public/','', $path_ttd);
            }
            $cariID = TandaTangan::where('user_id', $this->idUser)->first();

            if (empty($cariID)) {
                TandaTangan::create(
                    [
                        'user_id' => $this->idUser,
                        'file_tte' => $path_ttd
                    ]
                );
            } else {
                TandaTangan::where('user_id', $this->idUser)->update($updateData);
            }
        } catch (\Throwable $th) {
            $this->error($th);
        }

        $this->success();
        $this->resetFUpload();
        // $this->cleanuplivewireTmp();
        $this->resetValidation();
        $this->dispatchBrowserEvent('CloseFormTTD');
    }

    public function resetFUpload()
    {
        $this->reset(
            'filettd'
        );
        $this->resetvalidation();
        $this->iterfilettd += 1;
    }

    // public function cleanuplivewireTmp()
    // {
    //     $oldFiles = Storage::files('livewire-tmp');
    //     foreach ($oldFiles as $file) {
    //         Storage::delete($file);
    //     }
    // }

    public function viewFile($folder, $namefile)
    {
        $this->url = $folder . '/' . $namefile;
        $this->dispatchBrowserEvent('openViewFile');
    }

    public function closeView()
    {
        $this->resetFUpload();
        $this->dispatchBrowserEvent('closeViewFile');
    }

    // Change Validasi FUpload
    public function updatedfilettd()
    {
        $this->validate(
            [
                'filettd' => 'file|mimes:jpg,jpeg,png|max:512',
            ],
            [
                'filettd.mimes' => 'Format File Tidak Sesuai',
                'filettd.max' => 'Ukuran File Maximal 512 kb'
            ]
        );
    }

    public function EditPengguna($id)
    {
        $resPengguna = User::where('id', $id)->first();
        $this->idUser = $resPengguna->id;
        $this->nip = $resPengguna->nip;
        $this->nama = $resPengguna->name;
        $this->jabatan = $resPengguna->jabatan;
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
                'nip' => 'required',
                'nama' => 'required',
                'jabatan' => 'required',
                'alamat' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'roles' => 'required'
            ],
            [
                'nip.required' => 'NIP Harap Diisi',
                'nama.required' => 'Nama Harap Diisi',
                'jabatan.required' => 'Jabatan Harap Diisi',
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
                'nip' => $this->nip,
                'name' => $this->nama,
                'jabatan' => $this->jabatan,
                'alamat' => $this->alamat,
                'rt' => $this->rt,
                'rw' => $this->rw,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'roles' => $this->roles,
                'status_ttd' => 'Y',
                'status_user' => 'Y',
                'email_verified_at' => Carbon::now()
            ]);

            $this->success();
            $this->resetForm();
            $this->dispatchBrowserEvent('closeAddPengguna');
        } catch (\Throwable $th) {
            // $this->error($th);
            dd($th);
        }
    }

    public function update_pengguna()
    {
        $this->validate(
            [
                'nip' => 'required',
                'nama' => 'required',
                'jabatan' => 'required',
                'alamat' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'roles' => 'required'
            ],
            [
                'nip.required' => 'NIP Harap Diisi',
                'nama.required' => 'Nama Harap Diisi',
                'jabatan.required' => 'Jabatan Harap Diisi',
                'alamat.required' => 'Alamat Harap Diisi',
                'rt.required' => 'RT Harap Diisi',
                'rw.required' => 'RW Harap Diisi',
                'roles.required' => 'Roles Harap Diisi'
            ]
        );
        try {
            $dataUpdatePengguna = [
                'nip' => $this->nip,
                'name' => $this->nama,
                'jabatan' => $this->jabatan,
                'alamat' => $this->alamat,
                'rt' => $this->rt,
                'rw' => $this->rw,
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
            $flagSoft = [
                'status_user' => 'N',
                'status_ttd' => 'N'
            ];
            User::where('id', $id)->update($flagSoft);
            $this->success();
        } catch (\Throwable $th) {
            $this->error();
        }
    }

    public function AktifPengguna($id)
    {
        try {
            $flagSoft = [
                'status_user' => 'Y',
                'status_ttd' => 'Y'
            ];
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
        $this->reset(['nama', 'alamat', 'rt', 'rw', 'email', 'password', 'roles', 'nip', 'jabatan']);

        $this->resetValidation();
    }

    public function render()
    {
        $dataLoadlist = User::with(['level'])->where('roles', 4)->get();
        return view('livewire.penandatangan.data-penandatangan', compact('dataLoadlist'));
    }
}
