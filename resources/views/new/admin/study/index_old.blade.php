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
                <li class="nav-item" role="presentation">
                    <button id="statisticsTab" class="statisticsTab nav-link" data-bs-toggle="tab"
                            data-bs-target="#statistics"
                            role="tab" aria-controls="statistics" aria-selected="false">Statistics
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="studentsTab" class="studentsTab nav-link" data-bs-toggle="tab"
                            data-bs-target="#students"
                            role="tab" aria-controls="students" aria-selected="false">Students
                        <span>({{ $students_count[0]->students_count}})</span>
                    </button>

                </li>
                {{--<li class="nav-item" role="presentation">--}}
                    {{--<button id="entryTab" class="entryTab nav-link" data-bs-toggle="tab"--}}
                            {{--data-bs-target="#entry"--}}
                            {{--role="tab" aria-controls="entry" aria-selected="false">Students Entry--}}
                        {{--<span>({{ $studentsentry_count[0]->studentsentry_count }})</span>--}}
                    {{--</button>--}}

                {{--</li>--}}
                {{--<li class="nav-item" role="presentation">--}}
                    {{--<button id="calendarTab" class="calendarTab nav-link" data-bs-toggle="tab"--}}
                            {{--data-bs-target="#calendar"--}}
                            {{--role="tab" aria-controls="entry" aria-selected="false">Centers Calendar--}}
                    {{--</button>--}}

                {{--</li>--}}
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
                <div class="tab-pane show fade" id="statistics" role="tabpanel" aria-labelledby="statisticsTab">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-title main-color-bg"> Statistics
                                    </div>
                                    {{--all places--}}
                                    {{--@if($user_centers)--}}
                                        <div class="card-body">
                                            <div class="card">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="well dash-box">
                                                            <div>
                                                                <div class="row"
                                                                     style="margin-bottom: 10px;">
                                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                                        Start Date: <input
                                                                                id="startchartAvg" value=""
                                                                                type="date"
                                                                                min="01/01/2023" max=""
                                                                                pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                                        End Date: <input id="endchartAvg"
                                                                                         value=""
                                                                                         min="01/01/2023"
                                                                                         max=""
                                                                                         type="date"
                                                                                         pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                    </div>
                                                                    <div class="row d-flex justify-content-center mb-2">
                                                                        <div class="col-auto">
                                                                            <button class="btn btn-primary edit-btn"
                                                                                    onclick="filterData('chartAvg',chartAvg,avgExport)">
                                                                                Filter
                                                                            </button>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <button class="btn btn-primary edit-btn"
                                                                                    onclick="resetData('chartAvg',countavg,chartAvg,dateAvg)">
                                                                                Reset
                                                                            </button>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <button class="btn btn-primary edit-btn"
                                                                                    id="avgExportExcel"
                                                                                    onclick="exportData('avgExportExcel','EntriesAvg',avgExportTemp)">
                                                                                Export
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <canvas id="chartAvg"
                                                                                height="75"></canvas>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    @foreach($centernames as $name)
                                                        <div class="card-title main-color-bg"> {{$name}}
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="well dash-box">
                                                                    <div>
                                                                        @if($name === 'Tartus - Study Zone 1')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartKhrab"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartKhrab"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartKhrab',chartCountKhrab,khrabExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartKhrab',countkhrab,chartCountKhrab,datekhrab)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="khrabExportExcel"
                                                                                                onclick="exportData('khrabExportExcel','EntriesCountKhrab',khrabExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountKhrab"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        @if($name === 'Homs - Study Zone 4')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartHamidiye"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartHamidiye"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartHamidiye',chartCountHamidiye,hamidiyeExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartHamidiye',counthamidiye,chartCountHamidiye,datehamidiye)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button id="hamidiyeExportExcel"
                                                                                                class="btn btn-primary edit-btn"
                                                                                                onclick="exportData('hamidiyeExportExcel','EntriesCountHamidiye',hamidiyeExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountHamidiye"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                        @if ($name === 'Homs - Science Zone')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartAdawia"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartAdawia"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartAdawia',chartCountAdawia,adawiaExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartAdawia',countadawia,chartCountAdawia,dateadawia)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button id="adawiaExportExcel"
                                                                                                class="btn btn-primary edit-btn"
                                                                                                onclick="exportData('adawiaExportExcel','EntriesCountAdawia',adawiaExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountAdawia"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>@endif
                                                                        @if ($name === 'Aleppo - Science Zone')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartVillat"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartVillat"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartVillat',chartCountVillat,villatExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartVillat',countvillat,chartCountVillat,datevillat)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="villatExportExcel"
                                                                                                onclick="exportData('villatExportExcel','EntriesCountVillat',villatExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountVillat"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>@endif
                                                                        @if ($name === 'Latakia- Study Zone 4')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartMashrouh"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartMashrouh"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartMashrouh',chartCountMashrouh,mashrouhExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartMashrouh',countmashrouh,chartCountMashrouh,datemashrouh)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button id="mashrouhExportExcel"
                                                                                                class="btn btn-primary edit-btn"
                                                                                                onclick="exportData('mashrouhExportExcel','EntriesCountAndrews',mashrouhExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountMashrouh"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>@endif
                                                                        @if ($name === 'Latakia - Study Zone 3')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartAzar"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartAzar"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartAzar',chartCountAzar,azarExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartAzar',countazar,chartCountAzar,dateazar)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="azarExportExcel"
                                                                                                onclick="exportData('azarExportExcel','EntriesCount8Azar',azarExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountAzar"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>@endif
                                                                        @if ($name === 'Latakia - Study Zone 2')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartZiraa2"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartZiraa2"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartZiraa2',chartCountZiraa2,ziraa2Export)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartZiraa2',countziraa2,chartCountZiraa2,dateziraa2)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="ziraa2ExportExcel"
                                                                                                onclick="exportData('ziraa2ExportExcel','EntriesCountZiraa2',ziraa2ExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountZiraa2"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>@endif
                                                                        @if ($name === 'Al Mouzeina')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartMouzeina"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartMouzeina"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartMouzeina',chartCountMouzeina,mouzeinaExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartMouzeina',countmouzeina,chartCountMouzeina,datemouzeina)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="mouzeinaExportExcel"
                                                                                                onclick="exportData('mouzeinaExportExcel','EntriesCountMouzeina',mouzeinaExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountMouzeina"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>@endif
                                                                        @if ($name === 'Homs - Study Zone 2')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartMahatta"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartMahatta"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartMahatta',chartCountMahatta,mahattaExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartMahatta',countmahatta,chartCountMahatta,datemahatta)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="mahattaExportExcel"
                                                                                                onclick="exportData('mahattaExportExcel','EntriesCountMahatta',mahattaExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountMahatta"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>
                                                                                                    @endif
                                                                        @if ($name === 'Damascus - Study Zone 1')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartBabtouma"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartBabtouma"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartBabtouma',chartCountBabtouma,babtoumaExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartBabtouma',countbabtouma,chartCountBabtouma,datebabtouma)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="babtoumaExportExcel"
                                                                                                onclick="exportData('babtoumaExportExcel','EntriesCountBabtouma',babtoumaExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountBabtouma"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>
                                                                                                        @endif
                                                                        @if ($name === 'Damascus - Study Zone 3')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartBabsharqi"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartBabsharqi"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartBabsharqi',chartCountBabsharqi,babsharqiExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartBabsharqi',countbabsharqi,chartCountBabsharqi,datebabsharqi)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="babtoumaExportExcel"
                                                                                                onclick="exportData('babsharqiExportExcel','EntriesCountBabsharqi',babsharqiExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountBabsharqi"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>
                                                                                                            @endif
                                                                        @if ($name === 'Latakia - Study Zone 1')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartZiraa1"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartZiraa1"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartZiraa1',chartCountZiraa1,ziraa1Export)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartZiraa1',countziraa1,chartCountZiraa1,dateziraa1)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="ziraa1ExportExcel"
                                                                                                onclick="exportData('ziraa1ExportExcel','EntriesCountZiraa1',ziraa1ExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountZiraa1"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>
                                                                                                                @endif
                                                                        @if ($name === 'Homs - Study Zone 3')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartArman"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartArman"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartArman',chartCountArman,armanExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartArman',countarman,chartCountArman,datearman)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="armanExportExcel"
                                                                                                onclick="exportData('armanExportExcel','EntriesCountArman',armanExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountArman"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>
                                                                                                        @endif
                                                                        @if ($name === 'Homs - Study Zone 1')
                                                                            <div class="row"
                                                                                 style="margin-bottom: 10px;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    Start Date: <input
                                                                                            id="startChartNouzha"
                                                                                            value=""
                                                                                            type="date"
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                    End Date: <input
                                                                                            id="endChartNouzha"
                                                                                            value=""
                                                                                            min="01/01/2023"
                                                                                            max=""
                                                                                            type="date"
                                                                                            pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">
                                                                                </div>
                                                                                <div class="row d-flex justify-content-center mb-2">
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="filterData('ChartNouzha',chartCountNouzha,nouzhaExport)">
                                                                                            Filter
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                onclick="resetData('ChartNouzha',countnouzha,chartCountNouzha,datenouzha)">
                                                                                            Reset
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <button class="btn btn-primary edit-btn"
                                                                                                id="nouzhaExportExcel"
                                                                                                onclick="exportData('nouzhaExportExcel','EntriesCountNouzha',nouzhaExportTemp)">
                                                                                            Export
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <canvas id="chartCountNouzha"
                                                                                            height="75"></canvas>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    {{--@else--}}
                                        {{--@foreach($centernames as $name)--}}
                                            {{--<div class="card-body">--}}
                                                {{--<div class="card">--}}
                                                    {{--<div class="card-title main-color-bg"> {{$name}}--}}
                                                    {{--</div>--}}
                                                    {{--<div class="card-body">--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                                                                {{--<div class="well dash-box">--}}
                                                                    {{--<div>--}}
                                                                        {{--<div class="row" style="margin-bottom: 10px;">--}}
                                                                            {{--<div class="col-lg-6 col-md-6 col-sm-12">--}}
                                                                                {{--Start Date: <input id="startchartAvg"--}}
                                                                                                   {{--value=""--}}
                                                                                                   {{--type="date"--}}
                                                                                                   {{--min="01/01/2023"--}}
                                                                                                   {{--max=""--}}
                                                                                                   {{--pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">--}}
                                                                            {{--</div>--}}
                                                                            {{--<div class="col-lg-6 col-md-6 col-sm-12">--}}
                                                                                {{--End Date: <input id="endchartAvg"--}}
                                                                                                 {{--value=""--}}
                                                                                                 {{--min="01/01/2023" max=""--}}
                                                                                                 {{--type="date"--}}
                                                                                                 {{--pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">--}}
                                                                            {{--</div>--}}
                                                                            {{--<div class="row d-flex justify-content-center mb-2">--}}
                                                                                {{--<div class="col-auto">--}}
                                                                                    {{--<button class="btn btn-primary edit-btn"--}}
                                                                                            {{--onclick="filterData('chartAvg',chartAvg,avgExport)">--}}
                                                                                        {{--Filter--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="col-auto">--}}
                                                                                    {{--<button class="btn btn-primary edit-btn"--}}
                                                                                            {{--onclick="resetData('chartAvg',countavg,chartAvg,dateAvg)">--}}
                                                                                        {{--Reset--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="col-auto">--}}
                                                                                    {{--<button class="btn btn-primary edit-btn"--}}
                                                                                            {{--id="avgExportExcel"--}}
                                                                                            {{--onclick="exportData('avgExportExcel','EntriesAvg',avgExportTemp)">--}}
                                                                                        {{--Export--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                            {{--</div>--}}
                                                                            {{--<div class="col-sm-12">--}}
                                                                                {{--<canvas id="chartAvg"--}}
                                                                                        {{--height="75"></canvas>--}}
                                                                            {{--</div>--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
                                                                {{--<div class="well dash-box">--}}
                                                                    {{--<div>--}}
                                                                        {{--<div class="row" style="margin-bottom: 10px;">--}}
                                                                            {{--<div class="col-lg-6 col-md-6 col-sm-12">--}}
                                                                                {{--Start Date: <input id="startChartCount"--}}
                                                                                                   {{--value=""--}}
                                                                                                   {{--type="date"--}}
                                                                                                   {{--min="01/01/2023"--}}
                                                                                                   {{--max=""--}}
                                                                                                   {{--pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">--}}
                                                                            {{--</div>--}}
                                                                            {{--<div class="col-lg-6 col-md-6 col-sm-12">--}}
                                                                                {{--End Date: <input id="endChartCount"--}}
                                                                                                 {{--value=""--}}
                                                                                                 {{--min="01/01/2023" max=""--}}
                                                                                                 {{--type="date"--}}
                                                                                                 {{--pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}">--}}
                                                                            {{--</div>--}}
                                                                            {{--<div class="row d-flex justify-content-center mb-2">--}}
                                                                                {{--<div class="col-auto">--}}
                                                                                    {{--<button class="btn btn-primary edit-btn"--}}
                                                                                            {{--onclick="filterData('ChartCount',chartCount,countExport)">--}}
                                                                                        {{--Filter--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="col-auto">--}}
                                                                                    {{--<button class="btn btn-primary edit-btn"--}}
                                                                                            {{--onclick="resetData('ChartCount',count,chartCount,date)">--}}
                                                                                        {{--Reset--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="col-auto">--}}
                                                                                    {{--<button class="btn btn-primary edit-btn"--}}
                                                                                            {{--id="countExportExcel"--}}
                                                                                            {{--onclick="exportData('countExportExcel','EntriesCount',countExportTemp)">--}}
                                                                                        {{--Export--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                            {{--</div>--}}
                                                                            {{--<div class="col-sm-12">--}}
                                                                                {{--<canvas id="ChartCount"--}}
                                                                                        {{--height="75"></canvas>--}}
                                                                            {{--</div>--}}
                                                                        {{--</div>--}}

                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="students" role="tabpanel" aria-labelledby="studentsTab">
                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                        <a class="btn btn-success mb-2" href="{{route('students.create')}}"><i
                                    class="fa fa-plus-square"></i> Create new Student</a>
                        <a class="btn btn-primary mb-2" href="{{route('students.entries')}}"><i
                                    ></i> Show Entries</a>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="tableStudents"
                           style="width: 100%">
                        <thead id="headerArea">
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Fathername</th>
                            <th scope="col" class="text-center">Surename</th>
                            <th scope="col" class="text-center">N.Number</th>
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
                            <th scope="col" class="text-center no-export">Action</th>
                        </tr>
                        </thead>
                        {{--</table>--}}
                        {{--<div id="scrollArea" class="clusterize-scroll">--}}
                        {{--<table id="contentAreaTable">--}}
                        <tbody>
                        {{--@foreach($students as $student)--}}
                        {{--<tr>--}}
                        {{--<td id="std_id" class="text-center">{{$student->ID}}</td>--}}
                        {{--<td class="text-center">{{$student->firstname}}</td>--}}
                        {{--<td class="text-center">{{$student->lastname}}</td>--}}
                        {{--<td class="text-center">{{$student->nationalnumber}}</td>--}}
                        {{--<td class="text-center">{{$student->DOB}}</td>--}}
                        {{--<td class="text-center">{{ (now()->year) - $student->DOB }}</td>--}}
                        {{--<td class="text-center">{{$student->Gender}}</td>--}}
                        {{--<td class="text-center">{{$student->Address}}</td>--}}
                        {{--<td class="text-center">{{$student->email}}</td>--}}
                        {{--<td class="text-center">{{$student->mobile}}</td>--}}
                        {{--<td class="text-center">{{$student->whatsapp}}</td>--}}
                        {{--@if($student->is_employed== 1)--}}
                        {{--<td class="text-center">Yes</td>--}}
                        {{--@else--}}
                        {{--<td class="text-center">No</td>--}}
                        {{--@endif--}}
                        {{--@if($student->is_student== 1)--}}
                        {{--<td class="text-center">Yes</td>--}}
                        {{--@else--}}
                        {{--<td class="text-center">No</td>--}}
                        {{--@endif--}}
                        {{--@if($student->Edu_Level == Null)--}}
                        {{--<td></td>--}}
                        {{--@else--}}
                        {{--<td class="text-center">{{$student->Edu_Level}}</td>--}}
                        {{--@endif--}}
                        {{--@if($student->Edu_Field== Null)--}}
                        {{--<td></td>--}}
                        {{--@else--}}
                        {{--<td class="text-center">{{$student->Edu_Field}}</td>--}}
                        {{--@endif--}}
                        {{--<td class="text-end no-export">--}}
                        {{--@if($user->roles->contains('name', 'Admin') || ($user->roles->contains('name', 'English Editor') && $student->place_id == $user->places->contains('id',$student->place_id)))--}}
                        {{--<a href="{{route('students.edit', $student->ID)}}"--}}
                        {{--class="btn mb-2 btn-primary edit-btn"><span--}}
                        {{--class="fa fa-edit"></span>&nbsp; Edit</a>--}}
                        {{--@endif--}}
                        {{--@endif--}}
                        {{--@if($user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'Admin'))--}}
                        {{--<form id="entry_form"--}}
                        {{--action="{{ route('students.visit')}}"--}}
                        {{--method="POST"--}}
                        {{--enctype="multipart/form-data">--}}
                        {{--@csrf--}}
                        {{--<button data-id="{{$student->ID}}" type="submit"--}}
                        {{--class="btn btn-danger"--}}
                        {{--onclick="ConfirmEntry({{$student->ID}})"> Entry--}}
                        {{--</button>--}}
                        {{--</form>--}}
                        {{--@endif--}}
                        {{--@if($user->roles->contains('name', 'Admin'))--}}
                        {{--<form action="{{ route('students.destroy', $student->ID) }}"--}}
                        {{--method="POST"--}}
                        {{--style="float: right; padding-left: 10px "--}}
                        {{--enctype="multipart/form-data">--}}
                        {{--@method('DELETE')--}}
                        {{--@csrf--}}
                        {{--<button class="btn btn-danger"--}}
                        {{--onclick="return ConfirmDelete({{$student->ID}})"><i--}}
                        {{--class="fa fa-trash-o"></i> Delete--}}
                        {{--</button>--}}
                        {{--</form>--}}
                        {{--@endif--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
                {{--<div class="tab-pane fade" id="entry" role="tabpanel" aria-labelledby="entryTab">--}}
                    {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                        {{--<a class="btn btn-success mb-2" href="{{route('students.create')}}"><i--}}
                                    {{--class="fa fa-plus-square"></i> Create new Student</a>--}}
                    {{--@endif--}}
                    {{--<table class="table table-striped table-bordered table-hover" id="tableStudentsentry"--}}
                           {{--style="width: 100%">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--@if($user->roles->contains('name', 'Admin'))--}}
                                {{--<th scope="col" class="text-center">ID</th>--}}
                            {{--@endif--}}
                            {{--<th scope="col" class="text-center">Student ID</th>--}}
                            {{--<th scope="col" class="text-center">Student Name</th>--}}
                            {{--<th scope="col" class="text-center">City</th>--}}
                            {{--<th scope="col" class="text-center">Center</th>--}}
                            {{--<th scope="col" class="text-center">Entry Date</th>--}}
                            {{--<th scope="col" class="text-center">DOB</th>--}}
                            {{--<th scope="col" class="text-center">Age</th>--}}
                            {{--<th scope="col" class="text-center">Gender</th>--}}
                            {{--<th scope="col" class="text-center">Religion</th>--}}
                            {{--<th scope="col" class="text-center">Address</th>--}}
                            {{--<th scope="col" class="text-center">Email</th>--}}
                            {{--<th scope="col" class="text-center">Mobile</th>--}}
                            {{--<th scope="col" class="text-center">Whatsapp</th>--}}
                            {{--<th scope="col" class="text-center">Employed</th>--}}
                            {{--<th scope="col" class="text-center">Student</th>--}}
                            {{--<th scope="col" class="text-center">Edu-Level</th>--}}
                            {{--<th scope="col" class="text-center">Edu-Field</th>--}}
                            {{--<th scope="col" class="text-center">Enterd By</th>--}}
                            {{--<th scope="col" class="text-center">Action</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach($studentsentry as $student)--}}
                        {{--<tr>--}}
                        {{--<td class="text-center">{{$student->Student_id}}</td>--}}
                        {{--<td class="text-center">{{$student->Name}}</td>--}}
                        {{--<td class="text-center">{{$student->City}}</td>--}}
                        {{--<td class="text-center">{{$student->Center}}</td>--}}
                        {{--<td class="text-center">{{$student->created_at}}</td>--}}
                        {{--<td class="text-center">{{$student->DOB}}</td>--}}
                        {{--<td class="text-center">{{ (now()->year) - $student->DOB }}</td>--}}
                        {{--<td class="text-center">{{$student->Gender}}</td>--}}
                        {{--<td class="text-center">{{$student->Address}}</td>--}}
                        {{--<td class="text-center">{{$student->email}}</td>--}}
                        {{--<td class="text-center">{{$student->mobile}}</td>--}}
                        {{--<td class="text-center">{{$student->whatsapp}}</td>--}}
                        {{--<td class="text-center">{{$student['place']['name']}}</td>--}}
                        {{--<td class="text-center">{{$student['center']['name']}}</td>--}}
                        {{--@if($student->Employed == 1)--}}
                        {{--<td class="text-center">Yes</td>--}}
                        {{--@else--}}
                        {{--<td class="text-center">No</td>--}}
                        {{--@endif--}}
                        {{--@if($student->Student== 1)--}}
                        {{--<td class="text-center">Yes</td>--}}
                        {{--@else--}}
                        {{--<td class="text-center">No</td>--}}
                        {{--@endif--}}
                        {{--<td class="text-center">{{$student->Edu_Level}}</td>--}}
                        {{--<td class="text-center">{{$student->Edu_Field}}</td>--}}
                        {{--<td class="text-center">{{$student->Enterd_by}}</td>--}}
                        {{--<td class="text-end">--}}
                        {{--@if($user->roles->contains('name', 'Admin') || ($user->roles->contains('name', 'English Editor') && $student->place_id == $user->places->contains('id',$student->place_id)))--}}
                        {{--@if($student->street->place_id == $user->places->contains('id',$student->street->place_id) && !$user->roles->contains('name', 'Admin') )--}}

                        {{--<a href="{{route('students.edit', $student->Student_id)}}"--}}
                        {{--class="btn mb-2 btn-primary edit-btn"><span--}}
                        {{--class="fa fa-edit"></span>&nbsp; Edit</a>--}}
                        {{--@endif--}}
                        {{--@endif--}}
                        {{--@if($user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'Admin'))--}}
                        {{--<form id="entry_form"--}}
                        {{--action="{{ route('students.visit')}}"--}}
                        {{--method="POST"--}}
                        {{--enctype="multipart/form-data">--}}
                        {{--@csrf--}}
                        {{--<button data-id="{{$student->Student_id}}" type="submit"--}}
                        {{--class="btn btn-danger"--}}
                        {{--onclick="ConfirmEntry({{$student->Student_id}})"> Entry--}}
                        {{--</button>--}}
                        {{--</form>--}}
                        {{--@endif--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
                {{--<div class="tab-pane fade" id="calendar" role="tabpanel" aria-labelledby="calendarTab">--}}
                    {{--<div id='calendar'></div>--}}
                {{--</div>--}}
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
                    else if (url1.includes('statistics'))
                        newurl = url1.replace("statistics", "students");
                    // else if (url1.includes('entry'))
                    //     newurl = url1.replace("entry", "students");
                }
            }
            else {
                newurl = url1 + '?tab=students';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
        // $('#entryTab').on('click', function () {
        //     // e.preventDefault();
        //     // let damas = document.getElementById('damascusTab');
        //     if (url1.includes('tab')) {
        //         if (history.pushState) {
        //             // let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=aleppo';
        //             if (url1.includes('initiative'))
        //                 newurl = url1.replace("initiative", "entry");
        //             else if (url1.includes('pending'))
        //                 newurl = url1.replace("pending", "entry");
        //             else if (url1.includes('success'))
        //                 newurl = url1.replace("success", "entry");
        //             else if (url1.includes('students'))
        //                 newurl = url1.replace("students", "entry");
        //             else if (url1.includes('statistics'))
        //                 newurl = url1.replace("statistics", "entry");
        //             else if (url1.includes('entry'))
        //                 newurl = url1.replace("entry", "entry");
        //         }
        //     }
        //     else {
        //         newurl = url1 + '?tab=entry';
        //     }
        //     window.history.pushState({path: newurl}, '', newurl);
        //
        // });
        $('#statisticsTab').on('click', function () {
            // e.preventDefault();
            // let damas = document.getElementById('damascusTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    // let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=aleppo';
                    if (url1.includes('initiative'))
                        newurl = url1.replace("initiative", "statistics");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "statistics");
                    else if (url1.includes('success'))
                        newurl = url1.replace("success", "statistics");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "statistics");
                    else if (url1.includes('statistics'))
                        newurl = url1.replace("statistics", "statistics");
                    // else if (url1.includes('entry'))
                    //     newurl = url1.replace("entry", "statistics");
                }
            }
            else {
                newurl = url1 + '?tab=statistics';
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
    function initializeChartValues(type) {
        if (type === 'chartAvg') {
            avgExportTemp = [];
            avgExport = [];
            dateAvg = [];
            countavg = [];
            @if($statis_avg)
            @foreach($statis_avg as $avg)
            dateAvg.push("{{$avg->entry_date}}");
            countavg.push({{$avg->avg_entry_count}});
            {{--avgArray.push({entry_date: "{{$avg->entry_date}}", entry_count:{{$avg->avg_entry_count}}});--}}
            avgExport.push({Date: "{{$avg->entry_date}}", Average:{{$avg->avg_entry_count}}});
            @endforeach
            avgExport.unshift({Date: "Date", Average: "Average"});
            avgExportTemp = avgExport;
// converted_dateavg = dateAvg.map(dateAvg => dateAvg);
            @endif
        }
        else if (type === 'ChartCount') {
            countExportTemp = [];
            countExport = [];
            date = [];
            count = [];
            @if($statis_count)
            @foreach($statis_count as $statis)
            date.push("{{$statis->entry_date }}");
            count.push({{$statis->entry_count }});
            {{--countArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            countExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            countExport.unshift({Date: "Date", Count: "Count"});
            countExportTemp = countExport;

// converted_date = date.map(date => date);
            @endif
        }
        else if (type === 'ChartNouzha') {
            nouzhaExportTemp = [];
            nouzhaExport = [];
            datenouzha = [];
            countnouzha = [];
            @if($statis_count_nouzha)
            @foreach($statis_count_nouzha as $statis)
            datenouzha.push("{{$statis->entry_date }}");
            countnouzha.push({{$statis->entry_count }});
            {{--nouzhaArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            nouzhaExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            nouzhaExport.unshift({Date: "Date", Count: "Count"});
// converted_datenouzha = datenouzha.map(datenouzha => datenouzha);
            nouzhaExportTemp = nouzhaExport;
            @endif

        }
        else if (type === 'ChartArman') {
            armanExportTemp = [];
            armanExport = [];
            datearman = [];
            countarman = [];
            @if($statis_count_arman)
            @foreach($statis_count_arman as $statis)
            datearman.push("{{$statis->entry_date }}");
            countarman.push({{$statis->entry_count }});
            {{--armanArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            armanExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            armanExport.unshift({Date: "Date", Count: "Count"});
// converted_datearman = datearman.map(datearman => datearman);
            armanExportTemp = armanExport;
            @endif

        }
        else if (type === 'ChartZiraa1') {
            ziraa1ExportTemp = [];
            ziraa1Export = [];
            dateziraa1 = [];
            countziraa1 = [];
            @if($statis_count_ziraa1)
            @foreach($statis_count_ziraa1 as $statis)
            dateziraa1.push("{{$statis->entry_date }}");
            countziraa1.push({{$statis->entry_count }});
            {{--ziraa1Array.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            ziraa1Export.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            ziraa1Export.unshift({Date: "Date", Count: "Count"});
// converted_dateziraa1 = dateziraa1.map(dateziraa1 => dateziraa1);
            ziraa1ExportTemp = ziraa1Export;
            @endif

        }
        else if (type === 'ChartBabtouma') {
            babtoumaExportTemp = [];
            babtoumaExport = [];
            datebabtouma = [];
            countbabtouma = [];
            @if($statis_count_babtouma)
            @foreach($statis_count_babtouma as $statis)
            datebabtouma.push("{{$statis->entry_date }}");
            countbabtouma.push({{$statis->entry_count }});
            {{--babtoumaArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            babtoumaExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            babtoumaExport.unshift({Date: "Date", Count: "Count"});
// converted_datebabtouma = datebabtouma.map(datebabtouma => datebabtouma);
            babtoumaExportTemp = babtoumaExport;
            @endif

        }
        else if (type === 'ChartBabsharqi') {
            babsharqiExportTemp = [];
            babsharqiExport = [];
            datebabsharqi = [];
            countbabsharqi = [];
            @if($statis_count_babsharqi)
            @foreach($statis_count_babsharqi as $statis)
            datebabsharqi.push("{{$statis->entry_date }}");
            countbabsharqi.push({{$statis->entry_count }});
            babsharqiExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            babsharqiExport.unshift({Date: "Date", Count: "Count"});
            babsharqiExportTemp = babsharqiExport;
            @endif

        }
        else if (type === 'ChartMahatta') {
            mahattaExportTemp = [];
            mahattaExport = [];
            datemahatta = [];
            countmahatta = [];
            @if($statis_count_mahatta)
            @foreach($statis_count_mahatta as $statis)
            datemahatta.push("{{$statis->entry_date }}");
            countmahatta.push({{$statis->entry_count }});
            {{--mahattaArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            mahattaExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            mahattaExport.unshift({Date: "Date", Count: "Count"});
// converted_datemahatta = datemahatta.map(datemahatta => datemahatta);
            mahattaExportTemp = mahattaExport;
            @endif

        }
        else if (type === 'ChartMouzeina') {
            mouzeinaExportTemp = [];
            mouzeinaExport = [];
            datemouzeina = [];
            countmouzeina = [];
            @if($statis_count_mouzeina)
            @foreach($statis_count_mouzeina as $statis)
            datemouzeina.push("{{$statis->entry_date }}");
            countmouzeina.push({{$statis->entry_count }});
            {{--mouzeinaArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            mouzeinaExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            mouzeinaExport.unshift({Date: "Date", Count: "Count"});
            mouzeinaExportTemp = mouzeinaExport;

// converted_datemouzeina = datemouzeina.map(datemouzeina => datemouzeina);
            @endif
        }
        else if (type === 'ChartZiraa2') {
            ziraa2ExportTemp = [];
            ziraa2Export = [];
            dateziraa2 = [];
            countziraa2 = [];
            @if($statis_count_ziraa2)
            @foreach($statis_count_ziraa2 as $statis)
            dateziraa2.push("{{$statis->entry_date }}");
            countziraa2.push({{$statis->entry_count }});
            {{--ziraa2Array.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            ziraa2Export.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            ziraa2Export.unshift({Date: "Date", Count: "Count"});
            ziraa2ExportTemp = ziraa2Export;

// converted_dateziraa2 = dateziraa2.map(dateziraa2 => dateziraa2);
            @endif
        }
        else if (type === 'ChartAzar') {
            azarExportTemp = [];
            azarExport = [];
            dateazar = [];
            countazar = [];
            @if($statis_count_azar)
            @foreach($statis_count_azar as $statis)
            dateazar.push("{{$statis->entry_date }}");
            countazar.push({{$statis->entry_count }});
            {{--azarArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            azarExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            azarExport.unshift({Date: "Date", Count: "Count"});
            azarExportTemp = azarExport;

// converted_dateazar = dateazar.map(dateazar => dateazar);
            @endif
        }
        else if (type === 'ChartMashrouh') {
            mashrouhExportTemp = [];
            mashrouhExport = [];
            datemashrouh = [];
            countmashrouh = [];
            @if($statis_count_mashrouh)
            @foreach($statis_count_mashrouh as $statis)
            datemashrouh.push("{{$statis->entry_date }}");
            countmashrouh.push({{$statis->entry_count }});
            {{--mashrouhArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            mashrouhExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            mashrouhExport.unshift({Date: "Date", Count: "Count"});
            mashrouhExportTemp = mashrouhExport;

// converted_datemashrouh = datemashrouh.map(datemashrouh => datemashrouh);
            @endif
        }
        else if (type === 'ChartVillat') {
            villatExportTemp = [];
            villatExport = [];
            datevillat = [];
            countvillat = [];
            @if($statis_count_villat)
            @foreach($statis_count_villat as $statis)
            datevillat.push("{{$statis->entry_date }}");
            countvillat.push({{$statis->entry_count }});
            {{--villatArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            villatExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            villatExport.unshift({Date: "Date", Count: "Count"});
            villatExportTemp = villatExport;

// converted_datevillat = datevillat.map(datevillat => datevillat);
            @endif
        }
        else if (type === 'ChartAdawia') {
            adawiaExportTemp = [];
            adawiaExport = [];
            dateadawia = [];
            countadawia = [];
            @if($statis_count_adawia)
            @foreach($statis_count_adawia as $statis)
            dateadawia.push("{{$statis->entry_date }}");
            countadawia.push({{$statis->entry_count }});
            {{--adawiaArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            adawiaExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            adawiaExport.unshift({Date: "Date", Count: "Count"});
            adawiaExportTemp = adawiaExport;

// converted_dateadawia = dateadawia.map(dateadawia => dateadawia);
            @endif
        }
        else if (type === 'ChartHamidiye') {
            hamidiyeExportTemp = [];
            hamidiyeExport = [];
            datehamidiye = [];
            counthamidiye = [];
            @if($statis_count_hamidiye)
            @foreach($statis_count_hamidiye as $statis)
            datehamidiye.push("{{$statis->entry_date }}");
            counthamidiye.push({{$statis->entry_count }});
            {{--hamidiyeArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            hamidiyeExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            hamidiyeExport.unshift({Date: "Date", Count: "Count"});
            hamidiyeExportTemp = hamidiyeExport;

// converted_datehamidiye = datehamidiye.map(datehamidiye => datehamidiye);
            @endif
        }
        else if (type === 'ChartKhrab') {
            khrabExportTemp = [];
            khrabExport = [];
            dateKhrab = [];
            countkhrab = [];
            @if($statis_count_khrab)
            @foreach($statis_count_khrab as $statis)
            dateKhrab.push("{{$statis->entry_date }}");
            countKhrab.push({{$statis->entry_count }});
            {{--khrabArray.push({entry_date: "{{$statis->entry_date}}", entry_count:{{$statis->entry_count}}});--}}
            khrabExport.push({Date: "{{$statis->entry_date}}", Count:{{$statis->entry_count}}});
            @endforeach
            khrabExport.unshift({Date: "Date", Count: "Count"});
            khrabExportTemp = khrabExport;

// converted_datekhrab = dateKhrab.map(dateKhrab => dateKhrab);
            @endif
        }
    }

    function filterData(type, chart, exported) {
        let datatemp = [];
        let counttemp = [];
        initializeChartValues(type);
        const start1 = document.getElementById('start' + type).value;
        const end1 = document.getElementById('end' + type).value;
        if (type === 'chartAvg') {
            let filteredArr = $.map(exported, function (n, i) {
                if (n.Date >= start1 && n.Date <= end1)
                    return [{Date: n.Date, Average: n.Average}];
            });
            exported = [];
            filteredArr.forEach((arr) => {
                datatemp.push(arr.Date);
                counttemp.push(arr.Average);
                exported.push({Date: arr.Date, Average: arr.Average});
            })
            ;
            exported.unshift({Date: "Date", Average: "Average"});
            avgExportTemp = exported;

        }
        else {
            let filteredArr = $.map(exported, function (n, i) {
                if (n.Date >= start1 && n.Date <= end1)
                    return [{Date: n.Date, Count: n.Count}];
            });
            exported = [];
            filteredArr.forEach((arr) => {
                datatemp.push(arr.Date);
                counttemp.push(arr.Count);
                exported.push({Date: arr.Date, Count: arr.Count});
            })
            ;
            exported.unshift({Date: "Date", Count: "Count"});
            if (type === 'ChartCount') {
                countExportTemp = exported;
            }
            else if (type === 'ChartArman') {
                armanExportTemp = exported;
            }
            else if (type === 'ChartAdawia') {
                adawiaExportTemp = exported;
            }
            else if (type === 'ChartZiraa1') {
                ziraa1ExportTemp = exported;
            }
            else if (type === 'ChartZiraa2') {
                ziraa2ExportTemp = exported;
            }
            else if (type === 'ChartVillat') {
                villatExportTemp = exported;
            }
            else if (type === 'ChartNouzha') {
                nouzhaExportTemp = exported;
            }
            else if (type === 'ChartMahatta') {
                mahattaExportTemp = exported;
            }
            else if (type === 'ChartMouzeina') {
                mouzeinaExportTemp = exported;
            }
            else if (type === 'ChartAzar') {
                azarExportTemp = exported;
            }
            else if (type === 'ChartMashrouh') {
                mashrouhExportTemp = exported;
            }
            else if (type === 'ChartHamidiye') {
                hamidiyeExportTemp = exported;
            }
            else if (type === 'ChartBabtouma') {
                babtoumaExportTemp = exported;
            }
            else if (type === 'ChartBabsharqi') {
                babsharqiExportTemp = exported;
            }
            else if (type === 'ChartKhrab') {
                khrabExportTemp = exported;
            }
        }
        chart.data.labels = datatemp;
        chart.data.datasets[0].data = counttemp;
        chart.update();

    }

    function resetData(type, value, chart, date) {
        document.getElementById('start' + type).value = '';
        document.getElementById('end' + type).value = '';
        chart.data.labels = date;
        chart.data.datasets[0].data = value;
        chart.update();
        initializeChartValues(type);
    }

    function exportData(btnId, filename, temparray) {
// document.getElementById(btnId).addEventListener("click", function () {
        downloadAsExcel({filename: filename, temparray: temparray});

// });
        function downloadAsExcel(args) {
            let date = new Date().toLocaleDateString('sv');
            let filename = args.filename + date;
            let temparray = args.temparray;
            let ws = XLSX.utils.json_to_sheet(temparray, {skipHeader: true, dateNF: 'YYYYMMDD HH:mm:ss'});
            if (!ws['!cols']) ws['!cols'] = [];
            ws['!cols'][0] = {wch: 17};
            let wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, filename);
            XLSX.writeFile(wb, filename + ".xlsx");
        }
    }

    let converted_date = [], converted_dateavg = [], converted_dateadawia = [], converted_datearman = [],
        converted_dateazar = [], converted_datebabtouma = [], converted_datehamidiye = [], converted_datekhrab = [],
        converted_datemahatta = [], converted_datemashrouh = [], converted_datemouzeina = [],
        converted_datenouzha = [], converted_datebabsharqi = [],
        converted_datevillat = [], converted_dateziraa1 = [], converted_dateziraa2 = [];

    let count = [], countKhrab = [], countavg = [], countnouzha = [], countarman = [], countziraa1 = [],
        countmahatta = [], countbabtouma = [],countbabsharqi = [], countmouzeina = [], countziraa2 = [], countazar = [],
        countmashrouh = [],
        countadawia = [], countvillat = [], counthamidiye = [];

    let chartCount = null, chartCountKhrab = null, chartAvg = null, chartCountNouzha = null, chartCountArman = null,
        chartCountZiraa1 = null, chartCountMahatta = null, chartCountBabtouma = null,chartCountBabsharqi = null, chartCountMouzeina = null,
        chartCountZiraa2 = null, chartCountAzar = null, chartCountMashrouh = null, chartCountAdawia = null,
        chartCountVillat = null, chartCountHamidiye = null;

    let avgExport = [], countExport = [], khrabExport = [], nouzhaExport = [], armanExport = [],
        ziraa1Export = [], mahattaExport = [], babtoumaExport = [],babsharqiExport = [], mouzeinaExport = [],
        ziraa2Export = [], azarExport = [], mashrouhExport = [], adawiaExport = [],
        villatExport = [], hamidiyeExport = [];

    let avgExportTemp = [], countExportTemp = [], khrabExportTemp = [], nouzhaExportTemp = [], armanExportTemp = [],
        ziraa1ExportTemp = [], mahattaExportTemp = [], babtoumaExportTemp = [],babsharqiExportTemp = [], mouzeinaExportTemp = [],
        ziraa2ExportTemp = [], azarExportTemp = [], mashrouhExportTemp = [], adawiaExportTemp = [],
        villatExportTemp = [], hamidiyeExportTemp = [];
    let entryData = [];

            @if($statis_count)
    let ctx = document.getElementById('ChartCount');
    let date = [];
    initializeChartValues('ChartCount');

    chartCount = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [...date
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...count],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;
            @endif
            @if($statis_avg)
    let ctx1 = document.getElementById('chartAvg');
    let dateAvg = [];

    initializeChartValues('chartAvg');

    chartAvg = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: [...dateAvg
            ],
            datasets: [{
                label: 'Entries Avg Per Day for All Centers',
                data: [...countavg],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;
            @endif
            @if($statis_count_nouzha)
    let ctxnouzha = document.getElementById('chartCountNouzha');
    let datenouzha = [];
console.log(ctxnouzha);
if(ctxnouzha){
    initializeChartValues('ChartNouzha');
    chartCountNouzha = new Chart(ctxnouzha, {
        type: 'bar',
        data: {
            labels: [...datenouzha
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countnouzha],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        },
        option: {
            scales: {
                x: {
                    type: 'time',
                    time:
                        {
                            unit: 'day'
                        }
                }
            }
        }
    })
    ;}
            @endif
            @if($statis_count_arman )
    let ctxarman = document.getElementById('chartCountArman');
    let datearman = [];
    if(ctxarman) {
        initializeChartValues('ChartArman');

        chartCountArman = new Chart(ctxarman, {
            type: 'bar',
            data: {
                labels: [...datearman
                ],
                datasets: [{
                    label: 'Entries Count Per Day',
                    data: [...countarman],
                    backgroundColor:
                        '#616161',
                    borderColor: '#ccc',
                    borderWidth: .2,
                }]
            }
        })
        ;
    }
            @endif
            @if($statis_count_ziraa1 )
    let ctxziraa1 = document.getElementById('chartCountZiraa1');

    let dateziraa1 = [];
    if(ctxziraa1){
    initializeChartValues('ChartZiraa1');

    chartCountZiraa1 = new Chart(ctxziraa1, {
        type: 'bar',
        data: {
            labels: [...dateziraa1
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countziraa1],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
            @endif
            @if($statis_count_babtouma )
    let ctxbabtouma = document.getElementById('chartCountBabtouma');
    let datebabtouma = [];
    if(ctxbabtouma){
    initializeChartValues('ChartBabtouma');
    chartCountBabtouma = new Chart(ctxbabtouma, {
        type: 'bar',
        data: {
            labels: [...datebabtouma
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countbabtouma],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
            @endif
            @if($statis_count_babsharqi )
    let ctxbabsharqi = document.getElementById('chartCountBabsharqi');
    let datebabsharqi = [];
    if(ctxbabsharqi){
    initializeChartValues('ChartBabsharqi');
    chartCountBabsharqi = new Chart(ctxbabsharqi, {
        type: 'bar',
        data: {
            labels: [...datebabsharqi
    ],
    datasets: [{
        label: 'Entries Count Per Day',
        data: [...countbabsharqi],
        backgroundColor:
    '#616161',
        borderColor: '#ccc',
        borderWidth: .2,
    }]
    }
    })
    ;}
            @endif
            @if($statis_count_mahatta )
    let ctxmahatta = document.getElementById('chartCountMahatta');
    let datemahatta = [];
    if(ctxmahatta){
    initializeChartValues('ChartMahatta');

    chartCountMahatta = new Chart(ctxmahatta, {
        type: 'bar',
        data: {
            labels: [...datemahatta
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countmahatta],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
            @endif
            @if($statis_count_mouzeina )
    let ctxmouzeina = document.getElementById('chartCountMouzeina');
    let datemouzeina = [];
    if(ctxmouzeina){
    initializeChartValues('ChartMouzeina');
    chartCountMouzeina = new Chart(ctxmouzeina, {
        type: 'bar',
        data: {
            labels: [...datemouzeina
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countmouzeina],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
            @endif
            @if($statis_count_ziraa2 )
    let ctxziraa2 = document.getElementById('chartCountZiraa2');
    let dateziraa2 = [];
    if(ctxziraa2){
    initializeChartValues('ChartZiraa2');
    chartCountZiraa2 = new Chart(ctxziraa2, {
        type: 'bar',
        data: {
            labels: [...dateziraa2
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countziraa2],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
            @endif
            @if($statis_count_azar )
    let ctxazar = document.getElementById('chartCountAzar');
    let dateazar = [];
    if(ctxazar){
    initializeChartValues('ChartAzar');

    chartCountAzar = new Chart(ctxazar, {
        type: 'bar',
        data: {
            labels: [...dateazar
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countazar],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
            @endif
            @if($statis_count_mashrouh )
    let ctxmashrouh = document.getElementById('chartCountMashrouh');
    let datemashrouh = [];
    if(ctxmashrouh){
    initializeChartValues('ChartMashrouh');

    chartCountMashrouh = new Chart(ctxmashrouh, {
        type: 'bar',
        data: {
            labels: [...datemashrouh
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countmashrouh],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
            @endif
            @if($statis_count_villat )
    let ctxvillat = document.getElementById('chartCountVillat');
    let datevillat = [];
    if(ctxvillat){
    initializeChartValues('ChartVillat');

    chartCountVillat = new Chart(ctxvillat, {
        type: 'bar',
        data: {
            labels: [...datevillat
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countvillat],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
            @endif
            @if($statis_count_adawia )
    let ctxadawia = document.getElementById('chartCountAdawia');
    let dateadawia = [];
    if(ctxadawia){
    initializeChartValues('ChartAdawia')

    chartCountAdawia = new Chart(ctxadawia, {
        type: 'bar',
        data: {
            labels: [...dateadawia
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countadawia],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
            @endif
            @if($statis_count_hamidiye )
    let ctxHamidiye = document.getElementById('chartCountHamidiye');
    let datehamidiye = [];
    if(ctxHamidiye){
    initializeChartValues('ChartHamidiye');

    chartCountHamidiye = new Chart(ctxHamidiye, {
        type: 'bar',
        data: {
            labels: [...datehamidiye
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...counthamidiye],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
            @endif
            @if($statis_count_khrab )
    let ctxKhrab = document.getElementById('chartCountKhrab');
    let dateKhrab = [];
    if(ctxKhrab){
    initializeChartValues('ChartKhrab');

    chartCountKhrab = new Chart(ctxKhrab, {
        type: 'bar',
        data: {
            labels: [...dateKhrab
            ],
            datasets: [{
                label: 'Entries Count Per Day',
                data: [...countKhrab],
                backgroundColor:
                    '#616161',
                borderColor: '#ccc',
                borderWidth: .2,
            }]
        }
    })
    ;}
    @endif
</script>
<script>
    $(document).ready(function () {
        let url1 = window.location.href;
        let url2 = new URL(url1);
        let tab = url2.searchParams.get("tab") + "Tab";
        let t = document.getElementById(tab);
        let tt = new bootstrap.Tab(t);
        tt.show();

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

        $('#tableStudents').on('click', '.btn-submit', function () {
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
                    location.reload();
                },
                error: function (data) {
                    saveEntryDataLocally(entryData);
                    swal('Connection Failed! <br> Data saved as a draft !! ');
                }
            });
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
        let tableStudents = new DataTable('#tableStudents', {
            ajax: {
                url: '/admin/study/studentsjson',
                dataSrc: "students"
            },
// data:students,
            columns: [
                {data: 'ID'},
                {data: 'firstname'},
                {data: 'fathername'},
                {data: 'lastname'},
                {data: 'nationalnumber'},
                {data: 'DOB'},
                {data: 'Age'},
                {data: 'Gender'},
                {data: 'Religion'},
                {data: 'Address'},
                {data: 'email'},
                {data: 'mobile'},
                {data: 'whatsapp'},
                {data: 'is_employed'},
                {data: 'is_student'},
                {data: 'Edu_Level'},
                {data: 'Edu_Field'},
                {
                    data: null,
                    render: function (data, type, row) {
                        @if($user->roles->contains('name', 'Admin') || ($user->roles->contains('name', 'English Editor') ))
                            return '<a href="/admin/student/edit/' + data.ID + '" class="btn mb-2 btn-primary edit-btn"><span class="fa fa-edit"></span>&nbsp; Edit</a>'
                                @endif
                                @if($user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'Admin'))
                            + '<form id="entry_form" action="/admin/student/visit" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @csrf <button data-id=' + data.ID + ' type="submit" class="btn btn-danger" onclick="ConfirmEntry(' + data.ID + ')"> Entry </button> </form>'
                                @endif
                                @if($user->roles->contains('name', 'Admin'))
                            + '<form action="/admin/student/' + data.ID + '" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @method('DELETE') @csrf <button data-id=' + data.ID + ' type="submit" class="btn btn-danger" onclick="ConfirmDelete(' + data.ID + ')"><i class="fa fa-trash-o"></i> </button> </form>'
                        @endif
                    },
                }
            ],
            "bSortClasses": false,
            keys: true,
            colReorder: true,
            deferRender: true,
            processing: true,
// dom: 'Blfrtip',
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            lengthChange: true,
            lengthMenu: [[100, 250, 500, -1], [100, 250, 500, "All"]],
            buttons: ['excel', 'colvis'],
            columnDefs: [
                {targets: [5, 9, 10, 12, 13, 14], visible: false}
            ],
// scrollY:500,
// scroller: {
//     loadingIndicator: true
// }
// serverSide: true,

        });
        {{--let tableStudentsentry = new DataTable('#tableStudentsentry', {--}}
            {{--ajax: {--}}
                {{--url: '/admin/study/studentsjson',--}}
                {{--dataSrc: "studentsentry"--}}
            {{--},--}}
{{--// data:students,--}}
            {{--@if($user->roles->contains('name', 'Admin'))--}}
            {{--columns: [--}}
                {{--{data: 'ID'},--}}
                {{--{data: 'Student_id'},--}}
                {{--{data: 'Name'},--}}
                {{--{data: 'City'},--}}
                {{--{data: 'Center'},--}}
                {{--{data: 'created_at'},--}}
                {{--{data: 'DOB'},--}}
                {{--{data: 'Age'},--}}
                {{--{data: 'Gender'},--}}
                {{--{data: 'Religion'},--}}
                {{--{data: 'Address'},--}}
                {{--{data: 'email'},--}}
                {{--{data: 'mobile'},--}}
                {{--{data: 'whatsapp'},--}}
                {{--{data: 'Employed'},--}}
                {{--{data: 'Student'},--}}
                {{--{data: 'Edu_Level'},--}}
                {{--{data: 'Edu_Field'},--}}
                {{--{data: 'Enterd_by'},--}}
                {{--{--}}
                    {{--data: null,--}}
                    {{--render: function (data, type, row) {--}}
                        {{--@if($user->roles->contains('name', 'Admin') || ($user->roles->contains('name', 'English Editor') ))--}}
                            {{--return '<a href="/admin/student/edit/' + data.Student_id + '" class="btn mb-2 btn-primary edit-btn"><span class="fa fa-edit"></span>&nbsp; Edit</a>'--}}
                                {{--@endif--}}
                                {{--@if($user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'Admin'))--}}
                            {{--+ '<form id="entry_form" action="/admin/student/visit" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @csrf <button data-id=' + data.Student_id + ' type="submit" class="btn btn-danger" onclick="ConfirmEntry(' + data.Student_id + ')"> Entry </button> </form>'--}}
                                {{--@endif--}}
                                {{--@if($user->roles->contains('name', 'Admin'))--}}
                            {{--+ '<form action="/admin/studententry/' + data.ID + '" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @method('DELETE') @csrf <button data-id=' + data.ID + ' type="submit" class="btn btn-danger" onclick="ConfirmEntryDelete(' + data.ID + ')"><i class="fa fa-trash-o"></i> Delete </button> </form>'--}}
                        {{--@endif--}}
                    {{--},--}}
                {{--}--}}
            {{--],--}}
            {{--@else--}}
            {{--columns: [--}}
                {{--{data: 'Student_id'},--}}
                {{--{data: 'Name'},--}}
                {{--{data: 'City'},--}}
                {{--{data: 'Center'},--}}
                {{--{data: 'created_at'},--}}
                {{--{data: 'DOB'},--}}
                {{--{data: 'Age'},--}}
                {{--{data: 'Gender'},--}}
                {{--{data: 'Religion'},--}}
                {{--{data: 'Address'},--}}
                {{--{data: 'email'},--}}
                {{--{data: 'mobile'},--}}
                {{--{data: 'whatsapp'},--}}
                {{--{data: 'Employed'},--}}
                {{--{data: 'Student'},--}}
                {{--{data: 'Edu_Level'},--}}
                {{--{data: 'Edu_Field'},--}}
                {{--{data: 'Enterd_by'},--}}
                {{--{--}}
                    {{--data: null,--}}
                    {{--render: function (data, type, row) {--}}
                        {{--@if($user->roles->contains('name', 'Admin') || ($user->roles->contains('name', 'English Editor') ))--}}
                            {{--return '<a href="/admin/student/edit/' + data.Student_id + '" class="btn mb-2 btn-primary edit-btn"><span class="fa fa-edit"></span>&nbsp; Edit</a>'--}}
                                {{--@endif--}}
                                {{--@if($user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'Admin'))--}}
                            {{--+ '<form id="entry_form" action="/admin/student/visit" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @csrf <button data-id=' + data.Student_id + ' type="submit" class="btn btn-danger" onclick="ConfirmEntry(' + data.Student_id + ')"> Entry </button> </form>'--}}
                                {{--@endif--}}
                                {{--@if($user->roles->contains('name', 'Admin'))--}}
                            {{--+ '<form action="/admin/studententry/' + data.ID + '" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @method('DELETE') @csrf <button data-id=' + data.ID + ' type="submit" class="btn btn-danger" onclick="ConfirmEntryDelete(' + data.ID + ')"><i class="fa fa-trash-o"></i> Delete </button> </form>'--}}
                        {{--@endif--}}
                    {{--},--}}
                {{--}--}}
            {{--],--}}
            {{--@endif--}}
            {{--keys: true,--}}
            {{--colReorder: true,--}}
            {{--processing: true,--}}
            {{--"bSortClasses": false,--}}
{{--// dom: 'Blfrtip',--}}
            {{--dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",--}}
            {{--lengthChange: true,--}}
            {{--deferRender: true,--}}
            {{--lengthMenu: [[100, 250, 500, -1], [100, 250, 500, "All"]],--}}
            {{--buttons: ['excel', 'pdf', 'colvis'],--}}
            {{--@if($user->roles->contains('name', 'Admin'))--}}
            {{--columnDefs: [--}}
                {{--{targets: [7, 8, 9, 11, 12, 13, 14, 15, 16, 17], visible: false}--}}
            {{--],--}}
            {{--@else--}}
            {{--columnDefs: [--}}
                {{--{targets: [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16], visible: false}--}}
            {{--],--}}
            {{--@endif--}}
            {{--// scrollY:500,--}}
            {{--// scroller: {--}}
            {{--//     loadingIndicator: true--}}
            {{--// }--}}
            {{--// serverSide: true,--}}
        {{--});--}}
        tableInitiative.buttons().container().appendTo('#tableInitiative_wrapper .col-md-6:eq(0)');
        tableSuccess.buttons().container().appendTo('#tableSuccess_wrapper .col-md-6:eq(0)');
        tablePending.buttons().container().appendTo('#tablePending_wrapper .col-md-6:eq(0)');
        tableStudents.buttons().container().appendTo('#tableStudents_wrapper .col-md-6:eq(0)');
        // tableStudents.searchBuilder.container().appendTo('#tableStudents_wrapper .col-md-6:eq(0)');
        // tableStudentsentry.buttons().container().appendTo('#tableStudentsentry_wrapper .col-md-6:eq(0)');
        // tableStudentsentry.searchBuilder.container().appendTo('#tableStudentsentry_wrapper .col-md-6:eq(0)');
        tableStudents.buttons().container().appendTo($('.col-sm-12:eq(0)', tableStudents.table().container()));
        // tableStudentsentry.buttons().container().appendTo($('.col-sm-12:eq(0)', tableStudentsentry.table().container()));
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
</body>

</html>