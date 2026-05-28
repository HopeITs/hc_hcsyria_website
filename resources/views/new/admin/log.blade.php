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
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/tabs.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
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
                    <small>({{ number_format($projectsCount) }})</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button id="initiativesTab" class="initiativesTab nav-link" data-bs-toggle="tab"
                        data-bs-target="#initiatives"
                        role="tab" aria-controls="initiatives" aria-selected="false">Initiatives
                    <small>({{ number_format($initiativesCount) }})</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button id="successesTab" class="successesTab nav-link" data-bs-toggle="tab"
                        data-bs-target="#successes"
                        role="tab" aria-controls=successes" aria-selected="false">Successes
                    <small>({{ number_format($successesCount) }})</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button id="newsTab" class="newsTab nav-link" data-bs-toggle="tab"
                        data-bs-target="#news"
                        role="tab" aria-controls=news" aria-selected="false">News
                    <small>({{ number_format($newsCount) }})</small>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button id="teamTab" class="teamTab nav-link" data-bs-toggle="tab"
                        data-bs-target="#team"
                        role="tab" aria-controls=team" aria-selected="false">Team
                    <small>({{ number_format($teamCount) }})</small>
                </button>
            </li>
        </ul>
        <div class="tab-content mt-5">
            <div class="tab-pane show active fade" id="project" role="tabpanel" aria-labelledby="projectTab" tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableProjects" style="width: 100%">
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
                    <tbody></tbody>
                </table>
            </div>
            <div class="tab-pane show fade" id="initiatives" role="tabpanel" aria-labelledby="initiativesTab" tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableInitiatives" style="width: 100%">
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
                    <tbody></tbody>
                </table>
            </div>
            <div class="tab-pane show fade" id="successes" role="tabpanel" aria-labelledby="successesTab" tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableSuccesses" style="width: 100%">
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
                    <tbody></tbody>
                </table>
            </div>
            <div class="tab-pane show fade" id="news" role="tabpanel" aria-labelledby="newsTab" tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableNews" style="width: 100%">
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
                    <tbody></tbody>
                </table>
            </div>
            <div class="tab-pane show fade" id="team" role="tabpanel" aria-labelledby="teamTab" tabindex="0">
                <table class="table table-striped table-bordered table-hover" id="tableTeam" style="width: 100%">
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
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right"></button>
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

        $('.nav-link').on('click', function () {
            let targetTab = $(this).attr('id').replace('Tab', '');

            if (url1.includes('tab')) {
                if (history.pushState) {
                    newurl = url1.replace(/tab=[^&]+/, "tab=" + targetTab);
                }
            } else {
                newurl = url1 + (url1.includes('?') ? '&' : '?') + 'tab=' + targetTab;
            }
            if (history.pushState) {
                window.history.pushState({path: newurl}, '', newurl);
            }
        });
    });

    $(document).ready(function () {
        let url1 = window.location.href;
        let url2 = new URL(url1);
        if(url2.searchParams.get("tab")) {
            let tab = url2.searchParams.get("tab") + "Tab";
            let t = document.getElementById(tab);
            if(t) {
                let tt = new bootstrap.Tab(t);
                tt.show();
            }
        }
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
        function initLogTable(tableId, categoryId) {
            let table = new DataTable(tableId, {
                serverSide: true,
                processing: true,
                ajax: {
                    url: '/admin/logjson',
                    type: 'GET',
                    data: function(d) {
                        d.category = categoryId;
                    }
                },
                columns: [
                    {data: 'id', class: 'd-none', visible: false},
                    {data: 'operation'},
                    {data: 'project_id'},
                    {data: 'username'},
                    {
                        data: 'created_at',
                        render: function (data, type, row) {
                            let d = Date.parse(data) + 3 * 60 * 60 * 1000;
                            return moment(d).format('YYYY-MM-DD HH:mm:ss');
                        },
                    },
                    {data: 'current_data', class: 'd-none', visible: false},
                    {data: 'previous_data', class: 'd-none', visible: false}
                ],
                order: [[4, 'desc']],
                "bSortClasses": false,
                keys: true,
                colReorder: true,
                deferRender: true,
                dom: "<'row'<'col-md-12'q>><'row'<'col-md-12'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rtip>>",
                lengthChange: true,
                lengthMenu: [[50, 100, 250, 500], [50, 100, 250, 500]],
                buttons: ['excel', 'pdf', 'colvis'],
            });

            $(tableId).on('click', 'tbody tr', function () {
                let rowData = table.row(this).data();
                if (rowData && rowData.previous_data) {
                    $('#previous_data').text(rowData.previous_data !== "0" ? rowData.previous_data : "");
                    $('#current_data').text(rowData.current_data !== "0" ? rowData.current_data : "");
                    $('.modal').modal('show');
                    highlight($("#current_data"), $("#previous_data"));
                }
            });

            table.buttons().container().appendTo(tableId + '_wrapper .col-md-6:eq(0)');
            return table;
        }

        initLogTable('#tableProjects', 0);
        initLogTable('#tableInitiatives', 1);
        initLogTable('#tableSuccesses', 2);
        initLogTable('#tableNews', 3);
        initLogTable('#tableTeam', 5);
    });
</script>
</body>
</html>
