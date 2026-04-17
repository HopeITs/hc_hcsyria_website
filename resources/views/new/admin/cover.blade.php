<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    <?php $page = 'covers' ?>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | Add Cover</title>
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
    <link href="/css/tabs.css" rel="stylesheet">
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
                <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative" id="tabList"
                    role="tablist" style="margin-top: 7vw">
                    @foreach($what_categories as $what_category)
                        <li class="nav-item" role="presentation">
                            <button id="{{ $what_category->name }}Tab"
                                    class="projectTab nav-link {{ $loop->first ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-tab="{{ $what_category->name }}"
                                    data-bs-target="#project-{{ $what_category->id }}"
                                    role="tab"
                                    aria-controls="project-{{ $what_category->id }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                {{ $what_category->name }}
                            </button>
                        </li>

                    @endforeach
                </ul>

                {{-- Tab Content --}}
                <div class="tab-content mt-5">
                    @foreach($what_categories as $what_category)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                             id="project-{{ $what_category->id }}"
                             role="tabpanel"
                             aria-labelledby="{{ $what_category->name }}Tab"
                             tabindex="0">
                            @if (session('success') && request('tab') == $what_category->name)
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h3 class="title">Add Cover</h3>
                                <form action="{{ route('covers.store', $what_category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $what_category->id }}">

                                    <div class="row mb-3">
                                        <div class="form-group col-lg-3 col-md-3 col-12">
                                            <label for="images-count-{{ $what_category->id }}">Images Count</label>
                                            <input id="images-count-{{ $what_category->id }}"
                                                   type="number"
                                                   step="1"
                                                   value="3"
                                                   min="1" class="form-control"
                                                   onchange="addImageGroup({{ $what_category->id }})">
                                        </div>
                                    </div>

                                    <div class="mb-3" id="images-group-{{ $what_category->id }}">
                                        @if($what_category->id == 0)
                                            @for ($i = 0; $i < 3; $i++)
                                                <div class="image-group form-control mb-3">
                                                    <div class="row">
                                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                                            <label >Small Image</label>
                                                            <input type="file"
                                                                   name="small_image_home[]"
                                                                   accept="image/jpeg"
                                                                   required>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                                            <label>Large Image</label>
                                                            <input type="file"
                                                                   name="big_image_home[]"
                                                                   accept="image/jpeg"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        @else
                                            <!-- Single images for other categories -->
                                            @for ($i = 0; $i < 3; $i++)
                                                <div class="image-group form-control mb-3">
                                                    <div class="row">
                                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                                            <label for="image_{{ $i }}">Image</label>
                                                            <input type="file"
                                                                   name="image[]"
                                                                   accept="image/jpeg"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-end mt-3">
                                        <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                            <i class="fa fa-arrow-left"></i> Back
                                        </button>
                                        <a href="{{ route('covers.show', $what_category->id) }}" class="btn btn-primary" style="margin-left: 15px;">
                                            <i class="fa fa-eye"></i>&nbsp;View
                                        </a>
                                        <button type="submit" class="btn btn-danger" style="margin-left: 15px;">
                                            <i class="fa fa-external-link"></i> Upload
                                        </button>
                                    </div>
                                </form>

                            @if(!$what_category->covers->isEmpty())
                                <div class="row mt-5 position-relative">
                                    <div class="col">
                                        <h3 class="title">Uploaded Images <span>(Change Images' order with Drag and Drop - The first image is The Cover)</span>
                                        </h3>
                                        @if(!$what_category->covers->isEmpty())
                                            <form action="{{ route('covers.delete',[$what_category->id])}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <ul class="image-sortable"
                                                            id="image-list-{{$what_category->id}}">
                                                            @foreach($what_category->covers as $img)
                                                                <input type="hidden" name="what_category_id" value="{{ $img->what_category_id }}">

                                                                <!-- Image checkbox -->
                                                                <li class="image-checkbox" id="image_{{ $img->id }}">
                                                                    <img class="img-responsive" id="{{$img['id']}}" src="{{ $img->image_path }}" />

                                                                    <input type="checkbox" name="selected_images[{{ $img->id }}]" value="1" />

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
                                            <form class="order-form" action="/admin/covers/order/{{$what_category->id}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @method('POST')
                                                @csrf
                                                <div id="submit-container" class="position-relative mb-1">
                                                    <button type='submit' data-id="{{ $what_category->id }}"
                                                            class="btn btn-primary icon-btn submit-order-btn" value="">
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

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@stack('navbar_scripts')
<script>
    $(document).ready(function () {
        let url1 = window.location.href;
        let url2 = new URL(url1);
        let tab = url2.searchParams.get("tab") + "Tab";
        let t = document.getElementById(tab);
        let tt = new bootstrap.Tab(t);
        tt.show();
    });
</script>
<script>
    $(function () {
        $(document).on('click', '.projectTab', function () {
            const tabValue = $(this).data('tab');
            let url = new URL(window.location.href);

            // Set or update `tab` param
            url.searchParams.set('tab', tabValue);

            // Push the new URL to browser history
            window.history.pushState({path: url.href}, '', url.href);
        });
    });
</script>
<script>
    let image_group_html = '';
    function addImageGroup(what_category_id) {
        if (what_category_id === 0) {
            image_group_html = '<div class="image-group form-control">' +
                '<div class="row">' +
                '<div class="form-group col-lg-6 col-md-6 col-12">' +
                '<label >Small Image</label>' +
                '<input accept="image/jpeg" required name="small_image_home[]" type="file" style="padding-left: 3px;">' +
                '</div><div class="form-group col-lg-6 col-md-6 col-12">' +
                '<label >Large Image</label>' +
                '<input accept="image/jpeg" required="" name="big_image_home[]" type="file" style="padding-left: 3px;">' +
                '</div></div>' +
                '</div>'
        } else {
            image_group_html = '<div class="image-group form-control">' +
                '<div class="row">' +
                '<div class="form-group col-lg-6 col-md-6 col-12">' +
                '<label>Image</label>' +
                '<input accept="image/jpeg" required name="image[]" type="file" style="padding-left: 3px;">' +
                '</div>' +
                '</div>' +
                '</div>';
        }
        let countInput = document.getElementById(`images-count-` + what_category_id);
        let imagesGroup = document.getElementById(`images-group-` + what_category_id);
        let default_images_count = imagesGroup.querySelectorAll('.image-group').length;
        let count = parseInt(countInput.value);

        if (count > default_images_count) {
            default_images_count++;
            $(imagesGroup).append(image_group_html);
            countInput.value = default_images_count;
        } else {
            if (default_images_count !== 1) {
                default_images_count--;
                $(imagesGroup).children().last().remove();
                countInput.value = default_images_count;
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

        if (check.includes("true")) {
            swal({
                title: `Are you sure you want to delete images? `,
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
        } else {
            swal('please select images !!')
        }

    });
</script>
<script>
    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });
</script>
@stack('imageOrder')
</body>
