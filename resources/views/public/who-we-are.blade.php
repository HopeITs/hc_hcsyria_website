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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168141177-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-168141177-1');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M9HLZ6M');</script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:url" content="https://hcsyria.org"/>
    <meta name="description"
          content="HOPE CENTER is an ecumenical organization, established at the beginning of 2018 under the guidance of Archbishop George Abo-Khazen of the Latin church in Syria and supervised by the Sisters of Jesus and Mary.">
    <meta property="og:type" content="website"/>
    <meta name="keywords"
          content="aleppo hope center, syria hope center"/>
    <meta property="og:title" content="Hope Center"/>
    <meta property="og:image" content="https://hcsyria.org/images/hc-logo.jpg"/>
    <meta name="author" content="judy dadaghlian">
    <title>@lang('navbar.about')</title>

    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org"/>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/slider.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">

    <script type="text/javascript" src="/js/paraxify.min.js"></script>

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <style>
        #img_wrap1 #static, #img_wrap1:hover #animated {
            display: inline;
        }
        #img_wrap1 #animated, #img_wrap1:hover #static {
            display: none;
        }

        #img_wrap2 #static, #img_wrap2:hover #animated {
            display: inline;
        }
        #img_wrap2 #animated, #img_wrap2:hover #static {
            display: none;
        }

        #img_wrap3 #static, #img_wrap3:hover #animated {
            display: inline;
        }
        #img_wrap3 #animated, #img_wrap3:hover #static {
            display: none;
        }

        #img_wrap4 #static, #img_wrap4:hover #animated {
            display: inline;
        }
        #img_wrap4 #animated, #img_wrap4:hover #static {
            display: none;
        }

        #img_wrap5 #static, #img_wrap5:hover #animated {
            display: inline;
        }
        #img_wrap5 #animated, #img_wrap5:hover #static {
            display: none;
        }

        .red-title{
            color:#CF142B ;
            text-transform: uppercase;
        }

        .mission_img{
            transition: 0.9s;
            /*box-shadow: 10px 10px 8px #888888;*/
        }

        .mission_description{
            text-transform: uppercase;
            display: flex;
            text-align: center;
        }

        .carousel-caption{
            background: rgba(0,0,0,0.5);
            padding: 15px;
        }

        .thumbnail{
            border: 0px;

        }

        #about {
            background-image: url("/images/mission/background.jpg");
            color:black;
            text-align:center;
            background-color:	white;
        }


        @media screen and (min-width: 992px) {
            #about-us .about-head {
                display: flex;
                align-items: center;
            }
        }

        #about-us .verse-chapter1 {
            text-align: right;
        }

        #about-us .verse {
            text-align: center;
        }

        #about-us .values p {
            padding-bottom: 10px;
        }
        .carousel-indicators {
            top: 5%;
        }


        @media screen and (max-width: 768px) {
            #about-us .about-head {
                flex-direction: column;
            }

            #about-us .head-text {
                padding: 30px;
            }


        }
        @media screen and (max-width: 991px) {
            .carousel-indicators {
                top: 0%;
            }
            .carousel-inner{
                padding-bottom: 120px;
            }

            .carousel-caption {
                right: 0;
                left: 0;
                bottom: -120px;
                padding: 10px;
            }
            .carousel-caption h1{
                font-size: 18px;
            }
            .carousel-caption h4{
                font-size: 14px;
            }
            .carousel-caption h5{
                font-size: 10px;
            }
        }


        @media screen and (min-width: 992px) and (max-width: 1199px) {
            #about-us .verse-chapter1 {
                width: 92%;
            }

            .carousel-indicators {
                top: 2%;
            }

            .carousel-caption h1{
                font-size: 20px;
            }
            .carousel-caption h4{
                font-size: 16px;
            }
            .carousel-caption h5{
                font-size: 14px;
            }
        }

        @media screen and (min-width: 1200px) {
            #about-us .verse-chapter1 {
                width: 85%;
            }
        }
        .main_title {
            margin-top: 50px;
            margin-bottom: -20px!important;
            border: 15px solid;
            -webkit-border-image:
                -webkit-linear-gradient(left, rgba(255,255,255,1) 1%,   rgba(0,0,0,1) 50%,   rgba(255,255,255,1) 100%) 0 0 100% 0/0 0 1px 0 stretch;
        }


        /*============================
======Carousel Effect CSS=====
==============================*/

        .carousel.scale .carousel-inner > .item.left > div:nth-child(1),
        .carousel.scale .carousel-inner > .item.right > div:nth-child(1) {
            -webkit-animation: fadeOutDown 300ms linear 0ms both;
            animation: fadeOutDown 300ms linear 0ms both;
        }
        .carousel.scale .carousel-inner > .item.next > div:nth-child(1),
        .carousel.scale .carousel-inner > .item.prev > div:nth-child(1) {
            -webkit-animation: fadeInDown 300ms linear 75ms both;
            animation: fadeInDown 300ms linear 75ms both;
        }

        .carousel.scale .carousel-inner > .item.left > div:nth-child(2),
        .carousel.scale .carousel-inner > .item.right > div:nth-child(2) {
            -webkit-animation: fadeOutDown 300ms linear 75ms both;
            animation: fadeOutDown 300ms linear 75ms both;
        }
        .carousel.scale .carousel-inner > .item.next > div:nth-child(2),
        .carousel.scale .carousel-inner > .item.prev > div:nth-child(2) {
            -webkit-animation: fadeInDown 300ms linear 150ms both;
            animation: fadeInDown 300ms linear 150ms both;
        }

        .carousel.scale .carousel-inner > .item.left > div:nth-child(3),
        .carousel.scale .carousel-inner > .item.right > div:nth-child(3) {
            -webkit-animation: fadeOutDown 300ms linear 150ms both;
            animation: fadeOutDown 300ms linear 150ms both;
        }
        .carousel.scale .carousel-inner > .item.next > div:nth-child(3),
        .carousel.scale .carousel-inner > .item.prev > div:nth-child(3) {
            -webkit-animation: fadeInDown 300ms linear 225ms both;
            animation: fadeInDown 300ms linear 225ms both;
        }

        .carousel.scale .carousel-inner > .item.left > div:nth-child(4),
        .carousel.scale .carousel-inner > .item.right > div:nth-child(4) {
            -webkit-animation: fadeOutDown 300ms linear 225ms both;
            animation: fadeOutDown 300ms linear 225ms both;
        }
        .carousel.scale .carousel-inner > .item.next > div:nth-child(4),
        .carousel.scale .carousel-inner > .item.prev > div:nth-child(4) {
            -webkit-animation: fadeInDown 300ms linear 300ms both;
            animation: fadeInDown 300ms linear 300ms both;
        }


    </style>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HLZ6M"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="preloader">
    <div class="preloader-gif"></div>
