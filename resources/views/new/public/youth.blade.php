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
    <script src="/js/jquery.js"></script>
    @include('new.public.components.analytics-head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:type" content="article"/>
    <title>Christian Youth</title>
    <link href="{{asset('css/youth_new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin=''/>
    <link href="/css/lato.css" rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link href='https://fonts.googleapis.com/css?family=Martel' rel='stylesheet'>

    <script src="/js/html5shiv.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="/js/aos.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-colorschemes@0.4.0/dist/chartjs-plugin-colorschemes.js"></script>--}}
    <link rel="stylesheet" href="/css/animate.min.css"
          integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    {{--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>--}}

</head>
<body>
@include('new.public.components.analytics-body')

<div class="preloader">
    <div class="preloader-gif"></div>
</div>
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')

<section id="Youth" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                </div>
            </div>
        </div>
    </div>
    <div id="main-section">
        <div class="main-title">@lang('youth.title')</div>
        @include('new.public.partials.cover-carousel', ['carouselImages' => $carouselImages])
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <img data-aos="zoom-in" class="youth-logo position-absolute" src="/images/logos/CYG.svg">
            </div>
        </div>
    </div>
    {{--@if($agent->isPhone())--}}
    <div class="d-lg-none d-md-none d-sm-none d-block">
        <div class="container-fluid mb-2">
            <div class="row d-flex justify-content-center ">
                <div class="col-11">
                    <div class="youth-description">
                        <div data-aos="fade-up" data-aos-duration="300">For years young Syrian Christians have been
                            suffering in silence from immense daily hardships, and most lost Hope.
                            The prolonged frustration and distance from the
                            Christian Hope is pushing them towards immigration. Therefore,
                            Hope Center designed this meeting to create the
                            opportunity for this young generation to express their needs, discuss their problems, and
                            propose real
                            solutions that will help solve current problems.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="horizontal-line" data-aos="fade-up" data-aos-duration="300"></div>
        <div id="about-section" class="first-about" data-aos="fade-up" data-aos-duration="600">
            <div class="seperator-line" style="background: white;height: 1vw;"></div>
            <div class="container-fluid section-space mb-2">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 d-flex justify-content-start video-spaces">
                        <div class="video position-relative w-100" data-aos="fade-up"
                             data-aos-duration="600">
                            <iframe width="885" height="498" src="https://www.youtube.com/embed/gF8AzxiWRos"
                                    title="Syrian Christian Youth Gathering | Intro" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            <img src="/images/home/image-mask.png" class="image-mask"/>
                        </div>
                    </div>
                    <div class="col-11">
                        <div class="padding-screen text-end">
                            <div class="row">
                                <div class="col">
                                    <div class="youth-brief" data-aos="fade-up"
                                         data-aos-duration="800">
                                        @lang('youth.conference')
                                        <div class="youth-quote" data-aos="fade-up"
                                             data-aos-duration="1000">
                                            @lang('youth.together_small')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="horizontal-line" data-aos="fade-up" data-aos-duration="800"></div>
        <div id="about-section" class=" second-about" data-aos="fade-up" data-aos-duration="1000">
            <div class="container-fluid section-space mb-2">
                <div class="row">
                    <div class="col-12 mt-3" style="padding-right: 0;padding-left: 0vw;">
                        <div id="YouthCarouselSm1" class="carousel slide"
                             data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active position-relative">
                                    <img src="/images/youth/new/1.jpg" class="d-block w-100 h-100"
                                         style="object-fit: cover;">
                                    <img src="/images/home/image-mask.png" class="image-mask"/>
                                </div>
                                <div class="carousel-item position-relative">
                                    <img src="/images/youth/new/2.jpg" class="d-block w-100 h-100"
                                         style="object-fit: cover;">
                                    <img src="/images/home/image-mask.png" class="image-mask"/>
                                </div>
                                <div class="carousel-item position-relative">
                                    <img src="/images/youth/new/3.jpg" class="d-block w-100 h-100"
                                         style="object-fit: cover;">
                                    <img src="/images/home/image-mask.png" class="image-mask"/>
                                </div>
                                <div class="carousel-item position-relative">
                                    <img src="/images/youth/new/4.jpg" class="d-block w-100 h-100"
                                         style="object-fit: cover;">
                                    <img src="/images/home/image-mask.png" class="image-mask"/>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#YouthCarouselSm1"
                                    data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#YouthCarouselSm1"
                                    data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#YouthCarouselSm1" data-bs-slide-to="0"
                                        class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#YouthCarouselSm1" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#YouthCarouselSm1" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#YouthCarouselSm1" data-bs-slide-to="3"
                                        aria-label="Slide 4"></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="padding-screen">
                            <div class="row">
                                <div class="col d-flex justify-content-end flex-column">
                                    <div class="title" data-aos="fade-up"
                                         data-aos-duration="800">@lang('youth.work_title')
                                    </div>
                                    <font class="content" data-aos="fade-up"
                                          data-aos-duration="1000">
                                        @lang('youth.work')
                                    </font>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
        <div id="plan" class="section-space mb-2">
            <div data-aos="fade-up" data-aos-duration="1000">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mt-3" style="padding-right: 0;padding-left: 0vw;">
                            <div id="YouthCarouselSm2" class="carousel slide"
                                 data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active position-relative">
                                        <img src="/images/youth/new/5.jpg"
                                             class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <img src="/images/youth/new/6.jpg"
                                             class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <img src="/images/youth/new/7.jpg"
                                             class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <img src="/images/youth/new/8.jpg"
                                             class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#YouthCarouselSm2"
                                        data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#YouthCarouselSm2"
                                        data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#YouthCarouselSm2" data-bs-slide-to="0"
                                            class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#YouthCarouselSm2" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#YouthCarouselSm2" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#YouthCarouselSm2" data-bs-slide-to="3"
                                            aria-label="Slide 4"></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="padding-screen">
                                <div class="row">
                                    <div class="col d-flex justify-content-end flex-column mt-3">
                                        <div class="title" data-aos="fade-up"
                                             data-aos-duration="800">@lang('youth.objectives_title')
                                        </div>
                                        <font class="content" data-aos="fade-up"
                                              data-aos-duration="1000">
                                            @lang('youth.objectives')
                                        </font>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="horizontal-line" data-aos="fade-up" data-aos-duration="1000"></div>
        <div id="statistic-section" class="section-space">
            <div class="container-fluid">
                <div class="row" data-aos="fade-up" data-aos-duration="600">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-center flex-column align-items-center">
                        <div class="section-title mt-3">@lang('youth.participants_title')</div>
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                <div class="section-title-desc">
                                    <div data-aos="fade-up" data-aos-duration="300">More than 135 influencing young individuals will form 8 groups representing different locations in Syria, and these locations are: Damascus/Damascus villages, Aleppo, Homs, Hama, Lattakia,<br> Tartous, Daraa/Sweidaa, Hasaka/Qamishli</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--@else--}}
    <div class="d-lg-block d-md-block d-sm-block d-none">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="youth-description">@lang('youth.description')</div>
                </div>
            </div>
        </div>
        <div id="about-section" class="first-about">
            <div class="seperator-line" style="background: white;height: 1vw;"></div>
            <div class="horizontal-line d-lg-block d-md-block d-sm-block d-none"></div>
            <div style="margin-top: 7vw;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="padding-screen text-end">
                                <div class="row">
                                    <div class="col d-lg-flex d-md-flex d-sm-flex d-none align-items-center flex-column">
                                        <div class="youth-brief" data-aos="fade-up"
                                             data-aos-duration="800">
                                            @lang('youth.conference')
                                            <div class="youth-quote" data-aos="fade-up"
                                                 data-aos-duration="1000">
                                                @lang('youth.together')
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-lg-none d-md-none d-sm-none d-flex align-items-center flex-column">
                                        <div class="youth-brief" data-aos="fade-up"
                                             data-aos-duration="800">
                                            @lang('youth.conference')
                                            <div class="youth-quote" data-aos="fade-up"
                                                 data-aos-duration="1000">
                                                @lang('youth.together_small')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-start video-spaces">
                            <div class="video position-relative w-100" data-aos="fade-up"
                                 data-aos-duration="600">
                                <iframe width="885" height="498" src="https://www.youtube.com/embed/gF8AzxiWRos"
                                        title="Syrian Christian Youth Gathering | Intro" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                <img src="/images/home/image-mask.png" class="image-mask"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="about-section" class="section-space second-about">
            <div class="horizontal-line"></div>
            <div data-aos="fade-up" data-aos-duration="1000">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-start"
                             style="padding-right: 0;padding-left: 0vw;">
                            <div id="YouthCarousel1" class="carousel slide"
                                 data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active position-relative">
                                        <img src="/images/youth/new/1.jpg" class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <img src="/images/youth/new/2.jpg" class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <img src="/images/youth/new/3.jpg" class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <img src="/images/youth/new/4.jpg" class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#YouthCarousel1"
                                        data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#YouthCarousel1"
                                        data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#YouthCarousel1" data-bs-slide-to="0"
                                            class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#YouthCarousel1" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#YouthCarousel1" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#YouthCarousel1" data-bs-slide-to="3"
                                            aria-label="Slide 4"></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="padding-screen">
                                <div class="row">
                                    <div class="col d-flex justify-content-end flex-column">
                                        <div class="title" data-aos="fade-up"
                                             data-aos-duration="800">@lang('youth.work_title')
                                        </div>
                                        <font class="content" data-aos="fade-up"
                                              data-aos-duration="1000">
                                            @lang('youth.work')
                                        </font>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="plan" class="section-space">
            <div class="horizontal-line"></div>
            <div data-aos="fade-up" data-aos-duration="1000">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="padding-screen">
                                <div class="row">
                                    <div class="col d-flex justify-content-end flex-column">
                                        <div class="title" data-aos="fade-up"
                                             data-aos-duration="800">@lang('youth.objectives_title')
                                        </div>
                                        <font class="content" data-aos="fade-up"
                                              data-aos-duration="1000">
                                            @lang('youth.objectives')
                                        </font>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-start"
                             style="padding-right: 0;padding-left: 0vw;">
                            <div id="YouthCarousel2" class="carousel slide"
                                 data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active position-relative">
                                        <img src="/images/youth/new/5.jpg"
                                             class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <img src="/images/youth/new/6.jpg"
                                             class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <img src="/images/youth/new/7.jpg"
                                             class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                    <div class="carousel-item position-relative">
                                        <img src="/images/youth/new/8.jpg"
                                             class="d-block w-100 h-100"
                                             style="object-fit: cover;">
                                        <img src="/images/home/image-mask.png" class="image-mask"/>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#YouthCarousel2"
                                        data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#YouthCarousel2"
                                        data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#YouthCarousel2" data-bs-slide-to="0"
                                            class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#YouthCarousel2" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#YouthCarousel2" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#YouthCarousel2" data-bs-slide-to="3"
                                            aria-label="Slide 4"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="statistic-section" class="section-space">
            <div class="container-fluid">
                <div class="row" data-aos="fade-up" data-aos-duration="600">
                    <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                        <div class="section-title">@lang('youth.participants_title')</div>
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-12">
                                <div class="section-title-desc">
                                    @lang('youth.participants')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--@endif--}}
    <div class="horizontal-line last"></div>

    {{--@if($agent->isPhone())--}}
    {{--<div id="plan" class="section-space">--}}
    {{--<div class="horizontal-line"></div>--}}
    {{--<div data-aos="fade-up" data-aos-duration="1000">--}}
    {{--<div class="container-fluid">--}}
    {{--<div class="row">--}}
    {{--<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-start"--}}
    {{--style="padding-right: 0;padding-left: 0.1vw;">--}}
    {{--<div id="YouthCarousel2" class="carousel slide"--}}
    {{--data-bs-ride="carousel">--}}
    {{--<div class="carousel-inner">--}}
    {{--<div class="carousel-item active position-relative">--}}
    {{--<img src="/images/youth/new/5.jpg"--}}
    {{--class="d-block w-100 h-auto"--}}
    {{--style="object-fit: cover;">--}}
    {{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
    {{--</div>--}}
    {{--<div class="carousel-item position-relative">--}}
    {{--<img src="/images/youth/new/6.jpg"--}}
    {{--class="d-block w-100 h-auto"--}}
    {{--style="object-fit: cover;">--}}
    {{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
    {{--</div>--}}
    {{--<div class="carousel-item position-relative">--}}
    {{--<img src="/images/youth/new/7.jpg"--}}
    {{--class="d-block w-100 h-auto"--}}
    {{--style="object-fit: cover;">--}}
    {{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
    {{--</div>--}}
    {{--<div class="carousel-item position-relative">--}}
    {{--<img src="/images/youth/new/8.jpg"--}}
    {{--class="d-block w-100 h-auto"--}}
    {{--style="object-fit: cover;">--}}
    {{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<button class="carousel-control-prev" type="button" data-bs-target="#YouthCarousel2"--}}
    {{--data-bs-slide="prev">--}}
    {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
    {{--<span class="visually-hidden">Previous</span>--}}
    {{--</button>--}}
    {{--<button class="carousel-control-next" type="button" data-bs-target="#YouthCarousel2"--}}
    {{--data-bs-slide="next">--}}
    {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
    {{--<span class="visually-hidden">Next</span>--}}
    {{--</button>--}}
    {{--<div class="carousel-indicators">--}}
    {{--<button type="button" data-bs-target="#YouthCarousel2" data-bs-slide-to="0"--}}
    {{--class="active" aria-current="true"--}}
    {{--aria-label="Slide 1"></button>--}}
    {{--<button type="button" data-bs-target="#YouthCarousel2" data-bs-slide-to="1"--}}
    {{--aria-label="Slide 2"></button>--}}
    {{--<button type="button" data-bs-target="#YouthCarousel2" data-bs-slide-to="2"--}}
    {{--aria-label="Slide 3"></button>--}}
    {{--<button type="button" data-bs-target="#YouthCarousel2" data-bs-slide-to="3"--}}
    {{--aria-label="Slide 4"></button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">--}}
    {{--<div class="padding-screen">--}}
    {{--<div class="row">--}}
    {{--<div class="col d-flex justify-content-end flex-column">--}}
    {{--<div class="title" data-aos="fade-up"--}}
    {{--data-aos-duration="800">@lang('youth.objectives_title')--}}
    {{--</div>--}}
    {{--<font class="content" data-aos="fade-up"--}}
    {{--data-aos-duration="1000">--}}
    {{--@lang('youth.objectives')--}}
    {{--</font>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endif--}}

</section>
@include('new.public.footer')
@stack('fancyVideo')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
</body>
</html>
