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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168141177-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-168141177-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta name="description" content="@lang('micro-project.description')">
    <meta name="keywords" content="aleppo syria, hope, center, micro project, projects, caritas poland"/>
    <title>@lang('main.micro')</title>


    <link href="{{asset('css/main-new.css')}}" rel="stylesheet">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet">
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"--}}
    {{--integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"--}}
    {{--crossorigin="anonymous"></script>--}}
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    {{--<link href="/resources/css/main.css" rel="stylesheet">--}}
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel="shortcut icon" href="/public/fonts/Avenir%20LT%20Std%2045%20Book.otf">
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin=''/>
    <link href="{{asset('css/font-lato.css')}}" rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link href='https://fonts.googleapis.com/css?family=Martel' rel='stylesheet'>
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->

    {{--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="/css/bootstrap.css">--}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{--<script src="/js/aos.js"></script>--}}
    {{--<link href="css/aos.css" rel="stylesheet">--}}
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>

    {{--<script type="text/javascript" src="/js/bootstrap.js"></script>--}}
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    {{--<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>--}}
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <link rel="stylesheet" href="/css/micro_page_new.css">
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>
    <script type="text/javascript" src="/js/swipe.js"></script>
</head>
<body>
{{--<div id="preloader" class="preloader">--}}
{{--<div class="preloader-gif"></div>--}}
{{--</div>--}}

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=2133577546862306&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@php
    $active = 'micro';
@endphp
@include('new.public.navbar')
<div id="Micro">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                        {{--<svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 852.74 130.22">--}}
                        {{--<defs>--}}
                        {{--<style>.cls-1{fill:#bd1818}</style>--}}
                        {{--</defs>--}}
                        {{--<g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" fill=#bd1818" stroke="#bd1818" d="M852.67,130.22h-7V25.09c-3.72,0-10.09,0-15.94.07H0V0L7,2,7,18.16H829.7s4.83,0,9.7-.06c2.44,0,4.88,0,6.72,0,3.91,0,6.62,0,6.62,3.14l-.07,1.88Z"/></g></g></svg>--}}
                        <div style="height: 2.5vw"></div>
                        <div class="main_title" data-aos="fade-up"
                             data-aos-duration="600">BE SUCCESSFUL, & INSPIRE OTHER TO BE
                        </div>
                        <div class="main_subtitle" data-aos="fade-up"
                             data-aos-duration="1000">MICRO PROJECTS
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                    <img src="/images/newLogos/Micro-Project.svg" class="d-block project-logo" data-aos="fade-up"
                         data-aos-duration="1000">
                </div>
            </div>
        </div>
    </div>
    @if($agent->isPhone())
        <div id="HomeCarousel" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up"
             data-aos-duration="800">
            @endif
            @if(!$agent->isPhone())
                <div id="HomeCarousel" class="carousel slide" data-bs-ride="carousel">
                    @endif
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active position-relative">
                <img src="/images/home/micro-home.png" class="w-100 h-100" style="object-fit: cover;">
                <img src="/images/home/image-mask.png" class="image-mask"/>
            </div>
            <div class="carousel-item position-relative">
                <img src="/images/home/micro-home.png" class="w-100 h-100" style="object-fit: cover;">
                <img src="/images/home/image-mask.png" class="image-mask"/>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#HomeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#HomeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
                @if($agent->isPhone())
                    <div class="small horizontal-line"></div>
                @endif
    <div id="about-section">
        <div class="seperator-line" style="background: white;height: 1vw;"></div>
        <div class="horizontal-line"></div>
        <div style="margin-top: 3vw" data-aos="fade-up" data-aos-duration="1000">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="mt-lg-0 mt-md-0 mt-sm-0 padding-screen">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-start" data-aos="fade-up"
                                     data-aos-duration="600">
                                    <img src="/images/newLogos/Micro-Project.svg" class="d-lg-block d-none project-logo">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 3vw;">
                                <div class="col d-flex justify-content-end flex-column">
                                    {{--<div style="height: 35px"></div>--}}
                                    <div class="project-brief" data-aos="fade-up"
                                         data-aos-duration="800">Project Brief
                                    </div>
                                    <font class="project-brief-desc" data-aos="fade-up"
                                          data-aos-duration="1000">Our primary interest is aiding Christians through
                                        financing
                                        their own micro-projects that would provide them with
                                        income to preserve their dignity and alleviate the calamities
                                        of the crisis. The team at Hope Center reviews and evaluates
                                        the projects and the extent to which the applicant has
                                        planned for his/her idea. If accepted, the center starts
                                        providing funds for the project to initiate. Besides aiding
                                        Christians in need, this initiative aims for reviving the city of
                                        Aleppo that has lost most of its economic structure.
                                    </font>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-start"
                         style="padding-right: 0;padding-left: 0.1vw; margin-top: 1vw">
                        <div class="video position-relative w-100" data-aos="fade-up"
                             data-aos-duration="600">
                            <iframe class="w-100 h-100" src="https://www.youtube.com/embed/_7Bo0BYVqmk" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            <img src="/images/home/image-mask.png" class="image-mask"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                @if($agent->isPhone())
                    <div class="small horizontal-line"></div>
                @endif
    <div id="statistic-section">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="600">
                <div class="col-12 d-flex justify-content-center">
                    <div class="section-title">Statistics</div>
                </div>
            </div>
            <div class="horizontal-line"></div>
            <div class="row">
                <div class="col-6 d-flex justify-content-start"></div>
                <div class="col-6 d-flex justify-content-start flex-column lh-sm" style="padding-left: 3vw;">
                    <div class="statistics-num count_int" data-aos="fade-up"
                         data-aos-duration="600">{{$aleppoCount}}</div>
                    <div class="statistics-title text-uppercase" data-aos="fade-up"
                         data-aos-duration="800">@lang('projects.aleppo')</div>
                    {{--<div class="statistics-subtitle" data-aos="fade-up" data-aos-duration="1000">dummy text do not--}}
                    {{--read--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-6 d-flex justify-content-end text-end flex-column lh-sm" style="padding-right: 3vw;">
                    <div class="row">
                        <div class="statistics-num count_int" data-aos="fade-up"
                             data-aos-duration="600">{{$homsCount}}</div>
                    </div>
                    <div class="row">
                        <div class="statistics-title text-uppercase" data-aos="fade-up"
                             data-aos-duration="800">@lang('projects.homs')</div>
                    </div>
                    {{--<div class="row">--}}
                    {{--<div class="statistics-subtitle" data-aos="fade-up" data-aos-duration="1000">dummy text do not--}}
                    {{--read--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="col-6 d-flex justify-content-start"></div>
            </div>
            <div class="row">
                <div class="col-6 d-flex justify-content-start"></div>
                <div class="col-6 d-flex justify-content-start flex-column lh-sm" style="padding-left: 3vw;">
                    <div class="row">
                        <div class="statistics-num count_int" data-aos="fade-up"
                             data-aos-duration="600">{{$damascusCount}}</div>
                    </div>
                    <div class="row">
                        <div class="statistics-title text-uppercase" data-aos="fade-up"
                             data-aos-duration="800">@lang('projects.damascus')</div>
                    </div>
                    {{--<div class="row">--}}
                    {{--<div class="statistics-subtitle" data-aos="fade-up" data-aos-duration="1000">dummy text do not--}}
                    {{--read--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
    <div id="projects-section">
        <div data-aos="fade-up" data-aos-duration="600" style="margin-bottom: 5vw">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="search-container d-flex justify-content-center align-items-center">
                            <form class="position-relative d-flex justify-content-center align-items-center"
                                  method="get"
                                  id="submit-form"
                                  action="{{route('new.public.micro_project','s')}}">
                                <div class="se d-flex align-items-center">
                                    <button type="submit">
                                        <img class="search-icons" src="/images/ico/search-icon.svg">
                                    </button>
                                    <input id="search-input" type="text" placeholder="@lang('projects.search')"
                                           name="search">
                                </div>
                                <span class="left-search-dash">__</span>
                            </form>
                            <div class="search-title"> Search</div>
                            <div class="d-flex justify-content-center align-items-center position-relative"
                                 id="donor-filter">
                                <span class="right-search-dash">__</span>
                                <div class="dropdown other">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuDonor"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        @lang('projects.donor') -
                                        @if($donor != '')
                                            @for($i =0;$i< count($donors);$i++)
                                                @if($donor == $donors[$i]['abb_name'])
                                                    {{$donors[$i]['name']}}
                                                @endif
                                            @endfor
                                        @else
                                            @lang('projects.all')
                                        @endif
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuDonor">
                                        @if(!empty($search))
                                            <li>
                                                <a href="{{route('new.public.micro_project',['search' => $search, 'donor'=>'all'])}}">@lang('projects.all')</a>
                                            </li>
                                            @for($i =0;$i< count($donors);$i++)
                                                <li>
                                                    <a href="{{route('new.public.micro_project',['search' => $search, 'donor'=>$donors[$i]['abb_name']] )}}">{{$donors[$i]['name']}}</a>
                                                </li>
                                            @endfor
                                        @else
                                            <li>
                                                <a href="{{route('new.public.micro_project',['donor'=>'all'])}}">@lang('projects.all')</a>
                                            </li>
                                            @for($i =0;$i< count($donors);$i++)
                                                <li>
                                                    <a href="{{route('new.public.micro_project',['donor'=>$donors[$i]['abb_name']])}}">{{$donors[$i]['name']}}</a>
                                                </li>
                                            @endfor
                                        @endif
                                    </ul>

                                </div>
                                <label class="switch">
                                    <input type="checkbox" data-toggle="tooltip" data-container="body" rel="tooltip"
                                           data-placement="bottom" title="Search Video" name="videoFilter"
                                           id="videoFilter"
                                           @if ($video == true) checked @endif value="true"
                                           onchange="videoFilter(this)">
                                    <span class="slider">
                        <img class="search-icons" src="/images/ico/search-video-icon.svg">
                        </span>
                                </label>
                            </div>
                        </div>
                        <div class="horizontal-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div data-aos="fade-up" data-aos-duration="800">
    <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative" id="tabList" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="#aleppo" id="aleppoTab" class="aleppoTab nav-link active" data-toggle="tab"
               data-target="#aleppoPanel"
               role="tab" aria-controls="aleppoPanel" aria-selected="true">@lang('projects.aleppo')
                ({{ $microProjectA->total()}} out of {{$aleppoCount}})
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="#homs" id="homsTab" class="homsTab nav-link" data-toggle="tab" data-target="#homsPanel"
               role="tab" aria-controls="homsPanel" aria-selected="false">@lang('projects.homs')
                ({{ $microProjectH->total()}} out of {{$homsCount}})
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="#damascus" id="damascusTab" class="damasTab nav-link" data-toggle="tab" data-target="#damascusTab"
               role="tab" aria-controls=damascus"
               aria-selected="false">@lang('projects.damascus') ({{ $microProjectD->total()}} out
                of {{$damascusCount}})
            </a>
        </li>
    </ul>
    <div style="height: 3vw; background: white; position: relative"></div>
    <div class="tab-content position-relative" id="myTabContent">
        <div class="tab-pane fade show active" id="aleppo" role="tabpanel" aria-labelledby="aleppoTab" tabindex="0">
            @if(count($microProjectA)==0)
                <div class="projects-height">
                    <div class="single-project">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
                                <div class="text-center">
                                    Sorry,we couldn't find any results
                                </div>
                                {{--<div>@lang('projects.sorryMessage2')</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(count($microProjectA))
                @for($i = 0; $i<count($microProjectA); $i = $i + 1)
                    @for($j = 0; $j<1; $j++)
                        @if($i+$j < count($microProjectA))
                            <div class="projects-height">
                                <div class="single-project">
                                    <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
                                                <div id="project-carousel-A-{{$i+$j}}"
                                                     class="carousel slide w-100 project-carousel"
                                                     data-bs-ride="carousel" data-interval="1000">
                                                    <div class="carousel-inner project-carousel">
                                                        <?php $k = 0 ?>
                                                        @foreach($microProjectA[$i+$j]->images as $image)
                                                            <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                               class="carousel-item @if($k++ == 0) active @endif"
                                                               data-fancybox="gallery-A-{{$i+$j}}"
                                                               data-caption="{{ucfirst($microProjectA[$i+$j]->$language->MPE_Name)}}">
                                                                <img src="{{$image->MPI_Path}}" class="w-100"
                                                                     style="object-fit: cover">
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                    <button class="carousel-control-prev"
                                                            data-bs-target="#project-carousel-A-{{$i+$j}}"
                                                            data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next"
                                                            data-bs-target="#project-carousel-A-{{$i+$j}}"
                                                            data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                    <div class="col-9">
                                                        <div class="project-title">{{ucfirst($microProjectA[$i+$j]->$language->MPE_Name)}}
                                                            <textarea id="txt{{$microProjectA[$i+$j]->id}}"
                                                                      style="display: none;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 gap-3 d-flex justify-content-end align-items-baseline">
                                                        <img src="/images/ico/copy-icon.svg"
                                                             onclick="copyTextA({{$microProjectA[$i+$j]->id}})"
                                                             class="copy-icon">
                                                        </img>
                                                        @if($microProjectA[$i+$j]->MPE_Location != '0')
                                                            <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectA[$i+$j]->MPE_Location}}"
                                                               target="_blank">
                                                                <img class="location-icon"
                                                                     src="/images/ico/location-icon.svg">
                                                            </a>
                                                        @endif
                                                        @if($microProjectA[$i+$j]->MPE_Video != '0')
                                                            <a href="#" class="launch-modal"
                                                               data-modal-id="modal-video-{{$i+$j}}">
                                                                <img class="video-icon"
                                                                     src="/images/ico/video-icon.svg">
                                                            </a>
                                                            <!--VIDEO MODAL -->
                                                            <div class="modal fade" id="modal-video-{{$i+$j}}"
                                                                 tabindex="-1"
                                                                 role="dialog"
                                                                 aria-labelledby="modal-video-label">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="modal-video">
                                                                                <div class="video ">
                                                                                    <iframe class="embed-responsive-item"
                                                                                            src="{{$microProjectA[$i+$j]->MPE_Video}}"
                                                                                            frameborder="0"
                                                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                            allowfullscreen
                                                                                            webkitallowfullscreen
                                                                                            mozallowfullscreen
                                                                                            allowfullscreen></iframe>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="project-title-section"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                        <ul>
                                                            @if($microProjectA[$i+$j]->MPE_PartnerName == '0' && $microProjectA[$i+$j]->MPE_PartnerName2 == '0')
                                                                <li>
                                                                    <Strong class="project-subtitle">@lang('main.beneficiary')</strong>
                                                                    <span>{{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName)}}</span>
                                                                </li>
                                                            @elseif($microProjectA[$i+$j]->MPE_PartnerName != '0' && $microProjectA[$i+$j]->MPE_PartnerName2 == '0')
                                                                <li>
                                                                    <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                    <span>{{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectA[$i+$j]->MPE_PartnerName)}}</span>
                                                                </li>
                                                            @elseif($microProjectA[$i+$j]->MPE_PartnerName != '0' && $microProjectA[$i+$j]->MPE_PartnerName2 != '0')
                                                                <li>
                                                                    <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                    <span>{{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectA[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectA[$i+$j]->MPE_PartnerName2)}}</span>
                                                                </li>
                                                            @endif
                                                            @if($microProjectA[$i+$j]->MPE_FundedDate !=  NULL)
                                                                <li><Strong
                                                                            class="project-subtitle">@lang('projects.fundDate')</Strong>
                                                                    <span> {{date('m/Y',strtotime($microProjectA[$i+$j]->MPE_FundedDate))}}</span>
                                                                </li>
                                                            @endif
                                                            @if($microProjectA[$i+$j]->DOB != '0')
                                                                <li><strong
                                                                            class="project-subtitle">@lang('projects.age')</strong>
                                                                    <span> {{\Carbon\Carbon::createFromDate($microProjectA[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                </li>
                                                            @endif
                                                            @if($microProjectA[$i+$j]->FamilyMembers != '0')
                                                                <li><strong
                                                                            class="project-subtitle">@lang('projects.family')</strong>
                                                                    <span>{{$microProjectA[$i+$j]->FamilyMembers}}</span>
                                                                </li>
                                                            @endif
                                                            @if($microProjectA[$i+$j]->MPE_FundedDate !=  NULL)
                                                                <br>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                         style="margin-top: .5vw">
                                                        @if($microProjectA[$i+$j]->MPE_Donor=='1')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Caritas.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='2')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Salt.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='3')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/LD.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='5')
                                                            <img class="project-donor-logo"
                                                                 src="/images/logo/kia.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='7')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/If.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='8')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Hungary.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='9')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/loeuvre.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='10')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Loeuvre.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='11')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/ACN.svg">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @if($microProjectA[$i+$j]->$language->MPE_ExpSkill != '')
                                                        <div><strong
                                                                    class="project-subtitle">@lang('projects.skills')</strong>
                                                            <span>{{$microProjectA[$i+$j]->$language->MPE_ExpSkill}}</span>
                                                        </div>
                                                    @endif
                                                    <div class="project-content">
                                                        @if(strlen($microProjectA[$i+$j]->$language->MPE_Suffering)>30)
                                                            <p>{!!implode(' ', array_slice(explode(' ', strip_tags($microProjectA[$i+$j]->$language->MPE_Suffering)), 0, 30)).'...'!!}</p>
                                                        @else
                                                            <p>{!! $microProjectA[$i+$j]->$language->MPE_Suffering !!}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        @if(strlen($microProjectA[$i+$j]->$language->MPE_Suffering)>30)
                                                            <button class="readmore-btn"
                                                                    id="btn-primary-{{$i+$j}}"
                                                                    data-toggle="modal"
                                                                    data-target="#project-detail-{{$microProjectA[$i+$j]->MicroProject_ID}}">@lang('main.readMore')
                                                            </button>
                                                            {{--MODAL--}}
                                                            <div class="modal fade project-detail"
                                                                 id="project-detail-{{$microProjectA[$i+$j]->MicroProject_ID}}"
                                                                 tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button type="button" class="close"
                                                                                    id="close-{{$i+$j}}"
                                                                                    data-dismiss="modal"
                                                                                    aria-hidden="true">
                                                                                &times;
                                                                            </button>
                                                                            <div class="row mt-5">
                                                                                <div class="col-9">
                                                                                    <div class="project-title">{{ucfirst($microProjectA[$i+$j]->$language->MPE_Name)}}
                                                                                        <textarea
                                                                                                id="txt{{$microProjectA[$i+$j]->id}}"
                                                                                                style="display: none;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-3 gap-3 d-flex justify-content-end align-items-baseline">
                                                                                    <img src="/images/ico/copy-icon.svg"
                                                                                         onclick="copyTextA({{$microProjectA[$i+$j]->id}})"
                                                                                         class="copy-icon">
                                                                                    @if($microProjectA[$i+$j]->MPE_Location != '0')
                                                                                        <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectA[$i+$j]->MPE_Location}}"
                                                                                           target="_blank">
                                                                                            <img class="location-icon"
                                                                                                 src="/images/ico/location-icon.svg">
                                                                                        </a>
                                                                                    @endif
                                                                                    @if($microProjectA[$i+$j]->MPE_Video != '0')
                                                                                        <a href="#"
                                                                                           class="launch-modal"
                                                                                           data-modal-id="modal-video-{{$i+$j}}">
                                                                                            <img class="video-icon"
                                                                                                 src="/images/ico/video-icon.svg">
                                                                                        </a>
                                                                                        <!--VIDEO MODAL -->
                                                                                        <div class="modal fade"
                                                                                             id="modal-video-{{$i+$j}}"
                                                                                             tabindex="-1"
                                                                                             role="dialog"
                                                                                             aria-labelledby="modal-video-label">
                                                                                            <div class="modal-dialog"
                                                                                                 role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-body">
                                                                                                        <div class="modal-video">
                                                                                                            <div class="video ">
                                                                                                                <iframe class="embed-responsive-item"
                                                                                                                        src="{{$microProjectA[$i+$j]->MPE_Video}}"
                                                                                                                        frameborder="0"
                                                                                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                                                        allowfullscreen
                                                                                                                        webkitallowfullscreen
                                                                                                                        mozallowfullscreen
                                                                                                                        allowfullscreen></iframe>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="project-title-section"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="project-carousel-{{$i+$j}}"
                                                                                 class="carousel slide"
                                                                                 data-bs-ride="carousel">
                                                                                <div class="carousel-indicators">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectA[$i+$j]->images as $image)
                                                                                        <button type="button"
                                                                                                data-bs-target="#project-carousel-{{$i+$j}}"
                                                                                                data-bs-slide-to="{{$k++}}"
                                                                                                @if($k == 1)class="active" @endif>

                                                                                        </button>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="carousel-inner">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectA[$i+$j]->images as $image)
                                                                                        <div class="carousel-item @if($k++ == 0) active @endif">
                                                                                            <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                               data-fancybox="gallery-{{$i+$j}}"
                                                                                               data-caption="{{ucfirst($microProjectA[$i+$j]->$language->MPE_Name)}}">
                                                                                                <img src="{{$image->MPI_Path}}"
                                                                                                     class="d-block w-100 h-auto"
                                                                                                     style="object-fit: cover;">
                                                                                            </a>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <button class="carousel-control-prev"
                                                                                        data-bs-target="#project-carousel-{{$i+$j}}"
                                                                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                                                    <span class="visually-hidden">Previous</span>
                                                                                </button>
                                                                                <button class="carousel-control-next"
                                                                                        data-bs-target="#project-carousel-{{$i+$j}}"
                                                                                        data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                                                    <span class="visually-hidden">Next</span>
                                                                                </button>
                                                                            </div>
                                                                            <div id="modal-swipe-{{$i+$j}}">
                                                                                <div class="row mt-5">
                                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                @if($microProjectA[$i+$j]->MPE_PartnerName == '0' && $microProjectA[$i+$j]->MPE_PartnerName2 == '0')
                                                                                                    <Strong class="project-subtitle">@lang('main.beneficiary')</strong>
                                                                                                    <span>{{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName)}}</span>
                                                                                                @elseif($microProjectA[$i+$j]->MPE_PartnerName != '0' && $microProjectA[$i+$j]->MPE_PartnerName2 == '0')
                                                                                                    <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                                                    <span>{{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectA[$i+$j]->MPE_PartnerName)}}</span>
                                                                                                @elseif($microProjectA[$i+$j]->MPE_PartnerName != '0' && $microProjectA[$i+$j]->MPE_PartnerName2 != '0')
                                                                                                    <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                                                    <span>{{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectA[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectA[$i+$j]->MPE_PartnerName2)}}</span>
                                                                                                @endif
                                                                                                @if($microProjectA[$i+$j]->MPE_FundedDate !=  NULL)
                                                                                                    <div><Strong
                                                                                                                class="project-subtitle">@lang('projects.fundDate')</Strong><span> {{date('m/Y',strtotime($microProjectA[$i+$j]->MPE_FundedDate))}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($microProjectA[$i+$j]->DOB != '0')
                                                                                                    <div><strong
                                                                                                                class="project-subtitle">@lang('projects.age')</strong><span> {{\Carbon\Carbon::createFromDate($microProjectA[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($microProjectA[$i+$j]->FamilyMembers != '0')
                                                                                                    <div><strong
                                                                                                                class="project-subtitle">@lang('projects.family')</strong>
                                                                                                        <span>{{$microProjectA[$i+$j]->FamilyMembers}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($microProjectA[$i+$j]->MPE_FundedDate !=  NULL)
                                                                                                    <br>
                                                                                                @endif
                                                                                                @if($microProjectA[$i+$j]->$language->MPE_ExpSkill != '')
                                                                                                    <div><strong
                                                                                                                class="project-subtitle">@lang('projects.skills')</strong>
                                                                                                        <span>{{$microProjectA[$i+$j]->$language->MPE_ExpSkill}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                                                         style="margin-top: .5vw">
                                                                                        @if($microProjectA[$i+$j]->MPE_Donor=='1')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Caritas.svg">
                                                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='2')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Salt.svg">
                                                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='3')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/LD.svg">
                                                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='5')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/logo/kia.svg">
                                                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='7')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/If.svg">
                                                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='8')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Hungary.svg">
                                                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='9')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/loeuvre.svg">
                                                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='10')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Loeuvre.svg">
                                                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='11')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/ACN.svg">
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <div class="project-content">
                                                                                    <p class="p-justify">{!!$microProjectA[$i+$j]->$language->MPE_Suffering!!}</p>
                                                                                </div>
                                                                                <br>
                                                                                <textarea
                                                                                        id="txt{{$microProjectA[$i+$j]->id}}"
                                                                                        style="display: none;">
                                                                                    </textarea>
                                                                                {{--@if($microProjectA[$i+$j]->MPE_Video != '0')--}}
                                                                                {{--<div class="video">--}}
                                                                                {{--<iframe--}}
                                                                                {{--src="{{$microProjectA[$i+$j]->MPE_Video}}"--}}
                                                                                {{--frameborder="0"--}}
                                                                                {{--allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
                                                                                {{--allowfullscreen>--}}
                                                                                {{--</iframe>--}}
                                                                                {{--</div>--}}
                                                                                {{--<hr style="border-color: #43484E;">--}}
                                                                                {{--@endif--}}
                                                                                <div id="fb-root"></div>
                                                                                <div class="fb-comments"
                                                                                     data-href="https://hcsyria.org/micro-projects#project{{$microProjectA[$i+$j]->MicroProject_ID}}"
                                                                                     data-width="100%"
                                                                                     data-numposts="3">
                                                                                </div>

                                                                                <div class="text-center swipe-arrows">
                                                                                    <i class="fa fa-angle-double-up"></i>
                                                                                    <p>@lang('main.swipeUp')</p>
                                                                                </div>
                                                                                <div class="swipe-to-close"
                                                                                     id="swipe-to-close-{{$i+$j}}"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <p>{!! $microProjectA[$i+$j]->$language->MPE_Suffering !!}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                    @if($projectCopyA !== 'none')
                        {{--MODAL--}}
                        <div class="modal project-detail" id="project-detail-copy"
                             tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close"
                                                id="close-copy"
                                                data-dismiss="modal"
                                                aria-hidden="true">
                                            &times;
                                        </button>
                                        <div class="row mt-5">
                                            <div class="col-9">
                                                <div class="project-title">{{ucfirst($projectCopyA->$language->MPE_Name)}}
                                                    <textarea id="txt{{$projectCopyA->id}}"
                                                              style="display: none;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-3 gap-3 d-flex justify-content-end align-content-around">
                                                <img src="/images/ico/copy-icon.svg"
                                                     onclick="copyTextA({{$projectCopyA->id}})"
                                                     class="copy-icon">
                                                </img>
                                                @if($projectCopyA->MPE_Location != '0')
                                                    <a href="https://www.google.com/maps/search/?api=1&query={{$projectCopyA->MPE_Location}}"
                                                       target="_blank">
                                                        <img class="location-icon"
                                                             src="/images/ico/location-icon.svg">
                                                    </a>
                                                @endif

                                                @if($projectCopyA->MPE_Video != '0')
                                                    <a href="#" class="launch-modal"
                                                       data-modal-id="modal-video-{{$i+$j}}">
                                                        <img class="video-icon"
                                                             src="/images/ico/video-icon.svg">
                                                    </a>
                                                    <!--VIDEO MODAL -->
                                                    <div class="modal fade" id="modal-video-copy"
                                                         tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="modal-video-label">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="modal-video">
                                                                        <div class="video ">
                                                                            <iframe class="embed-responsive-item"
                                                                                    src="{{$projectCopyA->MPE_Video}}"
                                                                                    frameborder="0"
                                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                    allowfullscreen
                                                                                    webkitallowfullscreen
                                                                                    mozallowfullscreen
                                                                                    allowfullscreen></iframe>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <div class="project-title-section"></div>
                                            </div>
                                        </div>
                                        <div id="project-carousel-copy"
                                             class="carousel slide"
                                             data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <?php $k = 0 ?>
                                                @foreach($projectCopyA->images as $image)
                                                    <button type="button"
                                                            data-bs-target="#project-carousel-copy"
                                                            data-bs-slide-to="{{$k++}}"
                                                            @if($k == 1)class="active" @endif>

                                                    </button>
                                                @endforeach
                                            </div>
                                            <div class="carousel-inner">
                                                <?php $k = 0 ?>
                                                @foreach($projectCopyA->images as $image)
                                                    <div class="carousel-item @if($k++ == 0) active @endif">
                                                        <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                           data-fancybox="gallery-copy"
                                                           data-caption="{{ucfirst($projectCopyA->$language->MPE_Name)}}">
                                                            <img src="{{$image->MPI_Path}}"
                                                                 class="d-block w-100 h-auto"
                                                                 style="object-fit: cover;">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev"
                                                    data-bs-target="#project-carousel-copy"
                                                    data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next"
                                                    data-bs-target="#project-carousel-copy"
                                                    data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div id="modal-swipe-copy">
                                            <div class="row mt-5">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                    <div class="row">
                                                        <div class="col">
                                                            @if($projectCopyA->MPE_PartnerName == '0' && $projectCopyA->MPE_PartnerName2 == '0')
                                                                <Strong class="project-subtitle">@lang('main.beneficiary')</strong>
                                                                <span>{{ucfirst($projectCopyA->MPE_BeneficiaryName)}}</span>
                                                            @elseif($projectCopyA->MPE_PartnerName != '0' && $projectCopyA->MPE_PartnerName2 == '0')
                                                                <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                <span>{{ucfirst($$projectCopyA->MPE_BeneficiaryName) .', '. ucfirst($projectCopyA->MPE_PartnerName)}}</span>
                                                            @elseif($projectCopyA->MPE_PartnerName != '0' && $projectCopyA->MPE_PartnerName2 != '0')
                                                                <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                <span>{{ucfirst($projectCopyA->MPE_BeneficiaryName) .', '. ucfirst($projectCopyA->MPE_PartnerName) .', '.ucfirst($projectCopyA->MPE_PartnerName2)}}</span>
                                                            @endif
                                                            @if($projectCopyA->MPE_FundedDate !=  NULL)
                                                                <div><Strong
                                                                            class="project-subtitle">@lang('projects.fundDate')</Strong><span> {{date('m/Y',strtotime($projectCopyA->MPE_FundedDate))}}</span>
                                                                </div>
                                                            @endif
                                                            @if($projectCopyA->DOB != '0')
                                                                <div><strong
                                                                            class="project-subtitle">@lang('projects.age')</strong><span> {{\Carbon\Carbon::createFromDate($projectCopyA->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                </div>
                                                            @endif
                                                            @if($projectCopyA->FamilyMembers != '0')
                                                                <div><strong
                                                                            class="project-subtitle">@lang('projects.family')</strong>
                                                                    <span>{{$projectCopyA->FamilyMembers}}</span>
                                                                </div>
                                                            @endif
                                                            @if($projectCopyA->$language->MPE_ExpSkill != '')
                                                                <div><strong
                                                                            class="project-subtitle">@lang('projects.skills')</strong>
                                                                    <span>{{$projectCopyA->$language->MPE_ExpSkill}}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                     style="margin-top: .5vw">
                                                    @if($projectCopyA->MPE_Donor=='1')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Caritas.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='2')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Salt.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='3')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/LD.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='5')
                                                        <img class="project-donor-logo"
                                                             src="/images/logo/kia.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='7')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/If.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='8')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Hungary.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='9')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/loeuvre.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='10')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Loeuvre.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='11')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/ACN.svg">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="project-content">
                                                <p class="p-justify">{!!$projectCopyA->$language->MPE_Suffering!!}</p>
                                            </div>
                                            <br>
                                            <textarea
                                                    id="txt{{$projectCopyA->id}}"
                                                    style="display: none;">
                                                                                    </textarea>
                                            {{--@if($microProjectA[$i+$j]->MPE_Video != '0')--}}
                                            {{--<div class="video">--}}
                                            {{--<iframe--}}
                                            {{--src="{{$microProjectA[$i+$j]->MPE_Video}}"--}}
                                            {{--frameborder="0"--}}
                                            {{--allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
                                            {{--allowfullscreen>--}}
                                            {{--</iframe>--}}
                                            {{--</div>--}}
                                            {{--<hr style="border-color: #43484E;">--}}
                                            {{--@endif--}}
                                            <div id="fb-root"></div>
                                            <div class="fb-comments"
                                                 data-href="https://hcsyria.org/micro-projects#project{{$projectCopyA->MicroProject_ID}}"
                                                 data-width="100%"
                                                 data-numposts="3">
                                            </div>
                                            <div class="swipe-to-close"
                                                 id="swipe-to-close-xopy"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            @endif
            <div class="before-page horizontal-line"></div>
            <div class="text-center">
                <div class="text-center">
                    @if($search != '' && $donor != '')
                        {{$microProjectA->appends(['search' => $search, 'donor' => $donor,'microProjectA' => $microProjectA->currentPage()])->links()}}
                    @elseif($search != '' &&  $donor == '')
                        {{$microProjectA->appends(['search' => $search, 'microProjectA' => $microProjectA->currentPage()])->links()}}
                    @elseif($search == '' &&  $donor != '')
                        {{$microProjectA->appends(['donor' => $donor,'microProjectA' => $microProjectA->currentPage()])->links()}}
                    @else
                        {{$microProjectA->appends(['microProjectA' => $microProjectA->currentPage()])->links()}}
                    @endif
                </div>
            </div>
            <div class="after-page horizontal-line"></div>
            <div id="map-section">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-12 d-flex justify-content-center p-0" data-aos="fade-up"
                             data-aos-duration="600">
                            <div class="section-title">Map Locations</div>
                        </div>
                    </div>
                </div>
                <div class="map-line-before horizontal-line"></div>
                <div id='aleppo_map' class="map" data-aos="fade-up" data-aos-duration="600"></div>
            </div>
            <div class="horizontal-line last"></div>
        </div>
        <div class="tab-pane fade" id="homs" role="tabpanel" aria-labelledby="homsTab" tabindex="1">
            @if(count($microProjectH)==0)
                <div class="projects-height">
                    <div class="single-project">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
                                <div class="text-center">
                                    Sorry,we couldn't find any results
                                </div>
                                {{--<div>@lang('projects.sorryMessage2')</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(count($microProjectH))
                @for($i = 0; $i<count($microProjectH); $i = $i + 1)
                    @for($j = 0; $j<1; $j++)
                        @if($i+$j < count($microProjectH))
                            <div class="projects-height">
                                <div class="single-project">
                                    <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
                                                <div id="project-carousel-H-{{$i+$j}}"
                                                     class="carousel slide w-100 project-carousel"
                                                     data-bs-ride="carousel" data-interval="1000">
                                                    <div class="carousel-inner project-carousel">
                                                        <?php $k = 0 ?>
                                                        @foreach($microProjectH[$i+$j]->images as $image)
                                                            <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                               class="carousel-item @if($k++ == 0) active @endif"
                                                               data-fancybox="gallery-D-{{$i+$j}}"
                                                               data-caption="{{ucfirst($microProjectH[$i+$j]->$language->MPE_Name)}}">
                                                                <img src="{{$image->MPI_Path}}" class="w-100"
                                                                     style="object-fit: cover">
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                    <button class="carousel-control-prev"
                                                            data-bs-target="#project-carousel-H-{{$i+$j}}"
                                                            data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next"
                                                            data-bs-target="#project-carousel-H-{{$i+$j}}"
                                                            data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                    <div class="col-9">
                                                        <div class="project-title">{{ucfirst($microProjectH[$i+$j]->$language->MPE_Name)}}
                                                            <textarea id="txt{{$microProjectH[$i+$j]->id}}"
                                                                      style="display: none;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 gap-3 d-flex justify-content-end align-items-baseline">
                                                        <img src="/images/ico/copy-icon.svg"
                                                             onclick="copyTextH({{$microProjectH[$i+$j]->id}})"
                                                             class="copy-icon">
                                                        </img>
                                                        @if($microProjectH[$i+$j]->MPE_Location != '0')
                                                            <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectH[$i+$j]->MPE_Location}}"
                                                               target="_blank">
                                                                <img class="location-icon"
                                                                     src="/images/ico/location-icon.svg">
                                                            </a>
                                                        @endif
                                                        @if($microProjectH[$i+$j]->MPE_Video != '0')
                                                            <a href="#" class="launch-modal"
                                                               data-modal-id="modal-video-{{$i+$j}}">
                                                                <img class="video-icon"
                                                                     src="/images/ico/video-icon.svg">
                                                            </a>
                                                            <!--VIDEO MODAL -->
                                                            <div class="modal fade" id="modal-video-{{$i+$j}}"
                                                                 tabindex="-1"
                                                                 role="dialog"
                                                                 aria-labelledby="modal-video-label">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="modal-video">
                                                                                <div class="video ">
                                                                                    <iframe class="embed-responsive-item"
                                                                                            src="{{$microProjectH[$i+$j]->MPE_Video}}"
                                                                                            frameborder="0"
                                                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                            allowfullscreen
                                                                                            webkitallowfullscreen
                                                                                            mozallowfullscreen
                                                                                            allowfullscreen></iframe>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="project-title-section"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                        <ul>
                                                            @if($microProjectH[$i+$j]->MPE_PartnerName == '0' && $microProjectH[$i+$j]->MPE_PartnerName2 == '0')
                                                                <li>
                                                                    <Strong class="project-subtitle">@lang('main.beneficiary')</strong>
                                                                    <span>{{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName)}}</span>
                                                                </li>
                                                            @elseif($microProjectH[$i+$j]->MPE_PartnerName != '0' && $microProjectH[$i+$j]->MPE_PartnerName2 == '0')
                                                                <li>
                                                                    <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                    <span>{{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectH[$i+$j]->MPE_PartnerName)}}</span>
                                                                </li>
                                                            @elseif($microProjectH[$i+$j]->MPE_PartnerName != '0' && $microProjectH[$i+$j]->MPE_PartnerName2 != '0')
                                                                <li>
                                                                    <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                    <span>{{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectH[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectH[$i+$j]->MPE_PartnerName2)}}</span>
                                                                </li>
                                                            @endif
                                                            @if($microProjectH[$i+$j]->MPE_FundedDate !=  NULL)
                                                                <li><Strong
                                                                            class="project-subtitle">@lang('projects.fundDate')</Strong>
                                                                    <span> {{date('m/Y',strtotime($microProjectH[$i+$j]->MPE_FundedDate))}}</span>
                                                                </li>
                                                            @endif
                                                            @if($microProjectH[$i+$j]->DOB != '0')
                                                                <li><strong
                                                                            class="project-subtitle">@lang('projects.age')</strong>
                                                                    <span> {{\Carbon\Carbon::createFromDate($microProjectH[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                </li>
                                                            @endif
                                                            @if($microProjectH[$i+$j]->FamilyMembers != '0')
                                                                <li><strong
                                                                            class="project-subtitle">@lang('projects.family')</strong>
                                                                    <span>{{$microProjectH[$i+$j]->FamilyMembers}}</span>
                                                                </li>
                                                            @endif
                                                            @if($microProjectH[$i+$j]->MPE_FundedDate !=  NULL)
                                                                <br>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                         style="margin-top: .5vw">
                                                        @if($microProjectH[$i+$j]->MPE_Donor=='1')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Caritas.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='2')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Salt.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='3')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/LD.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='5')
                                                            <img class="project-donor-logo"
                                                                 src="/images/logo/kia.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='7')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/If.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='8')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Hungary.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='9')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/loeuvre.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='10')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Loeuvre.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='11')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/ACN.svg">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @if($microProjectH[$i+$j]->$language->MPE_ExpSkill != '')
                                                        <div><strong
                                                                    class="project-subtitle">@lang('projects.skills')</strong>
                                                            <span>{{$microProjectH[$i+$j]->$language->MPE_ExpSkill}}</span>
                                                        </div>
                                                    @endif
                                                    <div class="project-content">
                                                        @if(strlen($microProjectH[$i+$j]->$language->MPE_Suffering)>30)
                                                            <p>{!!implode(' ', array_slice(explode(' ', strip_tags($microProjectH[$i+$j]->$language->MPE_Suffering)), 0, 30)).'...'!!}</p>
                                                        @else
                                                            <p>{!! $microProjectH[$i+$j]->$language->MPE_Suffering !!}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        @if(strlen($microProjectH[$i+$j]->$language->MPE_Suffering)>30)
                                                            <button class="readmore-btn"
                                                                    id="btn-primary-{{$i+$j}}"
                                                                    data-toggle="modal"
                                                                    data-target="#project-detail-{{$microProjectH[$i+$j]->MicroProject_ID}}">@lang('main.readMore')
                                                            </button>
                                                            {{--MODAL--}}
                                                            <div class="modal fade project-detail"
                                                                 id="project-detail-{{$microProjectH[$i+$j]->MicroProject_ID}}"
                                                                 tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button type="button" class="close"
                                                                                    id="close-D-{{$i+$j}}"
                                                                                    data-dismiss="modal"
                                                                                    aria-hidden="true">
                                                                                &times;
                                                                            </button>
                                                                            <div class="row mt-5">
                                                                                <div class="col-9">
                                                                                    <div class="project-title">{{ucfirst($microProjectH[$i+$j]->$language->MPE_Name)}}
                                                                                        <textarea
                                                                                                id="txt{{$microProjectH[$i+$j]->id}}"
                                                                                                style="display: none;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-3 gap-3 d-flex justify-content-end align-items-baseline">
                                                                                    <img src="/images/ico/copy-icon.svg"
                                                                                         onclick="copyTextH({{$microProjectH[$i+$j]->id}})"
                                                                                         class="copy-icon">
                                                                                    </img>
                                                                                    @if($microProjectH[$i+$j]->MPE_Location != '0')
                                                                                        <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectH[$i+$j]->MPE_Location}}"
                                                                                           target="_blank">
                                                                                            <img class="location-icon"
                                                                                                 src="/images/ico/location-icon.svg">
                                                                                        </a>
                                                                                    @endif
                                                                                    @if($microProjectH[$i+$j]->MPE_Video != '0')
                                                                                        <a href="#"
                                                                                           class="launch-modal"
                                                                                           data-modal-id="modal-video-{{$i+$j}}">
                                                                                            <img class="video-icon"
                                                                                                 src="/images/ico/video-icon.svg">
                                                                                        </a>
                                                                                        <!--VIDEO MODAL -->
                                                                                        <div class="modal fade"
                                                                                             id="modal-video-{{$i+$j}}"
                                                                                             tabindex="-1"
                                                                                             role="dialog"
                                                                                             aria-labelledby="modal-video-label">
                                                                                            <div class="modal-dialog"
                                                                                                 role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-body">
                                                                                                        <div class="modal-video">
                                                                                                            <div class="video ">
                                                                                                                <iframe class="embed-responsive-item"
                                                                                                                        src="{{$microProjectH[$i+$j]->MPE_Video}}"
                                                                                                                        frameborder="0"
                                                                                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                                                        allowfullscreen
                                                                                                                        webkitallowfullscreen
                                                                                                                        mozallowfullscreen
                                                                                                                        allowfullscreen></iframe>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="project-title-section"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="projectD-carousel-{{$i+$j}}"
                                                                                 class="carousel slide"
                                                                                 data-bs-ride="carousel">
                                                                                <div class="carousel-indicators">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectH[$i+$j]->images as $image)
                                                                                        <button type="button"
                                                                                                data-bs-target="#projectH-carousel-{{$i+$j}}"
                                                                                                data-bs-slide-to="{{$k++}}"
                                                                                                @if($k == 1)class="active" @endif>

                                                                                        </button>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="carousel-inner">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectH[$i+$j]->images as $image)
                                                                                        <div class="carousel-item @if($k++ == 0) active @endif">
                                                                                            <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                               data-fancybox="gallery-{{$i+$j}}"
                                                                                               data-caption="{{ucfirst($microProjectH[$i+$j]->$language->MPE_Name)}}">
                                                                                                <img src="{{$image->MPI_Path}}"
                                                                                                     class="d-block w-100 h-auto"
                                                                                                     style="object-fit: cover;">
                                                                                            </a>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <button class="carousel-control-prev"
                                                                                        data-bs-target="#projectH-carousel-{{$i+$j}}"
                                                                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                                                    <span class="visually-hidden">Previous</span>
                                                                                </button>
                                                                                <button class="carousel-control-next"
                                                                                        data-bs-target="#projectH-carousel-{{$i+$j}}"
                                                                                        data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                                                    <span class="visually-hidden">Next</span>
                                                                                </button>
                                                                            </div>
                                                                            <div id="modal-swipe-{{$i+$j}}">
                                                                                <div class="row mt-5">
                                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                @if($microProjectH[$i+$j]->MPE_PartnerName == '0' && $microProjectH[$i+$j]->MPE_PartnerName2 == '0')
                                                                                                    <Strong class="project-subtitle">@lang('main.beneficiary')</strong>
                                                                                                    <span>{{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName)}}</span>
                                                                                                @elseif($microProjectH[$i+$j]->MPE_PartnerName != '0' && $microProjectH[$i+$j]->MPE_PartnerName2 == '0')
                                                                                                    <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                                                    <span>{{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectH[$i+$j]->MPE_PartnerName)}}</span>
                                                                                                @elseif($microProjectH[$i+$j]->MPE_PartnerName != '0' && $microProjectH[$i+$j]->MPE_PartnerName2 != '0')
                                                                                                    <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                                                    <span>{{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectH[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectH[$i+$j]->MPE_PartnerName2)}}</span>
                                                                                                @endif
                                                                                                @if($microProjectH[$i+$j]->MPE_FundedDate !=  NULL)
                                                                                                    <div><Strong
                                                                                                                class="project-subtitle">@lang('projects.fundDate')</Strong><span> {{date('m/Y',strtotime($microProjectH[$i+$j]->MPE_FundedDate))}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($microProjectH[$i+$j]->DOB != '0')
                                                                                                    <div><strong
                                                                                                                class="project-subtitle">@lang('projects.age')</strong><span> {{\Carbon\Carbon::createFromDate($microProjectH[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($microProjectH[$i+$j]->FamilyMembers != '0')
                                                                                                    <div><strong
                                                                                                                class="project-subtitle">@lang('projects.family')</strong>
                                                                                                        <span>{{$microProjectH[$i+$j]->FamilyMembers}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($microProjectH[$i+$j]->MPE_FundedDate !=  NULL)
                                                                                                    <br>
                                                                                                @endif
                                                                                                @if($microProjectH[$i+$j]->$language->MPE_ExpSkill != '')
                                                                                                    <div><strong
                                                                                                                class="project-subtitle">@lang('projects.skills')</strong>
                                                                                                        <span>{{$microProjectH[$i+$j]->$language->MPE_ExpSkill}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                                                         style="margin-top: .5vw">
                                                                                        @if($microProjectH[$i+$j]->MPE_Donor=='1')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Caritas.svg">
                                                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='2')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Salt.svg">
                                                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='3')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/LD.svg">
                                                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='5')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/logo/kia.svg">
                                                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='7')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/If.svg">
                                                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='8')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Hungary.svg">
                                                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='9')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/loeuvre.svg">
                                                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='10')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Loeuvre.svg">
                                                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='11')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/ACN.svg">
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <div class="project-content">
                                                                                    <p class="p-justify">{!!$microProjectH[$i+$j]->$language->MPE_Suffering!!}</p>
                                                                                </div>
                                                                                <br>
                                                                                <textarea
                                                                                        id="txt{{$microProjectH[$i+$j]->id}}"
                                                                                        style="display: none;">
                                                                                    </textarea>
                                                                                <div id="fb-root"></div>
                                                                                <div class="fb-comments"
                                                                                     data-href="https://hcsyria.org/micro-projects#project{{$microProjectH[$i+$j]->MicroProject_ID}}"
                                                                                     data-width="100%"
                                                                                     data-numposts="3">
                                                                                </div>
                                                                                <div class="swipe-to-close"
                                                                                     id="swipe-to-close-{{$i+$j}}"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <p>{!! $microProjectH[$i+$j]->$language->MPE_Suffering !!}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                    @if($projectCopyH !== 'none')
                        {{--MODAL--}}
                        <div class="modal project-detail" id="project-H-detail-copy"
                             tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close"
                                                id="close-copy-H"
                                                data-dismiss="modal"
                                                aria-hidden="true">
                                            &times;
                                        </button>
                                        <div class="row mt-5">
                                            <div class="col-9">
                                                <div class="project-title">{{ucfirst($projectCopyH->$language->MPE_Name)}}
                                                    <textarea id="txt{{$projectCopyH->id}}"
                                                              style="display: none;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-3 gap-3 d-flex justify-content-end align-items-center">
                                                <img src="/images/ico/copy-icon.svg"
                                                     onclick="copyTextH({{$projectCopyH->id}})"
                                                     class="copy-icon">
                                                </img>
                                                @if($projectCopyH->MPE_Location != '0')
                                                    <a href="https://www.google.com/maps/search/?api=1&query={{$projectCopyH->MPE_Location}}"
                                                       target="_blank">
                                                        <img class="location-icon"
                                                             src="/images/ico/location-icon.svg">
                                                    </a>
                                                @endif

                                                @if($projectCopyH->MPE_Video != '0')
                                                    <a href="#" class="launch-modal"
                                                       data-modal-id="modal-video-{{$i+$j}}">
                                                        <img class="video-icon"
                                                             src="/images/ico/video-icon.svg">
                                                    </a>
                                                    <!--VIDEO MODAL -->
                                                    <div class="modal fade" id="modal-video-copy"
                                                         tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="modal-video-label">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="modal-video">
                                                                        <div class="video ">
                                                                            <iframe class="embed-responsive-item"
                                                                                    src="{{$projectCopyH->MPE_Video}}"
                                                                                    frameborder="0"
                                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                    allowfullscreen
                                                                                    webkitallowfullscreen
                                                                                    mozallowfullscreen
                                                                                    allowfullscreen></iframe>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <div class="project-title-section"></div>
                                            </div>
                                        </div>
                                        <div id="project-carousel-copy"
                                             class="carousel slide"
                                             data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <?php $k = 0 ?>
                                                @foreach($projectCopyH->images as $image)
                                                    <button type="button"
                                                            data-bs-target="#project-carousel-copy"
                                                            data-bs-slide-to="{{$k++}}"
                                                            @if($k == 1)class="active" @endif>

                                                    </button>
                                                @endforeach
                                            </div>
                                            <div class="carousel-inner">
                                                <?php $k = 0 ?>
                                                @foreach($projectCopyH->images as $image)
                                                    <div class="carousel-item @if($k++ == 0) active @endif">
                                                        <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                           data-fancybox="gallery-copy"
                                                           data-caption="{{ucfirst($projectCopyH->$language->MPE_Name)}}">
                                                            <img src="{{$image->MPI_Path}}"
                                                                 class="d-block w-100 h-auto"
                                                                 style="object-fit: cover;">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev"
                                                    data-bs-target="#project-carousel-copy"
                                                    data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next"
                                                    data-bs-target="#project-carousel-copy"
                                                    data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div id="modal-swipe-copy">
                                            <div class="row mt-5">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                    <div class="row">
                                                        <div class="col">
                                                            @if($projectCopyH->MPE_PartnerName == '0' && $projectCopyH->MPE_PartnerName2 == '0')
                                                                <Strong class="project-subtitle">@lang('main.beneficiary')</strong>
                                                                <span>{{ucfirst($projectCopyH->MPE_BeneficiaryName)}}</span>
                                                            @elseif($projectCopyH->MPE_PartnerName != '0' && $projectCopyH->MPE_PartnerName2 == '0')
                                                                <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                <span>{{ucfirst($projectCopyH->MPE_BeneficiaryName) .', '. ucfirst($projectCopyH->MPE_PartnerName)}}</span>
                                                            @elseif($projectCopyH->MPE_PartnerName != '0' && $projectCopyH->MPE_PartnerName2 != '0')
                                                                <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                <span>{{ucfirst($projectCopyH->MPE_BeneficiaryName) .', '. ucfirst($projectCopyH->MPE_PartnerName) .', '.ucfirst($projectCopyH->MPE_PartnerName2)}}</span>
                                                            @endif
                                                            @if($projectCopyH->MPE_FundedDate !=  NULL)
                                                                <div><Strong
                                                                            class="project-subtitle">@lang('projects.fundDate')</Strong><span> {{date('m/Y',strtotime($projectCopyH->MPE_FundedDate))}}</span>
                                                                </div>
                                                            @endif
                                                            @if($projectCopyH->DOB != '0')
                                                                <div><strong
                                                                            class="project-subtitle">@lang('projects.age')</strong><span> {{\Carbon\Carbon::createFromDate($projectCopyH->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                </div>
                                                            @endif
                                                            @if($projectCopyH->FamilyMembers != '0')
                                                                <div><strong
                                                                            class="project-subtitle">@lang('projects.family')</strong>
                                                                    <span>{{$projectCopyH->FamilyMembers}}</span>
                                                                </div>
                                                            @endif
                                                            @if($projectCopyH->$language->MPE_ExpSkill != '')
                                                                <div><strong
                                                                            class="project-subtitle">@lang('projects.skills')</strong>
                                                                    <span>{{$projectCopyH->$language->MPE_ExpSkill}}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                     style="margin-top: .5vw">
                                                    @if($projectCopyH->MPE_Donor=='1')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Caritas.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='2')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Salt.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='3')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/LD.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='5')
                                                        <img class="project-donor-logo"
                                                             src="/images/logo/kia.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='7')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/If.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='8')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Hungary.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='9')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/loeuvre.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='10')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Loeuvre.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='11')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/ACN.svg">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="project-content">
                                                <p class="p-justify">{!!$projectCopyH->$language->MPE_Suffering!!}</p>
                                            </div>
                                            <br>
                                            <textarea
                                                    id="txt{{$projectCopyH->id}}"
                                                    style="display: none;">
                                                    </textarea>
                                            <div id="fb-root"></div>
                                            <div class="fb-comments"
                                                 data-href="https://hcsyria.org/micro-projects#project{{$projectCopyH->MicroProject_ID}}"
                                                 data-width="100%"
                                                 data-numposts="3">
                                            </div>
                                            <div class="swipe-to-close"
                                                 id="swipe-to-close-H-copy"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            @endif
            <div class="before-page  horizontal-line"></div>
            <div class="text-center">
                <div class="text-center">
                    @if($search != '' && $donor != '')
                        {{$microProjectH->appends(['search' => $search, 'donor' => $donor,'microProjectH' => $microProjectH->currentPage()])->links()}}
                    @elseif($search != '' &&  $donor == '')
                        {{$microProjectH->appends(['search' => $search, 'microProjectH' => $microProjectH->currentPage()])->links()}}
                    @elseif($search == '' &&  $donor != '')
                        {{$microProjectH->appends(['donor' => $donor,'microProjectH' => $microProjectH->currentPage()])->links()}}
                    @else
                        {{$microProjectH->appends(['microProjectH' => $microProjectH->currentPage()])->links()}}
                    @endif
                </div>
            </div>
            <div class="after-page horizontal-line"></div>
            <div id="map-section">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-12 d-flex justify-content-center p-0" data-aos="fade-up"
                             data-aos-duration="600">
                            <div class="section-title">Map Locations</div>
                        </div>
                    </div>
                </div>
                <div class="map-line-before horizontal-line"></div>
                <div id='homs_map' class="map" data-aos="fade-up" data-aos-duration="600"></div>
            </div>
            <div class="horizontal-line last"></div>
        </div>
        <div class="tab-pane fade" id="damascus" role="tabpanel" aria-labelledby="damascusTab" tabindex="2">
            @if(count($microProjectD)==0)
                <div class="projects-height">
                    <div class="single-project">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
                                <div class="text-center">
                                    Sorry,we couldn't find any results
                                </div>
                                {{--<div>@lang('projects.sorryMessage2')</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(count($microProjectD))
                @for($i = 0; $i<count($microProjectD); $i = $i + 1)
                    @for($j = 0; $j<1; $j++)
                        @if($i+$j < count($microProjectD))
                            <div class="projects-height">
                                <div class="single-project">
                                    <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
                                                <div id="project-carousel-D-{{$i+$j}}"
                                                     class="carousel slide w-100 project-carousel"
                                                     data-bs-ride="carousel" data-interval="1000">
                                                    <div class="carousel-inner project-carousel">
                                                        <?php $k = 0 ?>
                                                        @foreach($microProjectD[$i+$j]->images as $image)
                                                            <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                               class="carousel-item @if($k++ == 0) active @endif"
                                                               data-fancybox="gallery-D-{{$i+$j}}"
                                                               data-caption="{{ucfirst($microProjectD[$i+$j]->$language->MPE_Name)}}">
                                                                <img src="{{$image->MPI_Path}}" class="w-100"
                                                                     style="object-fit: cover">
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                    <button class="carousel-control-prev"
                                                            data-bs-target="#project-carousel-D-{{$i+$j}}"
                                                            data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next"
                                                            data-bs-target="#project-carousel-D-{{$i+$j}}"
                                                            data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                                <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                                    <div class="col-9">
                                                        <div class="project-title">{{ucfirst($microProjectD[$i+$j]->$language->MPE_Name)}}
                                                            <textarea id="txt{{$microProjectD[$i+$j]->id}}"
                                                                      style="display: none;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 gap-3 d-flex justify-content-end align-items-baseline">
                                                        <img src="/images/ico/copy-icon.svg"
                                                             onclick="copyTextD({{$microProjectD[$i+$j]->id}})"
                                                             class="copy-icon">
                                                        </img>
                                                        @if($microProjectD[$i+$j]->MPE_Location != '0')
                                                            <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectD[$i+$j]->MPE_Location}}"
                                                               target="_blank">
                                                                <img class="location-icon"
                                                                     src="/images/ico/location-icon.svg">
                                                            </a>
                                                        @endif
                                                        @if($microProjectD[$i+$j]->MPE_Video != '0')
                                                            <a href="#" class="launch-modal"
                                                               data-modal-id="modal-video-{{$i+$j}}">
                                                                <img class="video-icon"
                                                                     src="/images/ico/video-icon.svg">
                                                            </a>
                                                            <!--VIDEO MODAL -->
                                                            <div class="modal fade" id="modal-video-{{$i+$j}}"
                                                                 tabindex="-1"
                                                                 role="dialog"
                                                                 aria-labelledby="modal-video-label">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="modal-video">
                                                                                <div class="video ">
                                                                                    <iframe class="embed-responsive-item"
                                                                                            src="{{$microProjectD[$i+$j]->MPE_Video}}"
                                                                                            frameborder="0"
                                                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                            allowfullscreen
                                                                                            webkitallowfullscreen
                                                                                            mozallowfullscreen
                                                                                            allowfullscreen></iframe>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="project-title-section"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                        <div class="row">
                                                            <div class="col">
                                                                <ul>
                                                                    @if($microProjectD[$i+$j]->MPE_PartnerName == '0' && $microProjectD[$i+$j]->MPE_PartnerName2 == '0')
                                                                        <li>
                                                                            <Strong class="project-subtitle">@lang('main.beneficiary')</strong>
                                                                            <span>{{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName)}}</span>
                                                                        </li>
                                                                    @elseif($microProjectD[$i+$j]->MPE_PartnerName != '0' && $microProjectD[$i+$j]->MPE_PartnerName2 == '0')
                                                                        <li>
                                                                            <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                            <span>{{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectD[$i+$j]->MPE_PartnerName)}}</span>
                                                                        </li>
                                                                    @elseif($microProjectD[$i+$j]->MPE_PartnerName != '0' && $microProjectD[$i+$j]->MPE_PartnerName2 != '0')
                                                                        <li>
                                                                            <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                            <span>{{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectD[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectD[$i+$j]->MPE_PartnerName2)}}</span>
                                                                        </li>
                                                                    @endif
                                                                    @if($microProjectD[$i+$j]->MPE_FundedDate !=  NULL)
                                                                        <li><Strong
                                                                                    class="project-subtitle">@lang('projects.fundDate')</Strong>
                                                                            <span> {{date('m/Y',strtotime($microProjectD[$i+$j]->MPE_FundedDate))}}</span>
                                                                        </li>
                                                                    @endif
                                                                    @if($microProjectD[$i+$j]->DOB != '0')
                                                                        <li><strong
                                                                                    class="project-subtitle">@lang('projects.age')</strong>
                                                                            <span> {{\Carbon\Carbon::createFromDate($microProjectD[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                        </li>

                                                                    @endif
                                                                    @if($microProjectD[$i+$j]->FamilyMembers != '0')
                                                                        <li><strong
                                                                                    class="project-subtitle">@lang('projects.family')</strong>
                                                                            <span>{{$microProjectD[$i+$j]->FamilyMembers}}</span>
                                                                        </li>
                                                                    @endif
                                                                    @if($microProjectD[$i+$j]->MPE_FundedDate !=  NULL)
                                                                        <br>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                         style="margin-top: .5vw">
                                                        @if($microProjectD[$i+$j]->MPE_Donor=='1')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Caritas.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='2')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Salt.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='3')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/LD.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='5')
                                                            <img class="project-donor-logo"
                                                                 src="/images/logo/kia.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='7')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/If.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='8')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Hungary.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='9')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/loeuvre.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='10')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/Loeuvre.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='11')
                                                            <img class="project-donor-logo"
                                                                 src="/images/newLogos/ACN.svg">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @if($microProjectD[$i+$j]->$language->MPE_ExpSkill != '')
                                                        <div><strong
                                                                    class="project-subtitle">@lang('projects.skills')</strong>
                                                            <span>{{$microProjectD[$i+$j]->$language->MPE_ExpSkill}}</span>
                                                        </div>
                                                    @endif
                                                    <div class="project-content">
                                                        @if(strlen($microProjectD[$i+$j]->$language->MPE_Suffering)>30)
                                                            <p>{!!implode(' ', array_slice(explode(' ', strip_tags($microProjectD[$i+$j]->$language->MPE_Suffering)), 0, 30)).'...'!!}</p>
                                                        @else
                                                            <p>{!! $microProjectD[$i+$j]->$language->MPE_Suffering !!}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        @if(strlen($microProjectD[$i+$j]->$language->MPE_Suffering)>30)
                                                            <button class="readmore-btn"
                                                                    id="btn-primary-{{$i+$j}}"
                                                                    data-toggle="modal"
                                                                    data-target="#project-detail-{{$microProjectD[$i+$j]->MicroProject_ID}}">@lang('main.readMore')
                                                            </button>
                                                            {{--MODAL--}}
                                                            <div class="modal fade project-detail"
                                                                 id="project-detail-{{$microProjectD[$i+$j]->MicroProject_ID}}"
                                                                 tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button type="button" class="close"
                                                                                    id="close-D-{{$i+$j}}"
                                                                                    data-dismiss="modal"
                                                                                    aria-hidden="true">
                                                                                &times;
                                                                            </button>
                                                                            <div class="row mt-5">
                                                                                <div class="col-9">
                                                                                    <div class="project-title">{{ucfirst($microProjectD[$i+$j]->$language->MPE_Name)}}
                                                                                        <textarea
                                                                                                id="txt{{$microProjectD[$i+$j]->id}}"
                                                                                                style="display: none;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-3 gap-3 d-flex justify-content-end align-items-baseline">
                                                                                    <img src="/images/ico/copy-icon.svg"
                                                                                         onclick="copyTextD({{$microProjectD[$i+$j]->id}})"
                                                                                         class="copy-icon">
                                                                                    </img>
                                                                                    @if($microProjectD[$i+$j]->MPE_Location != '0')
                                                                                        <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectD[$i+$j]->MPE_Location}}"
                                                                                           target="_blank">
                                                                                            <img class="location-icon"
                                                                                                 src="/images/ico/location-icon.svg">
                                                                                        </a>
                                                                                    @endif
                                                                                    @if($microProjectD[$i+$j]->MPE_Video != '0')
                                                                                        <a href="#"
                                                                                           class="launch-modal"
                                                                                           data-modal-id="modal-video-{{$i+$j}}">
                                                                                            <img class="video-icon"
                                                                                                 src="/images/ico/video-icon.svg">
                                                                                        </a>
                                                                                        <!--VIDEO MODAL -->
                                                                                        <div class="modal fade"
                                                                                             id="modal-video-{{$i+$j}}"
                                                                                             tabindex="-1"
                                                                                             role="dialog"
                                                                                             aria-labelledby="modal-video-label">
                                                                                            <div class="modal-dialog"
                                                                                                 role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-body">
                                                                                                        <div class="modal-video">
                                                                                                            <div class="video ">
                                                                                                                <iframe class="embed-responsive-item"
                                                                                                                        src="{{$microProjectD[$i+$j]->MPE_Video}}"
                                                                                                                        frameborder="0"
                                                                                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                                                        allowfullscreen
                                                                                                                        webkitallowfullscreen
                                                                                                                        mozallowfullscreen
                                                                                                                        allowfullscreen></iframe>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="project-title-section"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="projectD-carousel-{{$i+$j}}"
                                                                                 class="carousel slide"
                                                                                 data-bs-ride="carousel">
                                                                                <div class="carousel-indicators">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectD[$i+$j]->images as $image)
                                                                                        <button type="button"
                                                                                                data-bs-target="#projectD-carousel-{{$i+$j}}"
                                                                                                data-bs-slide-to="{{$k++}}"
                                                                                                @if($k == 1)class="active" @endif>

                                                                                        </button>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="carousel-inner">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectD[$i+$j]->images as $image)
                                                                                        <div class="carousel-item @if($k++ == 0) active @endif">
                                                                                            <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                               data-fancybox="gallery-{{$i+$j}}"
                                                                                               data-caption="{{ucfirst($microProjectD[$i+$j]->$language->MPE_Name)}}">
                                                                                                <img src="{{$image->MPI_Path}}"
                                                                                                     class="d-block w-100 h-auto"
                                                                                                     style="object-fit: cover;">
                                                                                            </a>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <button class="carousel-control-prev"
                                                                                        data-bs-target="#projectD-carousel-{{$i+$j}}"
                                                                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                                                    <span class="visually-hidden">Previous</span>
                                                                                </button>
                                                                                <button class="carousel-control-next"
                                                                                        data-bs-target="#projectD-carousel-{{$i+$j}}"
                                                                                        data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                                                    <span class="visually-hidden">Next</span>
                                                                                </button>
                                                                            </div>
                                                                            <div id="modal-swipe-{{$i+$j}}">
                                                                                <div class="row mt-5">
                                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                @if($microProjectD[$i+$j]->MPE_PartnerName == '0' && $microProjectD[$i+$j]->MPE_PartnerName2 == '0')
                                                                                                    <Strong class="project-subtitle">@lang('main.beneficiary')</strong>
                                                                                                    <span>{{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName)}}</span>
                                                                                                @elseif($microProjectD[$i+$j]->MPE_PartnerName != '0' && $microProjectD[$i+$j]->MPE_PartnerName2 == '0')
                                                                                                    <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                                                    <span>{{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectD[$i+$j]->MPE_PartnerName)}}</span>
                                                                                                @elseif($microProjectD[$i+$j]->MPE_PartnerName != '0' && $microProjectD[$i+$j]->MPE_PartnerName2 != '0')
                                                                                                    <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                                                    <span>{{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectD[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectD[$i+$j]->MPE_PartnerName2)}}</span>
                                                                                                @endif
                                                                                                @if($microProjectD[$i+$j]->MPE_FundedDate !=  NULL)
                                                                                                    <div><Strong
                                                                                                                class="project-subtitle">@lang('projects.fundDate')</Strong><span> {{date('m/Y',strtotime($microProjectD[$i+$j]->MPE_FundedDate))}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($microProjectD[$i+$j]->DOB != '0')
                                                                                                    <div><strong
                                                                                                                class="project-subtitle">@lang('projects.age')</strong><span> {{\Carbon\Carbon::createFromDate($microProjectD[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($microProjectD[$i+$j]->FamilyMembers != '0')
                                                                                                    <div><strong
                                                                                                                class="project-subtitle">@lang('projects.family')</strong>
                                                                                                        <span>{{$microProjectD[$i+$j]->FamilyMembers}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if($microProjectD[$i+$j]->MPE_FundedDate !=  NULL)
                                                                                                    <br>
                                                                                                @endif
                                                                                                @if($microProjectD[$i+$j]->$language->MPE_ExpSkill != '')
                                                                                                    <div><strong
                                                                                                                class="project-subtitle">@lang('projects.skills')</strong>
                                                                                                        <span>{{$microProjectD[$i+$j]->$language->MPE_ExpSkill}}</span>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                                                         style="margin-top: .5vw">
                                                                                        @if($microProjectD[$i+$j]->MPE_Donor=='1')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Caritas.svg">
                                                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='2')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Salt.svg">
                                                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='3')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/LD.svg">
                                                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='5')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/logo/kia.svg">
                                                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='7')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/If.svg">
                                                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='8')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Hungary.svg">
                                                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='9')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/loeuvre.svg">
                                                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='10')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/Loeuvre.svg">
                                                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='11')
                                                                                            <img class="project-donor-logo"
                                                                                                 src="/images/newLogos/ACN.svg">
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <div class="project-content">
                                                                                    <p class="p-justify">{!!$microProjectD[$i+$j]->$language->MPE_Suffering!!}</p>
                                                                                </div>
                                                                                <br>
                                                                                <textarea
                                                                                        id="txt{{$microProjectD[$i+$j]->id}}"
                                                                                        style="display: none;">
                                                                                    </textarea>
                                                                                <div id="fb-root"></div>
                                                                                <div class="fb-comments"
                                                                                     data-href="https://hcsyria.org/micro-projects#project{{$microProjectD[$i+$j]->MicroProject_ID}}"
                                                                                     data-width="100%"
                                                                                     data-numposts="3">
                                                                                </div>
                                                                                <div class="swipe-to-close"
                                                                                     id="swipe-to-close-{{$i+$j}}"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <p>{!! $microProjectD[$i+$j]->$language->MPE_Suffering !!}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                    @if($projectCopyD !== 'none')
                        {{--MODAL--}}
                        <div class="modal project-detail" id="project-D-detail-copy"
                             tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close"
                                                id="close-copy-D"
                                                data-dismiss="modal"
                                                aria-hidden="true">
                                            &times;
                                        </button>
                                        <div class="row mt-5">
                                            <div class="col-9">
                                                <div class="project-title">{{ucfirst($projectCopyD->$language->MPE_Name)}}
                                                    <textarea id="txt{{$projectCopyD->id}}"
                                                              style="display: none;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-3 gap-3 d-flex justify-content-end align-items-center">
                                                <img src="/images/ico/copy-icon.svg"
                                                     onclick="copyTextD({{$projectCopyD->id}})"
                                                     class="copy-icon">
                                                </img>
                                                @if($projectCopyD->MPE_Location != '0')
                                                    <a href="https://www.google.com/maps/search/?api=1&query={{$projectCopyD->MPE_Location}}"
                                                       target="_blank">
                                                        <img class="location-icon"
                                                             src="/images/ico/location-icon.svg">
                                                    </a>
                                                @endif

                                                @if($projectCopyD->MPE_Video != '0')
                                                    <a href="#" class="launch-modal"
                                                       data-modal-id="modal-video-{{$i+$j}}">
                                                        <img class="video-icon"
                                                             src="/images/ico/video-icon.svg">
                                                    </a>
                                                    <!--VIDEO MODAL -->
                                                    <div class="modal fade" id="modal-video-copy"
                                                         tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="modal-video-label">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="modal-video">
                                                                        <div class="video ">
                                                                            <iframe class="embed-responsive-item"
                                                                                    src="{{$projectCopyD->MPE_Video}}"
                                                                                    frameborder="0"
                                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                    allowfullscreen
                                                                                    webkitallowfullscreen
                                                                                    mozallowfullscreen
                                                                                    allowfullscreen></iframe>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <div class="project-title-section"></div>
                                            </div>
                                        </div>
                                        <div id="project-carousel-copy"
                                             class="carousel slide"
                                             data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <?php $k = 0 ?>
                                                @foreach($projectCopyD->images as $image)
                                                    <button type="button"
                                                            data-bs-target="#project-carousel-copy"
                                                            data-bs-slide-to="{{$k++}}"
                                                            @if($k == 1)class="active" @endif>

                                                    </button>
                                                @endforeach
                                            </div>
                                            <div class="carousel-inner">
                                                <?php $k = 0 ?>
                                                @foreach($projectCopyD->images as $image)
                                                    <div class="carousel-item @if($k++ == 0) active @endif">
                                                        <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                           data-fancybox="gallery-copy"
                                                           data-caption="{{ucfirst($projectCopyD->$language->MPE_Name)}}">
                                                            <img src="{{$image->MPI_Path}}"
                                                                 class="d-block w-100 h-auto"
                                                                 style="object-fit: cover;">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev"
                                                    data-bs-target="#project-carousel-copy"
                                                    data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next"
                                                    data-bs-target="#project-carousel-copy"
                                                    data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div id="modal-swipe-copy">
                                            <div class="row mt-5">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                    <div class="row">
                                                        <div class="col">
                                                            @if($projectCopyD->MPE_PartnerName == '0' && $projectCopyD->MPE_PartnerName2 == '0')
                                                                <Strong class="project-subtitle">@lang('main.beneficiary')</strong>
                                                                <span>{{ucfirst($projectCopyD->MPE_BeneficiaryName)}}</span>
                                                            @elseif($projectCopyD->MPE_PartnerName != '0' && $projectCopyD->MPE_PartnerName2 == '0')
                                                                <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                <span>{{ucfirst($projectCopyD->MPE_BeneficiaryName) .', '. ucfirst($projectCopyD->MPE_PartnerName)}}</span>
                                                            @elseif($projectCopyD->MPE_PartnerName != '0' && $projectCopyD->MPE_PartnerName2 != '0')
                                                                <Strong class="project-subtitle">@lang('main.beneficiaries')</strong>
                                                                <span>{{ucfirst($projectCopyD->MPE_BeneficiaryName) .', '. ucfirst($projectCopyD->MPE_PartnerName) .', '.ucfirst($projectCopyD->MPE_PartnerName2)}}</span>
                                                            @endif
                                                            @if($projectCopyD->MPE_FundedDate !=  NULL)
                                                                <div><Strong
                                                                            class="project-subtitle">@lang('projects.fundDate')</Strong><span> {{date('m/Y',strtotime($projectCopyD->MPE_FundedDate))}}</span>
                                                                </div>
                                                            @endif
                                                            @if($projectCopyD->DOB != '0')
                                                                <div><strong
                                                                            class="project-subtitle">@lang('projects.age')</strong><span> {{\Carbon\Carbon::createFromDate($projectCopyD->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')</span>
                                                                </div>
                                                            @endif
                                                            @if($projectCopyD->FamilyMembers != '0')
                                                                <div><strong
                                                                            class="project-subtitle">@lang('projects.family')</strong>
                                                                    <span>{{$projectCopyD->FamilyMembers}}</span>
                                                                </div>
                                                            @endif
                                                            @if($projectCopyD->$language->MPE_ExpSkill != '')
                                                                <div><strong
                                                                            class="project-subtitle">@lang('projects.skills')</strong>
                                                                    <span>{{$projectCopyD->$language->MPE_ExpSkill}}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                     style="margin-top: .5vw">
                                                    @if($projectCopyD->MPE_Donor=='1')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Caritas.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='2')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Salt.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='3')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/LD.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='5')
                                                        <img class="project-donor-logo"
                                                             src="/images/logo/kia.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='7')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/If.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='8')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Hungary.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='9')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/loeuvre.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='10')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/Loeuvre.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='11')
                                                        <img class="project-donor-logo"
                                                             src="/images/newLogos/ACN.svg">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="project-content">
                                                <p class="p-justify">{!!$projectCopyD->$language->MPE_Suffering!!}</p>
                                            </div>
                                            <br>
                                            <textarea
                                                    id="txt{{$projectCopyD->id}}"
                                                    style="display: none;">
                                                    </textarea>
                                            <div id="fb-root"></div>
                                            <div class="fb-comments"
                                                 data-href="https://hcsyria.org/micro-projects#project{{$projectCopyD->MicroProject_ID}}"
                                                 data-width="100%"
                                                 data-numposts="3">
                                            </div>
                                            <div class="swipe-to-close"
                                                 id="swipe-to-close-D-copy"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            @endif
            <div class="before-page horizontal-line"></div>
            <div class="text-center">
                <div class="text-center">
                    @if($search != '' && $donor != '')
                        {{$microProjectD->appends(['search' => $search, 'donor' => $donor,'microProjectD' => $microProjectD->currentPage()])->links()}}
                    @elseif($search != '' &&  $donor == '')
                        {{$microProjectD->appends(['search' => $search, 'microProjectD' => $microProjectD->currentPage()])->links()}}
                    @elseif($search == '' &&  $donor != '')
                        {{$microProjectD->appends(['donor' => $donor,'microProjectD' => $microProjectD->currentPage()])->links()}}
                    @else
                        {{$microProjectD->appends(['microProjectD' => $microProjectD->currentPage()])->links()}}
                    @endif
                </div>
            </div>
            <div class="after-page horizontal-line"></div>
            <div id="map-section">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-12 d-flex justify-content-center p-0" data-aos="fade-up"
                             data-aos-duration="600">
                            <div class="section-title">Map Locations</div>
                        </div>
                    </div>
                </div>
                <div class="map-line-before horizontal-line"></div>
                <div id='damascus_map' class="map" data-aos="fade-up" data-aos-duration="600"></div>
            </div>
            <div class="horizontal-line last"></div>
        </div>
        <div class="horizontal-line"></div>
    </div>
