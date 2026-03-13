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
    <script src="/js/jquery.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168141177-1"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}

{{--        function gtag() {--}}
{{--            dataLayer.push(arguments);--}}
{{--        }--}}

{{--        gtag('js', new Date());--}}

{{--        gtag('config', 'UA-168141177-1');--}}
{{--    </script>--}}
{{--    <!-- Google Tag Manager -->--}}
{{--    <script>(function (w, d, s, l, i) {--}}
{{--            w[l] = w[l] || [];--}}
{{--            w[l].push({--}}
{{--                'gtm.start':--}}
{{--                    new Date().getTime(), event: 'gtm.js'--}}
{{--            });--}}
{{--            let f = d.getElementsByTagName(s)[0],--}}
{{--                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';--}}
{{--            j.async = true;--}}
{{--            j.src =--}}
{{--                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;--}}
{{--            f.parentNode.insertBefore(j, f);--}}
{{--        })(window, document, 'script', 'dataLayer', 'GTM-M9HLZ6M');</script>--}}
{{--    <!-- End Google Tag Manager -->--}}
    @include('new.public.components.analytics-head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">

    <meta name="keywords" content="aleppo syria, hope, center, children, university"/>
    <title>@lang('what_we_do.children_uni')</title>
    <link href="{{asset('css/tabs.css')}}" rel="stylesheet">
    <link href="{{asset('css/initiatives_new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/children_new.css')}}" rel="stylesheet" type="text/css">
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
    <link rel="stylesheet" href="/css/aos.css"/>
    <link href='https://fonts.googleapis.com/css?family=Martel' rel='stylesheet'>

    <script src="/js/html5shiv.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>

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
@include('new.public.navbar')
<div id="Children" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                    </div>
                    <div class="content">
                        <div class="main_title" data-aos="fade-up" data-aos-duration="600">Educational Program</div>
                        <div class="main_subtitle" data-aos="fade-up" data-aos-duration="1000">Children University</div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                    <img src="/images/newLogos/Children-Uni.svg" class="d-block project-logo" data-aos="fade-up"
                         data-aos-duration="1000">
                </div>
            </div>
        </div>
    </div>
    @include('new.public.partials.cover-carousel', ['carouselImages' => $carouselImages])
    <div class="small horizontal-line d-lg-none d-md-none d-sm-none d-block" style="margin-top: 6vw" data-aos="fade-up"
         data-aos-duration="800"></div>
    @include('new.public.components.project-brief-section', ['project' => $brief])
    <div class="horizontal-line d-lg-none d-md-none d-sm-none d-block" style="margin-top: 1vw" data-aos="fade-up"
         data-aos-duration="800"></div>
    <div id="categories-section" class="section-space" data-aos="fade-up" data-aos-duration="600">
        <img class="categories-img" src="/images/home/children.png">
        <img src="/images/home/image-mask.png" class="image-mask"/>
        <div class="categories-content-title">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <img class="w-100" data-aos="fade" data-aos-duration="3000"
                             src="/images/home/children_title.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="categories-content">
            <button id="Informatics" class="category"><img class="w-100"
                                                           src="/images/initiatives/Children Uni/characters/Robotic.png">
            </button>
            <button id="Medicine" class="category"><img class="w-100"
                                                        src="/images/initiatives/Children Uni/characters/Doctor.png">
            </button>
            <button id="Engineering" class="category"><img class="w-100"
                                                           src="/images/initiatives/Children Uni/characters/Arch.png">
            </button>
            <button id="Science" class="category"><img class="w-100"
                                                       src="/images/initiatives/Children Uni/characters/Science.png">
            </button>
            <button id="Media" class="category"><img class="w-100"
                                                     src="/images/initiatives/Children Uni/characters/Media.png">
            </button>
        </div>
        <div id="category-description" class="d-lg-block d-md-block d-sm-block d-none">
            <div class="container-fluid">
                <div class="row" data-aos="fade-up" data-aos-duration="600">
                    <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                        <div class="section-title category-title pb-0 pt-2">Informatics</div>
                        <div class="row d-flex justify-content-center text-center w-100">
                            <div class="col-lg-8 col-md-9 col-sm-9 col-10">
                                <div class="section-title-desc">
                                    <div data-aos="fade-up" data-aos-duration="300">The foundation begins with STEM
                                        courses, building a base for enhancing scientific and mathematical
                                        problem-solving
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="500"> abilities. Next, children study
                                        block programming using websites like SCRATCH. At the advanced level, they
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="700"> learn PYTHON. LEGO aids in
                                        practically implementing these ideas, making it engaging for children.
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="900">
                                    </div>
                                    {{--<div data-aos="fade-up" data-aos-duration="1100"> LEGO would provide the means to--}}
                                    {{--implement these ideas in an--}}
                                    {{--interesting form for the children.--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="category-description" class="d-lg-none d-md-none d-sm-none d-block">
            <div class="container-fluid">
                <div class="row" data-aos="fade-up" data-aos-duration="600">
                    <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                        <div class="section-title sm category-title pb-0 pt-2">Informatics</div>
                        <div class="row d-flex justify-content-center text-center w-100">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-11">
                                <div class="section-title-desc sm">
                                    <div data-aos="fade-up" data-aos-duration="300">The foundation begins with STEM
                                        courses, building a base for enhancing scientific and mathematical
                                        problem-solving abilities. Next, children study block programming using websites
                                        like SCRATCH. At the advanced level, they learn PYTHON. LEGO aids in practically
                                        implementing these ideas, making it engaging for children.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="horizontal-line"></div>--}}
    </div>
    <div class="horizontal-line"></div>
    <div id="initiative-section" class="section-space">
        <div class="col-12 d-flex justify-content-center flex-column align-items-center mb-2" data-aos="fade-up"
             data-aos-duration="600">
            <div class="section-title">@lang('studyzone.activities')</div>
            <div class="search-container d-flex justify-content-center align-items-center">
                <div class="se d-flex align-items-center">
                    <button id="switch-search" onclick="searchFilter()">
                        <img id="search-icon" class="search-icons" src="/images/ico/search-blue-icon.png">
                    </button>
                    <input id="search-input" type="text" placeholder="Search Activities"
                           name="search">
                </div>
            </div>
        </div>
        <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="800" style="z-index: -1;"></div>
        <div data-aos="fade-up" data-aos-duration="800">
            <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative" id="tabList"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="aleppoTab" class="aleppoTab active nav-link" data-bs-toggle="tab"
                            data-bs-target="#aleppo"
                            role="tab" aria-controls="aleppo" aria-selected="true">@lang('projects.aleppo')
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="homsTab" class="homsTab nav-link" data-bs-toggle="tab" data-bs-target="#homs"
                            role="tab" aria-controls="homs" aria-selected="false">@lang('projects.homs')
                    </button>
                </li>
            </ul>
            <div style="height: 3vw; background: white; position: relative"></div>
            @if($agent->isPhone())
                <div class="tab-content position-relative" id="myTabContent">
                    <div class="tab-pane fade show active" id="aleppo" role="tabpanel" aria-labelledby="aleppoTab"
                         tabindex="0">
                        @if(count($ini_A)==0)
                            <div class="card-height">
                                <div class="single-card">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
                                            <div class="text-center">
                                                Sorry, we couldn't find any results
                                            </div>
                                            <div>@lang('projects.sorryMessage2')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach($ini_A as $i=>$initiative)
                            <div class="card-height">
                                <div class="single-card">
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
                                            <div id="carousel-ini{{$initiative->id}}"
                                                 class="carousel slide w-100 project-carousel"
                                                 data-bs-ride="carousel"
                                                 data-interval="1000">
                                                <div class="carousel-inner project-carousel">
                                                    <?php $k = 0 ?>
                                                    @foreach($initiative->ImagesRandom as $image)
                                                        <div class="carousel-item @if($k++ == 0) active @endif">
                                                            <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                               data-fancybox="gallery-Cu-{{$initiative->id}}"
                                                               data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                                <img class="w-100 h-100 d-block" src="{{$image->path}}"
                                                                     style="object-fit: cover"/></a>
                                                        </div>
                                                    @endforeach
                                                    {{--<div class="carousel-item active">--}}
                                                    {{--<img class="w-100"--}}
                                                    {{--src="{{$initiative->ImagesRandom[0]['path']}}">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="carousel-item">--}}
                                                    {{--<img class="w-100"--}}
                                                    {{--src="{{$initiative->ImagesRandom[1]['path']}}">--}}
                                                    {{--</div>--}}
                                                    {{--@if(count($initiative->ImagesRandom) > 2)--}}
                                                    {{--<div class="carousel-item">--}}
                                                    {{--<img class="w-100"--}}
                                                    {{--src="{{$initiative->ImagesRandom[2]['path']}}">--}}
                                                    {{--</div>--}}
                                                    {{--@endif--}}
                                                </div>
                                                <button class="carousel-control-prev"
                                                        data-bs-target="#carousel-ini{{$initiative->id}}"
                                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next"
                                                        data-bs-target="#carousel-ini{{$initiative->id}}"
                                                        data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                            <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                <div class="col-10">
                                                    <div class="card-title">{{$initiative->$language->title}}</div>
                                                </div>
                                                <div class="col-2 text-end">
                                                    @if($initiative->video !== '0')
                                                        {{--<a href="#" class="launch-modal"--}}
                                                        {{--data-modal-id="modal-video-{{$initiative->id}}">--}}
                                                        {{----}}
                                                        {{--</a>--}}
                                                        <a href="{{$initiative->video}}" class="launch-modal"
                                                           id="iniVideo-{{$initiative->id}}"
                                                           data-fancybox="iniVideo-{{$initiative->id}}">
                                                            <img class="video-icon"
                                                                 src="/images/ico/video-ini-icon.svg">
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <div class="card-title-section"></div>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                @if($initiative->$language->date_string !== '0')
                                                    <div>
                                                        <strong>Date: </strong>{{$initiative->$language->date_string}}
                                                    </div>
                                                @endif
                                                {{--@if($initiative->donors[0]['name'] !== '')--}}
                                                {{--<div><strong>Funded By: </strong>{{$initiative->donors[0]['name']}}--}}
                                                {{--</div>--}}
                                                {{--@endif--}}
                                                @if($initiative->$language->organization !== '0')
                                                    <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                                @endif
                                                @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                    <div><br></div>
                                                @endif
                                                @if(strlen($initiative->$language->content)>30)
                                                    <div>{!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->content)), 0, 30)).'...'!!}</div>
                                                @endif

                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    @if(isset($subWhatCategory))
                                                        <a href="{{ route($route, [
                                                Str::slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                Str::slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                           class="readmore-btn">@lang('main.readMore')
                                                        </a>
                                                    @else
                                                        <a href="{{ route('new.public.initiative',
                                [Str::slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                Str::slug(strtolower($initiative->english->title))]   ) }}"
                                                           class="readmore-btn">@lang('main.readMore')</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if(strlen($ini_A)>5)
                            <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="300"></div>
                            <div class="text-center" data-aos="fade-up" data-aos-duration="300">
                                {{$ini_A->withQueryString(['ini_A' => $ini_A->currentPage()])->links()}}
                            </div>
                        @endif
                        {{--<div class="small horizontal-line"></div>--}}
                    </div>
                    <div class="tab-pane fade show" id="homs" role="tabpanel" aria-labelledby="homsTab" tabindex="1">
                        @if(count($ini_H)==0)
                            <div class="card-height">
                                <div class="single-card">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
                                            <div class="text-center">
                                                Sorry, we couldn't find any results
                                            </div>
                                            <div>@lang('projects.sorryMessage2')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach($ini_H as $i=>$initiative)
                            <div class="card-height">
                                <div class="single-card">
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
                                            <div id="carousel-ini{{$initiative->id}}"
                                                 class="carousel slide w-100 project-carousel"
                                                 data-bs-ride="carousel"
                                                 data-interval="1000">
                                                <div class="carousel-inner project-carousel">
                                                    <?php $k = 0 ?>
                                                    @foreach($initiative->ImagesRandom as $image)
                                                        <div class="carousel-item @if($k++ == 0) active @endif">
                                                            <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                               data-fancybox="gallery-Cu-{{$initiative->id}}"
                                                               data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                                <img class="w-100 h-100 d-block"
                                                                     src="{{$image->path}}"
                                                                     style="object-fit: cover"/></a>
                                                        </div>
                                                    @endforeach
                                                    {{--<div class="carousel-item active">--}}
                                                    {{--<img class="w-100"--}}
                                                    {{--src="{{$initiative->ImagesRandom[0]['path']}}">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="carousel-item">--}}
                                                    {{--<img class="w-100"--}}
                                                    {{--src="{{$initiative->ImagesRandom[1]['path']}}">--}}
                                                    {{--</div>--}}
                                                    {{--@if(count($initiative->ImagesRandom) > 2)--}}
                                                    {{--<div class="carousel-item">--}}
                                                    {{--<img class="w-100"--}}
                                                    {{--src="{{$initiative->ImagesRandom[2]['path']}}">--}}
                                                    {{--</div>--}}
                                                    {{--@endif--}}
                                                </div>
                                                <button class="carousel-control-prev"
                                                        data-bs-target="#carousel-ini{{$initiative->id}}"
                                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next"
                                                        data-bs-target="#carousel-ini{{$initiative->id}}"
                                                        data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                            <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                <div class="col-10">
                                                    <div class="card-title">{{$initiative->$language->title}}</div>
                                                </div>
                                                <div class="col-2 text-end">
                                                    @if($initiative->video !== '0')
                                                        {{--<a href="#" class="launch-modal"--}}
                                                        {{--data-modal-id="modal-video-{{$initiative->id}}">--}}
                                                        {{----}}
                                                        {{--</a>--}}
                                                        <a href="{{$initiative->video}}" class="launch-modal"
                                                           id="iniVideo-{{$initiative->id}}"
                                                           data-fancybox="iniVideo-{{$initiative->id}}">
                                                            <img class="video-icon"
                                                                 src="/images/ico/video-ini-icon.svg">
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <div class="card-title-section"></div>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                @if($initiative->$language->date_string !== '0')
                                                    <div>
                                                        <strong>Date: </strong>{{$initiative->$language->date_string}}
                                                    </div>
                                                @endif
                                                {{--@if($initiative->donors[0]['name'] !== '')--}}
                                                {{--<div><strong>Funded By: </strong>{{$initiative->donors[0]['name']}}--}}
                                                {{--</div>--}}
                                                {{--@endif--}}
                                                @if($initiative->$language->organization !== '0')
                                                    <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                                @endif
                                                @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                    <div><br></div>
                                                @endif
                                                @if(strlen($initiative->$language->content)>30)
                                                    <div>{!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->content)), 0, 30)).'...'!!}</div>
                                                @endif

                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    @if(isset($subWhatCategory))
                                                        <a href="{{ route($route, [
                                                Str::slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                Str::slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                           class="readmore-btn">@lang('main.readMore')
                                                        </a>
                                                    @else
                                                        <a href="{{ route('new.public.initiative',
                                [Str::slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                Str::slug(strtolower($initiative->english->title))]   ) }}"
                                                           class="readmore-btn">@lang('main.readMore')</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if(strlen($ini_H)>5)
                            <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="600"></div>
                            <div class="text-center" data-aos="fade-up" data-aos-duration="800">
                                {{$ini_H->withQueryString(['ini_H' => $ini_H->currentPage()])->links()}}

                            </div>
                        @endif
                        {{--<div class="small horizontal-line" data-aos="fade-up" data-aos-duration="800"></div>--}}
                    </div>
                </div>
            @else
                @php
                    $num = 0;
                @endphp
                <div class="tab-content position-relative" id="myTabContent">
                    <div class="tab-pane fade show active" id="aleppo" role="tabpanel" aria-labelledby="aleppoTab"
                         tabindex="0">
                        @if(count($ini_A)==0)
                            <div class="card-height">
                                <div class="single-card">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
                                            <div class="text-center">
                                                Sorry, we couldn't find any results
                                            </div>
                                            <div>@lang('projects.sorryMessage2')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach($ini_A as $i=>$initiative)
                            <div class="card-height">
                                <div class="single-card">
                                    <div class="row">
                                        @if($num %2 ==0)
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
                                                <div id="carousel-ini{{$initiative->id}}"
                                                     class="carousel slide w-100 project-carousel"
                                                     data-bs-ride="carousel"
                                                     data-interval="1000">
                                                    <div class="carousel-inner project-carousel">
                                                        <?php $k = 0 ?>
                                                        @foreach($initiative->ImagesRandom as $image)
                                                            <div class="carousel-item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-Cu-{{$initiative->id}}"
                                                                   data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                                    <img class="w-100 h-100 d-block"
                                                                         src="{{$image->path}}"
                                                                         style="object-fit: cover"/></a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button class="carousel-control-prev"
                                                            data-bs-target="#carousel-ini{{$initiative->id}}"
                                                            data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next"
                                                            data-bs-target="#carousel-ini{{$initiative->id}}"
                                                            data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                <div style="padding-left: .6vw">
                                                    <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                        <div class="col-10">
                                                            <div class="card-title">{{$initiative->$language->title}}</div>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            @if($initiative->video !== '0')
                                                                <a href="{{$initiative->video}}" class="launch-modal"
                                                                   id="iniVideo-{{$initiative->id}}"
                                                                   data-fancybox="iniVideo-{{$initiative->id}}">
                                                                    <img class="video-icon"
                                                                         src="/images/ico/video-ini-icon.svg">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card-title-section"></div>
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        @if($initiative->$language->date_string !== '0')
                                                            <div>
                                                                <strong>Date: </strong>{{$initiative->$language->date_string}}
                                                            </div>
                                                        @endif
                                                        {{--@if($initiative->donors[0]['name'] !== '')--}}
                                                        {{--<div><strong>Funded By: </strong>{{$initiative->donors[0]['name']}}--}}
                                                        {{--</div>--}}
                                                        {{--@endif--}}
                                                        @if($initiative->$language->organization !== '0')
                                                            <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                                        @endif
                                                        @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                            <div><br></div>
                                                        @endif
                                                        @if(strlen($initiative->$language->content)>30)
                                                            <div>{!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->content)), 0, 30)).'...'!!}</div>
                                                        @endif

                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            @if(isset($subWhatCategory))
                                                                <a href="{{ route($route, [
                                                Str::slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                Str::slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                                   class="readmore-btn">@lang('main.readMore')
                                                                </a>
                                                            @else
                                                                <a href="{{ route('new.public.initiative',
                                [Str::slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                Str::slug(strtolower($initiative->english->title))]   ) }}"
                                                                   class="readmore-btn">@lang('main.readMore')</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                <div style="padding-right: .6vw">
                                                    <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                        <div class="col-10">
                                                            <div class="card-title">{{$initiative->$language->title}}</div>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            @if($initiative->video !== '0')
                                                                {{--<a href="#" class="launch-modal"--}}
                                                                {{--data-modal-id="modal-video-{{$initiative->id}}">--}}
                                                                {{----}}
                                                                {{--</a>--}}
                                                                <a href="{{$initiative->video}}" class="launch-modal"
                                                                   id="iniVideo-{{$initiative->id}}"
                                                                   data-fancybox="iniVideo-{{$initiative->id}}">
                                                                    <img class="video-icon"
                                                                         src="/images/ico/video-ini-icon.svg">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card-title-section"></div>
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        @if($initiative->$language->date_string !== '0')
                                                            <div>
                                                                <strong>Date: </strong>{{$initiative->$language->date_string}}
                                                            </div>
                                                        @endif
                                                        {{--@if($initiative->donors[0]['name'] !== '')--}}
                                                        {{--<div><strong>Funded By: </strong>{{$initiative->donors[0]['name']}}</div>--}}
                                                        {{--@endif--}}
                                                        @if($initiative->$language->organization !== '0')
                                                            <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                                        @endif
                                                        @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                            <div><br></div>
                                                        @endif
                                                        @if(strlen($initiative->$language->content)>30)
                                                            <div>{!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->content)), 0, 30)).'...'!!}</div>
                                                        @endif

                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            @if(isset($subWhatCategory))
                                                                <a href="{{ route($route, [
                                                Str::slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                Str::slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                                   class="readmore-btn">@lang('main.readMore')
                                                                </a>
                                                            @else
                                                                <a href="{{ route('new.public.initiative',
                                [Str::slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                Str::slug(strtolower($initiative->english->title))]   ) }}"
                                                                   class="readmore-btn">@lang('main.readMore')</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end ps-lg-0 ps-md-0 ps-sm-0">
                                                <div id="carousel-ini{{$initiative->id}}"
                                                     class="carousel slide w-100 project-carousel"
                                                     data-bs-ride="carousel"
                                                     data-interval="1000">
                                                    <div class="carousel-inner project-carousel">
                                                        <?php $k = 0 ?>
                                                        @foreach($initiative->ImagesRandom as $image)
                                                            <div class="carousel-item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-Cu-{{$initiative->id}}"
                                                                   data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                                    <img class="w-100 h-100 d-block"
                                                                         src="{{$image->path}}"
                                                                         style="object-fit: cover"/></a>
                                                            </div>
                                                        @endforeach
                                                        {{--<div class="carousel-item active">--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--src="{{$initiative->ImagesRandom[0]['path']}}">--}}
                                                        {{--</div>--}}
                                                        {{--<div class="carousel-item">--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--src="{{$initiative->ImagesRandom[1]['path']}}">--}}
                                                        {{--</div>--}}
                                                        {{--@if(count($initiative->ImagesRandom) > 2)--}}
                                                        {{--<div class="carousel-item">--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--src="{{$initiative->ImagesRandom[2]['path']}}">--}}
                                                        {{--</div>--}}
                                                        {{--@endif--}}
                                                    </div>
                                                    <button class="carousel-control-prev"
                                                            data-bs-target="#carousel-ini{{$initiative->id}}"
                                                            data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next"
                                                            data-bs-target="#carousel-ini{{$initiative->id}}"
                                                            data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @php $num++ ;@endphp
                        @endforeach
                        @if(strlen($ini_A)>5)
                            <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="600"></div>
                            <div class="text-center" data-aos="fade-up" data-aos-duration="300">
                                {{$ini_A->withQueryString(['ini_A' => $ini_A->currentPage()])->links()}}
                                {{--                        {{$ini_A->appends(['ini_A' => $ini_A->links()}}--}}
                                {{--{{$ini_A->appends(['ini_A' => $ini_A])->links()}}--}}
                                {{--{{ $ini_A->appends($_GET)->links() }}--}}
                            </div>
                        @endif
                        {{--<div class="small horizontal-line" data-aos="fade-up" data-aos-duration="800"></div>--}}
                    </div>
                    <div class="tab-pane fade show" id="homs" role="tabpanel" aria-labelledby="homsTab" tabindex="1">
                        @if(count($ini_H)==0)
                            <div class="card-height">
                                <div class="single-card">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
                                            <div class="text-center">
                                                Sorry, we couldn't find any results
                                            </div>
                                            <div>@lang('projects.sorryMessage2')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach($ini_H as $i=>$initiative)
                            <div class="card-height">
                                <div class="single-card">
                                    <div class="row">
                                        @if($num %2 ==0)
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pe-md-0 pe-sm-0">
                                                <div id="carousel-ini{{$initiative->id}}"
                                                     class="carousel slide w-100 project-carousel"
                                                     data-bs-ride="carousel"
                                                     data-interval="1000">
                                                    <div class="carousel-inner project-carousel">
                                                        <?php $k = 0 ?>
                                                        @foreach($initiative->ImagesRandom as $image)
                                                            <div class="carousel-item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-Cu-{{$initiative->id}}"
                                                                   data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                                    <img class="w-100 h-100 d-block"
                                                                         src="{{$image->path}}"
                                                                         style="object-fit: cover"></a>
                                                            </div>
                                                        @endforeach
                                                        {{--<div class="carousel-item active">--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--src="{{$initiative->ImagesRandom[0]['path']}}">--}}
                                                        {{--</div>--}}
                                                        {{--<div class="carousel-item">--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--src="{{$initiative->ImagesRandom[1]['path']}}">--}}
                                                        {{--</div>--}}
                                                        {{--@if(count($initiative->ImagesRandom) > 2)--}}
                                                        {{--<div class="carousel-item">--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--src="{{$initiative->ImagesRandom[2]['path']}}">--}}
                                                        {{--</div>--}}
                                                        {{--@endif--}}
                                                    </div>
                                                    <button class="carousel-control-prev"
                                                            data-bs-target="#carousel-ini{{$initiative->id}}"
                                                            data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next"
                                                            data-bs-target="#carousel-ini{{$initiative->id}}"
                                                            data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                <div style="padding-left: .6vw">
                                                    <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                        <div class="col-10">
                                                            <div class="card-title">{{$initiative->$language->title}}</div>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            @if($initiative->video !== '0')
                                                                {{--<a href="#" class="launch-modal"--}}
                                                                {{--data-modal-id="modal-video-{{$initiative->id}}">--}}
                                                                {{----}}
                                                                {{--</a>--}}
                                                                <a href="{{$initiative->video}}" class="launch-modal"
                                                                   id="iniVideo-{{$initiative->id}}"
                                                                   data-fancybox="iniVideo-{{$initiative->id}}">
                                                                    <img class="video-icon"
                                                                         src="/images/ico/video-ini-icon.svg">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card-title-section"></div>
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        @if($initiative->$language->date_string !== '0')
                                                            <div>
                                                                <strong>Date: </strong>{{$initiative->$language->date_string}}
                                                            </div>
                                                        @endif
                                                        {{--@if($initiative->donors[0]['name'] !== '')--}}
                                                        {{--<div><strong>Funded By: </strong>{{$initiative->donors[0]['name']}}--}}
                                                        {{--</div>--}}
                                                        {{--@endif--}}
                                                        @if($initiative->$language->organization !== '0')
                                                            <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                                        @endif
                                                        @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                            <div><br></div>
                                                        @endif
                                                        @if(strlen($initiative->$language->content)>30)
                                                            <div>{!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->content)), 0, 30)).'...'!!}</div>
                                                        @endif

                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            @if(isset($subWhatCategory))
                                                                <a href="{{ route($route, [
                                                Str::slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                Str::slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                                   class="readmore-btn">@lang('main.readMore')
                                                                </a>
                                                            @else
                                                                <a href="{{ route('new.public.initiative',
                                [Str::slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                Str::slug(strtolower($initiative->english->title))]   ) }}"
                                                                   class="readmore-btn">@lang('main.readMore')</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                <div style="padding-right: .6vw">
                                                    <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                        <div class="col-10">
                                                            <div class="card-title">{{$initiative->$language->title}}</div>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            @if($initiative->video !== '0')
                                                                {{--<a href="#" class="launch-modal"--}}
                                                                {{--data-modal-id="modal-video-{{$initiative->id}}">--}}
                                                                {{----}}
                                                                {{--</a>--}}
                                                                <a href="{{$initiative->video}}" class="launch-modal"
                                                                   id="iniVideo-{{$initiative->id}}"
                                                                   data-fancybox="iniVideo-{{$initiative->id}}">
                                                                    <img class="video-icon"
                                                                         src="/images/ico/video-ini-icon.svg">
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card-title-section"></div>
                                                        </div>
                                                    </div>
                                                    <div class="card-content">
                                                        @if($initiative->$language->date_string !== '0')
                                                            <div>
                                                                <strong>Date: </strong>{{$initiative->$language->date_string}}
                                                            </div>
                                                        @endif
                                                        {{--@if($initiative->donors[0]['name'] !== '')--}}
                                                        {{--<div><strong>Funded By: </strong>{{$initiative->donors[0]['name']}}--}}
                                                        {{--</div>--}}
                                                        {{--@endif--}}
                                                        @if($initiative->$language->organization !== '0')
                                                            <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                                        @endif
                                                        @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                            <div><br></div>
                                                        @endif
                                                        @if(strlen($initiative->$language->content)>30)
                                                            <div>{!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->content)), 0, 30)).'...'!!}</div>
                                                        @endif

                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            @if(isset($subWhatCategory))
                                                                <a href="{{ route($route, [
                                                Str::slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                Str::slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                                   class="readmore-btn">@lang('main.readMore')
                                                                </a>
                                                            @else
                                                                <a href="{{ route('new.public.initiative',
                                [Str::slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                Str::slug(strtolower($initiative->english->title))]   ) }}"
                                                                   class="readmore-btn">@lang('main.readMore')</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end ps-lg-0 ps-md-0 ps-sm-0">
                                                <div id="carousel-ini{{$initiative->id}}"
                                                     class="carousel slide w-100 project-carousel"
                                                     data-bs-ride="carousel"
                                                     data-interval="1000">
                                                    <div class="carousel-inner project-carousel">
                                                        <?php $k = 0 ?>
                                                        @foreach($initiative->ImagesRandom as $image)
                                                            <div class="carousel-item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-Cu-{{$initiative->id}}"
                                                                   data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                                    <img class="w-100 h-100 d-block"
                                                                         src="{{$image->path}}"
                                                                         style="object-fit: cover"></a>
                                                            </div>
                                                        @endforeach
                                                        {{--<div class="carousel-item active">--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--src="{{$initiative->ImagesRandom[0]['path']}}">--}}
                                                        {{--</div>--}}
                                                        {{--<div class="carousel-item">--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--src="{{$initiative->ImagesRandom[1]['path']}}">--}}
                                                        {{--</div>--}}
                                                        {{--@if(count($initiative->ImagesRandom) > 2)--}}
                                                        {{--<div class="carousel-item">--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--src="{{$initiative->ImagesRandom[2]['path']}}">--}}
                                                        {{--</div>--}}
                                                        {{--@endif--}}
                                                    </div>
                                                    <button class="carousel-control-prev"
                                                            data-bs-target="#carousel-ini{{$initiative->id}}"
                                                            data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next"
                                                            data-bs-target="#carousel-ini{{$initiative->id}}"
                                                            data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @php $num++ ;@endphp
                        @endforeach

                        @if(strlen($ini_H)>5)
                            <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="300"></div>
                            <div class="text-center" data-aos="fade-up" data-aos-duration="300">
                                {{$ini_H->withQueryString(['ini_H' => $ini_H->currentPage()])->links()}}
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="horizontal-line" data-aos="fade-up" data-aos-duration="800"></div>
    @include('new.public.components.project-partners-section', ['donors_ongoing' => $partners_ongoing,'donors_previous' => $partners_previous])
    <div class="horizontal-line last"></div>
