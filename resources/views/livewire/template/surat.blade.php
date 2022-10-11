<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Form Template Surat</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($dataLoadlist as $Nomer => $valList)
                                <tr>
                                    <td>{{ $Nomer + 1 }}</td>
                                    <td>{{ $valList->kategori }}</td>
                                    <td>
                                        <button type="button" wire:loading.remove
                                            wire:target="FileSurat({{ $valList->id }})"
                                            class="btn btn-info btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="FileSurat({{ $valList->id }})"><i class="fas fa-file-alt"></i>
                                        </button>

                                        <div wire:loading wire:target="FileSurat({{ $valList->id }})">
                                            <button class="btn btn-info btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>

                                        @if (!empty($valList->datasurat))
                                            @if ($valList->datasurat->file_surat)
                                                <span>
                                                    <a href="{{ asset('display/' . $valList->datasurat->file_surat) }}"
                                                        target="_BLANK">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </span>
                                            @endif
                                        @else
                                            <span class="badge bg-light-danger text-danger font-medium">Belum Ada
                                                Template Surat</span>
                                        @endif

                                    </td>
                                    <td></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center"><b>Belum Ada Data</b></td>
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

            window.addEventListener('openFileSurat', event => {
                $("#formSurat").modal('show');
            })
            window.addEventListener('closeFileSurat', event => {
                $("#formSurat").modal('hide');
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

            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }
        </script>
    @endpush

    {{-- Form Template --}}
    <div wire:ignore.self class="modal fade" id="formSurat" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header  modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Form Upload File Tanda Tangan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" wire:submit.prevent="upload_template">
                        @csrf
                        <p>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="idKategoriSurat"
                                        name="idKategoriSurat" wire:model.defer="idKategoriSurat">

                                    <div class="mb-3 row">
                                        <label for="template" class="col-sm-4 form-label">Template Surat
                                            <span style="color:red">*</span>
                                            <br>
                                            <small class="form-control-feedback"><span style="font-style: italic">
                                                    <span style="font-size:12px; color:brown">**) FIle docx - Max. 1
                                                        Mb</span>
                                            </small>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input class="form-control @error('filesurat') is-invalid @enderror"
                                                    type="file" id="filesurat{{ $iterfilesurat }}" name="filesurat"
                                                    wire:model="filesurat">
                                                @if (!empty($filesuratOld))
                                                    <p><small class="text-success"><em>File : Sudah Ada</em>
                                                        </small>&nbsp;
                                                        @if ($filesuratOld)
                                                            @php
                                                                $tempUrl = explode('/', $filesuratOld);
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
                                                <div wire:loading wire:target="filesurat">
                                                    <small class="form-text text-muted"><em>Sedang Upload File
                                                            ...</em>
                                                        <div class="progress mt-1">
                                                            <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                                role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 100%"></div>
                                                        </div>
                                                    </small>
                                                </div>
                                                @error('filesurat')
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
                                <div wire:loading.remove wire:target="upload_template">
                                    <button type="submit"
                                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                                </div>
                                <div wire:loading wire:target="upload_template">
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
                    <h4 class="modal-title" id="myLargeModalLabel">View Template</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeView"></button>
                </div>
                <div class="modal-body" style="background: rgb(255, 255, 255)">

                    @if ($url)
                        <div class="col-md-6">
                            <object style="height:240px; width:310px;" data="{{ asset('display/' . $url) }}"
                                type="application/pdf">
                            </object>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
