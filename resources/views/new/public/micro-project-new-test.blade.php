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
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/chartjs-plugin-datalabels@2.0.0-rc"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/4.0.1/infinite-scroll.pkgd.js"
            integrity="sha512-CfFrR8W+mw2E3c3McWMxLRtDKf6jy04tlvFJfmW6/EAXejfqsFQ9xAnVndYRpPugc/86T6XO3bL79V4OJ2GiQg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href='/css/lato.css' rel='stylesheet' type='text/css'>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta name="description" content="@lang('micro-project.description')">
    <meta name="keywords" content="aleppo syria, hope, center, micro project, projects, caritas poland"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('main.micro')</title>

    <link href="{{asset('css/main-new-test.css')}}" rel="stylesheet">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet">
    <link href="{{asset('css/tabs.css')}}" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link href="{{asset('css/font-lato.css')}}" rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link href='https://fonts.googleapis.com/css?family=Martel' rel='stylesheet'>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="/js/aos.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    {{--<script type="text/javascript" src="/js/fancybox.config.js"></script>--}}
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script src='/js/leaflet.js' crossorigin=''></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <link rel="stylesheet" href="/css/micro_page_new-test.css">
    <link rel="stylesheet" href="/css/leaflet.css">
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>
    <script type="text/javascript" src="/js/swipe.js"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://pandameister.github.io/chartjs-chart-radial-gauge/docs/js/Chart.RadialGauge.umd.js"></script>
