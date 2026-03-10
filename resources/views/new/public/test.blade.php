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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta property="fb:app_id" content="2133577546862306"/>
    <meta property="og:url" content="https://hcsyria.org/newsletter/{{ $articlePath }}"/>
    <meta property="og:title" content="{{ $article->$language->title }}"/>
    <meta property="og:description" content="{{ $article->$language->description }}"/>
    <title>@lang('navbar.newsletter')</title>
    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/newsletter.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>

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
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <div class="preloader">
        <div class="preloader-gif"></div>
    </div>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HLZ6M"
            height="0" width="0" style="display:none;visibility:hidden">
    </iframe>
</noscript>
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

@include('new.public.navbar')
<div id="Newsletter" class="news-article page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                        {{--<div style="height: 2.5vw"></div>--}}
                    </div>
                    <div class="content">
                        <div class="main_title" data-aos="fade-up" data-aos-duration="600">Published by Christian Hope
                            Center
                        </div>
                        <div class="main_subtitle" data-aos="fade-up" data-aos-duration="1000">Aleppo - Syria</div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                </div>
            </div>
        </div>
    </div>
    <div class="outer-container">
        <div class="inner-container">
            <div id="news_title" class="captial">@lang('main.news_title')</div>
            <div class="row news_ticket h-100">
                <div class="row d-flex align-items-baseline">
                    <div class="col-10">
                        <div class="news_title">{{ $article->$language->title }}</div>
                    </div>
                    <div class="col-2 d-flex justify-content-end">
                        @if($article->video != 0)
                            <a href="{{$article->video}}" class="launch-modal"
                               id="newsletterVideo-{{ $article->id}}"
                               data-fancybox="newsletterVideo-{{ $article->id}}">
                                <img class="videoicon"
                                     src="/images/ico/video-ini-icon.svg">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-12 news_colomn">
                    <div id="news-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php $k = 0 ?>
                            @foreach($images as $image)
                                <button data-bs-target="#news-carousel"
                                        data-bs-slide-to="{{$k++}}"
                                        @if($k == 1) class="active" @endif></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @if(count($images)>0)
                                <?php $k = 0 ?>
                                @foreach($images as $image)
                                    <div class="carousel-item @if($k++ == 0) active @endif">
                                        <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                           data-fancybox="gallery"
                                           data-caption="{{ ucfirst( $article->$language->title) }}">
                                            <img class="w-100 h-100" src="{{$image->path}}"></a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#news-carousel"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#news-carousel"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>
                </div>
                <div class="col-12 news_colomn">
                    <div class="text-column">
                        {!! $article->$language->content !!}
                    </div>
                </div>
                <div class="col-12 news_colomn">
                    <div class="row file_section">
                        @if( $article->file != '0')
                            <div class="col-auto">
                                <div>@lang('main.attachment'):
                                    <a href="{{ $article->file }}" class="file_btn" data-toggle="tooltip" rel="tooltip"
                                       data-placement="bottom" title="{{substr($article->file, 12)}}">
                                        <span class="fa fa-paperclip"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-2 d-flex justify-content-end align-items-baseline">
                                <button class="btn back_btn" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i>
                                </button>
                                <div>Back</div>
                            </div>
                        @endif
                        @if( $article->file == '0')
                            <div class="col-12 d-flex justify-content-end align-items-baseline">
                                <button class="btn back_btn" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i>
                                    <div>Back</div>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="500"></div>
    <div class="subscribe-section">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="600">
                <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                    <div class="section-title">Join Our NewsLetter</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" data-aos="fade-up" data-aos-duration="800">
        <div class="letter page-margin">
            <div class="row d-flex justify-content-center">
                <div class="subscribe-container">
                    <img src="/images/ico/letter.svg">
                    {!! csrf_field() !!}
                    <form class="subscription" name="subsribeForm" id="subsribeForm" action="" method="get">
                        <input class="add-email" id="email" name="email" placeholder="Enter your Email Address"
                               type="email">
                        <label id="subscribe-error" class="subscribe-error">Email has already subscribed! </label>
                        <button class="submit-email" type="submit" name="submit">
                            <span id="before-submit" class="before-submit">Subscribe</span>
                            <span id="after-submit" class="after-submit">Subscribed!</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-line last"></div>
</div>
</div>
@include('new.public.footer')
{{--</section>--}}

<script>
    $(document).ready(function () {
        $("#subsribeForm").validate({
            debug: false,
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Email field is required!",
                    email: "Please Enter a valid format!"
                }
            },
            submitHandler: function (form) {
                let formData = $("form#subsribeForm").serialize()
                $.ajax({
                    url: "http://" + location.host + "/newsletter/subscribe",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    data: {
                        formData,
                        "email": $("input[name='email']").val()
                    },
                    success: function (response) {
                        if (response.msg === 'true') {
                            document.getElementById('subscribe-error').style.display = 'block';
                            setTimeout(function () {
                                document.getElementById('subscribe-error').style.display = 'none';
                                let input = document.getElementById('email');
                                input.value = "";
                            }, 2000);
                        }
                        else if (response.msg === 'false') {
                            document.getElementById('after-submit').style.display = 'block';
                            document.getElementById('before-submit').style.display = 'none';
                            document.getElementById('subscribe-error').style.display = 'none';
                            setTimeout(() => {
                                document.getElementById('after-submit').style.display = 'none';
                                document.getElementById('before-submit').style.display = 'block';
                                let input = document.getElementById('email');
                                input.value = "";
                            }, 2000);
                        }
                    },
                });
            }
        })
    });
</script>

@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
@stack('fancyVideo')
{{--<script>--}}
{{--$(document).ready(function () {--}}
{{--$('.file_btn').tooltip();--}}
{{--});--}}
{{--</script>--}}
<script>
    // do your stuff
    $('#small_screen').hide();
    $('#large_screen').hide();

    $(document).ready(function () {
        if ($(window).width() >= 700) {
            $('#large_screen').show();
            $('#small_screen').hide();
        }
        else {
            $('#small_screen').show();
            $('#large_screen').hide();
        }
    });
</script>
<script>
    $(function () {
        $('.file_btn').on("mouseenter", function () {
            $('.bl').hide();
            $(this).showBalloon({
                position: "right",
                contents: "{{substr($article->file, 12)}}",
                classname: "bl",
                maxLifetime: 1000,
                tipSize: 0,
                delay: 100,
                hideDuration: 500,
                // offsetX: 120,
                showAnimation: function (d, c) {
                    this.fadeIn(d, c);
                },
                css: {
                    fontSize: '1.1rem'
                }
            });
        })
    });
</script>

@stack('navbar-scripts')

</body>
</html>
