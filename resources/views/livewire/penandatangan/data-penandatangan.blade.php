<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Form Data Penandatangan</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="d-flex mb-4">
                    <button type="button" wire:loading.remove wire:target="AddPengguna"
                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                        wire:click="AddPengguna">Tambah Penandatangan
                    </button>

                    <div wire:loading wire:target="AddPengguna">
                        <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1" type="button"
                            disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama<br>User</th>
                                <th>Jabatan</th>
                                <th>Roles</th>
                                <th>Status</th>
                                <th>TTE</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($dataLoadlist as $Nomer => $valList)
                                <tr>
                                    <td>{{ $Nomer + 1 }}</td>
                                    <td>{{ $valList->nip }}</td>
                                    <td>{{ $valList->name }}<br>
                                        {{ $valList->email }}</td>
                                    <td>{{ $valList->jabatan }}</td>
                                    <td>{{ $valList->level->role }}</td>
                                    <td>
                                        @if ($valList->status_user == 'Y')
                                            <span class="badge bg-light-success text-success font-medium">AKTIF</span>
                                        @else
                                            <button type="button" wire:loading.remove
                                                wire:target="AktifPengguna({{ $valList->id }})"
                                                class="btn btn-danger btn-xs px-40 fs-40 font-small me-1"
                                                wire:click="AktifPengguna({{ $valList->id }})"
                                                tooltip="Aktifkan Pengguna" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Aktifkan Pengguna">TIDAK AKTIF
                                            </button>

                                            <div wire:loading wire:target="AktifPengguna({{ $valList->id }})">
                                                <button class="btn btn-danger btn-sm px-40 fs-40 font-small me-1"
                                                    type="button" disabled>
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" wire:loading.remove
                                            wire:target="FileTtd({{ $valList->id }})"
                                            class="btn btn-info btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="FileTtd({{ $valList->id }})"><i class="fas fa-file-alt"></i>
                                        </button>

                                        <div wire:loading wire:target="FileTtd({{ $valList->id }})">
                                            <button class="btn btn-info btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- edit pengguna --}}
                                        <button type="button" wire:loading.remove
                                            wire:target="EditPengguna({{ $valList->id }})"
                                            class="btn btn-success btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="EditPengguna({{ $valList->id }})" tooltip="Edit Data Pengguna"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Edit Data Pengguna"><i class="fas fa-edit"></i>
                                        </button>

                                        <div wire:loading wire:target="EditPengguna({{ $valList->id }})">
                                            <button class="btn btn-success btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>

                                        {{-- reset password --}}
                                        <button type="button" wire:loading.remove
                                            wire:target="EditPassword({{ $valList->id }})"
                                            class="btn btn-warning btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="EditPassword({{ $valList->id }})" tooltip="Reset Password"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password"><i
                                                class="fas fa-key"></i>
                                        </button>

                                        <div wire:loading wire:target="EditPassword({{ $valList->id }})">
                                            <button class="btn btn-warning btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>

                                        {{-- delete pengguna --}}
                                        @if ($valList->status_user == 'Y')
                                            <button type="button" wire:loading.remove
                                                wire:target="confirm_delete({{ $valList->id }})"
                                                class="btn btn-danger btn-sm px-40 fs-40 font-small me-1"
                                                wire:click="confirm_delete({{ $valList->id }})"
                                                tooltip="Delete Pengguna" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete Pengguna"><i
                                                    class="fas fa-eraser"></i>
                                            </button>

                                            <div wire:loading wire:target="confirm_delete({{ $valList->id }})">
                                                <button class="btn btn-danger btn-sm px-40 fs-40 font-small me-1"
                                                    type="button" disabled>
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" style="text-align: center"><b>Belum Ada Data</b></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            window.addEventListener('openAddPengguna', event => {
                $("#addPengguna").modal('show');
            })
            window.addEventListener('closeAddPengguna', event => {
                $("#addPengguna").modal('hide');
            })

            window.addEventListener('openEditPengguna', event => {
                $("#editPengguna").modal('show');
            })
            window.addEventListener('closeEditPengguna', event => {
                $("#editPengguna").modal('hide');
            })

            window.addEventListener('openEditPassword', event => {
                $("#resetPassword").modal('show');
            })
            window.addEventListener('closeEditPassword', event => {
                $("#resetPassword").modal('hide');
            })

            window.addEventListener('OpenFormTTD', event => {
                $("#formttd").modal('show');
            })
            window.addEventListener('CloseFormTTD', event => {
                $("#formttd").modal('hide');
            })

            window.addEventListener('openViewFile', event => {
                $("#ModalView").modal('show');
            })
            window.addEventListener('closeViewFile', event => {
                $("#ModalView").modal('hide');
            })


            window.addEventListener('swal:add', event => {
                Swal.fire({
                        title: event.detail.message,
                        icon: event.detail.type,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus!',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('store', event.detail.id);
                        }
                    });
            });

            window.addEventListener('swal:success', event => {
                Swal.fire({
                    title: event.detail.message,
                    icon: event.detail.type,
                    toast: event.detail.toast,
                    position: event.detail.position,
                    showConfirmButton: false,
                    timer: 2000
                });
            });

            window.addEventListener('swal:confirmDelete', event => {
                Swal.fire({
                        title: event.detail.message,
                        icon: event.detail.type,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus !',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('DelPengguna', event.detail.id);
                        }
                    });
            });

            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }

            // Action Element Form On MODAL
            $(document).ready(function() {
                init();
            });

            $('#roles').on('change', function(e) {
                @this.set('roles', e.target.value);
            });
            $('#rolesEdit').on('change', function(e) {
                @this.set('rolesEdit', e.target.value);
            });

            window.livewire.hook('message.processed', (message, component) => {
                init();
            });

            function init() {
                $(document).ready(function() {
                    $("#roles").select2({
                        dropdownParent: $("#addPengguna"),
                        placeholder: '--- Pilih ---'
                    });
                });
                $(document).ready(function() {
                    $("#rolesEdit").select2({
                        dropdownParent: $("#editPengguna"),
                        placeholder: '--- Pilih ---'
                    });
                });
            }
            // FInish Action
        </script>
    @endpush

    {{-- Tambah Pengguna --}}
    <div wire:ignore.self class="modal fade" id="addPengguna" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header  modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Form Data Penandatangan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" wire:submit.prevent="store_pengguna" enctype="multipart/form-data">
                        @csrf
                        <p>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">NIP<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control @error('nip') is-invalid @enderror"
                                                    id="nip" name="nip" placeholder="Masukkan NIP"
                                                    autocomplete="off" wire:model.defer="nip">
                                                @error('nip')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">Nama<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    id="nama" name="nama" placeholder="Masukkan Nama"
                                                    autocomplete="off" wire:model.defer="nama">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">Jabatan<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control @error('jabatan') is-invalid @enderror"
                                                    id="jabatan" name="jabatan" placeholder="Masukkan Jabatan"
                                                    autocomplete="off" wire:model.defer="jabatan">
                                                @error('jabatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">Alamat<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                                    wire:model.defer="alamat" aria-label="With textarea" placeholder="Alamat Tanpa RT/RW" style="height: 56px; resize: none"
                                                    autocomplete="off"></textarea>
                                                @error('alamat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">RT/RW<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control @error('rt') is-invalid @enderror"
                                                    id="rt" name="rt" placeholder="Masukkan RT"
                                                    autocomplete="off" wire:model.defer="rt"
                                                    onkeypress="return hanyaAngka(event)">
                                                <span
                                                    style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b>
                                                </span>
                                                <input type="text"
                                                    class="form-control @error('rw') is-invalid @enderror"
                                                    id="rw" name="rw" placeholder="Masukkan RW"
                                                    autocomplete="off" wire:model.defer="rw"
                                                    onkeypress="return hanyaAngka(event)">
                                            </div>

                                        </div>
                                        <span>
                                            @error('rt')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            @error('rw')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">email<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" name="email" placeholder="Masukkan e-mail"
                                                    autocomplete="off" wire:model.defer="email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">Password<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="Masukkan Password"
                                                    autocomplete="off" wire:model.defer="password">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-3 control-label">Roles<span
                                                style="color:red">*</span></label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <select
                                                    class="select2 form-control custom-select @error('roles') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" id="roles" name="roles"
                                                    wire:model.defer="roles" autocomplete="off">
                                                    <option value="">--- Pilih ----</option>
                                                    @foreach ($dataRoles as $resRoles)
                                                        <option value="{{ $resRoles->id }}">{{ $resRoles->role }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('roles')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom"></div>
                        </p>
                        <div class="modal-footer">
                            <div class="d-flex">
                                <div wire:loading.remove wire:target="store_pengguna">
                                    <button type="submit"
                                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                                </div>
                                <div wire:loading wire:target="store_pengguna">
                                    <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>

                                {{-- reset --}}
                                <div wire:loading.remove wire:target="resetForm">
                                    <button type="button" wire:click="resetForm"
                                        class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                </div>
                                <div wire:loading wire:target="resetForm">
                                    <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Update Pengguna --}}
    <div wire:ignore.self class="modal fade" id="editPengguna" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header  modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Form Edit Data Pengguna</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" wire:submit.prevent="update_pengguna">
                        @csrf
                        <p>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" wire:model.defer="idUser" name="idUser" id="idUser">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">NIP<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control @error('nip') is-invalid @enderror"
                                                    id="nip" name="nip" placeholder="Masukkan NIP"
                                                    autocomplete="off" wire:model.defer="nip">
                                                @error('nip')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">Nama<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    id="nama" name="nama" placeholder="Masukkan Nama"
                                                    autocomplete="off" wire:model.defer="nama">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">Jabatan<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control @error('jabatan') is-invalid @enderror"
                                                    id="jabatan" name="jabatan" placeholder="Masukkan Jabatan"
                                                    autocomplete="off" wire:model.defer="jabatan">
                                                @error('jabatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">Alamat<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                                    wire:model.defer="alamat" aria-label="With textarea" placeholder="Alamat" style="height: 56px; resize: none"
                                                    autocomplete="off"></textarea>
                                                @error('alamat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">RT/RW<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control @error('rt') is-invalid @enderror"
                                                    id="rt" name="rt" placeholder="Masukkan RT"
                                                    autocomplete="off" wire:model.defer="rt"
                                                    onkeypress="return hanyaAngka(event)">
                                                <span
                                                    style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b>
                                                </span>
                                                <input type="text"
                                                    class="form-control @error('rw') is-invalid @enderror"
                                                    id="rw" name="rw" placeholder="Masukkan RW"
                                                    autocomplete="off" wire:model.defer="rw"
                                                    onkeypress="return hanyaAngka(event)">
                                            </div>
                                        </div>
                                        <span>
                                            @error('rt')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            @error('rw')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">email<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" name="email" placeholder="Masukkan e-mail"
                                                    autocomplete="off" wire:model.defer="email" disabled>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-3 control-label">Roles<span
                                                style="color:red">*</span></label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <select
                                                    class="select2 form-control custom-select @error('roles') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" id="rolesEdit" name="rolesEdit"
                                                    wire:model.defer="rolesEdit" autocomplete="off" disabled>
                                                    @foreach ($dataRoles as $resRoles)
                                                        <option value="{{ $resRoles->id }}">{{ $resRoles->role }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('roles')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom"></div>
                        </p>
                        <div class="modal-footer">
                            <div class="d-flex">
                                <div wire:loading.remove wire:target="update_pengguna">
                                    <button type="submit"
                                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                                </div>
                                <div wire:loading wire:target="update_pengguna">
                                    <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>

                                {{-- reset --}}
                                <div wire:loading.remove wire:target="resetForm">
                                    <button type="button" wire:click="resetForm"
                                        class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                </div>
                                <div wire:loading wire:target="resetForm">
                                    <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Reset Password --}}
    <div wire:ignore.self class="modal fade" id="resetPassword" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header  modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Form Reset Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" wire:submit.prevent="update_password">
                        @csrf
                        <p>
                        <div class="card-body">
                            <div class="row">
                                {{-- <input type="text" wire:model.defer="idUser" name="idUser" id="idUser"> --}}
                                <div class="col-lg-6">
                                    <input type="hidden"
                                        class="form-control @error('password') is-invalid @enderror" id="idUser"
                                        name="idUser" placeholder="Masukkan Password" autocomplete="off"
                                        wire:model.defer="idUser">

                                    <div class="mb-3 row">
                                        <input type="hidden" name="passwordOld" id="passwordOld"
                                            wire:model.defer="passwordOld">

                                        <label class="col-sm-3 control-label">Password Baru<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password"
                                                    placeholder="Masukkan Password Baru" autocomplete="off"
                                                    wire:model.defer="password">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-bottom"></div>
                        </p>
                        <div class="modal-footer">
                            <div class="d-flex">
                                <div wire:loading.remove wire:target="update_password">
                                    <button type="submit"
                                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                                </div>
                                <div wire:loading wire:target="update_password">
                                    <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>

                                {{-- reset --}}
                                <div wire:loading.remove wire:target="resetForm">
                                    <button type="button" wire:click="resetForm"
                                        class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                </div>
                                <div wire:loading wire:target="resetForm">
                                    <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Form TTD --}}
    <div wire:ignore.self class="modal fade" id="formttd" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header  modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Form Upload File Tanda Tangan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" wire:submit.prevent="upload_ttd" enctype="mul">
                        @csrf
                        <p>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" class="form-control" id="idUser" name="idUser"
                                        wire:model.defer="idUser">

                                    <div class="mb-3 row">
                                        <label for="srtdomisili" class="col-sm-4 form-label">File Tanda Tangan
                                            <span style="color:red">*</span>
                                            <br>
                                            <small class="form-control-feedback"><span style="font-style: italic">
                                                    <span style="font-size:12px; color:brown">**) FIle jpg, jpeg, png -
                                                        Max. 512
                                                        kb</span>
                                            </small>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input class="form-control @error('filettd') is-invalid @enderror"
                                                    type="file" id="filettd{{ $iterfilettd }}" name="filettd"
                                                    wire:model="filettd">
                                                @if (!empty($filettdOld))
                                                    <p><small class="text-success"><em>File : Sudah Ada</em>
                                                        </small>&nbsp;
                                                        @if ($filettdOld)
                                                            @php
                                                                $tempUrl = explode('/', $filettdOld);
                                                                $folder = $tempUrl[0];
                                                                $namefile = $tempUrl[1];
                                                            @endphp

                                                            <a wire:loading.remove
                                                                wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                                wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                                <i class="fas fa-eye" style="color: blue"></i>
                                                            </a>
                                                        @endif
                                                    </p>
                                                @endif
                                                <div wire:loading wire:target="filettd">
                                                    <small class="form-text text-muted"><em>Sedang Upload File
                                                            ...</em>
                                                        <div class="progress mt-1">
                                                            <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                                role="progressbar" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 100%"></div>
                                                        </div>
                                                    </small>
                                                </div>
                                                @error('filettd')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-bottom"></div>
                        </p>
                        <div class="modal-footer">
                            <div class="d-flex">
                                <div wire:loading.remove wire:target="upload_ttd">
                                    <button type="submit"
                                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                                </div>
                                <div wire:loading wire:target="upload_ttd">
                                    <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>

                                {{-- reset --}}
                                <div wire:loading.remove wire:target="resetForm">
                                    <button type="button" wire:click="resetForm"
                                        class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                </div>
                                <div wire:loading wire:target="resetForm">
                                    <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- VIEW DOKUMEN --}}
    <div wire:ignore.self class="modal fade" id="ModalView" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">

        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">View Tanda Tangan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeView"></button>
                </div>
                <div class="modal-body" style="background: rgb(255, 255, 255)">
                    @if ($url)
                        <iframe src="{{ asset('displayPDF/' . $url) }}" style="width: 100%; height:800px"></iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
