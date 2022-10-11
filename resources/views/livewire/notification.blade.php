{{-- <div> --}}
@if (Auth::user()->roles == 2)
    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"> <i data-feather="bell" class="feather-sm"></i>
        @if ($totalNotifikasi != 0)
            <span class="badge ms-auto bg-danger">{{ $totalNotifikasi }}</span>
        @endif
    </a>

    <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up">
        <span class="with-arrow"><span class="bg-primary"></span></span>
        <ul class="list-style-none">
            <li>
                <div class="drop-title bg-primary text-white">
                    <h4 class="mb-0 mt-1">{{ $totalNotifikasi }} New</h4>
                    <span class="fw-light">Notifications</span>
                </div>
            </li>
            <li>
                <div class="message-center notifications" style="height: 250px;">
                    <a href="{{ route('list-verifikasi') }}" class="message-item">
                        <span class="badge ms-auto bg-danger">{{ $infVerifikasiData }}</span>
                        <div class="mail-contnet">
                            <h6 class="message-title">Data Verifikasi</h6>
                        </div>
                    </a>
                    <a href="{{ route('list-survey') }}" class="message-item">
                        <span class="badge ms-auto bg-danger">{{ $infSurvey }}</span>
                        <div class="mail-contnet">
                            <h6 class="message-title">Data Survey</h6>
                        </div>
                    </a>
                    <a href="{{ route('list-surat') }}" class="message-item">
                        <span class="badge ms-auto bg-danger">{{ $ajukanTTD }}</span>
                        <div class="mail-contnet">
                            <h6 class="message-title">Pengajuan Tandatangan</h6>
                        </div>
                    </a>
                    <a href="{{ route('notif-rubah') }}" class="message-item">
                        <span class="badge ms-auto bg-danger">{{ $Perubahan }}</span>
                        <div class="mail-contnet">
                            <h6 class="message-title">Perubahan Data</h6>
                        </div>
                    </a>
                    <a href="{{ route('nomer-perubahan') }}" class="message-item">
                        <span class="badge ms-auto bg-danger">{{ $ajukanTTDPerubahan }}</span>
                        <div class="mail-contnet">
                            <h6 class="message-title">Pengajuan Tandatangan Perubahan</h6>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
@elseif(Auth::user()->roles == 3)
    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"> <i data-feather="bell" class="feather-sm"></i>
        @if ($totalNotifikasi != 0)
            <span class="badge ms-auto bg-danger">{{ $totalNotifikasi }}</span>
        @endif
    </a>

    <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up">
        <span class="with-arrow"><span class="bg-primary"></span></span>
        <ul class="list-style-none">
            <li>
                <div class="drop-title bg-primary text-white">
                    <h4 class="mb-0 mt-1">{{ $TotalUser }} New</h4>
                    <span class="fw-light">Notifications</span>
                </div>
            </li>
            <li>
                <div class="message-center notifications" style="height: 250px;">
                    <a href="{{ route('data-ormas') }}" class="message-item">
                        <span class="badge ms-auto bg-danger">{{ $Persyaratan }}</span>
                        <div class="mail-contnet">
                            <h6 class="message-title">Input Data</h6>
                        </div>
                    </a>
                    <a href="{{ route('pengurus-ormas') }}" class="message-item">
                        <span class="badge ms-auto bg-danger">{{ $Pengurus }}</span>
                        <div class="mail-contnet">
                            <h6 class="message-title">Kepengurusan</h6>
                        </div>
                    </a>
                    <a href="{{ route('dokumen-ormas') }}" class="message-item">
                        <span class="badge ms-auto bg-danger">{{ $Dokumen }}</span>
                        <div class="mail-contnet">
                            <h6 class="message-title">Upload Dokumen</h6>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
@elseif (Auth::user()->roles == 4)
    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"> <i data-feather="bell" class="feather-sm"></i>
        @if ($totalTTD != 0)
            <span class="badge ms-auto bg-danger">{{ $totalTTD }}</span>
        @endif
    </a>

    <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up">
        <span class="with-arrow"><span class="bg-primary"></span></span>
        <ul class="list-style-none">
            <li>
                <div class="drop-title bg-primary text-white">
                    <h4 class="mb-0 mt-1">{{ $totalTTD }} New</h4>
                    <span class="fw-light">Notifications</span>
                </div>
            </li>
            <li>
                <div class="message-center notifications" style="height: 250px;">

                    <a href="{{ route('ttd') }}" class="message-item">
                        <span class="badge ms-auto bg-danger">{{ $ajukanTTD }}</span>
                        <div class="mail-contnet">
                            <h6 class="message-title">Pengajuan Tandatangan</h6>
                        </div>
                    </a>
                    <a href="{{ route('ttdperubahan') }}" class="message-item">
                        <span class="badge ms-auto bg-danger">{{ $ajukanTTDPerubahan }}</span>
                        <div class="mail-contnet">
                            <h6 class="message-title">Pengajuan Tandatangan Perubahan</h6>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
@endif
{{-- </div> --}}
