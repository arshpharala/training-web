@extends('theme.xacademia.layouts.app')

@section('banner')
    @php
        $sections = $page->sections ?? null;
    @endphp
    <style>
        .bg-background-1:before,
        .banner1:before {
            background: none !important;
        }
    </style>
    <!--Section-->
    <section class="sptb-2 sptb-tab">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 col-md-12">
                        <div class="text-white mb-7">
                            <a href="" class="typewrite" data-period="2000"
                                data-type='[ "{{ page_content('Hero', 'heading', 'Find The Best Trainers and Build Your Future') }}" ]'>
                                <span class="wrap"></span>
                            </a>
                            <p class="fs-18">{!! page_content(
                                'Hero',
                                'content',
                                'many variations of passages of Lorem Ipsum available, but the majority have
                                                                                                                                                suffered alteration <br> in some form, by injected humour, or randomised words',
                            ) !!}</p>
                        </div>
                        <div class="search-background bg-transparent typewrite-text">
                            <div class="row">
                                <div class="col-xl-10 col-lg-12 col-md-12">
                                    <div class="form row g-0 ">
                                        <div class="form-group  col-xl-6 col-lg-6 col-md-12 mb-0 bg-white br-lg-7">
                                            <input type="text" class="form-control input-xl br-0"
                                                placeholder="Search Courses...." data-min-length="1" list="courses"
                                                name="courses">
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                            <a href="javascript:void(0)"
                                                class="btn btn-xl btn-block btn-secondary br-ts-md-0 br-bs-md-0"><i
                                                    class="fe fe-search"></i> Search</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /header-text -->
    </section><!--/Section-->
