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
    <link href="{{asset('css/font-lato.css')}}" rel='stylesheet' type='text/css'>
    @include('new.public.components.analytics-head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta name="description" content="@lang('family2family.description')">
    <meta name="keywords" content="aleppo syria, hope, center, micro project, projects, caritas poland"/>
    <title>@lang('what_we_do.family')</title>

    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/family_page_new.css')}}" rel="stylesheet" type="text/css">

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
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
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
    {{--<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>--}}
    <script src="/css/chartjs-plugin-datalabels@2.0.0"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>--}}
    {{--<script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>--}}

</head>
<body>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')
<div id="Family" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                    </div>
                    <div class="content">
                        <div class="main_title" data-aos="fade-up" data-aos-duration="600">Aid Program</div>
                        <div class="main_subtitle" data-aos="fade-up" data-aos-duration="1000">Family To Family</div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                    <img src="/images/logos/Family-to-Family.svg" class="d-block project-logo" data-aos="fade-up"
                         data-aos-duration="1000">
                </div>
            </div>
        </div>
    </div>
    @if($agent->isPhone())
        <div id="HomeCarousel" class="carousel slide" data-aos="fade-up" data-bs-ride="carousel"
             data-aos-duration="800">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true"
                        aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="2" aria-current="true"
                        aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active position-relative">
                    <img src="/images/home/F2F/1.jpg" class="d-block w-100 h-100" style="object-fit: cover;">
                    <img src="/images/home/image-mask.png" class="image-mask"/>
                </div>
                <div class="carousel-item position-relative">
                    <img src="/images/home/F2F/2.jpg" class="d-block w-100 h-100" style="object-fit: cover;">
                    <img src="/images/home/image-mask.png" class="image-mask"/>
                </div>
                <div class="carousel-item position-relative">
                    <img src="/images/home/F2F/3.jpg" class="d-block w-100 h-100" style="object-fit: cover;">
                    <img src="/images/home/image-mask.png" class="image-mask"/>
                </div>
                <div class="carousel-item position-relative">
                    <img src="/images/home/F2F/4.jpg" class="d-block w-100 h-100" style="object-fit: cover;">
                    <img src="/images/home/image-mask.png" class="image-mask"/>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#HomeCarousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#HomeCarousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @else
        <div id="HomeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true"
                        aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="2" aria-current="true"
                        aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active position-relative">
                    <img src="/images/home/F2F/1.jpg" class="d-block w-100 h-100" style="object-fit: cover;">
                    <img src="/images/home/image-mask.png" class="image-mask"/>
                </div>
                <div class="carousel-item position-relative">
                    <img src="/images/home/F2F/2.jpg" class="d-block w-100 h-100" style="object-fit: cover;">
                    <img src="/images/home/image-mask.png" class="image-mask"/>
                </div>
                <div class="carousel-item position-relative">
                    <img src="/images/home/F2F/3.jpg" class="d-block w-100 h-100" style="object-fit: cover;">
                    <img src="/images/home/image-mask.png" class="image-mask"/>
                </div>
                <div class="carousel-item position-relative">
                    <img src="/images/home/F2F/4.jpg" class="d-block w-100 h-100" style="object-fit: cover;">
                    <img src="/images/home/image-mask.png" class="image-mask"/>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#HomeCarousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#HomeCarousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif
    <div class="small horizontal-line d-lg-none d-md-none d-sm-none d-block" style="margin-top: 6vw" data-aos="fade-up"
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
                                        <div data-aos="fade-up" data-aos-duration="800"><span>“</span>And
                                            the King shall
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">answer and say</div>
                                        <div data-aos="fade-up" data-aos-duration="800">unto them, Verily
                                            I
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">say unto you, In
                                            as
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">much as ye have
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">done it unto one
                                            of
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">the least of these
                                            my
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">brethren, ye have
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">done it unto
                                            me<span>“</span></div>
                                        <div class="quote-source" data-aos="fade-up"
                                             data-aos-duration="1000">
                                            Matthew 25:40
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-lg-none d-md-none d-sm-none d-flex align-items-center flex-column"
                                     style="margin-top: 5vw">
                                    <div class="quote" data-aos="fade-up"
                                         data-aos-duration="800">
                                        <div data-aos="fade-up" data-aos-duration="800"><span>“</span>And
                                            the King shall answer and say unto them,
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">Verily I say unto
                                            you, In as much as ye have
                                            done it unto
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="800">
                                            one of the least of these my
                                            brethren, ye have
                                            done it unto me <span>“</span>
                                        </div>
                                    </div>
                                    <div class="quote-source" data-aos="fade-up"
                                         data-aos-duration="1000">
                                        Matthew 25:40
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-start video-spaces">
                        <div class="video position-relative w-100 h-100" data-aos="fade-up"
                             data-aos-duration="600">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/ApyHAvgggcE"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            <img src="/images/home/image-mask.png" class="image-mask"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-lg-none d-md-none d-sm-none d-block">
        <div class="horizontal-line" data-aos="fade-up" style="margin-top: 3vw;"
             data-aos-duration="800"></div>
    </div>
    @include('new.public.components.project-brief-section', ['project' => $brief])
    <div class="d-lg-none d-md-none d-sm-none d-block">
        <div class="horizontal-line" data-aos="fade-up"
             data-aos-duration="800"></div>
    </div>
    {{--@endif--}}
    <div id="statistic-section" class="small-margin section-space" data-aos="fade-up" data-aos-duration="600">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                    <div class="section-title">Statistics</div>
                </div>
            </div>
            <div class="row statistics-container d-lg-block d-md-block d-sm-block d-none">
                <div class="col">
                    <div class="page-margin">
                        <div class="statistics-description">
                            In 2022, A Survey was Conducted to Assess the Accurate Needs of Christian Families in
                            ALEPPO, the Assessment Included…
                        </div>
                        <div class="general-info" data-aos="fade-up" data-aos-duration="700">
                            <img class="statis-svg" src="/images/initiatives/Family to Family/s1.svg">
                        </div>
                        <div class="general-info" data-aos="fade-up" data-aos-duration="800">
                            <img class="statis-svg" src="/images/initiatives/Family to Family/s2.svg">
                        </div>
                        <div class="general-info" data-aos="fade-up" data-aos-duration="900">
                            <img class="statis-svg" src="/images/initiatives/Family to Family/s3.svg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row statistics-container d-lg-none d-md-none d-sm-none d-block">
                <div class="col">
                    <div class="page-margin">
                        <div class="statistics-description">
                            In 2022, A Survey was Conducted to Assess the Accurate Needs of Christian Families in
                            ALEPPO, the Assessment Included…
                        </div>
                        <div class="general-info" data-aos="fade-up" data-aos-duration="700">
                            <img class="statis-svg" src="/images/initiatives/Family to Family/statis-mobile/s1.svg">
                        </div>
                        <div class="general-info" data-aos="fade-up" data-aos-duration="800">
                            <img class="statis-svg" src="/images/initiatives/Family to Family/statis-mobile/s2.svg">
                        </div>
                        <div class="general-info" data-aos="fade-up" data-aos-duration="900">
                            <img class="statis-svg" src="/images/initiatives/Family to Family/statis-mobile/s3.svg">
                        </div>
                        <div class="general-info" data-aos="fade-up" data-aos-duration="1100">
                            <img class="statis-svg" src="/images/initiatives/Family to Family/statis-mobile/s4.svg">
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="container-fluid">--}}
            {{--<div class="row">--}}
            {{--<div class="col-12 d-flex justify-content-center flex-column align-items-center">--}}
            {{--<div class="section-title">Statistics</div>--}}
            {{--<div class="row d-flex justify-content-center text-center">--}}
            {{--<div class="col">--}}
            {{--                            @if($agent->isPhone())--}}
            {{--<div class="d-lg-none d-md-none d-sm-none d-block">--}}
            {{--<div class="section-title-desc">--}}
            {{--<div data-aos="fade-up" data-aos-duration="300">Throughout 2021, Hope Center--}}
            {{--conducted an assessment--}}
            {{--</div>--}}
            {{--<div data-aos="fade-up" data-aos-duration="600">for--}}
            {{--almost 7,253 families, this helped assessing the--}}
            {{--families--}}
            {{--</div>--}}
            {{--<div data-aos="fade-up" data-aos-duration="900">and--}}
            {{--conclude statistics about current situations--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@else--}}
            {{--<div class="d-lg-block d-md-block d-sm-block d-none">--}}
            {{--<div class="section-title-desc">--}}
            {{--<div data-aos="fade-up" data-aos-duration="300">Throughout 2022, Hope Center--}}
            {{--conducted an assessment for--}}
            {{--almost 7,789 families,--}}
            {{--</div>--}}
            {{--<div data-aos="fade-up" data-aos-duration="600">this helped assessing the--}}
            {{--families and--}}
            {{--conclude statistics--}}
            {{--</div>--}}
            {{--<div data-aos="fade-up" data-aos-duration="900">about current situations--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endif--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="horizontal-line"></div>--}}
            {{--<div class="row">--}}
            {{--<div class="col-6 d-flex justify-content-start"></div>--}}
            {{--<div class="col-6 d-flex justify-content-start flex-column lh-sm"--}}
            {{--style="padding-left: 3vw;">--}}
            {{--<div class="statistics-num count_int" data-aos="fade-up">--}}
            {{--{{$personCount}}--}}
            {{--23510--}}
            {{--</div>--}}
            {{--<div class="statistics-title text-capitalize" data-aos="fade-up"--}}
            {{--data-aos-duration="800">individuals--}}
            {{--</div>--}}
            {{--<div class="row d-flex justify-content-start mt-3">--}}
            {{--<canvas id="personChart"></canvas>--}}
            {{--<div class="d-flex align-items-center" data-aos="fade-up"--}}
            {{--data-aos-duration="800">--}}
            {{--<div class="statistics-num-detail count_int">{{$statistics[0]->Illness}}</div>--}}
            {{--<div class="statistics-num-detail count_int">4655</div>--}}
            {{--<span>Elderlies aged 65 or above</span>--}}
            {{--</div>--}}
            {{--<div class="d-flex align-items-center" data-aos="fade-up"--}}
            {{--data-aos-duration="800">--}}
            {{--<div class="statistics-num-detail count_int">{{$statistics[0]->Students}} </div>--}}
            {{--<div class="statistics-num-detail count_int">313</div>--}}
            {{--<span>Children aged 3 or under</span>--}}
            {{--</div>--}}
            {{--<div class="d-flex align-items-center" data-aos="fade-up"--}}
            {{--data-aos-duration="800">--}}
            {{--<div class="statistics-num-detail count_int">{{$statistics[0]->Household}} </div>--}}
            {{--<span> Househeld Women</span>--}}
            {{--<div class="statistics-num-detail count_int">34.15%</div>--}}
            {{--<span>Unemployed members<br> (between 25 and 50 years old)</span>--}}
            {{--</div>--}}
            {{--<div class="d-flex align-items-center" data-aos="fade-up"--}}
            {{--data-aos-duration="800">--}}
            {{--<div class="statistics-num-detail count_int">{{$statistics[0]->Elderlies}} </div>--}}
            {{--<span> Elderlies</span>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="container-fluid">--}}
            {{--<div class="row">--}}
            {{--<div class="col-6 d-flex justify-content-end text-end flex-column lh-sm first-statistics-col">--}}
            {{--<div class="statistics-num count_int" data-aos="fade-up"--}}
            {{--data-aos-duration="600">7789--}}
            {{--{{$familyCount}}--}}
            {{--</div>--}}
            {{--<div class="statistics-title text-capitalize" data-aos="fade-up"--}}
            {{--data-aos-duration="800">families--}}
            {{--</div>--}}
            {{--<div class="row d-flex justify-content-end mt-3">--}}
            {{--<canvas id="familyChart"></canvas>--}}
            {{--<div class="d-flex align-items-center justify-content-end" data-aos="fade-up"--}}
            {{--data-aos-duration="800">--}}
            {{--<span> IDP's</span>--}}
            {{--<span>Lack Access to Electricity</span>--}}
            {{--<div class="statistics-num-detail count_int">2615--}}
            {{--{{$statistics[0]->IDPs}}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="d-flex align-items-center justify-content-end" data-aos="fade-up"--}}
            {{--data-aos-duration="800">--}}
            {{--<span> Rented House</span>--}}
            {{--<span>Selling Household Appliances</span>--}}
            {{--<div class="statistics-num-detail count_int">1198--}}
            {{--{{$statistics[0]->Rented_House}}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="d-flex align-items-center justify-content-end" data-aos="fade-up"--}}
            {{--data-aos-duration="800">--}}
            {{--<span> Unsafe Living Condition</span>--}}
            {{--<span>Women Headed Households</span>--}}
            {{--<div class="statistics-num-detail count_int">3312--}}
            {{--{{$statistics[0]->Unsafe}} --}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="d-flex align-items-center justify-content-end" data-aos="fade-up"--}}
            {{--data-aos-duration="800">--}}
            {{--<span> War Losses</span>--}}
            {{--<div class="statistics-num-detail count_int">{{$statistics[0]->War_losses}} </div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-6 d-flex justify-content-start"></div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    <div data-aos="fade-up" data-aos-duration="800">
        <div class="horizontal-line"></div>
    </div>
    <div id="partner-section" class="section-space" data-aos="fade-up"
         data-aos-duration="600">
        <div class="col-12 d-flex justify-content-center flex-column align-items-center">
            <div class="section-title mt-3">Partners</div>
        </div>
        <div class="small horizontal-line"></div>
        <div class="container-fluid animated-container">
            <div class="row" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xxl-6 p-0"
                     style="background-color: #f4f4f4;">
                    <div id="animatedCarousel1" class="h-100 carousel slide" data-bs-ride="carousel"
                         data-bs-pause="false">
                        <div class="carousel-inner">
                            <?php $k = 0 ?>
                            @foreach($partners as $partner)
                                <div class="carousel-item @if($k++ == 0) active @endif" data-bs-interval="5000">
                                    <div class="container-fluid">
                                        <div class="padding-screen">
                                            <div class="row w-100 mb-3 animated fadeInUp"
                                                 style="animation-delay: .1s">
                                                <div class="col-12 d-flex justify-content-start">
                                                    <img class="animated-logo"
                                                         src="{{ucfirst($partner->logo)}}">
                                                </div>
                                            </div>
                                            <div class="row w-100 animated fadeInUp m-0"
                                                 style="animation-delay: .8s">
                                                <div class="col-10 p-0">
                                                    <div
                                                        class="animated-title">{{ucfirst($partner->english->title)}}</div>
                                                </div>
                                                <div class="col-2 p-0 d-flex justify-content-end align-items-center">
                                                    @if($partner->video != '0')
                                                        <a href="{{$partner->video}}" class="launch-modal"
                                                           id="partnerVideo-{{$partner->id}}"
                                                           data-fancybox="partnerVideo-{{$partner->id}}">
                                                            <img class="video-icon"
                                                                 src="/images/ico/video-ini-icon.svg">
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-title-section animated fadeInUp"
                                                 style="animation-delay: .8s"></div>
                                            <div class="animated-content animated fadeInUp"
                                                 style="animation-delay: 1s">
                                                <p innerText= {{strip_tags($partner->english->content)}}></p>
                                                @if(strlen($partner->english->content)>40)
                                                    <p>{!!implode(' ', array_slice(explode(' ', strip_tags($partner->english->content)), 0, 40)).'...'!!}</p>
                                                @else
                                                    <p>{!! strip_tags($partner->english->content) !!}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if(strlen($partner->english->content)>40)
                                        <div class="d-flex justify-content-end">
                                            <a class="readmore-btn animated fadeInUp"
                                               style="animation-delay: 1.2s"
                                               href="{{ route('new.public.initiative', [ 'family-to-family', $partner->id,
                                                       Str::slug(strtolower($partner->english->title))]) }}">@lang('main.readMore')</a>
                                        </div>
                                    @endif
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
                            @foreach($partners as $partner)
                                <button id="animatedCarousel1Dots_{{$partner->id}}" type="button"
                                        data-bs-target="#animatedCarousel1"
                                        data-bs-slide-to="{{$k++}}"
                                        @if($k == 1) class="active" @endif>
                                </button>
                            @endforeach
                            {{--</div>--}}
                        </div>

                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xxl-6 p-0 position-relative mt-6">
                    <div id="animatedCarousel2" class="h-100 carousel slide" data-bs-ride="carousel"
                         data-bs-pause="false">
                        <div class="carousel-inner">
                            <?php $k = 0 ?>
                            @foreach($partners as $partner)
                                <div class="carousel-item @if($k++ == 0) active @endif" data-bs-interval="5000">
                                    <img style="object-fit: cover" class="w-100 h-100"
                                         style="animation-delay: .1s"
                                         src="/images/initiatives/Family to Family/p{{$k}}.jpg">
                                    <img src="/images/home/image-mask.png" class="image-mask"/>

                                </div>
                            @endforeach
                            <button role="button" class="carousel-control-prev position-absolute"
                                    data-bs-target="#animatedCarousel2" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button role="button" class="carousel-control-next position-absolute"
                                    data-bs-target="#animatedCarousel2" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="carousel-indicators justify-content-center">
                            {{--<div class="indicators">--}}
                            <?php $k = 0 ?>
                            @foreach($partners as $partner)
                                <button id="animatedCarousel2Dots_{{$partner->id}}" type="button"
                                        onclick="changeSlide({{$partner->id}})"
                                        data-bs-target="#animatedCarousel2"
                                        data-bs-slide-to="{{$k++}}"
                                        @if($k == 1) class="active" @endif>
                                </button>
                            @endforeach
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-aos="fade-up" data-aos-duration="800">
        <div class="horizontal-line"></div>
    </div>
    <div class="page-margin">
        <div class="container-fluid">
            <div id="map-section" class="section-space" data-aos="fade-up"
                 data-aos-duration="600">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center p-0">
                            <div class="section-title">Distribution Locations</div>
                        </div>
                    </div>
                </div>
                <div class="small horizontal-line"></div>
                <div id='family_map' class="map" data-aos="fade-up" data-aos-duration="600"></div>
            </div>
        </div>
    </div>
    <div data-aos="fade-up"
         data-aos-duration="800">
        <div class="horizontal-line"></div>
    </div>
    @include('new.public.components.project-partners-section', ['donors_ongoing' => $partners_ongoing,'donors_previous' => $partners_previous])
    <div class="last horizontal-line"></div>
