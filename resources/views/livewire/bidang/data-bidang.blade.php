<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Form Data Kegiatan</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form class="form-horizontal" method="post" wire:submit.prevent="store_bidang">
                    @csrf
                    <div class="col-lg-6">
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Bidang Kegiatan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('bidang') is-invalid @enderror"
                                        id="bidang" name="bidang" placeholder="Bidang Kegiatan"
                                        wire:model.defer="bidang" autocomplete="off">
                                    @error('bidang')
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
                            <div wire:loading.remove wire:target="store_bidang">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="store_bidang">
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
                                <th>Bidang</th>
                                <th>Sub Bidang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (!@empty($resData))
                                @forelse ($resData as $Nomer => $res)
                                    <tr>
                                        <td>{{ $Nomer + 1 }}</td>
                                        <td>{{ $res->bidang }}
                                        </td>
                                        <td>
                                            @if ($res->sub_bidang->isNotEmpty())
                                                <ol style="margin:0 15px;padding:0;">
                                                    @foreach ($res->sub_bidang as $ressub)
                                                        <li>
                                                            <div class="d-flex">
                                                                <span class="me-5">
                                                                    {{ $ressub->subbidang }}
                                                                </span>
                                                                {{-- edit sub bidang --}}
                                                                <button type="button" wire:loading.remove
                                                                    wire:target="edit_subbidang({{ $ressub->id }})"
                                                                    class="btn btn-warning  btn-sm px-40 fs-40 font-small me-1"
                                                                    data-bs-toggle="tooltip" title="Edit Sub Bidang"
                                                                    wire:click="edit_subbidang({{ $ressub->id }})">
                                                                    <i class="fas fa-edit"></i></button>
                                                                <div wire:loading
                                                                    wire:target="edit_subbidang({{ $ressub->id }})">
                                                                    <button
                                                                        class="btn btn-warning  btn-sm px-40 fs-40 font-small me-1"
                                                                        type="button" disabled>
                                                                        <span class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true"></span>
                                                                        Loading...
                                                                    </button>
                                                                </div>

                                                                {{-- delete sub bidang --}}
                                                                <button type="button" wire:loading.remove
                                                                    wire:target="confirm_subbidang({{ $ressub->id }})"
                                                                    class="btn btn-danger  btn-sm px-40 fs-40 font-small me-1"
                                                                    data-bs-toggle="tooltip" title="Delete Sub Bidang"
                                                                    wire:click="confirm_subbidang({{ $ressub->id }})"><i
                                                                        class="fas fa-eraser"></i></button>
                                                                <div wire:loading
                                                                    wire:target="confirm_subbidang({{ $ressub->id }})">
                                                                    <button
                                                                        class="btn btn-danger  btn-sm px-40 fs-40 font-small me-1"
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
                                                    class="btn btn-success  btn-sm px-40 fs-40 font-small me-1"
                                                    wire:click="tempID({{ $res->id }})">Tambah Sub
                                                    Bidang
                                                </button>

                                                <div wire:loading wire:target="tempID({{ $res->id }})">
                                                    <button class="btn btn-success  btn-sm px-40 fs-40 font-small me-1"
                                                        type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>
                                                {{-- edit bidang --}}
                                                <button type="button" wire:loading.remove
                                                    wire:target="edit_bidang({{ $res->id }})"
                                                    class="btn btn-warning btn-sm px-40 fs-40 font-small me-1"
                                                    wire:click="edit_bidang({{ $res->id }})">Edit Bidang
                                                </button>
                                                <div wire:loading wire:target="edit_bidang({{ $res->id }})">
                                                    <button class="btn btn-warning  btn-sm px-40 fs-40 font-small me-1"
                                                        type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>

                                                {{-- delete bidang --}}
                                                <button type="button" wire:loading.remove
                                                    wire:target="confirm_bidang({{ $res->id }})"
                                                    class="btn btn-danger  btn-sm px-40 fs-40 font-small me-1"
                                                    wire:click="confirm_bidang({{ $res->id }})">Delete Bidang
                                                </button>
                                                <div wire:loading wire:target="confirm_bidang({{ $res->id }})">
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
                $("#modal-subbidang").modal('show');
            })
            window.addEventListener('closeFormModal', event => {
                $("#modal-subbidang").modal('hide');
            })
            window.addEventListener('open_edit_bidang_modal', event => {
                $("#modal-edit-bidang").modal('show');
            })
            window.addEventListener('close_edit_bidang_modal', event => {
                $("#modal-edit-bidang").modal('hide');
            })
            window.addEventListener('open_edit_subbidang_modal', event => {
                $("#modal-edit-subbidang").modal('show');
            })
            window.addEventListener('close_edit_subbidang_modal', event => {
                $("#modal-edit-subbidang").modal('hide');
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

    <div wire:ignore.self id="modal-subbidang" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="store_subbidang">
                    @csrf
                    @method('put')
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Form Sub Kegiatan
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>
                        <div class="mb-12 row">
                            <label class="col-sm-4 control-label">Bidang Kegiatan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="bidangID" name="bidangID"
                                        wire:model.defer="bidangID">
                                    <input type="text" class="form-control" id="namabidang" name="namabidang"
                                        wire:model.defer="namabidang" disabled>
                                </div>
                            </div>
                        </div><br>
                        <div class="mb-12 row">
                            <label class="col-sm-4 control-label">Sub Bidang Kegiatan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control @error('subbidang') is-invalid @enderror" id="subbidang"
                                        name="subbidang" placeholder="Sub Bidang Kegiatan"
                                        wire:model.defer="subbidang" autocomplete="off">
                                    @error('subbidang')
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
                            <div wire:loading.remove wire:target="store_subbidang">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="store_subbidang">
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

    <div wire:ignore.self id="modal-edit-bidang" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="update_bidang">
                    @csrf
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Update
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-12 row">
                            <label class="col-sm-4 control-label">Bidang Kegiatan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="bidangID" name="bidangID"
                                        wire:model.defer="bidangID">
                                    <input type="text"
                                        class="form-control @error('namabidangupdate') is-invalid @enderror"
                                        id="namabidangupdate" name="namabidangupdate"
                                        wire:model.defer="namabidangupdate" autocomplete="off">
                                    @error('namabidangupdate')
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
                            <div wire:loading.remove wire:target="update_bidang">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="update_bidang">
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

    <div wire:ignore.self id="modal-edit-subbidang" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="update_subbidang">
                    @csrf
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Update
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-12 row">
                            <label class="col-sm-4 control-label">Sub Bidang Kegiatan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="SubbidangID" name="SubbidangID"
                                        wire:model.defer="SubbidangID">
                                    <input type="text"
                                        class="form-control @error('namasubbidangupdate') is-invalid @enderror"
                                        id="namasubbidangupdate" name="namasubbidangupdate"
                                        wire:model.defer="namasubbidangupdate" autocomplete="off">
                                    @error('namasubbidangupdate')
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
                            <div wire:loading.remove wire:target="update_subbidang">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="update_subbidang">
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
