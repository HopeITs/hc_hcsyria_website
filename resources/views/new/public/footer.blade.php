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
    <title>@lang('404.error')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">

    <link href="/css/main-new.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head><!--/head-->
<body>
<div class="footer-margin">
    <footer id="footer">
        <div class="seperator-line"></div>
        <div class="footer-middle">
            <div class="page-padding">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 d-flex flex-column justify-content-lg-start justify-content-md-start justify-content-sm-start justify-content-center">
                        <div>contact us:</div>
                        <div class="text-uppercase office-name">hope center</div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 d-flex flex-column justify-content-center text-center">
                        <div><span class="text-capitalize office-position">head office </span><span
                                class="text-capitalize office-position">address: </span>
                            <a id="info-link" target="_blank"
                               href="https://www.google.com/maps/place//@36.218683,37.154985,17z/data=!4m6!1m5!3m4!2zMzbCsDEzJzA3LjMiTiAzN8KwMDknMTguMCJF!8m2!3d36.218683!4d37.154985?entry=ttu&g_ep=EgoyMDI0MTEwNS4wIKXMDSoASAFQAw%3D%3D">
                                Eastern Villat Street <b>Aleppo,
                                    Syria</b>
                            </a>
                        </div>
                        <div class="d-flex justify-content-center" style="gap: 1.2vw"><span class="text-capitalize office-position">phone:
                            <a href="tel:+963993310227"
                               id="info-link">+963 993 310
                                227</a>
                            </span> |
                            <span class="text-capitalize office-position">email:
                            <a class="text-lowercase"
                                href="mailto:info@hcsyria.org"
                                id="info-link">info@hcsyria.org</a>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 d-lg-flex flex-column d-md-flex d-sm-flex justify-content-lg-end align-items-lg-end align-items-md-end align-content-sm-end align-items-center">
                        <div class="socials">
                            <a href="https://hcsyria.org"
                               target="_blank">
                                <i class="fa fa-home"></i>
                            </a>
                            <a href="https://www.youtube.com/channel/UC777Xf3lHtQufwaYjgxsiRA/videos"
                               target="_blank">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/christian-hope-center/?viewAsMember=true"
                               target="_blank">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="page-padding">
                <div class="row d-flex align-items-baseline">
                    <div
                        class="col-lg-4 col-md-4 col-sm-4 col-12 d-flex justify-content-lg-start justify-content-md-start justify-content-sm-start justify-content-center">
                        <div class="text-capitalize" data-aos="fade-up" data-aos-duration="400"
                             data-aos-anchor-placement="top-bottom">
                            <strong><a href="/newsletter/10/1" style="color: white">Visit our Newsletter</a></strong>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 d-flex justify-content-center">
                        <div data-aos="fade-up" data-aos-duration="400" data-aos-anchor-placement="top-bottom">
                            <div class="copy-right" data-aos="fade-up" data-aos-duration="1000"
                                 data-aos-anchor-placement="top-bottom">@lang('main.footer')</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 d-lg-flex d-md-flex d-sm-flex d-none justify-content-lg-end justify-content-md-end justify-content-sm-end justify-content-center">
                        <div data-aos="fade-up" data-aos-duration="400" data-aos-anchor-placement="top-bottom">
                            <div data-aos="fade-up" data-aos-duration="600" data-aos-anchor-placement="top-bottom">
                                <a style="cursor:pointer;" onclick="topFunction()">Back to Top</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
</body>
</html>

