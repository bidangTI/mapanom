<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/backafs/assets/images/app/iconbar1.png') }}">

    <!-- CSS DatePicker -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/backafs/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/backafs/assets/libs/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/backafs/assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">

    {{-- Select2 CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/backafs/assets/libs/select2/dist/css/select2.min.css') }}">

    {{-- DataTable CSS --}}
    <link href="{{ asset('/backafs/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/backafs/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}">

    {{-- Editor Summernote CSS --}}
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/backafs/assets/extra-libs/summernote/summernote-lite.min.css') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('/backafs/dist/css/style.min.css') }}" rel="stylesheet">

    @livewireStyles
    @stack('style')
</head>

<body>
    <div class="preloader">
        <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
                stroke="#2962FF" stroke-width="2"></path>
            <path
                d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
                stroke="#2962FF" stroke-width="2"></path>
            <path id="teabag" fill="#2962FF" fill-rule="evenodd" clip-rule="evenodd"
                d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z">
            </path>
            <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" stroke="#2962FF"></path>
            <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#2962FF"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>

    <div id="main-wrapper">
        <header class="topbar">
            @include('backend.layouts.header')
        </header>

        <aside class="left-sidebar">
            @include('backend.layouts.sidebar')
        </aside>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                @yield('breadcumb')
            </div>

            <div class="container-fluid">
                @yield('content')
            </div>

            <footer class="footer text-center">
                @include('backend.layouts.footer')
            </footer>
        </div>
    </div>
    <aside class="customizer">
        {{-- @include('layouts.aside') --}}
    </aside>
    <div class="chat-windows"></div>

    <script src="{{ asset('/backafs/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('/backafs/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Theme Required Js -->
    <script src="{{ asset('/backafs/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('/backafs/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('/backafs/dist/js/app-style-switcher.js') }}"></script>

    <!-- perfect scrollbar JS -->
    <script src="{{ asset('/backafs/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('/backafs/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('/backafs/dist/js/waves.js') }}"></script>

    <!--Menu sidebar JS-->
    <script src="{{ asset('/backafs/dist/js/sidebarmenu.js') }}"></script>

    <!--Custom JS -->
    <script src="{{ asset('/backafs/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('/backafs/dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('/backafs/assets/libs/moment/moment.js') }}"></script>

    {{-- Date Picker JS --}}
    <script src="{{ asset('/backafs/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/backafs/assets/libs/daterangepicker/daterangepicker.js') }}"></script>
    <script
        src="{{ asset('/backafs/assets/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js') }}">
    </script>

    {{-- Data Table JS --}}
    <script src="{{ asset('/backafs/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backafs/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/backafs/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

    {{-- Select2 JS --}}
    <script src="{{ asset('/backafs/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/backafs/assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/backafs/dist/js/pages/forms/select2/select2.init.js') }}"></script>

    {{-- Editor Summernote JS --}}
    <script src="{{ asset('/backafs/assets/extra-libs/summernote/summernote-lite.min.js') }}"></script>

    {{-- Sweet Alert JS --}}
    <script src="{{ asset('/backafs/assets/libs/sweetalert2@10.js') }}"></script>


    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                title: event.detail.message,
                icon: event.detail.type,
                toast: event.detail.toast,
                position: event.detail.position,
                showConfirmButton: false,
                timer: 2000
            });
        });
    </script>

    @livewireScripts
    @stack('script')
</body>

</html>
