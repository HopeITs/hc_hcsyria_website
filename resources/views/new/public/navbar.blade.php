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
{{--                            <li role="separator" class="div"></li>--}}
                            {{--<li><a class="nav-list-links close-nav"--}}
                            {{--href="/our-news">@lang('navbar.newsletter')</a></li>--}}

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
            @auth
            <div class="dropdown auth-indicator ms-lg-3 mt-2 mt-lg-0">
                <button class="auth-chip" type="button" id="authChipToggle" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Account menu">
                    <span class="auth-avatar">{{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}</span>
                    <span class="auth-chip-text">
                        <span class="auth-chip-name">{{ Auth::user()->name }}</span>
                        <span class="auth-chip-status"><span class="auth-dot"></span> Logged in</span>
                    </span>
                    <i class="fa fa-angle-down auth-caret"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end auth-dropdown" aria-labelledby="authChipToggle">
                    <li class="auth-dropdown-header">
                        <span class="auth-avatar auth-avatar-lg">{{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}</span>
                        <span class="auth-dropdown-userinfo">
                            <span class="auth-dropdown-name">{{ Auth::user()->name }}</span>
                            <span class="auth-dropdown-sub"><i class="fa fa-check-circle"></i> Authorized to view</span>
                        </span>
                    </li>
                    <li><hr class="dropdown-divider my-2"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="auth-signout-form">
                            @csrf
                            @if(Route::currentRouteName() === 'new.public.micro_project_test')
                                <input type="hidden" name="redirect" value="{{ route('new.public.micro_project_test') }}">
                            @endif
                            <button type="submit" class="auth-signout-btn">
                                <i class="fa fa-sign-out me-2"></i> Sign out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            <style>
                .auth-indicator { position: relative; }
                .auth-chip {
                    display: inline-flex;
                    align-items: center;
                    gap: 0.55rem;
                    background: #ffffff;
                    border: 1px solid #ececec;
                    border-radius: 13px;
                    padding: 0.3rem 0.7rem 0.3rem 0.32rem;
                    cursor: pointer;
                    box-shadow: 0 1px 2px rgba(0,0,0,0.04);
                    transition: border-color 0.18s ease, box-shadow 0.18s ease;
                }
                .auth-chip:hover { border-color: #eccccc; box-shadow: 0 4px 12px -4px rgba(188,24,24,0.2); }
                .auth-chip:focus { outline: none; }
                .auth-avatar {
                    flex-shrink: 0;
                    width: 34px;
                    height: 34px;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 10px;
                    background: linear-gradient(145deg, #d62828 0%, #bc1818 100%);
                    color: #fff;
                    font-weight: 700;
                    font-size: 0.86rem;
                    line-height: 1;
                    box-shadow: 0 5px 12px -5px rgba(188,24,24,0.55);
                }
                .auth-chip-text { display: flex; flex-direction: column; line-height: 1.2; text-align: left; }
                .auth-chip-name { font-weight: 600; font-size: 0.83rem; color: #1f1f1f; max-width: 130px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
                .auth-chip-status { display: inline-flex; align-items: center; gap: 0.32rem; font-size: 0.67rem; color: #808285; font-weight: 500; }
                .auth-dot { width: 6px; height: 6px; border-radius: 50%; background: #bc1818; }
                .auth-caret { color: #b8b8b8; font-size: 0.85rem; transition: transform 0.18s ease; }
                .auth-chip[aria-expanded="true"] .auth-caret { transform: rotate(180deg); }
                .auth-dropdown {
                    border: 1px solid #ededed;
                    border-radius: 14px;
                    box-shadow: 0 14px 38px -10px rgba(0,0,0,0.18);
                    padding: 0.55rem;
                    min-width: 250px;
                    margin-top: 0.5rem;
                }
                .auth-dropdown-header { display: flex; align-items: center; gap: 0.7rem; padding: 0.5rem 0.55rem 0.35rem; }
                .auth-avatar-lg { width: 44px; height: 44px; font-size: 1.08rem; border-radius: 12px; }
                .auth-dropdown-userinfo { display: flex; flex-direction: column; line-height: 1.3; }
                .auth-dropdown-name { font-weight: 600; font-size: 0.93rem; color: #1f1f1f; }
                .auth-dropdown-sub { display: inline-flex; align-items: center; gap: 0.32rem; font-size: 0.73rem; color: #808285; font-weight: 500; }
                .auth-dropdown-sub i { color: #bc1818; font-size: 0.74rem; }
                .auth-signout-form { margin: 0; }
                .auth-signout-btn {
                    width: 100%;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    background: #fbeded;
                    color: #bc1818;
                    border: none;
                    border-radius: 10px;
                    padding: 0.6rem 1rem;
                    font-weight: 600;
                    font-size: 0.88rem;
                    transition: background 0.18s ease, color 0.18s ease;
                }
                .auth-signout-btn:hover { background: #bc1818; color: #ffffff; }
                .auth-signout-btn i { font-size: 0.82rem; }
            </style>
            @endauth
        </div>
    </div>
</nav>

<link href="{{asset('css/main-new.css')}}" rel="stylesheet">
<link href="{{asset('css/navbar.css')}}" rel="stylesheet">
{{--<link rel="stylesheet" src="../../node_modules/bootstrap/dist/css/bootstrap-grid.css">--}}
{{--<link rel="stylesheet" src="../../node_modules/bootstrap/dist/css/bootstrap-grid.css">--}}
{{--<link rel="stylesheet" src="../../node_modules/bootstrap/dist/css/bootstrap-utilities.css">--}}
{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
{{--<script src="/node_modules/bootstrap/dist/js/bootstrap.js"></script>--}}

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
{{--<script>--}}
{{--$(window).scroll(testScroll);--}}
{{--var viewed = false;--}}

{{--function isScrolledIntoView(elem) {--}}
{{--var docViewTop = $(window).scrollTop();--}}
{{--var docViewBottom = docViewTop + $(window).height();--}}

{{--var elemTop = $(elem).offset().top;--}}
{{--var elemBottom = elemTop + $(elem).height();--}}

{{--return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));--}}
{{--}--}}

{{--function testScroll() {--}}
{{--if (isScrolledIntoView($("#categories-section")) && !viewed) {--}}
{{--viewed = true;--}}
{{--// alert('hi');--}}
{{--document.querySelector('.navbar').style.display = 'none';--}}
{{--}--}}
{{--else if(!isScrolledIntoView($("#categories-section"))){--}}
{{--document.querySelector('.navbar').style.display = 'flex';--}}
{{--}--}}
{{--// else{--}}
{{--//     // viewed = false;--}}
{{--//     document.querySelector('.navbar').style.display = 'flex';--}}
{{--// }--}}
{{--}--}}
{{--</script>--}}
{{--@push('navbar-scripts-trans')--}}
{{--<script>--}}
{{--// do your stuff--}}
{{--$('#navigation').addClass('trans');--}}
{{--$('#language-in-bar').addClass('trans');--}}
{{--$('#nav-logo').addClass('brightness');--}}
{{--$('#language-in-bar .my-link').addClass('trans');--}}

{{--$(document).ready(function() {--}}
{{--// Transition effect for navbar--}}
{{--$(window).scroll(function () {--}}
{{--// checks if window is scrolled more than 500px, adds/removes solid class--}}
{{--if($(window).width() >= 700) {--}}
{{--if ($(this).scrollTop() > 400) {--}}
{{--$('#navigation').removeClass('trans');--}}
{{--$('#language-in-bar').removeClass('trans');--}}
{{--$('#nav-logo').removeClass('brightness');--}}
{{--$('#language-in-bar .my-link').removeClass('trans');--}}
{{--}--}}
{{--else {--}}
{{--$('#navigation').addClass('trans');--}}
{{--$('#language-in-bar').addClass('trans');--}}
{{--$('#nav-logo').addClass('brightness');--}}
{{--$('#language-in-bar .my-link').addClass('trans');--}}
{{--}--}}
{{--}--}}
{{--else{--}}
{{--if ($(this).scrollTop() > 1) {--}}
{{--$('#navigation').removeClass('trans');--}}
{{--$('#language-in-bar').removeClass('trans');--}}
{{--$('#nav-logo').removeClass('brightness');--}}
{{--$('#language-in-bar .my-link').removeClass('trans');--}}
{{--}--}}
{{--else {--}}
{{--$('#navigation').addClass('trans');--}}
{{--$('#language-in-bar').addClass('trans');--}}
{{--$('#nav-logo').addClass('brightness');--}}
{{--$('#language-in-bar .my-link').addClass('trans');--}}
{{--}--}}
{{--}--}}
{{--});--}}

{{--if ($(window).width() <= 1100) {--}}
{{--$('#my-navbar-toggle').bind('click', myHandlerFunction);--}}
{{--var first = true;--}}
{{--function myHandlerFunction(e) {--}}
{{--if(first){--}}
{{--// Code from the first handler here;--}}
{{--$('#navigation').removeClass('trans');--}}
{{--$('#language-in-bar').removeClass('trans');--}}
{{--$('#nav-logo').removeClass('brightness');--}}
{{--$('#language-in-bar .my-link').removeClass('trans');--}}
{{--}else{--}}
{{--// Code from the second handler here;--}}
{{--$('#navigation').addClass('trans');--}}
{{--$('#language-in-bar').addClass('trans');--}}
{{--$('#nav-logo').addClass('brightness');--}}
{{--$('#language-in-bar .my-link').addClass('trans');--}}
{{--}--}}
{{--first = !first; // Invert `first`--}}
{{--}--}}
{{--}--}}
{{--});--}}
{{--</script>--}}
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
