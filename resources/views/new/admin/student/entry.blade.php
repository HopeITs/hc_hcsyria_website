<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    <?php $page = 'study' ?>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="author" content="mai youssef">
    <title>Admin | Study Zone</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/tabs.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    {{--@stack('navbar_styles')--}}
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/js/html5shiv.js"></script>
    <script type="text/javascript" src="/js/respond.min.js"></script> <![endif]-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
    <link rel="stylesheet" href="/css/aos.css">
    <script src="/js/sweetalert2.min.js"></script>
    <link href="/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/aos.js"></script>
    <script type="text/javascript" src="/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/js/buttons.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="/css/buttons.bootstrap5.min.css">
    <script type="text/javascript" src="/js/jszip.min.js"></script>
    <script type="text/javascript" src="/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="/js/buttons.colVis.min.js"></script>


    <link rel="stylesheet" href="/css/select.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="/css/dataTables.dateTime.min.css">
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.searchBuilder.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.dateTime.min.js"></script>

    <style>
        input {
            border: 1px solid lightgrey;
            border-radius: 5px;
            color: gray;
            margin-bottom: 10px;
        }

        canvas {
            width: 100% !important;
        }

        .card {
            margin-top: 0 !important;
        }
    </style>
    <div class="preloader">
        <div class="preloader-gif"></div>
    </div>
</head>
<body>

@stack('navbar_body')

