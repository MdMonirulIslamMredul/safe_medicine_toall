@extends('frontend.master')
@section('title')
    About
@endsection
@section('content')

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($about->banner_image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">About Us</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>
                    </li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- About Section Start -->
        <div id="rs-about" class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-last padding-0 md-pl-15 md-pr-15 md-mb-30">
                        <div class="img-part">
                            <div class="about-img-wrap">
                                <img src="{{asset($about->image1??null)}}" alt="Image" class="about-img-one">
                                <img src="{{asset($about->image2??null)}}" alt="Image" class="about-img-two d-none d-md-block">
                                {{--                            <img src="{{asset($about->image3??null)}}" alt="Image" class="about-img-three">--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-70 md-pr-15">
                        <div class="sec-title">
                            <div class="sub-title orange">About Us</div>
                            <h2 class="title mb-17">{{$about->title??null}}</h2>
                            {!! $about->details1??null !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Section End -->




        <!-- Team Section Start -->
        <div id="rs-team" class="rs-team style1 orange-color pt-94 pb-100 md-pt-64 md-pb-70 gray-bg">
            <div class="container">
                <div class="sec-title mb-50 md-mb-30">
                    <div class="sub-title orange">Instructor</div>

                            <h2>{{$banner->title??null}}</h2>

                </div>
                <div class="rs-carousel owl-carousel nav-style2 orange-color" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="true" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true" data-md-device-dots="false">
                    @if(isset($teams))
                        @foreach($teams as $team)
                    <div class="team-item">
                        <img src="{{asset($team->image)}}" style="height: 300px;" alt="">
                        <div class="content-part">
                            <h4 class="name text-light">{{$team->name}}</h4>
                            <span class="designation">{{$team->designation}}</span>
                            <ul class="social-links">
                                <li><a href="{{$team->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$team->youtube}}"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="{{$team->linkedIn}}"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{$team->instagram}}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                        @endforeach
                        @endif
                </div>
            </div>
        </div>
        <!-- Team Section End -->





    </div>
    <!-- Main content End -->
@endsection
