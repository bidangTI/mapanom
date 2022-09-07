<div>
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
                            <form method="post" wire:submit.prevent="loadExistingData" enctype="multipart/form-data">
                                @csrf
                                <div wire:loading.remove wire:target="loadExistingData">
                                    <button type="submit"
                                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Reload
                                        Data</button>
                                </div>
                                <div wire:loading wire:target="loadExistingData">
                                    <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
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

    <form class="form-horizontal" method="post" wire:submit.prevent="store_dokumen" enctype="multipart/form-data">
        @csrf
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
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('srtpermohonan') is-invalid @enderror"
                                        type="file" id="srtpermohonan{{ $itersrtpermohonan }}" name="srtpermohonan"
                                        wire:model="srtpermohonan">
                                    <div wire:loading wire:target="srtpermohonan">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('srtpermohonan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($srtpermohonanOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em></small></p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="lambang" class="col-sm-3 form-label">Lambang
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('lambang') is-invalid @enderror" type="file"
                                        id="lambang{{ $iterlambang }}" name="lambang" wire:model="lambang">
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

                                    @if (!empty($lambangOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="stempel" class="col-sm-3 form-label">Stempel
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('stempel') is-invalid @enderror" type="file"
                                        id="stempel{{ $iterstempel }}" name="stempel" wire:model="stempel">
                                    <div wire:loading wire:target="stempel">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('stempel')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($stempelOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="aktanotaris" class="col-sm-3 form-label">Akta Notaris
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('aktanotaris') is-invalid @enderror"
                                        type="file" id="aktanotaris{{ $iteraktanotaris }}" name="aktanotaris"
                                        wire:model="aktanotaris">
                                    <div wire:loading wire:target="aktanotaris">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('aktanotaris')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($aktanotarisOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="adart" class="col-sm-3 form-label">AD ART
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('adart') is-invalid @enderror" type="file"
                                        id="adart{{ $iteradart }}" name="adart" wire:model="adart">
                                    <div wire:loading wire:target="adart">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('adart')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($adartOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="srtkepengurusan" class="col-sm-3 form-label">Surat Keputusan Kepengurusan
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('srtkepengurusan') is-invalid @enderror"
                                        type="file" id="srtkepengurusan{{ $itersrtkepengurusan }}"
                                        name="srtkepengurusan" wire:model="srtkepengurusan">
                                    <div wire:loading wire:target="srtkepengurusan">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('srtkepengurusan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($srtkepengurusanOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="srtpernyataan" class="col-sm-3 form-label">Surat Pernyataan
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('srtpernyataan') is-invalid @enderror"
                                        type="file" id="srtpernyataan{{ $itersrtpernyataan }}"
                                        name="srtpernyataan" wire:model="srtpernyataan">
                                    <div wire:loading wire:target="srtpernyataan">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('srtpernyataan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($srtpernyataanOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3 row">
                            <label for="srtdomisili" class="col-sm-3 form-label">Surat Keterangan Domisili Kantor
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('srtdomisili') is-invalid @enderror"
                                        type="file" id="srtdomisili{{ $itersrtdomisili }}" name="srtdomisili"
                                        wire:model="srtdomisili">
                                    <div wire:loading wire:target="srtdomisili">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('srtdomisili')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($srtdomisiliOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="srtkepemilikan" class="col-sm-3 form-label">Surat Kepemilikan Kantor
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('srtkepemilikan') is-invalid @enderror"
                                        type="file" id="srtkepemilikan{{ $itersrtkepemilikan }}"
                                        name="srtkepemilikan" wire:model="srtkepemilikan">
                                    <div wire:loading wire:target="srtkepemilikan">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('srtkepemilikan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($srtkepemilikanOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="fotokantor" class="col-sm-3 form-label">Foto Kantor Tampak Depan Dengan Plakat
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('fotokantor') is-invalid @enderror"
                                        type="file" id="fotokantor{{ $iterfotokantor }}" name="fotokantor"
                                        wire:model="fotokantor">
                                    <div wire:loading wire:target="fotokantor">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('fotokantor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($fotokantorOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="skuha" class="col-sm-3 form-label">SK KEMENKUM HAM
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('skuha') is-invalid @enderror" type="file"
                                        id="skuha{{ $iterskuha }}" name="skuha" wire:model="skuha">
                                    <div wire:loading wire:target="skuha">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('skuha')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($skuhaOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="rekom" class="col-sm-3 form-label">Surat Rekomendasi
                                <span style="color:red">*</span>
                                <br>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        <span style="font-size:12px; color:brown">**) FIle Pdf - Max. 512 kb</span>
                                </small>
                                <small class="form-control-feedback"><span style="font-style: italic">
                                        Dari Kementerian dan/atau perangkat daerah yang melaksanakan urusan kekhususan
                                        bidang keagamaan/kebudayaan kepada Tuhan YME.
                                </small>
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control @error('rekom') is-invalid @enderror" type="file"
                                        id="rekom{{ $iterrekom }}" name="rekom" wire:model="rekom">
                                    <div wire:loading wire:target="rekom">
                                        <small class="form-text text-muted"><em>Sedang Upload File ...</em>
                                            <div class="progress mt-1">
                                                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 100%"></div>
                                            </div>
                                        </small>
                                    </div>
                                    @error('rekom')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if (!empty($rekomOld))
                                        <p><small class="text-success"><em>File Surat Permohonan : Sudah
                                                    Ada</em>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($dataPermohonan as $value)
                @if ($value->permohonan_id != 1)
                @else
                    <div class="p-3 border-top">
                        <div class="d-flex">
                            {{-- submit --}}
                            <div wire:loading.remove wire:target="store_dokumen">
                                <button type="submit"
                                    class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Save</button>
                            </div>
                            <div wire:loading wire:target="store_dokumen">
                                <button class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                    type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>

                            {{-- reset --}}
                            {{-- <div wire:loading.remove wire:target="123">
                        <button type="button" wire:click="123"
                            class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                    </div>
                    <div wire:loading wire:target="123">
                        <button class="btn btn-dark rounded-pill px-4 waves-effect waves-light" type="button"
                            disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div> --}}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </form>

    @push('script')
        <script></script>
    @endpush
</div>
