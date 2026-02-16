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
    <meta name="description" content="@lang('disc.description')">
    <meta name="keywords" content="DISC syria, development impact support center, hope center"/>
    <title>DISC</title>

    <link href='https://fonts.googleapis.com/css?family=Love Ya Like A Sister' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Margarine' rel='stylesheet'>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <link href="/css/navbar.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">

    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/studyzone.css" rel="stylesheet">

    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/disc"/>

    <!--[if lt IE 9]>
    <script type="text/javascript" src="/js/paraxify.min.js"></script>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        #DISC {
            padding-top: 100px;
            padding-bottom: 50px;
            margin: 0 5% 0 5%;
        }

        #DISC .disc-logo {
            width: 160px;
            padding: 3px;
        }
        #DISC #loeuvre-logo {
            width: 100px;
        }
        #DISC #manos-logo{
            width: 150px;
        }

        #DISC .first-part p {
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 0px 10px 0px 10px;
            font-size: 16px;
        }
        #DISC .second-part {
            margin-top: 70px;
            padding-left: 50px;
        }

        .round_logo{
            -webkit-transition: -webkit-transform .8s ease-in-out;
            transition:         transform .8s ease-in-out;
            background-color: whitesmoke;
            opacity: 0.8;
            padding: 20px;
            margin:10px auto;
            width: 45%;
        }
        .round_logo:hover {
            transform: scale(1.05);
            opacity: 0.8;
            background-color: seashell;
        }

        #programs {
            background-image: url("../images/initiatives/DISC/B1.jpg");
        }
        .paraxify {
            background-attachment: fixed;
            background-position: center 60.56px;
            background-size: cover;
            height: 500px;
        }

        #testimonies-carousel .item {
            background: rgba(5, 59, 83, 0.8);
            color: lightgrey;
        }
        #testimonies-carousel .item small{

            color: rgba(240,240,240,0.4);
        }
        #testimonies-carousel .carousel-indicators li{
            background: #1b4b72;
        }
        #testimonies-carousel .carousel-indicators .active {
            background-color: orange !important;
        }

        @media screen and (min-width: 1367px){
            .round_logo {
                width: 300px;
            }
            #DISC .first-part p {
                font-size: 22px;
            }
            #DISC .disc-logo {
                width: 160px;
            }
            #DISC #loeuvre-logo {
                width: 100px;
            }
            #DISC #manos-logo{
                width: 200px;
            }
            #testimonies-carousel .carousel-inner {
                width: 80%!important;
            }
            #information{
                margin-top: 50px;
            }
        }

        @media screen and (min-width: 1200px) and (max-width: 1366px){
            .round_logo {
                width: 300px;
            }
            #information{
                margin-top: 50px;
            }
        }

        @media screen and (min-width: 992px) and (max-width: 1199px) {
            #DISC .disc-logo {
                width: 120px;
            }
            #DISC #loeuvre-logo {
                width: 90px;
            }
            #DISC #manos-logo{
                width: 150px;
            }

            #DISC .first-part p {
                font-size: 11px;
            }
            #DISC .second-part {
                margin-top: 35px;
            }

            .round_logo {
                width: 220px;
            }
            .paraxify{
                height: 360px;
                background-position: center 20px;
            }

            #information{
                margin-top: 50px;
            }
        }

        @media screen and (min-width: 420px) and (max-width: 991px) {
            #DISC #loeuvre-logo {
                width: 100px;
            }

            #DISC #manos-logo {
                width: 70%;
            }

            .round_logo {
                max-width: 130px;
            }

            .paraxify {
                height: 200px;
                background-position: center 20px;
            }

            #DISC .second-part {
                margin-left: 0px;
            }

            .testimonies-wrapper .carousel-inner blockquote p {
                font-size: 13px;
            }

            #information{
                margin-top: 20px;
            }
        }

        @media screen and (min-width: 420px) and (max-width: 669px) {
            #testimonies-carousel .carousel-inner {
                width: 60% !important;
            }
        }

        @media screen and (max-width: 420px){
            #DISC #loeuvre-logo {
                width: 60px;
            }

            #DISC #manos-logo {
                width: 100%;
            }
            #DISC .second-part {
                margin-top: 30px;
                padding-left: 0px;
                padding-right: 0px;
            }
            #DISC .first-part p {
                font-size: 13px;
                padding: 3px;
            }
            #DISC {
                padding-top: 50px;
                padding-bottom: 50px;
            }
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

<div id="DISC">
    <div style="padding-top: 30px"></div>
        <div class="row" >
            <div class="horizontal-margin first-part col-md-6 text-center vertical-separator">
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
            <div class="second-part col-md-6 text-center" >
                <div id="myCarousel" class="carousel slide touch-slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/images/initiatives/DISC/D4.jpg" alt="disc" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="/images/initiatives/DISC/D2.jpg" alt="disc" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="/images/initiatives/DISC/D3.jpg" alt="disc" style="width:100%;">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            </div>
        </div>
    {{--</div>--}}
</div>

<div style="padding: 15px;"></div>

<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <h2 class="text-center main_title_blue"><b>@lang('disc.our_branches')</b></h2>
    </div>
</div>

