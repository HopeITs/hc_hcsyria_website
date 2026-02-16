<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $language = 'french';
        $whatCatName = 'french_name';
        $position = 'french_position';
    } else {
        $language = 'english';
        $whatCatName = 'name';
        $position = 'position';
    }
@endphp
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168141177-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-168141177-1');
    </script>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-M9HLZ6M');</script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#fff">
    <meta name="description" content="@lang('studyzone.description')">
    <meta name="keywords" content="study zone , syria, hope center"/>
    <title>@lang('what_we_do.study')</title>

    <link href='https://fonts.googleapis.com/css?family=Love Ya Like A Sister' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Margarine' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Caveat' rel='stylesheet'>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/studyzone.css" rel="stylesheet">

    <link href="/css/initiatives.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/study-zone"/>

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin=''/>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HLZ6M"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="preloader">
    <div class="preloader-gif"></div>
</div>


@include('public.navbar')

<section id="StudyZone">
    {{--<div class="navigate">--}}
    {{--<div class="container">--}}
    {{--<ol class="breadcrumb">--}}
    {{--<li><a href="/">@lang('navbar.home')</a></li>--}}
    {{--<li><a href="{{route('public.main_projects')}}">@lang('what_we_do.title')</a></li>--}}
    {{--<li><a href="{{route('public.initiatives.type', 'development')}}">@lang('what_we_do.development')</a></li>--}}
    {{--<li class="active">@lang('what_we_do.study')</li>--}}
    {{--</ol>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--class=" container"--}}
    <div class="row">
        <div class="horizontal-margin first-part col-md-4 text-center vertical-separator">
            <img src="/images/logos/study.svg" class="study-logo">
            <p class="text-left p-justify">@lang('studyzone.description')</p>
            <img src="/images/logos/loeuvre.svg" id="loeuvre-logo">
        </div>
        <div class="second-part col-md-8 text-center">
            @if(app()->isLocale('fr'))
                <img src="/images/initiatives/Study Zone/study_fr.png" id="study-gif">
            @else <img src="/images/initiatives/Study Zone/study_en.png" id="study-gif">
            @endif
        </div>
    </div>

    <div style="padding-top: 80px;"></div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {{--<h1 class="text-center title-shadow"><b>@lang('studyzone.findYourZone')</b></h1>--}}
            <h1 class="text-center main_title_blue"><b>@lang('studyzone.findYourZone')</b></h1>
        </div>
    </div>
    <div style="padding-top: 30px;"></div>

    <div class="row">
        <div class="col-sm-4 text-center">
            <a data-toggle="modal" data-target="#silent">
                <img class="circle-img margin-big" src="/images/initiatives/Study Zone/11.png">

                @if(app()->isLocale('fr')) <h2><span class="blue">@lang('studyzone.zone') </span><span
                            class="red"><b>@lang('studyzone.silent')</b></span></h2>
                @else <h2><span class="red"><b>@lang('studyzone.silent') </b></span><span
                            class="blue">@lang('studyzone.zone')</span></h2>
                @endif

            </a>
        </div>
        <div class="col-sm-4 text-center">
            <a data-toggle="modal" data-target="#quiet">
                <img class="circle-img" src="/images/initiatives/Study Zone/22.png">
                @if(app()->isLocale('fr')) <h2><span class="blue">@lang('studyzone.zone') </span><span
                            class="grey"><b>@lang('studyzone.quiet')</b></span></h2>
                @else <h2><span class="grey"><b>@lang('studyzone.quiet') </b></span><span
                            class="blue">@lang('studyzone.zone')</span></h2>
                @endif
            </a>
        </div>
        <div class="col-sm-4 text-center">
            <a data-toggle="modal" data-target="#social">
                <img class="circle-img margin-big" src="/images/initiatives/Study Zone/33.png">

                @if(app()->isLocale('fr')) <h2><span class="blue">@lang('studyzone.zone') </span><span
                            class="yellow"><b>@lang('studyzone.social')</b></span></h2>
                @else <h2><span class="yellow"><b>@lang('studyzone.social') </b></span><span
                            class="blue">@lang('studyzone.zone')</span></h2>
                @endif

            </a>
        </div>

    </div>
