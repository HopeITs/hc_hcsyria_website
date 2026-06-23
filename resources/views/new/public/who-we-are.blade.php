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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <meta name="description" content="Christian Hope Center is a Syrian non-profit NGO established in 2018 and headquartered in Aleppo, working in emergency response, relief, early recovery, community development and WASH.">
    <meta name="keywords" content="aleppo syria, hope, center, NGO, humanitarian, community development"/>
    <title>Who We Are</title>

    <link href="{{asset('css/main-new.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/who-we-are.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/who-we-are-redesign.css')}}" rel="stylesheet" type="text/css">

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="alternate" hreflang="x-default" href="https://www.hcsyria.org"/>
    <link href='https://fonts.googleapis.com/css?family=Martel:400,600,800,900' rel='stylesheet'>

    {{-- Enable scroll animations ONLY when the tab is visible and IntersectionObserver
         exists. Runs synchronously before paint to avoid any flash. In a hidden/background
         tab or unsupported browser, the class is never added and all content stays visible. --}}
    <script>
        (function () {
            try {
                var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                if (!reduce && 'IntersectionObserver' in window && !document.hidden) {
                    document.documentElement.classList.add('anim-on');
                }
            } catch (e) { /* leave content visible */ }
        })();
    </script>

    <script src="/js/html5shiv.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>

    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.balloon.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <link rel="stylesheet" href="/css/animate.min.css"
          integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="/css/lato.css" rel="stylesheet">
</head>

<body>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')

@php
    /* Map each value to a guaranteed-existing image in /images/mission (capitalised on disk) */
    $valueImages = [
        'hope.jpg'           => '/images/mission/Hope.jpg',
        'justice.jpg'        => '/images/mission/Justice.jpg',
        'responsibility.jpg' => '/images/mission/Responsibility.jpg',
        'modesty.jpg'        => '/images/mission/Modesty.jpg',
        'listening.jpg'      => '/images/mission/Listening.jpg',
    ];
@endphp

<div id="wwa-progress"></div>

