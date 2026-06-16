<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    <?php $page = 'home' ?>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | Add Study Images</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
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
                        <h2 class="title">Add Image</h2>
                        <form action="{{ route('study.store.image', [$initiative->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="initiative_id" value="{{ $initiative->id }}">
                            <input type="hidden" name="what_category_id" value="{{ $initiative->whatCategory->id }}">

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="title">Name</label>
                                    <input type="text" id="title" name="title" value="{{ $initiative->english->title }}"
                                           class="form-control" required readonly style="cursor: not-allowed;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    <label for="images-count">Images Count</label>
                                    <input id="images-count" type="number" class="form-control" step="1" value="3" min="1" onchange="addImageGroup()">
                                </div>
                            </div>

                            <div class="mb-3" id="images-group">
                                <!-- Image Group 1 -->
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="small_image[]">Small Image</label>
                                            <input type="file" name="small_image[]" accept="image/jpeg" required >
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="big_image[]">Large Image</label>
                                            <input type="file" name="big_image[]" accept="image/jpeg" required >
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Group 2 -->
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="small_image[]">Small Image</label>
                                            <input type="file" name="small_image[]" accept="image/jpeg" required >
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="big_image[]">Large Image</label>
                                            <input type="file" name="big_image[]" accept="image/jpeg" required >
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Group 3 -->
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="small_image[]">Small Image</label>
                                            <input type="file" name="small_image[]" accept="image/jpeg" required >
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="big_image[]">Large Image</label>
                                            <input type="file" name="big_image[]" accept="image/jpeg" required >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn-primary" type="button" onclick="window.history.back();">
                                    <i class="fa fa-arrow-left"></i> Back
                                </button>
                                <a href="{{ route('admin_study', $initiative->id) }}" class="btn btn-primary" style="margin-left: 15px;">
                                    <i class="fa fa-eye"></i>&nbsp;View
                                </a>
                                <button type="submit" class="btn btn-danger" style="margin-left: 15px;">
                                    <i class="fa fa-external-link"></i> Upload
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
                            <form action="{{ route('study.delete.images',[$initiative->id])}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="form-group col">
                                        <ul id="image-list">
                                            @foreach($images as $img)
                                                <li class="image-checkbox" id="image_{{$img['id']}}">
                                                    <img class="img-responsive" src="{{$img['path']}}"/>
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
                            <button style="cursor: pointer;" id="selectBtn"
                                    class="btn btn-primary icon-btn position-relative mb-1">
                                <i class='fa save' style="left: 10px;">&#xf00c;</i>
                                <input style="cursor: pointer;" id="selectAll" type="checkbox"
                                       class="icon-btn"
                                       name="selectAll" onchange="selectAll(this)"/>
                            </button>
                            <span> Select/Deselect All Image</span>
                            <form class="order-form" action="{{ route('studyorder.images')}}" method="POST"
                                  enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div id="submit-container" class="position-relative mb-1">
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
        }
        else {
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
        }
        else {
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
        }
        else {
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
<script>
    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });
</script>
@include('new.admin.scripts.image-reorder', ['orderRoute' => route('studyorder.images')])
@include('new.admin.scripts.popup-messages')
</body>
