<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Edit Initiative</title>
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

    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
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
                        <h3 class="title">Edit Initiative</h3>
                        <form action="{{ route('initiatives.update',[$initiative->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Donor <span class="red-color">*</span></label><br>
                                    <div class="btn-group flex-wrap w-100" role="group">
                                        @foreach($donors as $donor)
                                            <input type="checkbox" class="btn-check" value="{{$donor->id}}" name="donors[]"
                                                   id="donor_{{$donor->id}}"
                                                   autocomplete="off"
                                                   @if(in_array($donor->id, $ini_donors)) checked @endif >
                                            <label class="btn btn-outline-primary"
                                                   for="donor_{{$donor->id}}">{{$donor->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="title">Title <span class="red-color">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                           placeholder="Initiative Title"
                                           value="{{ $initiative->english->title }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="organization">Organization</label>
                                    <input type="text" name="organization" id="organization" class="form-control"
                                           placeholder="Project Manager"
                                           value="{{ $initiative->english->organization == '0' ? '' : $initiative->english->organization }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="date_string">Date</label>
                                    <input type="text" name="date_string" id="date_string" class="form-control"
                                           placeholder="Date"
                                           value="{{ $initiative->english->date_string == '0' ? '' : $initiative->english->date_string }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="description">Description <span class="red-color">*</span></label>
                                    <textarea name="description" id="description" class="form-control" rows="2"
                                              placeholder="Description">{{ $initiative->english->description == '0' ? '' : $initiative->english->description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label for="logo">Logo</label>
                                    <br>
                                    <i style="color: #777;">(Choosing an image will erase the current one)</i>
                                    <input type="file" name="logo" id="logo" class="form-control" accept="image/jpeg">
                                </div>
                                @if($initiative->logo != 0 && $initiative->logo != null)
                                    <div class="form-group col-lg-4 col-md-4 col-12 text-start">
                                        <img src="{{ $initiative->logo }}" style="height: 85px;">
                                    </div>
                                @endif
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="content">Content <span class="red-color">*</span></label>
                                    <textarea name="content" id="editor" class="hidden" placeholder="Content">{{ $initiative->english->content }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="video">Video Link</label>
                                    <input type="text" name="video" id="video" class="form-control"
                                           placeholder="Video Link"
                                           value="{{ $initiative->video == '0' ? '' : $initiative->video }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label>Serve Category <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100 flex-wrap">
                                        @foreach($who_categories as $category)
                                            <input type="radio" name="who_category_id" class="btn-check"
                                                   id="who_{{$category->id}}"
                                                   value="{{$category->id}}"
                                                   @if($initiative->who_category_id == $category->id) checked @endif>
                                            <label for="who_{{$category->id}}" class="btn btn-outline-primary">{{$category->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end" style="margin-top: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i
                                            class="fa fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" class="btn btn-info" style="margin-left: 15px;"><i
                                            class="fa fa-refresh"></i> Update
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
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
<script type="text/javascript" src="/js/selectize.min.js"></script>
{{--<script>--}}

    {{--$("input[name='what_category_id']").change(function () {--}}
        {{--if($('#type-5').is(':checked')) { // disc--}}
            {{--$('#discSubCategories').show();--}}
            {{--$('#familySubCategories').hide();--}}
            {{--$('#schoolSubCategories').hide();--}}
            {{--$('#place').show();--}}
            {{--$('#center').hide();--}}
            {{--$('#studySubCategories').hide();--}}
            {{--$('#f2fPartners').hide();--}}
            {{--$('#f2f_partner').attr('required', false);--}}
        {{--}--}}
        {{--else if($('#type-7').is(':checked')) { // study--}}
            {{--$('#discSubCategories').hide();--}}
            {{--$('#familySubCategories').hide();--}}
            {{--$('#schoolSubCategories').hide();--}}
            {{--$('#place').show();--}}
            {{--$('#center').show();--}}
            {{--$('#studySubCategories').show();--}}
            {{--$('#f2fPartners').hide();--}}
            {{--$('#f2f_partner').attr('required', false);--}}
        {{--}--}}
        {{--else if($('#type-8').is(':checked')) { // familyToFamily--}}
            {{--$('#discSubCategories').hide();--}}
            {{--$('#familySubCategories').show();--}}
            {{--$('#schoolSubCategories').hide();--}}
            {{--$('#place').hide();--}}
            {{--$('#center').hide();--}}
            {{--$('#studySubCategories').hide();--}}
            {{--if($("input[value='2']").is(':checked')) {--}}
                {{--$('#f2fPartners').show();--}}
                {{--$('#f2f_partner').attr('required', true);--}}
            {{--}--}}
        {{--}--}}
        {{--else if($('#type-9').is(':checked')) { // schoolToSchool--}}
            {{--$('#discSubCategories').hide();--}}
            {{--$('#familySubCategories').hide();--}}
            {{--$('#place').hide();--}}
            {{--$('#center').hide();--}}
            {{--$('#studySubCategories').hide();--}}
            {{--$('#schoolSubCategories').show();--}}
            {{--$('#f2fPartners').hide();--}}
            {{--$('#f2f_partner').attr('required', false);--}}
        {{--}--}}
        {{--else if($('#type-17').is(':checked')) { // children--}}
            {{--$('#discSubCategories').hide();--}}
            {{--$('#familySubCategories').hide();--}}
            {{--$('#schoolSubCategories').hide();--}}
            {{--$('#place').show();--}}
            {{--$('#center').hide();--}}
            {{--$('#studySubCategories').hide();--}}
            {{--$('#f2fPartners').hide();--}}
            {{--$('#f2f_partner').attr('required', false);--}}
        {{--}--}}
        {{--else {--}}
            {{--$('#discSubCategories').hide();--}}
            {{--$('#familySubCategories').hide();--}}
            {{--$('#place').hide();--}}
            {{--$('#center').hide();--}}
            {{--$('#studySubCategories').hide();--}}
            {{--$('#schoolSubCategories').hide();--}}
            {{--$('#f2fPartners').hide();--}}
            {{--$('#f2f_partner').attr('required', false);--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('#f2f_partner').selectize();--}}
        {{--@if($initiative->sub_what_category_id == '2')--}}
        {{--$('#f2fPartners').show();--}}
        {{--$('#f2f_partner').attr('required', true);--}}
        {{--@endif--}}
    {{--});--}}
    {{--$("input[name='family_sub_category']").change(function () {--}}
        {{--if($("input[value='2']").is(':checked')) {--}}
            {{--$('#f2fPartners').show();--}}
            {{--$('#f2f_partner').attr('required', true);--}}
        {{--}else {--}}
            {{--$('#f2fPartners').hide();--}}
            {{--$('#f2f_partner').attr('required', false);--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--@if($initiative->what_category_id == '7')--}}
            {{--$('#place').show();--}}
            {{--$('#studySubCategories').show();--}}
        {{--@elseif($initiative->what_category_id == '5')--}}
            {{--$('#place').show();--}}
            {{--$('#discSubCategories').show();--}}
        {{--@elseif($initiative->what_category_id == '17')--}}
            {{--$('#place').show();--}}
            {{--$('#center').hide();--}}
        {{--@endif--}}
    {{--});--}}
{{--</script>--}}
</body>
</html>
