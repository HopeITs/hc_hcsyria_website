<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $language = 'french';
    } else {
        $language = 'english';
    }
@endphp
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168141177-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-168141177-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta name="description" content="@lang('school2school.description')">
    <meta name="keywords" content="family to family, syria, hope center"/>
    <title>@lang('school2school.title')</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org"/>
    <link href='https://fonts.googleapis.com/css?family=Caveat' rel='stylesheet'>

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        #SchoolToSchool {
            padding: 100px 0 0 0;
            margin: 0 5% 0 5%;
        }
        #SchoolToSchool #caritas-logo {
            padding-top: 15px;
            width: 100px;
        }
        #SchoolToSchool .first-part {
            margin-bottom: 35px;
        }
        #SchoolToSchool .first-part p {
            font-size: 20px;
            margin: 10px 0;
        }
        #SchoolToSchool .school_image {
            width: 300px;
        }
        #SchoolToSchool .school_title {
            font-family: 'Caveat'!important;
            font-weight: bold;
            font-size: 35px;
            color:#111 ;
        }
        #SchoolToSchool .school_title:hover {
            transition: all .7s ease 0s;
            color:#CF142B ;
        }

        #SchoolToSchool a img {
            -webkit-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            -webkit-transition: all .7s ease 0s;
            -moz-transition: all .7s ease 0s;
            -o-transition: all .7s ease 0s;
            transition: all .7s ease 0s;
        }
        #SchoolToSchool a img:hover {
            -webkit-transform: scale(1.07);
            -moz-transform: scale(1.07);
            -ms-transform: scale(1.07);
            -o-transform: scale(1.07);
            transform: scale(1.07);
        }
        @media screen and (min-width: 992px) and (max-width: 1199px) {
            #SchoolToSchool .projects-logo-big {
                width: 200px;
            }
            #SchoolToSchool #caritas-logo {
                width: 100px;
                padding: 0;
            }
            #SchoolToSchool .school_image {
                width: 250px;
            }
            #SchoolToSchool .top-three {
                /*margin-top: 80px;*/
            }
            #SchoolToSchool .bottom-three {
                margin-top: 20px;
            }
            #SchoolToSchool .first-part p {
                font-size: 13px;
            }
            #SchoolToSchool .second-part p {
                margin-top: 40px;
            }
            #SchoolToSchool .gif_header{
                width: 90%;
            }
        }
        @media screen and (min-width: 1200px) {
            #SchoolToSchool .top-three {
                /*margin-top: 40px;*/
            }
            #SchoolToSchool .bottom-three {
                margin-top: 20px;
            }
            #SchoolToSchool .second-part p {
                margin-top: 50px;
            }
        }
        @media screen and (max-width: 720px) {
            #SchoolToSchool .gif_header{
                width: 100%;
            }
            #SchoolToSchool {
                margin: 0px
            }
        }
        @media screen and (min-width: 992px) and (max-width: 1199px){
            #SchoolToSchool #caritas-logo {
                width: 80px;
            }
        }
        @media screen and (min-width: 768px) and (max-width: 991px){
            #SchoolToSchool .second-part p {
                margin-top: 60px;
            }
            #SchoolToSchool .gif_header{
                width: 90%;
            }
        }
        #SchoolToSchool .horizontal-margin {
            /*margin-top: 30px;*/
        }
    </style>
</head>
<body>

@include('public.navbar')

