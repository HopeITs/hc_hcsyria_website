<!DOCTYPE html>
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
    <meta name="description" content="@lang('family2family.description')">
    <meta name="keywords" content="aleppo syria, hope, center, family to family, caritas poland"/>
    <title>@lang('what_we_do.family')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/family-to-family"/>

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        #FamilyToFamily {
            padding-top: 100px;
            padding-bottom: 25px;
            margin: 0 5% 0 5%;
        }

        #FamilyToFamily h3 {
            margin-bottom: 0;
        }

        #FamilyToFamily .first-part, #FamilyToFamily .second-part{
            /*margin: 0px;*/
            margin-top: 70px;
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            float: none;
        }

        #FamilyToFamily .first-part h3 {
            font-size: 40px;
            margin-top: 0;
        }

        #FamilyToFamily .first-part p {
            font-size: 16px;
        }

        #FamilyToFamily .statistics {
            width: 50%;
            float: left;
            padding-right: 15px;
            padding-left: 15px;
        }

        #FamilyToFamily .tiles:hover {
            cursor: default;
        }

        #FamilyToFamily .title {
            font-weight: 700;
            font-size: 18px;
            line-height: 2;
            text-align: justify;
        }

        #FamilyToFamily #partners-pic {
            width: 100%;
            margin: 10px auto 25px auto;
            cursor: default;
        }

        #FamilyToFamily #caritas-logo {
            padding-top: 15px;
            width: 100px;
        }


        #FamilyToFamily .other-initiatives-inner {
            margin: 10px;
            padding: 8px;
        }

        #FamilyToFamily .owl-wrapper,
        #FamilyToFamily .owl-item,
        #FamilyToFamily .owl-item .item,
        #FamilyToFamily .other-initiative-wrapper {
            height: 100% !important;
        }
        .related-ini-img {
            padding: 0 0 10px 0 !important;
        }
        .owl-wrapper {
            display: flex!important;
        }
        .owl-carousel {
            margin-left: 0;
        }
        #FamilyToFamily .other-initiatives-inner {
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        }
        #FamilyToFamily .other-initiatives-inner:hover {
            -webkit-transform: none;
            -moz-transform: none;
            -ms-transform: none;
            -o-transform: none;
            transform: none;
        }

        #FamilyToFamily .tile{
            display: flex; margin: 20px;
        }

        @if(app()->isLocale('fr'))
            #FamilyToFamily .first-part p {
            padding-top: 0;
        }

        @media screen and (max-width: 1199px) and (min-width: 992px) {
            #FamilyToFamily #caritas-logo {
                width: 80px;
            }
        }


        @else
            #FamilyToFamily .first-part p {
            padding-top: 25px;
        }
        @endif

        @media screen and (max-width: 1199px) and (min-width: 992px) {
            #FamilyToFamily .first-part p {
                padding-top: 0;
                font-size: 14px;
            }
            #FamilyToFamily .title {
                font-weight: 400;
                font-size: 16px;
                line-height: 1;
            }
        }

        @media screen and (min-width: 1200px) {
            #FamilyToFamily #partners-pic {
                width: 90%;
            }
        }

        @media screen and (min-width: 992px) {
            #FamilyToFamily .main_title {
                margin-bottom: 0;
                margin-top: -20px;
            }
            .col-md-11 {
                margin-left: 6%
            }
        }
        @media screen and (max-width: 992px) {
            #FamilyToFamily .title {
                font-weight: 400;
                font-size: 12px;
                line-height: 1;
            }
            #FamilyToFamily .tile{
                margin: 0;
            }
            #FamilyToFamily .second-part {
                    margin-top: 70px;
                    display: flex;
                    vertical-align: middle;
                    text-align: center;
                }
        }
    </style>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HLZ6M"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
{{--<div class="preloader">--}}
    {{--<div class="preloader-gif"></div>--}}
{{--</div>--}}

@include('public.navbar')

