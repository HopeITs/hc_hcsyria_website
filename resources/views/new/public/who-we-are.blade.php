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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta name="description" content="@lang('family2family.description')">
    <meta name="keywords" content="aleppo syria, hope, center, micro project, projects, caritas poland"/>
    <title>Who We Are</title>

    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/who-we-are.css')}}" rel="stylesheet" type="text/css">

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    {{--<link rel="shortcut icon" href="/public/fonts/Avenir%20LT%20Std%2045%20Book.otf">--}}
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin=''/>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
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
    {{--<script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>--}}
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-colorschemes@0.4.0/dist/chartjs-plugin-colorschemes.js"></script>--}}
    <link rel="stylesheet" href="/css/animate.min.css"
          integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="/css/lato.css" rel="stylesheet">
    {{--<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>--}}
    <script src="/js/chartjs-plugin-datalabels@2.0.0"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>--}}
    {{--<script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>--}}
    <style>
        #animatedCarousel1 .carousel-control-prev, #animatedCarousel1 .carousel-control-next, #animatedCarousel1 .carousel-indicators {
            visibility: visible !important;
        }
    </style>
</head>

<body>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')
<div id="Who" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                    </div>
                    <div class="content">
                        <div class="main_title" data-aos="fade-up" data-aos-duration="600">SOME SEE A HOPELESS END</div>
                        <div class="main_subtitle" data-aos="fade-up" data-aos-duration="1000">OTHERS SEE AN ENDLESS
                            HOPE
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                </div>
            </div>
        </div>
    </div>
    @include('new.public.partials.cover-carousel', ['carouselImages' => $carouselImages])
    <div class="small horizontal-line d-lg-none d-md-none d-sm-none d-block" style="margin-top: 3vw" data-aos="fade-up"
         data-aos-duration="800"></div>
    <div id="about-section" class="first-about">
        <div class="seperator-line" style="background: white;height: 1vw;"></div>
        <div class="horizontal-line d-lg-block d-md-block d-sm-block d-none"></div>
        <div style="margin-top: 7vw" data-aos="fade-up" data-aos-duration="1000">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="mt-lg-0 mt-md-0 mt-sm-0 padding-screen">
                            <div class="row">
                                <div class="col d-lg-flex d-md-flex d-sm-flex d-none align-items-center flex-column">
                                    <div class="quote" data-aos="fade-up" data-aos-duration="800">
                                        <div data-aos="fade-up" data-aos-duration="800"><span>“</span>And let us
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">consider how we</div>
                                        <div data-aos="fade-up" data-aos-duration="800">may spur one
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">another on
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">toward love and
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">good deeds <span>“</span>
                                        </div>
                                        <div class="quote-source" data-aos="fade-up"
                                             data-aos-duration="1000">
                                            Hebrews 10:24
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-lg-none d-md-none d-sm-none d-flex align-items-center flex-column"
                                     style="margin-top: 5vw">
                                    <div class="quote" data-aos="fade-up"
                                         data-aos-duration="800">
                                        <div data-aos="fade-up" data-aos-duration="800"><span>“</span>And let us
                                            consider how we may
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">
                                            spur one another on toward love and good deeds<span>“</span>
                                        </div>
                                    </div>
                                    <div class="quote-source" data-aos="fade-up"
                                         data-aos-duration="1000">
                                        Hebrews 10:24
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-start video-spaces">
                        <div class="video position-relative w-100 h-100" data-aos="fade-up"
                             data-aos-duration="600">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/UUyye_iD2eU"
                                    title="Christian Hope Center Introduction" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            <img src="/images/home/image-mask.png" class="image-mask"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-line d-lg-none d-md-none d-sm-none d-block" data-aos="fade-up"></div>
    <div id="who-we-are" class="section-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-center flex-column align-items-center aos-init aos-animate"
                     data-aos="fade-up" data-aos-duration="800">
                    <div class="section-title">Who We Are</div>
                </div>
            </div>
        </div>
    </div>
    <div class="small horizontal-line aos-init" data-aos="fade-up" data-aos-duration="600"></div>
    <div class="card-height mb-3" data-aos="fade-up" data-aos-duration="600">
        <div class="page-margin">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center align-items-center" data-aos="fade-up"
                     data-aos-duration="800">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-center align-items-center">
                        <div class="logo-container d-flex justify-content-center align-items-center">
                            <img class="w-75 h-75" src="/images/logos/hc.svg">
                        </div>
                        {{--<div class="row w-100 d-flex align-items-center">--}}
                            {{--<div class="col d-flex justify-content-center" data-aos="fade-up" data-aos-duration="300"></div>--}}
                            {{--<div class="col d-flex justify-content-center" data-aos="fade-up" data-aos-duration="600">--}}
                            {{--<div class="logo-container">--}}
                            {{--<img class="w-100 h-100" src="/images/logos/hc.svg">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col d-flex justify-content-center" data-aos="fade-up" data-aos-duration="900">--}}
                                {{--<div class="logo-container">--}}
                                    {{--<img class="w-100 h-100" src="/images/newLogos/JM.svg">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 about-content" data-aos="fade-up"
                         data-aos-duration="2000">
                        <div>
                            <b>Christian Hope Center</b> is a Syrian non- profit NGO, established in 2018 and headquartered in Aleppo.
                        </div>
                        <div>
                            The organization operates across multiple regions of Syria, delivering humanitarian and development interventions in response to the country’s ongoing needs.
                        </div>
                        Christian Hope Center works in the fields of emergency response, relief assistance, early recovery, community development, and Water, Sanitation, and Hygiene (WASH). Through these programs, the organization aims to strengthen community resilience, promote livelihoods and financial self-reliance.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-line aos-init" data-aos="fade-up" data-aos-duration="600"></div>
    <div id="values-section" class="section-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="col-12 d-flex justify-content-center flex-column align-items-center pt-3">
            <div class="section-title text-capitalize">our values</div>
        </div>
        <div class="small horizontal-line"></div>
        <div class="container-fluid animated-container">
            <div class="row" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xxl-6 p-0 position-relative mt-6">
                    <img style="object-fit: cover" class="w-100 h-100"
                         src="/images/mission/Responsibility.jpg">
                    <img src="/images/home/image-mask.png" class="image-mask"/>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xxl-6 p-0">
                    <div id="animatedCarousel1" class="h-100 carousel slide" data-bs-ride="carousel" data-bs-interval="8000"
                         data-bs-pause="false">
                        <div class="carousel-inner">
                            <?php $k = 0 ?>
                            @foreach($values as $value)
                                <div class="carousel-item @if($k++ == 0) active @endif">
                                    <div class="animated-content">
                                        <div class="container-fluid">
                                            <div class="padding-screen">
                                                <div style="animation-delay: .1s"
                                                     class="pb-3 text-uppercase animated fadeInUp">{{strip_tags($value->name)}}</div>
                                                <div style="animation-delay: .8s" class="quote animated fadeInUp"><span>“</span>{{strip_tags($value->quote)}}
                                                    <span>“</span></div>
                                                <div style="animation-delay: 1.2s"
                                                     class="quote-source text-center mt-2 animated fadeInUp">{{strip_tags($value->quote_source)}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <button role="button" class="carousel-control-prev position-absolute"
                                    data-bs-target="#animatedCarousel1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button role="button" class="carousel-control-next position-absolute"
                                    data-bs-target="#animatedCarousel1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="carousel-indicators justify-content-center">
                            {{--<div class="indicators">--}}
                            <?php $k = 0 ?>
                            @foreach($values as $value)
                                <button id="animatedCarousel1Dots_{{$value->id}}" type="button"
                                        data-bs-target="#animatedCarousel1"
                                        data-bs-slide-to="{{$k++}}"
                                        @if($k == 1)class="active" @endif>
                                </button>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-aos="fade-up" data-aos-duration="800">
        <div class="horizontal-line"></div>
    </div>
    <div id="mission-section" class="small-margin section-space" data-aos="fade-up" data-aos-duration="600">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                    <div class="section-title">Our Mission</div>
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col">
                            {{--                            @if($agent->isPhone())--}}
                            <div class="d-lg-none d-md-none d-sm-none d-block">
                                <div class="section-title-desc">
                                    <div data-aos="fade-up" data-aos-duration="300">Our mission is to uphold the
                                        Christian presence in Syria by providing
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="600"> support and assistance to Christian
                                        families. We believe that the family unit is the foundation of society, and
                                        through our programs,
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="900">we aim to support every aspect of
                                        family life.
                                    </div>
                                </div>
                            </div>
                            {{--@else--}}
                            <div class="d-lg-block d-md-block d-sm-block d-none">
                                <div class="section-title-desc">
                                    <div data-aos="fade-up" data-aos-duration="300">Our mission is to uphold the
                                        Christian presence in Syria by providing support and assistance to Christian
                                        families.
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="600">We believe that the family unit is
                                        the foundation of society, and through our programs,
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="900">we aim to support every aspect of
                                        family life.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-aos="fade-up" data-aos-duration="800">
        <div class="horizontal-line"></div>
    </div>
    <div id="vision-section" class="section-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="col-12 d-flex justify-content-center flex-column align-items-center pt-3">
            <div class="section-title text-capitalize">our vision and strategy</div>
        </div>
        <div class="small horizontal-line"></div>
        <div class="container-fluid animated-container">
            <div class="row" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xxl-6 p-0">
                    <div id="animatedCarouselVision1" class="h-100 carousel slide" data-bs-pause="false" data-bs-interval="8000"
                         data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="animated-content">
                                    <div class="container-fluid">
                                        <div class="padding-screen">
                                            <div class="vision-main-title text-capitalize"> family support</div>
                                            <div class="vision-title animated">we aspire to support our
                                                community
                                                to promote:
                                            </div>
                                            <div style="animation-delay: .8s" class=" animated fadeInUp">
                                                <span
                                                        class="vision-content"> Sustainable and income generating opportunities for
                                                family providers to become an active agent of
                                                economic and social recovery.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="animated-content">
                                    <div class="container-fluid">
                                        <div class="padding-screen">
                                            <div class="vision-main-title text-capitalize"> youth support</div>
                                            <div
                                                    class="vision-title">we aspire to support our
                                                community
                                                to promote:
                                            </div>
                                            <div style="animation-delay: .8s" class="animated fadeInUp">
                                                <span class="vision-content"> Skilled youth with better job opportunities motivated to stay in their country, fostering economic growth and community stability.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="animated-content">
                                    <div class="container-fluid">
                                        <div class="padding-screen">
                                            <div class="vision-main-title text-capitalize"> children support</div>
                                            <div
                                                    class=" vision-title">we aspire to support our
                                                community
                                                to promote:
                                            </div>
                                            <div style="animation-delay: .8s" class=" animated fadeInUp">
                                                <span
                                                        class="vision-content"> Children with quality education and
                                                creative opportunities in all aspects of
                                                    growth and development.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="animated-content">
                                    <div class="container-fluid">
                                        <div class="padding-screen">
                                            <div class="vision-main-title text-capitalize"> elderlies support</div>
                                            <div
                                                    class=" vision-title">we aspire to support our
                                                community
                                                to promote:
                                            </div>
                                            <div style="animation-delay: .8s" class="animated fadeInUp">
                                                <span
                                                        class="vision-content"> Resilient, Self- sufficient families that are
                                                less reliant on relief aids, especially most
                                                    vulnerable elderly families.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button role="button" class="carousel-control-prev position-absolute"
                                    data-bs-target="#animatedCarouselVision1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button role="button" class="carousel-control-next position-absolute"
                                    data-bs-target="#animatedCarouselVision1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="carousel-indicators justify-content-center">
                            <button id="animatedCarouselVision1Dots_1" type="button" onclick="changeVisionSlide(1)"
                                    data-bs-target="#animatedCarouselVision1" data-bs-slide-to="0" class="active"
                                    aria-current="true">
                            </button>
                            <button id="animatedCarouselVision1Dots_2" type="button" onclick="changeVisionSlide(2)"
                                    data-bs-target="#animatedCarouselVision1" data-bs-slide-to="1" class="">
                            </button>
                            <button id="animatedCarouselVision1Dots_3" type="button" onclick="changeVisionSlide(3)"
                                    data-bs-target="#animatedCarouselVision1" data-bs-slide-to="2" class="">
                            </button>
                            <button id="animatedCarouselVision1Dots_4" type="button" onclick="changeVisionSlide(4)"
                                    data-bs-target="#animatedCarouselVision1" data-bs-slide-to="3" class="">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xxl-6 p-0 position-relative mt-6">
                    <div id="animatedCarouselVision2" data-bs-pause="false" data-bs-interval="8000"
                         class="animatedCarouselVision2 h-100 carousel slide"
                         data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" style="object-fit: cover"
                                     src="/images/who-we-serve/elderlies.jpg"
                                     class="d-block w-100 h-100" style="object-fit: cover;">
                                <img src="/images/home/image-mask.png" class="image-mask"/>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 h-100" style="object-fit: cover"
                                     src="/images/who-we-serve/youth.jpg"
                                     class="d-block w-100 h-100" style="object-fit: cover;">
                                <img src="/images/home/image-mask.png" class="image-mask"/>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 h-100" style="object-fit: cover"
                                     src="/images/who-we-serve/children.jpg">
                                <img src="/images/home/image-mask.png" class="image-mask"/>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100 h-100" style="object-fit: cover"
                                     src="/images/who-we-serve/family.jpg">
                                <img src="/images/home/image-mask.png" class="image-mask"/>
                            </div>
                            <button role="button" class="carousel-control-prev position-absolute"
                                    data-bs-target="#animatedCarouselVision2" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button role="button" class="carousel-control-next position-absolute"
                                    data-bs-target="#animatedCarouselVision2" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="carousel-indicators justify-content-center">
                            <button id="animatedCarouselVision1Dots_1" type="button" onclick="changeVisionSlide(1)"
                                    data-bs-target="#animatedCarouselVision2" data-bs-slide-to="0" class="active"
                                    aria-current="true">
                            </button>
                            <button id="animatedCarouselVision1Dots_2" type="button" onclick="changeVisionSlide(2)"
                                    data-bs-target="#animatedCarouselVision2" data-bs-slide-to="1" class="">
                            </button>
                            <button id="animatedCarouselVision1Dots_3" type="button" onclick="changeVisionSlide(3)"
                                    data-bs-target="#animatedCarouselVision2" data-bs-slide-to="2" class="">
                            </button>
                            <button id="animatedCarouselVision1Dots_4" type="button" onclick="changeVisionSlide(4)"
                                    data-bs-target="#animatedCarouselVision2" data-bs-slide-to="3" class="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-aos="fade-up"
         data-aos-duration="800">
        <div class="horizontal-line"></div>
    </div>
    <div id="donor-section" class="section-space">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="600">
                <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                    <div class="section-title">Our Partners</div>
                </div>
            </div>
            <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="600"></div>
        </div>
        <div class="card-height aos-init aos-animate" data-aos="fade-up"
             data-aos-duration="600">
            <div class="container-fluid">
                <div class="row d-flex justify-content-evenly align-items-center  mt-4"
                     data-aos="fade-up" data-aos-duration="800">
                    @foreach($donors as $donor)
                        @if($loop->index <8 )
                            <div class="col-lg-1 col-md-1 col-sm-1 col-4  mb-4 d-flex align-items-center justify-content-center">
                                @if($donor->id==13)
                                    <div class="missio-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id==12)
                                    <div class="missio-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 5)
                                    <div class="kerk-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 15)
                                    <div class="kerk-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 4)
                                    <div class="kerk-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 3)
                                    <div class="louvre-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 6)
                                    <div class="louvre-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 8)
                                    <div class="hungary-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @else
                                    <div class="project-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @endif
                                {{--<div class="logo-container">--}}
                                {{--<img class="w-100 h-100" src="{{$donor -> logo}}"--}}
                                {{--style="object-fit: contain">--}}
                                {{--</div>--}}
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row d-flex justify-content-evenly align-items-center "
                     data-aos="fade-up" data-aos-duration="800">
                    @foreach($donors as $donor)
                        @if($loop->index >=8 )
                            <div class="col-lg-1 p-0 col-md-1 col-sm-1 col-4 mb-4 d-flex align-items-center justify-content-center">
                                @if($donor->id==13)
                                    <div class="missio-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id==12)
                                    <div class="missio-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 5)
                                    <div class="kerk-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 15)
                                    <div class="kerk-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 4)
                                    <div class="kerk-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 3)
                                    <div class="louvre-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 6)
                                    <div class="louvre-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 8)
                                    <div class="hungary-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 16)
                                    <div class="missio-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 17)
                                    <div class="louvre-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @elseif($donor->id== 18)
                                    <div class="louvre-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @else
                                    <div class="project-donor-logo">
                                        <img class="w-100 h-100" style="object-fit: contain"
                                             src="{{$donor -> logo}}">
                                    </div>
                                @endif
                                {{--<div class="logo-container">--}}
                                {{--<img class="w-100 h-100" src="{{$donor -> logo}}"--}}
                                {{--style="object-fit: contain">--}}
                                {{--</div>--}}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="last horizontal-line"></div>
{{--<div class="d-lg-none d-md-none d-sm-none d-block">--}}
{{--<div class="horizontal-line" data-aos="fade-up" style="margin-top: 3vw;"--}}
{{--data-aos-duration="800"></div>--}}
{{--</div>--}}
{{--<div class="d-lg-none d-md-none d-sm-none d-block">--}}
{{--<div id="about-section" class=" second-about section-space">--}}
{{--<div data-aos="fade-up" data-aos-duration="1000">--}}
{{--<div class="container-fluid">--}}
{{--<div class="row d-flex align-items-center">--}}
{{--<div class="col-12">--}}
{{--<div class="mt-1" style="padding: 0vw 11vw 0vw 4.7vw;">--}}
{{--<div class="row">--}}
{{--<div class="col-12 d-flex justify-content-start" data-aos="fade-up"--}}
{{--data-aos-duration="600">--}}
{{--<img src="/images/newLogos/Family-to-Family.svg" style="margin-top: -5vw"--}}
{{--class="d-lg-block d-none project-logo">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row" style="margin-top: 3vw;">--}}
{{--<div class="col d-flex justify-content-end flex-column">--}}
{{--<div class="project-brief" data-aos="fade-up"--}}
{{--data-aos-duration="800">Project Brief--}}
{{--</div>--}}
{{--<font class="project-brief-desc" data-aos="fade-up"--}}
{{--data-aos-duration="1000">--}}
{{--Family-to-Family program is an initiative that--}}
{{--started in 2016, by Caritas Poland. <br>The projects’--}}
{{--objective is to provide financial support starting--}}
{{--from the Polish families’ donations to families in--}}
{{--Aleppo on a monthly basis, in order to partially--}}
{{--meet their needs and rekindle hope in their hearts.<br>--}}
{{--Hope center plays a role in implementing the F2F--}}
{{--program by monitoring and evaluating the process.--}}

{{--</font>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-12"--}}
{{--style="padding-right: 0;padding-left: 0.1vw;">--}}
{{--<div id="FamilyCarouselSm" class="carousel slide mt-1 mb-4"--}}
{{--data-bs-ride="carousel">--}}
{{--<div class="carousel-inner position-relative">--}}
{{--<div class="carousel-item active">--}}
{{--<img class="w-100 h-100" style="object-fit: cover"--}}
{{--src="/images/initiatives/Family to Family/f1.jpg"--}}
{{--class="d-block w-100 h-100" style="object-fit: cover;">--}}
{{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
{{--</div>--}}
{{--<div class="carousel-item">--}}
{{--<img class="w-100 h-100" style="object-fit: cover"--}}
{{--src="/images/initiatives/Family to Family/f2.jpg"--}}
{{--class="d-block w-100 h-100" style="object-fit: cover;">--}}
{{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
{{--</div>--}}
{{--<div class="carousel-item">--}}
{{--<img class="w-100 h-100" style="object-fit: cover"--}}
{{--src="/images/initiatives/Family to Family/f3.jpg"--}}
{{--class="d-block w-100 h-100" style="object-fit: cover;">--}}
{{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
{{--</div>--}}
{{--<div class="carousel-item">--}}
{{--<img class="w-100 h-100" style="object-fit: cover"--}}
{{--src="/images/initiatives/Family to Family/f4.jpg"--}}
{{--class="d-block w-100 h-100" style="object-fit: cover;">--}}
{{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
{{--</div>--}}
{{--</div>--}}
{{--<button class="carousel-control-prev" type="button"--}}
{{--data-bs-target="#FamilyCarouselSm"--}}
{{--data-bs-slide="prev">--}}
{{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--<span class="visually-hidden">Previous</span>--}}
{{--</button>--}}
{{--<button class="carousel-control-next" type="button"--}}
{{--data-bs-target="#FamilyCarouselSm"--}}
{{--data-bs-slide="next">--}}
{{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--<span class="visually-hidden">Next</span>--}}
{{--</button>--}}
{{--<div class="carousel-indicators">--}}
{{--<button type="button" data-bs-target="#FamilyCarouselSm" data-bs-slide-to="0"--}}
{{--class="active" aria-current="true"--}}
{{--aria-label="Slide 1"></button>--}}
{{--<button type="button" data-bs-target="#FamilyCarouselSm" data-bs-slide-to="1"--}}
{{--aria-label="Slide 2"></button>--}}
{{--<button type="button" data-bs-target="#FamilyCarouselSm" data-bs-slide-to="2"--}}
{{--aria-label="Slide 3"></button>--}}
{{--<button type="button" data-bs-target="#FamilyCarouselSm" data-bs-slide-to="3"--}}
{{--aria-label="Slide 4"></button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="d-lg-block d-md-block d-sm-block d-none">--}}
{{--<div id="about-section" class="second-about section-space">--}}
{{--<div class="horizontal-line"></div>--}}
{{--<div data-aos="fade-up" data-aos-duration="1000">--}}
{{--<div class="container-fluid">--}}
{{--<div class="row d-flex align-items-center">--}}
{{--<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-start"--}}
{{--style="padding-right: 0;padding-left: 0.1vw;">--}}
{{--<div id="FamilyCarousel" class="carousel slide"--}}
{{--data-bs-ride="carousel">--}}
{{--<div class="carousel-inner position-relative">--}}
{{--<div class="carousel-item active">--}}
{{--<img class="w-100 h-100" style="object-fit: cover"--}}
{{--src="/images/initiatives/Family to Family/f1.jpg"--}}
{{--class="d-block w-100 h-100" style="object-fit: cover;">--}}
{{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
{{--</div>--}}
{{--<div class="carousel-item">--}}
{{--<img class="w-100 h-100" style="object-fit: cover"--}}
{{--src="/images/initiatives/Family to Family/f2.jpg"--}}
{{--class="d-block w-100 h-100" style="object-fit: cover;">--}}
{{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
{{--</div>--}}
{{--<div class="carousel-item">--}}
{{--<img class="w-100 h-100" style="object-fit: cover"--}}
{{--src="/images/initiatives/Family to Family/f3.jpg"--}}
{{--class="d-block w-100 h-100" style="object-fit: cover;">--}}
{{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
{{--</div>--}}
{{--<div class="carousel-item">--}}
{{--<img class="w-100 h-100" style="object-fit: cover"--}}
{{--src="/images/initiatives/Family to Family/f4.jpg"--}}
{{--class="d-block w-100 h-100" style="object-fit: cover;">--}}
{{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
{{--</div>--}}
{{--</div>--}}
{{--<button class="carousel-control-prev" type="button"--}}
{{--data-bs-target="#FamilyCarousel"--}}
{{--data-bs-slide="prev">--}}
{{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--<span class="visually-hidden">Previous</span>--}}
{{--</button>--}}
{{--<button class="carousel-control-next" type="button"--}}
{{--data-bs-target="#FamilyCarousel"--}}
{{--data-bs-slide="next">--}}
{{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--<span class="visually-hidden">Next</span>--}}
{{--</button>--}}
{{--<div class="carousel-indicators">--}}
{{--<button type="button" data-bs-target="#FamilyCarousel" data-bs-slide-to="0"--}}
{{--class="active" aria-current="true"--}}
{{--aria-label="Slide 1"></button>--}}
{{--<button type="button" data-bs-target="#FamilyCarousel" data-bs-slide-to="1"--}}
{{--aria-label="Slide 2"></button>--}}
{{--<button type="button" data-bs-target="#FamilyCarousel" data-bs-slide-to="2"--}}
{{--aria-label="Slide 3"></button>--}}
{{--<button type="button" data-bs-target="#FamilyCarousel" data-bs-slide-to="3"--}}
{{--aria-label="Slide 4"></button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">--}}
{{--<div class="mt-lg-0 mt-md-0 mt-sm-0 mt-5" style="padding: 0vw 11vw 0vw 4.7vw;">--}}
{{--<div class="row">--}}
{{--<div class="col-12 d-flex justify-content-start" data-aos="fade-up"--}}
{{--data-aos-duration="600">--}}
{{--<img src="/images/newLogos/Family-to-Family.svg" style="margin-top: -5vw"--}}
{{--class="d-lg-block d-none project-logo">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row" style="margin-top: 3vw;">--}}
{{--<div class="col d-flex justify-content-end flex-column">--}}
{{--<div style="height: 35px"></div>--}}
{{--<div class="project-brief" data-aos="fade-up"--}}
{{--data-aos-duration="800">Project Brief--}}
{{--</div>--}}
{{--<font class="project-brief-desc" data-aos="fade-up"--}}
{{--data-aos-duration="1000">--}}
{{--Family-to-Family program is an initiative that--}}
{{--started in 2016, by Caritas Poland. <br>The projects’--}}
{{--objective is to provide financial support starting--}}
{{--from the Polish families’ donations to families in--}}
{{--Aleppo on a monthly basis, in order to partially--}}
{{--meet their needs and rekindle hope in their hearts.<br>--}}
{{--Hope center plays a role in implementing the F2F--}}
{{--program by monitoring and evaluating the process.--}}

{{--</font>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="d-lg-none d-md-none d-sm-none d-block">--}}
{{--<div class="horizontal-line" data-aos="fade-up"--}}
{{--data-aos-duration="800"></div>--}}
{{--</div>--}}
{{--<div id="partner-section" class="section-space" data-aos="fade-up"--}}
{{--data-aos-duration="600">--}}
{{--<div class="col-12 d-flex justify-content-center flex-column align-items-center">--}}
{{--<div class="section-title">Partners</div>--}}
{{--</div>--}}
{{--<div class="small horizontal-line"></div>--}}
{{--<div class="container-fluid animated-container">--}}
{{--<div class="row" data-aos="fade-up" data-aos-duration="1000">--}}
{{--<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xxl-6 p-0"--}}
{{--style="background-color: #F7F7FB;">--}}
{{--<div id="animatedCarousel1" class="h-100 carousel slide" data-bs-ride="carousel">--}}
{{--<div class="carousel-inner">--}}
{{--<?php $k = 0 ?>--}}
{{--@foreach($partners as $partner)--}}
{{--<div class="carousel-item @if($k++ == 0) active @endif">--}}
{{--<div class="container-fluid">--}}
{{--<div class="padding-screen">--}}
{{--<div class="row w-100 mb-3 animated fadeInUp"--}}
{{--style="animation-delay: .1s">--}}
{{--<div class="col-12 d-flex justify-content-start">--}}
{{--<img class="animated-logo"--}}
{{--src="{{ucfirst($partner->logo)}}">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row w-100 animated fadeInUp m-0"--}}
{{--style="animation-delay: .8s">--}}
{{--<div class="col-10 p-0">--}}
{{--<div class="animated-title">{{ucfirst($partner->english->title)}}</div>--}}
{{--</div>--}}
{{--<div class="col-2 p-0 d-flex justify-content-end align-items-center">--}}
{{--@if($partner->video != '0')--}}
{{--<a href="{{$partner->video}}" class="launch-modal"--}}
{{--id="partnerVideo-{{$partner->id}}"--}}
{{--data-fancybox="partnerVideo-{{$partner->id}}">--}}
{{--<img class="video-icon"--}}
{{--src="/images/ico/video-ini-icon.svg">--}}
{{--</a>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="card-title-section animated fadeInUp"--}}
{{--style="animation-delay: .8s"></div>--}}
{{--<div class="animated-content animated fadeInUp"--}}
{{--style="animation-delay: 1s">--}}
{{--<p innerText= {{strip_tags($partner->english->content)}}></p>--}}
{{--@if(strlen($partner->english->content)>40)--}}
{{--<p>{!!implode(' ', array_slice(explode(' ', strip_tags($partner->english->content)), 0, 40)).'...'!!}</p>--}}
{{--@else--}}
{{--<p>{!! strip_tags($partner->english->content) !!}</p>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@if(strlen($partner->english->content)>40)--}}
{{--<div class="d-flex justify-content-end">--}}
{{--<a class="readmore-btn animated fadeInUp"--}}
{{--style="animation-delay: 1.2s"--}}
{{--href="{{ route('new.public.initiative', [ 'family-to-family', $partner->id,--}}
{{--str_slug(strtolower($partner->english->title))]) }}">@lang('main.readMore')</a>--}}
{{--</div>--}}
{{--@endif--}}
{{--</div>--}}
{{--<button role="button" class="carousel-control-prev position-absolute"--}}
{{--data-bs-target="#animatedCarousel1" data-bs-slide="prev">--}}
{{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--<span class="visually-hidden">Previous</span>--}}
{{--</button>--}}
{{--<button role="button" class="carousel-control-next position-absolute"--}}
{{--data-bs-target="#animatedCarousel1" data-bs-slide="next">--}}
{{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--<span class="visually-hidden">Next</span>--}}
{{--</button>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--<div class="carousel-indicators justify-content-center">--}}
{{--<div class="indicators">--}}
{{--<?php $k = 0 ?>--}}
{{--@foreach($partners as $partner)--}}
{{--<button id="animatedCarousel1Dots_{{$partner->id}}" type="button"--}}
{{--data-bs-target="#partnerCarousel1"--}}
{{--data-bs-slide-to="{{$k++}}"--}}
{{--@if($k == 1)class="active" @endif>--}}
{{--</button>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}
{{--<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xxl-6 p-0 position-relative mt-6">--}}
{{--<div id="animatedCarousel2" class="h-100 carousel slide" data-bs-ride="carousel">--}}
{{--<div class="carousel-inner">--}}
{{--<?php $k = 0 ?>--}}
{{--@foreach($partners as $partner)--}}
{{--<div class="carousel-item @if($k++ == 0) active @endif">--}}
{{--<img style="object-fit: cover" class="w-100 h-100"--}}
{{--src="/images/initiatives/Family to Family/p{{$k}}.jpg">--}}
{{--<img src="/images/home/image-mask.png" class="image-mask"/>--}}
{{--<button role="button" class="carousel-control-prev position-absolute"--}}
{{--data-bs-target="#animatedCarousel2" data-bs-slide="prev">--}}
{{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--<span class="visually-hidden">Previous</span>--}}
{{--</button>--}}
{{--<button role="button" class="carousel-control-next position-absolute"--}}
{{--data-bs-target="#animatedCarousel2" data-bs-slide="next">--}}
{{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--<span class="visually-hidden">Next</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--<div class="carousel-indicators justify-content-center">--}}
{{--<div class="indicators">--}}
{{--<?php $k = 0 ?>--}}
{{--@foreach($partners as $partner)--}}
{{--<button id="animatedCarousel2Dots_{{$partner->id}}" type="button"--}}
{{--onclick="changeSlide({{$partner->id}})"--}}
{{--data-bs-target="#animatedCarousel2"--}}
{{--data-bs-slide-to="{{$k++}}"--}}
{{--@if($k == 1) class="active" @endif>--}}
{{--</button>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div data-aos="fade-up" data-aos-duration="800">--}}
{{--<div class="horizontal-line"></div>--}}
{{--</div>--}}
<div class="last horizontal-line"></div>
</div>
<script>
    $(window).on('keydown', function (e) {
        if (e.keyCode === 39) {
            $("#animatedCarousel1 .carousel-control-next").trigger('click');
            $("#animatedCarousel2 .carousel-control-next").trigger('click');
        }
        else if (e.keyCode === 37) {
            $("#animatedCarousel1 .carousel-control-prev").trigger('click');
            $("#animatedCarousel2 .carousel-control-prev").trigger('click');
        }
        if (e.keyCode === 39) {
            $("#animatedCarouselVision1 .carousel-control-next").trigger('click');
            $("#animatedCarouselVision2 .carousel-control-next").trigger('click');
        }
        else if (e.keyCode === 37) {
            $("#animatedCarouselVision1 .carousel-control-prev").trigger('click');
            $("#animatedCarouselVision2 .carousel-control-prev").trigger('click');
        }
    });
    $(window).on('load', function () {

        $("#animatedCarousel2 .carousel-control-prev").click(() => {
            $("#animatedCarousel1 .carousel-control-prev").trigger('click');
        });
        $("#animatedCarousel2 .carousel-control-next").click(() => {
            $("#animatedCarousel1 .carousel-control-next").trigger('click');
        });
        $("#animatedCarouselVision2 .carousel-control-prev").click(() => {
            $("#animatedCarouselVision1 .carousel-control-prev").trigger('click');
        });
        $("#animatedCarouselVision2 .carousel-control-next").click(() => {
            $("#animatedCarouselVision1 .carousel-control-next").trigger('click');
        });
            let animated1 = document.getElementById("animatedCarouselVision1");
            let animated2 = document.getElementById("animatedCarouselVision2");


        // Create a carousel instance

        // let myCarousel2 = new bootstrap.Carousel(animated2);
        // // console.log(myCarousel1);
        // // let myCarousel2 = new bootstrap.Carousel(animated2);
        // animated1.addEventListener("mouseover", function(){
        //     // alert('hi');
        //     myCarousel2.pause();
        //     // animated1.carousel('pause');
        //     // animated2.carousel('pause');
        // });
        // animated2.addEventListener("mouseover", function(){
            // animated1.carousel('pause');
            // animated2.carousel('pause');
        // });
        // myCarousel2.addEventListener("hover", function(){
        //     myCarousel1.pause();
        // });


    });
</script>
<script>
    function changeSlide(id) {
        let element = document.getElementById('animatedCarousel1Dots_' + id);
        element.click();
    }

    function changeVisionSlide(id) {
        let element = document.getElementById('animatedCarouselVision1Dots_' + id);
        element.click();
    }

    // function pauseCarousel(id) {
    //     let animated1 = document.getElementById("animatedCarouselVision1");
    //     let animated2 = document.getElementById("animatedCarouselVision2");
    //     if(id === 1){
    //         animated2.pause();
    //     }
    //     else
    //         animated1.pause();
    // }
</script>
@include('new.public.footer')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
@stack('fancyVideo')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
</body>
</html>
