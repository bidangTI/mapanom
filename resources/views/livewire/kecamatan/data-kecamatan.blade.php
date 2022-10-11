<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Form Data Kecamatan</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form class="form-horizontal" method="post" wire:submit.prevent="store_kecamatan">
                    @csrf
                    <div class="col-lg-6">
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Kecamatan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                        id="kecamatan" name="kecamatan" placeholder="Kecamatan"
                                        wire:model.defer="kecamatan" autocomplete="off">
                                    @error('kecamatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 border-top">
                        <div class="d-flex">
                            {{-- submit --}}
                            <div wire:loading.remove wire:target="store_kecamatan">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="store_kecamatan">
                                <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                    type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>

                            {{-- reset --}}
                            <div wire:loading.remove wire:target="resetFields">
                                <button type="button" wire:click="resetFields"
                                    class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                            </div>
                            <div wire:loading wire:target="resetFields">
                                <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light" type="button"
                                    disabled>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="d-flex border-top title-part-padding align-items-center"></div>

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (!@empty($resData))
                                @forelse ($resData as $Nomer => $res)
                                    <tr>
                                        <td>{{ $Nomer + 1 }}</td>
                                            <td>{{ $res->nama_kecamatan }}
                                        </td>
                                        <td>
                                            @if ($res->datakelurahan->isNotEmpty())
                                                <ol style="margin:0 15px;padding:0;">
                                                    @foreach ($res->datakelurahan as $ressub)
                                                        <li>
                                                            <div class="d-flex">
                                                                <span class="me-5">
                                                                    {{ $ressub->nama_kelurahan }}
                                                                </span>

                                                                {{-- edit kelurahan --}}
                                                                <button type="button" wire:loading.remove
                                                                    wire:target="edit_kelurahan({{ $ressub->id }})"
                                                                    class="btn btn-sm px-40 fs-40 font-small me-1"
                                                                    data-bs-toggle="tooltip" title="Edit Kelurahan"
                                                                    wire:click="edit_kelurahan({{ $ressub->id }})">
                                                                    <span
                                                                        class="badge bg-light-warning text-warning font-medium"><i
                                                                            class="fas fa-edit"></i></span>
                                                                </button>
                                                                <div wire:loading
                                                                    wire:target="edit_kelurahan({{ $ressub->id }})">
                                                                    <button
                                                                        class="btn btn-sm px-40 fs-40 font-small me-1"
                                                                        type="button" disabled>
                                                                        <span class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true"></span>
                                                                        Loading...
                                                                    </button>
                                                                </div>

                                                                {{-- delete kelurahan --}}
                                                                <button type="button" wire:loading.remove
                                                                    wire:target="confirm_kelurahan({{ $ressub->id }})"
                                                                    class="btn btn-sm px-40 fs-40 font-small me-1"
                                                                    data-bs-toggle="tooltip" title="Delete kelurahan"
                                                                    wire:click="confirm_kelurahan({{ $ressub->id }})">
                                                                    <span
                                                                        class="badge bg-light-danger text-danger font-medium"><i
                                                                            class="fas fa-eraser"></i></span></button>
                                                                <div wire:loading
                                                                    wire:target="confirm_kelurahan({{ $ressub->id }})">
                                                                    <button
                                                                        class="btn btn-sm px-40 fs-40 font-small me-1"
                                                                        type="button" disabled>
                                                                        <span class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true"></span>
                                                                        Loading...
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- tambahsubbid --}}
                                                <button type="button" wire:loading.remove
                                                    wire:target="tempID({{ $res->id }})"
                                                    class="btn  btn-sm px-40 fs-40 font-small me-1"
                                                    wire:click="tempID({{ $res->id }})"><span
                                                        class="badge bg-light-success text-success font-medium">Tambah Kelurahan</span>
                                                </button>

                                                <div wire:loading wire:target="tempID({{ $res->id }})">
                                                    <button class="btn btn-success  btn-sm px-40 fs-40 font-small me-1"
                                                        type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>
                                                {{-- edit kecamatan --}}
                                                <button type="button" wire:loading.remove
                                                    wire:target="edit_kecamatan({{ $res->id }})"
                                                    class="btn btn-sm px-40 fs-40 font-small me-1"
                                                    wire:click="edit_kecamatan({{ $res->id }})"><span
                                                        class="badge bg-light-warning text-warning font-medium">Edit Kecamatan</span>
                                                </button>
                                                <div wire:loading wire:target="edit_kecamatan({{ $res->id }})">
                                                    <button class="btn btn-warning  btn-sm px-40 fs-40 font-small me-1"
                                                        type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>

                                                {{-- delete kecamatan --}}
                                                <button type="button" wire:loading.remove
                                                    wire:target="confirm_kecamatan({{ $res->id }})"
                                                    class="btn btn-sm px-40 fs-40 font-small me-1"
                                                    wire:click="confirm_kecamatan({{ $res->id }})"><span
                                                        class="badge bg-light-danger text-danger font-medium">Hapus
                                                        kecamatan</span>
                                                </button>
                                                <div wire:loading wire:target="confirm_kecamatan({{ $res->id }})">
                                                    <button class="btn btn-danger  btn-sm px-40 fs-40 font-small me-1"
                                                        type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <strong>Belum Ada Data</strong>
                                        </td>
                                    </tr>
                                @endforelse
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            window.addEventListener('openFormModal', event => {
                $("#modal-kelurahan").modal('show');
            })
            window.addEventListener('closeFormModal', event => {
                $("#modal-kelurahan").modal('hide');
            })
            window.addEventListener('open_edit_kecamatan_modal', event => {
                $("#modal-edit-kecamatan").modal('show');
            })
            window.addEventListener('close_edit_kecamatan_modal', event => {
                $("#modal-edit-kecamatan").modal('hide');
            })
            window.addEventListener('open_edit_kelurahan_modal', event => {
                $("#modal-edit-kelurahan").modal('show');
            })
            window.addEventListener('close_edit_kelurahan_modal', event => {
                $("#modal-edit-kelurahan").modal('hide');
            })


            window.addEventListener('swal:confirm1', event => {
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
                            window.livewire.emit('destroy1', event.detail.id);
                        }
                    });
            });

            window.addEventListener('swal:confirm2', event => {
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
                            window.livewire.emit('destroy2', event.detail.id);
                        }
                    });
            });

            window.addEventListener('swal:confirm3', event => {
                Swal.fire({
                    title: event.detail.message,
                    icon: event.detail.type
                })
            });
        </script>
    @endpush

    <div wire:ignore.self id="modal-kelurahan" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="store_kelurahan">
                    @csrf
                    @method('put')
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Form Kelurahan
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>
                        <div class="mb-12 row">
                            <label class="col-sm-4 control-label">Kecamatan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="kecamatanID" name="kecamatanID"
                                        wire:model.defer="kecamatanID">
                                    <input type="text" class="form-control" id="namakecamatan" name="namakecamatan"
                                        wire:model.defer="namakecamatan" disabled>
                                </div>
                            </div>
                        </div><br>
                        <div class="mb-12 row">
                            <label class="col-sm-4 control-label">Kelurahan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan"
                                        name="kelurahan" placeholder="Kelurahan"
                                        wire:model.defer="kelurahan" autocomplete="off">
                                    @error('kelurahan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>

                    <div class="d-flex border-top title-part-padding align-items-center"></div>
                    <div class="modal-footer">
                        <div class="d-flex">
                            {{-- submit --}}
                            <div wire:loading.remove wire:target="store_kelurahan">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="store_kelurahan">
                                <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
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

    <div wire:ignore.self id="modal-edit-kecamatan" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="update_kecamatan">
                    @csrf
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Update
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-12 row">
                            <label class="col-sm-4 control-label">Kecamatan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="kecamatanID" name="kecamatanID"
                                        wire:model.defer="kecamatanID">
                                    <input type="text"
                                        class="form-control @error('kecamatanupdate') is-invalid @enderror"
                                        id="kecamatanupdate" name="kecamatanupdate"
                                        wire:model.defer="kecamatanupdate" autocomplete="off">
                                    @error('kecamatanupdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex border-top title-part-padding align-items-center"></div>
                    <div class="modal-footer">
                        <div class="d-flex">
                            {{-- submit --}}
                            <div wire:loading.remove wire:target="update_kecamatan">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="update_kecamatan">
                                <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
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

    <div wire:ignore.self id="modal-edit-kelurahan" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="update_kelurahan">
                    @csrf
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Update
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-12 row">
                            <label class="col-sm-4 control-label">Kelurahan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="kelurahanID" name="kelurahanID"
                                        wire:model.defer="kelurahanID">
                                    <input type="text"
                                        class="form-control @error('namakelurahanupdate') is-invalid @enderror"
                                        id="namakelurahanupdate" name="namakelurahanupdate"
                                        wire:model.defer="namakelurahanupdate" autocomplete="off">
                                    @error('namakelurahanupdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex border-top title-part-padding align-items-center"></div>
                    <div class="modal-footer">
                        <div class="d-flex">
                            {{-- submit --}}
                            <div wire:loading.remove wire:target="update_kelurahan">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="update_kelurahan">
                                <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
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
