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
                                    <label for="MicroProject_ID">Project Number <span class="red-color">*</span></label>
                                    <input type="number" name="MicroProject_ID" id="MicroProject_ID" class="form-control"
                                           placeholder="Project Number" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="name">Project Name <span class="red-color">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Project Name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="beneficiary">Beneficiary Name <span class="red-color">*</span></label>
                                    <input type="text" name="beneficiary" id="beneficiary" class="form-control"
                                           placeholder="Beneficiary Name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label for="DOB">Year of Birth <span class="red-color">*</span></label>
                                    <input type="number" name="DOB" id="DOB" class="form-control"
                                           placeholder="Year of Birth" min="1920" max="2020" required>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label for="FamilyMembers">Family Members <span class="red-color">*</span></label>
                                    <input type="number" name="FamilyMembers" id="FamilyMembers" class="form-control"
                                           placeholder="Family Members" min="0" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control"
                                           placeholder="09########">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="expSkill">Skills and Experiences</label>
                                    <textarea name="expSkill" id="expSkill" class="form-control" rows="2"
                                              placeholder="Skills and Experiences"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="partner">Partner Name</label>
                                    <input type="text" name="partner" id="partner" class="form-control"
                                           placeholder="Partner Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="partner2">Second Partner Name</label>
                                    <input type="text" name="partner2" id="partner2" class="form-control"
                                           placeholder="Second Partner Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="suffering">Suffering and Need <span class="red-color">*</span></label>
                                    <textarea name="suffering" id="editor" class="form-control"
                                              placeholder="Suffering and Need"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-3">
                                    <label for="latitude">Location Latitude (x)</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control"
                                           placeholder="Location Latitude">
                                </div>
                                <div class="form-group col-3">
                                    <label for="longtitude">Location Longitude (y)</label>
                                    <input type="text" name="longtitude" id="longtitude" class="form-control"
                                           placeholder="Location Longitude">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="video">Video Link</label>
                                    <input type="text" name="video" id="video" class="form-control"
                                           placeholder="Video Link">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    <label for="fundDate">Date of Fund</label>
                                    <input type="date" name="fundDate" id="fundDate" class="form-control"
                                           min="2018-01-01" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
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
@include('new.admin.scripts.popup-messages')
</body>
</html>
