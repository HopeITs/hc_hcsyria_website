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
<body class="overflow-x-hidden">
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

    <div id="statistic-section" class="d-lg-block d-md-block d-sm-block d-none small-margin section-space mb-3 "
         data-aos="fade-up"
         data-aos-duration="800">
        <div class="container-fluid">
            <div class="row " data-aos="fade-up" data-aos-duration="600">
                <div class="col-12 d-flex justify-content-center">
                    <div class="micro-statistics-title">Statistics</div>
                </div>
            </div>
            <div class="micro-page-margin">

                {{--row 1 --}}
                    <div class="row">
                    {{--carousel (column 1)--}}
                    <div class="col-xl-6 col-lg-12 col-md-12 mb-md-4 mb-xl-0  col-12">
                        <div id="MicroCarousel" class="carousel slide h-100 w-100"
                             data-bs-ride="carousel"
                             data-bs-interval="5500"
                             data-bs-pause="hover">

                            <div class="carousel-inner">
                                @for ($i = 1; $i <= 8; $i++)
                                    <div class="carousel-item {{ $i == 1 ? 'active' : '' }} h-100">
                                        <img src="/images/home/Micro/new-s{{$i}}.jpg"
                                             oncontextmenu="return false;"
                                             class="carousel-img w-100 h-100 object-center-fit object-fit-cover d-block"
                                             alt="Slide {{$i}}">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    {{--total projects + sustain rate + benefeciaries (column 2)--}}
                    <div class="col-xl-6 col-lg-12 col-md-12 gap-3 gap-md-4  d-flex flex-column justify-content-end align-items-center ">
                        {{--total projects + sustain rate (row 1)--}}
                        <div class="row grid-parent gap-3 gap-md-4 w-100">
                            {{--total projects in syria--}}
                            <div class="col bg-primary-red d-flex  flex-column align-items-center justify-content-center text-center py-md-4 py-xl-5 text-white">

                                        <div class="single-card-number">
                                            {{ number_format($allCount, 0) }}
                                        </div>
                                        <div class="single-card-label">
                                            Total Projects in <strong>Syria</strong>
                                        </div>
                            </div>
                            {{--Project Sustainability rate--}}
                            <div class="col bg-secondary-gray-light d-flex flex-column align-items-center  justify-content-center text-center ">
                                    <div class="single-card-number text-primary-red">
                                        {{$sustainableRate[0]->number}}%
                                    </div>
                                    <div class="single-card-label text-secondary-gray-darker">
                                        Project Sustainability rate
                                    </div>
                            </div>
                        </div>
                        {{--Beneficiaries (row 2) --}}
                        <div class="row w-100">
                            <div class="col bg-secondary-gray-light d-flex  flex-column align-items-center justify-content-center p-3">

                                    <div class="fw-bold benefeciaries-text text-left mb-xl-2 mb-md-3 w-100 text-secondary-gray-dark">
                                        Beneficiaries' Age Classification
                                    </div>
                                    <div class="d-flex justify-content-around w-100 mt-1">
                                        @foreach($agerange as $index => $range)
                                            @php
                                                $percentage = ($allCount > 0) ? ($range->project_count / $allCount) * 100 : 0;
                                            @endphp
                                            <div class="text-center d-flex flex-grow-1 flex-column align-items-center">
                                                <div class="position-relative chart-sizing ">
                                                    <canvas id="age-chart-{{ $index }}"></canvas>
                                                    <div class="beneficiaries-chart-percentage">
                                                        <div class="micro-radial-number">{{ round($percentage) }}</div>
                                                        <div class="micro-radial-percentage">%</div>
                                                    </div>
                                                </div>
                                                <div class="micro-radial-range">
                                                    {{ $range->Name }}
                                                </div>
                                            </div>
                                        @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{--row 2 --}}
                <div class="row d-flex justify-content-center mt-md-4 align-items-center">
                    {{--aleppo + homs + damascus column--}}
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="row">
                            <div class="col py-0 cities-small-container">
                                @php
                                    $row2Cities = [
                                        'Aleppo' => $aleppoCount,
                                        'Homs' => $homsCount,
                                        'Damascus' => $damascusCount,

                                    ];
                                @endphp

                                @foreach($row2Cities as $city => $count)
                                    <div class=" custom-padding bg-secondary-gray-light position-relative">
                                        <div class="statistics-city">{{$city}}</div>
                                        <div class="statistics-underline"></div>
                                        <div class="statistics-number">{{ number_format((int)$count, 0) }}</div>
                                        <div class="statistics-projects">Projects</div>

                                        @if(!$loop->last)
                                            <div class="statistics-seperator"></div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--top 5 categories column--}}
                    <div class="col-3  ">
                            <div class=" single-statistics-card-container bg-secondary-gray-light">
                                <div class="categories-title" >Top 5 Project Categories</div>
                                <ol class="categories-list" >
                                    @foreach($categories as $category)
                                        <li>{{ $category->Name }}</li>
                                    @endforeach
                                </ol>
                            </div>

                    </div>
                </div>
                {{--row 3 --}}
                <div class="row mt-md-4">
                      <div class="col  cities-big-container">
                          @php
                              $row2Cities = [
                                  'Latakia' => $latakiaCount,
                                  'Al Wadi' => $wadiCount,
                                  'Idleb' => $idlebCount,
                                  'Tartus' => $tartusCount
                              ];
                          @endphp

                          @foreach($row2Cities as $city => $count)
                              <div class=" custom-padding   bg-secondary-gray-light position-relative">
                                  <div class="statistics-city">{{$city}}</div>
                                  <div class="statistics-underline"></div>
                                  <div class="statistics-number">{{ is_numeric($count) ? number_format((int)$count, 0) : $count }}</div>
                                  <div class="statistics-projects">Projects</div>

                                  @if(!$loop->last)
                                      <div class="big-statistics-seperator"></div>
                                  @endif
                              </div>
                          @endforeach
                      </div>
                </div>
            </div>
        </div>
    </div>

    <div id="statistic-section" class="d-block d-sm-none section-space px-3" data-aos="fade-up">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="micro-statistics-title pt-4 fs-3 ">Statistics</div>
            </div>
        </div>

        <div class="row row-cols-2 g-2 mb-3 bg-white mx-0">

            <div class="col-12 w-100  overflow-hidden d-block position-relative p-0 m-0">
                <div id="MicroCarouselMobile" class="carousel slide w-100 h-100" data-bs-ride="carousel" data-bs-touch="true">
                    <div class="carousel-inner carousel-mobile-container">
                        @for ($i = 1; $i <= 8; $i++)
                            <div class="carousel-item {{ $i == 1 ? 'active' : '' }} h-100">

                                <img src="/images/home/Micro/new-s{{$i}}.jpg"
                                     oncontextmenu="return false;"
                                     class="carousel-img d-block w-100"
                                     alt="Slide {{$i}}">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="row g-2 pb-2 w-100 m-0">
                <div class="col-6 p-0 pe-1">
                    <div class="d-flex flex-column bg-primary-red align-items-center justify-content-center p-2 text-white h-100">
                        <div class="fs-0 fw-bolder lh-1">
                            {{ number_format((int)$allCount, 0) }}
                        </div>
                        <div class="fs-7 fw-medium lh-1 mt-2 text-center">
                            Total Projects in <strong>Syria</strong>
                        </div>
                    </div>
                </div>

                <div class="col-6 p-0 ps-1">
                    <div class="d-flex bg-secondary-gray-light mobile-fixed-height flex-column align-items-center justify-content-center p-2 h-100">
                        <div class="fs-0 fw-bolder lh-1 text-primary-red">
                            {{ $sustainableRate[0]->number }}%
                        </div>
                        <div class="text-secondary-gray-darker fs-7 fw-medium lh-1 mt-2 text-center">
                            Project Sustainability rate
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 m-0 p-3 bg-secondary-gray-light">
                <div class="fw-bold text-secondary-gray-dark fs-7 mb-3">Beneficiaries' Age Classification</div>
                <div class="d-flex justify-content-around">
                    @foreach($agerange as $index => $range)
                        <div class="text-center">
                            <div class="gauge-circle">
                                <canvas id="age-chart-mobile-{{ $index }}"></canvas>
                                <div class="gauge-circle-number">
                                    {{ round(($allCount > 0) ? ($range->project_count / $allCount) * 100 : 0) }}%
                                </div>
                            </div>
                            <div class="fw-bold fs-8 text-secondary-gray-dark mt-2">{{ $range->Name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row m-0 w-100 my-2">
                <div class="col-6 p-0 pe-1">
                    <div class="text-center p-3 bg-secondary-gray-light h-100 d-flex flex-column justify-content-center align-items-center">
                        <div class="mobile-statistics-city">Aleppo</div>

                        <div class="mobile-statistics-underline"></div>

                        <div class="mobile-statistics-number">
                            {{ number_format($aleppoCount, 0) }}
                        </div>

                        <div class="mobile-statistics-projects">Projects</div>
                    </div>
                </div>

                <div class="col-6 p-0 ps-1">
                    <div class="bg-secondary-gray-light mobile-categories-padding h-100 d-flex flex-column justify-content-center">
                        <div class="fs-8 fw-bold text-secondary-gray-dark mb-2">Top 5 Categories</div>

                        <ol class="fw-bolder fs-8 text-secondary-gray-dark lh-sm m-0 ps-3">
                            @foreach(array_slice((array)$categories, 0, 5) as $category)
                                <li>{{ is_array($category) ? $category['Name'] : $category->Name }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>

            @php
                $cities = [
                    ['name' => 'Homs', 'count' => $homsCount],
                    ['name' => 'Damascus', 'count' => $damascusCount],
                    ['name' => 'Latakia', 'count' => $latakiaCount],
                    ['name' => 'Wadi', 'count' => $wadiCount],
                    ['name' => 'Idleb', 'count' => $idlebCount],
                    ['name' => 'Tartus', 'count' => $tartusCount],
                ];
            @endphp

            <div class="row m-0 w-100">
                @foreach($cities as $index => $city)
                    @php
                        $paddingVariable = ($index % 2 == 0) ? 'p-0 pe-1' : 'p-0 ps-1';
                    @endphp

                    <div class="col-6 {{ $paddingVariable }} mb-2">
                        <div class="text-center p-3 bg-secondary-gray-light h-100 d-flex flex-column justify-content-center align-items-center">

                            <div class="mobile-statistics-city">
                                {{ $city['name'] }}
                            </div>

                            <div class="mobile-statistics-underline"></div>

                            <div class="mobile-statistics-number">
                                {{ is_numeric($city['count']) ? number_format((int)$city['count'], 0) : ($city['count'] ?? 'Soon') }}
                            </div>

                            <div class="mobile-statistics-projects">
                                Projects
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="horizontal-line"></div>
    <div id="projects-section" class="small-margin pt-5 section-space" data-aos="fade-up"
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
