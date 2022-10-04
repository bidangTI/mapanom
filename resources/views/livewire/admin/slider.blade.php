<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Form Slider Gambar</h4>
        </div>

        {{-- <div class="card-body">
            <div class="row">
                <form class="form-horizontal" method="post" wire:submit.prevent="store_slider"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6">

                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Judul<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        id="judul" name="judul" placeholder="Masukkan judul Slider"
                                        autocomplete="off" wire:model.defer="judul">
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <div class="mb-3 row">
                            <label for="gambar" class="col-sm-3 form-label">Gambar
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) File jpg, jpeg, png - Max. 1 mb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    @foreach ($dataPermohonan as $value)
                                        @if ($value->permohonan_id != 1)
                                            @if ($val_lambang == 1 || $statusdokumen == 'Y')
                                                <input class="form-control @error('lambang') is-invalid @enderror"
                                                    type="file" id="lambang{{ $iterlambang }}" name="lambang"
                                                    wire:model="lambang" disabled>
                                                @if (!empty($lambangOld))
                                                    <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                                Ada</em>
                                                        </small>
                                                        @if ($lambangOld)
                                                            @php
                                                                $tempUrl = explode('/', $lambangOld);
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
                                            @else
                                                @if ($val_lambang == 0)
                                                    <div class="spinner-grow text-danger" style="height: 0.9em; width:0.9em" role="status">
                                                        <span class="visually-hidden"></span>
                                                    </div>
                                                    <span style="font-style: italic; color:red">
                                                        Silahkan Perbaiki Data ...
                                                    </span>
                                                @endif

                                                <input class="form-control @error('gambar') is-invalid @enderror"
                                                    type="file" id="gambar{{ $itergambar }}" name="gambar"
                                                    wire:model="gambar">
                                                @if (!empty($lambangOld))
                                                    <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                                Ada</em>
                                                        </small>
                                                        @if ($lambangOld)
                                                            @php
                                                                $tempUrl = explode('/', $lambangOld);
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
                                            @endif
                                        @else
                                            <input class="form-control @error('lambang') is-invalid @enderror"
                                                type="file" id="lambang{{ $iterlambang }}" name="lambang"
                                                wire:model="lambang">
                                            <div wire:loading wire:target="lambang">
                                                <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                                    <div class="progress mt-1">
                                                        <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                            role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100" style="width: 100%"></div>
                                                    </div>
                                                </small>
                                            </div>
                                            @error('lambang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Deskripsi<span style="color:red">*</span></label>
                            <div class="col-sm-12">
                                <div wire:ignore>
                                    <textarea class="summernote @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                                        wire:model.defer="deskripsi" autocomplete="off">
                                    </textarea>
                                </div>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border-top">
                        <div class="d-flex">
                            {{-- submit
                            <div wire:loading.remove wire:target="store_permohonan">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="store_permohonan">
                                <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                    type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>

                            {{-- reset 
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
        </div> --}}



        <div class="d-flex border-top title-part-padding align-items-center"></div>

        <div class="table-responsive" style="padding-left: 20px; padding-right: 20px;">
            <div class="d-flex mb-4">
                <button type="button" wire:loading.remove wire:target="AddSlider"
                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1" wire:click="AddSlider">Tambah
                    Slider
                </button>

                <div wire:loading wire:target="AddSlider">
                    <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1" type="button"
                        disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
            </div>
            <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!@empty($resData))
                        @forelse ($resData as $Nomer => $res)
                            <tr>
                                <td>{{ $Nomer + 1 }}</td>
                                <td><img src="{{ Storage::url($res->gambar) }}" /></td>
                                <td>
                                    <div class="d-flex">
                                        {{-- edit syarat --}}
                                        {{-- <button type="button" wire:loading.remove
                                            wire:target="edit_slider({{ $res->id }})"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="edit_slider({{ $res->id }})"><span
                                                class="badge bg-light-warning text-warning font-medium">Edit</span>
                                        </button>
                                        <div wire:loading wire:target="store_slider({{ $res->id }})">
                                            <button class="btn btn-warning  btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div> --}}

                                        {{-- delete alur permohonan --}}
                                        <button type="button" wire:loading.remove
                                            wire:target="confirm_slider({{ $res->id }})"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="confirm_slider({{ $res->id }})"><span
                                                class="badge bg-light-danger text-danger font-medium">Hapus</span>
                                        </button>
                                        <div wire:loading wire:target="confirm_slider({{ $res->id }})">
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
            window.addEventListener('open_add_slider_modal', event => {
                $("#modal-add-slider").modal('show');
            })
            window.addEventListener('close_add_slider_modal', event => {
                $("#modal-add-slider").modal('hide');
            })
            // window.addEventListener('open_edit_slider_modal', event => {
            //     $('#deskripsiupdate').summernote('code', $('#deskripsiupdate').val());
            //     $("#modal-edit-slider").modal('show');
            // })
            // window.addEventListener('close_edit_slider_modal', event => {
            //     $("#modal-edit-slider").modal('hide');
            // })


            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

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
            // function init() {

            //     // $('#deskripsi').summernote({
            //     //     height: 250,
            //     //     minHeight: null,
            //     //     maxHeight: null,
            //     //     focus: false,
            //     //     disableDragAndDrop: true,
            //     //     codeviewFilter: false,
            //     //     codeviewIframeFilter: true,
            //     //     callbacks: {
            //     //         onChange: function(e) {
            //     //             @this.set('deskripsi', e);
            //     //         },
            //     //     }
            //     // });

            //     // $('#keterangan').summernote({
            //     //     height: 250,
            //     //     minHeight: null,
            //     //     maxHeight: null,
            //     //     focus: false,
            //     //     disableDragAndDrop: true,
            //     //     codeviewFilter: false,
            //     //     codeviewIframeFilter: true,
            //     //     callbacks: {
            //     //         onChange: function(e) {
            //     //             @this.set('keterangan_setuju', e);
            //     //         },
            //     //     }
            //     // });
            //     // $('#keterangan_setuju').summernote('disable');

            //     $('#deskripsiupdate').summernote({
            //         height: 250,
            //         minHeight: null,
            //         maxHeight: null,
            //         focus: false,
            //         disableDragAndDrop: true,
            //         codeviewFilter: false,
            //         codeviewIframeFilter: true,
            //         callbacks: {
            //             onChange: function(e) {
            //                 @this.set('deskripsiupdate', e);
            //             },
            //         }
            //     });

            //     // $('#keteranganupdate').summernote({
            //     //     height: 250,
            //     //     minHeight: null,
            //     //     maxHeight: null,
            //     //     focus: false,
            //     //     disableDragAndDrop: true,
            //     //     codeviewFilter: false,
            //     //     codeviewIframeFilter: true,
            //     //     callbacks: {
            //     //         onChange: function(e) {
            //     //             @this.set('keteranganupdate_setuju', e);
            //     //         },
            //     //     }
            //     // });
            //     // $('#keteranganupdate_setuju').summernote('disable');
            // }

            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }

            // Reset Summernote
            Livewire.on('deskripsi', () => {
                $('#deskripsi').summernote('reset');
            });

            // Livewire.on('keteranganupdate', () => {
            //     $('#keteranganupdate').summernote('reset');
            // });
        </script>
    @endpush
    <div wire:ignore.self id="modal-add-slider" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="store_slider">
                    @csrf
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Tambah
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Gambar<span style="color:red">*</span>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) File jpg, jpeg, png - Max. 512
                                            kb</span>
                                </small>
                            </label>

                            <div class="col-sm-9">
                                <div class="input-group">
                                    {{-- <input type="hidden" class="form-control" id="sliderID" name="sliderID"
                                        wire:model.defer="sliderID"> --}}
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                        id="gambar" name="gambar" wire:model.defer="gambar" autocomplete="off">
                                    @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="mb-12 row">
                            <h5 style="text-align:center;">Ukuran Gambar disarankan <b>1200 x 678</b></h5>
                        </div>
                        
                    </div>

                    <div class="d-flex border-top title-part-padding align-items-center"></div>
                    <div class="modal-footer">
                        <div class="d-flex">
                            {{-- submit --}}
                            <div wire:loading.remove wire:target="store_slider">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="store_slider">
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

    <div wire:ignore.self id="modal-edit-slider" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="store_slider">
                    @csrf
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Edit
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Gambar<span style="color:red">*</span>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) File jpg, jpeg, png - Max. 512
                                            kb</span>
                                </small>
                            </label>

                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="sliderID" name="sliderID"
                                        wire:model.defer="sliderID">
                                    <input type="file" class="form-control @error('gambarupdate') is-invalid @enderror"
                                        id="gambarupdate" name="gambarupdate" wire:model.defer="gambarupdate" autocomplete="off">
                                    @error('gambarupdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="d-flex border-top title-part-padding align-items-center"></div>
                    <div class="modal-footer">
                        <div class="d-flex">
                            {{-- submit --}}
                            <div wire:loading.remove wire:target="update_slider">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="update_slider">
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
