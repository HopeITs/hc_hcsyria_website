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
    @if(count($imagesRehabilitation))
        <link href="/css/twentytwenty.css" rel="stylesheet">
        <style>
            .pagination {
                margin: 0 0 40px;
            }
            .pagination > .active > span,
            .pagination > .active > span:hover {
                background-color: #43484E;
                border-color: #43484E;
            }
            .pagination:hover {
                background-color: #eee;
                cursor: pointer;
            }
            .twentytwenty-before-label,
            .twentytwenty-after-label {
                display: none!important;
            }
        </style>
    @endif
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
                    {{--<a href="{{route('initiatives.french.show', $initiative->id)}}" class="btn btn-primary"><span--}}
                            {{--class="fa fa-eye"></span>&nbsp; French</a>--}}
                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                        <a href="{{route('initiatives.edit', $initiative->id)}}" class="btn btn-primary edit-btn"><span
                                class="fa fa-edit"></span>&nbsp;Edit</a>
                    @endif
                    {{--&& $initiative->french_translation == '1'--}}
                    @if(($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
                            && $initiative->online == '0'
                            && $initiative->english_check == '1' )
                        {!! Form::open(['route' => 'initiatives.online', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{Form::hidden('id', $initiative->id)}}
                        {{Form::button('<i class="fa fa-upload"></i> Publish', ['type' => 'submit', 'class' => 'btn btn-success'])}}
                        {!! Form::close() !!}
                    @endif
                </div>
                <div id="single-org">
                    <h2 class="text-center" id="org-heading"><strong>{{ $initiative->english->title }}</strong></h2>
                    @if(count($imagesRehabilitation))
                        @foreach($imagesRehabilitation as $image)
                            <div id="container{{$image->id}}" style="margin-bottom: 35px;">
                                <img src="{{$image->path_1}}">
                                <img src="{{$image->path_2}}">
                            </div>
                        @endforeach
                        <div class="text-center">
                            <ul class="pagination">
                                @foreach($imagesRehabilitation as $i=>$image)
                                    <li id="btn-{{$i}}" class="page-item @if($i==0) active @endif"><span class="page-link">{{$i+1}}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(count($images))
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
                                           data-caption="{{ucfirst($initiative->english->title)}}"><img
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
                    <br>
                    @if($initiative->english->organization != '0')
                    <div class="text-center">
                        <h2 id="org-heading"><strong>{{ $initiative->english->organization }}</strong></h2>
                    </div>
                    @endif
                    @if($initiative->logo != '0')
                    <div class="text-center">
                        <br>
                        <img src="{{ $initiative->logo }}" style="width: 150px;">
                    </div>
                    @endif
                    @if($initiative->english->date_string != '0')
                    <p> {{ $initiative->english->date_string }}</p>
                    @endif
                    {!! $initiative->english->content !!}
                    <br>
                    @if(count($testimonies))
                        <div class="initiative-testimonies">
                            <h3 class="text-center">Testimonies</h3>
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
                    @if($initiative->video != '0')
                        <div class="video">
                            <iframe src="{{$initiative->video}}" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                        <hr style="border-color: #43484E;">
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
@if(count($imagesRehabilitation))
    <script type="text/javascript" src="/js/jquery.event.move.js"></script>
    <script type="text/javascript" src="/js/jquery.twentytwenty.js"></script>
    <script>
        $('#container{{$imagesRehabilitation[0]->id}}').css('display', 'block');
        $(window).load(function () {
            @foreach($imagesRehabilitation as $image)
            $("#container{{$image->id}}").twentytwenty();
            @endforeach
        });
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $('.pagination').hide();
        }else {
            $(window).load(function () {
                @foreach($imagesRehabilitation as $i=>$image)
                @if($i != 0)
                $("#container{{$image->id}}").hide();
                @endif
                @endforeach
            });
            @foreach($imagesRehabilitation as $i=>$image)
            $('#btn-{{$i}}').click(function () {
                $('#btn-{{$i}}').addClass('active');
                @foreach($imagesRehabilitation as $j=>$imageJ)
                @if($i != $j)
                $('#btn-{{$j}}').removeClass('active');
                $('#container{{$imageJ->id}}').hide();
                @endif
                @endforeach
                $('#container{{$image->id}}').show();
            });
            @endforeach
        }
    </script>
@endif
</body>
</html>
