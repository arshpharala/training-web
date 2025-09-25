<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ setting('site_title') }}</title>
    <meta name="theme-color" content="#ffffff">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/coreui/vendors/simplebar/css/simplebar.css') }}">
    <link href="{{ asset('theme/coreui/vendors/datatables.net-bs5/css/dataTables.bootstrap5.css') }}" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />


    <link href="{{ asset('theme/coreui/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('theme/coreui/js/color-modes.js') }}"></script>

    <style>
        .img-sm {
            max-width: 35px;
            /* Example: limit image width */
            height: auto;
            display: block;
            /* Example: for centering */
            margin: 0 auto;
            /* Example: for centering */
        }
    </style>

    @stack('head')
</head>

<body>
    @include('theme.coreui.layouts.sidebar')
    @include('theme.coreui.layouts.aside')

    <div class="wrapper d-flex flex-column min-vh-100">
        <header class="header header-sticky p-0 mb-4">
            @include('theme.coreui.layouts.header')

            @hasSection('breadcrumb')
                <div class="container-fluid px-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb my-0">
                            @yield('breadcrumb')
                        </ol>
                    </nav>
                </div>
            @endif

        </header>
        <div class="body flex-grow-1">
            <div class="container-fluid">
                @yield('content-header')
            </div>



            <div class="container-fluid ">
                @yield('content')

            </div>
        </div>

    </div>
    <script src="{{ asset('theme/coreui/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme/coreui/vendors/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/coreui/vendors/datatables.net/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/coreui/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/js/form.js') }}"></script>
    <script src="{{ asset('assets/js/navbar.js') }}"></script>
    <script>
        const header = document.querySelector('header.header');

        document.addEventListener('scroll', () => {
            if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
        });
    </script>

    @stack('scripts')

</body>

</html>
