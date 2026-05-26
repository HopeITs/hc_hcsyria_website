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
    <link href="{{asset('css/our-news.css')}}" rel="stylesheet" type="text/css">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="/js/html5shiv.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

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

        /* Fixed Error Message Styling */
        .subscribe-error-msg, label.error {
            color: #be1e2d;
            font-size: 0.85rem;
            margin-top: 10px;
            font-weight: 600;
            display: block;
            text-align: center;
        }
    </style>
</head>

<body>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>

@include('new.public.navbar')

<livewire:news-page :carouselImages="$carouselImages"/>

<div class="container-fluid" data-aos="fade-up" data-aos-duration="800">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center flex-column align-items-center">
            <div class="section-title">Get Latest Updates On Our News</div>
        </div>
    </div>
</div>

<div class="container-fluid mb-5" data-aos="fade-up" data-aos-duration="800">
    <div class="letter page-margin">
        <div class="row justify-content-center">
            <div class="subscribe-container py-4">
                <div class="row justify-content-center mt-2">
                    <img src="/images/ico/letter.svg" alt="Newsletter Icon">
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="subscribe-title">
                        Subscribe To Receive The Latest News.
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form class="subscription" name="subsribeForm" id="subsribeForm">
                            @csrf
                            <input class="add-email" id="email" name="email" placeholder="Enter your email address..." type="email">
                            <button class="submit-email" type="submit">
                                <span id="before-submit">Subscribe</span>
                                <span id="after-submit" class="d-none">Subscribed!</span>
                            </button>
                        </form>

                        <div id="validation-errors-container" class="w-100 mt-2"></div>

                        <label id="subscribe-error" class="subscribe-error-msg d-none">
                            Email has already subscribed!
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
            // FIX: Safely append the error to the dedicated container
            errorPlacement: function(error, element) {
                error.appendTo('#validation-errors-container');
            },
            submitHandler: function (form) {
                let emailInput = $("#email");

                $.ajax({
                    url: "{{ route('newsletter.subscribe')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    data: {
                        formData: $(form).serialize(),
                        email: emailInput.val(),
                        submit: true // Spoofing the button name for the PHP controller
                    },
                    success: function (response) {
                        if (response.msg === 'true') {
                            $('#subscribe-error').removeClass('d-none');

                            setTimeout(function () {
                                $('#subscribe-error').addClass('d-none');
                                emailInput.val("");
                            }, 2000);
                        }
                        else if (response.msg === 'false') {
                            $('#after-submit').removeClass('d-none');
                            $('#before-submit').addClass('d-none');
                            $('#subscribe-error').addClass('d-none');

                            setTimeout(() => {
                                $('#after-submit').addClass('d-none');
                                $('#before-submit').removeClass('d-none');
                                emailInput.val("");
                            }, 2000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("500 Server Error! Check storage/logs/laravel.log");
                    }
                });

                return false;
            }
        });
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
