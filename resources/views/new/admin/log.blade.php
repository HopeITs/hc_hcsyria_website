<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    <?php $page = 'log' ?>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="mai youssef">
    <title>Admin | Log</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link href="/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/js/responsive.bootstrap5.min.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js" ></script>
</head>
<body>
@stack('navbar_body')

<div id="projects">
    <div class="container">
        <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative mt-5" id="tabList"
            role="tablist">
            <li class="nav-item" role="presentation">
                <button id="projectTab" class="projectTab nav-link active" data-bs-toggle="tab"
                        data-bs-target="#project"
                        role="tab" aria-controls="project" aria-selected="true">Projects
                    <small>({{ $projectsLog->count() }})</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button id="initiativesTab" class="initiativesTab nav-link" data-bs-toggle="tab"
                        data-bs-target="#initiatives"
                        role="tab" aria-controls="initiatives" aria-selected="false">Initiatives
                    <small>({{ $initiativesLog->count() }})</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button id="successesTab" class="successesTab nav-link" data-bs-toggle="tab"
                        data-bs-target="#successes"
                        role="tab" aria-controls=successes" aria-selected="false"
                        aria-selected="false">Successes
                    <small>({{ $successesLog->count() }})</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button id="newsTab" class="newsTab nav-link" data-bs-toggle="tab"
                        data-bs-target="#news"
                        role="tab" aria-controls=news" aria-selected="false"
                        aria-selected="false">News
                    <small>({{ $newsLog->count() }})</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button id="teamTab" class="teamTab nav-link" data-bs-toggle="tab"
                        data-bs-target="#team"
                        role="tab" aria-controls=team" aria-selected="false"
                        aria-selected="false">Team
                    <small>({{ $teamLog->count() }})</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button id="studentsTab" class="studentsTab nav-link" data-bs-toggle="tab"
                        data-bs-target="#students"
                        role="tab" aria-controls=students" aria-selected="false"
                        aria-selected="false">Students
                    <small>({{ $studentLog->count() }})</small>
                </button>
            </li>
        </ul>
        <div class="tab-content mt-5">
            <div class="tab-pane show active fade" id="project" role="tabpanel" aria-labelledby="projectTab"
                 tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableProjects"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center d-none">ID</th>
                        <th scope="col" class="text-center">Operation</th>
                        <th scope="col" class="text-center">Project ID</th>
                        <th scope="col" class="text-center">User</th>
                        <th scope="col" class="text-center">Time</th>
                        <th scope="col" class="text-center d-none">current_data</th>
                        <th scope="col" class="text-center d-none">previous_data</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach($projectsLog as $log)--}}
                    {{--<tr @if(isset($log['previous_data']) || isset($log['previous_data']))--}}
                    {{--class="clickable" data-content="{{$log['id']}}"--}}
                    {{--@endif>--}}
                    {{--<th scope="row" class="text-center">{{$log['operation']}}</th>--}}
                    {{--<td class="text-center">{{$log['project_id']}}</td>--}}
                    {{--<td class="text-center">{{$log['user']['name']}}</td>--}}
                    {{--<td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
            <div class="tab-pane show fade" id="initiatives" role="tabpanel" aria-labelledby="initiativesTab"
                 tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableInitiatives"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center d-none">ID</th>
                        <th scope="col" class="text-center">Operation</th>
                        <th scope="col" class="text-center">Initiative ID</th>
                        <th scope="col" class="text-center">User</th>
                        <th scope="col" class="text-center">Time</th>
                        <th scope="col" class="text-center d-none">current_data</th>
                        <th scope="col" class="text-center d-none">previous_data</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach($initiativesLog as $log)--}}
                    {{--<tr @if(isset($logRaw['previous_data']) || isset($log['previous_data']))--}}
                    {{--class="clickable" data-content="{{$log['id']}}"--}}
                    {{--@endif>--}}
                    {{--<th scope="row" class="text-center">{{$log['operation']}}</th>--}}
                    {{--<td class="text-center">{{$log['project_id']}}</td>--}}
                    {{--<td class="text-center">{{$log['user']['name']}}</td>--}}
                    {{--<td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
            <div class="tab-pane show fade" id="successes" role="tabpanel" aria-labelledby="successesTab"
                 tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableSuccesses"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center d-none">ID</th>
                        <th scope="col" class="text-center">Operation</th>
                        <th scope="col" class="text-center">Success ID</th>
                        <th scope="col" class="text-center">User</th>
                        <th scope="col" class="text-center">Time</th>
                        <th scope="col" class="text-center d-none">current_data</th>
                        <th scope="col" class="text-center d-none">previous_data</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach($successesLog as $log)--}}
                    {{--<tr @if(isset($logRaw['previous_data']) || isset($log['previous_data']))--}}
                    {{--class="clickable" data-content="{{$log['id']}}"--}}
                    {{--@endif>--}}
                    {{--<th scope="row" class="text-center">{{$log['operation']}}</th>--}}
                    {{--<td class="text-center">{{$log['project_id']}}</td>--}}
                    {{--<td class="text-center">{{$log['user']['name']}}</td>--}}
                    {{--<td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
            <div class="tab-pane show fade" id="news" role="tabpanel" aria-labelledby="newsTab"
                 tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableNews"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center d-none">ID</th>
                        <th scope="col" class="text-center">Operation</th>
                        <th scope="col" class="text-center">News ID</th>
                        <th scope="col" class="text-center">User</th>
                        <th scope="col" class="text-center">Time</th>
                        <th scope="col" class="text-center d-none">current_data</th>
                        <th scope="col" class="text-center d-none">previous_data</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach($newsLog as $log)--}}
                    {{--<tr @if(isset($logRaw['previous_data']) || isset($log['previous_data']))--}}
                    {{--class="clickable" data-content="{{$log['id']}}"--}}
                    {{--@endif>--}}
                    {{--<th scope="row" class="text-center">{{$log['operation']}}</th>--}}
                    {{--<td class="text-center">{{$log['project_id']}}</td>--}}
                    {{--<td class="text-center">{{$log['user']['name']}}</td>--}}
                    {{--<td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
            <div class="tab-pane show fade" id="team" role="tabpanel" aria-labelledby="teamTab"
                 tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableTeam"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center d-none">ID</th>
                        <th scope="col" class="text-center">Operation</th>
                        <th scope="col" class="text-center">Member ID</th>
                        <th scope="col" class="text-center">User</th>
                        <th scope="col" class="text-center">Time</th>
                        <th scope="col" class="text-center d-none">current_data</th>
                        <th scope="col" class="text-center d-none">previous_data</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach($teamLog as $log)--}}
                    {{--<tr @if(isset($logRaw['previous_data']) || isset($log['previous_data']))--}}
                    {{--class="clickable" data-content="{{$log['id']}}"--}}
                    {{--@endif>--}}
                    {{--<th scope="row" class="text-center">{{$log['operation']}}</th>--}}
                    {{--<td class="text-center">{{$log['project_id']}}</td>--}}
                    {{--<td class="text-center">{{$log['user']['name']}}</td>--}}
                    {{--<td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
            <div class="tab-pane show fade" id="students" role="tabpanel" aria-labelledby="studentsTab"
                 tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableStudent"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center d-none">ID</th>
                        <th scope="col" class="text-center">Operation</th>
                        <th scope="col" class="text-center">Student ID</th>
                        <th scope="col" class="text-center">User</th>
                        <th scope="col" class="text-center">Time</th>
                        <th scope="col" class="text-center d-none">current_data</th>
                        <th scope="col" class="text-center d-none">previous_data</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach($teamLog as $log)--}}
                    {{--<tr @if(isset($logRaw['previous_data']) || isset($log['previous_data']))--}}
                    {{--class="clickable" data-content="{{$log['id']}}"--}}
                    {{--@endif>--}}
                    {{--<th scope="row" class="text-center">{{$log['operation']}}</th>--}}
                    {{--<td class="text-center">{{$log['project_id']}}</td>--}}
                    {{--<td class="text-center">{{$log['user']['name']}}</td>--}}
                    {{--<td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="float: right"></button>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Previous Data</th>
                            <th scope="col">Current Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><p id="previous_data"></p></td>
                            <td><p id="current_data"></p></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stack('navbar_scripts')
<script>
    $(function () {
        let url1 = window.location.href;
        let newurl = '';
        $('#projectTab').on('click', function () {
            // e.preventDefault();
            // let aleppo = document.getElementById('aleppoTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('initiatives'))
                        newurl = url1.replace("initiatives", "project");
                    else if (url1.includes('project'))
                        newurl = url1.replace("project", "project");
                    else if (url1.includes('successes'))
                        newurl = url1.replace("successes", "project");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "project");
                    else if (url1.includes('news'))
                        newurl = url1.replace("news", "project");
                    else if (url1.includes('team'))
                        newurl = url1.replace("team", "project");
                }
            }
            else {
                newurl = url1 + '?tab=project';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#initiativesTab').on('click', function () {
            // e.preventDefault();
            // let aleppo = document.getElementById('aleppoTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('initiatives'))
                        newurl = url1.replace("initiatives", "initiatives");
                    else if (url1.includes('project'))
                        newurl = url1.replace("project", "initiatives");
                    else if (url1.includes('successes'))
                        newurl = url1.replace("successes", "initiatives");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "initiatives");
                    else if (url1.includes('news'))
                        newurl = url1.replace("news", "initiatives");
                    else if (url1.includes('team'))
                        newurl = url1.replace("team", "initiatives");
                }
            }
            else {
                newurl = url1 + '?tab=initiatives';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#successesTab').on('click', function () {
            // e.preventDefault();
            // let damas = document.getElementById('damascusTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    // let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=aleppo';
                    if (url1.includes('successes'))
                        newurl = url1.replace("successes", "successes");
                    else if (url1.includes('initiatives'))
                        newurl = url1.replace("initiatives", "successes");
                    else if (url1.includes('project'))
                        newurl = url1.replace("project", "successes");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "successes");
                    else if (url1.includes('news'))
                        newurl = url1.replace("news", "successes");
                    else if (url1.includes('team'))
                        newurl = url1.replace("team", "successes");
                }
            }
            else {
                newurl = url1 + '?tab=successes';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
        $('#newsTab').on('click', function () {
            // e.preventDefault();
            // let damas = document.getElementById('damascusTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('initiatives'))
                        newurl = url1.replace("initiatives", "news");
                    else if (url1.includes('project'))
                        newurl = url1.replace("project", "news");
                    else if (url1.includes('successes'))
                        newurl = url1.replace("successes", "news");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "news");
                    else if (url1.includes('news'))
                        newurl = url1.replace("news", "news");
                    else if (url1.includes('team'))
                        newurl = url1.replace("team", "news");
                }
            }
            else {
                newurl = url1 + '?tab=news';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
        $('#studentsTab').on('click', function () {
            // e.preventDefault();
            // let damas = document.getElementById('damascusTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('initiatives'))
                        newurl = url1.replace("initiatives", "students");
                    else if (url1.includes('project'))
                        newurl = url1.replace("project", "students");
                    else if (url1.includes('successes'))
                        newurl = url1.replace("successes", "students");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "students");
                    else if (url1.includes('news'))
                        newurl = url1.replace("news", "students");
                    else if (url1.includes('team'))
                        newurl = url1.replace("team", "students");
                }
            }
            else {
                newurl = url1 + '?tab=students';
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#teamTab').on('click', function () {
            // e.preventDefault();
            // let damas = document.getElementById('damascusTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('initiatives'))
                        newurl = url1.replace("initiatives", "team");
                    else if (url1.includes('project'))
                        newurl = url1.replace("project", "team");
                    else if (url1.includes('successes'))
                        newurl = url1.replace("successes", "team");
                    else if (url1.includes('students'))
                        newurl = url1.replace("students", "team");
                    else if (url1.includes('news'))
                        newurl = url1.replace("news", "team");
                    else if (url1.includes('team'))
                        newurl = url1.replace("team", "team");
                }
            }
            else {
                newurl = url1 + '?tab=team';
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
    });