</div>

@include('public.navbar')

<section id="about-us" style="margin-top:110px;">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {{--<h1 class="text-center title-shadow"><b>@lang('about.aboutTitle')</b></h1>--}}
            <h1 class="text-center red-title"><b>@lang('about.aboutTitle')</b></h1>
        </div>
    </div>
    <section id="about" class="paraxify" style="margin-top: 20px;">
        <div class="row">
            <div class=" col-sm-10 col-sm-offset-1 text-center">
                <div class="row about-head">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-md-push-4 head-text">
                        <p>@lang('about.aboutText1')</p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4 col-md-pull-4">
                        <img src="/images/logos/j&m.svg" style="width: 180px;height: 388px;">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <img src="/images/logos/latin.svg" style="width: 130px;height:  388px;">
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#about-->

    <section style="padding: 20px;"></section>

    <!-- Container (Mission) -->
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {{--<h1 class="text-center title-shadow"><b>@lang('about.aboutMission1')</b></h1>--}}
            <h1 class="text-center red-title"><b>@lang('about.aboutMission1')</b></h1>
        </div>
    </div>
    <div id="Mission" class="bg-1">
        <div class="container" style="margin-top: 20px">
            <div class="row text-center">
                <div class="col-md-2 col-md-offset-1 col-sm-4 col-xs-6">
                    <div class="thumbnail static" id="img_wrap1">
                        <img class="mission_img" id="static" src="/images/mission/mission1.png" alt="mission" width="100%" height="100%">
                        <img class="mission_img" id="animated" src="/images/mission/mission1.gif" alt="mission" width="100%" height="100%">

                        <p class="caption" style="text-align: center;"><strong>@lang('about.mission1')</strong></p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="thumbnail static" id="img_wrap2">
                        <img class="mission_img" id="static" src="/images/mission/mission2.png" alt="mission" width="100%" height="100%">
                        <img class="mission_img" id="animated" src="/images/mission/mission2.gif" alt="mission" width="100%" height="100%">
                        <p class="caption" style="text-align: center;"><strong>@lang('about.mission2')</strong></p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="thumbnail static" id="img_wrap3">
                        <img class="mission_img" id="static" src="/images/mission/mission3.png" alt="mission" width="100%" height="100%">
                        <img class="mission_img" id="animated" src="/images/mission/mission3.gif" alt="mission" width="100%" height="100%">
                        <p class="caption" style="text-align: center;"><strong>@lang('about.mission3')</strong></p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="thumbnail static" id="img_wrap4">
                        <img class="mission_img" id="static" src="/images/mission/mission4.png" alt="mission" width="100%" height="100%">
                        <img class="mission_img" id="animated" src="/images/mission/mission4.gif" alt="mission" width="100%" height="100%">
                        <p class="caption" style="text-align: center;"><strong>@lang('about.mission4')</strong></p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="thumbnail static" id="img_wrap5">
                        <img class="mission_img" id="static" src="/images/mission/mission5.png" alt="mission" width="100%" height="100%">
                        <img class="mission_img" id="animated" src="/images/mission/mission5.gif" alt="mission" width="100%" height="100%">
                        <p class="caption" style="text-align: center;"><strong>@lang('about.mission5')</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
            <p style="text-align: center">
            <br><strong>@lang('about.aboutMission2')</strong></p>
            <p class="verse"><strong><i>@lang('about.verse1')</i></strong>
            </p>
            <p class="verse-chapter1"><strong><i>@lang('about.verse2')</i></strong>
            </p>
            <br>
            <p>@lang('about.aboutText2')</p>
            <p>@lang('about.aboutText3')</p>
            <p>@lang('about.aboutText4')</p>
            <p>@lang('about.aboutText5')</p>
            <p>@lang('about.aboutText6')</p>
    </div>

