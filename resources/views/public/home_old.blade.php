<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
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
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-status-bar-style" content="#fffff">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:url" content="https://hcsyria.org"/>
    <meta name="description" content="Starting with the main provider of the family to help him/her in reviving their previous jobs or giving them a chance of starting their own projects that would provide them with an income which will cover their daily needs. This is a step in rebuilding the country’s economic structure on a micro level. The youths, to prepare them to enter the work field and be creative and functional individuals.">
    <meta property="og:type" content="website"/>
    <meta name="keywords"
          content="aleppo hope center, syria hope center, hope center aleppo, hope center syria, syria micro projects, aleppo micro projects, christians micro projects"/>
    <meta property="og:title" content="Hope Center"/>
    <meta property="og:image" content="https://hcsyria.org/images/hc-logo.jpg"/>
    <meta name="author" content="judy dadaghlian">
    <title>@lang('navbar.home')</title>

    <link href='https://fonts.googleapis.com/css?family=Martel' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cabin Sketch' rel='stylesheet'>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/home_new.css" rel="stylesheet">

    <link href="/css/chart.css" rel="stylesheet">

    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/" />

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>

<body>
{{--<div class="preloader">--}}
{{--<div class="preloader-gif"></div>--}}
{{--</div>--}}
{{--<div class="preloader">--}}
    {{--<div class="preloader-gif_lebanon"></div>--}}
{{--</div>--}}

@include('public.navbar')


