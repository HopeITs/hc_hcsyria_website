<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $position = 'french_position';
    } else {
        $position = 'position';
    }
@endphp
<head>
    <script src="/js/jquery.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129097809-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-129097809-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>{{$profile->first_name}} {{$profile->last_name}}</title>
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
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')

<div id="TeamMember" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                    </div>
                    <div class="content">
                        <div class="main_subtitle" data-aos="fade-up" data-aos-duration="1000">MEET THE TEAM</div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0"></div>
            </div>
        </div>
    </div>
    {{--<div class="row d-flex justify-content-center">--}}
    {{--<div class="page-margin">--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col d-flex justify-content-center pe-0">
                <div class="single-member">
                    <div class="profile-container">
                        <img class="profile-img" src="{{$profile->image_path}}"
                             alt="{{$profile->first_name}} {{$profile->last_name}}">
                        <div class="member-name">{{$profile->first_name}} {{$profile->last_name}}</div>
                        <div class="member-position">
                            @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                            @else {!! $profile->position !!}
                            @endif
                        </div>
                        @if($profile->inactive == '0')
                            <div class="row d-flex justify-content-center">
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
                        @endif
                        @if($profile->inactive != '0')
                            <div class="row d-flex justify-content-center">
                                <div class="socials">
                                    <div class="member-position" style="color: red;">{{$profile->first_name}} has
                                        resigned
                                        at {{$profile->inactive}}
                                        {{--after giving an outstanding work that has enriched our--}}
                                        {{--center.--}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--</div>--}}
</div>

@include('new.public.footer')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
</body>
</html>
