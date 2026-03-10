<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $language = 'french';
        $whatCatName = 'french_name';
        $donorName = 'french_name';
    } else {
        $language = 'english';
        $whatCatName = 'name';
        $donorName = 'name';
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
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:url" content="https://hcsyria.org/projects/{{ $initiativePath }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ $mainInitiative->$language->title }}"/>
    <meta property="og:description"
          content="{{ $mainInitiative->$language->description }}"/>
    <meta property="og:image" content="https://hcsyria.org/{{ $images[0]['path'] }}"/>
    <meta name="description"
          content="{{ $mainInitiative->$language->description }}">
    <meta name="keywords"
          content="{{ $mainInitiative->$language->title }}, {{$mainInitiative->whatCategory->name}}, @if(isset($mainInitiative->$language->organization)) {{ $mainInitiative->$language->organization }} @endif "/>
    <title>{{ $mainInitiative->$language->title }}</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">

    @if(count($imagesRehabilitation))
        <link href="/css/twentytwenty.css" rel="stylesheet">
        <style>
            .pagination {
                margin: 0 0 40px;
            }
            .pagination > .active > span,
            .pagination > .active > span:hover {
                background-color: #43484E;
                border-color: #43484E;
            }
            .pagination:hover {
                background-color: #eee;
                cursor: pointer;
            }
            .twentytwenty-before-label,
            .twentytwenty-after-label {
                display: none !important;
            }
        </style>
    @endif
    @if($mainInitiative->what_category_id == '1')
        <style>
            @media screen and (max-width: 480px) {
                #initiatives .title-one:after {
                    right: -10px;
                }

                #initiatives .title-one:before {
                    left: -10px;
                }
            }
        </style>
    @endif
    <style>
        .ini-logo {
            margin: 15px;
        }
        img[src*="saint-nicholas.svg"] {
            width: 200px;
        }
        img[src*="caritas.svg"] {
            width: 80px;
        }
        img[src*="loeuvre.svg"] {
            width: 120px;
        }
        img[src*="salt.svg"] {
            width: 120px;
        }
        img[src*="manos.svg"] {
            width: 220px;
        }
        @media screen and (max-width: 768px) {
            img[src*="saint-nicholas.svg"] {
                width: 100%;
            }
        }
        @media screen and (max-width: 992px){
            .display-grid {
                display: grid;
            }
        }
    </style>
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
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