<section style="padding: 10px;"></section>
<section id="programs" class="paraxify">
    <div class="row" style="display: list-item;align-items: center">
        <div class="col-xs-12 col-sm-6">
            <a href="/projects/disc/homs" >
                <img src="/images/initiatives/DISC/h_disc.gif" class="img-responsive round_logo img-circle">
            </a>
        </div>
        <div class="col-xs-12 col-sm-6">
            <a href="/projects/disc/damascus" >
                <img src="/images/initiatives/DISC/d_disc.gif" class="img-responsive round_logo img-circle">
            </a>
        </div>
    </div>
</section><!--/#program-->

<section style="padding: 10px;"></section>

<div class="container" id="fixed-height">
    <div class="testimonies-wrapper">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                {{--<h1 class="text-center title-shadow"><b>@lang('disc.job')</b></h1>--}}
                <h1 class="text-center main_title_blue"><b>@lang('disc.job')</b></h1>
            </div>
        </div>
        <div id="testimonies-carousel" class="carousel slide animated fadeInUp wow" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $k = 0 ?>
                @foreach($testemonies as $testemony)
                    <li data-target="#testimonies-carousel"
                        data-slide-to="{{$k++}}"
                        @if($k == 1)class="active" @endif></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                <?php $k = 0 ?>
                @foreach($testemonies as $testemony)
                    <div class="item @if($k++ == 0) active @endif">
                        <div class="single-testimony">
                            <div class="media">
                                <img class="pull-left" src="{{$testemony->image_path}}" alt="" width="170px">
                                <div class="media-body">
                                    <blockquote>
                                        <h4><b>{{$testemony->$language->title}} </b></h4>
                                        <p>{{$testemony->$language->text}}</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row" id="information">

    <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1 ">
        <ul style="list-style-type:none;">
            <h3 class="orange">Homs</h3>
            <h5 class="blue">@lang('disc.workingHours_h')</h5>
            <li>
                <div class="blue col-xs-1">
                    <a href="tel:+963950018464">
                        <i class="fa fa-phone"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Tel:</b>
                </div>
                <div class="blue col-xs-9">
                    +963 9500 18 464
                </div>
            </li>
            <li>
                <div class="blue col-xs-1">
                    <a href="mailto:info-hdisc@hcsyria.org ">
                        <i class="fa fa-envelope"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Email:</b>
                </div>
                <div class="blue col-xs-9">
                    info-hdisc@hcsyria.org
                </div>
            </li>
            <li>
                <div class="blue col-xs-1">
                    <a href="https://www.google.com/maps/place/Homs%E2%80%8E,+Syria/@34.7182789,36.720437,18.75z/data=!4m5!3m4!1s0x15230ee15750463d:0xe22444f17c872127!8m2!3d34.7175968!4d36.7221162" target="_blank">
                        <i class="fa fa-map-marker"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Address:</b>
                </div>
                <div class="blue col-xs-9">
                    @lang('disc.address_h')
                </div>
            </li>
            <li>
                <div class="blue col-xs-1">
                    <a href="https://www.facebook.com/homsdisc" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Facebook:</b>
                </div>
                <div class="blue col-xs-9">
                    www.facebook.com/homsdisc
                </div>
            </li>
        </ul>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-5">
        <ul style="list-style-type:none;">
            <h3 class="orange">@lang('studyzone.Damascus')</h3>
            <h5 class="blue">@lang('disc.workingHours_d')</h5>
            <li>
                <div class="blue col-xs-1">
                    <a href="tel:+963989162117">
                        <i class="fa fa-phone"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Tel:</b>
                </div>
                <div class="blue col-xs-9">
                    +963 9891 62 117
                </div>
            </li>
            <li>
                <div class="blue col-xs-1">
                    <a href="mailto:info-ddisc@hcsyria.org">
                        <i class="fa fa-envelope"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Email:</b>
                </div>
                <div class="blue col-xs-9">
                    info-ddisc@hcsyria.org
                </div>
            </li>
            <li>
                <div class="blue col-xs-1">
                    <a href="https://www.google.com/maps/place/33%C2%B030'34.2%22N+36%C2%B018'60.0%22E/@33.5095043,36.3163738,19.75z/data=!4m5!3m4!1s0x0:0x0!8m2!3d33.50951!4d36.316664" target="_blank">
                        <i class="fa fa-map-marker"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Address:</b>
                </div>
                <div class="blue col-xs-9">
                    @lang('disc.address_d')
                </div>
            </li>
            <li>
                <div class="blue col-xs-1">
                    <a href="https://www.facebook.com/discdamascus" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Facebook:</b>
                </div>
                <div class="blue col-xs-9">
                    www.facebook.com/discdamascus
                </div>
            </li>
        </ul>
    </div>
</div>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

@stack('navbar-scripts')

    <script>
        myParaxify = paraxify('.paraxify');
    </script>

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
    let myCarousel = $("#myCarousel");
    myCarousel.on("touchstart", function(event){
        let xClick = event.originalEvent.touches[0].pageX;
        $(this).one("touchmove", function(event){
            let xMove = event.originalEvent.touches[0].pageX;
            if( Math.floor(xClick - xMove) > 5 ){
                $(this).carousel('next');
            }
            else if( Math.floor(xClick - xMove) < -5 ){
                $(this).carousel('prev');
            }
        });
        myCarousel.on("touchend", function(){
            $(this).off("touchmove");
        });
    });
</script>

</body>
</html>
