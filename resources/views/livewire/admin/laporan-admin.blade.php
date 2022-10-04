<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Laporan Semester</h4>
        </div>

        <div class="d-flex border-top title-part-padding align-items-center"></div>

        <div class="table-responsive" style="padding-left: 20px; padding-right: 20px;">
            <div class="d-flex mb-4">
                <a href="{{ route('export_pdf') }}" class="btn btn-danger rounded-pill px-4 waves-effect waves-light me-1" style="align:right;">
                    <i class="fa fa-file-pdf-o"></i> Export PDF</a>
            </div>
            <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ormas</th>
                        <th>Jenis Kegiatan</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!@empty($resData))
                        @forelse ($resData as $Nomer => $res)
                            <tr>
                                <td>{{ $Nomer + 1 }}</td>
                                <td>{{ $res->nama_ormas }}</td>
                                <td>{{ $res->jenis_kegiatan }}</td>
                                <td>{{ $res->semester }}</td>

                                <td>
                                     <div class="d-flex">
                                        {{-- lihat --}}
                                        <button type="button" wire:loading.remove
                                            wire:target="lihat_laporan({{ $res->id }})"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="lihat_laporan({{ $res->id }})"><span
                                                class="badge bg-light-success text-success font-medium">Detail Laporan</span>
                                        </button>
                                        <div wire:loading wire:target="lihat_laporan({{ $res->id }})">
                                            <button class="btn btn-success  btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>

                                        {{-- edit --}}
                                        {{-- <button type="button" wire:loading.remove
                                            wire:target="edit_laporan({{ $res->id }})"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="edit_laporan({{ $res->id }})"><span
                                                class="badge bg-light-warning text-warning font-medium">Edit</span>
                                        </button>
                                        <div wire:loading wire:target="edit_laporan({{ $res->id }})">
                                            <button class="btn btn-warning  btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div> --}}

                                        {{-- delete --}}
                                        {{-- <button type="button" wire:loading.remove
                                            wire:target="confirm_hapus({{ $res->id }})"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="confirm_hapus({{ $res->id }})"><span
                                                class="badge bg-light-danger text-danger font-medium">Hapus</span>
                                        </button>
                                        <div wire:loading wire:target="confirm_hapus({{ $res->id }})">
                                            <button class="btn btn-danger  btn-sm px-40 fs-40 font-small me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div> --}}
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
            window.addEventListener('open_tambah_laporan_modal', event => {
                $("#modal-tambah-laporan").modal('show');
            })
            window.addEventListener('close_tambah_laporan_modal', event => {
                $("#modal-tambah-laporan").modal('hide');
            })
            window.addEventListener('open_lihat_laporan_modal', event => {
                $("#modal-lihat-laporan").modal('show');
            })
            window.addEventListener('close_lihat_laporan_modal', event => {
                $("#modal-lihat-laporan").modal('hide');
            })
            window.addEventListener('open_edit_laporan_modal', event => {
                $('#deskripsi_kegiatanUpdate').summernote('code', $('#deskripsi_kegiatanUpdate').val());
                $("#modal-edit-laporan").modal('show');
            })
            window.addEventListener('close_edit_laporan_modal', event => {
                $("#modal-edit-laporan").modal('hide');
            })


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

            $('#tanggal_mulai').on('change', function(e) {
                @this.set('tanggal_mulai', e.target.value);
            });
            $('#tanggal_selesai').on('change', function(e) {
                @this.set('tanggal_selesai', e.target.value);
            });
            $('#tanggal_mulaiUpdate').on('change', function(e) {
                @this.set('tanggal_mulai', e.target.value);
            });
            $('#tanggal_selesaiUpdate').on('change', function(e) {
                @this.set('tanggal_selesai', e.target.value);
            });

            window.livewire.hook('message.processed', (message, component) => {
                init();
            });

            // After Action
            function init() {

                $('#deskripsi_kegiatan').summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    disableDragAndDrop: true,
                    codeviewFilter: false,
                    codeviewIframeFilter: true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('deskripsi_kegiatan', e);
                        },
                    }
                });

                $('#deskripsi_kegiatanUpdate').summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    disableDragAndDrop: true,
                    codeviewFilter: false,
                    codeviewIframeFilter: true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('deskripsi_kegiatanUpdate', e);
                        },
                    }
                });

                $('#tanggal_mulai').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'YYYY-MM-DD'
                });

                $('#tanggal_selesai').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'YYYY-MM-DD'
                });

                $('#tanggal_mulaiUpdate').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'YYYY-MM-DD'
                });

                $('#tanggal_selesaiUpdate').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'YYYY-MM-DD'
                });
            }

            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }

            // Reset Summernote
            Livewire.on('deskripsi_kegiatan', () => {
                $('#deskripsi_kegiatan').summernote('reset');
            });
            Livewire.on('deskripsi_kegiatanUpdate', () => {
                $('#deskripsi_kegiatanUpdate').summernote('reset');
            });

            
        </script>
    @endpush
    <div wire:ignore.self id="modal-tambah-laporan" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="store_laporan">
                    @csrf
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Tambah Laporan
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        
                        {{-- <div class="mb-12 row">
                            <label class="col-sm-3 control-label">No Register<span style="color:red">*</span></label>
                            <br>

                            <div class="col-sm-9">
                                <div class="input-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" @error('noreg') is-invalid @enderror 
                                            id="noreg" name="noreg" autocomplete="off"
                                                wire:model.defer="noreg">
                                        </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">No Register<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select
                                        class="form-control custom-select @error('selectedNoreg') is-invalid @enderror"
                                        style="width: 100%; height:36px; background-color:#FFFFFF;"
                                        id="selectedNoreg" name="selectedNoreg" wire:model="selectedNoreg"
                                         autocomplete="off">
                                        <option>--- Pilih ---</option>
                                        @foreach ($user as $res)
                                            <option value="{{ $res->no_register }}">{{ $res->no_register }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('selectedNoreg')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            @if (!is_null($dataOrmas))
                            <label class="col-sm-3 control-label">Nama Ormas<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select
                                    class="form-control custom-select @error('selectedNamaormas') is-invalid @enderror"
                                    style="width: 100%; height:36px; background-color:#FFFFFF;"
                                    id="selectedNamaormas" name="selectedNamaormas" wire:model="selectedNamaormas" 
                                     autocomplete="off">
                                    @foreach ($dataOrmas as $res)
                                        <option value="{{ $res->nama_ormaspol }}">{{ $res->nama_ormaspol }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('selectedNamaormas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            {{ $selectedNamaormas }}
                        </div>
                        <br>
                        {{-- <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Nama Ormas<span style="color:red">*</span></label>
                            <br>

                            <div class="col-sm-9">
                                <div class="input-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" @error('nama') is-invalid @enderror 
                                            id="nama" name="nama" autocomplete="off"
                                                wire:model.defer="nama">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <br> --}}

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Jenis Kegiatan<span style="color:red">*</span></label>
                            <br>

                            <div class="col-sm-9">
                                <div class="input-group">
                                    {{-- <input type="hidden" class="form-control" id="sliderID" name="sliderID"
                                        wire:model.defer="sliderID"> --}}
                                    <input type="text" class="form-control @error('jenis_kegiatan') is-invalid @enderror"
                                        id="jenis_kegiatan" name="jenis_kegiatan" wire:model.defer="jenis_kegiatan" autocomplete="off">
                                    @error('jenis_kegiatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Deskripsi<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div wire:ignore>
                                        <input type="hidden" class="form-control" id="laporanID" name="laporanID"
                                            wire:model.defer="laporanID">

                                        <textarea class="summernote @error('deskripsi_kegiatan') is-invalid @enderror" id="deskripsi_kegiatan" name="deskripsi_kegiatan"
                                            wire:model.defer="deskripsi_kegiatan" autocomplete="off">
                                            </textarea>
                                    </div>
                                    @error('deskripsi_kegiatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select
                                        class="form-control custom-select @error('semester') is-invalid @enderror"
                                        style="width: 100%; height:36px; background-color:#FFFFFF;"
                                        id="semester" name="semester"
                                        wire:model.defer="semester" autocomplete="off">
                                        <option>--- Pilih ---</option>
                                            <option value="1">Semester 1</option>
                                            <option value="2">Semester 2</option>
                                    </select>
                                    @error('semester')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Tanggal Mulai<span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                    <div wire:ignore>
                                        <span class="input-group-text">
                                            <i data-feather="calendar" class="feather-sm"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                        id="tanggal_mulai" name="tanggal_mulai" data-dtp="dtp_vDWAw"
                                        wire:model.defer="tanggal_mulai" autocomplete="off">

                                    @error('tanggal_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                             </div>
                        </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Tanggal Selesai<span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                    <div wire:ignore>
                                        <span class="input-group-text">
                                            <i data-feather="calendar" class="feather-sm"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                        id="tanggal_selesai" name="tanggal_selesai" data-dtp="dtp_vDWAw"
                                        wire:model.defer="tanggal_selesai" autocomplete="off">

                                    @error('tanggal_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                        </div>
                        <br> 
                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Dokumentasi<span style="color:red">*</span>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) File jpg, jpeg, png - Max. 512 kb</span>
                                </small>
                            </label>

                            <div class="col-sm-9">
                                <div class="input-group">
                                    {{-- <input type="hidden" class="form-control" id="sliderID" name="sliderID"
                                        wire:model.defer="sliderID"> --}}
                                    <input type="file" class="form-control @error('dokumentasi') is-invalid @enderror"
                                        id="dokumentasi" name="dokumentasi" wire:model.defer="dokumentasi" autocomplete="off">
                                    @error('dokumentasi')
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
                            <div wire:loading.remove wire:target="store_laporan">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="store_laporan">
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
    </div>

    <div wire:ignore.self id="modal-lihat-laporan" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="info-header-modalLabel">Detail Laporan
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td><b>No Register</b></td>
                                <td>{{ $noregUpdate }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama Ormas</b></td>
                                <td>{{ $namaUpdate }}</td>
                            </tr>
                            <tr>
                                <td><b>Jenis Kegiatan</b></td>
                                <td>{{ $jenis_kegiatanUpdate }}</td>
                            </tr>
                            <tr>
                                <td><b>Deskripsi Kegiatan</b></td>
                                <td>{!! $deskripsi_kegiatanUpdate !!}</td>
                            </tr>
                            <tr>
                                <td><b>Semester</b></td>
                                <td>{{ $semesterUpdate }}</td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Mulai</b></td>
                                <td>{{ $tanggal_mulaiUpdate }}</td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Selesai</b></td>
                                <td>{{ $tanggal_selesaiUpdate }}</td>
                            </tr>
                            <tr>
                                <td><b>Dokumentasi</b></td>
                                <td><img src="{{ Storage::url($dokumentasiUpdate) }}" width="615px" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<div wire:ignore.self id="modal-edit-laporan" class="modal fade" tabindex="-1"
        aria-labelledby="info-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form class="form-horizontal" wire:submit.prevent="update_laporan">
                    @csrf
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="info-header-modalLabel">Edit Laporan
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">No Register<span style="color:red">*</span></label>
                            <br>

                            <div class="col-sm-9">
                                <div class="input-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="noregUpdate" name="noregUpdate" disabled
                                                wire:model.defer="noregUpdate">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Nama Ormas<span style="color:red">*</span></label>
                            <br>

                            <div class="col-sm-9">
                                <div class="input-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="namaUpdate" name="namaUpdate" disabled
                                                wire:model.defer="namaUpdate">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Jenis Kegiatan<span style="color:red">*</span></label>
                            <br>

                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="laporanID" name="laporanID"
                                        wire:model.defer="laporanID"> 
                                    <input type="text" class="form-control @error('jenis_kegiatanUpdate') is-invalid @enderror"
                                        id="jenis_kegiatanUpdate" name="jenis_kegiatanUpdate" wire:model.defer="jenis_kegiatanUpdate" autocomplete="off">
                                    @error('jenis_kegiatanUpdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Deskripsi<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div wire:ignore>
                                        <input type="hidden" class="form-control" id="laporanID" name="laporanID"
                                        wire:model.defer="laporanID"> 

                                        <textarea class="summernote @error('deskripsi_kegiatanUpdate') is-invalid @enderror" id="deskripsi_kegiatanUpdate" name="deskripsi_kegiatanUpdate"
                                            wire:model.defer="deskripsi_kegiatanUpdate" autocomplete="off">
                                            </textarea>
                                    </div>
                                    @error('deskripsi_kegiatanUpdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="laporanID" name="laporanID"
                                        wire:model.defer="laporanID"> 
                                    <select
                                        class="form-control custom-select @error('semesterUpdate') is-invalid @enderror"
                                        style="width: 100%; height:36px; background-color:#FFFFFF;"
                                        id="semesterUpdate" name="semesterUpdate"
                                        wire:model.defer="semesterUpdate" autocomplete="off">
                                        <option>--- Pilih ---</option>
                                            <option value="1">Semester 1</option>
                                            <option value="2">Semester 2</option>
                                    </select>
                                    @error('semesterUpdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Tanggal Mulai<span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                    <div wire:ignore>
                                        <input type="hidden" class="form-control" id="laporanID" name="laporanID"
                                        wire:model.defer="laporanID"> 
                                        <span class="input-group-text">
                                            <i data-feather="calendar" class="feather-sm"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('tanggal_mulaiUpdate') is-invalid @enderror"
                                        id="tanggal_mulaiUpdate" name="tanggal_mulaiUpdate" data-dtp="dtp_vDWAw"
                                        wire:model.defer="tanggal_mulaiUpdate" autocomplete="off">

                                    @error('tanggal_mulaiUpdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                             </div>
                        </div>
                        </div>
                        <br>

                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Tanggal Selesai<span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                    <div wire:ignore>
                                        <input type="hidden" class="form-control" id="laporanID" name="laporanID"
                                        wire:model.defer="laporanID"> 
                                        <span class="input-group-text">
                                            <i data-feather="calendar" class="feather-sm"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('tanggal_selesaiUpdate') is-invalid @enderror"
                                        id="tanggal_selesaiUpdate" name="tanggal_selesaiUpdate" data-dtp="dtp_vDWAw"
                                        wire:model.defer="tanggal_selesaiUpdate" autocomplete="off">

                                    @error('tanggal_selesaiUpdate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                        </div>
                        <br> 
                        <div class="mb-12 row">
                            <label class="col-sm-3 control-label">Dokumentasi<span style="color:red">*</span>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) File jpg, jpeg, png - Max. 512 kb</span>
                                </small>
                            </label>

                            <div class="col-sm-9">
                                <div class="input-group">
                                    {{-- <input type="hidden" class="form-control" id="sliderID" name="sliderID"
                                        wire:model.defer="sliderID"> --}}
                                    <input type="file" class="form-control @error('dokumentasiOld') is-invalid @enderror"
                                        id="dokumentasiOld{{ $iterdokumentasi }}" name="dokumentasiOld" wire:model.defer="dokumentasiOld">
                                    @error('dokumentasiOld')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{-- @php
                                        $tempUrl = explode('/', $dokumentasiOld);
                                        $folder = $tempUrl[0];
                                        $namefile = $tempUrl[1];
                                    @endphp

                                    <a wire:loading.remove
                                        wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                        wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                        <i class="fas fa-eye" style="color: blue"></i>
                                                            </a> --}}
                                </div>
                            </div>
                        </div>
                        <br>

                    <div class="d-flex border-top title-part-padding align-items-center"></div>
                    <div class="modal-footer">
                        <div class="d-flex">
                            {{-- submit --}}
                            <div wire:loading.remove wire:target="update_laporan">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="update_laporan">
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
</div>@livewireScripts