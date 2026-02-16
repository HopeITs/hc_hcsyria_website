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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168141177-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
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

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/projects.css" rel="stylesheet">
    <link href="/css/micro_page.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href='https://fonts.googleapis.com/css?family=Martel' rel='stylesheet'>
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
</head>
<body>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
{{--<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>--}}

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

<div id="Micro">
    <div class="row">
        <div class="horizontal-margin first-part col-md-5 text-center vertical-separator">
            <img src="/images/logos/micro.svg" class="micro-logo">
            <p class="text-left" >@lang('micro-project.description')</p>
            <br>
            <div class="row">
                <div class="statistics"><h3 class="count_int" style="color: #CF142B;">{{$aleppoCount}}</h3>@lang('projects.aleppo')</div>
                <div class="statistics"><h3 class="count_int" style="color: #CF142B;">{{$homsCount}}</h3>@lang('projects.homs')</div>
                <div class="statistics"><h3 class="count_int" style="color: #CF142B;">{{$damascusCount}}</h3>@lang('projects.damascus')</div>
            </div>
        </div>
        <div class="second-part col-md-7 text-center">
            <div class="video" style="padding-bottom: 55%;margin: 80px 0 0px 0;">
                <iframe src="https://www.youtube.com/embed/_7Bo0BYVqmk" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope;
                        icture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div style="margin-top: 40px;"></div>
    <div class="row centered-row">
        <div class="col-md-2 col-md-offset-1 col-sm-4 col-xs-4 text-center centered-column-content" >
            <img class="home-logos" src="/images/logos/if.svg" id="home-salt-logo">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 text-center centered-column-content">
            <img class="home-logos" src="/images/logos/hungary.svg" id="home-loeuvre-logo">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4  text-center centered-column-content">
            <img class="home-logos" src="/images/logos/caritas.svg" id="home-caritas-logo">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 text-center centered-column-content">
            <img class="home-logos" src="/images/logos/loeuvre.svg" id="home-loeuvre-logo">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 text-center centered-column-content">
            <img class="home-logos" src="/images/logos/acn.svg" id="home-loeuvre-logo">
        </div>
        <div class="col-md-2 col-md-offset-3 col-sm-4 col-xs-4 text-center centered-column-content" >
            <img class="home-logos" src="/images/logos/salt.svg" id="home-salt-logo">
        </div>
        <div class="col-md-2 col-md-offset-2 col-sm-4 col-xs-4 text-center centered-column-content"  >
            <img class="home-logos" src="/images/logos/kia.svg" id="home-kia-logo">
        </div>
    </div>
    <div style="padding: 25px;"></div>
    <section id="programs" class="paraxify"> </section>
    <div style="padding: 30px;"></div>
    <div class="container">
        <div class="row text-center clearfix">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="row text-center">
                    <div class="search-container">
                        <form method="get" id="submit-form" action="{{route('public.micro_project2','s')}}">
                            <div class="se">
                                <input id="search-input" type="text" placeholder="@lang('projects.search')" name="search">
                                {{--<button type="submit"><i class="fa fa-search"></i></button>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-sm-8" style="margin-left: 2rem">
                <div class="row" style="display: flex; justify-content: center">
                    <div class="text-center" id="donor-filter">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuDonor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuDonor">
                                @if(!empty($search))
                                    <li><a href="{{route('public.micro_project2',['search' => $search, 'donor'=>'all'])}}">@lang('projects.all')</a></li>
                                    @for($i =0;$i< count($donors);$i++)
                                        <li><a href="{{route('public.micro_project2',['search' => $search, 'donor'=>$donors[$i]['abb_name']] )}}">{{$donors[$i]['name']}}</a></li>
                                    @endfor
                                @else
                                    <li><a href="{{route('public.micro_project2',['donor'=>'all'])}}">@lang('projects.all')</a></li>
                                    @for($i =0;$i< count($donors);$i++)
                                        <li><a href="{{route('public.micro_project2',['donor'=>$donors[$i]['abb_name']])}}">{{$donors[$i]['name']}}</a></li>
                                    @endfor
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div style="text-align: center; margin-left: .7rem">
                        @if(app()->isLocale('en'))
                        <label class="switch">
                            <input type="checkbox" data-toggle="tooltip" data-container="body" rel="tooltip" data-placement="bottom" title="Search Video" name="videoFilter" id="videoFilter" @if ($video == true) checked @endif value="true" onchange="videoFilter(this)">
                            <span class="slider">
                                <i class="fa fa-video-camera"></i>
                            </span>
                        </label>
                        @else
                            <label class="switch">
                                <input type="checkbox" data-toggle="tooltip" data-container="body" rel="tooltip" data-placement="bottom" title="Recherche Vidéo" name="videoFilter" id="videoFilter" @if ($video == true) checked @endif value="true" onchange="videoFilter(this)">
                                <span class="slider">
                                <i class="fa fa-video-camera"></i>
                            </span>
                            </label>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs" id="tabList">
            <li ><a href="#aleppo" id="aleppoTab" data-toggle="tab" style="font-weight: bold;">@lang('projects.aleppo') <small>({{ $microProjectA->total()}} out of {{$aleppoCount}})</small></a></li>
            <li><a href="#homs" id="homsTab" data-toggle="tab" style="font-weight: bold;">@lang('projects.homs') <small>({{ $microProjectH->total() }} out of {{$homsCount}})</small></a></li>
            <li><a href="#damascus" id="damasTab" data-toggle="tab" style="font-weight: bold;">@lang('projects.damascus') <small>({{ $microProjectD->total() }} out of {{$damascusCount}})</small></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade" id="aleppo">
                <div class="media">
                    <div class="media-body">
                        @if(count($microProjectA)==0)
                            <h3 class="text-center" style="margin-top: 50px">@lang('projects.sorryMessage1')</h3>
                            <br>
                            <ul>
                                <li><h5>@lang('projects.sorryMessage2')</h5></li>
                            </ul>
                        @endif
                        @for($i = 0; $i<count($microProjectA); $i = $i + 1)
                            @for($j = 0; $j<1; $j++)
                                @if($i+$j < count($microProjectA))
                                    <div class="row" style="overflow: hidden;">
                                        <div class="col-xs-10 col-md-6">
                                            <h3 class="project-title">{{ucfirst($microProjectA[$i+$j]->$language->MPE_Name)}}
                                                <a  onclick="copyTextA({{$microProjectA[$i+$j]->id}})"
                                                    class="video-ico cpy-link" >
                                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                                </a>
                                                @if($microProjectA[$i+$j]->MPE_Location != '0')
                                                    <a  href="https://www.google.com/maps/search/?api=1&query={{$microProjectA[$i+$j]->MPE_Location}}"
                                                        class="video-ico" target="_blank">
                                                        <i class="fa fa-map-marker" ></i>
                                                    </a>
                                                @endif
                                                @if($microProjectA[$i+$j]->MPE_Video != '0')
                                                    <a  href="#" class="video-ico launch-modal" data-modal-id="modal-video-{{$i+$j}}">
                                                        <i class="fa fa-video-camera"></i>
                                                    </a>
                                                    <!--VIDEO MODAL -->
                                                    <div class="modal fade" id="modal-video-{{$i+$j}}" tabindex="-1" role="dialog" aria-labelledby="modal-video-label">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="modal-video">
                                                                        <div class="video ">
                                                                            <iframe class="embed-responsive-item" src="{{$microProjectA[$i+$j]->MPE_Video}}"
                                                                                    frameborder="0"
                                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                    allowfullscreen
                                                                                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <textarea id="txt{{$microProjectA[$i+$j]->id}}" style="display: none;"></textarea>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class=" projects-height" style="margin-bottom: 0px;">
                                        <div class=" single-project">
                                            <div class="col-md-5">
                                                <div id="project-carousel-A-{{$i+$j}}" class="carousel slide touch-slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php $k = 0 ?>
                                                        @foreach($microProjectA[$i+$j]->images as $image)
                                                            <div class="item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-A-{{$i+$j}}"
                                                                   data-caption="{{ucfirst($microProjectA[$i+$j]->$language->MPE_Name)}}">
                                                                    <img src="{{$image->MPI_Path}}">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="left carousel-control"
                                                       href="#project-carousel-A-{{$i+$j}}"
                                                       data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control"
                                                       href="#project-carousel-A-{{$i+$j}}"
                                                       data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-xs-10 " style="margin-left: -15px;">
                                                        <ul class="post-meta" >
                                                            <li>
                                                                @if($microProjectA[$i+$j]->MPE_PartnerName == '0' && $microProjectA[$i+$j]->MPE_PartnerName2 == '0')
                                                                    <strong> @lang('main.beneficiary')</strong> {{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName)}}
                                                                @elseif($microProjectA[$i+$j]->MPE_PartnerName != '0' && $microProjectA[$i+$j]->MPE_PartnerName2 == '0')
                                                                    <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectA[$i+$j]->MPE_PartnerName)}}
                                                                @elseif($microProjectA[$i+$j]->MPE_PartnerName != '0' && $microProjectA[$i+$j]->MPE_PartnerName2 != '0')
                                                                    <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectA[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectA[$i+$j]->MPE_PartnerName2)}}
                                                                @endif
                                                            </li>
                                                            @if($microProjectA[$i+$j]->MPE_FundedDate !=  NULL)
                                                                <li><strong> @lang('projects.fundDate')</strong> {{date('m/Y',strtotime($microProjectA[$i+$j]->MPE_FundedDate))}}</li>
                                                            @endif
                                                            @if($microProjectA[$i+$j]->DOB != '0')
                                                                <li> <strong> @lang('projects.age') </strong> {{\Carbon\Carbon::createFromDate($microProjectA[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years') </li>
                                                            @endif
                                                            @if($microProjectA[$i+$j]->FamilyMembers != '0')
                                                                <li> <strong> @lang('projects.family')  </strong> {{$microProjectA[$i+$j]->FamilyMembers}} </li>
                                                            @endif
                                                            @if($microProjectA[$i+$j]->$language->MPE_ExpSkill != '')
                                                                <li> <strong> @lang('projects.skills') </strong> {{$microProjectA[$i+$j]->$language->MPE_ExpSkill}}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <br>
                                                        @if($microProjectA[$i+$j]->MPE_Donor=='1')
                                                            <img class="donor-logo2 donor-logo-caritas " src="/images/logos/caritas.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='2')
                                                            <img class="donor-logo2 donor-logo-salt " src="/images/logos/salt.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='3')
                                                            <img class="donor-logo2 donor-logo-louver " src="/images/logos/loeuvre.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='5')
                                                            <img class="donor-logo2 donor-logo-kia " src="/images/logos/kia.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='7')
                                                            <img class="donor-logo2 donor-logo-salt " src="/images/logos/if.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='8')
                                                            <img class="donor-logo2 donor-logo-hungary" src="/images/logos/hungary.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='9')
                                                            <img class="donor-logo2 donor-logo-louver " src="/images/logos/loeuvre.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='10')
                                                            <img class="donor-logo2 donor-logo-louver " src="/images/logos/loeuvre.svg">
                                                        @elseif($microProjectA[$i+$j]->MPE_Donor=='11')
                                                            <img class="donor-logo2 donor-logo-salt " src="/images/logos/acn.svg">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="project-content" >
                                                        @if(strlen($microProjectA[$i+$j]->$language->MPE_Suffering)>800)
                                                            <p>{!!implode(' ', array_slice(explode(' ', $microProjectA[$i+$j]->$language->MPE_Suffering), 0, 80)).'...'!!}</p>
                                                            <br>
                                                            <a href="#" class="btn btn-primary" id="btn-primary-{{$i+$j}}"
                                                               data-toggle="modal"
                                                               data-target="#project-detail-{{$microProjectA[$i+$j]->MicroProject_ID}}">@lang('main.readMore')
                                                            </a>
                                                            {{--MODAL--}}
                                                            <div class="modal fade project-detail" id="project-detail-{{$microProjectA[$i+$j]->MicroProject_ID}}"
                                                                 tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                                    @foreach($microProjectA[$i+$j]->images as $image)
                                                                                        <li data-target="#project-carousel-{{$i+$j}}" data-slide-to="{{$k++}}"
                                                                                            @if($k == 1)class="active" @endif></li>
                                                                                    @endforeach
                                                                                </ol>
                                                                                <div class="carousel-inner">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectA[$i+$j]->images as $image)
                                                                                        <div class="item @if($k++ == 0) active @endif">
                                                                                            <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                               data-fancybox="gallery-{{$i+$j}}"
                                                                                               data-caption="{{ucfirst($microProjectA[$i+$j]->$language->MPE_Name)}}" >
                                                                                                <img src="{{$image->MPI_Path}}">
                                                                                            </a>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div><!--/.carousel-inner-->
                                                                                <a class="left carousel-control"
                                                                                   href="#project-carousel-{{$i+$j}}"
                                                                                   data-slide="prev">
                                                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                                                    <span class="sr-only">Previous</span>
                                                                                </a>
                                                                                <a class="right carousel-control"
                                                                                   href="#project-carousel-{{$i+$j}}"
                                                                                   data-slide="next">
                                                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                                                                    <span class="sr-only">Next</span>
                                                                                </a>
                                                                            </div>
                                                                            <div id="modal-swipe-{{$i+$j}}">
                                                                                <h2>{{ucfirst($microProjectA[$i+$j]->$language->MPE_Name)}}</h2>
                                                                                <br>
                                                                                @if($microProjectA[$i+$j]->MPE_Donor=='1')
                                                                                    <img class="donor-logo-caritas" src="/images/logos/caritas.svg">
                                                                                @elseif($microProjectA[$i+$j]->MPE_Donor=='2')
                                                                                    <img class="donor-logo-salt" src="/images/logos/salt.svg">
                                                                                @elseif($microProjectA[$i+$j]->MPE_Donor=='3')
                                                                                    <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                                @elseif($microProjectA[$i+$j]->MPE_Donor=='5')
                                                                                    <img class="donor-logo-kia" src="/images/logos/kia.svg">
                                                                                @elseif($microProjectA[$i+$j]->MPE_Donor=='7')
                                                                                    <img class="donor-logo-salt" src="/images/logos/if.svg">
                                                                                @elseif($microProjectA[$i+$j]->MPE_Donor=='8')
                                                                                    <img class="donor-logo-louver" src="/images/logos/hungary.svg">
                                                                                @elseif($microProjectA[$i+$j]->MPE_Donor=='9')
                                                                                    <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                                @elseif($microProjectA[$i+$j]->MPE_Donor=='10')
                                                                                    <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                                @elseif($microProjectA[$i+$j]->MPE_Donor=='11')
                                                                                    <img class="donor-logo-salt " src="/images/logos/acn.svg">
                                                                                @endif
                                                                                @if($microProjectA[$i+$j]->MPE_PartnerName == '0' and $microProjectA[$i+$j]->MPE_PartnerName2 == '0')
                                                                                    <p>
                                                                                        <strong> @lang('main.beneficiary')</strong> {{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName)}}
                                                                                    </p>
                                                                                @elseif($microProjectA[$i+$j]->MPE_PartnerName != '0' and $microProjectA[$i+$j]->MPE_PartnerName2 == '0')
                                                                                    <p>
                                                                                        <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectA[$i+$j]->MPE_PartnerName)}}
                                                                                    </p>
                                                                                @elseif($microProjectA[$i+$j]->MPE_PartnerName != '0' and $microProjectA[$i+$j]->MPE_PartnerName2 != '0')
                                                                                    <p>
                                                                                        <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectA[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectA[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectA[$i+$j]->MPE_PartnerName2)}}
                                                                                    </p>
                                                                                @endif
                                                                                @if($microProjectA[$i+$j]->MPE_FundedDate != NULL)
                                                                                    <p>
                                                                                        <strong> @lang('projects.fundDate')</strong> {{date('m/Y',strtotime($microProjectA[$i+$j]->MPE_FundedDate))}}
                                                                                    </p>
                                                                                @endif
                                                                                @if($microProjectA[$i+$j]->DOB != '0')
                                                                                    <p>
                                                                                        <strong> @lang('projects.age') </strong> {{ \Carbon\Carbon::createFromDate($microProjectA[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')
                                                                                    </p>
                                                                                @endif
                                                                                @if($microProjectA[$i+$j]->FamilyMembers != '0')
                                                                                    <p>
                                                                                        <strong> @lang('projects.family')  </strong> {{$microProjectA[$i+$j]->FamilyMembers}}
                                                                                    </p>
                                                                                @endif
                                                                                @if($microProjectA[$i+$j]->$language->MPE_ExpSkill != '')
                                                                                    <p>
                                                                                        <strong> @lang('projects.skills') </strong> {{$microProjectA[$i+$j]->$language->MPE_ExpSkill}}
                                                                                    </p>
                                                                                @endif
                                                                                <br>
                                                                                <div class="clearfix">
                                                                                    <p class="p-justify">{!!$microProjectA[$i+$j]->$language->MPE_Suffering!!}</p>
                                                                                </div>
                                                                                <br>
                                                                                <a class="cpy-link" onclick="copyTextA({{$microProjectA[$i+$j]->id}})">@lang('main.cpyLink')</a>
                                                                                <textarea id="txt{{$microProjectA[$i+$j]->id}}" style="display: none;"></textarea>
                                                                                @if($microProjectA[$i+$j]->MPE_Location != '0')
                                                                                    <img src="/images/projects/tracker.png" id="tracker-img">
                                                                                    <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectA[$i+$j]->MPE_Location}}"
                                                                                       id="info-link"
                                                                                       target="_blank"> @lang('main.seeOnMap')
                                                                                    </a>
                                                                                @endif
                                                                                <br>
                                                                                <br>
                                                                                @if($microProjectA[$i+$j]->MPE_Video != '0')
                                                                                    <div class="video">
                                                                                        <iframe
                                                                                                src="{{$microProjectA[$i+$j]->MPE_Video}}"
                                                                                                frameborder="0"
                                                                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                                allowfullscreen>
                                                                                        </iframe>
                                                                                    </div>
                                                                                    <hr style="border-color: #43484E;">
                                                                                @endif
                                                                                <div id="fb-root"></div>
                                                                                <div class="fb-comments"
                                                                                     data-href="https://hcsyria.org/micro-projects#project{{$microProjectA[$i+$j]->MicroProject_ID}}"
                                                                                     data-width="100%" data-numposts="3">
                                                                                </div>
                                                                                <br>
                                                                                <div class="text-center swipe-arrows">
                                                                                    <i class="fa fa-angle-double-up"></i>
                                                                                    <p>@lang('main.swipeUp')</p>
                                                                                </div>
                                                                                <div class="swipe-to-close" id="swipe-to-close-{{$i+$j}}"></div>
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
                                @endif
                            @endfor
                            @if($projectCopyA !== 'none')
                                <div class="modal fade project-detail" id="project-detail-copy"
                                     tabindex="-1" role="dialog" aria-hidden="true">
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
                                                        @foreach($projectCopyA->images as $image)
                                                            <li data-target="#project-carousel-copy" data-slide-to="{{$k++}}"
                                                                @if($k == 1)class="active" @endif></li>
                                                        @endforeach
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <?php $k = 0 ?>
                                                        @foreach($projectCopyA->images as $image)
                                                            <div class="item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-copy"
                                                                   data-caption="{{ucfirst($projectCopyA->$language->MPE_Name)}}" >
                                                                    <img src="{{$image->MPI_Path}}">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div><!--/.carousel-inner-->
                                                    <a class="left carousel-control"
                                                       href="#project-carousel-copy"
                                                       data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control"
                                                       href="#project-carousel-copy"
                                                       data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div id="modal-swipe-copy">
                                                    <h2>{{ucfirst($projectCopyA->$language->MPE_Name)}}</h2>
                                                    <br>
                                                    @if($projectCopyA->MPE_Donor=='1')
                                                        <img class="donor-logo-caritas" src="/images/logos/caritas.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='2')
                                                        <img class="donor-logo-salt" src="/images/logos/salt.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='3')
                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='5')
                                                        <img class="donor-logo-kia" src="/images/logos/kia.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='7')
                                                        <img class="donor-logo-salt" src="/images/logos/if.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='8')
                                                        <img class="donor-logo-louver" src="/images/logos/hungary.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='9')
                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='10')
                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                    @elseif($projectCopyA->MPE_Donor=='11')
                                                        <img class="donor-logo-salt " src="/images/logos/acn.svg">
                                                    @endif
                                                    @if($projectCopyA->MPE_PartnerName == '0' and $projectCopyA->MPE_PartnerName2 == '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiary')</strong> {{ucfirst($projectCopyA->MPE_BeneficiaryName)}}
                                                        </p>
                                                    @elseif($projectCopyA->MPE_PartnerName != '0' and $projectCopyA->MPE_PartnerName2 == '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiaries')</strong> {{ucfirst($projectCopyA->MPE_BeneficiaryName) .', '. ucfirst($projectCopyA->MPE_PartnerName)}}
                                                        </p>
                                                    @elseif($projectCopyA->MPE_PartnerName != '0' and $projectCopyA->MPE_PartnerName2 != '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiaries')</strong> {{ucfirst($projectCopyA->MPE_BeneficiaryName) .', '. ucfirst($projectCopyA->MPE_PartnerName) .', '.ucfirst($projectCopyA->MPE_PartnerName2)}}
                                                        </p>
                                                    @endif
                                                    @if($projectCopyA->MPE_FundedDate != NULL)
                                                        <p>
                                                            <strong> @lang('projects.fundDate')</strong> {{date('m/Y',strtotime($projectCopyA->MPE_FundedDate))}}
                                                        </p>
                                                    @endif
                                                    @if($projectCopyA->DOB != '0')
                                                        <p>
                                                            <strong> @lang('projects.age') </strong> {{ \Carbon\Carbon::createFromDate($projectCopyA->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')
                                                        </p>
                                                    @endif
                                                    @if($projectCopyA->FamilyMembers != '0')
                                                        <p>
                                                            <strong> @lang('projects.family')  </strong> {{$projectCopyA->FamilyMembers}}
                                                        </p>
                                                    @endif
                                                    @if($projectCopyA->$language->MPE_ExpSkill != '')
                                                        <p>
                                                            <strong> @lang('projects.skills') </strong> {{$projectCopyA->$language->MPE_ExpSkill}}
                                                        </p>
                                                    @endif
                                                    <br>
                                                    <div class="clearfix">
                                                        <p class="p-justify">{!!$projectCopyA->$language->MPE_Suffering!!}</p>
                                                    </div>
                                                    <br>
                                                    <a class="cpy-link" onclick="copyTextA({{$projectCopyA->id}})">@lang('main.cpyLink')</a>
                                                    <textarea id="txt{{$projectCopyA->id}}" style="display: none;"></textarea>
                                                    @if($projectCopyA->MPE_Location != '0')
                                                        <img src="/images/projects/tracker.png" id="tracker-img">
                                                        <a href="https://www.google.com/maps/search/?api=1&query={{$projectCopyA->MPE_Location}}"
                                                           id="info-link"
                                                           target="_blank"> @lang('main.seeOnMap')
                                                        </a>
                                                    @endif
                                                    <br>
                                                    <br>
                                                    @if($projectCopyA->MPE_Video != '0')
                                                        <div class="video">
                                                            <iframe
                                                                    src="{{$projectCopyA->MPE_Video}}"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen>
                                                            </iframe>
                                                        </div>
                                                        <hr style="border-color: #43484E;">
                                                    @endif
                                                    <div id="fb-root"></div>
                                                    <div class="fb-comments"
                                                         data-href="https://hcsyria.org/micro-projects#project{{$projectCopyA->MicroProject_ID}}"
                                                         data-width="100%" data-numposts="3">
                                                    </div>
                                                    <br>
                                                    <div class="text-center swipe-arrows">
                                                        <i class="fa fa-angle-double-up"></i>
                                                        <p>@lang('main.swipeUp')</p>
                                                    </div>
                                                    <div class="swipe-to-close" id="swipe-to-close-copy"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor

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
                        {{--<iframe class="projects-map"--}}
                                {{--frameborder="0" style="border:0"--}}
                                {{--src="https://www.google.com/maps/d/embed?mid=1XDG-J7PRspsDf8saLVR6-hfqD-QgjD2x"--}}
                                {{--height="600px">--}}
                        {{--</iframe>--}}
                        <div id='aleppo_map' class="map" style="height: 500px;"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="homs">
                <div class="media">
                    <div class="media-body">
                        @if(count($microProjectH)==0)
                            <h3 class="text-center" style="margin-top: 50px">@lang('projects.sorryMessage1')</h3>
                            <br>
                            <ul>
                                <li><h5>@lang('projects.sorryMessage2')</h5></li>
                            </ul>
                        @endif
                        @for($i = 0; $i<count($microProjectH); $i = $i + 1)
                            @for($j = 0; $j<1; $j++)
                                @if($i+$j < count($microProjectH))
                                    <div class="row" style="overflow: hidden;">
                                        <div class="col-xs-10 col-md-6">
                                            <h3 class="project-title">{{ucfirst($microProjectH[$i+$j]->$language->MPE_Name)}}
                                                <a  onclick="copyTextH({{$microProjectH[$i+$j]->id}})"
                                                    class="video-ico cpy-link" >
                                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                                </a>
                                                @if($microProjectH[$i+$j]->MPE_Location != '0')
                                                    <a  href="https://www.google.com/maps/search/?api=1&query={{$microProjectH[$i+$j]->MPE_Location}}"
                                                        class="video-ico" target="_blank">
                                                        <i class="fa fa-map-marker" ></i>
                                                    </a>
                                                @endif
                                                @if($microProjectH[$i+$j]->MPE_Video != '0')
                                                    <a  href="#" class="video-ico launch-modal" data-modal-id="modal-video-{{$i+$j}}">
                                                        <i class="fa fa-video-camera"></i>
                                                    </a>
                                                    <!-- MODAL -->
                                                    <div class="modal fade" id="modal-video-{{$i+$j}}" tabindex="-1" role="dialog" aria-labelledby="modal-video-label">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="modal-video">
                                                                        <div class="video ">
                                                                            <iframe class="embed-responsive-item" src="{{$microProjectH[$i+$j]->MPE_Video}}"
                                                                                    frameborder="0"
                                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                    allowfullscreen
                                                                                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <textarea id="txt{{$microProjectH[$i+$j]->id}}" style="display: none;"></textarea>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class=" projects-height" style="margin-bottom: 0px;">
                                        <div class=" single-project">
                                            <div class="col-md-5">
                                                <div id="project-carousel-H-{{$i+$j}}" class="carousel slide touch-slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php $k = 0 ?>
                                                        @foreach($microProjectH[$i+$j]->images as $image)
                                                            <div class="item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-H-{{$i+$j}}"
                                                                   data-caption="{{ucfirst($microProjectH[$i+$j]->$language->MPE_Name)}}"><img
                                                                            src="{{$image->MPI_Path}}"></a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="left carousel-control"
                                                       href="#project-carousel-H-{{$i+$j}}"
                                                       data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control"
                                                       href="#project-carousel-H-{{$i+$j}}"
                                                       data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-xs-10 " style="margin-left: -15px;">
                                                        <ul class="post-meta" >
                                                            <li>
                                                                @if($microProjectH[$i+$j]->MPE_PartnerName == '0' and $microProjectH[$i+$j]->MPE_PartnerName2 == '0')
                                                                    <strong> @lang('main.beneficiary')</strong> {{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName)}}
                                                                @elseif($microProjectH[$i+$j]->MPE_PartnerName != '0' and $microProjectH[$i+$j]->MPE_PartnerName2 == '0')
                                                                    <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectH[$i+$j]->MPE_PartnerName)}}
                                                                @elseif($microProjectH[$i+$j]->MPE_PartnerName != '0' and $microProjectH[$i+$j]->MPE_PartnerName2 != '0')
                                                                    <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectH[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectH[$i+$j]->MPE_PartnerName2)}}
                                                                @endif
                                                            </li>
                                                            @if($microProjectH[$i+$j]->MPE_FundedDate !=  NULL)
                                                                <li><strong> @lang('projects.fundDate')</strong> {{date('m/Y',strtotime($microProjectH[$i+$j]->MPE_FundedDate))}}</li>
                                                            @endif
                                                            @if($microProjectH[$i+$j]->DOB != '0' )
                                                                <li> <strong> @lang('projects.age') </strong> {{\Carbon\Carbon::createFromDate($microProjectH[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years') </li>
                                                            @endif
                                                            @if($microProjectH[$i+$j]->FamilyMembers != '0' )
                                                                <li> <strong> @lang('projects.family')  </strong> {{$microProjectH[$i+$j]->FamilyMembers}} </li>
                                                            @endif
                                                            @if($microProjectH[$i+$j]->$language->MPE_ExpSkill != '' )
                                                                <li> <strong> @lang('projects.skills') </strong> {{$microProjectH[$i+$j]->$language->MPE_ExpSkill}}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <br>
                                                        @if($microProjectH[$i+$j]->MPE_Donor=='1')
                                                            <img class="donor-logo2 donor-logo-caritas " src="/images/logos/caritas.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='2')
                                                            <img class="donor-logo2 donor-logo-salt " src="/images/logos/salt.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='3')
                                                            <img class="donor-logo2 donor-logo-louver " src="/images/logos/loeuvre.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='5')
                                                            <img class="donor-logo2 donor-logo-kia " src="/images/logos/kia.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='7')
                                                            <img class="donor-logo2 donor-logo-salt " src="/images/logos/if.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='8')
                                                            <img class="donor-logo2 donor-logo-hungary " src="/images/logos/hungary.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='9')
                                                            <img class="donor-logo2 donor-logo-louver " src="/images/logos/loeuvre.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='10')
                                                            <img class="donor-logo2 donor-logo-louver " src="/images/logos/loeuvre.svg">
                                                        @elseif($microProjectH[$i+$j]->MPE_Donor=='11')
                                                            <img class="donor-logo2 donor-logo-salt " src="/images/logos/acn.svg">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="project-content" >
                                                        @if(strlen($microProjectH[$i+$j]->$language->MPE_Suffering)>800)
                                                            <p>{!!implode(' ', array_slice(explode(' ', $microProjectH[$i+$j]->$language->MPE_Suffering), 0, 80)).'...'!!}</p>
                                                            <br>
                                                            <a href="#" class="btn btn-primary" id="btn-primary-{{$i+$j}}"
                                                               data-toggle="modal"
                                                               data-target="#project-detail-{{$microProjectH[$i+$j]->id}}">@lang('main.readMore')
                                                            </a>
                                                            {{--MODAL--}}
                                                            <div class="modal fade project-detail" id="project-detail-{{$microProjectH[$i+$j]->id}}"
                                                                 tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button type="button" class="close" id="close-H-{{$i+$j}}"
                                                                                    data-dismiss="modal" aria-hidden="true">
                                                                                &times;
                                                                            </button>
                                                                            <div id="projectH-carousel-{{$i+$j}}"
                                                                                 class="carousel slide touch-slide"
                                                                                 data-ride="carousel">
                                                                                <ol class="carousel-indicators">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectH[$i+$j]->images as $image)
                                                                                        <li data-target="#projectH-carousel-{{$i+$j}}" data-slide-to="{{$k++}}"
                                                                                            @if($k == 1)class="active" @endif></li>
                                                                                    @endforeach
                                                                                </ol>
                                                                                <div class="carousel-inner">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectH[$i+$j]->images as $image)
                                                                                        <div class="item @if($k++ == 0) active @endif">
                                                                                            <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                               data-fancybox="gallery-{{$i+$j}}"
                                                                                               data-caption="{{ucfirst($microProjectH[$i+$j]->$language->MPE_Name)}}" >
                                                                                                <img src="{{$image->MPI_Path}}">
                                                                                            </a>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div><!--/.carousel-inner-->
                                                                                <a class="left carousel-control"
                                                                                   href="#projectH-carousel-{{$i+$j}}"
                                                                                   data-slide="prev">
                                                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                                                    <span class="sr-only">Previous</span>
                                                                                </a>
                                                                                <a class="right carousel-control"
                                                                                   href="#projectH-carousel-{{$i+$j}}"
                                                                                   data-slide="next">
                                                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                                                                    <span class="sr-only">Next</span>
                                                                                </a>
                                                                            </div>
                                                                            <div id="modal-swipe-{{$i+$j}}">
                                                                                <h2>{{ucfirst($microProjectH[$i+$j]->$language->MPE_Name)}}</h2>
                                                                                <br>
                                                                                @if($microProjectH[$i+$j]->MPE_Donor=='1')
                                                                                    <img class="donor-logo-caritas" src="/images/logos/caritas.svg">
                                                                                @elseif($microProjectH[$i+$j]->MPE_Donor=='2')
                                                                                    <img class="donor-logo-salt" src="/images/logos/salt.svg">
                                                                                @elseif($microProjectH[$i+$j]->MPE_Donor=='3')
                                                                                    <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                                @elseif($microProjectH[$i+$j]->MPE_Donor=='5')
                                                                                    <img class="donor-logo-kia" src="/images/logos/kia.svg">
                                                                                @elseif($microProjectH[$i+$j]->MPE_Donor=='7')
                                                                                    <img class="donor-logo-salt" src="/images/logos/if.svg">
                                                                                @elseif($microProjectH[$i+$j]->MPE_Donor=='8')
                                                                                    <img class="donor-logo-louver" src="/images/logos/hungary.svg">
                                                                                @elseif($microProjectH[$i+$j]->MPE_Donor=='9')
                                                                                    <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                                @elseif($microProjectH[$i+$j]->MPE_Donor=='10')
                                                                                    <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                                @elseif($microProjectH[$i+$j]->MPE_Donor=='11')
                                                                                    <img class="donor-logo-salt " src="/images/logos/acn.svg">
                                                                                @endif
                                                                                @if($microProjectH[$i+$j]->MPE_PartnerName == '0' and $microProjectH[$i+$j]->MPE_PartnerName2 == '0')
                                                                                    <p>
                                                                                        <strong> @lang('main.beneficiary')</strong> {{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName)}}
                                                                                    </p>
                                                                                @elseif($microProjectH[$i+$j]->MPE_PartnerName != '0' and $microProjectH[$i+$j]->MPE_PartnerName2 == '0')
                                                                                    <p>
                                                                                        <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectH[$i+$j]->MPE_PartnerName)}}
                                                                                    </p>
                                                                                @elseif($microProjectH[$i+$j]->MPE_PartnerName != '0' and $microProjectH[$i+$j]->MPE_PartnerName2 != '0')
                                                                                    <p>
                                                                                        <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectH[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectH[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectH[$i+$j]->MPE_PartnerName2)}}
                                                                                    </p>
                                                                                @endif
                                                                                <p>
                                                                                    <strong> @lang('projects.fundDate')</strong> {{date('m/Y',strtotime($microProjectH[$i+$j]->MPE_FundedDate))}}
                                                                                </p>

                                                                                @if($microProjectH[$i+$j]->DOB != '0')
                                                                                    <p>
                                                                                        <strong> @lang('projects.age') </strong> {{ \Carbon\Carbon::createFromDate($microProjectH[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')
                                                                                    </p>
                                                                                @endif
                                                                                @if($microProjectH[$i+$j]->FamilyMembers != '0')
                                                                                    <p>
                                                                                        <strong> @lang('projects.family')  </strong> {{$microProjectH[$i+$j]->FamilyMembers}}
                                                                                    </p>
                                                                                @endif
                                                                                @if($microProjectH[$i+$j]->$language->MPE_ExpSkill != '' )
                                                                                    <p>
                                                                                        <strong> @lang('projects.skills') </strong> {{$microProjectH[$i+$j]->$language->MPE_ExpSkill}}
                                                                                    </p>
                                                                                @endif
                                                                                <br>
                                                                                <div class="clearfix">
                                                                                    <p class="p-justify">{!!$microProjectH[$i+$j]->$language->MPE_Suffering!!}</p>
                                                                                </div>
                                                                                <br>
                                                                                <a class="cpy-link" onclick="copyTextH({{$microProjectH[$i+$j]->id}})">@lang('main.cpyLink')</a>
                                                                                <textarea id="txt{{$microProjectH[$i+$j]->id}}" style="display: none;"></textarea>
                                                                                @if($microProjectH[$i+$j]->MPE_Location != '0')
                                                                                    <img src="/images/projects/tracker.png" id="tracker-img">
                                                                                    <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectH[$i+$j]->MPE_Location}}"
                                                                                       id="info-link"
                                                                                       target="_blank"> @lang('main.seeOnMap')
                                                                                    </a>
                                                                                @endif
                                                                                <br>
                                                                                <br>
                                                                                @if($microProjectH[$i+$j]->MPE_Video != '0')
                                                                                    <div class="video">
                                                                                        <iframe
                                                                                                src="{{$microProjectH[$i+$j]->MPE_Video}}"
                                                                                                frameborder="0"
                                                                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                                allowfullscreen>
                                                                                        </iframe>
                                                                                    </div>
                                                                                    <hr style="border-color: #43484E;">
                                                                                @endif
                                                                                <div id="fb-root"></div>
                                                                                <div class="fb-comments"
                                                                                     data-href="https://hcsyria.org/micro-projects#project{{$microProjectH[$i+$j]->MicroProject_ID}}"
                                                                                     data-width="100%" data-numposts="3">
                                                                                </div>
                                                                                <br>
                                                                                <div class="text-center swipe-arrows">
                                                                                    <i class="fa fa-angle-double-up"></i>
                                                                                    <p>@lang('main.swipeUp')</p>
                                                                                </div>
                                                                                <div class="swipe-to-close" id="swipe-to-close-H-{{$i+$j}}"></div>
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
                                @endif
                            @endfor
                            @if($projectCopyH !== 'none')
                                <div class="modal fade project-detail" id="project-H-detail-copy"
                                     tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" id="close-copy-H"
                                                        data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <div id="project-carousel-copy"
                                                     class="carousel slide touch-slide"
                                                     data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <?php $k = 0 ?>
                                                        @foreach($projectCopyH->images as $image)
                                                            <li data-target="#project-carousel-copy" data-slide-to="{{$k++}}"
                                                                @if($k == 1)class="active" @endif></li>
                                                        @endforeach
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <?php $k = 0 ?>
                                                        @foreach($projectCopyH->images as $image)
                                                            <div class="item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-copy"
                                                                   data-caption="{{ucfirst($projectCopyH->$language->MPE_Name)}}" >
                                                                    <img src="{{$image->MPI_Path}}">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div><!--/.carousel-inner-->
                                                    <a class="left carousel-control"
                                                       href="#project-carousel-copy"
                                                       data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control"
                                                       href="#project-carousel-copy"
                                                       data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div id="modal-swipe-copy">
                                                    <h2>{{ucfirst($projectCopyH->$language->MPE_Name)}}</h2>
                                                    <br>
                                                    @if($projectCopyH->MPE_Donor=='1')
                                                        <img class="donor-logo-caritas" src="/images/logos/caritas.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='2')
                                                        <img class="donor-logo-salt" src="/images/logos/salt.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='3')
                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='5')
                                                        <img class="donor-logo-kia" src="/images/logos/kia.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='7')
                                                        <img class="donor-logo-salt" src="/images/logos/if.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='8')
                                                        <img class="donor-logo-louver" src="/images/logos/hungary.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='9')
                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='10')
                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                    @elseif($projectCopyH->MPE_Donor=='11')
                                                        <img class="donor-logo-salt " src="/images/logos/acn.svg">
                                                    @endif
                                                    @if($projectCopyH->MPE_PartnerName == '0' and $projectCopyH->MPE_PartnerName2 == '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiary')</strong> {{ucfirst($projectCopyH->MPE_BeneficiaryName)}}
                                                        </p>
                                                    @elseif($projectCopyH->MPE_PartnerName != '0' and $projectCopyH->MPE_PartnerName2 == '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiaries')</strong> {{ucfirst($projectCopyH->MPE_BeneficiaryName) .', '. ucfirst($projectCopyH->MPE_PartnerName)}}
                                                        </p>
                                                    @elseif($projectCopyH->MPE_PartnerName != '0' and $projectCopyH->MPE_PartnerName2 != '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiaries')</strong> {{ucfirst($projectCopyH->MPE_BeneficiaryName) .', '. ucfirst($projectCopyH->MPE_PartnerName) .', '.ucfirst($projectCopyH->MPE_PartnerName2)}}
                                                        </p>
                                                    @endif
                                                    @if($projectCopyH->MPE_FundedDate != NULL)
                                                        <p>
                                                            <strong> @lang('projects.fundDate')</strong> {{date('m/Y',strtotime($projectCopyH->MPE_FundedDate))}}
                                                        </p>
                                                    @endif
                                                    @if($projectCopyH->DOB != '0' )
                                                        <p>
                                                            <strong> @lang('projects.age') </strong> {{ \Carbon\Carbon::createFromDate($projectCopyH->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')
                                                        </p>
                                                    @endif
                                                    @if($projectCopyH->FamilyMembers != '0' )
                                                        <p>
                                                            <strong> @lang('projects.family')  </strong> {{$projectCopyH->FamilyMembers}}
                                                        </p>
                                                    @endif
                                                    @if($projectCopyH->$language->MPE_ExpSkill != '' )
                                                        <p>
                                                            <strong> @lang('projects.skills') </strong> {{$projectCopyH->$language->MPE_ExpSkill}}
                                                        </p>
                                                    @endif
                                                    <br>
                                                    <div class="clearfix">
                                                        <p class="p-justify">{!!$projectCopyH->$language->MPE_Suffering!!}</p>
                                                    </div>
                                                    <br>
                                                    <a class="cpy-link" onclick="copyTextH({{$projectCopyH->id}})">@lang('main.cpyLink')</a>
                                                    <textarea id="txt{{$projectCopyH->id}}" style="display: none;"></textarea>
                                                    @if($projectCopyH->MPE_Location != '0')
                                                        <img src="/images/projects/tracker.png" id="tracker-img">
                                                        <a href="https://www.google.com/maps/search/?api=1&query={{$projectCopyH->MPE_Location}}"
                                                           id="info-link"
                                                           target="_blank"> @lang('main.seeOnMap')
                                                        </a>
                                                    @endif
                                                    <br>
                                                    <br>
                                                    @if($projectCopyH->MPE_Video != '0')
                                                        <div class="video">
                                                            <iframe
                                                                    src="{{$projectCopyH->MPE_Video}}"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen>
                                                            </iframe>
                                                        </div>
                                                        <hr style="border-color: #43484E;">
                                                    @endif
                                                    <div id="fb-root"></div>
                                                    <div class="fb-comments"
                                                         data-href="https://hcsyria.org/micro-projects#project{{$projectCopyH->MicroProject_ID}}"
                                                         data-width="100%" data-numposts="3">
                                                    </div>
                                                    <br>
                                                    <div class="text-center swipe-arrows">
                                                        <i class="fa fa-angle-double-up"></i>
                                                        <p>@lang('main.swipeUp')</p>
                                                    </div>
                                                    <div class="swipe-to-close" id="swipe-to-close-H-copy"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor

                        <div class="text-center">
                            @if($search != '' && $donor != '')
                                {{$microProjectH->appends(['search' => $search,'donor' => $donor, 'microProjectH' => $microProjectH->currentPage()])->links() }}
                            @elseif($search != '' &&  $donor == '')
                                {{$microProjectH->appends(['search' => $search,'microProjectH' => $microProjectH->currentPage()])->links() }}
                            @elseif($search == '' &&  $donor != '')
                                {{$microProjectH->appends(['donor' => $donor, 'microProjectH' => $microProjectH->currentPage()])->links() }}
                            @else
                                {{$microProjectH->appends(['microProjectH' => $microProjectH->currentPage()])->links() }}
                            @endif
                        </div>
                        <div id='homs_map' class="map"></div>
                        {{--<iframe class="projects-map"--}}
                                {{--frameborder="0" style="border:0"--}}
                                {{--src="https://www.google.com/maps/d/embed?mid=1zMGVFu4F8KYGPnkRA8X95CUSWHNx0G5E"--}}
                                {{--height="600px">--}}
                        {{--</iframe>--}}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="damascus">
                <div class="media">
                    <div class="media-body">
                        @if(count($microProjectD)==0)
                            <h3 class="text-center" style="margin-top: 50px">@lang('projects.sorryMessage1')</h3>
                            <br>
                            <ul>
                                <li><h5>@lang('projects.sorryMessage2')</h5></li>
                            </ul>
                        @endif
                        @for($i = 0; $i<count($microProjectD); $i = $i + 1)
                            @for($j = 0; $j<1; $j++)
                                @if($i+$j < count($microProjectD))
                                    <div class="row" style="overflow: hidden;">
                                        <div class="col-xs-10 col-md-6">
                                            <h3 class="project-title">{{ucfirst($microProjectD[$i+$j]->$language->MPE_Name)}}
                                                <a  onclick="copyTextD({{$microProjectD[$i+$j]->id}})"
                                                    class="video-ico cpy-link" >
                                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                                </a>
                                                @if($microProjectD[$i+$j]->MPE_Location != '0')
                                                    <a  href="https://www.google.com/maps/search/?api=1&query={{$microProjectD[$i+$j]->MPE_Location}}"
                                                        class="video-ico" target="_blank">
                                                        <i class="fa fa-map-marker" ></i>
                                                    </a>
                                                @endif
                                                @if($microProjectD[$i+$j]->MPE_Video != '0')
                                                    <a  href="#" class="video-ico launch-modal" data-modal-id="modal-video-{{$i+$j}}">
                                                        <i class="fa fa-video-camera"></i>
                                                    </a>
                                                    <!-- MODAL -->
                                                    <div class="modal fade" id="modal-video-{{$i+$j}}" tabindex="-1" role="dialog" aria-labelledby="modal-video-label">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="modal-video">
                                                                        <div class="video ">
                                                                            <iframe class="embed-responsive-item" src="{{$microProjectD[$i+$j]->MPE_Video}}"
                                                                                    frameborder="0"
                                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                    allowfullscreen
                                                                                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <textarea id="txt{{$microProjectD[$i+$j]->id}}" style="display: none;"></textarea>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class=" projects-height" style="margin-bottom: 0px;">
                                        <div class=" single-project">
                                            <div class="col-md-5">
                                                <div id="project-carousel-D-{{$i+$j}}" class="carousel slide touch-slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php $k = 0 ?>
                                                        @foreach($microProjectD[$i+$j]->images as $image)
                                                            <div class="item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-D-{{$i+$j}}"
                                                                   data-caption="{{ucfirst($microProjectD[$i+$j]->$language->MPE_Name)}}"><img
                                                                            src="{{$image->MPI_Path}}"></a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="left carousel-control"
                                                       href="#project-carousel-D-{{$i+$j}}"
                                                       data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control"
                                                       href="#project-carousel-D-{{$i+$j}}"
                                                       data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-xs-10 " style="margin-left: -15px;">
                                                        <ul class="post-meta" >
                                                            <li>
                                                                @if($microProjectD[$i+$j]->MPE_PartnerName == '0' and $microProjectD[$i+$j]->MPE_PartnerName2 == '0')
                                                                    <strong> @lang('main.beneficiary')</strong> {{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName)}}
                                                                @elseif($microProjectD[$i+$j]->MPE_PartnerName != '0' and $microProjectD[$i+$j]->MPE_PartnerName2 == '0')
                                                                    <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectD[$i+$j]->MPE_PartnerName)}}
                                                                @elseif($microProjectD[$i+$j]->MPE_PartnerName != '0' and $microProjectD[$i+$j]->MPE_PartnerName2 != '0')
                                                                    <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectD[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectD[$i+$j]->MPE_PartnerName2)}}
                                                                @endif
                                                            </li>
                                                            @if($microProjectD[$i+$j]->MPE_FundedDate !=  NULL)
                                                                <li><strong> @lang('projects.fundDate')</strong> {{date('m/Y',strtotime($microProjectD[$i+$j]->MPE_FundedDate))}}</li>
                                                            @endif
                                                            @if($microProjectD[$i+$j]->DOB != '0' )
                                                                <li> <strong> @lang('projects.age') </strong> {{\Carbon\Carbon::createFromDate($microProjectD[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years') </li>
                                                            @endif
                                                            @if($microProjectD[$i+$j]->FamilyMembers != '0' )
                                                                <li> <strong> @lang('projects.family')  </strong> {{$microProjectD[$i+$j]->FamilyMembers}} </li>
                                                            @endif
                                                            @if($microProjectD[$i+$j]->$language->MPE_ExpSkill != '' )
                                                                <li> <strong> @lang('projects.skills') </strong> {{$microProjectD[$i+$j]->$language->MPE_ExpSkill}}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <br>
                                                        @if($microProjectD[$i+$j]->MPE_Donor=='1')
                                                            <img class="donor-logo2 donor-logo-caritas " src="/images/logos/caritas.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='2')
                                                            <img class="donor-logo2 donor-logo-salt " src="/images/logos/salt.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='3')
                                                            <img class="donor-logo2 donor-logo-louver " src="/images/logos/loeuvre.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='5')
                                                            <img class="donor-logo2 donor-logo-kia " src="/images/logos/kia.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='7')
                                                            <img class="donor-logo2 donor-logo-salt " src="/images/logos/if.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='8')
                                                            <img class="donor-logo2 donor-logo-hungary " src="/images/logos/hungary.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='9')
                                                            <img class="donor-logo2 donor-logo-louver " src="/images/logos/loeuvre.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='10')
                                                            <img class="donor-logo2 donor-logo-louver " src="/images/logos/loeuvre.svg">
                                                        @elseif($microProjectD[$i+$j]->MPE_Donor=='11')
                                                            <img class="donor-logo2 donor-logo-salt " src="/images/logos/acn.svg">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="project-content" >
                                                        @if(strlen($microProjectD[$i+$j]->$language->MPE_Suffering)>800)
                                                            <p>{!!implode(' ', array_slice(explode(' ', $microProjectD[$i+$j]->$language->MPE_Suffering), 0, 80)).'...'!!}</p>
                                                            <br>
                                                            <a href="#" class="btn btn-primary" id="btn-primary-{{$i+$j}}"
                                                               data-toggle="modal"
                                                               data-target="#project-detail-{{$microProjectD[$i+$j]->id}}">@lang('main.readMore')
                                                            </a>
                                                            {{--MODAL--}}
                                                            <div class="modal fade project-detail" id="project-detail-{{$microProjectD[$i+$j]->id}}"
                                                                 tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <button type="button" class="close" id="close-D-{{$i+$j}}"
                                                                                    data-dismiss="modal" aria-hidden="true">
                                                                                &times;
                                                                            </button>
                                                                            <div id="projectD-carousel-{{$i+$j}}"
                                                                                 class="carousel slide touch-slide"
                                                                                 data-ride="carousel">
                                                                                <ol class="carousel-indicators">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectD[$i+$j]->images as $image)
                                                                                        <li data-target="#projectD-carousel-{{$i+$j}}" data-slide-to="{{$k++}}"
                                                                                            @if($k == 1)class="active" @endif></li>
                                                                                    @endforeach
                                                                                </ol>
                                                                                <div class="carousel-inner">
                                                                                    <?php $k = 0 ?>
                                                                                    @foreach($microProjectD[$i+$j]->images as $image)
                                                                                        <div class="item @if($k++ == 0) active @endif">
                                                                                            <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                                               data-fancybox="gallery-{{$i+$j}}"
                                                                                               data-caption="{{ucfirst($microProjectD[$i+$j]->$language->MPE_Name)}}" >
                                                                                                <img src="{{$image->MPI_Path}}">
                                                                                            </a>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div><!--/.carousel-inner-->
                                                                                <a class="left carousel-control"
                                                                                   href="#projectD-carousel-{{$i+$j}}"
                                                                                   data-slide="prev">
                                                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                                                    <span class="sr-only">Previous</span>
                                                                                </a>
                                                                                <a class="right carousel-control"
                                                                                   href="#projectD-carousel-{{$i+$j}}"
                                                                                   data-slide="next">
                                                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                                                                    <span class="sr-only">Next</span>
                                                                                </a>
                                                                            </div>
                                                                            <div id="modal-swipe-{{$i+$j}}">
                                                                                <h2>{{ucfirst($microProjectD[$i+$j]->$language->MPE_Name)}}</h2>
                                                                                <br>
                                                                                @if($microProjectD[$i+$j]->MPE_Donor=='1')
                                                                                    <img class="donor-logo-caritas" src="/images/logos/caritas.svg">
                                                                                @elseif($microProjectD[$i+$j]->MPE_Donor=='2')
                                                                                    <img class="donor-logo-salt" src="/images/logos/salt.svg">
                                                                                @elseif($microProjectD[$i+$j]->MPE_Donor=='3')
                                                                                    <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                                @elseif($microProjectD[$i+$j]->MPE_Donor=='5')
                                                                                    <img class="donor-logo-kia" src="/images/logos/kia.svg">
                                                                                @elseif($microProjectD[$i+$j]->MPE_Donor=='7')
                                                                                    <img class="donor-logo-salt" src="/images/logos/if.svg">
                                                                                @elseif($microProjectD[$i+$j]->MPE_Donor=='8')
                                                                                    <img class="donor-logo-louver" src="/images/logos/hungary.svg">
                                                                                @elseif($microProjectD[$i+$j]->MPE_Donor=='9')
                                                                                    <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                                @elseif($microProjectD[$i+$j]->MPE_Donor=='10')
                                                                                    <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                                                @elseif($microProjectD[$i+$j]->MPE_Donor=='11')
                                                                                    <img class="donor-logo-salt " src="/images/logos/acn.svg">
                                                                                @endif
                                                                                @if($microProjectD[$i+$j]->MPE_PartnerName == '0' and $microProjectD[$i+$j]->MPE_PartnerName2 == '0')
                                                                                    <p>
                                                                                        <strong> @lang('main.beneficiary')</strong> {{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName)}}
                                                                                    </p>
                                                                                @elseif($microProjectD[$i+$j]->MPE_PartnerName != '0' and $microProjectD[$i+$j]->MPE_PartnerName2 == '0')
                                                                                    <p>
                                                                                        <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectD[$i+$j]->MPE_PartnerName)}}
                                                                                    </p>
                                                                                @elseif($microProjectD[$i+$j]->MPE_PartnerName != '0' and $microProjectD[$i+$j]->MPE_PartnerName2 != '0')
                                                                                    <p>
                                                                                        <strong> @lang('main.beneficiaries')</strong> {{ucfirst($microProjectD[$i+$j]->MPE_BeneficiaryName) .', '. ucfirst($microProjectD[$i+$j]->MPE_PartnerName) .', '.ucfirst($microProjectD[$i+$j]->MPE_PartnerName2)}}
                                                                                    </p>
                                                                                @endif
                                                                                @if($microProjectD[$i+$j]->MPE_FundedDate != NULL)
                                                                                    <p>
                                                                                        <strong> @lang('projects.fundDate')</strong> {{date('m/Y',strtotime($microProjectD[$i+$j]->MPE_FundedDate))}}
                                                                                    </p>
                                                                                @endif
                                                                                @if($microProjectD[$i+$j]->DOB != '0')
                                                                                    <p>
                                                                                        <strong> @lang('projects.age') </strong> {{ \Carbon\Carbon::createFromDate($microProjectD[$i+$j]->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')
                                                                                    </p>
                                                                                @endif
                                                                                @if($microProjectD[$i+$j]->FamilyMembers != '0')
                                                                                    <p>
                                                                                        <strong> @lang('projects.family')  </strong> {{$microProjectD[$i+$j]->FamilyMembers}}
                                                                                    </p>
                                                                                @endif
                                                                                @if($microProjectD[$i+$j]->$language->MPE_ExpSkill != '' )
                                                                                    <p>
                                                                                        <strong> @lang('projects.skills') </strong> {{$microProjectD[$i+$j]->$language->MPE_ExpSkill}}
                                                                                    </p>
                                                                                @endif
                                                                                <br>
                                                                                <div class="clearfix">
                                                                                    <p class="p-justify">{!!$microProjectD[$i+$j]->$language->MPE_Suffering!!}</p>
                                                                                </div>
                                                                                <br>
                                                                                <a class="cpy-link" onclick="copyTextD({{$microProjectD[$i+$j]->id}})">@lang('main.cpyLink')</a>
                                                                                <textarea id="txt{{$microProjectD[$i+$j]->id}}" style="display: none;"></textarea>
                                                                                @if($microProjectD[$i+$j]->MPE_Location != '0')
                                                                                    <img src="/images/projects/tracker.png" id="tracker-img">
                                                                                    <a href="https://www.google.com/maps/search/?api=1&query={{$microProjectD[$i+$j]->MPE_Location}}"
                                                                                       id="info-link"
                                                                                       target="_blank"> @lang('main.seeOnMap')
                                                                                    </a>
                                                                                @endif
                                                                                <br>
                                                                                <br>
                                                                                @if($microProjectD[$i+$j]->MPE_Video != '0')
                                                                                    <div class="video">
                                                                                        <iframe
                                                                                                src="{{$microProjectD[$i+$j]->MPE_Video}}"
                                                                                                frameborder="0"
                                                                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                                                allowfullscreen>
                                                                                        </iframe>
                                                                                    </div>
                                                                                    <hr style="border-color: #43484E;">
                                                                                @endif
                                                                                <div id="fb-root"></div>
                                                                                <div class="fb-comments"
                                                                                     data-href="https://hcsyria.org/micro-projects#project{{$microProjectD[$i+$j]->MicroProject_ID}}"
                                                                                     data-width="100%" data-numposts="3">
                                                                                </div>
                                                                                <br>
                                                                                <div class="text-center swipe-arrows">
                                                                                    <i class="fa fa-angle-double-up"></i>
                                                                                    <p>@lang('main.swipeUp')</p>
                                                                                </div>
                                                                                <div class="swipe-to-close" id="swipe-to-close-D-{{$i+$j}}"></div>
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
                                @endif
                            @endfor
                            @if($projectCopyD !== 'none')
                                <div class="modal fade project-detail" id="project-D-detail-copy"
                                     tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" id="close-copy-D"
                                                        data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <div id="project-carousel-copy"
                                                     class="carousel slide touch-slide"
                                                     data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <?php $k = 0 ?>
                                                        @foreach($projectCopyD->images as $image)
                                                            <li data-target="#project-carousel-copy" data-slide-to="{{$k++}}"
                                                                @if($k == 1)class="active" @endif></li>
                                                        @endforeach
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <?php $k = 0 ?>
                                                        @foreach($projectCopyD->images as $image)
                                                            <div class="item @if($k++ == 0) active @endif">
                                                                <a href="{{substr($image->MPI_Path, 0, -4).'b.jpg'}}"
                                                                   data-fancybox="gallery-copy"
                                                                   data-caption="{{ucfirst($projectCopyD->$language->MPE_Name)}}" >
                                                                    <img src="{{$image->MPI_Path}}">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div><!--/.carousel-inner-->
                                                    <a class="left carousel-control"
                                                       href="#project-carousel-copy"
                                                       data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control"
                                                       href="#project-carousel-copy"
                                                       data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <div id="modal-swipe-copy">
                                                    <h2>{{ucfirst($projectCopyD->$language->MPE_Name)}}</h2>
                                                    <br>
                                                    @if($projectCopyD->MPE_Donor=='1')
                                                        <img class="donor-logo-caritas" src="/images/logos/caritas.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='2')
                                                        <img class="donor-logo-salt" src="/images/logos/salt.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='3')
                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='5')
                                                        <img class="donor-logo-kia" src="/images/logos/kia.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='7')
                                                        <img class="donor-logo-salt" src="/images/logos/if.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='8')
                                                        <img class="donor-logo-louver" src="/images/logos/hungary.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='9')
                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='10')
                                                        <img class="donor-logo-louver" src="/images/logos/loeuvre.svg">
                                                    @elseif($projectCopyD->MPE_Donor=='11')
                                                        <img class="donor-logo-salt " src="/images/logos/acn.svg">
                                                    @endif
                                                    @if($projectCopyD->MPE_PartnerName == '0' and $projectCopyD->MPE_PartnerName2 == '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiary')</strong> {{ucfirst($projectCopyD->MPE_BeneficiaryName)}}
                                                        </p>
                                                    @elseif($projectCopyD->MPE_PartnerName != '0' and $projectCopyD->MPE_PartnerName2 == '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiaries')</strong> {{ucfirst($projectCopyD->MPE_BeneficiaryName) .', '. ucfirst($projectCopyD->MPE_PartnerName)}}
                                                        </p>
                                                    @elseif($projectCopyD->MPE_PartnerName != '0' and $projectCopyD->MPE_PartnerName2 != '0')
                                                        <p>
                                                            <strong> @lang('main.beneficiaries')</strong> {{ucfirst($projectCopyD->MPE_BeneficiaryName) .', '. ucfirst($projectCopyD->MPE_PartnerName) .', '.ucfirst($projectCopyD->MPE_PartnerName2)}}
                                                        </p>
                                                    @endif
                                                    @if($projectCopyD->MPE_FundedDate != NULL)
                                                        <p>
                                                            <strong> @lang('projects.fundDate')</strong> {{date('m/Y',strtotime($projectCopyD->MPE_FundedDate))}}
                                                        </p>
                                                    @endif
                                                    @if($projectCopyD->DOB != '0' )
                                                        <p>
                                                            <strong> @lang('projects.age') </strong> {{ \Carbon\Carbon::createFromDate($projectCopyD->DOB)->diff(\Carbon\Carbon::now())->format('%y')}} @lang('projects.years')
                                                        </p>
                                                    @endif
                                                    @if($projectCopyD->FamilyMembers != '0' )
                                                        <p>
                                                            <strong> @lang('projects.family')  </strong> {{$projectCopyD->FamilyMembers}}
                                                        </p>
                                                    @endif
                                                    @if($projectCopyD->$language->MPE_ExpSkill != '' )
                                                        <p>
                                                            <strong> @lang('projects.skills') </strong> {{$projectCopyD->$language->MPE_ExpSkill}}
                                                        </p>
                                                    @endif
                                                    <br>
                                                    <div class="clearfix">
                                                        <p class="p-justify">{!!$projectCopyD->$language->MPE_Suffering!!}</p>
                                                    </div>
                                                    <br>
                                                    <a class="cpy-link" onclick="copyTextD({{$projectCopyD->id}})">@lang('main.cpyLink')</a>
                                                    <textarea id="txt{{$projectCopyD->id}}" style="display: none;"></textarea>
                                                    @if($projectCopyD->MPE_Location != '0')
                                                        <img src="/images/projects/tracker.png" id="tracker-img">
                                                        <a href="https://www.google.com/maps/search/?api=1&query={{$projectCopyD->MPE_Location}}"
                                                           id="info-link"
                                                           target="_blank"> @lang('main.seeOnMap')
                                                        </a>
                                                    @endif
                                                    <br>
                                                    <br>
                                                    @if($projectCopyD->MPE_Video != '0')
                                                        <div class="video">
                                                            <iframe
                                                                    src="{{$projectCopyD->MPE_Video}}"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen>
                                                            </iframe>
                                                        </div>
                                                        <hr style="border-color: #43484E;">
                                                    @endif
                                                    <div id="fb-root"></div>
                                                    <div class="fb-comments"
                                                         data-href="https://hcsyria.org/micro-projects#project{{$projectCopyD->MicroProject_ID}}"
                                                         data-width="100%" data-numposts="3">
                                                    </div>
                                                    <br>
                                                    <div class="text-center swipe-arrows">
                                                        <i class="fa fa-angle-double-up"></i>
                                                        <p>@lang('main.swipeUp')</p>
                                                    </div>
                                                    <div class="swipe-to-close" id="swipe-to-close-D-copy"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor

                        <div class="text-center">
                            @if($search != '' && $donor != '' && $video)
                                {{$microProjectD->appends(['search' => $search,'donor' => $donor,'video'=>$video, 'microProjectH' => $microProjectD->currentPage()])->links() }}
                            @elseif($search != '' &&  $donor == '' && !$video)
                                {{$microProjectD->appends(['search' => $search,'microProjectH' => $microProjectD->currentPage()])->links() }}
                            @elseif($search != '' &&  $donor == '' && $video)
                                {{$microProjectD->appends(['search' => $search,'video'=>$video,'microProjectH' => $microProjectD->currentPage()])->links() }}
                            @elseif($search != '' &&  $donor != '' && !$video)
                                {{$microProjectD->appends(['search' => $search,'donor' => $donor,'microProjectH' => $microProjectD->currentPage()])->links() }}
                            @elseif($search == '' &&  $donor != '' && !$video)
                                {{$microProjectD->appends(['donor' => $donor, 'microProjectH' => $microProjectD->currentPage()])->links() }}
                            @elseif($search == '' &&  $donor != '' && $video)
                                {{$microProjectD->appends(['donor' => $donor,'video'=>$video, 'microProjectH' => $microProjectD->currentPage()])->links() }}
                            @elseif($search == '' &&  $donor == '' && $video)
                                {{$microProjectD->appends(['video'=>$video,$microProjectD->currentPage()])->links() }}
                            @else
                                {{$microProjectD->appends(['microProjectH' => $microProjectD->currentPage()])->links() }}
                            @endif
                        </div>
                            <div id='damas_map' class="map" style="height: 500px;"></div>
                        {{--<iframe class="projects-map"--}}
                                {{--frameborder="0" style="border:0"--}}
                                {{--src="https://www.google.com/maps/d/embed?mid=14lObohGdODQkQqFA1U6z7g25r4jndMlQ"--}}
                                {{--height="600px">--}}
                        {{--</iframe>--}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>

<script>
    let aleppoMap,homsMap,damasMap, markersAleppo = [],markersHoms = [],markersDamas = [];
    var iconDefault =  L.icon({
        iconRetinaUrl : '/images/ico/marker-icon-2x-red.png',
        iconUrl :'/images/ico/marker-icon-2x-red.png',
        shadowUrl:'/images/ico/marker-shadow.png',
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
            zoom: 11
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
    }
    function initDamasMap() {
        damasMap = L.map('damas_map', {
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
    setTimeout(()=>{
        initAleppoMap();
        initHomsMap();
        initDamasMap();
        initMarkers();
    },1500);
    /* --------------------------- Initialize Markers --------------------------- */
    function initMarkers() {
        @foreach($aleppoMap as $alepmap)
        var a_lat , a_long;
        var aleppo_location = "{{$alepmap['MPE_Location']}}";
        if(aleppo_location == 0)
        {
            a_lat=0;
            a_long=0;
        }
        else{
            a_lat = parseFloat(aleppo_location.split(',')[0]);
            a_long = parseFloat(aleppo_location.split(',')[1]);
        }
        if(a_lat !=0 && a_long !=0) {
            var a_marker = L.marker([a_lat, a_long], {icon: iconDefault});
            @if(app()->isLocale('en'))
            a_marker.addTo(aleppoMap).bindPopup(`<b>Project: {{{$alepmap['MPE_Name']}}} <br> Beneficiary: {{{$alepmap['MPE_BeneficiaryName']}}}</b>`);
            @else
            a_marker.addTo(aleppoMap).bindPopup(`<b>Projet: {{{$alepmap['MPE_Name']}}} <br> Bénéficiaire: {{{$alepmap['MPE_BeneficiaryName']}}}</b>`);
            @endif
            markersAleppo.push(a_marker);
        }
        @endforeach
        @foreach($homsMap as $homsmap)
        var h_lat , h_long;
        var homs_location = "{{$homsmap['MPE_Location']}}";
        if(homs_location == 0)
        {
            h_lat=0;
            h_long=0;
        }
        else{
            h_lat = parseFloat(homs_location.split(',')[0]);
            h_long = parseFloat(homs_location.split(',')[1]);
        }
        if(h_lat !=0 && h_long !=0){
            var h_marker = L.marker([h_lat,h_long],{icon:iconDefault});
            @if(app()->isLocale('en'))
            h_marker.addTo(homsMap).bindPopup(`<b>Project: {{{$homsmap['MPE_Name']}}} <br> Beneficiary: {{{$homsmap['MPE_BeneficiaryName']}}}</b>`);
            @else
            h_marker.addTo(homsMap).bindPopup(`<b>Projet: {{{$homsmap['MPE_Name']}}} <br> Bénéficiaire: {{{$homsmap['MPE_BeneficiaryName']}}}</b>`);
            @endif
            markersHoms.push(h_marker);
        }
        @endforeach
        @foreach($damasMap as $damasmap)
        var d_lat , d_long;
        var damas_location = "{{$damasmap['MPE_Location']}}";
        if(damas_location == 0)
        {
            d_lat=0;
            d_long=0;
        }
        else{
            d_lat = parseFloat(damas_location.split(',')[0]);
            d_long = parseFloat(damas_location.split(',')[1]);
        }
        if(d_lat !=0 && d_long !=0) {
            var d_marker = L.marker([d_lat, d_long], {icon: iconDefault});
            @if(app()->isLocale('en'))
            d_marker.addTo(damasMap).bindPopup(`<b>Project: {{{$damasmap['MPE_Name']}}} <br> Beneficiary: {{{$damasmap['MPE_BeneficiaryName']}}}</b>`);
            @else
            d_marker.addTo(damasMap).bindPopup(`<b>Projet: {{{$damasmap['MPE_Name']}}} <br> Bénéficiaire: {{{$damasmap['MPE_BeneficiaryName']}}}</b>`);
            @endif
            markersDamas.push(d_marker);
        }
        @endforeach
        {{--@endif--}}
    }
</script>
<script>
    var a_tab = document.getElementById('aleppoTab');
    var h_tab = document.getElementById('homsTab');
    var d_tab = document.getElementById('damasTab');
    a_tab.onclick = function(){
        setTimeout(()=>{
            aleppoMap.remove();
            initAleppoMap();
            initMarkers();
            L.Util.requestAnimFrame(aleppoMap.invalidateSize,aleppoMap,!1,aleppoMap._container);
        },1000);
    };
    h_tab.onclick = function(){
        setTimeout(()=>{
            homsMap.remove();
            initHomsMap();
            initMarkers();
            L.Util.requestAnimFrame(homsMap.invalidateSize,homsMap,!1,homsMap._container);
        },1000);
    };
    d_tab.onclick = function(){
        setTimeout(()=>{
            damasMap.remove();
            initDamasMap();
            initMarkers();
            L.Util.requestAnimFrame(damasMap.invalidateSize,damasMap,!1,damasMap._container);
        },1000);
    };
</script>
@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
<script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

<script>
    var url = location.href;
    if(url.includes('search') ||url.includes('donor')||url.includes('video'))
    $('html, body').animate({
    scrollTop: $('#donor-filter').offset().top
    }, 'slow');
</script>
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
    function copyTextA(id) {
        var el = document.getElementById('txt'+id);
        el.value = "https://hcsyria.org/projects/micro-projects/?projectA="+id+"/#aleppo";
        el.style.display = 'block';
        el.select();
        el.focus();
        document.execCommand('copy');
        el.style.display = 'none';
    }
    function copyTextH(id) {
        var el = document.getElementById('txt'+id);
        el.value = "https://hcsyria.org/projects/micro-projects/?projectH="+id+"/#homs";;
        el.style.display = 'block';
        el.select();
        el.focus();
        document.execCommand('copy');
        el.style.display = 'none';
    }
    function copyTextD(id) {
        var el = document.getElementById('txt'+id);
        el.value = "https://hcsyria.org/projects/micro-projects/?projectD="+id+"/#damascus";;
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
    let firstGetKey = window.location.search.split('=')[0];
    let firstGetValue = window.location.search.split('=')[1];
    if (firstGetKey.includes('search'))
    {
        firstGetValue = decodeURIComponent(firstGetValue);
        if(firstGetValue.includes('&'))
        {
            firstGetValue = firstGetValue.substr(0, firstGetValue.indexOf('&'));
        }
        document.getElementById('search-input').value = firstGetValue.replace(/\+/g, ' ').replace('undefined', '');
    }
    if(firstGetKey == '?projectA') {
        $('#project-detail-copy').modal('show');
    }
    else if(firstGetKey == '?projectH') {
        $('#project-H-detail-copy').modal('show');
    }
    else if(firstGetKey == '?projectD') {
        $('#project-D-detail-copy').modal('show');
    }

    if (firstGetKey.includes('microProjectA') || firstGetKey.includes('aleppo')) {
        firstGetValue = decodeURIComponent(firstGetValue);
        $('.nav-tabs a[href="#aleppo"]').tab('show');
    }
    else if (firstGetKey.includes('microProjectH') || firstGetKey.includes('homs')) {
        $('.nav-tabs a[href="#homs"]').tab('show');
        L.Util.requestAnimFrame(homsMap.invalidateSize,homsMap,!1,homsMap._container);

    }
    else if (firstGetKey.includes('microProjectD') || firstGetKey.includes('damascus')) {
        $('.nav-tabs a[href="#damascus"]').tab('show');
    }
    else
        $('.nav-tabs a[href="#aleppo"]').tab('show');
</script>
<script>
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
    }
    else if (url.match('tab=')) {
        $('.nav-tabs a[href=#'+url.split('tab=')[1]+']').tab('show') ;
    }

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
        $('tab_input').val(e.target.hash);
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
            @for($i = 0; $i<count($microProjectA); $i++)
            $("#swipe-to-close-{{$i}}").on('swipeup', function () {
                $("#close-{{$i}}").click();
            });
            @endfor
            @for($i = 0; $i<count($microProjectH); $i++)
            $("#swipe-to-close-H-{{$i}}").on('swipeup', function () {
                $("#close-H-{{$i}}").click();
            });
            @endfor
            @for($i = 0; $i<count($microProjectD); $i++)
            $("#swipe-to-close-D-{{$i}}").on('swipeup', function () {
                $("#close-D-{{$i}}").click();
            });
            @endfor
            $("#swipe-to-close-copy").on('swipeup', function () {
                $("#close-copy").click();
            });
            $("#swipe-to-close-H-copy").on('swipeup', function () {
                $("#close-H-copy").click();
            });
            $("#swipe-to-close-D-copy").on('swipeup', function () {
                $("#close-D-copy").click();
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
<script>
    $(".single-project").click(function () {
        $(this).next().modal('show');
    });
</script>
<script>
    $('.launch-modal').on('click', function(e){
        e.preventDefault();
        $( '#' + $(this).data('modal-id') ).modal();
    });
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
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
   function videoFilter(value){
       var url = window.location.href;
       if(window.location.href.includes('donor') || window.location.href.includes('search')){
           if(value.checked){
               if(url.includes('true'))
               var newURL= url.replace('&video=true', '');
               else var newURL= url.replace('&video=false', '');
               window.location.href = newURL + '&video='+ value.checked;
           }
           else{
               if(url.includes('true'))
               var newURL= url.replace('&video=true', '');
               else var newURL= url.replace('&video=false', '');
               window.location.href = newURL+ '&video='+ value.checked;
           }
       }
       else{
           if(value.checked){
               if(url.includes('true'))
               var newURL= url.replace('?video=true', '');
               else var newURL= url.replace('?video=false', '');
               window.location.href = newURL+ '?video='+ value.checked;
           }
           else{
               if(url.includes('true'))
                   var newURL= url.replace('?video=true', '');
               else var newURL= url.replace('?video=false', '');
               window.location.href = newURL+ '?video='+ value.checked;
           }
       }
    }
</script>
<script>
    $( document ).ready(function() {
        $('input[rel="tooltip"]').tooltip();
    });
</script>
@stack('navbar-scripts')
</body>
</html>
