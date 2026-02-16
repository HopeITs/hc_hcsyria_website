<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $language = 'french';
        $whoCatName = 'french_name';
        $description = 'french_description';
    } else {
        $language = 'english';
        $whoCatName = 'name';
        $description = 'description';
    }
@endphp
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129097809-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
    dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-129097809-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta name="description" content="{{ $whoCategory->description }}">
    <meta name="keywords"
          content="{{ $whoCategory->$whoCatName }}, hope center"/>
    <title>{{ ucfirst($whoCategory->$whoCatName) }}</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects/hope/{{ $whoCategory->name }}"/>

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        #successes {
            padding-top: 100px;
            background-color: #f1f1f1;
        }
        #successes .success-outer {
            cursor: pointer;
            margin-bottom: 0;
        }
        .success-outer:hover h4 {
            color: #ffffff;
        }
        .success-outer .media {
            background-color: #fff;
        }
        .success-outer .media {
            transition: all 0.7s ease 0s;
            -moz-transition: all 0.7s ease 0s;
            -webkit-transition: all 0.7s ease 0s;
            -o-transition: all 0.7s ease 0s;
        }
        #successes .media-body {
            overflow: hidden !important;
        }

        #successes .media-body img {
            width: 100%;
        }
        #successes .single-success {
            margin: 20px 0;
        }
        @media screen and (max-width: 768px){
            #successes .single-success {
                margin: 40px 20px;
            }
        }
        #successes .media-body div {
            padding: 0;
        }
        #successes #success-img img {
            width: 100%;
        }
        #successes .tile {
            margin: 25px 10px;
            -webkit-box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
            -moz-box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>

@include('public.navbar')

<section id="successes">
    <div class="navigate">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">@lang('navbar.home')</a></li>
                <li><a href="{{route('public.main_successes')}}">@lang('who_we_serve.title')</a></li>
                <li class="active">{{ ucfirst($whoCategory->$whoCatName) }}</li>
            </ol>
        </div>
    </div>
    <div class=" container">
        <div class="row text-center clearfix">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="title-one">
                    {{ $whoCategory->$whoCatName }}
                </h2>
                <div class="projects-heading">
                    <p class="p-justify">{!! $whoCategory->$description  !!} </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($successes as $success)
                <div class="col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-0">
                    <div class="tiles">
                        <a class="tile modal-trigger" data-toggle="modal" data-content="{{$success->id}}">
                            <img src="{{$success->image_path}}"/>
                            <div class="details">
                                <span class="title">{{ucfirst($success->$language->title)}}</span>
                                <span class="info">{{implode(' ', array_slice(explode(' ', $success->$language->text), 0, 15)).'...'}}</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="modal fade success-details" id="success-details" tabindex="-1"
             role="dialog"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" id="close"
                                data-dismiss="modal"
                                aria-hidden="true">&times;
                        </button>
                        <div class="row">
                            <div class="col-sm-12 text-center">

                                <a id="success-img" href="" data-fancybox="gallery">
                                    <img src="">
                                </a>
                            </div>
                        </div>
                        <div id="modal-swipe">
                            <h2 id="title"></h2>
                            <br>
                            <div class="clearfix"><p class="p-justify" id="story"></p>
                            </div>
                            <br>
                            <div id="video-div">
                                <div class="video">
                                    <iframe src=""
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                            <div>
                                <p>@lang('initiatives.more1')<span id="what-project"></span>@lang('initiatives.more2')
                                    <a id="more-link" href="" class="my-link">@lang('initiatives.clickHere')</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="/js/fancybox.config.js"></script>
<script>
    $(document).ready(function () {
        let successes = <?php echo json_encode($successes); ?>;
        console.log(successes);

        $('.modal-trigger').click(function () {
            let id = this.dataset.content;
            let success = $.grep(successes, function (e) {
                return e.id == id;
            });
            $('#success-img').attr('href', success[0]['inner_big_image_path']);
            $('#success-img img').attr('src', success[0]['inner_image_path']);
            $('#title').text(success[0]['{{$language}}'].title);
            $('#story').text(success[0]['{{$language}}'].text);
            if (success[0].video !== '0') {
                $('#video-div .video iframe').attr('src', success[0].video);
                $('#video-div').show();
            } else {
                $('#video-div').hide();
            }
            let link = '';
            if (success[0].what_category_id === 10) {
                link = '/projects/micro-projects/all?project=' + success[0].project_id;
            } else {
                link = '/projects/' + success[0]['what_category']['name'].toLowerCase().replace(/ /g, '-');
            }
            console.log(success);
            $('#what-project').text(success[0]['what_category']['{{$whoCatName}}']);
            $('#more-link').attr('href', link);
            $('.modal').modal('show');
        });
    });
</script>
@stack('navbar-scripts')

</body>
</html>
