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
        <h2 class="title">Add Before/After Image</h2>
        <form action="{{ route('initiatives.images.rehabilitation.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="initiative_id" value="{{ $initiative->id }}">
            <input type="hidden" name="what_category_id" value="{{ $initiative->whatCategory->id }}">

            <div class="row" id="images-group">
                <!-- Initiative Name -->
                <div class="form-group col-md-6">
                    <label for="title">Initiative Name</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $initiative->english->title }}" required readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="category_name">Initiative Type</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $initiative->whatCategory->name }}" readonly>
                </div>

                <div class="image-group col-md-12" style="padding-top: 20px">
                    <div class="form-group">
                        <label for="before_image">Before Image</label>
                        <input type="file" name="before_image" id="before_image" accept="image/jpeg" required>
                    </div>
                    <div class="form-group">
                        <label for="after_image">After Image</label>
                        <input type="file" name="after_image" id="after_image" accept="image/jpeg" required>
                    </div>
                </div>
            </div>

            <div class="buttons-div" style="margin-top: 15px;">
                <button class="btn btn-default" onclick="event.preventDefault();window.history.back();">
                    <i class="fa fa-arrow-left"></i> Back
                </button>
                <a href="{{ route('initiatives.show', [$initiative->id]) }}" class="btn btn-primary" style="margin-left: 10px;">
                    <i class="fa fa-eye"></i> View
                </a>
                <button type="submit" class="btn btn-success" style="margin-left: 10px;">
                    <i class="fa fa-external-link"></i> Upload
                </button>
            </div>
        </form>
    </div>
    @if(count($images))
        <hr>
        <div class="container">
            <h2 class="title" style="margin: 0">Uploaded Images</h2>
            <form action="{{ route('initiatives.images.rehabilitation.destroy', $initiative->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')

                <br><br>
                <div class="row">
                    <div class="form-group col-md-12">
                        @foreach($images as $img)
                            <label style="margin-right: 30px; display: inline-block;">
                                <input type="checkbox" name="images[{{ $img['id'] }}]" value="1">
                                <img src="{{ $img['path_1'] }}" style="height: 100px; margin: 0 5px 5px 0;">
                                <img src="{{ $img['path_2'] }}" style="height: 100px; margin: 0 5px 5px 0;">
                            </label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash-o"></i> Delete
                </button>
            </form>
        </div>
    @endif
</section>

@stack('navbar_scripts')
