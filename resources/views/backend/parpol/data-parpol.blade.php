@extends('backend.layouts.app')
@section('breadcumb')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Input Data Partai Politik</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Input Data</li>
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
                <h4 class="card-title">Form Kelengkapan Data</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Kategori<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="kategori" name="kategori">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Nama PARPOL<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="namaormas" name="namaormas"
                                        placeholder="Masukkan Nama ORMAS">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Singkatan PARPOL<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="singormas" name="singormas"
                                        placeholder="Masukkan Singkatan ORMAS">
                                </div>
                            </div>
                        </div>

                        <div class="border-bottom"></div><br>

                        <div class="mb-3 row">
                            <label class="col-md-3 control-label">Jenis Akta Notaris<span style="color:red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                                        name="akta">
                                        <option>-- Pilih Akta --</option>
                                        <option value="1">Akta Pendirian</option>
                                        <option value="2">Akta Perubahan</option>
                                        </optgroup>
                                    </select>
                                </div>
                                {{-- <small class="form-control-feedback"> Pilih Akta </small> --}}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Nama Notaris<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="namanotaris" name="namanotaris"
                                        placeholder="Masukkan Nama Notaris">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Nomor Akta Notaris<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="noakta" name="noakta"
                                        placeholder="Masukkan Nomor Akta Notaris">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Tanggal Akta Notaris<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i data-feather="calendar" class="feather-sm"></i>
                                    </span>
                                    <input type="text" class="form-control @error('tglnotaris') is-invalid @enderror"
                                        id="tglnotaris" name="tglnotaris" data-dtp="dtp_vDWAw">

                                    @error('tglnotaris')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Nomor Surat Permohonan keberadaan ke Walikota<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nopermohonan" name="nopermohonan"
                                        placeholder="Masukkan Nomor Surat Permohonan">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Tanggal Permohonan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i data-feather="calendar" class="feather-sm"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control @error('tglpermohonan') is-invalid @enderror""
                                        id="tglpermohonan" name="tglpermohonan" data-dtp="dtp_vDWAw">

                                    @error('tglpermohonan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom"></div><br>
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">Nomor SK Kepengurusan<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="skpengurus" name="skpengurus"
                                        placeholder="Masukkan Nomor SK Kepengurusan">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 control-label">NPWP<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="npwp" name="npwp"
                                        placeholder="Masukkan Nomor NPWP Partai Politik">
                                </div>
                            </div>
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

            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }

            $('.summernote').summernote({
                height: 250,
                minHeight: null,
                maxHeight: null,
                focus: false
            });
        </script>
    @endpush
@endsection
