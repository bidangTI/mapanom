<div>
    <div class="card">
        {{-- <div class="card-body border-bottom">
            <h4 class="card-title">Form Alur Persyaratan</h4>
        </div> --}}

        {{-- <div class="card-body">
            <div class="row">
                <form class="form-horizontal" method="post" wire:submit.prevent="store_permohonan"
                    enctype="multipart/form-data" disabled>
                    @csrf
                    <div class="col-lg-6">

                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Langkah Ke-<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('langkah') is-invalid @enderror"
                                        id="langkah" name="langkah" placeholder="Masukkan Langkah ke-berapa"
                                        autocomplete="off" wire:model.defer="langkah">
                                    @error('langkah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Nama Alur<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('status') is-invalid @enderror"
                                        id="status" name="status" placeholder="Masukkan Nama Alur"
                                        wire:model.defer="status" autocomplete="off">
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Keterangan<span style="color:red">*</span></label>
                            <div class="col-sm-12">
                                <div wire:ignore>
                                    <textarea class="summernote @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                                        wire:model.defer="keterangan" autocomplete="off">
                                    </textarea>
                                </div>
                                @error('keterangan')
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
                            {{-- <div wire:loading.remove wire:target="store_permohonan">
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
                            </div> --}}

                            {{-- reset --}}
                            {{-- <div wire:loading.remove wire:target="resetFields">
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
            <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Status</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>

                <tbody>
                    @if (!@empty($resData))
                        @forelse ($resData as $Nomer => $res)
                            <tr>
                                <td>{{ $res->id }}</td>
                                <td>{{ $res->status }}</td>
                                {{-- <td>
                                    <div class="d-flex">
                                        {{-- edit syarat --}}
                                        {{-- <button type="button" wire:loading.remove
                                            wire:target="edit_permohonan({{ $res->id }})"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="edit_permohonan({{ $res->id }})"><span
                                                class="badge bg-light-warning text-warning font-medium">Edit</span>
                                        </button>
                                        <div wire:loading wire:target="edit_permohonan({{ $res->id }})">
                                            <button class="btn btn-warning  btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div> --}}

                                        {{-- delete alur permohonan --}}
                                        {{-- <button type="button" wire:loading.remove
                                            wire:target="confirm_permohonan({{ $res->id }})"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="confirm_permohonan({{ $res->id }})"><span
                                                class="badge bg-light-danger text-danger font-medium">Hapus</span>
                                        </button>
                                        <div wire:loading wire:target="confirm_permohonan({{ $res->id }})">
                                            <button class="btn btn-danger  btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>
                                    </div>
                                </td> --}}
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
            // $(document).ready(function() {
            //     $('#keteranganupdate').summernote({
            //         height: 250,
            //         minHeight: null,
            //         maxHeight: null,
            //         focus: true,
            //         disableDragAndDrop: true,
            //         codeviewFilter: false,
            //         codeviewIframeFilter: true,
            //         callbacks: {
            //             onChange: function(e) {
            //                 @this.set('keteranganupdate', e);
            //             },
            //         }
            //     });
            // });
                
            // window.addEventListener('open_edit_permohonan_modal', event => {
            //     $('#keteranganupdate').summernote('code', $('#keteranganupdate').val());
            //     $("#modal-edit-permohonan").modal('show');
            // })
            // window.addEventListener('close_edit_permohonan_modal', event => {
            //     $("#modal-edit-permohonan").modal('hide');
            // })


            // window.addEventListener('swal:confirm1', event => {
            //     Swal.fire({
            //             title: event.detail.message,
            //             icon: event.detail.type,
            //             showCancelButton: true,
            //             confirmButtonColor: '#3085d6',
            //             cancelButtonColor: '#d33',
            //             confirmButtonText: 'Hapus!',
            //             cancelButtonText: 'Batal'
            //         })
            //         .then((result) => {
            //             if (result.isConfirmed) {
            //                 window.livewire.emit('destroy1', event.detail.id);
            //             }
            //         });
            // });

            
            $(document).ready(function() {
                init();
            });

            // window.livewire.hook('message.processed', (message, component) => {
            //     init();
            // });

            // function init() {
            //     $('#keterangan').summernote({
            //         height: 250,
            //         minHeight: null,
            //         maxHeight: null,
            //         focus: false,
            //         disableDragAndDrop: true,
            //         codeviewFilter: false,
            //         codeviewIframeFilter: true,
            //         callbacks: {
            //             onChange: function(e) {
            //                 @this.set('keterangan', e);
            //             },
            //         }
            //     });

                // $('#keteranganupdate').summernote({
                //     height: 250,
                //     minHeight: null,
                //     maxHeight: null,
                //     focus: false,
                //     disableDragAndDrop: true,
                //     codeviewFilter: false,
                //     codeviewIframeFilter: true,
                //     callbacks: {
                //         onChange: function(e) {
                //             @this.set('keteranganupdate', e);
                //         },
                //     }
                // });
            // }

            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }

            // // Reset Summernote
            // Livewire.on('keterangan', () => {
            //     $('#keterangan').summernote('reset');
            // });

            // Livewire.on('keteranganupdate', () => {
            //     $('#keteranganupdate').summernote('reset');
            // });
        </script>
    @endpush

    {{-- <div wire:ignore.self id="modal-edit-permohonan" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="update_permohonan">
                    @csrf
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Update
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Langkah Ke-<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="permohonanID" name="permohonanID"
                                        wire:model.defer="permohonanID">
                                    <input type="text"
                                        class="form-control @error('langkahupdate') is-invalid @enderror"
                                        id="langkahupdate" name="langkahupdate" wire:model.defer="langkahupdate"
                                        autocomplete="off">
                                    @error('langkahupdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Status<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="permohonanID" name="permohonanID"
                                        wire:model.defer="permohonanID">
                                    <input type="text"
                                        class="form-control @error('statusupdate') is-invalid @enderror"
                                        id="statusupdate" name="statusupdate" wire:model.defer="statusupdate"
                                        autocomplete="off">
                                    @error('statusupdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>


                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Keterangan<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div wire:ignore>
                                        <input type="hidden" class="form-control" id="permohonanID"
                                            name="permohonanID" wire:model.defer="permohonanID">
                                      
                                        <textarea class="summernote @error('keteranganupdate') is-invalid @enderror" id="keteranganupdate"
                                            name="keteranganupdate" wire:model.defer="keteranganupdate" autocomplete="off">
                                            </textarea>
                                    </div>
                                    @error('keteranganupdate')
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
                            {{-- <div wire:loading.remove wire:target="update_permohonan">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="update_permohonan">
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
    </div> --}}
</div>