</div>
</div>
</div>
</div>
</div>
<script>
    $(function () {
        $('#aleppoTab').on('click', function () {
            // e.preventDefault();
            var aleppo = document.getElementById('aleppoTab');
            var tab = new bootstrap.Tab(aleppo);
            tab.show();
            setTimeout(function () {
                initAleppoMap();
                initMarkers();
                L.Util.requestAnimFrame(aleppoMap.invalidateSize, aleppoMap, !1, aleppoMap._container);
            }, 2000);
        });
        $('#homsTab').on('click', function () {
            // e.preventDefault();
            var homs = document.getElementById('homsTab');
            var tab = new bootstrap.Tab(homs);
            tab.show();
            setTimeout(function () {
                initHomsMap();
                initMarkers();
                L.Util.requestAnimFrame(homsMap.invalidateSize, homsMap, !1, homsMap._container);
            }, 2000);
        });
        $('#damascusTab').on('click', function () {
            // e.preventDefault();
            var damas = document.getElementById('damascusTab');
            var tab = new bootstrap.Tab(damas);
            tab.show();
            setTimeout(function () {
                initHomsMap();
                initMarkers();
                L.Util.requestAnimFrame(damasMap.invalidateSize, damasMap, !1, damasMap._container);
            }, 2000);
        });
    });
