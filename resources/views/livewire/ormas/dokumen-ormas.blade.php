<div>
    @foreach ($dataPermohonan as $value)
        @if (!empty($value->no_register))
            <form class="form-horizontal" method="post" wire:submit.prevent="store_dokumen" enctype="multipart/form-data">
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
                                            @if ($value->permohonan_id != 1 && $value->status_dokumen == 'Y' && $value->notifikasi_kirim == 'N')
                                            @elseif ($value->permohonan_id == 1 && (empty($value->status_dokumen) && empty($value->notifikasi_kirim)))
                                                <div class="d-flex">
                                                    {{-- submit --}}
                                                    <div wire:loading.remove wire:target="store_dokumen">
                                                        <button type="submit"
                                                            class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                                    </div>
                                                    <div wire:loading wire:target="store_dokumen">
                                                        <button
                                                            class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                                            type="button" disabled>
                                                            <span class="spinner-border spinner-border-sm"
                                                                role="status" aria-hidden="true"></span>
                                                            Loading...
                                                        </button>
                                                    </div>
                                                </div>
                                            @elseif ($value->permohonan_id != 1 && $value->status_dokumen == 'N' && $value->notifikasi_kirim == 'Y')
                                                <div class="d-flex">
                                                    {{-- submit --}}
                                                    <div wire:loading.remove wire:target="store_dokumen">
                                                        <button type="submit"
                                                            class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                                    </div>
                                                    <div wire:loading wire:target="store_dokumen">
                                                        <button
                                                            class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
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
                        @if ($statusdokumen == 'N' && $notifkirim == 'Y')
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

                                @if ($val_srtpermohonan == 0 && $notifkirim == 'Y')
                                    Surat Permohonan Walikota : {{ $valket_srtpermohonan }}<br>
                                @endif
                                @if ($val_lambang == 0 && $notifkirim == 'Y')
                                    Lambang : {{ $valket_lambang }}<br>
                                @endif
                                @if ($val_stempel == 0 && $notifkirim == 'Y')
                                    Stempel : {{ $valket_stempel }}<br>
                                @endif
                                @if ($val_aktanotaris == 0 && $notifkirim == 'Y')
                                    Akta Notaris : {{ $valket_aktanotaris }}<br>
                                @endif
                                @if ($val_adart == 0 && $notifkirim == 'Y')
                                    AD ART : {{ $valket_adart }}<br>
                                @endif
                                @if ($val_srtkeputusan == 0 && $notifkirim == 'Y')
                                    Surat Keputusan Kepengurusan : {{ $valket_srtkeputusan }}<br>
                                @endif
                                @if ($val_srtpernyataan == 0 && $notifkirim == 'Y')
                                    Surat Pernyataan : {{ $valket_srtpernyataan }}<br>
                                @endif
                                @if ($val_proker == 0 && $notifkirim == 'Y')
                                    Program Kerja : {{ $valket_proker }}<br>
                                @endif
                                @if ($val_suketdomisili == 0 && $notifkirim == 'Y')
                                    Surat Keterangan Domisili Kantor : {{ $valket_suketdomisili }}<br>
                                @endif
                                @if ($val_kepemilikan == 0 && $notifkirim == 'Y')
                                    Surat Kepemilikan Kantor : {{ $valket_kepemilikan }}<br>
                                @endif
                                @if ($val_fotokantor == 0 && $notifkirim == 'Y')
                                    Foto Kantor Tampak Depan Dengan Plakat : {{ $valket_fotokantor }}<br>
                                @endif
                                @if ($val_skahu == 0 && $notifkirim == 'Y')
                                    SK KEMENKUM HAM : {{ $valket_skahu }}<br>
                                @endif
                                @if ($val_srtrekom == 0 && $notifkirim == 'Y')
                                    Surat Rekomendasi : {{ $valket_srtrekom }}
                                @endif

                                {{-- @if ($val_badanhukum == 0)
                            Badan Hukum : {{ $valket_badanhukum }}<br>
                        @endif --}}


                            </div>
                        @elseif ($statusdokumen == 'Y')
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

                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Form Kelengkapan Dokumen</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label for="srtpermohonan" class="col-sm-3 form-label">Surat Permohonan Walikota
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
                                                    @if ($val_srtpermohonan == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('srtpermohonan') is-invalid @enderror"
                                                            type="file" id="srtpermohonan{{ $itersrtpermohonan }}"
                                                            name="srtpermohonan" wire:model="srtpermohonan" disabled>
                                                        @if (!empty($srtpermohonanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em></small>
                                                                @if ($srtpermohonanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtpermohonanOld);
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
                                                    @elseif ($val_srtpermohonan == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('srtpermohonan') is-invalid @enderror"
                                                            type="file" id="srtpermohonan{{ $itersrtpermohonan }}"
                                                            name="srtpermohonan" wire:model="srtpermohonan" disabled>

                                                        @if (!empty($srtpermohonanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em></small>
                                                                @if ($srtpermohonanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtpermohonanOld);
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
                                                    @elseif($val_srtpermohonan == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('srtpermohonan') is-invalid @enderror"
                                                            type="file" id="srtpermohonan{{ $itersrtpermohonan }}"
                                                            name="srtpermohonan" wire:model="srtpermohonan">

                                                        @if (!empty($srtpermohonanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em></small>
                                                                @if ($srtpermohonanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtpermohonanOld);
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
                                                        class="form-control @error('srtpermohonan') is-invalid @enderror"
                                                        type="file" id="srtpermohonan{{ $itersrtpermohonan }}"
                                                        name="srtpermohonan" wire:model="srtpermohonan">
                                                    <div wire:loading wire:target="srtpermohonan">
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
                                                    @error('srtpermohonan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($srtpermohonanOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em></small>
                                                            @if ($srtpermohonanOld)
                                                                @php
                                                                    $tempUrl = explode('/', $srtpermohonanOld);
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


                                <div class="mb-3 row">
                                    <label for="srtlambang" class="col-sm-3 form-label">Lambang
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
                                                    @if ($val_lambang == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('lambang') is-invalid @enderror"
                                                            type="file" id="lambang{{ $iterlambang }}"
                                                            name="lambang" wire:model="lambang" disabled>
                                                        @if (!empty($lambangOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em></small>
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
                                                    @elseif ($val_lambang == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('lambang') is-invalid @enderror"
                                                            type="file" id="lambang{{ $iterlambang }}"
                                                            name="lambang" wire:model="lambang" disabled>

                                                        @if (!empty($lambangOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em></small>
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
                                                    @elseif($val_lambang == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('lambang') is-invalid @enderror"
                                                            type="file" id="lambang{{ $iterlambang }}"
                                                            name="lambang" wire:model="lambang">

                                                        @if (!empty($lambangOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em></small>
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
                                                        type="file" id="lambang{{ $iterlambang }}"
                                                        name="lambang" wire:model="lambang">
                                                    <div wire:loading wire:target="lambang">
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
                                                    @error('lambang')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($lambangOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em></small>
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="mb-3 row">
                            <label for="lambang" class="col-sm-3 form-label">Lambang
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
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
                                                    <p><small class="text-success"><em>File : Sudah
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
                                            @elseif ($val_lambang == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                <input class="form-control @error('lambang') is-invalid @enderror"
                                                    type="file" id="lambang{{ $iterlambang }}" name="lambang"
                                                    wire:model="lambang" disabled>
                                                @if (!empty($lambangOld))
                                                    <p><small class="text-success"><em>File : Sudah
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
                                                    @elseif ($val_lambang == 0 && $notifkirim == 'Y')
                                                    <div class="spinner-grow text-danger"
                                                        style="height: 0.9em; width:0.9em" role="status">
                                                        <span class="visually-hidden"></span>
                                                    </div>
                                                    <span style="font-style: italic; color:red">
                                                        Silahkan Perbaiki Data ...
                                                    </span>
                                                    <input class="form-control @error('lambang') is-invalid @enderror"
                                                        type="file" id="lambang{{ $iterlambang }}"
                                                        name="lambang" wire:model="lambang">
                                                    @if (!empty($lambangOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
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
                                                                role="progressbar" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 100%"></div>
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
                        </div> --}}

                                <div class="mb-3 row">
                                    <label for="stempel" class="col-sm-3 form-label">Stempel
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
                                                    @if ($val_stempel == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('stempel') is-invalid @enderror"
                                                            type="file" id="stempel{{ $iterstempel }}"
                                                            name="stempel" wire:model="stempel" disabled>
                                                        @if (!empty($stempelOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($stempelOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $stempelOld);
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
                                                    @elseif ($val_stempel == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('stempel') is-invalid @enderror"
                                                            type="file" id="stempel{{ $iterstempel }}"
                                                            name="stempel" wire:model="stempel" disabled>
                                                        @if (!empty($stempelOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($stempelOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $stempelOld);
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
                                                    @elseif ($val_stempel == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('stempel') is-invalid @enderror"
                                                            type="file" id="stempel{{ $iterstempel }}"
                                                            name="stempel" wire:model="stempel">
                                                        @if (!empty($stempelOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($stempelOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $stempelOld);
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
                                                    <input class="form-control @error('stempel') is-invalid @enderror"
                                                        type="file" id="stempel{{ $iterstempel }}"
                                                        name="stempel" wire:model="stempel">
                                                    <div wire:loading wire:target="stempel">
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
                                                    @error('stempel')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($stempelOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
                                                            </small>
                                                            @if ($stempelOld)
                                                                @php
                                                                    $tempUrl = explode('/', $stempelOld);
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

                                <div class="mb-3 row">
                                    <label for="aktanotaris" class="col-sm-3 form-label">Akta Notaris
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
                                                    @if ($val_aktanotaris == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('aktanotaris') is-invalid @enderror"
                                                            type="file" id="aktanotaris{{ $iteraktanotaris }}"
                                                            name="aktanotaris" wire:model="aktanotaris" disabled>
                                                        @if (!empty($aktanotarisOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($aktanotarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $aktanotarisOld);
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
                                                    @elseif ($val_aktanotaris == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('aktanotaris') is-invalid @enderror"
                                                            type="file" id="aktanotaris{{ $iteraktanotaris }}"
                                                            name="aktanotaris" wire:model="aktanotaris" disabled>
                                                        @if (!empty($aktanotarisOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($aktanotarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $aktanotarisOld);
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
                                                    @elseif ($val_aktanotaris == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('aktanotaris') is-invalid @enderror"
                                                            type="file" id="aktanotaris{{ $iteraktanotaris }}"
                                                            name="aktanotaris" wire:model="aktanotaris">
                                                        @if (!empty($aktanotarisOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($aktanotarisOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $aktanotarisOld);
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
                                                        class="form-control @error('aktanotaris') is-invalid @enderror"
                                                        type="file" id="aktanotaris{{ $iteraktanotaris }}"
                                                        name="aktanotaris" wire:model="aktanotaris">
                                                    <div wire:loading wire:target="aktanotaris">
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
                                                    @error('aktanotaris')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($aktanotarisOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
                                                            </small>
                                                            @if ($aktanotarisOld)
                                                                @php
                                                                    $tempUrl = explode('/', $aktanotarisOld);
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

                                <div class="mb-3 row">
                                    <label for="adart" class="col-sm-3 form-label">AD ART
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
                                                    @if ($val_adart == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('adart') is-invalid @enderror"
                                                            type="file" id="adart{{ $iteradart }}"
                                                            name="adart" wire:model="adart" disabled>
                                                        @if (!empty($adartOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($adartOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $adartOld);
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
                                                    @elseif ($val_adart == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('adart') is-invalid @enderror"
                                                            type="file" id="adart{{ $iteradart }}"
                                                            name="adart" wire:model="adart" disabled>
                                                        @if (!empty($adartOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($adartOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $adartOld);
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
                                                    @elseif ($val_adart == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>

                                                        <input
                                                            class="form-control @error('adart') is-invalid @enderror"
                                                            type="file" id="adart{{ $iteradart }}"
                                                            name="adart" wire:model="adart">
                                                        @if (!empty($adartOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($adartOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $adartOld);
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
                                                    <input class="form-control @error('adart') is-invalid @enderror"
                                                        type="file" id="adart{{ $iteradart }}" name="adart"
                                                        wire:model="adart">
                                                    <div wire:loading wire:target="adart">
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
                                                    @error('adart')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($adartOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
                                                            </small>
                                                            @if ($adartOld)
                                                                @php
                                                                    $tempUrl = explode('/', $adartOld);
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

                                <div class="mb-3 row">
                                    <label for="srtkepengurusan" class="col-sm-3 form-label">Surat Keputusan
                                        Kepengurusan
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
                                                    @if ($val_srtkeputusan == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('srtkepengurusan') is-invalid @enderror"
                                                            type="file"
                                                            id="srtkepengurusan{{ $itersrtkepengurusan }}"
                                                            name="srtkepengurusan" wire:model="srtkepengurusan"
                                                            disabled>
                                                        @if (!empty($srtkepengurusanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtkepengurusanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtkepengurusanOld);
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
                                                    @elseif ($val_srtkeputusan == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('srtkepengurusan') is-invalid @enderror"
                                                            type="file"
                                                            id="srtkepengurusan{{ $itersrtkepengurusan }}"
                                                            name="srtkepengurusan" wire:model="srtkepengurusan"
                                                            disabled>
                                                        @if (!empty($srtkepengurusanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtkepengurusanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtkepengurusanOld);
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
                                                    @elseif ($val_srtkeputusan == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>

                                                        <input
                                                            class="form-control @error('srtkepengurusan') is-invalid @enderror"
                                                            type="file"
                                                            id="srtkepengurusan{{ $itersrtkepengurusan }}"
                                                            name="srtkepengurusan" wire:model="srtkepengurusan">
                                                        @if (!empty($srtkepengurusanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtkepengurusanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtkepengurusanOld);
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
                                                        class="form-control @error('srtkepengurusan') is-invalid @enderror"
                                                        type="file"
                                                        id="srtkepengurusan{{ $itersrtkepengurusan }}"
                                                        name="srtkepengurusan" wire:model="srtkepengurusan">
                                                    <div wire:loading wire:target="srtkepengurusan">
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
                                                    @error('srtkepengurusan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($srtkepengurusanOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
                                                            </small>
                                                            @if ($srtkepengurusanOld)
                                                                @php
                                                                    $tempUrl = explode('/', $srtkepengurusanOld);
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

                                <div class="mb-3 row">
                                    <label for="srtpernyataan" class="col-sm-3 form-label">Surat Pernyataan
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
                                                    @if ($val_srtpernyataan == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('srtpernyataan') is-invalid @enderror"
                                                            type="file"
                                                            id="srtpernyataan{{ $itersrtpernyataan }}"
                                                            name="srtpernyataan" wire:model="srtpernyataan" disabled>
                                                        @if (!empty($srtpernyataanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtpernyataanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtpernyataanOld);
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
                                                    @elseif ($val_srtpernyataan == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('srtpernyataan') is-invalid @enderror"
                                                            type="file"
                                                            id="srtpernyataan{{ $itersrtpernyataan }}"
                                                            name="srtpernyataan" wire:model="srtpernyataan" disabled>
                                                        @if (!empty($srtpernyataanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtpernyataanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtpernyataanOld);
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
                                                    @elseif ($val_srtpernyataan == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('srtpernyataan') is-invalid @enderror"
                                                            type="file"
                                                            id="srtpernyataan{{ $itersrtpernyataan }}"
                                                            name="srtpernyataan" wire:model="srtpernyataan">
                                                        @if (!empty($srtpernyataanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtpernyataanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtpernyataanOld);
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
                                                        class="form-control @error('srtpernyataan') is-invalid @enderror"
                                                        type="file" id="srtpernyataan{{ $itersrtpernyataan }}"
                                                        name="srtpernyataan" wire:model="srtpernyataan">
                                                    <div wire:loading wire:target="srtpernyataan">
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
                                                    @error('srtpernyataan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($srtpernyataanOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
                                                            </small>
                                                            @if ($srtpernyataanOld)
                                                                @php
                                                                    $tempUrl = explode('/', $srtpernyataanOld);
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

                                <div class="mb-3 row">
                                    <label for="kerjaormas" class="col-sm-3 form-label">Program Kerja
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
                                                    @if ($val_proker == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('kerjaormas') is-invalid @enderror"
                                                            type="file" id="kerjaormas{{ $iterkerjaormas }}"
                                                            name="kerjaormas" wire:model="kerjaormas" disabled>
                                                        @if (!empty($kerjaormasOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($kerjaormasOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $kerjaormasOld);
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
                                                    @elseif ($val_proker == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('kerjaormas') is-invalid @enderror"
                                                            type="file" id="kerjaormas{{ $iterkerjaormas }}"
                                                            name="kerjaormas" wire:model="kerjaormas" disabled>
                                                        @if (!empty($kerjaormasOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($kerjaormasOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $kerjaormasOld);
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
                                                    @elseif ($val_proker == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>

                                                        <input
                                                            class="form-control @error('kerjaormas') is-invalid @enderror"
                                                            type="file" id="kerjaormas{{ $iterkerjaormas }}"
                                                            name="kerjaormas" wire:model="kerjaormas">
                                                        @if (!empty($kerjaormasOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($kerjaormasOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $kerjaormasOld);
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
                                                        class="form-control @error('kerjaormas') is-invalid @enderror"
                                                        type="file" id="kerjaormas{{ $iterkerjaormas }}"
                                                        name="kerjaormas" wire:model="kerjaormas">
                                                    <div wire:loading wire:target="kerjaormas">
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
                                                    @error('kerjaormas')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($kerjaormasOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
                                                            </small>
                                                            @if ($kerjaormasOld)
                                                                @php
                                                                    $tempUrl = explode('/', $kerjaormasOld);
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

                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label for="srtdomisili" class="col-sm-3 form-label">Surat Keterangan Domisili
                                        Kantor
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
                                                    @if ($val_suketdomisili == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('srtdomisili') is-invalid @enderror"
                                                            type="file" id="srtdomisili{{ $itersrtdomisili }}"
                                                            name="srtdomisili" wire:model="srtdomisili" disabled>
                                                        @if (!empty($srtdomisiliOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtdomisiliOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtdomisiliOld);
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
                                                    @elseif ($val_suketdomisili == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('srtdomisili') is-invalid @enderror"
                                                            type="file" id="srtdomisili{{ $itersrtdomisili }}"
                                                            name="srtdomisili" wire:model="srtdomisili" disabled>
                                                        @if (!empty($srtdomisiliOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtdomisiliOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtdomisiliOld);
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
                                                    @elseif ($val_suketdomisili == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('srtdomisili') is-invalid @enderror"
                                                            type="file" id="srtdomisili{{ $itersrtdomisili }}"
                                                            name="srtdomisili" wire:model="srtdomisili">
                                                        @if (!empty($srtdomisiliOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtdomisiliOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtdomisiliOld);
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
                                                        class="form-control @error('srtdomisili') is-invalid @enderror"
                                                        type="file" id="srtdomisili{{ $itersrtdomisili }}"
                                                        name="srtdomisili" wire:model="srtdomisili">
                                                    <div wire:loading wire:target="srtdomisili">
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
                                                    @error('srtdomisili')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($srtdomisiliOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
                                                            </small>
                                                            @if ($srtdomisiliOld)
                                                                @php
                                                                    $tempUrl = explode('/', $srtdomisiliOld);
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

                                <div class="mb-3 row">
                                    <label for="srtkepemilikan" class="col-sm-3 form-label">Surat Kepemilikan Kantor
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
                                                    @if ($val_kepemilikan == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('srtkepemilikan') is-invalid @enderror"
                                                            type="file"
                                                            id="srtkepemilikan{{ $itersrtkepemilikan }}"
                                                            name="srtkepemilikan" wire:model="srtkepemilikan"
                                                            disabled>
                                                        @if (!empty($srtkepemilikanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtkepemilikanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtkepemilikanOld);
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
                                                    @elseif ($val_kepemilikan == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('srtkepemilikan') is-invalid @enderror"
                                                            type="file"
                                                            id="srtkepemilikan{{ $itersrtkepemilikan }}"
                                                            name="srtkepemilikan" wire:model="srtkepemilikan"
                                                            disabled>
                                                        @if (!empty($srtkepemilikanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtkepemilikanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtkepemilikanOld);
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
                                                    @elseif ($val_kepemilikan == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('srtkepemilikan') is-invalid @enderror"
                                                            type="file"
                                                            id="srtkepemilikan{{ $itersrtkepemilikan }}"
                                                            name="srtkepemilikan" wire:model="srtkepemilikan">
                                                        @if (!empty($srtkepemilikanOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($srtkepemilikanOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $srtkepemilikanOld);
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
                                                        class="form-control @error('srtkepemilikan') is-invalid @enderror"
                                                        type="file" id="srtkepemilikan{{ $itersrtkepemilikan }}"
                                                        name="srtkepemilikan" wire:model="srtkepemilikan">
                                                    <div wire:loading wire:target="srtkepemilikan">
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
                                                    @error('srtkepemilikan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($srtkepemilikanOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
                                                            </small>
                                                            @if ($srtkepemilikanOld)
                                                                @php
                                                                    $tempUrl = explode('/', $srtkepemilikanOld);
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


                                <div class="mb-3 row">
                                    <label for="fotokantor" class="col-sm-3 form-label">Foto Kantor Tampak Depan
                                        Dengan Plakat
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
                                                    @if ($val_fotokantor == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('fotokantor') is-invalid @enderror"
                                                            type="file" id="fotokantor{{ $iterfotokantor }}"
                                                            name="fotokantor" wire:model="fotokantor" disabled>
                                                        @if (!empty($fotokantorOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($fotokantorOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotokantorOld);
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
                                                    @elseif ($val_fotokantor == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('fotokantor') is-invalid @enderror"
                                                            type="file" id="fotokantor{{ $iterfotokantor }}"
                                                            name="fotokantor" wire:model="fotokantor" disabled>
                                                        @if (!empty($fotokantorOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($fotokantorOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotokantorOld);
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
                                                    @elseif ($val_fotokantor == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('fotokantor') is-invalid @enderror"
                                                            type="file" id="fotokantor{{ $iterfotokantor }}"
                                                            name="fotokantor" wire:model="fotokantor">
                                                        @if (!empty($fotokantorOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($fotokantorOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $fotokantorOld);
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
                                                        class="form-control @error('fotokantor') is-invalid @enderror"
                                                        type="file" id="fotokantor{{ $iterfotokantor }}"
                                                        name="fotokantor" wire:model="fotokantor">
                                                    <div wire:loading wire:target="fotokantor">
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
                                                    @error('fotokantor')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($fotokantorOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
                                                            </small>
                                                            @if ($fotokantorOld)
                                                                @php
                                                                    $tempUrl = explode('/', $fotokantorOld);
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

                                <div class="mb-3 row">
                                    <label for="skuha" class="col-sm-3 form-label">SK KEMENKUM HAM/KEMENDAGRI
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
                                                    @if ($val_skahu == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('skuha') is-invalid @enderror"
                                                            type="file" id="skuha{{ $iterskuha }}"
                                                            name="skuha" wire:model="skuha" disabled>
                                                        @if (!empty($skuhaOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
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
                                                                        <i class="fas fa-eye" style="color: blue"></i>
                                                                    </a>
                                                                @endif
                                                            </p>
                                                        @endif
                                                    @elseif ($val_skahu == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('skuha') is-invalid @enderror"
                                                            type="file" id="skuha{{ $iterskuha }}"
                                                            name="skuha" wire:model="skuha" disabled>
                                                        @if (!empty($skuhaOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
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
                                                                        <i class="fas fa-eye" style="color: blue"></i>
                                                                    </a>
                                                                @endif
                                                            </p>
                                                        @endif
                                                    @elseif ($val_skahu == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('skuha') is-invalid @enderror"
                                                            type="file" id="skuha{{ $iterskuha }}"
                                                            name="skuha" wire:model="skuha">
                                                        @if (!empty($skuhaOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
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
                                                                        <i class="fas fa-eye" style="color: blue"></i>
                                                                    </a>
                                                                @endif
                                                            </p>
                                                        @endif
                                                    @endif
                                                @else
                                                    <input class="form-control @error('skuha') is-invalid @enderror"
                                                        type="file" id="skuha{{ $iterskuha }}" name="skuha"
                                                        wire:model="skuha">
                                                    <div wire:loading wire:target="skuha">
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
                                                    @error('skuha')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($skuhaOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
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

                                <div class="mb-3 row">
                                    <label for="rekom" class="col-sm-3 form-label">Surat Rekomendasi
                                        <span style="color:red">*</span>
                                        <br>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                                    kb</span>
                                        </small>
                                        <small class="form-control-feedback"><span style="font-style: italic">
                                                Dari Kementerian dan/atau perangkat daerah yang melaksanakan urusan
                                                kekhususan
                                                bidang keagamaan/kebudayaan kepada Tuhan YME.
                                        </small>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            @foreach ($dataPermohonan as $value)
                                                @if ($value->permohonan_id != 1)
                                                    @if ($val_srtrekom == 1 || $statusdokumen == 'Y')
                                                        <input
                                                            class="form-control @error('rekom') is-invalid @enderror"
                                                            type="file" id="rekom{{ $iterrekom }}"
                                                            name="rekom" wire:model="rekom" disabled>
                                                        @if (!empty($rekomOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($rekomOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $rekomOld);
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
                                                    @elseif ($val_srtrekom == 0 && ($notifkirim == 'N' || empty($notifkirim)))
                                                        <input
                                                            class="form-control @error('rekom') is-invalid @enderror"
                                                            type="file" id="rekom{{ $iterrekom }}"
                                                            name="rekom" wire:model="rekom" disabled>
                                                        @if (!empty($rekomOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($rekomOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $rekomOld);
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
                                                    @elseif ($val_srtrekom == 0 && $notifkirim == 'Y')
                                                        <div class="spinner-grow text-danger"
                                                            style="height: 0.9em; width:0.9em" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                        <span style="font-style: italic; color:red">
                                                            Silahkan Perbaiki Data ...
                                                        </span>
                                                        <input
                                                            class="form-control @error('rekom') is-invalid @enderror"
                                                            type="file" id="rekom{{ $iterrekom }}"
                                                            name="rekom" wire:model="rekom">
                                                        @if (!empty($rekomOld))
                                                            <p><small class="text-success"><em>File :
                                                                        Sudah
                                                                        Ada</em>
                                                                </small>
                                                                @if ($rekomOld)
                                                                    @php
                                                                        $tempUrl = explode('/', $rekomOld);
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
                                                    <input class="form-control @error('rekom') is-invalid @enderror"
                                                        type="file" id="rekom{{ $iterrekom }}" name="rekom"
                                                        wire:model="rekom">
                                                    <div wire:loading wire:target="rekom">
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
                                                    @error('rekom')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (!empty($rekomOld))
                                                        <p><small class="text-success"><em>File :
                                                                    Sudah
                                                                    Ada</em>
                                                            </small>
                                                            @if ($rekomOld)
                                                                @php
                                                                    $tempUrl = explode('/', $rekomOld);
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
            </form>
        @endif
    @endforeach

    @push('script')
        <script>
            window.addEventListener('openViewFile', event => {
                $("#ModalView").modal('show');
            })
            window.addEventListener('closeViewFile', event => {
                $("#ModalView").modal('hide');
            })
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
                        <div class="col-md-6">
                            {{-- <object style="height:700px; width:1110px" data="{{ asset('display/' . $url) }}"
                                type="application/pdf">
                            </object> --}}
                            <iframe src="{{ asset('display/' . $url) }}" style="width: 100%; height:800px"></iframe>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
