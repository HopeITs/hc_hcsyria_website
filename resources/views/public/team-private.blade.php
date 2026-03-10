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
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M9HLZ6M');
    </script>
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
    <title>HC Team</title>
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

@include('public.navbar')
<section id="our_team">
    <div id="team">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1 class="text-center red-title"><b>@lang('about.teamTitle')</b></h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <h3 class="text-center main_title">@lang('about.hopeTeam')</h3>
                </div>
            </div>
            <div class="overlay">
                <div class="container">
                    <div id="team-carousel" class=" owl-carousel owl-theme row teamCarousel">
                        @foreach($profilesHope as $profile)
                            <div class="item">
                                <div class="single-member">
                                    <img src="{{$profile->image_path}}"
                                         alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                                    <h3>{{$profile->first_name}} <br> <span>{{$profile->last_name}}</span></h3>
                                    <h5>
                                        @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                        @else {!! $profile->position !!}
                                        @endif
                                    </h5>
                                    <div class="socials">
                                        <a href="mailto:{{$profile->email}}@hcsyria.org"><i class="fa fa-envelope"></i></a>
                                        @if($profile->facebook_link != '0')
                                            <a href="https://www.facebook.com/{{$profile->facebook_link}}" target="_blank"><i
                                                        class="fa fa-facebook"></i></a>
                                        @endif
                                        @if($profile->linkedin_link != '0')
                                            <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                               target="_blank"><i
                                                        class="fa fa-linkedin"></i></a>
                                        @endif
                                        <a href="tel:{{$profile->phone}}"><i class="fa fa-phone"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <h3 class="text-center main_title">@lang('about.hope_homsTeam')</h3>
                </div>
            </div>

            <div class="overlay">
                <div class="container">
                    <div id="hope-homs-team-carousel" class=" owl-carousel owl-theme row teamCarousel">
                        @foreach($profilesHope_Homs as $profile)
                            <div class="item">
                                <div class="single-member">
                                    <img src="{{$profile->image_path}}"
                                         alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                                    <h3>{{$profile->first_name}} <br> <span>{{$profile->last_name}}</span></h3>
                                    <h5>
                                        @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                        @else {!! $profile->position !!}
                                        @endif
                                    </h5>
                                    <div class="socials">
                                        <a href="mailto:{{$profile->email}}@hcsyria.org"><i class="fa fa-envelope"></i></a>
                                        @if($profile->facebook_link != '0')
                                            <a href="https://www.facebook.com/{{$profile->facebook_link}}" target="_blank"><i
                                                        class="fa fa-facebook"></i></a>
                                        @endif
                                        @if($profile->linkedin_link != '0')
                                            <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                               target="_blank"><i
                                                        class="fa fa-linkedin"></i></a>
                                        @endif
                                        <a href="tel:{{$profile->phone}}"><i class="fa fa-phone"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <h3 class="text-center main_title">@lang('about.hope_damascusTeam')</h3>
                </div>
            </div>

            <div class="overlay">
                <div class="container">
                    <div id="hope-damascus-team-carousel" class=" owl-carousel owl-theme row teamCarousel">
                        @foreach($profilesHope_Damascus as $profile)
                            <div class="item">
                                <div class="single-member">
                                    <img src="{{$profile->image_path}}"
                                         alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                                    <h3>{{$profile->first_name}} <br> <span>{{$profile->last_name}}</span></h3>
                                    <h5>
                                        @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                        @else {!! $profile->position !!}
                                        @endif
                                    </h5>
                                    <div class="socials">
                                        <a href="mailto:{{$profile->email}}@hcsyria.org"><i class="fa fa-envelope"></i></a>
                                        @if($profile->facebook_link != '0')
                                            <a href="https://www.facebook.com/{{$profile->facebook_link}}" target="_blank"><i
                                                        class="fa fa-facebook"></i></a>
                                        @endif
                                        @if($profile->linkedin_link != '0')
                                            <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                               target="_blank"><i
                                                        class="fa fa-linkedin"></i></a>
                                        @endif
                                        <a href="tel:{{$profile->phone}}"><i class="fa fa-phone"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <h3 class="text-center main_title">@lang('about.disc_homsTeam')</h3>
                </div>
            </div>
            <br>
            <div class="overlay">
                <div class="container">
                    <div id="disc-team-carousel" class=" owl-carousel owl-theme row teamCarousel">
                        @foreach($profiles_disc as $profile)
                            <div class="item">
                                <div class="single-member">
                                    <img src="{{$profile->image_path}}"
                                         alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                                    <h3>{{$profile->first_name}} <br> <span>{{$profile->last_name}}</span></h3>
                                    <h5>
                                        @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                        @else {!! $profile->position !!}
                                        @endif
                                    </h5>
                                    <div class="socials">
                                        <a href="mailto:{{$profile->email}}@hcsyria.org"><i class="fa fa-envelope"></i></a>
                                        @if($profile->facebook_link != '0')
                                            <a href="https://www.facebook.com/{{$profile->facebook_link}}" target="_blank"><i
                                                        class="fa fa-facebook"></i></a>
                                        @endif
                                        @if($profile->linkedin_link != '0')
                                            <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                               target="_blank"><i
                                                        class="fa fa-linkedin"></i></a>
                                        @endif
                                        <a href="tel:{{$profile->phone}}"><i class="fa fa-phone"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <h3 class="text-center main_title">@lang('about.study_homsTeam')</h3>
                </div>
            </div>
            <br>
            <div class="overlay">
                <div class="container">
                    <div id="study-team-carousel" class=" owl-carousel owl-theme row teamCarousel">
                        @foreach($profiles_study as $profile)
                            <div class="item">
                                <div class="single-member">
                                    <img src="{{$profile->image_path}}"
                                         alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                                    <h3>{{$profile->first_name}} <br> <span>{{$profile->last_name}}</span></h3>
                                    <h5>
                                        @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                        @else {!! $profile->position !!}
                                        @endif
                                    </h5>
                                    <div class="socials">
                                        <a href="mailto:{{$profile->email}}@hcsyria.org"><i class="fa fa-envelope"></i></a>
                                        @if($profile->facebook_link != '0')
                                            <a href="https://www.facebook.com/{{$profile->facebook_link}}" target="_blank"><i
                                                        class="fa fa-facebook"></i></a>
                                        @endif
                                        @if($profile->linkedin_link != '0')
                                            <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                               target="_blank"><i
                                                        class="fa fa-linkedin"></i></a>
                                        @endif
                                        <a href="tel:{{$profile->phone}}"><i class="fa fa-phone"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <h3 class="text-center main_title">@lang('about.childrenTeam')</h3>
                </div>
            </div>
            <br>
            <div class="overlay">
                <div class="container">
                    <div id="children-team-carousel" class=" owl-carousel owl-theme row teamCarousel">
                        @foreach($profiles_children as $profile)
                            <div class="item">
                                <div class="single-member">
                                    <img src="{{$profile->image_path}}"
                                         alt="{{$profile->first_name}} {{$profile->last_name}}" class="img-circle">
                                    <h3>{{$profile->first_name}} <br> <span>{{$profile->last_name}}</span></h3>
                                    <h5>
                                        @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                        @else {!! $profile->position !!}
                                        @endif
                                    </h5>
                                    <div class="socials">
                                        <a href="mailto:{{$profile->email}}@hcsyria.org"><i class="fa fa-envelope"></i></a>
                                        @if($profile->facebook_link != '0')
                                            <a href="https://www.facebook.com/{{$profile->facebook_link}}" target="_blank"><i
                                                        class="fa fa-facebook"></i></a>
                                        @endif
                                        @if($profile->linkedin_link != '0')
                                            <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                               target="_blank"><i
                                                        class="fa fa-linkedin"></i></a>
                                        @endif
                                        <a href="tel:{{$profile->phone}}"><i class="fa fa-phone"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
        $("#hope-damascus-team-carousel").owlCarousel({
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
        $("#disc-team-carousel").owlCarousel({
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
        $("#study-team-carousel").owlCarousel({
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
        $("#children-team-carousel").owlCarousel({
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
