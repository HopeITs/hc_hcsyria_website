<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | Add Initiative Images</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
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
        <h3 class="title">Add Before/After Image</h3>
        {!! Form::open(['route' => 'initiatives.images.rehabilitation.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::hidden('initiative_id', $initiative->id)}}
        {{Form::hidden('what_category_id', $initiative->whatCategory->id)}}
        <div class="row" id="images-group">
            <div class="form-group col-md-6">
                {{Form::label('title', 'Initiative Name')}}
                {{Form::text('title', $initiative->english->title, ['class' => 'form-control', 'required', 'readonly'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('category_name', 'Initiative Type')}}
                {{Form::text('category_name', $initiative->whatCategory->name, ['class' => 'form-control', 'readonly'])}}
            </div>
            <div class="image-group">
                <div class="form-group col-md-12" style="padding-top: 20px">
                    {{Form::label('before_image', 'Before Image')}}
                    {{Form::file('before_image', ['accept' => 'image/jpeg', 'required'])}}
                </div>
                <div class="form-group col-md-12">
                    {{Form::label('after_image', 'After Image')}}
                    {{Form::file('after_image', ['accept' => 'image/jpeg', 'required'])}}
                </div>
            </div>
        </div>
        <div class="buttons-div">
            <button class="btn btn-default" onclick="event.preventDefault();window.history.back();" style="margin-top: 15px"><i class="fa fa-arrow-left"></i> Back</button>
            {{--<button class="btn btn-success" onclick="event.preventDefault();window.location = '/admin/home';" style="margin-top: 15px; float: right"><i class="fa fa-arrow-right"></i> Finished</button>--}}
            <a href="{{route('initiatives.show', [$initiative->id])}}" class="btn btn-primary" style="margin-top: 15px"><i class="fa fa-eye"></i>&nbsp;View</a>
            {{Form::button('<i class="fa fa-external-link"></i> Upload', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-top: 15px;'])}}
        </div>
        {!! Form::close() !!}
    </div>
    @if(count($images))
        <hr>
        <div class="container">
            <h3 class="title" style="margin: 0">Uploaded Images</h3>
            {!! Form::open(['route' => ['initiatives.images.rehabilitation.destroy', $initiative->id], 'method' => 'delete', 'enctype' => 'multipart/form-data']) !!}
            <br><br>
            <div class="row">
                <div class="form-group col-md-12">
                    @foreach($images as $img)
                        <label style="margin-right: 30px">
                            <input type="checkbox" name="{{$img['id']}}" value="1"/>
                            <img src="{{$img['path_1']}}" style="height: 100px; margin: 0 5px 5px 0">
                            <img src="{{$img['path_2']}}" style="height: 100px; margin: 0 5px 5px 0">
                        </label>
                    @endforeach
                </div>
            </div>
            {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        </div>
    @endif
</section>

@stack('navbar_scripts')
