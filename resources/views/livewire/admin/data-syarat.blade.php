
<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Form Persyaratan Administrasi</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <form class="form-horizontal" method="post" wire:submit.prevent="store_persyaratan"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6">

                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Kategori<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select
                                        class="form-control custom-select @error('kategoriID') is-invalid @enderror"
                                        style="width: 100%; height:36px; background-color:#FFFFFF;"
                                        id="kategoriID" name="kategoriID"
                                        wire:model.defer="kategoriID" autocomplete="off">
                                        <option>--- Pilih ---</option>
                                        @foreach ($dataKategori as $res)
                                            <option value="{{ $res->id }}">{{ $res->kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategoriID')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Dasar Hukum<span style="color:red">*</span></label>
                            <div class="col-sm-12">
                                <div wire:ignore>
                                    <textarea class="summernote @error('dasar_hukum') is-invalid @enderror" id="dasar_hukum" name="dasar_hukum"
                                        wire:model.defer="dasar_hukum" autocomplete="off">
                                    </textarea>
                                </div>
                                @error('dasar_hukum')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Syarat<span style="color:red">*</span></label>
                            <div class="col-sm-12">
                                <div wire:ignore>
                                    <textarea class="summernote @error('syarat') is-invalid @enderror" id="syarat" name="syarat"
                                        wire:model.defer="syarat" autocomplete="off">
                                    </textarea>
                                </div>
                                @error('syarat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border-top">
                        <div class="d-flex">
                            {{-- submit --}}
                            <div wire:loading.remove wire:target="store_persyaratan">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="store_persyaratan">
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
            </div>
        </div>



        <div class="d-flex border-top title-part-padding align-items-center"></div>

        <div class="table-responsive" style="padding-left: 20px; padding-right: 20px;">
            <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Dasar Hukum</th>
                        <th>Syarat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!@empty($resData))
                        @forelse ($resData as $Nomer => $res)
                            <tr>
                                <td>{{ $Nomer + 1}}</td>
                                <td>{{ $res->kategori->kategori }}</td>
                                <td>{!! $res->dasar_hukum !!}</td>
                                <td>{!! $res->syarat !!}</td>


                                <td>
                                    <div class="d-flex">
                                        {{-- edit syarat --}}
                                        <button type="button" wire:loading.remove
                                            wire:target="edit_syarat({{ $res->id }})"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="edit_syarat({{ $res->id }})"><span
                                                class="badge bg-light-warning text-warning font-medium">Edit</span>
                                        </button>
                                        <div wire:loading wire:target="edit_syarat({{ $res->id }})">
                                            <button class="btn btn-warning  btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>

                                        {{-- delete alur syarat --}}
                                        <button type="button" wire:loading.remove
                                            wire:target="confirm_syarat({{ $res->id }})"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="confirm_syarat({{ $res->id }})"><span
                                                class="badge bg-light-danger text-danger font-medium">Hapus</span>
                                        </button>
                                        <div wire:loading wire:target="confirm_syarat({{ $res->id }})">
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


    @push('script')
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
            $(document).ready(function() {
                $('#dasarHukumUpdate').summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    disableDragAndDrop: true,
                    codeviewFilter: false,
                    codeviewIframeFilter: true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('dasarHukumUpdate', e);
                        },
                    }
                });

                $('#syaratUpdate').summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    disableDragAndDrop: true,
                    codeviewFilter: false,
                    codeviewIframeFilter: true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('syaratUpdate', e);
                        },
                    }
                });
            });

            window.addEventListener('open_edit_syarat_modal', event => {
                $('#dasarHukumUpdate').summernote('code', $('#dasarHukumUpdate').val());
                $('#syaratUpdate').summernote('code', $('#syaratUpdate').val());
                $("#modal-edit-syarat").modal('show');
            })
            window.addEventListener('close_edit_syarat_modal', event => {
                $("#modal-edit-syarat").modal('hide');
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

            // Before Action
            $(document).ready(function() {
                init();
            });

            window.livewire.hook('message.processed', (message, component) => {
                init();
            });

            // After Action
            function init() {

                $('#dasar_hukum').summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    disableDragAndDrop: true,
                    codeviewFilter: false,
                    codeviewIframeFilter: true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('dasar_hukum', e);
                        },
                    }
                });

                $('#syarat').summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    disableDragAndDrop: true,
                    codeviewFilter: false,
                    codeviewIframeFilter: true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('syarat', e);
                        },
                    }
                });
            }

            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }

            // Reset Summernote
            Livewire.on('dasar_hukum', () => {
                $('#dasar_hukum').summernote('reset');
            });

            Livewire.on('syarat', () => {
                $('#syarat').summernote('reset');
            });

            Livewire.on('syaratUpdate', () => {
                $('#syaratUpdate').summernote('reset');
            });

            Livewire.on('dasar_hukumUpdate', () => {
                $('#dasar_hukumUpdate').summernote('reset');
            });
        </script>
    @endpush
    <div wire:ignore.self id="modal-edit-syarat" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="update_syarat">
                    @csrf
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Update
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Kategori<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="syaratID" name="syaratID"
                                        wire:model.defer="syaratID">
                                        <select
                                        class="form-control custom-select @error('kategoriIDUpdate') is-invalid @enderror"
                                        style="width: 100%; height:36px; background-color:#FFFFFF;"
                                        id="kategoriIDUpdate" name="kategoriIDUpdate"
                                        wire:model.defer="kategoriIDUpdate" autocomplete="off">
                                        <option>--- Pilih ---</option>
                                        @foreach ($dataKategori as $res)
                                            <option value="{{ $res->id }}">{{ $res->kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategoriIDUpdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Dasar Hukum<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div wire:ignore>
                                        <input type="hidden" class="form-control" id="syaratID"
                                            name="syaratID" wire:model.defer="syaratID">

                                        <textarea class="summernote @error('dasarHukumUpdate') is-invalid @enderror" id="dasarHukumUpdate"
                                            name="dasarHukumUpdate" wire:model.defer="dasarHukumUpdate" autocomplete="off">
                                            </textarea>
                                    </div>
                                    @error('dasarHukumUpdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Keterangan<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div wire:ignore>
                                        <input type="hidden" class="form-control" id="syaratID"
                                            name="syaratID" wire:model.defer="syaratID">

                                        <textarea class="summernote @error('syaratUpdate') is-invalid @enderror" id="syaratUpdate"
                                            name="syaratUpdate" wire:model.defer="syaratUpdate" autocomplete="off">
                                            </textarea>
                                    </div>
                                    @error('syaratUpdate')
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
                            <div wire:loading.remove wire:target="update_syarat">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="update_syarat">
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

