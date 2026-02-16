<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $position = 'french_position';
    } else {
        $position = 'position';
    }
@endphp
<head>
    <script src="/js/jquery.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129097809-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-129097809-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Social Media Links</title>

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
    <script type="text/javascript" src="/js/jquery.event.move.js"></script>
    <script type="text/javascript" src="/js/jquery.twentytwenty.js"></script>
    <link href="/css/twentytwenty.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>

</head>
<style>
    .logo-responsive {
        width: 30%;
        max-width: 200px;
        height: auto;
    }

    @media (min-width: 576px) {
        .logo-responsive {
            width: 40%;
        }
    }

    @media (min-width: 768px) {
        .logo-responsive {
            width: 30%;
        }
    }

    @media (min-width: 992px) {
        .logo-responsive {
            width: 20%;
        }
    }

    .custom-heading {
        font-size: 1.1rem; /* mobile */
        color: white;
    }

    @media (min-width: 768px) {
        .custom-heading {
            font-size: 2rem;
        }
    }

    .icon-img {
        width: 32px;
        height: 32px;
        object-fit: contain;
        transition: transform 0.2s ease;
    }

    .icon-img:hover {
        transform: scale(1.1);
    }

    .icon-img-lg {
        width: 110px; /* 32 * 3 */
        height: auto;
    }

    .icon-img-lg:hover {
        transform: scale(1.1);
    }

    .bg-cover-page {
        background-image: url('/images/link/background.png'); /* Adjust path */
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 100vh;
        width: 100%;
    }
</style>
<body>
<div id="Links" class="bg-cover-page">
    <div class="d-flex justify-content-center min-vh-100 px-3 py-4 position-relative">
        <div class="w-100 d-flex flex-column justify-content-between align-items-center" style="max-width: 900px;">
            <div class="d-flex justify-content-between align-items-center text-center text-md-start">
                <!-- Logo -->
                <img src="{{ asset('images/link/disc-revert.png') }}"
                     alt="Logo"
                     class="img-fluid logo-responsive">

                <!-- Text Content -->
                <div style="color: white">
                    <h3 class="custom-heading text-center text-uppercase mb-0">DEVELOPMENT IMPACT<br>
                        AND SUPPORT CENTER</h3>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-between align-items-center text-md-start">
                @foreach($info_disc as $info)
                    <div class="mb-4 text-center">
                        <h5 class="fw-bold text-uppercase custom-heading">{{ $info->city }}</h5>

                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                            <!-- Phone -->
                            <a  href="tel:+{{ $info->phone }}" class="text-decoration-none text-dark" target="_blank">
                                <img src="{{ asset('images/link/phone-revert.png') }}" alt="Phone" class="icon-img">
                            </a>

                            <!-- Facebook -->
                            <a href="{{ $info->facebook}}" class="text-decoration-none text-primary" target="_blank">
                                <img src="{{ asset('images/link/facebook-revert.png') }}" alt="Facebook"
                                     class="icon-img">
                            </a>

                            <!-- Location -->
                            <a href="{{ $info->location }}" class="text-decoration-none text-danger" target="_blank">
                                <img src="{{ asset('images/link/location-revert.png') }}" alt="Location"
                                     class="icon-img">
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="mb-4 text-center">
                    <div class="d-flex flex-column justify-content-center align-items-center flex-wrap">
                        <img style="margin-bottom: .5rem" src="{{ asset('images/link/online-revert.png') }}"
                             alt="Facebook" class="icon-img">
                        <a href="{{route('public.disc_home')}}" class="text-decoration-none text-danger" target="_blank">
                            <img src="{{ asset('images/link/website.png') }}" alt="Website"
                                 class="icon-img-lg">
                        </a>
                    </div>
                </div>

            </div>
            <div class="text-center" style="color: white;font-size: x-small;">
                <div>A Project by:</div>
                <div class="text-uppercase fw-bold">CHRISTIAN HOPE CENTER</div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
