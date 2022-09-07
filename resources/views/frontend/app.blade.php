<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ config('app.name') }}" />
    <meta name="description" content="{{ config('app.name') }}" />
    <meta name="author" content="https://www.themetechmount.com/" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Frontend</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ asset('frontafs/images/app/Logo-Pemkot.png') }}">

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/css/bootstrap.min.css') }}">

    <!-- animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/css/animate.css') }}">

    <!-- owl-carousel -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/css/owl.carousel.css') }}">

    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/css/font-awesome.css') }}">

    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/css/themify-icons.css') }}">

    <!-- flaticon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/css/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/revolution/css/rs6.css') }}">

    <!-- prettyphoto -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/css/prettyPhoto.css') }}">

    <!-- shortcodes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/css/shortcodes.css') }}">

    <!-- CSS DatePicker -->
       <link rel="stylesheet" type="text/css"
        href="{{ asset('backafs/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <!-- main -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/css/main.css') }}">

    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontafs/css/responsive.css') }}">


    @livewireStyles()
    @method('style')
</head>

<body class="ttm-one-page-site">
    <div class="page">
        <!-- preloader start -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- preloader end -->

        <!--header start-->
        <header id="masthead" class="header ttm-header-style-04">
            <!-- ttm-topbar-wrapper -->
            @include('frontend.header')
        </header>

        <!-- START homeclassicmain REVOLUTION SLIDER 6.0.1 -->
        @yield('slider')

        <!--site-main start-->
        <div class="site-main">
            @yield('content')
        </div>
    </div>
    <!--site-main end-->

    <!--footer start-->
    <footer id="contact-us" class="footer widget-footer clearfix">
        @include('frontend.footer')
    </footer>
    <!--footer end-->

    <!--back-to-top start-->
    <a id="totop" href="#top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--back-to-top end-->

    </div><!-- page end -->

    <!-- Javascript -->

    <script src={{ asset('frontafs/js/jquery.min.js') }}></script>
    <script src={{ asset('frontafs/js/tether.min.js') }}></script>
    <script src={{ asset('frontafs/js/bootstrap.min.js') }}></script>
    <script src={{ asset('frontafs/js/jquery.easing.js') }}></script>
    <script src={{ asset('frontafs/js/jquery-waypoints.js') }}></script>
    <script src={{ asset('frontafs/js/jquery-validate.js') }}></script>
    <script src={{ asset('frontafs/js/owl.carousel.js') }}></script>
    <script src={{ asset('frontafs/js/jquery.prettyPhoto.js') }}></script>
    <script src={{ asset('frontafs/js/numinate.min.js?ver=4.9.3') }}></script>
    <script src={{ asset('frontafs/js/lazysizes.min.js') }}></script>
    <script src={{ asset('frontafs/js/main.js') }}></script>

    <!-- Revolution Slider -->
    <script src={{ asset('frontafs/revolution/js/revolution.tools.min.js') }}></script>
    <script src={{ asset('frontafs/revolution/js/rs6.min.js') }}></script>
    <script src={{ asset('frontafs/revolution/js/slider.js') }}></script>
    <script src="{{ asset('backafs/assets/libs/moment/moment.js') }}"></script>

    {{-- Date Picker JS --}}
    <script src="{{ asset('backafs/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Javascript end-->
    @livewireScripts
    @stack('script')

</body>

</html>
