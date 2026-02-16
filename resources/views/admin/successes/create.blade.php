<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Create Success</title>
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
        #micro_projects_group ,#center ,#discSubCategories{
            display: none;
        }
        .selectize-control .option.active {
            color: #fff;
            background-color: #428bca;
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
        <h3 class="title">Create Success</h3>
        {!! Form::open(['route' => 'successes.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="form-group col-md-8 col-md-offset-2">
                <label>Who-category <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($who_categories as $category)
                        <label class="btn btn-primary ">
                            <input name="who_category_id" type="radio" value="{{$category->id}}" required>
                            {{ucfirst($category->name)}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label>What-category <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons" >
                    @foreach($what_categories as $category)
                        @if($category->name == 'Micro projects'
                        or $category->name == 'DISC'
                        or $category->name == 'Study Zone'
                        or $category->name == 'Children University' )
                            <label class="btn btn-primary">
                                <input name="what_category_id" type="radio" value="{{$category->id}}" required>
                                {{$category->name}}
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2" id="discSubCategories">
                <label for="disc_sub_category_id">Sub project <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($disc_sub_categories as $sub_category)
                        <label class="btn btn-primary">
                            <input name="disc_sub_category_id" type="radio" value="{{$sub_category->id}}">
                            {{$sub_category->name}}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2" id="place">
                <label for="place">Place <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($places as $place)
                        <label class="btn btn-primary">
                            <input name="place_id" type="radio" value="{{$place->id}}">
                            {{$place->name}}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2" id="center">
                <label for="center">Center <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($centers as $center)
                        <label class="btn btn-primary">
                            <input name="center" type="radio" value="{{$center->id}}">
                            {{$center->name}}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2" id="micro_projects_group">
                <label for="link-microproject">Link to micro project <span class="red-color">*</span></label>
                <select id="link-microproject" placeholder="Choose micro-project to link..." name="project_id">
                    <option value="">Choose micro-project to link...</option>
                    @foreach($microProjects as $project)
                        <option value="{{ $project->MicroProject_ID }}">
                            {{ $project->MicroProject_ID }} | {{ $project->MPE_BeneficiaryName }}
                            | {{ $project->english->MPE_Name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('image_path', 'Image')}} <span class="red-color">*</span> <span><small>  (must be 300x300 and maximum: 50KB-100KB)</small></span>
                {{Form::file('image_path', ['accept' => 'image/jpeg', 'required'])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('title', 'Title')}} <span class="red-color">*</span>
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('text', 'Text')}} <span class="red-color">*</span> <span><small>  (maximum:500 characters with spaces)</small></span>
                {{Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Text'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('video', 'Video Link')}}
                {{Form::text('video', '', ['class' => 'form-control', 'placeholder' => 'Video Link'])}}
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
<script>
    $(document).ready(function () {
        $('#link-microproject').selectize();
    });
    $("input[name='what_category_id']").change(function () {
        if($("input[value='10']").is(':checked')) {
            $('#micro_projects_group').show();
            $('#center').hide();
            $('#discSubCategories').hide();
            $('#link-microproject').attr('required', true);
        }else if($("input[value='5']").is(':checked')) {
            $('#micro_projects_group').hide();
            $('#center').hide();
            $('#discSubCategories').show();
            $('#link-microproject').attr('required', false);
        }else if($("input[value='7']").is(':checked')) {
            $('#micro_projects_group').hide();
            $('#center').show();
            $('#discSubCategories').hide();
            $('#link-microproject').attr('required', false);
        }else {
            $('#micro_projects_group').hide();
            $('#center').hide();
            $('#discSubCategories').hide();
            $('#link-microproject').attr('required', false);
        }
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
</body>
</html>
