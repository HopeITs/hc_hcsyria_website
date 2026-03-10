<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Edit News</title>
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
        /*#micro_projects_group {*/
            /*display: none;*/
        /*}*/
        .btn-group{
            display: block;
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
        <h3 class="title">Edit News</h3>
        {!! Form::open(['route' => ['news.update', $newsData->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="form-group col-md-8 col-md-offset-2">
                <label>Type <span class="red-color">*</span></label><br>
                <div class="btn-group donors-list" data-toggle="buttons">
                    {{--<label class="btn btn-primary @if($newsData->type=='9') active @endif ">--}}
                        {{--<input name="donor" id="donor-none" type="radio" value="9" @if($project->MPE_Donor=='9') checked @endif>--}}
                        {{--None</label>--}}
                    <label class="btn btn-primary @if($newsData->type=='0') active @endif ">
                        <input name="type" type="radio" value="0" @if($newsData->type=='0') checked @endif>
                        Article</label>
                    <label class="btn btn-primary @if($newsData->type=='1') active @endif ">
                        <input name="type" type="radio" value="1" @if($newsData->type=='1') checked @endif>
                        Product</label>
                    <label class="btn btn-primary @if($newsData->type=='2') active @endif ">
                        <input name="type" type="radio" value="2" @if($newsData->type=='2') checked @endif>
                        Short Paragrapgh</label>
                    <label class="btn btn-primary @if($newsData->type=='3') active @endif ">
                        <input name="type" type="radio" value="3" @if($newsData->type=='3') checked @endif>
                        Video</label>
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                <label>What-category <span class="red-color">*</span></label><br>
                <div class="btn-group" data-toggle="buttons">
                    @foreach($what_categories as $category)
                        <label class="btn btn-primary @if($newsData->what_category_id == $category->id) active @endif">
                            <input name="what_category_id" type="radio" value="{{$category->id}}"
                                   @if($newsData->what_category_id == $category->id) checked @endif required>
                            {{$category->name}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label>Who-category <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($who_categories as $category)
                        <label class="btn btn-primary @if($newsData->who_category_id == $category->id) active @endif">
                            <input name="who_category_id" type="radio" value="{{$category->id}}"
                                   @if($newsData->who_category_id == $category->id) checked @endif required>
                            {{ucfirst($category->name)}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label>Place <span class="red-color">*</span></label><br>
                <div class="btn-group" data-toggle="buttons">
                    @foreach($places as $place)
                        <label class="btn btn-primary @if($newsData->place_id == $place->id) active @endif">
                            <input name="place_id" type="radio" value="{{$place->id}}"
                                   @if($newsData->place_id == $place->id) checked @endif required>
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
                        <option value="{{ $project->MicroProject_ID }}"
                            @if($project->MicroProject_ID ==  $newsData->project_id) selected @endif()>
                            {{ $project->MicroProject_ID }} | {{ $project->MPE_BeneficiaryName }}
                            | {{ $project->english->MPE_Name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-8 col-md-offset-2" id="edition_group">
                <label for="edition">Choose edition: <span class="red-color">*</span></label>
                <select id="edition" placeholder="Choose edition..." name="edition_id">
                    <option value="">Choose edition...</option>
                    @foreach($editions as $edition)
                        <option value="{{ $edition->id }}"
                                @if($edition->id ==  $newsData->edition_id) selected @endif()>
                            {{ $edition->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4 col-md-offset-2" >
                <label for="rank">Rank <span class="red-color">*</span></label>
                <select id="rank" placeholder="Choose Rank..." name="rank">
                    <option @if($newsData->rank == 1) selected @endif() value="1">1</option>
                    <option @if($newsData->rank == 2) selected @endif() value="2">2</option>
                    <option @if($newsData->rank == 3) selected @endif() value="3">3</option>
                    <option @if($newsData->rank == 4) selected @endif() value="4">4</option>
                    <option @if($newsData->rank == 5) selected @endif() value="5">5</option>
                    <option @if($newsData->rank == 6) selected @endif() value="6">6</option>
                    <option @if($newsData->rank == 7) selected @endif() value="7">7</option>
                    <option @if($newsData->rank == 8) selected @endif() value="8">8</option>
                    <option @if($newsData->rank == 9) selected @endif() value="9">9</option>
                    <option @if($newsData->rank == 10) selected @endif() value="10">10</option>
                    <option @if($newsData->rank == 11) selected @endif() value="11">11</option>
                    <option @if($newsData->rank == 12) selected @endif() value="12">12</option>
                </select>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('title', 'Title')}} <span class="red-color">*</span>
                {{Form::text('title', $newsData->english->title, ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('description', 'Description')}} <span><small> (maximum:900 characters with spaces OR leave the box empty to let it automatically!)</small></span>
                {{Form::textarea('description', $newsData->english->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('content', 'Content')}} <span class="red-color">*</span>
                {{Form::textarea('content', $newsData->english->content, ['class' => 'hidden', 'id' => 'editor', 'placeholder' => 'Content'])}}
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('video', 'Video Link')}}
                {{Form::text('video', $newsData->video == '0' ? '' : $newsData->video, ['class' => 'form-control', 'placeholder' => 'Video Link'])}}
            </div>

            <div class="form-group col-md-7 col-md-offset-2">
                {{Form::label('file', 'File Link')}}
                {{Form::label('file', $newsData->file == '0' ? '' : $newsData->file)}}
            </div>
            <div class="form-group col-md-2 col-md-offset-0">
                @if($newsData->file != '0')
                    <button type="submit" class="bt btn-danger"><i class="fa fa-trash-o"></i> Delete </button>
                    {{--{!! Form::open(['route' => ['news.file.destroy', $newsData->file], 'method' => 'delete', 'enctype' => 'multipart/form-data']) !!}--}}
                    {{--<br><br>--}}
                    {{--{{Form::button('<i class="fa fa-trash-o"></i> Delete ', ['type' => 'submit', 'class' => 'btn btn-danger'])}}--}}
                    {{--{!! Form::close() !!}--}}
                    {{--<form action="{{ route('news.file.destroy',$newsData->file) }}" method="post">--}}
                        {{--@csrf--}}
                        {{--@method('DELETE')--}}
                        {{--<button type="submit" class="bt btn-danger"><i class="fa fa-trash-o"></i> Delete </button>--}}
                    {{--</form>--}}
                @endif
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
            @if($newsData->file == '0')
                {{--<label for="upload_file" class="control-label col-sm-3">Upload File</label>--}}
                <input class="form-control" type="file" name="file" id="file" value="$newsData->file">
            @endif
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
<script>
    function ConfirmDelete(e) {
        if (confirm("Do you really want to: \nDelete " + e + " ?"))
            return true;
        else
            return false;
    }
</script>
</body>
</html>
