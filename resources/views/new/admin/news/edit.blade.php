<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Admin | Edit News</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
                        <h3 class="title">Edit News</h3>
                        <form action="{{ route('news.update',[$newsData->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Type <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        <input name="type" id="type_0" type="radio" class="btn-check" value="0"
                                               @if($newsData->type=='0') checked @endif>
                                        <label class="btn btn-outline-primary" for="type_0">Article</label>

                                        <input name="type" id="type_3" type="radio" class="btn-check" value="3"
                                               @if($newsData->type=='3') checked @endif>
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
                                                   autocomplete="off"
                                                   @if($newsData->what_category_id == $category->id) checked @endif >
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
                                                   autocomplete="off"
                                                   @if($newsData->who_category_id == $category->id) checked @endif >
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
                                                   autocomplete="off"
                                                   @if($newsData->place_id == $place->id) checked @endif >
                                            <label class="btn btn-outline-primary"
                                                   for="place_{{$place->id}}">{{$place->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{--<div class="row mb-3">--}}
                                {{--<div class="form-group col-lg-8 col-md-8 col-12" id="micro_projects_group">--}}
                                    {{--<label for="link-microproject">Link to micro project <span--}}
                                                {{--class="red-color">*</span></label>--}}
                                    {{--<select class="form-select" id="link-microproject"--}}
                                            {{--placeholder="Choose micro-project to link..." name="project_id">--}}
                                        {{--<option value="">Choose micro-project to link...</option>--}}
                                        {{--@foreach($microProjects as $project)--}}
                                            {{--<option value="{{ $project->MicroProject_ID }}"--}}
                                                    {{--@if($project->MicroProject_ID ==  $newsData->project_id) selected @endif>--}}
                                                {{--{{ $project->MicroProject_ID }} | {{ $project->MPE_BeneficiaryName }}--}}
                                                {{--| {{ $project->english->MPE_Name }}--}}
                                            {{--</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12" id="edition_group">
                                    <label for="edition">Choose edition: <span class="red-color">*</span></label>
                                    <select class="form-select" id="edition" placeholder="Choose edition..."
                                            name="edition_id">
                                        <option value="">Choose edition...</option>
                                        @foreach($editions as $edition)
                                            <option value="{{ $edition->id }}"
                                                    @if($edition->id ==  $newsData->edition_id) selected @endif()>
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
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="title">Title</label> <span class="red-color">*</span>
                                    <input type="text"
                                           name="title"
                                           id="title"
                                           class="form-control"
                                           placeholder="Title"
                                           value="{{ $newsData->english->title }}"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="description">Description</label>
                                    <span>
            <small>(maximum:900 characters with spaces OR leave the box empty to let it automatically!)</small>
        </span>
                                    <textarea name="description"
                                              id="description"
                                              class="form-control"
                                              placeholder="Description">{{ $newsData->english->description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="content">Content</label> <span class="red-color">*</span>
                                    <textarea name="content"
                                              id="editor"
                                              class="form-control"
                                              placeholder="Content"
                                              required>{{ $newsData->english->content }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="video">Video Link</label>
                                    <input type="text"
                                           name="video"
                                           id="video"
                                           class="form-control"
                                           placeholder="Video Link"
                                           value="{{ $newsData->video == '0' ? '' : $newsData->video }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-8">
                                    <label for="file">File Link</label>
                                    <p id="file">{{ $newsData->file == '0' ? '' : $newsData->file }}</p>
                                </div>
                                <div class="col-4 text-end">
                                @if($newsData->file != '0')
                                        {{--<form action="{{route('news.file.destroy', $newsData->file )}}"--}}
                                              {{--method="POST"--}}
                                              {{--style="float: right; padding-left: 10px "--}}
                                              {{--enctype="multipart/form-data">--}}
                                            {{--@method('DELETE')--}}
                                            {{--@csrf--}}
                                            <button class="btn btn-danger icon-btn show_confirm"
                                                    type="submit">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        {{--</form>--}}
                                @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    @if($newsData->file == '0')
                                        <input class="form-control" type="file" name="file" id="file"
                                               value="{{}}">
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-end" style="margin-top: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i
                                            class="fa fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" class="btn btn-info" style="margin-left: 15px;"><i
                                            class="fa fa-refresh"></i> Update
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

{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('#link-microproject').selectize();--}}
    {{--});--}}
    {{--$("input[name='what_category_id']").change(function () {--}}
        {{--if ($("input[value='13']").is(':checked')) {     //products--}}
            {{--$('#micro_projects_group').show();--}}
            {{--$('#link-microproject').attr('required', true);--}}
        {{--} else {--}}
            {{--$('#micro_projects_group').hide();--}}
            {{--$('#link-microproject').attr('required', false);--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
<script>
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();

        swal({
            title: `Are you sure you want to delete ?`,
            showCancelButton: true,
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result) {
                form.submit();
                swal(
                    'Terhapus!',
                    'Data berhasil terhapus.',
                    'success',
                    window.location.href = getLink
                )
            }
        }, function (dismiss) {
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                )
            }
        });
    });
    // if (e) {
    //     alert('yes');
    //     return true;
    // }
    // if (confirm("Do you really want to: \nDelete " + e + " ?"))
    //     return true;
    // else
    //     return false;
    // }

    // ).catch(swal.noop);
    // }
    // ;
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
</body>
</html>
