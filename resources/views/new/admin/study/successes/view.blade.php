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
    <title>{{$success->$language->title}}</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/micro_page_new.css" rel="stylesheet">
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
    .content {
        color: #676767;
        font-size: 1.2vw;
        text-align: left;
    }

    .name {
        margin-top: 5vw;
        color: #023c54;
        font-weight: 600;
        font-size: 1.5vw;
        margin-bottom: 1vw;
    }

    .card-height {
        padding: 0vw 14vw 3vw 14vw;
        height: 19vw;
        margin-top: 3vw;
        margin-bottom: 3vw;
    }

    .quotation {
        position: absolute;
        width: 100%;
        right: 0%;
        padding: 0 10vw;
        top: 13vw;
    }

    .profile img {
        border-radius: 50%;
        width: 13vw;
        padding: 0.5vw;
        border: 3px solid #023c54;
        z-index: 1000;
        position: relative;
    }

    .profile {
        /*position: absolute;*/
        /*top: -90px;*/
    }

    @media (max-width: 575px) {
        .profile{
            margin-top: 3vw;
        }
        .profile img {
            width: 20vw !important;
        }

        .name {
            font-size: 2.3vw !important;
            margin-top: 11vw !important;
        }

        .content {
            font-size: 2.2vw !important;
        }

        .card-height {
            height: 45vw !important;
        }

        .quotation {
            top: 30vw !important;
            bottom: 0;
        }
    }
</style>
<body>

@stack('navbar_body')

<section id="projects">
    <div style="margin: 1% 4.7%;">
        <div class="row d-flex justify-content-end">
            <div class="col d-flex justify-content-end gap-3">
                <button class="btn btn-primary edit-btn" onclick="window.history.back();"><i
                            class="fa fa-arrow-left"></i> Back
                </button>
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                    <a href="{{route('successes.edit', $success->id)}}" class="btn btn-primary edit-btn">
                        <span class="fa fa-edit"></span>&nbsp;Edit</a>
                @endif
                @if(($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
                            &&  $success->online == '0'
                            && $success->english_check == '1' )
                    <form action="{{ route('successes.online') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $success->id }}">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-upload"></i> Publish
                        </button>
                    </form>
                @endif
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                    <a href="{{route('success.add.image', $success['id'])}}"
                       class="btn btn-primary edit-btn">
                        <i class='fa-solid fa-plus-minus'></i> Image</a>
                @endif
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class=" position-relative text-center">
                        <div class="profile position-relative">
                            <img src="{{$success->image_path}}">
                        </div>
                        <div class="d-flex justify-content-center position-absolute top-50">
                            <div class="card-height">
                                <img class="quotation" src="/images/home/quotation.svg">
                                <div class="name animated fadeInUp" style="animation-delay: .1s">
                                    {{$success->$language->title}}
                                </div>

                                <div class="content animated fadeInUp" style="animation-delay: .8s">
                                    {!! $success->$language->text !!}
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

</body>
</html>
