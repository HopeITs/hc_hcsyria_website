<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>{{$profile->first_name}} {{$profile->last_name}}</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="{{asset('css/team.css')}}" rel="stylesheet">
    <link href="{{asset('css/footer.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

@stack('navbar_body')

<div id="projects">
    <div id="TeamMember" class="page_start">
        <div class="container-fluid">
            <div class="row">
                <div class="col d-flex justify-content-center pe-0">
                    <div class="single-member">
                        <div class="profile-container">
                            <img class="profile-img" src="{{$profile->image_path}}"
                                 alt="{{$profile->first_name}} {{$profile->last_name}}">
                            <div class="member-name">{{$profile->first_name}} {{$profile->last_name}}</div>
                            <div class="member-position">
                                @if(app()->isLocale('fr')) {!! $profile->position_french !!}
                                @else {!! $profile->position !!}
                                @endif
                            </div>
                            @if($profile->inactive == '0')
                                <div class="row d-flex justify-content-center">
                                    <div class="socials">
                                        <a href="mailto:{{$profile->email}}@hcsyria.org"> <i class="fa fa-envelope"></i></a>
                                        <a href="tel:{{$profile->phone}}"> <i class="fa fa-phone"></i></a>

                                        @if($profile->facebook_link != '0')
                                            <a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                               target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if($profile->linkedin_link != '0')
                                            <a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                               target="_blank"><i class="fa fa-linkedin"></i></a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if($profile->inactive != '0')
                                <div class="row d-flex justify-content-center">
                                    <div class="socials">
                                        <div class="member-position" style="color: red;">{{$profile->first_name}} has
                                            resigned
                                            at {{$profile->inactive}}
                                            {{--after giving an outstanding work that has enriched our--}}
                                            {{--center.--}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stack('navbar_scripts')

</body>
</html>
