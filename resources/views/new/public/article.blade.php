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
    <meta property="fb:app_id" content="2133577546862306" />
    <meta property="og:url" content="https://hcsyria.org/newsletter/{{ $articlePath }}" />
    <meta property="og:title" content="{{ $article->$language->title }}" />
    <meta property="og:description" content="{{ $article->$language->description }}" />
    <title>@lang('navbar.newsletter')</title>
    <link href="{{ asset('css/main-new.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/newsletter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/our-news.css') }}" rel="stylesheet" type="text/css">
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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/" />

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

        .action-badge i,
        .action-badge img {
            font-size: 0.9rem;
            object-fit: contain;
            display: block;
            margin: auto;
        }

        /* --- Mind-Blowing Share Menu UI (Compact & Outside) --- */
        .share-wrapper {
            position: relative;
            z-index: 1000;
        }

        .modern-share-menu {
            position: absolute;
            top: -10px;
            left: calc(100% + 15px); /* Pushes the menu right outside the button */
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid #eaeaea;
            border-radius: 10px; /* Tighter radius */
            padding: 6px 4px; /* Tighter padding */
            min-width: 150px; /* Slimmer width */
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            
            /* Initial Hidden State */
            opacity: 0;
            visibility: hidden;
            transform: translateX(-10px) scale(0.95);
            transform-origin: left top;
            transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        /* Active State */
        .modern-share-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateX(0) scale(1);
        }

        /* The little triangle pointing LEFT to the button */
        .modern-share-menu::before {
            content: '';
            position: absolute;
            top: 18px;
            left: -5px;
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.98);
            transform: rotate(45deg);
            border-left: 1px solid #eaeaea;
            border-bottom: 1px solid #eaeaea;
        }

        .share-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            border-radius: 6px; 
            text-decoration: none !important;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
            
            /* Hidden State for Staggered Animation */
            opacity: 0;
            transform: translateX(10px);
        }

        /* Staggered Entrance Animation */
        .modern-share-menu.show .share-item {
            opacity: 1;
            transform: translateX(0);
        }
        .modern-share-menu.show .share-item:nth-child(1) { transition-delay: 0.05s; }
        .modern-share-menu.show .share-item:nth-child(2) { transition-delay: 0.10s; }
        .modern-share-menu.show .share-item:nth-child(3) { transition-delay: 0.15s; }
        .modern-share-menu.show .share-item:nth-child(4) { transition-delay: 0.20s; }

        /* Hover States */
        .share-item:hover {
            background: #f8f9fa;
        }

        .share-img-icon {
            width: 20px; /* Clean, compact icon size, no background */
            height: 20px;
            object-fit: contain;
            flex-shrink: 0;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .share-item:hover .share-img-icon {
            transform: scale(1.15) rotate(8deg);
        }

        .share-text {
            font-family: 'Lato', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--text-dark);
            transition: color 0.3s ease;
        }

        /* Mobile fallback: If the screen is too small, drop it downwards instead of off-screen */
        @media (max-width: 992px) {
            .modern-share-menu {
                top: calc(100% + 15px);
                left: auto;
                right: -10px;
                transform-origin: top right;
                transform: translateY(-10px) scale(0.95);
            }
            .modern-share-menu.show {
                transform: translateY(0) scale(1);
            }
            .modern-share-menu::before {
                top: -5px;
                left: auto;
                right: 18px;
                border-bottom: none;
                border-left: 1px solid #eaeaea;
                border-top: 1px solid #eaeaea;
            }
        }

    </style>

</head>

