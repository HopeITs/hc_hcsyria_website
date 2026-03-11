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

    <title>@lang('navbar.newsletter')</title>

    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.js"></script>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">

    {{--<link href="/css/initiatives.css" rel="stylesheet">--}}
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/news.css" rel="stylesheet">

    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/" />

    {{--<link href='https://fonts.googleapis.com/css?family=Noto Serif' rel='stylesheet'>--}}
    {{--<link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>--}}
    <link href='https://fonts.googleapis.com/css?family=Caudex' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
s

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HLZ6M"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
{{--<div class="preloader">--}}
    {{--<div class="preloader-gif"></div>--}}
{{--</div>--}}

@include('public.navbar')

<div id="newsSection">
    <div style="padding: 10px;"></div>
    <div class="container">
    <br>
    <div class="row">
        <hr>
        <h1 id="news_title" class="captial">@lang('main.news_title')</h1>
        <hr>
        <ul id="header_list">
            <li><a href="" class="captial">@lang('main.news_link1')</a></li>
            <li><a href="" class="captial">@lang('main.news_link2')</a></li>
            <li><a href="" class="captial">@lang('main.news_link3')</a></li>
            <li><a href="" class="captial">@lang('main.news_link4')</a></li>
            <li><a href="" class="captial">@lang('main.news_link5')</a></li>
        </ul>
        <hr>
        <div class="col-xs-6 col-md-8 text-left"><h4 id="publishedBy_lbl">Published by Hope Center,<b> Aleppo - Syria </b></h4></div>
        <div class="col-xs-6 col-md-4 text-right">
            <div id="donor-filter">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuDonor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{--@lang('main.edition') - --}}
                        @if (app()->isLocale('fr')) {{$selectedEdition->name_french}}
                        @else {{$selectedEdition->name}}
                        @endif
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuDonor">
                        @foreach($editions as $editon)
                            @if (app()->isLocale('fr'))
                                <li>
                                    <a href="{{route('public.newsletter.edition',$editon->name_french)}}">{{$editon->name_french}}</a>

                                </li>
                            @else
                                <li>
                                    <a href="{{route('public.newsletter.edition',$editon->name)}}">{{$editon->name}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div style="padding: 10px;"></div>

    @if(count($news))
        @php
            $numOfArticals = 0;
            $numOfProducts = 0;
            $numOfShortPars = 0;
            $numOfVideos = 0;
        @endphp
        @foreach($news as $SingleNews)
            @if($SingleNews->type == '0')     {{--Artical--}}
                @if($numOfArticals %2 ==0)
                    <div class="row news_ticket">
                        <div class="col-md-4 news_colomn">
                            <div class="news_data_column " >
                                <h2><b>{{$SingleNews->$language->title}}</b></h2>
                                <p class="drop-cap p-justify">
                                    {{ $SingleNews->$language->description }}...
                                </p>
                                <a href="{{ route('public.article',
                                    [Str::slug(strtolower($selectedEdition->name)),
                                    $SingleNews->id,
                                    Str::slug(strtolower($SingleNews->english->title))]   ) }}"
                                   class="btn btn-primary readMore ">@lang('main.readMore')
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 news_colomn ">
                            <img class="news_img_right" src="{{$SingleNews->firstImage->path}}" alt="newsletter" >
                        </div>
                    </div>
                @else
                    <div class="row news_ticket">
                        <div class="col-md-8 news_colomn ">
                            <img class="news_img_left" src="{{$SingleNews->firstImage->path}}" alt="newsletter">
                        </div>
                        <div class="col-md-4 news_colomn">
                            <div class="news_data_column " >
                                <h2><b>{{$SingleNews->$language->title}}</b></h2>
                                <p class="drop-cap p-justify">
                                    {{ $SingleNews->$language->description }}..
                                </p>
                                <a href="{{ route('public.article',
                                [Str::slug(strtolower($selectedEdition->name)),
                                $SingleNews->id,
                                Str::slug(strtolower($SingleNews->english->title))]) }}"
                                   class="btn btn-primary readMore ">@lang('main.readMore')
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                @php $numOfArticals++ ;@endphp
                <div style="padding: 10px;"></div>
            @elseif($SingleNews->type == '1') {{--Product--}}
                <div class="row " data-aos="flip-left" >
                    <div class="col-md-4">
                        <div class="panel">
                            <div class="panel-body"><img src="{{$SingleNews->firstImage->path}}" class="img-responsive" alt="Image"></div>
                        </div>
                    </div>
                </div>
                <div style="padding: 10px;"></div>

            @elseif($SingleNews->type == '2')  {{--Short Paragrapgh--}}
                @if($numOfShortPars %2 ==0)
                    <div class="row news_ticket" >
                    <div class="col-md-6 news_colomn">
                        <img class="news_img_left" src="{{substr($SingleNews->firstImage->path, 0, -4).'b.jpg'}}" alt="newsletter" >

                    </div>
                    <div class="col-md-6 news_colomn">
                        <div class="news_data_column">
                            <h2><b>{{$SingleNews->$language->title}}</b></h2>
                            <p class="drop-cap p-justify">
                                {{--{!!   $SingleNews->$language->content   !!}--}}
                                {{ $SingleNews->$language->description }}
                            </p>
                        </div>
                    </div>
                    </div>
                @else
                    <div class="row news_ticket" >
                        <div class="col-md-6 news_colomn">
                            <div class="news_data_column">
                                <h2><b>{{$SingleNews->$language->title}}</b></h2>
                                <p class="drop-cap p-justify">
                                    {{--{!!   $SingleNews->$language->content   !!}--}}
                                    {{ $SingleNews->$language->description }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 news_colomn">
                            <img class="news_img_right" src="{{substr($SingleNews->firstImage->path, 0, -4).'b.jpg'}}" alt="newsletter" >
                        </div>
                    </div>
                @endif
                @php $numOfShortPars++;@endphp
                <div style="padding: 10px;"></div>

                @elseif($SingleNews->type == '3')  {{--Video--}}
                <div class="row news_ticket">
                    <div class=" video " >
                        <iframe class="news_img_top" src="{{$SingleNews->video}}" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                    </div>
                    <p class="text-center p-justify" style="margin: 0px;padding: 10px;">{{$SingleNews->$language->description}}</p>



                </div>
                <div style="padding: 10px;"></div>
                @endif
        @endforeach
    @endif
    </div>
    {{--</div>--}}
</div>

@include('public.footer')
@stack('navbar-scripts')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
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
        let all_news = <?php echo json_encode($news); ?> ;
        console.log(all_news);

        $('.modal-trigger').click(function () {
            let id = this.dataset.content;


            let news = $.grep(all_news, function (e) {
                return e.id == id;
            });

            $('#success-img').attr('href', '{{$news[0]->images[0]->path}}');
            $('#success-img img').attr('src', '{{$news[0]->images[0]->path}}');
            $('#title').text(news[0]['{{$language}}'].title);
            $('#story').text(news[0]['{{$language}}'].content);
            if (news[0].video !== '0') {
                $('#video-div .video iframe').attr('src', news[0].video);
                $('#video-div').show();
            } else {
                $('#video-div').hide();
            }
            let link = '';
            // if (news[0].what_category_id === 10) {
            //     link = '/projects/micro-projects/all?project=' + news[0].project_id;
            // } else {
            //     link = '/projects/' + news[0]['what_category']['name'].toLowerCase().replace(/ /g, '-');
            // }
            console.log(news);
            {{--$('#what-project').text(news[0]['what_category']['{{$whoCatName}}']);--}}
            // $('#more-link').attr('href', link);
            $('.modal').modal('show');
        });
    });
</script>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</div>

</body>
</html>