</script>
<script>
    var aleppoMap, homsMap, damasMap, markersAleppo = [], markersHoms = [], markersDamas = [];
    var iconDefault = L.icon({
        iconRetinaUrl: '/images/ico/marker-icon-2x-red.png',
        iconUrl: '/images/ico/marker-icon-2x-red.png',
        iconSize: [18, 28],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        tooltipAnchor: [16, -28],
        // shadowSize: [41, 41],
    });

    /* ----------------------------- Initialize Map ----------------------------- */
    function initAleppoMap() {
        aleppoMap = L.map('aleppo_map', {
            center: {
                lat: 36.2021,
                lng: 37.3543,
            },
            zoom: 8
        });
        L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png?api_key=7f38c51a-41e4-4cf8-b943-4b9cf994ab08', {
            attribution: ''
        }).addTo(aleppoMap);
    }

    function initHomsMap() {
        homsMap = L.map('homs_map', {
            center: {
                lat: 34.7324,
                lng: 36.7137,
            },
            zoom: 10
        });
        L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png?api_key=7f38c51a-41e4-4cf8-b943-4b9cf994ab08', {
            attribution: ''
        }).addTo(homsMap);
        // aleppoMap.on('click', mapClicked);
    }

    function initDamasMap() {
        damasMap = L.map('damascus_map', {
            center: {
                lat: 33.5038,
                lng: 36.3265,
            },
            zoom: 13
        });
        L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png?api_key=7f38c51a-41e4-4cf8-b943-4b9cf994ab08', {
            attribution: ''
        }).addTo(damasMap);
    }

    /* --------------------------- Initialize Markers --------------------------- */
    function initMarkers() {
                @foreach($aleppoMap as $alepmap)
        var a_lat, a_long;
        var aleppo_location = "{{$alepmap['MPE_Location']}}";
        if (aleppo_location == 0) {
            a_lat = 0;
            a_long = 0;
        }
        else {
            a_lat = parseFloat(aleppo_location.split(',')[0]);
            a_long = parseFloat(aleppo_location.split(',')[1]);
        }
        if (a_lat != 0 && a_long != 0) {
            var a_marker = L.marker([a_lat, a_long], {icon: iconDefault});
            @if(app()->isLocale('en'))
            a_marker.addTo(aleppoMap).bindPopup(`<b>Project:</b> {{{$alepmap['MPE_Name']}}} <br> <b>Beneficiary:</b> {{{$alepmap['MPE_BeneficiaryName']}}}`);
            @else
            a_marker.addTo(aleppoMap).bindPopup(`<b>Projet: {{{$alepmap['MPE_Name']}}} <br> Bénéficiaire: {{{$alepmap['MPE_BeneficiaryName']}}}</b>`);
            @endif
            markersAleppo.push(a_marker);
        }
                @endforeach
                @foreach($homsMap as $homsmap)
        var h_lat, h_long;
        var homs_location = "{{$homsmap['MPE_Location']}}";
        if (homs_location == 0) {
            h_lat = 0;
            h_long = 0;
        }
        else {
            h_lat = parseFloat(homs_location.split(',')[0]);
            h_long = parseFloat(homs_location.split(',')[1]);
        }
        if (h_lat != 0 && h_long != 0) {
            var h_marker = L.marker([h_lat, h_long], {icon: iconDefault});
            @if(app()->isLocale('en'))
            h_marker.addTo(homsMap).bindPopup(`<b>Project:</b> {{{$homsmap['MPE_Name']}}} <br><b> Beneficiary:</b> {{{$homsmap['MPE_BeneficiaryName']}}}`);
            @else
            h_marker.addTo(homsMap).bindPopup(`<b>Projet: {{{$homsmap['MPE_Name']}}} <br> Bénéficiaire: {{{$homsmap['MPE_BeneficiaryName']}}}</b>`);
            @endif
            markersHoms.push(h_marker);
        }
                @endforeach
                @foreach($damasMap as $damasmap)
        var d_lat, d_long;
        var damas_location = "{{$damasmap['MPE_Location']}}";
        if (damas_location == 0) {
            d_lat = 0;
            d_long = 0;
        }
        else {
            d_lat = parseFloat(damas_location.split(',')[0]);
            d_long = parseFloat(damas_location.split(',')[1]);
        }
        if (d_lat != 0 && d_long != 0) {
            var d_marker = L.marker([d_lat, d_long], {icon: iconDefault});
            @if(app()->isLocale('en'))
            d_marker.addTo(damasMap).bindPopup(`<b>Project: </b>{{{$damasmap['MPE_Name']}}} <br> <b>Beneficiary:</b> {{{$damasmap['MPE_BeneficiaryName']}}}`);
            @else
            d_marker.addTo(damasMap).bindPopup(`<b>Projet: </b>{{{$damasmap['MPE_Name']}}} <br> <b>Bénéficiaire:</b> {{{$damasmap['MPE_BeneficiaryName']}}}`);
            @endif
            markersDamas.push(d_marker);
        }
        @endforeach
        {{--@endif--}}
    }
