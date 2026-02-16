<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $position = 'french_position';
    } else {
        $position = 'position';
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
    <title>{{$profile->first_name}} {{$profile->last_name}}</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/profile.css" rel="stylesheet">


    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head><!--/head-->
<body>

@include('public.navbar')

<section class="container" style="padding-top: 120px">
    <div class="container profile-card">
        <div>
            <img src="{{$profile->image_path}}" style="width: 271px;">
        </div>
        <div style="width: 100%">
            <h2 style="font-size: 30px; margin-bottom: 0;">{{$profile->first_name}} {{$profile->last_name}}</h2>
            <h6 style="margin-top: 6px;">{!! $profile->$position !!}</h6>
            <p></p>
            @if($profile->inactive == '0')
                <table style="margin-top: 25px">
                    @if($profile->facebook_link != '0')
                        <tr>
                            <td class="text-center"><i class="fa fa-facebook"></i></td>
                            <td><a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                   target="_blank">facebook.com/{{$profile->facebook_link}}</a></td>
                        </tr>
                    @endif
                    <tr>
                        <td class="text-center"><i class="fa fa-envelope"></i></td>
                        <td><a href="mailto:{{$profile->email}}@hcsyria.org">{{$profile->email}}
                                @hcsyria.org</a>
                        </td>
                    </tr>
                    @if($profile->linkedin_link != '0')
                        <tr>
                            <td class="text-center"><i class="fa fa-linkedin"></i></td>
                            <td><a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                   target="_blank">{{$profile->linkedin_link}}</a></td>
                        </tr>
                    @endif
                    @if($profile->phone != '0')
                        <tr>
                            <td class="text-center"><i class="fa fa-phone"></i></td>
                            <td><a href="tel:{{$profile->phone}}">{{$profile->phone}}</a></td>
                        </tr>
                    @endif
                </table>
            @endif
            @if($profile->inactive != '0')
                @if (session('locale') == 'fr')
                    <p style="color: red; padding-top: 10px">Après son excellent travail qui a enrichi notre
                        centre, {{$profile->first_name}} a résigné le {{$profile->inactive}}</p>
                @else
                    <p style="color: red; padding-top: 10px">{{$profile->first_name}} has resigned
                        at {{$profile->inactive}} after giving an outstanding work that has enriched our
                        center.</p>
                @endif
            @endif
        </div>
    </div>
</section>

@include('public.footer')


<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
@stack('navbar-scripts')

</body>
</html>
