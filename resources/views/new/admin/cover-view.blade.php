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
    <title>@if($what_category && count($what_category) > 0){{ $what_category[0]->name }}@else Home @endif</title>
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

</style>
<body>

@stack('navbar_body')

<section id="projects" class="disc">
    <div style="padding: 0 7% 1%;">
        <div class="row d-flex justify-content-end">
            <div class="col d-flex justify-content-end gap-3">
                <button class="btn btn-primary edit-btn" onclick="window.history.back();"><i
                        class="fa fa-arrow-left"></i> Back
                </button>
                {{--                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                {{--                    <a href="{{route('covers')}}" class="btn btn-primary edit-btn">--}}
                {{--                        <span class="fa fa-edit"></span>&nbsp;Edit</a>--}}
                {{--                @endif--}}
            </div>
        </div>
    </div>
    @php $isPhone = $agent->isPhone(); @endphp
    <div id="HomeCarousel" class="carousel slide" data-bs-ride="carousel" @if($isPhone) data-aos="fade-up"
         data-aos-duration="800" @endif>
        <div class="carousel-indicators">
            @foreach($images as $index => $image)
                <button type="button" data-bs-target="#HomeCarousel" data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}"
                        @if($index === 0) aria-current="true" @endif
                        aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <div class="carousel-inner" @if(!$what_category) style="height: 100%" @endif>
            @foreach($images as $index => $image)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }} position-relative">
                    <img src="{{ $image->image_path }}" class="d-block w-100 h-100" style="object-fit: cover;">
                    @if($what_category)
                    <img src="/images/home/image-mask.png" class="image-mask"/>
                    @endif
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#HomeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#HomeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
@stack('navbar_scripts')

<script>
    $(document).ready(function () {
        if ("ontouchstart" in document.documentElement) {
            $('.swipe-arrows').css('display', 'block');
            $(".touch-slide").swiperight(function () {
                $(this).carousel('prev');
            });
            $(".touch-slide").swipeleft(function () {
                $(this).carousel('next');
            });
        }
    });
</script>
</body>
</html>
