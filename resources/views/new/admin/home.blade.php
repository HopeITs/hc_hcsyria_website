<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    <?php $page = 'home' ?>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | Dashboard</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link href="/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/responsive.bootstrap5.min.js"></script>
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
</head>
<body>
@stack('navbar_body')
<div id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('new.admin.messages')
                <div class="card">
                    <div class=" main-color-bg card-title">Online Micro-Projects
                        <span>{{$projectsAleppo + $projectsHoms + $projectsDamascus + $projectsLatakia + $projectsWadi + $projectsTartus + $projectsIdleb}}</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-3 col-sm-3 col-12">
                                <div class="well dash-box">
                                    {{--<div>--}}
                                        {{--<h3>--}}
                                            {{--<span><i class="bi bi-check2-square"></i></span>--}}
                                        {{--</h3>--}}
                                    <h1>{{$projectsAleppo}}</h1>
                                        <h5>Aleppo</h5>
                                    {{--</div>--}}

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-3 col-12">
                                <div class="well dash-box">
                                    {{--<div>--}}
                                        {{--<h3><span><i class="bi bi-check2-square"></i></span></h3>--}}
                                    <h1>{{$projectsHoms}}</h1>
                                    <h5>Homs</h5>
                                    {{--</div>--}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-3 col-12">
                                <div class="well dash-box">
                                    {{--<div>--}}
                                        {{--<h3><span><i class="bi bi-check2-square"></i></span></h3>--}}
                                    <h1>{{$projectsDamascus}}</h1>
                                    <h5>Damascus</h5>
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-4 col-md-3 col-sm-3 col-12">
                                <div class="well dash-box">
                                    {{--<div>--}}
                                    {{--<h3><span><i class="bi bi-check2-square"></i></span></h3>--}}
                                    <h1>{{$projectsLatakia}}</h1>
                                    <h5>Latakia</h5>
                                    {{--</div>--}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-3 col-12">
                                <div class="well dash-box">
                                    {{--<div>--}}
                                    {{--<h3><span><i class="bi bi-check2-square"></i></span></h3>--}}
                                    <h1>{{$projectsWadi}}</h1>
                                    <h5>Wadi</h5>
                                    {{--</div>--}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-3 col-12">
                                <div class="well dash-box">
                                    {{--<div>--}}
                                    {{--<h3><span><i class="bi bi-check2-square"></i></span></h3>--}}
                                    <h1>{{$projectsIdleb}}</h1>
                                    <h5>Idleb</h5>
                                    {{--</div>--}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-3 col-12">
                                <div class="well dash-box">
                                    {{--<div>--}}
                                    {{--<h3><span><i class="bi bi-check2-square"></i></span></h3>--}}
                                    <h1>{{$projectsTartus}}</h1>
                                    <h5>Tartus</h5>
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->role != 'french_editor')
                    @if(count($projectsPublish) || count($iniSchoolPublish) || count($iniChildrenPublish) || count($iniDiscPublish) || count($iniLeapPublish) || count($sucDiscPublish)
                    ||count($sucStudyPublish) || count($iniStudyPublish) || count($initiativesPublish) || count($newsPublish))
                        <div class="card">
                            <div class="card-title main-color-bg">Pending Publish
                                <span>
                                    @if($user->roles->contains('name','Admin') || $user->roles->contains('name','Publisher'))
                                        {{count($projectsPublish) + count($iniSchoolPublish) + count($iniChildrenPublish) +
                                        count($iniDiscPublish) + count($sucDiscPublish) + count($iniLeapPublish) +
                                        count($sucStudyPublish) + count($iniStudyPublish) + count($newsPublish) + count($initiativesPublish)}}
                                    @elseif($user->permissions->contains('name','Micro Projects')){{count($projectsPublish)}}
                                    @elseif($user->permissions->contains('name','School To School'))
                                        + {{count($iniSchoolPublish)}}
                                    @elseif($user->permissions->contains('name','Children University'))
                                        + {{count($iniChildrenPublish)}}
                                    @elseif($user->permissions->contains('name','DISC'))
                                        + {{count($iniDiscPublish) + count($sucDiscPublish)}}
                                    @elseif($user->permissions->contains('name','LEAP'))
                                        + {{count($iniLeapPublish)}}
                                    @elseif($user->permissions->contains('name','Study Zone'))
                                        + {{count($sucStudyPublish) + count($iniStudyPublish)}}
                                    @elseif($user->permissions->contains('name','Newsletter')) + {{count($newsPublish)}}
                                    @elseif($user->permissions->contains('name','Initiatives'))
                                        + {{count($initiativesPublish)}}
                                @endif
                                </span>
                            </div>
                            <div class="card-body">
                                @if($user->permissions->contains('name','Micro Projects') || ($user->permissions->contains('name', 'Home')) ||($user->roles->contains('name', 'Admin')))
                                    <table class="table table-striped table-bordered table-hover w-100 mb-4"
                                           id="microTable">
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">Micro Projects</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">Project Name</th>
                                            <th scope="col" class="text-center">Beneficiary Name</th>
                                            <th scope="col" class="text-center">City</th>
                                            <th scope="col" class="text-center">Fund Date</th>
                                            <th scope="col" class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if( count($projectsPublish))
                                            @foreach($projectsPublish as $project)
                                                <tr>
                                                    <th>{{$project['MicroProject_ID']}}</th>
                                                    <td>{{$project['english']['MPE_Name']}}</td>
                                                    <td>{{$project['MPE_BeneficiaryName']}}</td>
                                                    <td>
                                                        @if($project['MPE_City'] == '') {{'N/A'}}
                                                        @else {{$project->place->name}}
                                                        @endif
                                                    </td>
                                                    <td>{{$project['MPE_FundedDate']}}</td>

                                                    <td class="text-end">
                                                        @if($project['latitude'] != 0 && $project['longtitude'] != 0 )
                                                            <i class="fa fa-map-marker"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif
                                                        @if(count($project->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif
                                                        <a href="{{route('admin_project', $project['id'])}}"
                                                           class="btn btn-primary mb-2"><span
                                                                    class="fa fa-eye"></span>&nbsp; View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <a href="{{route('edit.project', $project['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('add.image', $project['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                                <form action="/admin/project/delete/" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @method('DELETE') @csrf <button data-id={{$project['id']}} type="submit" class="btn btn-danger" onclick="ConfirmDelete({{$project['id']}})"><i class="fa fa-trash-o"></i> </button> </form>

                                                            @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                @endif
                                @if($user->permissions->contains('name', 'School To School' )|| ($user->permissions->contains('name', 'Home')))
                                    @if(count($iniSchoolPublish))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="6" class="text-center">School Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>City</th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($iniSchoolPublish as $initiative)
                                                <tbody>
                                                <tr class="@if(count($initiative['images'])) pending-publish-with-images @endif">
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if(count($initiative->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))

                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2  show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                @endif
                                @if($user->permissions->contains('name','Children University') || ($user->permissions->contains('name', 'Home'))|| ($user->roles->contains('name', 'Admin')))
                                    @if(count($iniChildrenPublish))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="6" class="text-center">Children Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>City</th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($iniChildrenPublish as $initiative)
                                                <tbody>
                                                <tr class="@if(count($initiative['images'])) pending-publish-with-images @endif">
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if(count($initiative->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))

                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2  show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                        @endif

                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                @endif
                                @if($user->permissions->contains('name','DISC') || ($user->permissions->contains('name', 'Home'))|| ($user->roles->contains('name', 'Admin')))
                                    @if(count($iniDiscPublish))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="6" class="text-center">DISC Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>City</th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($iniDiscPublish as $initiative)
                                                <tbody>
                                                <tr class="@if(count($initiative['images'])) pending-publish-with-images @endif">
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if(count($initiative->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))

                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2  show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                        @endif

                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                    @if(count($sucDiscPublish))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="6" class="text-center">DISC Successes</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Success Title</th>
                                                <th>Success Category</th>
                                                <th>City</th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($sucDiscPublish as $success)
                                                <tbody>
                                                <tr>
                                                    <th>{{$success['id']}}</th>
                                                    <td>{{$success['english']['title']}}</td>
                                                    <td>{{ucfirst($success['whatCategory']['name'])}}</td>
                                                    <td>{{$success['place']['name']}}</td>

                                                    <td class="text-end">

                                                        <a href="{{route('successes.show', $success['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <a href="{{route('successes.edit', $success['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                            <form action="{{ route('successes.destroy', $success['id']) }}"
                                                                  style="float: right"
                                                                  method="POST">
                                                                @method('POST')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"
                                                                        type="submit" data-id="{{$success['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                @endif
                                    @if($user->permissions->contains('name','LEAP') || ($user->permissions->contains('name', 'Home'))|| ($user->roles->contains('name', 'Admin')))
                                        @if(count($iniLeapPublish))
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th colspan="6" class="text-center">LEAP Initiatives</th>
                                                </tr>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Initiative Name</th>
                                                    <th>City</th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                                </thead>
                                                @foreach($iniLeapPublish as $initiative)
                                                    <tbody>
                                                    <tr class="@if(count($initiative['images'])) pending-publish-with-images @endif">
                                                        <th>{{$initiative['id']}}</th>
                                                        <td>{{$initiative['english']['title']}}</td>
                                                        <td>{{$initiative['place']['name']}}</td>

                                                        <td class="text-end">
                                                            @if(count($initiative->images) != 0)
                                                                <i class="fa fa-picture-o"
                                                                   style="padding: 0.3vw 0.6vw;"></i>
                                                            @endif

                                                            <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))

                                                                <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                                   class="btn btn-primary edit-btn mb-2"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                            @endif
                                                            @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'Photos Editor')
                                                            || $user->roles->contains('name', 'Publisher'))
                                                                <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                                   class="btn btn-primary edit-btn mb-2">
                                                                    <i class='fa-solid fa-plus-minus'></i>
                                                                    Image</a>
                                                            @endif
                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                                <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                                      style="float: right"
                                                                      method="POST"
                                                                      enctype="multipart/form-data">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger icon-btn edit-btn mb-2  show_confirm"
                                                                            type="submit"
                                                                            data-id="{{$initiative['id']}}">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </form>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        @endif
                                    @endif
                                @if($user->permissions->contains('name', 'Study Zone') || ($user->permissions->contains('name', 'Home')) ||($user->roles->contains('name', 'Admin')))
                                    @if(count($iniStudyPublish))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="6" class="text-center">Study Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>City</th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($iniStudyPublish as $initiative)
                                                <tbody>
                                                <tr class="@if(count($initiative['images'])) pending-publish-with-images @endif">
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if(count($initiative->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))

                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2  show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                        @endif

                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                    @if(count($sucStudyPublish))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="6" class="text-center">Study Successes</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Success Title</th>
                                                <th>Success Category</th>
                                                <th>City</th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($sucStudyPublish as $success)
                                                <tbody>
                                                <tr>
                                                    <th>{{$success['id']}}</th>
                                                    <td>{{$success['english']['title']}}</td>
                                                    <td>{{ucfirst($success['whatCategory']['name'])}}</td>
                                                    <td>{{$success['place']['name']}}</td>

                                                    <td class="text-end">

                                                        <a href="{{route('successes.show', $success['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <a href="{{route('successes.edit', $success['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                            <form action="{{ route('successes.destroy', $success['id']) }}"
                                                                  style="float: right"
                                                                  method="POST">
                                                                @method('POST')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"
                                                                        type="submit" data-id="{{$success['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                @endif
                                @if($user->permissions->contains('name', 'Initiatives') || ($user->permissions->contains('name', 'Home')) ||($user->roles->contains('name', 'Admin')))
                                    @if(count($initiativesPublish))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="6" class="text-center">Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>Initiative Type</th>
                                                <th>City</th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($initiativesPublish as $initiative)
                                                <tbody>
                                                <tr class="@if(count($initiative['images'])) pending-publish-with-images @endif">
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['whatCategory']['name']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if(count($initiative->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))

                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2  show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                        @endif

                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                @endif
                                @if($user->permissions->contains('name', 'Newsletter') || ($user->permissions->contains('name', 'Home'))|| ($user->roles->contains('name', 'Admin')))
                                        @if(count($newsPublish))
                                            <table class="table table-striped table-bordered table-hover w-100 mb-4">
                                                <thead>
                                                <tr>
                                                    <th colspan="6" class="text-center">News</th>
                                                </tr>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>City</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($newsPublish as $news)
                                                    <tr>
                                                        <th>{{$news['id']}}</th>
                                                        <td>{{ $news['english']['title'] ?? 'No Title' }}</td>
                                                        <td>
                                                            @if($news['type'] == '0') Article
                                                            @elseif($news['type'] == '1') Product
                                                            @elseif($news['type'] == '2') Short Paragraph
                                                            @elseif($news['type'] == '3') Video
                                                            @else N/A @endif
                                                        </td>
                                                        <td>{{ $news->date ? \Carbon\Carbon::parse($news->date)->format('M d, Y') : 'N/A' }}</td>
                                                        <td>
                                                            @if(isset($news->place->name))
                                                                {{ $news->place->name == 'All' ? 'Syria' : $news->place->name }}
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                        <td class="text-end">
                                                            @if(count($news->images) != 0 )
                                                                <i class="fa fa-picture-o" style="padding: 0.3vw 0.6vw;"></i>
                                                            @endif
                                                            <a href="{{route('news.show', $news['id'])}}" class="btn btn-primary edit-btn mb-2"><span class="fa fa-eye"></span>&nbsp;View</a>
                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                                <a href="{{route('news.edit', [$news->id, 'ref' => 'dashboard'])}}" class="btn btn-primary edit-btn mb-2"><span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                            @endif
                                                            <a href="{{route('news.images.create', $news['id'])}}" class="btn btn-primary edit-btn mb-2"><i class='fa-solid fa-plus-minus'></i> Image</a>
                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                                <form action="{{ route('news.destroy', $news['id']) }}" style="display:inline-block;" method="POST">
                                                                    @method('DELETE') @csrf
                                                                    <button class="btn btn-danger edit-btn mb-2 show_confirm" type="submit" data-id="{{$news['id']}}"><i class="fa fa-trash-o"></i></button>
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                @endif
                            </div>
                        </div>
                    @endif
                @endif

                @if(Auth::user()->role != 'french_editor')
                    @if(count($projectsEngCheck) || count($iniSchoolEngCheck) || count($iniChildrenEngCheck) || count($iniDiscEngCheck) || count($sucDiscEngCheck) || count($iniLeapEngCheck)
                    ||count($sucStudyEngCheck) || count($iniStudyEngCheck) || count($initiativesEngCheck) || count($newsEngCheck))
                        <div class="card">
                            <div class="card-title main-color-bg">Pending to check English
                                <span>
                                    @if($user->roles->contains('name','Admin') || $user->roles->contains('name','Publisher'))
                                        {{count($projectsEngCheck) + count($iniSchoolEngCheck) + count($iniChildrenEngCheck) +
                                        count($iniDiscEngCheck) + count($sucDiscEngCheck) + count($iniLeapEngCheck) +
                                        count($sucStudyEngCheck) + count($iniStudyEngCheck) + count($newsEngCheck) + count($initiativesEngCheck)}}
                                    @elseif($user->permissions->contains('name','Micro Projects')){{count($projectsEngCheck)}}
                                    @elseif($user->permissions->contains('name','School To School'))
                                        + {{count($iniSchoolEngCheck)}}
                                    @elseif($user->permissions->contains('name','Children University'))
                                        + {{count($iniChildrenEngCheck)}}
                                    @elseif($user->permissions->contains('name','DISC'))
                                        + {{count($iniDiscEngCheck) + count($sucDiscEngCheck)}}
                                    @elseif($user->permissions->contains('name','LEAP'))
                                        + {{count($iniLeapEngCheck)}}
                                    @elseif($user->permissions->contains('name','Study Zone'))
                                        + {{count($sucStudyEngCheck) + count($iniStudyEngCheck)}}
                                    @elseif($user->permissions->contains('name','Newsletter')) + {{count($newsEngCheck)}}
                                    @elseif($user->permissions->contains('name','Initiatives'))
                                        + {{count($initiativesEngCheck)}}
                                    @endif
                                </span>
                            </div>
                            <div class="card-body">
                                @if($user->permissions->contains('name', 'Micro Projects') || ($user->permissions->contains('name', 'Home'))|| ($user->roles->contains('name', 'Admin')))
                                    <table class="table table-striped table-bordered table-hover" id="microChecktable">
                                        <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">Micro Projects</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">Project Name</th>
                                            <th scope="col" class="text-center">Beneficiary Name</th>
                                            <th scope="col" class="text-center">City</th>
                                            <th scope="col" class="text-center">Fund Date</th>
                                            {{--                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                                            <th scope="col" class="text-center">Action</th>
                                            {{--@endif--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($projectsEngCheck))
                                            @foreach($projectsEngCheck as $project)
                                                <tr>
                                                    <th>{{$project['MicroProject_ID']}}</th>
                                                    <td>{{$project['english']['MPE_Name']}}</td>
                                                    <td>{{$project['MPE_BeneficiaryName']}}</td>
                                                    <td>
                                                        @if($project['MPE_City'] == '') {{'N/A'}}
                                                        @else {{$project->place->name}}
                                                        @endif
                                                    </td>
                                                    <td>{{$project['MPE_FundedDate']}}</td>
                                                    <td class="text-end">
                                                        @if($project['latitude'] != 0 && $project['longtitude'] != 0 )
                                                            <i class="fa fa-map-marker"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif
                                                        @if(count($project->images) != 0 )
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif


                                                        <a href="{{route('admin_project', $project['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2">
                                                            <span class="fa fa-eye"></span>&nbsp; View</a>


                                                        @if($user->roles->contains('name', 'Admin')
                                                          || $user->roles->contains('name', 'English Editor')
                                                          || $user->roles->contains('name', 'English Checker'))
                                                            <a href="{{route('edit.project', $project['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('add.image', $project['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                               || $user->roles->contains('name', 'English Editor')
                                                               || $user->roles->contains('name', 'English Checker'))
                                                                <form action="/admin/project/delete/" method="POST" style="float: right; padding-left: 10px " enctype="multipart/form-data"> @method('DELETE') @csrf <button data-id={{$project['id']}} type="submit" class="btn btn-danger" onclick="ConfirmDelete({{$project['id']}})"><i class="fa fa-trash-o"></i> </button> </form>
                                                            {{--<form action="{{ route('delete.project', $project['id']) }}"--}}
                                                                  {{--style="float: right"--}}
                                                                  {{--method="POST"--}}
                                                                  {{--enctype="multipart/form-data">--}}
                                                                {{--@method('DELETE')--}}
                                                                {{--@csrf--}}
                                                                {{--<button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"--}}
                                                                        {{--type="submit"--}}
                                                                        {{--data-id="{{$project['MicroProject_ID']}}">--}}
                                                                    {{--<i class="fa fa-trash-o"></i>--}}
                                                                {{--</button>--}}
                                                            {{--</form>--}}
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('project.Englishchecked') }}"
                                                                      method="POST"
                                                                      enctype="multipart/form-data"
                                                                      style="float:right;">

                                                                    @csrf

                                                                    <input type="hidden" name="id" value="{{ $project['id'] }}">
                                                                    <input type="hidden" name="MicroProject_ID" value="{{ $project['MicroProject_ID'] }}">

                                                                    <button type="submit" class="btn btn-success icon-btn edit-btn">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>

                                                                </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        {{--@if(count($projectsEngCheck_h))--}}
                                        {{--@foreach($projectsEngCheck_h as $project)--}}
                                        {{--<tr>--}}
                                        {{--<th>{{$project['MicroProject_ID']}}</th>--}}
                                        {{--<td>{{$project['english']['MPE_Name']}}</td>--}}
                                        {{--<td>{{$project['MPE_BeneficiaryName']}}</td>--}}
                                        {{--<td>--}}
                                        {{--@if($project['MPE_City'] == '') {{'N/A'}}--}}
                                        {{--@else {{$project->place->name}}--}}
                                        {{--@endif--}}
                                        {{--</td>--}}
                                        {{--<td class="text-end">--}}
                                        {{--@if(count($project->images) != 0 )--}}
                                        {{--<i class="fa fa-picture-o"--}}
                                        {{--style="padding: 0.3vw 0.6vw;"></i>--}}
                                        {{--@endif--}}
                                        {{--@if($project['MPE_Location'] != 0)--}}
                                        {{--<i class="fa fa-map-marker"--}}
                                        {{--style="padding: 0.3vw 0.6vw;"></i>--}}
                                        {{--@endif--}}

                                        {{--<a href="{{route('admin_project', $project['id'])}}"--}}
                                        {{--class="btn btn-primary">--}}
                                        {{--<span class="fa fa-eye"></span>&nbsp; View</a>--}}


                                        {{--@if($user->roles->contains('name', 'Admin')--}}
                                        {{--|| $user->roles->contains('name', 'English Editor')--}}
                                        {{--|| $user->roles->contains('name', 'English Checker'))--}}
                                        {{--<a href="{{route('edit.project', $project['id'])}}"--}}
                                        {{--class="btn btn-primary edit-btn mb-2">--}}
                                        {{--<span class="fa fa-edit"></span>&nbsp;Edit</a>--}}
                                        {{--@endif--}}
                                        {{--@if($user->roles->contains('name', 'Admin')--}}
                                        {{--|| $user->roles->contains('name', 'Photos Editor')--}}
                                        {{--|| $user->roles->contains('name', 'Publisher'))--}}
                                        {{--<a href="{{route('add.image', $project['id'])}}"--}}
                                        {{--class="btn btn-primary edit-btn mb-2">--}}
                                        {{--<i class='fa-solid fa-plus-minus'></i>--}}
                                        {{--Image</a>--}}
                                        {{--@endif--}}
                                        {{--@if($user->roles->contains('name', 'Admin')--}}
                                        {{--|| $user->roles->contains('name', 'English Editor')--}}
                                        {{--|| $user->roles->contains('name', 'English Checker'))--}}
                                        {{--<form action="{{ route('delete.project', $project['id']) }}"--}}
                                        {{--style="float: right"--}}
                                        {{--method="POST"--}}
                                        {{--enctype="multipart/form-data">--}}
                                        {{--@method('DELETE')--}}
                                        {{--@csrf--}}
                                        {{--<button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"--}}
                                        {{--type="submit"--}}
                                        {{--data-id="{{$project['MicroProject_ID']}}">--}}
                                        {{--<i class="fa fa-trash-o"></i>--}}
                                        {{--</button>--}}
                                        {{--</form>--}}
                                        {{--@endif--}}
                                        {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))--}}
                                        {{--{!! Form::open(['route' => 'project.Englishchecked'--}}
                                        {{--, 'method' => 'POST', 'enctype' => 'multipart/form-data','style'=>'float:right;']) !!}--}}
                                        {{--{{Form::text('id', $project['id'], ['class' => 'd-none'])}}--}}
                                        {{--{{Form::text('MicroProject_ID', $project['MicroProject_ID'], ['class' => 'd-none'])}}--}}
                                        {{--{{Form::button('<i class="fa fa-check"></i>', ['type' => 'submit', 'class' => 'btn btn-success icon-btn edit-btn '])}}--}}
                                        {{--{!! Form::close() !!}--}}
                                        {{--@endif--}}
                                        {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--@endforeach--}}
                                        {{--@endif--}}
                                        {{--@if(count($projectsEngCheck_d))--}}
                                        {{--@foreach($projectsEngCheck_d as $project)--}}
                                        {{--<tr>--}}
                                        {{--<th>{{$project['MicroProject_ID']}}</th>--}}
                                        {{--<td>{{$project['english']['MPE_Name']}}</td>--}}
                                        {{--<td>{{$project['MPE_BeneficiaryName']}}</td>--}}
                                        {{--<td>--}}
                                        {{--@if($project['MPE_City'] == '') {{'N/A'}}--}}
                                        {{--@else {{$project->place->name}}--}}
                                        {{--@endif--}}
                                        {{--</td>--}}
                                        {{--<td class="text-end">--}}
                                        {{--@if(count($project->images) != 0 )--}}
                                        {{--<i class="fa fa-picture-o"--}}
                                        {{--style="padding: 0.3vw 0.6vw;"></i>--}}
                                        {{--@endif--}}
                                        {{--@if($project['MPE_Location'] != 0)--}}
                                        {{--<i class="fa fa-map-marker"--}}
                                        {{--style="padding: 0.3vw 0.6vw;"></i>--}}
                                        {{--@endif--}}

                                        {{--<a href="{{route('admin_project', $project['id'])}}"--}}
                                        {{--class="btn btn-primary">--}}
                                        {{--<span class="fa fa-eye"></span>&nbsp; View</a>--}}


                                        {{--@if($user->roles->contains('name', 'Admin')--}}
                                        {{--|| $user->roles->contains('name', 'English Editor')--}}
                                        {{--|| $user->roles->contains('name', 'English Checker'))--}}
                                        {{--<a href="{{route('edit.project', $project['id'])}}"--}}
                                        {{--class="btn btn-primary edit-btn mb-2">--}}
                                        {{--<span class="fa fa-edit"></span>&nbsp;Edit</a>--}}
                                        {{--@endif--}}
                                        {{--@if($user->roles->contains('name', 'Admin')--}}
                                        {{--|| $user->roles->contains('name', 'Photos Editor')--}}
                                        {{--|| $user->roles->contains('name', 'Publisher'))--}}
                                        {{--<a href="{{route('add.image', $project['id'])}}"--}}
                                        {{--class="btn btn-primary edit-btn mb-2">--}}
                                        {{--<i class='fa-solid fa-plus-minus'></i>--}}
                                        {{--Image</a>--}}
                                        {{--@endif--}}
                                        {{--@if($user->roles->contains('name', 'Admin')--}}
                                        {{--|| $user->roles->contains('name', 'English Editor')--}}
                                        {{--|| $user->roles->contains('name', 'English Checker'))--}}
                                        {{--<form action="{{ route('delete.project', $project['id']) }}"--}}
                                        {{--style="float: right"--}}
                                        {{--method="POST"--}}
                                        {{--enctype="multipart/form-data">--}}
                                        {{--@method('DELETE')--}}
                                        {{--@csrf--}}
                                        {{--<button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"--}}
                                        {{--type="submit"--}}
                                        {{--data-id="{{$project['MicroProject_ID']}}">--}}
                                        {{--<i class="fa fa-trash-o"></i>--}}
                                        {{--</button>--}}
                                        {{--</form>--}}
                                        {{--@endif--}}
                                        {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))--}}
                                        {{--{!! Form::open(['route' => 'project.Englishchecked'--}}
                                        {{--, 'method' => 'POST', 'enctype' => 'multipart/form-data','style'=>'float:right;']) !!}--}}
                                        {{--{{Form::text('id', $project['id'], ['class' => 'd-none'])}}--}}
                                        {{--{{Form::text('MicroProject_ID', $project['MicroProject_ID'], ['class' => 'd-none'])}}--}}
                                        {{--{{Form::button('<i class="fa fa-check"></i>', ['type' => 'submit', 'class' => 'btn btn-success icon-btn edit-btn '])}}--}}
                                        {{--{!! Form::close() !!}--}}
                                        {{--@endif--}}
                                        {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--@endforeach--}}
                                        {{--@endif--}}
                                        </tbody>
                                    </table>
                                @endif
                                @if($user->permissions->contains('name', 'School To School') || ($user->permissions->contains('name', 'Home')) || ($user->roles->contains('name', 'Admin')))
                                    @if(count($iniSchoolEngCheck))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">School Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>Initiative Type</th>
                                                <th>City</th>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            @foreach($iniSchoolEngCheck as $initiative)
                                                <tbody>
                                                <tr>
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['whatCategory']['name']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if(count($initiative->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2">
                                                            <span class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary mb-2 edit-btn">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'English Editor')
                                                            || $user->roles->contains('name', 'English Checker'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id'])}}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>

                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('initiatives.Englishchecked') }}"
                                                                      method="POST"
                                                                      enctype="multipart/form-data"
                                                                      style="float:right;">

                                                                    @csrf

                                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">

                                                                    <button type="submit" class="btn btn-success icon-btn edit-btn">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>

                                                                </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                @endif
                                @if($user->permissions->contains('name', 'Children University') || ($user->permissions->contains('name', 'Home'))||($user->roles->contains('name', 'Admin')))
                                    @if(count($iniChildrenEngCheck))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">Children Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>Initiative Type</th>
                                                <th>City</th>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            @foreach($iniChildrenEngCheck as $initiative)
                                                <tbody>
                                                <tr>
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['whatCategory']['name']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if(count($initiative->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2">
                                                            <span class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary mb-2 edit-btn">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'English Editor')
                                                            || $user->roles->contains('name', 'English Checker'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id'])}}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>

                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('initiatives.Englishchecked') }}"
                                                                      method="POST"
                                                                      enctype="multipart/form-data"
                                                                      style="float:right;">

                                                                    @csrf

                                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">

                                                                    <button type="submit" class="btn btn-success icon-btn edit-btn">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>

                                                                </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                @endif
                                @if($user->permissions->contains('name', 'DISC') || ($user->permissions->contains('name', 'Home')) || ($user->roles->contains('name', 'Admin')))
                                    @if(count($iniDiscEngCheck))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">DISC Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>Initiative Type</th>
                                                <th>City</th>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            @foreach($iniDiscEngCheck as $initiative)
                                                <tbody>
                                                <tr>
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['whatCategory']['name']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if(count($initiative->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2">
                                                            <span class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary mb-2 edit-btn">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'English Editor')
                                                            || $user->roles->contains('name', 'English Checker'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id'])}}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>

                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('initiatives.Englishchecked') }}"
                                                                      method="POST"
                                                                      enctype="multipart/form-data"
                                                                      style="float:right;">

                                                                    @csrf

                                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">

                                                                    <button type="submit" class="btn btn-success icon-btn edit-btn">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>

                                                                </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                    @if(count($sucDiscEngCheck))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">DISC Successes</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>Initiative Type</th>
                                                <th>City</th>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            @foreach($sucDiscEngCheck as $initiative)
                                                <tbody>
                                                <tr>
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['whatCategory']['name']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if($initiative->image_path != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2">
                                                            <span class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary mb-2 edit-btn">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'English Editor')
                                                            || $user->roles->contains('name', 'English Checker'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id'])}}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>

                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('initiatives.Englishchecked') }}"
                                                                      method="POST"
                                                                      enctype="multipart/form-data"
                                                                      style="float:right;">

                                                                    @csrf

                                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">

                                                                    <button type="submit" class="btn btn-success icon-btn edit-btn">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>

                                                                </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                @endif
                                @if($user->permissions->contains('name', 'LEAP') || ($user->permissions->contains('name', 'Home')) || ($user->roles->contains('name', 'Admin')))
                                        @if(count($iniLeapEngCheck))
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th colspan="5" class="text-center">LEAP Initiatives</th>
                                                </tr>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Initiative Name</th>
                                                    <th>Initiative Type</th>
                                                    <th>City</th>
                                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                        <th>Action</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                @foreach($iniLeapEngCheck as $initiative)
                                                    <tbody>
                                                    <tr>
                                                        <th>{{$initiative['id']}}</th>
                                                        <td>{{$initiative['english']['title']}}</td>
                                                        <td>{{$initiative['whatCategory']['name']}}</td>
                                                        <td>{{$initiative['place']['name']}}</td>

                                                        <td class="text-end">
                                                            @if(count($initiative->images) != 0)
                                                                <i class="fa fa-picture-o"
                                                                   style="padding: 0.3vw 0.6vw;"></i>
                                                            @endif

                                                            <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <span class="fa fa-eye"></span>&nbsp;View</a>
                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                                <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                                   class="btn btn-primary edit-btn mb-2">
                                                                    <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                            @endif
                                                            @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'Photos Editor')
                                                            || $user->roles->contains('name', 'Publisher'))
                                                                <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                                   class="btn btn-primary mb-2 edit-btn">
                                                                    <i class='fa-solid fa-plus-minus'></i>
                                                                    Image</a>
                                                            @endif
                                                            @if($user->roles->contains('name', 'Admin')
                                                                || $user->roles->contains('name', 'English Editor')
                                                                || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('initiatives.destroy', $initiative['id'])}}"
                                                                      style="float: right"
                                                                      method="POST"
                                                                      enctype="multipart/form-data">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"
                                                                            type="submit"
                                                                            data-id="{{$initiative['id']}}">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </form>

                                                            @endif
                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                                    <form action="{{ route('initiatives.Englishchecked') }}"
                                                                          method="POST"
                                                                          enctype="multipart/form-data"
                                                                          style="float:right;">

                                                                        @csrf

                                                                        <input type="hidden" name="id" value="{{ $initiative['id'] }}">

                                                                        <button type="submit" class="btn btn-success icon-btn edit-btn">
                                                                            <i class="fa fa-check"></i>
                                                                        </button>

                                                                    </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        @endif
                                    @endif
                                @if($user->permissions->contains('name', 'Study Zone') || ($user->permissions->contains('name', 'Home')) || ($user->roles->contains('name', 'Admin')))
                                    @if(count($iniStudyEngCheck))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">Study Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>Initiative Type</th>
                                                <th>City</th>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            @foreach($iniStudyEngCheck as $initiative)
                                                <tbody>
                                                <tr>
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['whatCategory']['name']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if(count($initiative->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2">
                                                            <span class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary mb-2 edit-btn">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'English Editor')
                                                            || $user->roles->contains('name', 'English Checker'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id'])}}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>

                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('initiatives.Englishchecked') }}"
                                                                      method="POST"
                                                                      enctype="multipart/form-data"
                                                                      style="float:right;">

                                                                    @csrf

                                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">

                                                                    <button type="submit" class="btn btn-success icon-btn edit-btn">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>

                                                                </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                        @if(count($sucStudyEngCheck))
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th colspan="5" class="text-center">Study Successes</th>
                                                </tr>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Sussess Name</th>
                                                    <th>Sussess Type</th>
                                                    <th>City</th>
                                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                        <th>Action</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                @foreach($sucStudyEngCheck as $success)
                                                    <tbody>
                                                    <tr>
                                                        <th>{{$success['id']}}</th>
                                                        <td>{{$success['english']['title']}}</td>
                                                        <td>{{$success['whatCategory']['name']}}</td>
                                                        <td>{{$success['place']['name']}}</td>

                                                        <td class="text-end">
                                                            @if($success->image_path != 0)
                                                                <i class="fa fa-picture-o"
                                                                   style="padding: 0.3vw 0.6vw;"></i>
                                                            @endif

                                                            <a href="{{route('successes.show', $success['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <span class="fa fa-eye"></span>&nbsp;View</a>
                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                                <a href="{{route('successes.edit', $success['id'])}}"
                                                                   class="btn btn-primary edit-btn mb-2">
                                                                    <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                            @endif
                                                            @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'Photos Editor')
                                                            || $user->roles->contains('name', 'Publisher'))
                                                                <a href="{{route('success.add.image', $success['id'])}}"
                                                                   class="btn btn-primary mb-2 edit-btn">
                                                                    <i class='fa-solid fa-plus-minus'></i>
                                                                    Image</a>
                                                            @endif
                                                            @if($user->roles->contains('name', 'Admin')
                                                                || $user->roles->contains('name', 'English Editor')
                                                                || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('successes.destroy', $success['id'])}}"
                                                                      style="float: right; padding-left: 10px;"
                                                                      method="POST"
                                                                      enctype="multipart/form-data">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger mb-2 show_confirm"
                                                                            type="submit"
                                                                            data-id="{{$success['id']}}">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                                    <form action="{{ route('successes.Englishchecked') }}"
                                                                          method="POST"
                                                                          enctype="multipart/form-data"
                                                                          style="float:right;">

                                                                        @csrf

                                                                        <input type="hidden" name="id" value="{{ $success['id'] }}">

                                                                        <button type="submit" class="btn btn-success icon-btn edit-btn">
                                                                            <i class="fa fa-check"></i>
                                                                        </button>

                                                                    </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        @endif
                                @endif
                                @if($user->permissions->contains('name', 'Initiatives') || ($user->permissions->contains('name', 'Home')) || ($user->roles->contains('name', 'Admin')))
                                    @if(count($initiativesEngCheck))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>Initiative Type</th>
                                                <th>City</th>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            @foreach($initiativesEngCheck as $initiative)
                                                <tbody>
                                                <tr>
                                                    <th>{{$initiative['id']}}</th>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td>{{$initiative['whatCategory']['name']}}</td>
                                                    <td>{{$initiative['place']['name']}}</td>

                                                    <td class="text-end">
                                                        @if(count($initiative->images) != 0)
                                                            <i class="fa fa-picture-o"
                                                               style="padding: 0.3vw 0.6vw;"></i>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn mb-2">
                                                            <span class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}"
                                                               class="btn btn-primary edit-btn mb-2">
                                                                <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}"
                                                               class="btn btn-primary mb-2 edit-btn">
                                                                <i class='fa-solid fa-plus-minus'></i>
                                                                Image</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'English Editor')
                                                            || $user->roles->contains('name', 'English Checker'))
                                                            <form action="{{ route('initiatives.destroy', $initiative['id'])}}"
                                                                  style="float: right"
                                                                  method="POST"
                                                                  enctype="multipart/form-data">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger icon-btn edit-btn mb-2 show_confirm"
                                                                        type="submit"
                                                                        data-id="{{$initiative['id']}}">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>

                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('initiatives.Englishchecked') }}"
                                                                      method="POST"
                                                                      enctype="multipart/form-data"
                                                                      style="float:right;">

                                                                    @csrf

                                                                    <input type="hidden" name="id" value="{{ $initiative['id'] }}">

                                                                    <button type="submit" class="btn btn-success icon-btn edit-btn">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>

                                                                </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                @endif
                                    @if($user->permissions->contains('name', 'Newsletter') || ($user->permissions->contains('name', 'Home')) ||($user->roles->contains('name', 'Admin')))
                                        @if(count($newsEngCheck))
                                            <table class="table table-striped table-bordered table-hover w-100">
                                                <thead>
                                                <tr>
                                                    <th colspan="6" class="text-center">News</th>
                                                </tr>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>City</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($newsEngCheck as $news)
                                                    <tr>
                                                        <th>{{$news['id']}}</th>
                                                        <td>{{ $news['english']['title'] ?? 'No Title' }}</td>
                                                        <td>
                                                            @if($news['type'] == '0') Article
                                                            @elseif($news['type'] == '1') Product
                                                            @elseif($news['type'] == '2') Short Paragraph
                                                            @elseif($news['type'] == '3') Video
                                                            @else N/A @endif
                                                        </td>
                                                        <td>{{ $news->date ? \Carbon\Carbon::parse($news->date)->format('M d, Y') : 'N/A' }}</td>
                                                        <td>
                                                            @if(isset($news->place->name))
                                                                {{ $news->place->name == 'All' ? 'Syria' : $news->place->name }}
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                        <td class="text-end">
                                                            @if(count($news->images) != 0 )
                                                                <i class="fa fa-picture-o" style="padding: 0.3vw 0.6vw;"></i>
                                                            @endif

                                                            <a href="{{route('news.show', $news['id'])}}" class="btn btn-primary mb-2 edit-btn"><span class="fa fa-eye"></span>&nbsp;View</a>

                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'English Checker'))
                                                                <a href="{{route('news.edit', [$news->id, 'ref' => 'dashboard'])}}" class="btn btn-primary edit-btn mb-2"><span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                            @endif

                                                            <a href="{{route('news.images.create', $news['id'])}}" class="btn btn-primary edit-btn mb-2"><i class='fa-solid fa-plus-minus'></i> Image</a>

                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('news.Englishchecked') }}" method="POST" style="display:inline-block;">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $news['id'] }}">
                                                                    <button type="submit" class="btn btn-success edit-btn mb-2"><i class="fa fa-check"></i></button>
                                                                </form>
                                                            @endif

                                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor') || $user->roles->contains('name', 'English Checker'))
                                                                <form action="{{ route('news.destroy', $news['id']) }}" style="display:inline-block;" method="POST">
                                                                    @method('DELETE') @csrf
                                                                    <button class="btn btn-danger edit-btn mb-2 show_confirm" type="submit" data-id="{{$news['id']}}"><i class="fa fa-trash-o"></i></button>
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    @endif
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@stack('navbar_scripts')

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

    function ConfirmDelete(e) {
        event.preventDefault();
        let id = e;
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
                    url: "{{route('delete.project')}}",
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
{{--@if($user->roles->contains('name', 'Admin'))--}}
{{--<script>--}}
{{--let projectsUnpaidCount = {{count($projectsNotPaid)}};--}}
{{--$('.btn-paid').click(function () {--}}
{{--let id = this.dataset.content;--}}
{{--$.get('/admin/project/french/paid/' + id);--}}
{{--if (projectsUnpaidCount === 1) {--}}
{{--$('.projects-unpaid-table').hide();--}}
{{--} else {--}}
{{--$('#tr-' + id).hide();--}}
{{--}--}}
{{--decreasePaymentSpanCount--}}
{{--});--}}

{{--let initiativesUnpaidCount = {{count($initiativesNotPaid)}};--}}
{{--$('.btn-paid-ini').click(function () {--}}
{{--let id = this.dataset.content;--}}
{{--$.get('/admin/initiatives/french/paid/' + id);--}}
{{--if (initiativesUnpaidCount === 1) {--}}
{{--$('.initiatives-unpaid-table').hide();--}}
{{--} else {--}}
{{--initiativesUnpaidCount--;--}}
{{--$('#tr-ini-' + id).hide();--}}
{{--}--}}
{{--decreasePaymentSpanCount--}}
{{--});--}}

{{--let testimoniesUnpaidCount = {{count($testimoniesNotPaid)}};--}}
{{--$('.btn-paid-testimony').click(function () {--}}
{{--let id = this.dataset.content;--}}
{{--$.get('/admin/initiatives/testimonies/french/paid/' + id);--}}
{{--if (testimoniesUnpaidCount === 1) {--}}
{{--$('.testimonies-unpaid-table').hide();--}}
{{--} else {--}}
{{--testimoniesUnpaidCount--;--}}
{{--$('#tr-testimony-' + id).hide();--}}
{{--}--}}
{{--decreasePaymentSpanCount--}}
{{--});--}}

{{--let successesUnpaidCount = {{count($successesNotPaid)}};--}}
{{--$('.btn-paid-success').click(function () {--}}
{{--let id = this.dataset.content;--}}
{{--$.get('/admin/successes/french/paid/' + id);--}}
{{--if (successesUnpaidCount === 1) {--}}
{{--$('.successes-unpaid-table').hide();--}}
{{--} else {--}}
{{--successesUnpaidCount--;--}}
{{--$('#tr-success-' + id).hide();--}}
{{--}--}}
{{--decreasePaymentSpanCount--}}
{{--});--}}

{{--let newsUnpaidCount = {{count($newsNotPaid)}};--}}
{{--$('.btn-paid-news').click(function () {--}}
{{--let id = this.dataset.content;--}}
{{--$.get('/admin/news/french/paid/' + id);--}}
{{--if (newsUnpaidCount === 1) {--}}
{{--$('.news-unpaid-table').hide();--}}
{{--} else {--}}
{{--newsUnpaidCount--;--}}
{{--$('#tr-success-' + id).hide();--}}
{{--}--}}
{{--decreasePaymentSpanCount--}}
{{--});--}}

{{--$('#pay-all').click(function () {--}}
{{--$.get('/admin/project/french/paid/all');--}}
{{--hidePaymentTable();--}}
{{--});--}}

{{--function decreasePaymentSpanCount() {--}}
{{--if ($('#paid-count').text() === '1') {--}}
{{--hidePaymentTable();--}}
{{--} else {--}}
{{--$('#paid-count').text($('#paid-count').text() - 1);--}}
{{--}--}}
{{--}--}}

{{--function hidePaymentTable() {--}}
{{--$('#paid-count').hide();--}}
{{--$('#pay-all').hide();--}}
{{--$('#payment-table').hide();--}}
{{--$('#payment-panel').html('<div class="text-center"><h4>All Translation are Paid</h4></div>');--}}
{{--}--}}
{{--</script>--}}
{{--@endif--}}

<script>
    $(document).ready(function () {
        microTable = new DataTable('#microTable', {
            // responsive: true,
            "scrollX": false,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
        });
        microChecktable = new DataTable('#microChecktable', {
            // responsive: true,
            "scrollX": false,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
        });
        microTable.buttons().container().appendTo('microTable_wrapper .col-md-6:eq(0)');
        microChecktable.buttons().container().appendTo('microChecktable_wrapper .col-md-6:eq(0)');

    });
</script>
@include('new.admin.scripts.popup-messages')
</body>
</html>
