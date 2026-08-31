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
    <script src="/js/jquery.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168141177-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-168141177-1');
    </script>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-M9HLZ6M');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:type" content="article"/>

    <title>Christian Youth</title>
    <link href="{{asset('css/youth_new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin=''/>
    <link href="{{asset('css/font-lato.css')}}" rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link href='https://fonts.googleapis.com/css?family=Martel' rel='stylesheet'>

    <script src="/js/html5shiv.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
          integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HLZ6M"
            height="0" width="0" style="display:none;visibility:hidden">
    </iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="preloader">
    <div class="preloader-gif"></div>
</div>

@include('new.public.navbar')

<section id="youth_member" class="page_start">
    <div class="container-fluid">
        <div class="row" style="margin-bottom: 2rem; margin-top: 2vw">
            <div class="col d-flex justify-content-center">
                <div id="{{$profile->image_path}}" class="member">
                    <div>
                        <div class="row">
                            <div class="col d-flex justify-content-center m-0">
                                <div class="image">
                                    <img class="frame-circle" src="../images/youth/picture circle.png">
                                    <img src="{{$profile->image_path}}"
                                         class="img-circle">
                                </div>
                            </div>
                        </div>
                        <div class="name">
                            <div class="firstname">{{$profile->firstname}}</div>
                            <div class="lastname">{{$profile->lastname}}</div>
                        </div>

                        @if($profile->facebook != null)
                            <div class="media-link">
                                <a href="https://www.facebook.com/{{$profile->facebook}}"><img
                                            src="/images/youth/facebook.svg"></a>
                                <span><a href="https://www.facebook.com/{{$profile->facebook}}">facebook.com/{{$profile->facebook}}</a></span>
                            </div>
                        @endif
                        @if($profile->email != null)
                            <div class="media-link">
                                <a href="mailto:{{$profile->email}}"><img src="/images/youth/mail.svg"></a>
                                <span><a href="mailto:{{$profile->email}}">{{$profile->email}}</a></span>
                            </div>
                        @endif
                        @if($profile->whatsapp != null)
                            <div class="media-link">
                                <a href="https://wa.me/+{{$profile->whatsapp}}"><img
                                            src="/images/youth/whatsapp.svg"></a>
                                <span><a href="https://wa.me/+{{$profile->whatsapp}}">+{{$profile->whatsapp}}</a></span>
                            </div>
                        @endif
                        @if($profile->mobile != null)
                            <div class="media-link">
                                <a href="tel:{{$profile->mobile}}"><img src="/images/youth/phone.svg"></a>
                                <span><a href="tel:{{$profile->mobile}}">+{{$profile->mobile}}</a></span>
                            </div>
                        @endif
                        @if($profile->city != null)
                            <div class="media-link" style="padding-bottom: 5px;">
                                <a><img src="/images/youth/location.svg"></a>
                                <span>{{$profile->city}}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('new.public.footer')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')

</body>
</html>