</div>

@include('new.public.footer-children')
@stack('fancyVideo')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
<script>
    $('#Informatics').addClass("selectedCategory");
    console.log(document.getElementById("Informatics"));
    document.getElementById("Informatics").addEventListener("click", function () {
        $('#Informatics').addClass("selectedCategory");
        $('#Media').removeClass("selectedCategory");
        $('#Medicine').removeClass("selectedCategory");
        $('#Engineering').removeClass("selectedCategory");
        $('#Science').removeClass("selectedCategory");
        document.querySelector('.section-title.category-title').innerHTML = 'Informatics';
        document.querySelector('.section-title.category-title.sm').innerHTML = 'Informatics';
        document.querySelector('.section-title-desc').innerHTML =
            '<div data-aos="fade-up" data-aos-duration="300">The foundation begins with STEM courses, building a base for enhancing scientific and mathematical problem-solving </div> ' +
            '<div data-aos="fade-up" data-aos-duration="500"> abilities. Next, children study block programming using websites like SCRATCH. At the advanced level, they  </div>'+
            '<div data-aos="fade-up" data-aos-duration="700"> learn PYTHON. LEGO aids in practically implementing these ideas, making it engaging for children.</div>';
        document.querySelector('.section-title-desc.sm').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">The foundation begins with STEM courses, building a base for enhancing scientific and mathematical problem-solving abilities. Next, children study block programming using websites like SCRATCH. At the advanced level, they learn PYTHON. LEGO aids in practically implementing these ideas, making it engaging for children. </div>';
    });
    document.getElementById("Informatics").addEventListener("mouseenter", function () {
        $('#Informatics').addClass("selectedCategory");
        $('#Media').removeClass("selectedCategory");
        $('#Medicine').removeClass("selectedCategory");
        $('#Engineering').removeClass("selectedCategory");
        $('#Science').removeClass("selectedCategory");

        document.querySelector('.section-title.category-title').innerHTML = 'Informatics';
        document.querySelector('.section-title.category-title.sm').innerHTML = 'Informatics';
        document.querySelector('.section-title-desc').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">The foundation begins with STEM courses, building a base for enhancing scientific and mathematical problem-solving </div> ' +
        '<div data-aos="fade-up" data-aos-duration="500"> abilities. Next, children study block programming using websites like SCRATCH. At the advanced level, they  </div>'+
        '<div data-aos="fade-up" data-aos-duration="700"> learn PYTHON. LEGO aids in practically implementing these ideas, making it engaging for children.</div>';
        document.querySelector('.section-title-desc.sm').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">The foundation begins with STEM courses, building a base for enhancing scientific and mathematical problem-solving abilities. Next, children study block programming using websites like SCRATCH. At the advanced level, they learn PYTHON. LEGO aids in practically implementing these ideas, making it engaging for children. </div>';
    });
    document.getElementById("Medicine").addEventListener("click", function () {
        $('#Medicine').addClass("selectedCategory");
        $('#Media').removeClass("selectedCategory");
        $('#Informatics').removeClass("selectedCategory");
        $('#Engineering').removeClass("selectedCategory");
        $('#Science').removeClass("selectedCategory");
        document.querySelector('.section-title.category-title').innerHTML = 'Medicine';
        document.querySelector('.section-title.category-title.sm').innerHTML = 'Medicine';

        document.querySelector('.section-title-desc').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">In this field, children would find themselves in a medical environment similar to hospitals to truly interact with, and learn</div> <div data-aos="fade-up" data-aos-duration="500">the real purpose of this profession, in addition to integrating modern teaching techniques in the process of teaching,</div><div data-aos="fade-up" data-aos-duration="700"> such as using HUMAN ANATOMY ATLAS to experience aspects of the medical field through innovative experiments.</div>';
        document.querySelector('.section-title-desc.sm').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">In this field, children would find themselves in a medical environment similar to hospitals to truly interact with, and learn the real purpose of this profession, in addition to integrating modern teaching techniques in the process of teaching, such as using HUMAN ANATOMY ATLAS to experience aspects of the medical field through innovative experiments.</div>';

    });
    document.getElementById("Medicine").addEventListener("mouseenter", function () {
        $('#Medicine').addClass("selectedCategory");
        $('#Media').removeClass("selectedCategory");
        $('#Informatics').removeClass("selectedCategory");
        $('#Engineering').removeClass("selectedCategory");
        $('#Science').removeClass("selectedCategory");
        document.querySelector('.section-title.category-title.sm').innerHTML = 'Medicine';
        document.querySelector('.section-title.category-title').innerHTML = 'Medicine';
        document.querySelector('.section-title-desc.sm').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">In this field, children would find themselves in a medical environment similar to hospitals to truly interact with, and learn the real purpose of this profession, in addition to integrating modern teaching techniques in the process of teaching, such as using HUMAN ANATOMY ATLAS to experience aspects of the medical field through innovative experiments.</div>';
        document.querySelector('.section-title-desc').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">In this field, children would find themselves in a medical environment similar to hospitals to truly interact with, and learn</div> <div data-aos="fade-up" data-aos-duration="500">the real purpose of this profession, in addition to integrating modern teaching techniques in the process of teaching,</div><div data-aos="fade-up" data-aos-duration="700"> such as using HUMAN ANATOMY ATLAS to experience aspects of the medical field through innovative experiments.</div>';
    });
    document.getElementById("Engineering").addEventListener("click", function () {
        $('#Engineering').addClass("selectedCategory");
        $('#Media').removeClass("selectedCategory");
        $('#Informatics').removeClass("selectedCategory");
        $('#Science').removeClass("selectedCategory");
        $('#Medicine').removeClass("selectedCategory");
        document.querySelector('.section-title.category-title').innerHTML = 'Engineering';
        document.querySelector('.section-title.category-title.sm').innerHTML = 'Engineering';
        document.querySelector('.section-title-desc.sm').innerHTML = '<div>Children explore the basics of architectural design, and how they can turn their sketches and blueprints into digital plans, 3d printed and hand-crafted maquettes. They also get the opportunity to visit engineering sites to see how real buildings are built.</div>';
        document.querySelector('.section-title-desc').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">Children explore the basics of architectural design, and how they can turn their sketches and blueprints </div><div data-aos="fade-up" data-aos-duration="500">into digital plans, 3d printed and hand-crafted maquettes. They also get the opportunity </div><div data-aos="fade-up" data-aos-duration="700">to visit engineering sites to see how real buildings are built.</div>';
    });
    document.getElementById("Engineering").addEventListener("mouseenter", function () {
        $('#Engineering').addClass("selectedCategory");
        $('#Media').removeClass("selectedCategory");
        $('#Informatics').removeClass("selectedCategory");
        $('#Science').removeClass("selectedCategory");
        $('#Medicine').removeClass("selectedCategory");
        document.querySelector('.section-title-desc.sm').innerHTML = '<div>Children explore the basics of architectural design, and how they can turn their sketches and blueprints into digital plans, 3d printed and hand-crafted maquettes. They also get the opportunity to visit engineering sites to see how real buildings are built.</div>';
        document.querySelector('.section-title.category-title.sm').innerHTML = 'Engineering';
        document.querySelector('.section-title.category-title').innerHTML = 'Engineering';
        document.querySelector('.section-title-desc').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">Children explore the basics of architectural design, and how they can turn their sketches and blueprints </div><div data-aos="fade-up" data-aos-duration="500">into digital plans, 3d printed and hand-crafted maquettes. They also get the opportunity </div><div data-aos="fade-up" data-aos-duration="700">to visit engineering sites to see how real buildings are built.</div>';
    });
    document.getElementById("Science").addEventListener("click", function () {
        $('#Science').addClass("selectedCategory");
        $('#Media').removeClass("selectedCategory");
        $('#Informatics').removeClass("selectedCategory");
        $('#Engineering').removeClass("selectedCategory");
        $('#Medicine').removeClass("selectedCategory");
        document.querySelector('.section-title.category-title').innerHTML = 'Science';
        document.querySelector('.section-title.category-title.sm').innerHTML = 'Science';

        document.querySelector('.section-title-desc').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">Children dive into the fascinating worlds of physics and chemistry, enjoying the thrill of unraveling the</div><div data-aos="fade-up" data-aos-duration="500"> mysteries of the universe through safe and exciting experimentation, they solve </div><div data-aos="fade-up" data-aos-duration="700">complex problems and study scientific phenomena.</div>';
        document.querySelector('.section-title-desc.sm').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">Children dive into the fascinating worlds of physics and chemistry, enjoying the thrill of unraveling the mysteries of the universe through safe and exciting experimentation, they solve complex problems and study scientific phenomena.</div>';

    });
    document.getElementById("Science").addEventListener("mouseenter", function () {
        $('#Science').addClass("selectedCategory");
        $('#Media').removeClass("selectedCategory");
        $('#Informatics').removeClass("selectedCategory");
        $('#Engineering').removeClass("selectedCategory");
        $('#Medicine').removeClass("selectedCategory");
        document.querySelector('.section-title.category-title').innerHTML = 'Science';
        document.querySelector('.section-title-desc').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">Children dive into the fascinating worlds of physics and chemistry, enjoying the thrill of unraveling the</div><div data-aos="fade-up" data-aos-duration="500"> mysteries of the universe through safe and exciting experimentation, they solve </div><div data-aos="fade-up" data-aos-duration="700">complex problems and study scientific phenomena.</div>';
        document.querySelector('.section-title-desc.sm').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">Children dive into the fascinating worlds of physics and chemistry, enjoying the thrill of unraveling the mysteries of the universe through safe and exciting experimentation, they solve complex problems and study scientific phenomena.</div>';
        document.querySelector('.section-title.category-title.sm').innerHTML = 'Science';
    });
    document.getElementById("Media").addEventListener("click", function () {
        $('#Media').addClass("selectedCategory");
        $('#Engineering').removeClass("selectedCategory");
        $('#Informatics').removeClass("selectedCategory");
        $('#Science').removeClass("selectedCategory");
        $('#Medicine').removeClass("selectedCategory");
        document.querySelector('.section-title.category-title.sm').innerHTML = 'Media';
        document.querySelector('.section-title.category-title').innerHTML = 'Media';
        document.querySelector('.section-title-desc.sm').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">This curriculum is designed to enhance the child’s speaking and interactive skills, as children experience interactive forms that will train them in public speaking, conduct journalistic interviews, and teach them how to professionally use the camera for directing and production.</div>';
        document.querySelector('.section-title-desc').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">This curriculum is designed to enhance the child’s speaking and interactive skills, as children experience</div><div data-aos="fade-up" data-aos-duration="500"> interactive forms that will train them in public speaking, conduct journalistic interviews, </div><div data-aos="fade-up" data-aos-duration="700"> and teach them how to professionally use the camera for directing and production.</div>';
    });
    document.getElementById("Media").addEventListener("mouseenter", function () {
        $('#Media').addClass("selectedCategory");
        $('#Engineering').removeClass("selectedCategory");
        $('#Informatics').removeClass("selectedCategory");
        $('#Science').removeClass("selectedCategory");
        $('#Medicine').removeClass("selectedCategory");
        document.querySelector('.section-title.category-title.sm').innerHTML = 'Media';
        document.querySelector('.section-title.category-title').innerHTML = 'Media';
        document.querySelector('.section-title-desc.sm').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">This curriculum is designed to enhance the child’s speaking and interactive skills, as children experience interactive forms that will train them in public speaking, conduct journalistic interviews, and teach them how to professionally use the camera for directing and production.</div>';
        document.querySelector('.section-title-desc').innerHTML = '<div data-aos="fade-up" data-aos-duration="300">This curriculum is designed to enhance the child’s speaking and interactive skills, as children experience</div><div data-aos="fade-up" data-aos-duration="500"> interactive forms that will train them in public speaking, conduct journalistic interviews, </div><div data-aos="fade-up" data-aos-duration="700"> and teach them how to professionally use the camera for directing and production.</div>';
    });
