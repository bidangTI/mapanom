@extends('frontend.app')
@section('content')
    <section id="services" class="ttm-row services_2-section res-991-pt-0 clearfix"></section>
    <div class="container">
        <div class="section-title with-desc clearfix">
            <div class="title-header">
                <h5></h5>
                <h2 class="title">Form Pendaftaran Akun <span></span></h2>
            </div>
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        @endif
        <form class="row ttm-contact-form clearfix" action="{{ route('register') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3 row">
                        <label for="permohonan" class="col-sm-3 text-end control-label col-form-label">Jenis Permohonan<span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <select name="permohonan" id="permohonan"
                                class="form-control @error('permohonan') is-invalid @enderror">
                                <option value="">-- Pilih ---</option>
                                @foreach ($kategori as $res)
                                    <option value="{{ $res->id }}"
                                        {{ old('permohonan') == $res->id ? 'selected' : '' }}>
                                        {{ $res->kategori }}</option>
                                @endforeach
                            </select>
                            @error('permohonan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-3 text-end control-label col-form-label">NIK <span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('nik') is-invalid @enderror" name="nik"
                                placeholder="Masukkan NIK" onkeypress="return hanyaAngka(event)" autocomplete="off"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-3 text-end control-label col-form-label">Nama <span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('permohonan') is-invalid @enderror"
                                name="name" placeholder="Masukkan Nama" autocomplete="off" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempatlahir" class="col-sm-3 text-end control-label col-form-label">Tempat Lahir <span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('tempatlahir') is-invalid @enderror"
                                name="tempatlahir" placeholder="Masukkan Tempat Lahir" autocomplete="off"
                                value="{{ old('tempatlahir') }}">
                            @error('tempatlahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-3 text-end control-label col-form-label">Tanggal Lahir <span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('tanggal') is-invalid @enderror"
                                name="tanggal" id="tanggal" placeholder="Masukkan Tanggal Lahir" autocomplete="off"
                                value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jk" class="col-sm-3 text-end control-label col-form-label">Jenis Kelamin<span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <select name="jk" id="jk" class="form-control  @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih ---</option>
                                <option value="1" {{ old('jk') == 1 ? 'selected' : '' }}>Pria</option>
                                <option value="2" {{ old('jk') == 2 ? 'selected' : '' }}>Wanita</option>
                            </select>
                            @error('jk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-3 text-end control-label col-form-label">Alamat <span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            {{-- <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukkan Alamat" autocomplete="off"> --}}
                            <textarea name="alamat" id="alamat" rows="4" class="form-control  @error('alamat') is-invalid @enderror"
                                style="resize: none; height: 60px">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rt" class="col-sm-3 text-end control-label col-form-label">RT/RW <span
                                style="color:red">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control  @error('rt') is-invalid @enderror" name="rt"
                                placeholder="RT" onkeypress="return hanyaAngka(event)" autocomplete="off"
                                value="{{ old('rt') }}">
                            @error('rt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> /
                        <div class="col-sm-3">
                            <input type="text" class="form-control  @error('rw') is-invalid @enderror" name="rw"
                                placeholder="RW" onkeypress="return hanyaAngka(event)" autocomplete="off"
                                value="{{ old('rw') }}">
                            @error('rw')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hp" class="col-sm-3 text-end control-label col-form-label">No. HP <span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('hp') is-invalid @enderror" name="hp"
                                placeholder="Masukkan Nomor HP" onkeypress="return hanyaAngka(event)" autocomplete="off"
                                value="{{ old('hp') }}">
                            @error('hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 text-end control-label col-form-label">Email <span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                name="email" placeholder="Masukkan email" autocomplete="off"
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 text-end control-label col-form-label">Password <span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                name="password" style="background-color:#f7f9fe" placeholder="Masukkan Password"
                                autocomplete="off" id="password">
                                <small class="form-control-feedback"><span style="font-style: italic"> <span
                                    style="font-size:12px"><b>**)</b></span> Panjang Karakter Minimal 8</span></small>
                           
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password-confirm" class="col-sm-3 text-end control-label col-form-label">Konfirmasi Password <span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"
                                style="background-color:#f7f9fe" placeholder="Masukkan Password"
                                autocomplete="off" name="password_confirmation" id="password-confirm">
                                <small class="form-control-feedback"><span style="font-style: italic"> <span
                                    style="font-size:12px"><b>**)</b></span> Panjang Karakter Minimal 8</span></small>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ktp" class="col-sm-3 text-end control-label col-form-label">Scan KTP<span
                                style="color:red">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp"
                                id="ktp">
                                <small class="form-control-feedback"><span style="font-style: italic"> <span
                                    style="font-size:12px"><b>**)</b></span> png, jpg, jpeg, pdf - Ukuran Max. 512 kb</span></small>
                            @error('ktp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="text-left">
                    <button type="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey">
                        Daftar
                    </button>
                </div>
            </div>
        </form>
    </div><br>


    @push('script')
        <script>
            $(document).ready(function() {
                init_tanggal();
            });

            function init_tanggal() {
                $('#tanggal').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: true,
                    orientation: 'bottom',
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
@endsection
