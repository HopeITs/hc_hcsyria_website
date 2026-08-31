<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $language = 'french';
        $whoCatName = 'french_name';
        $description = 'french_description';
    } else {
        $language = 'english';
        $whoCatName = 'name';
        $description = 'description';
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
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">

    <link href="/css/chart.css" rel="stylesheet">

    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
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

        #DISC .single-member img, #DISC .single-member{
            border: 0px solid #CF142B;
        }

        #DISC .disc-logo {
            width: 200px;
        }

        #DISC #loeuvre-logo {
            width: 120px;
        }

        #DISC #manos-logo {
            width: 180px;
        }

        #DISC .first-part p {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #DISC .skill_link {
            color: #fff;
        }

        #DISC  .skill_link:hover,
        .skill_link:focus,
        .skill_link:visited{
            color: #fcaa3b;
            cursor: pointer;
        }

        #DISC .main_title_blue {
            text-transform: uppercase;
            color: #285e8e;
            font-weight: 700;
        }

        #DISC #background-blue {
            position: relative;
            text-align: center;
            color: white;
        }
        #DISC #courses{
            position: absolute;
            top: 50%;
            left: 50%;
            right: -1%;
            transform: translate(-50%, -50%);
        }

        .owl-theme .owl-controls .owl-page span {
            border: solid 1px #285e8e;
            background: #fcaa3b;
        }
        .owl-theme .owl-controls .owl-page.active span {
            filter: Alpha(Opacity=100);
            opacity: 1;
            background: #285e8e;
        }
        .owl-prev i, .owl-next i {
            margin-left: -5px;
            transform : scale(1,2);
            color: #285e8e;
        }

        #background-blue  h1{
            font-size: 40px;
        }
        #background-blue  h2{
            font-size: 26px;
        }

        .main_title_white {
            font-size: 40px;
            margin-top: 10px;
            border: 15px solid;
            -webkit-border-image: -webkit-linear-gradient(left, #f7e1b5 1%, rgba(255, 255, 255, 1) 50%, #f7e1b5 100%) 0 0 100% 0/0 0 1px 0 stretch;
        }

        #successes {
            /*padding-top: 100px;*/
            background-color: #fff;
        }
        #successes .success-outer {
            cursor: pointer;
            margin-bottom: 0;
        }
        .success-outer:hover h4 {
            color: #ffffff;
        }
        .success-outer .media {
            background-color: #fff;
        }
        .success-outer .media {
            transition: all 0.7s ease 0s;
            -moz-transition: all 0.7s ease 0s;
            -webkit-transition: all 0.7s ease 0s;
            -o-transition: all 0.7s ease 0s;
        }
        #successes .media-body {
            overflow: hidden !important;
        }
        #successes .media-body img {
            width: 100%;
        }
        #successes .single-success {
            margin: 20px 0;
        }

        #successes .media-body div {
            padding: 0;
        }
        #successes #success-img img {
            width: 100%;
        }
        #successes .tile {
            margin: 25px 10px;
            -webkit-box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
            -moz-box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
        }

        #DISC .single-member {
            background-color:rgba(9, 61, 85, 0.9);
            /*color: #285e8e;*/
            color: #fff;
            padding: 25px;
            margin-left: 10px;
            margin-right: 10px;
            text-align:center;
            overflow:hidden;
            height: 480px;
        }

        .modal-content {
            color: #285e8e;
        }
        .modal-content h4{
            line-height: 1.5;
        }


        @media screen and (max-width: 668px) {
            #successes .single-success {
                margin: 40px 20px;
            }
            .big-caption {
                top: 0%;
                bottom: 0%;
            }
            #background-blue  h1 {
                font-size: 12px;
                margin: 0px;
            }
            #background-blue  h2{
                font-size: 10px;
            }
            .main_title_white {
                margin-top: -22px;
            }
            #DISC #courses{
                left: 47%;
                right: -20%;
            }
        }

        @media screen and (min-width: 669px) and (max-width: 992px) {

            .big-caption {
                top: 10%;
                bottom: 10%;
            }
            #background-blue  h1 {
                font-size: 24px;
                margin: 3px;
            }
            #background-blue  h2{
                font-size: 18px;
            }
            .main_title_white {
                margin-top: -22px;
            }
            #DISC #courses{
                left: 47%;
                right: -20%;
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
            #DISC #courses{
                left: 47%;
                right: -20%;
            }

        }

        @media screen and (max-width: 991px) {
            #DISC #loeuvre-logo {
                width: 100px;
            }

            #DISC .disc-logo {
                padding-bottom: 25px;
            }

            #DISC #manos-logo {
                width: 130px;
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

