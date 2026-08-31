<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    <?php $page = 'initiatives-index' ?>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="mai youssef">
    <title>Admin | Initiatives</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
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
</head><!--/head-->
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
                    <a class="btn btn-success" href="{{route('initiatives.create')}}"><i
                                class="fa fa-plus-square"></i>&nbsp; Create new initiative</a>
                @endif
            </div>
        </div>
        <div>
            <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative mt-5" id="tabList"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="coiTab" class="coiTab nav-link active" data-bs-toggle="tab"
                            data-bs-target="#coi"
                            role="tab" aria-controls="coi" aria-selected="true">COI
                        <small>({{ $iniCOI->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="rehabilitationTab" class="rehabilitationTab nav-link" data-bs-toggle="tab"
                            data-bs-target="#rehabilitation"
                            role="tab" aria-controls="rehabilitation" aria-selected="false">Rehabilitation
                        <small>({{ $iniRehabilitation->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="reliefTab" class="reliefTab nav-link" data-bs-toggle="tab" data-bs-target="#relief"
                            role="tab" aria-controls="relief" aria-selected="false">Relief
                        <small>({{ $iniRelief->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="earthTab" class="earthTab nav-link" data-bs-toggle="tab" data-bs-target="#earth"
                            role="tab" aria-controls="earth" aria-selected="false">Earthquack Response
                        <small>({{ $iniEarth->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="familyTab" class="familyTab nav-link" data-bs-toggle="tab" data-bs-target="#family"
                            role="tab" aria-controls="family" aria-selected="false">Family To Family
                        <small>({{ $iniFamilyDist->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="pendingTab" class="pendingTab nav-link" data-bs-toggle="tab" data-bs-target="#pending"
                            role="tab" aria-controls="pending" aria-selected="false">Pending
                        <small>({{ $iniPending->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="hiddenTab" class="hiddenTab nav-link" data-bs-toggle="tab" data-bs-target="#hidden"
                            role="tab" aria-controls="hidden" aria-selected="false">Hidden
                        <small>({{ $iniHidden->count() }})</small>
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-5">
                <div class="tab-pane show active fade" id="coi" role="tabpanel" aria-labelledby="coiTab"
                     tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableCOI"
                           style="width: 100%">
                        @if($iniCOI)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($iniCOI as $initiative)
                                <tr>
                                    <td class="text-center">{{$initiative['id']}}</td>
                                    <td class="text-center">{{$initiative['english']['title']}}</td>
                                    <td class="text-end">
                                        @if(count($initiative->images) != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                  method="POST"
                                                  style="float: right; padding-left: 10px "
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$initiative['id']}}">
                                                    <i class="fa fa-trash-o"></i></button>
                                            </form>
                                                <form action="{{ route('initiatives.offline') }}" method="POST" style="float:right;padding-left: 10px;" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">
                                                    <button type="submit" class="btn mb-2 btn-danger icon-btn">
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
                <div class="tab-pane show fade" id="rehabilitation" role="tabpanel" aria-labelledby="rehabilitationTab"
                     tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableRehabilitation"
                           style="width: 100%">
                        @if($iniRehabilitation)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($iniRehabilitation as $initiative)
                                <tr>
                                    <td class="text-center">{{$initiative['id']}}</td>
                                    <td class="text-center">{{$initiative['english']['title']}}</td>
                                    <td class="text-end">
                                        @if(count($initiative->images) != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('initiatives.images.rehabilitation.create', $initiative['id'])}}" class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Before/After</a>

                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                  method="POST"
                                                  style="float: right; padding-left: 10px "
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$initiative['id']}}">
                                                    <i class="fa fa-trash-o"></i></button>
                                            </form>
                                                <form action="{{ route('initiatives.offline') }}" method="POST" style="float:right;padding-left: 10px;" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">
                                                    <button type="submit" class="btn mb-2 btn-danger icon-btn">
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
                <div class="tab-pane show fade" id="relief" role="tabpanel" aria-labelledby="reliefTab"
                     tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableRelief"
                           style="width: 100%">
                        @if($iniRelief)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($iniRelief as $initiative)
                                <tr>
                                    <td class="text-center">{{$initiative['id']}}</td>
                                    <td class="text-center">{{$initiative['english']['title']}}</td>
                                    <td class="text-end">
                                        @if(count($initiative->images) != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                  method="POST"
                                                  style="float: right; padding-left: 10px "
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$initiative['id']}}">
                                                    <i class="fa fa-trash-o"></i></button>
                                            </form>
                                                <form action="{{ route('initiatives.offline') }}" method="POST" style="float:right;padding-left: 10px;" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">
                                                    <button type="submit" class="btn mb-2 btn-danger icon-btn">
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
                <div class="tab-pane show fade" id="earth" role="tabpanel" aria-labelledby="earthTab"
                     tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableEarth"
                           style="width: 100%">
                        @if($iniEarth)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($iniEarth as $initiative)
                                <tr>
                                    <td class="text-center">{{$initiative['id']}}</td>
                                    <td class="text-center">{{$initiative['english']['title']}}</td>
                                    <td class="text-end">
                                        @if(count($initiative->images) != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                  method="POST"
                                                  style="float: right; padding-left: 10px "
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$initiative['id']}}">
                                                    <i class="fa fa-trash-o"></i></button>
                                            </form>
                                                <form action="{{ route('initiatives.offline') }}" method="POST" style="float:right;padding-left: 10px;" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">
                                                    <button type="submit" class="btn mb-2 btn-danger icon-btn">
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
                <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="familyTab" tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableFamily"
                           style="width: 100%">
                        @if($iniFamilyDist)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($iniFamilyDist as $initiative)
                                <tr>
                                    <td class="text-center">{{$initiative['id']}}</td>
                                    <td class="text-center">{{$initiative['english']['title']}}</td>
                                    <td class="text-end">
                                        @if(count($initiative->images) != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                  method="POST"
                                                  style="float: right; padding-left: 10px "
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$initiative['id']}}">
                                                    <i class="fa fa-trash-o"></i></button>
                                            </form>
                                                <form action="{{ route('initiatives.offline') }}" method="POST" style="float:right;padding-left: 10px;" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">
                                                    <button type="submit" class="btn mb-2 btn-danger icon-btn">
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
                <div class="tab-pane show fade" id="pending" role="tabpanel" aria-labelledby="pendingTab"
                     tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tablePending"
                           style="width: 100%">
                        @if($iniPending)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Project</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($iniPending as $initiative)
                                <tr>
                                    <td class="text-center">{{$initiative['id']}}</td>
                                    <td class="text-center">{{$initiative['whatCategory']['name']}}</td>
                                    <td class="text-center">{{$initiative['english']['title']}}</td>
                                    <td class="text-end">
                                        @if(count($initiative->images) != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
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
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <form style="display:inline-block;vertical-align:top;" action="{{ route('initiatives.hide') }}" class="js-hidden-state" data-label="initiative" method="POST" data-state="pending" data-hide-url="{{ route('initiatives.hide') }}" data-unhide-url="{{ route('initiatives.unhide') }}" data-pending-table="#tablePending" data-hidden-table="#tableHidden" data-pending-tab="#pendingTab" data-hidden-tab="#hiddenTab">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $initiative['id'] }}">
                                                <button type="submit" class="btn mb-2 btn-secondary">
                                                    <i class="fa fa-eye-slash"></i>&nbsp;Hide</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>

                <div class="tab-pane show fade" id="hidden" role="tabpanel" aria-labelledby="hiddenTab"
                     tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableHidden"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Project</th>
                            <th scope="col" class="text-center">Title</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($iniHidden as $initiative)
                            <tr>
                                <td class="text-center">{{$initiative['id']}}</td>
                                <td class="text-center">{{$initiative['whatCategory']['name']}}</td>
                                <td class="text-center">{{$initiative['english']['title']}}</td>
                                <td class="text-end">
                                    <a href="{{route('initiatives.show', $initiative['id'])}}"
                                       class="btn mb-2 btn-primary edit-btn"><span
                                                class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                           class="btn mb-2 btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                        <form style="display:inline-block;vertical-align:top;" action="{{ route('initiatives.unhide') }}" class="js-hidden-state" data-label="initiative" method="POST" data-state="hidden" data-hide-url="{{ route('initiatives.hide') }}" data-unhide-url="{{ route('initiatives.unhide') }}" data-pending-table="#tablePending" data-hidden-table="#tableHidden" data-pending-tab="#pendingTab" data-hidden-tab="#hiddenTab">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $initiative['id'] }}">
                                            <button type="submit" class="btn mb-2 btn-secondary">
                                                <i class="fa fa-eye"></i>&nbsp;Unhide</button>
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
        tableCOI = new DataTable('#tableCOI', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableRehabilitation = new DataTable('#tableRehabilitation', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableRelief = new DataTable('#tableRelief', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableFamily = new DataTable('#tableFamily', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableEarth = new DataTable('#tableEarth', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tablePending = new DataTable('#tablePending', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableHidden = new DataTable('#tableHidden', {
            // responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableCOI.buttons().container().appendTo('#tableCOI_wrapper .col-md-6:eq(0)');
        tableRehabilitation.buttons().container().appendTo('#tableRehabilitation_wrapper .col-md-6:eq(0)');
        tableRelief.buttons().container().appendTo('#tableRelief_wrapper .col-md-6:eq(0)');
        tableFamily.buttons().container().appendTo('#tableFamily_wrapper .col-md-6:eq(0)');
        tableEarth.buttons().container().appendTo('#tableEarth_wrapper .col-md-6:eq(0)');
        tablePending.buttons().container().appendTo('#tablePending_wrapper .col-md-6:eq(0)');
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
        $('#coiTab').on('click', function () {
            // e.preventDefault();
            // let aleppo = document.getElementById('aleppoTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('coi'))
                        newurl = url1.replace("coi", "coi");
                    else if (url1.includes('rehabilitation'))
                        newurl = url1.replace("rehabilitation", "coi");
                    else if (url1.includes('relief'))
                        newurl = url1.replace("relief", "coi");
                    else if (url1.includes('family'))
                        newurl = url1.replace("family", "coi");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "coi");
                    else if (url1.includes('earth'))
                        newurl = url1.replace("earth", "coi");
                }
            }
            else {
                newurl = url1 + '?tab=coi';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#rehabilitationTab').on('click', function () {
            // e.preventDefault();
            // let aleppo = document.getElementById('aleppoTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('coi'))
                        newurl = url1.replace("coi", "rehabilitation");
                    else if (url1.includes('rehabilitation'))
                        newurl = url1.replace("rehabilitation", "rehabilitation");
                    else if (url1.includes('relief'))
                        newurl = url1.replace("relief", "rehabilitation");
                    else if (url1.includes('family'))
                        newurl = url1.replace("family", "rehabilitation");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "rehabilitation");
                    else if (url1.includes('earth'))
                        newurl = url1.replace("earth", "rehabilitation");
                }
            }
            else {
                newurl = url1 + '?tab=rehabilitation';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#reliefTab').on('click', function () {
            // e.preventDefault();
            // let aleppo = document.getElementById('aleppoTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('coi'))
                        newurl = url1.replace("coi", "relief");
                    else if (url1.includes('rehabilitation'))
                        newurl = url1.replace("rehabilitation", "relief");
                    else if (url1.includes('relief'))
                        newurl = url1.replace("relief", "relief");
                    else if (url1.includes('family'))
                        newurl = url1.replace("family", "relief");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "relief");
                    else if (url1.includes('earth'))
                        newurl = url1.replace("earth", "relief");
                }
            }
            else {
                newurl = url1 + '?tab=relief';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#familyTab').on('click', function () {
            // e.preventDefault();
            // let aleppo = document.getElementById('aleppoTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('coi'))
                        newurl = url1.replace("coi", "family");
                    else if (url1.includes('rehabilitation'))
                        newurl = url1.replace("rehabilitation", "family");
                    else if (url1.includes('relief'))
                        newurl = url1.replace("relief", "family");
                    else if (url1.includes('family'))
                        newurl = url1.replace("family", "family");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "family");
                    else if (url1.includes('earth'))
                        newurl = url1.replace("earth", "family");
                }
            }
            else {
                newurl = url1 + '?tab=family';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#pendingTab').on('click', function () {
            // e.preventDefault();
            // let aleppo = document.getElementById('aleppoTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('coi'))
                        newurl = url1.replace("coi", "pending");
                    else if (url1.includes('rehabilitation'))
                        newurl = url1.replace("rehabilitation", "pending");
                    else if (url1.includes('relief'))
                        newurl = url1.replace("relief", "pending");
                    else if (url1.includes('family'))
                        newurl = url1.replace("family", "pending");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "pending");
                    else if (url1.includes('earth'))
                        newurl = url1.replace("earth", "pending");
                }
            }
            else {
                newurl = url1 + '?tab=pending';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#earthTab').on('click', function () {
            // e.preventDefault();
            // let aleppo = document.getElementById('aleppoTab');
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('earth'))
                        newurl = url1.replace("coi", "earth");
                    else if (url1.includes('rehabilitation'))
                        newurl = url1.replace("rehabilitation", "earth");
                    else if (url1.includes('relief'))
                        newurl = url1.replace("relief", "earth");
                    else if (url1.includes('family'))
                        newurl = url1.replace("family", "earth");
                    else if (url1.includes('pending'))
                        newurl = url1.replace("pending", "earth");
                    else if (url1.includes('earth'))
                        newurl = url1.replace("earth", "earth");
                }
            }
            else {
                newurl = url1 + '?tab=earth';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
    });
</script>
@include('new.admin.scripts.popup-messages')
<script src="/js/admin-hidden-state.js"></script>
</body>
