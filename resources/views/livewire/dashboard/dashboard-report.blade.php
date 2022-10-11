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
</div>
