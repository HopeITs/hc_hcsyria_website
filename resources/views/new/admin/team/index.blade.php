<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    <?php $page = 'team' ?>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="mai youssef">
    <title>Admin | Our Team</title>
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
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                    <a class="btn btn-success" href="{{route('team.create')}}"><i
                                class="fa fa-plus-square"></i>&nbsp; Create new Member</a>
                @endif
            </div>
        </div>
        <div>
            <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative mt-5" id="tabList"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="aleppoTab" class="aleppoTab nav-link active" data-bs-toggle="tab"
                            data-bs-target="#aleppo"
                            role="tab" aria-controls="aleppo" aria-selected="true">Hope Aleppo
                        <small>({{ $hope->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="homsTab" class="homsTab nav-link" data-bs-toggle="tab" data-bs-target="#homs"
                            role="tab" aria-controls="homs" aria-selected="false">Hope Homs
                        <small>({{ $hope_h->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="damascusTab" class="damascusTab nav-link" data-bs-toggle="tab"
                            data-bs-target="#damascus"
                            role="tab" aria-controls="damascus" aria-selected="false">Hope Damascus
                        <small>({{ $hope_d->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="latakiaTab" class="latakiaTab nav-link" data-bs-toggle="tab"
                            data-bs-target="#latakia"
                            role="tab" aria-controls="latakia" aria-selected="false">Hope Latakia
                        <small>({{ $hope_l->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="studyTab" class="studyTab nav-link" data-bs-toggle="tab" data-bs-target="#study"
                            role="tab" aria-controls="study" aria-selected="false">Study Zone
                        <small>({{ $study->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="discTab" class="discTab nav-link" data-bs-toggle="tab" data-bs-target="#disc"
                            role="tab" aria-controls="disc" aria-selected="false">DISC
                        <small>({{ $disc->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="childrenTab" class="childrenTab nav-link" data-bs-toggle="tab"
                            data-bs-target="#children"
                            role="tab" aria-controls="children" aria-selected="false">Children Uni
                        <small>({{ $children->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="leapTab" class="leapTab nav-link" data-bs-toggle="tab"
                            data-bs-target="#leap"
                            role="tab" aria-controls="children" aria-selected="false">LEAP
                        <small>({{ $leap->count() }})</small>
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-5">
                <div class="tab-pane show active fade" id="aleppo" role="tabpanel" aria-labelledby="aleppoTab"
                     tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableA"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Position</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Rank</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hope as $member)
                            <tr>
                                <th scope="row" class="text-center">{{$member['id']}}</th>
                                <td class="text-center">{{$member['first_name'].' '.$member['last_name']}}</td>
                                <td class="text-center">{{$member['position']}}</td>
                                <td class="text-center">{{$member['inactive']}}</td>
                                <td class="text-center">{{$member['rank']}}</td>
                                <td class="text-end">
                                    <a href="{{route('team.show', $member['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('team.edit', $member['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{ route('team.destroy', $member['id']) }}"
                                              method="POST" style="float: right; padding-left: 10px"
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn mb-2 btn-danger icon-btn show_confirm"
                                                    type="submit"
                                                    data-id="{{$member['id']}}"><i
                                                        class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="homs" role="tabpanel" aria-labelledby="homsTab" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableH"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Position</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Rank</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hope_h as $member)
                            <tr>
                                <th scope="row" class="text-center">{{$member['id']}}</th>
                                <td class="text-center">{{$member['first_name'].' '.$member['last_name']}}</td>
                                <td class="text-center">{{$member['position']}}</td>
                                <td class="text-center">{{$member['inactive']}}</td>
                                <td class="text-center">{{$member['rank']}}</td>
                                <td class="text-end">
                                    <a href="{{route('team.show', $member['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('team.edit', $member['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{ route('team.destroy', $member['id']) }}"
                                              method="POST" style="float: right; padding-left: 10px"
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn mb-2 btn-danger icon-btn show_confirm"
                                                    type="submit"
                                                    data-id="{{$member['id']}}"><i
                                                        class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="damascus" role="tabpanel" aria-labelledby="damascusTab" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableD"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Position</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Rank</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hope_d as $member)
                            <tr>
                                <th scope="row" class="text-center">{{$member['id']}}</th>
                                <td class="text-center">{{$member['first_name'].' '.$member['last_name']}}</td>
                                <td class="text-center">{{$member['position']}}</td>
                                <td class="text-center">{{$member['inactive']}}</td>
                                <td class="text-center">{{$member['rank']}}</td>
                                <td class="text-end">
                                    <a href="{{route('team.show', $member['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('team.edit', $member['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{ route('team.destroy', $member['id']) }}"
                                              method="POST" style="float: right; padding-left: 10px"
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn mb-2 btn-danger icon-btn show_confirm"
                                                    type="submit"
                                                    data-id="{{$member['id']}}"><i
                                                        class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="latakia" role="tabpanel" aria-labelledby="latakiaTab" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableL"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Position</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Rank</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hope_l as $member)
                            <tr>
                                <th scope="row" class="text-center">{{$member['id']}}</th>
                                <td class="text-center">{{$member['first_name'].' '.$member['last_name']}}</td>
                                <td class="text-center">{{$member['position']}}</td>
                                <td class="text-center">{{$member['inactive']}}</td>
                                <td class="text-center">{{$member['rank']}}</td>
                                <td class="text-end">
                                    <a href="{{route('team.show', $member['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('team.edit', $member['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{ route('team.destroy', $member['id']) }}"
                                              method="POST" style="float: right; padding-left: 10px"
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn mb-2 btn-danger icon-btn show_confirm"
                                                    type="submit"
                                                    data-id="{{$member['id']}}"><i
                                                        class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="study" role="tabpanel" aria-labelledby="studyTab" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableStudy"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Position</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Rank</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($study as $member)
                            <tr>
                                <th scope="row" class="text-center">{{$member['id']}}</th>
                                <td class="text-center">{{$member['first_name'].' '.$member['last_name']}}</td>
                                <td class="text-center">{{$member['position']}}</td>
                                <td class="text-center">{{$member['inactive']}}</td>
                                <td class="text-center">{{$member['rank']}}</td>
                                <td class="text-end">
                                    <a href="{{route('team.show', $member['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('team.edit', $member['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{ route('team.destroy', $member['id']) }}"
                                              method="POST" style="float: right; padding-left: 10px"
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn mb-2 btn-danger icon-btn show_confirm"
                                                    type="submit"
                                                    data-id="{{$member['id']}}"><i
                                                        class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="disc" role="tabpanel" aria-labelledby="discTab" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableDisc"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Position</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Rank</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($disc as $member)
                            <tr>
                                <th scope="row" class="text-center">{{$member['id']}}</th>
                                <td class="text-center">{{$member['first_name'].' '.$member['last_name']}}</td>
                                <td class="text-center">{{$member['position']}}</td>
                                <td class="text-center">{{$member['inactive']}}</td>
                                <td class="text-center">{{$member['rank']}}</td>
                                <td class="text-end">
                                    <a href="{{route('team.show', $member['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('team.edit', $member['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{ route('team.destroy', $member['id']) }}"
                                              method="POST" style="float: right; padding-left: 10px"
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn mb-2 btn-danger icon-btn show_confirm"
                                                    type="submit"
                                                    data-id="{{$member['id']}}"><i
                                                        class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="children" role="tabpanel" aria-labelledby="childrenTab" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableChildren"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Position</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Rank</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($children as $member)
                            <tr>
                                <th scope="row" class="text-center">{{$member['id']}}</th>
                                <td class="text-center">{{$member['first_name'].' '.$member['last_name']}}</td>
                                <td class="text-center">{{$member['position']}}</td>
                                <td class="text-center">{{$member['inactive']}}</td>
                                <td class="text-center">{{$member['rank']}}</td>
                                <td class="text-end">
                                    <a href="{{route('team.show', $member['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('team.edit', $member['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{ route('team.destroy', $member['id']) }}"
                                              method="POST" style="float: right; padding-left: 10px"
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn mb-2 btn-danger icon-btn show_confirm"
                                                    type="submit"
                                                    data-id="{{$member['id']}}"><i
                                                        class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="leap" role="tabpanel" aria-labelledby="leapTab" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableLeap"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Position</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Rank</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leap as $member)
                            <tr>
                                <th scope="row" class="text-center">{{$member['id']}}</th>
                                <td class="text-center">{{$member['first_name'].' '.$member['last_name']}}</td>
                                <td class="text-center">{{$member['position']}}</td>
                                <td class="text-center">{{$member['inactive']}}</td>
                                <td class="text-center">{{$member['rank']}}</td>
                                <td class="text-end">
                                    <a href="{{route('team.show', $member['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('team.edit', $member['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))
                                        <form action="{{ route('team.destroy', $member['id']) }}"
                                              method="POST" style="float: right; padding-left: 10px"
                                              enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn mb-2 btn-danger icon-btn show_confirm"
                                                    type="submit"
                                                    data-id="{{$member['id']}}"><i
                                                        class="fa fa-trash-o"></i>
                                            </button>
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
</div>

@stack('navbar_scripts')
<script>
    $(document).ready(function () {
        tableA = new DataTable('#tableA', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableH = new DataTable('#tableH', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableD = new DataTable('#tableD', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableStudy = new DataTable('#tableStudy', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableDisc = new DataTable('#tableDisc', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableChildren = new DataTable('#tableChildren', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableLeap = new DataTable('#tableLeap', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableA.buttons().container().appendTo('#tableA_wrapper .col-md-6:eq(0)');
        tableH.buttons().container().appendTo('#tableH_wrapper .col-md-6:eq(0)');
        tableD.buttons().container().appendTo('#tableD_wrapper .col-md-6:eq(0)');
        tableStudy.buttons().container().appendTo('#tableStudy_wrapper .col-md-6:eq(0)');
        tableChildren.buttons().container().appendTo('#tableChildren_wrapper .col-md-6:eq(0)');
        tableDisc.buttons().container().appendTo('#tableDisc_wrapper .col-md-6:eq(0)');
        tableLeap.buttons().container().appendTo('#tableLeap_wrapper .col-md-6:eq(0)');
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
    // if (e) {
    //     alert('yes');
    //     return true;
    // }
    // if (confirm("Do you really want to: \nDelete " + e + " ?"))
    //     return true;
    // else
    //     return false;
    // }

    // ).catch(swal.noop);
    // }
    // ;
</script>
<script>
    $(function () {
        let url1 = window.location.href;
        let newurl = '';
        $('#aleppoTab').on('click', function () {
            // e.preventDefault();
            // let aleppo = document.getElementById('aleppoTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('aleppo'))
                        newurl = url1.replace("aleppo", "aleppo");
                    else if (url1.includes('damascus'))
                        newurl = url1.replace("damascus", "aleppo");
                    else if (url1.includes('latakia'))
                        newurl = url1.replace("latakia", "aleppo");
                    else if (url1.includes('homs'))
                        newurl = url1.replace("homs", "aleppo");
                    else if (url1.includes('study'))
                        newurl = url1.replace("study", "aleppo");
                    else if (url1.includes('disc'))
                        newurl = url1.replace("disc", "aleppo");
                    else if (url1.includes('children'))
                        newurl = url1.replace("children", "aleppo");
                    else if (url1.includes('leap'))
                        newurl = url1.replace("leap", "aleppo");
                }
            }
            else {
                newurl = url1 + '?tab=aleppo';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#homsTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    // let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=aleppo';
                    if (url1.includes('aleppo'))
                        newurl = url1.replace("aleppo", "homs");
                    else if (url1.includes('damascus'))
                        newurl = url1.replace("damascus", "homs");
                    else if (url1.includes('latakia'))
                        newurl = url1.replace("latakia", "homs");
                    else if (url1.includes('homs'))
                        newurl = url1.replace("homs", "homs");
                    else if (url1.includes('study'))
                        newurl = url1.replace("study", "homs");
                    else if (url1.includes('disc'))
                        newurl = url1.replace("disc", "homs");
                    else if (url1.includes('children'))
                        newurl = url1.replace("children", "homs");
                    else if (url1.includes('leap'))
                        newurl = url1.replace("leap", "homs");
                }
            }
            else {
                newurl = url1 + '?tab=homs';
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#damascusTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    // let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=aleppo';
                    if (url1.includes('aleppo'))
                        newurl = url1.replace("aleppo", "damascus");
                    else if (url1.includes('damascus'))
                        newurl = url1.replace("damascus", "damascus");
                    else if (url1.includes('latakia'))
                        newurl = url1.replace("latakia", "damascus");
                    else if (url1.includes('homs'))
                        newurl = url1.replace("homs", "damascus");
                    else if (url1.includes('study'))
                        newurl = url1.replace("study", "damascus");
                    else if (url1.includes('disc'))
                        newurl = url1.replace("disc", "damascus");
                    else if (url1.includes('children'))
                        newurl = url1.replace("children", "damascus");
                    else if (url1.includes('leap'))
                        newurl = url1.replace("leap", "damascus");
                }
            }
            else {
                newurl = url1 + '?tab=damascus';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
        $('#studyTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('aleppo'))
                        newurl = url1.replace("aleppo", "study");
                    else if (url1.includes('damascus'))
                        newurl = url1.replace("damascus", "study");
                    else if (url1.includes('latakia'))
                        newurl = url1.replace("latakia", "study");
                    else if (url1.includes('homs'))
                        newurl = url1.replace("homs", "study");
                    else if (url1.includes('study'))
                        newurl = url1.replace("study", "study");
                    else if (url1.includes('disc'))
                        newurl = url1.replace("disc", "study");
                    else if (url1.includes('children'))
                        newurl = url1.replace("children", "study");
                    else if (url1.includes('leap'))
                        newurl = url1.replace("leap", "study");
                }
            }
            else {
                newurl = url1 + '?tab=study';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
        $('#discTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    // let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=aleppo';
                    if (url1.includes('aleppo'))
                        newurl = url1.replace("aleppo", "disc");
                    else if (url1.includes('damascus'))
                        newurl = url1.replace("damascus", "disc");
                    else if (url1.includes('latakia'))
                        newurl = url1.replace("latakia", "disc");
                    else if (url1.includes('homs'))
                        newurl = url1.replace("homs", "disc");
                    else if (url1.includes('study'))
                        newurl = url1.replace("study", "disc");
                    else if (url1.includes('disc'))
                        newurl = url1.replace("disc", "disc");
                    else if (url1.includes('children'))
                        newurl = url1.replace("children", "disc");
                    else if (url1.includes('leap'))
                        newurl = url1.replace("leap", "disc");
                }
            }
            else {
                newurl = url1 + '?tab=disc';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
        $('#childrenTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('aleppo'))
                        newurl = url1.replace("aleppo", "children");
                    else if (url1.includes('damascus'))
                        newurl = url1.replace("damascus", "children");
                    else if (url1.includes('latakia'))
                        newurl = url1.replace("latakia", "children");
                    else if (url1.includes('homs'))
                        newurl = url1.replace("homs", "children");
                    else if (url1.includes('study'))
                        newurl = url1.replace("study", "children");
                    else if (url1.includes('disc'))
                        newurl = url1.replace("disc", "children");
                    else if (url1.includes('children'))
                        newurl = url1.replace("children", "children");
                    else if (url1.includes('leap'))
                        newurl = url1.replace("leap", "children");
                }
            }
            else {
                newurl = url1 + '?tab=children';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
        $('#leapTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('aleppo'))
                        newurl = url1.replace("aleppo", "leap");
                    else if (url1.includes('damascus'))
                        newurl = url1.replace("damascus", "leap");
                    else if (url1.includes('latakia'))
                        newurl = url1.replace("latakia", "leap");
                    else if (url1.includes('homs'))
                        newurl = url1.replace("homs", "leap");
                    else if (url1.includes('study'))
                        newurl = url1.replace("study", "leap");
                    else if (url1.includes('disc'))
                        newurl = url1.replace("disc", "leap");
                    else if (url1.includes('children'))
                        newurl = url1.replace("children", "leap");
                    else if (url1.includes('leap'))
                        newurl = url1.replace("leap", "leap");
                }
            }
            else {
                newurl = url1 + '?tab=leap';
            }
            window.history.pushState({path: newurl}, '', newurl);

        });
        $('#latakiaTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('aleppo'))
                        newurl = url1.replace("aleppo", "latakia");
                    else if (url1.includes('damascus'))
                        newurl = url1.replace("damascus", "latakia");
                    else if (url1.includes('latakia'))
                        newurl = url1.replace("latakia", "latakia");
                    else if (url1.includes('homs'))
                        newurl = url1.replace("homs", "latakia");
                    else if (url1.includes('study'))
                        newurl = url1.replace("study", "latakia");
                    else if (url1.includes('disc'))
                        newurl = url1.replace("disc", "latakia");
                    else if (url1.includes('children'))
                        newurl = url1.replace("children", "latakia");
                    else if (url1.includes('leap'))
                        newurl = url1.replace("leap", "latakia");
                }
            }
            else {
                newurl = url1 + '?tab=leap';
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
</script>
@include('new.admin.scripts.popup-messages')
