<div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <form method="post" wire:submit.prevent="cariData" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1 row">
                            <label class="col-sm-1 control-label">No Register</label>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="noregcari" name="noregcari"
                                        wire:model.defer="noregcari" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div wire:loading.remove wire:target="cariData">
                                    <button type="submit"
                                        class="btn btn-info rounded-pill px-2 waves-effect waves-light me-1">Cari
                                        Data</button>
                                </div>
                                <div wire:loading wire:target="cariData">
                                    <button class="btn btn-info rounded-pill px-2 waves-effect waves-light me-1"
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
    <form class="mt-4" method="post" wire:submit.prevent="store_all" enctype="multipart/form-data">
        @csrf
        @if (!empty($this->noreg))
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <div class="d-flex">
                                        <div wire:loading.remove wire:target="store_all">
                                            <button type="submit"
                                                class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                        </div>
                                        <div wire:loading wire:target="store_all">
                                            <button class="btn btn-info rounded-pill px-2 waves-effect waves-light me-1"
                                                type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        </div>
                                        {{-- <div wire:loading.remove wire:target="resetLainnya">
                                        <button type="button" wire:click="resetLainnya"
                                            class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                    </div>
                                    <div wire:loading wire:target="resetLainnya">
                                        <button class="btn btn-dark rounded-pill px-2 waves-effect waves-light"
                                            type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div> --}}
                                    </div>
                                </div>
                                {{-- <label class="col-sm-1 control-label">No Register</label> --}}
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" id="noreg" name="noreg"
                                            disabled wire:model.defer="noreg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="border-bottom title-part-padding">
                        <h4 class="card-title mb-0">Ketua</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-4 control-label">Nama
                                <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    @if (empty($this->noreg))
                                        <input type="text"
                                            class="form-control @error('namaketua') is-invalid @enderror" id="namaketua"
                                            name="namaketua" placeholder="Nama Ketua" wire:model.defer="namaketua"
                                            autocomplete="off" disabled>
                                    @else
                                        <input type="text"
                                            class="form-control @error('namaketua') is-invalid @enderror" id="namaketua"
                                            name="namaketua" placeholder="Nama Ketua" wire:model.defer="namaketua"
                                            autocomplete="off">

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
                            <label class="col-sm-4 control-label">NIK
                                <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    @if (empty($this->noreg))
                                        <input type="text"
                                            class="form-control @error('nikketua') is-invalid @enderror" id="nikketua"
                                            name="nikketua" placeholder="NIK Ketua"
                                            onkeypress="return hanyaAngka(event)" autocomplete="off"
                                            wire:model.defer="nikketua" disabled>
                                    @else
                                        <input type="text"
                                            class="form-control @error('nikketua') is-invalid @enderror" id="nikketua"
                                            name="nikketua" placeholder="NIK Ketua"
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
                            <label class="col-sm-4 control-label">Masa Bakti
                                <span style="color:red">*</span></label>
                            <div class="col-lg-8">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <div wire:ignore>
                                            <span class="input-group-text">
                                                <i class="bi-calendar"></i>
                                            </span>
                                        </div>
                                        @if (empty($this->noreg))
                                            <input type="text"
                                                class="form-control @error('awalketua') is-invalid @enderror"
                                                id="awalketua" name="awalketua" placeholder="Tanggal Awal"
                                                data-dtp="dtp_vDWAw" wire:model.defer="awalketua" disabled>
                                            @error('awalketua')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <span
                                                style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                            <div wire:ignore>
                                                <span class="input-group-text">
                                                    <i class="bi-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('akhirketua') is-invalid @enderror"
                                                id="akhirketua" name="akhirketua" placeholder="Tanggal Akhir"
                                                data-dtp="dtp_vDWAw" wire:model.defer="akhirketua" disabled>
                                            @error('akhirketua')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
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
                                                    <i class="bi-calendar"></i>
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
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label class="col-sm-4 control-label">Upload KTP
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                            kb</span>
                                </small>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    @if (empty($this->noreg))
                                        <input class="form-control @error('ktpketua') is-invalid @enderror"
                                            type="file" id="ktpketua{{ $iterKtpKetua }}" name="ktpketua"
                                            placeholder="KTP Ketua" wire:model="ktpketua" disabled>
                                    @else
                                        <input class="form-control @error('ktpketua') is-invalid @enderror"
                                            type="file" id="ktpketua{{ $iterKtpKetua }}" name="ktpketua"
                                            placeholder="KTP Ketua" wire:model="ktpketua">
                                        <div wire:loading wire:target="ktpketua">
                                            <small class="form-text text-muted"><em>Sedang Upload File
                                                    ...</em>
                                                <div class="progress mt-1">
                                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                        role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%"></div>
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
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label class="col-sm-4 control-label">Upload Foto
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                            kb</span>
                                </small>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    @if (empty($this->noreg))
                                        <input class="form-control @error('fotoketua') is-invalid @enderror"
                                            type="file" id="fotoketua{{ $iterFotoKetua }}" name="fotoketua"
                                            placeholder="Foto Ketua" wire:model="fotoketua" disabled>
                                    @else
                                        <input class="form-control @error('fotoketua') is-invalid @enderror"
                                            type="file" id="fotoketua{{ $iterFotoKetua }}" name="fotoketua"
                                            placeholder="Foto Ketua" wire:model="fotoketua">
                                        <div wire:loading wire:target="fotoketua">
                                            <small class="form-text text-muted"><em>Sedang Upload File
                                                    ...</em>
                                                <div class="progress mt-1">
                                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                        role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%"></div>
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
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-4 control-label">Upload Daftar Riwayat Hidup
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                            kb</span>
                                </small>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    @if (empty($this->noreg))
                                        <input class="form-control @error('cvketua') is-invalid @enderror"
                                            type="file" id="cvketua {{ $iterCvKetua }}" name="cvketua"
                                            placeholder="CV Ketua" wire:model="cvketua" disabled>
                                    @else
                                        <input class="form-control @error('cvketua') is-invalid @enderror"
                                            type="file" id="cvketua {{ $iterCvKetua }}" name="cvketua"
                                            placeholder="CV Ketua" wire:model="cvketua">

                                        <div wire:loading wire:target="cvketua">
                                            <small class="form-text text-muted"><em>Sedang Upload File
                                                    ...</em>
                                                <div class="progress mt-1">
                                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                        role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%"></div>
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
                            <label for="nama" class="col-sm-4 control-label">Nama
                                <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    @if (empty($this->noreg))
                                        <input type="text"
                                            class="form-control @error('namasekretaris') is-invalid @enderror"
                                            id="namasekretaris" name="namasekretaris" placeholder="Nama Sekretaris"
                                            wire:model.defer="namasekretaris" autocomplete="off" disabled>
                                    @else
                                        <input type="text"
                                            class="form-control @error('namasekretaris') is-invalid @enderror"
                                            id="namasekretaris" name="namasekretaris" placeholder="Nama Sekretaris"
                                            wire:model.defer="namasekretaris" autocomplete="off">
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
                            <label class="col-sm-4 control-label">NIK
                                <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    @if (empty($this->noreg))
                                        <input type="text"
                                            class="form-control @error('niksekretaris') is-invalid @enderror"
                                            id="niksekretaris" name="niksekretaris" placeholder="NIK Sekretaris"
                                            onkeypress="return hanyaAngka(event)" autocomplete="off"
                                            wire:model.defer="niksekretaris" disabled>
                                    @else
                                        <input type="text"
                                            class="form-control @error('niksekretaris') is-invalid @enderror"
                                            id="niksekretaris" name="niksekretaris" placeholder="NIK Sekretaris"
                                            onkeypress="return hanyaAngka(event)" autocomplete="off"
                                            wire:model.defer="niksekretaris">
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
                            <label class="col-sm-4 control-label">Masa Bakti
                                <span style="color:red">*</span></label>
                            <div class="col-lg-8">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <div wire:ignore>
                                            <span class="input-group-text">
                                                <i class="bi-calendar"></i>
                                            </span>
                                        </div>
                                        @if (empty($this->noreg))
                                            <input type="text"
                                                class="form-control @error('awalsekretaris') is-invalid @enderror"
                                                id="awalsekretaris" name="awalsekretaris" placeholder="Tanggal Awal"
                                                data-dtp="dtp_vDWAw" wire:model.defer="awalsekretaris" disabled>
                                        @else
                                            <input type="text"
                                                class="form-control @error('awalsekretaris') is-invalid @enderror"
                                                id="awalsekretaris" name="awalsekretaris" placeholder="Tanggal Awal"
                                                data-dtp="dtp_vDWAw" wire:model.defer="awalsekretaris">
                                            @error('awalsekretaris')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif

                                        <span
                                            style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                        <div wire:ignore>
                                            <span class="input-group-text">
                                                <i class="bi-calendar"></i>
                                            </span>
                                        </div>
                                        @if (empty($this->noreg))
                                            <input type="text"
                                                class="form-control @error('akhirsekretaris') is-invalid @enderror"
                                                id="akhirsekretaris" name="akhirsekretaris"
                                                placeholder="Tanggal Akhir" data-dtp="dtp_vDWAw"
                                                wire:model.defer="akhirsekretaris" disabled>
                                        @else
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
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-4 control-label">Upload KTP
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                            kb</span>
                                </small>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    @if (empty($this->noreg))
                                        <input class="form-control @error('ktpsekretaris') is-invalid @enderror"
                                            type="file" id="ktpsekretaris{{ $iterKtpSekretaris }}"
                                            name="ktpsekretaris" placeholder="KTP sekretaris"
                                            wire:model="ktpsekretaris" disabled>
                                    @else
                                        <input class="form-control @error('ktpsekretaris') is-invalid @enderror"
                                            type="file" id="ktpsekretaris{{ $iterKtpSekretaris }}"
                                            name="ktpsekretaris" placeholder="KTP sekretaris"
                                            wire:model="ktpsekretaris">
                                        <div wire:loading wire:target="ktpsekretaris">
                                            <small class="form-text text-muted"><em>Sedang Upload File
                                                    ...</em>
                                                <div class="progress mt-1">
                                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                        role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%"></div>
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
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-4 control-label">Upload Foto
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                            kb</span>
                                </small>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    @if (empty($this->noreg))
                                        <input class="form-control @error('fotosekretaris') is-invalid @enderror"
                                            type="file" id="fotosekretaris{{ $iterFotoSekretaris }}"
                                            name="fotosekretaris" placeholder="Foto sekretaris"
                                            wire:model="fotosekretaris" disabled>
                                    @else
                                        <input class="form-control @error('fotosekretaris') is-invalid @enderror"
                                            type="file" id="fotosekretaris{{ $iterFotoSekretaris }}"
                                            name="fotosekretaris" placeholder="Foto sekretaris"
                                            wire:model="fotosekretaris">

                                        <div wire:loading wire:target="fotosekretaris">
                                            <small class="form-text text-muted"><em>Sedang Upload File
                                                    ...</em>
                                                <div class="progress mt-1">
                                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                        role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%"></div>
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
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-4 control-label">Upload Daftar Riwayat Hidup
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                            kb</span>
                                </small>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    @if (empty($this->noreg))
                                        <input class="form-control @error('cvsekretaris') is-invalid @enderror"
                                            type="file" id="cvsekretaris {{ $iterCvSekretaris }}"
                                            name="cvsekretaris" placeholder="CV sekretaris" wire:model="cvsekretaris"
                                            disabled>
                                    @else
                                        <input class="form-control @error('cvsekretaris') is-invalid @enderror"
                                            type="file" id="cvsekretaris {{ $iterCvSekretaris }}"
                                            name="cvsekretaris" placeholder="CV sekretaris"
                                            wire:model="cvsekretaris">
                                        <div wire:loading wire:target="cvsekretaris">
                                            <small class="form-text text-muted"><em>Sedang Upload File
                                                    ...</em>
                                                <div class="progress mt-1">
                                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                        role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%"></div>
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
                            <label for="nama" class="col-sm-4 control-label">Nama
                                <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    @if (empty($this->noreg))
                                        <input type="text"
                                            class="form-control @error('namabendahara') is-invalid @enderror"
                                            id="namabendahara" name="namabendahara" placeholder="Nama Bendahara"
                                            wire:model.defer="namabendahara" autocomplete="off" disabled>
                                    @else
                                        <input type="text"
                                            class="form-control @error('namabendahara') is-invalid @enderror"
                                            id="namabendahara" name="namabendahara" placeholder="Nama Bendahara"
                                            wire:model.defer="namabendahara" autocomplete="off">
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
                            <label class="col-sm-4 control-label">NIK
                                <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    @if (empty($this->noreg))
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
                            <label class="col-sm-4 control-label">Masa Bakti
                                <span style="color:red">*</span></label>
                            <div class="col-lg-8">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <div wire:ignore>
                                            <span class="input-group-text">
                                                <i class="bi-calendar"></i>
                                            </span>
                                        </div>
                                        @if (empty($this->noreg))
                                            <input type="text"
                                                class="form-control @error('awalbendahara') is-invalid @enderror"
                                                id="awalbendahara" name="awalbendahara" placeholder="Tanggal Awal"
                                                data-dtp="dtp_vDWAw" wire:model.defer="awalbendahara" disabled>
                                        @else
                                            <input type="text"
                                                class="form-control @error('awalbendahara') is-invalid @enderror"
                                                id="awalbendahara" name="awalbendahara" placeholder="Tanggal Awal"
                                                data-dtp="dtp_vDWAw" wire:model.defer="awalbendahara">
                                            @error('awalbendahara')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif
                                        <span
                                            style="font-size: 20px; padding-left: 20px; padding-right: 20px"><b>-</b></span>

                                        <div wire:ignore>
                                            <span class="input-group-text">
                                                <i class="bi-calendar"></i>
                                            </span>
                                        </div>
                                        @if (empty($this->noreg))
                                            <input type="text"
                                                class="form-control @error('akhirbendahara') is-invalid @enderror"
                                                id="akhirbendahara" name="akhirbendahara" placeholder="Tanggal Akhir"
                                                data-dtp="dtp_vDWAw" wire:model.defer="akhirbendahara" disabled>
                                        @else
                                            <input type="text"
                                                class="form-control @error('akhirbendahara') is-invalid @enderror"
                                                id="akhirbendahara" name="akhirbendahara" placeholder="Tanggal Akhir"
                                                data-dtp="dtp_vDWAw" wire:model.defer="akhirbendahara">
                                            @error('akhirbendahara')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-4 control-label">Upload KTP
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                            kb</span>
                                </small>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    @if (empty($this->noreg))
                                        <input class="form-control @error('ktpbendahara') is-invalid @enderror"
                                            type="file" id="ktpbendahara{{ $iterKtpBendahara }}"
                                            name="ktpbendahara" placeholder="KTP bendahara" wire:model="ktpbendahara"
                                            disabled>
                                    @else
                                        <input class="form-control @error('ktpbendahara') is-invalid @enderror"
                                            type="file" id="ktpbendahara{{ $iterKtpBendahara }}"
                                            name="ktpbendahara" placeholder="KTP bendahara"
                                            wire:model="ktpbendahara">
                                        <div wire:loading wire:target="ktpbendahara">
                                            <small class="form-text text-muted"><em>Sedang Upload File
                                                    ...</em>
                                                <div class="progress mt-1">
                                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                        role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%"></div>
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
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-4 control-label">Upload Foto
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                            kb</span>
                                </small>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    @if (empty($this->noreg))
                                        <input class="form-control @error('fotobendahara') is-invalid @enderror"
                                            type="file" id="fotobendahara{{ $iterFotoBendahara }}"
                                            name="fotobendahara" placeholder="Foto bendahara"
                                            wire:model="fotobendahara" disabled>
                                    @else
                                        <input class="form-control @error('fotobendahara') is-invalid @enderror"
                                            type="file" id="fotobendahara{{ $iterFotoBendahara }}"
                                            name="fotobendahara" placeholder="Foto bendahara"
                                            wire:model="fotobendahara">
                                        <div wire:loading wire:target="fotobendahara">
                                            <small class="form-text text-muted"><em>Sedang Upload File
                                                    ...</em>
                                                <div class="progress mt-1">
                                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                        role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%"></div>
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
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-4 control-label">Upload Daftar Riwayat Hidup
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512
                                            kb</span>
                                </small>
                            </label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    @if (empty($this->noreg))
                                        <input class="form-control @error('cvbendahara') is-invalid @enderror"
                                            type="file" id="cvbendahara {{ $iterCvBendahara }}"
                                            name="cvbendahara" placeholder="CV bendahara" wire:model="cvbendahara"
                                            disabled>
                                    @else
                                        <input class="form-control @error('cvbendahara') is-invalid @enderror"
                                            type="file" id="cvbendahara {{ $iterCvBendahara }}"
                                            name="cvbendahara" placeholder="CV bendahara" wire:model="cvbendahara">
                                        <div wire:loading wire:target="cvbendahara">
                                            <small class="form-text text-muted"><em>Sedang Upload File
                                                    ...</em>
                                                <div class="progress mt-1">
                                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                        role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%"></div>
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
                                <label for="nama" class="col-sm-4 control-label">Nama Pendiri
                                    <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        @if (empty($this->noreg))
                                            <textarea class="form-control @error('namapendiri') is-invalid @enderror" name="namapendiri" id="namapendiri"
                                                aria-label="With textarea" placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;"
                                                style="height: 56px" wire:model.defer="namapendiri" autocomplete="off" disabled>
                                            </textarea>
                                        @else
                                            <textarea class="form-control @error('namapendiri') is-invalid @enderror" name="namapendiri" id="namapendiri"
                                                aria-label="With textarea" placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;"
                                                style="height: 56px" wire:model.defer="namapendiri" autocomplete="off">
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
                                <label class="col-sm-4 control-label">NIK Pendiri
                                    <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        @if (empty($this->noreg))
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 border-bottom">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-4 control-label">Nama Pembina
                                    <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        @if (empty($this->noreg))
                                            <textarea class="form-control @error('namapembina') is-invalid @enderror" name="namapembina" id="namapembina"
                                                aria-label="With textarea" placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;"
                                                style="height: 56px" wire:model.defer="namapembina" autocomplete="off" disabled>
                                                </textarea>
                                        @else
                                            <textarea class="form-control @error('namapembina') is-invalid @enderror" name="namapembina" id="namapembina"
                                                aria-label="With textarea" placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;"
                                                style="height: 56px" wire:model.defer="namapembina" autocomplete="off">
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
                                <label class="col-sm-4 control-label">NIK Pembina
                                    <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        @if (empty($this->noreg))
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 border-bottom">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-4 control-label">Nama Penasihat
                                    <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        @if (empty($this->noreg))
                                            <textarea class="form-control @error('namapenasihat') is-invalid @enderror" name="namapenasihat" id="namapenasihat"
                                                aria-label="With textarea" placeholder="Jika lebih dari 1 orang silahkan isi beberapa nama dengan tanda pemisah ;"
                                                style="height: 56px" wire:model.defer="namapenasihat" autocomplete="off" disabled>
                                                </textarea>
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
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-4 control-label">NIK Penasihat
                                    <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        @if (empty($this->noreg))
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom">
                            <span style="font-style: italic"><b>Catatan :</b> Untuk Nama & NIK Pendiri,
                                Pembina dan
                                Penasihat Jika lebih dari 1 silahkan pisahkan dengan tanda ;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

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

            window.addEventListener('swal:cek', event => {
                Swal.fire({
                    title: event.detail.message,
                    icon: event.detail.type
                })
            });

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
                        <div class="col-md-6">
                            <iframe src="{{ asset('display/' . $url) }}" style="height:700px; width:1110px"></iframe>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
