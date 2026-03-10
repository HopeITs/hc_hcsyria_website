<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <?php $page = 'study' ?>
    @include('admin.navbar-test')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Study Zone</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/searchbuilder/1.6.0/css/searchBuilder.bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
            color: #428bca;
            border-top: 2px solid #428bca;
        }
        .nav-tabs {
            top: 100px;
        }

        .table-responsive {
            padding-top: 15px;
        }
        th,
        td {
            text-align: center;
        }
        form {
            float: right;
            margin-left: 4px
        }
    </style>
</head>
<body>

@stack('navbar_body')
<section style="padding-top: 30px">
    <div class="container">
       @include('admin.messages')
    </div>
    <div class="container">
        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
            <a class="btn btn-success" href="{{route('students.create')}}"><i
                    class="fa fa-plus-square"></i> Create new Student</a>
        @endif
        <ul class="nav nav-tabs">
            <li class="active"><a href="#studentsTab" data-toggle="tab">Students <span>{{ $studentsentry_count[0]->studentsentry_count}}</span></a></li>
            <li><a href="#entryTab" data-toggle="tab">Students Entry <span>{{ $students_count[0]->students_count }}</span></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="studentsTab">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableStudents"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Surename</th>
                                    <th scope="col" class="text-center">N.Number</th>
                                    <th scope="col" class="text-center">DOB</th>
                                    <th scope="col" class="text-center">Age</th>
                                    <th scope="col" class="text-center">Gender</th>
                                    <th scope="col" class="text-center">Address</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Mobile</th>
                                    <th scope="col" class="text-center">Whatsapp</th>
                                    <th scope="col" class="text-center">Employed</th>
                                    <th scope="col" class="text-center">Student</th>
                                    <th scope="col" class="text-center">Edu-Level</th>
                                    <th scope="col" class="text-center">Edu-Field</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td id="std_id" class="text-center">{{$student->ID}}</td>
                                        <td class="text-center">{{$student->firstname}}</td>
                                        <td class="text-center">{{$student->lastname}}</td>
                                        <td class="text-center">{{$student->nationalnumber}}</td>
                                        <td class="text-center">{{$student->DOB}}</td>
                                        <td class="text-center">{{ (now()->year) - $student->DOB }}</td>
                                        <td class="text-center">{{$student->Gender}}</td>
                                        <td class="text-center">{{$student->Address}}</td>
                                        <td class="text-center">{{$student->email}}</td>
                                        <td class="text-center">{{$student->mobile}}</td>
                                        <td class="text-center">{{$student->whatsapp}}</td>
                                        @if($student->is_employed== 1)
                                            <td class="text-center">Yes</td>
                                        @else
                                            <td class="text-center">No</td>
                                        @endif
                                        @if($student->is_student== 1)
                                            <td class="text-center">Yes</td>
                                        @else
                                            <td class="text-center">No</td>
                                        @endif
                                        @if($student->Edu_Level == Null)
                                            <td></td>
                                        @else
                                            <td class="text-center">{{$student->Edu_Level}}</td>
                                        @endif
                                        @if($student->Edu_Field== Null)
                                            <td></td>
                                        @else
                                            <td class="text-center">{{$student->Edu_Field}}</td>
                                        @endif
                                        <td class="text-end">
                                            @if($user->roles->contains('name', 'Admin') || ($user->roles->contains('name', 'English Editor') && $student->place_id == $user->places->contains('id',$student->place_id)))
                                                <a href="{{route('students.edit', $student->ID)}}"
                                                   class="btn mb-2 btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp; Edit</a>
                                                {{--@endif--}}
                                            @endif
                                            @if($user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'Admin'))
                                                <form id="entry_form"
                                                      action="{{ route('students.visit')}}"
                                                      method="POST"
                                                      enctype="multipart/form-data">
                                                    {{--@method('POST')--}}
                                                    @csrf
                                                    <button class="btn mb-2 btn-primary edit-btn btn-submit"
                                                            type="submit"
                                                            data-id="{{$student->ID}}">
                                                        <i class="fa fa-sign-in"></i> Entry
                                                    </button>
                                                </form>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('students.destroy', $student->ID) }}"
                                                      method="POST"
                                                      style="float: right; padding-left: 10px "
                                                      enctype="multipart/form-data">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn mb-2 btn-danger icon-btn show_confirm"
                                                            type="submit"
                                                            data-id="{{$student->ID}}">
                                                        <i class="fa fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="entryTab">
			<div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableStudents"
                                   style="width: 100%">
								<thead>
                                <tr>
                                    <th scope="col" class="text-center">Student ID</th>
                                    <th scope="col" class="text-center">Student Name</th>
                                    <th scope="col" class="text-center">City</th>
                                    <th scope="col" class="text-center">Center</th>
                                    <th scope="col" class="text-center">Entry Date</th>
                                    <th scope="col" class="text-center">DOB</th>
                                    <th scope="col" class="text-center">Age</th>
                                    <th scope="col" class="text-center">Gender</th>
                                    <th scope="col" class="text-center">Address</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Mobile</th>
                                    <th scope="col" class="text-center">Whatsapp</th>
                                    <th scope="col" class="text-center">Employed</th>
                                    <th scope="col" class="text-center">Student</th>
                                    <th scope="col" class="text-center">Edu-Level</th>
                                    <th scope="col" class="text-center">Edu-Field</th>
                                    <th scope="col" class="text-center">Enterd By</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($studentsentry as $student)
                                    <tr>
                                        <td class="text-center">{{$student->Student_id}}</td>
                                        <td class="text-center">{{$student->Name}}</td>
                                        <td class="text-center">{{$student->City}}</td>
                                        <td class="text-center">{{$student->Center}}</td>
                                        <td class="text-center">{{$student->created_at}}</td>
                                        <td class="text-center">{{$student->DOB}}</td>
                                        <td class="text-center">{{ (now()->year) - $student->DOB }}</td>
                                        <td class="text-center">{{$student->Gender}}</td>
                                        <td class="text-center">{{$student->Address}}</td>
                                        <td class="text-center">{{$student->email}}</td>
                                        <td class="text-center">{{$student->mobile}}</td>
                                        <td class="text-center">{{$student->whatsapp}}</td>
                                        {{--<td class="text-center">{{$student['place']['name']}}</td>--}}
                                        {{--<td class="text-center">{{$student['center']['name']}}</td>--}}
                                        @if($student->Employed == 1)
                                            <td class="text-center">Yes</td>
                                        @else
                                            <td class="text-center">No</td>
                                        @endif
                                        @if($student->Student== 1)
                                            <td class="text-center">Yes</td>
                                        @else
                                            <td class="text-center">No</td>
                                        @endif
                                        <td class="text-center">{{$student->Edu_Level}}</td>
                                        <td class="text-center">{{$student->Edu_Field}}</td>
                                        <td class="text-center">{{$student->Enterd_by}}</td>
                                        <td class="text-end">
                                            @if($user->roles->contains('name', 'Admin') || ($user->roles->contains('name', 'English Editor') && $student->place_id == $user->places->contains('id',$student->place_id)))
                                                {{--@if($student->street->place_id == $user->places->contains('id',$student->street->place_id) && !$user->roles->contains('name', 'Admin') )--}}

                                                <a href="{{route('students.edit', $student->Student_id)}}"
                                                   class="btn mb-2 btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp; Edit</a>
                                                {{--@endif--}}
                                            @endif
                                            @if($user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'Admin'))
                                                <form id="entry_form"
                                                      action="{{ route('students.visit')}}"
                                                      method="POST"
                                                      enctype="multipart/form-data">
                                                    {{--@method('POST')--}}
                                                    @csrf
                                                    <button class="btn mb-2 btn-primary edit-btn btn-submit"
                                                            type="submit"
                                                            data-id="{{$student->Student_id}}">
                                                        <i class="fa fa-sign-in"></i> Entry
                                                    </button>
                                                </form>
                                                {{--<button class="btn mb-2 btn-primary edit-btn entry-btn"--}}
                                                {{--id="{{$student['id']}}"--}}
                                                {{--data-toggle="modal"--}}
                                                {{--data-target="#student-{{$student['id']}}"><span--}}
                                                {{--class="fa fa-sign-in"></span> Entry--}}
                                                {{--</button>--}}

                                                {{--<div class="modal fade project-detail"--}}
                                                {{--id="#student-{{$student['id']}}"--}}
                                                {{--tabindex="-1" role="dialog" aria-hidden="true">--}}
                                                {{--<div class="modal-dialog">--}}
                                                {{--<div class="modal-content">--}}
                                                {{--<div class="modal-body">--}}
                                                {{--<div class="row">--}}
                                                {{--<div class="col">--}}
                                                {{--<h3 class="title text-start">Create Entry</h3>--}}
                                                {{--<form action="{{ route('students.visit',[$student->id])}}" method="POST"--}}
                                                {{--enctype="multipart/form-data">--}}
                                                {{--@csrf--}}
                                                {{--<div class="row mb-3">--}}
                                                {{--<label class="text-start">Study Zone Center <span class="red-color">*</span></label><br>--}}
                                                {{--<div class="form-group col">--}}
                                                {{--<div class="btn-group w-100 flex-wrap" role="group">--}}
                                                {{--@foreach($centers as $center)--}}
                                                {{--<input type="radio" name="center" class="btn-check"--}}
                                                {{--id="center_{{$center->id}}" value="{{$center->id}}">--}}
                                                {{--<label for="center_{{$center->id}}"--}}
                                                {{--class="btn btn-outline-primary">{{$center->name}}--}}
                                                {{--</label>--}}
                                                {{--@endforeach--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="d-flex justify-content-center">--}}
                                                {{--<button type="submit" class="btn btn-info" ><i--}}
                                                {{--class="fa fa-external-link"></i> Create--}}
                                                {{--</button>--}}
                                                {{--</div>--}}
                                                {{--</form>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
								</table>
								</div>
								</div>
								</div>
								</div>
								
        </div>
    </div>
</section>

@stack('navbar_scripts')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.6.0/js/dataTables.searchBuilder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.6.0/js/searchBuilder.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="/js/buttons.print.min.js"></script>

<script type="text/javascript" src="/js/jszip.min.js"></script>

<script type="text/javascript" src="/js/vfs_fonts.js"></script>



<script>
    $(function () {
        let url1 = window.location.href;
        let newurl = '';
        $('#studentsTab').on('click', function () {
            // e.preventDefault();
            // let damas = document.getElementById('damascusTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    // let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=aleppo';
                    if (url1.includes('initiative'))
                        newurl = url1.replace("initiative", "students");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "students");
                    else if (url1.includes('success'))
                        newurl = url1.replace("success", "students");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "students");
                    else if (url1.includes('entry'))
                        newurl = url1.replace("entry", "students");
                }
            }
            else {
                newurl = url1 + '?tab=students';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
        $('#entryTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('initiative'))
                        newurl = url1.replace("initiative", "studentsentry");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "studentsentry");
                    else if (url1.includes('success'))
                        newurl = url1.replace("success", "studentsentry");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "entry");
                    else if (url1.includes('entry'))
                        newurl = url1.replace("entry", "entry");
                }
            }
            else {
                newurl = url1 + '?tab=entry';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
    });
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        var tableStudents = $('#tableStudents').DataTable({
            "bPaginate": true,
            "aaSorting": [],
			searchBuilder: true,
			 buttons: [ 'excel', 'pdf', 'colvis' ],
			 lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
            "scrollX": true,
        });
		tableStudents.searchBuilder.container().prependTo(tableStudents.table().container());
		tableStudents.buttons().container()
        .appendTo( '#tableStudents_wrapper .col-sm-6:eq(0)' );

var tableStudentsentry = $('#tableStudentsentry').DataTable({
            "bPaginate": true,
            "aaSorting": [],
			searchBuilder: true,
			 buttons: [ 'excel', 'pdf', 'colvis' ],
			 lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
            "scrollX": true,
        });
		tableStudentsentry.searchBuilder.container().prependTo(tableStudentsentry.table().container());
		tableStudentsentry.buttons().container()
        .appendTo( '#tableStudentsentry_wrapper .col-sm-6:eq(0)' );

    });
</script>

</body>

</html>