</script>
<script>
    setTimeout(function () {
        initAleppoMap();
        initMarkers();
        L.Util.requestAnimFrame(aleppoMap.invalidateSize, aleppoMap, !1, aleppoMap._container);
        initHomsMap();
        initMarkers();
        L.Util.requestAnimFrame(homsMap.invalidateSize, homsMap, !1, homsMap._container);
        initDamasMap();
        initMarkers();
        L.Util.requestAnimFrame(damasMap.invalidateSize, damasMap, !1, damasMap._container);
    }, 2000);

</script>
@include('new.public.footer')

{{--<script>--}}
{{--window.onload = function () {--}}
{{--setInterval(function () {--}}
{{--document.getElementById('preloader').style.display = 'none';--}}
{{--document.getElementById('Micro').style.display = 'block';--}}
{{--}, 2000);--}}
{{--};--}}
{{--</script>--}}
{{--<link rel="stylesheet" href="/css/micro_page.css">--}}
<script>
    AOS.init({
        duration: 1200,
    })
</script>
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
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        }
    }
</script>
<script>
    var url = location.href;
    if (url.includes('search') || url.includes('donor') || url.includes('video'))
        $('html, body').animate({
            scrollTop: $('#donor-filter').offset().top
        }, 'slow');
</script>
<script>
    $(function () {
        $('.copy-icon').on("click", function () {
            $('.bl').hide();
            $(this).showBalloon({
                position: "left",
                contents: "@lang('donate.copied')",
                classname: "bl",
                maxLifetime: 1000,
                tipSize: 0,
                delay: 100,
                hideDuration: 500,
                offsetX: -10,
                showAnimation: function (d, c) {
                    this.fadeIn(d, c);
                },
                css: {
                    fontSize: '1.1rem'
                }
            });
        })
    });
