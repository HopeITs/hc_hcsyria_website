<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.public.components.analytics-head')
    <link href="{{asset('css/font-lato.css')}}" rel='stylesheet' type='text/css'>
    <link href='/css/lato.css' rel='stylesheet' type='text/css'>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta name="description" content="">
    <meta name="keywords" content="aleppo syria, hope, center, search, projects,news,initiatives"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hope Center Search</title>

    <link href="{{asset('css/main-new.css')}}" rel="stylesheet">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet">
    <link href="{{asset('css/tabs.css')}}" rel="stylesheet">
    <link href="{{asset('css/newsletter.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/initiatives_new.css')}}" rel="stylesheet" type="text/css">

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    {{--<link href="/resources/css/main.css" rel="stylesheet">--}}
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    {{--<link rel="shortcut icon" href="/fonts/Avenir%20LT%20Std%2045%20Book.otf">--}}
    <link href="{{asset('css/font-lato.css')}}" rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link href='https://fonts.googleapis.com/css?family=Martel' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    {{--<script type="text/javascript" src="/js/fancybox.config.js"></script>--}}
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script src='/js/leaflet.js' crossorigin=''></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <link rel="stylesheet" href="/css/leaflet.css">
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>
    <script type="text/javascript" src="/js/swipe.js"></script>
    <style>
        .news_ticket {
            margin: 3% 17.5% 1% 17.5% !important;
        }

        .highlight {
            background: #BC1818;
            color: white;
        }

        #initiatives .single-card:last-child {
            margin: 3% 17.5% 1% 17.5% !important;
        }
    </style>
