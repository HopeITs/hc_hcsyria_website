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
    <meta name="apple-mobile-web-app-status-bar-style" content="#fff">
    <meta name="description" content="@lang('what_we_do.study')">
    <meta name="keywords" content="study zone , syria, hope center"/>
    <title>Study Zone</title>
    <link rel="canonical" href="https://hcsyria.org/projects/study-zone">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/projects.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/study-zone" />
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        #Study_all .nav-tabs {
            position: sticky;
            background: #FFF;
            z-index: 10;
        }

        #Study_all .nav-tabs>li>a {
            color:#285e8e;
            margin-right: 0;
            font-size: 20px;
            font-weight: 600;
        }

        #Study_all .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
            color: #f49a21;
            border-top: 3px solid #f49a21;
            border-radius: 0;
        }

        .single-project:hover.single-project .btn-primary {
            background-color:#285e8e;
            color:#fff;
            border-color:#fff;
            transition: all 0.7s ease 0s;
            -moz-transition: all 0.7s ease 0s;
            -webkit-transition: all 0.7s ease 0s;
            -o-transition: all 0.7s ease 0s;
        }
        .btn-primary-NF {
            color: #285e8e;
            font-size: 12px;
        }
        .single-project .btn-primary,
        .modal-body .btn-primary {
            text-transform: uppercase;
            border: 1px solid #285e8e;
            color: #285e8e;
            background-color: rgba(255, 255, 255, 0);
            border-radius: 0;
        }
        .single-project:hover.single-project .btn-primary:hover,
        .modal-body .btn-primary:hover {
            background-color:#285e8e;
            color:#fff;
        }

        .single-project:hover.single-project .btn-primary:hover,
        .modal-body .btn-primary:hover {
            background-color:#285e8e;
            color:#fff;
        }
    </style>

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
    $active = 'study';
@endphp

@include('public.navbar')

