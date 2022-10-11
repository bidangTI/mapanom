<div>
    @foreach ($dataPermohonan as $value)
        @if (!empty($value->no_register))
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <div class="mb-1 row">
                                <label class="col-sm-1 control-label">No Register</label>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="noreg" name="noreg" disabled
                                            wire:model.defer="noreg">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <form method="post" wire:submit.prevent="loadExistingData"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div wire:loading.remove wire:target="loadExistingData">
                                            <button type="submit"
                                                class="btn btn-info rounded-pill px-2 waves-effect waves-light me-1">Reload
                                                Data</button>
                                        </div>
                                        <div wire:loading wire:target="loadExistingData">
                                            <button class="btn btn-info rounded-pill px-2 waves-effect waves-light me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12">
                    @if ($statuspersyaratan == 'N' && $notifkirim == 'Y')
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
                            {{ $ketverifikasi }}
                        </div>
                    @elseif ($statuspersyaratan == 'Y')
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
                    <h4 class="card-title">Form Kelengkapan Data</h4>
                </div>
                <form class="form-horizontal" method="post" wire:submit.prevent="store" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">No Register</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="noreg" name="noreg"
                                                disabled wire:model.defer="noreg">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kategori" name="kategori"
                                                disabled wire:model.defer="kategori">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">
                                        @if (Auth::user()->kategori_id == 1)
                                            Nama ORMAS
                                        @else
                                            Nama PARPOL
                                        @endif
                                        <span style="color:red">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <input type="text"
                                                    class="form-control @error('namaormas') is-invalid @enderror"
                                                    id="namaormas" name="namaormas" placeholder="Masukkan Nama ORMAS"
                                                    autocomplete="off" wire:model.defer="namaormas" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('namaormas') is-invalid @enderror"
                                                    id="namaormas" name="namaormas" placeholder="Masukkan Nama ORMAS"
                                                    autocomplete="off" wire:model.defer="namaormas">
                                                @error('namaormas')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">
                                        @if (Auth::user()->kategori_id == 1)
                                            Singkatan ORMAS
                                        @else
                                            Singkatan PARPOL
                                        @endif
                                        <span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <input type="text"
                                                    class="form-control @error('singormas') is-invalid @enderror"
                                                    id="singormas" name="singormas"
                                                    placeholder="Masukkan Singkatan ORMAS"
                                                    wire:model.defer="singormas" autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('singormas') is-invalid @enderror"
                                                    id="singormas" name="singormas"
                                                    placeholder="Masukkan Singkatan ORMAS"
                                                    wire:model.defer="singormas" autocomplete="off">
                                                @error('singormas')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Jenis Akta Notaris<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <select
                                                    class="form-control custom-select @error('akta') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" id="akta" name="akta"
                                                    wire:model.defer="akta" autocomplete="off" disabled>
                                                    @foreach ($dataAkta as $res)
                                                        <option value="{{ $res->id }}">{{ $res->jenis_akta }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select
                                                    class="form-control custom-select @error('akta') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" id="akta" name="akta"
                                                    wire:model.defer="akta" autocomplete="off">
                                                    <option>--- Pilih ---</option>
                                                    @foreach ($dataAkta as $res)
                                                        <option value="{{ $res->id }}">{{ $res->jenis_akta }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('akta')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Nama Notaris<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <input type="text"
                                                    class="form-control @error('namanotaris') is-invalid @enderror"
                                                    id="namanotaris" name="namanotaris"
                                                    placeholder="Masukkan Nama Notaris" wire:model.defer="namanotaris"
                                                    autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('namanotaris') is-invalid @enderror"
                                                    id="namanotaris" name="namanotaris"
                                                    placeholder="Masukkan Nama Notaris" wire:model.defer="namanotaris"
                                                    autocomplete="off">
                                                @error('namanotaris')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Nomor Akta Notaris<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <input type="text"
                                                    class="form-control @error('noakta') is-invalid @enderror"
                                                    id="noakta" name="noakta"
                                                    placeholder="Masukkan Nomor Akta Notaris"
                                                    wire:model.defer="noakta" autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('noakta') is-invalid @enderror"
                                                    id="noakta" name="noakta"
                                                    placeholder="Masukkan Nomor Akta Notaris"
                                                    wire:model.defer="noakta" autocomplete="off">
                                                @error('noakta')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tanggal Akta Notaris<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <div wire:ignore>
                                                    <span class="input-group-text">
                                                        <i data-feather="calendar" class="feather-sm"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tglnotaris') is-invalid @enderror"
                                                    id="tglnotaris" name="tglnotaris" data-dtp="dtp_vDWAw"
                                                    wire:model.defer="tglnotaris" autocomplete="off" disabled>
                                            @else
                                                <div wire:ignore>
                                                    <span class="input-group-text">
                                                        <i data-feather="calendar" class="feather-sm"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tglnotaris') is-invalid @enderror"
                                                    id="tglnotaris" name="tglnotaris" data-dtp="dtp_vDWAw"
                                                    wire:model.defer="tglnotaris" autocomplete="off">

                                                @error('tglnotaris')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Nomor Surat Permohonan<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <input type="text"
                                                    class="form-control @error('nopermohonan') is-invalid @enderror"
                                                    id="nopermohonan" name="nopermohonan"
                                                    placeholder="Masukkan Nomor Surat Permohonan"
                                                    wire:model.defer="nopermohonan" autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('nopermohonan') is-invalid @enderror"
                                                    id="nopermohonan" name="nopermohonan"
                                                    placeholder="Masukkan Nomor Surat Permohonan"
                                                    wire:model.defer="nopermohonan" autocomplete="off">
                                                @error('nopermohonan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tanggal Permohonan<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <div wire:ignore>
                                                    <span class="input-group-text">
                                                        <i data-feather="calendar" class="feather-sm"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tglpermohonan') is-invalid @enderror"
                                                    id="tglpermohonan" name="tglpermohonan" data-dtp="dtp_vDWAw"
                                                    wire:model.defer="tglpermohonan" autocomplete="off" disabled>
                                            @else
                                                <div wire:ignore>
                                                    <span class="input-group-text">
                                                        <i data-feather="calendar" class="feather-sm"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tglpermohonan') is-invalid @enderror"
                                                    id="tglpermohonan" name="tglpermohonan" data-dtp="dtp_vDWAw"
                                                    wire:model.defer="tglpermohonan" autocomplete="off">

                                                @error('tglpermohonan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Bidang Kegiatan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <select
                                                    class="form-control custom-select @error('bidang') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" id="bidang" name="bidang"
                                                    wire:model="bidang" autocomplete="off" disabled>
                                                    <option>--- Pilih ---</option>
                                                    @foreach ($dataBidangv as $res)
                                                        <option value="{{ $res->id }}">{{ $res->bidang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select
                                                    class="form-control custom-select @error('bidang') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" id="bidang" name="bidang"
                                                    wire:model="bidang" autocomplete="off">
                                                    <option>--- Pilih ---</option>
                                                    @foreach ($dataBidangv as $res)
                                                        <option value="{{ $res->id }}">{{ $res->bidang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('bidang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Sub Bidang Kegiatan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <select
                                                    class="form-control custom-select @error('subbidang') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" name="subbidang" id="subbidang"
                                                    wire:model.defer="subbidang" autocomplete="off" disabled>
                                                    <option>--- Pilih ---</option>
                                                    @if (!empty($bidang))
                                                        @foreach ($dataSubbidv as $res)
                                                            <option value="{{ $res->id }}">{{ $res->subbidang }}
                                                        @endforeach
                                                    @endif
                                                </select>
                                            @else
                                                <select
                                                    class="form-control custom-select @error('subbidang') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" name="subbidang" id="subbidang"
                                                    wire:model.defer="subbidang" autocomplete="off">
                                                    <option>--- Pilih ---</option>
                                                    @if (!empty($bidang))
                                                        @foreach ($dataSubbidv as $res)
                                                            <option value="{{ $res->id }}">{{ $res->subbidang }}
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('subbidang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Alamat Kantor<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <textarea class="form-control @error('alamatktr') is-invalid @enderror" name="alamatktr" id="alamatktr"
                                                    wire:model.defer="alamatktr" aria-label="With textarea" placeholder="Alamat Kantor"
                                                    style="height: 56px; resize: none" autocomplete="off" disabled></textarea>
                                            @else
                                                <textarea class="form-control @error('alamatktr') is-invalid @enderror" name="alamatktr" id="alamatktr"
                                                    wire:model.defer="alamatktr" aria-label="With textarea"
                                                    placeholder="Alamat Kantor Tanpa Kelurahan, Kecamatan, Kota" style="height: 56px; resize: none"
                                                    autocomplete="off"></textarea>
                                                @error('alamatktr')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Kecamatan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <select
                                                    class="form-control custom-select @error('kecamatan') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" id="kecamatan" name="kecamatan"
                                                    wire:model="kecamatan" autocomplete="off" disabled>
                                                    <option>--- Pilih ---</option>
                                                    @foreach ($datakecamatanv as $res)
                                                        <option value="{{ $res->id }}">
                                                            {{ $res->nama_kecamatan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select
                                                    class="form-control custom-select @error('kecamatan') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" id="kecamatan" name="kecamatan"
                                                    wire:model="kecamatan" autocomplete="off">
                                                    <option>--- Pilih ---</option>
                                                    @foreach ($datakecamatanv as $res)
                                                        <option value="{{ $res->id }}">
                                                            {{ $res->nama_kecamatan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kecamatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Kelurahan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <select
                                                    class="form-control custom-select @error('kelurahan') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" name="kelurahan" id="kelurahan"
                                                    wire:model.defer="kelurahan" autocomplete="off" disabled>
                                                    <option>--- Pilih ---</option>
                                                    @if (!empty($kelurahan))
                                                        @foreach ($datakelurahanv as $res)
                                                            <option value="{{ $res->id }}">
                                                                {{ $res->nama_kelurahan }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            @else
                                                <select
                                                    class="form-control custom-select @error('kelurahan') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" name="kelurahan" id="kelurahan"
                                                    wire:model.defer="kelurahan" autocomplete="off">
                                                    <option>--- Pilih ---</option>
                                                    @if (!empty($kecamatan))
                                                        @foreach ($datakelurahanv as $res)
                                                            <option value="{{ $res->id }}">
                                                                {{ $res->nama_kelurahan }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('kelurahan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Kota<span style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <select
                                                    class="form-control custom-select @error('kota') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" id="kota" name="kota"
                                                    wire:model="kota" autocomplete="off" disabled>
                                                    <option>--- Pilih ---</option>
                                                    @foreach ($datakotav as $res)
                                                        <option value="{{ $res->id }}">{{ $res->kota }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select
                                                    class="form-control custom-select @error('kota') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" id="kota" name="kota"
                                                    wire:model="kota" autocomplete="off">
                                                    <option>--- Pilih ---</option>
                                                    @foreach ($datakotav as $res)
                                                        <option value="{{ $res->id }}">{{ $res->kota }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kota')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tempat Pendirian<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <textarea class="form-control @error('tempatpendirian') is-invalid @enderror" name="tempatpendirian"
                                                    wire:model.defer="tempatpendirian" id="tempatpendirian" aria-label="With textarea"
                                                    placeholder="Tempat Pendirian" style="height: 56px; resize: none" autocomplete="off" disabled></textarea>
                                            @else
                                                <textarea class="form-control @error('tempatpendirian') is-invalid @enderror" name="tempatpendirian"
                                                    wire:model.defer="tempatpendirian" id="tempatpendirian" aria-label="With textarea"
                                                    placeholder="Tempat Pendirian" style="height: 56px; resize: none" autocomplete="off"></textarea>
                                                @error('tempatpendirian')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tanggal Pendirian<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <div wire:ignore>
                                                    <span class="input-group-text">
                                                        <i data-feather="calendar" class="feather-sm"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tglpendirian') is-invalid @enderror"
                                                    id="tglpendirian" name="tglpendirian" data-dtp="dtp_vDWAw"
                                                    wire:model.defer="tglpendirian" autocomplete="off" disabled>
                                            @else
                                                <div wire:ignore>
                                                    <span class="input-group-text">
                                                        <i data-feather="calendar" class="feather-sm"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tglpendirian') is-invalid @enderror"
                                                    id="tglpendirian" name="tglpendirian" data-dtp="dtp_vDWAw"
                                                    wire:model.defer="tglpendirian" autocomplete="off">

                                                @error('tglpendirian')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Nomor SK Kepengurusan<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <input type="text"
                                                    class="form-control @error('skpengurus') is-invalid @enderror"
                                                    id="skpengurus" name="skpengurus"
                                                    placeholder="Masukkan Nomor SK Kepengurusan"
                                                    wire:model.defer="skpengurus" autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('skpengurus') is-invalid @enderror"
                                                    id="skpengurus" name="skpengurus"
                                                    placeholder="Masukkan Nomor SK Kepengurusan"
                                                    wire:model.defer="skpengurus" autocomplete="off">
                                                @error('skpengurus')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Keputusan Tertinggi<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <textarea class="form-control @error('keputusan') is-invalid @enderror" name="keputusan" id="keputusan"
                                                    wire:model.defer="keputusan" aria-label="With textarea" placeholder="Keputusan Tertinggi Organisasi"
                                                    style="height: 56px; resize: none" autocomplete="off" disabled></textarea>
                                            @else
                                                <textarea class="form-control @error('keputusan') is-invalid @enderror" name="keputusan" id="keputusan"
                                                    wire:model.defer="keputusan" aria-label="With textarea" placeholder="Keputusan Tertinggi Organisasi"
                                                    style="height: 56px; resize: none" autocomplete="off"></textarea>
                                                @error('keputusan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-3 control-label">Kepengurusan<span
                                            style="color:red">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <select
                                                    class="form-control custom-select @error('kepengurusan') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" name="kepengurusan"
                                                    id="kepengurusan" wire:model.defer="kepengurusan"
                                                    autocomplete="off" disabled>
                                                    <option>--- Pilih ---</option>
                                                    @foreach ($DataKepengurusan as $res)
                                                        <option value="{{ $res->id }}">{{ $res->kepengurusan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select
                                                    class="form-control custom-select @error('kepengurusan') is-invalid @enderror"
                                                    style="width: 100%; height:36px;" name="kepengurusan"
                                                    id="kepengurusan" wire:model.defer="kepengurusan"
                                                    autocomplete="off">
                                                    <option>--- Pilih ---</option>
                                                    @foreach ($DataKepengurusan as $res)
                                                        <option value="{{ $res->id }}">{{ $res->kepengurusan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kepengurusan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">NPWP<span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <input type="text"
                                                    class="form-control @error('npwp') is-invalid @enderror"
                                                    id="npwp" name="npwp" wire:model.defer="npwp"
                                                    placeholder="Masukkan Nomor NPWP Organisasi Kemasyarakatan"
                                                    autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('npwp') is-invalid @enderror"
                                                    id="npwp" name="npwp" wire:model.defer="npwp"
                                                    placeholder="Masukkan Nomor NPWP Organisasi Kemasyarakatan"
                                                    autocomplete="off">
                                                @error('npwp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Sumber Dana<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <input type="text"
                                                    class="form-control @error('sumberdana') is-invalid @enderror"
                                                    id="sumberdana" name="sumberdana" wire:model.defer="sumberdana"
                                                    placeholder="Masukkan Sumber Dana" autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('sumberdana') is-invalid @enderror"
                                                    id="sumberdana" name="sumberdana" wire:model.defer="sumberdana"
                                                    placeholder="Masukkan Sumber Dana" autocomplete="off">
                                                @error('sumberdana')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tujuan ORMAS<span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-12">
                                        @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                            <div wire:ignore>
                                                <textarea class="summernote @error('tujuanormas') is-invalid @enderror" id="tujuanormas_setuju" name="tujuanormas"
                                                    wire:model.defer="tujuanormas" autocomplete="off">
                                    </textarea>
                                            </div>
                                        @else
                                            <div wire:ignore>
                                                <textarea class="summernote @error('tujuanormas') is-invalid @enderror" id="tujuanormas" name="tujuanormas"
                                                    wire:model.defer="tujuanormas" autocomplete="off">
                                    </textarea>
                                            </div>
                                            @error('tujuanormas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>

                                <div class="border-bottom"></div><br>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">No. SK KEMENKUMHAM/KEMENDAGRI</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <input type="text"
                                                    class="form-control @error('skahu') is-invalid @enderror"
                                                    id="skahu" name="skahu" placeholder="Nomor SK"
                                                    wire:model.defer="skahu" autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('skahu') is-invalid @enderror"
                                                    id="skahu" name="skahu" placeholder="Nomor SK"
                                                    wire:model.defer="skahu" autocomplete="off">
                                                @error('skahu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tanggal SK</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <div wire:ignore>
                                                    <span class="input-group-text">
                                                        <i data-feather="calendar" class="feather-sm"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tglskahu') is-invalid @enderror"
                                                    id="tglskahu" name="tglskahu" data-dtp="dtp_vDWAw"
                                                    wire:model.defer="tglskahu" autocomplete="off" disabled>
                                            @else
                                                <div wire:ignore>
                                                    <span class="input-group-text">
                                                        <i data-feather="calendar" class="feather-sm"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tglskahu') is-invalid @enderror"
                                                    id="tglskahu" name="tglskahu" data-dtp="dtp_vDWAw"
                                                    wire:model.defer="tglskahu" autocomplete="off">

                                                @error('tglskahu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 control-label">Tahun</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            @if ($verifikasi == 1 && $statuspersyaratan == 'Y')
                                                <input type="text"
                                                    class="form-control @error('tahunahu') is-invalid @enderror"
                                                    id="tahunahu" name="tahunahu" placeholder="Tahun SK"
                                                    onkeypress="return hanyaAngka(event)" autocomplete="off"
                                                    wire:model.defer="tahunahu" autocomplete="off" disabled>
                                            @else
                                                <input type="text"
                                                    class="form-control @error('tahunahu') is-invalid @enderror"
                                                    id="tahunahu" name="tahunahu" placeholder="Tahun SK"
                                                    onkeypress="return hanyaAngka(event)" autocomplete="off"
                                                    wire:model.defer="tahunahu" autocomplete="off">
                                                @error('tahunahu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($dataPermohonan as $value)
                        @if ($value->permohonan_id != 1 && $value->status_persyaratan == 'Y' && $value->notifikasi_kirim == 'N')
                        @elseif ($value->permohonan_id == 1 && (empty($value->status_persyaratan) && empty($value->notifikasi_kirim)))
                            <div class="p-3 border-top">
                                <div class="d-flex">
                                    {{-- submit --}}
                                    <div wire:loading.remove wire:target="store">
                                        <button type="submit"
                                            class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                    </div>
                                    <div wire:loading wire:target="store">
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
                                        <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                            type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @elseif ($value->permohonan_id != 1 && $value->status_persyaratan == 'N' && $value->notifikasi_kirim == 'Y')
                            <div class="p-3 border-top">
                                <div class="d-flex">
                                    {{-- submit --}}
                                    <div wire:loading.remove wire:target="store">
                                        <button type="submit"
                                            class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                    </div>
                                    <div wire:loading wire:target="store">
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
                                        <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                            type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </form>
            </div>
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

            // Before Action
            $(document).ready(function() {
                init();
            });

            $('#tglnotaris').on('change', function(e) {
                @this.set('tglnotaris', e.target.value);
            });
            $('#tglpermohonan').on('change', function(e) {
                @this.set('tglpermohonan', e.target.value);
            });
            $('#tglpendirian').on('change', function(e) {
                @this.set('tglpendirian', e.target.value);
            });
            $('#tglskahu').on('change', function(e) {
                @this.set('tglskahu', e.target.value);
            });

            $('#akta').on('change', function(e) {
                @this.set('akta', e.target.value);
            });

            $('#bidang').on('change', function(e) {
                @this.set('bidang', e.target.value);
            });
            $('#subbidang').on('change', function(e) {
                @this.set('subbidang', e.target.value);
            });
            $('#kota').on('change', function(e) {
                @this.set('kota', e.target.value);
            });
            $('#kecamatan').on('change', function(e) {
                @this.set('kecamatan', e.target.value);
            });
            $('#kelurahan').on('change', function(e) {
                @this.set('kelurahan', e.target.value);
            });

            $('#kepengurusan').on('change', function(e) {
                @this.set('kepengurusan', e.target.value);
            });

            window.livewire.hook('message.processed', (message, component) => {
                init();
            });

            // After Action
            function init() {
                $('#kerjaormas').summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    disableDragAndDrop: true,
                    codeviewFilter: false,
                    codeviewIframeFilter: true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('kerjaormas', e);
                        },
                    }
                });

                $('#tujuanormas').summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    disableDragAndDrop: true,
                    codeviewFilter: false,
                    codeviewIframeFilter: true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('tujuanormas', e);
                        },
                    }
                });

                $('#tujuanormas_setuju').summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: false,
                    disableDragAndDrop: true,
                    codeviewFilter: false,
                    codeviewIframeFilter: true,
                    callbacks: {
                        onChange: function(e) {
                            @this.set('tujuanormas_setuju', e);
                        },
                    }
                });
                $('#tujuanormas_setuju').summernote('disable');


                $('#tglnotaris').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });
                $('#tglpermohonan').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });
                $('#tglpendirian').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });
                $('#tglskahu').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });

                $('#akta').select2({
                    placeholder: '--- Pilih ---'
                });
                $('#bidang').select2({
                    placeholder: '--- Pilih ---'
                });
                $('#subbidang').select2({
                    placeholder: '--- Pilih ---'
                });
                $('#kota').select2({
                    placeholder: '--- Pilih ---'
                });
                $('#kecamatan').select2({
                    placeholder: '--- Pilih ---'
                });
                $('#kelurahan').select2({
                    placeholder: '--- Pilih ---'
                });

                $('#kepengurusan').select2({
                    placeholder: '--- Pilih ---'
                });
            }

            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }

            // Reset Summernote
            Livewire.on('tujuanormas', () => {
                $('#tujuanormas').summernote('reset');
            });
            Livewire.on('kerjaormas', () => {
                $('#kerjaormas').summernote('reset');
            });
        </script>
    @endpush
</div>
