<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <meta name="theme-color" content="#fffff">
    <meta name="apple-mobile-web-app-status-bar-style" content="#fffff">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:url" content="https://hcsyria.org"/>
    <meta name="description" content="HOPE CENTER is an ecumenical organization, established at the beginning of 2018 under the guidance of Archbishop George Abo-Khazen of the Latin church in Syria and supervised by the Sisters of Jesus and Mary.">
    <meta property="og:type" content="website"/>
    <meta name="keywords"
          content="aleppo hope center, syria hope center"/>
    <meta property="og:title" content="Hope Center"/>
    <meta property="og:image" content="https://hcsyria.org/images/hc-logo.jpg"/>
    <meta name="description" content="HOPE CENTER is an ecumenical organization, established at the beginning of 2018 under the guidance of Archbishop George Abo-Khazen of the Latin church in Syria and supervised by the Sisters of Jesus and Mary.">
    <meta name="author" content="judy dadaghlian">
    <title>@lang('navbar.contactUs')</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/contact" />

    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HLZ6M"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@include('public.navbar')

<div id="contact" class="paraxify">
    <div class="container">

        <div class="row">
            <div class="col-12" style="padding:0 15px 0 15px;">
                <div class="contact_box">
                    <p class="contact-title"><span id="title-hope">Hope Center </span> | @lang('about.contactAleppo')</p>
                    <p class="contact-subTitle">@lang('about.hopeAddressTitle')</p>
                    <p class="contact-address1">@lang('about.address')
                        <a href="https://www.google.com/maps/place/36%C2%B013'01.2%22N+37%C2%B009'14.6%22E/@36.2169084,37.1533868,18.25z/data=!4m5!3m4!1s0x0:0x0!8m2!3d36.2170018!4d37.1540679?hl=en" target="_blank">
                            <i class="fa fa-map-marker"></i>
                        </a>
                    </p>
                    <br>
                    <p class="email"><small>Email: <a href="mailto:info@hcsyria.org" id="info-link">info@hcsyria.org</a></small></p>
                    <p class="email"><small>@lang('about.tel'): <a href="tel:+963993310227" id="info-link">+963 993 310 227</a></small></p>
                    <p class="email"><small>@lang('about.workingHours')</small></p>
                </div>
            </div>
        </div>
    <div class="row" >
        <div class="col-md-6 col-sm-12">

            <div class="contact_box " >
                <p class="contact-title"><span id="title-hope">Hope Center </span> | Homs </p>
                <p class="contact-address1">@lang('about.address_h')
                    <a href="https://www.google.com/maps/place/34%C2%B043'56.9%22N+36%C2%B043'07.2%22E/@34.7325406,36.7184115,19z/data=!4m5!3m4!1s0x0:0x0!8m2!3d34.732469!4d36.718669" target="_blank">
                        <i class="fa fa-map-marker"></i>
                    </a>
                </p>
                <br>
                <p class="email"><small>Email: <a href="mailto:info@hcsyria.org" id="info-link">info@hcsyria.org</a></small></p>
                <p class="email"><small>@lang('about.tel'): <a href="tel:+963950018430" id="info-link">+963 950 018 430</a></small></p>
                <p class="email"><small>@lang('about.workingHours')</small></p>
        </div>
        </div>

        <div class="col-md-6 col-sm-12">
            <div class="contact_box ">
                <p class="contact-title"><span id="title-hope">Hope Center </span> | @lang('about.contactDamascus') </p>
                <p class="contact-address1">@lang('about.address_d')
                    <a href="https://www.google.com/maps/place/33%C2%B030'38.4%22N+36%C2%B018'60.0%22E/@33.5107083,36.3164944,17.88z/data=!4m5!3m4!1s0x0:0xb7b7dc446ddf0cfc!8m2!3d33.510666!4d36.316655" target="_blank">
                        <i class="fa fa-map-marker"></i>
                    </a>
                </p>
                <br>
                <p class="email"><small>Email: <a href="mailto:info@hcsyria.org" id="info-link">info@hcsyria.org</a></small></p>
                <p class="email"><small>@lang('about.tel'): <a href="tel:+963989162108" id="info-link">+963 989 162 108</a></small></p>
                <p class="email"><small>@lang('about.workingHours')</small></p>
        </div>
        </div>
    </div>


        <div class="contact_box2">
            <p class="visitProjects-title">@lang('about.visitProjects')</p>
        </div>
        <div class="visitProjects">
            <div class="col-xs-4 vcenter">
                <a href="{{route('public.family2family')}}">
                    <img class="f2fLogo" src="/images/logos/family.svg" alt="Family to family">
                </a>
            </div>
            <div class="col-xs-4 vcenter" >
                <a href="{{route('public.micro_project2')}}">
                    <img class="discLogo" src="/images/logos/micro.svg" alt="Micro Projects">
                </a>
            </div>
            <div class="col-xs-4 vcenter">
                <a href="{{route('public.school2school')}}">
                    <img class="f2fLogo" src="/images/logos/school.svg" alt="School to school">
                </a>
            </div>
        </div>
        <br>
        <div class="visitProjects">
            <div class="col-xs-4 vcenter" >
                <a href="{{route('public.studyzone2')}}">
                    <img class="studyLogo" src="/images/logos/study.svg" alt="Study Zone">
                </a>
            </div>
            <div class="col-xs-4 vcenter">
                <a href="{{route('public.disc_home')}}">
                    <img class="discLogo" src="/images/logos/disc.svg" alt="DISC">
                </a>
            </div>
            <div class="col-xs-4 vcenter">
                <a href="{{route('public.children')}}">
                    <img class="studyLogo" src="/images/logos/cu.svg" alt="Children">
                </a>
            </div>
        </div>

    </div>
</div> <!--/#contact-->
@include('public.footer')



    {{--@lang('main.address')--}}

                                               {{--target="_blank"><i--}}


                                               {{--target="_blank"><i--}}

                                               {{--target="_blank"><i--}}


<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/map.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYwdnorzegPi49kyQngxrguVMAw9iFKJU&callback=initMap">
</script>

<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/owl.carousel.js"></script>
<script type="text/javascript" src="/js/paraxify.min.js"></script>
<script>
    jQuery(document).ready(function () {
        $("#team-carousel").owlCarousel(
        {
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            autoHeight: true,
            itemsCustom: [
                [0, 1],
                [400, 1],
                [600, 2],
                [700, 2],
                [1000, 3],
                [1200, 4],
                [1400, 4],
                [1600, 4]
            ],
        });
        $("#hope-homs-team-carousel").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            autoHeight: true,
            itemsCustom: [
                [0, 1],
                [400, 1],
                [600, 2],
                [700, 2],
                [1000, 3],
                [1200, 4],
                [1400, 4],
                [1600, 4]
            ],
        });
        $("#homs-team-carousel").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            autoHeight: true,
            itemsCustom: [
                [0, 1],
                [400, 1],
                [600, 2],
                [700, 2],
                [1000, 3],
                [1200, 4],
                [1400, 4],
                [1600, 4]
            ],
        });
    });
</script>
<script>
    myParaxify = paraxify('.paraxify');
</script>
@stack('navbar-scripts')

</body>
</html>
