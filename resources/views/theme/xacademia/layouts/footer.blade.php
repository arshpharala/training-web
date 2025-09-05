@include('theme.xacademia.components.subscribe')

<!--Section-->
<div class="position-relative">
    <div class="shape overflow-hidden bottom-footer-shape">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--/Section-->

<!--Footer Section-->
<footer class="bg-dark">
    <div class="footer-main footer-main1">
        <div class="container">
            <div class="row">
                <!-- Logo + Contact -->
                <div class="col-lg-3 col-md-12 mb-5 mb-lg-0">
                    <img src="{{ asset('theme/xacademia/assets/images/brand/logo-white.png') }}" class="w-auto border-0" alt="logo">
                    <ul class="list-unstyled">
                        <li><a href="javascript:void()"><i class="fe fe-map-pin"></i> {{ setting('address') }}</a></li>
                        <li><a href="mailto:{{ setting('contact_email') }}"><i class="fe fe-mail"></i> {{ setting('contact_email') }}</a></li>
                        <li><a href="tel:{{ setting('contact_phone') }}"><i class="fe fe-phone"></i> {{ setting('contact_phone') }}</a></li>
                    </ul>

                    <ul class="list-inline mt-4">
                        @if (setting('facebook'))
                            <li class="list-inline-item"><a href="{{ setting('facebook') }}" class="social-icons"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if (setting('instagram'))
                            <li class="list-inline-item"><a href="{{ setting('instagram') }}" class="social-icons"><i class="fa fa-instagram"></i></a></li>
                        @endif
                        @if (setting('linkedin'))
                            <li class="list-inline-item"><a href="{{ setting('linkedin') }}" class="social-icons"><i class="fa fa-linkedin"></i></a></li>
                        @endif
                        @if (setting('twitter'))
                            <li class="list-inline-item"><a href="{{ setting('twitter') }}" class="social-icons"><i class="fa fa-twitter"></i></a></li>
                        @endif
                    </ul>
                </div>

                <!-- Categories -->
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <h6 class="font-weight-normal text-white mb-3">Categories</h6>
                    <ul class="list-unstyled">
                        @foreach (menu_cataloge() as $category)
                            <li>
                                <a href="{{ route('categories.show', ['category' => $category->slug]) }}">
                                    <i class="fe fe-chevron-right"></i>
                                    {{ $category->translation->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Featured Courses -->
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <h6 class="font-weight-normal text-white mb-3">Featured Courses</h6>
                    <ul class="list-unstyled">
                        @foreach (courses()->where('is_featured', true)->take(5) as $course)
                            <li>
                                <a href="{{ route('courses.show', $course->slug) }}">
                                    <i class="fe fe-star text-warning"></i>
                                    {{ $course->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Our Company -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="font-weight-normal text-white mb-3">Our Company</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}"><i class="fe fe-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fe fe-chevron-right"></i> Contact Us</a></li>
                        <li><a href="#"><i class="fe fe-chevron-right"></i> Our Team</a></li>
                        <li><a href="#"><i class="fe fe-chevron-right"></i> Services</a></li>
                        <li><a href="#"><i class="fe fe-chevron-right"></i> Blog News</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom -->
    <div class="py-4 footer-main border-bottom bg-dark p-0 border-top-0 border-white-1">
        <div class="container d-flex justify-content-between align-items-center">
            <ul class="payments mb-0">
                <li><i class="fa fa-cc-visa text-white-50"></i></li>
                <li><i class="fa fa-cc-mastercard text-white-50"></i></li>
                <li><i class="fa fa-cc-paypal text-white-50"></i></li>
            </ul>
            <div class="text-white">
                @if (!empty(setting('copyright')))
                    {!! setting('copyright') !!}
                @else
                    © {{ now()->year }} <a href="javascript:void(0)" class="text-primary">{{ env('APP_NAME') }}</a>. All rights reserved.
                @endif
            </div>
        </div>
    </div>
</footer>

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>
