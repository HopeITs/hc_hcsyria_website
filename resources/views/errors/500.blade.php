<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129097809-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129097809-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>@lang('500.error')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        #go-home {
            border: 1px solid #CF142B;
            color: #686868;font-size: 12px;
            padding: 6px 12px;
            border-radius: 4px;
        }
        #go-home:hover {
            background-color: #CF142B;
            color: #fff;
            /*-webkit-transition: all 0.9s ease 0s;*/
        }
    </style>
</head><!--/head-->
<body>

@include('public.navbar')

<section id="projects">
    <div class="container">
        <h3 class="text-center" style="margin-top: 70px;">{{ __('500.error1') }}</h3>
        <br>
        <p class="text-center">
        <a href="/" id="go-home">{{ __('500.error2') }}</a></p>
    </div>
</section>

@include('public.footer')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

</body>
</html>
