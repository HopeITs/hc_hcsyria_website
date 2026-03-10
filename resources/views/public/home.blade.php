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
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:url" content="https://hcsyria.org"/>
    <meta name="description" content="Starting with the main provider of the family to help him/her in reviving their previous jobs or giving them a chance of starting their own projects that would provide them with an income which will cover their daily needs. This is a step in rebuilding the country’s economic structure on a micro level. The youths, to prepare them to enter the work field and be creative and functional individuals.">
    <meta property="og:type" content="website"/>
    <meta name="keywords"
          content="aleppo hope center, syria hope center, hope center aleppo, hope center syria, syria micro projects, aleppo micro projects, christians micro projects"/>
    <meta property="og:title" content="Hope Center"/>
    <meta property="og:image" content="https://hcsyria.org/images/hc-logo.jpg"/>
    <meta name="author" content="jean khechfe">
    <title>@lang('navbar.home')</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/paraxify.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/what_we_do.css" rel="stylesheet">
    <link href="/css/who_we_serve.css" rel="stylesheet">
    @if(app()->isLocale('fr'))
        <link href="/css/what_we_do-fr.css" rel="stylesheet">
        <style>
            .img__description {
                font-size: 22px;
            }
        </style>
    @endif
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/" />

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

<div class="preloader">
    <div class="preloader-gif"></div>
</div>

@include('public.navbar')

<section id="what_we_do">
    @include('public.what_we_do')
</section>

<section style="padding: 50px;"></section>

<section id="who_we_serve" style="padding: 50px 0">
    @include('public.who_we_serve')
</section>

<section style="padding: 50px;"></section>

<section id="testimonies" class="paraxify">
    <div class="container" id="fixed-height">
        <div>
            <p id="testimonies-wm">@lang('main.testimoniesLocation')
                <small id="dot">●</small>
                @lang('main.programsLocation2')
                <small id="dot">●</small>
                2018
            </p>
        </div>
        <div class="testimonies-wrapper">
            <div class="row text-center">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="title-one">@lang('main.testimoniesTitle')</h2>
                    <p>@lang('main.testimoniesText')</p>
                </div>
            </div>
            <div id="testimonies-carousel" class="carousel slide animated fadeInUp wow" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#testimonies-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#testimonies-carousel" data-slide-to="1"></li>
                    <li data-target="#testimonies-carousel" data-slide-to="2"></li>
                    <li data-target="#testimonies-carousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="item active">
                        <div class="single-testimony">F
                            <div class="media">
                                <img class="pull-left" src="/images/testimonies/4.jpg" alt="" width="170px">
                                <div class="media-body">
                                    <blockquote>
                                        <p>@lang('main.testimoniesGeorgeText')</p>
                                        @lang('main.testimoniesGeorgeName')
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-testimony">
                            <div class="media">
                                <img class="pull-left" src="/images/testimonies/3.jpg" alt="" width="170px">
                                <div class="media-body">
                                    <blockquote>
                                        <p>@lang('main.testimoniesMonicaText')</p>
                                        @lang('main.testimoniesMonicaName')
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-testimony">
                            <div class="media">
                                <img class="pull-left" src="/images/testimonies/1.jpg" alt="" width="170px">
                                <div class="media-body">
                                    <blockquote>
                                        <p>@lang('main.testimoniesEssaText')</p>
                                        @lang('main.testimoniesEssaName')
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-testimony">
                            <div class="media">
                                <img class="pull-left" src="/images/testimonies/2.jpg" alt="" width="170px">
                                <div class="media-body">
                                    <blockquote><p>@lang('main.testimoniesTobjiText')</p>
                                        @lang('main.testimoniesTobjiName')
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script>
    $('<img/>').attr('src', '/images/programs/what/bg-disc.jpg').on('load', function() {
        $(this).remove(); // prevent memory leaks
        $(".preloader").delay(1600).fadeOut("slow").remove();
    });
</script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/paraxify.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/swipe.index.js"></script>
<script type="text/javascript" src="/js/wow.min.js"></script>

<script>
    jQuery(window).load(function () {
        'use strict';
        //TESTIMONIES height
        if ($(window).width() < 480) {
            setTimeout(function () {
                var divHeight = $('#fixed-height').height();
                $('#fixed-height').css('height', divHeight + 'px');
            }, 2000);
        }
    });
    // var divHeight = $(window).height() - 75;
    // $('#home .carousel-inner .item').css('height', divHeight + 'px');
    // window.addEventListener("resize", function () {
    //     if (window.orientation === 0) {
    //         var divHeight = $(window).height() - 75;
    //         $('#home .carousel-inner .item').css('height', divHeight + 'px');
    //     }
    // });
    //
    // $('#main-carousel').carousel({
    //     interval: 12000
    // });

    $('#testimonies-carousel').carousel({
        interval: 80000
    });
</script>
<script>
    myParaxify = paraxify('.paraxify');
</script>
<script>
    new WOW().init();
</script>
@stack('navbar-scripts')
</body>
</html>
