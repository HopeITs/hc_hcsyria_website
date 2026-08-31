<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $language = 'french';
        $whatCatName = 'french_name';
        $description = 'french_description';
    } else {
        $language = 'english';
        $whatCatName = 'name';
        $description = 'description';
    }
@endphp
<head>
    <script src="/js/jquery.js"></script>
    <script src="https://kit.fontawesome.com/1cf483120b.js" crossorigin="anonymous"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168141177-1"></script>

    <link href='/css/lato.css' rel='stylesheet' type='text/css'>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-168141177-1');
    </script> -->
    @include('new.public.components.analytics-head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">

    <meta name="keywords" content="aleppo syria, hope, center, children, university"/>
    <title>Home</title>
    <link href="{{asset('css/home_page.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/typeahead.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org"/>
    <link rel="stylesheet" href="/css/aos.css"/>
    <link href='https://fonts.googleapis.com/css?family=Martel' rel='stylesheet'>
    <link href="/css/story.5851.min.css" rel="stylesheet">
    <link href="/css/theme.min.css" rel="stylesheet">

    <script src="/js/html5shiv.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>

    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/swipe.index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js"></script>
    <script src="/js/head.5851.min.js"></script>
    <link rel="stylesheet" href="/css/animate.min.css"
          integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>

<body>
<style>
    .overlay-container {
        top: 14vw;
        right: 5.5vw;
        width: 20vw;
        cursor: pointer;
    }

    .overlay-container img {
        animation: zoomInOut 3.5s ease-in-out infinite;
        transform-origin: center center; /* keeps zoom centered */
    }

    @keyframes zoomInOut {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }

    @media (max-width: 578px) {
        .overlay-container {
            top: 90vw;
            right: 10vw;
            width: 32vw;
            cursor: pointer;
        }
    }
</style>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')
<section class="position-relative">
    @php $isPhone = $agent->isPhone(); @endphp

    @if(!$isPhone)
        <div id="HomeCarousel" class="position-relative">
            <img src="/images/home/Coverb.jpg" class="w-100 h-100" alt="Hope"/>
        </div>
    @else
        <div id="HomeCarousel" class="position-relative">
            <img src="/images/home/Cover.jpg" class="w-100 h-100" alt="Hope"/>
        </div>
    @endif
{{--        <div id="HomeCarousel" class="carousel slide" data-bs-ride="carousel"--}}


{{--                        <img--}}
{{--                                class="d-block w-100 carousel-image"--}}

    {{--<video id="video" class="intro--video d-lg-block d-md-block d-sm-block d-none" playsinline muted controls--}}
    {{--poster="/images/home/video-thumb.jpg">--}}
    {{--<video id="video" class="intro--video d-lg-none d-md-none d-sm-none d-block" playsinline muted controls--}}
    {{--poster="/images/home/video-thumb-mobile.jpg">--}}
    {{---- Skip & Play Button--}}

</section>
<section id="page-content">
    <div id="firstContainer" class="firstContainer">
        <div class="row w-100 d-flex justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-10 col-11 d-flex flex-column align-items-center">
                <div class="description">
                    Welcome to <span>HOPE CENTER</span>, a dedicated non-governmental organization, 
                    working actively to serve the most vulnerable communities in Syria.
                    {{--front lines, actively shaping--}}
                    {{--a different destiny for Aleppo. Beyond mere statistics, we Ire working tirelessly to ensure that the--}}
                    {{--Christian narrative--}}
                    {{--in this ancient city remains vibrant and unyielding--}}
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col d-flex justify-content-center">
                <div class="text-uppercase lastContainer title text-center matter" data-aos="fade-up" data-aos-duration="600">why
                    it
                    matters?
                </div>
            </div>
            <div class="row">
                <div class="position-relative p-0">
                    <!-- Video -->
                    <video id="video_matter" class="w-100" playsinline muted autoplay loop style="z-index: 1;">
                        <source src="/images/home/matters.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            {{--<svg  x="0px" y="0px"--}}
            {{--viewBox="0 0 1920 509">--}}
            {{--<path class="st1 star-0 path" d="M247.4,2.9c-1.5,0-2.8,1-3.2,2.4H118.5c-0.4,0-0.7,0.2-0.9,0.5c0.5,0.1,1.1,0.1,1.7,0.1v0.8--}}
            {{--c-0.5,0-1.1,0-1.7,0.1c0.2,0.3,0.5,0.5,0.9,0.5h125.6c0.4,1.4,1.7,2.4,3.2,2.4c1.9,0,3.4-1.5,3.4-3.4S249.3,2.9,247.4,2.9z"/>--}}
            {{--<path class="st1 star-1" visibility="hidden" d="M1122.3,65.8L1074,40.2c-43.2-22.9-91.9-34.9-140.7-34.9H760v2h173.3c48.6,0,96.9,12,139.8,34.7l48.3,25.6--}}
            {{--c0.1,0.1,0.3,0.1,0.5,0.1c0.4,0,0.7-0.2,0.9-0.5C1123,66.6,1122.8,66,1122.3,65.8z"/>--}}
            {{--<path class="st1 star-2" visibility="hidden" d="M757,2.9c-1.5,0-2.8,1-3.2,2.4H250.6v2h503.2c0.4,1.4,1.7,2.4,3.2,2.4c1.9,0,3.4-1.5,3.4-3.4S758.9,2.9,757,2.9--}}
            {{--z"/>--}}


        </div>
        <div class="container-fluid">
            <div class="page-margin">
                <div class="row d-flex justify-content-center">
                    <div class="col-7 mt-5 mb-lg-5 mb-md-5 mb-0">
                        <div class="date programs-section">
                            <div class="text-uppercase"><span>our programs</span></div>
                        </div>
                    </div>
                </div>
                {{--        OLD Horizontal Wrapper--}}
                {{--                                <img src="/images/home/SZ.jpg"--}}
                {{--                                     width="100%">--}}
                {{--                                        their academic careers, what they truly needed, was a study-friendly environment--}}
                {{--                                        equipped with basic amenities...--}}
                {{--                                        they--}}
                {{--                                        lack sought by all employers and helping them land job opportunities to--}}
                {{--                                        establish--}}
                {{--                                        sustainable careers…--}}
                {{--                                        our program aimed to facilitate vocational recovery and encourage beneficiaries’--}}
                {{--                                        financial independence…--}}
                {{--                                        daily commodities, which is why Polish families started supporting vulnerable--}}
                {{--                                        families through monthly cash aid…--}}
                {{--                                <img src="/images/home/S2S.jpg"--}}
                {{--                                     width="100%">--}}
                {{--                                        financial--}}
                {{--                                        hardships jeopardizing the educational process, Polish schools helped--}}
                {{--                                        schools in need with equipment and teachers training…--}}
                {{--                                <img src="/images/home/CU.jpg"--}}
                {{--                                     width="100%">--}}
                {{--                                        upbringing, our child-friendly space is a lighthouse that promotes--}}
                {{--                                        social-emotional--}}
                {{--                                        health besides educational development…--}}
                {{--                                <img src="/images/home/Reh.jpg"--}}
                {{--                                     width="100%">--}}
                {{--                                        infrastructure of the country, rehabilitating family residencies became the--}}
                {{--                                        first--}}
                {{--                                        step to re-normalizing life…--}}
                {{--                <div class="panel"--}}
                {{--                     style="display: flex; align-items: center; justify-content: center; visibility: hidden">--}}
                {{--<img src="/images/home/Reh.jpg"--}}
                {{--width="100%">--}}
                {{--                                        infrastructure of the country, rehabilitating family residencies became the--}}
                {{--                                        first--}}
                {{--                                        step to re-normalizing life…--}}

                <div class="row mt-3">
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="panel mb-4 d-flex justify-content-center align-items-center">
                            <div class="item">
                                <div class="row">
                                    <div class="col-12 related-ini-img">
                                        <img src="/images/home/LEAP.jpg" class="w-100">
                                    </div>
                                    <div class="col-12">
                                        <div class="date">
                                            <div><span>2024</span></div>
                                        </div>
                                        <div class="name">
                                            <div>LEAP</div>
                                        </div>
                                        <div class="content">
                                            <div>The LEAP is designed to empower a new generation of young Syrian Christian
                                                leaders who live out their faith with integrity,
                                                insight, and empathy.Through a dynamic and values-driven approuch, that will
                                                help..
                                            </div>
                                        </div>
                                        <a href="/projects/leap" class="readmore">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="panel mb-4 d-flex justify-content-center align-items-center">
                            <div class="item">
                                <div class="row">
                                    <div class="col-12 related-ini-img">
                                        <img src="/images/home/Reh.jpg" class="w-100">
                                    </div>
                                    <div class="col-12">
                                        <div class="date">
                                            <div><span>2023</span></div>
                                        </div>
                                        <div class="name">
                                            <div>Rehabilitation</div>
                                        </div>
                                        <div class="content">
                                            <div>Distorted financial capacities were followed by an earthquake that shook
                                                the
                                                infrastructure of the country, rehabilitating family residencies became the
                                                first
                                                step to re-normalizing life…
                                            </div>
                                        </div>
                                        <a href="/projects/rehabilitation" class="readmore">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="panel mb-4 d-flex justify-content-center align-items-center">
                            <div class="item">
                                <div class="row">
                                    <div class="col-12 related-ini-img">
                                        <img src="/images/home/CU.jpg" class="w-100"
                                             width="100%">
                                    </div>
                                    <div class="col-12">
                                        <div class="date">
                                            <div><span>2022</span></div>
                                        </div>
                                        <div class="name">
                                            <div>Children University</div>
                                        </div>
                                        <div class="content">
                                            <div>Children were the youngest victims of war, which took a toll on their
                                                healthy
                                                upbringing, our child-friendly space is a lighthouse that promotes
                                                social-emotional
                                                health besides educational development…
                                            </div>
                                        </div>
                                        <a href="/projects/childrenuni" class="readmore">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="panel mb-4 d-flex justify-content-center align-items-center">
                            <div class="item">
                                <div class="row">
                                    <div class="col-12 related-ini-img">
                                        <img src="/images/home/S2S.jpg" class="w-100"
                                             width="100%">
                                    </div>
                                    <div class="col-12">
                                        <div class="date">
                                            <div><span>2019</span></div>
                                        </div>
                                        <div class="name">
                                            <div>School to School</div>
                                        </div>
                                        <div class="content">
                                            <div>The road to shaping the future generation of the country was paved with
                                                financial
                                                hardships jeopardizing the educational process, Polish schools helped
                                                schools in need with equipment and teachers training…
                                            </div>
                                        </div>
                                        <a href="/projects/school-to-school" class="readmore">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="panel mb-4 d-flex justify-content-center align-items-center">
                            <div class="item">
                                <div class="row">
                                    <div class="col-12 related-ini-img">
                                        <img src="/images/home/F2F.jpg" class="w-100">
                                    </div>
                                    <div class="col-12">
                                        <div class="date">
                                            <div><span>2018</span></div>
                                        </div>
                                        <div class="name">
                                            <div>Family To Family</div>
                                        </div>
                                        <div class="content">
                                            <div>Families suffered to make ends meet amid a very sharp increase in the
                                                prices of
                                                daily commodities, which is why Polish families started supporting
                                                vulnerable
                                                families through monthly cash aid…
                                            </div>
                                        </div>
                                        <a href="/projects/family-to-family" class="readmore">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="panel mb-4 d-flex justify-content-center align-items-center">
                            <div class="item">
                                <div class="row">
                                    <div class="col-12 related-ini-img">
                                        <img src="/images/home/MP.jpg" class="w-100">
                                    </div>
                                    <div class="col-12">
                                        <div class="date">
                                            <div><span>2018</span></div>
                                        </div>
                                        <div class="name">
                                            <div>Micro Project</div>
                                        </div>
                                        <div class="content">
                                            <div>Family providers lost their livelihoods, becoming unable to generate an
                                                income,
                                                our program aimed to facilitate vocational recovery and encourage
                                                beneficiaries’
                                                financial independence…
                                            </div>
                                        </div>
                                        <a href="/projects/micro-projects" class="readmore">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="panel mb-4 d-flex justify-content-center align-items-center">
                            <div class="item">
                                <div class="row">
                                    <div class="col-12 related-ini-img">
                                        <img src="/images/home/DISC.jpg" class="w-100">
                                    </div>
                                    <div class="col-12">
                                        <div class="date">
                                            <div><span>2016</span></div>
                                        </div>
                                        <div class="name">
                                            <div>DISC</div>
                                        </div>
                                        <div class="content">
                                            <div>Our training program focuses on equipping university graduates with job
                                                skills
                                                they
                                                lack sought by all employers and helping them land job opportunities to
                                                establish
                                                sustainable careers…
                                            </div>
                                        </div>
                                        <a href="/projects/disc" class="readmore">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="panel mb-4 d-flex justify-content-center align-items-center">
                            <div class="item">
                                <div class="row">
                                    <div class="col-12 related-ini-img">
                                        <img src="/images/home/SZ.jpg" class="w-100">
                                    </div>
                                    <div class="col-12">
                                        <div class="date">
                                            <div><span>2013</span></div>
                                        </div>
                                        <div class="name">
                                            <div>Study Zone</div>
                                        </div>
                                        <div class="content">
                                            <div>The scarcity of electricity disrupted university student's ability to
                                                complete
                                                their academic careers, what they truly needed, was a study-friendly
                                                environment
                                                equipped with basic amenities...
                                            </div>
                                        </div>
                                        <a href="/projects/study-zone" class="readmore">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('new.public.footer')
</section>
{{--It's a wake-up call demanding swift and decision action.--}}
{{--Syria's Christian Doomsday clock--}}


<script src="/js/gsap.min.js"></script>
<script src="/js/ScrollTrigger.min.js"></script>
<script src="/js/Flip.min.js"></script>


<script>
    window.onload = function () {
        let navbar = document.querySelector('.navbar');
        let navlogo = document.getElementById('nav_logo');
        navbar.classList.add('navbar_reverse');
        navlogo.src = "/images/logos/hcreverse.svg";
        // $(".navbar").hide();
        // const page_content = document.getElementById('page-content');
        // page_content.style.display = 'block';
        let topOfContainer = $(".firstContainer").offset().top - 300;
        console.log(topOfContainer);
        $(window).scroll(function () {
            if ($(window).scrollTop() <= topOfContainer) {
                navbar.classList.add('navbar_reverse');
                navlogo.src = "/images/logos/hcreverse.svg";
            } else if ($(window).scrollTop() > topOfContainer) {
                navbar.classList.remove('navbar_reverse');
                navlogo.src = "/images/logos/hc.svg";
            }
        });
        const mwrap = document.getElementById('Mwrap');
        // let mwrapWidth = mwrap.scrollWidth;
        let mwrapWidth = mwrap.scrollWidth;

        function getScrollAmount() {
            //minus is to scroll to left
            return -(mwrapWidth - window.innerWidth);
        }


        // let mwrapWidth = mwrap.offsetWidth;
        // let amountToScroll = mwrapWidth - window.innerWidth;

        const tween = gsap.to(mwrap, {
            x: getScrollAmount,
            duration: 3,
            ease: "none",
        });

        ScrollTrigger.create({
            trigger: ".MwrapWrapper",
            start: "top 15%",
            end: () => `+=${getScrollAmount() * -1}`,
            pin: true,
            // pinSpacing: "margin"
            animation: tween,
            scrub: 1,
            invalidateOnRefresh: true
        });
    }
</script>
{{--OLD SCRIPTS--}}



{{--            //minus is to scroll to left--}}




{{--            // pinSpacing: "margin"--}}
{{--            invalidateOnRefresh: true--}}
{{--        //     scrollTop: $("#skipBtn").offset().top--}}


{{--        // var button = document.getElementById("MuteButton")--}}
{{--        // var video = document.getElementById("video")--}}





{{--    //         duration: 1--}}







{{--                    Counter: $(this).text()--}}
{{--                    Counter: $(this).text()--}}

@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')



{{--var action = gsap.timeline({defaults: {duration: 1, ease:'none' },--}}
{{--end: "bottom +=220%", // new--}}
{{--} // new: info for position--}}
{{--// .from(".pathBall", {motionPath: {path: ".pathLine", align: ".pathLine", offsetX:0, offsetY:0,  }}, 0)--}}

{{--// To compensate for the 'faster' vertical movement, a logic could be defined that counteracts the position of the SVG. Here is a simple experiment adapted to certain sectors (a fixed width of the SVG!).--}}

{{--.to('#wrap', {y:'+=200',duration:0.25,},0)--}}
{{--.to('#wrap', {y:'-=40',duration:0.05,},0.40)--}}
{{--.to('#wrap', {y:'-=800',duration:0.2,},0.5)--}}
{{--.to('#wrap', {y:'-=50',duration:0.2,},0.60)--}}
{{--.to('#wrap', {y:'-=500',duration:0.2,},0.80)--}}
{{--end: '+=1000px'--}}
{{--}, defaults: {ease: 'none'}--}}

{{--.to({}, {duration: 3}) // only a little pause before unpinning--}}

{{--// .to(".star-0, .text01, .ltext01", {autoAlpha: 1, duration: 0.2})--}}
{{--// .to({}, {duration: 3}) // only a little pause before unpinning--}}
<script src="/js/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    $(document).ready(function () {
        $('#HomeCarousel').bind('contextmenu', function () {
            return false;
        });
        $('#video_matter').bind('contextmenu', function () {
            return false;
        });
    });
</script>
</body>
</html>
