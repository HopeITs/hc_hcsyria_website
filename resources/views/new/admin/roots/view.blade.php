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
    <title>{{$news->english->title}}</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="{{asset('css/newsletter.css')}}" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

@stack('navbar_body')
<div id="Newsletter" class="news-article">
    <div class="outer-container">
    <div class="row d-flex justify-content-end mb-5">
        <div class="col d-flex justify-content-end gap-3">
            <button class="btn btn-primary edit-btn" onclick="window.history.back();"><i
                    class="fa fa-arrow-left"></i> Back
            </button>
            <a href="{{route('news.edit', $news->id)}}" class="btn btn-primary edit-btn">
                <span class="fa fa-edit"></span>&nbsp;Edit</a>
            @if(($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
               && $news->online == '0' && $news->english_check == '1' )
                <form action="{{ route('news.online') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $news->id }}">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-upload"></i> Publish
                    </button>
                </form>
            @endif
            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                <a href="{{route('news.images.create', $news['id'])}}"
                   class="btn btn-primary edit-btn">
                    <i class='fa-solid fa-plus-minus'></i> Image</a>
            @endif
        </div>
    </div>



        <div class="row news_ticket d-flex justify-content-center">
            @if($news->type != '3')
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn">
                    <div class="news_data_column left">
                        <div class="news_title">{{$news->english->title}}
                            @if($news->video != 0)
                                <a href="{{$news->video}}" class="launch-modal"
                                   id="newsletterVideo-{{ $news->id}}"
                                   data-fancybox="newsletterVideo-{{ $news->id}}">
                                    <img class="video-icon"
                                         src="/images/ico/video-ini-icon.svg">
                                </a>
                            @endif
                        </div>
                        <div class="text-column">
                            {!!implode(' ', array_slice(explode(' ', strip_tags($news->english->description)), 0, 55)).'...'!!}

                        </div>
                        <a href="{{ route('new.public.article',
                                    [Str::slug(strtolower($selectedEdition->name)),
                                    $news->id,
                                    Str::slug(strtolower($news->english->title))]   ) }}"
                           class="readmore-btn left" style="text-decoration: none">@lang('main.readMore')
                        </a>
                    </div>
                </div>
            @endif
            @if($news->type == '3')
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn d-flex align-items-center">
                    <div class="news_data_column left">
                        <div class="news_title">{{$news->english->title}}</div>
                        <div class="text-column" style="column-count: 1">
                            {{$news->english->description}}
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn ">
                @if($news->type != '3')
                    <img class="news_img" src="{{$news->firstImage->path}}" alt="newsletter">
                @else
                    <div class="video">
                        <iframe class="news_img" src="{{$news->video}}" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

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
