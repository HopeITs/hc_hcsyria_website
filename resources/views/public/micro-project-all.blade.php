<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168141177-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-168141177-1');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M9HLZ6M');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:url" content="https://hcsyria.org/micro-projects"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Hope Center"/>
    <meta property="og:image" content="https://hcsyria.org/images/logos/hc.svg"/>
    <meta name="description" content="Our primary interest is aiding Christians through financing their
                                        own micro-projects that would provide them with income to preserve their dignity
                                        and alleviate the calamities of the crisis.
                                        Besides aiding Christians in need, this initiative aims for reviving the city of
                                        Aleppo that has lost most of its economic structure.">
    <meta name="keywords" content="hope center micro projects"/>
    <title>@lang('projects.projects')</title>
    <link rel="canonical" href="https://hcsyria.org/micro-projects">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/projects.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/micro-projects" />
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HLZ6M"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

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
@include('public.navbar')

<section id="Micro" class="page-start">
    {{--<div class="navigate">--}}
        {{--<div class="container">--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="/">@lang('navbar.home')</a></li>--}}
                {{--<li><a href="{{route('public.main_projects')}}">@lang('what_we_do.title')</a></li>--}}
                {{--<li><a href="{{route('public.initiatives.type', 'development')}}">@lang('what_we_do.development')</a></li>--}}
                {{--<li><a href="{{route('public.micro_project')}}">@lang('main.micro')</a></li>--}}
                {{--<li class="active">@lang('projects.all')</li>--}}
            {{--</ol>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="container">
        <div class="row text-center clearfix">
            <div class="col-sm-8 col-sm-offset-2">
                {{--<img src="/images/logos/micro.svg" style="width: 200px;">--}}
                <p class="projects-heading" style="font-size: 16px;margin-top: 30px">@lang('micro-project.text')</p>
                <div class="row text-center">
                    <div class="search-container">
                        <form method="get" id="submit-form" action="{{route('public.micro_project.all','s')}}">
                            <div class="se">
                                <input id="search-input" type="text" placeholder="@lang('projects.search')" name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li><a href="#funded" data-toggle="tab">@lang('micro-project.funded')</a></li>
            <li><a href="#not-funded" data-toggle="tab" style="font-weight: bold;">@lang('micro-project.awaitingForFund')</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade" id="funded">
                <div class="media">
                    <div class="media-body">
                        @if(count($microProjectF)==0)
                            <h3 class="text-center" style="margin-top: 50px">@lang('projects.sorryMessage1')</h3>
                            <br>
                            <ul>
                                <li><h5>@lang('projects.sorryMessage2')</h5></li>
                            </ul>
                        @else
                            <div class="text-center" id="donor-filter">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuDonor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        @lang('projects.donor') -
                                        @if($donor == 'caritas')
                                            @lang('projects.caritasPoland')
                                        @elseif($donor == 'salt')
                                            SALT
                                        @elseif($donor == 'louver')
                                            L'Œuvre d'Orient
                                        @elseif($donor == 'kerk')
                                            Kerk In Actie
                                        @else
                                            @lang('projects.all')
                                        @endif
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuDonor">
                                        @if(!empty($search))
                                            <li><a href="{{route('public.micro_project.all',['search' => $search, 'donor'=>'all'])}}">@lang('projects.all')</a></li>
                                            <li><a href="{{route('public.micro_project.all',['search' => $search, 'donor'=>'caritas'])}}">@lang('projects.caritasPoland')</a></li>
                                            <li><a href="{{route('public.micro_project.all',['search' => $search, 'donor'=>'salt'])}}">SALT</a></li>
                                            <li><a href="{{route('public.micro_project.all',['search' => $search, 'donor'=>'louver'])}}">L'Œuvre d'Orient</a></li>
                                            <li><a href="{{route('public.micro_project.all',['search' => $search, 'donor'=>'kerk'])}}">Kerk In Actie</a></li>
                                        @else
                                            <li><a href="{{route('public.micro_project.all',['donor'=>'all'])}}">@lang('projects.all')</a></li>
                                            <li><a href="{{route('public.micro_project.all',['donor'=>'caritas'])}}">@lang('projects.caritasPoland')</a></li>
                                            <li><a href="{{route('public.micro_project.all',['donor'=>'salt'])}}">SALT</a></li>
                                            <li><a href="{{route('public.micro_project.all',['donor'=>'louver'])}}">L'Œuvre d'Orient</a></li>
                                            <li><a href="{{route('public.micro_project.all',['donor'=>'kerk'])}}">Kerk In Actie</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @for($i = 0; $i<count($microProjectF); $i = $i + 3)
                            <div class="row projects-height">
                                @for($j = 0; $j<3; $j++)
                                    @if($i+$j < count($microProjectF))
                                        <div class="col-sm-4">
                                            <div class="single-project" id="scroll-{{$i+$j}}" style="margin-bottom: 30px">
                                                <img src="{{$microProjectF[$i+$j]->images[0]->MPI_Path}}" alt=""/>
                                                @if($microProjectF[$i+$j]->MPE_Video != '0')
                                                    <a class="video-ico"><i class="fa fa-video-camera"></i></a>
                                                @endif
                                                <h2>{{ucfirst($microProjectF[$i+$j]->lang->MPE_Name)}}</h2>
                                                <ul class="post-meta">
                                                    <li>
                                                        <i class="fa fa-pencil-square-o"></i>
                                                        @if($microProjectF[$i+$j]->MPE_PartnerName == '0')
                                                            <strong> @lang('main.beneficiary')</strong> {{ucfirst($microProjectF[$i+$j]->MPE_BeneficiaryName)}}
                                                        @elseif($microProjectF[$i+$j]->MPE_PartnerName2 == '0')
                                                            <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectF[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectF[$i+$j]->MPE_PartnerName)}}
                                                        @else
                                                            <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectF[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectF[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectF[$i+$j]->MPE_PartnerName2)}}
                                                        @endif
                                                    </li>
                                                    <li><i class="fa fa-clock-o"></i><strong> @lang('main.appliedOn')</strong> {{date('d/m/Y',strtotime($microProjectF[$i+$j]->MPE_DateOfRequest))}}
                                                    </li>
                                                </ul>
                                                <div class="project-content">
                                                    <p class="p-justify">{!!implode(' ', array_slice(explode(' ', $microProjectF[$i+$j]->lang->MPE_Suffering), 0, 20)).'...'!!}</p>
                                                </div>
                                                <a href="" class="btn btn-primary" id="btn-primary-{{$i+$j}}"
                                                   data-toggle="modal"
                                                   data-target="#project-detail-{{$microProjectF[$i+$j]->MicroProject_ID}}">@lang('main.readMore')</a>
                                            </div>
                                            <div class="modal fade project-detail" id="project-detail-{{$microProjectF[$i+$j]->MicroProject_ID}}"
                                                 tabindex="-1"
                                                 role="dialog"
                                                 aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <button type="button" class="close" id="close-{{$i+$j}}"
                                                                    data-dismiss="modal" aria-hidden="true">
                                                                &times;
                                                            </button>
                                                            <div id="project-carousel-{{$i+$j}}"
                                                                 class="carousel slide touch-slide"
                                                                 data-ride="carousel">
                                                                <ol class="carousel-indicators">
                                                                    <?php $k = 0 ?>
                                                                    @foreach($microProjectF[$i+$j]->images as $image)
                                                                        <li data-target="#project-carousel-{{$i+$j}}"
                                                                            data-slide-to="{{$k++}}"
                                                                            @if($k == 1)class="active" @endif></li>
                                                                    @endforeach
                                                                </ol>
                                                                <div class="carousel-inner">
                                                                    <?php $k = 0 ?>
                                                                    @foreach($microProjectF[$i+$j]->images as $image)
                                                                        <div class="item @if($k++ == 0) active @endif">
                                                                            {{--<p id="p-date">{{date('d/m/Y',strtotime(exif_read_data(ltrim($image->MPI_Path, '/'))['DateTimeOriginal']))}}</p>--}}
                                                                            <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                               data-fancybox="gallery-{{$i+$j}}"
                                                                               data-caption="{{ucfirst($microProjectF[$i+$j]->lang->MPE_Name)}}"
                                                                            >
                                                                                <img src="{{$image->MPI_Path}}"></a>
                                                                        </div>
                                                                    @endforeach
                                                                </div><!--/.carousel-inner-->
                                                                <a class="left carousel-control"
                                                                   href="#project-carousel-{{$i+$j}}"
                                                                   data-slide="prev">
                                                                    <span
                                                                        class="glyphicon glyphicon-chevron-left"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="right carousel-control"
                                                                   href="#project-carousel-{{$i+$j}}"
                                                                   data-slide="next">
                                                                    <span
                                                                        class="glyphicon glyphicon-chevron-right"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </div>
                                                            <div id="modal-swipe-{{$i+$j}}">
                                                                <h2>{{ucfirst($microProjectF[$i+$j]->lang->MPE_Name)}}</h2>
                                                                <br>
                                                                @if($microProjectF[$i+$j]->MPE_Donor=='0')
                                                                    <img class="donor-logo-caritas" src="/images/logos/caritas.svg">
                                                                @elseif($microProjectF[$i+$j]->MPE_Donor=='1')
                                                                    <img class="donor-logo-salt" src="/images/logos/salt.svg">
                                                                @elseif($microProjectF[$i+$j]->MPE_Donor=='2')
                                                                    <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                @elseif($microProjectF[$i+$j]->MPE_Donor=='3')
                                                                    <img class="donor-logo-kia" src="/images/logos/kia.svg">
                                                                @endif
                                                                @if($microProjectF[$i+$j]->MPE_PartnerName == '0')
                                                                    <p>
                                                                        <strong> @lang('main.beneficiary')</strong> {{ucfirst($microProjectF[$i+$j]->MPE_BeneficiaryName)}}
                                                                    </p>
                                                                @elseif($microProjectF[$i+$j]->MPE_PartnerName2 == '0')
                                                                    <p>
                                                                        <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectF[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectF[$i+$j]->MPE_PartnerName)}}
                                                                    </p>
                                                                @else
                                                                    <p>
                                                                        <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectF[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectF[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectF[$i+$j]->MPE_PartnerName2)}}
                                                                    </p>
                                                                @endif
                                                                <p>
                                                                    <strong>@lang('main.projectCity')</strong> {{$microProjectF[$i+$j]->lang->MPE_City}}
                                                                </p>
                                                                @if($microProjectF[$i+$j]->MPE_Donor=='0')
                                                                    <p>
                                                                        <strong>@lang('main.status')</strong> @lang('main.fundedCaritas')
                                                                    </p>
                                                                @elseif($microProjectF[$i+$j]->MPE_Donor=='1')
                                                                    <p>
                                                                        <strong>@lang('main.status')</strong> @lang('main.fundedSALT')
                                                                    </p>
                                                                @elseif($microProjectF[$i+$j]->MPE_Donor=='2')
                                                                    <p>
                                                                        <strong>@lang('main.status')</strong> @lang('main.fundedLoeuvre')
                                                                    </p>
                                                                @elseif($microProjectF[$i+$j]->MPE_Donor=='3')
                                                                    <p>
                                                                        <strong>@lang('main.status')</strong> @lang('main.fundedKerkInAct')
                                                                    </p>
                                                                @endif
                                                                <br>
                                                                <div class="clearfix"><p
                                                                        class="p-justify">{!!$microProjectF[$i+$j]->lang->MPE_Suffering!!}</p>
                                                                </div>
                                                                <br>
                                                                <a class="cpy-link" onclick="copyTextF({{$microProjectF[$i+$j]->MicroProject_ID}})">@lang('main.cpyLink')</a>
                                                                <textarea id="txt{{$microProjectF[$i+$j]->MicroProject_ID}}" style="display: none;"></textarea>
                                                                @if($microProjectF[$i+$j]->MPE_Location != '0')
                                                                    <img src="/images/projects/tracker.png"
                                                                         id="tracker-img">
                                                                    <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectF[$i+$j]->MPE_Location}}"
                                                                       id="info-link"
                                                                       target="_blank"> @lang('main.seeOnMap')</a>
                                                                @endif
                                                                <br>
                                                                <br>
                                                                @if($microProjectF[$i+$j]->MPE_Video != '0')
                                                                    <div class="video">
                                                                        <iframe
                                                                            src="{{$microProjectF[$i+$j]->MPE_Video}}"
                                                                            frameborder="0"
                                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                            allowfullscreen></iframe>
                                                                    </div>
                                                                    <hr style="border-color: #43484E;">
                                                                @endif
                                                                <div id="fb-root"></div>
                                                                <div class="fb-comments"
                                                                     data-href="https://hcsyria.org/micro-projects#project{{$microProjectF[$i+$j]->MicroProject_ID}}"
                                                                     data-width="100%" data-numposts="3"></div>
                                                                <br>
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
                                        </div>
                                    @endif
                                @endfor
                                @if($projectCopy !== 'none')
                                    <div class="modal fade project-detail" id="project-detail-copy"
                                         tabindex="-1"
                                         role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" id="close-copy"
                                                            data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                    <div id="project-carousel-copy"
                                                         class="carousel slide touch-slide"
                                                         data-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <?php $k = 0 ?>
                                                            @foreach($projectCopy->images as $image)
                                                                <li data-target="#project-carousel-copy"
                                                                    data-slide-to="{{$k++}}"
                                                                    @if($k == 1)class="active" @endif></li>
                                                            @endforeach
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <?php $k = 0 ?>
                                                            @foreach($projectCopy->images as $image)
                                                                <div class="item @if($k++ == 0) active @endif">
                                                                    <p id="p-date">{{date('d/m/Y',strtotime(exif_read_data(ltrim($image->MPI_Path, '/'))['DateTimeOriginal']))}}</p>
                                                                    <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                       data-fancybox="gallery-copy"
                                                                       data-caption="{{ucfirst($projectCopy->lang->MPE_Name)}}"><img
                                                                            src="{{$image->MPI_Path}}"></a>
                                                                </div>
                                                            @endforeach
                                                        </div><!--/.carousel-inner-->
                                                        <a class="left carousel-control"
                                                           href="#project-carousel-copy"
                                                           data-slide="prev">
                                                                <span
                                                                    class="glyphicon glyphicon-chevron-left"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control"
                                                           href="#project-carousel-copy"
                                                           data-slide="next">
                                                                <span
                                                                    class="glyphicon glyphicon-chevron-right"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                    <div id="modal-swipe-copy">
                                                        <h2>{{ucfirst($projectCopy->lang->MPE_Name)}}</h2>
                                                        <br>
                                                        @if($projectCopy->MPE_Donor=='0')
                                                            <img class="donor-logo-caritas" src="/images/logos/caritas.svg">
                                                        @elseif($projectCopy->MPE_Donor=='1')
                                                            <img class="donor-logo-salt" src="/images/logos/salt.svg">
                                                        @elseif($projectCopy->MPE_Donor=='2')
                                                            <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                        @elseif($projectCopy->MPE_Donor=='3')
                                                            <img class="donor-logo-kia" src="/images/logos/kia.svg">
                                                        @endif
                                                        @if($projectCopy->MPE_PartnerName == '0')
                                                            <p>
                                                                <strong> @lang('main.beneficiary')</strong> {{ucfirst($projectCopy->MPE_BeneficiaryName)}}
                                                            </p>
                                                        @elseif($projectCopy->MPE_PartnerName2 == '0')
                                                            <p>
                                                                <strong> @lang('main.beneficiaries')</strong> {{ucfirst($projectCopy->MPE_BeneficiaryName) .', '. ucfirst($projectCopy->MPE_PartnerName)}}
                                                            </p>
                                                        @else
                                                            <p>
                                                                <strong> @lang('main.beneficiaries')</strong> {{ucfirst($projectCopy->MPE_BeneficiaryName) .', '. ucfirst($projectCopy->MPE_PartnerName) .', '.ucfirst($projectCopy->MPE_PartnerName2)}}
                                                            </p>
                                                        @endif
                                                        <p>
                                                            <strong>@lang('main.projectCity')</strong> {{$projectCopy->lang->MPE_City}}
                                                        </p>
                                                        @if($projectCopy->MPE_Donor=='0')
                                                            <p>
                                                                <strong>@lang('main.status')</strong> @lang('main.fundedCaritas')
                                                            </p>
                                                        @elseif($projectCopy->MPE_Donor=='1')
                                                            <p>
                                                                <strong>@lang('main.status')</strong> @lang('main.fundedSALT')
                                                            </p>
                                                        @elseif($projectCopy->MPE_Donor=='2')
                                                            <p>
                                                                <strong>@lang('main.status')</strong> @lang('main.fundedLoeuvre')
                                                            </p>
                                                        @elseif($projectCopy->MPE_Donor=='3')
                                                            <p>
                                                                <strong>@lang('main.status')</strong> @lang('main.fundedKerkInAct')
                                                            </p>
                                                        @endif
                                                        <br>
                                                        <div class="clearfix"><p
                                                                class="p-justify">{!!$projectCopy->lang->MPE_Suffering!!}</p>
                                                        </div>
                                                        <br>
                                                        <a class="cpy-link" onclick="copyTextF({{$projectCopy->MicroProject_ID}})">@lang('main.cpyLink')</a>
                                                        <textarea id="txt{{$projectCopy->MicroProject_ID}}" style="display: none;"></textarea>
                                                        @if($projectCopy->MPE_Location != '0')
                                                            <img src="/images/projects/tracker.png"
                                                                 id="tracker-img">
                                                            <a href="https://www.google.com/maps/search/?api=1&query={{$projectCopy->MPE_Location}}"
                                                               id="info-link"
                                                               target="_blank"> @lang('main.seeOnMap')</a>
                                                        @endif
                                                        <br>
                                                        <br>
                                                        @if($projectCopy->MPE_Video != '0')
                                                            <div class="video">
                                                                <iframe
                                                                    src="{{$projectCopy->MPE_Video}}"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                            <hr style="border-color: #43484E;">
                                                        @endif
                                                        <div id="fb-root"></div>
                                                        <div class="fb-comments"
                                                             data-href="https://hcsyria.org/micro-projects#project{{$projectCopy->MicroProject_ID}}"
                                                             data-width="100%" data-numposts="3"></div>
                                                        <br>
                                                        <div class="text-center swipe-arrows">
                                                            <i class="fa fa-angle-double-up"></i>
                                                            <p>@lang('main.swipeUp')</p>
                                                        </div>
                                                        <div class="swipe-to-close"
                                                             id="swipe-to-close-copy"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endfor
                        <div class="text-center">
                            {{$microProjectF->appends(['search' => $search, 'microProjectNF' => $microProjectNF->currentPage(), 'donor' => $donor])->links()}}
                        </div>
                        <iframe id="projects-map"
                                frameborder="0" style="border:0"
                                src="https://www.google.com/maps/d/embed?mid=1XDG-J7PRspsDf8saLVR6-hfqD-QgjD2x"
                                height="600px"></iframe>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="not-funded">
                <div class="media">
                    <div class="media-body">
                        @if(count($microProjectNF)==0)
                            <h3 class="text-center" style="margin-top: 50px">@lang('projects.sorryMessage1')</h3>
                            <br>
                            <ul>
                                <li><h5>@lang('projects.sorryMessage2')</h5></li>
                            </ul>
                        @endif
                        @for($i = 0; $i<count($microProjectNF); $i = $i + 3)
                            <div class="row projects-height">
                                @for($j = 0; $j<3; $j++)
                                    @if($i+$j < count($microProjectNF))
                                        <div class="col-sm-4">
                                    <div class="single-project" id="scroll-NF-{{$i+$j}}" style="margin-bottom: 30px">
                                        <img src="{{$microProjectNF[$i+$j]->images[0]->MPI_Path}}" alt=""/>
                                        <h2>{{ucfirst($microProjectNF[$i+$j]->lang->MPE_Name)}}</h2>
                                        <ul class="post-meta">
                                            <li>
                                                <i class="fa fa-pencil-square-o"></i>
                                                @if($microProjectNF[$i+$j]->MPE_PartnerName == '0')
                                                    <strong>@lang('main.beneficiary')</strong> {{ucfirst($microProjectNF[$i+$j]->MPE_BeneficiaryName)}}
                                                @elseif($microProjectNF[$i+$j]->MPE_PartnerName2 == '0')
                                                    <strong>@lang('main.beneficiaries')</strong> {{ucfirst($microProjectNF[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectNF[$i+$j]->MPE_PartnerName)}}
                                                @else
                                                    <strong>@lang('main.beneficiaries')</strong> {{ucfirst($microProjectNF[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectNF[$i+$j]->MPE_PartnerName) .', '. ucfirst($microProjectNF[$i+$j]->MPE_PartnerName2)}}
                                                @endif
                                            </li>
                                            <li><i class="fa fa-clock-o"></i><strong> @lang('main.appliedOn')</strong> {{date('d/m/Y',strtotime($microProjectNF[$i+$j]->MPE_DateOfRequest))}}
                                            </li>
                                        </ul>
                                        <div class="project-content">
                                            <p class="p-justify">{!!implode(' ', array_slice(explode(' ', $microProjectNF[$i+$j]->lang->MPE_Suffering), 0, 20)).'...'!!}</p>
                                        </div>
                                        {{--<div class="text-right div-btn-NF">--}}
                                            {{--<a href="" class="btn-primary-NF" id="btn-primary-NF-{{$i+$j}}"--}}
                                               {{--data-toggle="modal"--}}
                                               {{--data-target="#project-detail-NF-{{$microProjectNF[$i+$j]->MicroProject_ID}}">@lang('main.readMore') >></a>--}}
                                        {{--</div>--}}
                                        <br>
                                        <a href="" class="btn btn-primary" id="btn-primary-NF-{{$i+$j}}"
                                           data-toggle="modal"
                                           data-target="#project-detail-{{$microProjectNF[$i+$j]->MicroProject_ID}}">@lang('main.readMore')</a>
                                        {{--<div class="div-donate">--}}
                                            {{--<span><strong>{{$microProjectNF[$i+$j]->MPE_MoneyDonated}}--}}
                                                    {{--(USD) @lang('main.microRaisedOf') {{$microProjectNF[$i+$j]->MPE_AllMoneyNeeded}}--}}
                                                    {{--(USD)</strong></span>--}}
                                            {{--<div class="progress">--}}
                                                {{--<div class="progress-bar" role="progressbar"--}}
                                                     {{--aria-valuemin="0" aria-valuemax="100"--}}
                                                     {{--style="width:{{1+(($microProjectNF[$i+$j]->MPE_MoneyDonated*100)/$microProjectNF[$i+$j]->MPE_AllMoneyNeeded)}}%">--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--@if($microProjectNF[$i+$j]->MPE_AllMoneyNeeded > $microProjectNF[$i+$j]->MPE_MoneyDonated)--}}
                                                {{--<a href="{{route('donate_project_rt', $microProjectNF[$i+$j]->MicroProject_ID)}}"--}}
                                                   {{--target="_blank" class="btn project-donate">@lang('main.microDonate')</a>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="modal fade project-detail" id="project-detail-NF-{{$microProjectNF[$i+$j]->MicroProject_ID}}" tabindex="-1"
                                         role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" id="close-NF-{{$i+$j}}"
                                                            data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                    @if($microProjectNF[$i+$j]->MPE_PartnerName == '0')
                                                        <a href="{{substr($microProjectNF[$i+$j]->images[0]->MPI_Path, 0, -4).'b.jpg'}}"
                                                           data-fancybox="gallery-FN-{{$i+$j}}"
                                                           data-caption="{{ucfirst($microProjectNF[$i+$j]->lang->MPE_Name)}}"><img
                                                                src="{{$microProjectNF[$i+$j]->images[0]->MPI_Path}}"></a>
                                                    @else
                                                        <div id="project-carousel-NF-{{$i+$j}}"
                                                             class="carousel slide touch-slide"
                                                             data-ride="carousel">
                                                            <ol class="carousel-indicators">
                                                                <?php $k = 0 ?>
                                                                @foreach($microProjectNF[$i+$j]->images as $image)
                                                                    <li data-target="#project-carousel-NF-{{$i+$j}}"
                                                                        data-slide-to="{{$k++}}"
                                                                        @if($k == 1)class="active" @endif></li>
                                                                @endforeach
                                                            </ol>
                                                            <div class="carousel-inner">
                                                                <?php $k = 0 ?>
                                                                @foreach($microProjectNF[$i+$j]->images as $image)
                                                                    <div class="item @if($k++ == 0) active @endif">
                                                                        <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                           data-fancybox="gallery-FN-{{$i+$j}}"
                                                                           data-caption="{{ucfirst($microProjectNF[$i+$j]->lang->MPE_Name)}}"><img
                                                                                src="{{$image->MPI_Path}}"></a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <a class="left carousel-control"
                                                               href="#project-carousel-NF-{{$i+$j}}"
                                                               data-slide="prev">
                                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="right carousel-control"
                                                               href="#project-carousel-NF-{{$i+$j}}"
                                                               data-slide="next">
                                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                    <div id="modal-swipe-NF-{{$i+$j}}">
                                                        <h2>{{ucfirst($microProjectNF[$i+$j]->lang->MPE_Name)}}</h2>
                                                        <br>
                                                        @if($microProjectNF[$i+$j]->MPE_PartnerName == '0')
                                                            <p>
                                                                <strong>@lang('main.beneficiary')</strong> {{ucfirst($microProjectNF[$i+$j]->MPE_BeneficiaryName)}}
                                                            </p>
                                                        @elseif($microProjectNF[$i+$j]->MPE_PartnerName2 == '0')
                                                            <p>
                                                                <strong>@lang('main.beneficiaries')</strong> {{ucfirst($microProjectNF[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectNF[$i+$j]->MPE_PartnerName)}}
                                                            </p>
                                                        @else
                                                            <p>
                                                                <strong>@lang('main.beneficiaries')</strong> {{ucfirst($microProjectNF[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectNF[$i+$j]->MPE_PartnerName) .', '. ucfirst($microProjectNF[$i+$j]->MPE_PartnerName2)}}
                                                            </p>
                                                        @endif
                                                        <p>
                                                            <strong>@lang('main.projectCity')</strong> {{$microProjectNF[$i+$j]->lang->MPE_City}}
                                                        </p>
                                                        <br>
                                                        <div class="clearfix"><p
                                                                class="p-justify">{!!$microProjectNF[$i+$j]->lang->MPE_Suffering!!}</p>
                                                        </div>
                                                        <br>
                                                        <a class="cpy-link" onclick="copyTextNF({{$microProjectNF[$i+$j]->MicroProject_ID}})">@lang('main.cpyLink')</a>
                                                        <textarea id="txt{{$microProjectNF[$i+$j]->MicroProject_ID}}" style="display: none;"></textarea>
                                                        <br>
                                                        {{--<span><strong>{{$microProjectNF[$i+$j]->MPE_MoneyDonated}}--}}
                                                                {{--(USD) @lang('main.microRaisedOf') {{$microProjectNF[$i+$j]->MPE_AllMoneyNeeded}}--}}
                                                                {{--(USD)</strong></span>--}}
                                                        {{--<div class="progress">--}}
                                                            {{--<div class="progress-bar" role="progressbar"--}}
                                                                 {{--aria-valuemin="0" aria-valuemax="100"--}}
                                                                 {{--style="width:{{1+(($microProjectNF[$i+$j]->MPE_MoneyDonated*100)/$microProjectNF[$i+$j]->MPE_AllMoneyNeeded)}}%">--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--@if($microProjectNF[$i+$j]->MPE_AllMoneyNeeded > $microProjectNF[$i+$j]->MPE_MoneyDonated)--}}
                                                            {{--<a href="{{route('donate_project_rt', $microProjectNF[$i+$j]->MicroProject_ID)}}"--}}
                                                               {{--target="_blank" class="btn btn-primary project-donate">Donate--}}
                                                                {{--for this project</a>--}}
                                                        {{--@endif--}}
                                                        {{--<br>--}}
                                                        <br>
                                                        <div id="fb-root"></div>
                                                        <div class="fb-comments"
                                                             data-href="https://hcsyria.org/micro-projects#project{{$microProjectNF[$i+$j]->MicroProject_ID}}"
                                                             data-width="100%" data-numposts="3"></div>
                                                        <br>
                                                        <div class="text-center swipe-arrows">
                                                            <i class="fa fa-angle-double-up"></i>
                                                            <p>@lang('main.swipeUp')</p>
                                                        </div>
                                                        <div class="swipe-to-close" id="swipe-to-close-NF-{{$i+$j}}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endif
                                @endfor
                            </div>
                        @endfor
                        @if($projectNFCopy != 'none')
                            <div class="modal fade project-detail" id="project-detail-NF-copy" tabindex="-1"
                                 role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" id="close-NF-copy"
                                                    data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            @if($projectNFCopy->MPE_PartnerName == '0')
                                                <a href="{{substr($projectNFCopy->images[0]->MPI_Path, 0, -4).'b.jpg'}}"
                                                   data-fancybox="gallery-FN-copy"
                                                   data-caption="{{ucfirst($projectNFCopy->lang->MPE_Name)}}"><img
                                                        src="{{$projectNFCopy->images[0]->MPI_Path}}"></a>
                                            @else
                                                <div id="project-carousel-NF-copy"
                                                     class="carousel slide touch-slide"
                                                     data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <?php $k = 0 ?>
                                                        @foreach($projectNFCopy->images as $image)
                                                            <li data-target="#project-carousel-NF-copy"
                                                                data-slide-to="{{$k++}}"
                                                                @if($k == 1)class="active" @endif></li>
                                                        @endforeach
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <?php $k = 0 ?>
                                                        @foreach($projectNFCopy->images as $image)
                                                            <div class="item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-FN-{{$i+$j}}"
                                                                   data-caption="{{ucfirst($projectNFCopy->lang->MPE_Name)}}"><img
                                                                        src="{{$image->MPI_Path}}"></a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="left carousel-control"
                                                       href="#project-carousel-NF-copy"
                                                       data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control"
                                                       href="#project-carousel-NF-copy"
                                                       data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            @endif
                                            <div id="modal-swipe-NF-copy">
                                                <h2>{{ucfirst($projectNFCopy->lang->MPE_Name)}}</h2>
                                                <br>
                                                @if($projectNFCopy->MPE_PartnerName == '0')
                                                    <p>
                                                        <strong>@lang('main.beneficiary')</strong> {{ucfirst($projectNFCopy->MPE_BeneficiaryName)}}
                                                    </p>
                                                @elseif($projectNFCopy->MPE_PartnerName2 == '0')
                                                    <p>
                                                        <strong>@lang('main.beneficiaries')</strong> {{ucfirst($projectNFCopy->MPE_BeneficiaryName) .', '. ucfirst($projectNFCopy->MPE_PartnerName)}}
                                                    </p>
                                                @else
                                                    <p>
                                                        <strong>@lang('main.beneficiaries')</strong> {{ucfirst($projectNFCopy->MPE_BeneficiaryName) .', '. ucfirst($projectNFCopy->MPE_PartnerName) .', '. ucfirst($projectNFCopy->MPE_PartnerName2)}}
                                                    </p>
                                                @endif
                                                <p>
                                                    <strong>@lang('main.projectCity')</strong> {{$projectNFCopy->lang->MPE_City}}
                                                </p>
                                                <br>
                                                <div class="clearfix"><p
                                                        class="p-justify">{!!$projectNFCopy->lang->MPE_Suffering!!}</p>
                                                </div>
                                                <br>
                                                <a class="cpy-link" onclick="copyTextNF({{$projectNFCopy->MicroProject_ID}})">@lang('main.cpyLink')</a>
                                                <textarea id="txt{{$projectNFCopy->MicroProject_ID}}" style="display: none;"></textarea>
                                                <br>
                                                <span><strong>{{$projectNFCopy->MPE_MoneyDonated}}
                                                        (USD) @lang('main.microRaisedOf') {{$projectNFCopy->MPE_AllMoneyNeeded}}
                                                        (USD)</strong></span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         aria-valuemin="0" aria-valuemax="100"
                                                         style="width:{{1+(($projectNFCopy->MPE_MoneyDonated*100)/$projectNFCopy->MPE_AllMoneyNeeded)}}%">
                                                    </div>
                                                </div>
                                                @if($projectNFCopy->MPE_AllMoneyNeeded > $projectNFCopy->MPE_MoneyDonated)
                                                    <a href="{{route('donate_project_rt', $projectNFCopy->MicroProject_ID)}}"
                                                       target="_blank" class="btn btn-primary project-donate">Donate
                                                        for this project</a>
                                                @endif
                                                <br>
                                                <br>
                                                <div id="fb-root"></div>
                                                <div class="fb-comments"
                                                     data-href="https://hcsyria.org/micro-projects#project{{$projectNFCopy->MicroProject_ID}}"
                                                     data-width="100%" data-numposts="3"></div>
                                                <br>
                                                <div class="text-center swipe-arrows">
                                                    <i class="fa fa-angle-double-up"></i>
                                                    <p>@lang('main.swipeUp')</p>
                                                </div>
                                                <div class="swipe-to-close" id="swipe-to-close-NF-copy"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="text-center">
                            {{$microProjectNF->appends(['search' => $search, 'microProjectF' => $microProjectF->currentPage(),'donor' => $donor])->fragment('-')->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!--/#Micro Projects-->


@include('public.footer')

<script>
    let url = $(location).attr('href');
    if (url.charAt(url.length - 1) === '-') {
        $('.nav-tabs a[href="#not-funded"]').tab('show');
    } else {
        $('.nav-tabs a[href="#funded"]').tab('show');
    }
    @if (count($microProjectF)==0&&count($microProjectNF)!=0)
    $('.nav-tabs a[href="#not-funded"]').tab('show');
        @endif
    let firstGetKey = window.location.search.split('=')[0];
    let firstGetValue = window.location.search.split('=')[1];
    if (firstGetKey.includes('search')) {
        firstGetValue = decodeURIComponent(firstGetValue);
        if(firstGetValue.includes('&')){
            firstGetValue = firstGetValue.substr(0, firstGetValue.indexOf('&'));
        }
        document.getElementById('search-input').value = firstGetValue.replace(/\+/g, ' ').replace('undefined', '');
    }
</script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
<script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
<script>
    $(function() {
        $('.cpy-link').on("click",function () {
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
                showAnimation: function(d, c) { this.fadeIn(d, c); },
                css: {
                    fontSize: '1.1rem'
                }
            });
        })
    });
</script>
<script>
    function copyTextF(id) {
        var el = document.getElementById('txt'+id);
        el.value = "https://hcsyria.org/projects/micro-projects/all?project="+id;
        el.style.display = 'block';
        el.select();
        el.focus();
        document.execCommand('copy');
        el.style.display = 'none';
    }
    function copyTextNF(id) {
        var el = document.getElementById('txt'+id);
        el.value = "https://hcsyria.org/projects/micro-projects/all?projectNF="+id;
        el.style.display = 'block';
        el.select();
        el.focus();
        document.execCommand('copy');
        el.style.display = 'none';
    }
</script>
<script type="text/javascript">
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
        $('#submit-form').submit();
    });
</script>
<script>
    $(document).ready(function () {
        if ("ontouchstart" in document.documentElement) {
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
            @for($i = 0; $i<count($microProjectF); $i++)
                $("#swipe-to-close-{{$i}}").on('swipeup', function () {
                    $("#close-{{$i}}").click();
                });
            @endfor
            @for($i = 0; $i<count($microProjectNF); $i++)
                $("#swipe-to-close-NF-{{$i}}").on('swipeup', function () {
                    $("#close-NF-{{$i}}").click();
                });
            @endfor
            $("#swipe-to-close-copy").on('swipeup', function () {
                $("#close-copy").click();
            });
            $("#swipe-to-close-NF-copy").on('swipeup', function () {
                $("#close-NF-copy").click();
            });
        }
    });
</script>
<script>
    if (/iPad/.test(navigator.userAgent) && !window.MSStream) {
        $('#projects-map').css('width', '55%');
    }
    if (/iPhone|iPod/.test(navigator.userAgent) && !window.MSStream) {
        $('#projects-map').css('width', '38%');
        $('.btn-primary').click(function () {
            $('body').css('overflow', 'hidden');
            $('body').css('position', 'fixed');
        });
        @for($i = 0; $i<count($microProjectF); $i++)
        $("#close-{{$i}}").click(function () {
            $('body').css('overflow', 'auto');
            $('body').css('position', 'relative');
            document.getElementById("scroll-{{$i}}").scrollIntoView();
        });
        @endfor
        @for($i = 0; $i<count($microProjectNF); $i++)
        $("#close-NF-{{$i}}").click(function () {
            $('body').css('overflow', 'auto');
            $('body').css('position', 'relative');
            document.getElementById("scroll-NF-{{$i}}").scrollIntoView();
        });
        @endfor
    }
</script>
<script>
    $(".single-project").click(function () {
        $(this).next().modal('show');
    });
</script>
<script>
    function get(name){
        if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
            return decodeURIComponent(name[1]);
    }
     if(firstGetKey == '?project'){
         $('#project-detail-copy').modal('show');
     }else if (firstGetKey == '?projectNF'){
         $('.nav-tabs a[href="#not-funded"]').tab('show');
         $('#project-detail-NF-copy').modal('show');
     }
</script>

@stack('navbar-scripts')

</body>
</html>
