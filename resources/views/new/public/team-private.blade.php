<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $position = 'position_french';
    } else {
        $position = 'position';
    }
@endphp
<head>
    <script src="/js/jquery.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    @include('new.public.components.analytics-head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fffff">
    <meta name="apple-mobile-web-app-status-bar-style" content="#fffff">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:url" content="https://hcsyria.org"/>
    <meta name="description"
          content="HOPE CENTER is an ecumenical organization, established at the beginning of 2018 under the guidance of Archbishop George Abo-Khazen of the Latin church in Syria and supervised by the Sisters of Jesus and Mary.">
    <meta property="og:type" content="website"/>
    <meta name="keywords"
          content="aleppo hope center, syria hope center"/>
    <meta property="og:title" content="Hope Center"/>
    <meta property="og:image" content="https://hcsyria.org/images/hc-logo.jpg"/>
    <meta name="description"
          content="HOPE CENTER is an ecumenical organization, established at the beginning of 2018 under the guidance of Archbishop George Abo-Khazen of the Latin church in Syria and supervised by the Sisters of Jesus and Mary.">
    <meta name="author" content="judy dadaghlian">
    <title>HC Team</title>
    <link href="{{asset('css/main-new.css')}}" rel="stylesheet">
    <link href="{{asset('css/team.css')}}" rel="stylesheet">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet">

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel="shortcut icon" href="/public/fonts/Avenir%20LT%20Std%2045%20Book.otf">
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin=''/>
    <link href="{{asset('css/font-lato.css')}}" rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link href='https://fonts.googleapis.com/css?family=Martel' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
          integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
          crossorigin="anonymous">
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->

    {{--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="/css/bootstrap.css">--}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{--<script src="/js/aos.js"></script>--}}
    {{--<link href="css/aos.css" rel="stylesheet">--}}
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>

    {{--<script type="text/javascript" src="/js/bootstrap.js"></script>--}}
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.event.move.js"></script>
    <script type="text/javascript" src="/js/jquery.twentytwenty.js"></script>
    <link href="/css/twentytwenty.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>

