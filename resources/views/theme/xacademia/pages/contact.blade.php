@extends('theme.xacademia.layouts.app')
@section('bannerImage', asset('storage/' . $page->banner))

@section('banner')

    <!--Section-->
    <section>
        <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white py-7">
                        <h1 class="">Contact Us</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Contact Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Section-->
@endsection

@section('content')

ab


    <!--Contact-->
    <div class="sptb bg-white contacts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row text-white">
                        <div class="col-lg-3 col-md-12 d-flex">
                            <div class="card border-0 mb-lg-0">
                                <div class="support-service mb-0  text-center bg-primary flex-fill">
                                    <i class="fa fa-phone"></i>
                                    <h5>{!! setting('contact_phone') !!}</h5>
                                    <P>Free Support!</P>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 d-flex">
                            <div class="card border-0 mb-lg-0">
                                <div class="support-service mb-0 text-center bg-secondary flex-fill">
                                    <i class="fa fa-clock-o"></i>
                                    <h5>{!! setting('working_hours', "Mon-Sat(10:00-19:00)") !!}</h5>
                                    <p>Working Hours!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 d-flex">
                            <div class="card border-0 mb-lg-0">
                                <div class="support-service mb-0 text-center bg-success flex-fill">
                                    <i class="fa fa-map-marker"></i>
                                    <h5>{!! setting('address') !!}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 d-flex">
                            <div class="card border-0 mb-lg-0">
                                <div class="support-service mb-0 text-center bg-orange flex-fill">
                                    <i class="fa fa-envelope-o"></i>
                                    <h5>{!! setting('contact_email') !!}</h5>
                                    <p>Support us!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact-->

    <!--Contact-->
    <div class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-7 col-md-12 mx-auto">
                    <div class="card mb-0 single-page customerpage contact">
                        <div class="card-body wrapper wrapper2 box-shadow-0">
                            <div class="mb-6 text-dark">
                                <h5 class="fs-25 font-weight-semibold">Contact Us</h5>
                                <p class="fs-16">If you are going to use a passage of Lorem Ipsum</p>
                            </div>
                            <form id="" class="" tabindex="500">
                                <div class="name">
                                    <label>Name</label>
                                    <input type="text" name="name">
                                </div>
                                <div class="mail">
                                    <label>Email</label>
                                    <input type="email" name="mail">
                                </div>
                                <div class="Message">
                                    <label>Message</label>
                                    <textarea name="example-textarea-input" rows="6" placeholder="Message"></textarea>
                                </div>
                                <div class="submit">
                                    <a href="javascript:void(0)" class="btn btn-primary">Send Message</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Contact-->
@endsection