<section id="Study_all" class="page-start">
    <div style="margin-top: 50px;"></div>
    <div class="container">
        <div class="row text-center clearfix">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="row text-center">
                    <div class="search-container">
                        <form method="get" id="submit-form" action="{{route('public.studyzone.all','s')}}">
                            <div class="se">
                                <input id="search-input" type="text" placeholder="@lang('studyzone.search')" name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li><a href="#event" data-toggle="tab">@lang('studyzone.event')</a></li>
            <li><a href="#study" data-toggle="tab" style="font-weight: bold;">@lang('studyzone.study')</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade" id="event">
                <div class="media">
                    <div class="media-body">
                        @if(count($Events)==0)
                            <h3 class="text-center" style="margin-top: 50px">@lang('projects.sorryMessage1')</h3>
                            <br>
                            <ul>
                                <li><h5>@lang('projects.sorryMessage2')</h5></li>
                            </ul>
                        @endif
                        @for($i = 0; $i<count($Events); $i = $i + 3)
                            <div class="row projects-height">
                                @for($j = 0; $j<3; $j++)
                                    @if($i+$j < count($Events))
                                        <div class="col-sm-4">
                                            <div class="single-project" id="scroll-{{$i+$j}}" style="margin-bottom: 30px">
                                                <img src="{{$Events[$i+$j]->images[0]->path}}" alt=""/>
                                                @if($Events[$i+$j]->video != '0')
                                                    <a class="video-ico"><i class="fa fa-video-camera"></i></a>
                                                @endif
                                                <h2>{{ucfirst($Events[$i+$j]->lang->title)}}</h2>
                                                <ul class="post-meta">
                                                    <li>
                                                        <i class="fa fa-pencil-square-o"></i>
                                                        <strong> @lang('studyzone.place')</strong> {{ucfirst($Events[$i+$j]->place->name)}}
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-clock-o"></i> {{$Events[$i+$j]->lang->date_string}}
                                                    </li>
                                                </ul>
                                                <div class="project-content">
                                                    <p class="p-justify">{!!implode(' ', array_slice(explode(' ', $Events[$i+$j]->lang->description), 0, 20)).'...'!!}</p>
                                                </div>
                                                <a href="" class="btn btn-primary" id="btn-primary-{{$i+$j}}"
                                                   data-toggle="modal"
                                                   data-target="#project-detail-{{$Events[$i+$j]->id}}">@lang('main.readMore')</a>
                                            </div>
                                            <div class="modal fade project-detail" id="project-detail-{{$Events[$i+$j]->id}}"
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
                                                                    @foreach($Events[$i+$j]->images as $image)
                                                                        <li data-target="#project-carousel-{{$i+$j}}"
                                                                            data-slide-to="{{$k++}}"
                                                                            @if($k == 1)class="active" @endif></li>
                                                                    @endforeach
                                                                </ol>
                                                                <div class="carousel-inner">
                                                                    <?php $k = 0 ?>
                                                                    @foreach($Events[$i+$j]->images as $image)
                                                                        <div class="item @if($k++ == 0) active @endif">
                                                                            {{--<p id="p-date">{{date('d/m/Y',strtotime(exif_read_data(ltrim($image->path, '/'))['DateTimeOriginal']))}}</p>--}}
                                                                            <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                               data-fancybox="gallery-{{$i+$j}}"
                                                                               data-caption="{{ucfirst($Events[$i+$j]->lang->title)}}"><img
                                                                                    src="{{$image->path}}"></a>
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
                                                                <h2>{{ucfirst($Events[$i+$j]->lang->title)}}</h2>
                                                                <br>
                                                                <p>
                                                                    <strong>@lang('main.projectCity')</strong> {{$Events[$i+$j]->place->name}}
                                                                    <br>
                                                                    {!!$Events[$i+$j]->lang->description!!}
                                                                </p>
                                                                <br>
                                                                <div class="clearfix">
                                                                    <p class="p-justify">{!!$Events[$i+$j]->lang->content!!}</p>
                                                                </div>
                                                                <br>
                                                                <a class="cpy-link" onclick="copyTextE({{$Events[$i+$j]->id}})">@lang('main.cpyLink')</a>
                                                                <textarea id="txt{{$Events[$i+$j]->id}}" style="display: none;"></textarea>
                                                                <br>
                                                                <br>
                                                                @if($Events[$i+$j]->video != '0')
                                                                    <div class="video">
                                                                        <iframe
                                                                            src="{{$Events[$i+$j]->video}}"
                                                                            frameborder="0"
                                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                            allowfullscreen></iframe>
                                                                    </div>
                                                                    <hr style="border-color: #43484E;">
                                                                @endif
                                                                {{--<div id="fb-root"></div>--}}
                                                                {{--<div class="fb-comments"--}}
                                                                     {{--data-href="https://hcsyria.org/study-zone#event{{$Events[$i+$j]->id}}"--}}
                                                                     {{--data-width="100%" data-numposts="3"></div>--}}
                                                                {{--<br>--}}
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
                                @if($EventCopy !== 'none')
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
                                                            @foreach($EventCopy->images as $image)
                                                                <li data-target="#project-carousel-copy"
                                                                    data-slide-to="{{$k++}}"
                                                                    @if($k == 1)class="active" @endif>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <?php $k = 0 ?>
                                                            @foreach($EventCopy->images as $image)
                                                                <div class="item @if($k++ == 0) active @endif">
                                                                    {{--<p id="p-date">{{date('d/m/Y',strtotime(exif_read_data(ltrim($image->path, '/'))['DateTimeOriginal']))}}</p>--}}
                                                                    <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                       data-fancybox="gallery-copy"
                                                                       data-caption="{{ucfirst($EventCopy->lang->title)}}">
                                                                        <img src="{{$image->path}}">
                                                                    </a>
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
                                                        <h2>{{ucfirst($EventCopy->lang->title)}}</h2>
                                                        <br>
                                                        <p>
                                                            <strong>@lang('main.projectCity')</strong> {{$EventCopy->place->name}}
                                                            <br>
                                                            {!!$EventCopy->lang->description!!}
                                                        </p>
                                                        <br>
                                                        <div class="clearfix">
                                                            <p class="p-justify">{!!$EventCopy->lang->content!!}</p>
                                                        </div>
                                                        <br>
                                                        <a class="cpy-link" onclick="copyTextE({{$EventCopy->id}})">@lang('main.cpyLink')</a>
                                                        <textarea id="txt{{$EventCopy->id}}" style="display: none;"></textarea>
                                                        <br>
                                                        <br>
                                                        @if($EventCopy->video != '0')
                                                            <div class="video">
                                                                <iframe
                                                                    src="{{$EventCopy->video}}"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                            <hr style="border-color: #43484E;">
                                                        @endif
                                                        <div id="fb-root"></div>
                                                        <div class="fb-comments"
                                                             data-href="https://hcsyria.org/study-zone#event{{$EventCopy->id}}"
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
                                @endif
                            </div>
                        @endfor
                        <div class="text-center">
                            {{$Events->appends(['search' => $search, 'events' => $Events->currentPage()])->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="study">
                <div class="media">
                    <div class="media-body">
                        @if(count($Study)==0)
                            <h3 class="text-center" style="margin-top: 50px">@lang('projects.sorryMessage1')</h3>
                            <br>
                            <ul>
                                <li><h5>@lang('projects.sorryMessage2')</h5></li>
                            </ul>
                        @endif
                        @for($i = 0; $i<count($Study); $i = $i + 3)
                            <div class="row projects-height">
                                @for($j = 0; $j<3; $j++)
                                    @if($i+$j < count($Study))
                                        <div class="col-sm-4">
                                            <div class="single-project" id="scroll-NF-{{$i+$j}}" style="margin-bottom: 30px">
                                                <img src="{{$Study[$i+$j]->images[0]->path}}" alt=""/>
                                                @if($Study[$i+$j]->video != '0')
                                                    <a class="video-ico"><i class="fa fa-video-camera"></i></a>
                                                @endif
                                                {{--<h2>{{ucfirst($Study[$i+$j]->lang->title)}}</h2>--}}
                                                <h2>
                                                    <i class="fa fa-pencil-square-o"></i>
                                                    {{--<strong> {{ucfirst($Study[$i+$j]->place->name)}}</strong>--}}
                                                    @if(app()->isLocale('fr'))
                                                        <strong> {{ $Study[$i+$j]->center['name_fr'] }} </strong>
                                                    @else <strong> {{ $Study[$i+$j]->center['name'] }} </strong>
                                                    @endif
                                                </h2>
                                                <h3>
                                                    <i class="fa fa-clock-o"></i> {{date('d/m/Y',strtotime($Study[$i+$j]->lang->date_string))}}
                                                </h3>
                                                <a href="" class="btn btn-primary" id="btn-primary-{{$i+$j}}"
                                                   data-toggle="modal"
                                                   data-target="#project-detail-{{$Study[$i+$j]->id}}">@lang('main.readMore')</a>
                                            </div>
                                            <div class="modal fade project-detail" id="project-detail-{{$Study[$i+$j]->id}}"
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
                                                            <div id="project-carousel-NF-{{$i+$j}}"
                                                                 class="carousel slide touch-slide"
                                                                 data-ride="carousel">
                                                                <ol class="carousel-indicators">
                                                                    <?php $k = 0 ?>
                                                                    @foreach($Study[$i+$j]->images as $image)
                                                                        <li data-target="#project-carousel-NF-{{$i+$j}}"
                                                                            data-slide-to="{{$k++}}"
                                                                            @if($k == 1)class="active" @endif></li>
                                                                    @endforeach
                                                                </ol>
                                                                <div class="carousel-inner">
                                                                    <?php $k = 0 ?>
                                                                    @foreach($Study[$i+$j]->images as $image)
                                                                        <div class="item @if($k++ == 0) active @endif">
                                                                             <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                               data-fancybox="gallery-NF-{{$i+$j}}"
                                                                               data-caption="{{ucfirst($Study[$i+$j]->lang->title)}}"><img
                                                                                    src="{{$image->path}}"></a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <a class="left carousel-control"
                                                                   href="#project-carousel-NF-{{$i+$j}}"
                                                                   data-slide="prev">
                                                                <span
                                                                    class="glyphicon glyphicon-chevron-left"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="right carousel-control"
                                                                   href="#project-carousel-NF-{{$i+$j}}"
                                                                   data-slide="next">
                                                                <span
                                                                    class="glyphicon glyphicon-chevron-right"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </div>
                                                            <div id="modal-swipe-NF-{{$i+$j}}">
                                                                <h2>
                                                                    <i class="fa fa-pencil-square-o"></i>
                                                                    {{--<strong>  {{ucfirst($Study[$i+$j]->place->name)}}</strong>--}}
                                                                    @if(app()->isLocale('fr'))
                                                                        <strong> {{ $Study[$i+$j]->center['name_fr'] }} </strong>
                                                                    @else <strong> {{ $Study[$i+$j]->center['name'] }} </strong>
                                                                    @endif
                                                                </h2>
                                                                <h3>
                                                                    <i class="fa fa-clock-o"></i> {{date('d/m/Y',strtotime($Study[$i+$j]->lang->date_string))}}
                                                                </h3>

                                                                <p class="p-justify">{!!$Study[$i+$j]->lang->content!!}</p>
                                                                {{--</div>--}}
                                                                <br>
                                                                <a class="cpy-link" onclick="copyTextS({{$Study[$i+$j]->id}})">@lang('main.cpyLink')</a>
                                                                <textarea id="txt{{$Study[$i+$j]->id}}" style="display: none;"></textarea>
                                                                <br>
                                                                <br>
                                                                @if($Study[$i+$j]->video != '0')
                                                                    <div class="video">
                                                                        <iframe
                                                                            src="{{$Study[$i+$j]->video}}"
                                                                            frameborder="0"
                                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                            allowfullscreen></iframe>
                                                                    </div>
                                                                    <hr style="border-color: #43484E;">
                                                                @endif
                                                                <div id="fb-root"></div>
                                                                <div class="fb-comments"
                                                                     data-href="https://hcsyria.org/study-zone#study{{$Study[$i+$j]->id}}"
                                                                     data-width="100%" data-numposts="3"></div>
                                                                <br>
                                                                <div class="text-center swipe-arrows">
                                                                    <i class="fa fa-angle-double-up"></i>
                                                                    <p>@lang('main.swipeUp')</p>
                                                                </div>
                                                                <div class="swipe-to-close"
                                                                     id="swipe-to-close-NF-{{$i+$j}}"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                                @if($StudyCopy !== 'none')
                                    <div class="modal fade project-detail" id="project-detail-NF-copy"
                                         tabindex="-1"
                                         role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" id="close-NF-copy"
                                                            data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                    <div id="project-carousel-NF-copy"
                                                         class="carousel slide touch-slide"
                                                         data-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <?php $k = 0 ?>
                                                            @foreach($StudyCopy->images as $image)
                                                                <li data-target="#project-carousel-NF-copy"
                                                                    data-slide-to="{{$k++}}"
                                                                    @if($k == 1)class="active" @endif>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <?php $k = 0 ?>
                                                            @foreach($StudyCopy->images as $image)
                                                                <div class="item @if($k++ == 0) active @endif">
                                                                     <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                       data-fancybox="gallery-FN-{{$i+$j}}"
                                                                       data-caption="{{ucfirst($StudyCopy->lang->title)}}">
                                                                        <img src="{{$image->path}}">
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div><!--/.carousel-inner-->
                                                        <a class="left carousel-control"
                                                           href="#project-carousel-NF-copy"
                                                           data-slide="prev">
                                                            <span
                                                                class="glyphicon glyphicon-chevron-left"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control"
                                                           href="#project-carousel-NF-copy"
                                                           data-slide="next">
                                                            <span
                                                                class="glyphicon glyphicon-chevron-right"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                    <div id="modal-swipe-NF-copy">
                                                        <h2>
                                                            @if($StudyCopy->place_id != '0')
                                                                <i class="fa fa-pencil-square-o"></i>
                                                                {{--<strong>  {{$StudyCopy->place->name}}</strong>--}}
                                                                @if(app()->isLocale('fr'))
                                                                    <strong> {{ $StudyCopy->center['name_fr'] }} </strong>
                                                                @else <strong> {{ $StudyCopy->center['name'] }} </strong>
                                                                @endif
                                                            @endif
                                                        </h2>
                                                        <h3>
                                                            <i class="fa fa-clock-o"></i> {{date('d/m/Y',strtotime($StudyCopy->lang->date_string))}}
                                                        </h3>
                                                        <p class="p-justify">{!!$StudyCopy->lang->content!!}</p>
                                                        {{--</div>--}}
                                                        <br>
                                                        <a class="cpy-link" onclick="copyTextS({{$StudyCopy->id}})">@lang('main.cpyLink')</a>
                                                        <textarea id="txt{{$StudyCopy->id}}" style="display: none;"></textarea>
                                                        <br>
                                                        <br>
                                                        @if($StudyCopy->video != '0')
                                                            <div class="video">
                                                                <iframe
                                                                    src="{{$StudyCopy->video}}"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                            <hr style="border-color: #43484E;">
                                                        @endif
                                                        <div id="fb-root"></div>
                                                        <div class="fb-comments"
                                                             data-href="https://hcsyria.org/study-zone#study{{$StudyCopy->id}}"
                                                             data-width="100%" data-numposts="3"></div>
                                                        <br>
                                                        <div class="text-center swipe-arrows">
                                                            <i class="fa fa-angle-double-up"></i>
                                                            <p>@lang('main.swipeUp')</p>
                                                        </div>
                                                        <div class="swipe-to-close"
                                                             id="swipe-to-NF-close-{{$i+$j}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                    <div class="text-center">
                        {{--->fragment('-')--}}
                        {{$Study->appends(['search' => $search, 'study' => $Study->currentPage()])->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('public.footer')


<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
<script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="/js/jquery.balloon.min.js"></script>

<script>
    let url = $(location).attr('href');
    if (url.charAt(url.length - 1) === '-') {
        $('.nav-tabs a[href="#study"]').tab('show');
    } else {
        $('.nav-tabs a[href="#event"]').tab('show');
    }
    @if (count($Events)==0&&count($Study)!=0)
    $('.nav-tabs a[href="#study"]').tab('show');
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
    function copyTextE(id) {
        var el = document.getElementById('txt'+id);
        el.value = "https://hcsyria.org/projects/study-zone/all?event="+id;
        el.style.display = 'block';
        el.select();
        el.focus();
        document.execCommand('copy');
        el.style.display = 'none';
    }
    function copyTextS(id) {
        var el = document.getElementById('txt'+id);
        el.value = "https://hcsyria.org/projects/study-zone/all?study="+id;
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
    @foreach($searchEvent as $s)
    projects.push(('{{ $s->title }}').replace('&#039;', '\''));
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
            @for($i = 0; $i<count($Events); $i++)
            $("#swipe-to-close-{{$i}}").on('swipeup', function () {
                $("#close-{{$i}}").click();
            });
            @endfor
            @for($i = 0; $i<count($Study); $i++)
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
    $(".single-project").click(function () {
        $(this).next().modal('show');
    });
</script>
<script>
    function get(name){
        if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
            return decodeURIComponent(name[1]);
    }
    if(firstGetKey == '?event'){
        $('#project-detail-copy').modal('show');
    }else if (firstGetKey == '?study'){
        $('.nav-tabs a[href="#study"]').tab('show');
        $('#project-detail-NF-copy').modal('show');
    }
</script>

@stack('navbar-scripts')

</body>
</html>
