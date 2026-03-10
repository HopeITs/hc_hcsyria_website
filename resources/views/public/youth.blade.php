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

<section id="youth">
    @if(app()->isLocale('en'))
    <section id="cover_en" class="position-relative">
    </section>
        @else
            <section id="cover_fr" class="position-relative">
            </section>
        @endif
    <section id="about">
       <div class="title">@lang('youth.title')</div>

        {{--<div class="row" style="display: flex; justify-content: center; text-align: center">--}}
            {{--<div class=" col-md-12 title" >--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row" style="display: flex; justify-content: center; margin-top: 1rem;">--}}
            {{--<div class="col-lg-7 col-md-8 col-sm-11" style="margin-bottom: 2rem;">--}}
                {{--<div class="about-card">--}}
                    {{--<div>--}}
                        {{--<p>@lang('youth.description')</p>--}}
                    {{--</div>--}}
                    {{--<div class="row" style="width: 100%; margin-top: .5rem;">--}}
                        {{--<div class="col-lg-12 col-md-12 col-sm-12 redcolor" style="display: flex; justify-content: center; text-align: center">--}}
                            {{--@lang('youth.together')--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row about_info">
            <div class="horizontal-margin first-part col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center vertical-separator">
                        <p>@lang('youth.description')</p>
                        <br>
                    </div>
            <div class="second-part col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                        <div class="video" style="padding-bottom: 55%">
                            <iframe width="885" height="498" src="https://www.youtube.com/embed/gF8AzxiWRos" title="Syrian Christian Youth Gathering | Intro" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
        </div>
        <div class="row" style="display: flex; align-items: center; justify-content: center">
            <div class="col-md-12 conference">
                <p>@lang('youth.conference')</p>
                <p><span style="font-weight: bold;">@lang('youth.together')</span></p>
            </div>
        </div>
    </section>
    <section id="plan">
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-md-12" style="padding: 0;">
                    <div class="work" style="padding:0rem;margin-bottom: 3rem">
                        <div class="paragraph">
                            <div class="par_title" style="color: #99cc33;">@lang('youth.work_title')</div>
                        </div>
                        <ul class="mt-2">@lang('youth.work')
                        </ul>
                    </div>
            </div>
        </div>
    </section>
    <section id="youth_pic" class="paraxify"> </section>
    <section id="plan">
        <div class="row" style="display: flex; justify-content: center">
            <div class="objectives">
                <div class="col-md-12" style="padding:0rem">
                    <div class="paragraph">
                        <div class="par_title" style="color: #009999;">@lang('youth.objectives_title')</div>
                    </div>
                    <ul style="margin-bottom: 1rem;">@lang('youth.objectives')
                    </ul>
                </div>
                <div class="paragraph participants">
                    <div class="row">
                        <div class="col-md-12" style="padding:0rem">
                            <div class="par_title" style="color: #ff9933;">@lang('youth.participants_title')</div>
                        </div>
                    </div>
                    <ul class="mt-2">@lang('youth.participants')
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="statistics" style="margin-bottom: 10rem; padding-top: 2rem;">
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-lg-3 col-md-3 col-sm-3 stat-info">
                        @if(app()->isLocale('en'))
                        <img style="width: 100%;" src="../images/youth/individuals.png"
                             alt="individuals">
                        @else
                            <img style="width: 100%;" src="../images/youth/personnes.png"
                             alt="individuals">
                        @endif
                    </div>
            <div class="col-lg-3 col-md-3 col-sm-3 stat-info">
                        @if(app()->isLocale('en'))
                        <img style="width: 100%;" src="../images/youth/groups.png" alt="groups">
                        @else
                            <img style="width: 100%;" src="../images/youth/groupes.png"
                             alt="groups">
                        @endif
                    </div>
            <div class="col-lg-3 col-md-3 col-sm-3 stat-info">
                        @if(app()->isLocale('en'))
                        <img style="width: 100%;" src="../images/youth/Coference Palace.png"
                             alt="Coference Palace">
                        @else
                        <img style="width: 100%;" src="../images/youth/de damas.png"
                             alt="individuals">@endif

                    </div>
            <div class="col-lg-3 col-md-3 col-sm-3 stat-info">
                        @if(app()->isLocale('en'))
                        <img style="width: 100%;" src="../images/youth/From to.png"
                             alt="From to">
                        @else
                        <img style="width: 100%;" src="../images/youth/octobre.png"
                             alt="From to">
                            @endif
                    </div>
        </div>
    </section>
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
@stack('navbar-scripts-trans')
</body>
</html>
