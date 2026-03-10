<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | Translate News</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

@stack('navbar_body')

<section style="padding-top: 30px;">
    <div class="container">
        @include('admin.messages')
    </div>
    <div class="container">
        <h3 class="title">Translate News</h3>
        {!! Form::open(['route' => 'news.french.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="form-group col-md-8 col-md-offset-2" style="margin-bottom: 10px;">
                    {{Form::label('id', 'News Id')}}
                    {{Form::number('id', $newsData->id, ['class' => 'form-control', 'readonly'])}}
                </div>
                <div class="form-group col-md-8 col-md-offset-2">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('', $newsData->english->title, ['class' => 'form-control', 'readonly'])}}
                    <br>
                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
                </div>
                <div class="form-group col-md-8 col-md-offset-2">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('', $newsData->english->description, ['class' => 'form-control', 'readonly'])}}
                    <br>
                    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description', 'required'])}}
                </div>
                <div class="form-group col-md-8 col-md-offset-2">
                    {{Form::label('content', 'Content')}}
                    <div class="readonly-div">{!!$newsData->english->content!!}</div>
                    <br>
                    {{Form::textarea('content', '', ['class' => 'hidden', 'id' => 'editor', 'placeholder' => 'Content'])}}
                </div>
            </div>
            <button class="btn btn-default" onclick="event.preventDefault();window.history.back();"
                    style="margin-top: 15px"><i class="fa fa-arrow-left"></i> back
            </button>
        {{ Form::button('<i class="fa fa-external-link"></i> Translate', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-top: 15px;']) }}
        {!! Form::close() !!}
    </div>
</section>

@stack('navbar_scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
</body>
</html>
