<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | Translate Testimony</title>
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
        <h3 class="title">Translate Testimony</h3>
        {!! Form::open(['route' => 'initiatives.testimonies.french.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-4 col-md-offset-2" style="margin-bottom: 10px;">
                {{Form::label('id', 'Testimony Id')}}
                {{Form::number('id', $testimony->id, ['class' => 'form-control', 'readonly'])}}
            </div>
            <div class="form-group col-md-4">
                {{Form::label('type', 'Initiative Title')}}
                {{Form::text('type', $testimony->initiativeEnglish->title, ['class' => 'form-control', 'readonly'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('name', 'Testimoniar name')}}
                {{Form::text('', $testimony->english->name, ['class' => 'form-control', 'readonly'])}}
                <br>
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Testimoniar name', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('text', 'Testimony text')}}
                {{Form::textarea('', $testimony->english->text, ['class' => 'form-control', 'readonly'])}}
                <br>
                {{Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Testimony text', 'required'])}}
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

</body>
</html>