</section>

<div style="padding-top: 80px;"></div>

<div class="row">
    <div id="myCarousel" class="carousel slide touch-slide animated fadeInUp wow" data-ride="carousel">
        <ol class="carousel-indicators" style="top:5%;">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="/images/initiatives/Study Zone/1.jpg" alt="event" style="width:100%;">
            </div>

            <div class="item">
                <img src="/images/initiatives/Study Zone/2.jpg" alt="study" style="width:100%;">
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


        <div class="row study_categories">
            <div class="col-sm-6  col-xs-6 text-center">
                <a href="/projects/study-zone/all?events">
                    <figure class="swap-on-hover">


                        @if(app()->isLocale('fr'))
                            <img class="swap-on-hover__front-image" src="/images/initiatives/Study Zone/ev_b_fr.png">
                            <img class="swap-on-hover__back-image" src="/images/initiatives/Study Zone/ev_w_fr.png"/>
                        @else
                            <img class="swap-on-hover__front-image" src="/images/initiatives/Study Zone/ev_b.png">
                            <img class="swap-on-hover__back-image" src="/images/initiatives/Study Zone/ev_w.png"/>
                        @endif

                    </figure>
                </a>
            </div>
            <div class="col-sm-6 col-xs-6  text-center">
                <a href="/projects/study-zone/all?study">
                    <figure class="swap-on-hover">
                        @if(app()->isLocale('fr'))
                            <img class="swap-on-hover__front-image" src="/images/initiatives/Study Zone/st_b_fr.png"/>
                            <img class="swap-on-hover__back-image" src="/images/initiatives/Study Zone/st_w_fr.png"/>
                        @else
                            <img class="swap-on-hover__front-image" src="/images/initiatives/Study Zone/st_b.png"/>
                            <img class="swap-on-hover__back-image" src="/images/initiatives/Study Zone/st_w.png"/>
                        @endif
                    </figure>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div style="margin: 100px;"></div>
</div>


<div class="container" id="fixed-height">
    <div class="testimonies-wrapper">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                {{--<h1 class="text-center title-shadow"><b>@lang('disc.testimonies')</b></h1>--}}
                <h1 class="text-center main_title_blue"><b>@lang('disc.testimonies')</b></h1>
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
                                        <h4><b>{{$testemony->title}} </b></h4>

                                        <p>{{$testemony->text}}</p>

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

<div style="padding: 35px"></div>


{{--<div class="row">--}}
{{--<div class="col-sm-6 col-sm-offset-3">--}}
{{--<h1 class="text-center title-shadow"><b>@lang('studyzone.our_branches')</b></h1>--}}
{{--<h1 class="text-center main_title_blue"><b>@lang('studyzone.our_branches')</b></h1>--}}
{{--</div>--}}
{{--</div>--}}

<div style="margin: 40px;"></div>

