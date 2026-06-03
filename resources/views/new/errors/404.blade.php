<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
    <title>@lang('404.error')</title>
    
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link href="/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="/css/main-new.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

@include('new.public.navbar')

<div class="error-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 error-content-box animated fadeIn">
                
                <div class="error-giant-heading">404</div>
                
                <div class="error-main-msg">
                    {{ __('404.error1') }}
                </div>
                
                <div class="error-sub-msg">
                    {{ __('404.error2') }}
                </div>
                
                <a href="{{ route('new.public.home') }}" class="error-action-btn">
                    <i class="bi bi-house-door-fill"></i> Back to Homepage
                </a>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

@include('new.public.footer')
</body>
</html>