</head>
<body>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')
<div id="Team" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                    </div>
                    <div class="content">
                        <div class="main_subtitle" data-aos="fade-up"
                             data-aos-duration="1000">@lang('about.teamTitle')</div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0"></div>
            </div>
        </div>
    </div>
    <div class="small horizontal-line"></div>
    <div class="col-12 d-flex justify-content-center flex-column align-items-center team-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="section-title">@lang('about.hopeTeam')</div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="overlay" data-aos="fade-up" data-aos-duration="800">
        <div class="page-margin">
            <div id="team-carousel" class="owl-carousel owl-theme teamCarousel position-relative">
                @foreach($profilesHope as $profile)
                    <div class="item">
                        <div class="single-member">
                            <img class="profile-img" src="{{$profile->image_path}}"
                                 alt="{{$profile->first_name}} {{$profile->last_name}}">
                            <div class="member-name">{{$profile->first_name}} {{$profile->last_name}}</div>
                            <div class="member-position">
                                @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                @else {!! $profile->position !!}
                                @endif
                            </div>
                            <div class="socials">
                                <a href="mailto:{{$profile->email}}@hcsyria.org"> <i class="fa fa-envelope"></i></a>
                                <a href="tel:{{$profile->phone}}"> <i class="fa fa-phone"></i></a>
                                {{--<a href="tel:{{$profile->whatsapp}}"> <img class="profile-icon" src="/images/ico/whatspp-icon.svg"></a>--}}

                                @if($profile->facebook_link != '0')
                                    <a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                       target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if($profile->linkedin_link != '0')
                                    <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                       target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="col-12 d-flex justify-content-center flex-column align-items-center team-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="section-title">@lang('about.hope_homsTeam')</div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="overlay" data-aos="fade-up" data-aos-duration="800">
        <div class="page-margin">
            <div id="hope-homs-team-carousel" class=" owl-carousel owl-theme teamCarousel position-relative">
                @foreach($profilesHope_Homs as $profile)
                    <div class="item">
                        <div class="single-member">
                            <img class="profile-img" src="{{$profile->image_path}}"
                                 alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                            <div class="member-name">{{$profile->first_name}} {{$profile->last_name}}</div>
                            <div class="member-position">
                                @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                @else {!! $profile->position !!}
                                @endif
                            </div>
                            <div class="socials">
                                <a href="mailto:{{$profile->email}}@hcsyria.org"> <i class="fa fa-envelope"></i></a>
                                <a href="tel:{{$profile->phone}}"> <i class="fa fa-phone"></i></a>
                                {{--<a href="tel:{{$profile->whatsapp}}"> <img class="profile-icon" src="/images/ico/whatspp-icon.svg"></a>--}}

                                @if($profile->facebook_link != '0')
                                    <a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                       target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if($profile->linkedin_link != '0')
                                    <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                       target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="col-12 d-flex justify-content-center flex-column align-items-center team-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="section-title">@lang('about.hope_damascusTeam')</div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="overlay" data-aos="fade-up" data-aos-duration="800">
        <div class="page-margin">
            <div id="hope-damascus-team-carousel" class="owl-carousel owl-theme teamCarousel position-relative">
                @foreach($profilesHope_Damascus as $profile)
                    <div class="item">
                        <div class="single-member">
                            <img class="profile-img" src="{{$profile->image_path}}"
                                 alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                            <div class="member-name">{{$profile->first_name}} {{$profile->last_name}}</div>
                            <div class="member-position">
                                @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                @else {!! $profile->position !!}
                                @endif
                            </div>
                            <div class="socials">
                                <a href="mailto:{{$profile->email}}@hcsyria.org"> <i class="fa fa-envelope"></i></a>
                                <a href="tel:{{$profile->phone}}"> <i class="fa fa-phone"></i></a>
                                {{--<a href="tel:{{$profile->whatsapp}}"> <img class="profile-icon" src="/images/ico/whatspp-icon.svg"></a>--}}

                                @if($profile->facebook_link != '0')
                                    <a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                       target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if($profile->linkedin_link != '0')
                                    <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                       target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="col-12 d-flex justify-content-center flex-column align-items-center team-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="section-title">Hope Center Team - Latakia</div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="overlay" data-aos="fade-up" data-aos-duration="800">
        <div class="page-margin">
            <div id="hope-latakia-team-carousel" class="owl-carousel owl-theme teamCarousel position-relative">
                @foreach($profilesHope_Latakia as $profile)
                    <div class="item">
                        <div class="single-member">
                            <img class="profile-img" src="{{$profile->image_path}}"
                                 alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                            <div class="member-name">{{$profile->first_name}} {{$profile->last_name}}</div>
                            <div class="member-position">
                                @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                @else {!! $profile->position !!}
                                @endif
                            </div>
                            <div class="socials">
                                <a href="mailto:{{$profile->email}}@hcsyria.org"> <i class="fa fa-envelope"></i></a>
                                <a href="tel:{{$profile->phone}}"> <i class="fa fa-phone"></i></a>
                                {{--<a href="tel:{{$profile->whatsapp}}"> <img class="profile-icon" src="/images/ico/whatspp-icon.svg"></a>--}}

                                @if($profile->facebook_link != '0')
                                    <a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                       target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if($profile->linkedin_link != '0')
                                    <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                       target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="col-12 d-flex justify-content-center flex-column align-items-center team-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="section-title">@lang('about.disc_homsTeam')</div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="overlay" data-aos="fade-up" data-aos-duration="800">
        <div class="page-margin">
            <div id="disc-team-carousel" class=" owl-carousel owl-theme position-relative teamCarousel">
                @foreach($profiles_disc as $profile)
                    <div class="item">
                        <div class="single-member">
                            <img class="profile-img" src="{{$profile->image_path}}"
                                 alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                            <div class="member-name">{{$profile->first_name}} {{$profile->last_name}}</div>
                            <div class="member-position">
                                @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                @else {!! $profile->position !!}
                                @endif
                            </div>
                            <div class="socials">
                                <a href="mailto:{{$profile->email}}@hcsyria.org"> <i class="fa fa-envelope"></i></a>
                                <a href="tel:{{$profile->phone}}"> <i class="fa fa-phone"></i></a>
                                {{--<a href="tel:{{$profile->whatsapp}}"> <img class="profile-icon" src="/images/ico/whatspp-icon.svg"></a>--}}

                                @if($profile->facebook_link != '0')
                                    <a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                       target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if($profile->linkedin_link != '0')
                                    <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                       target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="col-12 d-flex justify-content-center flex-column align-items-center team-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="section-title">@lang('about.study_homsTeam')</div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="overlay" data-aos="fade-up" data-aos-duration="800">
        <div class="page-margin">
            <div id="study-team-carousel" class=" owl-carousel owl-theme position-relative teamCarousel">
                @foreach($profiles_study as $profile)
                    <div class="item">
                        <div class="single-member">
                            <img class="profile-img" src="{{$profile->image_path}}"
                                 alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                            <div class="member-name">{{$profile->first_name}} {{$profile->last_name}}</div>
                            <div class="member-position">
                                @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                @else {!! $profile->position !!}
                                @endif
                            </div>
                            <div class="socials">
                                <a href="mailto:{{$profile->email}}@hcsyria.org"> <i class="fa fa-envelope"></i></a>
                                <a href="tel:{{$profile->phone}}"> <i class="fa fa-phone"></i></a>
                                {{--<a href="tel:{{$profile->whatsapp}}"> <img class="profile-icon" src="/images/ico/whatspp-icon.svg"></a>--}}

                                @if($profile->facebook_link != '0')
                                    <a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                       target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if($profile->linkedin_link != '0')
                                    <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                       target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="col-12 d-flex justify-content-center flex-column align-items-center team-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="section-title">@lang('about.childrenTeam')</div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="overlay" data-aos="fade-up" data-aos-duration="800">
        <div class="page-margin">
            <div id="children-team-carousel" class=" owl-carousel owl-theme position-relative teamCarousel">
                @foreach($profiles_children as $profile)
                    <div class="item">
                        <div class="single-member">
                            <img class="profile-img" src="{{$profile->image_path}}"
                                 alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                            <div class="member-name">{{$profile->first_name}} {{$profile->last_name}}</div>
                            <div class="member-position">
                                @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                @else {!! $profile->position !!}
                                @endif
                            </div>
                            <div class="socials">
                                <a href="mailto:{{$profile->email}}@hcsyria.org"> <i class="fa fa-envelope"></i></a>
                                <a href="tel:{{$profile->phone}}"> <i class="fa fa-phone"></i></a>
                                {{--<a href="tel:{{$profile->whatsapp}}"> <img class="profile-icon" src="/images/ico/whatspp-icon.svg"></a>--}}

                                @if($profile->facebook_link != '0')
                                    <a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                       target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if($profile->linkedin_link != '0')
                                    <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                       target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="col-12 d-flex justify-content-center flex-column align-items-center team-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="section-title">LEAP Team</div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
    <div class="overlay" data-aos="fade-up" data-aos-duration="800">
        <div class="page-margin">
            <div id="leap-carousel" class=" owl-carousel owl-theme position-relative teamCarousel">
                @foreach($profiles_leap as $profile)
                    <div class="item">
                        <div class="single-member">
                            <img class="profile-img" src="{{$profile->image_path}}"
                                 alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                            <div class="member-name">{{$profile->first_name}} {{$profile->last_name}}</div>
                            <div class="member-position">
                                @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                @else {!! $profile->position !!}
                                @endif
                            </div>
                            <div class="socials">
                                <a href="mailto:{{$profile->email}}@hcsyria.org"> <i class="fa fa-envelope"></i></a>
                                <a href="tel:{{$profile->phone}}"> <i class="fa fa-phone"></i></a>
{{--                                <a href="tel:{{$profile->whatsapp}}"> <img class="profile-icon" src="/images/ico/whatspp-icon.svg"></a>--}}

                                @if($profile->facebook_link != '0')
                                    <a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                       target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if($profile->linkedin_link != '0')
                                    <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                       target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="horizontal-line last"></div>
