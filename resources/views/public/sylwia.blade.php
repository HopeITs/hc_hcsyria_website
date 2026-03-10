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
    <title>Hope Center</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/profile.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head><!--/head-->
<body>

@include('public.navbar')

<div class="container">
    <div class="container profile-card">
        <div>
            <img src="/images/team/19.jpg" style="width: 271px;">
        </div>
        <div class="ini-content" style="width: 100%">
            <h2 style="font-size: 30px; margin-bottom: 0;">Sylwia Hazboun</h2>
            <h6 style="margin-top: 6px;">Caritas Poland</h6>
            <p></p>
            <table style="margin-top: 25px">
                <tr>
                    <td class="text-center"><i class="fa fa-facebook"></i></td>
                    <td><a href="https://www.facebook.com/sylwia.ewa.73"
                           target="_blank">/sylwia.ewa.73</a></td>
                </tr>
                <tr>
                    <td class="text-center"><i class="fa fa-envelope"></i></td>
                    <td><a href="mailto:shazboun@caritas.org.pl">shazboun@caritas.org.pl</a>
                    </td>
                </tr>
                <tr>
                    <td class="text-center"><i class="fa fa-phone"></i></td>
                    <td><a href="tel:+48 22 33 48 553">+48 22 33 48 553</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>


@include('public.footer')
@stack('navbar-scripts')

</body>
</html>
