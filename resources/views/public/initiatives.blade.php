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
    @if($whatCategory->id == '1')
        <meta name="description" content="@lang('main.programsInitiativesDesc')">
    @elseif($whatCategory->id == '3')
        <meta name="description" content="@lang('what_we_do.rehabilitationDesc')">
    @elseif($whatCategory->id == '5')
        <meta name="description" content="@lang('disc.description')">
    @elseif($whatCategory->id == '7')
        <meta name="description" content="@lang('studyzone.description')">
    @elseif($whatCategory->id == '8')
        <meta name="description" content="@lang('family2family.description')">
    @elseif($whatCategory->id == '9')
        <meta name="description" content="@lang('school2school.description')">
    @endif
    <meta name="keywords"
          content="aleppo, syria, hope center, initiatives"/>
    <title>{{ $whatCategory->$whatCatName }}</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">


    @if($whatCategory->name == 'School to School')
        <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    @endif
    @if($whatCategory->id == '6') {{-- Homework Room --}}
    <link href='https://fonts.googleapis.com/css?family=Love Ya Like A Sister' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Margarine' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Rock Salt' rel='stylesheet'>

    <style>



    </style>
    @elseif($whatCategory->id == '9') {{-- School to School --}}
    <style>
        @media screen and (min-width: 991px) {
            #school .school-wrapper {
                display: flex;
                align-items: center
            }
        }
    </style>
    @endif
    <style>
        .post .ini-content h6 {
            font-weight: 600
        }
    </style>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HLZ6M"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@include('public.navbar')

