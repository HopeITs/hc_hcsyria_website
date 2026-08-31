<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="author" content="judy dadaghlian">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>{{$success->$language->title}}</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/initiatives.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .success-text {
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<section id="initiatives" class="page-start">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <button class="btn btn-default" onclick="window.history.back();"
                        style="display: inherit;margin: -50px 0 30px 0;"><i class="fa fa-arrow-left"></i> back
                </button>
                <div style="float: right;margin-top: -60px">
                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'French Editor'))
                        @if($language == 'english')
                            <a href="{{route('successes.edit', $success->id)}}" class="btn btn-primary edit-btn"><span
                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                        @elseif($language == 'french')
                            <a href="{{route('successes.french.edit', $success->id)}}" class="btn btn-primary edit-btn"><span
                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                        @endif
                    @endif
                        @if(($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
                            && $success->online == '0'
                            && $success->english_check == '1' )
                        {!! Form::open(['route' => 'successes.online', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'style' => 'float:right;margin-left:5px;']) !!}
                        {{Form::hidden('id', $success->id)}}
                        {{Form::button('<i class="fa fa-upload"></i> Publish', ['type' => 'submit', 'class' => 'btn btn-success'])}}
                        {!! Form::close() !!}
                    @endif
                </div>
                <div class="initiative-testimonies">
                    <div class="item">
                        <div class="single-testimony">
                            <div class="media">
                                <img class="pull-left" src="{{$success->image_path}}" alt="" width="170px">
                                <div class="media-body">
                                    <div class="testimony-texts">
                                        <p>{{$success->$language->title}}</p>
                                        <P class="success-text">{!! $success->$language->text !!}</P>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stack('navbar_scripts')

</body>
</html>
