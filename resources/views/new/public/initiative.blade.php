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
    <script src="/js/jquery.js"></script>
    @include('new.public.components.analytics-head')
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

    <link href="{{asset('css/main-new.css')}}" rel="stylesheet">
    <link href="{{asset('css/initiative.css')}}" rel="stylesheet">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet">

    <link href="/css/font-awesome.min.css" rel="stylesheet">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
          integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
          crossorigin="anonymous">
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->

    {{--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="/css/bootstrap.css">--}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{--<script src="/js/aos.js"></script>--}}
    {{--<link href="css/aos.css" rel="stylesheet">--}}
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>

    {{--<script type="text/javascript" src="/js/bootstrap.js"></script>--}}
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    {{--<script type="text/javascript" src="/js/jquery.event.move.js"></script>--}}
    <script type="text/javascript" src="/js/jquery.event.move.js"></script>
    <script type="text/javascript" src="/js/jquery.twentytwenty.js"></script>
    <link href="/css/twentytwenty.css" rel="stylesheet">

    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <div class="preloader">
        <div class="preloader-gif"></div>
    </div>
</head>
<body>
@include('new.public.components.analytics-body')
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=2133577546862306&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

@include('new.public.navbar')
<div id="initiative" class="page_start @if($mainInitiative->whatCategory->$whatCatName == 'Study Zone') studyzone @endif ">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                        {{--<div style="height: 2.5vw"></div>--}}
                    </div>
                    <div class="content">
                        @if($mainInitiative->whatCategory->$whatCatName == 'Family to Family')
                            <div class="main_title" data-aos="fade-up" data-aos-duration="600">
                                Aid Program
                            </div>
                        @endif
                        @if($mainInitiative->whatCategory->$whatCatName == 'Children University')
                            <div class="main_title" data-aos="fade-up" data-aos-duration="600">
                                Educational Program
                            </div>
                        @endif
                        @if($mainInitiative->whatCategory->$whatCatName == 'Study Zone')
                            <div class="main_title" data-aos="fade-up" data-aos-duration="600">
                                Youth Program
                            </div>
                        @endif
                        @if($mainInitiative->whatCategory->$whatCatName == 'School to School')
                            <div class="main_title" data-aos="fade-up" data-aos-duration="600">
                                Educational Support
                            </div>
                        @endif
                        @if($mainInitiative->whatCategory->$whatCatName == 'DISC')
                            <div class="disc main_subtitle text-capitalize" data-aos="fade-up"
                                 data-aos-duration="1000">@lang('what_we_do.disc')
                            </div>
                        @else
                            <div class="main_subtitle text-capitalize" data-aos="fade-up"
                                 data-aos-duration="1000">{{ $mainInitiative->whatCategory->$whatCatName }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                    @if($mainInitiative->whatCategory->$whatCatName == 'Family to Family')
                        <img src="/images/logos/Family-to-Family.svg" class="d-block project-logo" data-aos="fade-up"
                             data-aos-duration="1000">
                    @endif
                    @if($mainInitiative->whatCategory->$whatCatName == 'Children University')
                        <img src="/images/logos/Children-Uni.svg" class="d-block square-project-logo"
                             data-aos="fade-up"
                             data-aos-duration="1000">
                    @endif
                    @if($mainInitiative->whatCategory->$whatCatName == 'School to School')
                        <img src="/images/logos/school.svg" class="d-block project-logo"
                             data-aos="fade-up"
                             data-aos-duration="1000">
                    @endif
                    @if($mainInitiative->whatCategory->$whatCatName == 'DISC')
                        <img src="/images/logos/disc.svg" class="d-block disc project-logo"
                             data-aos="fade-up"
                             data-aos-duration="1000">
                    @endif
                    @if($mainInitiative->whatCategory->$whatCatName == 'Study Zone')
                        <img src="/images/logos/study.svg" class="d-block study project-logo"
                             data-aos="fade-up"
                             data-aos-duration="1000">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div id="ini-section" class="big">
        @if(count($images)>1)
            <div id="iniCarousel_big" class="carousel slide pull-right w-50" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php $k = 0 ?>
                    @foreach($images as $image)
                        <div class="carousel-item @if($k++ == 0) active @endif">
                            <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                               data-fancybox="gallery"
                               data-caption="{{ ucfirst($mainInitiative->$language->title) }}">
                                <img class="w-100 h-100 d-block" src="{{$image->path}}" style="object-fit: cover"></a>
                            <img src="/images/home/image-mask.png" class="image-mask"/>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#iniCarousel_big"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#iniCarousel_big"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <div class="carousel-indicators">
                    {{--<div class="indicators">--}}
                    <?php $k = 0 ?>
                    @foreach($images as $image)
                        <button type="button"
                                data-bs-target="#iniCarousel_big"
                                data-bs-slide-to="{{$k++}}"
                                @if($k == 1)class="active" @endif>
                        </button>
                    @endforeach
                    {{--</div>--}}
                </div>
            </div>
        @endif
        <div class="container-fluid @if(strlen($mainInitiative->$language->content)<450 && strlen($mainInitiative->$language->content)>120 && count($mainInitiative->donors)<0 || (count($mainInitiative->donors)>0) && strlen($mainInitiative->$language->content)<450) ini-height @endif"
             style="background-color: #f4f4f4;">
            <div class="padding-screen">
                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-start p-0">
                        @if($mainInitiative->logo != '0')
                            <img class="ini-logo" src="{{ $mainInitiative->logo }}">
                        @endif
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-10 p-0">
                        <div class="partner-title">
                            @if($mainInitiative->$language->title != '0')
                                {{ $mainInitiative->$language->title }}
                            @endif
                        </div>
                    </div>
                    <div class="col-2 p-0 d-flex justify-content-end align-items-end">
                        @if( $mainInitiative->video != '0')
                            <a href="{{ $mainInitiative->video }}" class="launch-modal"
                               id="iniVideo-{{ $mainInitiative->id }}"
                               data-fancybox="iniVideo-{{ $mainInitiative->id }}">
                                <img class="video-icon"
                                     src="/images/ico/video-ini-icon.svg">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="card-title-section"></div>
                </div>
                <div class="ini-content">
                    @if($mainInitiative->$language->organization != '0')
                        {{ $mainInitiative->$language->organization }}
                    @endif
                    @if($mainInitiative->$language->date_string != '0')
                        <p> {{ $mainInitiative->$language->date_string }}</p>
                    @endif
                    <p>{!! strip_tags($mainInitiative->$language->content) !!}</p>
                </div>
                <div class="card-title-section d-flex justify-content-end align-items-center funded">
                    {{--@if($mainInitiative->whatCategory->$whatCatName == 'Family to Family')--}}
                    {{--<div class="ini-funded">--}}
                    {{--<div>Funded by: Caritas Poland</div>--}}
                    {{--<img src="/images/newLogos/Caritas.svg">--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    @if(count($mainInitiative->donors))
                        <div class="ini-funded">
                            <div>@lang('initiatives.fundedBy')</div>
                            @foreach($mainInitiative->donors as $donor)
                                <div>
                                    <img src="{{$donor->logo}}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div id="ini-section" class="small">
        @if(count($images)>1)
            <div id="iniCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php $k = 0 ?>
                    @foreach($images as $image)
                        <div class="carousel-item @if($k++ == 0) active @endif">
                            <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                               data-fancybox="gallery"
                               data-caption="{{ ucfirst($mainInitiative->$language->title) }}">
                                <img class="w-100 h-100 d-block" src="{{$image->path}}" style="object-fit: cover"></a>
                            <img src="/images/home/image-mask.png" class="image-mask"/>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#iniCarousel"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#iniCarousel"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <div class="carousel-indicators">
                    {{--<div class="indicators">--}}
                    <?php $k = 0 ?>
                    @foreach($images as $image)
                        <button type="button"
                                data-bs-target="#iniCarousel"
                                data-bs-slide-to="{{$k++}}"
                                @if($k == 1)class="active" @endif>
                        </button>
                    @endforeach
                    {{--</div>--}}
                </div>
            </div>
        @endif
        <div class="container-fluid" style="background-color: #F7F7FB;">
            <div class="padding-screen">
                <div class="row m-0 mb-3">
                    <div class="col-12 d-flex justify-content-start p-0">
                        @if($mainInitiative->logo != '0')
                            <img class="ini-logo" src="{{ $mainInitiative->logo }}">
                        @endif
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-10 p-0">
                        <div class="partner-title">
                            @if($mainInitiative->$language->title != '0')
                                {{ $mainInitiative->$language->title }}
                            @endif
                        </div>
                    </div>
                    <div class="col-2 p-0 d-flex justify-content-end align-items-end">
                        @if( $mainInitiative->video != '0')
                            <a href="{{ $mainInitiative->video }}" class="launch-modal"
                               id="iniVideo-{{ $mainInitiative->video }}"
                               data-fancybox="iniVideo-{{ $mainInitiative->video }}">
                                <img class="video-icon"
                                     src="/images/ico/video-ini-icon.svg">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-title-section"></div>
                    </div>
                </div>
                <div class="ini-content">
                    @if($mainInitiative->$language->organization != '0')
                        {{ $mainInitiative->$language->organization }}
                    @endif
                    @if($mainInitiative->$language->date_string != '0')
                        <p> {{ $mainInitiative->$language->date_string }}</p>
                    @endif
                    <p>{!! strip_tags($mainInitiative->$language->content) !!}</p>
                </div>
                <div class="card-title-section d-flex justify-content-end align-items-center funded">
                    {{--@if($mainInitiative->whatCategory->$whatCatName == 'Family to Family')--}}
                    {{--<div class="ini-funded">--}}
                    {{--<div>Funded by: Caritas Poland</div>--}}
                    {{--<img src="/images/newLogos/Caritas.svg">--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    @if(count($mainInitiative->donors))
                        <div class="ini-funded">
                            <div>@lang('initiatives.fundedBy')</div>
                            @foreach($mainInitiative->donors as $donor)
                                <div>
                                    <img src="{{$donor->logo}}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-line" data-aos="fade-up" data-aos-duration="600"></div>
    @if(count($imagesRehabilitation))
        <div id="rehabilitation-section">
            <div class="page-margin">
                <div class="container-fluid">
                    <div class="row section-space" data-aos="fade-up" data-aos-duration="600">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="section-title">The Result of Reconstruction</div>
                        </div>
                    </div>
                    <div class="horizontal-line" data-aos="fade-up" data-aos-duration="600"></div>
                    @foreach($imagesRehabilitation as $image)
                        <div class="row d-flex justify-content-center section-space" data-aos="fade-up"
                             data-aos-duration="600">
                            <div class="col-7 mt-3 mb-3">
                                <div class="twentytwenty-container" id="container_{{$image->id}}">
                                    <img class="w-100" src="{{$image->path_1}}">
                                    <img class="w-100" src="{{$image->path_2}}">
                                </div>
                            </div>
                        </div>
                        <div class="horizontal-line" data-aos="fade-up" data-aos-duration="600"></div>
                    @endforeach
                </div>
                {{--<div>--}}
                    {{--@foreach($imagesRehabilitation as $image)--}}
                        {{--<section class="comparisonSection">--}}
                            {{--<div class="comparisonImage beforeImage">--}}
                                {{--<img src="{{$image->path_1}}" alt="before">--}}
                            {{--</div>--}}
                            {{--<div class="comparisonImage afterImage">--}}
                                {{--<img src="{{$image->path_2}}" alt="after">--}}
                            {{--</div>--}}
                        {{--</section>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            </div>
        </div>
    @endif
    <div class="related-posts position-relative section-space" data-aos="fade-up" data-aos-duration="600">
        <div class="title text-capitalize">@lang('initiatives.related')</div>
        <div class="container">
            <div class="owl-carousel owl-theme">
                @foreach($initiativesSameType as $initiative)
                    @php
                        $route = 'new.public.initiative';
                        $category = Str::slug(strtolower($initiative->whatCategory->name));
                    @endphp
                    <div class="item">
                        <a href="{{ route($route, [ $category, $initiative->id,
                         Str::slug(strtolower($initiative->english->title))]) }}">
                            <div class="row other-initiatives-inner">
                                <div class="col-12 related-ini-img">
                                    <img src="{{$initiative->firstImage['path']}}" width="100%">
                                </div>
                                <div class="col-12">
                                    <div class="related-ini-txt">
                                        <div>{{ ucfirst($initiative->$language->title) }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <img src="/images/home/image-mask.png" class="image-mask"/>
        <div class="seperator-line" style="background: white;height: 1vw;"></div>
    </div>
    <div class="seperator-line" style="background: white;height: 1vw;"></div>
    <div class="horizontal-line last"></div>
</div>

@include('new.public.footer')
<script type="text/javascript">
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
            autoplay: false,
            loop: true,
            mouseDrag: false,
            touchDrag: true,
            pullDrag: false,
            dots: true,
            autoplaySpeed: 700,
            responsive: {
                0: {
                    items: 4,
                },
                400: {
                    items: 4,
                },
                600: {
                    items: 4,
                },
                740: {
                    items: 4,
                },
                940: {
                    items: 5,
                },
                992: {
                    items: 5,
                },
                1200: {
                    items: 5,
                },
                1400: {
                    items: 5,
                },
                1600: {
                    items: 5,
                },
                1800: {
                    items: 5,
                }
            },
        });
        $('.owl-carousel').find('.owl-nav').removeClass('disabled');
        $('.owl-carousel').on('changed.owl.carousel', function (event) {
            $(this).find('.owl-nav').removeClass('disabled');
        });
        $('.owl-carousel').find('.owl-dots').removeClass('disabled');
        $('.owl-carousel').on('changed.owl.carousel', function (event) {
            $(this).find('.owl-dots').removeClass('disabled');
        });
    });
</script>
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
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
<script>
    @foreach($imagesRehabilitation as $image)
    setTimeout(() => {
        $('#container_{{$image->id}}').twentytwenty();
    }, "1000");
    @endforeach
</script>
{{--<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>--}}
{{--<script>--}}
    {{--gsap.utils.toArray(".comparisonSection").forEach(section => {--}}
        {{--let tl = gsap.timeline({--}}
            {{--scrollTrigger: {--}}
                {{--trigger: ".comparisonSection",--}}
                {{--start: "top top",--}}
                {{--end: () => "+=" + section.offsetHeight,--}}
                {{--scrub: true,--}}
                {{--pin: true--}}
            {{--},--}}
            {{--defaults: {ease: "none"}--}}
        {{--});--}}

        {{--tl.fromTo(section.querySelector(".afterImage"), {yPercent: 100, x: 0}, {yPercent: 0})--}}
            {{--.fromTo(section.querySelector(".afterImage img"), {yPercent: -100, x: 0}, {yPercent: 0}, 0);--}}
    {{--});--}}
{{--</script>--}}
</body>
</html>