<section id="home_section">

    <div class="head_par">
    <span class="first_par wow animated fadeInUp delay"> @lang('main.slogan1')<br></span>
    <span class="second_par animated fadeInUp delay "> <b> @lang('main.slogan2') </b> </span>
    </div>

    <div id="second_section">
        <img id="micro_img"  src="/images/home/home003.png" alt="Hope" style="width:100%;">
        <div class="col-xs-5 micro_numbers">

            <div class="col-md-6">
                <div class="number_col" >
                    <span class="number count_int">{{$fundedCount}}</span>
                    <h2 class ="micro_paragraph animated fadeInUp delay" > @lang('main.micro1_desc')</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="number_col"  >
                    <span class="number count">{{$expandRatio}}</span><span class="number">%</span>
                    <h2 class ="micro_paragraph animated fadeInUp delay"> @lang('main.micro3_desc') </h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="number_col"  >
                    <span class="number count_int">{{$familyMembersCount}}</span>
                    <h2 class ="micro_paragraph animated fadeInUp delay"> @lang('main.micro4_desc') </h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="number_col">
                    <span class="number count">{{$newRatio}}</span><span class="number">%</span>
                    <h2 class ="micro_paragraph animated fadeInUp delay"> @lang('main.micro2_desc') </h2>
                </div>
            </div>
        </div>

    </div>



    {{--<div class="row">--}}
        {{--<div class="col-md-6">--}}
            {{--<img src="/images/home/home003.png" alt="Hope" style="width:100%;">--}}
        {{--</div>--}}
        {{--<div class="col-md-6">--}}

        {{--</div>--}}
    {{--</div>--}}





    {{--<div id="HeadCarousel" class="carousel slide" data-ride="carousel">--}}
        {{--<div class="carousel-inner">--}}
            {{--<div class="item active">--}}
                {{--<img src="/images/home/Home12.jpg" alt="Hope" style="width:100%;">--}}
                {{--<div class="carousel-caption">--}}
                    {{--<span class="first_par wow animated fadeInUp delay"> @lang('main.slogan1')<br></span>--}}
                    {{--<span class="second_par animated fadeInUp delay "> <b> @lang('main.slogan2') </b> </span>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="item">--}}
                {{--<img src="/images/home/Home13.jpg" alt="Hope" style="width:100%;">--}}
            {{--</div>--}}
            {{--</div>--}}

        {{--<!-- Left and right controls -->--}}
        {{--<a class="left carousel-control" href="#HeadCarousel" data-slide="prev">--}}
            {{--<span class="glyphicon glyphicon-chevron-left"></span>--}}
            {{--<span class="sr-only">Previous</span>--}}
        {{--</a>--}}
        {{--<a class="right carousel-control" href="#HeadCarousel" data-slide="next">--}}
            {{--<span class="glyphicon glyphicon-chevron-right"></span>--}}
            {{--<span class="sr-only">Next</span>--}}
        {{--</a>--}}
    {{--</div>--}}
    {{--<div style="margin: 50px;"></div>--}}

    {{--<div style="position:relative;" >--}}
       {{--<img src="/images/home/home2.jpg" id="whoWeServe_img" >--}}
        {{--<img src="/images/home/red_rectangle.gif" id="whoWeServe_gif" >--}}
        {{--<img src="/images/home/text_rectangle.gif" id="text_gif" style="opacity: 0.6;" >--}}

        {{--@if(app()->isLocale('fr')) <img src="/images/home/text_fr.gif" id="text_gif" >--}}
        {{--@else <img src="/images/home/text_en.gif" id="text_gif" >--}}
        {{--@endif--}}
    {{--</div>--}}
    {{--<div style="padding: 10px;"></div>--}}

    {{--<div class="row" style="padding-top: 50px">--}}
        {{--<div class="col-md-6">--}}
            {{--<img src="/images/home/h2c.jpg"  style="width: 100%">--}}
        {{--</div>--}}
        {{--<div class="col-md-6">--}}
            {{--<div class="row">--}}
                {{--<canvas id="myChart" width="100%" height="45%"></canvas>--}}
            {{--</div>--}}
            {{--<div class="row micro text-center">--}}
                {{--<div class="col-md-3 col-sm-6 col-xs-6 number_col" >--}}
                    {{--<span class="number count_int"><b>{{$fundedCount}}</b></span>--}}
                    {{--<h2 class ="micro_paragraph animated fadeInUp delay" > @lang('main.micro1_desc')</h2>--}}
                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-6 col-xs-6 number_col"  >--}}
                    {{--<span class="number count"><b>{{$newRatio}}</b></span><span class="number"><b>%</b></span>--}}
                    {{--<h2 class ="micro_paragraph animated fadeInUp delay"> @lang('main.micro2_desc') </h2>--}}
                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-6 col-xs-6 number_col"  >--}}
                    {{--<span class="number count"><b>{{$expandRatio}}</b></span><span class="number"><b>%</b></span>--}}
                    {{--<h2 class ="micro_paragraph animated fadeInUp delay"> @lang('main.micro3_desc') </h2>--}}

                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-6 col-xs-6 number_col"  >--}}
                    {{--<span class="number count_int"><b>{{$familyMembersCount}}</b></span>--}}
                    {{--<h2 class ="micro_paragraph animated fadeInUp delay"> @lang('main.micro4_desc') </h2>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div style="margin: 50px;"></div>--}}

    {{--<div class="row micro text-center">--}}

        {{--<div class="col-md-3 col-sm-6 col-xs-6 number_col"  >--}}
            {{--<span class="number count_int "><b>1349</b></span>--}}
            {{--<h2 class ="micro_paragraph animated fadeInUp delay"> @lang('main.micro1_desc') </h2>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 col-sm-6 col-xs-6 number_col"  >--}}
            {{--<span class="number count"><b>39.11</b></span><span class="number"><b>%</b></span>--}}
            {{--<h2 class ="micro_paragraph animated fadeInUp delay"> @lang('main.micro2_desc') </h2>--}}
        {{--</div>--}}
        {{--<div class="col-md-3 col-sm-6 col-xs-6 number_col"  >--}}
            {{--<span class="number count"><b>62.32</b></span><span class="number"><b>%</b></span>--}}
            {{--<h2 class ="micro_paragraph animated fadeInUp delay"> @lang('main.micro3_desc') </h2>--}}

        {{--</div>--}}
        {{--<div class="col-md-3 col-sm-6 col-xs-6 number_col"  >--}}
            {{--<span class="number count_int"><b>5013</b></span>--}}
            {{--<h2 class ="micro_paragraph animated fadeInUp delay"> @lang('main.micro4_desc') </h2>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div style="margin: 50px;"></div>--}}


    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {{--<h1 class="text-center title-shadow"><b>@lang('main.ourNextGeneration')</b></h1>--}}
            {{--<h1 class="text-center red-title"><b>@lang('main.ourNextGeneration')</b></h1>--}}
            <h1 class="text-center red-title"><b>WHO WE SERVE</b></h1>
        </div>
    </div>
    <div style="padding: 10px;"></div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="/images/home/f1.png" alt="Our Next Generation" style="width:100%;">
            </div>
            <div class="item">
                <img src="/images/home/f2.png" alt="Our Next Generation" style="width:100%;">
            </div>
            <div class="item">
                <img src="/images/home/f3.png" alt="Our Next Generation" style="width:100%;">
            </div>
            <div class="item">
                <img src="/images/home/f4.png" alt="Our Next Generation" style="width:100%;">
            </div>
            <div class="item">
                <img src="/images/home/f5.png" alt="Our Next Generation" style="width:100%;">
            </div>
            <div class="item">
                <img src="/images/home/f6.png" alt="Our Next Generation" style="width:100%;">
            </div>
            <div class="item">
                <img src="/images/home/f7.png" alt="Our Next Generation" style="width:100%;">
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

        <h3 id="child_par" class="animated fadeInLeftBig delay">
            @lang('main.ourNextGeneration_desc')
        </h3>
    </div>

    <div style="padding: 50px;"></div>

    @include('public.footer');

</section>


<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/wow.min.js"></script>
<script type="text/javascript" src="/js/swipe.index.js"></script>
<script type="text/javascript" src="/js/charts.js"></script>

<script>
    $('<img/>').attr('src', '/images/programs/what/bg-disc.jpg').on('load', function() {
        $(this).remove(); // prevent memory leaks
        // $(".preloader").delay(1600).fadeOut("slow").remove();
    });
</script>

{{--<script>--}}
    {{--$( ".preloader" ).fadeIn("fast");--}}

    {{--document.onreadystatechange = function() {--}}
        {{--if (document.readyState === "complete") {--}}
            {{--// document.querySelector("#loader").style.display = "none";--}}
            {{--setTimeout(function(){--}}
                {{--$(".preloader").fadeOut("slow", function() {--}}
                    {{--$(this).remove();--}}
                {{--});--}}
            {{--}, 9500);--}}
        {{--}--}}
    {{--};--}}
{{--</script>--}}
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
    {{--labels: ['@lang('disc.english')', '@lang('disc.icdl')','@lang('disc.employed')','@lang('disc.employed')'],--}}
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['', '','',''],
            datasets: [{
                label: '',
                data: [ {{$fundedCount}}, {{$newRatio}}, {{$expandRatio}} , {{$familyMembersCount/2}} ],
                backgroundColor: [
                    'rgba(207, 20, 43, 0.7)',
                    'rgba(207, 20, 43, 0.7)',
                    'rgba(207, 20, 43, 0.7)',
                    'rgba(207, 20, 43, 0.7)',
                ],
                borderColor: [
                    'rgba(0, 0, 0, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(0, 0, 0, 1)',
                ],
                // borderWidth: 1,
                barThickness: 80,
                maxBarThickness: 120,
            }]
        },
        options: {
            scales: {
                yAxes: [
                    {
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            display: false //this will remove only the label
                        },
                    },
                ],
                xAxes: [
                    {
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            display: false //this will remove only the label
                        },
                    },
                ],
            },
            legend: {
                display: false,
            },
            tooltips: {
                enabled: false,
                intersect: true,
            },
            // animation: {
            //     duration: 1000,
            //     onProgress: function (animation) {
            //         progress.value = animation.currentStep / animation.numSteps;
            //     },
            //     onComplete: function () {
            //         window.setTimeout(function () {
            //             progress.value = 0;
            //         }, 1000);
            //     },
            // },
        },
    });
</script>

<script>
    let q = 0;
    $(window).on("scroll", function() {
        if (($(window).scrollTop() + $(window).height() >= $(".micro").position().top) && q === 0) {
            q++;
            $('.count').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1500,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(this.Counter.toFixed(2));
                    }
                });
            });
            $('.count_int').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1500,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(this.Counter));
                    }
                });
            });
        }
    });
</script>


<script>
    new WOW().init();
</script>
@stack('navbar-scripts')
@stack('navbar-scripts-trans')

</body>
</html>