</script>
<script>
    $(function () {
        $('#videoFilter').on("mouseenter", function () {
            $('.bl').hide();
            $(this).showBalloon({
                position: "left",
                contents: "search video",
                classname: "bl",
                maxLifetime: 1000,
                tipSize: 0,
                delay: 100,
                hideDuration: 500,
                offsetX: 120,
                showAnimation: function (d, c) {
                    this.fadeIn(d, c);
                },
                css: {
                    fontSize: '1.1rem'
                }
            });
        })
    });
</script>
<script>
    function copyTextA(id) {
        var el = document.getElementById('txt' + id);
        el.value = "https://hcsyria.org/projects/micro-projects/?projectA=" + id + "/#aleppo";
        el.style.display = 'block';
        el.select();
        el.focus();
        document.execCommand('copy');
        el.style.display = 'none';
    }

    function copyTextH(id) {
        var el = document.getElementById('txt' + id);
        el.value = "https://hcsyria.org/projects/micro-projects/?projectH=" + id + "/#homs";
        ;
        el.style.display = 'block';
        el.select();
        el.focus();
        document.execCommand('copy');
        el.style.display = 'none';
    }

    function copyTextD(id) {
        var el = document.getElementById('txt' + id);
        el.value = "https://hcsyria.org/projects/micro-projects/?projectD=" + id + "/#damascus";
        ;
        el.style.display = 'block';
        el.select();
        el.focus();
        document.execCommand('copy');
        el.style.display = 'none';
    }
