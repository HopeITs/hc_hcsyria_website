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
    @include('new.public.components.analytics-head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">

    <meta name="keywords" content="aleppo syria, hope, center, leap, youth"/>
    <title>LEAP</title>
    <link href="{{asset('css/tabs.css')}}" rel="stylesheet">
    <link href="{{asset('css/initiatives_new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/leap.css')}}" rel="stylesheet" type="text/css">
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
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>
    <link rel="stylesheet" href="/css/animate.min.css"
          integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<body>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')
<div id="LEAP" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                    </div>
                    <div class="content">
                        <div class="main_title" data-aos="fade-up" data-aos-duration="600"> LEADERSHIP, EMPOWERMENT &
                            ACHIEVEMENT
                        </div>
                        <div class="main_subtitle" data-aos="fade-up" data-aos-duration="1000">LEAP PROGRAM</div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                    <img src="/images/logos/LEAP/LEAP.svg" class="d-block project-logo" data-aos="fade-up"
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
    <div id="vision-section" class="small-margin section-space" data-aos="fade-up" data-aos-duration="600">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                    <div class="section-title pb-0">Vision</div>
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col">
                            <div class="d-lg-none d-md-none d-sm-none d-block">
                                <div class="section-title-desc">
                                    <div data-aos="fade-up" data-aos-duration="300"> A leader rooted in self-awareness,
                                        guided by empathy, and driven
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="600"> to lead transformative change.
                                    </div>
                                </div>
                            </div>
                            <div class="d-lg-block d-md-block d-sm-block d-none">
                                <div class="section-title-desc">
                                    <div data-aos="fade-up" data-aos-duration="300">A leader rooted in self-awareness,
                                        guided by empathy, and driven
                                    </div>
                                    <div data-aos="fade-up" data-aos-duration="600">to lead transformative change.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-line aos-init aos-animate" data-aos="fade-up" data-aos-duration="800"></div>
    <div id="categories-section" class="section-space pb-5" data-aos="fade-up" data-aos-duration="600">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="600">
                <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                    <div class="section-title pb-0">Four Aspects of LEAP Program</div>
                    <div class="row w-100 d-flex justify-content-center text-center">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-11">
                            <div class="section-title-desc">
                                <div data-aos="fade-up" data-aos-duration="300">In a time of growing uncertainty and
                                    limited leadership among youth in Syria, Hope Center
                                </div>
                                <div data-aos="fade-up" data-aos-duration="600">
                                    recognized the importance of a Christian leader—one who embodies faith, resilience,
                                    and relevance.
                                </div>
                                <div data-aos="fade-up" data-aos-duration="900"> Leadership today cannot rely on
                                    spiritual passion alone; it must also be rooted in personal maturity,
                                </div>
                                <div data-aos="fade-up" data-aos-duration="900"> supported by technical capability, and
                                    guided by an impactful vision.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="categories-content justify-content-center">
            <button id="Personal" class="category"><img id="personal_img" class="w-75"
                                                        src="/images/home/LEAP/Categories/personal.png">
            </button>
            <button id="Spiritual" class="category"><img id="spiritual_img" class="w-75"
                                                         src="/images/home/LEAP/Categories/spiritual.png">
            </button>
            <button id="Visionary" class="category"><img id="visionary_img" class="w-75"
                                                         src="/images/home/LEAP/Categories/visionary.png">
            </button>
            <button id="Technical" class="category"><img id="technical_img" class="w-75"
                                                         src="/images/home/LEAP/Categories/technical.png">
            </button>
        </div>
        <div class="container-fluid">
            <div class="page-margin mt-0 categories-container">
                <div class="row" data-aos="fade-up" data-aos-duration="600">
                    <div class="col-12 d-flex justify-content-start flex-column align-items-start">
                        <div class="section-title category-title pb-0 pt-2 ps-0" style="color: #3ba5af !important;">
                            Personal Growth
                        </div>
                        <div class="row d-flex justify-content-start text-start w-100">
                            <div class="col-lg-10 col-md-11 col-sm-11 col-10">
                                <div class="section-title-desc description mb-0">
                                    <div data-aos="fade-up" data-aos-duration="600">
                                        <div>
                                            <span style="font-weight: 900">Focus:</span> Building the leader’s
                                            identity, confidence, and relational intelligence
                                        </div>
                                        <div>
                                            <span style="font-weight: 900">Self-awareness phase:</span> Leaders
                                            explore their strengths, weaknesses, and values through
                                            personality assessments and reflective tasks
                                        </div>
                                        <div>
                                            <span style="font-weight: 900"> Group work:</span>
                                            Participants self-organize into teams, take on roles, and practice
                                            responsibility and accountability
                                        </div>
                                        <div>
                                            <span style="font-weight: 900">Communication skills: </span>Training on
                                            effective speaking, listening, and presentation techniques
                                        </div>
                                        <div>
                                            <span style="font-weight: 900">Case studies and role rotation:</span>Leaders
                                            engage in real-world simulations (debate, business cases, social
                                            initiatives)
                                            to refine collaboration and leadership under pressure
                                        </div>
                                        <div>
                                            <span style="font-weight: 900">Life coaching</span>is a professional
                                            partnership in which a coach helps identify goals, overcome obstacles,
                                            and create strategies for personal and professional growth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-line aos-init aos-animate" data-aos="fade-up" data-aos-duration="800"></div>
    <div class="container-fluid section-space" data-aos="fade-up" data-aos-duration="600">
        <div class="row">
            <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                <div class="section-title pb-0 mt-3">Steps</div>
            </div>
        </div>
        <div class="row">
            <img src="/images/home/steps.jpg" class="w-100 h-100">
        </div>
    </div>

    @if(count($whatCategory)>0)
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
            <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="800"
                 style="z-index: -1;"></div>
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
                        <div class="tab-pane fade show active" id="aleppo" role="tabpanel"
                             aria-labelledby="aleppoTab"
                             tabindex="0">
                            @if(count($ini_A)==0)
                                <div class="card-height">
                                    <div class="single-card">
                                        <div class="row">
                                            <div
                                                class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
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
                                            <div
                                                class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
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
                                                        {{--<img class="w-100"--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--<img class="w-100"--}}
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
                                            <div
                                                class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                    <div class="col-10">
                                                        <div
                                                            class="card-title">{{$initiative->$language->title}}</div>
                                                    </div>
                                                    <div class="col-2 text-end">
                                                        @if($initiative->video !== '0')
                                                            {{--<a href="#" class="launch-modal"--}}
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
                        </div>
                        <div class="tab-pane fade show" id="homs" role="tabpanel" aria-labelledby="homsTab"
                             tabindex="1">
                            @if(count($ini_H)==0)
                                <div class="card-height">
                                    <div class="single-card">
                                        <div class="row">
                                            <div
                                                class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
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
                                            <div
                                                class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
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
                                                        {{--<img class="w-100"--}}
                                                        {{--<img class="w-100"--}}
                                                        {{--<img class="w-100"--}}
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
                                            <div
                                                class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                    <div class="col-10">
                                                        <div
                                                            class="card-title">{{$initiative->$language->title}}</div>
                                                    </div>
                                                    <div class="col-2 text-end">
                                                        @if($initiative->video !== '0')
                                                            {{--<a href="#" class="launch-modal"--}}
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
                        </div>
                    </div>
                @else
                    @php
                        $num = 0;
                    @endphp
                    <div class="tab-content position-relative" id="myTabContent">
                        <div class="tab-pane fade show active" id="aleppo" role="tabpanel"
                             aria-labelledby="aleppoTab"
                             tabindex="0">
                            @if(count($ini_A)==0)
                                <div class="card-height">
                                    <div class="single-card">
                                        <div class="row">
                                            <div
                                                class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
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
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
                                                    <div id="carousel-ini{{$initiative->id}}"
                                                         class="carousel slide w-100 project-carousel"
                                                         data-bs-ride="carousel"
                                                         data-interval="1000">
                                                        <div class="carousel-inner project-carousel">
                                                                <?php $k = 0 ?>
                                                            @foreach($initiative->ImagesRandom as $image)
                                                                <div
                                                                    class="carousel-item @if($k++ == 0) active @endif">
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
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                    <div style="padding-left: .6vw">
                                                        <div class="row d-flex align-items-center"
                                                             style="margin-top: 1vw">
                                                            <div class="col-10">
                                                                <div
                                                                    class="card-title">{{$initiative->$language->title}}</div>
                                                            </div>
                                                            <div class="col-2 text-end">
                                                                @if($initiative->video !== '0')
                                                                    <a href="{{$initiative->video}}"
                                                                       class="launch-modal"
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
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                    <div style="padding-right: .6vw">
                                                        <div class="row d-flex align-items-center"
                                                             style="margin-top: 1vw">
                                                            <div class="col-10">
                                                                <div
                                                                    class="card-title">{{$initiative->$language->title}}</div>
                                                            </div>
                                                            <div class="col-2 text-end">
                                                                @if($initiative->video !== '0')
                                                                    {{--<a href="#" class="launch-modal"--}}
                                                                    <a href="{{$initiative->video}}"
                                                                       class="launch-modal"
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
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end ps-lg-0 ps-md-0 ps-sm-0">
                                                    <div id="carousel-ini{{$initiative->id}}"
                                                         class="carousel slide w-100 project-carousel"
                                                         data-bs-ride="carousel"
                                                         data-interval="1000">
                                                        <div class="carousel-inner project-carousel">
                                                                <?php $k = 0 ?>
                                                            @foreach($initiative->ImagesRandom as $image)
                                                                <div
                                                                    class="carousel-item @if($k++ == 0) active @endif">
                                                                    <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                       data-fancybox="gallery-Cu-{{$initiative->id}}"
                                                                       data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                                        <img class="w-100 h-100 d-block"
                                                                             src="{{$image->path}}"
                                                                             style="object-fit: cover"/></a>
                                                                </div>
                                                            @endforeach
                                                            {{--<img class="w-100"--}}
                                                            {{--<img class="w-100"--}}
                                                            {{--<img class="w-100"--}}
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
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane fade show" id="homs" role="tabpanel" aria-labelledby="homsTab"
                             tabindex="1">
                            @if(count($ini_H)==0)
                                <div class="card-height">
                                    <div class="single-card">
                                        <div class="row">
                                            <div
                                                class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
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
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pe-md-0 pe-sm-0">
                                                    <div id="carousel-ini{{$initiative->id}}"
                                                         class="carousel slide w-100 project-carousel"
                                                         data-bs-ride="carousel"
                                                         data-interval="1000">
                                                        <div class="carousel-inner project-carousel">
                                                                <?php $k = 0 ?>
                                                            @foreach($initiative->ImagesRandom as $image)
                                                                <div
                                                                    class="carousel-item @if($k++ == 0) active @endif">
                                                                    <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                       data-fancybox="gallery-Cu-{{$initiative->id}}"
                                                                       data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                                        <img class="w-100 h-100 d-block"
                                                                             src="{{$image->path}}"
                                                                             style="object-fit: cover"></a>
                                                                </div>
                                                            @endforeach
                                                            {{--<img class="w-100"--}}
                                                            {{--<img class="w-100"--}}
                                                            {{--<img class="w-100"--}}
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
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                    <div style="padding-left: .6vw">
                                                        <div class="row d-flex align-items-center"
                                                             style="margin-top: 1vw">
                                                            <div class="col-10">
                                                                <div
                                                                    class="card-title">{{$initiative->$language->title}}</div>
                                                            </div>
                                                            <div class="col-2 text-end">
                                                                @if($initiative->video !== '0')
                                                                    {{--<a href="#" class="launch-modal"--}}
                                                                    <a href="{{$initiative->video}}"
                                                                       class="launch-modal"
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
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                    <div style="padding-right: .6vw">
                                                        <div class="row d-flex align-items-center"
                                                             style="margin-top: 1vw">
                                                            <div class="col-10">
                                                                <div
                                                                    class="card-title">{{$initiative->$language->title}}</div>
                                                            </div>
                                                            <div class="col-2 text-end">
                                                                @if($initiative->video !== '0')
                                                                    {{--<a href="#" class="launch-modal"--}}
                                                                    <a href="{{$initiative->video}}"
                                                                       class="launch-modal"
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
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end ps-lg-0 ps-md-0 ps-sm-0">
                                                    <div id="carousel-ini{{$initiative->id}}"
                                                         class="carousel slide w-100 project-carousel"
                                                         data-bs-ride="carousel"
                                                         data-interval="1000">
                                                        <div class="carousel-inner project-carousel">
                                                                <?php $k = 0 ?>
                                                            @foreach($initiative->ImagesRandom as $image)
                                                                <div
                                                                    class="carousel-item @if($k++ == 0) active @endif">
                                                                    <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                       data-fancybox="gallery-Cu-{{$initiative->id}}"
                                                                       data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                                        <img class="w-100 h-100 d-block"
                                                                             src="{{$image->path}}"
                                                                             style="object-fit: cover"></a>
                                                                </div>
                                                            @endforeach
                                                            {{--<img class="w-100"--}}
                                                            {{--<img class="w-100"--}}
                                                            {{--<img class="w-100"--}}
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
    @endif
    <div class="horizontal-line" data-aos="fade-up" data-aos-duration="800"></div>

    @include('new.public.components.project-partners-section', ['donors_ongoing' => $partners_ongoing,'donors_previous' => $partners_previous])
    <div class="horizontal-line last"></div>
</div>
@include('new.public.footer-leap')
@stack('fancyVideo')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
<script>
    personal_img = "/images/home/LEAP/Categories/personal.png";
    personal_img_hover = "/images/home/LEAP/Categories/personal_hover.png";
    spiritual_img = "/images/home/LEAP/Categories/spiritual.png";
    spiritual_img_hover = "/images/home/LEAP/Categories/spiritual_hover.png";
    visionary_img = "/images/home/LEAP/Categories/visionary.png";
    visionary_img_hover = "/images/home/LEAP/Categories/visionary_hover.png";
    technical_img = "/images/home/LEAP/Categories/technical.png";
    technical_img_hover = "/images/home/LEAP/Categories/technical_hover.png";
    $("#personal_img").attr("src", personal_img_hover);
    document.getElementById("Personal").addEventListener("click", function () {
        $("#personal_img").attr("src", personal_img_hover);
        $("#spiritual_img").attr("src", spiritual_img);
        $("#visionary_img").attr("src", visionary_img);
        $("#technical_img").attr("src", technical_img);
        document.querySelector('.section-title.category-title').innerHTML = 'Personal Growth';
        document.querySelector('.description').innerHTML =
            '<div data-aos="fade-up" data-aos-duration="600"> <div> <span style="font-weight: 900">Focus:</span> Building the leader’s identity, confidence, and relational intelligence </div>' +
            '<div> <span style="font-weight: 900">Self-awareness phase:</span> Leaders explore their strengths, weaknesses, and values through personality assessments and reflective tasks </div>' +
            '<div> <span style="font-weight: 900"> Group work:</span> Participants self-organize into teams, take on roles, and practice responsibility and accountability </div>' +
            '<div> <span style="font-weight: 900">Communication skills: </span>Training on effective speaking, listening, and presentation techniques </div>' +
            '<div> <span style="font-weight: 900">Case studies and role rotation: </span> Leaders engage in real-world simulations (debate, business cases, social initiatives) to refine collaboration and leadership under pressure </div>' +
            '<div> <span style="font-weight: 900">Life coaching </span>is a professional partnership in which a coach helps identify goals, overcome obstacles, and create strategies for personal and professional growth </div> </div>';
    });
    document.getElementById("Personal").addEventListener("mouseenter", function () {
        $("#personal_img").attr("src", personal_img_hover);
        $("#spiritual_img").attr("src", spiritual_img);
        $("#visionary_img").attr("src", visionary_img);
        $("#technical_img").attr("src", technical_img);

        document.querySelector('.section-title.category-title').innerHTML = 'Personal Growth';
        document.querySelector('.description').innerHTML =
            '<div data-aos="fade-up" data-aos-duration="600"> <div> <span style="font-weight: 900">Focus:</span> Building the leader’s identity, confidence, and relational intelligence </div>' +
            '<div> <span style="font-weight: 900">Self-awareness phase:</span> Leaders explore their strengths, weaknesses, and values through personality assessments and reflective tasks </div>' +
            '<div> <span style="font-weight: 900"> Group work:</span> Participants self-organize into teams, take on roles, and practice responsibility and accountability </div>' +
            '<div> <span style="font-weight: 900">Communication skills: </span>Training on effective speaking, listening, and presentation techniques </div>' +
            '<div> <span style="font-weight: 900">Case studies and role rotation: </span> Leaders engage in real-world simulations (debate, business cases, social initiatives) to refine collaboration and leadership under pressure </div>' +
            '<div> <span style="font-weight: 900">Life coaching </span>is a professional partnership in which a coach helps identify goals, overcome obstacles, and create strategies for personal and professional growth </div> </div>';
    });
    document.getElementById("Spiritual").addEventListener("click", function () {
        $("#personal_img").attr("src", personal_img);
        $("#spiritual_img").attr("src", spiritual_img_hover);
        $("#visionary_img").attr("src", visionary_img);
        $("#technical_img").attr("src", technical_img);
        document.querySelector('.section-title.category-title').innerHTML = ' Spiritual Development';
        document.querySelector('.description').innerHTML =
            '<div data-aos="fade-up" data-aos-duration="600"> <div> <span style="font-weight: 900">Focus: </span> Rooting leadership in Christian faith and Christ-like character.Explore how Jesus led with humility, service, courage, and vision. </div>' +
            '<div> <span style="font-weight: 900">Daily spiritual practices: </span> Individual prayer, group reflections, and biblical study incorporated into the training.</div>' +
            '<div> <span style="font-weight: 900"> Faith and leadership debates: </span>  Discussing ethical dilemmas and spiritual leadership challenges. </div>' +
            '<div> <span style="font-weight: 900">Accompaniment: </span>A relationship of guidance that helps leaders deepen their connection with God through peer support, ' +
            'and are encouraged to discern their God-given calling to live it through faithful service.</div>';
    });
    document.getElementById("Spiritual").addEventListener("mouseenter", function () {
        $("#personal_img").attr("src", personal_img);
        $("#spiritual_img").attr("src", spiritual_img_hover);
        $("#visionary_img").attr("src", visionary_img);
        $("#technical_img").attr("src", technical_img);
        document.querySelector('.section-title.category-title').innerHTML = ' Spiritual Development';
        document.querySelector('.description').innerHTML =
            '<div data-aos="fade-up" data-aos-duration="600"> <div> <span style="font-weight: 900">Focus: </span> Rooting leadership in Christian faith and Christ-like character.Explore how Jesus led with humility, service, courage, and vision. </div>' +
            '<div> <span style="font-weight: 900">Daily spiritual practices: </span> Individual prayer, group reflections, and biblical study incorporated into the training.</div>' +
            '<div> <span style="font-weight: 900"> Faith and leadership debates: </span>  Discussing ethical dilemmas and spiritual leadership challenges. </div>' +
            '<div> <span style="font-weight: 900">Accompaniment: </span>A relationship of guidance that helps leaders deepen their connection with God through peer support, ' +
            'and are encouraged to discern their God-given calling to live it through faithful service.</div>';
    });
    document.getElementById("Visionary").addEventListener("click", function () {
        $("#personal_img").attr("src", personal_img);
        $("#spiritual_img").attr("src", spiritual_img);
        $("#visionary_img").attr("src", visionary_img_hover);
        $("#technical_img").attr("src", technical_img);
        document.querySelector('.section-title.category-title').innerHTML = ' Visionary Leadership';
        document.querySelector('.description').innerHTML =
            '<div data-aos="fade-up" data-aos-duration="600"> <div> <span style="font-weight: 900">Focus: </span> Strategic thinking, future planning, and community impact. </div>' +
            '<div> <span style="font-weight: 900">Vision-casting workshops: </span> Leaders learn how to shape a compelling vision rooted in values and real community needs.</div>' +
            '<div> <span style="font-weight: 900">Strategic planning modules: </span>  Training in how to turn ideas into actionable plans with measurable outcomes.</div>' +
            '<div> <span style="font-weight: 900">Project design: </span>Each group designs and executes a community impact initiative, practicing real leadership under mentorship. ' +
            '<div> <span style="font-weight: 900">Organizational skills: </span> Learning core concepts in team building, conflict resolution, and institutional development. ' +
            '<div> <span style="font-weight: 900">Evaluating impact: </span> Understanding how to assess the success and long-term value of an initiative. ';
    });
    document.getElementById("Visionary").addEventListener("mouseenter", function () {
        $("#personal_img").attr("src", personal_img);
        $("#spiritual_img").attr("src", spiritual_img);
        $("#visionary_img").attr("src", visionary_img_hover);
        $("#technical_img").attr("src", technical_img);
        document.querySelector('.section-title.category-title').innerHTML = ' Visionary Leadership';
        document.querySelector('.description').innerHTML =
            '<div data-aos="fade-up" data-aos-duration="600"> <div> <span style="font-weight: 900">Focus: </span> Strategic thinking, future planning, and community impact. </div>' +
            '<div> <span style="font-weight: 900">Vision-casting workshops: </span> Leaders learn how to shape a compelling vision rooted in values and real community needs.</div>' +
            '<div> <span style="font-weight: 900">Strategic planning modules: </span>  Training in how to turn ideas into actionable plans with measurable outcomes.</div>' +
            '<div> <span style="font-weight: 900">Project design: </span>Each group designs and executes a community impact initiative, practicing real leadership under mentorship. ' +
            '<div> <span style="font-weight: 900">Organizational skills: </span> Learning core concepts in team building, conflict resolution, and institutional development. ' +
            '<div> <span style="font-weight: 900">Evaluating impact: </span> Understanding how to assess the success and long-term value of an initiative. ';
    });
    document.getElementById("Technical").addEventListener("click", function () {
        $("#personal_img").attr("src", personal_img);
        $("#spiritual_img").attr("src", spiritual_img);
        $("#visionary_img").attr("src", visionary_img);
        $("#technical_img").attr("src", technical_img_hover);
        document.querySelector('.section-title.category-title').innerHTML = 'Technical Skills';
        document.querySelector('.description').innerHTML =
            '<div data-aos="fade-up" data-aos-duration="600"> <div> <span style="font-weight: 900">Focus: </span> Equipping leaders with digital and practical tools for modern leadership. </div>' +
            '<div> <span style="font-weight: 900">Training in essential technologies: </span> <br><div class="ms-5">• Programming basics' +
            '<br>• Artificial Intelligence (AI) concepts' +
            '<br>• Networking and database essentials</div></div>' +
            '<div> <span style="font-weight: 900">Visual identity design: </span>  Learning branding principles and creating a professional identity for projects.' +
            'Presentation tools: Using digital tools to effectively communicate project goals and outcomes.</div>';
    })
    document.getElementById("Technical").addEventListener("mouseenter", function () {
        $("#personal_img").attr("src", personal_img);
        $("#spiritual_img").attr("src", spiritual_img);
        $("#visionary_img").attr("src", visionary_img);
        $("#technical_img").attr("src", technical_img_hover);
        document.querySelector('.section-title.category-title').innerHTML = 'Technical Skills';
        document.querySelector('.description').innerHTML =
            '<div data-aos="fade-up" data-aos-duration="600"> <div> <span style="font-weight: 900">Focus: </span> Equipping leaders with digital and practical tools for modern leadership. </div>' +
            '<div> <span style="font-weight: 900">Training in essential technologies: </span><br><div class="ms-5">• Programming basics' +
            '<br>• Artificial Intelligence (AI) concepts' +
            '<br>• Networking and database essentials</div></div>' +
            '<div> <span style="font-weight: 900">Visual identity design: </span>  Learning branding principles and creating a professional identity for projects.' +
            'Presentation tools: Using digital tools to effectively communicate project goals and outcomes.</div>';
    })
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
        } else {
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
        $('#video_matter').bind('contextmenu', function () {
            return false;
        });
    });
</script>
</body>
</html>
