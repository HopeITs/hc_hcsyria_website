<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'initiatives-index' ?>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Initiatives</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
            color: #428bca;
            border-top: 2px solid #428bca;
        }
        .nav-tabs {
            top: 70px;
        }

        .table-responsive {
            padding-top: 15px;
        }
        th,
        td {
            text-align: center;
        }
        form {
            float: right;
            margin-left: 4px
        }
    </style>
</head><!--/head-->
<body>

@stack('navbar_body')

<section style="padding-top: 30px">
    <div class="container">
       @include('admin.messages')
    </div>
    <div class="container">
        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
            <a class="btn btn-success" href="{{route('initiatives.create')}}"><i
                    class="fa fa-plus-square"></i>&nbsp; Create new Initiative</a>
        @endif
        <ul class="nav nav-tabs">
            <li class="active"><a href="#cot" data-toggle="tab">COI</a></li>
            <li><a href="#development" data-toggle="tab">Development</a></li>
            <li><a href="#rehabilitation" data-toggle="tab">Rehabilitation</a></li>
            <li><a href="#relief" data-toggle="tab">Relief</a></li>
            <li><a href="#disc" data-toggle="tab">DISC</a></li>
            <li><a href="#study" data-toggle="tab">StudyZone</a></li>
            <li><a href="#family" data-toggle="tab">Family to Family</a></li>
            <li><a href="#school" data-toggle="tab">School to School</a></li>
            <li><a href="#children" data-toggle="tab">Children University</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="cot">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableCOI" style="width: 100%">
                                @if($iniCOI)
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($iniCOI as $initiative)
                                        <tbody>
                                        <tr>
                                            <td>{{$initiative['id']}}</td>
                                            <td>{{$initiative['english']['title']}}</td>
                                            <td class="text-right">
                                                <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('initiatives.destroy', $initiative['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$initiative['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                                {!! Form::open(['route' => 'initiatives.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                {{Form::hidden('id', $initiative['id'])}}
                                                {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                                {!! Form::close() !!}
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="development">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableDev" style="width: 100%">
                                @if($iniDevelopment)
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($iniDevelopment as $initiative)
                                        <tbody>
                                        <tr>
                                            <td>{{$initiative['id']}}</td>
                                            <td>{{$initiative['english']['title']}}</td>
                                            <td class="text-right">
                                                <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('initiatives.destroy', $initiative['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$initiative['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                                {!! Form::open(['route' => 'initiatives.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                {{Form::hidden('id', $initiative['id'])}}
                                                {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                                {!! Form::close() !!}
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="rehabilitation">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableRehab" style="width: 100%">
                                @if($iniRehabilitation)
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($iniRehabilitation as $initiative)
                                        <tbody>
                                            <tr>
                                                <td>{{$initiative['id']}}</td>
                                                <td>{{$initiative['english']['title']}}</td>
                                                <td class="text-right">
                                                    <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-eye"></span>&nbsp;View</a>
                                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                    <a href="{{route('initiatives.images.rehabilitation.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-picture-o"></span></span>&nbsp;Before/After</a>
                                                    <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                    @endif
                                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Edit</a>
                                                    @endif
                                                    @if($user->roles->contains('name', 'Admin'))
                                                    <form action="{{ route('initiatives.destroy', $initiative['id']) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" onclick="return ConfirmDelete({{$initiative['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                    </form>
                                                    {!! Form::open(['route' => 'initiatives.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                    {{Form::hidden('id', $initiative['id'])}}
                                                    {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                                    {!! Form::close() !!}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="relief">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableRelief" style="width: 100%">
                                @if($iniRelief)
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($iniRelief as $initiative)
                                        <tbody>
                                            <tr>
                                                <td>{{$initiative['id']}}</td>
                                                <td>{{$initiative['english']['title']}}</td>
                                                <td class="text-right">
                                                    <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-eye"></span>&nbsp;View</a>
                                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                    <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                    @endif
                                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Edit</a>
                                                    @endif
                                                    @if($user->roles->contains('name', 'Admin'))
                                                    <form action="{{ route('initiatives.destroy', $initiative['id']) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" onclick="return ConfirmDelete({{$initiative['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                    </form>
                                                    {!! Form::open(['route' => 'initiatives.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                    {{Form::hidden('id', $initiative['id'])}}
                                                    {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                                    {!! Form::close() !!}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="disc">
                 <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableHDISC"
                                   style="width: 100%">
                                @if($iniDISC)
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Place</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($iniDISC as $initiative)
                                        <tbody>
                                        <tr>
                                            <td>{{$initiative['id']}}</td>
                                            <td>{{$initiative['english']['title']}}</td>
                                            <td>{{$initiative['place']['name']}}</td>

                                            <td class="text-right">
                                                <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('initiatives.testimonies.index', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Testimonies</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('initiatives.destroy', $initiative['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$initiative['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                                {!! Form::open(['route' => 'initiatives.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                {{Form::hidden('id', $initiative['id'])}}
                                                {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                                {!! Form::close() !!}
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="study">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableStudy"
                                   style="width: 100%">
                                @if($iniStudy)
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Place</th>
                                    <th>Center</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach($iniStudy as $initiative)
                                    <tbody>
                                    <tr>
                                        <td>{{$initiative['id']}}</td>
                                        <td>{{$initiative['english']['title']}}</td>
                                        <td>{{$initiative['place']['name']}}</td>
                                        <td>@if($initiative['sz_center_id'] == 0) N/A @else {{$initiative['center']['name']}} @endif</td>
                                        <td>{{$initiative['subWhatCategory']['name']}}</td>

                                        <td class="text-right">
                                            <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                    class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return ConfirmDelete({{$initiative['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                            </form>

                                            {!! Form::open(['route' => 'initiatives.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                            {{Form::hidden('id', $initiative['id'])}}
                                            {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                            {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="family">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#familyDist" data-toggle="tab">Partners</a></li>
                    <li><a href="#familyStories" data-toggle="tab">Stories</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="familyDist">
                        <div class="media">
                            <div class="media-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="tableFamilyDist"
                                           style="width: 100%">
                                        @if($iniFamilyDist)
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            @foreach($iniFamilyDist as $initiative)
                                                <tbody>
                                                <tr>
                                                    <td>{{$initiative['id']}}</td>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td class="text-right">
                                                        <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                                class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                        <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                                class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                        <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                                class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin'))
                                                        <form action="{{ route('initiatives.destroy', $initiative['id']) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger" onclick="return ConfirmDelete({{$initiative['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                        </form>
                                                        {!! Form::open(['route' => 'initiatives.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                        {{Form::hidden('id', $initiative['id'])}}
                                                        {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                                        {!! Form::close() !!}
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="familyStories">
                        <div class="media">
                            <div class="media-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="tableFamilyStories"
                                           style="width: 100%">
                                        @if($iniFamilyStories)
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            @foreach($iniFamilyStories as $initiative)
                                                <tbody>
                                                <tr>
                                                    <td>{{$initiative['id']}}</td>
                                                    <td>{{$initiative['english']['title']}}</td>
                                                    <td class="text-right">
                                                        <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                                class="fa fa-eye"></span>&nbsp;View</a>
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                        <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                                class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                        <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                                class="fa fa-edit"></span>&nbsp;Edit</a>
                                                        @endif
                                                        @if($user->roles->contains('name', 'Admin'))
                                                        <form action="{{ route('initiatives.destroy', $initiative['id']) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger" onclick="return ConfirmDelete({{$initiative['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                        </form>
                                                        {!! Form::open(['route' => 'initiatives.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                        {{Form::hidden('id', $initiative['id'])}}
                                                        {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                                        {!! Form::close() !!}
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="school">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableSchool"
                                   style="width: 100%">
                                @if($iniSchool)
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach($iniSchool as $initiative)
                                    <tbody>
                                    <tr>
                                        <td>{{$initiative['id']}}</td>
                                        <td>{{$initiative['english']['title']}}</td>
                                        <td class="text-right">
                                            <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('initiatives.testimonies.index', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                    class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Testimonies</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                    class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('initiatives.destroy', $initiative['id']) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return ConfirmDelete({{$initiative['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                            </form>
                                            {!! Form::open(['route' => 'initiatives.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                            {{Form::hidden('id', $initiative['id'])}}
                                            {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                            {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="children">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableChildren"
                                   style="width: 100%">
                                @if($iniChildrenUni)
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Place</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($iniChildrenUni as $initiative)
                                        <tbody>
                                        <tr>
                                            <td>{{$initiative['id']}}</td>
                                            <td>{{$initiative['english']['title']}}</td>
                                            <td>{{$initiative['place']['name']}}</td>
                                            <td class="text-right">
                                                <a href="{{route('initiatives.show', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('initiatives.testimonies.index', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Testimonies</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                <a href="{{route('initiatives.images.create', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('initiatives.edit', $initiative['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('initiatives.destroy', $initiative['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$initiative['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                                {!! Form::open(['route' => 'initiatives.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                {{Form::hidden('id', $initiative['id'])}}
                                                {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                                {!! Form::close() !!}
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stack('navbar_scripts')
<script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tableCOI').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableDev').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableRehab').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableRelief').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableDISC').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableStudy').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableFamilyDist').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableFamilyStories').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableSchool').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableChildren').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
    });
</script>
<script>
    function ConfirmDelete(e) {
        if (confirm("Do you really want to: \nDelete " + e + " ?"))
            return true;
        else
            return false;
    }
</script>

</body><!--/body-->