<div id="spread">
    <div class="row" style="display: flex;justify-content: center; padding-bottom: 2rem">
        <div class="col-lg-9 col-md-11 col-sm-11 col-xs-11 spread-background">
            <div class="row text-center">
                <h2 class="text-center main_title_blue">
                    <b>@lang('studyzone.our_branches')</b>
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 study_map">
                    <div id="map"></div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12" style="padding: 0">
                    <div class="row">
                        <ul class="col-lg-6 col-md-6 col-sm-6 col-xs-5 mt-3 centers">
                            @for($i = 0;$i<=count($studyzone_centers)-1;$i++)
                                <li id="center_{{$i+1}}"
                                    class="@if($studyzone_centers[$i]->rank == 1) selectedCenter @endif"
                                    style="margin-top: 1rem;"
                                    onclick="getCenterDesc({{$studyzone_centers[$i]->rank}},{{$studyzone_centers[$i]->id}})">
                                    @if (session('locale') == 'en')
                                        <div class="center_name"
                                             style="margin-bottom: 1.5rem">{{$studyzone_centers[$i]->name}}</div>
                                    @else
                                        <div class="center_name"
                                             style="margin-bottom: 1.5rem">{{$studyzone_centers[$i]->name_fr}}</div>
                                    @endif
                                </li>
                            @endfor
                        </ul>
                        {{--@if($center_desc != null)--}}
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 contactus">
                            <div class="contacts">
                                <div class="row work_hours" style="line-height: 30px">
                                    @if (session('locale') == 'en')
                                        <div id="work_hours">{!!$studyzone_centers[0]->work_hours!!}</div>
                                    @else
                                        <div id="work_hours_fr">{!!$studyzone_centers[0]->work_hours_fr!!}</div>
                                    @endif
                                </div>
                                <div id="telephone" class="telephone" style="margin-bottom: 1rem;"><a target="_blank"
                                                                                                      href="tel:{{$studyzone_centers[0]->telephone}}"><strong>{{$studyzone_centers[0]->telephone}}</strong></a>
                                </div>
                                <div id="email" class="email" style="margin-bottom: 1rem;"><a target="_blank"
                                                                                              href="mailto:{!!$studyzone_centers[0]->email!!}">{!!$studyzone_centers[0]->email!!}</a>
                                </div>
                                <div class="address" style="margin-bottom: 1rem;">
                                    @if (session('locale') == 'en')
                                        <div id="address"><a target="_blank"
                                                             href="{!!$studyzone_centers[0]->location!!}">{!!$studyzone_centers[0]->address!!}</a>
                                        </div>
                                    @else
                                        <div id="address_fr"><a target="_blank"
                                                                href="{!!$studyzone_centers[0]->location!!}">{!!$studyzone_centers[0]->address_fr!!}</a>
                                        </div>
                                    @endif
                                </div>
                                <div id="facebook" class="facebook"><a target="_blank"
                                                                       href="https://{!!$studyzone_centers[0]->facebook!!}">{!!$studyzone_centers[0]->facebook!!}</a>
                                </div>
                            </div>
                        </div>
                        {{--@endif--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin: 40px;"></div>

<div class="modal fade project-detail" id="silent"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #feeac1;">
                <button type="button" class="close" id="close-e"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div id="modal-swipe-e" class="text-center">

                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/Study Zone/11.png">
                            <h1><span class="red"><b>@lang('studyzone.silent') </b></span><span
                                        class="blue">@lang('studyzone.zone')</span></h1>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <ul style="text-align: left">
                                <li><h3 class=" blue">@lang('studyzone.silent_content1')</h3></li>
                                <li><h3 class=" blue">@lang('studyzone.silent_content2')</h3></li>
                                <li><h3 class=" blue">@lang('studyzone.silent_content3')</h3></li>
                                <li><h3 class=" blue">@lang('studyzone.silent_content4')</h3></li>
                            </ul>
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
<div class="modal fade project-detail" id="quiet"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #d0d6ea;">
                <button type="button" class="close" id="close-e"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div id="modal-swipe-e" class="text-center">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/Study Zone/22.png">
                            <h1><span class="grey"><b>@lang('studyzone.quiet') </b></span><span
                                        class="blue">@lang('studyzone.zone')</span></h1>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <ul style="text-align: left">
                                <li><h3 class=" grey">@lang('studyzone.quiet_content1')</h3></li>
                                <li><h3 class=" grey">@lang('studyzone.quiet_content2')</h3></li>
                                <li><h3 class=" grey">@lang('studyzone.quiet_content3')</h3></li>
                                <li><h3 class=" grey">@lang('studyzone.quiet_content4')</h3></li>
                            </ul>
                        </div>
                    </div>
                    <br>
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
<div class="modal fade project-detail" id="social"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #feeac1;">
                <button type="button" class="close" id="close-e"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <div id="modal-swipe-e" class="text-center">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/Study Zone/33.png">
                            <h1><span class="yellow"><b>@lang('studyzone.social') </b></span><span
                                        class="blue">@lang('studyzone.zone')</span></h1>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <ul style="text-align: left">
                                <li><h3 class=" blue">@lang('studyzone.social_content1')</h3></li>
                                <li><h3 class=" blue">@lang('studyzone.social_content2')</h3></li>
                                <li><h3 class=" blue">@lang('studyzone.social_content3')</h3></li>
                                <li><h3 class=" blue">@lang('studyzone.social_content4')</h3></li>
                            </ul>
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

@include('public.footer')
<script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
<script>
    let studyMap, markers = [];
    var iconDefault = L.icon({
        iconRetinaUrl: '/images/ico/marker-icon-2x.png',
        iconUrl: '/images/ico/marker-icon-2x.png',
        shadowUrl: '/images/ico/marker-shadow.png',
        iconSize: [18, 28],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        tooltipAnchor: [16, -28],
        // shadowSize: [41, 41],
    });

    /* ----------------------------- Initialize Map ----------------------------- */
    function initStudyMap() {
        studyMap = L.map('map', {
            center: {
                lat: 34.8021,
                lng: 36.9968,
            },
            zoom: 7
        });
        L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png?api_key=7f38c51a-41e4-4cf8-b943-4b9cf994ab08', {
            attribution: ''
        }).addTo(studyMap);
    }

    setTimeout(() => {
        initStudyMap();
        initMarkers();
    }, 1500);

    /* --------------------------- Initialize Markers --------------------------- */
    function initMarkers() {
                @foreach($studyzone_centers as $map)
        var lat = {{$map['latitude']}};
        var long = {{$map['longtitude']}};

        var marker = L.marker([lat, long], {icon: iconDefault});
        @if(app()->isLocale('en'))
        marker.addTo(studyMap).bindPopup(`<b>Address: {!!$map['address']!!} <br> {{strip_tags($map['work_hours'])}} <br> Phone: {!!$map['telephone']!!} <br> Email: {!!$map['email']!!}</b>`, {maxWidth: 200});
        @else
        marker.addTo(studyMap).bindPopup(`<b>Adresse: {!!$map['address_fr']!!} <br>{{strip_tags($map['work_hours_fr'])}} <br> Phone: {!!$map['telephone']!!} <br> Email: {!!$map['email']!!}</b>`, {maxWidth: 200});
        @endif
        markers.push(marker);
        @endforeach;
    }
