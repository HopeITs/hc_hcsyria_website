<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | Translate Successes</title>
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
        <h2 class="title">Translate Success</h2>
        {!! Form::open(['route' => 'successes.french.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="form-group col-md-8 col-md-offset-2" style="margin-bottom: 10px;">
                {{Form::label('id', 'Success Id')}}
                {{Form::number('id', $successData->id, ['class' => 'form-control', 'readonly'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('title', 'Success Title')}}
                {{Form::text('', $successData->english->title, ['class' => 'form-control', 'readonly'])}}
                <br>
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Initiative Title', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('text', 'Success Text')}}
                {{Form::textarea('', $successData->english->text, ['class' => 'form-control', 'readonly'])}}
                <br>
                {{Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Success Text', 'required'])}}
            </div>
        </div>
        <button class="btn btn-default" onclick="event.preventDefault();window.history.back();"
                style="margin-top: 15px"><i class="fa fa-arrow-left"></i> back
        </button>
        {{Form::button('<i class="fa fa-external-link"></i> Translate', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-top: 15px;'])}}
        {!! Form::close() !!}
    </div>
</section>

@stack('navbar_scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
</body>
</html>
