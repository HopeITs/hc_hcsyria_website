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
    <title>{{$initiative->english->title}}</title>
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
    @media(max-width: 576px){
        .partner-title, .ini-title {
            font-size: 4vw !important;
        }
    }

</style>
<body>

@stack('navbar_body')

<section id="projects" class="disc">
    <div style="padding: 3% 17.5%;">
        <div class="row d-flex justify-content-end">
            <div class="col d-flex justify-content-end gap-3">
                <button class="btn btn-primary edit-btn" onclick="window.history.back();"><i class="fa fa-arrow-left"></i> Back
                </button>
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                    <a href="{{route('edit.disc', $initiative['id'])}}" class="btn btn-primary edit-btn">
                        <span class="fa fa-edit"></span>&nbsp;Edit</a>
                @endif
                @if(($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
                            && $initiative->online == '0'
                            && $initiative->english_check == '1' )
                    {!! Form::open(['route' => 'publish.disc', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{Form::hidden('id', $initiative->id)}}
                    {{Form::button('<i class="fa fa-upload"></i> Publish', ['type' => 'submit', 'class' => 'btn btn-success'])}}
                    {!! Form::close() !!}
                @endif
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                    <a href="{{route('disc.add.image', $initiative['id'])}}"
                       class="btn btn-primary edit-btn">
                        <i class='fa-solid fa-plus-minus'></i> Image</a>
                @endif
            </div>
        </div>
    </div>
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="page-margin">
                        <div id="ini-section" class="big">
                            <div class="container-fluid">
                                <div class="row m-0">
                                    <div class="col-10 p-0">
                                        <div class="partner-title">
                                            @if($initiative->english->title != '0')
                                                {{ $initiative->english->title }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2 p-0 d-flex justify-content-end align-items-end">
                                        @if( $initiative->video != '0')
                                            <a href="{{ $initiative->video }}" class="launch-modal"
                                               id="iniVideo-{{ $initiative->id }}"
                                               data-fancybox="iniVideo-{{ $initiative->id }}">
                                                <img class="video-icon"
                                                     src="/images/ico/video-ini-icon.svg">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                @if(count($images)>1)
                                    <div id="iniCarousel_big" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php $k = 0 ?>
                                            @foreach($images as $image)
                                                <div class="carousel-item @if($k++ == 0) active @endif">
                                                    <a href="{{substr($image->path, 0, -4).'b.jpg'}}"
                                                       data-fancybox="gallery"
                                                       data-caption="{{ ucfirst($initiative->english->title) }}">
                                                        <img class="w-100 h-100 d-block" src="{{$image->path}}"
                                                             style="object-fit: cover"></a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                                data-bs-target="#iniCarousel_big"
                                                data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                                data-bs-target="#iniCarousel_big"
                                                data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                        <div class="carousel-indicators">
                                            <?php $k = 0 ?>
                                            @foreach($images as $image)
                                                <button type="button"
                                                        data-bs-target="#iniCarousel_big"
                                                        data-bs-slide-to="{{$k++}}"
                                                        @if($k == 1)class="active" @endif>
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12">
                                        {{--<div class="container-fluid @if(strlen($mainInitiative->english->content)<450 && strlen($mainInitiative->english->content)>120 && count($mainInitiative->donors)<0 || (count($mainInitiative->donors)>0) && strlen($mainInitiative->english->content)<450) ini-height @endif">--}}

                                        <div class="row mb-3">
                                            <div class="col-12 d-flex justify-content-start">
                                                @if($initiative->english->organization != '0')
                                                    <div class="organization">  in partnership With:  {{ $initiative->english->organization }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="card-title-section"></div>
                                        <div class="ini-content">
                                            @if($initiative->english->organization != '0')
                                                {{ $initiative->english->organization }}
                                            @endif
                                            @if($initiative->english->date_string != '0')
                                                <p> {{ $initiative->english->date_string }}</p>
                                            @endif
                                            <p>{!! strip_tags($initiative->english->content) !!}</p>
                                        </div>
                                        <div class="card-title-section d-flex justify-content-end align-items-center funded">
                                            @if(count($initiative->donors))
                                                <div class="ini-funded">
                                                    <div>@lang('initiatives.fundedBy')</div>
                                                    @foreach($initiative->donors as $donor)
                                                        <div>
                                                            <img src="{{$donor->logo}}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
