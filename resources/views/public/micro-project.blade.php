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
    <meta name="description" content="@lang('family2family.description')">
    <meta name="keywords" content="aleppo syria, hope, center, family to family, caritas poland"/>
    <title>@lang('main.micro')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/projects.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/family-to-family" />

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        #Micro {
            padding-top: 100px;
            padding-bottom: 25px;
            margin: 0 5% 0 5% ;
        }
        #Micro h3 {
            margin-bottom: 0;
        }
        #Micro .logo {
            width: 150px;
            margin-bottom: 20px;
        }
        #Micro .logos {
            padding-top: 20px;
            display: flex;
            align-items: center;
        }
        #Micro .donor-logo {
            width: 100%;
        }
        #Micro .caritas-logo {
            width: 80%;
        }
        #Micro .first-part h3 {
            font-size: 40px;
            margin-top: 0;
        }
        #Micro .horizontal-margin {
            margin-top: 20px;
        }
        #Micro .statistics {
            width: 50%;
            float: left;
            padding-right: 15px;
            padding-left: 15px;
        }
        #Micro .second-part .horizontal-margin {
            margin-top: 50px;
        }
        #Micro .single-project {
            padding: 12px;
        }
        #Micro .single-project .btn-primary {
            position: absolute;
            bottom: 12px;
            right: 27px;
        }
        #Micro .single-project ul li {
            float: none;
        }
        #Micro .project-donate {
            font-size: 10px;
        }
        #Micro .div-donate a {
            padding: 6px;
        }
        #Micro .progress {
            margin-right: 5px;
        }
        #Micro #not-funded .single-project h2 {
            font-size: 20px;
        }
        #Micro #not-funded .single-project p {
            font-size: 12px;
        }
        #Micro #not-funded .div-donate strong {
            font-size: 12px;
        }
        #Micro #not-funded .div-btn-NF {
            padding-bottom: 0;
        }
        @media screen and (max-width: 1199px) and (min-width: 992px) {
            #Micro .donor-logo {
                width: 60px;
            }
            #Micro .first-part p {
                padding-top: 0;
                font-size: 13px;
            }
        }
        @media screen and (max-width: 400px) {
            #Micro .donor-logo {
                width: 45px;
            }
        }
        @media screen and (max-width: 768px){
            #Micro .bottom-margin {
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HLZ6M"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=2133577546862306&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

@include('public.navbar')

<section id="Micro">
    {{--<div class="navigate">--}}
        {{--<div class="container">--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="/">@lang('navbar.home')</a></li>--}}
                {{--<li><a href="{{route('public.main_projects')}}">@lang('what_we_do.title')</a></li>--}}
                {{--<li><a href="{{route('public.initiatives.type', 'development')}}">@lang('what_we_do.development')</a></li>--}}
                {{--<li class="active">@lang('main.micro')</li>--}}
            {{--</ol>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class=" container">--}}
        <div class="row">
            <div class="horizontal-margin first-part col-md-5 text-center vertical-separator">

                <h1 class="text-center title-shadow">Micro <b>PROJECTS</b></h1>
                <h1 class="text-center red-title">Micro <b>PROJECTS</b></h1>

                <div style="padding-top: 20px"; ></div>

                <h4 class="text-left" >@lang('micro-project.description')</h4>
                <div class="row">
                    <div class="statistics"><h3 style="color: #CF142B;">{{$fundedCount}}</h3>@lang('micro-project.funded')</div>
                    <div class="statistics"><h3>{{$awaitingCount}}</h3>@lang('micro-project.awaitingForFund')</div>
                </div>
                <div class="row logos">
                    <div class="col-xs-3">
                        <img src="/images/logos/salt.svg" class="donor-logo">
                    </div>
                    <div class="col-xs-3">
                        <img src="/images/logos/caritas.svg" class="donor-logo caritas-logo">
                    </div>
                    <div class="col-xs-3">
                        <img src="/images/logos/loeuvre.svg" class="donor-logo">
                    </div>

                    <div class="col-xs-3">
                        <img src="/images/logos/kia.svg" class="donor-logo">
                    </div>
                </div>
            </div>
            <div class="second-part col-md-7 ">
                <div class="" style="padding-top: 15px">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#funded" data-toggle="tab">@lang('micro-project.funded')</a></li>
                        <li><a href="#not-funded" data-toggle="tab" style="font-weight: bold;">@lang('micro-project.awaitingForFund')</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="funded">
                            <div class="media">
                                <div class="media-body">
                                    <div class="row projects-height">
                                        @for($j=0; $j<3; $j++)
                                            <div class="col-sm-4">
                                                <div class="single-project bottom-margin" id="scroll-{{$j}}">
                                                    <img src="{{$microProjectF[$j]->images[0]->MPI_Path}}" alt=""/>
                                                    @if($microProjectF[$j]->MPE_Video != '0')
                                                        <a class="video-ico"><i class="fa fa-video-camera"></i></a>
                                                    @endif
                                                    <h2>{{ucfirst($microProjectF[$j]->lang->MPE_Name)}}</h2>
                                                    <ul class="post-meta">
                                                        <li>
                                                            @if($microProjectF[$j]->MPE_PartnerName == '0')
                                                                {{ucfirst($microProjectF[$j]->MPE_BeneficiaryName)}}
                                                            @elseif($microProjectF[$j]->MPE_PartnerName2 == '0')
                                                                {{ucfirst($microProjectF[$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectF[$j]->MPE_PartnerName)}}
                                                            @else
                                                                {{ucfirst($microProjectF[$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectF[$j]->MPE_PartnerName) .', '. ucfirst($microProjectF[$j]->MPE_PartnerName2)}}
                                                            @endif
                                                        </li>
                                                        <li>
                                                            {{date('d/m/Y',strtotime($microProjectF[$j]->MPE_DateOfRequest))}}
                                                        </li>
                                                    </ul>
                                                    <div class="project-content" style="margin-bottom: 40px">
                                                        <p>{!!implode(' ', array_slice(explode(' ', $microProjectF[$j]->lang->MPE_Suffering), 0, 20)).'...'!!}</p>
                                                    </div>
                                                    <a href="" class="btn btn-primary btn-read-more" id="btn-primary-{{$j}}"
                                                       data-toggle="modal"
                                                       data-target="#project-detail-{{$microProjectF[$j]->MicroProject_ID}}">@lang('main.readMore')</a>
                                                </div>
                                                <div class="modal fade project-detail" id="project-detail-{{$microProjectF[$j]->MicroProject_ID}}" tabindex="-1"
                                                     role="dialog"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <button type="button" class="close" id="close-{{$j}}"
                                                                        data-dismiss="modal"
                                                                        aria-hidden="true">&times;
                                                                </button>
                                                                <div id="project-carousel-{{$j}}" class="carousel slide touch-slide"
                                                                     data-ride="carousel">
                                                                    <ol class="carousel-indicators">
                                                                        <?php $k = 0 ?>
                                                                        @foreach($microProjectF[$j]->images as $image)
                                                                            <li data-target="#project-carousel-{{$j}}"
                                                                                data-slide-to="{{$k++}}"
                                                                                @if($k == 1)class="active" @endif></li>
                                                                        @endforeach
                                                                    </ol>
                                                                    <div class="carousel-inner">
                                                                        <?php $k = 0 ?>
                                                                        @foreach($microProjectF[$j]->images as $image)
                                                                            <div class="item @if($k++ == 0) active @endif">
                                                                                <p id="p-date">{{date('d/m/Y',strtotime(exif_read_data(ltrim($image->MPI_Path, '/'))['DateTimeOriginal']))}}</p>
                                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                   data-fancybox="gallery-{{$j}}"
                                                                                   data-caption="{{ucfirst($microProjectF[$j]->lang->MPE_Name)}}"><img
                                                                                        src="{{$image->MPI_Path}}"></a>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <a class="left carousel-control" href="#project-carousel-{{$j}}"
                                                                       data-slide="prev">
                                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                    <a class="right carousel-control" href="#project-carousel-{{$j}}"
                                                                       data-slide="next">
                                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                </div>
                                                                <div id="modal-swipe-{{$j}}">
                                                                    <h2>{{ucfirst($microProjectF[$j]->lang->MPE_Name)}}</h2>
                                                                    <br>
                                                                    @if($microProjectF[$j]->MPE_Donor=='0')
                                                                        <img class="donor-logo-caritas" src="/images/logos/caritas.svg">
                                                                    @elseif($microProjectF[$j]->MPE_Donor=='1')
                                                                        <img class="donor-logo-salt" src="/images/logos/salt.svg">
                                                                    @elseif($microProjectF[$j]->MPE_Donor=='2')
                                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                    @elseif($microProjectF[$j]->MPE_Donor=='3')
                                                                        <img class="donor-logo-kia" src="/images/logos/kia.svg">
                                                                    @endif
                                                                    @if($microProjectF[$j]->MPE_PartnerName == '0')
                                                                        <p>
                                                                            <strong>@lang('main.beneficiary')</strong> {{ucfirst($microProjectF[$j]->MPE_BeneficiaryName)}}
                                                                        </p>
                                                                    @elseif($microProjectF[$j]->MPE_PartnerName2 == '0')
                                                                        <p>
                                                                            <strong>@lang('main.beneficiaries')</strong> {{ucfirst($microProjectF[$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectF[$j]->MPE_PartnerName)}}
                                                                        </p>
                                                                    @else
                                                                        <p>
                                                                            <strong>@lang('main.beneficiaries')</strong> {{ucfirst($microProjectF[$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectF[$j]->MPE_PartnerName) .', '. ucfirst($microProjectF[$j]->MPE_PartnerName2)}}
                                                                        </p>
                                                                    @endif
                                                                    <p>
                                                                        <strong>@lang('main.projectCity')</strong> {{$microProjectF[$j]->lang->MPE_City}}
                                                                    </p>
                                                                    @if($microProjectF[$j]->MPE_Donor=='0')
                                                                        <p>
                                                                            <strong>@lang('main.status')</strong> @lang('main.fundedCaritas')
                                                                        </p>
                                                                    @elseif($microProjectF[$j]->MPE_Donor=='1')
                                                                        <p>
                                                                            <strong>@lang('main.status')</strong> @lang('main.fundedSALT')
                                                                        </p>
                                                                    @elseif($microProjectF[$j]->MPE_Donor=='2')
                                                                        <p>
                                                                            <strong>@lang('main.status')</strong> @lang('main.fundedLoeuvre')
                                                                        </p>
                                                                    @elseif($microProjectF[$j]->MPE_Donor=='3')
                                                                        <p>
                                                                            <strong>@lang('main.status')</strong> @lang('main.fundedKerkInAct')
                                                                        </p>
                                                                    @endif
                                                                    <br>
                                                                    <div class="clearfix"><p
                                                                            class="p-justify">{!!$microProjectF[$j]->lang->MPE_Suffering!!}</p>
                                                                    </div>
                                                                    <br>
                                                                    <a class="cpy-link" onclick="copyTextF({{$microProjectF[$j]->MicroProject_ID}})">@lang('main.cpyLink')</a>
                                                                    <textarea id="txt{{$microProjectF[$j]->MicroProject_ID}}" style="display: none;"></textarea>
                                                                    @if($microProjectF[$j]->MPE_Location != '0')
                                                                        <img src="/images/projects/tracker.png" id="tracker-img">
                                                                        <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectF[$j]->MPE_Location}}"
                                                                           id="info-link"
                                                                           target="_blank"> @lang('main.seeOnMap')</a>
                                                                    @endif
                                                                    <br>
                                                                    <br>
                                                                    @if($microProjectF[$j]->MPE_Video != '0')
                                                                        <div class="video">
                                                                            <iframe src="{{$microProjectF[$j]->MPE_Video}}"
                                                                                    frameborder="0"
                                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                    allowfullscreen></iframe>
                                                                        </div>
                                                                        <hr style="border-color: #43484E;">
                                                                    @endif
                                                                    {{--<div id="fb-root"></div>--}}
                                                                    {{--<div style="text-align: center">--}}
                                                                        {{--<div class="fb-comments"--}}
                                                                             {{--data-href="https://hcsyria.org/micro-projects#project{{$microProjectF[$j]->MicroProject_ID}}"--}}
                                                                             {{--data-width="100%" data-numposts="3"></div>--}}
                                                                    {{--</div>--}}
                                                                    <br>
                                                                    <div class="text-center swipe-arrows">
                                                                        <i class="fa fa-angle-double-up"></i>
                                                                        <p>@lang('main.swipeUp')</p>
                                                                    </div>
                                                                    <div class="swipe-to-close" id="swipe-to-close-{{$j}}"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{route('public.micro_project.all')}}" class="btn btn-primary btn-prv-all" data-toggle="modal">@lang('main.microPreviewAll')</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="not-funded">
                            <div class="media">
                                <div class="media-body">
                                    <div class="row projects-height">
                                        @for($j=0; $j<count($microProjectNF) ; $j++)
                                            @if($j == 3) @break @endIf;
                                            <div class="col-sm-4">
                                                <div class="single-project bottom-margin" id="scroll-NF-{{$j}}">
                                                    <img src="{{$microProjectNF[$j]->images[0]->MPI_Path}}" alt=""/>
                                                    <h2>{{ucfirst($microProjectNF[$j]->lang->MPE_Name)}}</h2>
                                                    <ul class="post-meta">
                                                        <li>
                                                            @if($microProjectNF[$j]->MPE_PartnerName == '0')
                                                                {{ucfirst($microProjectNF[$j]->MPE_BeneficiaryName)}}
                                                            @elseif($microProjectNF[$j]->MPE_PartnerName2 == '0')
                                                                {{ucfirst($microProjectNF[$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectNF[$j]->MPE_PartnerName)}}
                                                            @else
                                                                {{ucfirst($microProjectNF[$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectNF[$j]->MPE_PartnerName) .', '. ucfirst($microProjectNF[$j]->MPE_PartnerName2)}}
                                                            @endif
                                                        </li>
                                                        <li>
                                                            {{date('d/m/Y',strtotime($microProjectNF[$j]->MPE_DateOfRequest))}}
                                                        </li>
                                                    </ul>
                                                    <div class="project-content">
                                                        <p class="p-justify">{!!implode(' ', array_slice(explode(' ', $microProjectNF[$j]->lang->MPE_Suffering), 0, 20)).'...'!!}</p>
                                                    </div>
                                                    <br>
                                                    <a href="" class="btn btn-primary btn-read-more" id="btn-primary-NF-{{$j}}"
                                                       data-toggle="modal"
                                                       data-target="#project-detail-NF-{{$microProjectNF[$j]->MicroProject_ID}}">@lang('main.readMore')</a>
                                                    {{--<div class="text-right div-btn-NF">--}}
                                                        {{--<a href="" class="btn-primary-NF" id="btn-primary-NF-{{$j}}"--}}
                                                           {{--data-toggle="modal"--}}
                                                           {{--data-target="#project-detail-NF-{{$microProjectNF[$j]->MicroProject_ID}}">@lang('main.readMore') >></a>--}}
                                                    {{--</div>--}}
                                                    {{--<br>--}}
                                                    {{--<div class="div-donate">--}}
                                    {{--<span><strong>{{$microProjectNF[$j]->MPE_MoneyDonated}}--}}
                                            {{--(USD) @lang('main.microRaisedOf') {{$microProjectNF[$j]->MPE_AllMoneyNeeded}}--}}
                                            {{--(USD)</strong></span>--}}
                                                        {{--<div class="progress">--}}
                                                            {{--<div class="progress-bar" role="progressbar"--}}
                                                                 {{--aria-valuemin="0" aria-valuemax="100"--}}
                                                                 {{--style="width:{{1+(($microProjectNF[$j]->MPE_MoneyDonated*100)/$microProjectNF[$j]->MPE_AllMoneyNeeded)}}%">--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--@if($microProjectNF[$j]->MPE_AllMoneyNeeded > $microProjectNF[$j]->MPE_MoneyDonated)--}}
                                                            {{--<a href="{{route('donate_project_rt', $microProjectNF[$j]->MicroProject_ID)}}"--}}
                                                               {{--target="_blank"--}}
                                                               {{--class="btn project-donate">@lang('main.microDonate')</a>--}}
                                                        {{--@endif--}}
                                                    {{--</div>--}}
                                                </div>
                                                <div class="modal fade project-detail" id="project-detail-NF-{{$microProjectNF[$j]->MicroProject_ID}}" tabindex="-1"
                                                     role="dialog"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <button type="button" class="close" id="close-NF-{{$j}}"
                                                                        data-dismiss="modal" aria-hidden="true">
                                                                    &times;
                                                                </button>
                                                                @if($microProjectNF[$j]->MPE_PartnerName == '0')
                                                                    <a href="{{substr($microProjectNF[$j]->images[0]->MPI_Path, 0, -4).'b.jpg'}}"
                                                                       data-fancybox="gallery-FN-{{$j}}"
                                                                       data-caption="{{ucfirst($microProjectNF[$j]->lang->MPE_Name)}}"><img
                                                                            src="{{$microProjectNF[$j]->images[0]->MPI_Path}}"></a>
                                                                @else
                                                                    <div id="project-carousel-NF-{{$j}}"
                                                                         class="carousel slide touch-slide"
                                                                         data-ride="carousel">
                                                                        <ol class="carousel-indicators">
                                                                            <?php $k = 0 ?>
                                                                            @foreach($microProjectNF[$j]->images as $image)
                                                                                <li data-target="#project-carousel-NF-{{$j}}"
                                                                                    data-slide-to="{{$k++}}"
                                                                                    @if($k == 1)class="active" @endif></li>
                                                                            @endforeach
                                                                        </ol>
                                                                        <div class="carousel-inner">
                                                                            <?php $k = 0 ?>
                                                                            @foreach($microProjectNF[$j]->images as $image)
                                                                                <div class="item @if($k++ == 0) active @endif">
                                                                                    <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                       data-fancybox="gallery-FN-{{$j}}"
                                                                                       data-caption="{{ucfirst($microProjectNF[$j]->lang->MPE_Name)}}"><img
                                                                                            src="{{$image->MPI_Path}}"></a>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <a class="left carousel-control"
                                                                           href="#project-carousel-NF-{{$j}}"
                                                                           data-slide="prev">
                                                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                                                            <span class="sr-only">Previous</span>
                                                                        </a>
                                                                        <a class="right carousel-control"
                                                                           href="#project-carousel-NF-{{$j}}"
                                                                           data-slide="next">
                                                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                                                            <span class="sr-only">Next</span>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                                <div id="modal-swipe-NF-{{$j}}">
                                                                    <h2>{{ucfirst($microProjectNF[$j]->lang->MPE_Name)}}</h2>
                                                                    <br>
                                                                    @if($microProjectNF[$j]->MPE_PartnerName == '0')
                                                                        <p>
                                                                            <strong>@lang('main.beneficiary')</strong> {{ucfirst($microProjectNF[$j]->MPE_BeneficiaryName)}}
                                                                        </p>
                                                                    @elseif($microProjectNF[$j]->MPE_PartnerName2 == '0')
                                                                        <p>
                                                                            <strong>@lang('main.beneficiaries')</strong> {{ucfirst($microProjectNF[$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectNF[$j]->MPE_PartnerName)}}
                                                                        </p>
                                                                    @else
                                                                        <p>
                                                                            <strong>@lang('main.beneficiaries')</strong> {{ucfirst($microProjectNF[$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectNF[$j]->MPE_PartnerName) .', '. ucfirst($microProjectNF[$j]->MPE_PartnerName2)}}
                                                                        </p>
                                                                    @endif
                                                                    <p>
                                                                        <strong>@lang('main.projectCity')</strong> {{$microProjectNF[$j]->lang->MPE_City}}
                                                                    </p>
                                                                    <br>
                                                                    <div class="clearfix"><p
                                                                            class="p-justify">{!!$microProjectNF[$j]->lang->MPE_Suffering!!}</p>
                                                                    </div>
                                                                    <a class="cpy-link" onclick="copyTextNF({{$microProjectNF[$j]->MicroProject_ID}})">@lang('main.cpyLink')</a>
                                                                    <textarea id="txt{{$microProjectNF[$j]->MicroProject_ID}}" style="display: none;"></textarea>
                                                                    <br>
                                                                    {{--<span><strong>{{$microProjectNF[$j]->MPE_MoneyDonated}}--}}
                                                                            {{--(USD) @lang('main.microRaisedOf') {{$microProjectNF[$j]->MPE_AllMoneyNeeded}}--}}
                                                                            {{--(USD)</strong></span>--}}
                                                                    {{--<div class="progress">--}}
                                                                        {{--<div class="progress-bar" role="progressbar"--}}
                                                                             {{--aria-valuemin="0" aria-valuemax="100"--}}
                                                                             {{--style="width:{{1+(($microProjectNF[$j]->MPE_MoneyDonated*100)/$microProjectNF[$j]->MPE_AllMoneyNeeded)}}%">--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}
                                                                    {{--@if($microProjectNF[$j]->MPE_AllMoneyNeeded > $microProjectNF[$j]->MPE_MoneyDonated)--}}
                                                                        {{--<a href="{{route('donate_project_rt', $microProjectNF[$j]->MicroProject_ID)}}"--}}
                                                                           {{--target="_blank"--}}
                                                                           {{--class="btn project-donate">@lang('main.microDonate')</a>--}}
                                                                    {{--@endif--}}
                                                                    {{--<br>--}}
                                                                    <br>
                                                                    {{--<div id="fb-root"></div>--}}
                                                                    {{--<div class="fb-comments"--}}
                                                                         {{--data-href="https://hcsyria.org/micro-projects#project{{$microProjectNF[$j]->MicroProject_ID}}"--}}
                                                                         {{--data-width="100%" data-numposts="3"></div>--}}
                                                                    {{--<br>--}}
                                                                    <div class="text-center swipe-arrows">
                                                                        <i class="fa fa-angle-double-up"></i>
                                                                        <p>@lang('main.swipeUp')</p>
                                                                    </div>
                                                                    <div class="swipe-to-close" id="swipe-to-close-NF-{{$j}}"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{route('public.micro_project.all','-')}}" class="btn btn-primary btn-prv-all"
                                   data-toggle="modal">@lang('main.microPreviewAll')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{--</div>--}}
</section>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
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
        $('#close-NF-0').click(function () {
            body.css('overflow', 'auto');
            body.css('position', 'relative');
            document.getElementById("scroll-NF-0").scrollIntoView();
        });
        $('#close-NF-1').click(function () {
            body.css('overflow', 'auto');
            body.css('position', 'relative');
            document.getElementById("scroll-NF-1").scrollIntoView();
        });
        $('#close-NF-2').click(function () {
            body.css('overflow', 'auto');
            body.css('position', 'relative');
            document.getElementById("scroll-NF-2").scrollIntoView();
        });
    }
</script>
<script>
    $(".single-project").click(function () {
        $(this).next().modal('show');
    });
</script>
@stack('navbar-scripts')

</body>
</html>
