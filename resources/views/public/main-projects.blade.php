<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <meta name="description" content="@lang('what_we_do.description')">
    <meta name="keywords"
          content="what we do, hope center projects, hope center"/>
    <title>@lang('what_we_do.title')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    <link href="/css/what_we_do.css" rel="stylesheet">
    @if(app()->isLocale('fr'))
        <link href="/css/what_we_do-fr.css" rel="stylesheet">
    @endif
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/projects" />

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/donate" />

</head>
<body>

@include('public.navbar')

<section id="what_we_do">
    <div class="navigate">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">@lang('navbar.home')</a></li>
                <li class="active">@lang('what_we_do.title')</li>
            </ol>
        </div>
    </div>
    @include('public.what_we_do')
</section>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/swipe.index.js"></script>

@stack('navbar-scripts')
</body>
</html>
