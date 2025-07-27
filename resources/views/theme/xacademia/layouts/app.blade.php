<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {!! render_meta_tags($meta ?? null) !!}
    <!-- Favicon -->
    @if (setting('site_favicon'))
        <link rel="icon" href="{{ asset('storage/' . setting('site_favicon')) }}" type="image/png">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('theme/xacademia/assets/images/brand/favicon.ico') }}" />
    @endif

    <!-- Title -->
    <title> {{ $page->title ?? env('APP_NAME') }}</title>

    <!-- Bootstrap css -->
    <link id="style" href="{{ asset('theme/xacademia/assets/plugins/bootstrap/css/bootstrap.css') }}"
        rel="stylesheet" />

    <!-- Style css -->
    <link href="{{ asset('theme/xacademia/assets/css/style.css') }}" rel="stylesheet" />

    <!-- Plugin Css -->
    <link href="{{ asset('theme/xacademia/assets/css/plugins.css') }}" rel="stylesheet" />

    <!-- Font-awesome  css -->
    <link href="{{ asset('theme/xacademia/assets/css/icons.css') }}" rel="stylesheet" />

    <!-- Color Skin css -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('theme/xacademia/assets/color-skins/color.css') }}" />

    @stack('head')

</head>

<body>

    <!--Loader-->
    {{-- <div id="global-loader">
        <img src="{{ asset('theme/xacademia/assets/images/loader.svg') }}" class="loader-img" alt="img">
    </div> --}}
    <!--/Loader-->


    <!--Section-->
    <div class="banner-1 cover-image bg-background-1" data-bs-image-src="@yield('bannerImage', asset('theme/xacademia/assets/images/banners/default.jpg'))">
        <!--Topbar-->

        @include('theme.xacademia.layouts.header')

        <!--Section-->
        @yield('banner')
        <!--/Section-->
    </div><!--/Section-->



    @yield('content')



    @include('theme.xacademia.layouts.footer')



    <!-- JQuery js-->
    <script src="{{ asset('theme/xacademia/assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('theme/xacademia/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/xacademia/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--JQuery IT Coursesrkline js-->
    <script src="{{ asset('theme/xacademia/assets/js/jquery.sparkline.min.js') }}"></script>

    <!-- Circle Progress js-->
    <script src="{{ asset('theme/xacademia/assets/js/circle-progress.min.js') }}"></script>

    <!-- Star Rating js-->
    <script src="{{ asset('theme/xacademia/assets/plugins/jquery-bar-rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('theme/xacademia/assets/plugins/jquery-bar-rating/js/rating.js') }}"></script>

    <!--Owl Carousel js -->
    <script src="{{ asset('theme/xacademia/assets/plugins/owl-carousel/owl.carousel.js') }}"></script>

    <!--Horizontal Menu js-->
    <script src="{{ asset('theme/xacademia/assets/plugins/horizontal-menu/horizontal-menu.js') }}"></script>

    <!--Counters -->
    <script src="{{ asset('theme/xacademia/assets/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('theme/xacademia/assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('theme/xacademia/assets/plugins/counters/numeric-counter.js') }}"></script>

    <!--JQuery TouchSwipe js-->
    <script src="{{ asset('theme/xacademia/assets/js/jquery.touchSwipe.min.js') }}"></script>

    <!--Select2 js -->
    <script src="{{ asset('theme/xacademia/assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('theme/xacademia/assets/js/select2.js') }}"></script>

    <!-- Cookie js -->
    <script src="{{ asset('theme/xacademia/assets/plugins/cookie/jquery.ihavecookies.js') }}"></script>
    <script src="{{ asset('theme/xacademia/assets/plugins/cookie/cookie.js') }}"></script>

    <!-- Internal :::   Jquery flexdatalist js -->
    <script src="{{ asset('theme/xacademia/assets/plugins/jquery.flexdatalist/jquery.flexdatalist.js') }}"></script>
    <script src="{{ asset('theme/xacademia/assets/plugins/jquery.flexdatalist/data-list.js') }}"></script>

    <!-- sticky js-->
    <script src="{{ asset('theme/xacademia/assets/js/sticky.js') }}"></script>

    <!-- Perfect Scrollbar js -->
    <script src="{{ asset('theme/xacademia/assets/plugins/pscrollbar/pscrollbar.js') }}"></script>

    <!-- Scripts js-->
    <script src="{{ asset('theme/xacademia/assets/js/owl-carousel.js') }}"></script>

    <!-- Typewritter js-->
    <script src="{{ asset('theme/xacademia/assets/js/typewritter.js') }}"></script>

    <!-- Theme color Js-->
    <script src="{{ asset('theme/xacademia/assets/js/themeColors.js') }}"></script>

    <!-- Switcher Styles Js-->
    <script src="{{ asset('theme/xacademia/assets/js/switcher-styles.js') }}"></script>

    <!-- Custom js-->
    <script src="{{ asset('theme/xacademia/assets/js/custom.js') }}"></script>

</body>

</html>