</script>
<script>
    var substringMatcher = function (strs) {
        return function findMatches(q, cb) {
            var matches, substrRegex;
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
    var projects = [];
    var beneficiaries = [];
    @foreach($searchProject as $s)
    projects.push(('{{ $s->MPE_Name }}').replace('&#039;', '\''));
    @endforeach
    @foreach($searchBeneficiary as $s)
    beneficiaries.push(('{{ $s->MPE_BeneficiaryName }}').replace('&#039;', '\''));
    @endforeach

    $('#search-input').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'projects',
            source: substringMatcher(projects),
            templates: {
                header: '<h5 class="league-name">@lang("projects.projectsNames")</h5>'
            }
        },
        {
            name: 'beneficiaries',
            source: substringMatcher(beneficiaries),
            templates: {
                header: '<h5 class="league-name">{{__("projects.beneficiariesNames")}}</h5>'
            }
        }
    ).on('typeahead:select', function () {
        selected_tab = $('tab_input').val();
        $('#submit-form').submit();
    });
</script>
<script>
    let link = window.location.href;
    let firstGetKey = window.location.search.split('=')[0];
    let firstGetValue = window.location.search.split('=')[1];
    if (firstGetKey.includes('search')) {
        firstGetValue = decodeURIComponent(firstGetValue);
        if (firstGetValue.includes('&')) {
            firstGetValue = firstGetValue.substr(0, firstGetValue.indexOf('&'));
        }
        document.getElementById('search-input').value = firstGetValue.replace(/\+/g, ' ').replace('undefined', '');
    }
    if (firstGetKey == '?projectA') {
        setTimeout(() => {
            $('#project-detail-copy').modal('show');
        }, 3000);

    }
    else if (firstGetKey == '?projectH') {
        setTimeout(() => {
            $('#project-H-detail-copy').modal('show');
        }, 3000);

    }
    else if (firstGetKey == '?projectD') {
        setTimeout(() => {
            $('#project-D-detail-copy').modal('show');
        }, 3000);
    }

    if (link.includes('microProjectA') || link.includes('aleppo')) {
        // firstGetValue = decodeURIComponent(firstGetValue);
        var aleppo = document.getElementById('aleppoTab');
        var tab = new bootstrap.Tab(aleppo);
        tab.show();
    }
    else if (link.includes('microProjectH') || link.includes('homs')) {
        var homs = document.getElementById('homsTab');
        var tab = new bootstrap.Tab(homs);
        tab.show();
    }
    else if (link.includes('microProjectD') || link.includes('damascus')) {
        var damascus = document.getElementById('damascusTab');
        var tab = new bootstrap.Tab(damascus);
        tab.show();
    }
    else {
        var aleppo = document.getElementById('aleppoTab');
        var tab = new bootstrap.Tab(aleppo);
        tab.show();
    }