</section>

<section style="padding: 20px;"></section>

<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        {{--<h1 class="text-center title-shadow"><b>@lang('about.aboutValues1')</b></h1>--}}
        <h1 class="text-center red-title"><b>@lang('about.aboutValues1')</b></h1>
    </div>
</div>

<div id="myCarousel" class="carousel slide touch-slide" data-ride="carousel" style="margin-top: 20px;">
    <ol class="carousel-indicators">
        <?php $k = 0 ?>
        @foreach($values as $value)
            <li data-target="#testimonies-carousel"
                data-slide-to="{{$k++}}"
                @if($k == 1)class="active" @endif></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        <?php $k = 0 ?>
        @foreach($values as $value)
            <div class="item @if($k++ == 0) active @endif">
                @if (session('locale') == 'fr')
                    <img src="{{$value->image_path}}" alt="{{$value->name_fr}}" style="width:100%;">
                    <div class="carousel-caption carousel-caption-bottom" >
                        <h1 class="animated fadeInDown delay text-uppercase">{{$value->name_fr}}</h1>
                        <h4 class="animated fadeInUp delay" > {{$value->description_fr}}</h4>
                        <h5><i>  {{$value->quote_fr}} </i></h5>
                        <h5 style="text-align: right; "><i> {{$value->quote_source_fr}}</i></h5>
                    </div>
                @else
                    <img src="{{$value->image_path}}" alt="{{$value->name}}" style="width:100%;">
                    <div class="carousel-caption carousel-caption-bottom" >
                        <h1 class="animated fadeInDown delay text-uppercase">{{$value->name}}</h1>
                        <h4 class="animated fadeInUp delay" > {{$value->description}}</h4>
                        <h5><i>  {{$value->quote}} </i></h5>
                        <h5 style="text-align: right; "><i> {{$value->quote_source}}</i></h5>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section style="padding: 20px;"></section>

