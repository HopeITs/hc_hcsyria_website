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
    <title>{{$what->name}}</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/initiative.css" rel="stylesheet">
    <link href="/css/lato.css" rel="stylesheet">
    <link href="/css/main-new.css" rel="stylesheet">
    <link href="/css/children_new.css" rel="stylesheet">
    <link href="/css/disc_new.css" rel="stylesheet">
    <link href="/css/study_new.css" rel="stylesheet">
    <link href="/css/leap.css" rel="stylesheet">
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
    <script type="text/javascript" src="/js/jquery.twentytwenty.js"></script>
    <link href="/css/twentytwenty.css" rel="stylesheet">
</head>
<style>
    .title{
        background-color: unset;
    }
    @media(max-width: 576px){
        .partner-title, .ini-title {
            font-size: 4vw !important;
        }
    }


</style>
<body>

@stack('navbar_body')
@php
    if (str_contains($what->name , 'Study')) {
         $id = 'Study';
     } elseif (str_contains($what->name, 'Micro')) {
         $id = 'Micro';
     } elseif (str_contains($what->name, 'DISC')) {
         $id = 'DISC';
     } elseif (str_contains($what->name, 'Family')) {
         $id = 'Family';
     } elseif (str_contains($what->name, 'School')) {
         $id = 'School';
     } elseif (str_contains($what->name, 'LEAP')) {
         $id = 'LEAP';
     } elseif (str_contains($what->name, 'Children')) {
         $id = 'Children';
     } else {
         $id = 'projects';
     }
@endphp
<div id="projects">
    <section id="{{ $id }}">
        <div style="padding: 3% 17.5%;">
            <div class="row d-flex justify-content-end">
                <div class="col d-flex justify-content-end gap-3">
                    <button class="btn btn-primary edit-btn" onclick="window.history.back();"><i
                            class="fa fa-arrow-left"></i> Back
                    </button>
                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
                        <a href="{{route('projectBrief.images.create', $what->what_category_id)}}"
                           class=" btn btn-primary edit-btn" >
                            <i class='fa-solid fa-plus-minus'></i> Media</a>
                    @endif
                </div>
            </div>
        </div>
        @include('new.public.components.project-brief-section', ['project' => $what])
    </section>
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
