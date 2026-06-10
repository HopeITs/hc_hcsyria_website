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
        <div class="news-article-custom-container mt-5">

            <div class="row mx-0 mt-4 mb-3">
                <div class="col-12 p-0">
                    <div class="d-flex justify-content-center align-items-center bg-primary-red py-3">
                        <h1 class="m-0 news-header-title text-white">OUR NEWS</h1>
                    </div>
                </div>
            </div>

            <div class="row mx-0 justify-content-center mb-5">
                <div class="col-12 p-0">
                    <div class="inner-container news-article-inner-bg px-4 py-3">
                        <div class="row h-100 g-0">

                            <div class="col-12 p-0 position-relative mb-4 border-start-0 ps-0">

                                <div class="d-flex justify-content-between align-items-end mb-2 gap-3 border-0">
                                    <h1 class="news-article-title m-0">
                                        {{ $article->$language->title }}
                                    </h1>


                                    <div class="d-flex align-items-center gap-2 flex-shrink-0">

                                        @if ($article->video != '0' && $article->type != 3)
                                            <a href="{{ $article->video }}"
                                                class="launch-modal bg-primary-red d-flex justify-content-center align-items-center shadow-sm"
                                                id="newsletterVideo-{{ $article->id }}"
                                                data-fancybox="newsletterVideo-{{ $article->id }}" title="Play Video"
                                                style="width: 25px; height: 25px; border-radius: 6px; text-decoration: none; transition: 0.2s;">
                                                <i class="fa-solid fa-play text-white" style="font-size: 0.75rem; margin-left: 2px;"></i>
                                            </a>
                                        @endif

                                        @if ($article->file != '0')
                                            <a href="{{ asset($article->file) }}"
                                                class="file_btn bg-primary-red d-flex justify-content-center align-items-center shadow-sm" download
                                                data-toggle="tooltip" rel="tooltip" data-placement="top"
                                                data-bs-placement="top" data-container="body"
                                                data-bs-container="body" title="{{ substr($article->file, 12) }}"
                                                style="width: 25px; height: 25px; border-radius: 6px; text-decoration: none; transition: 0.2s;">
                                                <i class="fa-solid fa-paperclip text-white" style="font-size: 0.85rem;"></i>
                                            </a>
                                        @endif

                                        <div class="news-article-share-wrapper d-inline-flex align-items-center">
                                            <a href="#" class="bg-primary-red d-flex justify-content-center align-items-center shadow-sm"
                                                id="modernShareToggle" title="Share Article"
                                                style="width: 25px; height: 25px; border-radius: 6px; text-decoration: none; transition: 0.2s;">
                                                <i class="fa-solid fa-share text-white" style="font-size: 0.8rem;"></i>
                                            </a>

                                            <div class="news-article-share-menu" id="modernShareMenu">
                                                <a class="news-article-share-item" href="#"
                                                    onclick="copyToClipboard(event, this)">
                                                    <img src="/images/our-news/logo/copy-link-icon.svg"
                                                        class="news-article-share-img-icon" alt="Copy">
                                                    <span class="news-article-share-text">Copy Link</span>
                                                </a>
                                                <a class="news-article-share-item"
                                                    href="https://api.whatsapp.com/send?text={{ urlencode($article->$language->title . ' - ' . url()->current()) }}"
                                                    target="_blank">
                                                    <img src="/images/our-news/logo/whatsapp-icon.svg"
                                                        class="news-article-share-img-icon" alt="WhatsApp">
                                                    <span class="news-article-share-text">WhatsApp</span>
                                                </a>
                                                <a class="news-article-share-item"
                                                    href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->$language->title) }}"
                                                    target="_blank">
                                                    <img src="/images/our-news/logo/telegram-icon.svg"
                                                        class="news-article-share-img-icon" alt="Telegram">
                                                    <span class="news-article-share-text">Telegram</span>
                                                </a>
                                                <a class="news-article-share-item"
                                                    href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                                    target="_blank">
                                                    <img src="/images/our-news/logo/linked-in-icon.svg"
                                                        class="news-article-share-img-icon" alt="LinkedIn">
                                                    <span class="news-article-share-text">LinkedIn</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="news-article-divider-thin">

                                <div class="d-flex justify-content-between align-items-center news-article-meta-text">

                                    <div class="news-article-meta-text">
                                        {{ $article->place->name ?? 'Damascus' }}
                                        {{ $article->date ? \Carbon\Carbon::parse($article->date)->format('j/n/Y') : '' }}
                                    </div>

                                    <span class="d-flex align-items-center text-secondary" style="gap: 6px;">
                                        <span class="fw-bold" style="font-size: 1.1rem; line-height: 1;">{{ $article->total_views ?? 0 }}</span>
                                        <i class="fa-solid fa-eye" style="font-size: 1.1rem; line-height: 1;"></i>
                                    </span>

                                </div>
                            </div>


                            <div class="col-12 news_colomn p-0 mb-4">
                                @if ($article->type == 3 && $article->video != '0')
                                    @php
                                        $embedUrl = $article->video;
                                        if (strpos($embedUrl, 'watch?v=') !== false) {
                                            $embedUrl = str_replace('watch?v=', 'embed/', $embedUrl);
                                            $embedUrl = explode('&', $embedUrl)[0]; // Remove extra URL parameters
                                        } elseif (strpos($embedUrl, 'youtu.be/') !== false) {
                                            $embedUrl = str_replace('youtu.be/', 'www.youtube.com/embed/', $embedUrl);
                                            $embedUrl = explode('?', $embedUrl)[0];
                                        }
                                    @endphp

                                    <div
                                        style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; border-radius: 8px; background: #000;">
                                        <iframe src="{{ $embedUrl }}"
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                @else
                                    <div id="news-article-carousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @php
                                                // Filter out thumbnails/headers and sort exactly by your drag-and-drop order
                                                $sortedCarouselImages = collect($images)->where('sizetype', 3)->sortBy('image_order');
                                            @endphp

                                            @if ($sortedCarouselImages->isNotEmpty())
                                                @foreach ($sortedCarouselImages as $image)
                                                    <div class="carousel-item @if ($loop->first) active @endif">
                                                        <img class="d-block"
                                                            src="{{ substr($image->path, 0, -4) . 'b.jpg' }}"
                                                            alt="Article Image">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#news-article-carousel" data-bs-ride="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#news-article-carousel" data-bs-ride="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 news_colomn p-0 mb-4">
                                <div class="news-article-content-body">
                                    {!! $article->$language->content !!}
                                </div>
                            </div>

                            <div class="col-12 p-0">
                                <hr class="news-article-divider-thick">
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
                            method="POST">
                            {!! csrf_field() !!}
                            <input class="add-email" id="email" name="email"
                                placeholder="Enter your Email Address" type="email">
                            <button class="submit-email" type="submit" name="submit">
                                <span id="before-submit" class="before-submit">Subscribe</span>
                                <span id="after-submit" class="after-submit" style="display:none;">Subscribed!</span>
                            </button>
                        </form>

                        <div id="validation-errors-container" class="mt-2 text-center" style="min-height: 24px;">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('new.public.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('subsribeForm');

            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const emailInput = document.getElementById('email').value;
                    const errorContainer = document.getElementById('validation-errors-container');
                    const beforeSubmit = document.getElementById('before-submit');
                    const submitBtn = document.querySelector('.submit-email');

                    errorContainer.innerHTML = '';

                    if (!emailInput || !emailInput.includes('@')) {
                        errorContainer.innerHTML =
                            '<span style="color:red; font-size: 14px;">Please enter a valid email address.</span>';
                        return;
                    }

                    submitBtn.disabled = true;
                    beforeSubmit.innerText = 'Sending...';

z                    fetch("{{ route('newsletter.subscribe') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify({
                                email: emailInput
                            })
                        })
                        .then(async response => {
                            if (!response.ok) throw new Error('Server Error');
                            return response.json();
                        })
                        .then(data => {
                            if (data.msg === 'true') {
                                errorContainer.innerHTML =
                                    '<span style="color:red; font-size: 15px; font-weight: 500;">Email already exists!</span>';
                                beforeSubmit.innerText = 'Subscribe';

                                setTimeout(() => {
                                    errorContainer.innerHTML = '';
                                }, 3000);

                            } else if (data.msg === 'false') {
                                beforeSubmit.innerText = 'Subscribed!';
                                document.getElementById('email').value = '';

                                setTimeout(() => {
                                    beforeSubmit.innerText = 'Subscribe';
                                }, 3000);
                            }
                        })
                        .catch(error => {
                            errorContainer.innerHTML =
                                '<span style="color:red; font-size: 14px;">Server error. Please try again later.</span>';
                            beforeSubmit.innerText = 'Subscribe';
                            console.error('Subscription Error:', error);
                        })
                        .finally(() => {
                            submitBtn.disabled = false;
                        });
                });
            }
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
                if (!$(e.target).closest('.news-article-share-wrapper').length) {
                    $('#modernShareMenu').removeClass('show');
                }
            });
        });

        // Elevated Copy Link Interaction with Gray Output
        function copyToClipboard(e, button) {
            e.preventDefault();
            const url = window.location.href;

            navigator.clipboard.writeText(url).then(() => {
                const textSpan = button.querySelector('.news-article-share-text');
                const originalText = textSpan.innerText;

                // Provide instant gray visual feedback
                textSpan.innerText = 'Link Copied!';
                textSpan.style.color = '#888888';

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
