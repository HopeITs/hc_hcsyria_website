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

    <meta name="keywords" content="aleppo syria, hope, center, roots,light"/>
    <title>Roots of Hope</title>
    <link href="{{asset('css/roots.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnc.heyzine.com/release/jquery.pdfflipbook.4.js"></script>
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
<div id="rootstofhope" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                    </div>
                    <div class="content">
                        <div class="main_title" data-aos="fade-up" data-aos-duration="600">STORIES OF HOPE, FAITH &
                            HERITAGE
                        </div>
                        <div class="main_subtitle text-uppercase" data-aos="fade-up" data-aos-duration="1000">roots of
                            hope
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                </div>
            </div>
        </div>
    </div>
    <div class="HomeCarousel position-relative">
        <img src="/images/rootsofhope/Cover.png" class="d-block w-100 h-100" style="object-fit: cover;">
        <img src="{{$latest_root->image_path}}" class="image-cover">
        <div class="functions-section position-absolute">
            <div class="text-uppercase">
                <div class="row functions-container g-0"> <!-- Bootstrap 5 -->
                    <div class="col-auto pe-2 d-inline-flex h-100">
                        <a target="_blank" href="{{$latest_root->url}}">
                            <img src="/images/ico/preview-icon.png" alt="Preview" style="cursor:pointer; width: 5vw;">
                        </a>
                    </div>
                    <div class="col-auto p-0 d-inline-flex">
                        <a href="{{$latest_root->file_path}}" download>
                            <img src="/images/ico/download-icon.png" alt="Download" style="cursor:pointer;width: 1.7vw;">
                        </a>
                    </div>
                </div>
            </div>
            <div>{{$latest_root->title}}</div>
            <div >Published By <strong class="text-uppercase">Christian Hope Center</strong></div>
        </div>
        <div class="description-section position-absolute">
            <div class="text-uppercase">roots of hope</div>
            <hr>
            <div>Since 2013 (officially established in 2018), Christian
                Hope Center has been dedicated to supporting
                Christian families across Syria. Through a wide range
                of programs and initiatives, the Center seeks to serve
                all age groups, helping them navigate the hardships
                and long-term challenges brought on by war and
                protracted crises. A key strength of the Center lies in
                its meticulous follow-up and management of
                projects, which has fostered strong trust among
                donors, beneficiaries, and partners alike.
            </div>
        </div>
    </div>
    @if(count($roots)>0)
        <div class="all-versions">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <div class="section-divider">
                            <div class="line"></div>
                            <div class="label">All Versions</div>
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center ">
                    <div class="col-lg-5 col-md-5 col-sm-7 col-7">
                        <div class="row d-flex justify-content-center">
                            @foreach($roots as $root)
                                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                                    <div class="row">
                                        <img src="{{$root->image_path}}"/>
                                    </div>
                                    <div class="mt-lg-2 mt-md-2 mt-sm-0 mt-0">
                                        <span class="title"> {{$root->title}}</span>
                                        <span>
                                            <a target="_blank" href="{{ $root->url }}">
                                                <img src="{{ asset('images/ico/eye-icon.png') }}"
                                                     alt="Preview" class="function-icon">
                                            </a>
                                        </span>
                                        <span>
                                            <a href="{{ asset($root->file_path) }}" download>
                                                <img src="{{ asset('images/ico/download1-icon.png') }}"
                                                     alt="Download" class="function-icon">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
</div>
@include('new.public.footer')
@stack('fancyVideo')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
</body>
</html>