<div id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('new.admin.messages')
            </div>
        </div>
        <div class="mt-5">
            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                <a class="btn btn-success mb-2" href="{{route('students.create')}}"><i
                            class="fa fa-plus-square"></i> Create new Student</a>
            @endif
            <table class="table table-striped table-bordered table-hover" id="tableStudentsentry"
                   style="width: 100%">
                <thead>
                <tr>
                    @if($user->roles->contains('name', 'Admin'))
                        <th scope="col" class="text-center">ID</th>
                    @endif
                    <th scope="col" class="text-center">Student ID</th>
                    <th scope="col" class="text-center">Student Name</th>
                    <th scope="col" class="text-center">City</th>
                    <th scope="col" class="text-center">Center</th>
                    <th scope="col" class="text-center">Entry Date</th>
                    <th scope="col" class="text-center">DOB</th>
                    <th scope="col" class="text-center">Age</th>
                    <th scope="col" class="text-center">Gender</th>
                    <th scope="col" class="text-center">Religion</th>
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

                                       {{--class="btn mb-2 btn-primary edit-btn"><span--}}
                                {{--<form id="entry_form"--}}
                                      {{--method="POST"--}}
                                      {{--enctype="multipart/form-data">--}}
                                            {{--class="btn btn-danger"--}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@stack('navbar_scripts')

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/charts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        let entryData = [];
        let localData = JSON.parse(localStorage.getItem('entryData'));
        if (navigator.onLine && localData) {
            swal({
                title: `Drafted data found!<br> Do you want to upload it?`,
                text: "this may take a few minutes!",
                showCancelButton: true,
                confirmButtonText: 'Upload',
            }).then((result) => {
                    if (result) {
                        swal('Saving data in progress...');
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{route('students.visit')}}",
                            data: {"form": localData},
                            dataType: "json",
                            beforeSend: function () {
                                swal('Saving data in progress...');
                            },
                            success: function () {
                                swal('Drafted data saved successfully !!');
                                localStorage.removeItem('entryData');
                            },
                            error: function () {
                                swal('Please check connection and try again !!')
                            }
                        });
                    }
                }
            );
        }

        let tableStudentsentry = new DataTable('#tableStudentsentry', {
            ajax: {
                url: '/admin/study/studentsentryjson',
                dataSrc: "studentsentry"
            },
// data:students,
            @if($user->roles->contains('name', 'Admin'))
            columns: [
                {data: 'ID'},
                {data: 'Student_id'},
                {data: 'Name'},
                {data: 'City'},
                {data: 'Center'},
                {data: 'created_at'},
                {data: 'DOB'},
                {data: 'Age'},
                {data: 'Gender'},
                {data: 'Religion'},
                {data: 'Address'},
                {data: 'email'},
                {data: 'mobile'},
                {data: 'whatsapp'},
                {data: 'Employed'},
                {data: 'Student'},
                {data: 'Edu_Level'},
                {data: 'Edu_Field'},
                {data: 'Enterd_by'},
                {
                    data: null,
                    render: function (data, type, row) {
                        @if($user->roles->contains('name', 'Admin') || ($user->roles->contains('name', 'English Editor') ))
                            return '<a href="/admin/student/edit/' + data.Student_id + '" class="btn mb-2 btn-primary edit-btn"><span class="fa fa-edit"></span>&nbsp; Edit</a>'
                                @endif
                                @if($user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'Admin'))
                            + '<form id="entry_form" action="/admin/student/visit" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @csrf <button data-id=' + data.Student_id + ' type="submit" class="btn btn-danger" onclick="ConfirmEntry(' + data.Student_id + ')"> Entry </button> </form>'
                                @endif
                                @if($user->roles->contains('name', 'Admin'))
                            + '<form action="/admin/studententry/' + data.ID + '" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @method('DELETE') @csrf <button data-id=' + data.ID + ' type="submit" class="btn btn-danger" onclick="ConfirmEntryDelete(' + data.ID + ')"><i class="fa fa-trash-o"></i> Delete </button> </form>'
                        @endif
                    },
                }
            ],
            @else
            columns: [
                {data: 'Student_id'},
                {data: 'Name'},
                {data: 'City'},
                {data: 'Center'},
                {data: 'created_at'},
                {data: 'DOB'},
                {data: 'Age'},
                {data: 'Gender'},
                {data: 'Religion'},
                {data: 'Address'},
                {data: 'email'},
                {data: 'mobile'},
                {data: 'whatsapp'},
                {data: 'Employed'},
                {data: 'Student'},
                {data: 'Edu_Level'},
                {data: 'Edu_Field'},
                {data: 'Enterd_by'},
                {
                    data: null,
                    render: function (data, type, row) {
                        @if($user->roles->contains('name', 'Admin') || ($user->roles->contains('name', 'English Editor') ))
                            return '<a href="/admin/student/edit/' + data.Student_id + '" class="btn mb-2 btn-primary edit-btn"><span class="fa fa-edit"></span>&nbsp; Edit</a>'
                                @endif
                                @if($user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'Admin'))
                            + '<form id="entry_form" action="/admin/student/visit" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @csrf <button data-id=' + data.Student_id + ' type="submit" class="btn btn-danger" onclick="ConfirmEntry(' + data.Student_id + ')"> Entry </button> </form>'
                                @endif
                                @if($user->roles->contains('name', 'Admin'))
                            + '<form action="/admin/studententry/' + data.ID + '" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @method('DELETE') @csrf <button data-id=' + data.ID + ' type="submit" class="btn btn-danger" onclick="ConfirmEntryDelete(' + data.ID + ')"><i class="fa fa-trash-o"></i> Delete </button> </form>'
                        @endif
                    },
                }
            ],
            @endif
            keys: true,
            colReorder: true,
            processing: true,
            "bSortClasses": false,
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            lengthChange: true,
            deferRender: true,
            lengthMenu: [[100, 250, 500, -1], [100, 250, 500, "All"]],
            buttons: ['excel', 'pdf', 'colvis'],
            @if($user->roles->contains('name', 'Admin'))
            columnDefs: [
                {targets: [7, 8, 9, 11, 12, 13, 14, 15, 16, 17], visible: false}
            ],
            @else
            columnDefs: [
                {targets: [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16], visible: false}
            ],
            @endif
        });

        tableStudentsentry.buttons().container().appendTo('#tableStudentsentry_wrapper .col-md-6:eq(0)');
        tableStudentsentry.searchBuilder.container().appendTo('#tableStudentsentry_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    $('.show_confirm').click(function (event) {
        let form = $(this).closest("form");
        // var id = event.target.attributes['id'].nodeValue;
        let id = $(this).data("id");
        event.preventDefault();

        swal({
            title: `Are you sure you want to delete ` + id + `?`,
            // icon: "warning",
            // buttons: true,
            showCancelButton: true,
            confirmButtonText: 'Delete',
            // dangerMode: true,
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
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                )
            }
        });
    });
    $(".entry-btn").click(function () {
        $(this).next().modal('show');
    });

    function saveEntryDataLocally(entryData) {
        const storedEntryData = JSON.parse(localStorage.getItem('entryData')) || [];
        storedEntryData.push(entryData);
        localStorage.setItem('entryData', JSON.stringify(storedEntryData));
    }

    function getEntryData($id) {
        return entryData = {
            student_id: $id,
            created_at: new Date().toLocaleString('sv')
        };
    }

    function ConfirmEntry(e) {
        event.preventDefault();
        let std_id = event.target.attributes["data-id"].value;
        entryData = getEntryData(std_id);
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('students.visit')}}",
            data: {"form": [entryData]},
            dataType: "json",
            beforeSend: function () {
                swal('Saving data in progress...');
            },
            success: function (data) {
                swal(data);
            },
            error: function (data) {
                saveEntryDataLocally(entryData);
                swal('Connection Failed! <br> Data saved as a draft !! ');
            }
        });
    }

    function ConfirmDelete(e) {
        event.preventDefault();
        let id = event.target.attributes["data-id"].value;
        // alert(id);
        // let form = $(this).closest("form");
        // console.log(form);

        swal({
            title: `Are you sure you want to delete ` + id + `?`,
            showCancelButton: true,
            confirmButtonText: 'Delete',
            // dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('students.destroy')}}",
                    data: {"form": id},
                    dataType: "json",
                    beforeSend: function () {
                        swal('Deleting...');
                    },
                    success: function (data) {
                        swal(data);
                        location.reload();
                    },
                });
            }
        }, function (dismiss) {
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                )
            }
        });
    }

    function ConfirmEntryDelete(e) {
        event.preventDefault();
        let id = event.target.attributes["data-id"].value;
        // alert(id);
        // let form = $(this).closest("form");
        // console.log(form);

        swal({
            title: `Are you sure you want to delete ` + id + `?`,
            showCancelButton: true,
            confirmButtonText: 'Delete',
            // dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('studentsentry.destroy')}}",
                    data: {"form": id},
                    dataType: "json",
                    beforeSend: function () {
                        swal('Deleting...');
                    },
                    success: function (data) {
                        swal(data);
                        location.reload();
                    },
                });
            }
        }, function (dismiss) {
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                )
            }
        });
    }
</script>
@stack('preloader')
@include('new.admin.scripts.popup-messages')
</body>

</html>