</div>

@include('new.public.footer')

<script type="text/javascript" src="/js/map.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYwdnorzegPi49kyQngxrguVMAw9iFKJU&callback=initMap">
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#team-carousel').owlCarousel({
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
            autoplay: false,
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            dots: true,
            autoplaySpeed: 700,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                740: {
                    items: 3,
                },
                940: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
                1200: {
                    items: 5,
                },
                1400: {
                    items: 5,
                },
                1600: {
                    items: 5,
                },
                1800: {
                    items: 5,
                }
            },
        });
        $('#hope-homs-team-carousel').owlCarousel({
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
            autoplay: false,
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            dots: true,
            autoplaySpeed: 700,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                740: {
                    items: 3,
                },
                940: {
                    items: 5,
                },
                992: {
                    items: 5,
                },
                1200: {
                    items: 5,
                },
                1400: {
                    items: 5,
                },
                1600: {
                    items: 5,
                },
                1800: {
                    items: 5,
                }
            },
        });
        $('#hope-damascus-team-carousel').owlCarousel({
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
            autoplay: false,
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            dots: true,
            autoplaySpeed: 700,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                740: {
                    items: 3,
                },
                940: {
                    items: 5,
                },
                992: {
                    items: 5,
                },
                1200: {
                    items: 5,
                },
                1400: {
                    items: 5,
                },
                1600: {
                    items: 5,
                },
                1800: {
                    items: 5,
                }
            },
        });
        $('#hope-latakia-team-carousel').owlCarousel({
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
            autoplay: false,
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            dots: true,
            autoplaySpeed: 700,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                740: {
                    items: 3,
                },
                940: {
                    items: 5,
                },
                992: {
                    items: 5,
                },
                1200: {
                    items: 5,
                },
                1400: {
                    items: 5,
                },
                1600: {
                    items: 5,
                },
                1800: {
                    items: 5,
                }
            },
        });
        $('#disc-team-carousel').owlCarousel({
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
            autoplay: false,
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            dots: true,
            autoplaySpeed: 700,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                740: {
                    items: 3,
                },
                940: {
                    items: 5,
                },
                992: {
                    items: 5,
                },
                1200: {
                    items: 5,
                },
                1400: {
                    items: 5,
                },
                1600: {
                    items: 5,
                },
                1800: {
                    items: 5,
                }
            },
        });
        $('#study-team-carousel').owlCarousel({
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
            autoplay: false,
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            dots: true,
            autoplaySpeed: 700,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                740: {
                    items: 3,
                },
                940: {
                    items: 5,
                },
                992: {
                    items: 5,
                },
                1200: {
                    items: 5,
                },
                1400: {
                    items: 5,
                },
                1600: {
                    items: 5,
                },
                1800: {
                    items: 5,
                }
            },
        });
        $('#children-team-carousel').owlCarousel({
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
            autoplay: false,
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            dots: true,
            autoplaySpeed: 700,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                740: {
                    items: 3,
                },
                940: {
                    items: 5,
                },
                992: {
                    items: 5,
                },
                1200: {
                    items: 5,
                },
                1400: {
                    items: 5,
                },
                1600: {
                    items: 5,
                },
                1800: {
                    items: 5,
                }
            },
        });
        $('#leap-carousel').owlCarousel({
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
            autoplay: false,
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: false,
            dots: true,
            autoplaySpeed: 700,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                740: {
                    items: 3,
                },
                940: {
                    items: 5,
                },
                992: {
                    items: 5,
                },
                1200: {
                    items: 5,
                },
                1400: {
                    items: 5,
                },
                1600: {
                    items: 5,
                },
                1800: {
                    items: 5,
                }
            },
        });
    });
</script>
@stack('navbar-socialsUs')
@stack('navbar-whatwedo')
@stack('preloader')
</body>
</html>
