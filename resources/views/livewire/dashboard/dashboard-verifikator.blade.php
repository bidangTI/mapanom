<div>
    <div class="card gredient-info-bg mt-0 mb-0 rounded-0">
        <div class="card-body">
            <h4 class="card-title text-white">Selamat Datang, {{ Auth::user()->name }}</h4>
            <h5 class="card-subtitle text-white op-5">Dashboard</h5>
            <div class="row mt-4 mb-3">
                <div class="col-sm-12 col-lg-4">
                    <div class="temp d-flex align-items-center flex-row">
                        <div class="display-5 text-white">
                            <i class="bi-info-circle"></i>
                            <span>{{ $jmlOrmas }}</span>
                        </div>
                        <div class="ms-2">
                            <h3 class="mb-0 text-white">ORMAS</h3>
                        </div>
                    </div>

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
                <div class="col-sm-12 col-lg-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="info d-flex align-items-center">
                                <div class="me-2">
                                    <i class="ri-wallet-2-fill text-white display-5 op-5"></i>
                                </div>
                                <div>
                                    <a href="{{ route('list-verifikasi') }}" class="message-item">
                                        <h3 class="text-danger mb-0">{{ $infVerifikasiData }}</h3>
                                        <span class="text-white op-5">Belum Verifikasi</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="info d-flex align-items-center">
                                <div class="me-2">
                                    <i class="ri-wallet-2-fill text-white display-5 op-5"></i></i>
                                </div>
                                <div>
                                    <a href="{{ route('list-survey') }}" class="message-item">
                                        <h3 class="text-success mb-0">{{ $infSurvey }}</h3>
                                        <span class="text-white op-5">Belum Survey</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="info d-flex align-items-center">
                                <div class="me-2">
                                    <i class="ri-wallet-2-fill text-white display-5 op-5"></i></i>
                                </div>
                                <div>
                                    <a href="{{ route('list-surat') }}" class="message-item">
                                        <h3 class="text-danger mb-0">{{ $ajukanTTD }}</h3>
                                        <span class="text-white op-5">Pengajuan Tanda Tangan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="info d-flex align-items-center">
                                <div class="me-2">
                                    <i class="ri-wallet-2-fill text-white display-5 op-5"></i></i>
                                </div>
                                <div>
                                    <a href="{{ route('notif-rubah') }}" class="message-item">
                                        <h3 class="text-warning mb-0">{{ $Perubahan }}</h3>
                                        <span class="text-white op-5">Perubahan Data</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="info d-flex align-items-center">
                                <div class="me-2">
                                    <i class="ri-wallet-2-fill text-white display-5 op-5"></i></i>
                                </div>
                                <div>
                                    <a href="{{ route('nomer-perubahan') }}" class="message-item">
                                        <h3 class="text-danger mb-0">{{ $ajukanTTDPerubahan }}</h3>
                                        <span class="text-white op-5">Pengajuan Tandatangan Perubahan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card order-widget w-100">
        <div class="card-body">
            <div class="row">
                <!-- column -->
                <div class="col-sm-12 col-md-12">
                    <h4 class="card-title">Dashboard Verifikasi</h4>
                    <h5 class="card-subtitle mb-0">
                        @if ($totalNotifikasi != 0)
                            <span class="badge ms-auto bg-danger">{{ $totalNotifikasi }}</span>
                        @endif
                    </h5>
                    <div class="row mt-3">
                        <div class="col-3 border-end">
                            <a href="{{ route('list-verifikasi') }}" class="message-item">
                                <i class="ri-checkbox-blank-circle-fill fs-4 text-cyan"></i>
                                <h3 class="mb-0 font-medium">{{ $infVerifikasiData }}</h3>
                                <span>Belum Verifikasi</span>
                            </a>
                        </div>
                        <div class="col-2 border-end">
                            <a href="{{ route('list-survey') }}" class="message-item">
                                <i class="ri-checkbox-blank-circle-fill fs-4 text-orange"></i>
                                <h3 class="mb-0 font-medium">{{ $infSurvey }}</h3>
                                <span>Belum Survey</span>
                            </a>
                        </div>
                        <div class="col-2 border-end">
                            <a href="{{ route('list-surat') }}" class="message-item">
                                <i class="ri-checkbox-blank-circle-fill fs-4 text-info"></i>
                                <h3 class="mb-0 font-medium">{{ $ajukanTTD }}</h3>
                                <span>Pengajuan Tanda Tangan</span>
                            </a>
                        </div>
                        <div class="col-2 border-end">
                            <a href="{{ route('notif-rubah') }}" class="message-item">
                                <i class="ri-checkbox-blank-circle-fill fs-4 text-cyan"></i>
                                <h3 class="mb-0 font-medium">{{ $Perubahan }}</h3>
                                <span>Perubahan Data</span>
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('nomer-perubahan') }}" class="message-item">
                                <i class="ri-checkbox-blank-circle-fill fs-4 text-orange"></i>
                                <h3 class="mb-0 font-medium">{{ $ajukanTTDPerubahan }}</h3>
                                <span>Pengajuan Tandatangan Perubahan</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