<section id="DISC">

    <div style="padding: 20px;"></div>

    <div class="row">
        <div class="col-md-6 text-center">
            <img src="{{$initiatives->logo}}" class="disc-logo">
        </div>
        <div class="col-md-4 text-center">
            <div class="row" style="display: flex;align-items: center">
                @if($initiatives->place->name === 'Damascus')
                    <div class="col-xs-6">
                        <img src="/images/logos/loeuvre.svg" id="loeuvre-logo">
                    </div>
                    <div class="col-xs-6">
                        <img src="/images/logos/manos.svg" id="manos-logo">
                    </div>
                @else
                    <div class="col-xs-6">
                        <img src="/images/logos/loeuvre.svg" id="loeuvre-logo">
                    </div>
                    <div class="col-xs-6">
                        <img src="/images/logos/manos.svg" id="manos-logo">
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div style="padding: 20px;"></div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators" style="bottom: 90%;">
            <?php $k = 0 ?>
            @foreach($initiatives->images as $image)
                <li data-target="#myCarousel-{{$initiatives->id}}"
                    data-slide-to="{{$k++}}"
                    @if($k == 1)class="active" @endif></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            <?php $k = 0 ?>
            @foreach($initiatives->images as $image)
                <div class="item @if($k++ == 0) active @endif">
                    <img src="{{substr($image->path, 0, -4).'b.jpg'}}" >
                </div>
            @endforeach
        </div><!--/.carousel-inner-->

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

    <div style="padding: 50px;"></div>

    <div id="background-blue">
        <img src="/images/initiatives/DISC/background1.png" style="width: 100%;">
        <div id="courses">
            <div class="row">
                <h1 class="animated fadeInDown delay">@lang('disc.basic')</h1>
            </div>
            <div class="row">
                <div class="col-xs-4 col-md-3 col-md-offset-2 text-center">
                    <h2><a class="skill_link"
                           data-toggle="modal"
                           data-target="#englsih">
                            @if(app()->isLocale('fr')) {!! $initiatives->courses[0]->name_french !!}
                            @else {!! $initiatives->courses[0]->name !!}
                            @endif
                        </a>
                    </h2>
                </div>
                <div class="col-xs-4 col-md-2 text-center">
                    <h2><a class="skill_link" data-toggle="modal"
                           data-target="#icdl">
                            @if(app()->isLocale('fr')) {!! $initiatives->courses[1]->name_french !!}
                            @else {!! $initiatives->courses[1]->name !!}
                            @endif
                        </a>
                    </h2>
                </div>
                <div class="col-xs-4 col-md-3 text-center">
                    <h2><a class="skill_link" data-toggle="modal"
                           data-target="#skills">
                            @if(app()->isLocale('fr')) {!! $initiatives->courses[2]->name_french !!}
                            @else {!! $initiatives->courses[2]->name !!}
                            @endif
                        </a>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="main_title_white"></h2>
                </div>
            </div>
            <div class="row">
                <h1 class="animated fadeInUp delay ">@lang('disc.special')</h1>
            </div>

            <div class="row">
                <div class="col-xs-4 col-md-3 col-md-offset-2 text-center">
                    <h2><a class="skill_link"
                           data-toggle="modal"
                           data-target="#special1">
                            @if(app()->isLocale('fr')) {!! $initiatives->courses[4]->name_french !!}
                            @else {!! $initiatives->courses[4]->name !!}
                            @endif
                        </a>
                    </h2>
                </div>
                <div class="col-xs-4 col-md-2  text-center">

                    {{--data-toggle="modal"--}}
                    {{--data-target="#special3">--}}
                </div>
                <div class="col-xs-4 col-md-3 text-center">
                    <h2><a class="skill_link"
                           data-toggle="modal"
                           data-target="#special2">
                            @if(app()->isLocale('fr')) {!! $initiatives->courses[5]->name_french !!}
                            @else {!! $initiatives->courses[5]->name !!}
                            @endif
                        </a>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="main_title_white"></h2>
                </div>
            </div>
            <div class="row">
                <h1 class="animated fadeInUp delay ">
                    <a class="skill_link"
                       data-toggle="modal"
                       data-target="#companionship">
                        @if(app()->isLocale('fr')) {!! $initiatives->courses[3]->name_french !!}
                        @else {!! $initiatives->courses[3]->name !!}
                        @endif
                    </a>
                </h1>
            </div>

        </div>
     </div>

    <div style="padding: 50px;"></div>

    <div id="statistics">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1 class="text-center main_title_blue"><b>@lang('disc.statistics')</b></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                @if($initiatives->place->name === 'Damascus')
                    <canvas id="myChart" width="400" height="400"></canvas>
                @else <canvas id="myChart_Homs" width="400" height="400"></canvas>
                @endif
            </div>
            <div class="col-sm-4 col-sm-offset-2">
                @if($initiatives->place->name === 'Damascus')
                    <canvas id="myChart2" width="400" height="400"></canvas>
                @else <canvas id="myChart2_Homs" width="400" height="400"></canvas>
                @endif
            </div>
        </div>
    </div>

    <div style="padding: 50px;"></div>

    <div id="team">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h1 class="text-center main_title_blue"><b>@lang('disc.students')</b></h1>
            </div>
        </div>

        <div class="container">
            <div class="overlay">
                <div class="container">
                    <div id="team-carousel" class=" owl-carousel owl-theme row">
                        @foreach($successes as $success)
                            <div class="item">
                                <div class="single-member">
                                    <img src="{{$success->image_path}}"
                                         alt="success" class="team-img">
                                    <h3>{!!   $success->english->title !!}</h3>
                                    <h5>{!! $success->english->text !!}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="modal fade project-detail" id="englsih"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-body">
    <button type="button" class="close" id="close-e"
    data-dismiss="modal" aria-hidden="true">
    &times;
    </button>
    <div id="modal-swipe-e">
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <img src="/images/initiatives/DISC/english.png" class="animated fadeInUp delay" style="width: 90%;">
            </div>
            <div class="col-sm-12 col-md-7" >
                <p class="blue">
                    @if(app()->isLocale('fr')) {!! $initiatives->courses[0]->description_french !!}
                    @else {!! $initiatives->courses[0]->description !!}
                    @endif
                </p>
            </div>
        </div>
    <br>
    <div class="text-center swipe-arrows">
    <i class="fa fa-angle-double-up"></i>
    <p>@lang('main.swipeUp')</p>
    </div>
    <div class="swipe-to-close"
    id="swipe-to-close-e"></div>
    </div>
    </div>
    </div>
    </div>
