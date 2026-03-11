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
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129097809-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
    dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-129097809-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta name="description" content="@lang('studyzone.description')">
    <meta name="keywords" content="study zone , syria, hope center"/>
    <title>@lang('what_we_do.study')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/study-zone" />

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        #StudyZone {
            padding-top: 100px;
            padding-bottom: 30px;
        }
        /*#StudyZone .horizontal-margin {*/
            /*margin-top: 20px;*/
        /*}*/
        #StudyZone .study-logo {
            width: 130px;
            margin-bottom: 10px;
        }
        #StudyZone .first-part p {
            margin-top:  20px;
            margin-bottom:  20px;
        }
        #StudyZone #loeuvre-logo {
            width: 150px;
        }

        #StudyZone #syria-map {
            width: 400px;
            padding-top: 50px;
        }

        #StudyZone .contact-address {
            margin-top: 20px;
            padding: 10px;
        }
        #StudyZone .carousel-control {
            z-index: 3;
            background: none;
        }
        #StudyZone .carousel-control .glyphicon {
            top: 45%;
        }
        #StudyZone .other-initiatives-inner {
            padding: 8px;
        }
        @media screen and (min-width: 992px) {
            #StudyZone .third-part .main_title {
                margin-top: -10px;
            }
        }
        @media screen and (max-width: 991px){
            #StudyZone .third-part .main_title {
                margin-top: 50px;
            }
        }
        @media screen and (min-width: 768px) and (max-width: 991px){
            #StudyZone .third-part .main_title {
                margin-top: 230px;
            }
        }
        @media screen and (max-width: 767px) {
            #StudyZone .related-ini-txt {
                text-align: left;
            }
            #StudyZone .second-part {
                padding: 0;
            }
        }
        @media screen and (min-width: 992px) and (max-width: 1199px) {
            #StudyZone #loeuvre-logo {
                width: 130px;
            }
        }
        @if(app()->isLocale('fr'))
            @media screen and (min-width: 992px) and (max-width: 1199px) {
                #StudyZone .first-part p {
                    margin: 10px 0;
                    font-size: 13px;
                }
            }
        @endif
        #StudyZone .map-wrapper {
            position: relative;
            width: 400px;
            margin: auto;
        }
        #StudyZone .flag {
            -webkit-transition: all .3s ease 0s;
            -moz-transition: all .3s ease 0s;
            -o-transition: all .3s ease 0s;
            transition: all .3s ease 0s;
            position: absolute;
            width: 45px;
        }
        #StudyZone .flag:hover {
            cursor: pointer;
        }
        #StudyZone #sadad-flag {
            left: 124px;
            top: 215px;
        }
        #StudyZone #sadad-flag.active,
        #StudyZone #sadad-flag:hover {
            top: 205px;
            transform: scale(1.4);
        }
        #StudyZone #mousaina-flag {
            left: 41px;
            top: 209px;
        }
        #StudyZone #mousaina-flag.active,
        #StudyZone #mousaina-flag:hover {
            top: 199px;
            transform: scale(1.4);
        }
        #StudyZone #homs-flag {
            left: 91px;
            top: 207px;
        }
        #StudyZone #homs-flag.active,
        #StudyZone #homs-flag:hover {
            top: 197px;
            transform: scale(1.4);
        }
        #StudyZone #damascus-flag {
            left: 53px;
            top: 265px;
        }
        #StudyZone #damascus-flag.active,
        #StudyZone #damascus-flag:hover {
            top: 255px;
            transform: scale(1.4);
        }
        #StudyZone #team .main_title {
            margin-bottom: -10px;
        }
    </style>
</head>
<body>

@include('public.navbar')