</script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script>
    $('#testimonies-carousel').carousel({
        interval: 80000
    });
    $('#myCarousel').carousel({
        interval: 60000
    });
</script>
<script>
    $(window).on('load', function () {
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
    myCarousel.on("touchstart", function (event) {
        let xClick = event.originalEvent.touches[0].pageX;
        $(this).one("touchmove", function (event) {
            let xMove = event.originalEvent.touches[0].pageX;
            if (Math.floor(xClick - xMove) > 5) {
                $(this).carousel('next');
            }
            else if (Math.floor(xClick - xMove) < -5) {
                $(this).carousel('prev');
            }
        });
        myCarousel.on("touchend", function () {
            $(this).off("touchmove");
        });
    });
    $('.flag').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });
    myCarousel.on('slide.bs.carousel', function (e) {
        let slideTo = $(e.relatedTarget).index();
        $('.flag[data-slide-to="' + slideTo + '"]').addClass('active').siblings().removeClass('active');
    });
</script>

<script>
    if (/iPad/.test(navigator.userAgent) && !window.MSStream) {
        $('#projects-map').css('width', '55%');
    }
    if (/iPhone|iPod/.test(navigator.userAgent) && !window.MSStream) {
        $('#projects-map').css('width', '38%');
        $('.btn-primary').click(function () {
            $('body').css('overflow', 'hidden');
            $('body').css('position', 'fixed');
        });
    }
