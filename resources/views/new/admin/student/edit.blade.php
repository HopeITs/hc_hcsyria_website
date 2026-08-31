<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <head>
        <script src="/js/jquery.js"></script>
        @include('new.admin.navbar')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="theme-color" content="#f6f6f6">
        <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
        <title>Admin | Edit Student</title>
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
        <link rel="stylesheet" href="/css/sweetalert2.min.css">
        <script src="/js/sweetalert2.min.js"></script>
        <link rel="shortcut icon" href="/images/ico/favicon.ico">
        <div class="preloader">
            <div class="preloader-gif"></div>
        </div>
    </head>
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
                        <h3 class="title">Edit Student</h3>
                        <form id="student_edit" action="{{ route('students.update',[$student->id])}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                {{Form::label('std_id', 'id', ['class' => ['d-none']])}}
                                {{Form::text('std_id', $student->id, ['class' => ['form-control','d-none']])}}
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    {{Form::label('firstname', 'First Name')}} <span class="red-color">*</span>
                                    {{Form::text('firstname', $student->firstname, ['class' => 'form-control', 'placeholder' => 'First Name', 'required'])}}
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    {{Form::label('fathername', 'Father Name')}} <span class="red-color">*</span>
                                    {{Form::text('fathername', $student->fathername, ['class' => 'form-control', 'placeholder' => 'Father Name', 'required'])}}
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    {{Form::label('lastname', 'Last Name')}} <span class="red-color">*</span>
                                    {{Form::text('lastname', $student->lastname, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    {{Form::label('nationalnumber', 'National Number')}}
                                    {{Form::number('nationalnumber', $student->nationalnumber, ['class' => 'form-control', 'placeholder' => 'National Number','min="0"'])}}
                                    <p id="national-number-alert"
                                       style="padding-top:10px;color: #f0ad4e;display: none;">
                                        <i class="fa fa-exclamation-triangle"></i> National Number must be 11 digits</p>
                                </div>

                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    {{Form::label('DOB', 'Year of Birth')}} <span class="red-color">*</span>
                                    {{Form::number('DOB',  $student->DOB, ['class' => 'form-control', 'placeholder' => 'Year of Birth','min="1920"','max="2020"', 'required'])}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    {{Form::label('mobile', 'Mobile')}}<span class="red-color">*</span>
                                    {{Form::text('mobile', $student->mobile, ['class' => 'form-control', 'placeholder' => '09########', 'required'])}}
                                    <p id="mobile-alert" style="padding-top:10px;color: #f0ad4e;display: none;">
                                        <i class="fa fa-exclamation-triangle"></i> Mobile Number must be 10 digits</p>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    {{Form::label('whatsapp', 'Whatsapp')}}
                                    {{Form::text('whatsapp', $student->whatsapp, ['class' => 'form-control', 'placeholder' => '09########'])}}
                                    <p id="whatsapp-alert" style="padding-top:10px;color: #f0ad4e;display: none;">
                                        <i class="fa fa-exclamation-triangle"></i> Whatsapp Number must be 10 digits</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    {{Form::label('email', 'Email')}}
                                    {{Form::text('email', $student->email, ['class' => 'form-control', 'placeholder' => 'email@domain.com'])}}
                                    <p id="email-alert" style="padding-top:10px;color: #f0ad4e;display: none;">
                                        <i class="fa fa-exclamation-triangle"></i> Invalid email format </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Address <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100 flex-wrap" data-toggle="buttons">
                                        <select class="form-select" id="street" name="street">
                                            <option value="" disabled>Select one</option>
                                            @foreach($streets as $street)
                                                <option @if($student->street_id == $street->id) selected
                                                        @endif class="btn-check" id="{{$street->id}}"
                                                        value="{{$street->id}}">{{$street->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Gender <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-bs-toggle="buttons">
                                        @foreach($genders as $g)
                                            <input type="radio" class="btn-check" value="{{$g->id}}" name="genders"
                                                   id="gender_{{$g->id}}" @if($student->gender_id == $g->id) checked
                                                   @endif
                                                   autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                   for="gender_{{$g->id}}">{{$g->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Religion <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-bs-toggle="buttons">
                                        @foreach($religions as $r)
                                            <input type="radio" class="btn-check" value="{{$r->id}}" name="religions"
                                                   id="religion_{{$r->id}}" @if($student->religion_id == $r->id) checked
                                                   @endif
                                                   autocomplete="off">
                                            <label class="btn btn-outline-primary"
                                                   for="religion_{{$r->id}}">{{$r->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Is Employed <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-bs-toggle="buttons">
                                        <input type="radio" class="btn-check" value="-1" name="employed" @if($student->is_employed == -1) checked @endif
                                               id="employed_-1"
                                               autocomplete="off">
                                        <label class="btn btn-outline-primary"
                                               for="employed_-1">N/A</label>
                                        <input type="radio" class="btn-check" value="0" name="employed"
                                               id="employed_0" @if($student->is_employed == 0) checked @endif
                                               autocomplete="off">
                                        <label class="btn btn-outline-primary"
                                               for="employed_0">No</label>
                                        <input type="radio" class="btn-check" value="1" name="employed"
                                               id="employed_1"
                                               autocomplete="off" @if($student->is_employed == 1) checked @endif>
                                        <label class="btn btn-outline-primary"
                                               for="employed_1">Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-8 col-md-8 col-12">
                                    <label>Is Student <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100" data-bs-toggle="buttons">
                                        <input type="radio" class="btn-check" value="-1" name="student" @if($student->is_student == -1) checked @endif
                                               id="student_-1"
                                               autocomplete="off">
                                        <label class="btn btn-outline-primary"
                                               for="student_-1">N/A</label>
                                        <input type="radio" class="btn-check" value="0" name="student"
                                               id="student_0" @if($student->is_student == 0) checked @endif
                                               autocomplete="off">
                                        <label class="btn btn-outline-primary"
                                               for="student_0">No</label>
                                        <input type="radio" class="btn-check" value="1" name="student"
                                               id="student_1" @if($student->is_student == 1) checked @endif
                                               autocomplete="off">
                                        <label class="btn btn-outline-primary"
                                               for="student_1">Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label>Education Degree <span class="red-color">*</span></label><br>
                                    <div class="btn-group w-100 flex-wrap" data-toggle="buttons">
                                        <select id="ajax_educationdegree" class="form-select" id="educationdegree"
                                                name="educationdegree">
                                            @foreach($educationdegree as $edudegree)
                                                <option class="btn-check" id="{{$edudegree->id}}"
                                                        value="{{$edudegree->id}}">{{$edudegree->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label>Education Field <span class="red-color">*</span></label><br>
                                    <select id="ajax_education" class="form-select" name="educationfield">
                                        <option value="-1" disabled selected>Select one</option>
                                        @foreach($educationfield as $edufield)
                                            <option data-sync="{{$edufield->educationdegree_id}}" class="btn-check"
                                                    id="{{$edufield->id}}" @if($student->educationfield_id == $edufield->id) selected @endif
                                                    value="{{$edufield->id}}">{{$edufield->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-12">
                                    <label>Education Level <span class="red-color">*</span></label><br>
                                    <select disabled class="form-select" id="educationlevel" name="educationlevel">
                                        <option value="" @if($student->educationlevel_id == null) selected
                                                disabled @endif >
                                            Select one
                                        </option>
                                        @foreach($educationlevel as $edulevel)
                                            <option @if($student->educationlevel_id == $edulevel->id) selected
                                                    @endif class="btn-check" id="{{$edulevel->id}}"
                                                    value="{{$edulevel->id}}">{{$edulevel->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    {{Form::label('note', 'Note')}}
                                    {{Form::textarea('note', $student->note, ['class' => 'form-control', 'placeholder' => 'Note','rows' => '3'])}}
                                </div>
                            </div>
                            <div class="d-flex justify-content-end" style="margin-top: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i class="fa fa-arrow-left"></i> Back
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
<script>
    $(document).ready(function () {

        const form = document.getElementById('student_edit');
        let formEdit = [];
        let localData = JSON.parse(localStorage.getItem('formEdit'));
        if (navigator.onLine && localData) {
            swal({
                title: `Drafted data found!<br> Do you want to upload it?`,
                text: "this may take a few minutes!",
                // icon: "warning",
                // buttons: true,
                showCancelButton: true,
                confirmButtonText: 'Upload',
                // dangerMode: true,
            }).then((result) => {
                if (result) {
                    swal('Saving data in progress...');
                    $.ajax({
                        type: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{route('students.update')}}",
                        data: {"form": localData},
                        dataType: "json",
                        beforeSend: function () {
                            swal('Saving data in progress...');
                        },
                        success: function () {
                            swal('Drafted data saved successfully !!');
                            localStorage.removeItem('formEdit');
                        },
                        error: function () {
                            swal('Please check connection and try again !!')
                        }
                    });
                }
            });
        }

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            formEdit = getFormData();
            console.log(formEdit);
            $.ajax({
                type: "PUT",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('students.update')}}",
                data: {"form": [formEdit]},
                dataType: "json",
                beforeSend: function () {
                    swal('Saving data in progress...');
                },
                success: function (data) {
                    swal(data);
                    form.reset();
                    let educationfield = document.getElementById('ajax_education');
                    educationfield.value = -1;
                },
                error: function (data) {
                    form.reset();
                    let educationfield = document.getElementById('ajax_education');
                    educationfield.value = -1;
                    saveFormDataLocally(formEdit);
                    swal('Connection Failed! <br> Data saved as a draft !! ');
                }
            });
        });

        function saveFormDataLocally(formEdit) {
            const storedFormEdit = JSON.parse(localStorage.getItem('formEdit')) || [];
            storedFormEdit.push(formEdit);
            localStorage.setItem('formEdit', JSON.stringify(storedFormEdit));
        }

        function getFormData() {
            let selected_gender;
            let selected_religion;
            let selected_employed;
            let selected_student;
            let selected_field;
            let selected_level;

            let s_id = document.getElementById('std_id').value;
            let firstname = document.getElementById('firstname').value;
            let lastname = document.getElementById('lastname').value;
            let fathername = document.getElementById('fathername').value;
            let genders = document.getElementsByName('genders');
            let religions = document.getElementsByName('religions');
            let mobile = document.getElementById('mobile').value;
            let email = document.getElementById('email').value;
            let whatsapp = document.getElementById('whatsapp').value;

            let employed = document.getElementsByName('employed');
            let student = document.getElementsByName('student');
            let educationfield = document.getElementById('ajax_education');
            let educationlevel = document.getElementById('educationlevel');

            if (genders[0].checked)
                selected_gender = 0;
            else if (genders[1].checked)
                selected_gender = 1;
            else selected_gender = 2;

            for (i = 0; i < religions.length; i++) {
                if (religions[i].checked)
                    selected_religion = religions[i].value;
            }

                if (employed[0].checked)
                    selected_employed = -1;
                else if (employed[1].checked)
                    selected_employed = 0;
                else selected_employed = 1;

                if (student[0].checked)
                    selected_student = -1;
                else if (student[1].checked)
                    selected_student = 0;
                else selected_student = 1;


            selected_field = educationfield.value;
            selected_level = educationlevel.value;
            console.log('formEdit',formEdit);
            return formEdit = {
                id: s_id,
                firstname: firstname,
                lastname: lastname,
                fathername: fathername,
                nationalnumber: nationalnumber.value,
                DOB: DOB.value,
                mobile: mobile,
                whatsapp: whatsapp,
                email: email,
                street_id: street.value,
                gender_id: selected_gender,
                religion_id: selected_religion,
                is_employed: selected_employed,
                is_student: selected_student,
                educationfield_id: selected_field,
                educationlevel_id: selected_level,
                note: note.value,
                created_at: new Date().toLocaleString('sv')
            };
        }

        $.ajax({
            url: "/student-filter-educationdegree/" + {{$student -> educationfield_id}},
            type: 'GET',
            dataType: 'json',
            'success': function (response) {
                let id = response.success['educationdegree_id'];
                if (id >= 7)
                    document.getElementById("educationlevel").removeAttribute("disabled");
                else if (id < 7) document.getElementById("educationlevel").setAttribute("disabled", "disabled");
                $('#ajax_educationdegree option[value="' + id + '"]').attr("selected", true);
            },
        });

        // $("#ajax_educationdegree").change(function () {
        //     let value = document.getElementById("ajax_educationdegree").value;
        //     $.ajax({
        //         url: "/student-filter-education/" + value,
        //         type: 'GET',
        //         dataType: 'json',
        //         'success': function (response) {
        //             $("#ajax_education").empty();
        //             $("#ajax_education").append('<option disabled selected>Select one</option>');
        //             $.each(response, function () {
        //                 $.each(this, function (index, value) {
        //                     $("#ajax_education").append('<option class="btn-check" value="' + value['id'] + '">' + value['name'] + '</option>');
        //                 });
        //             });
        //         },
        //     });
        //     if (value >= 7)
        //         document.getElementById("educationlevel").removeAttribute("disabled");
        //     else if (value < 7) document.getElementById("educationlevel").setAttribute("disabled", "disabled");
        // });

        $('#nationalnumber').on("blur ", function () {
            let value = document.getElementById("nationalnumber").value;
            if(value != ""){
                let id = document.getElementById("std_id").value;

                @foreach($students as $student)
                    national = "{{$student['nationalnumber']}}";
                if (national === value){
                    std_id = "{{$student['id']}}";
                    if(std_id === id){}
                    else{
                        swal('Student already exists with ID: ' + std_id + ' <br>Please Check your information !!');
                    }
                }
                @endforeach
            }
            // $.ajax({
            //     url: "/student-check-national/" + value,
            //     type: 'GET',
            //     dataType: 'json',
            //     'success': function (response) {
            //         swal('Student already exists with name: ' + response.success);
            //     },
            // });
        });

        $('#email').on("blur ", function () {
            let mail = document.getElementById("email").value;
            let id = document.getElementById("std_id").value;
            if(mail != ""){
                @foreach($students as $student)
                    email = "{{$student['email']}}";
                std_id = "{{$student['id']}}";
                if (email === mail)
                    if(std_id === id){}
                    else{swal("Student already exists with ID:" + std_id + ' <br>Please Check your information !!');}
                @endforeach
            }
            // $.ajax({
            //     url: "/student-check-email/" + value,
            //     type: 'GET',
            //     dataType: 'json',
            //     'success': function (response) {
            //         swal('Student email already exists,student name: ' + response.success);
            //     },
            // });
        });
        $('#mobile').on("blur ", function () {
            let first = document.getElementById("firstname").value.toLowerCase();
            let last = document.getElementById("lastname").value.toLowerCase();
            let mob = document.getElementById("mobile").value;
            let id = document.getElementById("std_id").value;

            @foreach($students as $student)
                firstname = "{{$student['firstname']}}".toLowerCase();
            lastname = "{{$student['lastname']}}".toLowerCase();
            mobile = "{{$student['mobile']}}";
            std_id = "{{$student['id']}}";
            if ( first === firstname && last === lastname && mob === mobile)
                if(std_id === id){}
                else{swal("Student already exists with ID:" + std_id + ' <br>Please Check your information !!');}
            @endforeach
            // $.ajax({
            //     url: "/student-check-email/" + value,
            //     type: 'GET',
            //     dataType: 'json',
            //     'success': function (response) {
            //         swal('Student email already exists,student name: ' + response.success);
            //     },
            // });
        });
        $('#firstname').on("blur ", function () {
            let first = document.getElementById("firstname").value.toLowerCase();
            let last = document.getElementById("lastname").value.toLowerCase();
            let mob = document.getElementById("mobile").value;
            let id = document.getElementById("std_id").value;

            @foreach($students as $student)
                firstname = "{{$student['firstname']}}".toLowerCase();
            lastname = "{{$student['lastname']}}".toLowerCase();
            mobile = "{{$student['mobile']}}";
            std_id = "{{$student['id']}}";
            if (first === firstname && last === lastname && mob === mobile)
                if(std_id === id){}
                else{swal("Student already exists with ID:" + std_id + ' <br>Please Check your information !!');}
            @endforeach
            // $.ajax({
            //     url: "/student-check-email/" + value,
            //     type: 'GET',
            //     dataType: 'json',
            //     'success': function (response) {
            //         swal('Student email already exists,student name: ' + response.success);
            //     },
            // });
        });
        $('#lastname').on("blur ", function () {
            let first = document.getElementById("firstname").value.toLowerCase();
            let last = document.getElementById("lastname").value.toLowerCase();
            let mob = document.getElementById("mobile").value;
            let id = document.getElementById("std_id").value;

            @foreach($students as $student)
                firstname = "{{$student['firstname']}}".toLowerCase();
            lastname = "{{$student['lastname']}}".toLowerCase();
            mobile = "{{$student['mobile']}}";
            std_id = "{{$student['id']}}";
            if (first === firstname && last === lastname && mob === mobile)
                if(std_id === id){}
                else{swal("Student already exists with ID:" + std_id + ' <br>Please Check your information !!');}
            @endforeach
            // $.ajax({
            //     url: "/student-check-email/" + value,
            //     type: 'GET',
            //     dataType: 'json',
            //     'success': function (response) {
            //         swal('Student email already exists,student name: ' + response.success);
            //     },
            // });
        });

        $("input[name='nationalnumber']").on('input', function () {
            if ($('#nationalnumber').val().length < 11) {
                $('#national-number-alert').show();
            } else {
                $('#national-number-alert').hide();
            }
        });
        $("input[name='mobile']").on('input', function () {
            if ($('#mobile').val().length < 10) {
                $('#mobile-alert').show();
            } else {
                $('#mobile-alert').hide();
            }
        });
        $("input[name='whatsapp']").on('input', function () {
            if ($('#whatsapp').val().length < 10) {
                $('#whatsapp-alert').show();
            } else {
                $('#whatsapp-alert').hide();
            }
        });
        $("input[name='email']").on('input', function () {
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if ($('#email').val().match(validRegex)) {
                $('#email-alert').hide();
            } else {
                $('#email-alert').show();
            }
        });
    })
    ;
</script>
<script>

</script>
<script>
    $("#ajax_education option").hide();
    $("select[name='educationdegree']").change(function () {
        var selectedValue = this.options[this.selectedIndex].value;
        // console.log(selectedValue);
        $("#ajax_education option").hide();
        $("#ajax_education option[data-sync=" + selectedValue + "]").show();
        if (selectedValue >= 7)
            document.getElementById("educationlevel").removeAttribute("disabled");
        else if (selectedValue < 7) document.getElementById("educationlevel").setAttribute("disabled", "disabled");
    });
</script>
@stack('preloader')
@include('new.admin.scripts.popup-messages')
</body>
</html>