<section id="initiative" class="page-start">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {{--<h1 class="text-center title-shadow"><b>{{ $mainInitiative->whatCategory->$whatCatName }}</b></h1>--}}
            <h1 class="text-center red-title"><b>{{ $mainInitiative->whatCategory->$whatCatName }}</b></h1>
        </div>
    </div>
    {{--<div class="navigate">--}}
        {{--<div class="container">--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="/">@lang('navbar.home')</a></li>--}}
                {{--<li><a href="{{route('public.main_projects')}}">@lang('what_we_do.title')</a></li>--}}
                {{--@if($mainInitiative->whatCategory->name === 'DISC' ||--}}
                    {{--$mainInitiative->whatCategory->name === 'Homework Room' ||--}}
                    {{--$mainInitiative->whatCategory->name === 'Study Zone' ||--}}
                    {{--$mainInitiative->whatCategory->name === 'School to School')--}}
                    {{--<li><a href="{{route('public.initiatives.type', 'development')}}">@lang('what_we_do.development')</a></li>--}}
                {{--@endif--}}
                {{--@if($mainInitiative->whatCategory->name === 'Family to Family')--}}
                    {{--<li><a href="{{route('public.initiatives.type', 'relief')}}">@lang('what_we_do.relief')</a></li>--}}
                {{--@endif--}}
                {{--<li><a href="/projects/{{strtolower(str_slug($mainInitiative->whatCategory->name))}}">{{$mainInitiative->whatCategory->$whatCatName}}</a></li>--}}
                {{--@if($mainInitiative->whatCategory->name === 'DISC')--}}
                    {{--<li><a href="{{route('public.disc.type', strtolower(str_slug($subWhatCategory->name)))}}">{{$subWhatCategory->name}}</a></li>--}}
                {{--@endif--}}
                {{--<li class="active">{{ $mainInitiative->$language->title }}</li>--}}
            {{--</ol>--}}
        {{--</div>--}}
    {{--</div>--}}


    <div class="container">

        {{--<div class="row text-center clearfix">--}}
            {{--<div class="col-md-8 col-md-offset-4">--}}
                {{--<h2 class="title-one" @if($mainInitiative->whatCategory->$whatCatName === 'DISC') style="line-height: 20px @endif">--}}
                    {{--{{ $mainInitiative->whatCategory->$whatCatName }}--}}
                    {{--@if($mainInitiative->whatCategory->$whatCatName === 'DISC')--}}
                        {{--<br>--}}
                        {{--@if(app()->isLocale('fr'))--}}
                            {{--<span style="font-size: 14px;text-transform: none">(Le centre de développement et de support)</span>--}}
                        {{--@else--}}
                            {{--<span style="font-size: 14px;text-transform: none">(Development Impact Support Center)</span>--}}
                        {{--@endif--}}
                    {{--@endif--}}
                {{--</h2>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-md-8 col-md-push-4"> {{-- Initiative Body --}}
                <div id="single-org">
                    <h2 class="text-center ini-heading"><strong>{{ $mainInitiative->$language->title }}</strong></h2>
                    @if(count($imagesRehabilitation))
                        @foreach($imagesRehabilitation as $image)
                            <div class="twentytwenty-container" id="container{{$image->id}}">
                                <img src="{{$image->path_1}}">
                                <img src="{{$image->path_2}}">
                            </div>
                        @endforeach
                        <div class="text-center">
                            <ul class="pagination">
                                @foreach($imagesRehabilitation as $i=>$image)
                                    <li id="btn-{{$i}}" class="page-item @if($i==0) active @endif"><span
                                            class="page-link">{{$i+1}}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(count($images)>1)
                        <div id="ini-carousel" class="carousel slide touch-slide" data-ride="carousel" style="margin-bottom: 20px">
                            <ol class="carousel-indicators" style="bottom: 0%;">
                                <?php $k = 0 ?>
                                @foreach($images as $image)
                                    <li data-target="#ini-carousel"
                                        data-slide-to="{{$k++}}"
                                        @if($k == 1)class="active" @endif></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                <?php $k = 0 ?>
                                @foreach($images as $image)
                                    <div class="item @if($k++ == 0) active @endif">
                                        <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                           data-fancybox="gallery"
                                           data-caption="{{ ucfirst($mainInitiative->$language->title) }}"><img
                                                src="{{$image->path}}"></a>
                                    </div>
                                @endforeach
                            </div>
                            <a class="left carousel-control" href="#ini-carousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#ini-carousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @endif
                    @if($mainInitiative->$language->organization != '0')
                        <div class="text-center">
                            <br>
                            <h2><strong>{{ $mainInitiative->$language->organization }}</strong></h2>
                        </div>
                    @endif
                    @if($mainInitiative->logo != '0')
                        <div class="text-center" style="margin-bottom: 15px">
                            <img class="ini-logo" src="{{ $mainInitiative->logo }}">
                        </div>
                    @endif
                    @if($mainInitiative->$language->date_string != '0')
                        <p> {{ $mainInitiative->$language->date_string }}</p>
                    @endif
                    {!! $mainInitiative->$language->content !!}
                    <br>
                    @if( $mainInitiative->video != '0')
                        <div class="video">
                            <iframe src="{{ $mainInitiative->video }}" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    @endif
                    @if(count($testimonies))
                        <div class="initiative-testimonies">
                            <h3 class="text-center">@lang('main.testimoniesTitle')</h3>
                            @foreach($testimonies as $testimony)
                                <div class="item">
                                    <div class="single-testimony">
                                        <div class="media">
                                            <img class="pull-left" src="{{$testimony->image_path}}" alt=""
                                                 width="170px">
                                            <div class="media-body">
                                                <div class="testimony-texts">
                                                    <p>{{$testimony->english->name}}</p>
                                                    <blockquote>{{$testimony->english->text}}</blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if(count($stories))
                        <div class="f2f-stories">
                            <h3 class="main_title text-center" style="margin: 0 0 30px;">@lang('family2family.stories')</h3>
                                @foreach($stories as $i => $story)
                                        <a href="" data-toggle="modal"
                                           data-target="#story-{{$story->id.$i}}">
                                            <div class="row single-story">
                                                <div class="col-xs-5 col-sm-4">
                                                    <img src="{{$story->firstImage->path}}" style="width: 100%">
                                                </div>
                                                <div class="col-xs-7 col-sm-8">
                                                    <h4><i>{{ ucfirst($story->$language->description )}}</i></h4>
                                                    <p>@lang('main.readMore') ></p>
                                                </div>
                                            </div>
                                        </a>
                                    <div class="modal fade project-detail" id="story-{{$story->id.$i}}"
                                         tabindex="-1"
                                         role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" id="close-story-{{$story->id}}"
                                                            data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                    <div id="story-carousel-{{$story->id}}"
                                                         class="carousel slide touch-slide"
                                                         data-ride="carousel">
                                                        <ol class="carousel-indicators" style="bottom: 0%;">
                                                            <?php $k = 0 ?>
                                                            @foreach($story->images as $$image)
                                                                <li data-target="#story-carousel-{{$story->id}}"
                                                                    data-slide-to="{{$k++}}"
                                                                    @if($k == 1)class="active" @endif></li>

                                                            @endforeach
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <?php $k = 0 ?>
                                                                @foreach($story->images as $i => $image)
                                                                <div class="item @if($k++ == 0) active @endif">
                                                                    <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                                       data-fancybox="gallery-{{$story->id.$i}}"
                                                                       data-caption="{{$story->$language->title }}"><img
                                                                            src="{{$image->path}}"></a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <a class="left carousel-control"
                                                           href="#story-carousel-{{$story->id}}"
                                                           data-slide="prev">
                                                                    <span
                                                                        class="glyphicon glyphicon-chevron-left"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control"
                                                           href="#story-carousel-{{$story->id}}"
                                                           data-slide="next">
                                                                    <span
                                                                        class="glyphicon glyphicon-chevron-right"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                    <div id="modal-swipe-{{$story->id}}">
                                                        <h2>{{$story->$language->title }}</h2>
                                                        <br>
                                                        <div class="clearfix"><p
                                                                class="p-justify">{!!$story->$language->content!!}</p>
                                                        </div>
                                                        @if($story->video != '0')
                                                            <div class="video">
                                                                <iframe
                                                                    src="{{$story->video}}"
                                                                    frameborder="0"
                                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                        @endif
                                                        <div class="text-center swipe-arrows">
                                                            <i class="fa fa-angle-double-up"></i>
                                                            <p>@lang('main.swipeUp')</p>
                                                        </div>
                                                        <div class="swipe-to-close" id="swipe-to-close-{{$story->id}}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    @endif
                    <hr>
                    {{--<div class="text-center">--}}
                        {{--<div class="fb-comments" data-href="https://hcsyria.org/projects/{{ $initiativePath }}"--}}
                             {{--data-width="750px" data-numposts="4"></div>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="display-grid">
                <div class="col-md-4 col-md-pull-8 col-sm-12 text-center" style="margin-top: 5px">

                    @if(count($mainInitiative->donors))
                        <h3>@lang('initiatives.fundedBy')</h3>
                        @foreach($mainInitiative->donors as $donor)
                                <div class="
                                    @if(count($mainInitiative->donors) === 1)
                                    col-sm-12
                                    @elseif(count($mainInitiative->donors) === 2)
                                    col-xs-6 col-md-12
                                    @elseif(count($mainInitiative->donors) === 3)
                                    col-sm-4 col-md-12
                                    @elseif(count($mainInitiative->donors) === 6)
                                    col-xs-6 col-sm-12
                                    {{--col-sm-4 col-md-12--}}
                                    @endif"
                                    style="padding-bottom: 15px">
                                    <h4>{{$donor->$donorName}}</h4>
                                    <img src="{{$donor->logo}}">
                                </div>
                            @endforeach
                        @endif
                </div>
            </div>
            <div class="col-md-4 col-md-pull-8" id="right-list">
                @if (app()->isLocale('fr'))
                    @if($mainInitiative->what_category_id == '1') {{--COI--}}
                    <h3>Autres postes des {{$mainInitiative->whatCategory->$whatCatName}}</h3>

                    @elseif(($mainInitiative->what_category_id == '4') || ($mainInitiative->what_category_id == '9')) {{--releif + school--}}
                    <h3>Autres postes de {{$mainInitiative->whatCategory->$whatCatName}}</h3>

                    @else
                        <h3>Autres postes d' {{$mainInitiative->whatCategory->$whatCatName}}</h3>

                    @endif
                @else
                    <h3>Other {{$mainInitiative->whatCategory->$whatCatName}} posts</h3>
                @endif
                <div class="row other-initiatives-flex">
                    <div class="col-sm-12 right-list-wrapper">
                        @php
                            if($mainInitiative->sub_what_category_id != '0') {
                                $category = str_slug(strtolower($mainInitiative->subWhatCategory->name));
                                $allCategory = str_slug(strtolower($mainInitiative->subWhatCategory->name));
                            }

                            if(strpos($mainInitiative->whatCategory->name, 'School to School') !== false)
                            {
                                $route = 'public.school2school.project';
                                $allRoute = 'public.school2school.type';
                            }

                            elseif(strpos($mainInitiative->whatCategory->name, 'DISC') !== false)
                            {
                                $route = 'public.disc.project';
                                $allRoute = 'public.disc.type';
                            }

                            elseif(strpos($mainInitiative->whatCategory->name, 'Study Zone') !== false)
                            {
                                $route = 'public.studyzone.project';
                                $allRoute = 'public.studyzone.type';
                            }

                            else
                            {
                                $route = 'public.initiative';
                                $category = str_slug(strtolower($mainInitiative->whatCategory->name));
                                $allRoute = 'public.initiatives.type';
                                $allCategory = str_slug(strtolower($mainInitiative->whatCategory->name));
                            }
                        @endphp
                        @foreach($initiativesSameType as $initiative)
                            <div class="other-initiative-wrapper col-sm-4 col-md-12">
                                <a href="{{ route($route, [ $category, $initiative->id,
                                 str_slug(strtolower($initiative->english->title))]) }}">
                                    <div class="row other-initiatives-inner">
                                        <div class="col-md-6 col-sm-12 col-xs-5 other-ini-img">
                                            <img src="{{$initiative->firstImage['path']}}" width="100%">
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-7">
                                            <h4>{{ $initiative->$language->title }}</h4>
                                            <p>{{implode(' ', array_slice(explode(' ', $initiative->$language->description), 0, 10)).'...'}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{route('public.initiatives.type', str_slug(strtolower($mainInitiative->whatCategory->name)))}}"
                           class="btn btn-primary btn-see-all"
                           data-toggle="modal">

                            @if (app()->isLocale('fr'))
                                @if($mainInitiative->what_category_id == '1') {{--COI--}}
                                Voir tous les postes

                                @elseif(($mainInitiative->what_category_id == '4') || ($mainInitiative->what_category_id == '9')) {{--releif + school--}}
                                Voir tous les postes de {{$mainInitiative->whatCategory->$whatCatName}}

                                @else
                                    Voir tous les postes d' {{$mainInitiative->whatCategory->$whatCatName}}

                                @endif
                            @else
                                See all {{$mainInitiative->whatCategory->$whatCatName}} posts
                            @endif
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3>@lang('initiatives.related')</h3>
                <div class="row related-initiatives-flex">
                @foreach($initiativesSameCategory as $initiative)
                    @php

                        if(strpos($initiative->whatCategory->name, 'School to School') !== false)
                        {
                            $route = 'public.school2school.project';
                        }
                        elseif(strpos($initiative->whatCategory->name, 'DISC') !== false)
                        {
                            $route = 'public.disc.project';
                        }
                        elseif(strpos($initiative->whatCategory->name, 'Study Zone') !== false)
                        {
                            $route = 'public.studyzone.project';
                        }
                        else
                        {
                            $route = 'public.initiative';
                            $category = str_slug(strtolower($initiative->whatCategory->name));
                        }
                    @endphp
                    <div class="other-initiative-wrapper col-sm-3 col-xs-12">
                        <a href="{{ route($route, [ $category, $initiative->id,
                         str_slug(strtolower($initiative->english->title))]) }}">
                            <div class="row other-initiatives-inner">
                                <div class="col-sm-12 col-xs-5 related-ini-img">
                                    <img src="{{$initiative->firstImage['path']}}" width="100%">
                                </div>
                                <div class="col-sm-12 col-xs-7 related-ini-txt">
                                    <h4>{{ ucfirst($initiative->$language->title) }}</h4>
                                    <p>{{implode(' ', array_slice(explode(' ', $initiative->$language->description), 0, 10)).'...'}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
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
        }
    });
