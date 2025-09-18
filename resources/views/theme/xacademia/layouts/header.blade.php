<div class="header-main">
    @include('theme.xacademia.components.top-navbar')
    <div class="header-main">
        <!-- Mobile Header -->
        <div class="sticky">
            <div class="horizontal-header clearfix ">
                <div class="container">
                    <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                    <a href="{{ route('home') }}">
                        <span class="smllogo">
                            @if (setting('site_white_logo'))
                                <img src="{{ asset('storage/' . setting('site_white_logo')) }}" width="120"
                                    alt="img" />
                            @else
                                <img src="{{ asset('theme/xacademia/assets/images/brand/logo12.png') }}" width="120"
                                    alt="img" />
                            @endif
                        </span>
                        <span class="smllogo-white">
                            @if (setting('site_logo'))
                                <img src="{{ asset('storage/' . setting('site_logo')) }}" width="120"
                                    alt="img" />
                            @else
                                <img src="{{ asset('theme/xacademia/assets/images/brand/logo.png') }}" width="120"
                                    alt="img" />
                            @endif
                        </span>
                    </a>
                    <a href="tel:{{ setting('contact_phone') }}" class="callusbtn">
                        <i class="icon icon-phone" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /Mobile Header -->

        <!--Horizontal-main -->
        <div class="horizontal-main header-style1 p-0 bg-dark-transparent clearfix">
            <div class="horizontal-mainwrapper container clearfix">
                <div class="desktoplogo">
                    <a href="{{ route('home') }}">
                        @if (setting('site_white_logo'))
                            <img src="{{ asset('storage/' . setting('site_white_logo')) }}" alt="logo">
                        @else
                            <img src="{{ asset('theme/xacademia/assets/images/brand/logo12.png') }}" alt="logo">
                        @endif
                    </a>
                </div>
                <div class="desktoplogo-1">
                    <a href="{{ route('home') }}">
                        @if (setting('site_logo'))
                            <img src="{{ asset('storage/' . setting('site_logo')) }}" class="header-dark"
                                alt="img">
                        @else
                            <img src="{{ asset('theme/xacademia/assets/images/brand/logo.png') }}" class="header-dark"
                                alt="img">
                        @endif

                        @if (setting('site_white_logo'))
                            <img src="{{ asset('storage/' . setting('site_white_logo')) }}"
                                class="header-brand-img header-white" alt="logo">
                        @else
                            <img src="{{ asset('theme/xacademia/assets/images/brand/logo12.png') }}"
                                class="header-brand-img header-white" alt="logo">
                        @endif
                    </a>
                </div>
                <nav class="horizontalMenu clearfix d-md-flex">
                    <ul class="horizontalMenu-list">
                        <li aria-haspopup="true" class="mega-menu-trigger">
                            <a href="javascript:void(0)">
                                Explore Courses <span class="fe fe-chevron-down"></span>
                            </a>

                            <div class="horizontal-megamenu clearfix">
                                <div class="container">
                                    <div class="megamenu-content">

                                        <!-- Search (desktop only) -->
                                        <div class="row align-items-center d-none d-lg-flex">
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
                                            <div class="col-12 col-lg-3 categories-list">
                                                <h6 class="menu-title">Core Categories</h6>
                                                <ul></ul>
                                            </div>

                                            <!-- Topics (desktop only) -->
                                            <div class="col-3 topics-list d-none d-lg-block">
                                                <h6 class="menu-title">Learning Track</h6>
                                                <ul></ul>
                                            </div>

                                            <!-- Courses (desktop only) -->
                                            <div class="col-6 courses-list d-none d-lg-block">
                                                <h6 class="menu-title">Courses & Certifications</h6>
                                                <div class="row courses-grid"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>

                        <li aria-haspopup="true"><a href="{{ route('about') }}">About Us</a></li>
                        <li aria-haspopup="true"><a href="javascript:void(0)">Resource <span
                                    class="fe fe-chevron-down m-0"></span></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true"><a href="javascript:void(0)">Blog</a></li>
                                <li aria-haspopup="true"><a href="javascript:void(0)">News</a></li>
                            </ul>
                        </li>
                        <li aria-haspopup="true">
                            <a href="javascript:void(0)" onclick="openEnquiryModal(this)">Contact Us</a>
                        </li>
                    </ul>

                    {{-- <ul class="mb-0">
                        <li aria-haspopup="true" class="d-none d-lg-block mt-2 top-postbtn">
                            <span><a class="btn btn-secondary" href="javascript:void(0)"
                                     onclick="openEnquiryModal(this)" data-heading="Enquire Now">Enquire Now</a></span>
                        </li>
                    </ul> --}}
                </nav>
            </div>
        </div>
    </div><!--/Horizontal-main -->
</div><!--/Header-main -->