</div>


{{--<script>--}}
{{--$(window).scroll(familychartScroll);--}}
{{--var familyview = false;--}}

{{--function isScrolledIntoViewFamilyChart(elem) {--}}
{{--var documentViewTopfamily = $(window).scrollTop();--}}
{{--var documentViewBottomfamily = documentViewTopfamily + $(window).height();--}}

{{--var elementTopfamily = $(elem).offset().top;--}}
{{--var elementBottomfamily = elementTopfamily + $(elem).height();--}}

{{--return ((elementBottomfamily <= documentViewBottomfamily) && (elementTopfamily >= documentViewTopfamily));--}}
{{--}--}}

{{--function familychartScroll() {--}}
{{--Chart.register(ChartDataLabels);--}}
{{--if (isScrolledIntoViewFamilyChart($("#familyChart")) && !familyview) {--}}
{{--familyview = true;--}}
{{--start_family_count();--}}
{{--}--}}
{{--}--}}

{{--function start_family_count() {--}}
{{--const familychart = document.getElementById('familyChart');--}}


{{--const familylabels = ["IDP's", 'War Losses', 'Rented House', 'Unsafety'];--}}
{{--const familydata = {--}}
{{--labels: familylabels,--}}
{{--datasets: [--}}
{{--{--}}
{{--data:--}}
{{--[{x: "IDP's", y: "{{$statistics[0]->IDPs}}"},--}}
{{--null,--}}
{{--{x: "Rented House", y: "{{$statistics[0]->Rented_House}}"},--}}
{{--null,--}}
{{--{x: "War Losses", y: "{{$statistics[0]->Rented_House}"},--}}
{{--null,--}}
{{--{x: "Unsafe Living Condition", y: "{{$statistics[0]->Unsafe}}"},--}}
{{--null],--}}
{{--data:--}}
{{--[--}}
{{--{x: "Unsafe Living Condition", y: "{{$statistics[0]->Unsafe}}"},--}}
{{--{x: "War Losses", y: "{{$statistics[0]->War_losses}}"},--}}
{{--{x: "Rented House", y: "{{$statistics[0]->Rented_House}}"},--}}
{{--{x: "IDP's", y: "{{$statistics[0]->IDPs}}"}--}}
{{--],--}}
{{--data:--}}
{{--[--}}
{{--{{$statistics[0]->IDPs}},--}}
{{--{{$statistics[0]->War_losses}},--}}
{{--{{$statistics[0]->Rented_House}},--}}
{{--{{$statistics[0]->Unsafe}},--}}
{{--],--}}
{{--backgroundColor: ["#6d6e71", "#BC1818", "#939598", "#414042"]--}}
{{--// fill: false,--}}
{{--}--}}
{{--]--}}
{{--};--}}
{{--new Chart(familychart, {--}}
{{--type: 'pie',--}}
{{--data: familydata,--}}
{{--plugins: [ChartDataLabels],--}}
{{--options: {--}}
{{--plugins: {--}}
{{--legend: {--}}
{{--display: false--}}
{{--},--}}
{{--title: {--}}
{{--display: false--}}
{{--},--}}
{{--// labels: {--}}
{{--//     // render: 'value',--}}
{{--//     fontColor: ['white', 'white', 'white','white'],--}}
{{--// },--}}
{{--datalabels: {--}}
{{--useHTML: true,--}}
{{--enabled: true,--}}
{{--color: '#ffffff',--}}
{{--textAnchor: 'end',--}}
{{--formatter: ((context, args) => {--}}
{{--const index = args.dataIndex;--}}
{{--return args.chart.data.labels[index] + '\n' + context;--}}
{{--}),--}}
{{--font: {--}}
{{--weight: 'bold',--}}
{{--size: 13,--}}
{{--}--}}
{{--}--}}
{{--// colorschemes: {--}}
{{--//     scheme: 'office.NewsPrint6'--}}
{{--// },--}}
{{--},--}}

{{--// maintainAspectRatio: true,--}}
{{--// spanGaps: true,--}}
{{--// responsive: true,--}}

{{--// scales: {--}}
{{--//     y: {--}}
{{--//         min: 100,--}}
{{--//         max: 9000,--}}
{{--//         ticks: {--}}
{{--//             // forces step size to be 500 units--}}
{{--//             stepSize: 50--}}
{{--//         }--}}
{{--//     }--}}
{{--// },--}}
{{--animations: {--}}
{{--tension: {--}}
{{--duration: 1000,--}}
{{--easing: 'linear',--}}
{{--from: 1,--}}
{{--to: 0,--}}
{{--loop: false--}}
{{--}--}}
{{--}--}}
{{--},--}}
{{--});--}}
{{--}--}}
{{--</script>--}}
{{--<script>--}}
{{--$(window).scroll(personchartScroll);--}}
{{--var personview = false;--}}
{{--Chart.register(ChartDataLabels);--}}

{{--function isScrolledIntoViewPersonChart(elem) {--}}
{{--var documentViewTopperson = $(window).scrollTop();--}}
{{--var documentViewBottomperson = documentViewTopperson + $(window).height();--}}

{{--var elementTopPerson = $(elem).offset().top;--}}
{{--var elementBottomPerson = elementTopPerson + $(elem).height();--}}

{{--return ((elementBottomPerson <= documentViewBottomperson) && (elementTopPerson >= documentViewTopperson));--}}
{{--}--}}

{{--function personchartScroll() {--}}
{{--if (isScrolledIntoViewPersonChart($("#personChart")) && !personview) {--}}
{{--personview = true;--}}
{{--start_person_count();--}}
{{--}--}}
{{--}--}}

{{--function start_person_count() {--}}
{{--const personchart = document.getElementById('personChart');--}}
{{--const personlabels = ['Individuals','Illness', 'Students', 'Women', 'Elderlies'];--}}
{{--const persondata = {--}}
{{--labels: personlabels,--}}
{{--datasets: [--}}
{{--{--}}
{{--data:--}}
{{--[--}}
{{--{x: "Illness", y: "{{$statistics[0]->Illness}}"},--}}
{{--{x: "Students", y: "{{$statistics[0]->Students}}"},--}}
{{--{x: "Household Headed Women", y: "{{$statistics[0]->Household}}"},--}}
{{--{x: "Elderlies", y: "{{$statistics[0]->Elderlies}}"}--}}
{{--],--}}
{{--fill: false,--}}
{{--data:--}}
{{--[--}}
{{--{label : 'Illness' , value: {{$statistics[0]->Illness}}},--}}
{{--{label : 'Students' , value: {{$statistics[0]->Students}}},--}}
{{--{label : 'Household' , value: {{$statistics[0]->Household}}},--}}
{{--{label : 'Elderlies' , value: {{$statistics[0]->Elderlies}}},--}}
{{--{{$personCount}},--}}
{{--{{$statistics[0]->Illness}},--}}
{{--{{$statistics[0]->Students}},--}}
{{--2000,--}}
{{--{{$statistics[0]->Household}},--}}
{{--{{$statistics[0]->Elderlies}},--}}
{{--],--}}
{{--backgroundColor: ["#6d6e71", "#BC1818", "#939598", "#414042"]--}}
{{--},--}}
{{--]--}}
{{--};--}}
{{--new Chart(personchart, {--}}
{{--type: 'pie',--}}
{{--data: persondata,--}}
{{--plugins: [ChartDataLabels],--}}
{{--options: {--}}
{{--// plugins: [CharDataLabels],--}}
{{--// maintainAspectRatio: true,--}}
{{--// spanGaps: true,--}}
{{--// responsive: true,--}}
{{--plugins: {--}}
{{--legend: {--}}
{{--display: false--}}
{{--},--}}
{{--title: {--}}
{{--display: false--}}
{{--},--}}
{{--// labels: {--}}
{{--//     render: 'value',--}}
{{--//     fontColor: ['green', 'white', 'red']--}}
{{--// },--}}
{{--datalabels: {--}}
{{--useHTML: true,--}}
{{--enabled: true,--}}
{{--color: '#ffffff',--}}
{{--textAnchor: 'end',--}}
{{--formatter: ((context, args) => {--}}
{{--const index = args.dataIndex;--}}
{{--return args.chart.data.labels[index] + '\n' + context;--}}
{{--}),--}}
{{--font: {--}}
{{--weight: 'bold',--}}
{{--size: 13,--}}
{{--}--}}
{{--}--}}
{{--// colorschemes: {--}}
{{--//     scheme: 'office.NewsPrint6'--}}
{{--// }--}}
{{--},--}}
{{--// scales: {--}}
{{--//     y: {--}}
{{--//         min: 100,--}}
{{--//         max: 9000,--}}
{{--//         ticks: {--}}
{{--//             // forces step size to be 500 units--}}
{{--//             stepSize: 50--}}
{{--//         }--}}
{{--//     }--}}
{{--// },--}}
{{--animations: {--}}
{{--tension: {--}}
{{--duration: 1000,--}}
{{--easing: 'linear',--}}
{{--from: 1,--}}
{{--to: 0,--}}
{{--loop: false--}}
{{--}--}}
{{--}--}}
{{--},--}}
{{--});--}}
{{--}--}}
{{--</script>--}}

<script>
    $(window).scroll(testScroll);
    var viewed = false;

    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    function testScroll() {
        if (isScrolledIntoView($(".count_int")) && !viewed) {
            viewed = true;
            $('.count_int').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 4000,
                    easing: 'swing',
                    // step: function (now) {
                    //     $(this).text(Math.ceil(now));
                    // }
                    step: function () {
                        var num = Math.ceil(this.Counter).toString();
                        if (Number(num) > 999) {
                            while (/(\d+)(\d{3})/.test(num)) {
                                num = num.replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
                            }
                        }
                        $(this).text(num);
                    }
                });
            });
        }
    }
</script>
<script>
    $(window).on('keydown', function (e) {
        if (e.keyCode === 39) {
            $("#animatedCarousel1 .carousel-control-next").trigger('click');
            $("#animatedCarousel2 .carousel-control-next").trigger('click');
        } else if (e.keyCode === 37) {
            $("#animatedCarousel1 .carousel-control-prev").trigger('click');
            $("#animatedCarousel2 .carousel-control-prev").trigger('click');
        }
    });


    $(window).on('load', function (e) {
        $("#animatedCarousel2 .carousel-control-prev").click(() => {
            $("#animatedCarousel1 .carousel-control-prev").trigger('click');
        });
        $("#animatedCarousel2 .carousel-control-next").click(() => {
            $("#animatedCarousel1 .carousel-control-next").trigger('click');
        });
    });
</script>
<script>
    function changeSlide(id) {
        var element = document.getElementById('animatedCarousel1Dots_' + id);
        element.click();
    }
</script>
{{--<script>--}}
{{--function openVideo($id){--}}
{{--// var video = document.getElementById('modal-video-'+$id);--}}
{{--$('#modal-video-'+$id).modal('show');--}}
{{--}--}}
{{--</script>--}}
{{--<script>--}}
{{--$(".nav").on("click", function(){--}}
{{--$(".nav li a").find(".active").removeClass("active");--}}
{{--$(this).parent().addClass("active");--}}
{{--});--}}
{{--</script>--}}
@include('new.public.footer')

{{--<script>--}}
{{--window.onload = function () {--}}
{{--setInterval(function () {--}}
{{--document.getElementById('preloader').style.display = 'block';--}}
{{--document.getElementById('Family').style.display = 'none';--}}
{{--}, 2000);--}}
{{--};--}}
{{--</script>--}}
{{--<script>--}}
{{--$('.count_int').each(function () {--}}
{{--$(this).prop('Counter', 0).animate({--}}
{{--Counter: $(this).text()--}}
{{--}, {--}}
{{--duration: 2000,--}}
{{--easing: 'swing',--}}
{{--step: function (now) {--}}
{{--$(this).text(Math.ceil(this.Counter));--}}
{{--}--}}
{{--});--}}
{{--});--}}
{{--</script>--}}
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
{{--<script>--}}
{{--$(window).scroll(testScroll);--}}
{{--var viewed = false;--}}

{{--function isScrolledIntoView(elem) {--}}
{{--var docViewTop = $(window).scrollTop();--}}
{{--var docViewBottom = docViewTop + $(window).height();--}}

{{--var elemTop = $(elem).offset().top;--}}
{{--var elemBottom = elemTop + $(elem).height();--}}

{{--return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));--}}
{{--}--}}

{{--function testScroll() {--}}
{{--if (isScrolledIntoView($(".count_int")) && !viewed) {--}}
{{--viewed = true;--}}
{{--$('.count_int').each(function () {--}}
{{--$(this).prop('Counter', 0).animate({--}}
{{--Counter: $(this).text()--}}
{{--}, {--}}
{{--duration: 4000,--}}
{{--easing: 'swing',--}}
{{--step: function (now) {--}}
{{--$(this).text(Math.ceil(now));--}}
{{--}--}}
{{--});--}}
{{--});--}}
{{--}--}}
{{--}--}}
{{--</script>--}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
{{--<script>--}}
{{--$('.count_int').each(function () {--}}
{{--$(this).prop('Counter', 0).animate({--}}
{{--Counter: $(this).text()--}}
{{--}, {--}}
{{--duration: 2000,--}}
{{--easing: 'swing',--}}
{{--step: function (now) {--}}
{{--$(this).text(Math.ceil(this.Counter));--}}
{{--}--}}
{{--});--}}
{{--});--}}
{{--</script>--}}
<script>
    let FMap, markersFamily = [];
    let iconDefault = L.icon({
        iconRetinaUrl: '/images/ico/marker-icon-2x-red.png',
        iconUrl: '/images/ico/marker-icon-2x-red.png',
        iconSize: [18, 28],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        tooltipAnchor: [16, -28],
    });

    /* ----------------------------- Initialize Map ----------------------------- */
    function initFamilyMap() {
        FMap = L.map('family_map', {
            center: {
                lat: 36.21291103506083,
                lng: 37.1521353849693,
            },
            zoom: 15
        });
        L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png?api_key=7f38c51a-41e4-4cf8-b943-4b9cf994ab08', {
            maxZoom: 20,
            attribution: ''
        }).addTo(FMap);
    }

    /* --------------------------- Initialize Markers --------------------------- */
    function initMarkers() {
        let f_lat, f_long, f_location_latitude, f_location_longtitude, f_marker;
        @foreach($familyMap as $map)
            f_location_latitude = "{{$map->location_latitude}}";
        f_location_longtitude = "{{$map->location_longtitude}}";
        f_lat = parseFloat(f_location_latitude);
        f_long = parseFloat(f_location_longtitude);
        f_marker = L.marker([f_lat, f_long], {icon: iconDefault});
        f_marker.addTo(FMap).bindPopup(`<b></b> {{{$map->name}}}`);
        markersFamily.push(f_marker);
        @endforeach
    }
</script>
<script>
    setTimeout(function () {
        initFamilyMap();
        initMarkers();
    }, 2000);
</script>
@stack('fancyVideo')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
</body>
</html>
