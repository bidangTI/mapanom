@extends('backend.layouts.app')
@section('breadcumb')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Input Data Kepengurusan Partai Politik</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Input Data Kepengurusan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <form class="form-horizontal">
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">Form Kelengkapan Data Kepengurusan</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <h4 class="card-title">Jabatan</h4>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="card-title">Nama</h4>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="card-title">NIK</h4>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="card-title">Masa Bakti Kepengurusan</h4>
                    </div>
                </div>
            </div>
            <div class="border-bottom"></div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <label class="col-sm-3 control-label">Ketua<span style="color:red">*</span></label>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="namaketua" name="namaketua"
                                placeholder="Nama Ketua">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="nikketua" name="nikketua"
                                placeholder="NIK Ketua">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i data-feather="calendar" class="feather-sm"></i>
                                </span>
                                <input type="text" class="form-control @error('awalketua') is-invalid @enderror"
                                    id="awalketua" name="awalketua" placeholder="Tanggal Awal" data-dtp="dtp_vDWAw">
                                @error('awalketua')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <span> sd </span>
                                <span class="input-group-text">
                                    <i data-feather="calendar" class="feather-sm"></i>
                                </span>
                                <input type="text" class="form-control @error('akhirketua') is-invalid @enderror"
                                    id="akhirketua" name="akhirketua" placeholder="Tanggal Akhir" data-dtp="dtp_vDWAw">
                                @error('akhirketua')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3" style="text-align: right"><b>Dokumen</b></div>
                    <div class="col-lg-3">
                        <div class="mb-2 row">
                            <div class="input-group">
                                <input class="form-control" type="file" id="ktpketua" name="ktpketua"
                                    placeholder="KTP Ketua">
                            </div>
                            <small class="form-control-feedback"><span style="font-style: italic"> <span style="font-size:12px"><b>**) KTP</b></span> pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-2 row">
                            <div class="input-group">
                                <input class="form-control" type="file" id="fotoketua" name="fotoketua">
                            </div>
                            <small class="form-control-feedback"><span style="font-style: italic"> <span style="font-size:12px"><b>**) Foto 4x6</b></span> pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-2 row">
                            <div class="input-group">
                                <input class="form-control" type="file" id="cvketua" name="cvketua">
                            </div>
                            <small class="form-control-feedback"><span style="font-style: italic"><span style="font-size:12px"><b>**) Curiculum Vitae</b></span> pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                    </div>
                </div>

                <div class="border-bottom"></div><br>

                <div class="row">
                    <div class="col-lg-3">
                        <label class="col-sm-3 control-label">Sekretaris<span style="color:red">*</span></label>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="namasekretaris" name="namasekretaris"
                                placeholder="Nama Sekretaris">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="niksekretaris" name="niksekretaris"
                                placeholder="NIK Sekretaris">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i data-feather="calendar" class="feather-sm"></i>
                                </span>
                                <input type="text" class="form-control @error('awalsekretaris') is-invalid @enderror"
                                    id="awalsekretaris" name="awalsekretaris" placeholder="Tanggal Awal"
                                    data-dtp="dtp_vDWAw">
                                @error('awalsekretaris')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <span> sd </span>
                                <span class="input-group-text">
                                    <i data-feather="calendar" class="feather-sm"></i>
                                </span>
                                <input type="text" class="form-control @error('akhirsekretaris') is-invalid @enderror"
                                    id="akhirsekretaris" name="akhirsekretaris" placeholder="Tanggal Akhir"
                                    data-dtp="dtp_vDWAw">
                                @error('akhirsekretaris')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3" style="text-align: right"><b>Dokumen</b></div>
                    <div class="col-lg-3">
                        <div class="mb-2 row">
                            <div class="input-group">
                                <input class="form-control" type="file" id="ktpsekretaris" name="ktpsekretaris"
                                    placeholder="KTP Sekretaris">
                            </div>
                            <small class="form-control-feedback"><span style="font-style: italic"> <span style="font-size:12px"><b>**) KTP</b></span> pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-2 row">
                            <div class="input-group">
                                <input class="form-control" type="file" id="fotosekretaris" name="fotosekretaris">
                            </div>
                            <small class="form-control-feedback"><span style="font-style: italic"> <span style="font-size:12px"><b>**) Foto 4x6</b></span> pdf -
                                    Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-2 row">
                            <div class="input-group">
                                <input class="form-control" type="file" id="cvsekretaris" name="cvsekretaris">
                            </div>
                            <small class="form-control-feedback"><span style="font-style: italic"><span style="font-size:12px"><b>**) Curiculum Vitae</b></span> pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                    </div>
                </div>

                <div class="border-bottom"></div><br>

                <div class="row">
                    <div class="col-lg-3">
                        <label class="col-sm-3 control-label">Bendahara<span style="color:red">*</span></label>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="namabendahara" name="namabendahara"
                                placeholder="Nama Bendahara">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="nikbendahara" name="nikbendahara"
                                placeholder="NIK Bendahara">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i data-feather="calendar" class="feather-sm"></i>
                                </span>
                                <input type="text" class="form-control @error('awalbendahara') is-invalid @enderror"
                                    id="awalbendahara" name="awalbendahara" placeholder="Tanggal Awal"
                                    data-dtp="dtp_vDWAw">
                                @error('awalbendahara')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <span> sd </span>
                                <span class="input-group-text">
                                    <i data-feather="calendar" class="feather-sm"></i>
                                </span>
                                <input type="text" class="form-control @error('akhirbendahara') is-invalid @enderror"
                                    id="akhirbendahara" name="akhirbendahara" placeholder="Tanggal Akhir"
                                    data-dtp="dtp_vDWAw">
                                @error('akhirbendahara')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3" style="text-align: right"><b>Dokumen</b></div>
                    <div class="col-lg-3">
                        <div class="mb-2 row">
                            <div class="input-group">
                                <input class="form-control" type="file" id="ktpbendahara" name="ktpbendahara"
                                    placeholder="KTP Bendahara">
                            </div>
                            <small class="form-control-feedback"><span style="font-style: italic"> <span style="font-size:12px"><b>**) KTP</b></span> pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-2 row">
                            <div class="input-group">
                                <input class="form-control" type="file" id="fotobendahara" name="fotobendahara">
                            </div>
                            <small class="form-control-feedback"><span style="font-style: italic"> <span style="font-size:12px"><b>**) Foto 4x6</b></span> pdf -
                                    Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-2 row">
                            <div class="input-group">
                                <input class="form-control" type="file" id="cvbendahara" name="cvbendahara">
                            </div>
                            <small class="form-control-feedback"><span style="font-style: italic"><span style="font-size:12px"><b>**) Curiculum Vitae</b></span> pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-3 border-top">
                <div class="text-end">
                    <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">Save</button>
                    <button type="submit" class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Cancel</button>
                </div>
            </div>
        </div>
    </form>

    @push('script')
        <script>
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


            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }
        </script>
    @endpush
@endsection
