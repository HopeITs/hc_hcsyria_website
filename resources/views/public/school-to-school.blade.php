<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
    <meta name="description" content="@lang('school2school.description')">
    <meta name="keywords" content="family to family, syria, hope center"/>
    <title>@lang('school2school.title')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/school-to-school" />

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
            margin: 10px 0;
        }
        #SchoolToSchool .school_image {
            width: 230px;
        }
        #SchoolToSchool .second-part img {
            -webkit-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            -webkit-transition: all .7s ease 0s;
            -moz-transition: all .7s ease 0s;
            -o-transition: all .7s ease 0s;
            transition: all .7s ease 0s;
        }
        #SchoolToSchool .second-part img:hover {
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
                width: 210px;
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
        @media screen and (min-width: 992px) and (max-width: 1199px){
            #SchoolToSchool #caritas-logo {
                width: 80px;
            }
        }
        @media screen and (min-width: 768px) and (max-width: 991px){
            #SchoolToSchool .second-part p {
                margin-top: 60px;
            }
        }
        #SchoolToSchool .horizontal-margin {
            /*margin-top: 30px;*/
        }
    </style>
</head>
<body>

@include('public.navbar')

<section id="SchoolToSchool">
    {{--<div class="navigate">--}}
        {{--<div class="container">--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="/">@lang('navbar.home')</a></li>--}}
                {{--<li><a href="{{route('public.main_projects')}}">@lang('what_we_do.title')</a></li>--}}
                {{--<li><a href="{{route('public.initiatives.type', 'development')}}">@lang('what_we_do.development')</a></li>--}}
                {{--<li class="active">@lang('school2school.title')</li>--}}
            {{--</ol>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class=" container">--}}
        <div class="row">
            <div class="horizontal-margin first-part col-lg-4 col-md-3 text-center vertical-separator">
                <img src="/images/logos/school.svg" class="projects-logo-big">
                <p class="text-left p-justify">@lang('school2school.description')</p>
                <img src="/images/logos/caritas.svg" id="caritas-logo">
            </div>
            <div class="second-part col-lg-7 col-md-8 text-center">
                <div class="row">
                    <div class="horizontal-margin top-three col-md-4 col-sm-6 text-center">
                        <a href="{{route('public.school2school.type', 'al-sharek')}}">
                            <img src="/images/programs/schools/sharek.jpg" class="school_image">
                            <h3 class="other-project-title"><b>Al-Sharek</b></h3>
                        </a>
                    </div>
                    <div class="horizontal-margin top-three col-md-4 col-sm-6 text-center">
                        <a href="{{route('public.school2school.type', 'al-woroud')}}">
                            <img src="/images/programs/schools/woroud.jpg" class="school_image">
                            <h3 class="other-project-title"><b>Al-Woroud</b></h3>
                        </a>
                    </div>
                    <div class="horizontal-margin top-three col-md-4 col-sm-6 text-center">
                        <a href="{{route('public.school2school.type', 'guiliguian')}}">
                            <img src="/images/programs/schools/guiliguian.jpg" class="school_image">
                            <h3 class="other-project-title"><b>Guiliguian</b></h3>
                        </a>
                    </div>
                    <div class="horizontal-margin bottom-three col-md-4 col-sm-6 text-center">
                        <a href="{{route('public.school2school.type', 'bani-taghleb')}}">
                            <img src="/images/programs/schools/bani-taghleb.jpg" class="school_image">
                            <h3 class="other-project-title"><b>Bani-Taghleb</b></h3>
                        </a>
                    </div>
                    <div class="horizontal-margin bottom-three col-md-4 col-sm-6 col-md-push-4 text-center">
                        <a href="{{route('public.school2school.type', 'al-enaya')}}">
                            <img src="/images/programs/schools/enaya.jpg" class="school_image">
                            <h3 class="other-project-title"><b>Al-Enaya</b></h3>
                        </a>
                    </div>
                    <div class="horizontal-margin bottom-three col-md-4 col-sm-6 col-md-pull-4 text-center">
                        <a data-fancybox href="https://youtu.be/vdU-_krIovw">
                            <img src="/images/programs/schools/thumbnail.jpg" class="school_image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    {{--</div>--}}
</section>

<div style="padding-top: 50px;"></div>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
@stack('navbar-scripts')

</body>
</html>
