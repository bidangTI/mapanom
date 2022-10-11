<div>
    <div class="card">
        <div class="card-body border-bottom">
            <h4 class="card-title">Tabel Data Perubahan</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Register</th>
                                <th>Kategori</th>
                                <th>Nama Ormas</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Nomer Surat<br>Tanggal Surat</th>
                                <th>Status Tanda Tangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Perubahan as $Nomer => $PerubahanS)
                                <tr>
                                    <td>{{ $Nomer + 1 }}</td>
                                    <td>{{ $PerubahanS->no_register }}</td>
                                    <td>
                                        @foreach ($Kategori as $Kategoris)
                                            @if ($Kategoris->id == $PerubahanS->ambildata->kategori_id)
                                                @if ($Kategoris->id == 1)
                                                    <span
                                                        class="badge bg-light-info text-info font-medium"><b>{{ $Kategoris->kategori }}</b></span>
                                                @else
                                                    <span
                                                        class="badge bg-light-danger text-danger font-medium"><b>{{ $Kategoris->kategori }}</b></span>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $PerubahanS->nama_ormaspol }} </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($PerubahanS->created_at)->isoFormat('DD-MM-YYYY, HH:mm:ss') }}
                                        <p>
                                            {{-- Ganti Nomor --}}
                                            <button type="button" wire:loading.remove
                                                wire:target="ViewRubahData({{ $PerubahanS->id }})"
                                                class="btn btn-sm px-40 fs-40 font-small me-1"
                                                wire:click="ViewRubahData({{ $PerubahanS->id }})">
                                                <span class="badge bg-light-danger text-danger font-medium">Lihat
                                                    Data</span>
                                            </button>

                                        <div wire:loading wire:target="ViewRubahData({{ $PerubahanS->id }})">
                                            <button class="btn btn-sm px-40 fs-40 font-small me-1" type="button"
                                                disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>
                                        </p>
                                    </td>
                                    <td>
                                        {{ $PerubahanS->datasurat->nomor_surat }}<br>
                                        {{ \Carbon\Carbon::parse($PerubahanS->datasurat->tanggal_surat)->isoFormat('DD-MM-YYYY') }}
                                    </td>
                                    <td>
                                        @if ($PerubahanS->datasurat->status == 'P')
                                            <span
                                                class="badge bg-light-warning text-warning font-medium"><b>Proses</b></span>
                                        @elseif ($PerubahanS->datasurat->status == 'Y')
                                            <span
                                                class="badge bg-light-success text-success font-medium"><b>Selesai</b></span>
                                        @endif
                                    </td>
                                    <td>

                                        @foreach ($SrtKeberadaan as $SrtKeberadaanS)
                                            @if ($SrtKeberadaanS->nomor_surat == null)
                                                {{-- Ambil Nomor --}}
                                                <button type="button" wire:loading.remove
                                                    wire:target="NomorSurat({{ $SrtKeberadaanS->perubahan_id }})"
                                                    class="btn btn-sm px-40 fs-40 font-small me-1"
                                                    wire:click="NomorSurat({{ $SrtKeberadaanS->perubahan_id }})">
                                                    <span class="badge bg-light-danger text-danger font-medium">Ambil
                                                        Nomor</span>
                                                </button>

                                                <div wire:loading
                                                    wire:target="NomorSurat({{ $SrtKeberadaanS->perubahan_id }})">
                                                    <button class="btn btn-sm px-40 fs-40 font-small me-1"
                                                        type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>
                                            @else
                                                {{-- Ganti Nomor --}}
                                                <button type="button" wire:loading.remove
                                                    wire:target="GantiNomorSurat({{ $SrtKeberadaanS->perubahan_id }})"
                                                    class="btn btn-sm px-40 fs-40 font-small me-1"
                                                    wire:click="GantiNomorSurat({{ $SrtKeberadaanS->perubahan_id }})">
                                                    <span class="badge bg-light-danger text-danger font-medium">Ganti
                                                        Nomor</span>
                                                </button>

                                                <div wire:loading
                                                    wire:target="GantiNomorSurat({{ $SrtKeberadaanS->perubahan_id }})">
                                                    <button class="btn btn-sm px-40 fs-40 font-small me-1"
                                                        type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>
                                                {{-- Ajukan TTD --}}
                                                <button type="button" wire:loading.remove
                                                    wire:target="AjukanTTD({{ $SrtKeberadaanS->perubahan_id }})"
                                                    class="btn btn-sm px-40 fs-40 font-small me-1"
                                                    wire:click="AjukanTTD({{ $SrtKeberadaanS->perubahan_id }})">
                                                    <span class="badge bg-light-success text-success font-medium">Ajukan
                                                        Tanda Tangan</span>
                                                </button>
                                                <div wire:loading
                                                    wire:target="AjukanTTD({{ $SrtKeberadaanS->perubahan_id }})">
                                                    <button class="btn btn-sm px-40 fs-40 font-small me-1"
                                                        type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
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

            $(document).ready(function() {
                init();
            });
            $('#tglsurat').on('change', function(e) {
                @this.set('tglsurat', e.target.value);
            });
            window.livewire.hook('message.processed', (message, component) => {
                init();
            });

            function init() {
                $('#tglsurat').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });
            }

            window.addEventListener('openViewFile', event => {
                $("#ModalView").modal('show');
            })
            window.addEventListener('closeViewFile', event => {
                $("#ModalView").modal('hide');
            })

            window.addEventListener('openNomorSurat', event => {
                $("#ModalNomorSurat").modal('show');
            })
            window.addEventListener('closeNomorSurat', event => {
                $("#ModalNomorSurat").modal('hide');
            })

            window.addEventListener('openPerubahan', event => {
                $("#TampilPerubahan").modal('show');
            })
            window.addEventListener('closePerubahan', event => {
                $("#TampilPerubahan").modal('hide');
            })

            window.addEventListener('openViewFile', event => {
                $("#ModalView").modal('show');
            })
            window.addEventListener('closeViewFile', event => {
                $("#ModalView").modal('hide');
            })


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

            window.addEventListener('swal:cek', event => {
                Swal.fire({
                    title: event.detail.message,
                    icon: event.detail.type,
                    confirmButtonColor: '#3085d6'
                });
            });

            window.addEventListener('swal:confirmAjukan', event => {
                Swal.fire({
                        title: event.detail.message,
                        icon: event.detail.type,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('flag', event.detail.id);
                        }
                    });
            });

            window.addEventListener('swal:confirmNoKosong', event => {
                Swal.fire({
                    title: event.detail.message,
                    icon: event.detail.type,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal'
                })
            });
        </script>
    @endpush

    {{-- Nomor Surat --}}
    <div wire:ignore.self class="modal fade" id="ModalNomorSurat" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Form Ambil Nomor</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeNomor"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" wire:submit.prevent="store_nomor"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3 row">
                                    <input type="hidden" class="form-control" id="idSurat" name="idSurat"
                                        wire:model.defer="idSurat" disabled>

                                    <label class="col-sm-4 control-label">Nomor Register<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="noreg" name="noreg"
                                                wire:model.defer="noreg" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-4 control-label">Nomor Surat
                                    </label>
                                    <div class="col-sm-8">

                                        <input type="text"
                                            class="form-control @error('nomorsurat') is-invalid @enderror"
                                            id="nomorsurat" name="nomorsurat" wire:model.defer="nomorsurat"
                                            autocomplete="off">

                                        @error('nomorsurat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-4 control-label">Tanggal Surat<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div wire:ignore>
                                                <span class="input-group-text">
                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                </span>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('tglsurat') is-invalid @enderror"
                                                id="tglsurat" name="tglsurat" data-dtp="dtp_vDWAw"
                                                wire:model.defer="tglsurat">
                                            @error('tglsurat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 border-top">
                            <div class="d-flex">
                                <div wire:loading.remove wire:target="store_nomor">
                                    <button type="submit"
                                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                </div>
                                <div wire:loading wire:target="store_nomor">
                                    <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>

                                {{-- reset --}}
                                {{-- <div wire:loading.remove wire:target="resetNomor">
                                    <button type="button" wire:click="resetNomor"
                                        class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                </div>
                                <div wire:loading wire:target="resetNomor">
                                    <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                        type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Tampil Perubahan --}}
    <div wire:ignore.self class="modal fade" id="TampilPerubahan" tabindex="-1"
        aria-labelledby="bs-example-modal-lg" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Perubahan Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closePerubahan"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="card">
                                <form class="form-horizontal" method="post" wire:submit.prevent=""
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="badge bg-light-warning text-warning font-medium"><b>Data
                                                        Lama</b></span>
                                                <div class="border-bottom"></div><br>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">No Register</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="noreg"
                                                                name="noreg" wire:model.defer="noreg" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">Nama ORMAS</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text"
                                                                class="form-control @error('namaormas') is-invalid @enderror"
                                                                id="namaormas" name="namaormas"
                                                                placeholder="Masukkan Nama ORMAS" autocomplete="off"
                                                                wire:model.defer="namaormas" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">Singkatan
                                                        ORMAS</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text"
                                                                class="form-control @error('singormas') is-invalid @enderror"
                                                                id="singormas" name="singormas"
                                                                placeholder="Masukkan Singkatan ORMAS"
                                                                wire:model.defer="singormas" autocomplete="off"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="border-bottom"></div><br>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">Alamat Kantor</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <textarea class="form-control @error('alamatktr') is-invalid @enderror" name="alamatktr" id="alamatktr"
                                                                wire:model.defer="alamatktr" aria-label="With textarea"
                                                                placeholder="Alamat Kantor Tanpa Kelurahan, Kecamatan, Kota" style="height: 56px; resize: none"
                                                                autocomplete="off" disabled></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-md-3 control-label">Kelurahan</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="kelurahan"
                                                                name="kelurahan" wire:model.defer="kelurahan"
                                                                autocomplete="off" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-md-3 control-label">Kecamatan</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="kecamatan"
                                                                name="kecamatan" wire:model.defer="kecamatan"
                                                                autocomplete="off" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-md-3 control-label">Kota</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select
                                                                class="form-control custom-select @error('kotabaru') is-invalid @enderror"
                                                                style="width: 100%; height:36px;" id="kotabaru"
                                                                name="kotabaru" wire:model="kotabaru"
                                                                autocomplete="off" disabled>
                                                                @if (!empty($datakotaL))
                                                                    <option>{{ $datakotaL->kota }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">No. SK
                                                        KEMENKUMHAM/KEMENDAGRI</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text"
                                                                class="form-control @error('skahu') is-invalid @enderror"
                                                                id="skahu" name="skahu" placeholder="Nomor SK"
                                                                wire:model.defer="skahu" autocomplete="off" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">Tanggal SK</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div wire:ignore>
                                                                <span class="input-group-text">
                                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control @error('tglskahu') is-invalid @enderror"
                                                                id="tglskahu" name="tglskahu" data-dtp="dtp_vDWAw"
                                                                wire:model.defer="tglskahu" autocomplete="off"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">Tahun SK</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text"
                                                                class="form-control @error('tahunahu') is-invalid @enderror"
                                                                id="tahunahu" name="tahunahu" placeholder="Tahun SK"
                                                                onkeypress="return hanyaAngka(event)"
                                                                autocomplete="off" wire:model.defer="tahunahu"
                                                                autocomplete="off" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="skuha" class="col-sm-3 form-label">SK
                                                        KEMENKUM
                                                        HAM/KEMENDAGRI
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            @if (!empty($skuhaOld))
                                                                <p><small class="text-success"><em>File :
                                                                            &nbsp;
                                                                        </em>
                                                                    </small>
                                                                    @if ($skuhaOld)
                                                                        @php
                                                                            $tempUrl = explode('/', $skuhaOld);
                                                                            $folder = $tempUrl[0];
                                                                            $namefile = $tempUrl[1];
                                                                        @endphp

                                                                        <a wire:loading.remove
                                                                            wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                                            wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                                            <i class="fas fa-eye"
                                                                                style="color: blue"></i>
                                                                        </a>
                                                                    @endif
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- DATA BARU --}}

                                            <div class="col-lg-6" @disabled(true)>
                                                <span class="badge bg-light-success text-success font-medium"><b>Data
                                                        Baru</b></span>
                                                <div class="border-bottom"></div><br>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">No Register</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="noreg"
                                                                name="noreg" disabled wire:model.defer="noreg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">Nama ORMAS<span
                                                            style="color:red">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text"
                                                                class="form-control @error('namaormasbaru') is-invalid @enderror"
                                                                id="namaormasbaru" name="namaormasbaru"
                                                                placeholder="Masukkan Nama ORMAS" autocomplete="off"
                                                                wire:model.defer="namaormasbaru" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">Singkatan ORMAS<span
                                                            style="color:red">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text"
                                                                class="form-control @error('singormasbaru') is-invalid @enderror"
                                                                id="singormasbaru" name="singormasbaru"
                                                                placeholder="Masukkan Singkatan ORMAS"
                                                                wire:model.defer="singormasbaru" autocomplete="off"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="border-bottom"></div><br>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">Alamat Kantor<span
                                                            style="color:red">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <textarea class="form-control @error('alamatktrbaru') is-invalid @enderror" name="alamatktrbaru" id="alamatktrbaru"
                                                                wire:model.defer="alamatktrbaru" aria-label="With textarea"
                                                                placeholder="Alamat Kantor Tanpa Kelurahan, Kecamatan, Kota" style="height: 56px; resize: none"
                                                                autocomplete="off" disabled></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-md-3 control-label">Kelurahan<span
                                                            style="color:red">*</span></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select
                                                                class="form-control custom-select @error('kelurahanbaru') is-invalid @enderror"
                                                                style="width: 100%; height:36px;" name="kelurahanbaru"
                                                                id="kelurahanbaru" wire:model.defer="kelurahanbaru"
                                                                autocomplete="off" disabled>
                                                                @if (!empty($datakelurahanv))
                                                                    <option>{{ $datakelurahanv->nama_kelurahan }}
                                                                    </option>
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-md-3 control-label">Kecamatan<span
                                                            style="color:red">*</span></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select
                                                                class="form-control custom-select @error('kecamatanbaru') is-invalid @enderror"
                                                                style="width: 100%; height:36px;" id="kecamatanbaru"
                                                                name="kecamatanbaru" wire:model="kecamatanbaru"
                                                                autocomplete="off" disabled>
                                                                @if (!empty($datakecamatanv))
                                                                    <option>{{ $datakecamatanv->nama_kecamatan }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-md-3 control-label">Kota<span
                                                            style="color:red">*</span></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select
                                                                class="form-control custom-select @error('kotabaru') is-invalid @enderror"
                                                                style="width: 100%; height:36px;" id="kotabaru"
                                                                name="kotabaru" wire:model="kotabaru"
                                                                autocomplete="off" disabled>
                                                                @if (!empty($datakotav))
                                                                    <option>{{ $datakotav->kota }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">No. SK
                                                        KEMENKUMHAM/KEMENDAGRI<span style="color:red">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text"
                                                                class="form-control @error('skahubaru') is-invalid @enderror"
                                                                id="skahubaru" name="skahubaru"
                                                                placeholder="Nomor SK" wire:model.defer="skahubaru"
                                                                autocomplete="off" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">Tanggal SK<span
                                                            style="color:red">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div wire:ignore>
                                                                <span class="input-group-text">
                                                                    <i data-feather="calendar" class="feather-sm"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control @error('tglskahubaru') is-invalid @enderror"
                                                                id="tglskahubaru" name="tglskahubaru"
                                                                data-dtp="dtp_vDWAw" wire:model.defer="tglskahubaru"
                                                                autocomplete="off" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 control-label">Tahun SK<span
                                                            style="color:red">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text"
                                                                class="form-control @error('tahunahubaru') is-invalid @enderror"
                                                                id="tahunahubaru" name="tahunahubaru"
                                                                placeholder="Tahun SK"
                                                                onkeypress="return hanyaAngka(event)"
                                                                wire:model.defer="tahunahubaru" autocomplete="off"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="skuha" class="col-sm-3 form-label">SK
                                                        KEMENKUM
                                                        HAM/KEMENDAGRI</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            @if (!empty($skuhaBaru))
                                                                <p><small class="text-success"><em>File :
                                                                            &nbsp;
                                                                        </em>
                                                                    </small>
                                                                    @if ($skuhaBaru)
                                                                        @php
                                                                            $tempUrl = explode('/', $skuhaBaru);
                                                                            $folder = $tempUrl[0];
                                                                            $namefile = $tempUrl[1];
                                                                        @endphp

                                                                        <a wire:loading.remove
                                                                            wire:target="viewFile('{{ $folder }}',  '{{ $namefile }}')"
                                                                            wire:click="viewFile('{{ $folder }}',  '{{ $namefile }}')">
                                                                            <i class="fas fa-eye"
                                                                                style="color: blue"></i>
                                                                        </a>
                                                                    @endif
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                    <h4 class="modal-title" id="myLargeModalLabel">View Dokumen</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeView"></button>
                </div>
                <div class="modal-body" style="background: rgb(56, 56, 61)">
                    @if ($url)
                        <iframe src="{{ asset('display/' . $url) }}" style="width: 100%; height:800px"></iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