</script>
<script>
    $(document).ready(function () {
        let url1 = window.location.href;
        let url2 = new URL(url1);
        let tab = url2.searchParams.get("tab") + "Tab";
        let t = document.getElementById(tab);
        let tt = new bootstrap.Tab(t);
        tt.show();
    });

    function highlight(newElem, oldElem) {
        let oldTextList = oldElem.text().split(' ');
        let newTextList = newElem.text().split(' ');
        let old_text = '';
        let new_text = '';
        newElem.text().split(' ').forEach(function (val, i) {
            if ((val !== oldTextList[i - 3]) && (val !== oldTextList[i - 2]) && (val !== oldTextList[i - 1]) && (val !== oldTextList[i]) && (val !== oldTextList[i + 1]) && (val !== oldTextList[i + 2]) && (val !== oldTextList[i + 3])) {
                new_text += "<span class='highlight_new'> " + val + " </span>";
            } else {
                new_text += " " + val;
            }
        });
        newElem.html(new_text);
        oldElem.text().split(' ').forEach(function (val, i) {
            if ((val !== newTextList[i - 3]) && (val !== newTextList[i - 2]) && (val !== newTextList[i - 1]) && (val !== newTextList[i]) && (val !== newTextList[i + 1]) && (val !== newTextList[i + 2]) && (val !== newTextList[i + 3])) {
                old_text += "<span class='highlight_old'> " + val + " </span>";
            } else {
                old_text += " " + val;
            }
        });
        oldElem.html(old_text);
    }
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        let tableProjects = new DataTable('#tableProjects', {
            ajax: {
                url: '/admin/logjson',
                dataSrc: "projectsLog"
            },
            columns: [
                {data: 'id', class: 'd-none',visible: false},
                {data: 'operation'},
                {data: 'project_id'},
                {data: 'username'},
                {
                    data: null,
                    render: function (data, type, row) {
                        let d = Date.parse(data.created_at)+3 * 60 * 60 * 1000;
                        let d1 = new Date(d);
                        return moment(d1).format('YYYY-MM-DD HH:mm:ss')
                    },
                },
                {data: 'current_data', class: 'd-none',visible: false},
                {data: 'previous_data', class: 'd-none',visible: false}
            ],
            order: [
                [4, 'desc']
            ],
            {{--createdRow: function (row, data, index) {--}}
                    {{--$(row).addClass("clickable");--}}
                    {{--$(row).attr("data-content", {{$log['id']}});--}}
                    {{--$(row).attr('data-content', data.id);--}}
                    {{--},--}}

            "bSortClasses": false,
            keys: true,
            colReorder: true,
            deferRender: true,
            processing: true,
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            lengthChange: true,
            lengthMenu: [[50,100, 250, 500, -1], [50,100, 250, 500, "All"]],
            buttons: ['excel','pdf', 'colvis'],
        });
        $('#tableProjects').on('click', 'tr', function () {
            let rowData = tableProjects.rows(this).data();
            console.log(rowData);
            if (rowData[0].previous_data) {
                $('#previous_data').text(rowData[0].previous_data != 0 ? rowData[0].previous_data : "");
                $('#current_data').text(rowData[0].current_data != 0 ? rowData[0].current_data : "");
                $('.modal').modal('show');
                highlight($("#current_data"), $("#previous_data"));
            }
        });
        tableProjects.buttons().container().appendTo('#tableProjects_wrapper .col-md-6:eq(0)');
        let tableInitiatives = new DataTable('#tableInitiatives', {
            ajax: {
                url: '/admin/logjson',
                dataSrc: "initiativesLog"
            },
            columns: [
                {data: 'id', class: 'd-none'},
                {data: 'operation'},
                {data: 'project_id'},
                {data: 'username'},
                {
                    data: null,
                    render: function (data, type, row) {
                        let d = Date.parse(data.created_at)+3 * 60 * 60 * 1000;
                        let d1 = new Date(d);
                        return moment(d1).format('YYYY-MM-DD HH:mm:ss')
                    },
                },
                {data: 'current_data', class: 'd-none'},
                {data: 'previous_data', class: 'd-none'}
            ],
            order: [
                [4, 'desc']
            ],
            "bSortClasses": false,
            keys: true,
            colReorder: true,
            deferRender: true,
            processing: true,
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            lengthChange: true,
            lengthMenu: [[50,100, 250, 500, -1], [50,100, 250, 500, "All"]],
            buttons: ['excel','pdf', 'colvis'],
        });
        $('#tableInitiatives').on('click', 'tr', function () {
            let rowData = tableInitiatives.rows(this).data();
            console.log(rowData);
            if (rowData[0].previous_data) {
                $('#previous_data').text(rowData[0].previous_data != 0 ? rowData[0].previous_data : "");
                $('#current_data').text(rowData[0].current_data != 0 ? rowData[0].current_data : "");
                $('.modal').modal('show');
                highlight($("#current_data"), $("#previous_data"));
            }
        });
        tableInitiatives.buttons().container().appendTo('#tableInitiatives_wrapper .col-md-6:eq(0)');
        let tableSuccesses = new DataTable('#tableSuccesses', {
            ajax: {
                url: '/admin/logjson',
                dataSrc: "successesLog"
            },
            columns: [
                {data: 'id', class: 'd-none'},
                {data: 'operation'},
                {data: 'project_id'},
                {data: 'username'},
                {
                    data: null,
                    render: function (data, type, row) {
                        let d = Date.parse(data.created_at)+3 * 60 * 60 * 1000;
                        let d1 = new Date(d);
                        return moment(d1).format('YYYY-MM-DD HH:mm:ss')
                    },
                },
                {data: 'current_data', class: 'd-none'},
                {data: 'previous_data', class: 'd-none'}
            ],
            order: [
                [4, 'desc']
            ],
            "bSortClasses": false,
            keys: true,
            colReorder: true,
            deferRender: true,
            processing: true,
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            lengthChange: true,
            lengthMenu: [[50,100, 250, 500, -1], [50,100, 250, 500, "All"]],
            buttons: ['excel','pdf', 'colvis'],
        });
        $('#tableSuccesses').on('click', 'tr', function () {
            let rowData = tableSuccesses.rows(this).data();
            console.log(rowData);
            if (rowData[0].previous_data) {
                $('#previous_data').text(rowData[0].previous_data != 0 ? rowData[0].previous_data : "");
                $('#current_data').text(rowData[0].current_data != 0 ? rowData[0].current_data : "");
                $('.modal').modal('show');
                highlight($("#current_data"), $("#previous_data"));
            }
        });
        tableSuccesses.buttons().container().appendTo('#tableSuccesses_wrapper .col-md-6:eq(0)');
        let tableNews = new DataTable('#tableNews', {
            ajax: {
                url: '/admin/logjson',
                dataSrc: "newsLog"
            },
            columns: [
                {data: 'id', class: 'd-none'},
                {data: 'operation'},
                {data: 'project_id'},
                {data: 'username'},
                {
                    data: null,
                    render: function (data, type, row) {
                        let d = Date.parse(data.created_at)+3 * 60 * 60 * 1000;
                        let d1 = new Date(d);
                        return moment(d1).format('YYYY-MM-DD HH:mm:ss')
                    },
                },
                {data: 'current_data', class: 'd-none'},
                {data: 'previous_data', class: 'd-none'}
            ],
            order: [
                [4, 'desc']
            ],
            "bSortClasses": false,
            keys: true,
            colReorder: true,
            deferRender: true,
            processing: true,
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            lengthChange: true,
            lengthMenu: [[50,100, 250, 500, -1], [50,100, 250, 500, "All"]],
            buttons: ['excel','pdf', 'colvis'],
        });
        $('#tableNews').on('click', 'tr', function () {
            let rowData = tableNews.rows(this).data();
            console.log(rowData);
            if (rowData[0].previous_data) {
                $('#previous_data').text(rowData[0].previous_data != 0 ? rowData[0].previous_data : "");
                $('#current_data').text(rowData[0].current_data != 0 ? rowData[0].current_data : "");
                $('.modal').modal('show');
                highlight($("#current_data"), $("#previous_data"));
            }
        });
        tableNews.buttons().container().appendTo('#tableNews_wrapper .col-md-6:eq(0)');
        let tableTeam = new DataTable('#tableTeam', {
            ajax: {
                url: '/admin/logjson',
                dataSrc: "teamLog"
            },
            columns: [
                {data: 'id', class: 'd-none'},
                {data: 'operation'},
                {data: 'project_id'},
                {data: 'username'},
                {
                    data: null,
                    render: function (data, type, row) {
                        let d = Date.parse(data.created_at)+3 * 60 * 60 * 1000;
                        let d1 = new Date(d);
                        return moment(d1).format('YYYY-MM-DD HH:mm:ss')
                    },
                },
                {data: 'current_data', class: 'd-none'},
                {data: 'previous_data', class: 'd-none'}
            ],
            order: [
                [4, 'desc']
            ],
            "bSortClasses": false,
            keys: true,
            colReorder: true,
            deferRender: true,
            processing: true,
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            lengthChange: true,
            lengthMenu: [[50,100, 250, 500, -1], [50,100, 250, 500, "All"]],
            buttons: ['excel','pdf', 'colvis'],
        });
        $('#tableTeam').on('click', 'tr', function () {
            let rowData = tableTeam.rows(this).data();
            console.log(rowData);
            if (rowData[0].previous_data) {
                $('#previous_data').text(rowData[0].previous_data != 0 ? rowData[0].previous_data : "");
                $('#current_data').text(rowData[0].current_data != 0 ? rowData[0].current_data : "");
                $('.modal').modal('show');
                highlight($("#current_data"), $("#previous_data"));
            }
        });
        tableTeam.buttons().container().appendTo('#tableTeam_wrapper .col-md-6:eq(0)');
        let tableStudent = new DataTable('#tableStudent', {
            ajax: {
                url: '/admin/logjson',
                dataSrc: "studentLog"
            },
            columns: [
                {data: 'id', class: 'd-none',visible: false},
                {data: 'operation'},
                {data: 'project_id'},
                {data: 'username'},
                {
                    data: null,
                    render: function (data, type, row) {
                         let d = Date.parse(data.created_at)+3 * 60 * 60 * 1000;
                         let d1 = new Date(d);
                         return moment(d1).format('YYYY-MM-DD HH:mm:ss')
                    },
                },
                {data: 'current_data', class: 'd-none',visible: false},
                {data: 'previous_data', class: 'd-none',visible: false}
            ],
            order: [
                [4, 'desc']
            ],
            "bSortClasses": false,
            keys: true,
            colReorder: true,
            deferRender: true,
            processing: true,
            dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
            lengthChange: true,
            lengthMenu: [[50,100, 250, 500, -1], [50,100, 250, 500, "All"]],
            buttons: ['excel','pdf', 'colvis'],
        });
        $('#tableStudent').on('click', 'tr', function () {
            let rowData = tableStudent.rows(this).data();
            if (rowData[0].previous_data) {
                $('#previous_data').text(rowData[0].previous_data != 0 ? rowData[0].previous_data : "");
                $('#current_data').text(rowData[0].current_data != 0 ? rowData[0].current_data : "");
                $('.modal').modal('show');
                highlight($("#current_data"), $("#previous_data"));
            }
        });
        tableStudent.buttons().container().appendTo('#tableStudent_wrapper .col-md-6:eq(0)');
        // tableProjects = new DataTable('#tableProjects', {
        //     // responsive: true,
        //     "scrollX": true,
        //     lengthMenu: [
        //         [10, 25, 50, -1],
        //         [10, 25, 50, 'All']
        //     ]
        // });
        // tableInitiatives = new DataTable('#tableInitiatives', {
        //     // responsive: true,
        //     "scrollX": true,
        //     lengthMenu: [
        //         [10, 25, 50, -1],
        //         [10, 25, 50, 'All']
        //     ]
        // });
        // tableSuccesses = new DataTable('#tableSuccesses', {
        //     // responsive: true,
        //     "scrollX": true,
        //     lengthMenu: [
        //         [10, 25, 50, -1],
        //         [10, 25, 50, 'All']
        //     ]
        // });
        // tableNews = new DataTable('#tableNews', {
        //     // responsive: true,
        //     "scrollX": true,
        //     lengthMenu: [
        //         [10, 25, 50, -1],
        //         [10, 25, 50, 'All']
        //     ]
        // });
        // tableTeam = new DataTable('#tableTeam', {
        //     // responsive: true,
        //     "scrollX": true,
        //     lengthMenu: [
        //         [10, 25, 50, -1],
        //         [10, 25, 50, 'All']
        //     ]
        // });
    });
</script>
</body>