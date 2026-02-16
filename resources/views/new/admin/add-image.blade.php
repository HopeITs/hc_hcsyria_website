<!DOCTYPE html>
<!--suppress ALL -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    <?php $page = 'home' ?>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | Add Project Images</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<style>
    #selectAll {
        /*position: absolute;*/
        /*visibility: hidden;*/
        opacity: 0;
        display: block !important;
        position: relative;
        right: 5px;
        bottom: 5px;
    }
</style>
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
                        <h3 class="title">Add Image</h3>
                        {{--{!! Form::open(['route' => ['update.project', $project->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}--}}
                        <form id="uploadForm" action="{{ route('store.image',[$project->id])}}" method="POST"
                              enctype="multipart/form-data">
                            {{Form::hidden('project_id', $project->id)}}
                            @csrf
                            {{--@method('PUT')--}}
                            <div class="row mb-3">
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    {{Form::label('MicroProject_ID', 'City of Project')}}
                                    {{Form::text('City', ($project->place->name), ['class' => 'form-control', 'placeholder' => 'City', 'required', 'readonly' , 'style' =>'cursor: not-allowed;'])}}
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    {{Form::label('MicroProject_ID', 'Project Number')}}
                                    {{Form::number('MicroProject_ID', $project->MicroProject_ID, ['class' => 'form-control', 'placeholder' => 'Project Number', 'required', 'readonly', 'style' =>'cursor: not-allowed;'])}}
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    {{Form::label('name', 'Project Name')}}
                                    {{Form::text('name', $project->english->MPE_Name, ['class' => 'form-control', 'placeholder' => 'Project Name', 'readonly', 'style' =>'cursor: not-allowed;'])}}
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    {{Form::label('beneficiary', 'Beneficiary Name')}}
                                    {{Form::text('beneficiary', $project->MPE_BeneficiaryName, ['class' => 'form-control', 'placeholder' => 'Project Manager', 'readonly', 'style' =>'cursor: not-allowed;'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    {{Form::label('image-count', 'Images Count')}}
                                    <input id="images-count" type="number" class="form-control" step="1" value="3"
                                           min="1" onchange="addImageGroup()">
                                </div>
                            </div>

                            {{--<div class="form-group col-lg-12 col-md-12 col-12">--}}
                            {{--<div class="" id="images-count">3</div>--}}
                            {{--<button class="btn btn-danger" id="remove-image-group"--}}
                            {{--onclick="event.preventDefault();"><span class="fa fa-minus"></span></button>--}}
                            {{--<button class="btn btn-success" id="add-image-group"--}}
                            {{--onclick="event.preventDefault();">--}}
                            {{--<span class="fa fa-plus"></span></button>--}}
                            {{--</div>--}}
                            <div class="mb-3" id="images-group">
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            {{Form::label('small_image', 'Small Image')}}
                                            {{Form::file('small_image[]', ['accept' => 'image/jpeg', 'required'])}}
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            {{Form::label('big_image', 'Large Image')}}
                                            {{Form::file('big_image[]', ['accept' => 'image/jpeg', 'required'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12 small-image">
                                            {{Form::label('small_image', 'Small Image')}}
                                            {{Form::file('small_image[]', ['accept' => 'image/jpeg', 'required'])}}
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            {{Form::label('big_image', 'Large Image')}}
                                            {{Form::file('big_image[]', ['accept' => 'image/jpeg', 'required'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12 small-image">
                                            {{Form::label('small_image', 'Small Image')}}
                                            {{Form::file('small_image[]', ['accept' => 'image/jpeg', 'required'])}}
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            {{Form::label('big_image', 'Large Image')}}
                                            {{Form::file('big_image[]', ['accept' => 'image/jpeg', 'required'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i> Back
                                </button>
                                <a href="{{route('admin_project', $project['id'])}}" class="btn btn-primary"
                                   style="margin-left: 15px;"><i
                                        class="fa fa-eye"></i>&nbsp;View</a>
                                <button id="uploadBtn" type="button" class="btn btn-danger" style="margin-left: 15px;">
                                    <i
                                        class="fa fa-external-link"></i> Upload
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            @if(!$images->isEmpty())
                <div class="row mt-5 position-relative">
                    <div class="col">
                        <h3 class="title">Uploaded Images <span>(Change Images' order with Drag and Drop - The first image is The Cover)</span>
                        </h3>
                        @if(!$images->isEmpty())
                            <form action="{{ route('delete.images',[$project->id])}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="form-group col">
                                        <ul id="image-list">
                                            @foreach($images as $img)
                                                {{--{{Form::text('project_id', $project->id, ['class' => 'd-none'])}}--}}
                                                <li class="image-checkbox" id="image_{{$img['id']}}">
                                                    <img class="img-responsive" src="{{$img['MPI_Path']}}"/>
                                                    <input type="checkbox" name="{{$img['id']}}" value="1"/>
                                                    <i class="fa fa-check hidden"></i>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="position-relative" style="top: 110px;">
                                    <button class="btn btn-danger show_confirm icon-btn" type="submit">
                                        <i class="fa save fa-trash-o"></i></button>
                                    <span> Delete Selected Images</span>
                                </div>
                            </form>
                            <button id="selectBtn" style="cursor: pointer;"
                                    class="btn btn-primary icon-btn position-relative mb-1">
                                <i class='fa save' style="left: 10px;">&#xf00c;</i>
                                <input style="cursor: pointer;" id="selectAll" type="checkbox" class="icon-btn"
                                       name="selectAll" onchange="selectAll(this)"/>
                            </button>
                            <span> Select/Deselect All Image</span>
                            <form class="order-form" action="{{ route('order.images')}}" method="POST"
                                  enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div id="submit-container" class="position-relative mb-1">
                                    {{--<i class="fa fa-save btn btn-primary icon-btn"></i>--}}
                                    <button type='submit' class="btn btn-primary icon-btn" id='submit' value="">
                                        <i class='fa save' style="cursor: pointer">&#xf0c7;</i>
                                    </button>
                                    <span>Save Image Order</span>

                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@stack('navbar_scripts')

<script>
    let image_group = '<div class="image-group form-control">' +
        '<div class="row">' +
        '<div class="form-group col-lg-6 col-md-6 col-12">' +
        '<label for="small_image">Small Image</label>' +
        '<input accept="image/jpeg" required="" name="small_image[]" type="file" style="padding-left: 3px;">' +
        '</div><div class="form-group col-lg-6 col-md-6 col-12">' +
        '<label for="big_image">Large Image</label>' +
        '<input accept="image/jpeg" required="" name="big_image[]" type="file" style="padding-left: 3px;">' +
        '</div></div>' +
        '</div>';

    let images_count = 3;

    function addImageGroup() {
        let count = document.getElementById('images-count').value;
        if (count > images_count) {
            images_count++;
            $('#images-group').append(image_group);
            $('#images-count').html(images_count);
            document.getElementById('images-count').value = images_count;
        } else {
            if (images_count !== 1) {
                images_count--;
                $('#images-group').children().last().remove();
                $('#images-count').html(images_count);
                document.getElementById('images-count').value = images_count;
            }
        }
    }
</script>
<script>
    // image gallery
    // init the state from the input
    $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
        } else {
            $(this).removeClass('image-checkbox-checked');
        }
    });

    // sync the state to the input
    $(".image-checkbox").on("click", function (e) {
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked", !$checkbox.prop("checked"))

        e.preventDefault();
    });
</script>
<script>
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        // var id = event.target.attributes['id'].nodeValue;
        var id = $(this).data("id");
        let check = [];
        event.preventDefault();
        $(".image-checkbox").each(function () {
            if (this.classList.contains('image-checkbox-checked')) {
                check.push('true');
            } else check.push('false');
        });
        if (!check.includes("true")) {
            Swal.fire('Please select images!');
            return;
        }
        if ({{$project->MPE_Published}}) {
            Swal.fire({
                title: '<div class="mt-3">To apply the changes, the project will be returned to the offline dashboard.<br>Do you want to proceed?<div>',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
        else{
            Swal.fire({
                text: 'Are you sure you want to delete images?',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    });
</script>
<script>
    function selectAll(myCheckBox) {
        if (myCheckBox.checked === true) {
            $('#selectBtn').removeClass('btn-primary');
            $('#selectBtn').addClass('btn-success');

            $(".image-checkbox").each(function () {
                let $checkbox = $(this).find('input[type="checkbox"]');
                $checkbox.prop("checked", true)
                $(this).addClass('image-checkbox-checked');
                // e.preventDefault();

            })
        } else {
            $('#selectBtn').addClass('btn-primary');
            $('#selectBtn').removeClass('btn-success');
            $(".image-checkbox").each(function () {
                let $checkbox = $(this).find('input[type="checkbox"]');
                $checkbox.prop("checked", false)
                $(this).removeClass('image-checkbox-checked');
                // e.preventDefault();

            })
        }
    }
</script>
<link rel="stylesheet" href="vendor/jquery/jquery-ui/jquery-ui.css">
<script src="vendor/jquery/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    //Reorder with jQuery Drag and Drop
    $(document).ready(function () {
        let dropIndex;

        $("#image-list").sortable({
            update: function (event, ui) {
                dropIndex = ui.item.index();
            }
        });

        $('#submit').click(function (e) {
            let imageIdsArray = [];
            $('#image-list li').each(function (index) {
                // if (index <= dropIndex) {
                let id = $(this).attr('id');
                let split_id = id.split("_");
                imageIdsArray.push(split_id[1]);

                // }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('order.images') }}",
                data: {imageIds: imageIdsArray},
                success: function (response) {
                    swal('Images has successfully reordered !!');
                    let res = document.getElementById('txtresponse');
                    res.style.display = 'inline-block';
                    $('#txtresponse').text(response);
                    res.classList.add('alert');
                    res.classList.add('alert-success');
                }
            });
            e.preventDefault();
        });
    });

</script>
<script>
    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        document.getElementById('uploadBtn').addEventListener('click', function () {
            @if ($project->MPE_Published)
            Swal.fire({
                title: '<div class="mt-3">To apply the changes, the project will be returned to the offline dashboard.<br>Do you want to proceed?<div>',
                // text: 'This project is online. it will be returned to (Pending to Publish) status when uploading?',
                showCancelButton: true,
                confirmButtonText: 'Yes, upload it!',
                cancelButtonText: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('uploadForm').submit();
                }
            });
            @else
            document.getElementById('uploadForm').submit();
            @endif
        });
    });

</script>
</body>