</script>
@if(count($imagesRehabilitation))
    <script type="text/javascript" src="/js/jquery.event.move.js"></script>
    <script type="text/javascript" src="/js/jquery.twentytwenty.js"></script>
    <script>
        $('#container{{$imagesRehabilitation[0]->id}}').css('display', 'block');
        $(window).load(function () {
            @foreach($imagesRehabilitation as $image)
            $("#container{{$image->id}}").twentytwenty();
            @endforeach
        });
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $('.pagination').hide();
        } else {
            $(window).load(function () {
                @foreach($imagesRehabilitation as $i=>$image)
                @if($i != 0)
                $("#container{{$image->id}}").hide();
                @endif
                @endforeach
            });
            @foreach($imagesRehabilitation as $i=>$image)
            $('#btn-{{$i}}').click(function () {
                $('#btn-{{$i}}').addClass('active');
                @foreach($imagesRehabilitation as $j=>$imageJ)
                @if($i != $j)
                $('#btn-{{$j}}').removeClass('active');
                $('#container{{$imageJ->id}}').hide();
                @endif
                @endforeach
                $('#container{{$image->id}}').show();
            });
            @endforeach
            @if(count($imagesRehabilitation) < 2)
            $('.pagination').hide();
            @endif
        }
    </script>
@endif
@if(count($stories))
    <script>
        $(document).ready(function () {
            if ("ontouchstart" in document.documentElement) {
                $('.swipe-arrows').css('display', 'block');
                @foreach($stories as $i => $story)
                $("#swipe-to-close-{{$story->id}}").on('swipeup', function () {
                    $("#close-story-{{$story->id}}").click();
                });
                @endforeach
            }
        });
    </script>
@endif
@stack('navbar-scripts')

</body>
</html>
