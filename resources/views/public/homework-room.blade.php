<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $language = 'french';
        $whatCatName = 'french_name';
        $description = 'french_description';
    } else {
        $language = 'english';
        $whatCatName = 'name';
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
    <meta name="description" content="@lang('what_we_do.homeworkDesc')">
    <meta name="keywords" content="aleppo syria, hope, center, homework room"/>
    <title>@lang('what_we_do.homework')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/homework.css" rel="stylesheet">

    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/homework-room"/>

    <link href='https://fonts.googleapis.com/css?family=Love Ya Like A Sister' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Margarine' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Rock Salt' rel='stylesheet'>

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


<div class="preloader">
    <div class="preloader-gif"></div>
</div>

@include('public.navbar')

<div id="Homework">
    <div class="container text-center animated fadeInUp delay" style="margin-top: -20px;">
        <img src="/images/initiatives/Homework Room/homework.gif" style="width: 70%">
    </div>

    <div class="row">
        <div class="first-part col-sm-12 col-md-5 text-center vertical-separator">
            <p class="text-left p-justify">@lang('what_we_do.homeworkDesc')</p>
            <img src="/images/logos/saint-nicholas.svg" id="sn-logo">
        </div>
        <div class="second-part col-sm-12 col-md-7 text-center" >

                <div class="video" >
                    <iframe src="https://www.youtube.com/embed/2eg1dNTKBJU" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>

        </div>
    </div>
    <div style="padding-top: 40px;"></div>

    <div id="fixed-height" >
        <div class="container" >
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
                                    <img class="pull-right" src="{{$testemony->image_path}}" alt="" >
                                    <div class="media-body">
                                        <blockquote>
                                            <h4 class="blue"><b>{{$testemony->$language->title}} </b></h4>
                                            <br>
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

    <div style="margin-top: 40px;"></div>

        <div class="row">
        <div class="col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <h1 class="text-center activity-title orange"><b>@lang('studyzone.activities')</b></h1>
        </div>
        </div>

        <div class="Activities">
            <div class="overlay">
                <div class="">
                    <div id="homework-carousel" class="owl-carousel owl-theme row">
                        @for($i = 0; $i<count($initiatives); $i++)
                            <div class="item single-member" id="first-item">
                                <h3>{{$initiatives[$i]->$language->title}}</h3>
                                @if(strlen($initiatives[$i]->$language->title)<30)
                                    <br>
                                @endif

                                <div style="padding-left: 5%;padding-right: 0;">
                                    <h5 class="orange">{{$initiatives[$i]->$language->date_string}}</h5>
                                    <img src="{{$initiatives[$i]->ImagesRandom[0]['path']}}"  alt="success" class="team-img">
                                    @if(strlen($initiatives[$i]->$language->description)>100)
                                        <p>{{substr($initiatives[$i]->$language->description,0,74).'...'}}</p>
                                    @else
                                        <p>{{$initiatives[$i]->$language->description.'...'}}</p>
                                    @endif
                                    <a href="{{ route('public.initiative'
                                    ,[str_slug(strtolower($whatCategory->name)),$initiatives[$i]->id
                                    ,str_slug(strtolower($initiatives[$i]->english->title))]   ) }}"
                                    class="home_readMore orange">@lang('main.readMore')</a>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>


    <div id="information">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-md-offset-2 ">
                <div class="row  text-center">
                    <div id="home_map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1609.4354385485603!2d37.15637785814722!3d36.21833329501806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDEzJzA2LjAiTiAzN8KwMDknMjYuOSJF!5e0!3m2!1sen!2s!4v1611666933560!5m2!1sen!2s"
                                width="300" height="300" frameborder="0" style="border:0;"
                                allowfullscreen="" aria-hidden="false" tabindex="0">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 ">
                <div class="row">
                    <div class="contact_box">
                        <p class="contact-title"><span class="orange">Homework Room </span> | @lang('about.contactAleppo')</p>
                        <p class="contact-address1">@lang('about.homework_address') </p>
                        <br>
                        <p class="email"><small>Instagram: <a href="https://www.instagram.com/homework.room/" id="info-link" class="orange">https://www.instagram.com/homework.room/</a></small></p>
                        <p class="email"><small>Facebook: <a href="https://www.facebook.com/hwroom" id="info-link" class="orange">https://www.facebook.com/hwroom</a></small></p>
                        <p class="email"><small>Email: <a href="mailto:info@hcsyria.org" id="info-link" class="orange">info@hcsyria.org</a></small></p>
                        <p class="email"><small>@lang('about.tel'): <a href="tel:+963993310233" id="info-link" class="orange">+963 99 33 10 233</a></small></p>
                        <br>
                        <p class="email"><small>@lang('about.homework_workingHours')</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="container">--}}
        {{--<div class="raw horizontal-margin">--}}
            {{--<div class="post">--}}
                {{--@foreach($initiatives as $i=>$initiative)--}}
                    {{--<div class="container single-project org-post">--}}
                        {{--<div class="col-sm-3 ini-img">--}}
                            {{--<div class="carousel slide" data-ride="carousel">--}}
                                {{--<div class="carousel-inner">--}}
                                    {{--<div class="item active"><img src="{{$initiative->ImagesRandom[0]['path']}}"></div>--}}
                                    {{--<div class="item"><img src="{{$initiative->ImagesRandom[1]['path']}}"></div>--}}
                                    {{--@if(count($initiative->ImagesRandom) > 2)--}}
                                        {{--<div class="item"><img src="{{$initiative->ImagesRandom[2]['path']}}"></div>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-9 ini-content">--}}
                            {{--@if($initiative->video !== '0')--}}
                                {{--<a class="video-ico"><i class="fa fa-video-camera"></i></a>--}}
                            {{--@endif--}}
                            {{--<h2>{{$initiative->$language->title}}</h2>--}}
                            {{--@if($initiative->$language->date_string !== '0')--}}
                                {{--<h6>{{$initiative->$language->date_string}}--}}
                                    {{--@endif--}}
                                    {{--@if($initiative->$language->organization !== '0')--}}
                                        {{--@lang('initiatives.by') {{$initiative->$language->organization}}--}}
                                    {{--@endif--}}
                                {{--</h6>--}}
                                {{--<p>{{$initiative->$language->description}}</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

</div>
@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/owl.carousel.js"></script>

<script>
    $(window).on('load', function(){
        setTimeout(removeLoader, 1000); //wait for page load PLUS two seconds.
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
        $("#homework-carousel").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            autoHeight: true,
            itemsCustom: [
                [0, 1],
                [400, 1],
                [600, 1],
                [700, 1.5],
                [1000, 2],
                [1200, 3],
            ],
        });
    });
</script>

@stack('navbar-scripts')

</body>
</html>
