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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link href="/css/tabs.css" rel="stylesheet">
    <style>
        #selectAll {
            opacity: 0;
            display: block !important;
            position: relative;
            right: 5px;
            bottom: 5px;
        }
        
        .image-caption-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.4) 60%, transparent 100%);
            color: white;
            padding: 12px;
            box-sizing: border-box;
            min-height: 45px;
            display: flex;
            align-items: center;
            gap: 10px; 
        }

        .image-caption-text {
            font-size: 16px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            flex-grow: 1; 
            text-align: left;
        }

        .btn-edit-caption {
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.15rem; 
            padding: 0;
            margin: 0;
            cursor: pointer;
            transition: transform 0.2s ease, color 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .btn-edit-caption:hover {
            transform: scale(1.1);
            color: #ffffff;
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
                             
                            {{-- Old Bootstrap Alert Removed --}}
                             
                            <h3 class="title">Add Cover</h3>
                            
                            <form id="upload-form-{{ $what_category->id }}" class="cover-upload-form" data-category="{{ $what_category->id }}" data-has-images="{{ !$what_category->covers->isEmpty() ? 'true' : 'false' }}" action="{{ route('covers.store', $what_category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $what_category->id }}">
                                <div class="row mb-3" @if($what_category->id == 40) style="display:none;" @endif>
                                    <div class="form-group col-lg-3 col-md-3 col-12">
                                        <label for="images-count-{{ $what_category->id }}">Images Count</label>
                                        <input id="images-count-{{ $what_category->id }}" type="number" class="form-control" step="1"
                                               value="{{ $what_category->id == 40 ? 1 : ($what_category->id == 0 ? 1 : 3) }}"
                                               min="1" onchange="addImageGroup({{ $what_category->id }})">
                                    </div>
                                </div>
                                <div class="mb-3" id="images-group-{{ $what_category->id }}">
                                    @if($what_category->id == 0)
                                        <div class="image-group-{{ $what_category->id }} form-control mb-3">
                                            <div class="row">
                                                <div class="form-group col-lg-6 col-md-6 col-12">
                                                    <label for="small_image">Small Image</label>
                                                    <input type="file" name="small_image[]" accept="image/jpeg" required>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-12">
                                                    <label for="big_image">Large Image</label>
                                                    <input type="file" name="big_image[]" accept="image/jpeg" required>
                                                </div>
                                                <div class="form-group col-12 mt-2">
                                                    <label>Image Caption (Optional)</label>
                                                    <input type="text" name="caption" class="form-control" placeholder="Enter a caption...">
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($what_category->id == 40)
                                        <div class="image-group-{{ $what_category->id }} form-control mb-3">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label>Our News Page Header Image</label>
                                                    <input type="file" name="image[]" accept="image/jpeg" required>
                                                </div>
                                                <div class="form-group col-12 mt-3">
                                                    <label>Image Caption (Optional)</label>
                                                    <input type="text" name="caption" class="form-control" placeholder="Enter a caption for News Header...">
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @for ($i = 0; $i < 3; $i++)
                                            <div class="image-group-{{ $what_category->id }} form-control mb-3">
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-12">
                                                        <label for="image_{{ $i }}">Image</label>
                                                        <input type="file" name="image[]" accept="image/jpeg" required>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-12">
                                                        <label>Image Caption (Optional)</label>
                                                        <input type="text" name="caption" class="form-control" placeholder="Enter a caption...">
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    @endif
                                </div>

                                <div class="d-flex justify-content-end mt-3">
                                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </button>
                                    <a href="{{ route('covers.show', $what_category->id) }}" class="btn btn-primary" style="margin-left: 15px;">
                                        <i class="fa fa-eye"></i>&nbsp;Preview
                                    </a>
                                    <button type="submit" class="btn btn-danger" style="margin-left: 15px;">
                                        <i class="fa fa-external-link"></i> Upload
                                    </button>
                                </div>
                            </form>

                            @if(!$what_category->covers->isEmpty())
                                <div class="row mt-5 position-relative">
                                    <div class="col">
                                        <h3 class="title">Uploaded Images <span>(Change Images' order with Drag and Drop - The first image is The Cover)</span></h3>
                                            <form action="{{ route('covers.delete',[$what_category->id])}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <ul class="image-sortable" id="image-list-{{$what_category->id}}">
                                                            @foreach($what_category->covers as $img)
                                                                <input type="hidden" name="what_category_id" value="{{ $img->what_category_id }}">

                                                                <li class="image-checkbox" id="image_{{ $img->id }}" style="position: relative; display: inline-block;">
    
                                                                    <div style="position: relative; display: inline-block; max-width: 100%; overflow: hidden; border-radius: 4px;">
                                                                        
                                                                        <img class="img-responsive" id="{{$img['id']}}" src="{{ $img->image_path }}" style="display: block; max-width: 100%; height: auto;" />
                                                                        
                                                                        @if($what_category->id == 40)
                                                                            <div class="image-caption-overlay">
                                                                                
                                                                                <button type="button" class="btn-edit-caption" data-id="{{ $img->id }}" data-caption="{{ $img->caption }}" title="Edit Caption">
                                                                                    <i class="bi bi-pencil-square"></i>
                                                                                </button>
                                                                                
                                                                                <span id="caption-display-{{ $img->id }}" class="image-caption-text">
                                                                                    {{ $img->caption }}
                                                                                </span>
                                                                                
                                                                            </div>
                                                                        @endif

                                                                    </div>

                                                                    <input type="checkbox" name="selected_images[{{ $img->id }}]" value="1" />
                                                                    <i class="fa fa-check hidden"></i>
                                                                    
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="position-relative" style="top: 110px;">
                                                    <button class="btn btn-danger show_confirm icon-btn" type="submit">
                                                        <i class="fa save fa-trash-o"></i>
                                                    </button>
                                                    <span> Delete Selected Images</span>
                                                </div>
                                            </form>
                                            
                                            <button style="cursor: pointer;" id="selectBtn" class="btn btn-primary icon-btn position-relative mb-1">
                                                <i class='fa save' style="left: 10px;">&#xf00c;</i>
                                                <input style="cursor: pointer;" id="selectAll" type="checkbox" class="icon-btn" name="selectAll" onchange="selectAll(this)"/>
                                            </button>
                                            <span> Select/Deselect All Image</span>
                                            
                                            @if($what_category->id != 40)
                                                <form class="order-form" action="/admin/covers/order/{{$what_category->id}}" method="POST" enctype="multipart/form-data">
                                                    @method('POST')
                                                    @csrf
                                                    <div id="submit-container" class="position-relative mb-1">
                                                        <button type='submit' data-id="{{ $what_category->id }}" class="btn btn-primary icon-btn submit-order-btn" value="">
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

{{-- --- GLOBAL SWEETALERT FOR SESSION MESSAGES --- --}}
@if(session('success'))
    <script>
        $(document).ready(function() {
            swal({
                title: "Success!",
                text: "{{ session('success') }}",
                type: "success",
                timer: 2000,
                showConfirmButton: false
            });
        });
    </script>
@endif
@if(session('error'))
    <script>
        $(document).ready(function() {
            swal({
                title: "Error!",
                text: "{{ session('error') }}",
                type: "error",
                confirmButtonColor: '#b5121b'
            });
        });
    </script>
@endif

<script>
    $(document).ready(function () {
        let url1 = window.location.href;
        let url2 = new URL(url1);
        let tab = url2.searchParams.get("tab");
        if(tab) {
            let t = document.getElementById(tab + "Tab");
            if(t) {
                let tt = new bootstrap.Tab(t);
                tt.show();
            }
        }
    });
</script>
<script>
    $(function () {
        $(document).on('click', '.projectTab', function () {
            const tabValue = $(this).data('tab');
            let url = new URL(window.location.href);
            url.searchParams.set('tab', tabValue);
            window.history.pushState({path: url.href}, '', url.href);
        });
    });
</script>
<script>
    function addImageGroup(id) {
        if (id === 40) return;
        let image_group = '';
        let container = $('#images-group-' + id);
        let desiredCount = parseInt(document.getElementById('images-count-' + id).value);
        let currentCount = container.children('.image-group-' + id).length;
        while (currentCount < desiredCount) {
            if(id !== 0)
                image_group +=
                    '<div class="image-group-' + id + ' form-control mb-3">' +
                    '<div class="row">' +
                    '<div class="form-group col-lg-6 col-md-6 col-12">' +
                    '<label>Image</label>' +
                    '<input accept="image/jpeg" required name="image[]" type="file" style="padding-left: 3px;">' +
                    '</div>' +
                    '<div class="form-group col-lg-6 col-md-6 col-12">' +
                    '<label>Image Caption (Optional)</label>' +
                    '<input type="text" name="caption" class="form-control" placeholder="Enter a caption...">' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            else
                image_group +=
                    '<div class="image-group-'+id+' form-control mb-3">'+
                    '<div class="row">'+
                    '<div class="form-group col-lg-6 col-md-6 col-12">' +
                    '<label for="small_image">Small Image&nbsp;</label>' +
                    '<input type="file" name="small_image[]" accept="image/jpeg" required>' +
                    '</div>' +
                    '<div class="form-group col-lg-6 col-md-6 col-12">' +
                    '<label for="big_image">Large Image&nbsp;</label>' +
                    '<input type="file" name="big_image[]" accept="image/jpeg" required>' +
                    '</div>' +
                    '<div class="form-group col-12 mt-2">' +
                    '<label>Image Caption (Optional)</label>' +
                    '<input type="text" name="caption" class="form-control" placeholder="Enter a caption...">' +
                    '</div>' +
                    '</div>'+
                    '</div>';
            container.append(image_group);
            currentCount++;
        }
        while (currentCount > desiredCount) {
            container.children('.image-group-' + id).last().remove();
            currentCount--;
        }
    }
</script>
<script>
    // image gallery checkbox logic
    $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
        } else {
            $(this).removeClass('image-checkbox-checked');
        }
    });

    $(".image-checkbox").on("click", function (e) {
        // Prevent click if we are clicking the edit button
        if($(e.target).closest('.btn-edit-caption').length > 0) return;

        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked", !$checkbox.prop("checked"))
        e.preventDefault();
    });
