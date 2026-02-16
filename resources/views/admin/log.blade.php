<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'log' ?>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Log</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus {
            color: #428bca;
            border-top: 2px solid #428bca;
        }
        .nav-tabs {
            top: 50px;
            margin-bottom: 20px;
        }
        @media screen and (max-width: 768px) {
            .nav-tabs > li {
                width: 50%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

@stack('navbar_body')

<section style="padding-top: 10px;">
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#projects-tab" data-toggle="tab">Projects</a></li>
            <li><a href="#initiatives-tab" data-toggle="tab">Initiatives</a></li>
            <li><a href="#successes-tab" data-toggle="tab">Successes</a></li>
            <li><a href="#news-tab" data-toggle="tab">News</a></li>
            <li><a href="#team-tab" data-toggle="tab">Team</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="projects-tab">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="projects-table"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Operation</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projectsLog as $log)
                                    <tr @if(isset($log['previous_data']) || isset($log['previous_data']))
                                        class="clickable" data-content="{{$log['id']}}"
                                        @endif>
                                        <th scope="row" class="text-center">{{$log['operation']}}</th>
                                        <td class="text-center">{{$log['project_id']}}</td>
                                        <td class="text-center">{{$log['place']}}</td>
                                        <td class="text-center">{{$log['user']['name']}}</td>
                                        <td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="initiatives-tab">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="initiatives-table"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Operation
                                    </th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Initiative ID
                                    </th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($initiativesLog as $log)
                                    <tr @if(isset($logRaw['previous_data']) || isset($log['previous_data']))
                                        class="clickable" data-content="{{$log['id']}}"
                                        @endif>
                                        <th scope="row" class="text-center">{{$log['operation']}}</th>
                                        <td class="text-center">{{$log['project_id']}}</td>
                                        <td class="text-center">{{$log['user']['name']}}</td>
                                        <td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="successes-tab">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="successes-table"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Operation
                                    </th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Success ID
                                    </th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($successesLog as $log)
                                    <tr @if(isset($logRaw['previous_data']) || isset($log['previous_data']))
                                        class="clickable" data-content="{{$log['id']}}"
                                        @endif>
                                        <th scope="row" class="text-center">{{$log['operation']}}</th>
                                        <td class="text-center">{{$log['project_id']}}</td>
                                        <td class="text-center">{{$log['user']['name']}}</td>
                                        <td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="news-tab">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="news-table"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Operation
                                    </th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;News ID
                                    </th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($newsLog as $log)
                                    <tr @if(isset($logRaw['previous_data']) || isset($log['previous_data']))
                                        class="clickable" data-content="{{$log['id']}}"
                                            @endif>
                                        <th scope="row" class="text-center">{{$log['operation']}}</th>
                                        <td class="text-center">{{$log['project_id']}}</td>
                                        <td class="text-center">{{$log['user']['name']}}</td>
                                        <td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="team-tab">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="team-table"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Operation
                                    </th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Member ID
                                    </th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teamLog as $log)
                                    <tr @if(isset($logRaw['previous_data']) || isset($log['previous_data']))
                                        class="clickable" data-content="{{$log['id']}}"
                                            @endif>
                                        <th scope="row" class="text-center">{{$log['operation']}}</th>
                                        <td class="text-center">{{$log['project_id']}}</td>
                                        <td class="text-center">{{$log['user']['name']}}</td>
                                        <td class="text-center">{{date('Y-m-d H:i:s', strtotime($log['created_at'])+3600*3)}}</td>
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

<div class="modal fade" tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-body" style="padding: 0 20px 80px 20px">
                    <h3 style="color: #a9a9a9">Previous Data</h3>
                    <p id="previous_data"></p>
                    <h3 style="margin-top: 40px;color: #a9a9a9">Current Data</h3>
                    <p id="current_data"></p>
                    <button class="btn btn-default" style="float: right;margin-top: 30px" data-dismiss="modal"
                            aria-hidden="true"><i class="fa fa-times"></i> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@stack('navbar_scripts')
<script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#projects-table').DataTable({
            "bPaginate": false,
            "order": [[3, "desc"]],
            "columnDefs": [
                {"searchable": false, "targets": 3}
            ]
        });
        $('#initiatives-table').DataTable({
            "bPaginate": false,
            "order": [[3, "desc"]],
            "columnDefs": [
                {"searchable": false, "targets": 3}
            ]
        });
        $('#successes-table').DataTable({
            "bPaginate": false,
            "order": [[3, "desc"]],
            "columnDefs": [
                {"searchable": false, "targets": 3}
            ]
        });
        $('#news-table').DataTable({
            "bPaginate": false,
            "order": [[3, "desc"]],
            "columnDefs": [
                {"searchable": false, "targets": 3}
            ]
        });
        $('#team-table').DataTable({
            "bPaginate": false,
            "order": [[3, "desc"]],
            "columnDefs": [
                {"searchable": false, "targets": 3}
            ]
        });
    });
</script>
<script>
    $(document).ready(function () {
        let log = <?php echo json_encode($logAll); ?>;
        $('.clickable').click(function () {
            let id = this.dataset.content;
            let logRaw = $.grep(log, function (e) {
                return e.id == id;
            });
            $('#previous_data').text(logRaw[0].previous_data != 0 ? logRaw[0].previous_data : "");
            $('#current_data').text(logRaw[0].current_data != 0 ? logRaw[0].current_data : "");
            $('.modal').modal('show');
            highlight($("#current_data"), $("#previous_data"));
        });
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
