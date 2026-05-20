<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link href="/css/lato.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/initiative.css" rel="stylesheet">
    {{--<link href="/css/main-new.css" rel="stylesheet">--}}
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<style>
    @media (max-width: 576px) {
        .partner-title, .ini-title {
            font-size: 4vw !important;
        }
    }
    #HomeCarousel .carousel-inner {
        height: 33.5vw;
    }
    .image-mask {
        position: absolute;
        bottom: -0.1vw;
        left: 0;
        width: 100%;
    }
    .hero-image-container { position: relative; width: 100%; aspect-ratio: 4.5 / 1; overflow: hidden; background-color: #000; }
    .hero-main-img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .hero-top-info { position: absolute; top: 0; left: 0; font-size: 0.75rem; font-weight: 600; color: white; padding: 12px 16px; z-index: 2; text-transform: uppercase; }
    .hero-timestamp { position: absolute; bottom: 0; right: 0; background: rgba(255, 255, 255, 0.9); color: #414042; padding: 6px 16px; font-weight: 800; font-size: 0.75rem; z-index: 2; border-top-left-radius: 4px; }
    .hero-caption-bar { background: #fdfdfd; border: 1px solid #dee2e6; border-top: none; padding: 12px 0; width: 100%; }

</style>
<body>
@stack('navbar_body')

<section id="projects" class="disc">
    <div style="padding: 1% 7% 1%;">
        <div class="row d-flex justify-content-end mb-3">
            <div class="col d-flex justify-content-end gap-3">
                <button class="btn btn-primary edit-btn" onclick="window.history.back();">
                    <i class="fa fa-arrow-left"></i> Back
                </button>
            </div>
        </div>

        @if(isset($id) && $id == 40)
            <div class="hero-image-container">
                @if($images->isNotEmpty())
                    <img src="{{ $images->first()->image_path }}" class="hero-main-img" alt="News Header">
                @endif
                <div class="hero-top-info">Caption</div>
                <div class="hero-timestamp" id="current-timestamp"></div>
            </div>
            <div class="hero-caption-bar">
                <div style="text-align: center; color: #444; font-weight: 500;">
                    LIVE NEWS TICKER PREVIEW
                </div>
            </div>

            <script>
                function updateTimestamp() {
                    const now = new Date();
                    const options = { hour: '2-digit', minute: '2-digit', day: 'numeric', month: 'short', year: 'numeric' };
                    document.getElementById('current-timestamp').innerText = now.toLocaleString('en-GB', options).replace(',', ' |');
                }
                updateTimestamp();
            </script>
        @else
            <div id="HomeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($images as $index => $image)
                        <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($images as $index => $image)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ $image->image_path }}" class="d-block w-100" style="height: 33.5vw; object-fit: cover;">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

</body>

</html>
