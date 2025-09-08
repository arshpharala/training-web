@extends('theme.xacademia.layouts.app')
@push('head')
    <style>
        .bg-background-1:before,
        .banner1:before {
            background: none !important;
        }

        #myCarousel1 .card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
    </style>
@endpush

@section('banner')
    @php
        $sections = $page->sections ?? null;
    @endphp

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



    <!--Section Latest Course -->
    @if (!empty($latestCourses) && $latestCourses->isNotEmpty())
        <section class="sptb">
            <div class="container">
                <div class="section-title d-md-flex">
                    <div>
                        <h2>{!! page_content('Latest Courses', 'heading', 'Latest Courses') !!}</h2>
                        <p class="fs-18 lead">{!! page_content('Latest Courses', 'content', 'Fresh, in‑demand programmes launching every week.') !!}</p>
                    </div>

                </div>
                <div id="myCarousel1" class="owl-carousel owl-carousel-icons2 d-flex">
                    @foreach ($latestCourses as $course)
                        <div class="item flex-fill d-flex">
                            <div class="card mb-0 d-flex flex-column w-100 h-100">
                                <div class="item-card7-img">
                                    <div class="item-card7-imgs">
                                        <a
                                            href="{{ route('courses.show', ['topic' => $course->topic_slug, 'course' => $course->course_slug]) }}"></a>
                                        @if (!empty($course->logo))
                                            <img src="{{ asset('storage/' . $course->logo) }}"
                                                alt="{{ $course->course_name }}" class="cover-image">
                                        @else
                                            <img src="{{ asset('theme/xacademia/assets/images/media/color/sm/6.jpg') }}"
                                                alt="default" class="cover-image">
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body flex-grow-1">
                                    <div class="item-card7-desc">
                                        <div class="item-card7-text mb-3">
                                            <a href="{{ route('courses.show', ['topic' => $course->topic_slug, 'course' => $course->course_slug]) }}"
                                                class="text-dark">
                                                <h4 class="mb-2">{{ $course->course_name }}</h4>
                                            </a>
                                        </div>
                                        <p class="mb-1">{{ Str::limit($course->short_description, 80) }}</p>
                                    </div>
                                </div>
                                <div class="card-footer mt-auto">
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <a href="javascript:void(0)" class="icons">
                                            <i class="fe fe-clock me-1"></i>
                                            {{ $course->duration ?? 'N/A' }}
                                            {{ Str::plural('Day', $course->duration) }}
                                        </a>
                                        <div>
                                            <a class="btn-link"
                                                href="{{ route('courses.show', ['topic' => $course->topic_slug, 'course' => $course->course_slug]) }}">
                                                <i class="fe fe-chevron-right"></i> View More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--/Section-->


    <!--Section Categories-->
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
                                <div class="iteam-all-icon d-flex justify-content-center">
                                    <i class="fe fe-book-open"></i>
                                </div>
                                <div class="item-all-text mt-3 d-flex flex-column justify-content-center">
                                    <h5 class="mb-0 text-center">{{ $category->translation->name ?? '' }}</h5>
                                    <p class="mt-3 text-center">
                                        {{ Str::limit($category->translation->short_description ?? 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 80) }}
                                    </p>

                                    <a class="btn-link text-center"
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

    <!--Section Why Choose Us-->
    <section class="sptb">
        <div class="container">
            <div class="section-title d-md-flex">
                <div>
                    <h2>{!! page_content('why-choose', 'heading', 'Why Choose Us') !!}</h2>
                    <h2></h2>
                    <p class="fs-18 lead">{!! page_content('why-choose', 'content', 'Trusted by professionals and teams worldwide.') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                    <div class="card bg-white br-7 p-5 mb-lg-0 flex-fill">
                        <div class="servic-data mt-3">
                            <h4 class="font-weight-semibold mb-2">{!! page_content('why-choose-1', 'heading', 'Accredited Programmes') !!}</h4>
                            <p class="mb-0">{!! page_content('why-choose-1', 'content', 'Certs recognised by industry and employers worldwide.') !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                    <div class="card bg-white br-7 p-5 mb-lg-0 flex-fill">
                        <div class="servic-data mt-3">
                            <h4 class="font-weight-semibold mb-2">{!! page_content('why-choose-2', 'heading', 'Hands‑on Projects') !!}</h4>
                            <p class="mb-0">{!! page_content('why-choose-2', 'content', 'Real labs and capstones map directly to job skills.') !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                    <div class="card bg-white br-7 p-5 mb-lg-0 flex-fill">
                        <div class="servic-data mt-3">
                            <h4 class="font-weight-semibold mb-2">{!! page_content('why-choose-3', 'heading', 'Global Trainer Network') !!}</h4>
                            <p class="mb-0">{!! page_content('why-choose-3', 'content', 'Learn from practitioners across the UK, EU & MEA.') !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                    <div class="card bg-white br-7 p-5 mb-lg-0 flex-fill">
                        <div class="servic-data mt-3">
                            <h4 class="font-weight-semibold mb-2">{!! page_content('why-choose-4', 'heading', 'ISO‑Led Quality') !!}</h4>
                            <p class="mb-0">{!! page_content('why-choose-4', 'content', 'Processes aligned to ISO 9001 & 27001 for excellence.') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->

    <!--Section Stats-->
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

    <!--section Delivery Methods -->
    <section class="sptb" id="sec1">
        <div class="container">
            <div class="section-title d-md-flex mb-5">
                <div>
                    <h2>{!! page_content('delivery-method', 'heading', 'Delivery that fits your world') !!}</h2>
                    <p class="fs-18 lead">{!! page_content(
                        'delivery-method',
                        'content',
                        'Tailored delivery experiences designed to match your unique schedule, location, and expectations.',
                    ) !!}</p>
                </div>
            </div>
            <div class="row">
                @foreach ($deliveryMethods as $deliveryMethod)
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                        <div class="mb-lg-0 mb-4 box-shadow about-2 p-5 flex-fill">
                            <div class=" text-center">
                                <div class="icon-bg icon-service about">
                                    <img src="{!! asset('storage/' . $deliveryMethod->icon) !!}" alt="{{ $deliveryMethod->name }}">
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">{!! $deliveryMethod->name !!}</h4>
                                    <p class="mb-0">{!! $deliveryMethod->shot_description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!--/Section-->



    <!--Section-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <img src="{!! page_content('ready-upskill', 'image') !!}" alt="img" class="absolute-student">
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="section-title">
                        <h2>{!! page_content('ready-upskill', 'heading', 'Ready to upskill your future') !!}</h2>
                        <p class="fs-18 lead">{!! page_content('ready-upskill', 'content', 'Let us design a learning roadmap that moves your KPIs.') !!}</p>
                    </div>
                    <div class="text-wrap">
                        <div class="btn-list">
                            <a href="javascript:void(0)" class="btn btn-primary btn-lg mb-5 mb-lg-0">Book a discovery
                                call</a>
                            <a href="{{ route('categories.index') }}"
                                class="btn btn-secondary btn-lg mb-5 mb-lg-0">Browse
                                programmes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->


    <!--Section-->
    <section class="sptb position-relative cover-image bg-background" data-bs-image-src="{!! page_content('reviews', 'image') !!}">
        <div class="container">
            <div class="section-title">
                <h2 class="position-relative">{!! page_content('reviews', 'heading', 'Reviews') !!}</h2>
                <p class="fs-18 position-relative">{!! page_content('reviews', 'content', 'Trusted by professionals and teams worldwide.') !!}</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="owl-carousel testimonial-owl-carousel">
                        @foreach ($testimonials as $testimonial)
                            <div class="item">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                                <div class="testimonial-img"><img
                                                        src="{{ asset('storage/' . $testimonial->image) }}"
                                                        class="br-7 w-100 h-100"
                                                        alt="{{ $testimonial->translation->name }}"></div>
                                            </div>
                                            <div class="col-md-9 col-sm-12 mt-2">
                                                <div class="d-md-flex">
                                                    <div>
                                                        <h4 class="title font-weight-bold">
                                                            {{ $testimonial->translation->name }}</h4>
                                                        <span class="post">{{ $testimonial->designation }}</span>
                                                    </div>
                                                    <div class="star-ratings start-ratings-main clearfix mb-3 ms-auto">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off">
                                                                @foreach (range(1, 5) as $range)
                                                                    <option value="{{ $range }}"
                                                                        @selected($range == $testimonial->rating)>{{ $range }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="fs-16 leading-normal mt-4 mb-0"><i class="fa fa-quote-left"></i>
                                                    {{ $testimonial->translation->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->


    <!--Section Blog -->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title">
                <h2>{!! page_content('blog', 'heading', 'Blog News') !!}</h2>
                <p class="fs-18 lead">{!! page_content('reviews', 'content', 'Updates that grow with your career.') !!}</p>
            </div>
            <div id="defaultCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons">
                @foreach ($blogs as $key => $blog)
                    <div class="item">
                        <div class="card mb-0">
                            <div class="card-body p-4">
                                <div class="item7-card-img">
                                    <a href="javascript:void(0)"></a>
                                    <img src="{{ asset('storage/' . $blog->image) }}"
                                        alt="{{ $blog->translation->title }}" class="cover-image br-7 mb-4 border">
                                </div>
                                <div class="item7-card-desc d-flex mb-2">
                                    <a href="javascript:void(0)"><i
                                            class="fe fe-calendar me-2"></i>{{ $blog->published_at->format('d M, Y') }}</a>
                                    {{-- <div class="ms-auto">
                                    <a href="javascript:void(0)"><i class="fe fe-message-circle me-2"></i>4 Comments</a>
                                </div> --}}
                                </div>
                                <a href="blog-details.html">
                                    <h4 class="font-weight-semibold mb-2 mt-3">{{ $blog->translation->title }}</h4>
                                </a>
                                <p class="mb-4">{!! $blog->translation->intro !!}</p>
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


    <!--Faq section-->
    <section class="sptb faqs">
        <div class="container">
            <div class="section-title">
                <h2>{!! page_content('faq', 'heading', 'FAQ\'s') !!}</h2>
                <p class="fs-18 lead">{!! page_content('faq', 'content', 'Everything you need to know, all in our FAQs.') !!}</p>
            </div>
            <div class="panel-group1" id="accordion2">
                @foreach ($page->faqs as $faq)
                <div class="panel panel-default mb-4 border p-0">
                    <div class="panel-heading1">
                        <h4 class="panel-title1">
                            <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-parent="#accordion2"
                                href="#collapse-{{ $faq->id }}" aria-expanded="false">{!! $faq->question !!}</a>
                        </h4>
                    </div>
                    <div id="collapse-{{ $faq->id }}" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
                        <div class="panel-body bg-white">
                            {!! $faq->answer !!}
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>
        </div>
    </section><!--/Faq section-->


    @include('theme.xacademia.components.video-modal')
@endsection