</script>
<script>
    //show tab according to URL hash
    var url = document.location.toString();
    if (url.match('#')) {
        // $('.nav-tabs a[href=#' + url.split('#')[1] + ']').tab('show');
        var city = document.getElementById(url.split('#')[1] + 'Tab');
        var tab = new bootstrap.Tab(city);
        tab.show();
        if ((url.split('#')[1] + 'Tab').toString() === 'aleppoTab') {
            setTimeout(function () {
                initAleppoMap();
                initMarkers();
                L.Util.requestAnimFrame(aleppoMap.invalidateSize, aleppoMap, !1, aleppoMap._container);
            }, 2000);
        }
        else if ((url.split('#')[1] + 'Tab') === 'homsTab') {
            setTimeout(function () {
                initHomsMap();
                initMarkers();
                L.Util.requestAnimFrame(homsMap.invalidateSize, homsMap, !1, homsMap._container);
            }, 2000);
        }
        else {
            setTimeout(function () {
                initDamasMap();
                initMarkers();
                L.Util.requestAnimFrame(damasMap.invalidateSize, damasMap, !1, damasMap._container);
            }, 2000);
        }

    }
    else if (url.match('tab=')) {
        $('.nav-tabs a[href=#' + url.split('tab=')[1] + ']').tab('show');
    }
    $('.nav-tabs a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
        $('tab_input').val(e.target.hash);
    });
