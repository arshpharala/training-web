<div class="header-main">
    @include('theme.xacademia.components.top-navbar')

    <div class="header-main">
        <!-- Mobile Header -->
        <div class="sticky">
            <div class="horizontal-header clearfix ">
                <div class="container">
                    <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                    <span class="smllogo"><img src="{{ asset('theme/xacademia/assets/images/brand/logo1.png') }}"
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
                    <a href="{{ route('home') }}"><img src="{{ asset('theme/xacademia/assets/images/brand/logo1.png') }}"
                            alt="img">
                    </a>
                </div>
                <div class="desktoplogo-1">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('theme/xacademia/assets/images/brand/logo.png') }}" class="header-dark"
                            alt="img">
                        <img src="{{ asset('theme/xacademia/assets/images/brand/logo1.png') }}"
                            class="header-brand-img header-white" alt="logo">
                    </a>
                </div>
                <nav class="horizontalMenu clearfix d-md-flex">
                    <ul class="horizontalMenu-list">
                        <li aria-haspopup="true"><a href="javascript:void(0)">Course <span
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
                        <li aria-haspopup="true"><a href="{{ route('contact') }}"> Contact Us</a></li>
                    </ul>
                    <ul class="mb-0">
                        <li aria-haspopup="true" class="d-none d-lg-block mt-2 top-postbtn">
                            <span><a class="btn btn-secondary" href="course-posts.html">Enquire Now</a></span>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div><!--/Horizontal-main -->
</div><!--/Horizontal-main -->
