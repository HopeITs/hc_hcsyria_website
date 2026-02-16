<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $language = 'french';
        $whatCatName = 'french_name';
        $donorName = 'french_name';
    } else {
        $language = 'english';
        $whatCatName = 'name';
        $donorName = 'name';
    }
@endphp
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129097809-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129097809-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta property="fb:app_id" content="2133577546862306"/>

    <title>@lang('navbar.home')</title>

    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.js"></script>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">

    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/home_new.css" rel="stylesheet">

    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/" />

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bgimg {
            background-image: url('/images/home/soon-lb.jpg');
            height: 100%;
            background-position: center;
            background-size: cover;
            position: relative;
            color: white;
            font-family: "Courier New", Courier, monospace;
            font-size: 25px;
        }

        @media screen and (max-device-width: 767px)
        {
            .bgimg {
                background-image: url('/images/home/soon-lb-small.jpg');
                height: 100%;
                background-position: center;
                background-size: cover;
                position: relative;
                color: white;
                font-family: "Courier New", Courier, monospace;
                font-size: 25px;
            }
        }
        @media screen and (max-width: 991px) and (min-width: 768px){
            .bgimg {
                background-image: url('/images/home/soon-lb.jpg');
                height: 100%;
                background-position: center;
                background-size: cover;
                position: relative;
                color: white;
                font-family: "Courier New", Courier, monospace;
                font-size: 25px;
            }
        }
        @media screen and (max-width: 1024px) and (min-width: 992px){
            .bgimg {
                background-image: url('/images/home/soon-lb.jpg');
                height: 100%;
                background-position: center;
                background-size: cover;
                position: relative;
                color: white;
                font-family: "Courier New", Courier, monospace;
                font-size: 25px;
            }
        }

        /*.topleft {*/
        /*position: absolute;*/
        /*top: 0;*/
        /*left: 16px;*/
        /*}*/

        /*.bottomleft {*/
        /*position: absolute;*/
        /*bottom: 0;*/
        /*left: 16px;*/
        /*}*/

        .middle {
            position: absolute;
            top: 50%;
            left: 77%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        hr {
            margin: auto;
            width: 100%;
        }
    </style>
</head>

<body>

<div class="bgimg">

</div>



{{--@include('public.navbar')--}}

{{--<div class="head_par">--}}
    {{--<span class="first_par">COMING SOON <hr></span>--}}
    {{--<span class="second_par" id="demo"></span>--}}
{{--</div>--}}

{{--<div class="bgimg">--}}
    {{--<div class="topleft">--}}
        {{--<p>Logo</p>--}}
    {{--</div>--}}
    {{--<div class="first_par">--}}
        {{--<h1>COMING SOON</h1>--}}
        {{--<hr>--}}
        {{--<br>--}}
        {{--<p>35 days left</p>--}}
        {{--<p id="demo"></p>--}}
    {{--</div>--}}
    {{--<div class="bottomleft">--}}
        {{--<p>Some text</p>--}}
    {{--</div>--}}
{{--</div>--}}

{{--@include('public.footer')--}}

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Nov 1, 2021 12:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

@stack('navbar-scripts')
@stack('navbar-scripts-trans')

</body>
</html>
