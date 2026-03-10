<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>{{$initiative->english->title}}</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        form {
            display: inline;
        }
        .carousel-inner>.item>a>img {
            width: 100%;
        }
</style>
</head>
<body>

@stack('navbar_body')

<section id="initiatives" class="page-start">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <button class="btn btn-default" onclick="window.history.back();" style="display: inherit;margin: -50px 0 30px 0;"><i class="fa fa-arrow-left"></i> back</button>
                <div style="float: right;margin-top: -60px">
                    <a href="{{route('initiatives.show', $initiative->id)}}" class="btn btn-primary"><span
                            class="fa fa-eye"></span>&nbsp; English</a>
                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'French Editor'))
                        <a href="{{route('initiatives.french.edit', $initiative->id)}}" class="btn btn-primary edit-btn"><span
                                class="fa fa-edit"></span>&nbsp;Edit</a>
                    @endif
                    @if($user->roles->contains('name', 'Admin') && $initiative->online == '0')
                        {!! Form::open(['route' => 'initiatives.online', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{Form::hidden('id', $initiative->id)}}
                        {{Form::button('<i class="fa fa-upload"></i> Publish', ['type' => 'submit', 'class' => 'btn btn-success'])}}
                        {!! Form::close() !!}
                    @endif
                </div>
                <div id="single-org">
                    <h2 class="text-center" id="org-heading"><strong>{{ $initiative->french->title }}</strong></h2>
                    <div id="ini-carousel" class="carousel slide touch-slide" data-ride="carousel">
                        <ol class="carousel-indicators">
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
                                    <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                       data-fancybox="gallery"
                                       data-caption="{{ucfirst($initiative->french->title)}}"><img
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
                    <br>
                    @if($initiative->french->organization != '0')
                        <div class="text-center">
                            <h2 id="org-heading"><strong>{{ $initiative->french->organization }}</strong></h2>
                        </div>
                    @endif
                    @if($initiative->logo != '0')
                        <div class="text-center">
                            <br>
                            <img src="{{ $initiative->logo }}" style="width: 150px;">
                        </div>
                    @endif
                    <p> {{ $initiative->french->date_string }}</p>
                    {!! $initiative->french->content !!}
                    <br>
                    @if(count($testimonies))
                        <div class="initiative-testimonies">
                            <h3 class="text-center">Témoignages</h3>
                            @foreach($testimonies as $testimony)
                                <div class="item">
                                    <div class="single-testimony">
                                        <div class="media">
                                            <img class="pull-left" src="{{$testimony->image_path}}" alt="" width="170px">
                                            <div class="media-body">
                                                <div class="testimony-texts">
                                                    <p>{{$testimony->english->name}}</p>
                                                    <blockquote>{{$testimony->english->text}}</blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@stack('navbar_scripts')
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
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
