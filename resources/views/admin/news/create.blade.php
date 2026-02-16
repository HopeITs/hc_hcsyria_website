<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Create News</title>
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
    </style>
</head>
<body>

@stack('navbar_body')

<section style="padding-top: 30px;">
    <div class="container">
        @include('admin.messages')
    </div>
    <div class="container">
        <h3 class="title">Create News</h3>
        {!! Form::open(['route' => 'news.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">

            <div class="form-group col-md-8 col-md-offset-2">
                <label>Type <span class="red-color">*</span></label><br>
                <div class="btn-group donors-list" data-toggle="buttons">
                    {{--<label class="btn btn-primary">--}}
                        {{--<input name="type" type="radio" value="9" id="donor-none">--}}
                        {{--None</label>--}}
                    <label class="btn btn-primary">
                        <input name="type" type="radio" value="0">
                        Article</label>
                    <label class="btn btn-primary">
                        <input name="type" type="radio" value="1">
                        Product</label>
                    <label class="btn btn-primary">
                        <input name="type" type="radio" value="2">
                        Short Paragrapgh</label>
                    <label class="btn btn-primary">
                        <input name="type" type="radio" value="3">
                        Video</label>
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                <label>What-category <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($what_categories as $category)
                        <label class="btn btn-primary">
                            <input name="what_category_id" type="radio" value="{{$category->id}}" required>
                            {{$category->name}}
                        </label>
                    @endforeach
                </div>
            </div>

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

            <div class="form-group col-md-3 col-md-offset-2" id="edition_group">
                <label for="edition">Edition <span class="red-color">*</span></label>
                <select id="edition" placeholder="Choose Edition..." name="edition_id">
                    <option value="">Choose Edition...</option>
                    @foreach($editions as $edition)
                        <option value="{{ $edition->id }}">
                            {{ $edition->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4 col-md-offset-1" >
                <label for="rank">Rank <span class="red-color">*</span></label>
                <select id="rank" placeholder="Choose Rank..." name="rank">
                    <option selected value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="1">5</option>
                    <option value="1">6</option>
                    <option value="1">7</option>
                    <option value="1">8</option>
                    <option value="1">9</option>
                    <option value="1">10</option>
                    <option value="1">11</option>
                    <option value="1">11</option>
                </select>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('title', 'Title')}} <span class="red-color">*</span>
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('description', 'Description')}} <span><small> (maximum:900 characters with spaces OR leave the box empty to let it automatically!)</small></span>
                {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => '2', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('content', 'Content')}} <span class="red-color">*</span>
                {{Form::textarea('content', '', ['class' => 'hidden', 'id' => 'editor', 'placeholder' => 'Content'])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('video', 'Video Link')}}
                {{Form::text('video', '', ['class' => 'form-control', 'placeholder' => 'Video Link'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label for="upload_file" class="control-label col-sm-3">Upload File</label>
                <input class="form-control" type="file" name="file" id="file">
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

<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
<script type="text/javascript" src="/js/selectize.min.js"></script>

<script>
    $(document).ready(function () {
        $('#link-microproject').selectize();
    });
    $("input[name='what_category_id']").change(function () {
        if($("input[value='13']").is(':checked')) {     //products
            $('#micro_projects_group').show();
            $('#link-microproject').attr('required', true);
        }else {
            $('#micro_projects_group').hide();
            $('#link-microproject').attr('required', false);
        }
    });
</script>
</body>
</html>
