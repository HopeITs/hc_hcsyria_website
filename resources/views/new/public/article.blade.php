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
    @include('new.public.components.analytics-head')

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
    <link href='/css/lato.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">

    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/"/>

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
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <style>
        :root {
            --primary-red: #b5121b;
            --text-dark: #414042;
        }
        .custom-container {
            max-width: 850px;
            margin: 0 auto;
            padding: 0 15px;
        }

        #news-carousel,
        #news-carousel .carousel-inner,
        #news-carousel .carousel-item {
            height: auto !important;
            min-height: auto !important;
            max-height: none !important;
        }
        #news-carousel .carousel-item img {
            width: 100% !important;
            height: auto !important;
            object-fit: contain !important;
        }

        .action-badge {
            color: white !important;
            padding: 6px 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: 'Lato', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none !important;
            gap: 6px;
        }


        .action-badge.icon-only {
            padding: 0;
            width: 25px;
            height: 25px;
            flex-shrink: 0;
        }

        .action-badge i, .action-badge img {
            font-size: 0.9rem;
            object-fit: contain;
            display: block;
            margin: auto;
        }

        .custom-share-menu {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #eaeaea;
            padding: 10px 0;
            min-width: 180px;
            margin-top: 10px !important;
        }

        .custom-share-menu .dropdown-item {
            padding: 10px 20px;
            transition: background-color 0.2s ease;
        }

        .custom-share-menu .dropdown-item:hover {
            background-color: #f6f6f6;
        }

        .custom-share-menu i {
            width: 24px;
            text-align: center;
        }
    </style>

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
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')

