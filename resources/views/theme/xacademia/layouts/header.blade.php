<div class="header-main">
    @include('theme.xacademia.components.top-navbar')

    <style>
        .dropdown-mega .dropdown-menu {
            left: 0;
            right: 0;
        }

        #coreList button,
        #subList button {
            display: block;
            width: 100%;
            border: 0;
            background: transparent;
            text-align: left;
            padding: .4rem .5rem;
            border-radius: .3rem;
        }

        #coreList button:hover,
        #subList button:hover,
        #coreList button[aria-current="true"],
        #subList button[aria-current="true"] {
            background: #f1f3f9;
        }

        .course-card {
            border: 1px solid #dee2e6;
            border-radius: .5rem;
            padding: .75rem;
            background: #fff;
            height: 100%;
        }

        .course-card:hover {
            border-color: #0d6efd;
        }
    </style>

    <div class="header-main">
        <!-- Mobile Header -->
        <div class="sticky">
            <div class="horizontal-header clearfix ">
                <div class="container">
                    <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                    <span class="smllogo"><img src="{{ asset('theme/xacademia/assets/images/brand/logo12.png') }}"
                            width="120" alt="img" /></span>
                    <span class="smllogo-white"><img src="{{ asset('theme/xacademia/assets/images/brand/logo.png') }}"
                            width="120" alt="img" /></span>
                    <a href="tel:245-6325-3256" class="callusbtn"><i class="icon icon-phone" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- /Mobile Header -->

        <!--Horizontal-main -->
        <div class="horizontal-main header-style1 p-0 bg-dark-transparent clearfix">
            <div class="horizontal-mainwrapper container clearfix">
                <div class="desktoplogo">
                    <a href="{{ route('home') }}"><img
                            src="{{ asset('theme/xacademia/assets/images/brand/logo12.png') }}" alt="img">
                    </a>
                </div>
                <div class="desktoplogo-1">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('theme/xacademia/assets/images/brand/logo.png') }}" class="header-dark"
                            alt="img">
                        <img src="{{ asset('theme/xacademia/assets/images/brand/logo12.png') }}"
                            class="header-brand-img header-white" alt="logo">
                    </a>
                </div>
                <nav class="horizontalMenu clearfix d-md-flex">
                    <ul class="horizontalMenu-list">
                        {{-- <li aria-haspopup="true"><a href="javascript:void(0)">Course <span
                                    class="fe fe-chevron-down m-0"></span></a>
                            <ul class="sub-menu">
                                @foreach (menu_cataloge() as $category)
                                    <li aria-haspopup="true"><a
                                            href="javascript:void(0)">{{ $category->translation->name }} <i
                                                class="fa fa-angle-right float-end mt-1 d-none d-lg-block"></i></a>
                                        <ul class="sub-menu">
                                            @foreach ($category->courses as $course)
                                                <li aria-haspopup="true">
                                                    <a
                                                        href="{{ route('courses.show', ['category' => $category->slug, 'course' => $course->slug]) }}">{{ $course->translation->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li> --}}
                        <li aria-haspopup="true" class="mega-menu-trigger">
                            <a href="javascript:void(0)">
                                Explore Courses <span class="fe fe-chevron-down"></span>
                            </a>
                            <div class="horizontal-megamenu clearfix">
                                <div class="container">
                                    <div class="megamenu-content">

                                        <!-- Search + Pills -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control mega-search"
                                                    placeholder="Search courses, topics...">
                                            </div>
                                            <div class="col-md-4 d-flex gap-2 justify-content-md-end mt-2 mt-md-0">
                                                <span class="mega-pill">Career Path Quiz</span>
                                                <span class="mega-pill">Bespoke Training</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Categories -->
                                            <div class="col-3 categories-list">
                                                <h6 class="menu-title">Core Categories</h6>
                                                <ul></ul>
                                            </div>

                                            <!-- Topics -->
                                            <div class="col-3 topics-list">
                                                <h6 class="menu-title">Sub-Categories</h6>
                                                <ul></ul>
                                            </div>

                                            <!-- Courses -->
                                            <div class="col-6 courses-list">
                                                <h6 class="menu-title">Courses & Certifications</h6>
                                                <div class="row courses-grid"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>



                        <li aria-haspopup="true"><a href="{{ route('about') }}">About Us </a></li>
                        <li aria-haspopup="true"><a href="javascript:void(0)">Resource <span
                                    class="fe fe-chevron-down m-0"></span></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true"><a href="javascript:void(0)">Blog </a>

                                </li>
                                <li aria-haspopup="true"><a href="javascript:void(0)">News </a>

                                </li>
                            </ul>
                        </li>
                        <li aria-haspopup="true">
                           <a href="javascript:void(0)" onclick="openEnquiryModal(this)">Contact Us</a>
                        </li>

                    </ul>
                    <ul class="mb-0">
                        <li aria-haspopup="true" class="d-none d-lg-block mt-2 top-postbtn">
                            <span><a class="btn btn-secondary" href="javascript:void(0)" onclick="openEnquiryModal(this)"  data-heading="Enquire Now">Enquire Now</a></span>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div><!--/Horizontal-main -->
</div><!--/Horizontal-main -->
