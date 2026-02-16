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
    <title>Admin | Add Initiative Images</title>
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
                        <h3 class="title">Add Before/After Image</h3>
                        <form action="{{ route('initiatives.images.rehabilitation.store')}}" method="POST"
                              enctype="multipart/form-data">
                            {{Form::hidden('initiative_id', $initiative->id)}}
                            {{Form::hidden('what_category_id', $initiative->whatCategory->id)}}
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    {{Form::label('title', 'Initiative Name')}}
                                    {{Form::text('title', $initiative->english->title, ['class' => 'form-control', 'required', 'readonly','style' =>'cursor: not-allowed;'])}}
                                </div>
                                <div class="col">
                                    {{Form::label('category_name', 'Initiative Type')}}
                                    {{Form::text('category_name', $initiative->whatCategory->name, ['class' => 'form-control', 'readonly','style' =>'cursor: not-allowed;'])}}
                                </div>
                            </div>
                            <div class="mb-3" id="images-group">
                                {{Form::label('image', 'Images')}}
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            {{Form::label('before_image', 'Before Image')}}
                                            {{Form::file('before_image', ['accept' => 'image/jpeg', 'required'])}}
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            {{Form::label('after_image', 'After Image')}}
                                            {{Form::file('after_image', ['accept' => 'image/jpeg', 'required'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i> Back
                                </button>
                                <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary"
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
            @if(!$images->isEmpty())
                <div class="row mt-5">
                    <div class="col">
                        <h3 class="title">Uploaded Images</h3>
                        @if(!$images->isEmpty())
                            <form action="{{ route('initiatives.images.rehabilitation.destroy',[$initiative->id])}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="form-group col">
                                        @foreach($images as $img)
                                            <label class="image-checkbox">
                                                <img class="img-responsive" src="{{$img['path_1']}}"/>
                                                <img class="img-responsive" src="{{$img['path_2']}}"/>
                                                <input type="checkbox" name="{{$img['id']}}" value="1"/>
                                                <i class="fa fa-check hidden"></i>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit">
                                        <i class="fa fa-trash-o"></i></button>
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
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        // var id = event.target.attributes['id'].nodeValue;
        var id = $(this).data("id");
        event.preventDefault();

        swal({
            title: `Are you sure you want to delete images?`,
            // icon: "warning",
            // buttons: true,
            showCancelButton: true,
            confirmButtonText: 'Delete',
            // dangerMode: true,
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
</script>
</body>
</html>