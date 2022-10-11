<div class="scroll-sidebar">
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li>
                <div class="user-profile d-flex no-block dropdown mt-3">
                    <div class="user-pic">
                        @if (Auth::user()->roles != 3)
                            <img src="{{ asset('/backafs/assets/images/users/internal.png') }}" alt="users"
                                class="rounded-circle" width="40" />
                        @else
                            <img src="{{ asset('/backafs/assets/images/users/user.png') }}" alt="users"
                                class="rounded-circle" width="40" />
                        @endif
                    </div>
                    <div class="user-content hide-menu ms-2">
                        <div class="" id="Userdd">
                            <h5 class="mb-0 user-name font-medium">{{ Auth::user()->name }}</h5>
                            <span class="op-5 user-email">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>
            </li>

            <div class="dropdown-divider"></div>

            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ route('dashboard') }}" aria-expanded="false"><i data-feather="monitor"
                        class="feather-icon"></i><span class="hide-menu">Dashboard</span></a>
            </li>
            <div class="dropdown-divider"></div>

            {{-- SUPER ADMIN AKSES --}}
            @if (Auth::user()->roles == 1)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-database feather-sm">
                            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                        </svg>
                        <span class="hide-menu">Data Master</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('data-pengguna') }}" class="sidebar-link">
                                <i class="bi-person-circle" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">User Pengguna</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('data-verifikator') }}" class="sidebar-link">
                                <i class="bi-person-circle" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">User Verifikator</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('data-penandatangan') }}" class="sidebar-link">
                                <i class="bi-person-circle" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">User Penandatangan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('data-report') }}" class="sidebar-link">
                                <i class="bi-person-circle" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">User Report</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('data-kecamatan') }}" class="sidebar-link">
                                <i class="bi-geo-alt" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Kecamatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('template-surat') }}" class="sidebar-link">
                                <i class="bi-credit-card-2-front" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Template Surat Ormas</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <div class="dropdown-divider"></div>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-layers feather-sm">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span class="hide-menu">Bidang Kegiatan</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('data-bidang') }}" class="sidebar-link">
                                <i class="bi-diagram-2" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Bidang</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <div class="dropdown-divider"></div>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ route('data-syarat') }}" aria-expanded="false"><i data-feather="file-text"
                        class="feather-icon"></i><span class="hide-menu">Syarat Administrasi</span></a>
                </li>

                <div class="dropdown-divider"></div>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ route('alur-persyaratan') }}" aria-expanded="false"><i data-feather="send"
                        class="feather-icon"></i><span class="hide-menu">Alur Persyaratan</span></a>
                </li>

                <div class="dropdown-divider"></div>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ route('slider') }}" aria-expanded="false"><i data-feather="image"
                        class="feather-icon"></i><span class="hide-menu">Slider Gambar</span></a>
                </li>


            @endif

            {{-- VERIFIKATOR AKSES --}}
            @if (Auth::user()->roles == 2)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-layers feather-sm">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span class="hide-menu">Verifikasi Data Baru</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('list-verifikasi') }}" class="sidebar-link">
                                <i class="bi-clipboard-check" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Data Dukung</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('list-survey') }}" class="sidebar-link">
                                <i class="bi-joystick" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Survey</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('list-surat') }}" class="sidebar-link">
                                <i class="bi-journal-text" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Pengajuan Surat</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <div class="dropdown-divider"></div>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-activity feather-sm">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                        <span class="hide-menu">Verifikasi Data Perubahan</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('notif-rubah') }}" class="sidebar-link">
                                <i class="bi-files" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Data Perubahan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('nomer-perubahan') }}" class="sidebar-link">
                                <i class="bi-list-ol" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Nomor Perubahan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <div class="dropdown-divider"></div>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-database feather-sm">
                            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                        </svg>
                        <span class="hide-menu">Rubah Data Langsung</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('rubah-langsung') }}" class="sidebar-link">
                                <i class="bi-files" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">List Data</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('rubah-persyaratan') }}" class="sidebar-link">
                                <i class="bi-layout-text-sidebar" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Persyaratan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('rubah-pengurus') }}" class="sidebar-link">
                                <i class="bi-person-plus" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Kepengurusan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('rubah-dokumen') }}" class="sidebar-link">
                                <i class="bi-journals" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Dokumen</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- USER AKSES --}}
            @if (Auth::user()->roles == 3)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-grid feather-sm">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        <span class="hide-menu">Syarat Administrasi</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('data-ormas') }}" aria-expanded="false">
                                <i class="bi-file-earmark-text" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Data Dukung </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('pengurus-ormas') }}" aria-expanded="false">
                                <i class="bi-people" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Kepengurusan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('dokumen-ormas') }}" class="sidebar-link">
                                <i class="bi-cloud-upload" style="color:rgb(145, 11, 18)"></i>
                                <span class="hide-menu">Upload Dokumen</span>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (Auth::user()->permohonan_id == 6)
                    <div class="dropdown-divider"></div>
                    <li class="sidebar-item">
                        <a href="{{ route('data-perubahan') }}" class="sidebar-link">
                            <i data-feather="edit" class="feather-icon"></i>
                            <span class="hide-menu">Perubahan Data</span>
                        </a>
                    </li>
                @endif
                <div class="dropdown-divider"></div>
                <li class="sidebar-item">
                    <a href="{{ route('kirim-ormas') }}" class="sidebar-link">
                        <i data-feather="send" class="feather-icon"></i>
                        @if (Auth::user()->permohonan_id > 1)
                            <span class="hide-menu">Status Permohonan</span>
                        @else
                            <span class="hide-menu">Kirim Permohonan</span>
                        @endif
                    </a>
                </li>
                <div class="dropdown-divider"></div>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ route('laporan-semester') }}" aria-expanded="false"><i data-feather="file"
                        class="feather-icon"></i><span class="hide-menu">Laporan Semester</span></a>
                </li>
            @endif

            {{-- PENANDATANGAN AKSES --}}
            @if (Auth::user()->roles == 4)
                <li class="sidebar-item">
                    <a href="{{ route('ttd') }}" class="sidebar-link">
                        <i class="bi-pen"></i>
                        <span class="hide-menu">Data Baru</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('ttdperubahan') }}" class="sidebar-link">
                        <i class="bi-pencil-square"></i>
                        <span class="hide-menu">Data Perubahan</span>
                    </a>
                </li>
            @endif

            {{-- REPORT AKSES --}}
            @if (Auth::user()->roles == 5)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-book-open feather-sm">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                        <span class="hide-menu">Laporan Data ORMAS</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('ormas-terdaftar') }}" class="sidebar-link">
                                <i class="bi-clipboard-check"></i>
                                <span class="hide-menu">Terdaftar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('ormas-kecamatan') }}" class="sidebar-link">
                                <i class="bi-clipboard-check"></i>
                                <span class="hide-menu">Kecamatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('ormas-kelurahan') }}" class="sidebar-link">
                                <i class="bi-clipboard-check"></i>
                                <span class="hide-menu">Kelurahan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <div class="dropdown-divider"></div>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ route('laporan-admin') }}" aria-expanded="false"><i data-feather="folder"
                        class="feather-icon"></i><span class="hide-menu">Laporan</span></a>
                </li>
            @endif

            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <li class="sidebar-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();" aria-expanded="false">
                        <i data-feather="log-out" class="feather-sm text-danger me-1"></i>
                        <span class="hide-menu">Log
                            Out</span>
                    </a>
                </li>
            </form>
        </ul>
    </nav>
</div>
