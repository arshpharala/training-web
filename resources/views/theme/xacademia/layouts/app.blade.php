<!doctype html>

<html lang="{{ app()->getLocale() }}"
    style="--primary-05: rgba(33, 33, 33, 0.05); --primary-1: rgba(33, 33, 33, 0.1); --primary-2: rgba(33, 33, 33, 0.2); --primary-3: rgba(33, 33, 33, 0.3); --primary-4: rgba(33, 33, 33, 0.4); --primary-5: rgba(33, 33, 33, 0.5); --primary-6: rgba(33, 33, 33, 0.6); --primary-7: rgba(33, 33, 33, 0.7); --primary-8: rgba(33, 33, 33, 0.8); --primary-9: rgba(33, 33, 33, 0.9); --primary-bg-color: #212121; --primary-bg-hover: #21212195; --primary-bg-border: #212121; --primary-bg-transparentcolor: #21212120; --dark-body: #212132dd; --dark-theme: #212132;">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {!! render_meta_tags($meta ?? null) !!}
    <!-- Favicon -->
    @if (setting('site_favicon'))
        <link rel="icon" href="{{ asset(setting('site_favicon')) }}" type="image/png">
    @else
        <link rel="icon" type="image/x-icon"
            href="{{ asset('theme/xacademia/assets/images/brand/favicon.ico') }}" />
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

    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/enquiry-popup.css') }}">

    @stack('head')


</head>

<body>

    <!--Loader-->
    {{-- <div id="global-loader">
        <img src="{{ asset('theme/xacademia/assets/images/loader.svg') }}" class="loader-img" alt="img">
    </div> --}}
    <!--/Loader-->


    <!--Section-->
    <div class="banner-1 cover-image bg-background-1" data-bs-image-src="@yield('bannerImage', asset('theme/xacademia/assets/images/banners/5.jpg'))">
        <!--Topbar-->

        @include('theme.xacademia.layouts.header')

        <!--Section-->
        @yield('banner')
        <!--/Section-->
    </div><!--/Section-->



    @yield('content')



    @include('theme.xacademia.layouts.footer')

    @include('theme.xacademia.components._enquiry-popup')


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

    <script src="{{ asset('assets/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/enquiry-popup.js') }}"></script>
    <script src="{{ asset('assets/js/form.js') }}"></script>

    @stack('scripts')


</body>

</html>
