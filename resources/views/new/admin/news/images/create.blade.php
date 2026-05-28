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
    <title>Admin | Add News Images</title>

    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <link href="{{asset('css/our-news.css')}}" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

@stack('navbar_body')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-11 col-sm-11 col-11">
            <div id="projects">
                <div class="row">
                    <div class="col">
                        @include('new.admin.messages')
                        @if(session('placement_error'))
                            <div class="alert alert-danger fw-bold mt-3">
                                <i class="fa fa-exclamation-triangle"></i> {{ session('placement_error') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h3 class="title">Add Image</h3>
                        <form id="newsImageForm" action="{{ route('news.images.store',[$news->id])}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                            @csrf

                            <div class="row mb-3 mt-4">
                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" value="{{ optional($news->english)->title ?? 'No Title' }}" class="form-control custom-cursor-disabled" readonly>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <label class="form-label">Tags</label>
                                    <div class="form-control news-info-tag-container">
                                        @foreach($news->tags as $tag)
                                            <span class="badge red-brand-bg me-1">{{ $tag->name }}</span>
                                        @endforeach
                                        @if($news->tags->isEmpty())
                                            <span class="text-muted">No Tags Attached</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" value="{{ $news->place->name ?? 'N/A' }}" class="form-control custom-cursor-disabled" readonly>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <label class="form-label">News Date</label>
                                    <div class="form-control custom-cursor-disabled">
                                        <i class="fa fa-calendar text-muted me-2"></i>
                                        {{ $news->date ? \Carbon\Carbon::parse($news->date)->format('M d, Y') : 'N/A' }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3 col-md-3 col-12">
                                    <label for="images-count" class="form-label">Images Count</label>
                                    <input id="images-count" type="number" class="form-control" step="1" 
                                           value="{{ $hasLocalRegular ? '0' : '3' }}" 
                                           min="{{ $hasLocalRegular ? '0' : '1' }}" onchange="addImageGroup()">
                                </div>
                            </div>

                            <div class="mb-3" id="images-group">
                                @if(!$hasLocalRegular)
                                    @for($i=0; $i<3; $i++)
                                        <div class="image-group mb-3 border p-3 rounded bg-light">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12 mb-3 mb-md-0">
                                                    <label class="form-label">Small Image</label>
                                                    <input type="file" name="small_image[]" accept="image/jpeg" class="form-control" required>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <label class="form-label">Large Image</label>
                                                    <input type="file" name="big_image[]" accept="image/jpeg" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @endif
                            </div>

                            <h3 class="title mt-5 mb-4">News Thumbnails & Placement</h3>

                            <div class="special-upload-box mb-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-12">
                                        <label for="thumbnail_image" class="fs-5 fw-bold">
                                            1:1 Default Thumbnail @if(!$hasLocalThumbnail)<span class="text-danger">*</span>@endif
                                        </label>
                                        <p class="text-muted small mb-0">REQUIRED for main site card feeds.</p>
                                    </div>
                                    <div class="col-lg-6 col-12 mt-2 mt-lg-0">
                                        <input type="file" name="thumbnail_image" id="thumbnail_image" accept="image/jpeg" @if(!$hasLocalThumbnail) required @endif class="form-control crop-trigger">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <label class="placement-card" id="card_important" for="check_important">
                                        <input class="placement-checkbox" type="checkbox" name="is_important" id="check_important" value="1">
                                        <div class="d-flex align-items-start mb-2">
                                            <div class="custom-radio-btn mt-1"></div>
                                            <div>
                                                <h5 class="mb-1 fw-bold">Mark as Important News</h5>
                                                <p class="text-muted small mb-0">3:2 Aspect Ratio. Only ONE news can be important globally.</p>
                                            </div>
                                        </div>
                                        <div id="important_upload_area" class="upload-sub-area mt-3">
                                            <label class="fw-bold text-dark form-label">Upload 3:2 Image <span class="text-danger">*</span></label>
                                            <input type="file" name="important_image" id="important_image" accept="image/jpeg" class="form-control crop-trigger">
                                        </div>
                                    </label>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <label class="placement-card" id="card_pinned" for="check_pinned">
                                        <input class="placement-checkbox" type="checkbox" name="is_pinned" id="check_pinned" value="1">
                                        <div class="d-flex align-items-start mb-2">
                                            <div class="custom-radio-btn mt-1"></div>
                                            <div>
                                                <h5 class="mb-1 fw-bold">Mark as Pinned News</h5>
                                                <p class="text-muted small mb-0">2:1 Aspect Ratio. Multiple news can be pinned at the same time.</p>
                                            </div>
                                        </div>
                                        <div id="pinned_upload_area" class="upload-sub-area mt-3">
                                            <label class="fw-bold text-dark form-label">Upload 2:1 Image <span class="text-danger">*</span></label>
                                            <input type="file" name="pinned_image" id="pinned_image" accept="image/jpeg" class="form-control crop-trigger">
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-secondary" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i> Back
                                </button>
                                <a href="{{route('news.show', [$news->id])}}" class="btn btn-secondary ms-3">
                                    <i class="fa fa-eye"></i>&nbsp;View
                                </a>
                                <button type="button" id="submitFormBtn" class="btn btn-danger ms-3">
                                    <i class="fa fa-upload"></i> Upload
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                @if(!$images->isEmpty())
                    <div class="row mt-5">
                        <div class="col">
                            <h3 class="title">Uploaded Images</h3>
                            <form action="{{ route('news.images.destroy',[$news->id])}}" method="POST" id="delete-images-form">
                                @csrf
                                @pragma('method','DELETE')
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="d-flex flex-wrap mt-4 gap-3">
                                    @php $sortedImages = $images->sortBy(fn($img) => $img['sizetype'] ?? 3); @endphp
                                    @foreach($sortedImages as $img)
                                        <div class="image-card-wrapper">
                                            @php
                                                $sType = $img['sizetype'] ?? 3;
                                                $ribbon = match($sType) {
                                                    0 => ['icon' => 'fa-image', 'txt' => '1:1 Thumbnail'],
                                                    1 => ['icon' => 'fa-star', 'txt' => '3:2 Important'],
                                                    2 => ['icon' => 'fa-thumb-tack', 'txt' => '2:1 Pinned'],
                                                    default => null
                                                };
                                            @endphp

                                            @if($ribbon)
                                                <div class="ribbon-wrapper">
                                                    <div class="bookmark-ribbon" title="{{ $ribbon['txt'] }}">
                                                        <i class="fa {{ $ribbon['icon'] }}"></i>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="image-inner">
                                                <img src="{{$img['path']}}" class="img-managed" />
                                                <input type="checkbox" name="{{$img['id']}}" value="1" class="d-none"/>
                                                <div class="action-overlay">
                                                    <button type="button" class="action-btn btn-view-full" data-src="{{$img['path']}}">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button type="button" class="action-btn btn-select-del">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </div>
                                                <div class="selection-overlay"><i class="fa fa-check"></i></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="d-flex align-items-center mt-5 pt-3 border-top gap-3">
                                    <button type="button" id="selectBtn" class="btn btn-secondary" onclick="toggleSelectAll()">
                                        <i class="fa fa-check-square-o"></i> Select/Deselect All
                                    </button>
                                    <button class="btn btn-danger show_confirm" type="submit">
                                        <i class="fa fa-trash-o"></i> Delete Selected Images
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewImageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0 pb-0 justify-content-end">
                <button type="button" class="btn btn-light rounded-circle modal-close-round" data-bs-dismiss="modal">X</button>
            </div>
            <div class="modal-body text-center p-0 mt-2">
                <img src="" id="lightbox-img" class="img-fluid shadow-lg rounded lightbox-img-custom">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cropModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title"><i class="fa fa-crop"></i> Adjust & Crop Image</h5>
            </div>
            <div class="modal-body p-0">
                <div class="img-container-cropper">
                    <img id="image-to-crop" src="">
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" id="cancel-crop-btn">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm-crop-btn">
                    <i class="fa fa-check"></i> Crop & Confirm
                </button>
            </div>
        </div>
    </div>
</div>

@stack('navbar_scripts')

<script>
    let image_group = '<div class="image-group mb-3 border p-3 rounded bg-light">' +
        '<div class="row">' +
        '<div class="col-lg-6 col-md-6 col-12 mb-3 mb-md-0">' +
        '<label class="form-label">Small Image</label>' +
        '<input accept="image/jpeg" required name="small_image[]" type="file" class="form-control">' +
        '</div><div class="col-lg-6 col-md-6 col-12">' +
        '<label class="form-label">Large Image</label>' +
        '<input accept="image/jpeg" required name="big_image[]" type="file" class="form-control">' +
        '</div></div>' +
        '</div>';
        
    let images_count = parseInt(document.getElementById('images-count').value);

    function addImageGroup() {
        let count = parseInt(document.getElementById('images-count').value) || 0;
        let floorLimit = {{ $hasLocalRegular ? 0 : 1 }};
        
        if (count < floorLimit) {
            count = floorLimit;
        }

        if (count > images_count) {
            while(count > images_count) {
                images_count++;
                $('#images-group').append(image_group);
            }
        } else if (images_count > count) {
            while(images_count > count && images_count > floorLimit) {
                images_count--;
                $('#images-group').children().last().remove();
            }
        }
        document.getElementById('images-count').value = images_count;
    }

    // Interactive Action Alert Interceptors
    $('#submitFormBtn').on('click', function(e) {
        e.preventDefault();
        
        let localThumbExists = {{ $hasLocalThumbnail ? 'true' : 'false' }};
        let localImportantExists = {{ $hasLocalImportant ? 'true' : 'false' }};
        let localPinnedExists = {{ $hasLocalPinned ? 'true' : 'false' }};
        let globalImportantId = "{{ $globalImportantId }}";

        let newThumbSelected = $('#thumbnail_image').val();
        let isImportantChecked = $('#check_important').is(':checked');
        let newImportantSelected = $('#important_image').val();
        let isPinnedChecked = $('#check_pinned').is(':checked');
        let newPinnedSelected = $('#pinned_image').val();

        // Check 1: Thumbnail missing validation
        if (!localThumbExists && !newThumbSelected) {
            swal('Thumbnail Required', 'Please upload a default 1:1 thumbnail image to continue.', 'error');
            return;
        }

        let runSubmit = () => { $('#newsImageForm').submit(); };

        // Check 2: Intercept global overwrite shifts
        if (isImportantChecked && globalImportantId !== "") {
            swal({
                title: 'Change Global Important News?',
                text: "Another article is currently set as Important. Making this one Important will replace it.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, replace it'
            }).then((result) => { if (result) executeLocalOverwritesCheck(); });
        } else {
            executeLocalOverwritesCheck();
        }

        function executeLocalOverwritesCheck() {
            // Check 3: Intercept local thumbnail replacement
            if (localThumbExists && newThumbSelected) {
                swal({
                    title: 'Replace Thumbnail?',
                    text: "This article already has a thumbnail. Uploading a new one will replace the old file.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, replace it'
                }).then((result) => { if (result) checkImportantLocal(); });
            } else {
                checkImportantLocal();
            }
        }

        function checkImportantLocal() {
            // Check 4: Intercept local important replacement
            if (isImportantChecked && localImportantExists && newImportantSelected) {
                swal({
                    title: 'Replace Important Image?',
                    text: "An Important image already exists for this article. Uploading a new one will replace it.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, replace it'
                }).then((result) => { if (result) checkPinnedLocal(); });
            } else {
                checkPinnedLocal();
            }
        }

        function checkPinnedLocal() {
            // Check 5: Intercept local pinned replacement
            if (isPinnedChecked && localPinnedExists && newPinnedSelected) {
                swal({
                    title: 'Replace Pinned Image?',
                    text: "A Pinned image already exists for this article. Uploading a new one will replace it.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, replace it'
                }).then((result) => { if (result) runSubmit(); });
            } else {
                runSubmit();
            }
        }
    });

    // Placement UI toggle handling alterations
    $('.placement-checkbox').on('change', function() {
        let id = $(this).attr('id');
        let checked = $(this).is(':checked');

        if (id === 'check_important') {
            if (checked) {
                $('#check_pinned').prop('checked', false).trigger('change');
                $('#card_important').addClass('active').removeClass('dimmed');
                $('#important_upload_area').slideDown();
                $('#important_image').prop('required', true);
            } else {
                $('#card_important').removeClass('active');
                $('#important_upload_area').slideUp();
                $('#important_image').prop('required', false);
            }
        }

        if (id === 'check_pinned') {
            if (checked) {
                $('#check_important').prop('checked', false).trigger('change');
                $('#card_pinned').addClass('active').removeClass('dimmed');
                $('#pinned_upload_area').slideDown();
                $('#pinned_image').prop('required', true);
            } else {
                $('#card_pinned').removeClass('active');
                $('#pinned_upload_area').slideUp();
                $('#pinned_image').prop('required', false);
            }
        }

        if (!$('#check_important').is(':checked') && !$('#check_pinned').is(':checked')) {
            $('.placement-card').removeClass('dimmed active');
        } else {
            $('.placement-card:not(.active)').addClass('dimmed');
        }
    });

    // Gallery and Cropper logic remains fully functional
    $('.image-card-wrapper').on('click', function() {
        $('.image-card-wrapper').removeClass('show-actions');
        $(this).addClass('show-actions');
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.image-card-wrapper').length) {
            $('.image-card-wrapper').removeClass('show-actions');
        }
    });

    $('.btn-view-full').on('click', function(e) {
        e.stopPropagation();
        $('#lightbox-img').attr('src', $(this).data('src'));
        $('#viewImageModal').modal('show');
    });

    $('.btn-select-del').on('click', function(e) {
        e.stopPropagation();
        let wrapper = $(this).closest('.image-card-wrapper');
        wrapper.find('input[type="checkbox"]').prop("checked", true);
        wrapper.addClass('selected').find('.selection-overlay').css('display', 'flex');
    });

    $('.selection-overlay').on('click', function(e) {
        e.stopPropagation();
        let wrapper = $(this).closest('.image-card-wrapper');
        wrapper.find('input[type="checkbox"]').prop("checked", false);
        wrapper.removeClass('selected');
        $(this).css('display', 'none');
    });

    function toggleSelectAll() {
        let allSelected = $('#selectBtn').hasClass('btn-success');
        if (!allSelected) {
            $('#selectBtn').removeClass('btn-secondary').addClass('btn-success');
            $(".image-card-wrapper").addClass('selected').find('input[type="checkbox"]').prop("checked", true);
            $(".selection-overlay").css('display', 'flex');
        } else {
            $('#selectBtn').addClass('btn-secondary').removeClass('btn-success');
            $(".image-card-wrapper").removeClass('selected').find('input[type="checkbox"]').prop("checked", false);
            $(".selection-overlay").css('display', 'none');
        }
    }

    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();
        if ($(".image-card-wrapper.selected").length > 0) {
            swal({
                title: 'Delete selected images?',
                text: 'This action cannot be undone.',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete them'
            }).then((result) => { if (result) form.submit(); });
        } else {
            swal('No images selected', 'Please click the checkmarks on the images you want to delete.', 'info');
        }
    });

    let cropper;
    let currentFileInput;
    const ratios = { 'thumbnail_image': 1, 'important_image': 1.5, 'pinned_image': 2 };

    $('.crop-trigger').on('change', function(e) {
        currentFileInput = this;
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#image-to-crop').attr('src', e.target.result);
            $('#cropModal').modal('show');
        };
        reader.readAsDataURL(this.files[0]);
    });

    $('#cropModal').on('shown.bs.modal', function() {
        cropper = new Cropper(document.getElementById('image-to-crop'), {
            aspectRatio: ratios[currentFileInput.id],
            viewMode: 1,
            dragMode: 'move'
        });
    }).on('hidden.bs.modal', function() {
        if (cropper) cropper.destroy();
    });

    $('#confirm-crop-btn').click(function() {
        cropper.getCroppedCanvas().toBlob((blob) => {
            let file = new File([blob], "cropped.jpg", { type: "image/jpeg" });
            let dt = new DataTransfer();
            dt.items.add(file);
            currentFileInput.files = dt.files;
            $('#cropModal').modal('hide');
        }, 'image/jpeg');
    });

    $('#cancel-crop-btn').click(() => $('#cropModal').modal('hide'));
</script>
@include('new.admin.scripts.popup-messages')
</body>
</html>