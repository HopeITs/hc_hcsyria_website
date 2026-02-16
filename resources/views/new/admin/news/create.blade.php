<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Admin | Create News</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/micro_page_new.css" rel="stylesheet">
    {{--<link href="{{asset('css/main-new.css')}}" rel="stylesheet">--}}
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>

    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{--@stack('navbar_styles')--}}
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

@stack('navbar_body')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-md-11 col-sm-11 col-11">
            <div id="projects">
                <div class="row">
                    <div class="col">
                        @include('new.admin.messages')
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="title">Create News</h3>
                        <form action="{{ route('news.store')}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Type <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        <input name="type" id="type_0" type="radio" class="btn-check" value="0">
                                        <label class="btn btn-outline-primary" for="type_0">Article</label>

                                        <input name="type" id="type_3" type="radio" class="btn-check" value="3">
                                        <label class="btn btn-outline-primary" for="type_3">Video</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>What-category <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        @foreach($what_categories as $category)
                                            <input type="radio" class="btn-check" value="{{$category->id}}"
                                                   name="what_category_id"
                                                   id="what_category_{{$category->id}}"
                                                   autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                   for="what_category_{{$category->id}}">{{$category->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Who-category <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        @foreach($who_categories as $category)
                                            <input type="radio" class="btn-check" value="{{$category->id}}"
                                                   name="who_category_id"
                                                   id="who_category_{{$category->id}}"
                                                   autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                   for="who_category_{{$category->id}}">{{$category->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Place <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        @foreach($places as $place)
                                            <input type="radio" class="btn-check" value="{{$place->id}}" name="place_id"
                                                   id="place_{{$place->id}}"
                                                   autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                   for="place_{{$place->id}}">{{$place->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12" id="edition_group">
                                    <label for="edition">Choose edition: <span class="red-color">*</span></label>
                                    <select class="form-select" id="edition" placeholder="Choose edition..."
                                            name="edition_id">
                                        <option value="">Choose edition...</option>
                                        @foreach($editions as $edition)
                                            <option value="{{ $edition->id }}">
                                                {{ $edition->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label for="rank">Rank <span class="red-color">*</span></label>
                                    <select class="form-select" id="rank" placeholder="Choose Rank..." name="rank">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('title', 'Title')}} <span class="red-color">*</span>
                                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('description', 'Description')}} <span><small> (maximum:900 characters with spaces OR leave the box empty to let it automatically!)</small></span>
                                    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('content', 'Content')}} <span class="red-color">*</span>
                                    {{Form::textarea('content', '', ['class' => 'form-control', 'id' => 'editor', 'placeholder' => 'Content'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('video', 'Video Link')}}
                                    {{Form::text('video', '', ['class' => 'form-control', 'placeholder' => 'Video Link'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="upload_file">Upload File</label>
                                    <input class="form-control" type="file" name="file" id="upload_file">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end" style="margin-top: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" class="btn btn-info" style="margin-left: 15px;"><i
                                            class="fa fa-external-link"></i> Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stack('navbar_scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
<script type="text/javascript" src="/js/selectize.min.js"></script>

</body>
</html>
