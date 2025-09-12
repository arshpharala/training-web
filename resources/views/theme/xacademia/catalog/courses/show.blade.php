@extends('theme.xacademia.layouts.app')

@push('head')
    <style>
        /* Smaller placeholder font */
        #heroSearch {
            height: 20px;
            font-size: 1rem;
        }

        #heroSearch::placeholder {
            font-size: 0.8rem;
        }
    </style>
@endpush

@section('bannerImage', asset('storage/' . ($course->banner ?? $page->banner ?? null)))

@section('banner')
    <!-- HERO Banner -->
    <div class="sptb-1 bg-background-1">
        <div class="header-text1 mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 col-md-12 mx-auto text-center text-white">
                        <h1>
                            {{ $course->translation->name ?? 'Courses' }}
                        </h1>
                        <p class="text-muted">{{ $course->translation->short_description }}</p>

                        <!-- Search -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <!-- Breadcrumb -->
    <div class="bg-white border-bottom">
        <div class="container">
            <div class="page-header h-100 d-flex flex-row-reverse">
                <div class="card-title d-flex align-items-center justify-content-between flex-column h-4 w-30">
                    <div class="dropdown w-100 position-relative">
                        <!-- Input -->
                        <input id="heroSearch" type="text" autocomplete="off" placeholder="Search courses"
                            class="form-control form-control-lg">

                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <button type="submit"
                                class="btn fw-semibold position-absolute mt-1 top-0 end-0 me-1 px-4 py-1">
                                Search
                            </button>

                        </div>
                        <!-- Button -->

                        <!-- Suggestions -->
                        <ul id="searchSuggestions" class="dropdown-menu w-100 mt-1 shadow" aria-labelledby="heroSearch">
                            @foreach (courses() as $c)
                                <li><a class="dropdown-item" href="{{ route('courses.show', ['topic' => $c->topic_slug, 'course' => $c->course_slug]) }}">{{ $c->course_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('categories.show', $course->topic->category->slug) }}">{{ $course->topic->category->translation->name }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $course->translation->name }}</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Course Detail -->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <!-- Left -->
                <div class="col-lg-8">
                    <div class="card overflow-hidden">

                        <div class="card-body">

                            @if ($course->video_url)
                                <div class="ratio ratio-16x9 mb-3">
                                    <iframe src="{{ $course->video_url }}" allowfullscreen></iframe>
                                </div>
                            @elseif($course->logo)
                                <img src="{{ asset('storage/' . $course->logo) }}" class="img-fluid rounded mb-3"
                                    alt="">
                            @endif

                            {{-- <h4 class="mt-4">Description</h4> --}}
                            <div>{!! $course->translation->content !!}</div>

                            <h4 class="mt-4">Specifications</h4>
                            <ul class="list-unstyled">
                                <li><i class="fe fe-clock me-2"></i> Duration: {{ $course->duration }}
                                    {{ Str::plural('Day', $course->duration) }}</li>
                                @if ($course->default_price)
                                    <li><i class="fe fe-dollar-sign me-2"></i> Price:
                                        ${{ number_format($course->default_price, 2) }}</li>
                                @endif
                                <li><i class="fe fe-tag me-2"></i> Category:
                                    {{ $course->topic->category->translation->name ?? '' }}</li>
                                <li><i class="fe fe-book me-2"></i> Topic: {{ $course->topic->translation->name ?? '' }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    @if ($course->faqs->isNotEmpty())
                        <div class="card faqs">
                            <div class="card-header">
                                <h5 class="card-title">Frequently Asked Questions</h5>
                            </div>
                            <div class="card-body">
                                <div class="panel-group1" id="accordion2">
                                    @foreach ($course->faqs as $faq)
                                        <div class="panel panel-default mb-4 border p-0">
                                            <div class="panel-heading1">
                                                <h4 class="panel-title1">
                                                    <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                                        data-parent="#accordion2" href="#collapse-{{ $faq->id }}"
                                                        aria-expanded="false">{!! $faq->question !!}</a>
                                                </h4>
                                            </div>
                                            <div id="collapse-{{ $faq->id }}" class="panel-collapse collapse active"
                                                role="tabpanel" aria-expanded="false">
                                                <div class="panel-body bg-white">
                                                    {!! $faq->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right Sidebar -->
                <div class="col-lg-4">
                    <div class="card">
                        @if ($course->is_popular)
                            <div class="ribbon ribbon-top-right text-danger">
                                <span class="bg-danger">Best Seller</span>
                            </div>
                        @elseif ($course->is_latest)
                            <div class="ribbon ribbon-top-right text-danger">
                                <span class="bg-danger">Latest</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $course->icon) }}" alt="img"
                                class="img-responsive  border br-7">
                            <div class="mt-4 mb-4 text-center">
                                @if ($course->default_price)
                                    <div class="mb-2">
                                        <span class="font-weight-semibold h2 text-default-dark mb-0">{!! price_format(active_currency(), $course->default_price ?? 14) !!}
                                            {{-- <span class="ms-1 font-weight-normal fs-16 strike-text text-default">$155</span> --}}
                                        </span>
                                    </div>
                                @endif
                                <p class="text-success font-weight-semibold mb-0 mt-1"><i
                                        class="fe fe-clock me-1"></i>Duration: {{ $course->duration }} days</p>
                            </div>
                            <div class="">
                                <a href="javascript:void(0)" class="btn btn-block btn-secondary mb-3 mb-xl-0" onclick="openEnquiryModal(this)" data-heading="Enquire Now" data-course="{{ $course->translation->name }}" data-courseId="{{ $course->id }}"><span>Enquire
                                        Now</span><i class="fe fe-message mt-1 ms-2 fs-14"></i></a>
                                {{-- <a href="javascript:void(0)" class="btn btn-block btn-secondary mb-3 mb-xl-0"><span>Enroll
                                        Now</span> <i class="fe fe-arrow-right mt-1 ms-2 fs-14"></i></a> --}}
                            </div>
                        </div>
                    </div>


                    <!-- Related Latest Courses -->
                    @if ($latestCourses->isNotEmpty())
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5 class="card-title">Latest Courses</h5>
                            </div>
                            <div class="card-body">
                                @foreach ($latestCourses as $latest)
                                    <div class="mb-3">
                                        <a
                                            href="{{ route('courses.show', ['topic' => $latest->topic_slug, 'course' => $latest->course_slug]) }}">
                                            <h6 class="mb-1">{{ $latest->translation->name }}</h6>
                                        </a>
                                        <small class="text-muted">
                                            <i class="fe fe-clock me-1"></i>Duration: {{ $course->duration }} {{ Str::plural('Day', $course->duration)  }}
                                        </small>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            const $searchInput = $("#heroSearch");
            const $suggestions = $("#searchSuggestions");
            const $suggestionItems = $suggestions.find("li");

            $searchInput.on("input", function() {
                const query = $(this).val().trim();
                let hasMatch = false;

                if (query.length > 1) {
                    const regex = new RegExp(query, "i"); // case-insensitive regex

                    $suggestionItems.each(function() {
                        const text = $(this).text().trim();
                        if (regex.test(text)) {
                            $(this).show();
                            hasMatch = true;
                        } else {
                            $(this).hide();
                        }
                    });

                    if (hasMatch) {
                        $suggestions.addClass("show");
                    } else {
                        $suggestions.removeClass("show");
                    }
                } else {
                    // Reset when query is empty
                    $suggestionItems.show();
                    $suggestions.removeClass("show");
                }
            });

            // Close dropdown when clicking outside
            $(document).on("click", function(e) {
                if (!$searchInput.is(e.target) && !$suggestions.is(e.target) && $suggestions.has(e.target)
                    .length === 0) {
                    $suggestions.removeClass("show");
                }
            });
        });
    </script>
@endpush
