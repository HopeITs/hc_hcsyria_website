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

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    {{--@stack('navbar_styles')--}}
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <style>
        #selectAll {
            opacity: 0;
            display: block !important;
            position: relative;
            right: 5px;
            bottom: 5px;
        }

        .special-upload-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .placement-card {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            cursor: pointer;
            background-color: #fff;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            display: block;
            margin: 0;
        }
        .placement-card:hover {
            border-color: #cbd3da;
        }
        .placement-checkbox {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        .custom-radio-btn {
            width: 22px;
            height: 22px;
            border: 2px solid #adb5bd;
            border-radius: 50%;
            display: inline-block;
            margin-right: 15px;
            position: relative;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }
        .placement-card.active {
            border-color: #C92228;
            background-color: #fffafb;
            box-shadow: 0 4px 12px rgba(201, 34, 40, 0.08);
        }
        .placement-card.active .custom-radio-btn {
            border-color: #C92228;
        }
        .placement-card.active .custom-radio-btn::after {
            content: '';
            width: 10px;
            height: 10px;
            background: #C92228;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .placement-card.dimmed {
            opacity: 0.4;
            background-color: #f8f9fa;
            border-color: #e9ecef;
        }

        .img-container {
            max-height: 60vh;
            width: 100%;
            background-color: #222;
            display: flex;
            justify-content: center;
            overflow: hidden;
        }
        .img-container img {
            max-width: 100%;
            display: block;
        }


        .image-card-wrapper {
            width: 180px;
            height: 180px;
            background: #fff;
            border-radius: 12px;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
            border: 2px solid transparent;
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
        }
        .image-card-wrapper:hover {
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }
        .image-card-wrapper.selected {
            border-color: #C92228;
            background-color: #fffafb;
        }

        .ribbon-wrapper {
            position: absolute;
            top: -4px;
            right: 18px;
            z-index: 25;
            filter: drop-shadow(0 3px 3px rgba(0,0,0,0.3));
        }
        .bookmark-ribbon {
            width: 26px;
            height: 40px;
            background: #C92228;
            color: #fff !important;
            clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 80%, 0 100%);
            display: flex;
            justify-content: center;
            padding-top: 6px;
            cursor: help;
            transition: transform 0.2s ease;
        }
        .bookmark-ribbon i {
            color: #ffffff !important;
        }
        .bookmark-ribbon:hover {
            transform: scale(1.05);
        }

        .image-inner {
            width: 100%;
            height: 100%;
            border-radius: 6px;
            overflow: hidden;
            position: relative;
        }

        .action-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(20, 20, 20, 0.3);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            opacity: 0;
            transition: all 0.3s ease;
            pointer-events: none;
        }
        .image-card-wrapper:hover .action-overlay,
        .image-card-wrapper.show-actions .action-overlay {
            opacity: 1;
            pointer-events: auto;
        }
        .action-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transform: translateY(15px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 10px rgba(0,0,0,0.25);
        }
        .image-card-wrapper:hover .action-btn,
        .image-card-wrapper.show-actions .action-btn {
            transform: translateY(0);
            opacity: 1;
        }
        .action-btn.btn-view {
            background: #fff;
            color: #333;
            transition-delay: 0.05s;
        }
        .action-btn.btn-view:hover {
            background: #f0f0f0;
            transform: scale(1.1);
        }
        .action-btn.btn-select {
            background: #C92228;
            color: #fff;
            transition-delay: 0.1s;
        }
        .action-btn.btn-select:hover {
            background: #a81c21;
            transform: scale(1.1);
        }

        .selection-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(201, 34, 40, 0.2);
            backdrop-filter: blur(1px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 20;
            cursor: pointer;
        }
        .selection-overlay i {
            font-size: 3.5rem;
            color: #fff;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.4));
            transform: scale(0);
            animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes popIn {
            to { transform: scale(1); }
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

                        @if(session('placement_error'))
                            <div class="alert alert-danger font-weight-bold" style="margin-top: 15px;">
                                <i class="fa fa-exclamation-triangle"></i> {{ session('placement_error') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="title">Add Image</h3>
                        <form action="{{ route('news.images.store',[$news->id])}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                            @csrf

                            <div class="row mb-3 mt-4">
                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" value="{{ optional($news->english)->title ?? 'No Title' }}" class="form-control" readonly style="cursor: not-allowed; background-color: #f8f9fa;">
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <label>Tags</label>
                                    <div class="form-control" style="background-color: #e9ecef; cursor: not-allowed; height: auto; min-height: 38px;">
                                        @foreach($news->tags as $tag)
                                            <span class="badge" style="background-color: #C92228; color: white; margin-right: 2px;">{{ $tag->name }}</span>
                                        @endforeach
                                        @if($news->tags->isEmpty())
                                            <span class="text-muted">No Tags Attached</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-12 mt-2">
                                    <label>City</label>
                                    <input type="text" value="{{ $news->place->name ?? 'N/A' }}" class="form-control" readonly style="cursor: not-allowed; background-color: #f8f9fa;">
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-12 mt-2">
                                    <label>Publish Date</label>
                                    <div class="form-control" style="background-color: #f8f9fa; cursor: not-allowed;">
                                        <i class="fa fa-calendar text-muted mr-2"></i>
                                        {{ $news->date ? \Carbon\Carbon::parse($news->date)->format('M d, Y - h:i A') : 'N/A' }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    <label for="image-count">Images Count</label>
                                    <input id="images-count" type="number" class="form-control" step="1" value="3" min="1" onchange="addImageGroup()">
                                </div>
                            </div>

                            <div class="mb-3" id="images-group">
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="small_image">Small Image</label>
                                            <input type="file" name="small_image[]" accept="image/jpeg" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="big_image">Large Image</label>
                                            <input type="file" name="big_image[]" accept="image/jpeg" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="small_image">Small Image</label>
                                            <input type="file" name="small_image[]" accept="image/jpeg" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="big_image">Large Image</label>
                                            <input type="file" name="big_image[]" accept="image/jpeg" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-group form-control">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="small_image">Small Image</label>
                                            <input type="file" name="small_image[]" accept="image/jpeg" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <label for="big_image">Large Image</label>
                                            <input type="file" name="big_image[]" accept="image/jpeg" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>

                            <h3 class="title">News Thumbnails & Placement</h3>

                            <div class="special-upload-box mb-4 mt-4" style="border-left: 4px solid #C92228;">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-12">
                                        <label for="thumbnail_image" style="font-size: 16px; font-weight: bold; color: #333;">
                                            1:1 Default Thumbnail <span class="text-danger">*</span>
                                        </label>
                                        <p class="text-muted small mb-0">REQUIRED. This image displays in all standard news grids.</p>
                                    </div>
                                    <div class="col-lg-6 col-12 mt-2 mt-lg-0">
                                        <input type="file" name="thumbnail_image" id="thumbnail_image" accept="image/jpeg" required class="form-control crop-trigger">
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
                                                <h5 class="mb-1" style="font-weight: 700; color: #333; font-size: 16px;">Mark as Important News</h5>
                                                <p class="text-muted small mb-0">Requires a 3:2 Aspect Ratio image. Only ONE news can be important.</p>
                                            </div>
                                        </div>
                                        <div id="important_upload_area" style="display: none; border-top: 1px solid #e9ecef; padding-top: 15px; margin-top: 15px;">
                                            <label for="important_image" class="font-weight-bold text-dark">Upload 3:2 Image <span class="text-danger">*</span></label>
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
                                                <h5 class="mb-1" style="font-weight: 700; color: #333; font-size: 16px;">Mark as Pinned News</h5>
                                                <p class="text-muted small mb-0">Requires a 2:1 Aspect Ratio image. Only ONE news can be pinned.</p>
                                            </div>
                                        </div>
                                        <div id="pinned_upload_area" style="display: none; border-top: 1px solid #e9ecef; padding-top: 15px; margin-top: 15px;">
                                            <label for="pinned_image" class="font-weight-bold text-dark">Upload 2:1 Image <span class="text-danger">*</span></label>
                                            <input type="file" name="pinned_image" id="pinned_image" accept="image/jpeg" class="form-control crop-trigger">
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-secondary" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i> Back
                                </button>
                                <a href="{{route('news.show', [$news->id])}}" class="btn btn-secondary" style="margin-left: 15px;">
                                    <i class="fa fa-eye"></i>&nbsp;View
                                </a>
                                <button type="submit" class="btn btn-danger" style="margin-left: 15px;">
                                    <i class="fa fa-upload"></i> Upload
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <br><br>

                @if(!$images->isEmpty())
                    <div class="row mt-4">
                        <div class="col">
                            <h3 class="title">Uploaded Images</h3>

                            <form action="{{ route('news.images.destroy',[$news->id])}}" method="POST" id="delete-images-form">
                                @csrf
                                @method('DELETE')

                                <div class="d-flex flex-wrap mt-4" style="gap: 20px;">
                                    @php
                                        $sortedImages = $images->sortBy(function($img) {
                                            return isset($img['sizetype']) ? $img['sizetype'] : 3;
                                        });
                                    @endphp

                                    @foreach($sortedImages as $img)

                                        <div class="image-card-wrapper">

                                            @php
                                                $sType = isset($img['sizetype']) ? $img['sizetype'] : 3;
                                                $showBookmark = false;
                                                $iconClass = '';
                                                $tooltipText = '';

                                                if($sType == 0) {
                                                    $showBookmark = true;
                                                    $iconClass = 'fa-image';
                                                    $tooltipText = '1:1 Thumbnail';
                                                } elseif($sType == 1) {
                                                    $showBookmark = true;
                                                    $iconClass = 'fa-star';
                                                    $tooltipText = '3:2 Important News';
                                                } elseif($sType == 2) {
                                                    $showBookmark = true;
                                                    $iconClass = 'fa-thumb-tack';
                                                    $tooltipText = '2:1 Pinned News';
                                                }
                                            @endphp

                                            @if($showBookmark)
                                                <div class="ribbon-wrapper">
                                                    <div title="{{ $tooltipText }}" class="bookmark-ribbon">
                                                        {{-- Added explicit inline styles to force white color --}}
                                                        <i class="fa {{ $iconClass }}" style="font-size: 13px; color: #ffffff !important;"></i>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="image-inner">
                                                <img src="{{$img['path']}}" style="width: 100%; height: 100%; object-fit: cover;" class="img-thumbnail-view" />
                                                <input type="checkbox" name="{{$img['id']}}" value="1" style="display: none;"/>

                                                <div class="action-overlay">
                                                    <button type="button" class="action-btn btn-view" data-src="{{$img['path']}}" title="View Full Image">
                                                        <i class="fa fa-eye" style="font-size: 16px;"></i>
                                                    </button>
                                                    <button type="button" class="action-btn btn-select" title="Select for Deletion">
                                                        <i class="fa fa-check" style="font-size: 16px;"></i>
                                                    </button>
                                                </div>

                                                <div class="selection-overlay">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>

                                <div class="d-flex align-items-center mt-5 pt-3" style="border-top: 1px solid #eee; gap: 15px;">
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

<div class="modal fade" id="viewImageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0 pb-0 justify-content-end">
                <button type="button" class="btn btn-light rounded-circle" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" style="width: 40px; height: 40px; font-weight: bold; box-shadow: 0 2px 10px rgba(0,0,0,0.5);">X</button>
            </div>
            <div class="modal-body text-center p-0 mt-2">
                <img src="" id="lightbox-img" class="img-fluid shadow-lg rounded" style="max-height: 85vh; width: auto; max-width: 100%; border: 3px solid white;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="cropModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="cropModalLabel" style="color: white; margin: 0;"><i class="fa fa-crop"></i> Adjust & Crop Image</h5>
            </div>
            <div class="modal-body p-0">
                <div class="img-container">
                    <img id="image-to-crop" src="">
                </div>
            </div>
            <div class="modal-footer" style="background-color: #f8f9fa;">
                <span class="text-muted small mr-auto" style="float: left;"><i class="fa fa-info-circle"></i> Scroll to zoom, click and drag to move grid.</span>
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
    let image_group = '<div class="image-group form-control">' +
        '<div class="row">' +
        '<div class="form-group col-lg-6 col-md-6 col-12">' +
        '<label for="small_image">Small Image&nbsp;</label>' +
        '<input accept="image/jpeg" required="" name="small_image[]" type="file" style="padding-left: 3px;">' +
        '</div><div class="form-group col-lg-6 col-md-6 col-12">' +
        '<label for="big_image">Large Image&nbsp;</label>' +
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
    $('.image-card-wrapper').on('click', function(e) {
        $('.image-card-wrapper').removeClass('show-actions');
        $(this).addClass('show-actions');
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.image-card-wrapper').length) {
            $('.image-card-wrapper').removeClass('show-actions');
        }
    });

    $('.btn-view').on('click', function(e) {
        e.stopPropagation();
        let src = $(this).data('src');
        $('#lightbox-img').attr('src', src);
        $('#viewImageModal').modal('show');
        $(this).closest('.image-card-wrapper').removeClass('show-actions');
    });

    $('.btn-select').on('click', function(e) {
        e.stopPropagation();
        let wrapper = $(this).closest('.image-card-wrapper');
        let checkbox = wrapper.find('input[type="checkbox"]');

        checkbox.prop("checked", true);
        wrapper.addClass('selected');
        wrapper.find('.selection-overlay').css('display', 'flex');
        wrapper.removeClass('show-actions');
    });

    $('.selection-overlay').on('click', function(e) {
        e.stopPropagation();
        let wrapper = $(this).closest('.image-card-wrapper');
        let checkbox = wrapper.find('input[type="checkbox"]');

        checkbox.prop("checked", false);
        wrapper.removeClass('selected');
        $(this).css('display', 'none');
    });

    let allSelected = false;
    function toggleSelectAll() {
        allSelected = !allSelected;
        if (allSelected) {
            $('#selectBtn').removeClass('btn-secondary').addClass('btn-success');
            $(".image-card-wrapper").each(function () {
                $(this).find('input[type="checkbox"]').prop("checked", true);
                $(this).addClass('selected');
                $(this).find('.selection-overlay').css('display', 'flex');
            });
        } else {
            $('#selectBtn').addClass('btn-secondary').removeClass('btn-success');
            $(".image-card-wrapper").each(function () {
                $(this).find('input[type="checkbox"]').prop("checked", false);
                $(this).removeClass('selected');
                $(this).find('.selection-overlay').css('display', 'none');
            });
        }
    }

    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        let check = [];
        event.preventDefault();

        $(".image-card-wrapper").each(function () {
            if ($(this).find('input[type="checkbox"]').is(':checked')) {
                check.push('true');
            }
        });

        if (check.length > 0) {
            swal({
                title: 'Are you sure you want to delete the selected images?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                if (result) {
                    form.submit();
                }
            }, function (dismiss) {});
        } else {
            swal('Notice', 'Please select at least one image to delete.', 'info');
        }
    });

    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });
