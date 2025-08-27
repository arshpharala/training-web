@extends('theme.xacademia.layouts.app')
@section('bannerImage', asset('storage/' . $page->banner))

@section('banner')

    <!--Section-->
    <section>
        <div class="sptb-2 bannerimg">
            {{-- <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white py-7">
                        <h1 class="">About Us</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
                        </ol>
                    </div>
                </div>
            </div> --}}
            <div class="header-text1 mb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-md-12">
                            <div class="mt-7">
                                <h1 class="text-white display-5 font-weight-semibold">Training that lifts teams and lives
                                </h1>
                                <p class="text-white lead">At <b>Xcademia</b>, we blend expert mentors with an AI-powered
                                    learning engine to build practical skills you can use at work and in everyday life.
                                    Focus areas include Cybersecurity, GRC, Cloud, Software, Leadership, and personal
                                    effectiveness.</p>
                                <a href="javascript:void(0)" class="btn btn-lg btn-white">Explore Programs</a><a
                                    href="javascript:void(0)" class="btn btn-lg btn-outline-light ms-4 text-white">Talk to
                                    Expert</a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="card mt-7">
                                <div class="card-body">
                                    <div class="product-slider">
                                        <ul class="list-unstyled video-list-thumbs">
                                            <li class="mb-0">
                                                <a data-bs-toggle="modal" data-bs-target="#homeVideo"
                                                    class="class-video p-0">
                                                    <img src="{{ asset('theme/xacademia/assets/images/media/0-13.jpg') }}" alt="img"
                                                        class="img-responsive  border br-7">
                                                    <span class="video-icon" href="javascript:void(0)">
                                                        <i class="fe fe-play"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                {!! $page->translation->content !!}
                {{-- <div class="col-lg-12 col-md-12 col-sm-12 text-center mb-5">
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
                </div> --}}
                <div class="aboutlink">
                    <a href="#sec1" class="">
                        <i class="fa fa-angle-double-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--/section-->

    <!--section-->
    <section class="sptb bg-white" id="sec1">
        <div class="container">
            <div class="section-title d-md-flex mb-5">
                <div>
                    <h2>{!! page_content('why-us', 'heading', 'Why Only Xcademia?') !!}</h2>
                    <p class="fs-18 lead">{!! page_content('why-us', 'content', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="mb-lg-0 mb-4 box-shadow about-2 p-5">
                        <div class=" text-center">
                            <div class="icon-bg icon-service about">
                                <img src="{!! page_content('why-us-1', 'image') !!}" alt="img">
                            </div>
                            <div class="servic-data mt-3">
                                <h4 class="font-weight-semibold mb-2">{!! page_content('why-us-1', 'heading', 'Experience') !!}</h4>
                                <p class="mb-0 text-white">{!! page_content('why-us-1', 'content') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="mb-lg-0 mb-4 box-shadow p-5 br-bl-10 about-2">
                        <div class="text-center">
                            <div class=" icon-bg icon-service about bg-white br-100">
                                <img src="{!! page_content('why-us-2', 'image') !!}" alt="img">
                            </div>
                            <div class="servic-data mt-3">
                                <h4 class="font-weight-semibold mb-2">{!! page_content('why-us-2', 'heading', 'Professionality') !!}</h4>
                                <p class="mb-0">{!! page_content('why-us-2', 'content') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="mb-sm-0 mb-4 box-shadow about-2 p-5">
                        <div class="text-center">
                            <div class="icon-bg icon-service about">
                                <img src="{!! page_content('why-us-3', 'image') !!}" alt="img">
                            </div>
                            <div class="servic-data mt-3">
                                <h4 class="font-weight-semibold mb-2">{!! page_content('why-us-3', 'heading', 'Guarantee') !!}</h4>
                                <p class="mb-0">{!! page_content('why-us-3', 'content') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="mb-sm-0 mb-4 box-shadow about-2 p-5">
                        <div class="text-center">
                            <div class="icon-bg icon-service about">
                                <img src="{!! page_content('why-us-4', 'image') !!}" alt="img">
                            </div>
                            <div class="servic-data mt-3">
                                <h4 class="font-weight-semibold mb-2">{!! page_content('why-us-3', 'heading', 'Quality') !!}</h4>
                                <p class=" mb-0">{!! page_content('why-us-4', 'content', 'Guarantee') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->

    <!--Section-->
    <section>
        <div class="cover-image about-widget sptb bg-background-color" data-bs-image-src="{!! page_content('join-us', 'image') !!}">
            <div class="content-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h2 class="mb-2 text-white font-weight-400">{!! page_content('join-us', 'heading', 'Join With Us Today To Achieve Ur Goals...') !!}</h2>
                        <p class="lead">{!! page_content(
                            'join-us',
                            'content',
                            'It is a long established fact that a reader will be distracted by the readable
                                                                                                                                                                                                    content of a page when looking at its layout.',
                        ) !!}</p>
                        <div class="mt-5">
                            <a href="{{ route('categories.index') }}" class="btn btn-lg btn-secondary">Register Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->

    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="section-title d-md-flex mb-5">
                <div>
                    <h2>{!! page_content('why-choose-us', 'heading', 'Why Should Choose Us?') !!}</h2>
                    <p class="fs-18 lead">{!! page_content('why-choose-us', 'content') !!}</p>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12 col-lg-7 col-sm-12">
                    <div class="row ">
                        <div class="col-md-6 col-lg-6 features">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="feature">
                                        <div class="fa-stack fa-lg fea-icon bg-success mb-3">
                                            <i class="fa fa-bullhorn text-white"></i>
                                        </div>
                                        <div class="">
                                            <h3 class="font-weight-semibold">{!! page_content('why-choose-us-1', 'heading', 'Flexible Timing') !!}</h3>
                                            <p>{!! page_content(
                                                'why-choose-us-1',
                                                'content',
                                                'our being able to do what we like best, every pleasure is to be welcomed and
                                                                                                                                                                                                                                                                                                                        every pain.',
                                            ) !!}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="feature">
                                        <div class="fa-stack fa-lg bg-primary  fea-icon mb-3">
                                            <i class="fa fa-heart  text-white"></i>
                                        </div>
                                        <h3 class="font-weight-semibold">{!! page_content('why-choose-us-2', 'heading', 'Online Intractive Classes') !!}</h3>
                                        <p>{!! page_content(
                                            'why-choose-us-2',
                                            'content',
                                            'our being able to do what we like best, every pleasure is to be welcomed and
                                                                                                                                                                                                                                                                                                every pain.',
                                        ) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 features mt-0 mt-md-7">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="feature">
                                        <div class="fa-stack fa-lg  fea-icon bg-secondary mb-3">
                                            <i class="fa fa-bookmark  text-white"></i>
                                        </div>
                                        <h3 class="font-weight-semibold">{!! page_content('why-choose-us-3', 'heading', 'Realtime Project Work') !!}</h3>
                                        <p>{!! page_content(
                                            'why-choose-us-3',
                                            'content',
                                            'our being able to do what we like best, every pleasure is to be welcomed and
                                                                                                                                                                                                                                                        every pain.',
                                        ) !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-lg-0">
                                <div class="card-body text-center">
                                    <div class="feature">
                                        <div class="fa-stack fa-lg  fea-icon bg-warning mb-3">
                                            <i class="fa fa-line-chart   text-white"></i>
                                        </div>

                                        <h3 class="font-weight-semibold">{!! page_content('why-choose-us-4', 'heading', '100% Job Assistance') !!}</h3>
                                        <p>{!! page_content(
                                            'why-choose-us-4',
                                            'content',
                                            'our being able to do what we like best, every pleasure is to be welcomed and
                                                                                                                                                                                                                                                        every pain.',
                                        ) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature-1 text-center ms-5">
                        <img src="{!! page_content('why-choose-us', 'image') !!}" class="feature" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->


    <!--Section-->
    <section>
        <div class="about-1 cover-image sptb bg-background-color"
            data-bs-image-src="../assets/images/banners/banner5.jpg">
            <div class="content-text mb-0 text-white info">
                <div class="container">
                    <div class="row text-center">
                        @foreach ($statistics as $statistic)
                            <div class="col-lg-3 col-md-6">
                                <div class="counter-status md-mb-0">
                                    <div class="counter-icon align-items-center">
                                        <img src="{{ asset('storage/' . $statistic->icon) }}"
                                            style=" filter: brightness(0) invert(1);" height="35px" width="35px"
                                            alt="{{ $statistic->translation->name }}">
                                        {{-- <i class="typcn typcn-group-outline"></i> --}}
                                    </div>
                                    <h5>{{ $statistic->translation->name }}</h5>
                                    <h2 class="counter mb-0">{{ $statistic->number }}</h2>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->
@endsection