<div id="Who" class="page_start">

    <div class="wwa-ambient" aria-hidden="true"><span></span><span></span><span></span></div>

    {{-- ===================== 1. HERO ===================== --}}
    <header class="hero">
        @include('new.public.partials.cover-carousel', ['carouselImages' => $carouselImages])
        <div class="hero-overlay">
            <div class="hero-eyebrow" data-fx="up">Est. 2018 &nbsp;·&nbsp; Aleppo &nbsp;·&nbsp; Syria</div>
            <h1 class="hero-title">
                <span class="l1" data-fx="up">Some see a hopeless end.</span>
                <span class="l2" data-fx="up">Others see an <em>endless hope</em>.</span>
            </h1>
            <a href="#who-we-are" class="hero-scroll" aria-label="Scroll down"><span></span></a>
        </div>
    </header>

    {{-- ===================== 2. WHO WE ARE ===================== --}}
    <section id="who-we-are">
        <div class="wwa-eyebrow" data-fx="up">Who We Are</div>
        <h2 class="wwa-section-title" data-fx="up">
            Rebuilding lives, <span class="accent">one family at a time</span>
        </h2>
        <div class="wwa-rule" data-fx="zoom"></div>

        <div class="intro-grid">
            <div class="hc-logo-card tilt" data-fx="left">
                <img class="tilt-inner" src="/images/logos/hc.svg" alt="Christian Hope Center">
            </div>
            <div data-fx="right">
                <p class="intro-lead">
                    <b>Christian Hope Center</b> is a Syrian non-profit NGO, established in 2018
                    and headquartered in Aleppo.
                </p>
                <p class="intro-text">
                    The organization operates across multiple regions of Syria, delivering
                    humanitarian and development interventions in response to the country's
                    ongoing needs.
                </p>
                <p class="intro-text">
                    We work in emergency response, relief assistance, early recovery, community
                    development, and Water, Sanitation &amp; Hygiene (WASH) — strengthening community
                    resilience and promoting livelihoods and financial self-reliance.
                </p>
                <div class="focus-pills" data-fx-stagger>
                    <span class="pill">Emergency Response</span>
                    <span class="pill">Relief Assistance</span>
                    <span class="pill">Early Recovery</span>
                    <span class="pill">Community Development</span>
                    <span class="pill">WASH</span>
                </div>
            </div>
        </div>

        <div class="intro-stats" data-fx-stagger>
            <div class="stat">
                <div class="num">2018</div>
                <div class="label">Established</div>
            </div>
            <div class="stat">
                <div class="num">Aleppo</div>
                <div class="label">Headquarters</div>
            </div>
            <div class="stat">
                <div class="num">Syria-wide</div>
                <div class="label">Multi-region reach</div>
            </div>
        </div>
    </section>

    {{-- ===================== 3. OUR VALUES ===================== --}}
    <section id="values-section" class="wwa-section">
        <div class="wwa-eyebrow" data-fx="up">What Guides Us</div>
        <h2 class="wwa-section-title" data-fx="up">Our <span class="accent">Values</span></h2>
        <div class="wwa-rule" data-fx="zoom"></div>

        <div class="tabbed-carousel" data-fx="flip">
            <div class="wwa-tabs" data-fx-stagger>
                @foreach($values as $i => $value)
                    <button type="button" class="wwa-tab @if($i === 0) active @endif"
                            data-slide-index="{{ $i }}">
                        <span class="idx">0{{ $i + 1 }}</span>{{ strip_tags($value->name) }}
                    </button>
                @endforeach
            </div>

            <div id="valuesCarousel" class="carousel slide carousel-fade split-carousel" data-bs-ride="carousel" data-bs-interval="7000">
                <div class="carousel-inner">
                    @foreach($values as $i => $value)
                        @php
                            $img = $valueImages[basename($value->image_path)] ?? $value->image_path;
                        @endphp
                        <div class="carousel-item @if($i === 0) active @endif">
                            <div class="split">
                                <div class="split-media">
                                    <img class="cover" src="{{ $img }}" alt="{{ strip_tags($value->name) }}">
                                    <img src="/images/home/image-mask.png" class="image-mask"/>
                                </div>
                                <div class="split-body">
                                    <div class="value-kicker reveal d1">Value 0{{ $i + 1 }}</div>
                                    <div class="value-name reveal d1">{{ strip_tags($value->name) }}</div>
                                    <blockquote class="value-quote reveal d2">{{ strip_tags($value->quote) }}</blockquote>
                                    <div class="value-source reveal d3">— {{ strip_tags($value->quote_source) }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#valuesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#valuesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    {{-- ===================== 4. OUR MISSION ===================== --}}
    <section id="mission-section">
        <div class="mission-mark font-serif" data-fx="zoom">&ldquo;</div>
        <p class="mission-statement" data-fx="up">
            Our mission is to strengthen <span class="hl">families and communities</span> in Syria
            by providing practical support, educational opportunities, social services, and
            community-based programs that promote <span class="hl">dignity, resilience</span>,
            and a better quality of life.
        </p>
        <p class="mission-verse" data-fx="up">
            “And let us consider how we may spur one another on toward love and good deeds.”
            <span class="src">Hebrews 10:24</span>
        </p>
    </section>

    {{-- ===================== 5. VISION & STRATEGY ===================== --}}
    <section id="vision-section" class="wwa-section">
        <div class="wwa-eyebrow" data-fx="up">Where We're Heading</div>
        <h2 class="wwa-section-title" data-fx="up">Our Vision &amp; <span class="accent">Strategy</span></h2>
        <div class="wwa-rule" data-fx="zoom"></div>

        @php
            $pillars = [
                ['name' => 'Family Support',   'img' => '/images/home/F2F/1.jpg',                   'text' => 'Sustainable, income-generating opportunities for family providers to become active agents of economic and social recovery.'],
                ['name' => 'Youth Support',    'img' => '/images/home/Youth/youth_cover.jpg',        'text' => 'Skilled youth with better job opportunities, motivated to stay in their country and foster economic growth and community stability.'],
                ['name' => 'Children Support', 'img' => '/images/home/Children%20University/1.jpg',  'text' => 'Children with quality education and creative opportunities across all aspects of growth and development.'],
                ['name' => 'Elderly Support',  'img' => '/images/home/Micro/1.jpg',                  'text' => 'Resilient, self-sufficient families that are less reliant on relief aid — especially the most vulnerable elderly households.'],
            ];
        @endphp

        <div class="tabbed-carousel" data-fx="flip">
            <div class="wwa-tabs" data-fx-stagger>
                @foreach($pillars as $i => $pillar)
                    <button type="button" class="wwa-tab @if($i === 0) active @endif"
                            data-slide-index="{{ $i }}">
                        <span class="idx">0{{ $i + 1 }}</span>{{ $pillar['name'] }}
                    </button>
                @endforeach
            </div>

            <div id="visionCarousel" class="carousel slide carousel-fade split-carousel" data-bs-ride="carousel" data-bs-interval="7000">
                <div class="carousel-inner">
                    @foreach($pillars as $i => $pillar)
                        <div class="carousel-item @if($i === 0) active @endif">
                            <div class="split reverse">
                                <div class="split-body">
                                    <div class="vision-name reveal d1"><span class="num">0{{ $i + 1 }}</span>{{ $pillar['name'] }}</div>
                                    <div class="vision-aspire reveal d2">We aspire to support our community to promote:</div>
                                    <p class="vision-text reveal d3">{{ $pillar['text'] }}</p>
                                </div>
                                <div class="split-media">
                                    <img class="cover" src="{{ $pillar['img'] }}" alt="{{ $pillar['name'] }}">
                                    <img src="/images/home/image-mask.png" class="image-mask"/>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#visionCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#visionCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    {{-- ===================== 6. PARTNERS ===================== --}}
    <section id="donor-section">
        <div class="wwa-eyebrow" data-fx="up">Standing With Us</div>
        <h2 class="wwa-section-title" data-fx="up">Our <span class="accent">Partners</span></h2>
        <div class="wwa-rule" data-fx="zoom"></div>

        <div class="partners-grid" data-fx-stagger>
            @foreach($donors as $donor)
                <div class="partner-cell tilt">
                    <img src="{{ $donor->logo }}" alt="{{ $donor->name }}">
                </div>
            @endforeach
        </div>
    </section>

    <div class="wwa-end-space"></div>
</div>

<script>
    (function () {
        var html = document.documentElement;
        var animOn = html.classList.contains('anim-on');

        // ---- Scroll-triggered reveals (only when anim-on; otherwise content is already visible) ----
        if (animOn && 'IntersectionObserver' in window) {
            var els = [].slice.call(document.querySelectorAll('#Who [data-fx], #Who [data-fx-stagger]'));
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in');
                        io.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
            els.forEach(function (el) { io.observe(el); });

            // ---- Hero parallax: text drifts up & fades as you scroll into the story ----
            var hero = document.querySelector('.hero');
            var overlay = document.querySelector('.hero-overlay');
            if (hero && overlay) {
                var ticking = false;
                function update() {
                    ticking = false;
                    var h = hero.offsetHeight || 1;
                    var y = window.pageYOffset || 0;
                    var p = Math.min(y / h, 1);
                    overlay.style.transform = 'translate3d(0,' + (y * 0.42) + 'px,0)';
                    overlay.style.opacity = String(Math.max(1 - p * 1.35, 0));
                }
                window.addEventListener('scroll', function () {
                    if (!ticking) { ticking = true; requestAnimationFrame(update); }
                }, { passive: true });
                update();
            }
        }

        // ---- Scroll progress bar (always on; purely decorative) ----
        var prog = document.getElementById('wwa-progress');
        if (prog) {
            var pTick = false;
            function updateProgress() {
                pTick = false;
                var st = window.pageYOffset || 0;
                var max = (document.documentElement.scrollHeight - window.innerHeight) || 1;
                prog.style.transform = 'scaleX(' + Math.min(Math.max(st / max, 0), 1) + ')';
            }
            window.addEventListener('scroll', function () {
                if (!pTick) { pTick = true; requestAnimationFrame(updateProgress); }
            }, { passive: true });
            updateProgress();
        }

        // ---- Interactive 3D tilt on hover-capable pointers (decorative) ----
        if (window.matchMedia && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
            document.querySelectorAll('#Who .tilt').forEach(function (el) {
                var max = el.classList.contains('partner-cell') ? 10 : 7;
                el.addEventListener('mousemove', function (e) {
                    var r = el.getBoundingClientRect();
                    var px = (e.clientX - r.left) / r.width - 0.5;
                    var py = (e.clientY - r.top) / r.height - 0.5;
                    el.style.transform = 'perspective(900px) rotateX(' + (-py * max).toFixed(2) + 'deg) rotateY(' + (px * max).toFixed(2) + 'deg)';
                });
                el.addEventListener('mouseleave', function () { el.style.transform = ''; });
            });
        }

        // ---- Sync custom tabs <-> Bootstrap carousels (Values + Vision) ----
        function initCarousels() {
            document.querySelectorAll('.tabbed-carousel').forEach(function (wrap) {
                var carouselEl = wrap.querySelector('.carousel');
                var tabs = [].slice.call(wrap.querySelectorAll('.wwa-tab'));
                if (!carouselEl || typeof bootstrap === 'undefined') return;

                tabs.forEach(function (tab) {
                    tab.addEventListener('click', function () {
                        bootstrap.Carousel.getOrCreateInstance(carouselEl).to(parseInt(tab.dataset.slideIndex, 10));
                    });
                });
                carouselEl.addEventListener('slid.bs.carousel', function (e) {
                    tabs.forEach(function (tab) {
                        tab.classList.toggle('active', parseInt(tab.dataset.slideIndex, 10) === e.to);
                    });
                });
            });

            document.addEventListener('keydown', function (e) {
                if ((e.keyCode !== 37 && e.keyCode !== 39) || typeof bootstrap === 'undefined') return;
                document.querySelectorAll('.split-carousel').forEach(function (c) {
                    var rect = c.getBoundingClientRect();
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        bootstrap.Carousel.getOrCreateInstance(c)[e.keyCode === 39 ? 'next' : 'prev']();
                    }
                });
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCarousels);
        } else {
            initCarousels();
        }
    })();
</script>

@include('new.public.footer')
@stack('fancyVideo')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
</body>
</html>
