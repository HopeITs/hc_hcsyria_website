<nav class="navbar navbar-light navbar-expand-lg navbar-expand-md navbar-expand-sm fixed-top page-padding"
     aria-label="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href={{route('new.public.home')}}>
            <img id="nav_logo" src="/images/logos/hc.svg">
            <img id="nav_logo_w" src="/images/logos/hc-w.svg">
        </a>
        <button class="navbar-toggler" id="my-navbar-toggle" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 mt-0">
                <li><a class="nav-list-links close-nav" href="/home">@lang('navbar.home')</a></li>
                <li role="separator" class="divider"></li>
                <li><a class="nav-list-links close-nav" href="/who-we-are">@lang('navbar.whoWeAre')</a></li>
                <li role="separator" class="divider"></li>
                <li class="nav-item dropdown dropdown_big_screen">
                    <a id="dropdown" href="#" class="nav-list-links dropdown-toggle" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">@lang('navbar.whatWeDo')</a>
                    <ul class="dropdown-menu dropdown_menu_big multi-column columns-2" aria-labelledby="dropdown">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    <li><h5 class="projects-title-separator"><b>@lang('navbar.whatWeDo.development')</b>
                                        </h5></li>
                                    <li style="cursor: pointer;"><a
                                            href="/projects/micro-projects">@lang('navbar.whatWeDo.micro')</a></li>
                                    <li role="separator" class="div"></li>
                                    <li style="cursor: pointer;"><a
                                            href="/projects/disc">@lang('navbar.whatWeDo.Disc')</a></li>
                                    <li role="separator" class="div"></li>
                                    <li><a href="/projects/study-zone">@lang('navbar.whatWeDo.study')</a></li>
                                    <li role="separator" class="div"></li>
                                    <li><a href="/projects/school-to-school">@lang('navbar.whatWeDo.school')</a></li>
                                    <li role="separator" class="div"></li>
                                    <li><a href="/projects/childrenuni">Children University</a></li>
                                    <li role="separator" class="div"></li>
                                    <li><a href="/projects/leap">LEAP</a></li>
                                    <li role="separator" class="div"></li>
                                    <li><h5 class="projects-title-separator">
                                            <b>@lang('navbar.whatWeDo.organizations')</b></h5></li>
                                    <li><a class="previewAll"
                                           href="/christianyouth">@lang('navbar.whatWeDo.youth')</a></li>
                                    <li role="separator" class="div"></li>
                                    <li><a class="previewAll"
                                           href="/projects/social-activities">@lang('navbar.whatWeDo.preview')</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    <li><h5 class="projects-title-separator"><b>@lang('navbar.whatWeDo.relief')</b></h5>
                                    </li>
                                    <li><a href="/projects/family-to-family">@lang('navbar.whatWeDo.family')</a></li>
                                    <li role="separator" class="div"></li>
                                    <li>
                                        <a href="/projects/relief/289-multi-purpose-cash-aid-for-families-affected-by-the-earthquake">Cash
                                            Aid / Earthquake</a></li>
                                    <li role="separator" class="div"></li>
                                    <li><a class="previewAll"
                                           href="/projects/relief">@lang('navbar.whatWeDo.preview')</a></li>
                                    <li role="separator" class="div"></li>
                                    <li><h5 class="projects-title-separator">
                                            <b>@lang('navbar.whatWeDo.rehabilitation')</b></h5></li>
                                    <li><a class="previewAll"
                                           href="/projects/rehabilitation">@lang('navbar.whatWeDo.preview')</a></li>
                                    <li role="separator" class="div"></li>
                                    <li><h5 class="projects-title-separator">
                                            <b>Earthquake Response</b></h5></li>

                                    <li><a class="previewAll"
                                           href="/projects/earthquake-response">@lang('navbar.whatWeDo.preview')</a>
                                    </li>
                                    <li role="separator" class="div"></li>

                                </ul>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown_small_screen ">
                    <a id="dropdown" href="#" class="nav-list-links dropdown-toggle" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">@lang('navbar.whatWeDo.title')<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu dropdown_menu_big multi-column columns-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown ">
                                    <li><h5 class="projects-title-separator"><b>@lang('navbar.whatWeDo.development')</b>
                                        </h5></li>
                                    <li><a href="/projects/micro-projects">@lang('navbar.whatWeDo.micro')</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/projects/disc">@lang('navbar.whatWeDo.Disc')</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/projects/study-zone">@lang('navbar.whatWeDo.study')</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/projects/school-to-school">@lang('navbar.whatWeDo.school')</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/projects/childrenuni">Children University</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/projects/leap">LEAP</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    <li><h5 class="projects-title-separator"><b>@lang('navbar.whatWeDo.relief')</b></h5>
                                    </li>
                                    <li><a href="/projects/family-to-family">@lang('navbar.whatWeDo.family')</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="/projects/relief/289-multi-purpose-cash-aid-for-families-affected-by-the-earthquake">Cash
                                            Aid / Earthquake</a></li>
                                    <li><a class="previewAll"
                                           href="/projects/relief">@lang('navbar.whatWeDo.preview')</a></li>
                                    <li><h5 class="projects-title-separator">
                                            <b>@lang('navbar.whatWeDo.rehabilitation')</b></h5></li>
                                    <li><a class="previewAll"
                                           href="/projects/rehabilitation">@lang('navbar.whatWeDo.preview')</a></li>
                                    <li>
                                        <h5 class="projects-title-separator">
                                            <li><h5 class="projects-title-separator">
                                                    <b>@lang('navbar.whatWeDo.organizations')</b></h5></li>
                                            <li><a class="previewAll"
                                                   href="/christianyouth">@lang('navbar.whatWeDo.youth')</a></li>
                                            <li><a class="previewAll"
                                                   href="/projects/social-activities">@lang('navbar.whatWeDo.preview')</a>
                                            </li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </li>
                <li role="separator" class="divider"></li>

                <li class="nav-item dropdown dropdown_big_screen">
                    <a id="dropdown" href="#" class="nav-list-links dropdown-toggle" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Publications</a>
                    <ul class="dropdown-menu dropdown_menu_big multi-column news" aria-labelledby="dropdown" style="left: 0vw !important;min-width: -webkit-fill-available;">
                        <ul class="multi-column-dropdown">
                            <li><a class="nav-list-links close-nav"
                                   href="/rootsofhope">Roots Of Hope</a></li>

                        </ul>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown_small_screen ">
                    <a id="dropdown" href="#" class="nav-list-links dropdown-toggle" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Publications<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu dropdown_menu_big multi-column columns-2">
                        <ul class="multi-column-dropdown ">
                            <li><a class="nav-list-links close-nav"
                                   href="rootsofhope">Roots Of Hope</a></li>
                            <li><a class="nav-list-links close-nav"
                                   href="/our-news">@lang('navbar.newsletter')</a></li>
                        </ul>
                    </ul>
                </li>
                <li role="separator" class="divider"></li>
                <li><a class="nav-list-links close-nav" id="contact-us">@lang('navbar.contactUs')</a></li>
                <li>
                    <form method="GET" action="{{route('search')}}">
                        <div class="input-group">
                            <input
                                type="text"
                                name="search"
                                value="{{ request()->get('search') }}"
                                class="form-control"
                                placeholder="search..."
                                aria-label="Search"
                                aria-describedby="button-addon2">
                            <button class="btn btn-success" type="submit" id="SearchBtn"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

