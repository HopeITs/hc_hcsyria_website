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
    {{--<link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">--}}
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    {{--<link href="{{asset('css/main-new.css')}}" rel="stylesheet">--}}
    <link href="/css/tabs.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    {{--@stack('navbar_styles')--}}
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/js/html5shiv.js"></script>
    <script type="text/javascript" src="/js/respond.min.js"></script> <![endif]-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    {{--<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>--}}
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
    {{--<script type="text/javascript" src="/js/responsive.bootstrap5.min.js"></script>--}}
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
        <div>
            <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative mt-5" id="tabList"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="initiativeTab" class="initiativeTab nav-link active" data-bs-toggle="tab"
                            data-bs-target="#initiative"
                            role="tab" aria-controls="initiative" aria-selected="true">Initiatives
                        <small>({{ $iniStudy->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="successTab" class="successTab nav-link" data-bs-toggle="tab"
                            data-bs-target="#success"
                            role="tab" aria-controls="success" aria-selected="true">Successes
                        <small>({{ $sucstudy->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="pendingTab" class="pendingTab nav-link" data-bs-toggle="tab" data-bs-target="#pending"
                            role="tab" aria-controls="pending" aria-selected="false">Pending
                        <small>({{ $iniPending->count() + $sucpending->count() }})</small>
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-5">
                <div class="tab-pane show fade active " id="initiative" role="tabpanel" aria-labelledby="initiativeTab"
                     tabindex="0">
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                <a class="btn btn-success" href="{{route('study_create')}}"><i
                                            class="fa fa-plus-square"></i>&nbsp; Create new initiative</a>
                            @endif
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="tableInitiative"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Title</th>
                            <th scope="col" class="text-center">Place</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($iniStudy as $initiative)
                            <tr>
                                <td class="text-center">{{$initiative['id']}}</td>
                                <td class="text-center">{{$initiative['english']['title']}}</td>
                                <td class="text-center">{{$initiative['place']['name']}}</td>
                                <td class="text-end">
                                    @if(count($initiative->images) != 0)
                                        <i class="fa fa-picture-o"
                                           style="padding: 0.3vw 0.6vw;"></i>
                                    @endif
                                    <a href="{{route('admin_study', $initiative['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('edit.study', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                        <a href="{{route('study.add.image', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn">
                                            <i class='fa-solid fa-plus-minus'></i> Image</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{ route('delete.study', $initiative['id']) }}" method="POST"
                                              style="float: right; padding-left: 10px "
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                    data-id="{{$initiative['id']}}">
                                                <i class="fa fa-trash-o"></i></button>
                                        </form>
                                        {!! Form::open(['route' => 'unpublish.study' , 'method' => 'POST', 'style' => 'float:right;padding-left: 10px;', 'enctype' => 'multipart/form-data']) !!}
                                        {{Form::hidden('id', $initiative['id'])}}
                                        {{Form::button('<i class="fa fa-power-off"></i>', ['type' => 'submit', 'class' => 'btn mb-2 btn-danger icon-btn'])}}
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane show fade" id="success" role="tabpanel" aria-labelledby="successTab"
                     tabindex="0">
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                <a class="btn btn-success" href="{{route('successes.create')}}"><i
                                            class="fa fa-plus-square"></i>&nbsp; Create new success</a>
                            @endif
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="tableSuccess"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            {{--<th scope="col" class="text-center">Category</th>--}}
                            <th scope="col" class="text-center">Title</th>
                            <th scope="col" class="text-center">Place</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sucstudy as $initiative)
                            <tr>
                                <td class="text-center">{{$initiative['id']}}</td>
                                {{--<td>@if($initiative['sub_what_category_id'] == 0)--}}
                                {{--N/A @else {{$initiative['subWhatCategory']['name']}} @endif</td>--}}
                                <td class="text-center">{{$initiative['english']['title']}}</td>
                                <td class="text-center">{{$initiative['place']['name']}}</td>
                                <td class="text-end">
                                    @if($initiative->image_path != '')
                                        <i class="fa fa-picture-o"
                                           style="padding: 0.3vw 0.6vw;"></i>
                                    @endif
                                    <a href="{{route('successes.show', $initiative['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('successes.edit', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                        <a href="{{route('success.add.image', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn">
                                            <i class='fa-solid fa-plus-minus'></i> Image</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{ route('successes.destroy', $initiative['id']) }}" method="POST"
                                              style="float: right; padding-left: 10px "
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                    data-id="{{$initiative['id']}}">
                                                <i class="fa fa-trash-o"></i></button>
                                        </form>
                                        {!! Form::open(['route' => 'successes.offline' , 'method' => 'POST', 'style' => 'float:right;padding-left: 10px;', 'enctype' => 'multipart/form-data']) !!}
                                        {{Form::hidden('id', $initiative['id'])}}
                                        {{Form::button('<i class="fa fa-power-off"></i>', ['type' => 'submit', 'class' => 'btn mb-2 btn-danger icon-btn'])}}
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane show fade" id="pending" role="tabpanel" aria-labelledby="pendingTab" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tablePending"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Type</th>
                            <th scope="col" class="text-center">Title</th>
                            <th scope="col" class="text-center">Place</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($iniPending)
                            @foreach($iniPending as $initiative)
                                <tr>
                                    <td class="text-center">{{$initiative['id']}}</td>
                                    <td class="text-center">Initiative</td>
                                    <td class="text-center">{{$initiative['english']['title']}}</td>
                                    <td class="text-center">{{$initiative['place']['name']}}</td>
                                    <td class="text-end">
                                        @if(count($initiative->images) != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('admin_study', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('edit.study', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('study.add.image', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('delete.study', $initiative['id']) }}"
                                                  method="POST"
                                                  style="float: right; padding-left: 10px "
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$initiative['id']}}">
                                                    <i class="fa fa-trash-o"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        @if($sucpending)
                            @foreach($sucpending as $initiative)
                                <tr>
                                    <td class="text-center">{{$initiative['id']}}</td>
                                    <td class="text-center">Success</td>
                                    <td class="text-center">{{$initiative['english']['title']}}</td>
                                    <td class="text-center">{{$initiative['place']['name']}}</td>
                                    <td class="text-end">
                                        @if($initiative->image_path)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('successes.show', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('successes.edit', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('success.add.image', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('successes.destroy', $initiative['id']) }}"
                                                  method="POST"
                                                  style="float: right; padding-left: 10px "
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$initiative['id']}}">
                                                    <i class="fa fa-trash-o"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stack('navbar_scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // var calendarEl = document.getElementById('calendar');
        // var calendar = new FullCalendar.Calendar(calendarEl, {
        //     initialView: 'dayGridMonth'
        // });
        // calendar.render();
    });
    $(function () {
        let url1 = window.location.href;
        let newurl = '';
        $('#initiativeTab').on('click', function () {
            // e.preventDefault();
            // let aleppo = document.getElementById('aleppoTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('initiative'))
                        newurl = url1.replace("initiative", "initiative");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "initiative");
                    else if (url1.includes('success'))
                        newurl = url1.replace("success", "initiative");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "initiative");
                    else if (url1.includes('statistics'))
                        newurl = url1.replace("statistics", "initiative");
                    // else if (url1.includes('entry'))
                    //     newurl = url1.replace("entry", "initiative");
                }
            }
            else {
                newurl = url1 + '?tab=initiative';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#successTab').on('click', function () {
            // e.preventDefault();
            // let damas = document.getElementById('damascusTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    // let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=aleppo';
                    if (url1.includes('success'))
                        newurl = url1.replace("success", "success");
                    else if (url1.includes('initiative'))
                        newurl = url1.replace("initiative", "success");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "success");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "success");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "success");
                    else if (url1.includes('statistics'))
                        newurl = url1.replace("statistics", "success");
                    // else if (url1.includes('entry'))
                    //     newurl = url1.replace("entry", "success");
                }
            }
            else {
                newurl = url1 + '?tab=success';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
        $('#pendingTab').on('click', function () {
            // e.preventDefault();
            // let damas = document.getElementById('damascusTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    // let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=aleppo';
                    if (url1.includes('initiative'))
                        newurl = url1.replace("initiative", "pending");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "pending");
                    else if (url1.includes('success'))
                        newurl = url1.replace("success", "pending");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "pending");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "pending");
                    else if (url1.includes('statistics'))
                        newurl = url1.replace("statistics", "pending");
                    // else if (url1.includes('entry'))
                    //     newurl = url1.replace("entry", "pending");
                }
            }
            else {
                newurl = url1 + '?tab=pending';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
    });
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/charts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
<script>
    $(document).ready(function () {
        let url1 = window.location.href;
        let url2 = new URL(url1);
        let tab = url2.searchParams.get("tab") + "Tab";
        let t = document.getElementById(tab);
        let tt = new bootstrap.Tab(t);
        tt.show();

        let tableInitiative = new DataTable('#tableInitiative', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        let tableSuccess = new DataTable('#tableSuccess', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        let tablePending = new DataTable('#tablePending', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
        });
        tableInitiative.buttons().container().appendTo('#tableInitiative_wrapper .col-md-6:eq(0)');
        tableSuccess.buttons().container().appendTo('#tableSuccess_wrapper .col-md-6:eq(0)');
        tablePending.buttons().container().appendTo('#tablePending_wrapper .col-md-6:eq(0)');
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

</script>
@stack('preloader')
</body>

</html>
