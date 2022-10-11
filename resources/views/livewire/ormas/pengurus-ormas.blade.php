<div>
    @foreach ($dataPermohonan as $value)
        @if (!empty($value->no_register))
            <form class="mt-4" method="post" wire:submit.prevent="store_all" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="mb-1 row">
                                    <label class="col-sm-1 control-label">No Register</label>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="noreg" name="noreg"
                                                disabled wire:model.defer="noreg">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        @foreach ($dataPermohonan as $value)
                                            @if ($value->permohonan_id != 1 && $value->status_pengurus == 'Y' && $value->notifikasi_kirim == 'N')
                                            @elseif ($value->permohonan_id == 1 && (empty($value->status_pengurus) && empty($value->notifikasi_kirim)))
                                                <div class="d-flex">
                                                    {{-- submit --}}
                                                    <div wire:loading.remove wire:target="store_all">
                                                        <button type="submit"
                                                            class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                                    </div>
                                                    <div wire:loading wire:target="store_all">
                                                        <button
                                                            class="btn btn-info rounded-pill px-2 waves-effect waves-light me-1"
                                                            type="button" disabled>
                                                            <span class="spinner-border spinner-border-sm"
                                                                role="status" aria-hidden="true"></span>
                                                            Loading...
                                                        </button>
                                                    </div>

                                                    {{-- reset --}}
                                                    <div wire:loading.remove wire:target="resetLainnya">
                                                        <button type="button" wire:click="resetLainnya"
                                                            class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                                    </div>
                                                    <div wire:loading wire:target="resetLainnya">
                                                        <button
                                                            class="btn btn-dark rounded-pill px-2 waves-effect waves-light"
                                                            type="button" disabled>
                                                            <span class="spinner-border spinner-border-sm"
                                                                role="status" aria-hidden="true"></span>
                                                            Loading...
                                                        </button>
                                                    </div>
                                                </div>
                                            @elseif ($value->permohonan_id != 1 && $value->status_pengurus == 'N' && $value->notifikasi_kirim == 'Y')
                                                <div class="d-flex">
                                                    {{-- submit --}}
                                                    <div wire:loading.remove wire:target="store_all">
                                                        <button type="submit"
                                                            class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                                    </div>
                                                    <div wire:loading wire:target="store_all">
                                                        <button
                                                            class="btn btn-info rounded-pill px-2 waves-effect waves-light me-1"
                                                            type="button" disabled>
                                                            <span class="spinner-border spinner-border-sm"
                                                                role="status" aria-hidden="true"></span>
                                                            Loading...
                                                        </button>
                                                    </div>

                                                    {{-- reset --}}
                                                    <div wire:loading.remove wire:target="resetLainnya">
                                                        <button type="button" wire:click="resetLainnya"
                                                            class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                                    </div>
                                                    <div wire:loading wire:target="resetLainnya">
                                                        <button
                                                            class="btn btn-dark rounded-pill px-2 waves-effect waves-light"
                                                            type="button" disabled>
                                                            <span class="spinner-border spinner-border-sm"
                                                                role="status" aria-hidden="true"></span>
                                                            Loading...
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-12">
                        @if ($statuspengurus == 'N' && $notifkirim == 'Y')
                            <div class="alert customize-alert alert-dismissible border-danger text-danger fade show remove-close-icon"
                                role="alert">
                                <div class="d-flex align-items-center font-medium me-3 me-md-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-info text-danger fill-white feather-sm me-2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12" y2="8"></line>
                                    </svg>
                                    Catatan Perbaikan :
                                </div>

                                @if ($verifikasi_ketua == 0 || $file_ktp_v_ketua == 0 || $file_foto_v_ketua == 0 || $file_cv_v_ketua == 0)
                                    Ketua : {{ $ketverifikasi_ketua }}<br>
                                @endif

                                @if ($verifikasi_sekretaris == 0 ||
                                    $file_ktp_v_sekretaris == 0 ||
                                    $file_foto_v_sekretaris == 0 ||
                                    $file_cv_v_sekretaris == 0)
                                    Sekretaris : {{ $ketverifikasi_sekretaris }}<br>
                                @endif

                                @if ($verifikasi_bendahara == 0 ||
                                    $file_ktp_v_bendahara == 0 ||
                                    $file_foto_v_bendahara == 0 ||
                                    $file_cv_v_bendahara == 0)
                                    Bendahara : {{ $ketverifikasi_bendahara }}<br>
                                @endif

                                @if ($verifikasi_pendiri == 0)
                                    Pendiri : {{ $ketverifikasi_pendiri }}<br>
                                @endif

                                @if ($verifikasi_pembina == 0)
                                    Pembina : {{ $ketverifikasi_pembina }}<br>
                                @endif

                                @if ($verifikasi_penasihat == 0)
                                    Penasihat : {{ $ketverifikasi_penasihat }}
                                @endif
                            </div>
                        @elseif ($statuspengurus == 'Y')
                            <div class="alert customize-alert alert-dismissible border-success text-success fade show remove-close-icon"
                                role="alert">
                                <div class="d-flex align-items-center font-medium me-3 me-md-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-info text-success fill-white feather-sm me-2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12" y2="8"></line>
                                    </svg>
                                    Catatan : Disetujui
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="border-bottom title-part-padding">
                                <h4 class="card-title mb-0">Ketua</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-3 control-label">Nama
                                        <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi_ketua == 1 || $statuspengurus == 'Y')
                                                <input type="text"
                                                    class="form-control @error('namaketua') is-invalid @enderror"
                                                    id="namaketua" name="namaketua" placeholder="Nama Ketua"
                                                    wire:model.defer="namaketua" autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('namaketua') is-invalid @enderror"
                                                    id="namaketua" name="namaketua" placeholder="Nama Ketua"
                                                    wire:model.defer="namaketua" autocomplete="off">
                                                @error('namaketua')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">NIK
                                        <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi_ketua == 1 || $statuspengurus == 'Y')
                                                <input type="text"
                                                    class="form-control @error('nikketua') is-invalid @enderror"
                                                    id="nikketua" name="nikketua" placeholder="NIK Ketua"
                                                    onkeypress="return hanyaAngka(event)" autocomplete="off"
                                                    wire:model.defer="nikketua" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('nikketua') is-invalid @enderror"
                                                    id="nikketua" name="nikketua" placeholder="NIK Ketua"
                                                    onkeypress="return hanyaAngka(event)" autocomplete="off"
                                                    wire:model.defer="nikketua">
                                                @error('nikketua')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Masa Bakti
                                        <span style="color:red">*</span></label>
                                    <div class="col-lg-9">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                @if ($verifikasi_ketua == 1 || $statuspengurus == 'Y')
                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('awalketua') is-invalid @enderror"
                                                        id="awalketua" name="awalketua" placeholder="Tanggal Awal"
                                                        data-dtp="dtp_vDWAw" wire:model.defer="awalketua" disabled>
                                                    <span
                                                        style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('akhirketua') is-invalid @enderror"
                                                        id="akhirketua" name="akhirketua" placeholder="Tanggal Akhir"
                                                        data-dtp="dtp_vDWAw" wire:model.defer="akhirketua" disabled>
                                                @else
                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('awalketua') is-invalid @enderror"
                                                        id="awalketua" name="awalketua" placeholder="Tanggal Awal"
                                                        data-dtp="dtp_vDWAw" wire:model.defer="awalketua">
                                                    @error('awalketua')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                    <span
                                                        style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('akhirketua') is-invalid @enderror"
                                                        id="akhirketua" name="akhirketua" placeholder="Tanggal Akhir"
                                                        data-dtp="dtp_vDWAw" wire:model.defer="akhirketua">
                                                    @error('akhirketua')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                        @if (!empty($value->ketua->verifikasi))
                                        @elseif ($value->ketua->verifikasi == 0 && $notifkirim == 'Y')
                                            <div class="spinner-grow text-danger" style="height: 0.9em; width:0.9em"
                                                role="status">
                                                <span class="visually-hidden"></span>
                                            </div>
                                            <span style="font-style: italic; color:red">
                                                Silahkan Perbaiki Data ...
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Upload KTP
                                        <span style="color:red">*</span>
                                        <br>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                                    kb</span>
                                        </small>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            @foreach ($dataPermohonan as $value)
                                                @if ($value->permohonan_id != 1)
                                                    @if ($value->ketua->file_ktp_v == 1)
                                                        <input
                                                            class="form-control @error('ktpketua') is-invalid @enderror"
                                                            type="file" id="ktpketua{{ $iterKtpKetua }}"
                                                            name="ktpketua" placeholder="KTP Ketua"
                                                            wire:model="ktpketua" disabled>
                                                        @if (!empty($ktpketuaOld))
                                                            <div class="row">
                                                                <p>
                                                                    <small class="text-success">
                                                                        <em>File KTP : Sudah Ada</em>
                                                                    </small>
                                                                    @if ($ktpketuaOld)
                                                                        @php
                                                                            $tempUrl = explode('/', $ktpketuaOld);
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
                                                            </div>
                                                        @endif
                                                    @elseif ($value->ketua->file_ktp_v == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('ktpketua') is-invalid @enderror"
                                                            type="file" id="ktpketua{{ $iterKtpKetua }}"
                                                            name="ktpketua" placeholder="KTP Ketua"
                                                            wire:model="ktpketua">
                                                        @if (!empty($ktpketuaOld))
                                                            <div class="row">
                                                                <p>
                                                                    <small class="text-success">
                                                                        <em>File KTP : Sudah Ada</em>
                                                                    </small>
                                                                    @if ($ktpketuaOld)
                                                                        @php
                                                                            $tempUrl = explode('/', $ktpketuaOld);
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
                                                            </div>
                                                        @endif
                                                    @elseif ($value->ketua->file_ktp_v == 0 && ($notifkirim == 'N' || $notifkirim == ''))
                                                        <input
                                                            class="form-control @error('ktpketua') is-invalid @enderror"
                                                            type="file" id="ktpketua{{ $iterKtpKetua }}"
                                                            name="ktpketua" placeholder="KTP Ketua"
                                                            wire:model="ktpketua" disabled>
                                                        @if (!empty($ktpketuaOld))
                                                            <div class="row">
                                                                <p>
                                                                    <small class="text-success">
                                                                        <em>File KTP : Sudah Ada</em>
                                                                    </small>
                                                                    @if ($ktpketuaOld)
                                                                        @php
                                                                            $tempUrl = explode('/', $ktpketuaOld);
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
                                                            </div>
                                                        @endif
                                                    @endif
                                                @else
                                                    <input
                                                        class="form-control @error('ktpketua') is-invalid @enderror"
                                                        type="file" id="ktpketua{{ $iterKtpKetua }}"
                                                        name="ktpketua" placeholder="KTP Ketua"
                                                        wire:model="ktpketua">
                                                    <div wire:loading wire:target="ktpketua">
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
                                                    @error('ktpketua')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($ktpketuaOld))
                                                        <div class="row">
                                                            <p>
                                                                <small class="text-success">
                                                                    <em>File KTP : Sudah Ada</em>
                                                                </small>
                                                                @if ($ktpketuaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $ktpketuaOld);
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
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Upload Foto
                                        <span style="color:red">*</span>
                                        <br>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                                    kb</span>
                                        </small>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            @foreach ($dataPermohonan as $value)
                                                @if ($value->permohonan_id != 1)
                                                    @if ($value->ketua->file_foto_v == 1)
                                                        <input
                                                            class="form-control @error('fotoketua') is-invalid @enderror"
                                                            type="file" id="fotoketua{{ $iterFotoKetua }}"
                                                            name="fotoketua" placeholder="Foto Ketua"
                                                            wire:model="fotoketua" disabled>
                                                        @if (!empty($fotoketuaOld))
                                                            <p><small class="text-success"><em>File Foto : Sudah
                                                                        Ada</em></small>
                                                                @if ($fotoketuaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotoketuaOld);
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
                                                    @elseif ($value->ketua->file_foto_v == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('fotoketua') is-invalid @enderror"
                                                            type="file" id="fotoketua{{ $iterFotoKetua }}"
                                                            name="fotoketua" placeholder="Foto Ketua"
                                                            wire:model="fotoketua">
                                                        @if (!empty($fotoketuaOld))
                                                            <p><small class="text-success"><em>File Foto : Sudah
                                                                        Ada</em></small>
                                                                @if ($fotoketuaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotoketuaOld);
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
                                                    @elseif ($value->ketua->file_foto_v == 0 && ($notifkirim == 'N' || $notifkirim == ''))
                                                        <input
                                                            class="form-control @error('fotoketua') is-invalid @enderror"
                                                            type="file" id="fotoketua{{ $iterFotoKetua }}"
                                                            name="fotoketua" placeholder="Foto Ketua"
                                                            wire:model="fotoketua" disabled>
                                                        @if (!empty($fotoketuaOld))
                                                            <p><small class="text-success"><em>File Foto : Sudah
                                                                        Ada</em></small>
                                                                @if ($fotoketuaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotoketuaOld);
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
                                                    <input
                                                        class="form-control @error('fotoketua') is-invalid @enderror"
                                                        type="file" id="fotoketua{{ $iterFotoKetua }}"
                                                        name="fotoketua" placeholder="Foto Ketua"
                                                        wire:model="fotoketua">

                                                    <div wire:loading wire:target="fotoketua">
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
                                                    @error('fotoketua')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($fotoketuaOld))
                                                        <p><small class="text-success"><em>File Foto : Sudah
                                                                    Ada</em></small>
                                                            @if ($fotoketuaOld)
                                                                @php
                                                                    $tempUrl = explode('/', $fotoketuaOld);
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Upload Daftar Riwayat Hidup
                                        <span style="color:red">*</span>
                                        <br>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                                    kb</span>
                                        </small>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            @foreach ($dataPermohonan as $value)
                                                @if ($value->permohonan_id != 1)
                                                    @if ($value->ketua->file_cv_v == 1)
                                                        <input
                                                            class="form-control @error('cvketua') is-invalid @enderror"
                                                            type="file" id="cvketua {{ $iterCvKetua }}"
                                                            name="cvketua" placeholder="CV Ketua"
                                                            wire:model="cvketua" disabled>
                                                        @if (!empty($cvketuaOld))
                                                            <p><small class="text-success"><em>File CV : Sudah
                                                                        Ada</em></small>
                                                                @if ($cvketuaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $cvketuaOld);
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
                                                    @elseif ($value->ketua->file_cv_v == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('cvketua') is-invalid @enderror"
                                                            type="file" id="cvketua {{ $iterCvKetua }}"
                                                            name="cvketua" placeholder="CV Ketua"
                                                            wire:model="cvketua">
                                                        @if (!empty($cvketuaOld))
                                                            <p><small class="text-success"><em>File CV : Sudah
                                                                        Ada</em></small>
                                                                @if ($cvketuaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $cvketuaOld);
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
                                                    @elseif ($value->ketua->file_cv_v == 0 && ($notifkirim == 'N' || $notifkirim == ''))
                                                        <input
                                                            class="form-control @error('cvketua') is-invalid @enderror"
                                                            type="file" id="cvketua {{ $iterCvKetua }}"
                                                            name="cvketua" placeholder="CV Ketua"
                                                            wire:model="cvketua" disabled>
                                                        @if (!empty($cvketuaOld))
                                                            <p><small class="text-success"><em>File CV : Sudah
                                                                        Ada</em></small>
                                                                @if ($cvketuaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $cvketuaOld);
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
                                                    <input class="form-control @error('cvketua') is-invalid @enderror"
                                                        type="file" id="cvketua {{ $iterCvKetua }}"
                                                        name="cvketua" placeholder="CV Ketua" wire:model="cvketua">

                                                    <div wire:loading wire:target="cvketua">
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
                                                    @error('cvketua')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($cvketuaOld))
                                                        <p><small class="text-success"><em>File CV : Sudah
                                                                    Ada</em></small>
                                                            @if ($cvketuaOld)
                                                                @php
                                                                    $tempUrl = explode('/', $cvketuaOld);
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="border-bottom title-part-padding">
                                <h4 class="card-title mb-0">Sekretaris</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-3 control-label">Nama
                                        <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi_sekretaris == 1 || $statuspengurus == 'Y')
                                                <input type="text"
                                                    class="form-control @error('namasekretaris') is-invalid @enderror"
                                                    id="namasekretaris" name="namasekretaris"
                                                    placeholder="Nama Sekretaris" wire:model.defer="namasekretaris"
                                                    autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('namasekretaris') is-invalid @enderror"
                                                    id="namasekretaris" name="namasekretaris"
                                                    placeholder="Nama Sekretaris" wire:model.defer="namasekretaris"
                                                    autocomplete="off">
                                                @error('namasekretaris')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">NIK
                                        <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi_sekretaris == 1 || $statuspengurus == 'Y')
                                                <input type="text"
                                                    class="form-control @error('niksekretaris') is-invalid @enderror"
                                                    id="niksekretaris" name="niksekretaris"
                                                    placeholder="NIK Sekretaris" onkeypress="return hanyaAngka(event)"
                                                    autocomplete="off" wire:model.defer="niksekretaris" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('niksekretaris') is-invalid @enderror"
                                                    id="niksekretaris" name="niksekretaris"
                                                    placeholder="NIK Sekretaris" onkeypress="return hanyaAngka(event)"
                                                    autocomplete="off" wire:model.defer="niksekretaris">
                                                @error('niksekretaris')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Masa Bakti
                                        <span style="color:red">*</span></label>
                                    <div class="col-lg-9">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                @if ($verifikasi_sekretaris == 1 || $statuspengurus == 'Y')
                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('awalsekretaris') is-invalid @enderror"
                                                        id="awalsekretaris" name="awalsekretaris"
                                                        placeholder="Tanggal Awal" data-dtp="dtp_vDWAw"
                                                        wire:model.defer="awalsekretaris" disabled>
                                                    <span
                                                        style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('akhirsekretaris') is-invalid @enderror"
                                                        id="akhirsekretaris" name="akhirsekretaris"
                                                        placeholder="Tanggal Akhir" data-dtp="dtp_vDWAw"
                                                        wire:model.defer="akhirsekretaris" disabled>
                                                @else
                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('awalsekretaris') is-invalid @enderror"
                                                        id="awalsekretaris" name="awalsekretaris"
                                                        placeholder="Tanggal Awal" data-dtp="dtp_vDWAw"
                                                        wire:model.defer="awalsekretaris">
                                                    @error('awalsekretaris')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                    <span
                                                        style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('akhirsekretaris') is-invalid @enderror"
                                                        id="akhirsekretaris" name="akhirsekretaris"
                                                        placeholder="Tanggal Akhir" data-dtp="dtp_vDWAw"
                                                        wire:model.defer="akhirsekretaris">
                                                    @error('akhirsekretaris')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                        @if (!empty($value->sekretaris->verifikasi))
                                        @elseif ($value->sekretaris->verifikasi == 0 && $notifkirim == 'Y')
                                            <div class="spinner-grow text-danger" style="height: 0.9em; width:0.9em"
                                                role="status">
                                                <span class="visually-hidden"></span>
                                            </div>
                                            <span style="font-style: italic; color:red">
                                                Silahkan Perbaiki Data ...
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Upload KTP
                                        <span style="color:red">*</span>
                                        <br>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                                    kb</span>
                                        </small>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            @foreach ($dataPermohonan as $value)
                                                @if ($value->permohonan_id != 1)
                                                    @if ($value->sekretaris->file_ktp_v == 1)
                                                        <input
                                                            class="form-control @error('ktpsekretaris') is-invalid @enderror"
                                                            type="file" id="ktpsekretaris{{ $iterKtpSekretaris }}"
                                                            name="ktpsekretaris" placeholder="KTP sekretaris"
                                                            wire:model="ktpsekretaris" disabled>
                                                        @if (!empty($ktpsekretarisOld))
                                                            <p><small class="text-success"><em>File KTP : Sudah
                                                                        Ada</em></small>
                                                                @if ($ktpsekretarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $ktpsekretarisOld);
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
                                                    @elseif ($value->sekretaris->file_ktp_v == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('ktpsekretaris') is-invalid @enderror"
                                                            type="file" id="ktpsekretaris{{ $iterKtpSekretaris }}"
                                                            name="ktpsekretaris" placeholder="KTP sekretaris"
                                                            wire:model="ktpsekretaris">
                                                        @if (!empty($ktpsekretarisOld))
                                                            <p><small class="text-success"><em>File KTP : Sudah
                                                                        Ada</em></small>
                                                                @if ($ktpsekretarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $ktpsekretarisOld);
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
                                                    @elseif ($value->sekretaris->file_ktp_v == 0 && ($notifkirim == 'N' || $notifkirim == ''))
                                                        <input
                                                            class="form-control @error('ktpsekretaris') is-invalid @enderror"
                                                            type="file" id="ktpsekretaris{{ $iterKtpSekretaris }}"
                                                            name="ktpsekretaris" placeholder="KTP sekretaris"
                                                            wire:model="ktpsekretaris" disabled>
                                                        @if (!empty($ktpsekretarisOld))
                                                            <p><small class="text-success"><em>File KTP : Sudah
                                                                        Ada</em></small>
                                                                @if ($ktpsekretarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $ktpsekretarisOld);
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
                                                    <input
                                                        class="form-control @error('ktpsekretaris') is-invalid @enderror"
                                                        type="file" id="ktpsekretaris{{ $iterKtpSekretaris }}"
                                                        name="ktpsekretaris" placeholder="KTP sekretaris"
                                                        wire:model="ktpsekretaris">
                                                    <div wire:loading wire:target="ktpsekretaris">
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
                                                    @error('ktpsekretaris')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($ktpsekretarisOld))
                                                        <p><small class="text-success"><em>File KTP : Sudah
                                                                    Ada</em></small>
                                                            @if ($ktpsekretarisOld)
                                                                @php
                                                                    $tempUrl = explode('/', $ktpsekretarisOld);
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Upload Foto
                                        <span style="color:red">*</span>
                                        <br>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                                    kb</span>
                                        </small>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            @foreach ($dataPermohonan as $value)
                                                @if ($value->permohonan_id != 1)
                                                    @if ($value->sekretaris->file_foto_v == 1)
                                                        <input
                                                            class="form-control @error('fotosekretaris') is-invalid @enderror"
                                                            type="file"
                                                            id="fotosekretaris{{ $iterFotoSekretaris }}"
                                                            name="fotosekretaris" placeholder="Foto sekretaris"
                                                            wire:model="fotosekretaris" disabled>
                                                        @if (!empty($fotosekretarisOld))
                                                            <p><small class="text-success"><em>File Foto : Sudah
                                                                        Ada</em></small>
                                                                @if ($fotosekretarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotosekretarisOld);
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
                                                    @elseif ($value->sekretaris->file_foto_v == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('fotosekretaris') is-invalid @enderror"
                                                            type="file"
                                                            id="fotosekretaris{{ $iterFotoSekretaris }}"
                                                            name="fotosekretaris" placeholder="Foto sekretaris"
                                                            wire:model="fotosekretaris">
                                                        @if (!empty($fotosekretarisOld))
                                                            <p><small class="text-success"><em>File Foto : Sudah
                                                                        Ada</em></small>
                                                                @if ($fotosekretarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotosekretarisOld);
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
                                                    @elseif ($value->sekretaris->file_foto_v == 0 && ($notifkirim == 'N' || $notifkirim == ''))
                                                        <input
                                                            class="form-control @error('fotosekretaris') is-invalid @enderror"
                                                            type="file"
                                                            id="fotosekretaris{{ $iterFotoSekretaris }}"
                                                            name="fotosekretaris" placeholder="Foto sekretaris"
                                                            wire:model="fotosekretaris" disabled>
                                                        @if (!empty($fotosekretarisOld))
                                                            <p><small class="text-success"><em>File Foto : Sudah
                                                                        Ada</em></small>
                                                                @if ($fotosekretarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotosekretarisOld);
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
                                                    <input
                                                        class="form-control @error('fotosekretaris') is-invalid @enderror"
                                                        type="file" id="fotosekretaris{{ $iterFotoSekretaris }}"
                                                        name="fotosekretaris" placeholder="Foto sekretaris"
                                                        wire:model="fotosekretaris">

                                                    <div wire:loading wire:target="fotosekretaris">
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
                                                    @error('fotosekretaris')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($fotosekretarisOld))
                                                        <p><small class="text-success"><em>File Foto : Sudah
                                                                    Ada</em></small>
                                                            @if ($fotosekretarisOld)
                                                                @php
                                                                    $tempUrl = explode('/', $fotosekretarisOld);
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Upload Daftar Riwayat Hidup
                                        <span style="color:red">*</span>
                                        <br>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                                    kb</span>
                                        </small>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            @foreach ($dataPermohonan as $value)
                                                @if ($value->permohonan_id != 1)
                                                    @if ($value->sekretaris->file_cv_v == 1)
                                                        <input
                                                            class="form-control @error('cvsekretaris') is-invalid @enderror"
                                                            type="file" id="cvsekretaris {{ $iterCvSekretaris }}"
                                                            name="cvsekretaris" placeholder="CV sekretaris"
                                                            wire:model="cvsekretaris" disabled>
                                                        @if (!empty($cvsekretarisOld))
                                                            <p><small class="text-success"><em>File CV : Sudah
                                                                        Ada</em></small>
                                                                @if ($cvsekretarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $cvsekretarisOld);
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
                                                    @elseif ($value->sekretaris->file_cv_v == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('cvsekretaris') is-invalid @enderror"
                                                            type="file" id="cvsekretaris {{ $iterCvSekretaris }}"
                                                            name="cvsekretaris" placeholder="CV sekretaris"
                                                            wire:model="cvsekretaris">
                                                        @if (!empty($cvsekretarisOld))
                                                            <p><small class="text-success"><em>File CV : Sudah
                                                                        Ada</em></small>
                                                                @if ($cvsekretarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $cvsekretarisOld);
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
                                                    @elseif ($value->sekretaris->file_cv_v == 0 && ($notifkirim == 'N' || $notifkirim == ''))
                                                        <input
                                                            class="form-control @error('cvsekretaris') is-invalid @enderror"
                                                            type="file" id="cvsekretaris {{ $iterCvSekretaris }}"
                                                            name="cvsekretaris" placeholder="CV sekretaris"
                                                            wire:model="cvsekretaris" disabled>
                                                        @if (!empty($cvsekretarisOld))
                                                            <p><small class="text-success"><em>File CV : Sudah
                                                                        Ada</em></small>
                                                                @if ($cvsekretarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $cvsekretarisOld);
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
                                                    <input
                                                        class="form-control @error('cvsekretaris') is-invalid @enderror"
                                                        type="file" id="cvsekretaris {{ $iterCvSekretaris }}"
                                                        name="cvsekretaris" placeholder="CV sekretaris"
                                                        wire:model="cvsekretaris">

                                                    <div wire:loading wire:target="cvsekretaris">
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
                                                    @error('cvsekretaris')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($cvsekretarisOld))
                                                        <p><small class="text-success"><em>File CV : Sudah
                                                                    Ada</em></small>
                                                            @if ($cvsekretarisOld)
                                                                @php
                                                                    $tempUrl = explode('/', $cvsekretarisOld);
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="border-bottom title-part-padding">
                                <h4 class="card-title mb-0">Bendahara</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-3 control-label">Nama
                                        <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi_bendahara == 1 || $statuspengurus == 'Y')
                                                <input type="text"
                                                    class="form-control @error('namabendahara') is-invalid @enderror"
                                                    id="namabendahara" name="namabendahara"
                                                    placeholder="Nama Bendahara" wire:model.defer="namabendahara"
                                                    autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('namabendahara') is-invalid @enderror"
                                                    id="namabendahara" name="namabendahara"
                                                    placeholder="Nama Bendahara" wire:model.defer="namabendahara"
                                                    autocomplete="off">
                                                @error('namabendahara')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">NIK
                                        <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi_bendahara == 1 || $statuspengurus == 'Y')
                                                <input type="text"
                                                    class="form-control @error('nikbendahara') is-invalid @enderror"
                                                    id="nikbendahara" name="nikbendahara" placeholder="NIK Bendahara"
                                                    onkeypress="return hanyaAngka(event)" autocomplete="off"
                                                    wire:model.defer="nikbendahara" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('nikbendahara') is-invalid @enderror"
                                                    id="nikbendahara" name="nikbendahara" placeholder="NIK Bendahara"
                                                    onkeypress="return hanyaAngka(event)" autocomplete="off"
                                                    wire:model.defer="nikbendahara">
                                                @error('nikbendahara')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Masa Bakti
                                        <span style="color:red">*</span></label>
                                    <div class="col-lg-9">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                @if ($verifikasi_bendahara == 1 || $statuspengurus == 'Y')
                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('awalbendahara') is-invalid @enderror"
                                                        id="awalbendahara" name="awalbendahara"
                                                        placeholder="Tanggal Awal" data-dtp="dtp_vDWAw"
                                                        wire:model.defer="awalbendahara" disabled>
                                                    <span
                                                        style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('akhirbendahara') is-invalid @enderror"
                                                        id="akhirbendahara" name="akhirbendahara"
                                                        placeholder="Tanggal Akhir" data-dtp="dtp_vDWAw"
                                                        wire:model.defer="akhirbendahara" disabled>
                                                @else
                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('awalbendahara') is-invalid @enderror"
                                                        id="awalbendahara" name="awalbendahara"
                                                        placeholder="Tanggal Awal" data-dtp="dtp_vDWAw"
                                                        wire:model.defer="awalbendahara">
                                                    @error('awalbendahara')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                    <span
                                                        style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                                    <div wire:ignore>
                                                        <span class="input-group-text">
                                                            <i data-feather="calendar" class="feather-sm"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('akhirbendahara') is-invalid @enderror"
                                                        id="akhirbendahara" name="akhirbendahara"
                                                        placeholder="Tanggal Akhir" data-dtp="dtp_vDWAw"
                                                        wire:model.defer="akhirbendahara">
                                                    @error('akhirbendahara')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                        @if (!empty($value->bendahara->verifikasi))
                                        @elseif ($value->bendahara->verifikasi == 0 && $notifkirim == 'Y')
                                            <div class="spinner-grow text-danger" style="height: 0.9em; width:0.9em"
                                                role="status">
                                                <span class="visually-hidden"></span>
                                            </div>
                                            <span style="font-style: italic; color:red">
                                                Silahkan Perbaiki Data ...
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Upload KTP
                                        <span style="color:red">*</span>
                                        <br>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                                    kb</span>
                                        </small>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            @foreach ($dataPermohonan as $value)
                                                @if ($value->permohonan_id != 1)
                                                    @if ($value->bendahara->file_ktp_v == 1)
                                                        <input
                                                            class="form-control @error('ktpbendahara') is-invalid @enderror"
                                                            type="file" id="ktpbendahara{{ $iterKtpBendahara }}"
                                                            name="ktpbendahara" placeholder="KTP bendahara"
                                                            wire:model="ktpbendahara" disabled>
                                                        @if (!empty($ktpbendaharaOld))
                                                            <p><small class="text-success"><em>File KTP : Sudah
                                                                        Ada</em></small>
                                                                @if ($ktpbendaharaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $ktpbendaharaOld);
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
                                                    @elseif ($value->bendahara->file_ktp_v == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('ktpbendahara') is-invalid @enderror"
                                                            type="file" id="ktpbendahara{{ $iterKtpBendahara }}"
                                                            name="ktpbendahara" placeholder="KTP bendahara"
                                                            wire:model="ktpbendahara">
                                                        @if (!empty($ktpbendaharaOld))
                                                            <p><small class="text-success"><em>File KTP : Sudah
                                                                        Ada</em></small>
                                                                @if ($ktpbendaharaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $ktpbendaharaOld);
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
                                                    @elseif ($value->bendahara->file_ktp_v == 0 && ($notifkirim == 'N' || $notifkirim == ''))
                                                        <input
                                                            class="form-control @error('ktpbendahara') is-invalid @enderror"
                                                            type="file" id="ktpbendahara{{ $iterKtpBendahara }}"
                                                            name="ktpbendahara" placeholder="KTP bendahara"
                                                            wire:model="ktpbendahara" disabled>
                                                        @if (!empty($ktpbendaharaOld))
                                                            <p><small class="text-success"><em>File KTP : Sudah
                                                                        Ada</em></small>
                                                                @if ($ktpbendaharaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $ktpbendaharaOld);
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
                                                    <input
                                                        class="form-control @error('ktpbendahara') is-invalid @enderror"
                                                        type="file" id="ktpbendahara{{ $iterKtpBendahara }}"
                                                        name="ktpbendahara" placeholder="KTP bendahara"
                                                        wire:model="ktpbendahara">
                                                    <div wire:loading wire:target="ktpbendahara">
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
                                                    @error('ktpbendahara')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($ktpbendaharaOld))
                                                        <p><small class="text-success"><em>File KTP : Sudah
                                                                    Ada</em></small>
                                                            @if ($ktpbendaharaOld)
                                                                @php
                                                                    $tempUrl = explode('/', $ktpbendaharaOld);
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Upload Foto
                                        <span style="color:red">*</span>
                                        <br>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                                    kb</span>
                                        </small>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            @foreach ($dataPermohonan as $value)
                                                @if ($value->permohonan_id != 1)
                                                    @if ($value->bendahara->file_foto_v == 1)
                                                        <input
                                                            class="form-control @error('fotobendahara') is-invalid @enderror"
                                                            type="file"
                                                            id="fotobendahara{{ $iterFotoBendahara }}"
                                                            name="fotobendahara" placeholder="Foto bendahara"
                                                            wire:model="fotobendahara" disabled>
                                                        @if (!empty($fotobendaharaOld))
                                                            <p><small class="text-success"><em>File Foto : Sudah
                                                                        Ada</em></small>
                                                                @if ($fotobendaharaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotobendaharaOld);
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
                                                    @elseif ($value->bendahara->file_foto_v == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('fotobendahara') is-invalid @enderror"
                                                            type="file"
                                                            id="fotobendahara{{ $iterFotoBendahara }}"
                                                            name="fotobendahara" placeholder="Foto bendahara"
                                                            wire:model="fotobendahara">
                                                        @if (!empty($fotobendaharaOld))
                                                            <p><small class="text-success"><em>File Foto : Sudah
                                                                        Ada</em></small>
                                                                @if ($fotobendaharaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotobendaharaOld);
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
                                                    @elseif ($value->bendahara->file_foto_v == 0 && ($notifkirim == 'N' || $notifkirim == ''))
                                                        <input
                                                            class="form-control @error('fotobendahara') is-invalid @enderror"
                                                            type="file"
                                                            id="fotobendahara{{ $iterFotoBendahara }}"
                                                            name="fotobendahara" placeholder="Foto bendahara"
                                                            wire:model="fotobendahara" disabled>
                                                        @if (!empty($fotobendaharaOld))
                                                            <p><small class="text-success"><em>File Foto : Sudah
                                                                        Ada</em></small>
                                                                @if ($fotobendaharaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotobendaharaOld);
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
                                                    <input
                                                        class="form-control @error('fotobendahara') is-invalid @enderror"
                                                        type="file" id="fotobendahara{{ $iterFotoBendahara }}"
                                                        name="fotobendahara" placeholder="Foto bendahara"
                                                        wire:model="fotobendahara">

                                                    <div wire:loading wire:target="fotobendahara">
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
                                                    @error('fotobendahara')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($fotobendaharaOld))
                                                        <p><small class="text-success"><em>File Foto : Sudah
                                                                    Ada</em></small>
                                                            @if ($fotobendaharaOld)
                                                                @php
                                                                    $tempUrl = explode('/', $fotobendaharaOld);
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Upload Daftar Riwayat Hidup
                                        <span style="color:red">*</span>
                                        <br>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                                    kb</span>
                                        </small>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            @foreach ($dataPermohonan as $value)
                                                @if ($value->permohonan_id != 1)
                                                    @if ($value->bendahara->file_cv_v == 1)
                                                        <input
                                                            class="form-control @error('cvbendahara') is-invalid @enderror"
                                                            type="file" id="cvbendahara {{ $iterCvBendahara }}"
                                                            name="cvbendahara" placeholder="CV bendahara"
                                                            wire:model="cvbendahara" disabled>
                                                        @if (!empty($cvbendaharaOld))
                                                            <p><small class="text-success"><em>File CV : Sudah
                                                                        Ada</em></small>
                                                                @if ($cvbendaharaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $cvbendaharaOld);
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
                                                    @elseif ($value->bendahara->file_cv_v == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('cvbendahara') is-invalid @enderror"
                                                            type="file" id="cvbendahara {{ $iterCvBendahara }}"
                                                            name="cvbendahara" placeholder="CV bendahara"
                                                            wire:model="cvbendahara">
                                                        @if (!empty($cvbendaharaOld))
                                                            <p><small class="text-success"><em>File CV : Sudah
                                                                        Ada</em></small>
                                                                @if ($cvbendaharaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $cvbendaharaOld);
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
                                                    @elseif ($value->bendahara->file_cv_v == 0 && ($notifkirim == 'N' || $notifkirim == ''))
                                                        <input
                                                            class="form-control @error('cvbendahara') is-invalid @enderror"
                                                            type="file" id="cvbendahara {{ $iterCvBendahara }}"
                                                            name="cvbendahara" placeholder="CV bendahara"
                                                            wire:model="cvbendahara" disabled>
                                                        @if (!empty($cvbendaharaOld))
                                                            <p><small class="text-success"><em>File CV : Sudah
                                                                        Ada</em></small>
                                                                @if ($cvbendaharaOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $cvbendaharaOld);
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
                                                    @endif
                                                @else
                                                    <input
                                                        class="form-control @error('cvbendahara') is-invalid @enderror"
                                                        type="file" id="cvbendahara {{ $iterCvBendahara }}"
                                                        name="cvbendahara" placeholder="CV bendahara"
                                                        wire:model="cvbendahara">

                                                    <div wire:loading wire:target="cvbendahara">
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
                                                    @error('cvbendahara')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($cvbendaharaOld))
                                                        <p><small class="text-success"><em>File CV : Sudah
                                                                    Ada</em></small>
                                                            @if ($cvbendaharaOld)
                                                                @php
                                                                    $tempUrl = explode('/', $cvbendaharaOld);
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="border-bottom title-part-padding">
                                <h4 class="card-title mb-0">Lainnya</h4>
                            </div>
                            <div class="card-body">
                                <div class="border-bottom">
                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-3 control-label">Nama Pendiri
                                            <span style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                @if (!empty($value->pendiri->verifikasi))
                                                    @if ($value->pendiri->verifikasi == 1)
                                                        <textarea class="form-control @error('namapendiri') is-invalid @enderror" name="namapendiri" id="namapendiri"
                                                            aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;" style="height: 56px"
                                                            wire:model.defer="namapendiri" autocomplete="off" disabled>
                                            </textarea>
                                                    @else
                                                        <textarea class="form-control @error('namapendiri') is-invalid @enderror" name="namapendiri" id="namapendiri"
                                                            aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;" style="height: 56px"
                                                            wire:model.defer="namapendiri" autocomplete="off">
                                            </textarea>
                                                        @error('namapendiri')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endif
                                                @else
                                                    <textarea class="form-control @error('namapendiri') is-invalid @enderror" name="namapendiri" id="namapendiri"
                                                        aria-label="With textarea"
                                                        placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;" style="height: 56px"
                                                        wire:model.defer="namapendiri" autocomplete="off">
                                            </textarea>
                                                    @error('namapendiri')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">NIK Pendiri
                                            <span style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                @if (!empty($value->pendiri->verifikasi))
                                                    @if ($value->pendiri->verifikasi == 1)
                                                        <textarea class="form-control @error('nikpendiri') is-invalid @enderror" name="nikpendiri" id="nikpendiri"
                                                            aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa NIK sesuai urutan nama dengan tanda pemisah ;"
                                                            style="height: 56px" wire:model.defer="nikpendiri" autocomplete="off" disabled>
                                                </textarea>
                                                    @else
                                                        <textarea class="form-control @error('nikpendiri') is-invalid @enderror" name="nikpendiri" id="nikpendiri"
                                                            aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa NIK sesuai urutan nama dengan tanda pemisah ;"
                                                            style="height: 56px" wire:model.defer="nikpendiri" autocomplete="off">
                                                </textarea>
                                                        @error('nikpendiri')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endif
                                                @else
                                                    <textarea class="form-control @error('nikpendiri') is-invalid @enderror" name="nikpendiri" id="nikpendiri"
                                                        aria-label="With textarea"
                                                        placeholder="Jika lebih dari 1 orang silahkan isi beberapa NIK sesuai urutan nama dengan tanda pemisah ;"
                                                        style="height: 56px" wire:model.defer="nikpendiri" autocomplete="off">
                                            </textarea>
                                                    @error('nikpendiri')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if (!empty($value->pendiri->verifikasi))
                                    @elseif ($value->pendiri->verifikasi == 0 && $notifkirim == 'Y')
                                        <div class="spinner-grow text-danger" style="height: 0.9em; width:0.9em"
                                            role="status">
                                            <span class="visually-hidden"></span>
                                        </div>
                                        <span style="font-style: italic; color:red">
                                            Silahkan Perbaiki Data ...
                                        </span>
                                    @endif
                                </div>

                                <div class="mt-3 border-bottom">
                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-3 control-label">Nama Pembina
                                            <span style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                @if (!empty($value->pembina->verifikasi))
                                                    @if ($value->pembina->verifikasi == 1)
                                                        <textarea class="form-control @error('namapembina') is-invalid @enderror" name="namapembina" id="namapembina"
                                                            aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;" style="height: 56px"
                                                            wire:model.defer="namapembina" autocomplete="off" disabled>
                                                </textarea>
                                                    @else
                                                        <textarea class="form-control @error('namapembina') is-invalid @enderror" name="namapembina" id="namapembina"
                                                            aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;" style="height: 56px"
                                                            wire:model.defer="namapembina" autocomplete="off">
                                                </textarea>
                                                        @error('namapembina')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endif
                                                @else
                                                    <textarea class="form-control @error('namapembina') is-invalid @enderror" name="namapembina" id="namapembina"
                                                        aria-label="With textarea"
                                                        placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;" style="height: 56px"
                                                        wire:model.defer="namapembina" autocomplete="off">
                                                </textarea>
                                                    @error('namapembina')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">NIK Pembina
                                            <span style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                @if (!empty($value->pembina->verifikasi))
                                                    @if ($value->pembina->verifikasi == 1)
                                                        <textarea class="form-control @error('nikpembina') is-invalid @enderror" name="nikpembina" id="nikpembina"
                                                            aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa NIK sesuai urutan nama dengan tanda pemisah ;"
                                                            style="height: 56px" wire:model.defer="nikpembina" autocomplete="off" disabled>
                                                </textarea>
                                                    @else
                                                        <textarea class="form-control @error('nikpembina') is-invalid @enderror" name="nikpembina" id="nikpembina"
                                                            aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa NIK sesuai urutan nama dengan tanda pemisah ;"
                                                            style="height: 56px" wire:model.defer="nikpembina" autocomplete="off">
                                                </textarea>
                                                        @error('nikpembina')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endif
                                                @else
                                                    <textarea class="form-control @error('nikpembina') is-invalid @enderror" name="nikpembina" id="nikpembina"
                                                        aria-label="With textarea"
                                                        placeholder="Jika lebih dari 1 orang silahkan isi beberapa NIK sesuai urutan nama dengan tanda pemisah ;"
                                                        style="height: 56px" wire:model.defer="nikpembina" autocomplete="off">
                                                </textarea>
                                                    @error('nikpembina')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if (!empty($value->pembina->verifikasi))
                                    @elseif ($value->pembina->verifikasi == 0 && $notifkirim == 'Y')
                                        <div class="spinner-grow text-danger" style="height: 0.9em; width:0.9em"
                                            role="status">
                                            <span class="visually-hidden"></span>
                                        </div>
                                        <span style="font-style: italic; color:red">
                                            Silahkan Perbaiki Data ...
                                        </span>
                                    @endif
                                </div>

                                <div class="mt-3 border-bottom">
                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-3 control-label">Nama Penasihat
                                            <span style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                @if (!empty($value->penasihat->verifikasi))
                                                    @if ($value->penasihat->verifikasi == 1)
                                                        <textarea class="form-control @error('namapenasihat') is-invalid @enderror" name="namapenasihat"
                                                            id="namapenasihat" aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;" style="height: 56px"
                                                            wire:model.defer="namapenasihat" autocomplete="off" disabled>