<section id="initiatives" class="page-start">
                    {{--$whatCategory->id == '6' ||--}}
                    {{--$whatCategory->id == '7' ||--}}
                    {{--$whatCategory->id == '9')    --}}{{-- DISC Or Homework Room Or studyzone Or S2S --}}
                {{-- DISC --}}
                {{-- School to School --}}
    <div class="row">
        <div class="row text-center clearfix">
            @if($whatCategory->id == '1') {{-- Christian organizations Initiatives --}}
                <div class="col-sm-8 col-sm-offset-2">
                    <h1 class="text-center red-title"><b>{{ $whatCategory->$whatCatName }}</b></h1>

                <div class="projects-heading ">
                    <p class="projects-heading"
                       style="font-size: 16px;">@lang('main.programsInitiativesDesc')</p>
                </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <h4>@lang('initiatives.caritas')</h4>
                        <img src="/images/logos/caritas.svg" id="ini-cp-logo">
                    </div>
                    <div class="col-xs-6">
                        <h4>@lang('initiatives.nicolas')</h4>
                        <img src="/images/logos/saint-nicholas.svg" id="ini-sn-logo">
                    </div>
                </div>

            @elseif($whatCategory->id == '2') {{-- Development --}}
            <div class="col-sm-8 col-sm-offset-2">
                <h1 class="text-center red-title"><b>{{ $whatCategory->$whatCatName }}</b></h1>
            </div>
            <div class="projects-heading">
                <p class="projects-heading"
                   style="font-size: 16px;text-align: justify">@lang('what_we_do.developmentDesc')</p>
            </div>
        </div>
    </div> {{-- Close tag for the greater container --}}
            @php
                $developmentNames = array("micro","disc","s2s","study","homework");
                $developmentRouts = array("micro-projects","disc","school-to-school","study-zone","homework-room");
            @endphp
            @for($i = 0; $i < 5; $i++)
                <div class="container">
                    <div class="raw horizontal-margin">
                        <div class="post">
                            <div class="container single-project org-post">
                                <div class="col-sm-3 ini-img">
                                    <div class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item active"><img
                                                    src="/images/programs/development/{{$developmentNames[$i]}}/1.jpg"></div>
                                            <div class="item"><img
                                                    src="/images/programs/development/{{$developmentNames[$i]}}/2.jpg"></div>
                                            <div class="item"><img
                                                    src="/images/programs/development/{{$developmentNames[$i]}}/3.jpg"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 ini-content">
                                    <h2>@lang('development.'.$developmentNames[$i].'Title')</h2>
                                    <h6>@lang('development.'.$developmentNames[$i].'Donor')</h6>
                                    <p>@lang('development.'.$developmentNames[$i].'Text')</p>
                                    <a href="/projects/{{$developmentRouts[$i]}}"
                                       class="btn btn-primary btn-org">@lang('development.previewProgram')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
            <div class=" container">
            <div class="row text-center clearfix"> {{-- Open same as before tag because of closing the container erlier --}}

            @elseif($whatCategory->id == '3') {{-- Rehabilitation --}}
            <div class="col-sm-8 col-sm-offset-2">
                <h1 class="text-center red-title"><b>{{ $whatCategory->$whatCatName }}</b></h1>

                <div class="projects-heading">
                    <p class="projects-heading"
                       style="font-size: 16px;text-align: justify">@lang('what_we_do.rehabilitationDesc')</p>
                </div>
            </div>



            @elseif($whatCategory->id == '4') {{-- Relief --}}
            <div class="col-sm-8 col-sm-offset-2">
                <h1 class="text-center red-title"><b>{{ $whatCategory->$whatCatName }}</b></h1>

                <div class="projects-heading">
                    <p class="projects-heading"
                       style="font-size: 16px;text-align: justify">@lang('what_we_do.reliefDesc')</p>
                </div>
            </div>
            </div>
            </div> {{-- Close tag for the greater container --}}
            <div class="container">
                <div class="raw horizontal-margin">
                    <div class="post">
                        <div class="container single-project org-post">
                            <div class="col-sm-3 ini-img">
                                <div class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="item active"><img
                                                src="/images/programs/relief/f2f/1.jpg"></div>
                                        <div class="item"><img
                                                src="/images/programs/relief/f2f/2.jpg"></div>
                                        <div class="item"><img
                                                src="/images/programs/relief/f2f/3.jpg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 ini-content">
                                <h2>@lang('development.f2fTitle')</h2>
                                <h6>@lang('development.f2fDonor')</h6>
                                <p>@lang('development.f2fText')</p>
                                <a href="/projects/family-to-family"
                                   class="btn btn-primary btn-org">@lang('development.previewProgram')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class=" container">
            <div class="row text-center clearfix"> {{-- Open same as before tag because of closing the container erlier --}}

            @elseif($whatCategory->id == '5') {{-- DISC --}}
                <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h1 class="text-center red-title"><b>{{ $whatCategory->$whatCatName }}</b></h1>
                </div>
            </div>

            @elseif($whatCategory->id == '6') {{-- Homework Room --}}
                <div id="Homework">
                    <div class="container text-center animated fadeInUp delay" style="margin-top: -20px;">
                        <img src="/images/initiatives/Homework Room/homework.gif" style="width: 40%">
                    </div>


                <div class="row">
                    <div class="first-part col-md-5 text-center vertical-separator">
                        <p class="text-left p-justify">@lang('what_we_do.homeworkDesc')</p>
                        <img src="/images/logos/saint-nicholas.svg" id="sn-logo">
                    </div>
                    <div class="second-part col-md-7 text-center" >
                        <div class="video">
                            <iframe src="https://www.youtube.com/embed/zP557Z3P7dA" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 40px;"></div>

                <div id="fixed-height" >
                    <div class="testimonies-wrapper">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <h1  class="text-center red-title" ><b>@lang('disc.testimonies')</b></h1>
                            </div>
                        </div>
                        <div id="testimonies-carousel" class="carousel slide animated fadeInUp wow" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php $k = 0 ?>
                                @foreach($testemonies as $testemony)
                                    <li data-target="#testimonies-carousel"
                                        data-slide-to="{{$k++}}"
                                        @if($k == 1)class="active" @endif></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                <?php $k = 0 ?>
                                @foreach($testemonies as $testemony)
                                    <div class="item @if($k++ == 0) active @endif">
                                        <div class="single-testimony">
                                            <div class="media">
                                                <img class="pull-left" src="{{$testemony->image_path}}" alt="" width="170px">
                                                <div class="media-body" style="padding: 10px;">
                                                    <blockquote>
                                                        <h4><b>{{$testemony->$language->title}} </b></h4>
                                                        <p>{{$testemony->$language->text}}</p>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 40px;"></div>

                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h1 class="text-center red-title"><b>@lang('studyzone.activities')</b></h1>
                    </div>
                </div>
            </div>

            @elseif($whatCategory->id == '7') {{-- Study Zone --}}
                <div class="raw">
                <div class="col-sm-8 col-sm-offset-2">
                    <h1 class="text-center red-title"><b>{{ $whatCategory->$whatCatName }}</b></h1>

                </div>
            </div>

            @elseif($whatCategory->id == '8') {{-- Family to Family --}}
                <div class="raw">
                <div class="col-sm-8 col-sm-offset-2">
                    <h1 class="text-center red-title"><b>{{ $whatCategory->$whatCatName }}</b></h1>

                </div>
            </div>

            @elseif($whatCategory->id == '9') {{-- School to School --}}
                <div id="school" class="raw">
                @if (app()->isLocale('fr'))
                    <h1 class="text-center red-title"><b>École {{ $subWhatCategory->name }}</b></h1>
                @else
                    <h1 class="text-center red-title"><b>{{ $subWhatCategory->name }} School</b></h1>
                @endif
                <div style="padding-top: 30px;"></div>
                <div class="container">
                    <div class="row school-wrapper">
                        <div class="col-lg-6 col-md-5 col-sm-8 col-sm-offset-2 col-md-offset-0">
                            <div id="schoolCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @for($i = 0; $i<6; $i++)
                                        <li data-target="#schoolCarousel"
                                            data-slide-to="{{$i}}"
                                            @if($i == 0)class="active" @endif></li>
                                    @endfor
                                </ol>
                                <div class="carousel-inner">
                                    @for($i = 0; $i<6; $i++)
                                        <div class="item @if($i === 0) active @endif">
                                            <a href="/images/programs/schools/{{ $subWhatCategory->name }}/{{ $i+1 }}b.jpg"
                                               data-fancybox="gallery"
                                               data-caption="{{ ucfirst($subWhatCategory->name) }}"><img
                                                    src="/images/programs/schools/{{ $subWhatCategory->name }}/{{ $i+1 }}.jpg"></a>
                                        </div>
                                    @endfor
                                </div>
                                <a class="left carousel-control" href="#schoolCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#schoolCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-12">
                            <div
                                style="margin-top: 10px;text-align: justify">{!! $subWhatCategory->$description !!}</div>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($initiatives))
                <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <h1 class="text-center red-title"><b>@lang('studyzone.activities')</b></h1>
                        </div>
                    </div>
            @endif

            @endif
        </div>
        </div>
    </div>
    <div class="container">
        <div class="raw horizontal-margin">
            <div class="post">
                @if(isset($subWhatCategory))
                    @php
                        if ($whatCategory->name === 'Family to Family') {
                            $route = 'public.family2family.project';
                        }

                        elseif ($whatCategory->name === 'School to School') {
                            $route = 'public.school2school.project';
                        }

                        elseif ($whatCategory->name === 'DISC') {
                            $route = 'public.disc.project';
                        }

                        elseif ($whatCategory->name === 'Study Zone') {
                            $route = 'public.studyzone.project';
                        }
                    @endphp
                @endif
                @foreach($initiatives as $i=>$initiative)
                    <div class="container single-project org-post">
                        <div class="col-sm-3 ini-img">
                            <div class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active"><img src="{{$initiative->ImagesRandom[0]['path']}}"></div>
                                    <div class="item"><img src="{{$initiative->ImagesRandom[1]['path']}}"></div>
                                    @if(count($initiative->ImagesRandom) > 2)
                                        <div class="item"><img src="{{$initiative->ImagesRandom[2]['path']}}"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 ini-content">
                            @if($initiative->video !== '0')
                                <a class="video-ico"><i class="fa fa-video-camera"></i></a>
                            @endif
                            <h2>{{$initiative->$language->title}}</h2>
                            @if($initiative->$language->date_string !== '0')
                                <h6>{{$initiative->$language->date_string}}
                                    @endif
                                    @if($initiative->$language->organization !== '0')
                                        @lang('initiatives.by') {{$initiative->$language->organization}}
                                    @endif
                                </h6>
                                <p>{{$initiative->$language->description}}</p>
                                @if(isset($subWhatCategory))
                                    <a href="{{ route($route, [
                                                Str::slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                Str::slug(strtolower($initiative->english->title))
                                        ]) }}"
                                       class="btn btn-primary btn-org">@lang('main.readMore')
                                    </a>
                                @else
                                    <a href="{{ route('public.initiative',
                                [Str::slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                Str::slug(strtolower($initiative->english->title))]   ) }}"
                                       class="btn btn-primary btn-org">@lang('main.readMore')</a>
                                @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
@if($whatCategory->name == 'School to School')
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
@endif
<script>
    $(".org-post").click(function (e) {
        if (e.ctrlKey) {
            window.open($(this).find("a").last().attr("href"));
        } else {
            window.location = $(this).find("a").last().attr("href");
        }
    });
</script>
@stack('navbar-scripts')

</body>
</html>
