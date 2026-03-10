<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Admin | Create Project</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/micro_page_new.css" rel="stylesheet">
    {{--<link href="{{asset('css/main-new.css')}}" rel="stylesheet">--}}
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
    {{--@stack('navbar_styles')--}}
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
                        <h3 class="title">Create Project</h3>
                        {{--{!! Form::open(['route' => ['update.project', $project->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}--}}
                        <form action="{{ route('store.project')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>City <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        @foreach($places as $place)
                                            <input type="radio" class="btn-check" value="{{$place->id}}" name="city"
                                                   id="place_{{$place->id}}"
                                                   autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                   for="place_{{$place->id}}">{{$place->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Project Type <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        @foreach($types as $type)
                                            <input type="radio" value="{{$type->id}}" class="btn-check"
                                                   name="projecttype"
                                                   id="type_{{$type->id}}_lbl"
                                                   autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                   for="type_{{$type->id}}_lbl">{{$type->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Project Sub Category <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        @foreach($subcategories as $category)
                                            <input type="radio" class="btn-check" value="{{$category->ID}}" name="projectsubcategory"
                                                   id="subcategory_{{$category->ID}}"
                                                   autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                   for="subcategory_{{$category->ID}}">{{$category->Name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    {{Form::label('MicroProject_ID', 'Project Number')}} <span
                                            class="red-color">*</span>
                                    {{Form::number('MicroProject_ID', '', ['class' => 'form-control', 'placeholder' => 'Project Number', 'required'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('name', 'Project Name')}} <span class="red-color">*</span>
                                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Project Name', 'required'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('beneficiary', 'Beneficiary Name')}} <span class="red-color">*</span>
                                    {{Form::text('beneficiary', '', ['class' => 'form-control', 'placeholder' => 'Beneficiary Name', 'required'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    {{Form::label('DOB', 'Year of Birth')}} <span class="red-color">*</span>
                                    {{Form::number('DOB',  '', ['class' => 'form-control', 'placeholder' => 'Year of Birth','min="1920"','max="2020"', 'required'])}}
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    {{Form::label('FamilyMembers', 'Family Members')}} <span class="red-color">*</span>
                                    {{Form::number('FamilyMembers', '', ['class' => 'form-control', 'placeholder' => 'Family Members','min="0"', 'required'])}}

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('mobile', 'Mobile')}}
                                    {{Form::text('mobile', '', ['class' => 'form-control', 'placeholder' => '09########'])}}
                                </div>
                            </div>
                            {{--<div class="row mb-3">--}}
                            {{--<div class="form-group col-lg-8 col-md-8 col-12">--}}
                            {{--<label>Has the beneficiary lost his work during war? <span--}}
                            {{--class="red-color">*</span></label><br>--}}

                            {{--<div class="btn-group w-100" role="group">--}}
                            {{--<input type="radio" class="btn-check" value="1" name="WorkLoss" id="btnradio1"--}}
                            {{--autocomplete="off">--}}
                            {{--<label class="btn btn-outline-primary" for="btnradio1">Yes</label>--}}

                            {{--<input type="radio" class="btn-check" value="0" name="WorkLoss" id="btnradio2"--}}
                            {{--autocomplete="off">--}}
                            {{--<label class="btn btn-outline-primary" for="btnradio2">No</label>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('expSkill', 'Skills and Experiences')}}
                                    {{Form::textarea('expSkill', '', ['class' => 'form-control', 'placeholder' => 'Skills and Experiences','rows' => '2'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('partner', 'Partner Name')}}
                                    {{Form::text('partner', '', ['class' => 'form-control', 'placeholder' => 'Partner Name'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('partner2', 'Second Partner Name')}}
                                    {{Form::text('partner2', '', ['class' => 'form-control', 'placeholder' => 'Second Partner Name'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('suffering', 'Suffering and Need')}} <span class="red-color">*</span>
                                    {!!Form::textarea('suffering', '', ['class' => 'form-control', 'id' => 'editor' ,'placeholder' => 'Suffering and Need'])!!}
                                </div>
                            </div>
                            {{--<div class="row mb-3">--}}
                                {{--<div class="form-group col-12">--}}
                                    {{--{{Form::label('location', 'Project Location')}}--}}
                                    {{--{{Form::text('location', '', ['class' => 'form-control', 'id' => 'location', 'placeholder' => 'Project Location'])}}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="row mb-3">
                                <div class="form-group col-3">
                                    {{Form::label('location', 'Location Latitude (x)')}}
                                    {{Form::text('latitude', '', ['class' => 'form-control', 'id' => 'latitude', 'placeholder' => 'Location Latitude'])}}
                                </div>
                                <div class="form-group col-3">
                                    {{Form::label('location', 'Location Longtitude (y)')}}
                                    {{Form::text('longtitude', '', ['class' => 'form-control', 'id' => 'longtitude', 'placeholder' => 'Location longtitude'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('video', 'Video Link')}}
                                    {{Form::text('video', '', ['class' => 'form-control', 'placeholder' => 'Video Link'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-3 col-md-3 col-12 ">
                                    {{Form::label('fundDate', 'Date of Fund')}}
                                    {{Form::date('fundDate', '' ,['class' => 'form-control', 'min="2018-01-01"', 'max='.\Carbon\Carbon::now()])}}

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label>Project Donor <span class="red-color">*</span></label><br>
                                    <div class="btn-group flex-wrap w-100" role="group">
                                        @foreach($donors as $donor)
                                            <input type="radio" class="btn-check" value="{{$donor->id}}" name="donor"
                                                   id="donor_{{$donor->id}}"
                                                   autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                   for="donor_{{$donor->id}}">{{$donor->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Project Status <span class="red-color">*</span></label><br>
                                    <div class="btn-group project-status" data-toggle="buttons">
                                        <input type="radio" class="btn-check" value="1" name="status" id="funded"
                                               autocomplete="off">
                                        <label class="btn btn-outline-primary" for="funded"
                                               id="funded_lbl">Funded</label>

                                        <input type="radio" class="btn-check" value="2" name="status" id="canceled"
                                               autocomplete="off">
                                        <label class="btn btn-outline-primary" id="closed_lbl" for="canceled">Canceled /
                                            Closed</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end" style="margin-top: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i
                                            class="fa fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" class="btn btn-info" style="margin-left: 15px;"><i
                                            class="fa fa-external-link"></i> Create
                                </button>

                                {{--{{Form::button('<i class="fa fa-refresh"></i> Update', ['type' => 'submit', 'class' => 'btn btn-danger', 'style' => 'margin-left: 15px;'])}}--}}
                                {{--{!! Form::close() !!}--}}
                            </div>
                        </form>
                    </div>
                </div>
                <p id="date-funded-alert" style="padding-top:10px;color: #f0ad4e;display: none;">
                    <i class="fa fa-exclamation-triangle"></i> Date of fund is empty</p>
                <p id="location-funded-alert" style="padding-top:10px;color: #f0ad4e;display: none;">
                    <i class="fa fa-exclamation-triangle"></i> Project location is empty</p>
                <p id="donor-funded-alert" style="padding-top:10px;color: red;display: none;">
                    <i class="fa fa-exclamation-triangle"></i> Project status is funded without a Donor</p>
            </div>
        </div>
    </div>
</div>

@stack('navbar_scripts')
<script>
    $('#funded_lbl').addClass('active');
    $('#type_1').addClass('active');
    $('#type_1_lbl').click();
    $("#type_4").show();
    $("#type_5").show();

    $("#type_1").hide();
    $("#type_2").hide();
    $("#type_3").hide();

    $("#type_6").hide();
    $("#type_7").hide();
    $("input[name='projecttype']").change(function () {

        if ($('#type_1_lbl').is(':checked')) {
            $("#type_4").show();
            $("#type_5").show();

            $("#type_1").hide();
            $("#type_2").hide();
            $("#type_3").hide();

            $("#type_6").hide();
            $("#type_7").hide();
        }
        else if ($('#type_2_lbl').is(':checked')) {
            $("#type_4").hide();
            $("#type_5").hide();

            $("#type_1").show();
            $("#type_2").show();
            $("#type_3").show();

            $("#type_6").hide();
            $("#type_7").hide();
        }
        else if ($('#type_3_lbl').is(':checked')) {
            $("#type_4").hide();
            $("#type_5").hide();

            $("#type_1").hide();
            $("#type_2").hide();
            $("#type_3").hide();

            $("#type_6").show();
            $("#type_7").show();
        }
    });
    $("input[name='status']").change(function () {
        if ($('#funded').is(':checked')) {
            $("#funded_lbl").addClass('active');
            $("#closed_lbl").removeClass('active');
        }
        else if ($('#canceled').is(':checked')) {
            $("#closed_lbl").addClass('active');
            $("#funded_lbl").removeClass('active');
        }
    });
</script>
{{--<script>--}}
{{--$(document).ready(function () {--}}
{{--// $('#type_1').addClass('active');--}}
{{--$('#type_1_lbl').click();--}}
{{--});--}}

{{--$("input[name='projecttype']").change(function () {--}}
{{--if ($('#type_1').is(':checked')) {--}}
{{--$("label[name='4']").show();--}}
{{--$("label[name='5']").show();--}}

{{--$("label[name='1']").hide();--}}
{{--$("label[name='2']").hide();--}}
{{--$("label[name='3']").hide();--}}

{{--$("label[name='6']").hide();--}}
{{--$("label[name='7']").hide();--}}
{{--}--}}
{{--else if ($('#type_2').is(':checked')) {--}}
{{--$("label[name='4']").hide();--}}
{{--$("label[name='5']").hide();--}}

{{--$("label[name='1']").show();--}}
{{--$("label[name='2']").show();--}}
{{--$("label[name='3']").show();--}}

{{--$("label[name='6']").hide();--}}
{{--$("label[name='7']").hide();--}}
{{--}--}}
{{--else if ($('#type_3').is(':checked')) {--}}
{{--$("label[name='4']").hide();--}}
{{--$("label[name='5']").hide();--}}

{{--$("label[name='1']").hide();--}}
{{--$("label[name='2']").hide();--}}
{{--$("label[name='3']").hide();--}}

{{--$("label[name='6']").show();--}}
{{--$("label[name='7']").show();--}}
{{--}--}}
{{--});--}}
{{--</script>--}}
<script>
    if ($('#canceled').is(':checked')) {
        $('#donor-funded-alert').hide();
        $('#submit-form').attr('disabled', false);
    }
    if ($('#donor-none').is(':checked') && $('#funded').is(':checked')) {
        $('#donor-funded-alert').show();
        $('#submit-form').attr('disabled', true);
    }
    $("input[name='donor']").change(function () {
        if ($('#donor-none').is(':checked') && $('#funded').is(':checked')) {
            $('#donor-funded-alert').show();
            $('#submit-form').attr('disabled', true);
        } else {
            $('#donor-funded-alert').hide();
            $('#submit-form').attr('disabled', false);
        }
    });
    $("input[name='status']").change(function () {
        if ($('#donor-none').is(':checked') && $('#funded').is(':checked')) {
            $('#donor-funded-alert').show();
            $('#submit-form').attr('disabled', true);
        } else {
            $('#donor-funded-alert').hide();
            $('#submit-form').attr('disabled', false);
        }
        if (!($('#location').val()) && $('#funded').is(':checked')) {
            $('#location-funded-alert').show();
        } else {
            $('#location-funded-alert').hide();
        }
    });
    $("input[name='location']").on('input', function () {
        if (!($('#location').val()) && $('#funded').is(':checked')) {
            $('#location-funded-alert').show();
        } else {
            $('#location-funded-alert').hide();
        }
    });
    $("input[name='fundDate']").on('input', function () {
        if ($('#fundDate').val().isNull()) {
            $('#date-funded-alert').show();
        } else {
            $('#date-funded-alert').hide();
        }
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckeditor-initialize.js"></script>
</body>
</html>
