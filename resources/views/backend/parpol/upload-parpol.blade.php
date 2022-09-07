@extends('backend.layouts.app')
@section('breadcumb')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Upload Persyaratan Partai Politik</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Upload Dokumen</li>
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
                <h4 class="card-title">Form Kelengkapan Dokumen</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="srtpermohonan" class="form-label">Surat Permohonan Walikota<span
                                    style="color:red">*</span></label>
                            <input class="form-control" type="file" id="srtpermohonan" name="srtpermohonan">
                            <small class="form-control-feedback"><span style="font-style: italic"> **) File pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-3">
                            <label for="uploadaktanotaris" class="form-label">Akte Pendirian Dari Notaris<span
                                    style="color:red">*</span></label>
                            <input class="form-control" type="file" id="uploadaktanotaris" name="uploadaktanotaris">
                            <small class="form-control-feedback"><span style="font-style: italic"> **) File pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-3">
                            <label for="uploadadart" class="form-label">AD ART<span style="color:red">*</span></label>
                            <input class="form-control" type="file" id="uploadadart" name="uploadadart">
                            <small class="form-control-feedback"><span style="font-style: italic"> **) File pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-3">
                            <label for="srtkepengurusan" class="form-label">Surat Keputusan Kepengurusan<span
                                    style="color:red">*</span></label>
                            <input class="form-control" type="file" id="srtkepengurusan" name="srtkepengurusan">
                            <small class="form-control-feedback"><span style="font-style: italic">
                                Susunan Dewan Pimpinan Pusat, Susunan Dewan Pimpinan Wilayah, Susunan Dewan Pimpinan Daerah.
                                <br> **) File pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-3">
                            <label for="srtpernyataan" class="form-label">Surat Pernyataan<span
                                    style="color:red">*</span></label>
                            <input class="form-control" type="file" id="srtpernyataan" name="srtpernyataan">
                            <small class="form-control-feedback"><span style="font-style: italic">
                                Bermaterai Rp 10.000/ditandatangani Ketua dan Sekretaris.
                                <br>**) File pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="srtdomisili" class="form-label">Surat Keterangan Domisili<span
                                    style="color:red">*</span></label>
                            <input class="form-control" type="file" id="srtdomisili" name="srtdomisili">
                            <small class="form-control-feedback"><span style="font-style: italic">
                                Domisili Kantor/Sekretariat dari Kelurahan setempat.
                                <br> **) File pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-3">
                            <label for="srtkepemilikan" class="form-label">Surat Kepemilikan Kantor<span
                                    style="color:red">*</span></label>
                            <input class="form-control" type="file" id="srtkepemilikan" name="srtkepemilikan">
                            <small class="form-control-feedback"><span style="font-style: italic">
                                Apabila sewa ditandatangani pemilik rumah.
                                <br> **) File pdf - Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-3">
                            <label for="fotokantor" class="form-label">Foto Kantor<span
                                    style="color:red">*</span></label>
                            <input class="form-control" type="file" id="fotokantor" name="fotokantor">
                            <small class="form-control-feedback"><span style="font-style: italic">
                                Tampak Depan dengan Plakat Sekretariat.
                                <br> **) File jpg,jpeg,png -
                                    Ukuran
                                    Max. 512 kb</span></small>
                        </div>
                        <div class="mb-3">
                            <label for="badanhukum" class="form-label">Badan Hukum</label>
                            <input class="form-control" type="file" id="badanhukum" name="badanhukum">
                            <small class="form-control-feedback"><span style="font-style: italic">
                                Kalau sudah memiliki.
                                <br>**) File jpg,jpeg,png -
                                    Ukuran
                                    Max. 512 kb</span> - Kalau Ada</small>
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
    </form>

    @push('script')
        <script></script>
    @endpush
@endsection
