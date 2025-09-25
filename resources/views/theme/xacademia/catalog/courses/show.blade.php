@extends('theme.xacademia.layouts.app')

@push('head')
    <style>
        .bg-background-1,
        .banner1 {
            position: relative;
            overflow: hidden;
            background: linear-gradient(to bottom right, #4f46e5, #7c3aed, #d946ef) !important;
        }

        .bg-background-1:before,
        .banner1:before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 1px);
            background-size: 22px 22px;
            opacity: 0.2;
            z-index: 0;
        }

        ul {
            list-style-type: inherit;
            padding: unset;
            margin: 0 0 0 1rem;
        }
    </style>
@endpush

@section('banner')
    @php
        $sections = $page->sections ?? null;
    @endphp

    <!-- HERO Section -->
    <section class="sptb-tab py-10 spark-container">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Content -->
                    <div class="col-lg-7 col-md-12">
                        <div class="text-white mb-5">
                            {{-- <p class="text-uppercase small text-white-50 mb-3 animate__animated animate__fadeInDown">
                                Industry-led learning
                            </p> --}}
                            <ol class="breadcrumb1 animate__animated animate__fadeInDown">
                                <li class="breadcrumb-item1">
                                    <a href="{{ route('home') }}" class="text-white"><i class="fe fe-home me-2"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item1">
                                    <a href="{{ route('categories.show', $course->topic->category->slug) }}"
                                        class="text-white">{{ $course->topic->category->translation->name }}</a>
                                </li>
                                <li class="breadcrumb-item1 active text-white">{{ $course->translation->name }}</li>
                            </ol>
                            <h1 class="hero-title animate__animated animate__fadeInLeft">
                                {{ $course->translation->name }}</span>
                            </h1>
                            <p class="mt-3 lead text-white-75 animate__animated animate__fadeInLeft animate__delay-1s">
                                {!! remove_p_tags($course->translation->short_description) !!}
                            </p>


                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-5 animate__animated animate__fadeInLeft animate__delay-1s">
                            @if ($course->level)
                                <a href="javascript:void(0)"
                                    class="btn btn-light btn-sm rounded-pill">{!! $course->level_name !!}
                                </a>
                            @endif
                            @if ($course->duration)
                                <a href="javascript:void(0)" class="btn btn-light btn-sm rounded-pill">Duration
                                    {{ $course->duration }}
                                    {{ Str::plural('Day', $course->duration) }}</a>
                            @endif
                            <a href="javascript:void(0)"
                                class="btn btn-light btn-sm rounded-pill">{{ $course->topic->translation->name }}</a>
                        </div>
                        <div
                            class="d-flex flex-row align-items-center gap-3 animate__animated animate__fadeInUp animate__delay-2s">
                            <button class="btn btn-custom btn-custom-primary">Enroll Now</button>
                            <button class="btn btn-custom btn-custom-outline">Enquire Now</button>
                        </div>
                    </div>

                    <!-- Right Lottie Animation -->
                    <div class="col-lg-5 d-none d-md-block position-relative text-center">

                        <div style="width:100%; max-width:500px; min-height:350px; margin:auto;">
                            @if ($course->banner)
                                <img src="{{ asset('storage/' . $course->banner) }}"
                                    class="img-fluid rounded7 rounded shadow" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <canvas class="spark position-absolute top-0 start-0 w-100 h-100 pe-none"></canvas>
    </section>
@endsection

