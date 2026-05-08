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
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
<style>
    .flatpickr-day.selected, .flatpickr-day.startRange,
    .flatpickr-day.endRange, .flatpickr-day.selected.prevMonthDay,
    .flatpickr-day.selected.nextMonthDay, .flatpickr-day.selected:hover,
    .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover,
    .flatpickr-day.selected.prevMonthDay:hover,
    .flatpickr-day.selected.nextMonthDay:hover {
        background: #C92228 !important;
        border-color: #C92228 !important;
    }
    .flatpickr-months .flatpickr-month,
    .flatpickr-current-month .flatpickr-monthDropdown-months:hover {
        fill: #C92228 !important;
    }
    .flatpickr-calendar {
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        border-top: 3px solid #C92228;
    }
    #date:focus {
        border-color: #ced4da !important;
        box-shadow: none !important;
        outline: 0 none !important;
    }

    .input-group-text {
        border-color: #ced4da !important;
    }
</style>
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
                        <form action="{{ route('news.update',[$newsData->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Type <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        <input name="type" id="type_0" type="radio" class="btn-check" value="0"
                                               @if($newsData->type=='0') checked @endif>
                                        <label class="btn btn-outline-primary" for="type_0">Article</label>

                                        <input name="type" id="type_3" type="radio" class="btn-check" value="3"
                                               @if($newsData->type=='3') checked @endif>
                                        <label class="btn btn-outline-primary" for="type_3">Video</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-12 col-md-12 col-12">
                                    <label>Tags <span class="red-color">*</span></label>

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
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>News City <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        @if(isset($places))
                                            @foreach($places as $place)
                                                <input type="radio" class="btn-check" value="{{$place->id}}" name="place_id"
                                                       id="place_{{$place->id}}"
                                                       autocomplete="off"
                                                       @if($newsData->place_id == $place->id) checked @endif >
                                                <label class="btn btn-outline-primary"
                                                       for="place_{{$place->id}}">{{$place->name}}</label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-6 col-12">
                                    <label for="date" class="font-weight-bold">News Date</label>
                                    <div class="input-group" style="display: flex;">
                                        <div class="input-group-prepend" style="display: flex;">
                                            <span class="input-group-text bg-white" style="border-right: none; border-radius: 5px 0 0 5px;">
                                                <i class="fa fa-calendar" style="color: #C92228;"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="date" id="date"
                                               class="form-control bg-white"
                                               placeholder="Select Date and Time.."
                                               style="border-left: none; border-radius: 0 5px 5px 0; box-shadow: none !important;"
                                               readonly>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="rank" value="{{ $newsData->rank ?? 1 }}">

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="title">Title <span class="red-color">*</span></label>
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
                                <div class="form-group col-12">
                                    <label for="content">Content <span class="red-color">*</span></label>
                                    <textarea name="content"
                                              id="editor"
                                              class="form-control"
                                              placeholder="Content">{{ optional($newsData->english)->content ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="video">Video Link</label>
                                    <input type="text"
                                           name="video"
                                           id="video"
                                           class="form-control"
                                           placeholder="Video Link"
                                           value="{{ $newsData->video == '0' ? '' : $newsData->video }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-8">
                                    <label for="file">File Link</label>
                                    <p id="file">{{ $newsData->file == '0' ? '' : $newsData->file }}</p>
                                </div>
                                <div class="col-4 text-end">
                                    @if($newsData->file != '0')
                                        <button class="btn btn-danger icon-btn show_confirm" type="button">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    @if($newsData->file == '0')
                                        <input class="form-control" type="file" name="file" id="file">
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-end" style="margin-top: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" class="btn btn-info" style="margin-left: 15px;">
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
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();

        swal({
            title: `Are you sure you want to delete ?`,
            showCancelButton: true,
            confirmButtonText: 'Delete',
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
            if (dismiss === 'cancel') {
                swal('Cancelled')
            }
        });
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
<script>
    flatpickr("#date", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        defaultDate: "{{ isset($newsData) ? $newsData->date : 'today' }}",
        allowInput: true,
        static: true
    });
</script>
</body>
</html>