</script>
<script>
    $(function () {
        $('#aleppoTab').on('click', function () {
            // e.preventDefault();
            let aleppo = document.getElementById('aleppoTab');
            let tab = new bootstrap.Tab(aleppo);
            tab.show();
            let url = new URL(window.location.href);
            url.searchParams.set('tab', 'aleppo');
            history.pushState({}, '', url.href);
        });
        $('#homsTab').on('click', function () {
            // e.preventDefault();
            let homs = document.getElementById('homsTab');
            let tab = new bootstrap.Tab(homs);
            tab.show();
            let url = new URL(window.location.href);
            url.searchParams.set('tab', 'homs');
            history.pushState({}, '', url.href);
        });
    });
</script>
<script>
    $(document).ready(function () {
        let url = new URL(window.location.href);
        let input = document.getElementById('search-input');

        let searchsearch = document.getElementById('search-icon');
        let switchsearch = document.getElementById('switch-search');
        let s = '';

        if (url.searchParams.get('search') === '' || url.searchParams.get('search') == null) {
            searchsearch.src = "/images/ico/search-blue-icon.png";
            switchsearch.style.background = '#f7f7f7';
        }
        else {
            $('html, body').animate({
                scrollTop: $('#initiative-section').offset().top
            }, 'slow');
            s = url.searchParams.get("search");
            input.value = s;
            searchsearch.src = "/images/ico/reverst-search.svg";
            switchsearch.style.background = '#063c54';
        }

        if (url.searchParams.get('tab') === '' || url.searchParams.get('tab') == null) {
            if (window.location.href.includes('ini_A'))
                url.searchParams.set('tab', 'aleppo');
            else if (window.location.href.includes('ini_H'))
                url.searchParams.set('tab', 'homs');
            else url.searchParams.set('tab', 'aleppo');
            history.pushState({}, '', url.href);
        }

        let tab = url.searchParams.get("tab") + "Tab";
        let t = document.getElementById(tab);
        let tt = new bootstrap.Tab(t);
        tt.show();

    });