</script>

<script>
    $(document).ready(function() {
        $('.placement-checkbox').on('change', function() {
            let isImportant = $('#check_important').is(':checked');
            let isPinned = $('#check_pinned').is(':checked');

            if ($(this).attr('id') === 'check_important' && isImportant) {
                $('#check_pinned').prop('checked', false);
                isPinned = false;
            } else if ($(this).attr('id') === 'check_pinned' && isPinned) {
                $('#check_important').prop('checked', false);
                isImportant = false;
            }

            if (isImportant) {
                $('#card_important').addClass('active').removeClass('dimmed');
                $('#important_upload_area').slideDown();
                $('#important_image').prop('required', true);
                $('#card_pinned').removeClass('active').addClass('dimmed');

                @if(isset($hasImportant) && $hasImportant)
                swal('Notice', 'An Important News article already exists. Adding this will replace it!', 'info');
                @endif
            } else {
                $('#card_important').removeClass('active');
                $('#important_upload_area').slideUp();
                $('#important_image').prop('required', false).val('');
            }

            if (isPinned) {
                $('#card_pinned').addClass('active').removeClass('dimmed');
                $('#pinned_upload_area').slideDown();
                $('#pinned_image').prop('required', true);
                $('#card_important').removeClass('active').addClass('dimmed');

                @if(isset($hasPinned) && $hasPinned)
                swal('Notice', 'A Pinned News article already exists. Adding this will replace it!', 'info');
                @endif
            } else {
                $('#card_pinned').removeClass('active');
                $('#pinned_upload_area').slideUp();
                $('#pinned_image').prop('required', false).val('');
            }

            if (!isImportant && !isPinned) {
                $('#card_important, #card_pinned').removeClass('dimmed active');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        let cropper;
        let currentFileInput;
        let cropConfirmed = false;

        const aspectRatios = {
            'thumbnail_image': 1 / 1,   // 1:1
            'important_image': 3 / 2,   // 3:2
            'pinned_image': 2 / 1       // 2:1
        };

        $('.crop-trigger').on('change', function(e) {
            let files = e.target.files;
            currentFileInput = this;
            cropConfirmed = false;

            if (files && files.length > 0) {
                let file = files[0];

                if (!file.type.match('image.*')) {
                    swal("Error", "Please select a valid image file.", "error");
                    $(this).val('');
                    return;
                }

                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-to-crop').attr('src', e.target.result);
                    $('#cropModal').modal('show');
                };
                reader.readAsDataURL(file);
            }
        });

        $('#cropModal').on('shown.bs.modal', function() {
            let img = document.getElementById('image-to-crop');
            let inputId = $(currentFileInput).attr('id');
            let targetRatio = aspectRatios[inputId];

            cropper = new Cropper(img, {
                aspectRatio: targetRatio,
                viewMode: 1,
                dragMode: 'move',
                background: false,
                guides: true,
                autoCropArea: 0.9,
                zoomable: true,
            });
        }).on('hidden.bs.modal', function() {
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
            if (!cropConfirmed && currentFileInput) {
                $(currentFileInput).val('');
            }
        });

        $('#confirm-crop-btn').click(function() {
            if (!cropper) return;

            let canvas = cropper.getCroppedCanvas({
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
            });

            canvas.toBlob(function(blob) {
                let originalName = currentFileInput.files[0].name;

                let croppedFile = new File([blob], "cropped_" + originalName, {
                    type: "image/jpeg",
                    lastModified: new Date().getTime()
                });

                let container = new DataTransfer();
                container.items.add(croppedFile);
                currentFileInput.files = container.files;

                cropConfirmed = true;

                let labelBox = $(currentFileInput).closest('.row, .placement-card').find('.text-muted').first();
                if(!labelBox.data('original-text')) {
                    labelBox.data('original-text', labelBox.html());
                }
                labelBox.html('<span class="text-success" style="font-weight:bold;"><i class="fa fa-check"></i> Image framed & ready!</span>');

                $('#cropModal').modal('hide');

            }, 'image/jpeg', 1.0);
        });

        $('#cancel-crop-btn').click(function() {
            $('#cropModal').modal('hide');
        });
    });
</script>

@stack('imageOrder')
</body>
</html>