@else
<textarea class="form-control @error('namapenasihat') is-invalid @enderror" name="namapenasihat" id="namapenasihat"
                                                    aria-label="With textarea" placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;"
                                                    style="height: 56px" wire:model.defer="namapenasihat" autocomplete="off">
                                                </textarea>
                                                        @error('namapenasihat')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endif
                                                @else
                                                    <textarea class="form-control @error('namapenasihat') is-invalid @enderror" name="namapenasihat"
                                                        id="namapenasihat" aria-label="With textarea"
                                                        placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;" style="height: 56px"
                                                        wire:model.defer="namapenasihat" autocomplete="off">
                                                </textarea>
                                                    @error('namapenasihat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 control-label">NIK Penasihat
                                            <span style="color:red">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                @if (!empty($value->penasihat->verifikasi))
                                                    @if ($value->penasihat->verifikasi == 1)
                                                        <textarea class="form-control @error('nikpenasihat') is-invalid @enderror" name="nikpenasihat" id="nikpenasihat"
                                                            aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa NIK sesuai urutan nama dengan tanda pemisah ;"
                                                            style="height: 56px" wire:model="nikpenasihat" autocomplete="off" disabled>
                                                </textarea>
                                                    @else
                                                        <textarea class="form-control @error('nikpenasihat') is-invalid @enderror" name="nikpenasihat" id="nikpenasihat"
                                                            aria-label="With textarea"
                                                            placeholder="Jika lebih dari 1 orang silahkan isi beberapa NIK sesuai urutan nama dengan tanda pemisah ;"
                                                            style="height: 56px" wire:model="nikpenasihat" autocomplete="off">
                                                </textarea>
                                                        @error('nikpenasihat')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    @endif
                                                @else
                                                    <textarea class="form-control @error('nikpenasihat') is-invalid @enderror" name="nikpenasihat" id="nikpenasihat"
                                                        aria-label="With textarea"
                                                        placeholder="Jika lebih dari 1 orang silahkan isi beberapa NIK sesuai urutan nama dengan tanda pemisah ;"
                                                        style="height: 56px" wire:model="nikpenasihat" autocomplete="off">
                                            </textarea>
                                                    @error('nikpenasihat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if (!empty($value->penasihat->verifikasi))
                                    @elseif ($value->penasihat->verifikasi == 0 && $notifkirim == 'Y')
                                        <div class="spinner-grow text-danger" style="height: 0.9em; width:0.9em"
                                            role="status">
                                            <span class="visually-hidden"></span>
                                        </div>
                                        <span style="font-style: italic; color:red">
                                            Silahkan Perbaiki Data ...
                                        </span>
                                    @endif
                                </div>
                                <div class="border-bottom">
                                    <span style="font-style: italic"><b>Catatan :</b> Untuk Nama & NIK Pendiri,
                                        Pembina dan
                                        Penasihat Jika lebih dari 1 silahkan pisahkan dengan tanda  ;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    @endforeach

    @push('script')
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            window.addEventListener('openViewFile', event => {
                $("#ModalView").modal('show');
            })
            window.addEventListener('closeViewFile', event => {
                $("#ModalView").modal('hide');
            })


            // Before Action
            $(document).ready(function() {
                init();
            });

            $('#awalketua').on('change', function(e) {
                @this.set('awalketua', e.target.value);
            });
            $('#akhirketua').on('change', function(e) {
                @this.set('akhirketua', e.target.value);
            });
            $('#awalsekretaris').on('change', function(e) {
                @this.set('awalsekretaris', e.target.value);
            });
            $('#akhirsekretaris').on('change', function(e) {
                @this.set('akhirsekretaris', e.target.value);
            });
            $('#awalbendahara').on('change', function(e) {
                @this.set('awalbendahara', e.target.value);
            });
            $('#akhirbendahara').on('change', function(e) {
                @this.set('akhirbendahara', e.target.value);
            });

            window.livewire.hook('message.processed', (message, component) => {
                init();
            });

            // After Action
            function init() {
                $('#awalketua').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });
                $('#akhirketua').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });

                $('#awalsekretaris').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });
                $('#akhirsekretaris').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });

                $('#awalbendahara').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });
                $('#akhirbendahara').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });
            }

            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }
        </script>
    @endpush

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
                        {{-- @php
                            $path = explode('/', $url);
                        @endphp --}}

                        <div class="col-md-6">
                            <object style="height:700px; width:1110px" data="{{ asset('display/' . $url) }}"
                                type="application/pdf">
                            </object>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