<div id="FamilyToFamily">

    <div style="padding-top: 30px"></div>
    <div class="row">
        <div class="horizontal-margin first-part col-sm-12  col-md-5  text-center vertical-separator">
            <img src="/images/logos/family.svg" class="projects-logo-big">
            <p class="text-left p-justify">@lang('family2family.description')</p>
            <h4 c3ass="text-center" style="text-decoration: underline;padding: 8px;">@lang('family2family.dateDescription')</h4>
            <div class="raw">
                <div class="statistics"><h3 class="count_int" style="color: #CF142B;">6118</h3>@lang('family2family.families')</div>
                <div class="statistics"><h3 class="count_int" >10</h3>@lang('family2family.partners')</div>
            </div>
            <img src="/images/logos/caritas.svg" id="caritas-logo">
        </div>
        <div class="second-part col-sm-12  col-md-7 text-center" >
            <div id="myCarousel" class="carousel slide " data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/images/initiatives/Family to Family/1.jpg" alt="FamilyToFamily" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="/images/initiatives/Family to Family/2.jpg" alt="FamilyToFamily" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="/images/initiatives/Family to Family/3.jpg" alt="FamilyToFamily" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="/images/initiatives/Family to Family/4.jpg" alt="FamilyToFamily" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="/images/initiatives/Family to Family/5.jpg" alt="FamilyToFamily" style="width:100%;">
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

    <div style="padding-top: 40px"></div>

    <div class=" row ">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="tiles">
                <div class="tile">
                    <img src="/images/programs/what/family-partners-big.jpg" id="partners-pic">
                    <div class="details">
                        <span class="title">@lang('family2family.picDescription')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-top: 40px"></div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {{--<h1 class="text-center title-shadow"><b>@lang('family2family.partners')</b></h1>--}}
            <h1 class="text-center red-title"><b>@lang('family2family.partners')</b></h1>
        </div>
    </div>

    <div class=" container text-center">
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<h2 class="main_title">@lang('family2family.partners')</h2>--}}
        {{--</div>--}}
        <div class="overlay">
            <div id="partners-carousel" class=" owl-carousel owl-theme row">
                @php
                    if (session('locale') == 'fr') {
                    $language = 'french';
                    } else {
                    $language = 'english';
                    }
                @endphp
                @foreach($partners as $partner)
                    <div class="item">
                        <div class="other-initiative-wrapper">
                            <a href="{{ route('public.initiative', [ 'family-to-family', $partner->id,
                                str_slug(strtolower($partner->english->title))]) }}">
                                <div class="row other-initiatives-inner">
                                    <div class="col-sm-12 related-ini-img">
                                        <img src="{{$partner->firstImage['path']}}" width="100%">
                                    </div>
                                    <div class="col-sm-12 related-ini-txt">
                                        <h4>{{ ucfirst($partner->$language->title) }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div style="padding-top: 40px"></div>
</div>
@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
<script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/owl.carousel.js"></script>

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
        $("#partners-carousel").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            autoHeight: true,
            itemsCustom: [
                [0, 1],
                [400, 1],
                [600, 2],
                [700, 2],
                [1000, 2],
                [1200, 3],
            ],
        });
    });

    var waitForFinalEvent = (function () {
        var timers = {};
        return function (callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "Don't call this twice without a uniqueId";
            }
            if (timers[uniqueId]) {
                clearTimeout (timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
        };
    })();

    $(window).resize(function () {
        waitForFinalEvent(function(){
            let owo = $('.owl-wrapper-outer');
            owo.css("height", "auto");
            owo.css("height", owo.height() + "px");
        }, 500, "some unique string");
    });

    if (jQuery(window).width()<786) {
        $('.owl-wrapper').css('left','-8px');
    }

    $('#main-carousel').carousel({
        interval: 6000
    });
</script>

<script>
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
</script>
@stack('navbar-scripts')

</body>
</html>
