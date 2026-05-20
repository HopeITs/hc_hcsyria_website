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
                            <li role="separator" class="div"></li>
                            <li><a class="nav-list-links close-nav"
                                   href="/our-news">@lang('navbar.newsletter')</a></li>

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