<div id="Newsletter" class="news-article page_start">

    <div class="page-margin mb-3">
        <div class="container-fluid">
            <div class="row d-flex" style="min-height: 6vw;">
                <div class="col-6 d-flex justify-content-end flex-column pe-0 position-relative">
                    <div class="first-column w-100"></div>
                    <div class="content">
                        <div class="main_title aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
                            PUBLISHED BY
                        </div>
                        <div class="main_subtitle aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                            CHRISTIAN HOPE CENTER
                        </div>
                    </div>
                </div>
                <div class="col-6"></div>
            </div>
        </div>
    </div>

    <div class="custom-container mt-4">

        <div class="row mx-0 mt-4 mb-3">
            <div class="col-12 p-0">
                <div class="d-flex justify-content-center align-items-center" style="background-color: var(--primary-red); color: white; padding: 16px 0;">
                    <h1 class="m-0" style="font-family: 'Lato', sans-serif; font-size: calc(1.5rem + 1vw); font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase;">OUR NEWS</h1>
                </div>
            </div>
        </div>

        <div class="row mx-0 justify-content-center mb-5">
            <div class="col-12 p-0">
                <div class="inner-container" style="background-color: #f6f6f6; padding: 1rem 2rem;">
                    <div class="row  h-100 g-0">

                        <div class="col-12 p-0 position-relative mb-4" style="border-left: none !important; padding-left: 0 !important;">
                            <style>
                                .news_title::before, .news_title::after { display: none !important; content: none !important; }
                            </style>
                            <div class="d-flex justify-content-between align-items-center mb-2 gap-3" style="border: none !important;">
                                <h1 class="news_title m-0" style="font-family: 'Lato', sans-serif !important; font-size: 2rem; font-weight: 700 !important; color: #555555 !important; line-height: 1.2; border: none !important; border-left: none !important; padding-left: 0 !important; box-shadow: none !important;">
                                    {{ $article->$language->title }}
                                </h1>

                                <div class="d-flex align-items-center gap-2" style="flex-shrink: 0;">


                                    @if($article->video != 0)
                                        <a href="{{$article->video}}" class="launch-modal action-badge icon-only"
                                           id="newsletterVideo-{{ $article->id}}"
                                           data-fancybox="newsletterVideo-{{ $article->id}}" title="Play Video">
                                            <img src="/images/our-news/logo/PLAY-VIDEO.svg" alt="Play">
                                        </a>
                                    @endif

                                        <div class="dropdown d-inline-block" >
                                            <a href="#" class="action-badge icon-only" style="margin-top: 4.5px" id="shareDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Share Article">
                                                <img src="/images/our-news/logo/SHARE.svg" alt="Share">
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-end custom-share-menu" aria-labelledby="shareDropdown">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3" href="#" onclick="copyToClipboard(event)">
                                                        <i class="fa-solid fa-link fs-5 text-dark"></i>
                                                        <span class="fw-bold text-dark">Copy Link</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3" href="https://api.whatsapp.com/send?text={{ urlencode($article->$language->title . ' - ' . url()->current()) }}" target="_blank">
                                                        <i class="fa-brands fa-whatsapp fs-5" style="color: #25D366;"></i>
                                                        <span class="fw-bold text-dark">WhatsApp</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3" href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->$language->title) }}" target="_blank">
                                                        <i class="fa-brands fa-telegram fs-5" style="color: #0088cc;"></i>
                                                        <span class="fw-bold text-dark">Telegram</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3" href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank">
                                                        <i class="fa-brands fa-linkedin fs-5" style="color: #0077b5;"></i>
                                                        <span class="fw-bold text-dark">LinkedIn</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                </div>
                            </div>

                            <hr style="border: none; border-top: 1px solid #ccc; margin: 8px 0 10px 0; opacity: 1;">

                            <div class="d-flex justify-content-between align-items-center" style="font-family: 'Lato', sans-serif !important; font-size: 0.85rem; font-weight: 700; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">

                                <div style="font-family: 'Lato', sans-serif !important; font-size: 0.85rem; font-weight: 700; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">
                                    {{ $article->place->name ?? 'Damascus' }} {{ $article->date ? \Carbon\Carbon::parse($article->date)->format('j/n/Y') : '' }}
                                </div>

                                <span style="display: flex; align-items: center; gap: 6px; color: #999;">
                                    {{ $article->total_views ?? 0 }}
                                    <i class="fa fa-eye" style="font-size: 1.2em; margin-top: 2px"></i>
                                </span>

                            </div>
                        </div>


                        <div class="col-12 news_colomn p-0 mb-4">
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
                                                <img class="d-block" src="{{substr($image->path, 0, -4).'b.jpg'}}" alt="Article Image">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button"
                                        data-bs-target="#news-carousel"
                                        data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        data-bs-target="#news-carousel"
                                        data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>


                        <div class="col-12 news_colomn p-0 mb-4">
                            <div style="column-count: 1; -webkit-column-count: 1; -moz-column-count: 1; font-size: 1.1rem; line-height: 1.8; color: #555;">
                                {!! $article->$language->content !!}
                            </div>
                        </div>

                        <div class="col-12 p-0">
                            <hr style="border: none; border-top: 2px solid #999; margin: 0 0 20px 0; opacity: 1;">
                        </div>

                        <div class="col-12 news_colomn p-0 mt-3">
                            <div class="row file_section mx-0">
                                @if( $article->file != '0')
                                    <div class="col-auto p-0">
                                        <div>@lang('main.attachment'):
                                            <a href="{{ $article->file }}" class="file_btn"
                                               data-toggle="tooltip" rel="tooltip"
                                               data-placement="bottom" title="{{substr($article->file, 12)}}">
                                                <span class="fa fa-paperclip"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col p-0 d-flex justify-content-end align-items-baseline">
                                        <button class="btn back_btn"
                                                onclick="event.preventDefault();window.history.back();">
                                            <i class="fa fa-arrow-left"></i>
                                        </button>
                                        <div class="ms-2">Back</div>
                                    </div>
                                @endif
                            </div>
                        </div>

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
                    <div class="row d-flex justify-content-center">
                        <img src="/images/ico/letter.svg">
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="text-capitalize subscribe-title">subscribe our newsletter to receive the latest news.</div>
                    </div>
                    <div class="row">
                        <div class="col">
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
        </div>
    </div>
    <div class="horizontal-line last"></div>
</div>

@include('new.public.footer')

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

<script>
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
<script>
    $(document).ready(function() {
        $('#shareDropdown').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            var $menu = $(this).next('.dropdown-menu');
            $menu.toggleClass('show');
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu').removeClass('show');
            }
        });
    });
</script>
@stack('navbar-scripts')

</body>
</html>
