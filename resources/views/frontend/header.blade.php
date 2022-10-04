<!-- ttm-header-wrap -->
<div class="ttm-header-wrap">
    <!-- ttm-stickable-header-w -->
    <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
        <div id="site-header-menu" class="site-header-menu">
            <div class="site-header-menu-inner ttm-stickable-header">
                <div class="container">
                    <!-- site-branding -->
                    <div class="site-branding">
                        <a class="home-link" href="{{ route('home') }}" title="Altech" rel="home">
                            <img id="logo-img" class="img-center" src="{{ asset('frontafs/images/app/logonav.png') }}" alt="logo" style="max-height: 70px">
                        </a>
                    </div><!-- site-branding end -->
                    <!--site-navigation -->
                    <div id="site-navigation" class="site-navigation" data-sticky-height="70">
                        <div class="ttm-rt-contact">
                        </div>
                        <div class="ttm-menu-toggle">
                            <input type="checkbox" id="menu-toggle-form" />
                            <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                <span class="toggle-block toggle-blocks-1"></span>
                                <span class="toggle-block toggle-blocks-2"></span>
                                <span class="toggle-block toggle-blocks-3"></span>
                            </label>
                        </div>
                        <nav id="menu" class="menu">
                            <ul class="dropdown">
                                <li><a aria-current="page active has-submenu" href="{{ route('home') }}">Beranda</a></li>
                                <li><a aria-current="page" href="{{ route('guest.alur') }}">Alur</a></li>
                                <li><a aria-current="page" href="{{ route('guest.daftar') }}">Buat Akun</a></li>
                                <li><a aria-current="page" href="#contact-us">Kontak</a></li>
                                {{-- <li><a aria-current="page" href="{{ route('password.request') }}">Lupa Password</a></li> --}}
                                <li><a aria-current="page" href="{{ route('login') }}" target="_BLANK">Sign In</a></li>
                            </ul>
                        </nav>
                    </div><!-- site-navigation end-->
                </div>
            </div>
        </div>
    </div><!-- ttm-stickable-header-w end-->
</div>