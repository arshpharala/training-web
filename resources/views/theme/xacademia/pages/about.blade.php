@extends('theme.xacademia.layouts.app')
@section('bannerImage', asset('storage/' . $page->banner))

@section('banner')

    <!--Section-->
    <section>
        <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white py-7">
                        <h1 class="">About Us</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->
    </div>
@endsection

@section('content')
    <!--section-->
    <section class="sptb position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center mb-5">
                    <h1 class="mb-4 font-weight-bold">About Xcademia?</h1>
                    <p class="leading-normal lead-1">Majority have suffered alteration in some form, by injected humor</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <p class="leading-normal  fs-16">There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered by injected humour, or randomised words which don't look even slightly
                        believable.
                        If you are going to use a passage of Lorem Ipsum, you need to as necessary All the Lorem Ipsum
                        generators on the Internet tend to repeat</p>
                    <p class="leading-normal  fs-16">There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered by injected humour, or randomised words which don't look even slightly
                        believable.
                        If you are going to use a passage of Lorem Ipsum, you need to as necessary All the Lorem Ipsum
                        generators on the Internet tend to repeat</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="text-justify">
                        <p class="leading-normal fs-16">It is a long established fact that a reader will be distracted by
                            the readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                            that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                            content here', making it look like readable English.</p>
                        <p class="leading-normal mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                    </div>
                </div>
                <div class="aboutlink">
                    <a href="#sec1" class="">
                        <i class="fa fa-angle-double-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--/section-->
@endsection
