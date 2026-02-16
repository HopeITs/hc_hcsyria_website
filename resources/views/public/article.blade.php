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
    <meta property="og:url" content="https://hcsyria.org/newsletter/{{ $articlePath }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ $article->$language->title }}"/>
    <meta property="og:description"
          content="{{ $article->$language->description }}"/>
    <meta property="og:image" content="https://hcsyria.org/{{ $images[0]['path'] }}"/>
    <meta name="description"
          content="{{ $article->$language->description }}">
    <meta name="keywords"
          content="{{ $article->$language->title }} "/>
    <title>{{ $article->$language->title }}</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/news.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <style>
        #article-carousel {
            width: 55%!important;
        }

        @media screen and (max-width: 768px) {
            #article-carousel {
                width: 100%!important;
            }
        }
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

@include('public.navbar')

<section id="article" class="page-start">
    <div class="sidenav">  </div>
    <div class="main container">
        <div class="main_content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-0">
                    <h1><b>{{ $article->$language->title }}</b></h1>
                </div>
            </div>

            <div id="article-carousel">

            @if(count($images)>0)
                <div id="ini-carousel" class="carousel slide touch-slide" data-ride="carousel" style="margin-bottom: 20px">
                    <ol class="carousel-indicators" style="bottom: 0%;">
                        <?php $k = 0 ?>
                        @foreach($images as $image)
                            <li data-target="#ini-carousel"
                                data-slide-to="{{$k++}}"
                                @if($k == 1)class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        <?php $k = 0 ?>
                        @foreach($images as $image)
                            <div class="item @if($k++ == 0) active @endif">
                                {{--substr($image->path, 0, -4).'b.jpg'--}}
                                {{--$image->path--}}
                                <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                   data-fancybox="gallery"
                                   data-caption="{{ ucfirst( $article->$language->title) }}"><img
                                            src="{{$image->path}}"></a>
                            </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#ini-carousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#ini-carousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @endif


            </div>
            {{--<div id ="large_screen" class="row">--}}
                {{--@php--}}
                {{--$numOfImages = 0;--}}
                {{--@endphp--}}
                {{--@foreach($images as $image)--}}
                    {{--@if($numOfImages %2 ==0)--}}
                            {{--<a class=" animated fadeInRight delay" href="{{substr($image->path, 0, -4).'b.jpg'}}"--}}
                               {{--data-fancybox="gallery-{{$numOfImages}}"--}}
                               {{--data-caption="{{ucfirst($article->$language->title )}}">--}}
                                {{--<img class="TextWrapLeft "  src="{{$image->path}}"></a>--}}
                            {{--<img class="TextWrapLeft animated fadeInRight delay"  src="{{$image->path}}" >--}}
                        {{--@else--}}
                            {{--<a class=" animated fadeInRight delay" href="{{substr($image->path, 0, -4).'b.jpg'}}"--}}
                               {{--data-fancybox="gallery-{{$numOfImages}}"--}}
                               {{--data-caption="{{ucfirst($article->$language->title )}}">--}}
                                {{--<img class="TextWrapRight " src="{{$image->path}}"></a>--}}
                            {{--<img class="TextWrapRight animated fadeInLeft delay"  src="{{$image->path}}" >--}}
                        {{--@endif--}}
                {{--@php $numOfImages++; @endphp--}}
                {{--@endforeach--}}
                {{--<p class="drop-cap" > {!! $article->$language->content !!}</p>--}}
            {{--</div>--}}

            {{--<div id ="small_screen" class="row">--}}
                {{--@php--}}
                {{--$paragraphLength = strlen($article->$language->content);--}}
                {{--$showedParagraphLength = 0;--}}
                {{--$ImagesCount = count($images);--}}
                {{--@endphp--}}
                {{--@foreach ($images as $i => $image)--}}
                    {{--<div class="row">--}}
                        {{--<a class=" animated delay" href="{{substr($image->path, 0, -4).'b.jpg'}}"--}}
                           {{--data-fancybox="gallery-{{$i}}"--}}
                           {{--data-caption="{{ucfirst($article->$language->title )}}">--}}
                            {{--<img style="width: 100%;" src="{{$image->path}}" >--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--@if($i === $ImagesCount-1)--}}
                        {{--@if($showedParagraphLength !== $paragraphLength)--}}
                            {{--<p class=" " > {!! substr($article->$language->content, $showedParagraphLength, ($paragraphLength-$showedParagraphLength)) !!}</p>--}}
                        {{--@endif--}}
                    {{--@else--}}
                        {{--<p class=" " > {!! substr($article->$language->content, $showedParagraphLength, 500) !!}</p>--}}
                        {{--@php $showedParagraphLength = $showedParagraphLength +500 ; @endphp--}}
                    {{--@endif--}}
                {{--@endforeach--}}
            {{--</div>--}}

            <p>{!! $article->$language->content !!}</p>

            @if( $article->file != '0')
                <div class="file animated fadeInUp delay">
                    <span><h5>@lang('main.attachment'):</h5></span>
                    <a href="{{ $article->file }}"  class="btn file_btn">
                        <span class="fa fa-paperclip"></span>&nbsp; {{substr($article->file, 12)}}
                    </a>
                </div>
            @endif

            @if( $article->video != '0')
                <div class="video animated fadeInUp delay" id="article_video">
                    <iframe src="{{ $article->video }}" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            @endif

             <div class="row">
                 <button class="btn file_btn" onclick="event.preventDefault();window.history.back();" >
                    <i class="fa fa-arrow-left"></i> back
                </button>
             </div>
    </div>
</div>
@include('public.footer')
</section>


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

<script>
    // do your stuff
    $('#small_screen').hide();
    $('#large_screen').hide();

    $(document).ready(function() {
        if($(window).width() >= 700) {
            $('#large_screen').show();
            $('#small_screen').hide();
        }
        else{
            $('#small_screen').show();
            $('#large_screen').hide();
        }
    });
</script>


@stack('navbar-scripts')

</body>
</html>