<div id="SchoolToSchool">
    <div style="padding-top: 30px"></div>

    <div class="container text-center animated fadeInUp delay" style="margin-top: -20px;">
        <img src="/images/programs/schools/school-to-school.gif" class="gif_header">
    </div>
    <div class="row" style="margin-top: -30px;">
        <div class="first-part col-md-5 text-center vertical-separator" style="padding-top: 0px;">
            {{--<img src="/images/logos/school.svg" class="projects-logo-big">--}}
            <p class="text-left p-justify">@lang('school2school.description')</p>
            <img src="/images/logos/caritas.svg" id="caritas-logo">
        </div>
        <div class="second-part col-md-7 text-center" >
            <div class="video" style="margin-top: 20px;">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/vdU-_krIovw"
                        frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div style="padding-top: 40px"></div>

    <div class="row animated fadeInUp delay">
        <div class="col-sm-6 col-sm-offset-3 ">
            {{--<h1 class="text-center title-shadow"><b>@lang('family2family.partners')</b></h1>--}}
            <h1 class="text-center red-title"><b>@lang('family2family.partners')</b></h1>
        </div>
    </div>

    <div style="padding-top: 10px"></div>

    <div class="row">
        <div class="horizontal-margin top-three col-md-4 col-sm-6 text-center">
            <a href="{{route('public.school2school.type', 'al-sharek')}}">
                <img src="/images/programs/schools/sharek.jpg" class="school_image">
                <h3 class="school_title">Al-Sharek</h3>
            </a>
        </div>
        <div class="horizontal-margin top-three col-md-4 col-sm-6 text-center">
            <a href="{{route('public.school2school.type', 'al-woroud')}}">
                <img src="/images/programs/schools/woroud.jpg" class="school_image">
                <h3 class="school_title">Al-Woroud</h3>
            </a>
        </div>
        <div class="horizontal-margin top-three col-md-4 col-sm-6 text-center">
            <a href="{{route('public.school2school.type', 'guiliguian')}}">
                <img src="/images/programs/schools/guiliguian.jpg" class="school_image">
                <h3 class="school_title">Guiliguian</h3>
            </a>
        </div>
        <div class="horizontal-margin top-three col-md-4 col-sm-6 text-center">
            <a href="{{route('public.school2school.type', 'bani-taghleb')}}">
                <img src="/images/programs/schools/bani-taghleb.jpg" class="school_image">
                <h3 class="school_title">Bani-Taghleb</h3>
            </a>
        </div>
        <div class="horizontal-margin top-three col-md-4 col-sm-6 text-center">
            <a href="{{route('public.school2school.type', 'al-enaya')}}">
                <img src="/images/programs/schools/enaya.jpg" class="school_image">
                <h3 class="school_title">Al-Enaya</h3>
            </a>
        </div>
        <div class="horizontal-margin top-three col-md-4 col-sm-6 text-center">
            <a href="{{route('public.school2school.type', 'al-ghassaniye')}}">
                <img src="/images/programs/schools/ghassaniye.jpg" class="school_image">
                <h3 class="school_title">Al-Ghassaniye</h3>
            </a>
        </div>
    </div>


    <div style="padding-top: 40px"></div>
</div>
@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/owl.carousel.js"></script>
<script>
    $(window).on('load', function(){
        setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
    });
    function removeLoader() {
        $(".preloader").fadeOut(500, function () {
            // fadeOut complete. Remove the loading div
            $(".preloader").remove(); //makes page more lightweight
        });
    };
</script>
<script>
    jQuery(document).ready(function () {
        $("#partners-carousel").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            autoHeight: true,
            itemsCustom: [
                [0, 1],
                [400, 1],
                [600, 2],
                [700, 2],
                [1000, 2],
                [1200, 3],
            ],
        });
    });

    var waitForFinalEvent = (function () {
        var timers = {};
        return function (callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "Don't call this twice without a uniqueId";
            }
            if (timers[uniqueId]) {
                clearTimeout (timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
        };
    })();

    $(window).resize(function () {
        waitForFinalEvent(function(){
            let owo = $('.owl-wrapper-outer');
            owo.css("height", "auto");
            owo.css("height", owo.height() + "px");
        }, 500, "some unique string");
    });

    if (jQuery(window).width()<786) {
        $('.owl-wrapper').css('left','-8px');
    }

    $('#main-carousel').carousel({
        interval: 6000
    });
</script>
@stack('navbar-scripts')

</body>
</html>
