<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | Edit French Initiative</title>
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
        <h3 class="title">Translate Initiative</h3>
        {!! Form::open(['route' => ['initiatives.french.update', $initiative->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-4 col-md-offset-2" style="margin-bottom: 10px;">
                {{Form::label('id', 'Initiative Id')}}
                {{Form::number('id', $initiative->id, ['class' => 'form-control', 'readonly'])}}
            </div>
            <div class="form-group col-md-4">
                {{Form::label('type', 'Initiative Type')}}
                {{Form::text('type', $initiative->whatCategory->name, ['class' => 'form-control', 'readonly'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('title', 'Initiative Title')}}
                {{Form::text('', $initiative->english->title, ['class' => 'form-control', 'readonly'])}}
                <br>
                {{Form::text('title', $initiative->french->title, ['class' => 'form-control', 'placeholder' => 'Initiative Title', 'required'])}}
            </div>
            @if($initiative->english->organization != '0')
                <div class="form-group col-md-8 col-md-offset-2">
                    {{Form::label('organization', 'Organization')}}
                    {{Form::text('', $initiative->english->organization, ['class' => 'form-control', 'readonly'])}}
                    <br>
                    {{Form::text('organization', $initiative->french->organization, ['class' => 'form-control', 'placeholder' => 'Organization', 'required'])}}
                </div>
            @endif
            @if($initiative->english->date_string != '0')
                <div class="form-group col-md-8 col-md-offset-2">
                    {{Form::label('date_string', 'Date')}}
                    {{Form::text('', $initiative->english->date_string, ['class' => 'form-control', 'readonly'])}}
                    <br>
                    {{Form::text('date_string', $initiative->french->date_string, ['class' => 'form-control', 'placeholder' => 'Date'])}}
                </div>
            @endif
            @if($initiative->english->description != '0')
                <div class="form-group col-md-8 col-md-offset-2">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('', $initiative->english->description, ['class' => 'form-control', 'readonly', 'rows' => '2' ])}}
                    <br>
                    {{Form::textarea('description', $initiative->french->description, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => '2', 'required'])}}
                </div>
            @endif
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('content', 'Content')}}
                <div class="readonly-div">{!!$initiative->english->content!!}</div>
                <br>
                {{Form::textarea('content', $initiative->french->content, ['class' => 'hidden', 'id' => 'editor', 'placeholder' => 'Content'])}}
            </div>
        </div>
        <button class="btn btn-default" onclick="event.preventDefault();window.history.back();"
                style="margin-top: 15px"><i class="fa fa-arrow-left"></i> back
        </button>
        {{Form::button('<i class="fa fa-refresh"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-top: 15px;'])}}
        {!! Form::close() !!}
    </div>
</section>

@stack('navbar_scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
</body>
</html>