@section('content')
    <!-- Trust strip -->
    <section class="pt-7">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="bg-white rounded-3 p-4 shadow-sm">
                        <p class="small text-muted mb-1">Trusted by</p>
                        <p class="fw-bold">5,000+ learners</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-white rounded-3 p-4 shadow-sm">
                        <p class="small text-muted mb-1">Guarantee</p>
                        <p class="fw-bold">Money-back promise</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-white rounded-3 p-4 shadow-sm">
                        <p class="small text-muted mb-1">Included</p>
                        <p class="fw-bold">Live labs & resources</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabs -->

    <section class="sptb">
        <div class="container">

            <ul class="nav nav-tabs border-bottom">
                <li class="nav-item"><button class="nav-link active" data-tab="overview">Overview</button></li>
                <li class="nav-item"><button class="nav-link" data-tab="syllabus">Syllabus</button></li>
                <li class="nav-item"><button class="nav-link" data-tab="outcomes">Outcomes</button></li>
                <li class="nav-item"><button class="nav-link" data-tab="audience">Who Should Attend</button></li>
                <li class="nav-item"><button class="nav-link" data-tab="prereq">Prerequisites</button></li>
                <li class="nav-item"><button class="nav-link" data-tab="delivery">Ways to learn</button></li>
                <li class="nav-item"><button class="nav-link" data-tab="exam">Exam & certification</button></li>
                <li class="nav-item"><button class="nav-link" data-tab="faqs">FAQs</button></li>
            </ul>


            <div class="row mt-2 g-4">
                <!-- Left Content -->
                <div class="col-lg-8">
                    <div id="overview" class="tab-panel">
                        <div class="row">
                            <div class="col-md-6">
                                <div>{!! $course->translation->overview !!}</div>
                            </div>
                            <div class="col-md-6">
                                @if ($course->overview_image)
                                    <img src="{{ asset('storage/' . $course->overview_image) }}"
                                        class="img-fluid rounded shadow" alt="">
                                @endif
                            </div>

                        </div>
                    </div>

                    <div id="syllabus" class="tab-panel d-none">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($course->syllabi as $syllabus)
                                    <div class="d-flex flex-column mb-2 bg-white rounded7 rounded shadow p-4">
                                        <div class="border-bottom pb-2 mb-2 fw-semibold">
                                            {{ $syllabus->title }}

                                        </div>


                                        <div>{!! $syllabus->description !!}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div id="outcomes" class="tab-panel d-none">
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ($course->outcomes as $outcome)
                                    <div class="d-flex mb-2 bg-white rounded7 rounded shadow p-4">{{ $outcome->title }}
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                @if ($course->outcomes_image)
                                    <img src="{{ asset('storage/' . $course->outcomes_image) }}"
                                        class="img-fluid rounded shadow" alt="">
                                @endif
                            </div>

                        </div>
                    </div>

                    <div id="audience" class="tab-panel d-none">
                        <div class="row">
                            <div class="col-md-6">
                                <div>{!! $course->translation->who_should_attend !!}</div>
                            </div>
                            <div class="col-md-6">
                                @if ($course->who_should_attend_image)
                                    <img src="{{ asset('storage/' . $course->who_should_attend_image) }}"
                                        class="img-fluid rounded shadow" alt="">
                                @endif
                            </div>

                        </div>
                    </div>

                    <div id="prereq" class="tab-panel d-none">
                        <div class="row">
                            <div class="col-md-6">
                                <div>{!! $course->translation->prerequisites !!}</div>
                            </div>
                            <div class="col-md-6">
                                @if ($course->prerequisites_image)
                                    <img src="{{ asset('storage/' . $course->prerequisites_image) }}"
                                        class="img-fluid rounded shadow" alt="">
                                @endif
                            </div>

                        </div>
                    </div>

                    <div id="delivery" class="tab-panel d-none">
                        <div class="row">
                            @foreach ($course->deliveryMethods as $deliveryMethod)
                                <div class="col col-sm-6 d-flex">
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

                    <div id="faqs" class="tab-panel row g-3 d-none">
                        <div class="faqs">
                            <div class="panel-group1" id="accordion2">
                                @foreach ($course->faqs as $faq)
                                    <div class="panel panel-default mb-4 border p-0">
                                        <div class="panel-heading1">
                                            <h4 class="panel-title1"> <a class="accordion-toggle collapsed"
                                                    data-bs-toggle="collapse" data-parent="#accordion2"
                                                    href="#faq-{{ $faq->id }}"
                                                    aria-expanded="false">{!! $faq->question !!}</a> </h4>
                                        </div>
                                        <div id="faq-{{ $faq->id }}" class="panel-collapse active collapse"
                                            role="tabpanel" aria-expanded="false" style="">
                                            <div class="panel-body bg-white">
                                                {!! $faq->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>



                </div>

                <!-- Sidebar -->
                {{-- <aside class="col-lg-4">
                    <section id="enquire" class="bg-white rounded-3 p-4 shadow">
                        <h3 class="h5 fw-semibold">Request Pricing & Availability</h3>
                        <p class="small text-muted">We reply within one working day — real humans, clear prices, no
                            pressure.
                        </p>
                        <form class="mt-3 vstack gap-2" id="enquireForm">
                            <input type="text" class="form-control" name="name" placeholder="Your name *"
                                required>
                            <input type="email" class="form-control" name="email" placeholder="Work email *"
                                required>
                            <input type="tel" class="form-control" name="phone" placeholder="Phone">
                            <textarea class="form-control" name="message" rows="3" placeholder="Tell us what you need"></textarea>
                            <button type="submit" class="btn btn-primary fw-semibold">Get your tailored
                                quote</button>
                        </form>
                    </section>
                </aside> --}}

                <aside class="col-lg-4">
                    <section id="enquire" class="bg-white rounded-3 p-4 shadow">
                        <h3 class="h5 fw-semibold">Request Pricing & Availability</h3>
                        <p class="small text-muted">
                            We reply within one working day — real humans, clear prices, no pressure.
                        </p>

                        <form class="mt-3 vstack gap-2 ajax-form" id="enquiryForm" action="{{ route('enquiry') }}"
                            method="POST">
                            @csrf

                            <!-- Visible fields -->
                            <input type="text" class="form-control" name="name" placeholder="Your name *"
                                required>
                            <input type="email" class="form-control" name="email" placeholder="Work email *"
                                required>
                            <input type="tel" class="form-control" name="phone" placeholder="Phone">
                            <textarea class="form-control" name="message" rows="3" placeholder="Tell us what you need"></textarea>

                            <!-- Hidden fields with course context -->
                            <input type="hidden" name="course" value="{{ $course->translation->name }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="duration" value="{{ $course->duration }}">
                            <input type="hidden" name="topic" value="{{ $course->topic->translation->name ?? '' }}">
                            <input type="hidden" name="topic_id" value="{{ $course->topic->id ?? '' }}">
                            <input type="hidden" name="category" value="{{ $course->category->translation->name ?? '' }}">
                            <input type="hidden" name="category_id" value="{{ $course->category->id ?? '' }}">
                            <input type="hidden" name="url" value="{{ url()->current() }}">
                            <input type="hidden" name="delivery_method" value="{{ $course->delivery_method ?? '' }}">
                            <input type="hidden" name="country" value="{{ active_country()->id }}">
                            <input type="hidden" name="consent" value="1">

                            <!-- Honeypot -->
                            <input type="text" name="website" id="website" class="visually-hidden" tabindex="-1"
                                autocomplete="off" aria-hidden="true" />

                            <button type="submit" class="btn btn-primary fw-semibold">
                                Get your tailored quote
                            </button>
                        </form>
                    </section>
                </aside>

            </div>

        </div>
    </section>
@endsection


@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll("[data-tab]");
            const panels = document.querySelectorAll(".tab-panel");

            function setTab(key) {
                tabs.forEach(btn => btn.classList.toggle("active", btn.dataset.tab === key));
                panels.forEach(p => {
                    if (p.id === key) {
                        p.classList.remove("d-none");
                        p.classList.add("active");
                    } else {
                        p.classList.add("d-none");
                        p.classList.remove("active");
                    }
                });
            }

            tabs.forEach(tab => tab.addEventListener("click", () => setTab(tab.dataset.tab)));
            const initial = location.hash.replace("#", "") || "overview";
            if (document.getElementById(initial)) setTab(initial);
        });
    </script>
@endpush
