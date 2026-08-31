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
    <title>Admin | Add Success Images</title>
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
                        <form action="{{ route('success.store.image',[$successData->id])}}" method="POST"
                              enctype="multipart/form-data">
                            <input type="hidden" name="success_id" value="{{ $successData->id }}">
                            <input type="hidden" name="who_category_id" value="{{ $successData->whoCategory->id }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="title">Name</label>
                                    <input type="text" id="title" name="title"
                                           value="{{ $successData->english->title }}"
                                           class="form-control" required readonly
                                           style="cursor: not-allowed;">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="image_path">Image</label> <span class="red-color">*</span>
                                    <br>
                                    <i style="color: #777;">(Choosing an image will erase the current one)</i>
                                    <input class="form-control" type="file" accept="image/jpeg" name="image_path"
                                           id="file">
                                </div>

                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i> Back
                                </button>
                                <a href="{{route('successes.show', $successData['id'])}}" class="btn btn-primary"
                                   style="margin-left: 15px;"><i
                                            class="fa fa-eye"></i>&nbsp;View</a>
                                <button type="submit" class="btn btn-danger" style="margin-left: 15px;"><i
                                            class="fa fa-external-link"></i> Upload
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            @if($successData->image_path !=0 && $successData->image_path != null)
                <div class="row mt-5">
                    <div class="col">
                        <h2 class="title">Uploaded Image</h2>
                        @if($successData->image_path !=0 && $successData->image_path != null)
                            <div class="row">
                                <div class="form-group col">
                                    <label class="image-checkbox">
                                        <img class="img-responsive" src="{{$successData->image_path}}"/>
                                    </label>
                                </div>
                            </div>
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
        '<label for="small_image">Small Image&nbsp;</label>' +
        '<input accept="image/jpeg" required="" name="small_image[]" type="file" style="padding-left: 0.3vw;">' +
        '</div><div class="form-group col-lg-6 col-md-6 col-12">' +
        '<label for="big_image">Big Image&nbsp;</label>' +
        '<input accept="image/jpeg" required="" name="big_image[]" type="file" style="padding-left: 0.3vw;">' +
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
@include('new.admin.scripts.popup-messages')
</body>
