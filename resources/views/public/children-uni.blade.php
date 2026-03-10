<!DOCTYPE html>
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
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

    <meta name="keywords" content="aleppo syria, hope, center, children, university"/>
    <title>@lang('what_we_do.children_uni')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/studyzone.css" rel="stylesheet">
    <link href="/css/children.css" rel="stylesheet">

    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/childrenuni"/>

    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <div class="preloader">
        <div class="preloader-gif"></div>
    </div>

</head>
<body>

@include('public.navbar')

<div id="Children">
    <div style="padding-top: 30px"></div>
    <div class="row">
        <div class="first-part col-sm-12 col-md-5 text-center vertical-separator">
            <img src="/images/logos/cu.svg" class="projects-logo-big">
            <p class="text-left p-justify">@lang('children.description')</p>

            <div class="row centered-row">
                <div class="col-xs-6 col-sm-1 col-sm-offset-4 centered-column-content">
                    <img src="/images/logos/saint-nicholas.svg" id="caritas-logo">
                </div>
                <div class="col-xs-6 col-sm-5 centered-column-content">
                    <img src="/images/logos/missio.svg" id="caritas-logo">
                </div>
            </div>
        </div>
        <div class="second-part col-sm-12 col-md-7 text-center" >
            <div class="video" >
                <iframe src="https://www.youtube.com/embed/8U9rl4prdTo" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
        </div>

    <div style="padding-top: 100px"></div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h1 class="text-center main_title_blue"><b>@lang('children.faculties_title')</b></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-lg-offset-1 col-md-4 col-sm-4 text-center ">
            <a data-toggle="modal" data-target="#informatics">
                <img class="circle-img margin-big" style="cursor: pointer;" src="/images/initiatives/Children Uni/characters/001.png">

                @if(app()->isLocale('fr')) <h3><span class="blue"><b>@lang('children.informatics')</b></span></h3>
                @else <h3><span class="blue"><b>@lang('children.informatics')</b></span></h3>
                @endif

            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-4 text-center">
            <a data-toggle="modal" data-target="#medicine">
                <img class="circle-img margin-big " style="cursor: pointer;" src="/images/initiatives/Children Uni/characters/003.png">

                @if(app()->isLocale('fr')) <h3><span class="blue"><b>@lang('children.medicine')</b></span></h3>
                @else <h3><span class="blue"><b>@lang('children.medicine')</b></span></h3>
                @endif

            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-4 text-center">
            <a data-toggle="modal" data-target="#engineering">
                <img class="circle-img margin-big " style="cursor: pointer;" src="/images/initiatives/Children Uni/characters/002.png">

                @if(app()->isLocale('fr')) <h3><span class="blue"><b>@lang('children.engineering')</b></span></h3>
                @else <h3><span class="blue"><b>@lang('children.engineering')</b></span></h3>
                @endif

            </a>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-6 text-center">
            <a data-toggle="modal" data-target="#science">
                <img class="circle-img margin-big " style="cursor: pointer;" src="/images/initiatives/Children Uni/characters/005.png">

                @if(app()->isLocale('fr')) <h3><span class="blue"><b>@lang('children.science')</b></span></h3>
                @else <h3><span class="blue"><b>@lang('children.science')</b></span></h3>
                @endif

            </a>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6 text-center">
            <a data-toggle="modal" data-target="#media">
                <img class="circle-img margin-big " style="cursor: pointer;" src="/images/initiatives/Children Uni/characters/004.png">

                @if(app()->isLocale('fr')) <h3><span class="blue"><b>@lang('children.media')</b></span></h3>
                @else <h3><span class="blue"><b>@lang('children.media')</b></span></h3>
                @endif

            </a>
        </div>
    </div>

    <div style="padding-top: 100px"></div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h1 class="text-center main_title_blue"><b>@lang('studyzone.activities')</b></h1>
        </div>
    </div>
    <div class="container">

        <ul class="nav nav-tabs" id="tabList">
            <li><a href="#aleppo" id="aleppoTab" data-toggle="tab" style="font-weight: bold;">@lang('projects.aleppo') </a></li>
            <li><a href="#homs" id="homsTab" data-toggle="tab" style="font-weight: bold;">@lang('projects.homs') </a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade" id="aleppo">
                <div class="media">
                    <div class="media-body">
                        <div class="raw horizontal-margin">
                            <div class="post">
                                @foreach($initiatives_aleppo as $i=>$initiative)
                                    <div class="container single-project org-post">
                                        <div class="col-sm-3 ini-img">
                                            <div class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="item active"><img src="{{$initiative->ImagesRandom[0]['path']}}"></div>
                                                    <div class="item"><img src="{{$initiative->ImagesRandom[1]['path']}}"></div>
                                                    @if(count($initiative->ImagesRandom) > 2)
                                                        <div class="item"><img src="{{$initiative->ImagesRandom[2]['path']}}"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 ini-content">
                                            @if($initiative->video !== '0')
                                                <a class="video-ico"><i class="fa fa-video-camera"></i></a>
                                            @endif
                                            <h2>{{$initiative->$language->title}}</h2>
                                            @if($initiative->$language->date_string !== '0')
                                                <h6>{{$initiative->$language->date_string}}
                                                    @endif
                                                    @if($initiative->$language->organization !== '0')
                                                        @lang('initiatives.by') {{$initiative->$language->organization}}
                                                    @endif
                                                </h6>
                                                <p>{{$initiative->$language->description}}</p>
                                                    <a href="{{ route('public.initiative',
                                                        [str_slug(strtolower($whatCategory->name)),
                                                        $initiative->id,
                                                        str_slug(strtolower($initiative->english->title))]   ) }}"
                                                        class="btn btn-primary btn-org">@lang('main.readMore')
                                                    </a>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="homs">
                <div class="media">
                    <div class="media-body">
                        <div class="raw horizontal-margin">
                            <div class="post">
                                @foreach($initiatives_homs as $i=>$initiative)
                                    <div class="container single-project org-post">
                                        <div class="col-sm-3 ini-img">
                                            <div class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="item active"><img src="{{$initiative->ImagesRandom[0]['path']}}"></div>
                                                    <div class="item"><img src="{{$initiative->ImagesRandom[1]['path']}}"></div>
                                                    @if(count($initiative->ImagesRandom) > 2)
                                                        <div class="item"><img src="{{$initiative->ImagesRandom[2]['path']}}"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 ini-content">
                                            @if($initiative->video !== '0')
                                                <a class="video-ico"><i class="fa fa-video-camera"></i></a>
                                            @endif
                                            <h2>{{$initiative->$language->title}}</h2>
                                            @if($initiative->$language->date_string !== '0')
                                                <h6>{{$initiative->$language->date_string}}
                                                    @endif
                                                    @if($initiative->$language->organization !== '0')
                                                        @lang('initiatives.by') {{$initiative->$language->organization}}
                                                    @endif
                                                </h6>
                                                <p>{{$initiative->$language->description}}</p>
                                                {{--@if(isset($subWhatCategory))--}}
                                                {{--<a href="{{ route($route, [--}}
                                                {{--str_slug(strtolower($subWhatCategory->name)),--}}
                                                {{--$initiative->id,--}}
                                                {{--str_slug(strtolower($initiative->english->title))--}}
                                                {{--]) }}"--}}
                                                {{--class="btn btn-primary btn-org">@lang('main.readMore')--}}
                                                {{--</a>--}}
                                                {{--@else--}}
                                                <a href="{{ route('public.initiative',
                                [str_slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                str_slug(strtolower($initiative->english->title))]   ) }}"
                                                   class="btn btn-primary btn-org">@lang('main.readMore')</a>
                                                {{--@endif--}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="information">
    <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1 ">
        <ul style="list-style-type:none;">
            <h3 class="orange">Aleppo</h3>
            <li>
                <div class="blue col-xs-1">
                    <a href="tel:+963993341399">
                        <i class="fa fa-phone"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Tel:</b>
                </div>
                <div class="blue col-xs-9">
                    +963 99 33 41 399
                </div>
            </li>
            <li>
                <div class="blue col-xs-1">
                    <a href="https://www.google.com/maps/place/36%C2%B013'05.8%22N+37%C2%B009'26.9%22E/@36.218269,37.1552883,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xf705b9fed8d49be6!8m2!3d36.218269!4d37.157477"
                       target="_blank"><i class="fa fa-map-marker"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Address:</b>
                </div>
                <div class="blue col-xs-9">
                    @lang('children.address_a')
                </div>
            </li>
            <li>
                <div class="blue col-xs-1">
                    <a href="https://www.facebook.com/childuni.aleppo" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Facebook:</b>
                </div>
                <div class="blue col-xs-9">
                    www.facebook.com/childuni.aleppo
                </div>
            </li>
        </ul>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-5">
        <ul style="list-style-type:none;">
            <h3 class="orange">Homs</h3>
            <li>
                <div class="blue col-xs-1">
                    <a href="tel:+963950018440">
                        <i class="fa fa-phone"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Tel:</b>
                </div>
                <div class="blue col-xs-9">
                    +963 95 00 18 440
                </div>
            </li>
            <li>
                <div class="blue col-xs-1">
                    <a href="https://www.google.com/maps/place/34%C2%B043'31.9%22N+36%C2%B042'54.3%22E/@34.712302,36.6933248,14.92z/data=!4m5!3m4!1s0x0:0x81cdfe027708d9c3!8m2!3d34.72553!4d36.71508"
                       target="_blank"><i class="fa fa-map-marker"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Address:</b>
                </div>
                <div class="blue col-xs-9">
                    @lang('children.address_h')
                </div>
            </li>
            <li>
                <div class="blue col-xs-1">
                    <a href="https://www.facebook.com/childuni.homs" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
                <div class="blue col-xs-2">
                    <b>Facebook:</b>
                </div>
                <div class="blue col-xs-9">
                    www.facebook.com/childuni.homs
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="modal fade project-detail" id="informatics"
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

                    <div class="row" >
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/Children Uni/characters/001.png">
                            <h3><span class="blue">@lang('children.informatics')</span></h3>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <h4 class=" blue" style="text-align: left">@lang('children.informatics_desc')</h4>
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
<div class="modal fade project-detail" id="engineering"
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

                    <div class="row" >
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/Children Uni/characters/002.png">
                            <h3><span class="blue">@lang('children.engineering')</span></h3>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <h4 class=" blue" style="text-align: left">@lang('children.engineering_desc')</h4>
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
<div class="modal fade project-detail" id="medicine"
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

                    <div class="row" >
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/Children Uni/characters/003.png">
                            <h3><span class="blue">@lang('children.medicine')</span></h3>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <h4 class=" blue" style="text-align: left">@lang('children.medicine_desc')</h4>
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
<div class="modal fade project-detail" id="media"
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

                    <div class="row" >
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/Children Uni/characters/004.png">
                            <h3><span class="blue">@lang('children.media')</span></h3>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <h4 class=" blue" style="text-align: left">@lang('children.media_desc')</h4>
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
<div class="modal fade project-detail" id="science"
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

                    <div class="row" >
                        <div class="col-sm-12 col-md-5">
                            <img src="/images/initiatives/Children Uni/characters/005.png">
                            <h3><span class="blue">@lang('children.science')</span></h3>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <h4 class=" blue" style="text-align: left">@lang('children.science_desc')</h4>
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

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

@stack('navbar-scripts')

<script>
    $(window).on('load', function(){
        setTimeout(removeLoader, 1500); //wait for page load PLUS two seconds.
    });
    function removeLoader() {
        $(".preloader").fadeOut(500, function () {
            // fadeOut complete. Remove the loading div
            $(".preloader").remove(); //makes page more lightweight
        });
    };
</script>
<script>
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
    }
    else if (url.match('tab=')) {
        $('.nav-tabs a[href=#'+url.split('tab=')[1]+']').tab('show') ;
    }
    else {
        $('.nav-tabs a[href="#aleppo"]').tab('show');
    }

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
        $('tab_input').val(e.target.hash);
    });
</script>
</body>

</html>
