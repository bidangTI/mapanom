<div>
    <div class="card gredient-info-bg mt-0 mb-0 rounded-0">
        <div class="card-body">
            <h4 class="card-title text-white">Selamat Datang, {{ Auth::user()->name }}</h4>
            <h5 class="card-subtitle text-white op-5">Dashboard</h5>
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
                            <a href="{{ route('ttd') }}" class="message-item">
                                <i class="ri-checkbox-blank-circle-fill fs-4 text-cyan"></i>
                                <h3 class="mb-0 font-medium">{{ $ajukanTTD }}</h3>
                                <span>Pengajuan Tanda Tangan</span>
                            </a>
                        </div>
                        <div class="col-2 border-end">
                            <a href="{{ route('ttdperubahan') }}" class="message-item">
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
