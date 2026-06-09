<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Edit Project</title>
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

    <link rel="stylesheet" href="/css/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                        <h3 class="title">Edit Project</h3>
                        {{--{!! Form::open(['route' => ['update.project', $project->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}--}}
                        <form action="{{ route('update.project',[$project->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>City <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        @foreach($places as $place)
                                            <input type="radio" class="btn-check" value="{{$place->id}}" name="city"
                                                   id="place_{{$place->id}}"
                                                   autocomplete="off"
                                                   @if($project->MPE_City==$place->id) checked @endif >
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
                                                   autocomplete="off"
                                                   @if($project->projecttype_id==$type->id) checked @endif >
                                            <label class="btn btn-outline-primary"
                                                   for="type_{{$type->id}}_lbl">{{$type->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label>Project Sub Category <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        @foreach($subcategories as $category)
                                            <input type="radio" class="btn-check" value="{{$category->ID}}"
                                                   name="projectsubcategory"
                                                   id="{{$category->ID}}" autocomplete="off"
                                                   @if($project->SubCategory_ID==$category->ID) checked @endif >
                                            <label id="subcategory_{{$category->ID}}" class="btn btn-outline-primary"
                                                   for="{{$category->ID}}"> {{$category->Name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label for="MicroProject_ID">Project Number <span class="red-color">*</span></label>
                                    <input type="number" name="MicroProject_ID" id="MicroProject_ID"
                                           value="{{ $project->MicroProject_ID }}"
                                           class="form-control" placeholder="Project Number"
                                           required readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="name">Project Name <span class="red-color">*</span></label>
                                    <input type="text" name="name" id="name"
                                           value="{{ $project->english->MPE_Name }}"
                                           class="form-control" placeholder="Project Name"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="beneficiary">Beneficiary Name <span class="red-color">*</span></label>
                                    <input type="text" name="beneficiary" id="beneficiary"
                                           value="{{ $project->MPE_BeneficiaryName }}"
                                           class="form-control" placeholder="Beneficiary Name"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label for="DOB">Year of Birth <span class="red-color">*</span></label>
                                    <input type="number" name="DOB" id="DOB"
                                           value="{{ $project->DOB }}"
                                           class="form-control" placeholder="Year of Birth"
                                           min="1920" max="2020" required>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label for="FamilyMembers">Family Members <span class="red-color">*</span></label>
                                    <input type="number" name="FamilyMembers" id="FamilyMembers"
                                           value="{{ $project->FamilyMembers }}"
                                           class="form-control" placeholder="Family Members"
                                           min="0" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile"
                                           value="{{ $project->Mobile == '0' ? '' : $project->Mobile }}"
                                           class="form-control" placeholder="09########">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="expSkill">Skills and Experiences</label>
                                    <textarea name="expSkill" id="expSkill" class="form-control" placeholder="Skills and Experiences" rows="2">{{ $project->english->MPE_ExpSkill }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="partner">Partner Name</label>
                                    <input type="text" name="partner" id="partner" class="form-control"
                                           value="{{ $project->MPE_PartnerName == '0' ? '' : $project->MPE_PartnerName }}"
                                           placeholder="Partner Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="partner2">Second Partner Name</label>
                                    <input type="text" name="partner2" id="partner2" class="form-control"
                                           value="{{ $project->MPE_PartnerName2 == '0' ? '' : $project->MPE_PartnerName2 }}"
                                           placeholder="Second Partner Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="suffering">Suffering and Need <span class="red-color">*</span></label>
                                    <textarea name="suffering" id="editor" class="form-control" placeholder="Suffering and Need">{{ $project->english->MPE_Suffering }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-3">
                                    <label for="latitude">Location Latitude (x)</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control"
                                           value="{{ $project->latitude == '0' ? '' : $project->latitude }}"
                                           placeholder="Location Latitude">
                                </div>
                                <div class="form-group col-3">
                                    <label for="longtitude">Location Longitude (y)</label>
                                    <input type="text" name="longtitude" id="longtitude" class="form-control"
                                           value="{{ $project->longtitude == '0' ? '' : $project->longtitude }}"
                                           placeholder="Location Longitude">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="video">Video Link</label>
                                    <input type="text" name="video" id="video" class="form-control"
                                           value="{{ $project->MPE_Video == '0' ? '' : $project->MPE_Video }}"
                                           placeholder="Video Link">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-3 col-md-3 col-12">
                                    <label for="fundDate">Date of Fund</label>
                                    @if($project->MPE_FundedDate == NULL)
                                        <input type="date" name="fundDate" id="fundDate" class="form-control"
                                               min="2018-01-01" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @else
                                        <input type="date" name="fundDate" id="fundDate" class="form-control"
                                               value="{{ $project->MPE_FundedDate }}"
                                               min="2018-01-01" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label>Project Donor <span class="red-color">*</span></label><br>
                                    <div class="btn-group flex-wrap w-100" role="group">
                                        @foreach($donors as $donor)
                                            <input type="radio" class="btn-check" value="{{$donor->id}}" name="donor"
                                                   id="donor_{{$donor->id}}"
                                                   autocomplete="off"
                                                   @if($project->MPE_Donor==$donor->id) checked @endif >
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
                                               autocomplete="off"
                                               @if($project->MPE_Done=='0' or $project->MPE_Done=='1') checked @endif >
                                        <label class="btn btn-outline-primary" for="funded">Funded</label>

                                        <input type="radio" class="btn-check" value="2" name="status" id="canceled"
                                               autocomplete="off"
                                               @if($project->MPE_Done=='2') checked @endif >
                                        <label class="btn btn-outline-primary" for="canceled">Canceled / Closed</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end" style="margin-top: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i
                                            class="fa fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" class="btn btn-info btn-save-confirm" style="margin-left: 15px;">
                                    <i class="fa fa-refresh"></i> Update
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
    $(document).ready(function () {
            @if($project->projecttype_id == '1')  {
            $('#type_3_lbl').click();
            $('#type_1_lbl').click();
        }
            @elseif($project->projecttype_id == '2')  {
            $('#type_3_lbl').click();
            $('#type_2_lbl').click();
        }
            @elseif($project->projecttype_id == '3')  {
            $('#type_1_lbl').click();
            $('#type_3_lbl').click();
        }
        @endif
    });
</script>
<script>
    $("input[name='projecttype']").change(function () {
        // $("input[name='projectsubtype']")  // for all inputs
        //     .each(function() {  // remove checked from sub types
        //         $("input[name='projectsubtype']").removeAttr('checked');;
        //     }) ;

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
</script>

<script>
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
        if (!($('#latitude').val()) && $('#funded').is(':checked')) {
            $('#location-funded-alert').show();
        } else {
            $('#location-funded-alert').hide();
        }
        if (!($('#longtitude').val()) && $('#funded').is(':checked')) {
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // 1. GLOBAL SUCCESS ALERT (Centered)
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{!! session('success') !!}",
                position: 'center',
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        // 2. EDIT CONFIRMATION
        $('.btn-save-confirm').click(function(e) {
            e.preventDefault();
            let form = $(this).closest("form"); // Grab the form element
            
            Swal.fire({
                title: 'Save Changes?',
                text: "Are you sure you want to update this project?",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#676768',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Actually submit the form payload to your controller
                }
            });
        });

        // 3. PUBLISH CONFIRMATION
        $('.btn-publish-confirm').click(function (e) {
            e.preventDefault();
            let form = $(this).closest("form");
            Swal.fire({
                title: 'Publish Project?',
                text: "This will make the project visible to the public.",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#676768',
                confirmButtonText: 'Yes, publish!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // 4. MAKE OFFLINE CONFIRMATION
        $('.btn-offline-confirm').click(function (e) {
            e.preventDefault();
            let form = $(this).closest("form");
            Swal.fire({
                title: 'Make Offline?',
                text: "This project will no longer be visible to the public.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f39c12',
                cancelButtonColor: '#676768',
                confirmButtonText: 'Yes, make offline'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
</body>