<!-- Partners -->
<div class="row" >
    <div class="col-sm-6 col-sm-offset-3">
        {{--<h1 class="text-center title-shadow"><b>@lang('about.aboutPartners')</b></h1>--}}
        <h1 class="text-center red-title"><b>@lang('about.aboutPartners')</b></h1>
    </div>
</div>

<section>
    <div class="row centered-row" id="partners">

        <div class="col-md-4 col-xs-6 text-center centered-column-content">
            <img class="home-logos"  src="/images/logos/loeuvre.svg" id="home-loeuvre-logo">
        </div>
        <div class="col-md-4 col-xs-6 text-center centered-column-content" >
            <img class="home-logos" src="/images/logos/caritas.svg" id="home-caritas-logo">
        </div>
        <div class="col-md-4 col-xs-6 text-center centered-column-content" >
            <img class="home-logos" src="/images/logos/acn.svg" id="home-loeuvre-logo">
        </div>

        <div class="col-md-4 col-xs-6 text-center centered-column-content" >
            <img class="home-logos" src="/images/logos/hungary.svg" id="home-loeuvre-logo">
        </div>
        <div class="col-md-4 col-xs-6 text-center centered-column-content">
            <img class="home-logos" src="/images/logos/kia.svg" id="home-kia-logo">
        </div>
        <div class="col-md-4 col-xs-6 text-center centered-column-content">
            <img class="home-logos"  src="/images/logos/if.svg" id="home-salt-logo">
        </div>


        <div class="col-md-4 col-xs-6 text-center centered-column-content">
            <img class="home-logos"  src="/images/logos/missio.svg" id="home-sn-logo">
        </div>
        <div class="col-md-4 col-xs-6 text-center centered-column-content">
            <img class="home-logos" src="/images/logos/saint-nicholas.svg" id="home-sn-logo">
        </div>
        <div class="col-md-4 col-xs-6 text-center centered-column-content" >
            <img class="home-logos" src="/images/logos/manos.svg" id="home-manos-logo">
        </div>


        <div class="col-md-4 col-xs-6 text-center centered-column-content">
            <img class="home-logos" src="/images/logos/mcc.svg" id="home-sn-logo">
        </div>
        {{--<div class="col-md-4 col-xs-6 text-center centered-column-content" >--}}

        {{--</div>--}}
        <div class="col-md-4 col-xs-6 text-center centered-column-content">
            <img class="home-logos"  src="/images/logos/polish_aid.svg" style="width: inherit">
        </div>
        <div class="col-md-4 col-xs-6 text-center centered-column-content">
            <img class="home-logos"  src="/images/logos/salt.svg" id="home-salt-logo">
        </div>
    </div>
</section>

<section style="padding: 30px;"></section>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/owl.carousel.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
<script>
    $('<img/>').attr('src', '/images/mission/hope.jpg').on('load', function() {
        $(this).remove(); // prevent memory leaks
        $(".preloader").delay(1600).fadeOut("slow").remove();
    });
</script>

<script>
    myParaxify = paraxify('.paraxify');
</script>

<script>
    $(document).ready(function () {
        if ("ontouchstart" in document.documentElement) {
            $('.swipe-arrows').css('display', 'block');
            $(".touch-slide").swiperight(function () {
                $(this).carousel('prev');
            });
            $(".touch-slide").swipeleft(function () {
                $(this).carousel('next');
            });
        }
    });
</script>
<script >
    if (window.location.href.indexOf("partners") > -1) {
        var my_element = document.getElementById("partners");
        my_element.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
    };
</script>

@stack('navbar-scripts')
</body>
</html>