<body>
    @include('new.public.components.analytics-body')

    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src =
                'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=2133577546862306&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="preloader">
        <div class="preloader-gif"></div>
    </div>
    @include('new.public.navbar')

    <div id="Newsletter" class="news-article page_start">
        <div class="custom-container mt-5">

            <div class="row mx-0 mt-4 mb-3">
                <div class="col-12 p-0">
                    <div class="d-flex justify-content-center align-items-center"
                        style="background-color: var(--primary-red); color: white; padding: 16px 0;">
                        <h1 class="m-0"
                            style="font-family: 'Lato', sans-serif; font-size: calc(1.5rem + 1vw); font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase;">
                            OUR NEWS</h1>
                    </div>
                </div>
            </div>

            <div class="row mx-0 justify-content-center mb-5">
                <div class="col-12 p-0">
                    <div class="inner-container" style="background-color: #f6f6f6; padding: 1rem 2rem;">
                        <div class="row  h-100 g-0">

                            <div class="col-12 p-0 position-relative mb-4"
                                style="border-left: none !important; padding-left: 0 !important;">
                                <style>
                                    .news_title::before,
                                    .news_title::after {
                                        display: none !important;
                                        content: none !important;
                                    }
                                </style>
                                <div class="d-flex justify-content-between align-items-center mb-2 gap-3"
                                    style="border: none !important;">
                                    <h1 class="news_title m-0"
                                        style="font-family: 'Lato', sans-serif !important; font-size: 2rem; font-weight: 700 !important; color: #555555 !important; line-height: 1.2; border: none !important; border-left: none !important; padding-left: 0 !important; box-shadow: none !important;">
                                        {{ $article->$language->title }}
                                    </h1>

                                    <div class="d-flex align-items-center gap-2" style="flex-shrink: 0;">


                                        @if ($article->video != 0)
                                            <a href="{{ $article->video }}" class="launch-modal action-badge icon-only"
                                                id="newsletterVideo-{{ $article->id }}"
                                                data-fancybox="newsletterVideo-{{ $article->id }}" title="Play Video">
                                                <img src="/images/our-news/logo/PLAY-VIDEO.svg" alt="Play">
                                            </a>
                                        @endif
                                        @if ($article->file != '0')
                                            <div class="col-auto p-0">
                                                <a href="{{ $article->file }}" class="file_btn" target="_blank" 
                                                style="background-color: #b91c1c; color: white; padding: 4.8px 5px ; border-radius: 7px; display: inline-flex; align-items: center; justify-content: center; text-decoration: none;"
                                                data-toggle="tooltip" 
                                                rel="tooltip" 
                                                data-placement="top" 
                                                data-bs-placement="top"
                                                data-container="body"
                                                data-bs-container="body"
                                                title="{{ substr($article->file, 12) }}">
                                                    <span class="fa fa-paperclip"></span>
                                                </a>
                                            </div>
                                        @endif      
                                        
                                        <div class="share-wrapper d-inline-block">
                                            <a href="#" class="action-badge icon-only"
                                                style="margin-top: 4.5px" id="modernShareToggle"
                                                title="Share Article">
                                                <img src="/images/our-news/logo/SHARE.svg" alt="Share">
                                            </a>

                                            <div class="modern-share-menu" id="modernShareMenu">
                                                <a class="share-item" href="#" onclick="copyToClipboard(event, this)">
                                                    <img src="/images/our-news/logo/copy-link-icon.svg" class="share-img-icon" alt="Copy">
                                                    <span class="share-text">Copy Link</span>
                                                </a>
                                                <a class="share-item" href="https://api.whatsapp.com/send?text={{ urlencode($article->$language->title . ' - ' . url()->current()) }}" target="_blank">
                                                    <img src="/images/our-news/logo/whataspp-icon.svg" class="share-img-icon" alt="WhatsApp">
                                                    <span class="share-text">WhatsApp</span>
                                                </a>
                                                <a class="share-item" href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->$language->title) }}" target="_blank">
                                                    <img src="/images/our-news/logo/telegram-icon.svg" class="share-img-icon" alt="Telegram">
                                                    <span class="share-text">Telegram</span>
                                                </a>
                                                <a class="share-item" href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank">
                                                    <img src="/images/our-news/logo/linked-in-icon.svg" class="share-img-icon" alt="LinkedIn">
                                                    <span class="share-text">LinkedIn</span>
                                                </a>
                                            </div>
                                        </div>
                                        </div>
                                </div>

                                <hr
                                    style="border: none; border-top: 1px solid #ccc; margin: 8px 0 10px 0; opacity: 1;">

                                <div class="d-flex justify-content-between align-items-center"
                                    style="font-family: 'Lato', sans-serif !important; font-size: 0.85rem; font-weight: 700; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">

                                    <div
                                        style="font-family: 'Lato', sans-serif !important; font-size: 0.85rem; font-weight: 700; color: #666; text-transform: uppercase; letter-spacing: 0.5px;">
                                        {{ $article->place->name ?? 'Damascus' }}
                                        {{ $article->date ? \Carbon\Carbon::parse($article->date)->format('j/n/Y') : '' }}
                                    </div>

                                    <span style="display: flex; align-items: center; gap: 6px; color: #999;">
                                        {{ $article->total_views ?? 0 }}
                                        <i class="fa fa-eye" style="font-size: 1.2em; margin-top: 2px"></i>
                                    </span>

                                </div>
                            </div>


                            <div class="col-12 news_colomn p-0 mb-4">
                                <div id="news-carousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @if (count($images) > 0)
                                            <?php $k = 0; ?>
                                            @foreach ($images as $image)
                                                <div
                                                    class="carousel-item @if ($k++ == 0) active @endif">
                                                    <img class="d-block"
                                                        src="{{ substr($image->path, 0, -4) . 'b.jpg' }}"
                                                        alt="Article Image">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#news-carousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#news-carousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>


                            <div class="col-12 news_colomn p-0 mb-4">
                                <div
                                    style="column-count: 1; -webkit-column-count: 1; -moz-column-count: 1; font-size: 1.1rem; line-height: 1.8; color: #555;">
                                    {!! $article->$language->content !!}
                                </div>
                            </div>

                            <div class="col-12 p-0">
                                <hr style="border: none; border-top: 2px solid #999; margin: 0 0 20px 0; opacity: 1;">
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container-fluid" data-aos="fade-up" data-aos-duration="800">
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                    <div class="section-title">Get Latest Updates On Our News</div>
                </div>
            </div>
        </div>

        <div class="container-fluid my-5" data-aos="fade-up" data-aos-duration="800">
            <div class="row justify-content-center mx-0">

                <div class="col-12 col-md-10 col-lg-8">
                    <div class="subscribe-container">
                        <img src="/images/ico/letter.svg" alt="Newsletter Icon">

                        <h4 class="subscribe-title text-capitalize">
                            Subscribe our newsletter to receive the latest news.
                        </h4>

                        <form class="subscription" name="subsribeForm" id="subsribeForm" action=""
                            method="get">
                            {!! csrf_field() !!}
                            <input class="add-email" id="email" name="email"
                                placeholder="Enter your Email Address" type="email">
                            <button class="submit-email" type="submit" name="submit">
                                <span id="before-submit" class="before-submit">Subscribe</span>
                                <span id="after-submit" class="after-submit" style="display:none;">Subscribed!</span>
                            </button>
                        </form>

                        <label id="subscribe-error" class="subscribe-error mt-2" style="display:none;">Email has
                            already subscribed!</label>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('new.public.footer')

    <script>
        $(document).ready(function() {
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
                submitHandler: function(form) {
                    let formData = $("form#subsribeForm").serialize()
                    $.ajax({
                        url: "http://" + location.host + "/newsletter/subscribe",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: {
                            formData,
                            "email": $("input[name='email']").val()
                        },
                        success: function(response) {
                            if (response.msg === 'true') {
                                document.getElementById('subscribe-error').style.display =
                                    'block';
                                setTimeout(function() {
                                    document.getElementById('subscribe-error').style
                                        .display = 'none';
                                    let input = document.getElementById('email');
                                    input.value = "";
                                }, 2000);
                            } else if (response.msg === 'false') {
                                document.getElementById('after-submit').style.display =
                                    'block';
                                document.getElementById('before-submit').style.display =
                                    'none';
                                document.getElementById('subscribe-error').style.display =
                                    'none';
                                setTimeout(() => {
                                    document.getElementById('after-submit').style
                                        .display = 'none';
                                    document.getElementById('before-submit').style
                                        .display = 'block';
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

        $(document).ready(function() {
            if ($(window).width() >= 700) {
                $('#large_screen').show();
                $('#small_screen').hide();
            } else {
                $('#small_screen').show();
                $('#large_screen').hide();
            }
        });
    </script>
    <script>
    $(function() {
        $('.file_btn').on("mouseenter", function() {
            $('.bl').hide();
            $(this).showBalloon({
                position: "top", 
                contents: "{{ substr($article->file, 12) }}",
                classname: "bl",
                maxLifetime: 1000,
                tipSize: 0,
                delay: 100,
                hideDuration: 500,
                showAnimation: function(d, c) {
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
            // Toggle the sleek custom menu
            $('#modernShareToggle').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $('#modernShareMenu').toggleClass('show');
            });

            // Close when clicking anywhere outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.share-wrapper').length) {
                    $('#modernShareMenu').removeClass('show');
                }
            });
        });

        // Elevated Copy Link Interaction with Gray Output
        function copyToClipboard(e, button) {
            e.preventDefault();
            const url = window.location.href;

            navigator.clipboard.writeText(url).then(() => {
                const textSpan = button.querySelector('.share-text');
                const originalText = textSpan.innerText;

                // Provide instant gray visual feedback
                textSpan.innerText = 'Link Copied!';
                textSpan.style.color = '#888888'; // Sleek Gray

                // Reset back to normal after 2.5 seconds
                setTimeout(() => {
                    textSpan.innerText = originalText;
                    textSpan.style.color = '';
                }, 2500);

            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }
    </script>
    @stack('navbar-scripts')

</body>

</html>