@auth
<div class="fab-account" id="fabAccount">
    <div class="fab-account-panel">
        <div class="fab-account-head">
            <span class="fab-account-av">{{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}</span>
            <div>
                <div class="fab-account-name">{{ Auth::user()->name }}</div>
                <span class="fab-account-status">Logged in</span>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="hidden" name="redirect" value="{{ url()->current() }}">
            <button type="submit" class="fab-account-signout"><i class="fa fa-sign-out"></i> Sign out</button>
        </form>
    </div>
    <button type="button" class="fab-account-toggle" id="fabAccountToggle" aria-label="Account menu" aria-expanded="false">
        <span class="fab-account-toggle-letter">{{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}</span>
        <span class="fab-account-online"></span>
    </button>
</div>
<style>
    .fab-account { position: fixed; right: 22px; bottom: 22px; z-index: 1050; }
    .fab-account-toggle {
        position: relative;
        width: 44px; height: 44px;
        border: 2px solid #bc1818; border-radius: 50%; cursor: pointer;
        background: #ffffff;
        color: #bc1818; font-weight: 800; font-size: 1.35rem;
        display: flex; align-items: center; justify-content: center;
        box-shadow: none;
        transition: transform 0.16s ease;
    }
    .fab-account-toggle:hover,
    .fab-account-toggle:focus {
        background: #ffffff;
        color: #bc1818;
        box-shadow: none;
        outline: none;
    }
    .fab-account-toggle:hover { transform: scale(1.05); }
    .fab-account-online {
        display: none;
    }
    .fab-account-panel {
        position: absolute; right: 0; bottom: 66px;
        width: 250px; background: #ffffff;
        border: 1px solid #ededed; border-radius: 16px;
        box-shadow: 0 22px 50px -16px rgba(0, 0, 0, 0.28);
        padding: 1rem;
        opacity: 0; visibility: hidden;
        transform: translateY(12px) scale(0.97); transform-origin: bottom right;
        transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
    }
    .fab-account.open .fab-account-panel { opacity: 1; visibility: visible; transform: translateY(0) scale(1); }
    .fab-account-head { display: flex; align-items: center; gap: 0.7rem; margin-bottom: 0.85rem; }
    .fab-account-av {
        width: 44px; height: 44px; border-radius: 50%; flex-shrink: 0;
        background: #ffffff;
        border: 2px solid #bc1818;
        color: #bc1818; font-weight: 800; font-size: 1.35rem;
        display: flex; align-items: center; justify-content: center;
    }
    .fab-account-name { font-weight: 700; color: #1f1f1f; font-size: 0.95rem; line-height: 1.25; max-width: 165px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .fab-account-status { font-size: 0.76rem; color: #808285; font-weight: 600; display: inline-flex; align-items: center; gap: 0.32rem; }
    .fab-account-status::before { content: ''; width: 7px; height: 7px; border-radius: 50%; background: #808285; display: inline-block; }
    .fab-account-signout {
        width: 100%; border: none; border-radius: 11px;
        background: #bc1818; color: #ffffff; font-weight: 600; font-size: 0.88rem;
        padding: 0.62rem; cursor: pointer;
        display: flex; align-items: center; justify-content: center; gap: 0.45rem;
        transition: background 0.18s ease, color 0.18s ease;
    }
    .fab-account-signout:hover { background: #a71414; color: #ffffff; }
    @media (max-width: 575.98px) {
        .fab-account { right: 16px; bottom: 16px; }
        .fab-account-toggle { width: 42px; height: 42px; font-size: 1.3rem; }
    }
</style>
<script>
    (function () {
        var fab = document.getElementById('fabAccount');
        var toggle = document.getElementById('fabAccountToggle');
        if (!fab || !toggle) return;
        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = fab.classList.toggle('open');
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
        document.addEventListener('click', function (e) {
            if (!fab.contains(e.target)) { fab.classList.remove('open'); toggle.setAttribute('aria-expanded', 'false'); }
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { fab.classList.remove('open'); toggle.setAttribute('aria-expanded', 'false'); }
        });
    })();
</script>
@endauth

<link href="{{asset('css/main-new.css')}}" rel="stylesheet">
<link href="{{asset('css/navbar.css')}}" rel="stylesheet">

@push('navbar-whatwedo')
    <script type="text/javascript">
        if (window.innerWidth > 992) {
            $(".dropdown_big_screen").mouseover(function () {
                let el_link = this.querySelector('a[data-bs-toggle]');
                if (el_link != null) {
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                }
            });
            $(".dropdown_big_screen").mouseleave(function () {
                let el_link = this.querySelector('a[data-bs-toggle]');
                if (el_link != null) {
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                }
            });
        }
    </script>
@endpush
@push('navbar-contactUs')
    <script>
        $("#contact-us").click(function () {
            $('html, body').animate({
                scrollTop: $("#footer").offset().top
            }, 1000);
        });
    </script>
@endpush
@push('preloader')
    <script>
        $(window).on('load', function () {
            setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
        });

        function removeLoader() {
            $(".preloader").fadeOut(500, function () {
                // fadeOut complete. Remove the loading div
                $(".preloader").remove(); //makes page more lightweight
            });
            AOS.init({
                duration: 1200,
            })
        };
    </script>
@endpush
@push('fancyVideo')
    <script type="text/javascript">
        let thisHash = window.location.hash.substring(1);

        $(document).ready(function () {
            let video = document.getElementById(thisHash);
            if (video) {
                video.click();
            }
        });
    </script>
@endpush
<script>
    // $(document).ready(function () {
    //     $(".navbar").show(); //hide your div initially
    //     var topOfCategories = $("#categories-section").offset().top;
    //     var topOfOActivities = $("#initiatives-section").offset().top;
    //     $(window).scroll(function () {
    //         if ($(window).scrollTop() > topOfCategories && $(window).scrollTop() < topOfOActivities) { //scrolled past the other div?
    //             $(".navbar").hide(); //reached the desired point -- show div
    //         }
    //         else {
    //             $(".navbar").show();//else above the desired point -- hide div
    //         }
    //     });
    // });
</script>




{{--@push('navbar-scripts-trans')--}}
{{--// do your stuff--}}

{{--// Transition effect for navbar--}}
{{--// checks if window is scrolled more than 500px, adds/removes solid class--}}

{{--first = !first; // Invert `first`--}}
{{--@endpush--}}
<script>
    $(document).ready(function () {
        $('.columns-2 a').click(function () {
            $('#navbarsExample04').removeClass('show');
        });
        $('.close-nav').click(function () {
            $('#navbarsExample04').removeClass('show');
            $('.columns-2').removeClass('show');
        });
        // $(document).click(function (event) {
        //     let element = event.target.tagName;
        //     if(element !== 'A') {
        //         $('#navbarsExample04').removeClass('show');
        //         $('.columns-2').removeClass('show');
        //     }
        //     console.log(event.target.tagName)
        //     if (!event.target.closest(".navbar")) {
        //         $('#navbarsExample04').removeClass('show');
        //         $('.columns-2').removeClass('show');
        //
        //     }
        // });
    });
</script>
