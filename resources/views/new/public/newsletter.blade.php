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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <link href="/css/aos.css" rel="stylesheet">
    <script src="/js/aos.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>
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

<div class="container-fluid my-5" data-aos="fade-up" data-aos-duration="800">
    <div class="row justify-content-center mx-0">

        <div class="news-subscribe-column">
            <div class="subscribe-container">
                <img src="/images/ico/letter.svg" alt="Newsletter Icon">

                <h4 class="subscribe-title text-capitalize">
                    Subscribe our newsletter to receive the latest news.
                </h4>

                <form class="subscription" name="subsribeForm" id="subsribeForm" action="" method="POST">
                    {!! csrf_field() !!}
                    <input class="add-email" id="email" name="email" placeholder="Enter your Email Address" type="email">
                    <button class="submit-email" type="submit" name="submit">
                        <span id="before-submit" class="before-submit">Subscribe</span>
                        <span id="after-submit" class="after-submit" style="display:none;">Subscribed!</span>
                    </button>
                </form>

                <div id="validation-errors-container" class="mt-2 text-center" style="min-height: 24px;"></div>
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
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('subsribeForm');

        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // STOPS the silent page refresh

                const emailInput = document.getElementById('email').value;
                const errorContainer = document.getElementById('validation-errors-container');
                const beforeSubmit = document.getElementById('before-submit');
                const submitBtn = document.querySelector('.submit-email');

                // 1. Clear old UI errors
                errorContainer.innerHTML = '';

                // 2. Simple Frontend Validation
                if (!emailInput || !emailInput.includes('@')) {
                    errorContainer.innerHTML = '<span style="color:red; font-size: 14px;">Please enter a valid email address.</span>';
                    return;
                }

                // 3. UI Feedback (Show "Sending...")
                submitBtn.disabled = true;
                beforeSubmit.innerText = 'Sending...';

                // 4. Fire the AJAX request
                fetch("{{ route('newsletter.subscribe') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ email: emailInput })
                })
                    .then(async response => {
                        if (!response.ok) throw new Error('Server Error');
                        return response.json();
                    })
                    .then(data => {
                        if (data.msg === 'true') {
                            // FIX: Inject the error into the container we KNOW works!
                            errorContainer.innerHTML = '<span style="color:red; font-size: 15px; font-weight: 500;">Email already exists!</span>';
                            beforeSubmit.innerText = 'Subscribe'; // Reset button text

                            // Auto-clear the error message after 3 seconds
                            setTimeout(() => {
                                errorContainer.innerHTML = '';
                            }, 3000);

                        } else if (data.msg === 'false') {
                            // Success!
                            beforeSubmit.innerText = 'Subscribed!';
                            document.getElementById('email').value = ''; // Clear the input

                            // Reset the button text back to normal after 3 seconds
                            setTimeout(() => {
                                beforeSubmit.innerText = 'Subscribe';
                            }, 3000);
                        }
                    })
                    .catch(error => {
                        // Catch server crashes
                        errorContainer.innerHTML = '<span style="color:red; font-size: 14px;">Server error. Please try again later.</span>';
                        beforeSubmit.innerText = 'Subscribe'; // Reset text
                        console.error('Subscription Error:', error);
                    })
                    .finally(() => {
                        // Always re-enable the button when the network request finishes
                        submitBtn.disabled = false;
                    });
            });
        }
    });
</script>

<script>
    $(window).on('load', function() {
        $('.preloader').fadeOut('slow');
    });
</script>
</body>
</html>
