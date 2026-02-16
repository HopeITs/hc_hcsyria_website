<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Create Team Member</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/selectize.min.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .btn-group > .btn {
            border-radius: 0;
            margin: 0 !important;
            width: 50%;
        }

        .select-width {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }
        #micro_projects_group {
            display: none;
        }
        .selectize-control .option.active {
            color: #fff;
            background-color: #428bca;
        }
        #discSubCategories{
            display: none;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<section style="padding-top: 30px;">
    <div class="container">
        @include('admin.messages')
    </div>
    <div class="container">
        <h3 class="title">Create Team Member</h3>
        {!! Form::open(['route' => 'team.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="form-group col-md-8 col-md-offset-2">
                <label>Belong To <span class="red-color">*</span></label><br>
                <div class="btn-group donors-list" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input name="belong_to" type="radio" value="hope">
                        Hope Aleppo</label>
                    <label class="btn btn-primary">
                        <input name="belong_to" type="radio" value="hope_h">
                        Hope Homs</label>
                    <label class="btn btn-primary">
                        <input name="belong_to" type="radio" value="hope_d">
                        Hope Damascus</label>
                    <label class="btn btn-primary">
                        <input name="belong_to" type="radio" value="study">
                        Study Zone</label>
                    <label class="btn btn-primary">
                        <input name="belong_to" type="radio" value="disc">
                        DISC</label>
                    <label class="btn btn-primary">
                        <input name="belong_to" type="radio" value="children">
                        Children University</label>
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('first_name', 'First Name')}} <span class="red-color">*</span>
                {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'first name', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('last_name', 'Last Name')}} <span class="red-color">*</span>
                {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'last name', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('image_path', 'Image')}} <span class="red-color">*</span> <span><small>  (must be 300x300 and maximum: 50KB-100KB)</small></span>
                {{Form::file('image_path', ['accept' => 'image/jpeg', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('position', 'Position')}} <span class="red-color">*</span>
                {{Form::textarea('position', '', ['class' => 'form-control', 'rows' => '2', 'placeholder' => ''])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('email', 'Email')}} <span class="red-color">*</span> <span><small> (must be firstname.surname and without @hcsyria.org)</small></span>
                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => ''])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('facebook_link', 'Facebook Link')}} <span class="red-color">*</span> <span><small> (without www.facebook.com)</small></span>
                {{Form::text('facebook_link', '', ['class' => 'form-control', 'placeholder' => 'Facebook Link'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('linkedin_link', 'Linkedin Link')}}
                {{Form::text('linkedin_link', '', ['class' => 'form-control', 'placeholder' => 'Linkedin Link'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('phone', 'Phone')}}
                {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => '+963 ### ### ###'])}}
            </div>
            <div class="form-group col-md-2 col-md-offset-2">
                {{Form::label('rank', 'Rank')}} <span class="red-color">*</span>
                {{Form::number('rank', '', ['class' => 'form-control', 'placeholder' => 'rank','min="1"','max="100"', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('inactive', 'Date of resignation')}}
                {{Form::text('inactive', '', ['class' => 'form-control', 'placeholder' => '00/00/0000'])}}
            </div>

        </div>
        <button class="btn btn-default" onclick="event.preventDefault();window.history.back();"
                style="margin-top: 15px"><i class="fa fa-arrow-left"></i> back
        </button>
        {{Form::button('<i class="fa fa-external-link"></i> Create', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-top: 15px;'])}}
        {!! Form::close() !!}
    </div>
</section>

@stack('navbar_scripts')

<script type="text/javascript" src="/js/selectize.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
{{--<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>--}}
{{--<script>--}}
    {{--CKEDITOR.replace('editor2');--}}
{{--</script>--}}
</body>
</html>
