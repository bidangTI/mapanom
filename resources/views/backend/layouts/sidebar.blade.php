<div class="scroll-sidebar">
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li>
                <div class="user-profile d-flex no-block dropdown mt-3">
                    <div class="user-pic"><img src="{{ asset('/backafs/assets/images/users/1.jpg') }}" alt="users"
                            class="rounded-circle" width="40" /></div>
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
            @if (Auth::user()->roles == 1 || Auth::user()->roles == 2 || Auth::user()->roles == 3)
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-database feather-sm">
                            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                        </svg>
                        <span class="hide-menu">Data Tabel</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="form-basic.html" class="sidebar-link">
                                <i data-feather="user" class="feather-icon"></i>
                                <span class="hide-menu">Data User</span>
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
                                <i data-feather="menu" class="feather-icon"></i>
                                <span class="hide-menu">Bidang</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <div class="dropdown-divider"></div>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-folder feather-sm">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z">
                            </path>
                        </svg>
                        <span class="hide-menu">Persyaratan ORMAS</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('data-ormas') }}" aria-expanded="false">
                                <i data-feather="edit-2" class="feather-icon">
                                </i><span class="hide-menu">Giat Semester</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('data-ormas') }}" aria-expanded="false">
                                <i data-feather="edit-2" class="feather-icon">
                                </i><span class="hide-menu">Input Data</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('pengurus-ormas') }}" aria-expanded="false">
                                <i data-feather="users" class="feather-icon">
                                </i><span class="hide-menu">Kepengurusan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('dokumen-ormas') }}" class="sidebar-link">
                                <i data-feather="upload" class="feather-icon"></i>
                                <span class="hide-menu">Upload Dokumen</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('kirim-ormas') }}" class="sidebar-link">
                                <i data-feather="send" class="feather-icon"></i>
                                <span class="hide-menu">Kirim Permohonan</span>
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
                    href="{{ route('laporan-semester') }}" aria-expanded="false"><i data-feather="file"
                        class="feather-icon"></i><span class="hide-menu">Laporan Semester</span></a>
                </li>   
                
                <div class="dropdown-divider"></div>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ route('slider') }}" aria-expanded="false"><i data-feather="image"
                        class="feather-icon"></i><span class="hide-menu">Slider Gambar</span></a>
                </li>
                
                <div class="dropdown-divider"></div>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ route('laporan-admin') }}" aria-expanded="false"><i data-feather="folder"
                        class="feather-icon"></i><span class="hide-menu">Laporan</span></a>
                </li>

                {{-- <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-folder feather-sm">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z">
                            </path>
                        </svg>
                        <span class="hide-menu">Persyaratan PARPOL</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('data-parpol') }}" aria-expanded="false">
                                <i data-feather="edit-2" class="feather-icon">
                                </i><span class="hide-menu">Input Data</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('pengurus-parpol') }}" aria-expanded="false">
                                <i data-feather="users" class="feather-icon">
                                </i><span class="hide-menu">Kepengurusan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('upload-parpol') }}" class="sidebar-link">
                                <i data-feather="upload" class="feather-icon"></i>
                                <span class="hide-menu">Upload Dokumen</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            @endif

            {{-- {{ ADMIN/OPERATOR OPD }} --}}
            {{-- @if (Auth::user()->id_level == 2)
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('ticket.create') }}" aria-expanded="false">
                        <i data-feather="bookmark" class="feather-icon"></i>
                        <span class="hide-menu">Buat Aduan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('delegasi.create') }}" aria-expanded="false">
                        <i data-feather="external-link" class="feather-icon"></i>
                        <span class="hide-menu">Delegasi Aduan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('report.create') }}" aria-expanded="false">
                        <i class="bi-arrow-left-right"></i>
                        <span class="hide-menu">ON Progress</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('report.finish') }}" aria-expanded="false">
                        <i class="bi-laptop"></i>
                        <span class="hide-menu">Aduan Selesai</span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="#"
                        aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-book-open feather-sm">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg><span class="hide-menu">Grafik Aduan </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('grafik.kategori') }}" aria-expanded="false">
                                <i class="bi-graph-up"></i>
                                <span class="hide-menu">Kategori Aduan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('lapaduanopd.show') }}" aria-expanded="false">
                                <i class="bi-graph-up"></i>
                                <span class="hide-menu">Kategori OPD</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="#"
                        aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-book-open feather-sm">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg><span class="hide-menu">Report Aduan Selesai</span></a>

                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('laporan.show') }}" aria-expanded="false">
                                <i class="ri-printer-line"></i>
                                <span class="hide-menu">Cetak PDF</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('laporan.excel_show') }}"
                                aria-expanded="false">
                                <i class="ri-printer-line"></i>
                                <span class="hide-menu">Cetak Excel</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif --}}

            {{-- USER AKSES --}}
            {{-- @if (Auth::user()->id_level == 3)
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('ticket.create') }}" aria-expanded="false">
                        <i data-feather="bookmark" class="feather-icon"></i>
                        <span class="hide-menu">Buat Aduan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('ticket.tracking') }}" aria-expanded="false">
                        <i data-feather="search" class="feather-icon"></i>
                        <span class="hide-menu">Tracking Aduan</span>
                    </a>
                </li>
            @endif --}}

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
