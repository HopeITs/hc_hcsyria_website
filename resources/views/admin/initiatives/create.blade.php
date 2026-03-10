<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | Create Initiative</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/selectize.min.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .btn-group>.btn {
            border-radius: 0;
            margin: 0!important;
            width: 50%;
        }
        .select-width {
            width: 100%;
        }
        .serve-category {
            width: 100%;
        }
        .serve-category>.btn {
            width: 16.6%!important;
        }
        #discSubCategories,
        #familySubCategories,
        #schoolSubCategories,
        #studySubCategories,
        #f2fPartners,
        #place{
            display: none;
        }
        .selectize-control .option.active {
            color: #fff;
            background-color: #428bca;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<section style="padding-top: 30px;">
    <div class="container">
        @include('admin.messages')
    </div>
    <div class="container">
            <h3 class="title">Create Initiative</h3>
        {!! Form::open(['route' => 'initiatives.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="form-group col-md-8 col-md-offset-2">
                <label>Initiative Type <span class="red-color">*</span></label><br>
                <div class="btn-group" data-toggle="buttons">
                    @foreach($what_categories as $category)
                        @if($category->name !== 'Micro project')
                            <label class="btn btn-primary">
                                <input name="what_category_id" id="type-{{$category->id}}" type="radio" value="{{$category->id}}" required>
                                {{$category->name}}
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2" id="place">
                <label for="place">Place <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($places as $place)
                        <label class="btn btn-primary">
                            <input name="place" type="radio" value="{{$place->id}}">
                            {{$place->name}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-8 col-md-offset-2" id="center">
                <label for="center">Center <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($centers as $center)
                        <label class="btn btn-primary">
                            <input name="center" type="radio" value="{{$center->id}}">
                            {{$center->name}}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2" id="discSubCategories">
                <label for="disc_sub_category">Sub project </label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($disc_sub_categories as $sub_category)
                        <label class="btn btn-primary">
                            <input name="disc_sub_category" type="radio" value="{{$sub_category->id}}">
                            {{$sub_category->name}}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group col-md-8 col-md-offset-2" id="studySubCategories">
                <label for="study_sub_category">Study Category <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($study_sub_categories as $sub_category)
                        <label class="btn btn-primary">
                            <input name="study_sub_category" type="radio" value="{{$sub_category->id}}">
                            {{$sub_category->name}}
                        </label>
                    @endforeach
                </div>
            </div>

            {{--<input type="hidden" name="study_sub_category" value="{{$study_sub_categories[0]->id}}">--}}


            <div class="form-group col-md-8 col-md-offset-2" id="familySubCategories">
                <label for="family_sub_category">Sub project <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($family_sub_categories as $sub_category)
                        <label class="btn btn-primary">
                            <input name="family_sub_category" type="radio" value="{{$sub_category->id}}">
                            {{$sub_category->name}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-8 col-md-offset-2" id="schoolSubCategories">
                <label for="school_sub_category">Sub project <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($school_sub_categories as $sub_category)
                        <label class="btn btn-primary">
                            <input name="school_sub_category" type="radio" value="{{$sub_category->id}}">
                            {{$sub_category->name}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-8 col-md-offset-2" id="f2fPartners">
                <label for="f2f_partner">F2F Partner <span class="red-color">*</span></label><br>
                <select id="f2f_partner" placeholder="Choose f2f partner to link..." name="f2f_partner">
                    <option value="">Choose micro-project to link...</option>
                    @foreach($f2f_partners as $partner)
                        <option value="{{ $partner->id }}">
                            {{ $partner->english->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label for="donors">Donor <span class="red-color">*</span></label><br>
                <div class="btn-group select-width" data-toggle="buttons">
                    @foreach($donors as $donor)
                        <label class="btn btn-primary">
                            <input name="donors[]" type="checkbox" value="{{$donor->id}}">
                            {{$donor->name}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('title', 'Initiative Title')}} <span class="red-color">*</span>
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Initiative Title', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('organization', 'Organization')}}
                {{Form::text('organization', '', ['class' => 'form-control', 'placeholder' => 'Organization'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('date_string', 'Date')}}
                {{Form::text('date_string', '', ['class' => 'form-control', 'placeholder' => 'Date'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('description', 'Description')}} <span class="red-color">*</span>
                {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => '2', 'required'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('logo', 'Logo')}}
                {{Form::file('logo', ['accept' => 'image/jpeg, image/png'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('content', 'Content')}} <span class="red-color">*</span>
                {{Form::textarea('content', '', ['class' => 'hidden', 'id' => 'editor', 'placeholder' => 'Content'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                {{Form::label('video', 'Video Link')}}
                {{Form::text('video', '', ['class' => 'form-control', 'placeholder' => 'Video Link'])}}
            </div>
            <div class="form-group col-md-8 col-md-offset-2">
                <label>Serve Category <span class="red-color">*</span></label><br>
                <div class="btn-group serve-category" data-toggle="buttons">
                    @foreach($who_categories as $category)
                        <label class="btn btn-primary">
                            <input name="who_category_id" type="radio" value="{{$category->id}}" required>
                            {{ucfirst($category->name)}}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
        <button class="btn btn-default" onclick="event.preventDefault();window.history.back();" style="margin-top: 15px"><i class="fa fa-arrow-left"></i> back</button>
        {{Form::button('<i class="fa fa-external-link"></i> Create', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'margin-top: 15px;'])}}
        {!! Form::close() !!}
    </div>
</section>

@stack('navbar_scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
<script type="text/javascript" src="/js/selectize.min.js"></script>
<script>
    $("input[name='what_category_id']").change(function () {
        if($('#type-5').is(':checked')) { // disc
            $('#discSubCategories').show();
            $('#place').show();
            $('#center').hide();
            $('#studySubCategories').hide();
            $('#familySubCategories').hide();
            $('#schoolSubCategories').hide();
            $('#f2fPartners').hide();
            $('#f2f_partner').attr('required', false);
        }else if($('#type-8').is(':checked')) { // familyToFamily
            $('#discSubCategories').hide();
            $('#studySubCategories').hide();
            $('#familySubCategories').show();
            $('#schoolSubCategories').hide();
            $('#place').hide();
            $('#center').hide();
            if($("input[value='2']").is(':checked')) {
                $('#f2fPartners').show();
                $('#f2f_partner').attr('required', true);
            }
        }else if($('#type-7').is(':checked')) { // study
            $('#discSubCategories').hide();
            $('#familySubCategories').hide();
            $('#schoolSubCategories').hide();
            $('#place').show();
            $('#center').show();
            $('#studySubCategories').show();
            $('#f2fPartners').hide();
            $('#f2f_partner').attr('required', false);
        }else if($('#type-9').is(':checked')) { // schoolToSchool
            $('#discSubCategories').hide();
            $('#studySubCategories').hide();
            $('#familySubCategories').hide();
            $('#schoolSubCategories').show();
            $('#place').hide();
            $('#center').hide();
            $('#f2fPartners').hide();
            $('#f2f_partner').attr('required', false);
        }else if($('#type-17').is(':checked')) { // children
            $('#discSubCategories').hide();
            $('#studySubCategories').hide();
            $('#familySubCategories').hide();
            $('#schoolSubCategories').hide();
            $('#place').show();
            $('#center').hide();
            $('#f2fPartners').hide();
            $('#f2f_partner').attr('required', false);
        }else {
            $('#discSubCategories').hide();
            $('#studySubCategories').hide();
            $('#familySubCategories').hide();
            $('#schoolSubCategories').hide();
            $('#place').hide();
            $('#center').hide();
            $('#f2fPartners').hide();
            $('#f2f_partner').attr('required', false);
        }
    });
</script>
<script>
    $(document).ready(function () {
        $('#f2f_partner').selectize();
    });
    $("input[name='family_sub_category']").change(function () {
        if($("input[value='2']").is(':checked')) {
            $('#f2fPartners').show();
            $('#f2f_partner').attr('required', true);
        }else {
            $('#f2fPartners').hide();
            $('#f2f_partner').attr('required', false);
        }
    });
</script>
</body>
</html>
