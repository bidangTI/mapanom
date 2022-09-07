<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header">
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ri-close-line fs-6 ri-menu-2-line"></i>
        </a>
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <b class="logo-icon">
                <img src="{{ asset('backafs/assets/images/app/iconbar1.png') }}" alt="homepage" class="dark-logo" />
            </b>
            <span class="logo-text">
                <img src="{{ asset('backafs/assets/images/app/iconbar1.png') }}" alt="homepage" class="dark-logo" />
            </span>
        </a>

        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><i class="ri-more-line fs-6"></i></a>
    </div>
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light"
                    href="javascript:void(0)" data-sidebartype="mini-sidebar"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu feather-sm">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg></a></li>
        </ul>

        <ul class="navbar-nav">
            <div class="d-flex no-block align-items-center p-2 text-white text-end">
                <div class="ms-2">
                    <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                </div>
            </div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                        src="{{ asset('backafs/assets/images/users/1.jpg') }}" alt="user" class="rounded-circle"
                        width="31"></a>
                <div class="dropdown-menu dropdown-menu-end user-dd animated flipInY">
                    <span class="with-arrow"><span class="bg-primary"></span></span>
                    <div class="d-flex no-block align-items-center p-3 bg-primary text-white mb-2">
                        <div class=""><img src="../../backafs/assets/images/users/1.jpg" alt="user"
                                class="rounded-circle" width="60"></div>
                        <div class="ms-2">
                            <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                            <p class=" mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i data-feather="settings" class="feather-sm text-warning me-1">
                        </i>
                        Reset Password
                    </a>
                    <div class="dropdown-divider"></div>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();" aria-expanded="false">
                            <i data-feather="log-out" class="feather-sm text-danger me-1"></i> Logout
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