</script>
<script>
    function selectAll(myCheckBox) {
        if (myCheckBox.checked === true) {
            $('#selectBtn').removeClass('btn-primary').addClass('btn-success');
            $(".image-checkbox").each(function () {
                let $checkbox = $(this).find('input[type="checkbox"]');
                $checkbox.prop("checked", true)
                $(this).addClass('image-checkbox-checked');
            })
        } else {
            $('#selectBtn').addClass('btn-primary').removeClass('btn-success');
            $(".image-checkbox").each(function () {
                let $checkbox = $(this).find('input[type="checkbox"]');
                $checkbox.prop("checked", false)
                $(this).removeClass('image-checkbox-checked');
            })
        }
    }
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

        if (check.includes("true")) {
            swal({
                title: `Are you sure you want to delete images? `,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b5121b',
                confirmButtonText: 'Delete',
            }).then(function (result) {
                if (result) {
                    form.submit();
                }
            }, function (dismiss) {});
        } else {
            swal({
                title: 'No Images Selected',
                text: 'Please select images !!',
                type: 'info'
            });
        }
    });

    // ----------------------------------------------------
    // EDIT CAPTION AJAX LOGIC
    // ----------------------------------------------------
    $('.btn-edit-caption').click(function(e) {
        e.preventDefault();
        e.stopPropagation(); // Stop checkbox from triggering

        let imageId = $(this).data('id');
        let currentCaption = $(this).attr('data-caption') || ""; 
        let btnInstance = $(this);

        swal({
            title: 'Edit Caption',
            input: 'text',
            inputValue: currentCaption,
            showCancelButton: true,
            confirmButtonText: 'Save Caption',
            showLoaderOnConfirm: true,
            preConfirm: function (newCaption) {
                return new Promise(function (resolve, reject) {
                    $.ajax({
                        url: "{{ route('covers.updateCaption') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            image_id: imageId,
                            caption: newCaption
                        },
                        success: function(response) {
                            resolve(response);
                        },
                        error: function() {
                            reject('Failed to update the caption. Please try again.');
                        }
                    });
                });
            },
            allowOutsideClick: false
        }).then(function (response) {
            if (response && response.success) {
                swal({
                    type: 'success',
                    title: 'Updated!',
                    text: 'The caption has been saved.',
                    timer: 1500,
                    showConfirmButton: false
                });

                // Update UI dynamically
                let displayDiv = $('#caption-display-' + imageId);
                btnInstance.attr('data-caption', response.caption); 
                
                // We keep the div visible for the UI layout, but empty the text if null
                displayDiv.text(response.caption ? response.caption : '');
            }
        });
    });

    // ----------------------------------------------------
    // REORDER AJAX LOGIC (Prevent raw text redirect)
    // ----------------------------------------------------
    $('.order-form').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        let categoryId = form.find('button[type="submit"]').data('id');
        
        // Grab ordered IDs from the Sortable UI
        let imageIds = [];
        $('#image-list-' + categoryId + ' li').each(function() {
            let imgId = $(this).attr('id').replace('image_', '');
            imageIds.push(imgId);
        });

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                what_category_id: categoryId,
                imageIds: imageIds
            },
            success: function(response) {
                swal({
                    title: "Saved!",
                    text: response, // Reads "Images has been reordered !!" from Controller
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false
                });
            },
            error: function() {
                swal({
                    title: "Error",
                    text: "Failed to save order",
                    type: "error"
                });
            }
        });
    });

    // ----------------------------------------------------
    // CATEGORY 40 OVERWRITE WARNING LOGIC
    // ----------------------------------------------------
    $('.cover-upload-form').on('submit', function(e) {
        let form = $(this);
        let categoryId = form.data('category');
        let hasImages = form.data('has-images');

        if (categoryId == 40 && hasImages === true) {
            e.preventDefault();
            swal({
                title: 'Replace Header?',
                text: 'Uploading a new header will automatically replace the existing one. Do you want to continue?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b5121b',
                confirmButtonText: 'Yes, Replace it!'
            }).then(function (result) {
                if (result) {
                    form[0].submit(); 
                }
            }, function(dismiss) {});
        }
    });

</script>
<script>
    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });
</script>
@stack('imageOrder')
<script>
    $(document).on('change', 'input[type="file"]', function(e) {
        if (!this.files || this.files.length === 0) return;

        let file = this.files[0];
        let fileSizeKB = file.size / 1024;
        
        let categoryId = $(this).closest('.tab-pane').attr('id');
        let isNewsHeader = categoryId === 'project-40';
        
        let limitKB = isNewsHeader ? 600 : 2048; 
        let labelName = isNewsHeader ? "News Header Image" : "Cover Image";

        if (fileSizeKB > limitKB) {
            swal({
                title: 'File Too Large',
                text: `The ${labelName} must be less than ${limitKB}KB. Your file is ${Math.round(fileSizeKB)}KB.`,
                type: 'error',
                confirmButtonColor: '#b5121b'
            });
            
            $(this).val(''); 
        }
    });
</script>
</body>
</html>