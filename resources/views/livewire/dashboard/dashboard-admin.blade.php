<div>
    <div class="card gredient-info-bg mt-0 mb-0 rounded-0">
        <div class="card-body">
            <h4 class="card-title text-white">Selamat Datang, {{ Auth::user()->name }}</h4>
            <h5 class="card-subtitle text-white op-5">Dashboard</h5>
            <div class="row mt-4 mb-3">
                <div class="col-sm-6 col-lg-6">
                    <div class="temp d-flex align-items-center flex-row">
                        <div class="display-5 text-white">
                            <i class="bi-info-circle"></i>
                            <span>{{ $jmlOrmas }}</span>
                        </div>
                        <div class="ms-2">
                            <h3 class="mb-0 text-white">ORMAS</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="temp d-flex align-items-center flex-row">
                        <div class="display-5 text-white">
                            <i class="bi-info-circle"></i>
                            <span>{{ $jmlParpol }}</span>
                        </div>
                        <div class="ms-2">
                            <h3 class="mb-0 text-white">PARPOL</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body border-top">
            <div class="row mb-0">
                <!-- col -->
                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="me-2"><span class="text-orange display-5"><i class="ri-wallet-2-fill"></i></span>
                        </div>
                        <div><span>
                                <h4>Pengguna</h4>
                            </span>
                            <h3 class="font-medium mb-0">{{ $jmlPengguna }}</h3>
                        </div>
                    </div>
                    Terdaftar   : {{ $jmlPenggunaTerdaftar }} <br>
                    Daftar Akun :  {{ $jmlPenggunaDaftar }} <br>
                    Verifikasi Data :  {{ $jmlPenggunaData }} <br>
                    Verifikasi Lapangan :  {{ $jmlPenggunaLapangan }} <br>
                    Proses Tanda Tangan :  {{ $jmlPenggunaTTD }}
                </div>
                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="me-2"><span class="text-cyan display-5"><i class="ri-wallet-2-fill"></i></span></div>
                        <div><span><h4>Verifikator</h4></span>
                            <h3 class="font-medium mb-0">{{ $jmlVerifikator }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="me-2"><span class="text-info display-5"><i class="ri-wallet-2-fill"></i></span></div>
                        <div><span><h4>Penanda Tangan</h4></span>
                            <h3 class="font-medium mb-0">{{ $jmlPejabat }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="me-2"><span class="text-danger display-5"><i class="ri-wallet-2-fill"></i></span></div>
                        <div><span><h4>User Report</h4></span>
                            <h3 class="font-medium mb-0">{{ $jmlReport }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