</script>
<script>
    let substringMatcher = function (strs) {
        return function findMatches(q, cb) {
            let matches, substrRegex;
            matches = [];
            substrRegex = new RegExp(q, 'i');
            $.each(strs, function (i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });
            cb(matches);
        };
    };
    let activities = [];
    @foreach($searchProject as $s)
    activities.push(('{{ $s->title }}').replace('&#039;', '\''));
    @endforeach
    {{--@foreach($searchBeneficiary as $s)--}}
    {{--beneficiaries.push(('{{ $s->MPE_BeneficiaryName }}').replace('&#039;', '\''));--}}
    {{--@endforeach--}}

    $('#search-input').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'activities',
            source: substringMatcher(activities),
            templates: {
                header: '<h5 class="league-name">activities</h5>'
            }
        }
    ).on('typeahead:select', function () {
        selected_tab = $('tab_input').val();
        // $('#submit-form').submit();
        searchFilter();
    });
</script>
<script>
    const inputEl = document.getElementById("search-input");

    inputEl.addEventListener("keyup", manageEnter);

    function manageEnter(evt) {
        evt.preventDefault();
        if (evt.keyCode === 13) {
            searchFilter();
        }
    }
</script>
<script>
    function searchFilter() {
        let val = document.getElementById("search-input").value
        let urlsearch = new URL(window.location.href);
        urlsearch.searchParams.set('search', val);
        history.pushState({}, '', urlsearch.href);
        window.location.href = urlsearch.href;
    }
</script>
<script>
    $(document).ready(function () {
        if (window.innerWidth > 1023) {
            $(".navbar").show(); //hide your div initially
            var topOfCategories = $(".categories-img").offset().top - 92;
            var topOfOActivities = $("#initiative-section").offset().top - 92;
            $(window).scroll(function () {
                if ($(window).scrollTop() >= topOfCategories && $(window).scrollTop() < topOfOActivities) { //scrolled past the other div?
                    $(".navbar").hide(); //reached the desired point -- show div
                }
                else {
                    $(".navbar").show();//else above the desired point -- hide div
                }
            });
        }
    });
</script>
</body>
</html>