</script>
<script>
    function getCenterDesc(rank, id) {
        $('#center_' + rank).addClass("selectedCenter");
                @foreach($studyzone_centers as $center)
        var center_id = {{$center['id']}};
        if (center_id == id) {
            if (id == 1) {
                $('#work_hours').html('Working Hours: <br><strong> Monday to Saturday </strong> <br> from 9:30 Am to 9:30 Pm');
                $('#work_hours_fr').html('Les horaires du travail:<br><strong> Lundi à Samedi,</strong><br>de 9 h 30 à 21 h 30');
            }
            else if (id == 2) {
                $('#work_hours').html('Working Hours: <br><strong>Saturday to Thursday</strong> <br>from 9:30 Am to 9:30 Pm');
                $('#work_hours_fr').html('Les horaires du travail: <br><strong> Samedi à Jeudi,</strong><br> de 9 h 30 à 21 h 30');
            }
            else if (id == 3) {
                $('#work_hours').html('Working Hours: <br><strong>Saturday to Thursday</strong><br> from 9:30 Am to 9:30 Pm');
                $('#work_hours_fr').html('Les horaires du travail:<br><strong> Samedi à Jeudi,</strong><br> de 9 h 30 à 21 h 30');
            }
            else if (id == 4) {
                $('#work_hours').html('Working Hours: <br><strong> Saturday to Thursday</strong><br> from 9:30 Am to 9:30 Pm');
                $('#work_hours_fr').html('Les horaires du travail:<br><strong> Samedi à Jeudi,</strong><br> de 9 h 30 à 21 h 30');
            }
            else if (id == 5) {
                $('#work_hours').html('Working Hours: <br><strong>Monday to Saturday</strong><br> from 9:30 Am to 9:30 Pm');
                $('#work_hours_fr').html('Les horaires du travail:<br><strong> Lundi à Samedi,</strong><br> de 9 h 30 à 21 h 30');
            }
            else if (id == 6) {
                $('#work_hours').html('Working Hours: <br><strong>Sunday to Friday</strong><br> from 9:30 Am to 9:30 Pm');
                $('#work_hours_fr').html('Les horaires du travail:<br><strong> Dimanche à Vendredi,</strong><br> de 9 h 30 à 21 h 30');
            }
            else if (id == 7) {
                $('#work_hours').html('Working Hours: <br> <strong>Monday to Saturday</strong><br> from 9:30 Am to 9:30 Pm');
                $('#work_hours_fr').html('Les horaires du travail:<br><strong> Lundi à Samedi,</strong><br> de 9 h 30 à 21 h 30');
            }
            else if (id == 8) {
                $('#work_hours').html('Working Hours: <br><strong>Saturday to Thursday</strong><br> from 9:30 Am to 9:30 Pm');
                $('#work_hours_fr').html('Les horaires du travail:<br><strong> Samedi à Jeudi,</strong><br> de 9 h 30 à 21 h 30');
            }
            else if (id == 8 || id == 11 || id == 12) {
                $('#work_hours').html('Working Hours: <br><strong>Saturday to Thursday</strong><br> from 9:30 Am to 9:30 Pm');
                $('#work_hours_fr').html('Les horaires du travail:<br><strong> Samedi à Jeudi,</strong><br> de 9 h 30 à 21 h 30');
            }
            $('#telephone').html('<a href="tel:{{$center['telephone']}}"><strong>{{$center['telephone']}}</strong></a>');
            $('#email').html('<a href="mailto:{{$center['email']}}">{{$center['email']}}</a>');
            $('#facebook').html('<a href="https://{{$center['facebook']}}">{{$center['facebook']}}</a>');
            $('#address').html('<a href="{{$center['location']}}">{{$center['address']}}</a>');
            $('#address_fr').html('{{$center['address_fr']}}');
        }
        if ({{$center['rank']}} !=
        rank
    )
        {
            $('#center_' + {{$center['rank']}}).removeClass("selectedCenter");
        }
        @endforeach
    }
</script>
@stack('navbar-scripts')

</body>
</html>
