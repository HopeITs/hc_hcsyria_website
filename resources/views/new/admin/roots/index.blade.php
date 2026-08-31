<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'roots-index' ?>
    <script src="/js/jquery.js"></script>

    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="author" content="mai youssef">
    <title>Admin | Roots Of Hope</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link href="/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/js/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <script type="text/javascript" src="/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/js/buttons.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="/css/buttons.bootstrap5.min.css">
    <script type="text/javascript" src="/js/jszip.min.js"></script>
    <script type="text/javascript" src="/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="/js/buttons.colVis.min.js"></script>
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
        <div class="row mt-5">
            <div class="col">
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Publisher'))
                    <a class="btn btn-success" href="{{route('roots.create')}}">
                        <i class="fa fa-plus-square"></i>&nbsp; Create new Magazine</a>
                @endif
            </div>
        </div>
        <div>
            <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative mt-5" id="tabList"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="RootsTab" class="RootsTab nav-link active" data-bs-toggle="tab"
                            data-bs-target="#Roots"
                            role="tab" aria-controls="Roots" aria-selected="true">Magazines
                        <small>({{ $roots->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="PendingTab" class="PendingTab nav-link" data-bs-toggle="tab"
                            data-bs-target="#Pending"
                            role="tab" aria-controls=pending" aria-selected="false"
                            aria-selected="false">Pending
                        <small>({{ $rootsPending->count() }})</small>
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-5">
                <div class="tab-pane show active fade" id="Roots" role="tabpanel" aria-labelledby="RootsTab"
                     tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableRoots"
                           style="width: 100%">
                        @if($roots)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roots as $root)
                                <tr>
                                    <td class="text-center">{{$root['id']}}</td>
                                    <td class="text-center">{{$root['title']}}</td>
                                    <td class="text-end">
                                        @if($root['image_path'] != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        @if(($user->roles->contains('name', 'Admin')&& $user->permissions->contains('name','Roots')) || $user->roles->contains('name', 'Publisher'))
                                            <a href="{{$root['url']}}" target="_blank"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @endif
                                        @if(($user->roles->contains('name', 'Admin')&& $user->permissions->contains('name','Roots')) || $user->roles->contains('name', 'Publisher'))
                                            <a href="{{route('roots.edit', $root['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                            @if(($user->roles->contains('name', 'Admin')&& $user->permissions->contains('name','Roots')) || $user->roles->contains('name', 'Publisher'))
                                            <form action="{{ route('roots.destroy', $root['id']) }}"
                                                  method="POST" style="float: right; padding-left: 10px"
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$root['id']}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                                <form action="{{ route('roots.offline') }}" method="POST" style="float:right;padding-left: 10px;" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $root['id'] }}">
                                                    <button type="submit" class="btn mb-2 icon-btn btn-danger">
                                                        <i class="fa fa-power-off"></i>
                                                    </button>
                                                </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
                <div class="tab-pane show fade" id="Pending" role="tabpanel" aria-labelledby="PendingTab"
                     tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tablePnd"
                           style="width: 100%">
                        @if($rootsPending)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rootsPending as $root)
                                <tr>
                                    <td class="text-center">{{$root['id']}}</td>
                                    <td class="text-center">{{$root['title']}}</td>
                                    <td class="text-end">
                                        @if($root['image_path'] != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        @if($root['file_path'] != 0)
                                            <i class="fa fa-file-pdf-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        @if(($user->roles->contains('name', 'Admin')&& $user->permissions->contains('name','Roots')) || $user->roles->contains('name', 'Publisher'))
                                            <a href="{{$root['url']}}" target="_blank"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @endif
                                        @if(($user->roles->contains('name', 'Admin') && $user->permissions->contains('name','Roots')) || $user->roles->contains('name', 'Publisher'))
                                            <a href="{{route('roots.edit', $root['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->permissions->contains('name', 'Roots'))
                                            <form action="{{ route('roots.destroy', $root['id']) }}"
                                                  method="POST" style="float: right; padding-left: 10px"
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$root['id']}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                                <form action="{{ route('roots.online') }}" method="POST" style="float:right;padding-left: 10px;" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $root['id'] }}">
                                                    <button type="submit" class="btn mb-2 icon-btn btn-danger">
                                                        <i class="fa fa-power-off"></i>
                                                    </button>
                                                </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stack('navbar_scripts')

<script>
    $(document).ready(function () {
        tableRoots = new DataTable('#tableRoots', {
// responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tablePnd = new DataTable('#tablePnd', {
// responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableRoots.buttons().container().appendTo('#tableRoots_wrapper .col-md-6:eq(0)');
        tablePnd.buttons().container().appendTo('#tablePnd_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
// var id = event.target.attributes['id'].nodeValue;
        var id = $(this).data("id");
        event.preventDefault();

        swal({
            title: `Are you sure you want to delete ` + id + `?`,
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
<script>
    $(document).ready(function () {
        let url1 = window.location.href;
        let url2 = new URL(url1);
        let tab = url2.searchParams.get("tab") + "Tab";
        let t = document.getElementById(tab);
        let tt = new bootstrap.Tab(t);
        tt.show();
    });
</script>
<script>
    $(function () {
        let url1 = window.location.href;
        let newurl = '';
        $('#RootsTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('Roots'))
                        newurl = url1.replace("Roots", "Roots");
                    else if (url1.includes('Pending'))
                        newurl = url1.replace("Pending", "Roots");
                }
            } else {
                newurl = url1 + '?tab=Roots';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#PendingTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('Roots'))
                        newurl = url1.replace("Roots", "Pending");
                    else if (url1.includes('Pending'))
                        newurl = url1.replace("Pending", "Pending");
                }
            } else {
                newurl = url1 + '?tab=Pending';
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
    });
</script>
@include('new.admin.scripts.popup-messages')
</body>
</html>
