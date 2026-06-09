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
    <title>Admin | Add Project Images</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<style>
    #selectAll {
        opacity: 0;
        display: block !important;
        position: relative;
        right: 5px;
        bottom: 5px;
    }

    /* --- FIX: DRAG & DROP + VISUAL COVER INDICATOR --- */
    #image-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: block; /* Removed flex to fix jQuery UI Sortable */
    }

    #image-list .image-checkbox {
        position: relative;
        display: inline-block; /* Restored inline-block for smooth drag & drop */
        vertical-align: top;
        margin: 0 15px 15px 0;
        cursor: grab;
    }

    #image-list .image-checkbox:active {
        cursor: grabbing;
    }

    /* Minimalist Cover Label */
    #image-list .image-checkbox:first-child::after {
        content: 'Cover';
        position: absolute;
        top: 0;
        left: 0;
        background: #b5121b;
        color: #ffffff;
        padding: 2px 6px;
        font-size: 11px;
        font-weight: bold;
        border-bottom-right-radius: 4px;
        z-index: 10;
        pointer-events: none;
    }

    /* Add a subtle matching border around the cover image */
    #image-list .image-checkbox:first-child img {
        border: 2px solid #b5121b;
        box-sizing: border-box;
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
                        <form id="uploadForm" action="{{ route('store.image', [$project->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $project->id }}">

                            <div class="row mb-3">
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    <label for="City">City of Project</label>
                                    <input type="text"
                                           name="City"
                                           id="City"
                                           class="form-control"
                                           placeholder="City"
                                           value="{{ $project->place->name }}"
                                           required
                                           readonly
                                           style="cursor: not-allowed;">
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    <label for="MicroProject_ID">Project Number</label>
                                    <input type="number"
                                           name="MicroProject_ID"
                                           id="MicroProject_ID"
                                           class="form-control"
                                           placeholder="Project Number"
                                           value="{{ $project->MicroProject_ID }}"
                                           required
                                           readonly
                                           style="cursor: not-allowed;">
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    <label for="name">Project Name</label>
                                    <input type="text"
                                           name="name"
                                           id="name"
                                           class="form-control"
                                           placeholder="Project Name"
                                           value="{{ $project->english->MPE_Name }}"
                                           readonly
                                           style="cursor: not-allowed;">
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    <label for="beneficiary">Beneficiary Name</label>
                                    <input type="text"
                                           name="beneficiary"
                                           id="beneficiary"
                                           class="form-control"
                                           placeholder="Project Manager"
                                           value="{{ $project->MPE_BeneficiaryName }}"
                                           readonly
                                           style="cursor: not-allowed;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    <label for="image-count">Images Count</label>
                                    <input id="images-count" type="number" class="form-control" step="1" value="3"
                                           min="1" onchange="addImageGroup()">
                                </div>
                            </div>
                            <div class="mb-3" id="images-group">
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="small_image">Small Image</label>
                                            <input type="file"
                                                   name="small_image[]"
                                                   accept="image/jpeg"
                                                   required>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="big_image">Large Image</label>
                                            <input type="file"
                                                   name="big_image[]"
                                                   accept="image/jpeg"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="small_image">Small Image</label>
                                            <input type="file"
                                                   name="small_image[]"
                                                   accept="image/jpeg"
                                                   required>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="big_image">Large Image</label>
                                            <input type="file"
                                                   name="big_image[]"
                                                   accept="image/jpeg"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="small_image">Small Image</label>
                                            <input type="file"
                                                   name="small_image[]"
                                                   accept="image/jpeg"
                                                   required>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="big_image">Large Image</label>
                                            <input type="file"
                                                   name="big_image[]"
                                                   accept="image/jpeg"
                                                   required>
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
                            @if(!$images->isEmpty())
                                <form action="{{ route('delete.images', [$project->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <ul id="image-list">
                                        @foreach($images as $img)
                                            <li class="image-checkbox" id="image_{{ $img['id'] }}">
                                                <img class="img-responsive" src="{{ $img['MPI_Path'] }}" />
                                                <input type="checkbox" name="selected_images[{{ $img['id'] }}]" value="1"/>
                                                <i class="fa fa-check hidden"></i>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <button type="submit" class="btn btn-danger mt-3">
                                        <i class="fa fa-trash-o"></i> Delete Selected Images
                                    </button>
                                </form>
                            @endif
                            <button id="selectBtn" style="cursor: pointer;"
                                    class="btn btn-primary icon-btn position-relative mt-2 mb-1">
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
    let image_group = '<div class="image-group form-control">'+
        '<div class="row">'+
        '<div class="form-group col-lg-6 col-md-6 col-12">'+
        '<label for="small_image">Small Image&nbsp;</label>' +
    '<input type="file" name="small_image[]"  accept="image/jpeg" required > </div>'+

    '<div class="form-group col-lg-6 col-md-6 col-12">'+
        '<label for="big_image">Large Image&nbsp;</label>' +
        '<input type="file" name="big_image[]"  accept="image/jpeg" required > </div> </div> </div>';

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
        var id = $(this).data("id");
        let check = [];
        event.preventDefault();
        $(".image-checkbox").each(function () {
            if (this.classList.contains('image-checkbox-checked')) {
                check.push('true');
            } else check.push('false');
        });
        if (!check.includes("true")) {
            Swal.fire({
                title: 'No Images Selected',
                text: 'Please select images!',
                icon: 'info'
            });
            return;
        }
        if ({{$project->MPE_Published}}) {
            Swal.fire({
                html: '<div class="mt-3">To apply the changes, the project will be returned to the offline dashboard.<br>Do you want to proceed?<div>',
                showCancelButton: true,
                confirmButtonColor: '#b5121b',
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
                text: 'Are you sure you want to delete the selected images?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b5121b',
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
            })
        } else {
            $('#selectBtn').addClass('btn-primary');
            $('#selectBtn').removeClass('btn-success');
            $(".image-checkbox").each(function () {
                let $checkbox = $(this).find('input[type="checkbox"]');
                $checkbox.prop("checked", false)
                $(this).removeClass('image-checkbox-checked');
            })
        }
    }
</script>
<link rel="stylesheet" href="vendor/jquery/jquery-ui/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
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
            e.preventDefault();
            let imageIdsArray = [];
            $('#image-list li').each(function (index) {
                let id = $(this).attr('id');
                let split_id = id.split("_");
                imageIdsArray.push(split_id[1]);
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
                    Swal.fire({
                        title: "Saved!",
                        text: "Images have successfully been reordered!",
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        });
    });

</script>
<script>
    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });

</script>
<script>
    $(document).ready(function () {
        document.getElementById('uploadBtn').addEventListener('click', function () {
            @if ($project->MPE_Published)
            Swal.fire({
                html: '<div class="mt-3">To apply the changes, the project will be returned to the offline dashboard.<br>Do you want to proceed?<div>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b5121b',
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
@include('new.admin.scripts.popup-messages')
</body>
</html>