</div>
<div class="modal fade project-detail" id="icdl"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" id="close-e"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div id="modal-swipe-e">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/DISC/icdl.png" class="animated fadeInUp delay" style="width: 90%;">
                        </div>
                        <div class="col-sm-12 col-md-7" >
                            <p class="blue">
                                @if(app()->isLocale('fr')) {!! $initiatives->courses[1]->description_french !!}
                                @else {!! $initiatives->courses[1]->description !!}
                                @endif
                            </p>
                        </div>
                    </div>

                    <br>
                    <div class="text-center swipe-arrows">
                        <i class="fa fa-angle-double-up"></i>
                        <p>@lang('main.swipeUp')</p>
                    </div>
                    <div class="swipe-to-close"
                         id="swipe-to-close-e"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade project-detail" id="skills"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" id="close-e"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div id="modal-swipe-e">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/DISC/skills.png" class="animated fadeInUp delay" style="width: 90%;">
                        </div>
                        <div class="col-sm-12 col-md-7" >
                            <p class="blue">
                                @if(app()->isLocale('fr')) {!! $initiatives->courses[2]->description_french !!}
                                @else {!! $initiatives->courses[2]->description !!}
                                @endif
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="text-center swipe-arrows">
                        <i class="fa fa-angle-double-up"></i>
                        <p>@lang('main.swipeUp')</p>
                    </div>
                    <div class="swipe-to-close"
                         id="swipe-to-close-e"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade project-detail" id="companionship"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" id="close-e"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div id="modal-swipe-e">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/DISC/companianship.png" class="animated fadeInUp delay" style="width: 90%;">
                        </div>
                        <div class="col-sm-12 col-md-7" >
                            <p class="blue">
                                @if(app()->isLocale('fr')) {!! $initiatives->courses[3]->description_french !!}
                                @else {!! $initiatives->courses[3]->description !!}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="text-center swipe-arrows">
                        <i class="fa fa-angle-double-up"></i>
                        <p>@lang('main.swipeUp')</p>
                    </div>
                    <div class="swipe-to-close"
                         id="swipe-to-close-e"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade project-detail" id="special1"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" id="close-e"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div id="modal-swipe-e">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/DISC/special.png" class="animated fadeInUp delay" style="width: 90%;">
                        </div>
                        <div class="col-sm-12 col-md-7" >
                            <h4 class="blue">
                                @if(app()->isLocale('fr')) {!! $initiatives->courses[4]->description_french !!}
                                @else {!! $initiatives->courses[4]->description !!}
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="text-center swipe-arrows">
                        <i class="fa fa-angle-double-up"></i>
                        <p>@lang('main.swipeUp')</p>
                    </div>
                    <div class="swipe-to-close"
                         id="swipe-to-close-e"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade project-detail" id="special2"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" id="close-e"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div id="modal-swipe-e">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/DISC/special.png" class="animated fadeInUp delay" style="width: 90%;">
                        </div>
                        <div class="col-sm-12 col-md-7" >
                            <h4 class="blue">
                                @if(app()->isLocale('fr')) {!! $initiatives->courses[5]->description_french !!}
                                @else {!! $initiatives->courses[5]->description !!}
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="text-center swipe-arrows">
                        <i class="fa fa-angle-double-up"></i>
                        <p>@lang('main.swipeUp')</p>
                    </div>
                    <div class="swipe-to-close"
                         id="swipe-to-close-e"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade project-detail" id="special3"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" id="close-e"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div id="modal-swipe-e">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/DISC/special.png" class="animated fadeInUp delay" style="width: 90%;">
                        </div>
                        <div class="col-sm-12 col-md-7" >
                            <h4 class="blue">
                            </h4>
                        </div>
                    </div>
                    <div class="text-center swipe-arrows">
                        <i class="fa fa-angle-double-up"></i>
                        <p>@lang('main.swipeUp')</p>
                    </div>
                    <div class="swipe-to-close"
                         id="swipe-to-close-e"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/charts.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['@lang('disc.english')', '@lang('disc.icdl')','@lang('disc.employed')'],
            datasets: [{
                label: '',
                data: [87.84, 96.22, 32.5],
                backgroundColor: [
                    'rgba(9, 61, 85, 0.9)',
                    'rgba(9, 61, 85, 0.9)',
                    'rgba(248, 156, 33, 1)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            min: 0,
                            max: 100, //this.max,// Your absolute max value
                            callback: function (value) {
                                return (value / this.max * 100).toFixed(0) + '%'; // convert it to percentage
                            },
                        },
                        scaleLabel: {
                            display: true,
                            labelString: '@lang('disc.percentage')',
                        },
                    },
                ],
                xAxes: [
                    {
                        scaleLabel: {
                            display: true,
                            labelString: '@lang('disc.statistics_label')',
                        },
                    },
                ],
            },
        }
    });

    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart2 = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['DISC 1','DISC 2','DISC 3','DISC 4'],
            datasets: [{
                label: ' ',
                data: [35, 37,42, 45],
                backgroundColor: [
                    'rgba(9, 61, 85, 1)',
                    'rgba(248, 156, 33, 1)',
                    'rgba(148, 148, 148, 1)',
                    'rgba(100, 100, 100, 1)',
                ],
                borderColor: [
                    'rgba(9, 61, 85, 1)',
                    'rgba(9, 61, 85, 1)',
                    'rgba(9, 61, 85, 1)',
                    'rgba(9, 61, 85, 1)',
                ],
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display:false
                    },
                    ticks: {
                        display: false //this will remove only the label
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display:false
                    },
                    ticks: {
                        display: false //this will remove only the label
                    }
                }]
            },
            legend: {
                display: true,
                position: 'top',
                align: 'center',
            },
            tooltips: {
                intersect: true,
            }
        },
    });
