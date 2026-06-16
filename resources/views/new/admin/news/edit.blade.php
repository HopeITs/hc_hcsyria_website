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

    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link href="{{asset('css/our-news.css')}}" rel="stylesheet" type="text/css">
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
                        <form action="{{ route('news.update',[$newsData->id])}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="ref" value="{{ $ref }}">

                            <div class="row mb-3">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <label for="news_id" class="form-label fw-bold">News ID</label>
                                    <input type="text"
                                           id="news_id"
                                           class="form-control"
                                           value="{{ $newsData->id }}"
                                           readonly
                                           style="cursor: not-allowed;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-8 col-md-8 col-12">
                                    <label class="form-label fw-bold">Type <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100">
                                        <input name="type" id="type_0" type="radio" class="btn-check" value="0" @if($newsData->type=='0') checked @endif>
                                        <label class="btn btn-outline-primary" for="type_0">Article</label>

                                        <input name="type" id="type_3" type="radio" class="btn-check" value="3" @if($newsData->type=='3') checked @endif>
                                        <label class="btn btn-outline-primary" for="type_3">Video</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label class="form-label fw-bold">Tags <span class="red-color">*</span></label>

                                    <livewire:forms.tags-input
                                        name="news_tags"
                                        :value="$existingTagsString"
                                        placeholder="Search or add tags..."
                                        suggestions="{{ $allTagsString }}"
                                        :forceSuggestion="false"/>

                                    <small class="text-muted">Add or remove tags for this news article.</small>
                                </div>
                                @error('news_tags')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label class="form-label fw-bold">News City <span class="red-color">*</span></label><br>

                                    <div class="overflow-auto px-1 pb-2">
                                        <div class="btn-group w-100 d-flex">
                                            @if(isset($places))
                                                @foreach($places as $place)
                                                    <input type="radio" class="btn-check" value="{{$place->id}}" name="place_id"
                                                           id="place_{{$place->id}}" autocomplete="off"
                                                           @if($newsData->place_id == $place->id) checked @endif >
                                                    <label class="btn btn-outline-primary text-nowrap flex-fill" for="place_{{$place->id}}">
                                                        {{ $place->name == 'All' ? 'Syria' : $place->name }}
                                                    </label>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <label for="date" class="form-label fw-bold">News Date <span class="red-color">*</span></label>

                                    <div class="input-group">
                                        <span class="input-group-text bg-white">
                                            <i class="fa fa-calendar text-brand-red"></i>
                                        </span>
                                        <input type="text" name="date" id="date"
                                               class="form-control border-form-control bg-white"
                                               placeholder="Select Date.."
                                               readonly required>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="rank" value="{{ $newsData->rank ?? 1 }}">

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="title" class="form-label fw-bold">Title <span class="red-color">*</span></label>
                                    <input type="text"
                                           name="title"
                                           id="title"
                                           class="form-control"
                                           placeholder="Title"
                                           value="{{ optional($newsData->english)->title ?? '' }}"
                                           required>
                                </div>
                            </div>

                            <input type="hidden" name="description" value="{{ optional($newsData->english)->description ?? '0' }}">

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="content" class="form-label fw-bold">Content <span class="red-color">*</span></label>
                                    <textarea name="content"
                                              id="editor"
                                              class="form-control"
                                              placeholder="Content">{{ optional($newsData->english)->content ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="video" class="form-label fw-bold">Video Link <span id="video-star" class="red-color d-none">*</span></label>
                                    <input type="text"
                                           name="video"
                                           id="video"
                                           class="form-control"
                                           placeholder="Video Link"
                                           value="{{ $newsData->video == '0' ? '' : $newsData->video }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="file" class="form-label fw-bold">Upload File</label>

                                    <input type="hidden" name="remove_file" id="remove_file" value="0">

                                    @if($newsData->file != '0')
                                        <div id="current_file_display" class="d-flex align-items-center justify-content-between border rounded p-2 bg-light mb-2">
                                            <span class="d-inline-block text-truncate max-w-90">
                                                <i class="fa fa-file-o me-2"></i> {{ $newsData->file }}
                                            </span>
                                            <button type="button" class="btn btn-sm btn-danger remove_current_file_btn" title="Remove current file">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </div>

                                        <div id="new_file_input_container" class="d-none">
                                            <div class="d-flex align-items-center">
                                                <input class="form-control" type="file" name="file" id="file">
                                                <button type="button" class="btn btn-danger ms-2 d-none clear_new_file_btn" title="Clear selected file">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center">
                                            <input class="form-control" type="file" name="file" id="file">
                                            <button type="button" class="btn btn-danger ms-2 d-none clear_new_file_btn" title="Clear selected file">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-custom-large">
                                <button class="btn btn-secondary" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" class="btn btn-info ms-3">
                                    <i class="fa fa-refresh"></i> Update
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

<script>
    // New SweetAlert logic to just hide the file instead of changing pages
    $('.remove_current_file_btn').click(function (event) {
        event.preventDefault();

        swal({
            title: `Are you sure you want to remove this file?`,
            showCancelButton: true,
            confirmButtonText: 'Remove',
        }).then((result) => {
            if (result) {
                // Hide the old file, show the new upload box, set hidden input to 1
                $('#current_file_display').addClass('d-none');
                $('#new_file_input_container').removeClass('d-none');
                $('#remove_file').val('1');
            }
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal('Cancelled');
            }
        });
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
<script>
    flatpickr("#date", {
        enableTime: false,
        dateFormat: "M d, Y",
        defaultDate: "{{ \Carbon\Carbon::parse($newsData->date)->format('M d, Y') }}",
        static: true
    });

    $(document).ready(function() {
        function checkVideoRequired() {
            let selectedType = $('input[name="type"]:checked').val();
            if (selectedType == "3") { // Video type
                $('#video').attr('required', true);
                $('#video-star').removeClass('d-none');
            } else {
                $('#video').removeAttr('required');
                $('#video-star').addClass('d-none');
            }
        }

        checkVideoRequired();
        $('input[name="type"]').change(checkVideoRequired);

        $('form').on('submit', function(e) {
            if (newsEditor) {
                $('#editor').val(newsEditor.getData());
            }
        });
    });

    $('#file').change(function() {
        if ($(this).val()) {
            $('.clear_new_file_btn').removeClass('d-none');
        } else {
            $('.clear_new_file_btn').addClass('d-none');
        }
    });

    $('.clear_new_file_btn').click(function() {
        $('#file').val('');
        $(this).addClass('d-none');
    });
</script>
@include('new.admin.scripts.popup-messages')
</body>
</html>