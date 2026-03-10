<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>{{$profile->first_name}} {{$profile->last_name}}</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/profile.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>

    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>

    </style>
</head>
<body>

@stack('navbar_body')

<section id="our_team" class="page-start">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <button class="btn btn-default" onclick="window.history.back();"
                        style="display: inherit;margin: -50px 0 30px 0;">
                    <i class="fa fa-arrow-left"></i> back
                </button>
                <div style="float: right;margin-top: -60px">
                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'French Editor'))
                        <a href="{{route('team.edit', $profile->id)}}" class="btn btn-primary edit-btn"><span
                                class="fa fa-edit"></span>&nbsp;Edit</a>
                    @endif
                </div>
                <div class="container profile-card">
                    <div>
                        <img src="{{$profile->image_path}}" style="width: 271px;">
                    </div>
                    <div style="width: 100%">
                        <h2 style="font-size: 30px; margin-bottom: 0;">{{$profile->first_name}} {{$profile->last_name}}</h2>
                        <h6 style="margin-top: 6px;">{!! $profile->position !!}</h6>
                        <p></p>
                        @if($profile->inactive == '0')
                            <table style="margin-top: 25px">
                                @if($profile->facebook_link != '0')
                                    <tr>
                                        <td class="text-center"><i class="fa fa-facebook"></i></td>
                                        <td><a href="https://www.facebook.com/{{$profile->facebook_link}}"
                                               target="_blank">facebook.com/{{$profile->facebook_link}}</a></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="text-center"><i class="fa fa-envelope"></i></td>
                                    <td><a href="mailto:{{$profile->email}}@hcsyria.org">{{$profile->email}}
                                            @hcsyria.org</a>
                                    </td>
                                </tr>
                                @if($profile->linkedin_link != '0')
                                    <tr>
                                        <td class="text-center"><i class="fa fa-linkedin"></i></td>
                                        <td><a href="https://www.linkedin.com/{{$profile->linkedin_link}}"
                                               target="_blank">{{$profile->linkedin_link}}</a></td>
                                    </tr>
                                @endif
                                @if($profile->phone != '0')
                                    <tr>
                                        <td class="text-center"><i class="fa fa-phone"></i></td>
                                        <td><a href="tel:{{$profile->phone}}">{{$profile->phone}}</a></td>
                                    </tr>
                                @endif
                            </table>
                        @endif
                        @if($profile->inactive != '0')
                            <p style="color: red; padding-top: 10px">{{$profile->first_name}} has resigned
                                at {{$profile->inactive}} after giving an outstanding work that has enriched our center.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stack('navbar_scripts')

</body>
</html>
