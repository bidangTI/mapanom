<div>
    @if (empty($dataKeberadaan))
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <h4 class="card-title">Form Perubahan Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <span class="badge bg-light-warning text-warning font-medium">
                                        <h4><b>Belum Dapat Melakukan Proses Perubahan Data</b></h4>
                                    </span>

                                    <p>
                                        Data Yang dapat dilakukan perubahan secara online adalah data yang ada didalam
                                        penerbitan
                                        surat keberadaan, diantaranya :
                                    <ol>
                                        <li>Nama Ormas</li>
                                        <li>Alamat Kantor/Sekretariat</li>
                                        <li>Nomor SK KEMENKUM HAM / SKT KEMENDAGRI</li>
                                    </ol>
                                    </p>
                                    <p>
                                        Untuk perubahan selain tersebut diatas harap menghubungi Badan Kesatuan Bangsa
                                        dan
                                        Politik Kota Surakarta.
                                    </p>
                                    <p>
                                        Apabila sudah melakukan perubahan untuk data tersebut diatas, maka surat
                                        keberadaan yang terbit sebelum perubahan data ini dinyatakan tidak berlaku,
                                        dan akan diterbitkan surat baru setelah proses verifikasi yang dialkukan oleh
                                        Verifikator Data Badan Kesatuan Bangsa dan Politik Kota Surakarta.
                                        <br>Apabila proses verifikasi selesai surat keberadaan baru dapat di download di
                                        menu <b><a href="{{ route('kirim-ormas') }}">Status Permohonan</a></b> pada
                                        <b>Aplikasi SIPP MAS</b>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
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
                                        <div class="col-lg-6">
                                            <span class="badge bg-light-warning text-warning font-medium"><b>Data
                                                    Lama</b></span>
                                            <div class="border-bottom"></div><br>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">No Register</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="noreg"
                                                            name="noreg" wire:model.defer="noreg" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">
                                                    @if (Auth::user()->kategori_id == 1)
                                                        Nama ORMAS
                                                    @else
                                                        Nama PARPOL
                                                    @endif

                                                </label>
                                                <div class="col-sm-8">
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
                                                <label class="col-sm-4 control-label">
                                                    @if (Auth::user()->kategori_id == 1)
                                                        Singkatan ORMAS
                                                    @else
                                                        Singkatan PARPOL
                                                    @endif
                                                </label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('singormas') is-invalid @enderror"
                                                            id="singormas" name="singormas"
                                                            placeholder="Masukkan Singkatan ORMAS"
                                                            wire:model.defer="singormas" autocomplete="off" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border-bottom"></div><br>

                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">Alamat Kantor</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <textarea class="form-control @error('alamatktr') is-invalid @enderror" name="alamatktr" id="alamatktr"
                                                            wire:model.defer="alamatktr" aria-label="With textarea" placeholder="Alamat Kantor Tanpa Kelurahan, Kecamatan, Kota"
                                                            style="height: 56px; resize: none" autocomplete="off" disabled></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 control-label">Kecamatan</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <select
                                                            class="form-control custom-select @error('kecamatan') is-invalid @enderror"
                                                            style="width: 100%; height:36px;" id="kecamatan"
                                                            name="kecamatan" wire:model="kecamatan" autocomplete="off"
                                                            disabled>
                                                            <option>--- Pilih ---</option>
                                                            @foreach ($datakecamatanv as $res)
                                                                <option value="{{ $res->id }}">
                                                                    {{ $res->nama_kecamatan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 control-label">Kelurahan</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <select
                                                            class="form-control custom-select @error('kelurahan') is-invalid @enderror"
                                                            style="width: 100%; height:36px;" name="kelurahan"
                                                            id="kelurahan" wire:model.defer="kelurahan"
                                                            autocomplete="off" disabled>
                                                            <option>--- Pilih ---</option>
                                                            @if (!empty($kelurahan))
                                                                @foreach ($datakelurahanvL as $res)
                                                                    <option value="{{ $res->id }}">
                                                                        {{ $res->nama_kelurahan }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 control-label">Kota</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <select
                                                            class="form-control custom-select @error('kota') is-invalid @enderror"
                                                            style="width: 100%; height:36px;" id="kota"
                                                            name="kota" wire:model="kota" autocomplete="off"
                                                            disabled>
                                                            <option>--- Pilih ---</option>
                                                            @foreach ($datakotav as $res)
                                                                <option value="{{ $res->id }}">{{ $res->kota }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">No. SK
                                                    KEMENKUMHAM/KEMENDAGRI</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('skahu') is-invalid @enderror"
                                                            id="skahu" name="skahu" placeholder="Nomor SK"
                                                            wire:model.defer="skahu" autocomplete="off" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">Tanggal SK</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div wire:ignore>
                                                            <span class="input-group-text">
                                                                <i data-feather="calendar" class="feather-sm"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('tglskahu') is-invalid @enderror"
                                                            id="tglskahu" name="tglskahu" data-dtp="dtp_vDWAw"
                                                            wire:model.defer="tglskahu" autocomplete="off" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">Tahun SK</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('tahunahu') is-invalid @enderror"
                                                            id="tahunahu" name="tahunahu" placeholder="Tahun SK"
                                                            onkeypress="return hanyaAngka(event)" autocomplete="off"
                                                            wire:model.defer="tahunahu" autocomplete="off" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="skuha" class="col-sm-4 form-label">SK KEMENKUM
                                                    HAM/KEMENDAGRI
                                                </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        @if (!empty($skuhaOld))
                                                            <p><small class="text-success"><em>File : &nbsp;
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
                                                                        <i class="fas fa-eye" style="color: blue"></i>
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
                                            <span class="badge bg-light-success text-success font-medium"><b>Data
                                                    Baru</b></span>
                                            <div class="border-bottom"></div><br>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">No Register</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="noreg"
                                                            name="noreg" disabled wire:model.defer="noreg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">Nama ORMAS<span
                                                        style="color:red">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        {{-- @if (!empty($statusNol) || !empty($statusSatu) || !empty($statusDua)) --}}
                                                        @if (!empty($statusNol) || !empty($statusSatu))
                                                            <input type="text"
                                                                class="form-control @error('namaormasbaru') is-invalid @enderror"
                                                                id="namaormasbaru" name="namaormasbaru"
                                                                placeholder="Masukkan Nama ORMAS" autocomplete="off"
                                                                wire:model.defer="namaormasbaru" disabled>
                                                        @else
                                                            <input type="text"
                                                                class="form-control @error('namaormasbaru') is-invalid @enderror"
                                                                id="namaormasbaru" name="namaormasbaru"
                                                                placeholder="Masukkan Nama ORMAS" autocomplete="off"
                                                                wire:model.defer="namaormasbaru">
                                                            @error('namaormasbaru')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">Singkatan ORMAS<span
                                                        style="color:red">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        @if (!empty($statusNol) || !empty($statusSatu))
                                                            <input type="text"
                                                                class="form-control @error('singormasbaru') is-invalid @enderror"
                                                                id="singormasbaru" name="singormasbaru"
                                                                placeholder="Masukkan Singkatan ORMAS"
                                                                wire:model.defer="singormasbaru" autocomplete="off"
                                                                disabled>
                                                        @else
                                                            <input type="text"
                                                                class="form-control @error('singormasbaru') is-invalid @enderror"
                                                                id="singormasbaru" name="singormasbaru"
                                                                placeholder="Masukkan Singkatan ORMAS"
                                                                wire:model.defer="singormasbaru" autocomplete="off">
                                                            @error('singormasbaru')
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
                                                <label class="col-sm-4 control-label">Alamat Kantor<span
                                                        style="color:red">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        @if (!empty($statusNol) || !empty($statusSatu))
                                                            <textarea class="form-control @error('alamatktrbaru') is-invalid @enderror" name="alamatktrbaru" id="alamatktrbaru"
                                                                wire:model.defer="alamatktrbaru" aria-label="With textarea"
                                                                placeholder="Alamat Kantor Tanpa Kelurahan, Kecamatan, Kota" style="height: 56px; resize: none"
                                                                autocomplete="off" disabled></textarea>
                                                        @else
                                                            <textarea class="form-control @error('alamatktrbaru') is-invalid @enderror" name="alamatktrbaru" id="alamatktrbaru"
                                                                wire:model.defer="alamatktrbaru" aria-label="With textarea"
                                                                placeholder="Alamat Kantor Tanpa Kelurahan, Kecamatan, Kota" style="height: 56px; resize: none"
                                                                autocomplete="off"></textarea>
                                                            @error('alamatktrbaru')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 control-label">Kecamatan<span
                                                        style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        @if (!empty($statusNol) || !empty($statusSatu))
                                                            <select
                                                                class="form-control custom-select @error('kecamatanbaru') is-invalid @enderror"
                                                                style="width: 100%; height:36px;" id="kecamatanbaru"
                                                                name="kecamatanbaru" wire:model="kecamatanbaru"
                                                                autocomplete="off" disabled>
                                                                <option>--- Pilih ---</option>
                                                                @foreach ($datakecamatanvbaru as $res)
                                                                    <option value="{{ $res->id }}">
                                                                        {{ $res->nama_kecamatan }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        @else
                                                            <select
                                                                class="form-control custom-select @error('kecamatanbaru') is-invalid @enderror"
                                                                style="width: 100%; height:36px;" id="kecamatanbaru"
                                                                name="kecamatanbaru" wire:model="kecamatanbaru"
                                                                autocomplete="off">
                                                                <option>--- Pilih ---</option>
                                                                @foreach ($datakecamatanvbaru as $res)
                                                                    <option value="{{ $res->id }}">
                                                                        {{ $res->nama_kecamatan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('kecamatanbaru')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 control-label">Kelurahan<span
                                                        style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        @if (!empty($statusNol) || !empty($statusSatu))
                                                            <select
                                                                class="form-control custom-select @error('kelurahanbaru') is-invalid @enderror"
                                                                style="width: 100%; height:36px;" name="kelurahanbaru"
                                                                id="kelurahanbaru" wire:model.defer="kelurahanbaru"
                                                                autocomplete="off" disabled>
                                                                <option>--- Pilih ---</option>
                                                                @foreach ($datakelurahanvbaru as $res)
                                                                    <option value="{{ $res->id }}">
                                                                        {{ $res->nama_kelurahan }}</option>
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <select
                                                                class="form-control custom-select @error('kelurahanbaru') is-invalid @enderror"
                                                                style="width: 100%; height:36px;" name="kelurahanbaru"
                                                                id="kelurahanbaru" wire:model.defer="kelurahanbaru"
                                                                autocomplete="off">
                                                                <option>--- Pilih ---</option>
                                                                @foreach ($datakelurahanvbaru as $res)
                                                                    <option value="{{ $res->id }}">
                                                                        {{ $res->nama_kelurahan }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('kelurahanbaru')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-md-4 control-label">Kota<span
                                                        style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        @if (!empty($statusNol) || !empty($statusSatu))
                                                            <select
                                                                class="form-control custom-select @error('kotabaru') is-invalid @enderror"
                                                                style="width: 100%; height:36px;" id="kotabaru"
                                                                name="kotabaru" wire:model="kotabaru"
                                                                autocomplete="off" disabled>
                                                                <option>--- Pilih ---</option>
                                                                @foreach ($datakotavbaru as $res)
                                                                    <option value="{{ $res->id }}">
                                                                        {{ $res->kota }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <select
                                                                class="form-control custom-select @error('kotabaru') is-invalid @enderror"
                                                                style="width: 100%; height:36px;" id="kotabaru"
                                                                name="kotabaru" wire:model="kotabaru"
                                                                autocomplete="off">
                                                                <option>--- Pilih ---</option>
                                                                @foreach ($datakotavbaru as $res)
                                                                    <option value="{{ $res->id }}">
                                                                        {{ $res->kota }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('kotabaru')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">No. SK
                                                    KEMENKUMHAM/KEMENDAGRI<span style="color:red">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        @if (!empty($statusNol) || !empty($statusSatu))
                                                            <input type="text"
                                                                class="form-control @error('skahubaru') is-invalid @enderror"
                                                                id="skahubaru" name="skahubaru"
                                                                placeholder="Nomor SK" wire:model.defer="skahubaru"
                                                                autocomplete="off" disabled>
                                                        @else
                                                            <input type="text"
                                                                class="form-control @error('skahubaru') is-invalid @enderror"
                                                                id="skahubaru" name="skahubaru"
                                                                placeholder="Nomor SK" wire:model.defer="skahubaru"
                                                                autocomplete="off">
                                                            @error('skahubaru')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">Tanggal SK<span
                                                        style="color:red">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div wire:ignore>
                                                            <span class="input-group-text">
                                                                <i data-feather="calendar" class="feather-sm"></i>
                                                            </span>
                                                        </div>
                                                        @if (!empty($statusNol) || !empty($statusSatu))
                                                            <input type="text"
                                                                class="form-control @error('tglskahubaru') is-invalid @enderror"
                                                                id="tglskahubaru" name="tglskahubaru"
                                                                data-dtp="dtp_vDWAw" wire:model.defer="tglskahubaru"
                                                                autocomplete="off" disabled>
                                                        @else
                                                            <input type="text"
                                                                class="form-control @error('tglskahubaru') is-invalid @enderror"
                                                                id="tglskahubaru" name="tglskahubaru"
                                                                data-dtp="dtp_vDWAw" wire:model.defer="tglskahubaru"
                                                                autocomplete="off">
                                                            @error('tglskahubaru')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-4 control-label">Tahun SK<span
                                                        style="color:red">*</span></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        @if (!empty($statusNol) || !empty($statusSatu))
                                                            <input type="text"
                                                                class="form-control @error('tahunahubaru') is-invalid @enderror"
                                                                id="tahunahubaru" name="tahunahubaru"
                                                                placeholder="Tahun SK"
                                                                onkeypress="return hanyaAngka(event)"
                                                                wire:model.defer="tahunahubaru" autocomplete="off"
                                                                disabled>
                                                        @else
                                                            <input type="text"
                                                                class="form-control @error('tahunahubaru') is-invalid @enderror"
                                                                id="tahunahubaru" name="tahunahubaru"
                                                                placeholder="Tahun SK"
                                                                onkeypress="return hanyaAngka(event)"
                                                                wire:model.defer="tahunahubaru" autocomplete="off">
                                                            @error('tahunahubaru')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="skuha" class="col-sm-4 form-label">SK KEMENKUM
                                                    HAM/KEMENDAGRI</label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        @if (!empty($statusNol) || !empty($statusSatu))
                                                            @if (!empty($skuhaBaru))
                                                                <p><small class="text-success"><em>File : &nbsp;
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
                                                        @else
                                                            <input
                                                                class="form-control @error('skuhabaru') is-invalid @enderror"
                                                                type="file" id="skuhabaru{{ $iterskuhabaru }}"
                                                                name="skuhabaru" wire:model="skuhabaru">
                                                            <div wire:loading wire:target="skuhabaru">
                                                                <small class="form-text text-muted"><em>Sedang Upload
                                                                        File
                                                                        ...</em>
                                                                    <div class="progress mt-1">
                                                                        <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                                                                            role="progressbar" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100"
                                                                            style="width: 100%"></div>
                                                                    </div>
                                                                </small>
                                                            </div>
                                                            @error('skuhabaru')
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
                                    <div class="p-3 border-top">
                                        <div class="d-flex">
                                            @if (!empty($statusNol))
                                                @if ($statusNol->status == 0)
                                                    <button type="button" wire:loading.remove
                                                        wire:target="confirmBatal({{ $statusNol->id }})"
                                                        class="btn btn-sm px-40 fs-40 font-small me-1"
                                                        wire:click="confirmBatal({{ $statusNol->id }})"><span
                                                            class="btn btn-warning rounded-pill px-4 waves-effect waves-light me-1">Batalkan
                                                            Perubahan</span>
                                                    </button>
                                                    <div wire:loading
                                                        wire:target="confirmBatal({{ $statusNol->id }})">
                                                        <button
                                                            class="btn btn-warning rounded-pill px-4 waves-effect waves-light me-1"
                                                            type="button" disabled>
                                                            <span class="spinner-border spinner-border-sm"
                                                                role="status" aria-hidden="true"></span>
                                                            Loading...
                                                        </button>
                                                    </div>&nbsp;
                                                    <div class="d-flex align-items-center font-medium me-3 me-md-0">
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
                                                        Menunggu Proses Verifikasi Oleh Admin.
                                                    </div>
                                                @endif
                                            @elseif (!empty($statusSatu))
                                                @if ($statusSatu->status == 1)
                                                    <div class="d-flex align-items-center font-medium me-3 me-md-0">
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
                                                        Data Sudah diverifikasi dan menunggu proses Tanda Tangan.
                                                    </div>
                                                @endif
                                            @elseif (!empty($statusDua))
                                                @if ($statusDua->status == 2)
                                                    <div class="d-flex align-items-center font-medium me-3 me-md-0">
                                                        <div wire:loading.remove wire:target="store">
                                                            <button type="submit"
                                                                class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                                        </div>
                                                        <div wire:loading wire:target="store">
                                                            <button
                                                                class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
                                                                type="button" disabled>
                                                                <span class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                                Loading...
                                                            </button>
                                                        </div>

                                                        {{-- reset --}}
                                                        <div wire:loading.remove wire:target="resetFields">
                                                            <button type="button" wire:click="resetFields"
                                                                class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Reset</button>
                                                        </div>
                                                        <div wire:loading wire:target="resetFields">
                                                            <button
                                                                class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                                                type="button" disabled>
                                                                <span class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                                Loading...
                                                            </button>
                                                        </div>&nbsp;
                                                        <p>
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
                                                            Sudah Melakukan Perubahan Data : {{ $JmlPerubahan }} Kali.
                                                        </p>
                                                    </div>
                                                @endif
                                            @else
                                                <div wire:loading.remove wire:target="store">
                                                    <button type="submit"
                                                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1">Simpan</button>
                                                </div>
                                                <div wire:loading wire:target="store">
                                                    <button
                                                        class="btn btn-info rounded-pill px-4 waves-effect waves-light me-1"
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
                                                    <button
                                                        class="btn btn-dark rounded-pill px-4 waves-effect waves-light"
                                                        type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

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

            $('#tglskahubaru').on('change', function(e) {
                @this.set('tglskahubaru', e.target.value);
            });
            $('#kotabaru').on('change', function(e) {
                @this.set('kotabaru', e.target.value);
            });
            $('#kecamatanbaru').on('change', function(e) {
                @this.set('kecamatanbaru', e.target.value);
            });
            $('#kelurahanbaru').on('change', function(e) {
                @this.set('kelurahanbaru', e.target.value);
            });

            window.livewire.hook('message.processed', (message, component) => {
                init();
            });

            function init() {
                $('#tglskahubaru').bootstrapMaterialDatePicker({
                    weekStart: 0,
                    time: false,
                    format: 'DD-MM-YYYY'
                });
                $('#kotabaru').select2({
                    placeholder: '--- Pilih ---'
                });
                $('#kecamatanbaru').select2({
                    placeholder: '--- Pilih ---'
                });
                $('#kelurahanbaru').select2({
                    placeholder: '--- Pilih ---'
                });
            }

            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }

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
            window.addEventListener('swal:error', event => {
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
