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
    <meta name="description" content="@lang('disc.description')">
    <meta name="keywords" content="DISC syria, development impact support center, hope center"/>
    <title>DISC</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/disc"/>

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        #DISC {
            padding-top: 100px;
            padding-bottom: 50px;
        }
        /*#DISC .horizontal-margin {*/
            /*margin-top: 20px;*/
        /*}*/
        #DISC .disc-logo {
            width: 200px;
        }

        #DISC .first-part p {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #DISC #loeuvre-logo {
            width: 120px;
        }

        #DISC .second-part {
            margin-top: 20px;
        }

        #DISC #disc-gif {
            margin-top: -10px;
            width: 180px;
        }

        #DISC .what_category_image {
            width: 175px;
        }

        #DISC .other-project-title {
            font-size: 16px;
            margin-top: 10px;
        }

        #DISC .video {
            margin: 0;
        }

        @media screen and (min-width: 1200px) {
            #DISC #disc-gif {
                width: 225px;
            }

            #DISC .what_category_image {
                width: 210px;
            }
        }

        @media screen and (min-width: 992px) and (max-width: 1199px) {
            #DISC .disc-logo {
                width: 165px;
            }

            #DISC #loeuvre-logo {
                width: 100px;
            }

            #DISC .first-part p {
                font-size: 12px;
            }
        }

        @media screen and (max-width: 991px) {
            #DISC #loeuvre-logo {
                width: 100px;
            }
            #DISC #manos-logo {
                width: 100%;
            }
        }

        #DISC .second-part .what_category_image {
            -webkit-transition: all .7s ease 0s;
            -moz-transition: all .7s ease 0s;
            -o-transition: all .7s ease 0s;
            transition: all .7s ease 0s;
            -webkit-box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
            -moz-box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
        }

        #DISC .second-part .what_category_image:hover {
            transform: scale(1.07);
        }
    </style>
</head>
<body>

@include('public.navbar')

<section id="DISC">
    <div class="navigate">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">@lang('navbar.home')</a></li>
                <li><a href="{{route('public.main_projects')}}">@lang('what_we_do.title')</a></li>
                <li><a href="{{route('public.initiatives.type', 'development')}}">@lang('what_we_do.development')</a></li>
                <li class="active">DISC</li>
            </ol>
        </div>
    </div>
    <div class=" container">
        <div class="row">
            <div class="horizontal-margin first-part col-md-4 text-center vertical-separator">
                <img src="/images/logos/disc.svg" class="disc-logo">
                <p class="text-left p-justify">@lang('disc.description')</p>
                <div class="row" style="display: flex;align-items: center">
                    <div class="col-xs-6">
                        <img src="/images/logos/loeuvre.svg" id="loeuvre-logo">
                    </div>
                    <div class="col-xs-6">
                        <img src="/images/logos/manos.svg" id="manos-logo">
                    </div>
                </div>
            </div>
            <div class="second-part col-md-8 text-center">
                <div class="raw horizontal-margin">
                    <div class="col-md-8">
                        <div class="video">
                            <iframe src="https://www.youtube.com/embed/M0R190hdAcE" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/images/programs/what/disc.gif" id="disc-gif">
                    </div>
                </div>
                <div class="raw">
                    <div class="horizontal-margin col-sm-4 text-center">
                        <a href="{{route('public.disc.type', 'english-courses')}}">
                            <img src="/images/programs/what/disc-english.jpg" class="what_category_image">
                            <h3 class="other-project-title"><b>@lang('disc.english')</b></h3>
                        </a>
                    </div>
                    <div class="horizontal-margin col-sm-4 text-center">
                        <a href="{{route('public.disc.type', 'icdl-courses')}}">
                            <img src="/images/programs/what/disc-icdl.jpg" class="what_category_image">
                            <h3 class="other-project-title"><b>@lang('disc.icdl')</b></h3>
                        </a>
                    </div>
                    <div class="horizontal-margin col-sm-4 text-center">
                        <a href="{{route('public.disc.type', 'employment-skills')}}">
                            <img src="/images/programs/what/disc-skills.jpg" class="what_category_image">
                            <h3 class="other-project-title"><b>@lang('disc.skills')</b></h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

@stack('navbar-scripts')

</body>
</html>
