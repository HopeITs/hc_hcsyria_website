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
    <meta name="keywords" content="aleppo, syria, hope center, initiatives"/>
    <title>{{ $whatCategory->$whatCatName }}</title>
    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/initiatives_new.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">

    {{--<link href="/css/initiatives.css" rel="stylesheet">--}}
    {{--<link href="/css/main.css" rel="stylesheet">--}}
    {{--<link href="/css/news.css" rel="stylesheet">--}}

    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/"/>

    {{--<link href='https://fonts.googleapis.com/css?family=Noto Serif' rel='stylesheet'>--}}
    {{--<link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>--}}
    <link href='https://fonts.googleapis.com/css?family=Caudex' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
    <link href="/css/lato.css" rel='stylesheet' type='text/css'>
    <script src="/js/html5shiv.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="/js/aos.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>

</head>
<body>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')

<div id="initiatives" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                    </div>
                    <div class="content">
                        <div class="main_title" data-aos="fade-up" data-aos-duration="600">SOME SEE A HOPELESS END</div>
                        <div class="main_subtitle" data-aos="fade-up" data-aos-duration="1000">OTHERS SEE AN ENDLESS
                            HOPE
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0"></div>
            </div>
        </div>
    </div>
    @include('new.public.partials.cover-carousel', ['carouselImages' => $carouselImages])
    <div class="small horizontal-line d-lg-block d-md-block d-sm-block d-none" style="margin-top: 2vw;"></div>
    <div class="small horizontal-line d-lg-none d-md-none d-sm-none d-block" data-aos="fade-up" data-aos-duration="600"
         style="margin-top: 4.5vw;"></div>
    <div class="d-lg-block d-md-block d-sm-block d-none" style="margin-top: 4vw;">
        <div style="margin-top: 6vw;">
            <div class="container-fluid">
                <div class="row" data-aos="fade-up" data-aos-duration="600">
                    <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                        <div class="section-title">{{ $whatCategory->$whatCatName }}</div>
                        <div class="row w-100 d-flex justify-content-center text-center">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-11">
                                <div class="section-title-desc">
                                    @if($whatCategory->id == '1')
                                        <div data-aos="fade-up" data-aos-duration="300">The Christian organizations
                                            in
                                            Aleppo have lost the ability to do
                                            most of their common activities due to the war and the financial crisis.
                                            By
                                            supporting these organization,the center aims to give them a chance to
                                            continue
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="600">
                                            supporting their activities through a micro-project.The micro-project
                                            should
                                            also
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="900"> serve a purpose related to
                                            the
                                            Christian message
                                            of the organization.
                                        </div>
                                    @elseif($whatCategory->id == '2')
                                        {{-- Development --}}
                                        @lang('what_we_do.developmentDesc')
                                    @elseif($whatCategory->id == '3')
                                        {{-- Rehabilitation --}}
                                        <div data-aos="fade-up" data-aos-duration="300">
                                            <p class="m-0" style="text-align: justify; text-align-last: justify;">
                                                The Rehabilitation work in the post-war period is crucial for the early recovery of communities.
                                                It is also imperative to restore damaged infrastructures and support services that allow people to resume their lives.
                                                Christian Hope Center has contributed in this field through the rehabilitation of destroyed educational and
                                                communal facilities such as schools and playgrounds, and the restoration of houses, and workplaces.
                                                Our efforts also extended to
                                            </p>
                                            <p class="m-0" style="text-align: center;">
                                                supporting rural communities by providing photovoltaic infrastructure for electricity production
                                                and water extraction in several villages.
                                            </p>
                                        </div>
                                    @elseif($whatCategory->id == '4')
                                        {{-- Relief --}}
                                        <div data-aos="fade-up" data-aos-duration="300"> Our relief programs are
                                            designed to
                                            ease the hardships resulting from the Syrian war and its intricate
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="600">
                                            economic effects, which are putting strain on the majority of families
                                            living
                                            below the poverty line.
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="900">Our goal is to help these
                                            families
                                            meet their basic needs and maintain their dignity.
                                        </div>
                                    @elseif($whatCategory->id == '18')
                                        {{-- Earthquake --}}
                                        <div data-aos="fade-up" data-aos-duration="300"> Following the 7.8 magnitude
                                            earthquake that struck Turkey and Syria on February 6th, the cities of
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="600">
                                            Aleppo and Latakia suffered widespread damage and
                                            destruction, with thousands of buildings
                                        </div>
                                        <div data-aos="fade-up" data-aos-duration="900"> destroyed and tens of thousands
                                            of people displaced.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-lg-none d-md-none d-sm-none d-block" data-aos="fade-up" data-aos-duration="600"
         style="margin-top: 4vw;">
        <div style="margin-top: 14vw;">
            <div class="container-fluid">
                <div class="row" data-aos="fade-up" data-aos-duration="600">
                    <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                        <div class="section-title">{{ $whatCategory->$whatCatName }}</div>
                        <div class="row w-100 d-flex justify-content-center text-center">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-11">
                                <div class="section-title-desc">
                                    @if($whatCategory->id == '1')
                                        {{-- Christian organizations Initiatives --}}
                                        <div data-aos="fade-up" data-aos-duration="300">The Christian organizations
                                            in
                                            Aleppo have lost the ability to do
                                            most of their common activities due to the war and the financial crisis.
                                            By
                                            supporting these organization,the center aims to give them a chance to
                                            continue supporting their activities through a micro-project.The
                                            micro-project
                                            should
                                            also serve a purpose related to
                                            the
                                            Christian message
                                            of the organization.
                                        </div>
                                    @elseif($whatCategory->id == '2')
                                        {{-- Development --}}
                                        @lang('what_we_do.developmentDesc')
                                    @elseif($whatCategory->id == '3')
                                        {{-- Rehabilitation --}}
                                        <div data-aos="fade-up" data-aos-duration="600">
                                            <div>The Rehabilitation work in the post-war period is crucial for the early
                                                recovery of communities. It is also imperative to restore damaged
                                                infrastructures and support services that allow people to resume their
                                                lives. Christian Hope Center has contributed in this field through the
                                                rehabilitation of destroyed educational and communal facilities such as
                                                schools and playgrounds, and the restoration of houses, and workplaces.
                                                Our efforts also extended to supporting rural communities by providing
                                                photovoltaic infrastructure for electricity production and water
                                                extraction in several villages.
                                            </div>
                                            {{--<div>The post-war period is very--}}
                                            {{--important in--}}
                                            {{--the reestablishment of the infrastructure and support--}}
                                            {{--the facilities which can help people to continue their lives in the most--}}
                                            {{--natural--}}
                                            {{--way, and--}}
                                            {{--</div>--}}
                                            {{--<div> for the youths to feel the hope of--}}
                                            {{--continuing their future--}}

                                            {{--</div>--}}
                                            {{--<div> in this country,--}}
                                            {{--whether it is the rehabilitation of shops,--}}
                                            {{--</div>--}}
                                            {{--<div> schools and playgrounds.</div>--}}
                                        </div>
                                    @elseif($whatCategory->id == '4')
                                        {{-- Relief --}}
                                        <div data-aos="fade-up" data-aos-duration="300">
                                            <div>Our relief programs are designed to ease the hardships resulting from
                                                the
                                                Syrian war and its intricate economic effects, which are putting strain
                                                on
                                                the majority of families living below the poverty line. Our goal is to
                                                help
                                                these families meet their basic needs and maintain their dignity.
                                            </div>
                                            {{--<div>--}}
                                            {{--prolonged war--}}
                                            {{--created an economic crisis which still--}}
                                            {{--</div>--}}
                                            {{--<div>--}}
                                            {{--weighs heavily on society and overwhelms it with--}}
                                            {{--the--}}
                                            {{--</div>--}}
                                            {{--<div>high costs of the basic needs of everyday life.</div>--}}
                                        </div>
                                    @elseif($whatCategory->id == '18')
                                        {{--Earthquake--}}
                                        <div data-aos="fade-up" data-aos-duration="300">
                                            <div>Following the 7.8 magnitude earthquake that struck Turkey
                                            </div>
                                            <div> and Syria on
                                                February 6th, the cities of Aleppo and Latakia
                                            </div>
                                            <div> suffered widespread damage
                                                and destruction,
                                            </div>
                                            <div>with thousands of buildings destroyed and</div>
                                            <div>tens of thousands
                                                of people displaced.
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="600"></div>
    <div class="initiatives-container" data-aos="fade-up" data-aos-duration="600">
        @if($whatCategory->id == '4')
            {{-- Relief --}}
            <div class="card-height">
                <div class="single-card">
                    <div class="row">
                        <div
                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pe-md-0 pe-sm-0">
                            <div id="carousel" class="carousel slide w-100 project-carousel" data-bs-ride="carousel"
                                 data-interval="1000">
                                <div class="carousel-inner project-carousel">
                                    <div class="carousel-item active">
                                        <img class="w-100" style="object-fit: cover"
                                             src="/images/initiatives/Family to Family/f1.jpg">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="w-100" style="object-fit: cover"
                                             src="/images/initiatives/Family to Family/f2.jpg">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="w-100" style="object-fit: cover"
                                             src="/images/initiatives/Family to Family/f3.jpg">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="w-100" style="object-fit: cover"
                                             src="/images/initiatives/Family to Family/f4.jpg">
                                    </div>
                                </div>
                                <button class="carousel-control-prev"
                                        data-bs-target="#carousel"
                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next"
                                        data-bs-target="#carousel"
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
                                    <div class="col-12">
                                        <div class="card-title">@lang('development.f2fTitle')</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card-title-section"></div>
                                    </div>
                                </div>
                                <div class="card-content">@lang('development.f2fText')</div>
                                <div class="row">
                                    <div class="col d-flex justify-content-end">
                                        <a href="/projects/family-to-family"
                                           class="readmore-btn">@lang('development.previewProgram')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(isset($subWhatCategory))
            @php
                if ($whatCategory->name === 'Family to Family') {
                    $route = 'public.family2family.project';
                }
            @endphp
        @endif
        {{--@if($agent->isPhone())--}}
        <div class="d-lg-none d-md-none d-sm-none d-block">
            @foreach($initiatives as $i=>$initiative)
                <div class="card-height">
                    <div class="single-card">
                        <div class="row">
                            @if( $whatCategory->id != '4')
                                <div
                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pe-md-0 pe-sm-0">
                                    <div id="carouselsm-ini{{$initiative->id}}"
                                         class="carousel slide w-100 project-carousel"
                                         data-bs-ride="carousel"
                                         data-interval="1000">
                                        <div class="carousel-inner project-carousel">
                                            <div class="carousel-inner project-carousel">
                                                    <?php $k = 0 ?>
                                                @foreach($initiative->ImagesRandom as $image)
                                                    <div class="carousel-item @if($k++ == 0) active @endif">
                                                        <a href="{{substr($image['path'], 0, -4).'b.jpg'}}"
                                                           data-fancybox="gallery-inism-{{$initiative->id}}"
                                                           data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                            <img class="w-100 h-100 d-block"
                                                                 src="{{$image['path']}}"
                                                                 style="object-fit: cover"/></a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev"
                                                data-bs-target="#carouselsm-ini{{$initiative->id}}"
                                                data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next"
                                                data-bs-target="#carouselsm-ini{{$initiative->id}}"
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
                                                             src="/images/ico/video-ini-icon.svg"/>
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
                                                    <strong>{{$initiative->$language->date_string}}</strong>
                                                </div>
                                            @endif
                                            @if($initiative->$language->organization !== '0')
                                                <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                            @endif
                                            @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                <div><br></div>
                                            @endif
                                            @if(strlen($initiative->$language->description)>50)
                                                {!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->description)), 0, 50)).'...'!!}
                                            @else
                                                <div>{{$initiative->$language->description}}</div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                @if(isset($subWhatCategory))
                                                    <a href="{{ route($route, [
                                                str_slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                str_slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                       class="readmore-btn">@lang('main.readMore')
                                                    </a>
                                                @else
                                                    <a href="{{ route('new.public.initiative',
                                [str_slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                str_slug(strtolower($initiative->english->title))]   ) }}"
                                                       class="readmore-btn">@lang('main.readMore')</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div
                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end ps-lg-0 ps-md-0 ps-sm-0">
                                    <div id="carousel-ini{{$initiative->id}}"
                                         class="carousel slide w-100 project-carousel"
                                         data-bs-ride="carousel"
                                         data-interval="1000">
                                        <div class="carousel-inner project-carousel">
                                            <div class="carousel-inner project-carousel">
                                                    <?php $k = 0 ?>
                                                @foreach($initiative->ImagesRandom as $image)
                                                    <div class="carousel-item @if($k++ == 0) active @endif">
                                                        <a href="{{substr($image['path'], 0, -4).'b.jpg'}}"
                                                           data-fancybox="gallery-ini-{{$initiative->id}}"
                                                           data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                            <img class="w-100 h-100 d-block"
                                                                 src="{{$image['path']}}"
                                                                 style="object-fit: cover"/></a>
                                                    </div>
                                                @endforeach
                                            </div>
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
                                    <div style="padding-right: .6vw">
                                        <div class="row d-flex align-items-center" style="margin-top: 1vw">
                                            <div class="col-10">
                                                <div class="card-title">{{$initiative->$language->title}}</div>
                                            </div>
                                            <div class="col-2 text-end">
                                                @if($initiative->video !== '0')
                                                    {{--<a href="#" class="launch-modal"--}}
                                                    {{--data-modal-id="modal-video-{{$initiative->id}}">--}}
                                                    {{--<img class="video-icon"--}}
                                                    {{--src="/images/ico/video-ini-icon.svg">--}}
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
                                                    <strong>{{$initiative->$language->date_string}}</strong>
                                                </div>
                                            @endif
                                            @if($initiative->$language->organization !== '0')
                                                <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                            @endif
                                            @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                <div><br></div>
                                            @endif
                                            @if(strlen($initiative->$language->description)>50)
                                                {!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->description)), 0, 50)).'...'!!}
                                            @else
                                                <div>{{$initiative->$language->description}}</div>
                                            @endif

                                        </div>
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                @if(isset($subWhatCategory))
                                                    <a href="{{ route($route, [
                                                str_slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                str_slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                       class="readmore-btn">@lang('main.readMore')
                                                    </a>
                                                @else
                                                    <a href="{{ route('new.public.initiative',
                                [str_slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                str_slug(strtolower($initiative->english->title))]   ) }}"
                                                       class="readmore-btn">@lang('main.readMore')</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-lg-block d-md-block d-sm-block d-none">
            @php
                $num = 0;
            @endphp
            @foreach($initiatives as $i=>$initiative)
                <div class="card-height">
                    <div class="single-card">
                        <div class="row">
                            @if( $whatCategory->id != '4')
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
                                                    <div class="carousel-item @if($k++ == 0) active @endif">
                                                        <a href="{{substr($image['path'], 0, -4).'b.jpg'}}"
                                                           data-fancybox="gallery-initiative-{{$initiative->id}}"
                                                           data-caption="{{ ucfirst($initiative->$language->title) }}">
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
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                        <div style="padding-left: .6vw">
                                            <div class="row d-flex align-items-center"
                                                 style="margin-top: 1vw">
                                                <div class="col-10">
                                                    <div class="card-title">{{$initiative->$language->title}}</div>
                                                </div>
                                                <div class="col-2 text-end">
                                                    @if($initiative->video !== '0')
                                                        {{--<a href="#" class="launch-modal"--}}
                                                        {{--data-modal-id="modal-video-{{$initiative->id}}">--}}
                                                        {{----}}
                                                        {{--</a>--}}
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
                                                        <strong>{{$initiative->$language->date_string}}</strong>
                                                    </div>
                                                @endif
                                                @if($initiative->$language->organization !== '0')
                                                    <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                                @endif
                                                @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                    <div><br></div>
                                                @endif
                                                @if(strlen($initiative->$language->description)>50)
                                                    {!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->description)), 0, 50)).'...'!!}
                                                @else
                                                    <div>{{$initiative->$language->description}}</div>
                                                @endif

                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    @if(isset($subWhatCategory))
                                                        <a href="{{ route($route, [
                                                str_slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                str_slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                           class="readmore-btn">@lang('main.readMore')
                                                        </a>
                                                    @else
                                                        <a href="{{ route('new.public.initiative',
                                [str_slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                str_slug(strtolower($initiative->english->title))]   ) }}"
                                                           class="readmore-btn">@lang('main.readMore')</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                        <div style="padding-right: .6vw">
                                            <div class="row d-flex align-items-center"
                                                 style="margin-top: 1vw">
                                                <div class="col-10">
                                                    <div class="card-title">{{$initiative->$language->title}}</div>
                                                </div>
                                                <div class="col-2 text-end">
                                                    @if($initiative->video !== '0')
                                                        {{--<a href="#" class="launch-modal"--}}
                                                        {{--data-modal-id="modal-video-{{$initiative->id}}">--}}
                                                        {{----}}
                                                        {{--</a>--}}
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
                                                        <strong>{{$initiative->$language->date_string}}</strong>
                                                    </div>
                                                @endif
                                                @if($initiative->$language->organization !== '0')
                                                    <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                                @endif
                                                @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                    <div><br></div>
                                                @endif
                                                @if(strlen($initiative->$language->description)>50)
                                                    {!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->description)), 0, 50)).'...'!!}
                                                @else
                                                    <div>{{$initiative->$language->description}}</div>
                                                @endif

                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    @if(isset($subWhatCategory))
                                                        <a href="{{ route($route, [
                                                str_slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                str_slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                           class="readmore-btn">@lang('main.readMore')
                                                        </a>
                                                    @else
                                                        <a href="{{ route('new.public.initiative',
                                [str_slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                str_slug(strtolower($initiative->english->title))]   ) }}"
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
                                            {{--<div class="carousel-inner project-carousel">--}}
                                            {{--<div class="carousel-item active">--}}
                                            {{--<img class="w-100" src="{{$initiative->ImagesRandom[0]['path']}}">--}}
                                            {{--</div>--}}
                                            {{--<div class="carousel-item">--}}
                                            {{--<img class="w-100" src="{{$initiative->ImagesRandom[1]['path']}}">--}}
                                            {{--</div>--}}
                                            {{--@if(count($initiative->ImagesRandom) > 2)--}}
                                            {{--<div class="carousel-item">--}}
                                            {{--<img class="w-100"--}}
                                            {{--src="{{$initiative->ImagesRandom[2]['path']}}">--}}
                                            {{--</div>--}}
                                            {{--@endif--}}
                                            {{--</div>--}}
                                            <div class="carousel-inner project-carousel">
                                                    <?php $k = 0 ?>
                                                @foreach($initiative->ImagesRandom as $image)
                                                    <div class="carousel-item @if($k++ == 0) active @endif">
                                                        <a href="{{substr($image['path'], 0, -4).'b.jpg'}}"
                                                           data-fancybox="gallery-initiative1-{{$initiative->id}}"
                                                           data-caption="{{ ucfirst($initiative->$language->title) }}">
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
                                @endif
                            @else
                                @if($num %2 ==0)
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                        <div style="padding-right: .6vw">
                                            <div class="row d-flex align-items-center"
                                                 style="margin-top: 1vw">
                                                <div class="col-10">
                                                    <div class="card-title">{{$initiative->$language->title}}</div>
                                                </div>
                                                <div class="col-2 text-end">
                                                    @if($initiative->video !== '0')
                                                        {{--<a href="#" class="launch-modal"--}}
                                                        {{--data-modal-id="modal-video-{{$initiative->id}}">--}}
                                                        {{--<img class="video-icon"--}}
                                                        {{--src="/images/ico/video-ini-icon.svg">--}}
                                                        {{--</a>--}}
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
                                                        <strong>{{$initiative->$language->date_string}}</strong>
                                                    </div>
                                                @endif
                                                @if($initiative->$language->organization !== '0')
                                                    <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                                @endif
                                                @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                    <div><br></div>
                                                @endif
                                                @if(strlen($initiative->$language->description)>50)
                                                    {!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->description)), 0, 50)).'...'!!}
                                                @else
                                                    <div>{{$initiative->$language->description}}</div>
                                                @endif

                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    @if(isset($subWhatCategory))
                                                        <a href="{{ route($route, [
                                                str_slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                str_slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                           class="readmore-btn">@lang('main.readMore')
                                                        </a>
                                                    @else
                                                        <a href="{{ route('new.public.initiative',
                                [str_slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                str_slug(strtolower($initiative->english->title))]   ) }}"
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
                                                    <div class="carousel-item @if($k++ == 0) active @endif">
                                                        <a href="{{substr($image['path'], 0, -4).'b.jpg'}}"
                                                           data-fancybox="gallery-ini-{{$initiative->id}}"
                                                           data-caption="{{ ucfirst($initiative->$language->title) }}">
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
                                @else
                                    <div
                                        class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-end pe-lg-0 pe-md-0 pe-sm-0">
                                        <div id="carousel-ini{{$initiative->id}}"
                                             class="carousel slide w-100 project-carousel"
                                             data-bs-ride="carousel"
                                             data-interval="1000">
                                            <div class="carousel-inner project-carousel">
                                                <div class="carousel-inner project-carousel">
                                                        <?php $k = 0 ?>
                                                    @foreach($initiative->ImagesRandom as $image)
                                                        <div class="carousel-item @if($k++ == 0) active @endif">
                                                            <a href="{{substr($image['path'], 0, -4).'b.jpg'}}"
                                                               data-fancybox="gallery-ini-{{$initiative->id}}"
                                                               data-caption="{{ ucfirst($initiative->$language->title) }}">
                                                                <img class="w-100 h-100 d-block"
                                                                     src="{{$image['path']}}"
                                                                     style="object-fit: cover"/></a>
                                                        </div>
                                                    @endforeach
                                                </div>
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
                                            <div class="row d-flex align-items-center"
                                                 style="margin-top: 1vw">
                                                <div class="col-10">
                                                    <div class="card-title">{{$initiative->$language->title}}</div>
                                                </div>
                                                <div class="col-2 text-end">
                                                    @if($initiative->video !== '0')
                                                        {{--<a href="#" class="launch-modal"--}}
                                                        {{--data-modal-id="modal-video-{{$initiative->id}}">--}}
                                                        {{--<img class="video-icon"--}}
                                                        {{--src="/images/ico/video-ini-icon.svg">--}}
                                                        {{--</a>--}}
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
                                                        <strong>{{$initiative->$language->date_string}}</strong>
                                                    </div>
                                                @endif
                                                @if($initiative->$language->organization !== '0')
                                                    <strong> @lang('initiatives.by') {{$initiative->$language->organization}}</strong>
                                                @endif
                                                @if($initiative->$language->date_string !== '0' || $initiative->$language->organization !== '0')
                                                    <div><br></div>
                                                @endif
                                                @if(strlen($initiative->$language->description)>50)
                                                    {!!implode(' ', array_slice(explode(' ', strip_tags($initiative->$language->description)), 0, 50)).'...'!!}
                                                @else
                                                    <div>{{$initiative->$language->description}}</div>
                                                @endif

                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    @if(isset($subWhatCategory))
                                                        <a href="{{ route($route, [
                                                str_slug(strtolower($subWhatCategory->name)),
                                                $initiative->id,
                                                str_slug(strtolower($initiative->english->title))
                                        ]) }}"
                                                           class="readmore-btn">@lang('main.readMore')
                                                        </a>
                                                    @else
                                                        <a href="{{ route('new.public.initiative',
                                [str_slug(strtolower($whatCategory->name)),
                                $initiative->id,
                                str_slug(strtolower($initiative->english->title))]   ) }}"
                                                           class="readmore-btn">@lang('main.readMore')</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                @php $num++ ;@endphp
            @endforeach
        </div>
    </div>
    <div class="horizontal-line last"></div>
</div>

@include('new.public.footer')
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
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
</body>
</html>