<section id="StudyZone">
    <div class="navigate">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">@lang('navbar.home')</a></li>
                <li><a href="{{route('public.main_projects')}}">@lang('what_we_do.title')</a></li>
                <li><a href="{{route('public.initiatives.type', 'development')}}">@lang('what_we_do.development')</a></li>
                <li class="active">@lang('what_we_do.study')</li>
            </ol>
        </div>
    </div>
    <div class=" container">
        <div class="row">
            <div class="horizontal-margin first-part col-md-4 text-center vertical-separator">
                <img src="/images/logos/study.svg" class="study-logo">
                <p class="text-left p-justify">@lang('studyzone.description')</p>
                <img src="/images/logos/loeuvre.svg" id="loeuvre-logo">
            </div>
            <div class="second-part col-md-5 text-center">
                <div class="map-wrapper">
                    <img src="/images/programs/what/study-syria.png" id="syria-map">
                    <img data-target="#myCarousel" data-slide-to="0" src="/images/programs/what/flag.png" class="flag active" id="mousaina-flag">
                    <img data-target="#myCarousel" data-slide-to="1" src="/images/programs/what/flag.png" class="flag" id="homs-flag">
                    <img data-target="#myCarousel" data-slide-to="2" src="/images/programs/what/flag.png" class="flag" id="sadad-flag">
                    <img data-target="#myCarousel" data-slide-to="3" src="/images/programs/what/flag.png" class="flag" id="damascus-flag">

                </div>
                <div class="raw">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="contact-address">
                            <div id="myCarousel" class="carousel slide" data-interval="false" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <address>
                                            <b>Mousaina</b><br>
                                            @lang('studyzone.addressMousaina')
                                            <br>
                                            <p class="email">
                                                <small>Email: <a href="mailto:info-szmouzeina@hcsyria.org" id="info-link">info-szmouzeina@hcsyria.org</a>
                                                </small>
                                            </p>
                                            <p class="email">
                                                <small>@lang('main.tel'): <a href="tel:+963930306693" id="info-link">+963 930 30 66 93</a></small>
                                            </p>
                                            <small>@lang('studyzone.workingHours')</small>
                                        </address>
                                    </div>
                                    <div class="item">
                                        <address>
                                            <b>Homs</b><br>
                                            @lang('studyzone.addressHoms')
                                            <br>
                                            <p class="email">
                                                <small>Email: <a href="mailto:info-szhoms@hcsyria.org" id="info-link">info-szhoms@hcsyria.org</a>
                                                </small>
                                            </p>
                                            <p class="email">
                                                <small>@lang('main.tel'): <a href="tel:+963930306699" id="info-link">+963 930 30 66 99</a></small>
                                            </p>
                                            <small>@lang('studyzone.workingHours')</small>
                                        </address>
                                    </div>
                                    <div class="item">
                                        <address>
                                            <b>Sadad</b><br>
                                            @lang('studyzone.addressSadad')
                                            <br>
                                            <p class="email">
                                                <small>Email: <a href="mailto:info-szsadad@hcsyria.org" id="info-link">info-szsadad@hcsyria.org</a>
                                                </small>
                                            </p>
                                            <p class="email">
                                                <small>@lang('main.tel'): <a href="tel:+963930306690" id="info-link">+963 930 30 66 90</a></small>
                                            </p>
                                            <small>@lang('studyzone.workingHours')</small>
                                        </address>
                                    </div>

                                    <div class="item">
                                        <address>
                                            <b>Damascus</b><br>
                                            @lang('studyzone.addressDamascus')
                                            <br>
                                            <p class="email">
                                                <small>Email: <a href="mailto:info-szdamascus@hcsyria.org" id="info-link">info-szdamascus@hcsyria.org</a>
                                                </small>
                                            </p>
                                            <p class="email">
                                                <small>@lang('main.tel'): <a href="tel:+963930306700" id="info-link">+963 930 30 67 00</a></small>
                                            </p>
                                            <small>@lang('studyzone.workingHours')</small>
                                        </address>
                                    </div>
                                </div>
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
                </div>
            </div>
            <div class="third-part horizontal-margin col-md-3 text-center">
                <h4 class="main_title">@lang('studyzone.activities')</h4>
                <div class="raw">
                    @for($i = 0; $i<2; $i++)
                    <div class="other-initiative-wrapper col-xs-12">
                        <a href="{{ route('public.studyzone.project', [ 'activities', $activities[$i]->id,
                         Str::slug(strtolower($activities[$i]->english->title))]) }}">
                            <div class="row other-initiatives-inner">
                                <div class="col-sm-12 col-xs-5 related-ini-img">
                                    <img src="{{$activities[$i]->firstImage['path']}}" width="100%">
                                </div>
                                <div class="col-sm-12 col-xs-7 related-ini-txt text-left">
                                    <h4>{{ ucfirst($activities[$i]->$language->title) }}</h4>
                                    <p>{{implode(' ', array_slice(explode(' ', $activities[$i]->$language->description), 0, 10)).'...'}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endfor
                    <div class="col-xs-12 text-left">
                        <a href="{{route('public.studyzone.type', 'activities')}}"
                           class="btn btn-primary btn-see-all"
                           data-toggle="modal">@lang('studyzone.seeAll')</a>
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
    $('.flag').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });
    myCarousel.on('slide.bs.carousel',function(e){
        let slideTo = $(e.relatedTarget).index();
        $('.flag[data-slide-to="'+slideTo+'"]').addClass('active').siblings().removeClass('active');
    });
</script>
@stack('navbar-scripts')

</body>
</html>
