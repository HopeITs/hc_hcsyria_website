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

    {{--<link href='https://fonts.googleapis.com/css?family=Noto Serif' rel='stylesheet'>--}}
    {{--<link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>--}}
    <link href='https://fonts.googleapis.com/css?family=Caudex' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>

    <script src="/js/html5shiv.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>

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

</head>

<body>
@include('new.public.components.analytics-body')
<div class="preloader">
    <div class="preloader-gif"></div>
</div>
@include('new.public.navbar')

<div id="Newsletter" class="page_start">
    <div class="page-margin">
        <div class="container-fluid">
            <div class="row d-flex ">
                <div class="col d-flex justify-content-end flex-column pe-0">
                    <div class="first-column">
                        {{--<div style="height: 2.5vw"></div>--}}
                    </div>
                    <div class="content">
                        <div class="main_title" data-aos="fade-up" data-aos-duration="600">Published by<br>
                            <div style="font-weight: 900">Christian Hope
                                Center
                            </div>
                        </div>
                        {{--<div class="main_subtitle" data-aos="fade-up" data-aos-duration="1000">Aleppo - Syria</div>--}}
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-end ps-0">
                </div>
            </div>
        </div>
    </div>
    <div class="outer-container">
        <div class="inner-container">
            <div id="news_title" class="captial">@lang('main.news_title')<span>{{$selectedEdition->name}}</span></div>
            <div id="donor-filter">
                <div class="row d-flex justify-content-end">
                    <div class="col-auto">
                        <div class="dropdown">
                            {{--<button class="btn dropdown-toggle btn-default" type="button" id="dropdownMenuCategory"--}}
                            {{--data-bs-toggle="dropdown"--}}
                            {{--aria-expanded="false">{{$selectedType}}--}}
                            {{--</button>--}}
                            {{--<a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">{{$selectedType}}</a>--}}
                            <a class="btn dropdown-toggle btn-default" data-bs-toggle="dropdown">Filter By</a>
                            <ul id="menu" class="dropdown-menu dropdown-menu-right">
                                <li class="edition"><a class="dropdown-item"><i class="fa fa-caret-left"></i>
                                        Edition</a>
                                    <ul class="submenu submenu-left dropdown-menu">
                                        @foreach($editions as $edition)
                                            <li id="editions_{{$edition->id}}"><a
                                                        href="/newsletter/{{$edition->id}}/1">{{$edition->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="who"><a class="dropdown-item"><i class="fa fa-caret-left"></i> Category</a>
                                    <ul class="submenu submenu-left dropdown-menu">
                                        @foreach($whoCategories as $who)
                                            <li class="text-capitalize" id="who_{{$who->id}}"><a
                                                        href="/newsletter/{{$who->id}}/2">{{$who->name}}</a>
                                            </li>
                                        @endforeach
                                        @foreach($whatCategories as $what)
                                            <li id="what_{{$what->id}}"><a
                                                        href="/newsletter/{{$what->id}}/3">{{$what->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                {{--<li class="what"><a class="dropdown-item"><i class="fa fa-caret-left"></i> Various</a>--}}
                                {{--<ul class="submenu submenu-left dropdown-menu">--}}
                                {{--@foreach($whatCategories as $what)--}}
                                {{--<li id="what_{{$what->id}}"><a--}}
                                {{--href="/newsletter/{{$what->id}}/3">{{$what->name}}</a>--}}
                                {{--</li>--}}
                                {{--@endforeach--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                            </ul>
                            {{--<ul id="menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton2">--}}
                            {{--<li >--}}
                            {{--<a>Edition</a>--}}
                            {{--</li>--}}
                            {{--<li >--}}
                            {{--<a>Who we serve</a>--}}
                            {{--</li>--}}
                            {{--<li >--}}
                            {{--<a>Various</a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                    {{--<div class="col-auto">--}}
                    {{--<div class="dropdown other">--}}
                    {{--<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuSubCategory"--}}
                    {{--data-toggle="dropdown"--}}
                    {{--aria-expanded="false">{{$selectedEdition->name}}--}}
                    {{--<span class="caret"></span>--}}
                    {{--</button>--}}
                    {{--<ul id="subcategory" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">--}}
                    {{--@foreach($editions as $edition)--}}
                    {{--<li id="editions_{{$edition->id}}"><a--}}
                    {{--href="/newsletter/{{$edition->id}}/1">{{$edition->name}}</a></li>--}}
                    {{--@endforeach--}}
                    {{--@foreach($whoCategories as $who)--}}
                    {{--<li class="text-capitalize" id="who_{{$who->id}}"><a--}}
                    {{--href="/newsletter/{{$who->id}}/2">{{$who->name}}</a>--}}
                    {{--</li>--}}
                    {{--@endforeach--}}
                    {{--@foreach($whatCategories as $what)--}}
                    {{--<li id="what_{{$what->id}}"><a--}}
                    {{--href="/newsletter/{{$what->id}}/3">{{$what->name}}</a>--}}
                    {{--</li>--}}
                    {{--@endforeach--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
            @if(count($news))
                @if($agent -> isPhone())
                    @foreach($news as $SingleNews)
                        <div class="row news_ticket">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn ">
                                @if($SingleNews->type != '3')
                                    <img class="news_img" src="{{$SingleNews->firstImage->path}}" alt="newsletter">
                                @else
                                    <div class="video">
                                        <iframe class="news_img" src="{{$SingleNews->video}}" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    </div>
                                @endif
                            </div>
                            @if($SingleNews->type != '3')
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn">
                                    <div class="news_data_column left">
                                        <div class="news_title">{{$SingleNews->$language->title}}</div>
                                        <div class="text-column">
                                            {!!implode(' ', array_slice(explode(' ', strip_tags($SingleNews->$language->description)), 0, 55)).'...'!!}
                                        </div>
                                        @if($SingleNews->video != 0)
                                            <a href="{{$SingleNews->video}}" class="launch-modal"
                                               id="newsletterVideo-{{ $SingleNews->id}}"
                                               data-fancybox="newsletterVideo-{{ $SingleNews->id}}">
                                                <img class="video-icon"
                                                     src="/images/ico/video-ini-icon.svg">
                                            </a>
                                        @endif
                                        <a href="{{ route('new.public.article',
                                    [str_slug(strtolower($selectedEdition->name)),
                                    $SingleNews->id,
                                    str_slug(strtolower($SingleNews->english->title))]   ) }}"
                                           class="readmore-btn left">@lang('main.readMore')
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if($SingleNews->type == '3')
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn d-flex align-items-center">
                                    <div class="news_data_column left">
                                        <div class="news_title">{{$SingleNews->$language->title}}</div>
                                        <div class="text-column">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    @php
                        $numOfNews = 0;
                    @endphp
                    @foreach($news as $SingleNews)
                        @if($numOfNews %2 ==0)
                            <div class="row news_ticket">
                                @if($SingleNews->type != '3')
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn">
                                        <div class="news_data_column left">
                                            <div class="news_title">{{$SingleNews->$language->title}}
                                                @if($SingleNews->video != 0)
                                                    <a href="{{$SingleNews->video}}" class="launch-modal"
                                                       id="newsletterVideo-{{ $SingleNews->id}}"
                                                       data-fancybox="newsletterVideo-{{ $SingleNews->id}}">
                                                        <img class="video-icon"
                                                             src="/images/ico/video-ini-icon.svg">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="text-column">
                                                {!!implode(' ', array_slice(explode(' ', strip_tags($SingleNews->$language->description)), 0, 55)).'...'!!}

                                                <a href="{{ route('new.public.article',
                                    [str_slug(strtolower($selectedEdition->name)),
                                    $SingleNews->id,
                                    str_slug(strtolower($SingleNews->english->title))]   ) }}"
                                                   class="readmore-btn left">@lang('main.readMore')
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($SingleNews->type == '3')
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn d-flex align-items-center">
                                        <div class="news_data_column left">
                                            <div class="news_title">{{$SingleNews->$language->title}}</div>
                                            <div class="text-column" style="column-count: 1">
                                                {{$SingleNews->$language->description}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn ">
                                    @if($SingleNews->type != '3')
                                        <img class="news_img" src="{{$SingleNews->firstImage->path}}" alt="newsletter">
                                    @else
                                        <div class="video">
                                            <iframe class="news_img" src="{{$SingleNews->video}}" frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="row news_ticket">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn ">
                                    @if($SingleNews->type != '3')
                                        <img class="news_img" src="{{$SingleNews->firstImage->path}}" alt="newsletter">
                                    @else
                                        <div class="video">
                                            <iframe class="news_img" src="{{$SingleNews->video}}" frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    @endif
                                </div>
                                @if($SingleNews->type != '3')
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn">
                                        <div class="news_data_column right">

                                            <div class="news_title">{{$SingleNews->$language->title}}</div>
                                            <div class="text-column">
                                                @if($SingleNews->video != 0)
                                                    <a href="{{$SingleNews->video}}" class="launch-modal"
                                                       id="newsletterVideo-{{ $SingleNews->id}}"
                                                       data-fancybox="newsletterVideo-{{ $SingleNews->id}}">
                                                        <img class="video-icon"
                                                             src="/images/ico/video-ini-icon.svg">
                                                    </a>
                                                @endif
                                                {!!implode(' ', array_slice(explode(' ', strip_tags($SingleNews->$language->description)), 0, 55)).'...'!!}
                                                <a href="{{ route('new.public.article',
                                [str_slug(strtolower($selectedEdition->name)),
                                $SingleNews->id,
                                str_slug(strtolower($SingleNews->english->title))]) }}"
                                                   class="readmore-btn ">@lang('main.readMore')
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($SingleNews->type == '3')
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 news_colomn d-flex align-items-center">
                                        <div class="news_data_column right">
                                            <div class="news_title">{{$SingleNews->$language->title}}</div>
                                            <div class="text-column">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        @php $numOfNews++; @endphp
                    @endforeach
                @endif
            @endif
        </div>
    </div>
    <div class="small horizontal-line" data-aos="fade-up" data-aos-duration="800"></div>
    <div class="subscribe-section">
        <div class="container-fluid" data-aos="fade-up" data-aos-duration="800">
            <div class="row" data-aos="fade-up" data-aos-duration="600">
                <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                    <div class="section-title">Join Our NewsLetter</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" data-aos="fade-up" data-aos-duration="800">
        <div class="letter page-margin">
            <div class="row d-flex justify-content-center">
                <div class="subscribe-container">
                    <div class="row d-flex justify-content-center">
                        <img src="/images/ico/letter.svg">
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="text-capitalize subscribe-title">subscribe our newsletter to receive the latest news.</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {!! csrf_field() !!}
                            <form class="subscription" name="subsribeForm" id="subsribeForm" action="" method="get">
                                <input class="add-email" id="email" name="email" placeholder="Enter your Email Address"
                                       type="email">
                                <label id="subscribe-error" class="subscribe-error">Email has already subscribed! </label>
                                <button class="submit-email" type="submit" name="submit">
                                    <span id="before-submit" class="before-submit">Subscribe</span>
                                    <span id="after-submit" class="after-submit">Subscribed!</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-line last"></div>
</div>

@include('new.public.footer')

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
{{--<script>--}}
{{--$(document).ready(function () {--}}
{{--let edition = document.getElementById('edition');--}}
{{--let who = document.getElementById('who');--}}
{{--let what = document.getElementById('what');--}}


{{--edition.addEventListener('click', function () {--}}
{{--document.querySelector('#dropdownMenuSubCategory').innerHTML = '8th-edition';--}}
{{--document.querySelector('#dropdownMenuCategory').innerHTML = 'Edition';--}}
{{--@foreach($whoCategories as $category)--}}
{{--document.getElementById("who_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--@foreach($whatCategories as $category)--}}
{{--document.getElementById("what_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--@foreach($editions as $category)--}}
{{--document.getElementById("editions_{{$category->id}}").style.display = 'block';--}}
{{--@endforeach--}}
{{--});--}}

{{--who.addEventListener('click', function () {--}}
{{--document.querySelector('#dropdownMenuSubCategory').innerHTML = 'Men';--}}
{{--document.querySelector('#dropdownMenuCategory').innerHTML = 'Who we serve';--}}
{{--@foreach($whoCategories as $category)--}}
{{--document.getElementById("who_{{$category->id}}").style.display = 'block';--}}
{{--@endforeach--}}
{{--@foreach($editions as $category)--}}
{{--document.getElementById("editions_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--@foreach($whatCategories as $category)--}}
{{--document.getElementById("what_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--});--}}

{{--what.addEventListener('click', function () {--}}
{{--document.querySelector('#dropdownMenuSubCategory').innerHTML = 'Hope from Syria';--}}
{{--document.querySelector('#dropdownMenuCategory').innerHTML = 'Miscellaneous';--}}
{{--@foreach($editions as $category)--}}
{{--document.getElementById("editions_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--@foreach($whoCategories as $category)--}}
{{--document.getElementById("who_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--@foreach($whatCategories as $category)--}}
{{--document.getElementById("what_{{$category->id}}").style.display = 'block';--}}
{{--@endforeach--}}
{{--});--}}
{{--});--}}
{{--</script>--}}
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
{{--<script>--}}
{{--$(document).ready(function () {--}}
{{--let url = window.location.href;--}}
{{--const type = url.substr(url.lastIndexOf('/') + 1);--}}
{{--if (type == 1) {--}}
{{--@foreach($whoCategories as $category)--}}
{{--document.getElementById("who_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--@foreach($whatCategories as $category)--}}
{{--document.getElementById("what_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--@foreach($editions as $category)--}}
{{--document.getElementById("editions_{{$category->id}}").style.display = 'block';--}}
{{--@endforeach--}}
{{--}--}}
{{--else if (type == 2) {--}}
{{--@foreach($whoCategories as $category)--}}
{{--document.getElementById("who_{{$category->id}}").style.display = 'block';--}}
{{--@endforeach--}}
{{--@foreach($editions as $category)--}}
{{--document.getElementById("editions_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--@foreach($whatCategories as $category)--}}
{{--document.getElementById("what_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--}--}}
{{--else if (type == 3) {--}}
{{--@foreach($editions as $category)--}}
{{--document.getElementById("editions_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--@foreach($whoCategories as $category)--}}
{{--document.getElementById("who_{{$category->id}}").style.display = 'none';--}}
{{--@endforeach--}}
{{--@foreach($whatCategories as $category)--}}
{{--document.getElementById("what_{{$category->id}}").style.display = 'block';--}}
{{--@endforeach--}}
{{--}--}}
{{--});--}}
{{--</script>--}}
<script>
    $(document).ready(function () {
        let all_news = <?php echo json_encode($news); ?> ;

        $('.modal-trigger').click(function () {
            let id = this.dataset.content;


            let news = $.grep(all_news, function (e) {
                return e.id == id;
            });

            $('#success-img').attr('href', '{{$news[0]->images[0]->path}}');
            $('#success-img img').attr('src', '{{$news[0]->images[0]->path}}');
            $('#title').text(news[0]['{{$language}}'].title);
            $('#story').text(news[0]['{{$language}}'].content);
            if (news[0].video !== '0') {
                $('#video-div .video iframe').attr('src', news[0].video);
                $('#video-div').show();
            } else {
                $('#video-div').hide();
            }
            let link = '';
            // if (news[0].what_category_id === 10) {
            //     link = '/projects/micro-projects/all?project=' + news[0].project_id;
            // } else {
            //     link = '/projects/' + news[0]['what_category']['name'].toLowerCase().replace(/ /g, '-');
            // }
            {{--$('#what-project').text(news[0]['what_category']['{{$whoCatName}}']);--}}
            // $('#more-link').attr('href', link);
            $('.modal').modal('show');
        });
    });
</script>

@stack('fancyVideo')
@stack('navbar-contactUs')
@stack('navbar-whatwedo')
@stack('preloader')
<script>
    AOS.init();
</script>
<script type="text/javascript">
    //	window.addEventListener("resize", function() {
    //		"use strict"; window.location.reload();
    //	});


    document.addEventListener("DOMContentLoaded", function () {


        /////// Prevent closing from click inside dropdown
        document.querySelectorAll('.dropdown-menu').forEach(function (element) {
            element.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        })


        // make it as accordion for smaller screens
        // if (window.innerWidth < 575) {
        //
        //     // close all inner dropdowns when parent is closed
        //     document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
        //         everydropdown.addEventListener('hidden.bs.dropdown', function () {
        //             // after dropdown is hidden, then find all submenus
        //             this.querySelectorAll('.submenu').forEach(function(everysubmenu){
        //                 // hide every submenu as well
        //                 everysubmenu.style.display = 'none';
        //             });
        //         })
        //     });
        //
        //     document.querySelectorAll('.dropdown-menu a').forEach(function(element){
        //         element.addEventListener('click', function (e) {
        //
        //             let nextEl = this.nextElementSibling;
        //             if(nextEl && nextEl.classList.contains('submenu')) {
        //                 // prevent opening link if link needs to open dropdown
        //                 e.preventDefault();
        //                 console.log(nextEl);
        //                 if(nextEl.style.display == 'block'){
        //                     nextEl.style.display = 'none';
        //                 } else {
        //                     nextEl.style.display = 'block';
        //                 }
        //             }
        //         });
        //     })
        // }
        // end if innerWidth

    });
    // DOMContentLoaded  end
</script>
</body>
</html>