</script>
<script>
    var ctx_h = document.getElementById('myChart_Homs').getContext('2d');
    var myChart_Homs = new Chart(ctx_h, {
        type: 'bar',
        data: {
            labels: ['@lang('disc.english')', '@lang('disc.icdl')', '@lang('disc.employed')'],
            datasets: [{
                label: '',
                data: [43.31, 57.9, 49.77 , 37 ],
                backgroundColor: [
                    'rgba(9, 61, 85, 0.9)',
                    'rgba(9, 61, 85, 0.9)',
                    'rgba(248, 156, 33, 1)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            min: 0,
                            max: 100, //this.max,// Your absolute max value
                            callback: function (value) {
                                return (value / this.max * 100).toFixed(0) + '%'; // convert it to percentage
                            },
                        },
                        scaleLabel: {
                            display: true,
                            labelString: '@lang('disc.Percentage')',
                        },
                    },
                ],
                xAxes: [
                    {
                        scaleLabel: {
                            display: true,
                            labelString: '@lang('disc.statistics_label')',
                        },
                    },
                ],
            },
        }
    });

    var ctx_h = document.getElementById('myChart2_Homs').getContext('2d');
    var myChart2_Homs = new Chart(ctx_h, {
        type: 'doughnut',
        data: {
            labels: ['DISC 1','DISC 2','DISC 3','DISC 4','DISC 5'],
            datasets: [{
                label: ' ',
                data: [32, 35, 35, 33,38],
                backgroundColor: [
                    'rgba(9, 61, 85, 1)',
                    'rgba(248, 156, 33, 1)',
                    'rgba(148, 148, 148, 1)',
                    'rgba(100, 100, 100, 1)',
                ],
                borderColor: [
                    'rgba(9, 61, 85, 1)',
                    'rgba(9, 61, 85, 1)',
                    'rgba(9, 61, 85, 1)',
                    'rgba(9, 61, 85, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display:false
                    },
                    ticks: {
                        display: false //this will remove only the label
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display:false
                    },
                    ticks: {
                        display: false //this will remove only the label
                    }
                }]
            },
            legend: {
                display: true,
                position: 'top',
                align: 'center',
            }
        }
    });
</script>

<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/owl.carousel.js"></script>
<script type="text/javascript" src="/js/chart.js"></script>
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
        $("#team-carousel").owlCarousel({
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
            ],
        });
    });
</script>

@stack('navbar-scripts')
</body>
</html>
