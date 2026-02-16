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
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:type" content="article"/>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/news.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link href="/css/youth.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <style>

    </style>

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

@include('public.navbar')

<section id="youth_member">
    <div class="row" style="display: flex; justify-content: center; margin-bottom: 2rem;">
        <div style="padding-top: 120px">
            <div id="{{$profile->image_path}}" class="member">
                <div>
                    <div class="row">
                        <div class="col" style="display: flex; justify-content: center">
                            <div class="image">
                                <img class="frame-circle" src="../images/youth/picture circle.png">
                                <img src="{{$profile->image_path}}"
                                     class="img-circle">
                            </div>
                        </div>
                    </div>
                    <div class="name">
                        <p class="firstname">{{$profile->firstname}}</p>
                        <p class="lastname">{{$profile->lastname}}</p>
                    </div>

                    @if($profile->facebook != null)
                        <div class="media-link">
                            <a href="https://www.facebook.com/{{$profile->facebook}}"><img src="/images/youth/facebook.svg"></a>
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
                            <a href="https://wa.me/+{{$profile->whatsapp}}"><img src="/images/youth/whatsapp.svg"></a>
                            <span><a href="https://wa.me/+{{$profile->whatsapp}}">+{{$profile->whatsapp}}</a></span></div>
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
</section>
@include('public.footer')


<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
<script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
<script>
    $(window).on('load', function(){
        setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
    });
    function removeLoader() {
        $(".preloader").fadeOut(500, function () {
            // fadeOut complete. Remove the loading div
            $(".preloader").remove(); //makes page more lightweight
        });
    };
</script>
@stack('navbar-scripts')

</body>
</html>