@endsection
@section('content')
    <!--Section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title d-md-flex">
                <div>
                    <h2>{{ page_content('Categories', 'heading', 'Categories') }} </h2>
                    <p class="fs-18 lead">{!! page_content('Categories', 'content') !!}</p>
                </div>
                <div class="ms-auto">
                    <a class="btn btn-light mt-3" href="{{ route('categories.index') }}"><i class="fe fe-arrow-right"></i>
                        View More</a>
                </div>
            </div>
            <div class="item-all-cat education-categories">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="item-all-card text-dark item-hover-card p-6">
                                <a href="{{ route('categories.show', ['category' => $category->slug]) }}"
                                    class="absolute-link"></a>
                                <div class="iteam-all-icon">
                                    <i class="fe fe-book-open"></i>
                                </div>
                                <div class="item-all-text mt-3">
                                    <h5 class="mb-0">{{ $category->translation->name ?? '' }}</h5>
                                    <p class="mt-3">{{ Str::limit($category->translation->short_description ?? '', 80) }}
                                    </p>

                                    <a class="btn-link"
                                        href="{{ route('categories.show', ['category' => $category->slug]) }}"><i
                                            class="fe fe-chevron-right"></i> View
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->

    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="video-img">
                        <img src="{!! page_content('Online Video', 'image') !!}" alt="img" class="cover-image br-7">
                        <a class="mt-6 d-block video-btn mx-auto" href="javascript:void(0)" data-bs-toggle="modal"
                            data-bs-target="#homeVideo"><i class="fa fa-play text-white"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video-section mt-8 ms-lg-5 pt-5">
                        <div class="">
                            <h6 class="text-uppercase mb-2 text-primary"><i class="fe fe-book"></i> Online classes & Study
                            </h6>
                            <h2 class="mt-0 font-weight-bold">{!! page_content('Online Video', 'heading') !!}</h2>
                        </div>
                        <p class="lead leading-normal mt-4">{!! page_content('Online Video', 'content') !!}</p>
                        <a class="btn btn-primary text-white mt-3" href="javascript:void(0)"> <i
                                class="fe fe-chevron-right"></i> View More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section-->

    <!--Section-->
    @if (!empty($latestCourses) && $latestCourses->isNotEmpty())
        <section class="sptb bg-white">
            <div class="container">
                <div class="section-title d-md-flex">
                    <div>
                        <h2>{!! page_content('Latest Courses', 'heading') !!}</h2>
                        <p class="fs-18 lead">{!! page_content('Latest Courses', 'content') !!}</p>
                    </div>
                    {{-- <div class="ms-auto d-inline-flex">
                    <div class="w-150 mt-3 me-4">
                        <select class="form-control select2-show-search  border-bottom-0"
                            data-placeholder="Select Category">
                            <optgroup label="Categories">
                                <option>Select</option>
                                <option value="1">IT</option>
                                <option value="2">Language</option>
                                <option value="3">Science</option>
                                <option value="4">Health</option>
                                <option value="5">Humanities</option>
                                <option value="6">Business</option>
                                <option value="7">Maths</option>
                                <option value="8">Marketing</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="">
                        <a class="btn btn-primary mt-3" href="javascript:void(0)"><i class="fe fe-arrow-right"></i> View
                            All</a>
                    </div>
                </div> --}}
                </div>
                <div id="myCarousel1" class="owl-carousel owl-carousel-icons2">
                    @foreach ($latestCourses as $course)
                        <div class="item">
                            <div class="card mb-0 overflow-hidden">
                                <div class="card-body">
                                    {{-- <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><img
                                        src="{{ asset('theme/xacademia/assets/images/png/power.png') }}"
                                        class=""></span>
                            </div> --}}
                                    @if (!empty($course->image))
                                        <img src="{{ asset('storage/' . $course->image) }}" alt="img"
                                            class="w-9 h-9 br-7 mb-4">
                                    @else
                                        <img src="{{ asset('theme/xacademia/assets/images/media/color/sm/6.jpg') }}"
                                            alt="img" class="w-9 h-9 br-7 mb-4">
                                    @endif
                                    <div class="">
                                        <div class="item-card2">
                                            <div class="item-card2-desc">
                                                {{-- <div class="d-inline-flex">
                                            <div class="star-ratings start-ratings-main clearfix me-3">
                                                <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                    <select class="example-fontawesome" name="rating"
                                                        autocomplete="off">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected>4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <span class="">487 reviews</span>
                                        </div> --}}
                                                <div class="item-card2-text mb-1">
                                                    <a href="page-details.html" class="text-dark">
                                                        <h4 class="mb-2">{{ $course->translation->name }}</h4>
                                                    </a>
                                                </div>
                                                {{-- <a href="javascript:void(0)" class="">Online Classes</a>, <a
                                                    href="javascript:void(0)" class="">Training</a>, <a
                                                    href="javascript:void(0)" class="">Coding class</a>, <a
                                                    href="javascript:void(0)" class="">Examinations</a>
                                                <h4 class="mt-3 fs-25">$35 <del class="fs-16 text-muted">$65</del></h4> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="item">
                    <div class="card mb-0 overflow-hidden">
                        <div class="card-body">
                            <img src="{{ asset('theme/xacademia/assets/images/media/color/sm/7.jpg') }}" alt="img"
                                class="w-9 h-9 br-7 mb-4">
                            <div class="">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="d-inline-flex">
                                            <div class="star-ratings start-ratings-main clearfix me-3">
                                                <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                    <select class="example-fontawesome" name="rating"
                                                        autocomplete="off">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected>4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <span class="">754 reviews</span>
                                        </div>
                                        <div class="item-card2-text mb-1">
                                            <a href="page-details.html" class="text-dark">
                                                <h4 class="mb-2">Law classes</h4>
                                            </a>
                                        </div>
                                        <a href="javascript:void(0)" class="">Law classes</a>, <a
                                            href="javascript:void(0)" class="">Training</a>, <a
                                            href="javascript:void(0)" class="">Coding class</a>, <a
                                            href="javascript:void(0)" class="">Examinations</a>
                                        <h4 class="mt-3 fs-25">$35 <del class="fs-16 text-muted">$65</del></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0 overflow-hidden">
                        <div class="card-body">
                            <img src="{{ asset('theme/xacademia/assets/images/media/color/sm/8.jpg') }}" alt="img"
                                class="w-9 h-9 br-7 mb-4">
                            <div class="">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="d-inline-flex">
                                            <div class="star-ratings start-ratings-main clearfix me-3">
                                                <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                    <select class="example-fontawesome" name="rating"
                                                        autocomplete="off">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected>4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <span class="">965 reviews</span>
                                        </div>
                                        <div class="item-card2-text mb-1">
                                            <a href="page-details.html" class="text-dark">
                                                <h4 class="mb-2">Photoshop</h4>
                                            </a>
                                        </div>
                                        <a href="javascript:void(0)" class="">Photoshop</a>, <a
                                            href="javascript:void(0)" class="">Training</a>, <a
                                            href="javascript:void(0)" class="">Coding class</a>, <a
                                            href="javascript:void(0)" class="">Examinations</a>
                                        <h4 class="mt-3 fs-25">$35 <del class="fs-16 text-muted">$65</del></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0 overflow-hidden">
                        <div class="card-body">
                            <img src="{{ asset('theme/xacademia/assets/images/media/color/sm/1.jpg') }}" alt="img"
                                class="w-9 h-9 br-7 mb-4">
                            <div class="">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="d-inline-flex">
                                            <div class="star-ratings start-ratings-main clearfix me-3">
                                                <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                    <select class="example-fontawesome" name="rating"
                                                        autocomplete="off">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected>4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <span class="">758 reviews</span>
                                        </div>
                                        <div class="item-card2-text mb-1">
                                            <a href="page-details.html" class="text-dark">
                                                <h4 class="mb-2">HTML</h4>
                                            </a>
                                        </div>
                                        <a href="javascript:void(0)" class="">HTML</a>, <a
                                            href="javascript:void(0)" class="">Training</a>, <a
                                            href="javascript:void(0)" class="">Coding class</a>, <a
                                            href="javascript:void(0)" class="">Examinations</a>
                                        <h4 class="mt-3 fs-25">$35 <del class="fs-16 text-muted">$65</del></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0 overflow-hidden">
                        <div class="card-body">
                            <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><img
                                        src="{{ asset('theme/xacademia/assets/images/png/power.png') }}"
                                        class=""></span>
                            </div>
                            <img src="{{ asset('theme/xacademia/assets/images/media/color/sm/2.jpg') }}" alt="img"
                                class="w-9 h-9 br-7 mb-4">
                            <div class="">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="d-inline-flex">
                                            <div class="star-ratings start-ratings-main clearfix me-3">
                                                <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                    <select class="example-fontawesome" name="rating"
                                                        autocomplete="off">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected>4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <span class="">487 reviews</span>
                                        </div>
                                        <div class="item-card2-text mb-1">
                                            <a href="page-details.html" class="text-dark">
                                                <h4 class="mb-2">Online Classes</h4>
                                            </a>
                                        </div>
                                        <a href="javascript:void(0)" class="">Online Classes</a>, <a
                                            href="javascript:void(0)" class="">Training</a>, <a
                                            href="javascript:void(0)" class="">Coding class</a>, <a
                                            href="javascript:void(0)" class="">Examinations</a>
                                        <h4 class="mt-3 fs-25">$35 <del class="fs-16 text-muted">$65</del></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card mb-0 overflow-hidden">
                        <div class="card-body">
                            <img src="{{ asset('theme/xacademia/assets/images/media/color/sm/3.jpg') }}" alt="img"
                                class="w-9 h-9 br-7 mb-4">

                            <div class="">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="d-inline-flex">
                                            <div class="star-ratings start-ratings-main clearfix me-3">
                                                <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                    <select class="example-fontawesome" name="rating"
                                                        autocomplete="off">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected>4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <span class="">487 reviews</span>
                                        </div>
                                        <div class="item-card2-text mb-1">
                                            <a href="page-details.html" class="text-dark">
                                                <h4 class="mb-2">Beauty Classes</h4>
                                            </a>
                                        </div>
                                        <a href="javascript:void(0)" class="">Online Classes</a>, <a
                                            href="javascript:void(0)" class="">Training</a>, <a
                                            href="javascript:void(0)" class="">Coding class</a>, <a
                                            href="javascript:void(0)" class="">Examinations</a>
                                        <h4 class="mt-3 fs-25">$35 <del class="fs-16 text-muted">$65</del></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                </div>
            </div>
        </section>
    @endif
    <!--/Section-->

    <!--Section-->
    <section>
        <div class="about-1 cover-image sptb bg-background-color"
            data-bs-image-src="{{ asset('theme/xacademia/assets/images/banners/banner5.jpg') }}">
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


    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="section-title">
                <h2>Coming Up Classes</h2>
                <p class="fs-18 lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div class="panel panel-primary">
                <div class="">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs eductaional-tabs mb-6">
                            <li class=""><a href="#tab1" class="active show" data-bs-toggle="tab">All</a></li>
                            <li><a href="#tab2" data-bs-toggle="tab" class="">Short Term Courses</a></li>
                            <li><a href="#tab3" data-bs-toggle="tab" class="">Long Term Courses</a></li>
                            <li><a href="#tab4" data-bs-toggle="tab" class="">Online Courses</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body p-0">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab1">
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="card overflow-hidden">
                                        <div class="ribbon ribbon-top-left text-danger"><span
                                                class="bg-danger">Free</span></div>
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-1.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1">Digital Marketing</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration :</span>
                                                        <span class="text-muted">6 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span><span class="text-muted"> 2 Hours </span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card overflow-hidden">
                                        <div class="power-ribbon power-ribbon-top-left text-warning"><span
                                                class="bg-warning"><img
                                                    src="{{ asset('theme/xacademia/assets/images/png/power.png') }}"
                                                    class=""></span></div>
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-2.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="mb-0">$752.99</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1"> Coding Training Classes</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration
                                                            :</span><span class="text-muted">9 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span><span class="text-muted"> 1 Hour</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card overflow-hidden">
                                        <div class="power-ribbon power-ribbon-top-left text-warning"><span
                                                class="bg-warning"><img
                                                    src="{{ asset('theme/xacademia/assets/images/png/power.png') }}"
                                                    class=""></span></div>
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-3.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="font-weight-semibold mb-0">$635.45</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1">Guitar Classes</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration :</span>
                                                        <span class="text-muted">3 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span> <span class="text-muted">3 Hour</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card overflow-hidden mb-xl-0">
                                        <div class="power-ribbon power-ribbon-top-left text-warning"><span
                                                class="bg-warning"><img
                                                    src="{{ asset('theme/xacademia/assets/images/png/power.png') }}"
                                                    class=""></span></div>
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-4.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="font-weight-semibold mb-0">$835.99</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1">Free Literature Classes</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration
                                                            :</span><span class="text-muted"> 2 Months </span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span><span class="text-muted"> 2 Hours</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-md-0">
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-5.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="font-weight-semibold mb-0">$893.99</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1">PhotoShop Designing</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration
                                                            :</span><span class="text-muted"> 3 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span><span class="text-muted"> 8 Hours</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-0">
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-6.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="font-weight-semibold mb-0">$836.50</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1">Networking classes</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration :</span>
                                                        <span class="text-muted"> 6 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span> <span class="text-muted">3 Hours</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="card overflow-hidden mb-xl-0">
                                        <div class="power-ribbon power-ribbon-top-left text-warning"><span
                                                class="bg-warning"><img
                                                    src="{{ asset('theme/xacademia/assets/images/png/power.png') }}"
                                                    class=""></span></div>
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-7.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="font-weight-semibold mb-0">$635.99</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1">Free Literature Classes</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration :</span>
                                                        <span class="text-muted">3 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span><span class="text-muted"> 3 Hour</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card overflow-hidden mb-md-0">
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-8.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="font-weight-semibold mb-0">$831.55</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1">PhotoShop Designing</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration
                                                            :</span><span class="text-muted"> 2 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span><span class="text-muted"> 2 Hours</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-0">
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-9.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="font-weight-semibold mb-0">$897.99</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1">Networking classes</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration :</span>
                                                        <span class="text-muted">3 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span> <span class="text-muted">8 Hours</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="card overflow-hidden mb-xl-0">
                                        <div class="ribbon ribbon-top-left text-danger"><span
                                                class="bg-danger">Free</span></div>
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-10.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1"> Digital Marketing</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration :</span>
                                                        <span class="text-muted">6 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span> <span class="text-muted">2 Hours</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card overflow-hidden mb-md-0">
                                        <div class="power-ribbon power-ribbon-top-left text-warning"><span
                                                class="bg-warning"><img
                                                    src="{{ asset('theme/xacademia/assets/images/png/power.png') }}"
                                                    class=""></span></div>
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-11.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="font-weight-semibold mb-0">$635</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1"> Coding Training Classes</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration
                                                            :</span><span class="text-muted"> 9 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span><span class="text-muted"> 1 Hour</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-0">
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-2.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="font-weight-semibold mb-0">$836</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1">Guitar Classes</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration
                                                            :</span><span class="text-muted"> 6 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span> <span class="text-muted">3 Hours</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="card overflow-hidden mb-0">
                                        <div class="power-ribbon power-ribbon-top-left text-warning"><span
                                                class="bg-warning"><img
                                                    src="{{ asset('theme/xacademia/assets/images/png/power.png') }}"
                                                    class=""></span></div>
                                        <div class="item-card7-img pt-5 px-5">
                                            <div class="item-card7-imgs">
                                                <a href="javascript:void(0)"></a>
                                                <img src="{{ asset('theme/xacademia/assets/images/media/0-1.jpg') }}"
                                                    alt="img" class="cover-image br-7 border">
                                            </div>
                                            <div class="item-card7-overlaytext">
                                                <h4 class="font-weight-semibold mb-0">$63</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-card7-desc">
                                                <div class="item-card7-text">
                                                    <a href="javascript:void(0)" class="text-dark">
                                                        <h4 class="font-weight-semibold mb-1">App Development Classes</h4>
                                                    </a>
                                                </div>
                                                <div class="d-flex mb-0">
                                                    <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4" selected>4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="">487 reviews</span>
                                                </div>
                                                <div class="pt-2 mb-3">
                                                    <a class="me-4"><span class="font-weight-bold">Duration :</span>
                                                        <span class="text-muted">3 Months</span></a>
                                                    <a class="me-4 float-end"><span class="font-weight-bold">Daily
                                                            :</span> <span class="text-muted">3 Hour</span></a>
                                                </div>
                                                <p class="mb-0">Nemo enim ipsam voluptatem voluptas sit aspernatur
                                                    ratione voluptatem sequi nesciunt..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->

    <!--Section-->
    <section>
        <div class="cover-image sptb bg-background-color text-white"
            data-bs-image-src="{{ asset('theme/xacademia/assets/images/banners/banner3.jpg') }}">
            <div class="content-text mb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="section-title pb-4">
                                <h2>The predicious Features for you</h2>
                                <p class="text-white-80 fs-18 mt-6">Many desktop publishing packages and web page editors
                                    now use Lorem Ipsum as their default model text, and a search for will uncover many web
                                    sites still in their infancy. Various versions have evolved over the years, sometimes by
                                    accident, sometimes on purpose</p>
                            </div>
                            <ul class="list-style fs-18 text-white student-feature-icons">
                                <li class="py-2"><i class="fe fe-check me-3"></i> Online Classes</li>
                                <li class="py-2"><i class="fe fe-check me-3"></i> Offline Classes</li>
                                <li class="py-2"><i class="fe fe-check me-3"></i> Books Online/Offline</li>
                                <li class="py-2"><i class="fe fe-check me-3"></i> Short Term Courses</li>
                                <li class="py-2"><i class="fe fe-check me-3"></i> Long Term Courses</li>
                                <li class="py-2"><i class="fe fe-check me-3"></i> Music Classes</li>
                                <li class="py-2"><i class="fe fe-check me-3"></i> Cooking Classes</li>
                                <li class="py-2"><i class="fe fe-check me-3"></i> Networking Courses</li>
                            </ul>
                            <div class="mt-6">
                                <a class="btn btn-secondary btn-lg" href="javascript:void(0)"> Start Learning</a>
                                <a class="btn btn-light btn-lg" href="javascript:void(0)"> View More</a>
                            </div>
                        </div>
                        <div class="col-lg-4 met-sm-2">
                            <div class="student-img ">
                                <img src="{{ asset('theme/xacademia/assets/images/png/19.png') }}" class=""
                                    alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->

    <!--Section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title">
                <h2>Our Sponsors</h2>
                <p class="fs-18 lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div id="small-categories" class="owl-carousel client-carousel">
                <div class="item">
                    <div class="client-img">
                        <img src="{{ asset('theme/xacademia/assets/images/clients/1.png') }}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="client-img">
                        <img src="{{ asset('theme/xacademia/assets/images/clients/2.png') }}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="client-img">
                        <img src="{{ asset('theme/xacademia/assets/images/clients/3.png') }}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="client-img">
                        <img src="{{ asset('theme/xacademia/assets/images/clients/4.png') }}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="client-img">
                        <img src="{{ asset('theme/xacademia/assets/images/clients/5.png') }}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="client-img">
                        <img src="{{ asset('theme/xacademia/assets/images/clients/7.png') }}" alt="img">
                    </div>
                </div>
                <div class="item">
                    <div class="client-img">
                        <img src="{{ asset('theme/xacademia/assets/images/clients/8.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->

    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="section-title">
                <h2>Online Classes</h2>
                <p class="fs-18 lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <div class="card overflow-hidden gallery-item">
                                <div class="card-body">
                                    <a href="course-details.html">
                                        <div class="gallery-card">
                                            <div class="gallery-card-desc">
                                                <div class="gallery-card">
                                                    <img src="{{ asset('theme/xacademia/assets/images/media/14.jpg') }}"
                                                        alt="img" class="">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="text-center mt-5">
                                        <h3 class="font-weight-semibold"><a href="course-details.html"
                                                class="text-default-dark">Software Development</a></h3>
                                        <span class="font-weight-bold"><strong
                                                class="fs-18 font-weight-bold">1856</strong> Over Courses</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <div class="card overflow-hidden gallery-item">
                                <div class="card-body">
                                    <a href="course-details.html">
                                        <div class="gallery-card">
                                            <div class="gallery-card-desc">
                                                <div class="gallery-card">
                                                    <img src="{{ asset('theme/xacademia/assets/images/media/17.jpg') }}"
                                                        alt="img" class="">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="text-center mt-5">
                                        <h3 class="font-weight-semibold"><a href="course-details.html"
                                                class="text-default-dark">Web Designing</a></h3>
                                        <span class="font-weight-bold"><strong
                                                class="fs-18 font-weight-bold">1256</strong> Over Courses</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <div class="card overflow-hidden gallery-item">
                                <div class="card-body">
                                    <a href="course-details.html">
                                        <div class="gallery-card">
                                            <div class="gallery-card-desc">
                                                <div class="gallery-card">
                                                    <img src="{{ asset('theme/xacademia/assets/images/media/21.jpg') }}"
                                                        alt="img" class="">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="text-center mt-5">
                                        <h3 class="font-weight-semibold"><a href="course-details.html"
                                                class="text-default-dark">Web Development</a></h3>
                                        <span class="font-weight-bold"><strong class="fs-18 font-weight-bold">656</strong>
                                            Over Courses</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <div class="card overflow-hidden gallery-item">
                                <div class="card-body">
                                    <a href="course-details.html">
                                        <div class="gallery-card">
                                            <div class="gallery-card-desc">
                                                <div class="gallery-card">
                                                    <img src="{{ asset('theme/xacademia/assets/images/media/23.jpg') }}"
                                                        alt="img" class="">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="text-center mt-5">
                                        <h3 class="font-weight-semibold"><a href="course-details.html"
                                                class="text-default-dark">Animation Classes</a></h3>
                                        <span class="font-weight-bold"><strong class="fs-18 font-weight-bold">875</strong>
                                            Over Courses</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <div class="card overflow-hidden gallery-item">
                                <div class="card-body">
                                    <a href="course-details.html">
                                        <div class="gallery-card">
                                            <div class="gallery-card-desc">
                                                <div class="gallery-card">
                                                    <img src="{{ asset('theme/xacademia/assets/images/media/25.jpg') }}"
                                                        alt="img" class="">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="text-center mt-5">
                                        <h3 class="font-weight-semibold"><a href="course-details.html"
                                                class="text-default-dark">Business Classes</a></h3>
                                        <span class="font-weight-bold"><strong class="fs-18 font-weight-bold">856</strong>
                                            Over Courses</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <div class="card overflow-hidden gallery-item">
                                <div class="card-body">
                                    <a href="course-details.html">
                                        <div class="gallery-card">
                                            <div class="gallery-card-desc">
                                                <div class="gallery-card">
                                                    <img src="{{ asset('theme/xacademia/assets/images/media/19.jpg') }}"
                                                        alt="img" class="">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="text-center mt-5">
                                        <h3 class="font-weight-semibold"><a href="course-details.html"
                                                class="text-default-dark">Beauty Classes</a></h3>
                                        <span class="font-weight-bold"><strong class="fs-18 font-weight-bold">656</strong>
                                            Over Courses</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->

    <!--Section-->
    <section class="sptb position-relative cover-image bg-background"
        data-bs-image-src="{{ asset('theme/xacademia/assets/images/banners/pattern3.png') }}">
        <div class="container">
            <div class="section-title">
                <h2 class="position-relative">Student Reviews</h2>
                <p class="fs-18 position-relative">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="owl-carousel testimonial-owl-carousel">
                        <div class="item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="testimonial-img"><img
                                                    src="{{ asset('theme/xacademia/assets/images/users/female/4.jpg') }}"
                                                    class="br-7 w-100 h-100" alt="img"></div>
                                        </div>
                                        <div class="col-md-9 col-sm-12 mt-2">
                                            <div class="d-md-flex">
                                                <div>
                                                    <h4 class="title font-weight-bold">Lilly Potter</h4>
                                                    <span class="post">Web developer student</span>
                                                </div>
                                                <div class="star-ratings start-ratings-main clearfix mb-3 ms-auto">
                                                    <div
                                                        class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                        <select class="example-fontawesome" name="rating"
                                                            autocomplete="off">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4" selected>4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="fs-16 leading-normal mt-4 mb-0"><i class="fa fa-quote-left"></i>
                                                But I must explain to you how all this mistaken idea of denouncing pleasure
                                                and praising</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="testimonial-img"><img
                                                    src="{{ asset('theme/xacademia/assets/images/users/male/33.jpg') }}"
                                                    class="br-7 w-100 h-100" alt="img"></div>
                                        </div>
                                        <div class="col-md-9 col-sm-12 mt-2">
                                            <div class="d-md-flex">
                                                <div>
                                                    <h4 class="title font-weight-bold">John Joya</h4>
                                                    <span class="post">Web developer student</span>
                                                </div>
                                                <div class="star-ratings start-ratings-main clearfix mb-3 ms-auto">
                                                    <div
                                                        class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                        <select class="example-fontawesome" name="rating"
                                                            autocomplete="off">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4" selected>4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="fs-16 leading-normal mt-4 mb-0"><i class="fa fa-quote-left"></i>
                                                But I must explain to you how all this mistaken idea of denouncing pleasure
                                                and praising</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="testimonial-img"><img
                                                    src="{{ asset('theme/xacademia/assets/images/users/female/1.jpg') }}"
                                                    class="br-7 w-100 h-100" alt="img"></div>
                                        </div>
                                        <div class="col-md-9 col-sm-12 mt-2">
                                            <div class="d-md-flex">
                                                <div>
                                                    <h4 class="title font-weight-bold">Rebacca wisely</h4>
                                                    <span class="post">Web designer student</span>
                                                </div>
                                                <div class="star-ratings start-ratings-main clearfix mb-3 ms-auto">
                                                    <div
                                                        class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                        <select class="example-fontawesome" name="rating"
                                                            autocomplete="off">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4" selected>4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="fs-16 leading-normal mt-4 mb-0"><i class="fa fa-quote-left"></i>
                                                But I must explain to you how all this mistaken idea of denouncing pleasure
                                                and praising</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="testimonial-img"><img
                                                    src="{{ asset('theme/xacademia/assets/images/users/male/34.jpg') }}"
                                                    class="br-7 w-100 h-100" alt="img"></div>
                                        </div>
                                        <div class="col-md-9 col-sm-12 mt-2">
                                            <div class="d-md-flex">
                                                <div>
                                                    <h4 class="title font-weight-bold">williamson</h4>
                                                    <span class="post">Web developer student</span>
                                                </div>
                                                <div class="star-ratings start-ratings-main clearfix mb-3 ms-auto">
                                                    <div
                                                        class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                        <select class="example-fontawesome" name="rating"
                                                            autocomplete="off">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4" selected>4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="fs-16 leading-normal mt-4 mb-0"><i class="fa fa-quote-left"></i>
                                                But I must explain to you how all this mistaken idea of denouncing pleasure
                                                and praising</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->

    <!--Section-->
    {{-- <section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <img src="{{ asset('theme/xacademia/assets/images/png/18.png') }}" alt="img" class="absolute-student">
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="section-title">
                    <h2>Download app for online classes</h2>
                    <p class="fs-18 lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                </div>
                <div class="text-wrap">
                    <div class="btn-list">
                        <a href="javascript:void(0)" class="btn btn-primary btn-lg mb-5 mb-lg-0"><i
                                class="fa fa-apple fa-1x me-2"></i> App Store</a>
                        <a href="javascript:void(0)" class="btn btn-secondary btn-lg mb-5 mb-lg-0"><i
                                class="fa fa-android fa-1x me-2"></i> Google Play</a>
                        <a href="javascript:void(0)" class="btn btn-info btn-lg mb-5 mb-lg-0"><i
                                class="fa fa-windows fa-1x me-2"></i> Windows</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    <!--/Section-->

    <!--Section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title">
                <h2>Blog News</h2>
                <p class="fs-18 lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div id="defaultCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons">
                @foreach ($blogs as $key => $blog)
                    <div class="item">
                        <div class="card mb-0">
                            <div class="card-body p-4">
                                <div class="item7-card-img">
                                    <a href="javascript:void(0)"></a>
                                    <img src="{{ asset('storage/' . $blog->banner) }}"
                                        alt="{{ $blog->translation->title }}" class="cover-image br-7 mb-4 border">
                                </div>
                                <div class="item7-card-desc d-flex mb-2">
                                    <a href="javascript:void(0)"><i
                                            class="fe fe-calendar me-2"></i>{{ $blog->created_at->format('d M, Y') }}</a>
                                    {{-- <div class="ms-auto">
                                    <a href="javascript:void(0)"><i class="fe fe-message-circle me-2"></i>4 Comments</a>
                                </div> --}}
                                </div>
                                <a href="blog-details.html">
                                    <h4 class="font-weight-semibold mb-2 mt-3">{{ $blog->translation->title }}</h4>
                                </a>
                                <p class="mb-4">{!! $blog->short_description !!}</p>
                                <a class="btn btn-primary" href="{{ route('blog.show', ['blog' => $blog->slug]) }}">Read
                                    More <i class="fe fe-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/Section-->

    @include('theme.xacademia.components.video-modal')
@endsection