<body>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')
<div id="Search" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column"></div>
                    <div class="content">
                        <div class="main_subtitle" data-aos="fade-up"
                             data-aos-duration="1000">Search Results
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative" id="tabList"
        role="tablist">
        @can('view-micro-projects')
            <li class="nav-item" role="presentation">
                <button id="projectsTab" class="projectsTab nav-link active" data-bs-toggle="tab"
                        data-bs-target="#projects"
                        role="tab" aria-controls="projects" aria-selected="true">Projects ({{count($projects_data)}})
                </button>
            </li>
        @endcan
        <li class="nav-item" role="presentation">
            <button id="initiativesTab" class="initiativesTab nav-link @cannot('view-micro-projects') active @endcannot" data-bs-toggle="tab"
                    data-bs-target="#initiatives"
                    role="tab" aria-controls="initiatives" aria-selected="false">Initiatives
                ({{count($initiatives_data)}})
            </button>
        </li>
    </ul>
    <div class="tab-content position-relative" id="myTabContent">
        @can('view-micro-projects')
        <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="projectsTab"
             tabindex="0">
            @if($projects_data->count())
                @for($i = 0; $i<count($projects_data); $i = $i + 1)
                    @for($j = 0; $j<1; $j++)
                        @if($i+$j < count($projects_data))
                            <div class="card-height">
                                <div class="single-card">
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pd-md-0 pe-sm-0">
                                            <div id="project-carousel-A-{{$i+$j}}"
                                                 class="carousel slide w-100 project-carousel"
                                                 data-bs-ride="carousel" data-interval="1000">
                                                <div class="carousel-inner project-carousel">
                                                    <?php $k = 0 ?>
                                                    @foreach($projects_data[$i+$j]->images as $image)
                                                        <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                           class="carousel-item @if($k++ == 0) active @endif"
                                                           data-fancybox="gallery-A-{{$i+$j}}"
                                                           data-caption="{{ucfirst($projects_data[$i+$j]->english->MPE_Name)}}">
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
                                            <div class="row d-flex align-items-center"
                                                 style="margin-top: 1vw">
                                                <div class="col-9">
                                                    <div class="card-title">{!!ucfirst($projects_data[$i+$j]->english->MPE_Name)!!}
                                                        <textarea id="txt{{$projects_data[$i+$j]->id}}"
                                                                  style="display: none;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-3 gap-3 d-flex justify-content-end align-items-baseline">
                                                    <img src="/images/ico/copy-icon.svg"
                                                         onclick="copyText({{$projects_data[$i+$j]->id}},{{$projects_data[$i+$j]->MPE_City}})"
                                                         class="copy-icon">
                                                    </img>
                                                    @if($projects_data[$i+$j]->latitude != '0' && $projects_data[$i+$j]->longtitude)
                                                        <a href="https://www.google.com/maps/search/?api=1&query={{$projects_data[$i+$j]->latitude}},{{$projects_data[$i+$j]->longtitude}}"
                                                           target="_blank">
                                                            <img class="location-icon"
                                                                 src="/images/ico/location-icon.svg">
                                                        </a>
                                                    @endif
                                                    @if($projects_data[$i+$j]->MPE_Video != '0')
                                                        <a href="{{$projects_data[$i+$j]->MPE_Video}}"
                                                           id="microVideoA-{{$projects_data[$i+$j]->id}}"
                                                           data-fancybox="microVideoA-{{$projects_data[$i+$j]->id}}">
                                                            <img class="video-icon"
                                                                 src="/images/ico/video-ini-icon.svg">
                                                        </a>
                                                    @endif
                                                    {{--@if($projects_data[$i+$j]->MPE_Video != '0')--}}
                                                    {{--<a href="#" class="launch-modal"--}}
                                                    {{--data-modal-id="modal-video-{{$i+$j}}">--}}
                                                    {{--<img class="video-icon"--}}
                                                    {{--src="/images/ico/video-ini-icon.svg">--}}
                                                    {{--</a>--}}
                                                    {{--<!--VIDEO MODAL -->--}}
                                                    {{--<div class="modal fade" id="modal-video-{{$i+$j}}"--}}
                                                    {{--tabindex="-1"--}}
                                                    {{--role="dialog"--}}
                                                    {{--aria-labelledby="modal-video-label">--}}
                                                    {{--<div class="modal-dialog" role="document">--}}
                                                    {{--<div class="modal-content">--}}
                                                    {{--<div class="modal-body">--}}
                                                    {{--<div class="modal-video">--}}
                                                    {{--<div class="video ">--}}
                                                    {{--<iframe class="embed-responsive-item"--}}
                                                    {{--src="{{$projects_data[$i+$j]->MPE_Video}}"--}}
                                                    {{--frameborder="0"--}}
                                                    {{--allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
                                                    {{--allowfullscreen--}}
                                                    {{--webkitallowfullscreen--}}
                                                    {{--mozallowfullscreen--}}
                                                    {{--allowfullscreen></iframe>--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--@endif--}}
                                                </div>
                                                <div class="col-12">
                                                    <div class="card-title-section"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                    <ul>
                                                        @if($projects_data[$i+$j]->MPE_PartnerName == '0' && $projects_data[$i+$j]->MPE_PartnerName2 == '0')
                                                            <li class="card-subtitle">
                                                                <Strong>@lang('main.beneficiary')</strong>
                                                                <span>{!! ucfirst($projects_data[$i+$j]->MPE_BeneficiaryName) !!}</span>
                                                            </li>
                                                        @elseif($projects_data[$i+$j]->MPE_PartnerName != '0' && $projects_data[$i+$j]->MPE_PartnerName2 == '0')
                                                            <li class="card-subtitle">
                                                                <Strong>@lang('main.beneficiaries')</strong>
                                                                <span>{!! ucfirst($projects_data[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($projects_data[$i+$j]->MPE_PartnerName) !!}</span>
                                                            </li>
                                                        @elseif($projects_data[$i+$j]->MPE_PartnerName != '0' && $projects_data[$i+$j]->MPE_PartnerName2 != '0')
                                                            <li class="card-subtitle">
                                                                <Strong>@lang('main.beneficiaries')</strong>
                                                                <span>{!! ucfirst($projects_data[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($projects_data[$i+$j]->MPE_PartnerName) .', '.ucfirst($projects_data[$i+$j]->MPE_PartnerName2)!!}</span>
                                                            </li>
                                                        @endif
                                                        @if($projects_data[$i+$j]->MPE_FundedDate !=  NULL)
                                                            <li class="card-subtitle"><Strong
                                                                >@lang('projects.fundDate')</Strong>
                                                                <span> {!! date('m/Y',strtotime($projects_data[$i+$j]->MPE_FundedDate))!!}</span>
                                                            </li>
                                                        @endif
                                                        @if($projects_data[$i+$j]->DOB != '0')
                                                            <li class="card-subtitle"><strong
                                                                >@lang('projects.age')</strong>
                                                                <span> {!! \Carbon\Carbon::createFromDate($projects_data[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y') !!} @lang('projects.years')</span>
                                                            </li>
                                                        @endif
                                                        @if($projects_data[$i+$j]->FamilyMembers != '0')
                                                            <li class="card-subtitle"><strong
                                                                >@lang('projects.family')</strong>
                                                                <span>{!! $projects_data[$i+$j]->FamilyMembers !!}</span>
                                                            </li>
                                                        @endif
                                                        @if($projects_data[$i+$j]->MPE_FundedDate !=  NULL)
                                                            <br>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start">
                                                    @if($projects_data[$i+$j]->MPE_Donor==13 || $projects_data[$i+$j]->MPE_Donor==12)
                                                        <div class="missio-donor-logo">
                                                            <img class="w-100 h-100"
                                                                 src="{{$projects_data[$i+$j]->donor['logo']}}">
                                                        </div>
                                                    @elseif($projects_data[$i+$j]->MPE_Donor== 5)
                                                        <div class="kerk-donor-logo">
                                                            <img class="w-100 h-100"
                                                                 src="{{$projects_data[$i+$j]->donor['logo']}}">
                                                        </div>
                                                    @elseif($projects_data[$i+$j]->MPE_Donor== 3)
                                                        <div class="louvre-donor-logo">
                                                            <img class="w-100 h-100"
                                                                 src="{{$projects_data[$i+$j]->donor['logo']}}">
                                                        </div>
                                                    @elseif($projects_data[$i+$j]->MPE_Donor== 8)
                                                        <div class="hungary-donor-logo">
                                                            <img class="w-100 h-100"
                                                                 src="{{$projects_data[$i+$j]->donor['logo']}}">
                                                        </div>
                                                    @else
                                                        <div class="project-donor-logo">
                                                            <img class="w-100 h-100"
                                                                 src="{{$projects_data[$i+$j]->donor['logo']}}">
                                                        </div>
                                                    @endif

                                                    {{--@if($projects_data[$i+$j]->MPE_Donor=='1')--}}
                                                    {{--<img class="project-donor-logo"--}}
                                                    {{--src="/images/newLogos/Caritas.svg">--}}
                                                    {{--@elseif($projects_data[$i+$j]->MPE_Donor=='2')--}}
                                                    {{--<img class="project-donor-logo"--}}
                                                    {{--src="/images/newLogos/Salt.svg">--}}
                                                    {{--@elseif($projects_data[$i+$j]->MPE_Donor=='3')--}}
                                                    {{--<img class="project-donor-logo"--}}
                                                    {{--src="/images/newLogos/LD.svg">--}}
                                                    {{--@elseif($projects_data[$i+$j]->MPE_Donor=='5')--}}
                                                    {{--<img class="project-donor-logo"--}}
                                                    {{--src="/images/logo/kia.svg">--}}
                                                    {{--@elseif($projects_data[$i+$j]->MPE_Donor=='7')--}}
                                                    {{--<img class="project-donor-logo"--}}
                                                    {{--src="/images/newLogos/If.svg">--}}
                                                    {{--@elseif($projects_data[$i+$j]->MPE_Donor=='8')--}}
                                                    {{--<img class="project-donor-logo"--}}
                                                    {{--src="/images/newLogos/Hungary.svg">--}}
                                                    {{--@elseif($projects_data[$i+$j]->MPE_Donor=='9')--}}
                                                    {{--<img class="project-donor-logo"--}}
                                                    {{--src="/images/newLogos/loeuvre.svg">--}}
                                                    {{--@elseif($projects_data[$i+$j]->MPE_Donor=='10')--}}
                                                    {{--<img class="project-donor-logo"--}}
                                                    {{--src="/images/newLogos/Loeuvre.svg">--}}
                                                    {{--@elseif($projects_data[$i+$j]->MPE_Donor=='11')--}}
                                                    {{--<img class="project-donor-logo"--}}
                                                    {{--src="/images/newLogos/ACN.svg">--}}
                                                    {{--@endif--}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                @if($projects_data[$i+$j]->english->MPE_ExpSkill != '')
                                                    <div class="card-subtitle"><strong
                                                        >@lang('projects.skills')</strong>
                                                        <span>{!! $projects_data[$i+$j]->english->MPE_ExpSkill !!}</span>
                                                    </div>
                                                @endif
                                                <div class="card-content">
                                                    @if(strlen($projects_data[$i+$j]->english->MPE_Suffering)>15)
                                                        <p>{!!implode(' ', array_slice(explode(' ', strip_tags($projects_data[$i+$j]->english->MPE_Suffering)), 0, 15)).'...'!!}</p>
                                                    @else
                                                        <p>{!! $projects_data[$i+$j]->english->MPE_Suffering !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    @if(strlen($projects_data[$i+$j]->english->MPE_Suffering)>15)
                                                        <button class="readmore-btn"
                                                                id="btn-primary-{{$i+$j}}"
                                                                data-toggle="modal"
                                                                data-target="#project-detail-{{$projects_data[$i+$j]->MicroProject_ID}}">@lang('main.readMore')
                                                        </button>
                                                        {{--MODAL--}}
                                                        <div class="modal fade project-detail"
                                                             id="project-detail-{{$projects_data[$i+$j]->MicroProject_ID}}"
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
                                                                                <div class="card-title">{{ucfirst(str_replace(['<span class="highlight">','</span>'],'', $projects_data[$i+$j]->english->MPE_Name))}}
                                                                                    <textarea
                                                                                            id="txt{{$projects_data[$i+$j]->id}}"
                                                                                            style="display: none;"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-3 gap-3 d-flex justify-content-end align-items-baseline">
                                                                                <img src="/images/ico/copy-icon.svg"
                                                                                     onclick="copyText({{$projects_data[$i+$j]->id}},{{$projects_data[$i+$j]->MPE_City}})"
                                                                                     class="copy-icon">
                                                                                @if($projects_data[$i+$j]->latitude != '0' && $projects_data[$i+$j]->longtitude != '0')
                                                                                    <a href="https://www.google.com/maps/search/?api=1&query={{$projects_data[$i+$j]->latitude}},{{$projects_data[$i+$j]->longtitude}}"
                                                                                       target="_blank">
                                                                                        <img class="location-icon"
                                                                                             src="/images/ico/location-icon.svg">
                                                                                    </a>
                                                                                @endif
                                                                                @if($projects_data[$i+$j]->MPE_Video != '0')
                                                                                    <a href="{{$projects_data[$i+$j]->MPE_Video}}"
                                                                                       id="microVideoAA-{{$projects_data[$i+$j]->id}}"
                                                                                       data-fancybox="microVideoAA-{{$projects_data[$i+$j]->id}}">
                                                                                        <img class="video-icon"
                                                                                             src="/images/ico/video-ini-icon.svg">
                                                                                    </a>
                                                                                @endif
                                                                                {{--@if($projects_data[$i+$j]->MPE_Video != '0')--}}
                                                                                {{--<a href="#"--}}
                                                                                {{--class="launch-modal"--}}
                                                                                {{--data-modal-id="modal-video-{{$i+$j}}">--}}
                                                                                {{--<img class="video-icon"--}}
                                                                                {{--src="/images/ico/video-ini-icon.svg">--}}
                                                                                {{--</a>--}}
                                                                                {{--<!--VIDEO MODAL -->--}}
                                                                                {{--<div class="modal fade"--}}
                                                                                {{--id="modal-video-{{$i+$j}}"--}}
                                                                                {{--tabindex="-1"--}}
                                                                                {{--role="dialog"--}}
                                                                                {{--aria-labelledby="modal-video-label">--}}
                                                                                {{--<div class="modal-dialog"--}}
                                                                                {{--role="document">--}}
                                                                                {{--<div class="modal-content">--}}
                                                                                {{--<div class="modal-body">--}}
                                                                                {{--<div class="modal-video">--}}
                                                                                {{--<div class="video ">--}}
                                                                                {{--<iframe class="embed-responsive-item"--}}
                                                                                {{--src="{{$projects_data[$i+$j]->MPE_Video}}"--}}
                                                                                {{--frameborder="0"--}}
                                                                                {{--allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
                                                                                {{--allowfullscreen--}}
                                                                                {{--webkitallowfullscreen--}}
                                                                                {{--mozallowfullscreen--}}
                                                                                {{--allowfullscreen></iframe>--}}
                                                                                {{--</div>--}}
                                                                                {{--</div>--}}
                                                                                {{--</div>--}}
                                                                                {{--</div>--}}
                                                                                {{--</div>--}}
                                                                                {{--</div>--}}
                                                                                {{--@endif--}}
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="card-title-section"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="project-carousel-{{$i+$j}}"
                                                                             class="carousel slide"
                                                                             data-bs-ride="carousel">
                                                                            <div class="carousel-indicators">
                                                                                <?php $k = 0 ?>
                                                                                @foreach($projects_data[$i+$j]->images as $image)
                                                                                    <button type="button"
                                                                                            data-bs-target="#project-carousel-{{$i+$j}}"
                                                                                            data-bs-slide-to="{{$k++}}"
                                                                                            @if($k == 1)class="active" @endif>
                                                                                    </button>
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="carousel-inner">
                                                                                <?php $k = 0 ?>
                                                                                @foreach($projects_data[$i+$j]->images as $image)
                                                                                    <div class="carousel-item @if($k++ == 0) active @endif">
                                                                                        <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                           data-fancybox="gallery-{{$i+$j}}"
                                                                                           data-caption="{{ucfirst($projects_data[$i+$j]->english->MPE_Name)}}">
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
                                                                                    <ul>
                                                                                        @if($projects_data[$i+$j]->MPE_PartnerName == '0' && $projects_data[$i+$j]->MPE_PartnerName2 == '0')
                                                                                            <li class="card-subtitle">
                                                                                                <Strong>@lang('main.beneficiary')</strong>
                                                                                                <span>{!! ucfirst($projects_data[$i+$j]->MPE_BeneficiaryName) !!}</span>
                                                                                            </li>
                                                                                        @elseif($projects_data[$i+$j]->MPE_PartnerName != '0' && $projects_data[$i+$j]->MPE_PartnerName2 == '0')
                                                                                            <li class="card-subtitle">
                                                                                                <Strong>@lang('main.beneficiaries')</strong>
                                                                                                <span>{!! ucfirst($projects_data[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($projects_data[$i+$j]->MPE_PartnerName) !!}</span>
                                                                                            </li>
                                                                                        @elseif($projects_data[$i+$j]->MPE_PartnerName != '0' && $projects_data[$i+$j]->MPE_PartnerName2 != '0')
                                                                                            <li class="card-subtitle">
                                                                                                <Strong>@lang('main.beneficiaries')</strong>
                                                                                                <span>{!! ucfirst($projects_data[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($projects_data[$i+$j]->MPE_PartnerName) .', '.ucfirst($projects_data[$i+$j]->MPE_PartnerName2) !!}</span>
                                                                                            </li>
                                                                                        @endif
                                                                                        @if($projects_data[$i+$j]->MPE_FundedDate !=  NULL)
                                                                                            <li class="card-subtitle">
                                                                                                <Strong
                                                                                                >@lang('projects.fundDate')</Strong>
                                                                                                <span> {!! date('m/Y',strtotime($projects_data[$i+$j]->MPE_FundedDate)) !!}</span>
                                                                                            </li>
                                                                                        @endif
                                                                                        @if($projects_data[$i+$j]->DOB != '0')
                                                                                            <li class="card-subtitle">
                                                                                                <strong
                                                                                                >@lang('projects.age')</strong>
                                                                                                <span> {!! \Carbon\Carbon::createFromDate($projects_data[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y') !!} @lang('projects.years')</span>
                                                                                            </li>
                                                                                        @endif
                                                                                        @if($projects_data[$i+$j]->FamilyMembers != '0')
                                                                                            <li class="card-subtitle">
                                                                                                <strong
                                                                                                >@lang('projects.family')</strong>
                                                                                                <span>{!! $projects_data[$i+$j]->FamilyMembers !!}</span>
                                                                                            </li>
                                                                                        @endif
                                                                                        @if($projects_data[$i+$j]->MPE_FundedDate !=  NULL)
                                                                                            <br>
                                                                                        @endif
                                                                                        @if($projects_data[$i+$j]->english->MPE_ExpSkill != '')
                                                                                            <div><strong
                                                                                                        class="card-subtitle">@lang('projects.skills')</strong>
                                                                                                <span>{!! $projects_data[$i+$j]->english->MPE_ExpSkill !!}</span>
                                                                                            </div>
                                                                                        @endif
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex justify-content-end align-items-start"
                                                                                >
                                                                                    @if($projects_data[$i+$j]->MPE_Donor==13 || $projects_data[$i+$j]->MPE_Donor==12)
                                                                                        <div class="missio-donor-logo">
                                                                                            <img class="w-100 h-100"
                                                                                                 src="{{$projects_data[$i+$j]->donor['logo']}}">
                                                                                        </div>
                                                                                    @elseif($projects_data[$i+$j]->MPE_Donor== 5)
                                                                                        <div class="kerk-donor-logo">
                                                                                            <img class="w-100 h-100"
                                                                                                 src="{{$projects_data[$i+$j]->donor['logo']}}">
                                                                                        </div>
                                                                                    @elseif($projects_data[$i+$j]->MPE_Donor== 3)
                                                                                        <div class="louvre-donor-logo">
                                                                                            <img class="w-100 h-100"
                                                                                                 src="{{$projects_data[$i+$j]->donor['logo']}}">
                                                                                        </div>
                                                                                    @elseif($projects_data[$i+$j]->MPE_Donor== 8)
                                                                                        <div class="hungary-donor-logo">
                                                                                            <img class="w-100 h-100"
                                                                                                 src="{{$projects_data[$i+$j]->donor['logo']}}">
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="project-donor-logo">
                                                                                            <img class="w-100 h-100"
                                                                                                 src="{{$projects_data[$i+$j]->donor['logo']}}">
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-content">
                                                                                <p class="p-justify">{!!$projects_data[$i+$j]->english->MPE_Suffering!!}</p>
                                                                            </div>
                                                                            <br>
                                                                            <textarea
                                                                                    id="txt{{$projects_data[$i+$j]->id}}"
                                                                                    style="display: none;">
                                                                                    </textarea>
                                                                            {{--@if($projects_data[$i+$j]->MPE_Video != '0')--}}
                                                                            {{--<div class="video">--}}
                                                                            {{--<iframe--}}
                                                                            {{--src="{{$projects_data[$i+$j]->MPE_Video}}"--}}
                                                                            {{--frameborder="0"--}}
                                                                            {{--allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
                                                                            {{--allowfullscreen>--}}
                                                                            {{--</iframe>--}}
                                                                            {{--</div>--}}
                                                                            {{--<hr style="border-color: #43484E;">--}}
                                                                            {{--@endif--}}
                                                                            {{--<div id="fb-root"></div>--}}
                                                                            {{--<div class="fb-comments"--}}
                                                                                 {{--data-href="https://hcsyria.org/micro-projects#project{{$projects_data[$i+$j]->MicroProject_ID}}"--}}
                                                                                 {{--data-width="100%"--}}
                                                                                 {{--data-numposts="3">--}}
                                                                            {{--</div>--}}

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
                                                        <p>{!! $projects_data[$i+$j]->english->MPE_Suffering !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                @endfor
            @endif
            @if(count($projects_data)==0)
                <div class="card-height">
                    <div class="single-card">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
                                <div class="text-center">
                                    Sorry, we couldn't find any results
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="small horizontal-line"></div>
            @include('new.public.footer')
        </div>
        @endcan
        <div class="tab-pane fade show @cannot('view-micro-projects') active @endcannot" id="initiatives" role="tabpanel" aria-labelledby="initiativesTab"
             tabindex="1">
            @if($initiatives_data->count())
                @foreach($initiatives_data as $i=>$initiative)
                    <div class="card-height">
                        <div class="single-card">
                            <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                    <div style="padding-right: .6vw">
                                        <div class="row d-flex align-items-center"
                                             style="margin-top: 1vw">
                                            <div class="col-10">
                                                <div class="card-title">{!! $initiative->english->title !!}</div>
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
                                            @if($initiative->english->date_string !== '0')
                                                <div>
                                                    <strong>{!! $initiative->english->date_string !!}</strong>
                                                </div>
                                            @endif
                                            @if($initiative->english->organization !== '0')
                                                <strong> @lang('initiatives.by') {!! $initiative->english->organization !!}</strong>
                                            @endif
                                            @if($initiative->english->date_string !== '0' || $initiative->english->organization !== '0')
                                                <div><br></div>
                                            @endif
                                            @if(strlen($initiative->english->description)>50)
                                                {!!implode(' ', array_slice(explode(' ', strip_tags($initiative->english->description)), 0, 50)).'...'!!}
                                            @else
                                                <div>{!! $initiative->english->description !!}</div>
                                            @endif

                                        </div>
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                {{--@if(isset($initiative->subWhatCategory))--}}
                                                {{--<a href="{{ route('new.public.initiative', [--}}
                                                {{--Str::slug(strtolower($initiative->subWhatCategory->name)),--}}
                                                {{--$initiative->id,--}}
                                                {{--Str::slug(strtolower(str_replace(['<span class="highlight">','span'], '', $initiative->english->title)))--}}
                                                {{--]) }}"--}}
                                                {{--class="readmore-btn">@lang('main.readMore')--}}
                                                {{--</a>--}}
                                                {{--@else--}}
                                                <a href="{{ route('new.public.initiative',
                                [Str::slug(strtolower($initiative->whatCategory->name)),
                                $initiative->id,
                                Str::slug(strtolower(str_replace(['<span class="highlight">','span'],'', $initiative->english->title)))]   ) }}"
                                                   class="readmore-btn">@lang('main.readMore')</a>
                                                {{--@endif--}}
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
                                                    <a href="{{substr($image['path'], 0, -4).'b.jpg'}}"
                                                       data-fancybox="gallery-ini-{{$initiative->id}}"
                                                       data-caption="{{ ucfirst($initiative->english->title) }}">
                                                        <img class="w-100 h-100 d-block"
                                                             src="{{$image['path']}}"
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
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if(count($initiatives_data)==0)
                <div class="card-height">
                    <div class="single-card">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end flex-column pe-1 sorry-message">
                                <div class="text-center">
                                    Sorry, we couldn't find any results
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="small horizontal-line"></div>
            @include('new.public.footer')
        </div>
    </div>
</div>

@stack('navbar-contactUs')
@stack('navbar-whatwedo')
<script>
    AOS.init({
        duration: 1200,
    })
</script>
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
<script>
    function copyText(id, place_id) {
        if (place_id == 3) {
            let el = document.getElementById('txt' + id);
            el.value = "https://hcsyria.org/projects/micro-projects?tab=aleppo&projectA=" + id;
            el.style.display = 'block';
            el.select();
            el.focus();
            document.execCommand('copy');
            el.style.display = 'none';
        }
        else if (place_id == 1) {
            let el = document.getElementById('txt' + id);
            el.value = "https://hcsyria.org/projects/micro-projects?tab=homs&projectH=" + id;
            el.style.display = 'block';
            el.select();
            el.focus();
            document.execCommand('copy');
            el.style.display = 'none';
        }
        else if (place_id == 2) {
            let el = document.getElementById('txt' + id);
            el.value = "https://hcsyria.org/projects/micro-projects?tab=damascus&projectD=" + id;
            el.style.display = 'block';
            el.select();
            el.focus();
            document.execCommand('copy');
            el.style.display = 'none';
        }
    }
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
@stack('preloader')
</body>
</html>
