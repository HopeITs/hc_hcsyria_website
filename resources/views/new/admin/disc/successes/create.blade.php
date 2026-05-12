<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Admin | Create Success</title>
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
                        <h3 class="title">Create Success</h3>
                        <form action="{{ route('disc.successes.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Place <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100 flex-wrap" role="group">
                                        @foreach($places as $place)
                                            <input type="radio" name="place_id" class="btn-check"
                                                   id="{{$place->id}}" value="{{$place->id}}">
                                            <label for="{{$place->id}}"
                                                   class="btn btn-outline-primary">{{$place->name}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="title">Title</label> <span class="red-color">*</span>
                                    <input type="text" id="title" name="title" class="form-control"
                                           placeholder="Success Title" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="text">Text</label> <span class="red-color">*</span>
                                    <textarea id="text" name="text" class="form-control" placeholder="Text" rows="4" required></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label for="image_path">Image</label> <span class="red-color">*</span>
                                    <br>
                                    <i style="color: #777;">(Choosing an image will erase the current one)</i>
                                    <input type="file" id="image_path" name="image_path" class="form-control" accept="image/jpeg" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label>Serve Category <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100 flex-wrap">
                                        @foreach($who_categories as $category)
                                            <input type="radio" name="who_category_id" class="btn-check"
                                                   id="who_{{$category->id}}"
                                                   value="{{$category->id}}">
                                            <label for="who_{{$category->id}}" class="btn btn-outline-primary">{{ucfirst($category->name)}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end" style="margin-top: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i
                                            class="fa fa-arrow-left"></i> Back
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

<script type="text/javascript" src="/js/selectize.min.js"></script>
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('#link-microproject').selectize();--}}
    {{--});--}}
    {{--$("input[name='what_category_id']").change(function () {--}}
        {{--if($("input[value='10']").is(':checked')) {--}}
            {{--$('#micro_projects_group').show();--}}
            {{--$('#center').hide();--}}
            {{--$('#discSubCategories').hide();--}}
            {{--$('#link-microproject').attr('required', true);--}}
        {{--}else if($("input[value='5']").is(':checked')) {--}}
            {{--$('#micro_projects_group').hide();--}}
            {{--$('#center').hide();--}}
            {{--$('#discSubCategories').show();--}}
            {{--$('#link-microproject').attr('required', false);--}}
        {{--}else if($("input[value='7']").is(':checked')) {--}}
            {{--$('#micro_projects_group').hide();--}}
            {{--$('#center').show();--}}
            {{--$('#discSubCategories').hide();--}}
            {{--$('#link-microproject').attr('required', false);--}}
        {{--}else {--}}
            {{--$('#micro_projects_group').hide();--}}
            {{--$('#center').hide();--}}
            {{--$('#discSubCategories').hide();--}}
            {{--$('#link-microproject').attr('required', false);--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
{{--<script>--}}
    {{--$('#text').keydown(function (e) {--}}

        {{--var k = String.fromCharCode(e.which);--}}

        {{--if (k.match(/[^a-zA-Z0-9]/g))--}}
            {{--e.preventDefault();--}}
    {{--});--}}
{{--</script>--}}
@include('new.admin.scripts.popup-messages')
</body>
</html>
