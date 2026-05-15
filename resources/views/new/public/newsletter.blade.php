<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $language = 'french';
    } else {
        $language = 'english';
    }
@endphp
<head>
    <script src="/js/jquery.js"></script>
    @include('new.public.components.analytics-head')
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta property="fb:app_id" content="2133577546862306"/>
    <title>@lang('navbar.newsletter')</title>
    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/newsletter.css')}}" rel="stylesheet" type="text/css">
    <link href='/css/lato.css' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/hover-effect.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org/"/>
    <link href='https://fonts.googleapis.com/css?family=Caudex' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link href="/css/aos.css" rel="stylesheet">
    <script src="/js/aos.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>

    <style>

        .subscribe-title {
            font-family: 'Archivo', sans-serif;
            color: #555;
            font-size: 1.1rem;
            font-weight: 400;
        }

        .separator-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 62px;
        }

        .small.horizontal-line {
            width: 4px !important;
            height: 60px !important;
            background-color: #be1e2d !important;
            display: block !important;
            margin: 0 auto !important;
        }
        .subscription {
            display: flex;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 50px;
            padding: 5px;
            transition: all 0.3s ease;
            max-width: 550px;
            margin: 0 auto;
        }

        .subscription:focus-within {
            border-color: #be1e2d;
            box-shadow: 0 0 8px rgba(190, 30, 45, 0.15);
        }

        .add-email {
            flex: 1;
            border: none !important;
            background: transparent !important;
            padding: 10px 25px;
            outline: none !important;
            color: #444;
            font-size: 1rem;
        }


        .submit-email {
            background-color: #be1e2d;
            color: white;
            border: none;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .submit-email:hover {
            background-color: #a01926;
        }
        .submit-email:active {
            transform: scale(0.98);
        }

        .subscribe-container img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .subscribe-container {
            text-align: center;
            background: #f9f9f9;
            border-radius: 10px;
            width: 100%;
            max-width: 850px;
            margin: 0 auto;
            border: none;
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')

<div class="page-margin mb-3">
    <div class="container-fluid">
        <div class="row d-flex" style="min-height: 10vw;">
            <div class="col-6 d-flex justify-content-end flex-column pe-0 position-relative">
                <div class="first-column w-100"></div>
                <div class="content">
                    <div class="main_title aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
                        PUBLISHED BY
                    </div>
                    <div class="main_subtitle aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        CHRISTIAN HOPE CENTER
                    </div>
                </div>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>

<livewire:news-page />

<div class="separator-container" data-aos="fade-up" data-aos-duration="800">
    <div class="small horizontal-line"></div>
</div>
<div class="container-fluid" data-aos="fade-up" data-aos-duration="800">
    <div class="row">
        <div class="col-12 d-flex justify-content-center flex-column align-items-center">
            <div class="section-title">Get Latest Updates On Our News</div>
        </div>
    </div>
</div>

<div class="container-fluid" data-aos="fade-up" data-aos-duration="800">
    <div class="letter page-margin">
        <div class="row d-flex justify-content-center">
            <div class="subscribe-container">
                <div class="row d-flex justify-content-center mt-2">
                    <img src="/images/ico/letter.svg" alt="Newsletter Icon">
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="subscribe-title">
                        Subscribe To Receive The Latest News.
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form class="subscription" name="subsribeForm" id="subsribeForm">
                            @csrf
                            <input class="add-email" id="email" name="email" placeholder="Enter your email address..." type="email">
                            <button class="submit-email" type="submit" name="submit">
                                <span id="before-submit">Subscribe</span>
                                <span id="after-submit" style="display:none;">Subscribed!</span>
                            </button>
                        </form>
                        <label id="subscribe-error" class="subscribe-error" style="display:none; color: #be1e2d; font-size: 0.8rem; margin-top: 10px; font-weight: 600;">
                            Email has already subscribed!
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="separator-container" style="margin: 17px auto !important; ">
    <div class="small horizontal-line"></div>
</div>
<div class="horizontal-line last"></div>

@include('new.public.footer')

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    AOS.init();
</script>
<script>
    $(document).ready(function () {
        $("#subsribeForm").validate({
            debug: false,
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Email field is required!",
                    email: "Please Enter a valid format!"
                }
            },
            submitHandler: function (form) {
                let formData = $("form#subsribeForm").serialize()
                $.ajax({
                    // url: "http://" + location.host + "/newsletter/subscribe",
                    url: "{{ route('newsletter.subscribe')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    data: {
                        formData,
                        "email": $("input[name='email']").val()
                    },
                    success: function (response) {
                        if (response.msg === 'true') {
                            document.getElementById('subscribe-error').style.display = 'block';
                            setTimeout(function () {
                                document.getElementById('subscribe-error').style.display = 'none';
                                let input = document.getElementById('email');
                                input.value = "";
                            }, 2000);
                        }
                        else if (response.msg === 'false') {
                            document.getElementById('after-submit').style.display = 'block';
                            document.getElementById('before-submit').style.display = 'none';
                            document.getElementById('subscribe-error').style.display = 'none';
                            setTimeout(() => {
                                document.getElementById('after-submit').style.display = 'none';
                                document.getElementById('before-submit').style.display = 'block';
                                let input = document.getElementById('email');
                                input.value = "";
                            }, 2000);
                        }
                    },
                });
            }
        })
    });
</script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.dropdown-menu').forEach(function (element) {
            element.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        })
    });
</script>
<script>
    $(window).on('load', function() {
        $('.preloader').fadeOut('slow');
    });
</script>
</body>
</html>