</head>
<body style="overflow-x: hidden;">
@include('new.public.components.analytics-body')
<div id="fb-root"></div>
<script>(function (d, s, id) {
        let js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=2133577546862306&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@php
    $active = 'micro';
@endphp
<div id="Micro" class="page_start">
        <div class="preloader">
            <div class="preloader-gif"></div>
        </div>
    @include('new.public.navbar')
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                    </div>
                    <div class="content">
                        <div class="main_title" data-aos="fade-up"
                             data-aos-duration="600">BE SUCCESSFUL & INSPIRE OTHERS TO BE
                        </div>
                        <div class="main_subtitle" data-aos="fade-up"
                             data-aos-duration="1000">MICRO PROJECTS
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                    <img src="/images/logos/micro.svg" class="d-block project-logo" data-aos="fade-up"
                         data-aos-duration="1000">
                </div>
            </div>
        </div>
    </div>
    @include('new.public.partials.cover-carousel', ['carouselImages' => $carouselImages])
    <div class="small horizontal-line d-lg-none d-md-none d-sm-none d-block" data-aos="fade-up"
         data-aos-duration="800" style="margin-top: 5vw;"></div>
    @include('new.public.components.project-brief-section', ['project' => $brief])
    <div class="horizontal-line small d-lg-none d-md-none d-sm-none d-block mt-3" data-aos="fade-up"
         data-aos-duration="800"></div>

    <div id="statistic-section" class="d-lg-block d-md-block d-sm-block d-none small-margin section-space mb-2 "
         data-aos="fade-up"
         data-aos-duration="800">
        <div class="micro-statistics-container">
            <div class="row " data-aos="fade-up" data-aos-duration="600">
                <div class="col-12 d-flex justify-content-center">
                    <div class="micro-statistics-title pb-0">Statistics</div>
                </div>
            </div>

            <div class="micro-page-margin">
                <div class="micro-page-margin-container">

                    <div class="d-grid gap-4 parent grid-parent">

                        {{--Carousel--}}
                        <div style="grid-area: 1 / 1 / 3 / 3; overflow: hidden;">
                            <div id="MicroCarousel" class="carousel slide h-100 w-100"
                                 data-bs-ride="carousel"
                                 data-bs-interval="5500"
                                 data-bs-pause="hover">

                                <div class="carousel-inner h-100">
                                    @for ($i = 1; $i <= 8; $i++)
                                        <div class="carousel-item {{ $i == 1 ? 'active' : '' }} h-100">
                                            <img src="/images/home/Micro/new-s{{$i}}.jpg"
                                                 oncontextmenu="return false;"
                                                 class="carousel-custom-img w-100 h-100 object-fit-cover d-block"
                                                 style="object-position: 0% center;"
                                                 alt="Slide {{$i}}">
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        {{--Total Projects in Syria--}}
                        <div class="d-flex flex-column align-items-center justify-content-center text-center p-2 text-white"
                             style="grid-area: 1 / 3 / 2 / 4; background-color: #bc1818;">
                            <div class="lh-1 m-0 fw-bold" style="font-size: 4.3rem; ">
                                {{ number_format($allCount, 0) }}
                            </div>
                            <div class="lh-1 m-0 fw-medium" style="font-size: 1rem;">
                                Total Projects in <strong style="font-weight: 700; margin-top: 10px;">Syria</strong>
                            </div>
                        </div>

                        {{--Project continuity rate--}}
                        <div class="d-flex flex-column align-items-center justify-content-center text-center p-2"
                             style="grid-area: 1 / 4 / 2 / 5; background-color: #F1F1F1;">
                            <h1 class="fw-bold lh-1 mt-1 mb-0 mr-0 ml-0 " style="color: #bc1818; font-size: 4.3rem;">
                                {{$sustainableRate[0]->number}}%
                            </h1>
                            <p class="fw-medium mt-1 mb-0 mr-0 ml-0 lh-1" style="color: #808285; font-size: 1rem; ">
                                Project Sustainability rate
                            </p>
                        </div>

                        {{--Beneficiaries--}}
                        <div class="d-flex flex-column align-items-center justify-content-center mh-170px overflow-hidden"
                             style="grid-area: 2 / 3 / 3 / 5; background-color: #F1F1F1; padding: 20px 20px 23px 20px;">

                            <div class="fw-bold text-left pl-5px w-100 text" style="color: #666666; font-size: 1rem; margin-bottom: 10px;">
                                Beneficiaries' Age Classification
                            </div>

                            <div class="d-flex justify-content-around w-100 mt-1">
                                @foreach($agerange as $index => $range)
                                    @php
                                        $percentage = ($allCount > 0) ? ($range->project_count / $allCount) * 100 : 0;
                                    @endphp
                                    <div class="text-center d-flex flex-column align-items-center" style="flex: 1;">
                                        <div class="position-relative" style="height: 75px; width: 75px;">
                                            <canvas id="age-chart-{{ $index }}"></canvas>
                                            <div class="position-absolute d-flex align-items-baseline justify-content-center"
                                                 style="top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%;">
                                                <span style="font-size: 1.15rem; color: #BC1818; font-weight: 700; padding:0">{{ round($percentage) }}</span>
                                                <span style="font-size: 0.7rem; color: #bc1818; font-weight: 700; margin-left: 1px; padding:0">%</span>
                                            </div>
                                        </div>
                                        <div style="margin-top: 3px; letter-spacing:0.1px; font-weight: 700; color: #58595B; font-size: 0.85rem;">
                                            {{ $range->Name }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{--aleppo + homs + damascus--}}
                        <div style="grid-column: 1 / 4; display: grid; grid-template-columns: repeat(3, 1fr); align-items: center; background-color: #F1F1F1; padding: 15px 0; text-align: center;">
                            <div style="position: relative;">
                                <div style="color: #808285; font-weight: 750; font-size: 1.1rem; text-transform: uppercase;">Aleppo</div>
                                <div style="width: 24px; height: 4.5px; background-color: #bc1818; margin: 5px auto;"></div>
                                <div style="color: #808285; font-size: 4rem; font-weight: 800; line-height: 1;">{{ number_format((int)$aleppoCount, 0) }}</div>
                                <div style="color: #808285; font-weight: 700; font-size: 1rem;">Projects</div>
                                <div style="position: absolute; right: -2%; top: 50%; transform: translateY(-50%); width: 1.5px; height: 65px; background-color: #D8D8D8;"></div>
                            </div>

                            <div style="position: relative;">
                                <div style="color: #808285; font-weight: 750; font-size: 1.1rem; text-transform: uppercase;">Homs</div>
                                <div style="width: 24px; height: 4.5px; background-color: #bc1818; margin: 5px auto;"></div>
                                <div style="color: #808285; font-size: 4rem; font-weight: 800; line-height: 1;">{{ number_format((int)$homsCount, 0) }}</div>
                                <div style="color: #808285; font-weight: 700; font-size: 1rem;">Projects</div>
                                <div style="position: absolute; right: -2.5%; top: 50%; transform: translateY(-50%); width: 1.5px; height: 65px; background-color: #D8D8D8; "></div>
                            </div>

                            <div>
                                <div style="color: #808285; font-weight: 750; font-size: 1.1rem; text-transform: uppercase;">Damascus</div>
                                <div style="width: 24px; height: 4.5px; background-color: #bc1818; margin: 5px auto;"></div>
                                <div style="color: #808285; font-size: 4rem; font-weight: 800; line-height: 1;">{{ number_format((int)$damascusCount, 0) }}</div>
                                <div style="color: #808285; font-weight: 700; font-size: 1rem;">Projects</div>
                            </div>
                        </div>

                        {{--top 5 categories--}}
                        <div style="grid-column: 4 / 5; background-color: #F1F1F1; color: #666666; padding: 10px 10px 10px 40px; display: flex; flex-direction: column; justify-content: center;">
                            <strong style="font-size: 14px; font-weight: 700; margin-bottom: 5px;">Top 5 Project Categories</strong>
                            <ol style="list-style-position: inside; font-weight: 800; font-size: 14px; padding: 0; margin: 0;">
                                @foreach($categories as $category)
                                    <li>{{ $category->Name }}</li>
                                @endforeach
                            </ol>
                        </div>

                        {{--latakia  + al wadi  + idleb + tartus--}}
                        <div style="grid-column: 1 / 5; display: grid; grid-template-columns: repeat(4, 1fr); align-items: center; background-color: #F1F1F1; padding: 15px 0; text-align: center;">
                            @php
                                $row2Cities = [
                                    'Latakia' => $latakiaCount,
                                    'Al Wadi' => $wadiCount,
                                    'Idleb' => $idlebCount,
                                    'Tartus' => $tartusCount
                                ];
                            @endphp

                            @foreach($row2Cities as $city => $count)
                                <div style="position: relative;">
                                    <div style="color: #808285; font-weight: 750; font-size: 1.1rem; text-transform: uppercase;">{{$city}}</div>
                                    <div style="width: 24px; height: 4.5px; background-color: #bc1818; margin: 5px auto;"></div>
                                    <div style="color: #808285; font-size: 4rem; font-weight: 800; line-height: 1;">{{ number_format((int)$count, 0) }}</div>
                                    <div style="color: #808285; font-weight: 700; font-size: 1rem;">Projects</div>

                                    @if(!$loop->last)
                                        <div style="position: absolute; right: -2%; top: 50%; transform: translateY(-50%); width: 1.5px; height: 65px; background-color: #D8D8D8;"></div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="statistic-section" class="d-block d-sm-none section-space px-2 mb-4" data-aos="fade-up">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="micro-statistics-title pb-0" style="font-size: 24px; padding: 20px 0;">Statistics</div>
            </div>
        </div>

        <div class="d-grid" style="grid-template-columns: 1fr 1fr; gap: 10px; background-color: #fff;">

            <div style="grid-column: span 2; width: 100%; height: 220px !important; min-height: 220px !important; overflow: hidden; display: block; margin: 0; padding: 0; position: relative;">
                <div id="MicroCarouselMobile" class="carousel slide w-100 h-100" data-bs-ride="carousel" data-bs-touch="true" style="height: 100% !important;">
                    <div class="carousel-inner h-100" style="height: 100% !important;">
                        @for ($i = 1; $i <= 8; $i++)
                            <div class="carousel-item {{ $i == 1 ? 'active' : '' }} h-100" style="position: relative; height: 220px !important;">

                                <img src="/images/home/Micro/new-s{{$i}}.jpg"
                                     oncontextmenu="return false;"
                                     class="carousel-custom-img d-block w-100"
                                     style="height: 220px !important; min-height: 220px !important; object-fit: cover; object-position: center; border: none;"
                                     alt="Slide {{$i}}">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column align-items-center justify-content-center p-2 text-white" style="background-color: #bc1818; min-height: 115px;">
                <div style="font-size: 2.2rem; font-weight: 800; line-height: 1;">{{ number_format($allCount, 0) }}</div>
                <div style="font-size: 0.8rem; font-weight: 600; line-height: 1.1; margin-top: 5px; text-align: center;">Total Projects in <strong>Syria</strong></div>
            </div>

            <div class="d-flex flex-column align-items-center justify-content-center p-2" style="background-color: #F1F1F1; min-height: 115px;">
                <div style="color: #bc1818; font-size: 2.2rem; font-weight: 800; line-height: 1;">{{$sustainableRate[0]->number}}%</div>
                <div style="color: #808285; font-size: 0.8rem; font-weight: 600; line-height: 1.1; margin-top: 5px; text-align: center;">Project Sustainability rate</div>
            </div>

            <div class="p-3" style="grid-column: span 2; background-color: #F1F1F1;">
                <div class="fw-bold" style="color: #666666; font-size: 0.95rem;  margin-bottom: 12px;">Beneficiaries' Age Classification</div>
                <div class="d-flex justify-content-around">
                    @foreach($agerange as $index => $range)
                        <div class="text-center">
                            <div class="position-relative" style=" height: 55px; width: 55px; margin: 0 auto;">
                                <canvas id="age-chart-mobile-{{ $index }}"></canvas>
                                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #bc1818; font-weight: 800; font-size: 0.75rem;">
                                    {{ round(($allCount > 0) ? ($range->project_count / $allCount) * 100 : 0) }}%
                                </div>
                            </div>
                            <div style="font-weight: 700; font-size: 0.65rem; color: #58595B; margin-top: 5px;">{{ $range->Name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center p-3 d-flex flex-column justify-content-center" style="background-color: #F1F1F1;">
                <div style="color: #808285; font-weight: 750; font-size: 0.85rem; text-transform: uppercase;">Aleppo</div>
                <div style="width: 18px; height: 3px; background-color: #bc1818; margin: 4px auto;"></div>
                <div style="color: #808285; font-size: 2rem; font-weight: 800; line-height: 1;">{{ number_format($aleppoCount, 0) }}</div>
                <div style="color: #808285; font-weight: 700; font-size: 0.7rem;">Projects</div>
            </div>

            <div class=" d-flex flex-column justify-content-center" style="background-color: #F1F1F1; padding: 10px 10px 10px 40px">
                <strong style="font-size: 0.62rem; font-weight: 700; color: #666666; margin-bottom: 3px;">Top 5 Categories</strong>
                <ol style="font-weight: 800; font-size: 0.6rem; color: #666666; padding-left: 12px; margin: 0;">
                    @foreach(array_slice((array)$categories, 0, 5) as $category)
                        <li>{{ is_array($category) ? $category['Name'] : $category->Name }}</li>
                    @endforeach
                </ol>
            </div>

            <div class="text-center p-3" style="background-color: #F1F1F1;">
                <div style="color: #808285; font-weight: 750; font-size: 0.85rem; text-transform: uppercase;">Homs</div>
                <div style="width: 18px; height: 3px; background-color: #bc1818; margin: 4px auto;"></div>
                <div style="color: #808285; font-size: 2rem; font-weight: 800; line-height: 1;">{{ number_format($homsCount, 0) }}</div>
                <div style="color: #808285; font-weight: 700; font-size: 0.7rem;">Projects</div>
            </div>
            <div class="text-center p-3" style="background-color: #F1F1F1;">
                <div style="color: #808285; font-weight: 750; font-size: 0.85rem; text-transform: uppercase;">Damascus</div>
                <div style="width: 18px; height: 3px; background-color: #bc1818; margin: 4px auto;"></div>
                <div style="color: #808285; font-size: 2rem; font-weight: 800; line-height: 1;">{{ number_format($damascusCount, 0) }}</div>
                <div style="color: #808285; font-weight: 700; font-size: 0.7rem;">Projects</div>
            </div>

            <div class="text-center p-3" style="background-color: #F1F1F1;">
                <div style="color: #808285; font-weight: 750; font-size: 0.85rem; text-transform: uppercase;">Latakia</div>
                <div style="width: 18px; height: 3px; background-color: #bc1818; margin: 4px auto;"></div>
                <div style="color: #808285; font-size: 2rem; font-weight: 800; line-height: 1;">{{ number_format($latakiaCount, 0) }}</div>
                <div style="color: #808285; font-weight: 700; font-size: 0.7rem;">Projects</div>
            </div>
            <div class="text-center p-3" style="background-color: #F1F1F1;">
                <div style="color: #808285; font-weight: 750; font-size: 0.85rem; text-transform: uppercase;">Idleb</div>
                <div style="width: 18px; height: 3px; background-color: #bc1818; margin: 4px auto;"></div>
                <div style="color: #808285; font-size: 2rem; font-weight: 800; line-height: 1;">{{$idlebCount}}</div>
                <div style="color: #808285; font-weight: 700; font-size: 0.7rem;">Projects</div>
            </div>

            <div class="text-center p-3" style="background-color: #F1F1F1;">
                <div style="color: #808285; font-weight: 750; font-size: 0.85rem; text-transform: uppercase;">Wadi</div>
                <div style="width: 18px; height: 3px; background-color: #bc1818; margin: 4px auto;"></div>
                <div style="color: #808285; font-size: 2rem; font-weight: 800; line-height: 1;">{{ number_format($wadiCount, 0) }}</div>
                <div style="color: #808285; font-weight: 700; font-size: 0.7rem;">Projects</div>
            </div>
            <div class="text-center p-3" style="background-color: #F1F1F1;">
                <div style="color: #808285; font-weight: 750; font-size: 0.85rem; text-transform: uppercase;">Tartus</div>
                <div style="width: 18px; height: 3px; background-color: #bc1818; margin: 4px auto;"></div>
                <div style="color: #808285; font-size: 2rem; font-weight: 800; line-height: 1;">{{$tartusCount}}</div>
                <div style="color: #808285; font-weight: 700; font-size: 0.7rem;">Projects</div>
            </div>

        </div>
    </div>
    <div class="horizontal-line"></div>
    <div id="projects-section" class="small-margin section-space" data-aos="fade-up"
         data-aos-duration="800">
        <livewire:micro-projects/>
    </div>
    <div class="horizontal-line"></div>
    @include('new.public.components.project-partners-section', ['donors_ongoing' => $partners_ongoing,'donors_previous' => $partners_previous])

    <div class="horizontal-line last"></div>
</div>
@include('new.public.footer-micro')
<script src="/js/aos.js"></script>
<script src="/js/gsap.min.js"></script>
@livewireScripts
@once
    <script>
        document.addEventListener('livewire:init', () => {
            let syriaMap = null;
            let markers = [];
            // Use a LayerGroup to manage markers more efficiently
            let markerLayerGroup = L.layerGroup();

            const iconDefault = L.icon({
                iconUrl: '/images/ico/marker-icon-2x-red.png',
                iconRetinaUrl: '/images/ico/marker-icon-2x-red.png',
                iconSize: [18, 28],
                iconAnchor: [9, 28],
                popupAnchor: [1, -28],
            });

            function initMap() {
                // Ensure the element exists before initializing (important for responsive toggles)
                const mapEl = document.getElementById('syria_map');
                if (!mapEl || syriaMap) return;

                syriaMap = L.map('syria_map', {
                    center: [34.8021, 38.9968],
                    zoom: 7,
                    // Helpful for mobile touch
                    tap: L.Browser.safari && L.Browser.mobile
                });

                L.tileLayer(
                    'https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png?api_key=7f38c51a-41e4-4cf8-b943-4b9cf994ab08',
                    { attribution: '' }
                ).addTo(syriaMap);

                markerLayerGroup.addTo(syriaMap);

                // Give the browser a moment to render the container before fixing size
                setTimeout(() => {
                    syriaMap.invalidateSize();
                }, 250);
            }

            function clearMarkers() {
                markerLayerGroup.clearLayers();
                markers = [];
            }

            function addMarkers(newMarkers) {
                if (!newMarkers || !Array.isArray(newMarkers)) return;

                newMarkers.forEach(p => {
                    if (!p.lat || !p.lng) return;
                    const marker = L.marker([p.lat, p.lng], { icon: iconDefault })
                        .bindPopup(
                            `<b>Project:</b> ${p.name ?? ''}<br><b>Beneficiary:</b> ${p.beneficiary ?? ''}`
                        );

                    marker.addTo(markerLayerGroup);
                    markers.push(marker);
                });

                if (markers.length > 0) {
                    setTimeout(() => {
                        const group = new L.featureGroup(markers);
                        // Added maxZoom to prevent zooming into a single point too deeply
                        syriaMap.fitBounds(group.getBounds(), { padding: [40, 40], maxZoom: 12 });
                    }, 300);
                }
            }

            // Initialize map
            initMap();

            // Handle filter updates
            Livewire.on('updateMapMarkers', (event) => {
                // Livewire v3 passes data inside an array or as an object depending on emit style
                const data = Array.isArray(event) ? event[0] : event;
                clearMarkers();
                addMarkers(data.markers);

                setTimeout(() => {
                    syriaMap.invalidateSize();
                }, 100);
            });

            // Handle "Load More"
            Livewire.on('appendMapMarkers', (event) => {
                const data = Array.isArray(event) ? event[0] : event;
                addMarkers(data.markers);
            });

            // REFRESH MAP ON WINDOW RESIZE
            // This is crucial for your CSS Grid/Responsive layout
            window.addEventListener('resize', () => {
                if (syriaMap) {
                    syriaMap.invalidateSize();
                }
            });
        });
    </script>
@endonce

<script>
    $(document).ready(function() {
        const ageData = @json($agerange);
        const maxVal = {{ $allCount }};

        function getChartConfig(value) {
            return {
                type: "radialGauge",
                data: {
                    datasets: [{
                        data: [value],
                        backgroundColor: "#bc1818",
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    rotation: Math.PI,
                    domain: [0, maxVal],
                    trackColor: '#BABABA',
                    centerPercentage: 82,
                    roundedCorners: true,
                    // The Nuclear Option: Set font size to 0 and color to transparent
                    centerArea: {
                        displayText: false, // Specific to some radialGauge versions
                        display: false,
                        text: "",
                        fontColor: 'transparent',
                        fontSize: 0,
                        padding: 0
                    },
                    centerText: {
                        display: false,
                        value: "",
                        fontSize: 0,
                        color: 'transparent'
                    },
                    legend: { display: false },
                    tooltips: { enabled: false },
                    animation: {
                        animateRotate: true,
                        duration: 1500
                    }
                }
            };
        }

        ageData.forEach((item, index) => {
            let desktopCanvas = document.getElementById(`age-chart-${index}`);
            if (desktopCanvas) {
                new Chart(desktopCanvas.getContext('2d'), getChartConfig(item.project_count));
            }

            let mobileCanvas = document.getElementById(`age-chart-mobile-${index}`);
            if (mobileCanvas) {
                new Chart(mobileCanvas.getContext('2d'), getChartConfig(item.project_count));
            }
        });
    });
</script>
<script>
    $(window).scroll(testScroll);
    let viewed = false;
    let viewedsm = false;


    function isScrolledIntoView(elem) {
        let docViewTop = $(window).scrollTop();
        let docViewBottom = docViewTop + $(window).height();

        let elemTop = $(elem).offset().top;
        let elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    let ctx = document.getElementById('barChart').getContext('2d');
    let ctxsm = document.getElementById('barChartsm').getContext('2d');
    let barChart;
    let barChartsm;

    let ctxage = document.getElementById('barageChart').getContext('2d');
    let ctxsmage = document.getElementById('barageChartsm').getContext('2d');
    let barageChart;
    let barageChartsm;

    function testScroll() {
        if (isScrolledIntoView($(".statistics-container")) && !viewed) {
            viewed = true;
            Chart.register(ChartDataLabels);
            const data = {
                labels: {!! json_encode(array_map(fn($category) => html_entity_decode($category->Name), $categories)) !!},
                datasets: [{
                    data: [{{$categories[0]->project_count}}, {{$categories[1]->project_count}}, {{$categories[2]->project_count}}, {{$categories[3]->project_count}}, {{$categories[4]->project_count}}],
                    borderWidth: 0,
                    borderSkipped: false,
                    barPercentage: .5,
                    categoryPercentage: 1.4,
                    backgroundColor: ['#BC1818', '#BC1818', '#BC1818', '#BC1818', '#BC1818'],
                }]
            };
            const progressBar = {
                id: 'progressBar',
                beforeDatasetsDraw(chart, args, pluginOptions) {
                    const {
                        ctx: ctx, data, chartArea: {top, bottom, left, right, width, height}, scales: {x, y}
                    } = chart;
                    ctx.save();
                    data.datasets[0].data.forEach((datapoint, index) => {
                        ctx.fillStyle = '#fff';
                        ctx.textAlign = 'left';
                        ctx.textBaseline = 'middle';
                        ctx.font = 'bolder .5vw lato';
                        ctx.fillText(data.labels[index], left, y.getPixelForValue(index));
                    })
                }
            };
            let innerBarText = {
                id: 'innerBarText',
                afterDatasetsDraw(chart, args, pluginOptions) {
                    const {ctx, data, chartArea: {left}, scales: {x, y}} = chart;
                    ctx.save();

                    const fontSize = Math.max(Math.round(chart.width / 92), 10); // Set minimum 10px
                    ctx.font = `bold .6vw lato`;
                    ctx.fillStyle = '#fff'; // White color to contrast against bar background
                    ctx.textAlign = 'left';

                    data.labels.forEach((label, index) => {
                        const padding = 3; // Position label inside the bar with some padding
                        ctx.fillText(label, left + padding, y.getPixelForValue(index));
                    });
                }
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    layout: {
                        padding: {
                            right: 40 // Ensure there’s space on the right for project_count values
                        }
                    },
                    plugins: {
                        tooltip: {enabled: false},
                        legend: {display: false},
                        datalabels: {
                            formatter: (value) => `${value}`, // Display project_count values
                            anchor: 'end', // Position outside the end of the bar
                            align: 'right', // Align to the right of each bar
                            color: '#bc1818', // Color of project_count values
                            font: (context) => {
                                let width = context.chart.width;
                                return {weight: 'bold', size: Math.max(Math.round(width / 32) * 1.1)};
                            }
                        }
                    },
                    scales: {
                        x: {
                            display: false,
                            grid: {display: false, drawBorder: false},
                            ticks: {display: false},
                        },
                        y: {
                            display: false,
                            grid: {display: false, drawBorder: false},
                            ticks: {display: true},
                        }
                    }
                },
                plugins: [progressBar, innerBarText, ChartDataLabels]
            };
            barChart = new Chart(ctx, config);

            const progressageBar = {
                id: 'progressageBar',
                beforeDatasetsDraw(chart, args, pluginOptions) {
                    const {
                        ctx, data, chartArea: {top, bottom, left, right, width, height}, scales: {x, y}
                    } = chart;
                    ctx.save();
                    // const barHeight = height / y.ticks.length * data.datasets[0].barPercentage * data.datasets[0].categoryPercentage;
                    data.datasets[0].data.forEach((datapoint, index) => {
                        const fontSizeLabel = 10;
                        ctx.fillStyle = '#fff';
                        ctx.textAlign = 'left';
                        ctx.textBaseline = 'middle';
                        ctx.font = 'bolder .5vw lato';
                        ctx.fillText(data.labels[index], left, y.getPixelForValue(index));
                    })
                }
            };
            const configage = {
                type: 'bar',
                data: {
                    labels: {!! json_encode(array_map(fn($age) => html_entity_decode($age->Name), $agerange)) !!},
                    datasets: [{
                        data: [{{$agerange[0]->project_count}}, {{$agerange[1]->project_count}}, {{$agerange[2]->project_count}}, {{$agerange[3]->project_count}}, {{$agerange[4]->project_count}}],
                        borderWidth: 0,
                        borderSkipped: false,
                        barPercentage: .5,
                        categoryPercentage: 1.4,
                        backgroundColor: ['#BC1818', '#BC1818', '#BC1818', '#BC1818', '#BC1818'],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    layout: {
                        padding: {
                            right: 40 // Ensure there’s space on the right for project_count values
                        }
                    },
                    plugins: {
                        tooltip: {enabled: false},
                        legend: {display: false},
                        datalabels: {
                            formatter: (value) => `${value}`, // Display project_count values
                            anchor: 'end', // Position outside the end of the bar
                            align: 'right', // Align to the right of each bar
                            color: '#616262', // Color of project_count values
                            font: (context) => {
                                let width = context.chart.width;
                                return {weight: 'bold', size: Math.max(Math.round(width / 32) * 1.1, 10)};
                            }
                        }
                    },
                    scales: {
                        x: {
                            display: false,
                            grid: {display: false, drawBorder: false},
                            ticks: {display: false},
                        },
                        y: {
                            display: false,
                            grid: {display: false, drawBorder: false},
                            ticks: {display: true},
                        }
                    }
                },
                plugins: [progressageBar, innerBarText, ChartDataLabels]
            };

            barageChart = new Chart(ctxage, configage);
        }
        if (isScrolledIntoView($("#statistic-section")) && !viewedsm) {
            viewedsm = true;
            Chart.register(ChartDataLabels);
            const data = {
                labels: {!! json_encode(array_map(fn($category) => html_entity_decode($category->Name), $categories)) !!},
                datasets: [{
                    data: [{{$categories[0]->project_count}}, {{$categories[1]->project_count}}, {{$categories[2]->project_count}}, {{$categories[3]->project_count}}, {{$categories[4]->project_count}}],
                    borderWidth: 0,
                    borderSkipped: false,
                    barPercentage: .5,
                    categoryPercentage: 1.4,
                    backgroundColor: ['#BC1818', '#BC1818', '#BC1818', '#BC1818', '#BC1818'],
                }]
            };
            const progressBar = {
                id: 'progressBar',
                beforeDatasetsDraw(chart, args, pluginOptions) {
                    const {
                        ctx, data, chartArea: {top, bottom, left, right, width, height}, scales: {x, y}
                    } = chart;
                    ctx.save();
                    // const barHeight = height / y.ticks.length * data.datasets[0].barPercentage * data.datasets[0].categoryPercentage;
                    data.datasets[0].data.forEach((datapoint, index) => {
                        ctx.fillStyle = '#fff';
                        ctx.textAlign = 'left';
                        ctx.textBaseline = 'middle';
                        ctx.font = '1.25vw lato';
                        ctx.fillText(data.labels[index], left, y.getPixelForValue(index));
                    })
                }
            };
            const innerBarText = {
                id: 'innerBarText',
                afterDatasetsDraw(chart, args, pluginOptions) {
                    const {ctx, data, chartArea: {left}, scales: {x, y}} = chart;
                    ctx.save();
                    data.datasets[0].data.forEach((datapoint, index) => {
                        ctx.font = 'bolder 1.3vw lato';
                        ctx.fillStyle = '#fff';
                        ctx.fillText(`${data.labels[index]}`, left + 3, y.getPixelForValue(index))
                    })
                }
            };
            const config = {
                type: 'bar',
                data: {
                    labels: {!! json_encode(array_map(fn($category) => html_entity_decode($category->Name), $categories)) !!},
                    datasets: [{
                        data: [{{$categories[0]->project_count}}, {{$categories[1]->project_count}}, {{$categories[2]->project_count}}, {{$categories[3]->project_count}}, {{$categories[4]->project_count}}],
                        borderWidth: 0,
                        borderSkipped: false,
                        barPercentage: .5,
                        categoryPercentage: 1.4,
                        backgroundColor: ['#BC1818', '#BC1818', '#BC1818', '#BC1818', '#BC1818'],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: {
                        tooltip: {
                            enabled: false, // Disable tooltips
                        },
                        legend: {
                            display: false,
                        },
                        datalabels: {
                            formatter: (val, context) => (`${val}           `),
                            anchor: 'end',
                            align: 'middle',
                            labels: {
                                value: {
                                    color: '#fff',
                                },
                            },
                            font: function (context) {
                                let width = context.chart.width;
                                let size = Math.round(width / 32);
                                return {
                                    weight: 'bold',
                                    size: size * 1.5
                                };
                            }
                        }
                    },
                    scales: {
                        x: {
                            display: false,
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                display: false,
                            },

                        },
                        y: {
                            display: false,
                            // beginAtZero: true,
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                display: true,
                            },
                        }
                    }
                },
                plugins: [progressBar, innerBarText, ChartDataLabels]
            };
            barChartsm = new Chart(ctxsm, config);

            const progressageBar = {
                id: 'progressageBar',
                beforeDatasetsDraw(chart, args, pluginOptions) {
                    const {
                        ctx: ctx, dataage, chartArea: {top, bottom, left, right, width, height}, scales: {x, y}
                    } = chart;
                    ctx.save();
                    // const barHeight = height / y.ticks.length * data.datasets[0].barPercentage * data.datasets[0].categoryPercentage;
                    data.datasets[0].data.forEach((datapoint, index) => {
                        ctx.fillStyle = '#fff';
                        ctx.textAlign = 'left';
                        ctx.textBaseline = 'middle';
                        ctx.font = 'bolder .5vw lato';
                        ctx.fillText(data.labels[index], left, y.getPixelForValue(index));
                    })
                }
            };
            const innerageBarText = {
                id: 'innerageBarText',
                afterDatasetsDraw(chart, args, pluginOptions) {
                    const {ctx, data, chartArea: {left}, scales: {x, y}} = chart;
                    ctx.save();

                    const fontSize = Math.max(Math.round(chart.width / 32) * 1.1); // Set minimum 10px
                    ctx.font = 'bolder 1vw lato';
                    ctx.fillStyle = '#fff'; // White color to contrast against bar background
                    ctx.textAlign = 'left';

                    data.labels.forEach((label, index) => {
                        const padding = 3; // Position label inside the bar with some padding
                        ctx.fillText(label, left + padding, y.getPixelForValue(index));
                    });
                }
            };
            const configage = {
                type: 'bar',
                data: {
                    labels: {!! json_encode(array_map(fn($age) => html_entity_decode($age->Name), $agerange)) !!},
                    datasets: [{
                        data: [{{$agerange[0]->project_count}}, {{$agerange[1]->project_count}}, {{$agerange[2]->project_count}}, {{$agerange[3]->project_count}}, {{$agerange[4]->project_count}}],
                        borderWidth: 0,
                        borderSkipped: false,
                        barPercentage: .5,
                        categoryPercentage: 1.4,
                        backgroundColor: ['#BC1818', '#BC1818', '#BC1818', '#BC1818', '#BC1818'],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    layout: {
                        padding: {
                            right: 40 // Ensure there’s space on the right for project_count values
                        }
                    },
                    plugins: {
                        tooltip: {enabled: false},
                        legend: {display: false},
                        datalabels: {
                            formatter: (value) => `${value}`, // Display project_count values
                            anchor: 'end', // Position outside the end of the bar
                            align: 'right', // Align to the right of each bar
                            color: '#616262', // Color of project_count values
                            font: (context) => {
                                let width = context.chart.width;
                                return {weight: 'bold', size: Math.max(Math.round(width / 32) * 1.5)};
                            }
                        }
                    },
                    scales: {
                        x: {
                            display: false,
                            grid: {display: false, drawBorder: false},
                            ticks: {display: false},
                        },
                        y: {
                            display: false,
                            grid: {display: false, drawBorder: false},
                            ticks: {display: true},
                        }
                    }
                },
                plugins: [progressageBar, innerageBarText, ChartDataLabels]
            };

            barageChartsm = new Chart(ctxsmage, configage);
        }
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const filterSection = document.querySelector(".filters-section");
        const projectSection = document.querySelector("#map-section");

        if (!filterSection || !projectSection) return;

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Fade in (normal/static)
                        filterSection.classList.remove("fade-in");
                        filterSection.classList.add("fade-out");
                        filterSection.style.position = "static";
                    } else {
                        // Fade out (sticky)
                        filterSection.classList.remove("fade-out");
                        filterSection.classList.add("fade-in");
                        filterSection.style.position = "sticky";
                    }
                });
            },
            {
                root: null,
                threshold: 0,
            }
        );

        observer.observe(projectSection);
    });
</script>

@stack('fancyVideo')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
</body>
</html>
