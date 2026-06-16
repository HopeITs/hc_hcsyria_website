<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'home' ?>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .alert {
            margin-top: 2rem;
        }

        th,
        td {
            text-align: center;
        }

        .edit-btn {
            margin-left: 6px;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<div id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('admin.messages')
                <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Online Micro-Projects
                            <span>{{$projectsAleppo + $projectsHoms + $projectsDamascus}}</span>
                        </h3>
                    </div> {{--glyphicon-list-alt--}}
                    <div class="panel-body">
                        <div class="col-sm-4">
                            <div class="well dash-box">
                                <div>
                                    <h3><span class="glyphicon glyphicon-check" aria-hidden="true"></span></h3>
                                    <h4>Aleppo</h4>
                                </div>
                                <h1>{{$projectsAleppo}}</h1>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="well dash-box">
                                <div>
                                    <h3><span class="glyphicon glyphicon-check" aria-hidden="true"></span></h3>
                                    <h4>Homs</h4>
                                </div>
                                <h1>{{$projectsHoms}}</h1>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="well dash-box">
                                <div>
                                    <h3><span class="glyphicon glyphicon-check" aria-hidden="true"></span></h3>
                                    <h4>Damascus</h4>
                                </div>
                                <h1>{{$projectsDamascus}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->role != 'french_editor')
                    @if(count($projectsPublish_a) || count($projectsPublish_h) || count($projectsPublish_d) ||
                    count($initiativesPublish) ||count($successesPublish) || count($newsPublish))
                        <div class="panel panel-default">
                            <div class="panel-heading main-color-bg">
                                <h3 class="panel-title">Pending Publish
                                    <span>{{count($projectsPublish_a) + count($projectsPublish_h) + count($projectsPublish_d)
                                    + count($initiativesPublish)+count($successesPublish)+ count($newsPublish)}}</span>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    @if(count($projectsPublish_a))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">Aleppo Projects</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Project Name</th>
                                                <th>Beneficiary Name</th>
                                                <th>City</th>
                                                <th>Fund Date</th>
                                                <th style="min-width: @if(Auth::user()->role == 'admin') 340px @else 240px @endif">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($projectsPublish_a as $project)
                                                <tbody>
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

                                                    <td class="text-right">
                                                        @if(count($project->images) != 0)
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-picture-o"></i>
                                                            </a>
                                                        @endif
                                                        @if($project['MPE_Location'] != 0)
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-map-marker"></i>
                                                            </a>
                                                        @endif

                                                        <a href="{{route('admin_project', $project['id'])}}"
                                                           class="btn btn-primary"><span
                                                                    class="fa fa-eye"></span>&nbsp; View</a>

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))

                                                            {!! Form::open(['route' => ['delete.project', $project['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                                            {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$project['MicroProject_ID'].'\')'])}}
                                                            {!! Form::close() !!}
                                                            <a href="{{route('edit.project', $project['id'])}}"
                                                               class="btn btn-primary edit-btn"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif

                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('add.image', $project['id'])}}" class="btn btn-primary edit-btn">
                                                                <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
                                                        @endif


                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                    @if(count($projectsPublish_h))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">Homs Projects</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Project Name</th>
                                                <th>Beneficiary Name</th>
                                                <th>City</th>
                                                <th>Fund Date</th>
                                                <th style="min-width: @if(Auth::user()->role == 'admin') 340px @else 240px @endif">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($projectsPublish_h as $project)
                                                <tbody>
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
                                                    <td class="text-right">

                                                        @if(count($project->images) != 0)
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-picture-o"></i>
                                                            </a>
                                                        @endif
                                                        @if($project['MPE_Location'] != 0)
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-map-marker"></i>
                                                            </a>
                                                        @endif

                                                        <a href="{{route('admin_project', $project['id'])}}"
                                                           class="btn btn-primary">
                                                            <span class="fa fa-eye"></span>&nbsp; View</a>

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))

                                                            {!! Form::open(['route' => ['delete.project', $project['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                                            {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$project['MicroProject_ID'].'\')'])}}
                                                            {!! Form::close() !!}
                                                            <a href="{{route('edit.project', $project['id'])}}"
                                                               class="btn btn-primary edit-btn"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif

                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('add.image', $project['id'])}}" class="btn btn-primary edit-btn">
                                                                <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                    @if(count($projectsPublish_d))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">Damascus Projects</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Project Name</th>
                                                <th>Beneficiary Name</th>
                                                <th>City</th>
                                                <th>Fund Date</th>
                                                <th style="min-width: @if(Auth::user()->role == 'admin') 340px @else 240px @endif">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($projectsPublish_d as $project)
                                                <tbody>
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
                                                    <td class="text-right">

                                                        @if(count($project->images) != 0)
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-picture-o"></i>
                                                            </a>
                                                        @endif
                                                        @if($project['MPE_Location'] != 0)
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-map-marker"></i>
                                                            </a>
                                                        @endif
                                                        <a href="{{route('admin_project', $project['id'])}}"
                                                           class="btn btn-primary">
                                                            <span class="fa fa-eye"></span>&nbsp; View</a>

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))

                                                            {!! Form::open(['route' => ['delete.project', $project['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                                            {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$project['MicroProject_ID'].'\')'])}}
                                                            {!! Form::close() !!}
                                                            <a href="{{route('edit.project', $project['id'])}}"
                                                               class="btn btn-primary edit-btn"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif

                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('add.image', $project['id'])}}" class="btn btn-primary edit-btn">
                                                                <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif

                                    @if(count($initiativesPublish))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="4" class="text-center">Initiatives</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Initiative Name</th>
                                                <th>Initiative Type</th>
                                                <th>City</th>
                                                <th style="min-width: @if(Auth::user()->role == 'admin') 340px @else 240px @endif">
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

                                                    <td class="text-right">
                                                        @if(count($initiative->images) != 0)
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-picture-o"></i>
                                                            </a>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            {!! Form::open(['route' => ['initiatives.destroy', $initiative['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                                            {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$initiative['id'].'\')'])}}
                                                            {!! Form::close() !!}
                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn">
                                                                <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                    @if(count($successesPublish))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="4" class="text-center">Successes</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Success Title</th>
                                                <th>Success Category</th>
                                                <th>City</th>
                                                <th style="min-width: @if(Auth::user()->role == 'admin') 340px @else 240px @endif">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($successesPublish as $success)
                                                <tbody>
                                                <tr>
                                                    <th>{{$success['id']}}</th>
                                                    <td>{{$success['english']['title']}}</td>
                                                    <td>{{ucfirst($success['whatCategory']['name'])}}</td>
                                                    <td>{{$success['place']['name']}}</td>

                                                    <td class="text-right">

                                                        <a href="{{route('successes.show', $success['id'])}}"
                                                           class="btn btn-primary edit-btn"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            <a href="{{route('successes.edit', $success['id'])}}" class="btn btn-primary edit-btn"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                            <form action="{{ route('successes.destroy', $success['id']) }}" method="POST" style="float: right; padding-left: 10px ">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger" onclick="return ConfirmDelete({{$success['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                    @if(count($newsPublish))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="4" class="text-center">News</th>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th style="min-width: @if(Auth::user()->role == 'admin') 340px @else 240px @endif">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            @foreach($newsPublish as $news)
                                                <tbody>
                                                <tr>
                                                    <th>{{$news['id']}}</th>
                                                    <td>{{$news['english']['title']}}</td>
                                                    <td>{{ucfirst($news['whatCategory']['name'])}}</td>
                                                    <td>
                                                        @if($news['type'] == '0') {{'Article'}}
                                                        @elseif($news['type'] == '1') {{'Product'}}
                                                        @elseif($news['type'] == '2') {{'Short Paragraph'}}
                                                        @elseif($news['type'] == '3') {{'Video'}}
                                                        @else {{'N/A'}}
                                                        @endif
                                                    </td>

                                                    <td class="text-right">
                                                        @if(count($news->images) != 0 )
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-picture-o"></i>
                                                            </a>
                                                        @endif

                                                        <a href="{{route('news.show', $news['id'])}}"
                                                           class="btn btn-primary edit-btn"><span
                                                                    class="fa fa-eye"></span>&nbsp;View</a>

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                            {!! Form::open(['route' => ['news.destroy', $news['id']]
                                                            , 'method' => 'DELETE'
                                                            , 'style' => 'float:right;padding-left:10px;'
                                                            , 'enctype' => 'multipart/form-data']) !!}

                                                            {{Form::button('<i class="fa fa-trash-o"></i> Delete'
                                                            , ['type' => 'submit'
                                                            , 'class' => 'btn btn-danger'
                                                            , 'onclick' => 'return ConfirmDelete(\''.$news['id'].'\')'])}}
                                                            {!! Form::close() !!}

                                                            <a href="{{route('news.edit', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('news.images.create', $news['id'])}}" class="btn btn-primary edit-btn">
                                                                <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
                                                        @endif

                                                    </td>

                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                {{--@if(count($projectsTranslate) || count($initiativesTranslate) ||count($successesTranslate) || count($newsTranslate))--}}
                {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading main-color-bg">--}}
                {{--<h3 class="panel-title">Pending Translation--}}
                {{--<span>{{count($projectsTranslate) + count($initiativesTranslate)+count($successesTranslate)+ count($newsTranslate)}}</span></h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                {{--<div class="table-responsive">--}}
                {{--@if(count($projectsTranslate))--}}
                {{--<table class="table table-striped table-bordered table-hover">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th colspan="5" class="text-center">Projects</th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<th>ID</th>--}}
                {{--<th>Project Name</th>--}}
                {{--<th>Beneficiary Name</th>--}}
                {{--<th>City</th>--}}
                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                {{--<th style="min-width: 170px">Action</th>--}}
                {{--@endif--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--@foreach($projectsTranslate as $project)--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                {{--<th>{{$project['MicroProject_ID']}}</th>--}}
                {{--<td>{{$project['english']['MPE_Name']}}</td>--}}
                {{--<td>{{$project['MPE_BeneficiaryName']}}</td>--}}
                {{--<td>--}}
                {{--@if($project['MPE_City'] == '') {{'N/A'}}--}}
                {{--@else {{$project->place->name}}--}}
                {{--@endif--}}
                {{--</td>--}}

                {{--<td class="text-right">--}}
                {{--@if(count($project->images) != 0)--}}
                {{--<a class="btn btn-light edit-btn">--}}
                {{--<i class="fa fa-picture-o"></i>--}}
                {{--</a>--}}
                {{--@endif--}}
                {{--@if($project['MPE_Location'] != 0)--}}
                {{--<a class="btn btn-light edit-btn">--}}
                {{--<i class="fa fa-map-marker"></i>--}}
                {{--</a>--}}
                {{--@endif--}}

                {{--<a href="{{route('admin_project', $project['id'])}}"--}}
                {{--class="btn btn-primary">--}}
                {{--<span class="fa fa-eye"></span>&nbsp; View</a>--}}

                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                {{--{!! Form::open(['route' => ['delete.project', $project['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}--}}
                {{--{{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$project['MicroProject_ID'].'\')'])}}--}}
                {{--{!! Form::close() !!}--}}

                {{--<a href="{{route('edit.project', $project['id'])}}"--}}
                {{--class="btn btn-primary edit-btn"><span class="fa fa-edit"></span>&nbsp;Edit</a>--}}
                {{--@endif--}}
                {{--@if($user->roles->contains('name', 'Admin')--}}
                {{--|| $user->roles->contains('name', 'Photos Editor')--}}
                {{--|| $user->roles->contains('name', 'Publisher'))--}}
                {{--<a href="{{route('add.image', $project['id'])}}" class="btn btn-primary edit-btn">--}}
                {{--<i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>--}}
                {{--@endif--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
                {{--@endforeach--}}
                {{--</table>--}}

                {{--@endif--}}
                {{--@if(count($initiativesTranslate))--}}
                {{--<table class="table table-striped table-bordered table-hover">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th colspan="5" class="text-center">Initiatives</th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<th>ID</th>--}}
                {{--<th>Initiative Name</th>--}}
                {{--<th>Initiative Type</th>--}}
                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                {{--<th style="min-width: 170px">Action</th>--}}
                {{--@endif--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--@foreach($initiativesTranslate as $initiative)--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                {{--<th>{{$initiative['id']}}</th>--}}
                {{--<td>{{$initiative['english']['title']}}</td>--}}
                {{--<td>{{$initiative['whatCategory']['name']}}</td>--}}

                {{--<td class="text-right">--}}
                {{--@if(count($initiative->images) != 0)--}}
                {{--<a class="btn btn-light edit-btn">--}}
                {{--<i class="fa fa-picture-o"></i>--}}
                {{--</a>--}}
                {{--@endif--}}

                {{--<a href="{{route('initiatives.show', $initiative['id'])}}"--}}
                {{--class="btn btn-primary edit-btn"><span--}}
                {{--class="fa fa-eye"></span>&nbsp;View</a>--}}


                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                {{--{!! Form::open(['route' => ['initiatives.destroy', $initiative['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}--}}
                {{--{{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$initiative['id'].'\')'])}}--}}
                {{--{!! Form::close() !!}--}}

                {{--<a href="{{route('initiatives.edit', $initiative['id'])}}"--}}
                {{--class="btn btn-primary edit-btn"><span--}}
                {{--class="fa fa-edit"></span>&nbsp;Edit</a>--}}
                {{--@endif--}}
                {{--@if($user->roles->contains('name', 'Admin')--}}
                {{--|| $user->roles->contains('name', 'Photos Editor')--}}
                {{--|| $user->roles->contains('name', 'Publisher'))--}}
                {{--<a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn">--}}
                {{--<i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>--}}
                {{--@endif--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
                {{--@endforeach--}}
                {{--</table>--}}
                {{--@endif--}}
                {{--@if(count($successesTranslate))--}}
                {{--<table class="table table-striped table-bordered table-hover">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th colspan="5" class="text-center">Successes</th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<th>ID</th>--}}
                {{--<th>Success Title</th>--}}
                {{--<th>Success Category</th>--}}
                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                {{--<th style="min-width: 250px">Action</th>--}}
                {{--@endif--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--@foreach($successesTranslate as $success)--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                {{--<th>{{$success['id']}}</th>--}}
                {{--<td>{{$success['english']['title']}}</td>--}}
                {{--<td>{{ucfirst($success['whoCategory']['name'])}}</td>--}}

                {{--<td class="text-right">--}}

                {{--<a href="{{route('successes.show', $success['id'])}}"--}}
                {{--class="btn btn-primary edit-btn"><span--}}
                {{--class="fa fa-eye"></span>&nbsp;View</a>--}}

                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                {{--<a href="{{route('successes.edit', $success['id'])}}" class="btn btn-primary edit-btn"><span--}}
                {{--class="fa fa-edit"></span>&nbsp;Edit</a>--}}
                {{--<form action="{{ route('successes.destroy', $success['id']) }}" method="POST" style="float: right; padding-left: 10px ">--}}
                {{--@method('DELETE')--}}
                {{--@csrf--}}
                {{--<button class="btn btn-danger" onclick="return ConfirmDelete({{$success['id']}})"><i class="fa fa-trash-o"></i> Delete</button>--}}
                {{--</form>--}}
                {{--@endif--}}
                {{--</td>--}}

                {{--</tr>--}}
                {{--</tbody>--}}
                {{--@endforeach--}}
                {{--</table>--}}
                {{--@endif--}}
                {{--@if(count($newsTranslate))--}}
                {{--<table class="table table-striped table-bordered table-hover">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th colspan="5" class="text-center">News</th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<th>ID</th>--}}
                {{--<th>Title</th>--}}
                {{--<th>Category</th>--}}
                {{--<th>Type</th>--}}

                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                {{--<th style="min-width: 250px">Action</th>--}}
                {{--@endif--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--@foreach($newsTranslate as $news)--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                {{--<th>{{$news['id']}}</th>--}}
                {{--<td>{{$news['english']['title']}}</td>--}}
                {{--<td>{{ucfirst($news['whatCategory']['name'])}}</td>--}}
                {{--<td>--}}
                {{--@if($news['type'] == '0') {{'Article'}}--}}
                {{--@elseif($news['type'] == '1') {{'Product'}}--}}
                {{--@elseif($news['type'] == '2') {{'Short Paragraph'}}--}}
                {{--@elseif($news['type'] == '3') {{'Video'}}--}}
                {{--@else {{'N/A'}}--}}
                {{--@endif--}}
                {{--</td>--}}

                {{--<td class="text-right">--}}

                {{--@if(count($news->images) != 0 )--}}
                {{--<a class="btn btn-light edit-btn">--}}
                {{--<i class="fa fa-picture-o"></i>--}}
                {{--</a>--}}
                {{--@endif--}}

                {{--<a href="{{route('news.show', $news['id'])}}"--}}
                {{--class="btn btn-primary edit-btn">--}}
                {{--<span class="fa fa-eye"></span>&nbsp;View</a>--}}

                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                {{--{!! Form::open(['route' => ['news.destroy', $news['id']]--}}
                {{--, 'method' => 'DELETE'--}}
                {{--, 'style' => 'float:right;padding-left:10px;'--}}
                {{--, 'enctype' => 'multipart/form-data']) !!}--}}

                {{--{{Form::button('<i class="fa fa-trash-o"></i> Delete'--}}
                {{--, ['type' => 'submit'--}}
                {{--, 'class' => 'btn btn-danger'--}}
                {{--, 'onclick' => 'return ConfirmDelete(\''.$news['id'].'\')'])}}--}}
                {{--{!! Form::close() !!}--}}

                {{--<a href="{{route('news.edit', $news['id'])}}" class="btn btn-primary edit-btn"><span--}}
                {{--class="fa fa-edit"></span>&nbsp;Edit</a>--}}
                {{--@endif--}}
                {{--@if($user->roles->contains('name', 'Admin')--}}
                {{--|| $user->roles->contains('name', 'Photos Editor')--}}
                {{--|| $user->roles->contains('name', 'Publisher'))--}}
                {{--<a href="{{route('news.images.create', $news['id'])}}" class="btn btn-primary edit-btn">--}}
                {{--<i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>--}}
                {{--@endif--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
                {{--@endforeach--}}
                {{--</table>--}}
                {{--@endif--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--@endif--}}

                @if(Auth::user()->role != 'french_editor')
                    @if(count($projectsEngCheck) || count($initiativesEngCheck) ||count($successesEngCheck) || count($newsEngCheck))
                        <div class="panel panel-default">
                            <div class="panel-heading main-color-bg">
                                <h3 class="panel-title">Pending to check English
                                    <span>{{count($projectsEngCheck) + count($initiativesEngCheck)+count($successesEngCheck)+ count($newsEngCheck)}}</span></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    @if(count($projectsEngCheck))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">Projects</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Project Name</th>
                                                <th>Beneficiary Name</th>
                                                <th>City</th>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <th style="min-width: 170px">Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            @foreach($projectsEngCheck as $project)
                                                <tbody>
                                                <tr>
                                                    <th>{{$project['MicroProject_ID']}}</th>
                                                    <td>{{$project['english']['MPE_Name']}}</td>
                                                    <td>{{$project['MPE_BeneficiaryName']}}</td>
                                                    <td>
                                                        @if($project['MPE_City'] == '') {{'N/A'}}
                                                        @else {{$project->place->name}}
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                        @if(count($project->images) != 0 )
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-picture-o"></i>
                                                            </a>
                                                        @endif
                                                        @if($project['MPE_Location'] != 0)
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-map-marker"></i>
                                                            </a>
                                                        @endif

                                                        <a href="{{route('admin_project', $project['id'])}}"
                                                           class="btn btn-primary">
                                                            <span class="fa fa-eye"></span>&nbsp; View</a>

                                                        @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'Photos Editor')
                                                            || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('add.image', $project['id'])}}" class="btn btn-primary edit-btn">
                                                                <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
                                                        @endif

                                                        @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'English Editor')
                                                            || $user->roles->contains('name', 'English Checker'))

                                                            {!! Form::open(['route' => ['delete.project', $project['id']]
                                                                , 'method' => 'DELETE'
                                                                , 'style' => 'float:right;padding-left:10px;'
                                                                , 'enctype' => 'multipart/form-data']) !!}
                                                            {{Form::button('<i class="fa fa-trash-o"></i> Delete'
                                                                , ['type' => 'submit', 'class' => 'btn btn-danger'
                                                                , 'onclick' => 'return ConfirmDelete(\''.$project['MicroProject_ID'].'\')'])}}
                                                            {!! Form::close() !!}

                                                            <a href="{{route('edit.project', $project['id'])}}" class="btn btn-primary edit-btn">
                                                                <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                            {!! Form::open(['route' => 'project.Englishchecked'
                                                            , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                                            {{Form::text('id', $project['id'], ['class' => 'hidden'])}}
                                                            {{Form::text('MicroProject_ID', $project['MicroProject_ID'], ['class' => 'hidden'])}}
                                                            {{Form::button('<i class="fa fa-check"></i> Checked', ['type' => 'submit', 'class' => 'btn btn-info'])}}
                                                            {!! Form::close() !!}
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>

                                    @endif
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
                                                    <th style="min-width: 170px">Action</th>
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

                                                    <td class="text-right">
                                                        @if(count($initiative->images) != 0)
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-picture-o"></i>
                                                            </a>
                                                        @endif

                                                        <a href="{{route('initiatives.show', $initiative['id'])}}"
                                                           class="btn btn-primary edit-btn">
                                                            <span class="fa fa-eye"></span>&nbsp;View</a>

                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'Photos Editor')
                                                        || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn">
                                                                <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
                                                        @endif

                                                        @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'English Editor')
                                                            || $user->roles->contains('name', 'English Checker'))

                                                            {!! Form::open(['route' => ['initiatives.destroy', $initiative['id']]
                                                                , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                                            {{Form::button('<i class="fa fa-trash-o"></i> Delete'
                                                                , ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$initiative['id'].'\')'])}}
                                                            {!! Form::close() !!}

                                                            <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn">
                                                                <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                            {!! Form::open(['route' => 'initiatives.Englishchecked'
                                                            , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                                            {{Form::text('id', $initiative['id'], ['class' => 'hidden'])}}
                                                            {{Form::button('<i class="fa fa-check"></i> Checked', ['type' => 'submit', 'class' => 'btn btn-info'])}}
                                                            {!! Form::close() !!}
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                    @if(count($successesEngCheck))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">Successes</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Success Title</th>
                                                <th>Success Category</th>
                                                <th>City</th>

                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <th style="min-width: 250px">Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            @foreach($successesEngCheck as $success)
                                                <tbody>
                                                <tr>
                                                    <th>{{$success['id']}}</th>
                                                    <td>{{$success['english']['title']}}</td>
                                                    <td>{{ucfirst($success['whatCategory']['name'])}}</td>
                                                    <td>{{$success['place']['name']}}</td>

                                                    <td class="text-right">
                                                        <a href="{{route('successes.show', $success['id'])}}"
                                                           class="btn btn-primary edit-btn">
                                                            <span class="fa fa-eye"></span>&nbsp;View
                                                        </a>

                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'English Editor')
                                                        || $user->roles->contains('name', 'English Checker'))
                                                            <a href="{{route('successes.edit', $success['id'])}}" class="btn btn-primary edit-btn"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>

                                                            <form action="{{ route('successes.destroy', $success['id']) }}" method="POST" style="float: right; padding-left: 10px ">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger" onclick="return ConfirmDelete({{$success['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                            </form>
                                                        @endif

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                            {!! Form::open(['route' => 'successes.Englishchecked' , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                                            {{Form::text('id', $success['id'], ['class' => 'hidden'])}}
                                                            {{Form::button('<i class="fa fa-check"></i> Checked', ['type' => 'submit', 'class' => 'btn btn-info'])}}
                                                            {!! Form::close() !!}
                                                        @endif

                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                    @if(count($newsEngCheck))
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="5" class="text-center">News</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <th style="min-width: 250px">Action</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            @foreach($newsEngCheck as $news)
                                                <tbody>
                                                <tr>
                                                    <th>{{$news['id']}}</th>
                                                    <td>{{$news['english']['title']}}</td>
                                                    <td>{{ucfirst($news['whatCategory']['name'])}}</td>
                                                    <td>
                                                        @if($news['type'] == '0') {{'Article'}}
                                                        @elseif($news['type'] == '1') {{'Product'}}
                                                        @elseif($news['type'] == '2') {{'Short Paragraph'}}
                                                        @elseif($news['type'] == '3') {{'Video'}}
                                                        @else {{'N/A'}}
                                                        @endif
                                                    </td>

                                                    <td class="text-right">

                                                        @if(count($news->images) != 0 )
                                                            <a class="btn btn-light edit-btn">
                                                                <i class="fa fa-picture-o"></i>
                                                            </a>
                                                        @endif

                                                        <a href="{{route('news.show', $news['id'])}}"
                                                           class="btn btn-primary edit-btn">
                                                            <span class="fa fa-eye"></span>&nbsp;View</a>

                                                        @if($user->roles->contains('name', 'Admin')
                                                            || $user->roles->contains('name', 'Photos Editor')
                                                            || $user->roles->contains('name', 'Publisher'))
                                                            <a href="{{route('news.images.create', $news['id'])}}" class="btn btn-primary edit-btn">
                                                                <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
                                                        @endif

                                                        @if($user->roles->contains('name', 'Admin')
                                                        || $user->roles->contains('name', 'English Editor')
                                                        || $user->roles->contains('name', 'English Checker'))
                                                            {!! Form::open(['route' => ['news.destroy', $news['id']]
                                                            , 'method' => 'DELETE'
                                                            , 'style' => 'float:right;padding-left:10px;'
                                                            , 'enctype' => 'multipart/form-data']) !!}

                                                            {{Form::button('<i class="fa fa-trash-o"></i> Delete'
                                                            , ['type' => 'submit'
                                                            , 'class' => 'btn btn-danger'
                                                            , 'onclick' => 'return ConfirmDelete(\''.$news['id'].'\')'])}}
                                                            {!! Form::close() !!}

                                                            <a href="{{route('news.edit', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif

                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Checker'))
                                                            {!! Form::open(['route' => 'news.Englishchecked' , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                                            {{Form::text('id', $news['id'], ['class' => 'hidden'])}}
                                                            {{Form::button('<i class="fa fa-check"></i> Checked', ['type' => 'submit', 'class' => 'btn btn-info'])}}
                                                            {!! Form::close() !!}
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                @if($user->roles->contains('name', 'Admin') && (count($projectsNotPaid) || count($initiativesNotPaid) || count($testimoniesNotPaid) || count($successesNotPaid) || count($newsNotPaid) ))
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Translations Not Paid Yet
                                <span
                                        id="paid-count">{{count($projectsNotPaid) + count($initiativesNotPaid)
                                        + count($testimoniesNotPaid) + count($successesNotPaid) + count($newsNotPaid) }}</span>
                                <button id="pay-all" class="btn btn-primary"
                                        style="float: right;margin-top: -5px;margin-right: 10px;">
                                    <span class="fa fa-usd" style="float: none;background-color: transparent"></span>
                                    All Paid
                                </button>
                            </h3>
                        </div>
                        <div class="panel-body" id="payment-panel">
                            <div class="table-responsive" id="payment-table">
                                @if(count($projectsNotPaid))
                                    <table class="table table-bordered table-hover projects-unpaid-table"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">Projects</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">Name</th>
                                            <th scope="col" class="text-center">Beneficiary</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projectsNotPaid as $project)
                                            <tr id="tr-{{$project->project_id}}">
                                                <th scope="row" class="text-center">{{$project->MicroProject_ID}}</th>
                                                <td class="text-center">{{$project->projectEnglish->MPE_Name}}</td>
                                                <td class="text-center">{{$project->project->MPE_BeneficiaryName}}</td>
                                                <td class="text-right">
                                                    <button class="btn  btn-primary btn-paid"
                                                            data-content="{{$project->project_id}}"><span
                                                                class="fa fa-usd"></span>&nbsp;Paid
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                                @if(count($initiativesNotPaid))
                                    <table class="table table-bordered table-hover initiatives-unpaid-table"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">Initiatives</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">Title</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($initiativesNotPaid as $initiative)
                                            <tr id="tr-ini-{{$initiative->initiative_id}}">
                                                <th scope="row" class="text-center">{{$initiative->initiative_id}}</th>
                                                <td class="text-center">{{$initiative->initiativeEnglish->title}}</td>
                                                <td class="text-right">
                                                    <button class="btn  btn-primary btn-paid-ini"
                                                            data-content="{{$initiative->initiative_id}}"><span
                                                                class="fa fa-usd"></span>&nbsp;Paid
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                                @if(count($testimoniesNotPaid))
                                    <table class="table table-bordered table-hover successes-unpaid-table"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">Testimonies</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">Testimoniar name</th>
                                            <th scope="col" class="text-center">Initiative title</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($testimoniesNotPaid as $testimony)
                                            <tr id="tr-testimony-{{$testimony->testimony_id}}">
                                                <th scope="row" class="text-center">{{$testimony->testimony_id}}</th>
                                                <td class="text-center">{{$testimony->name}}</td>
                                                <td class="text-center">{{$testimony->title}}</td>
                                                <td class="text-right">
                                                    <button class="btn  btn-primary btn-paid-testimony"
                                                            data-content="{{$testimony->testimony_id}}"><span
                                                                class="fa fa-usd"></span>&nbsp;Paid
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                                @if(count($successesNotPaid))
                                    <table class="table table-bordered table-hover successes-unpaid-table"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">Successes</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">Title</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($successesNotPaid as $success)
                                            <tr id="tr-success-{{$success->success_id}}">
                                                <th scope="row" class="text-center">{{$success->success_id}}</th>
                                                <td class="text-center">{{$success->successEnglish->title}}</td>
                                                <td class="text-right">
                                                    <button class="btn  btn-primary btn-paid-success"
                                                            data-content="{{$success->success_id}}"><span
                                                                class="fa fa-usd"></span>&nbsp;Paid
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                                @if(count($newsNotPaid))
                                    <table class="table table-bordered table-hover successes-unpaid-table"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">News</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">Title</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($newsNotPaid as $news)
                                            <tr id="tr-success-{{$news->news_id}}">
                                                <th scope="row" class="text-center">{{$news->news_id}}</th>
                                                <td class="text-center">{{$news->newsEnglish->title}}</td>
                                                <td class="text-right">
                                                    <button class="btn  btn-primary btn-paid-news"
                                                            data-content="{{$news->news_id}}"><span
                                                                class="fa fa-usd"></span>&nbsp;Paid
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>
</div>

@stack('navbar_scripts')
<script>
    function ConfirmDelete(e) {
        if (confirm("Do you really want to: \nDelete " + e + " ?"))
            return true;
        else
            return false;
    }
</script>
@if($user->roles->contains('name', 'Admin'))
    <script>
        let projectsUnpaidCount = {{count($projectsNotPaid)}};
        $('.btn-paid').click(function () {
            let id = this.dataset.content;
            $.post('/admin/project/french/paid/' + id, {_token: '{{ csrf_token() }}'});
            if (projectsUnpaidCount === 1) {
                $('.projects-unpaid-table').hide();
            } else {
                $('#tr-' + id).hide();
            }
            decreasePaymentSpanCount
        });

        let initiativesUnpaidCount = {{count($initiativesNotPaid)}};
        $('.btn-paid-ini').click(function () {
            let id = this.dataset.content;
            $.post('/admin/initiatives/french/paid/' + id, {_token: '{{ csrf_token() }}'});
            if (initiativesUnpaidCount === 1) {
                $('.initiatives-unpaid-table').hide();
            } else {
                initiativesUnpaidCount--;
                $('#tr-ini-' + id).hide();
            }
            decreasePaymentSpanCount
        });

        let testimoniesUnpaidCount = {{count($testimoniesNotPaid)}};
        $('.btn-paid-testimony').click(function () {
            let id = this.dataset.content;
            $.post('/admin/initiatives/testimonies/french/paid/' + id, {_token: '{{ csrf_token() }}'});
            if (testimoniesUnpaidCount === 1) {
                $('.testimonies-unpaid-table').hide();
            } else {
                testimoniesUnpaidCount--;
                $('#tr-testimony-' + id).hide();
            }
            decreasePaymentSpanCount
        });

        let successesUnpaidCount = {{count($successesNotPaid)}};
        $('.btn-paid-success').click(function () {
            let id = this.dataset.content;
            $.post('/admin/successes/french/paid/' + id, {_token: '{{ csrf_token() }}'});
            if (successesUnpaidCount === 1) {
                $('.successes-unpaid-table').hide();
            } else {
                successesUnpaidCount--;
                $('#tr-success-' + id).hide();
            }
            decreasePaymentSpanCount
        });

        let newsUnpaidCount = {{count($newsNotPaid)}};
        $('.btn-paid-news').click(function () {
            let id = this.dataset.content;
            $.post('/admin/news/french/paid/' + id, {_token: '{{ csrf_token() }}'});
            if (newsUnpaidCount === 1) {
                $('.news-unpaid-table').hide();
            } else {
                newsUnpaidCount--;
                $('#tr-success-' + id).hide();
            }
            decreasePaymentSpanCount
        });

        $('#pay-all').click(function () {
            $.post('/admin/project/french/paid/all', {_token: '{{ csrf_token() }}'});
            hidePaymentTable();
        });

        function decreasePaymentSpanCount() {
            if ($('#paid-count').text() === '1') {
                hidePaymentTable();
            } else {
                $('#paid-count').text($('#paid-count').text() - 1);
            }
        }

        function hidePaymentTable() {
            $('#paid-count').hide();
            $('#pay-all').hide();
            $('#payment-table').hide();
            $('#payment-panel').html('<div class="text-center"><h4>All Translation are Paid</h4></div>');
        }
    </script>
@endif