</script>
<script>
    @for($i = 0; $i<count($microProjectA); $i++)
    $(".swipe-arrows").onSwipe(function (results) {
        $("#close-{{$i}}").click();
    });
    @endfor
    @for($i = 0; $i<count($microProjectH); $i++)
    $(".swipe-arrows").onSwipe(function (results) {
        $("#close-H-{{$i}}").click();
    });
    @endfor
    @for($i = 0; $i<count($microProjectD); $i++)
    $(".swipe-arrows").onSwipe(function (results) {
        $("#close-D-{{$i}}").click();
    });
    @endfor
    $(".swipe-arrows").onSwipe(function (results) {
        $("#close-copy").click();
    });
    $(".swipe-arrows").onSwipe(function (results) {
        $("#close-H-copy").click();
    });
    $(".swipe-arrows").onSwipe(function (results) {
        $("#close-D-copy").click();
    });
</script>
<script>
    $(document).ready(function () {
        if ('ontouchstart' in document.documentElement) {
            $('.swipe-arrows').css('display', 'block');

            $(".touch-slide").swiperight(function () {
                $(this).carousel('prev');
            });
            $(".touch-slide").swipeleft(function () {
                $(this).carousel('next');
            });
            $(".btn-primary").click(function () {
                $('body').css({overflow: 'hidden'});
            });
        }
    });
</script>
<script>
    $(document).on('touchend', function (e) {
        var el = $(e.target);
        if (el.hasClass('aleppoTab')) {
            var aleppo = document.getElementById('aleppoTab');
            var tab = new bootstrap.Tab(aleppo);
            tab.show();
        }
        if (el.hasClass('aleppoTab')) {
            var homs = document.getElementById('homsTab');
            var tab = new bootstrap.Tab(homs);
            tab.show();
        }
        if (el.hasClass('damasTab')) {
            var damas = document.getElementById('damascusTab');
            var tab = new bootstrap.Tab(damasTab);
            tab.show();
        }
    });
</script>
<script>
    if (/iPhone|iPod/.test(navigator.userAgent) && !window.MSStream) {
        var body = $('body');
        $('.btn-read-more').click(function () {
            body.css('overflow', 'hidden');
            body.css('position', 'fixed');
        });
        $('#close-0').click(function () {
            body.css('overflow', 'auto');
            body.css('position', 'relative');
            document.getElementById("scroll-0").scrollIntoView();
        });
        $('#close-1').click(function () {
            body.css('overflow', 'auto');
            body.css('position', 'relative');
            document.getElementById("scroll-1").scrollIntoView();
        });
        $('#close-2').click(function () {
            body.css('overflow', 'auto');
            body.css('position', 'relative');
            document.getElementById("scroll-2").scrollIntoView();
        });
        $('#close-H-0').click(function () {
            body.css('overflow', 'auto');
            body.css('position', 'relative');
            document.getElementById("scroll-H-0").scrollIntoView();
        });
        $('#close-H-1').click(function () {
            body.css('overflow', 'auto');
            body.css('position', 'relative');
            document.getElementById("scroll-H-1").scrollIntoView();
        });
        $('#close-H-2').click(function () {
            body.css('overflow', 'auto');
            body.css('position', 'relative');
            document.getElementById("scroll-H-2").scrollIntoView();
        });
    }
</script>
{{--<script>--}}
{{--$('#aleppoTab').on('touchstart', function(e) {   e.stopPropagation(); });--}}
{{--$('#homsTab').on('touchstart', function(e) {   e.stopPropagation(); });--}}
{{--$('#damasTab').on('touchstart', function(e) {   e.stopPropagation(); });--}}
{{--</script>--}}
{{--<script>--}}
{{--$(".single-project").click(function () {--}}
{{--$(this).next().modal('show');--}}
{{--});--}}
{{--</script>--}}
<script>
    $(".readmore-btn").click(function () {
        $(this).next().modal('show');
    });
</script>
<script>
    $(".close").on('click', function () {
        $(".close").closest(".modal").modal('hide');
    });
</script>
<script>
    $('.launch-modal').on('click', function (e) {
        e.preventDefault();
        $(this).next().modal('show');
    });
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $('.count_int').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(this.Counter));
            }
        });
    });
</script>
<script>
    function videoFilter(value) {
        var url = window.location.href;
        if (url.includes('donor') || url.includes('search') || url.includes('microProjectA')
            || url.includes('microProjectH') || url.includes('microProjectD')
            || url.includes('homs') || url.includes('aleppo') || url.includes('damascus')) {
            if (value.checked) {
                if (url.includes('true'))
                    var newURL = url.replace('&video=true', '');
                else var newURL = url.replace('&video=false', '');
                window.location.href = newURL + '&video=' + value.checked;
            }
            else {
                if (url.includes('true'))
                    var newURL = url.replace('&video=true', '');
                else var newURL = url.replace('&video=false', '');
                window.location.href = newURL + '&video=' + value.checked;
            }
        }
        else {
            if (value.checked) {
                if (url.includes('true'))
                    var newURL = url.replace('?video=true', '');
                else var newURL = url.replace('?video=false', '');
                window.location.href = newURL + '?video=' + value.checked;
            }
            else {
                if (url.includes('true'))
                    var newURL = url.replace('?video=true', '');
                else var newURL = url.replace('?video=false', '');
                window.location.href = newURL + '?video=' + value.checked;
            }
        }
    }
</script>
<script>
    setTimeout(function () {
        $(document).ready(function () {
            $('input[rel="tooltip"]').tooltip();
        });
    }, 545 * 1.33);
</script>
<script>
    $("#contact-us").click(function () {
        $('html, body').animate({
            scrollTop: $("#footer").offset().top
        }, 1000);
    });
</script>
{{--<script>--}}
{{--let lines = document.querySelectorAll('.horizontal-line');--}}
{{--window.addEventListener('scroll', function () {--}}
{{--lines.forEach(function (line) {--}}
{{--if (isScrolledIntoView(line)) {--}}
{{--line.classList.add('animate');--}}
{{--}--}}
{{--});--}}
{{--});--}}
{{--</script>--}}
{{--@stack('navbar-scripts')--}}
</body>
</html>
