<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Admin | Create Initiative</title>
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
                        <h3 class="title">Create Initiative</h3>
                        <form action="{{ route('store.school')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Donor <span class="red-color">*</span></label><br>
                                    <div class="btn-group flex-wrap w-100" role="group">
                                        @foreach($donors as $donor)
                                            <input type="checkbox" class="btn-check" value="{{$donor->id}}" name="donors[]"
                                                   id="donor_{{$donor->id}}"
                                                   autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                   for="donor_{{$donor->id}}">{{$donor->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Sub project <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100 flex-wrap" role="group">
                                        @foreach($school_sub_categories as $sub_category)
                                            <input type="radio" name="school_sub_category" class="btn-check"
                                                   id="sub_{{$sub_category->id}}" value="{{$sub_category->id}}">
                                            <label for="sub_{{$sub_category->id}}"
                                                   class="btn btn-outline-primary">{{$sub_category->name}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('title', 'Title')}} <span class="red-color">*</span>
                                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Initiative Title', 'required'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('organization', 'Organization')}}
                                    {{Form::text('organization', '', ['class' => 'form-control', 'placeholder' => 'Project Manager'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('date_string', 'Date')}}
                                    {{Form::text('date_string', '', ['class' => 'form-control', 'placeholder' => 'Date'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('description', 'Description')}} <span class="red-color">*</span>
                                    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => '2'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    {{Form::label('logo', 'Logo')}}
                                    <br>
                                    <i style="color: #777;">(Choosing an image will erase the current one)</i>
                                    <input class="form-control" type="file" accept="image/jpeg" name="logo" id="file">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('content', 'Content')}} <span class="red-color">*</span>
                                    {{Form::textarea('content', '', ['class' => 'hidden', 'id' => 'editor', 'placeholder' => 'Content'])}}
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
                                    <label>Serve Category <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100 flex-wrap">
                                        @foreach($who_categories as $category)
                                            <input type="radio" name="who_category_id" class="btn-check"
                                                   id="who_{{$category->id}}"
                                                   value="{{$category->id}}">
                                            <label for="who_{{$category->id}}" class="btn btn-outline-primary">{{$category->name}}</label>
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
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
<script type="text/javascript" src="/js/selectize.min.js"></script>
</body>
</html>
