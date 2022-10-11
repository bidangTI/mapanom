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
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($Perubahan as $Nomor => $Perubahans)
                                <tr>
                                    <td>{{ $Nomor + 1 }}</td>
                                    <td>{{ $Perubahans->no_register }}</td>
                                    <td>
                                        @foreach ($Kategori as $Kategoris)
                                            @if ($Kategoris->id == $Perubahans->ambildata->kategori_id)
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
                                    <td>{{ $Perubahans->nama_ormaspol }}</td>
                                    <td>{{ \Carbon\Carbon::parse($Perubahans->created_at)->isoFormat('DD-MM-YYYY, HH:mm:ss') }}
                                    </td>
                                    <td>
                                        <button type="button" wire:loading.remove
                                            wire:target="ShowHistori({{ $Perubahans->id }})"
                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                            wire:click="ShowHistori({{ $Perubahans->id }})">
                                            <span class="badge bg-light-warning text-warning font-medium">Histori</span>
                                        </button>

                                        <div wire:loading wire:target="ShowHistori({{ $Perubahans->id }})">
                                            <button class="btn btn-sm px-40 fs-40 font-small me-1" type="button"
                                                disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center"><b>Belum Ada Data</b></td>
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
            window.addEventListener('OpenHistory', event => {
                $("#ModalHistory").modal('show');
            })
            window.addEventListener('CloseHistory', event => {
                $("#ModalHistory").modal('hide');
                // location.reload();
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

            window.addEventListener('swal:confirmDelete', event => {
                Swal.fire({
                        title: event.detail.message,
                        icon: event.detail.type,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('deleteRubah', event.detail.id);
                        }
                    });
            });
        </script>
    @endpush

    {{-- IFRAME VIEW --}}
    <div wire:ignore.self class="modal fade" id="ModalHistory" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true">

        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">View Histori</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="CloseHistory"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <div class="card">
                                        <div class="card-body border-bottom">
                                            <h4 class="card-title">Form Perubahan Data</h4>
                                        </div>
                                        <form class="form-horizontal" method="post" wire:submit.prevent="store"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <input type="hidden" class="form-control" id="idPerubahan"
                                                        name="idPerubahan" wire:model.defer="idPerubahan" disabled>
                                                    <div class="col-lg-6">
                                                        <span
                                                            class="badge bg-light-warning text-warning font-medium"><b>Data
                                                                Lama</b></span>
                                                        <div class="border-bottom"></div><br>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 control-label">No Register</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        id="noreg" name="noreg"
                                                                        wire:model.defer="noreg" disabled>
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
                                                                        placeholder="Masukkan Nama ORMAS"
                                                                        autocomplete="off" wire:model.defer="namaormas"
                                                                        disabled>
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
                                                            <label class="col-md-3 control-label">Kecamatan</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <select
                                                                        class="form-control custom-select @error('kecamatan') is-invalid @enderror"
                                                                        style="width: 100%; height:36px;"
                                                                        id="kecamatan" name="kecamatan"
                                                                        wire:model="kecamatan" autocomplete="off"
                                                                        disabled>
                                                                        <option>{{ $kecamatan }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label class="col-md-3 control-label">Kelurahan</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <select
                                                                        class="form-control custom-select @error('kelurahan') is-invalid @enderror"
                                                                        style="width: 100%; height:36px;"
                                                                        name="kelurahan" id="kelurahan"
                                                                        wire:model.defer="kelurahan"
                                                                        autocomplete="off" disabled>
                                                                        <option>{{ $kelurahan }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label class="col-md-3 control-label">Kota</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <select
                                                                        class="form-control custom-select @error('kota') is-invalid @enderror"
                                                                        style="width: 100%; height:36px;"
                                                                        id="kota" name="kota"
                                                                        wire:model="kota" autocomplete="off" disabled>
                                                                        <option>{{ $kota }}</option>
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
                                                                        id="skahu" name="skahu"
                                                                        placeholder="Nomor SK"
                                                                        wire:model.defer="skahu" autocomplete="off"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 control-label">Tanggal SK</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <div wire:ignore>
                                                                        <span class="input-group-text">
                                                                            <i data-feather="calendar"
                                                                                class="feather-sm"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control @error('tglskahu') is-invalid @enderror"
                                                                        id="tglskahu" name="tglskahu"
                                                                        data-dtp="dtp_vDWAw"
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
                                                                        id="tahunahu" name="tahunahu"
                                                                        placeholder="Tahun SK"
                                                                        onkeypress="return hanyaAngka(event)"
                                                                        autocomplete="off" wire:model.defer="tahunahu"
                                                                        autocomplete="off" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="skuha" class="col-sm-3 form-label">SK
                                                                KEMENKUM HAM/KEMENDAGRI
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
                                                    <div class="col-lg-6">
                                                        <span
                                                            class="badge bg-light-success text-success font-medium"><b>Data
                                                                Baru</b></span>
                                                        <div class="border-bottom"></div><br>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 control-label">No Register</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        id="noreg" name="noreg" disabled
                                                                        wire:model.defer="noreg">
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
                                                                        placeholder="Masukkan Nama ORMAS"
                                                                        autocomplete="off"
                                                                        wire:model.defer="namaormasbaru" disabled>
                                                                    @error('namaormasbaru')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
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
                                                                        wire:model.defer="singormasbaru"
                                                                        autocomplete="off" disabled>
                                                                    @error('singormasbaru')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
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
                                                                    @error('alamatktrbaru')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
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
                                                                        style="width: 100%; height:36px;"
                                                                        id="kecamatanbaru" name="kecamatanbaru"
                                                                        wire:model.defer="kecamatanbaru"
                                                                        autocomplete="off" disabled>
                                                                        <option>{{ $kecamatanbaru }}</option>
                                                                    </select>
                                                                    @error('kecamatanbaru')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
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
                                                                        style="width: 100%; height:36px;"
                                                                        name="kelurahanbaru" id="kelurahanbaru"
                                                                        wire:model.defer="kelurahanbaru"
                                                                        autocomplete="off" disabled>
                                                                        <option>{{ $kelurahanbaru }}</option>
                                                                    </select>
                                                                    @error('kelurahanbaru')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
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
                                                                        style="width: 100%; height:36px;"
                                                                        id="kotabaru" name="kotabaru"
                                                                        wire:model="kotabaru" autocomplete="off"
                                                                        disabled>
                                                                        <option>{{ $kotabaru }}</option>
                                                                    </select>
                                                                    @error('kotabaru')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 control-label">No. SK
                                                                KEMENKUMHAM/KEMENDAGRI<span
                                                                    style="color:red">*</span></label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <input type="text"
                                                                        class="form-control @error('skahubaru') is-invalid @enderror"
                                                                        id="skahubaru" name="skahubaru"
                                                                        placeholder="Nomor SK"
                                                                        wire:model.defer="skahubaru"
                                                                        autocomplete="off" disabled>
                                                                    @error('skahubaru')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
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
                                                                            <i data-feather="calendar"
                                                                                class="feather-sm"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control @error('tglskahubaru') is-invalid @enderror"
                                                                        id="tglskahubaru" name="tglskahubaru"
                                                                        data-dtp="dtp_vDWAw"
                                                                        wire:model.defer="tglskahubaru"
                                                                        autocomplete="off" disabled>
                                                                    @error('tglskahubaru')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
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
                                                                        wire:model.defer="tahunahubaru"
                                                                        autocomplete="off" disabled>
                                                                    @error('tahunahubaru')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="skuha" class="col-sm-3 form-label">SK
                                                                KEMENKUM HAM/KEMENDAGRI</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    @if (!empty($skuhaBaru))
                                                                        <p><small class="text-success"><em>File :
                                                                                    &nbsp;
                                                                                </em>
                                                                            </small>
                                                                            @if ($skuhaBaru)
                                                                                @php
                                                                                    $tempUrlBaru = explode('/', $skuhaBaru);
                                                                                    $folderBaru = $tempUrlBaru[0];
                                                                                    $namefileBaru = $tempUrlBaru[1];
                                                                                @endphp

                                                                                <a wire:loading.remove
                                                                                    wire:target="viewFile('{{ $folderBaru }}',  '{{ $namefileBaru }}')"
                                                                                    wire:click="viewFile('{{ $folderBaru }}',  '{{ $namefileBaru }}')">
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
                                                <div class="p-3 border-top">
                                                    <div class="d-flex">
                                                        <button type="button" wire:loading.remove wire:target="store"
                                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                                            wire:click="store"><span
                                                                class="btn btn-danger rounded-pill px-4 waves-effect waves-light me-1">Setujui
                                                                Perubahan Data</span>
                                                        </button>
                                                        <div wire:loading wire:target="store">
                                                            <button
                                                                class="btn btn-warning rounded-pill px-4 waves-effect waves-light me-1"
                                                                type="button" disabled>
                                                                <span class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                                Loading...
                                                            </button>
                                                        </div>&nbsp;

                                                        <button type="button" wire:loading.remove
                                                            wire:target="confirmBatal({{ $idPerubahan }})"
                                                            class="btn btn-sm px-40 fs-40 font-small me-1"
                                                            wire:click="confirmBatal({{ $idPerubahan }})"><span
                                                                class="btn btn-warning rounded-pill px-4 waves-effect waves-light me-1">Tolak</span>
                                                        </button>
                                                        <div wire:loading
                                                            wire:target="confirmBatal({{ $idPerubahan }})">
                                                            <button
                                                                class="btn btn-warning rounded-pill px-4 waves-effect waves-light me-1"
                                                                type="button" disabled>
                                                                <span class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                                Loading...
                                                            </button>
                                                        </div>

                                                        <div
                                                            class="d-flex align-items-center font-medium me-3 me-md-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-info text-danger fill-white feather-sm me-2">
                                                                <circle cx="12" cy="12" r="10">
                                                                </circle>
                                                                <line x1="12" y1="16" x2="12"
                                                                    y2="12"></line>
                                                                <line x1="12" y1="8" x2="12"
                                                                    y2="8"></line>
                                                            </svg>
                                                            Permohonan Perubahan Menunggu Proses Verifikasi
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
        </div>
    </div>

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
                        <object data="{{ asset('display/' . $url) }}" type="application/pdf" class="modal-content"
                            style="width: 100%; height:800px">
                        </object>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
