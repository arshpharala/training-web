<!doctype html>
<html lang="en">
<head>
	<!-- Meta data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content=" Edomi - Online Education & Learning Courses HTML CSS Responsive Template" name="description">
	<meta content="Spruko Technologies Private Limited" name="author">
	<meta name="keywords" content="html , html dir ,  website template, bootstrap 5  template,  bootstrap template, admin panel template , admin panel , html5 , academy training course css template, classes online training website templates, courses training html5 template design, education training rwd simple template, educational learning management jquery html, elearning bootstrap education template, professional training center bootstrap html, institute coaching mobile responsive template, marketplace html template premium, learning management system jquery html, clean online course teaching directory template, online learning course management system, online course website template css html, premium lms training web template, training course responsive website"/>

	<!-- Favicon -->
	<link rel="icon" href="{{asset('theme/xacademia/assets/images/brand/favicon.ico') }}" type="image/x-icon"/>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('theme/xacademia/assets/images/brand/favicon.ico') }}" />

	<!-- Title -->
	<title> Edomi - Online Education & Learning Courses HTML CSS Responsive Template</title>

	<!-- Bootstrap css -->
	<link id="style" href="{{asset('theme/xacademia/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

	<!-- Style css -->
	<link href="{{asset('theme/xacademia/assets/css/style.css') }}" rel="stylesheet" />

	<!-- Plugin Css -->
	<link href="{{asset('theme/xacademia/assets/css/plugins.css') }}" rel="stylesheet" />

	<!-- Font-awesome  css -->
	<link href="{{asset('theme/xacademia/assets/css/icons.css') }}" rel="stylesheet"/>

	<!-- Color Skin css -->
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('theme/xacademia/assets/color-skins/color.css') }}" />
<style>
.link-list {
    list-style: none;
    padding-left: 0;
    margin: 0;
    position: relative;
    width: 220px;
}

.link-list > li {
    margin-bottom: 10px;
    position: relative;
}

.link-list > li.title {
    font-weight: bold;
    font-size: 16px;
    margin-bottom: 12px;
}

.link-list a {
    color: #1a1a2e;
    text-decoration: none;
    display: block;
    padding: 4px 10px;
    transition: 0.2s;
    white-space: nowrap;
}

.link-list a:hover {
    color: #6c5ce7;
}

/* Submenu styling */
.has-submenu {
    position: relative;
}

.submenu {
    display: none;
    position: absolute;
    top: 0;
    left: 100%;
    margin-left: -1px;
    padding: 8px 0;
    list-style: none;
    z-index: 999;
    min-width: 260px;
    background: #fff;
    border: 1px solid #6c5ce7;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}


.has-submenu:hover > .submenu {
    display: block;
}

/* Nested submenus */
.submenu .has-submenu {
    position: relative;
}

.submenu .submenu {
    top: 0;
    left: calc(100% + 1px);
    margin-top: 0;
    margin-left: -1px; /* aligns right next to the topic box */
    border: 1px solid #6c5ce7;
    background: #fff;
    position: absolute;
    min-width: 220px;
    z-index: 999;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}


/* Optional arrow indicator */
.has-submenu > a::after {
    content: ' ▶';
    float: right;
    font-size: 12px;
    margin-right: 5px;
    color: #aaa;
}
</style>
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
	<script src="{{asset('theme/xacademia/assets/js/jquery.min.js') }}"></script>

	<!-- Bootstrap js -->
	<script src="{{asset('theme/xacademia/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{asset('theme/xacademia/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

	<!--JQuery IT Coursesrkline js-->
	<script src="{{asset('theme/xacademia/assets/js/jquery.sparkline.min.js') }}"></script>

	<!-- Circle Progress js-->
	<script src="{{asset('theme/xacademia/assets/js/circle-progress.min.js') }}"></script>

	<!-- Star Rating js-->
	<script src="{{asset('theme/xacademia/assets/plugins/jquery-bar-rating/jquery.barrating.js') }}"></script>
	<script src="{{asset('theme/xacademia/assets/plugins/jquery-bar-rating/js/rating.js') }}"></script>

	<!--Owl Carousel js -->
	<script src="{{asset('theme/xacademia/assets/plugins/owl-carousel/owl.carousel.js') }}"></script>

	<!--Horizontal Menu js-->
	<script src="{{asset('theme/xacademia/assets/plugins/horizontal-menu/horizontal-menu.js') }}"></script>

	<!--Counters -->
	<script src="{{asset('theme/xacademia/assets/plugins/counters/counterup.min.js') }}"></script>
	<script src="{{asset('theme/xacademia/assets/plugins/counters/waypoints.min.js') }}"></script>
	<script src="{{asset('theme/xacademia/assets/plugins/counters/numeric-counter.js') }}"></script>

	<!--JQuery TouchSwipe js-->
	<script src="{{asset('theme/xacademia/assets/js/jquery.touchSwipe.min.js') }}"></script>

	<!--Select2 js -->
	<script src="{{asset('theme/xacademia/assets/plugins/select2/select2.full.min.js') }}"></script>
	<script src="{{asset('theme/xacademia/assets/js/select2.js') }}"></script>

	<!-- Cookie js -->
	<script src="{{asset('theme/xacademia/assets/plugins/cookie/jquery.ihavecookies.js') }}"></script>
	<script src="{{asset('theme/xacademia/assets/plugins/cookie/cookie.js') }}"></script>

	<!-- Internal :::   Jquery flexdatalist js -->
	<script src="{{asset('theme/xacademia/assets/plugins/jquery.flexdatalist/jquery.flexdatalist.js') }}"></script>
	<script src="{{asset('theme/xacademia/assets/plugins/jquery.flexdatalist/data-list.js') }}"></script>

	<!-- sticky js-->
	<script src="{{asset('theme/xacademia/assets/js/sticky.js') }}"></script>

	<!-- Perfect Scrollbar js -->
	<script src="{{asset('theme/xacademia/assets/plugins/pscrollbar/pscrollbar.js') }}"></script>

	<!-- Scripts js-->
	<script src="{{asset('theme/xacademia/assets/js/owl-carousel.js') }}"></script>

	<!-- Typewritter js-->
	<script src="{{asset('theme/xacademia/assets/js/typewritter.js') }}"></script>

	<!-- Theme color Js-->
	<script src="{{asset('theme/xacademia/assets/js/themeColors.js') }}"></script>

	<!-- Switcher Styles Js-->
	<script src="{{asset('theme/xacademia/assets/js/switcher-styles.js') }}"></script>

	<!-- Custom js-->
	<script src="{{asset('theme/xacademia/assets/js/custom.js') }}"></script>

</body>

</html>
