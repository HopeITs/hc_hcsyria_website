<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'projects' ?>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Projects</title>
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
        /*@media screen and (max-width: 768px) {*/
            /*.nav-tabs > li {*/
                /*width: 33.33%;*/
                /*text-align: center;*/
            /*}*/
        /*}*/
         .nav-tabs {
             padding-top: 30px;
         }
        .table-responsive {
            padding-top: 15px
        }
        .add-img {
            margin-left: 5px;
        }
        .edit-btn{
            margin-left: 6px;
        }
        .btn-funded-conversion {
            margin-right: 5px;
            outline: none!important;
            padding-right: 10px;
            padding-left: 10px;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<section style="padding-top: 30px;">
    <div class="container">
       @include('admin.messages')
    </div>
    <div class=" " style="margin:0 5% 0 5%">
        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
            <a class="btn btn-success" href="{{route('projects_create')}}"><i
                    class="fa fa-plus-square"></i>&nbsp; Create new Project</a>
        @endif
        <ul class="nav nav-tabs">
            @if( $user->roles->contains('name', 'Admin') || $user->places->contains('name', 'Aleppo')  )
                <li><a href="#aleppo" data-toggle="tab">Aleppo <small>({{ $projectsAleppo->count() }})</small></a></li>
            @endif
            @if( $user->roles->contains('name', 'Admin') || $user->places->contains('name', 'Homs')  )
                <li><a href="#homs" data-toggle="tab">Homs <small>({{ $projectsHoms->count() }})</small></a></li>
            @endif
            @if( $user->roles->contains('name', 'Admin') || $user->places->contains('name', 'Damascus')  )
                <li><a href="#damascus" data-toggle="tab">Damascus <small>({{ $projectsDamascus->count() }})</small></a></li>
            @endif

            <li><a href="#canceled" data-toggle="tab">Canceled <small>({{ $projectsCanceled->count() }})</small></a></li>
            <li><a href="#pending" data-toggle="tab">Pending <small>({{ $projectsPending->count() }})</small></a></li>

        </ul>
<div class="tab-content">
    @if( $user->roles->contains('name', 'Admin') || $user->places->contains('name', 'Aleppo'))
    <div class="tab-pane fade" id="aleppo">
        <div class="media">
            <div class="media-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tableA"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Beneficiary</th>
                            {{--<th scope="col" class="text-center">Statue</th>--}}
                            <th scope="col" class="text-center">Type</th>

                            <th scope="col" class="text-center">Fund Date</th>
                            <th scope="col" class="text-center">Donor</th>

                            <th scope="col" class="text-center">Mobile</th>
                            <th scope="col" class="text-center">Location</th>
                            <th scope="col" class="text-center">Video</th>
                            <th scope="col" class="text-center" style="min-width: @if($user->roles->contains('name', 'Admin')) 386px @else 120px @endif">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projectsAleppo as $project)
                            <tr>
                                <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                                <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                                <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>
                                {{--<td class="text-center">--}}
                                    {{--@if($project['MPE_Done'] == '0') Awaiting for Fund--}}
                                    {{--@elseif($project['MPE_Done'] == '1') Funded--}}
                                    {{--@elseif($project['MPE_Done'] == '2') Canceled--}}
                                    {{--@else N/A @endif--}}
                                {{--</td>--}}
                                <td class="text-center">{{$project['type']['name']}}</td>

                                <td class="text-center">{{$project['MPE_FundedDate']}}</td>
                                <td class="text-center">
                                    @if($project['MPE_Donor'] == '') N/A
                                    @else
                                        {{$project->donor->code}}
                                    @endif
                                </td>

                                <td class="text-center">{{$project['Mobile']}}</td> 
                                <td class="text-center">
                                    @if($project['MPE_Location'] != '0')
                                        <a  href="https://www.google.com/maps/search/?api=1&query={{$project['MPE_Location']}}"
                                            class="btn btn-warning icon-btn " target="_blank">
                                            <i class="fa fa-map-marker" ></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($project['MPE_Video'] != '0')
                                        <a  href="#" class="btn btn-info icon-btn " >
                                            <i class="fa fa-video-camera"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{route('admin_project', $project['id'])}}" class="btn btn-primary"><span
                                    class="fa fa-eye"></span>&nbsp;View</a>
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                        <a href="{{route('edit.project', $project['id'])}}" class="btn btn-primary edit-btn"><span
                                                class="fa fa-edit"></span>&nbsp;Edit</a>
                                    @endif
                                    @if($user->roles->contains('name', 'Admin'))

                                        {!! Form::open(['route' => ['delete.project', $project['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                        {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$project['MicroProject_ID'].'\')'])}}
                                        {!! Form::close() !!}
                                        @if($project['MPE_Published'] == '1')
                                            {!! Form::open(['route' => 'unpublish.project' , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                            {{Form::text('MicroProject_ID', $project['MicroProject_ID'], ['class' => 'hidden'])}}
                                            {{Form::text('id', $project['id'], ['class' => 'hidden'])}}
                                            {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                            {!! Form::close() !!}
                                        @endif
                                    @endif
                                    @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                        <a href="{{route('add.image', $project['id'])}}" class="btn btn-primary edit-btn">
                                            <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
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
    @endif
    @if( $user->roles->contains('name', 'Admin') || $user->places->contains('name', 'Homs'))
    <div class="tab-pane fade" id="homs">
    <div class="media">
        <div class="media-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tableH"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Beneficiary</th>
                        {{--<th scope="col" class="text-center">Statue</th>--}}
                        <th scope="col" class="text-center">Type</th>

                        <th scope="col" class="text-center">Fund Date</th>
                        <th scope="col" class="text-center">Donor</th>
                        <th scope="col" class="text-center">Mobile</th>
                        <th scope="col" class="text-center">Location</th>
                        <th scope="col" class="text-center">Video</th>
                        <th scope="col" class="text-center" style="min-width: @if($user->roles->contains('name', 'Admin')) 386px @else 120px @endif">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projectsHoms as $project)
                        <tr>
                            <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                            <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                            <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>
                            {{--<td class="text-center">--}}
                                {{--@if($project['MPE_Done'] == '0') Awaiting for Fund--}}
                                {{--@elseif($project['MPE_Done'] == '1') Funded--}}
                                {{--@elseif($project['MPE_Done'] == '2') Canceled--}}
                                {{--@else N/A @endif--}}
                            {{--</td>--}}
                            <td class="text-center">{{$project['type']['name']}}</td>
                            <td class="text-center">{{$project['MPE_FundedDate']}}</td>

                            <td class="text-center">
                                @if($project['MPE_Donor'] == '') N/A
                                @else
                                    {{$project->donor->name}}
                                @endif
                            </td>


                            <td class="text-center">{{$project['Mobile']}}</td>
                            <td class="text-center">
                                @if($project['MPE_Location'] != '0')
                                    <a  href="https://www.google.com/maps/search/?api=1&query={{$project['MPE_Location']}}"
                                        class="btn btn-warning icon-btn " target="_blank">
                                        <i class="fa fa-map-marker" ></i>
                                    </a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($project['MPE_Video'] != '0')
                                    <a  href="#" class="btn btn-info icon-btn " >
                                        <i class="fa fa-video-camera"></i>
                                    </a>
                                @endif
                            </td>
                            <td class="text-right">
                                <a href="{{route('admin_project', $project['id'])}}" class="btn btn-primary"><span
                                            class="fa fa-eye"></span>&nbsp;View</a>
                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                    <a href="{{route('edit.project', $project['id'])}}" class="btn btn-primary edit-btn"><span
                                                class="fa fa-edit"></span>&nbsp;Edit</a>
                                @endif
                                @if($user->roles->contains('name', 'Admin'))
                                    {!! Form::open(['route' => ['delete.project', $project['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                    {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$project['MicroProject_ID'].'\')'])}}
                                    {!! Form::close() !!}
                                    @if($project['MPE_Published'] == '1')
                                        {!! Form::open(['route' => 'unpublish.project' , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                        {{Form::text('id', $project['id'], ['class' => 'hidden'])}}
                                        {{Form::text('MicroProject_ID', $project['MicroProject_ID'], ['class' => 'hidden'])}}
                                        {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                        {!! Form::close() !!}
                                    @endif
                                @endif
                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                    <a href="{{route('add.image', $project['id'])}}" class="btn btn-primary edit-btn">
                                        <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
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
    @endif
    @if( $user->roles->contains('name', 'Admin') || $user->places->contains('name', 'Damascus'))
    <div class="tab-pane fade" id="damascus">
    <div class="media">
        <div class="media-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tableD"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Beneficiary</th>
                        {{--<th scope="col" class="text-center">Statue</th>--}}
                        <th scope="col" class="text-center">Type</th>

                        <th scope="col" class="text-center">Fund Date</th>
                        <th scope="col" class="text-center">Donor</th>

                        <th scope="col" class="text-center">Mobile</th>
                        <th scope="col" class="text-center">Location</th>
                        <th scope="col" class="text-center">Video</th>
                        <th scope="col" class="text-center" style="min-width: @if($user->roles->contains('name', 'Admin')) 386px @else 120px @endif">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projectsDamascus as $project)
                        <tr>
                            <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                            <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                            <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>
                            {{--<td class="text-center">--}}
                                {{--@if($project['MPE_Done'] == '0') Awaiting for Fund--}}
                                {{--@elseif($project['MPE_Done'] == '1') Funded--}}
                                {{--@elseif($project['MPE_Done'] == '2') Canceled--}}
                                {{--@else N/A @endif--}}
                            {{--</td>--}}
                            <td class="text-center">{{$project['type']['name']}}</td>
                            <td class="text-center">{{$project['MPE_FundedDate']}}</td>

                            <td class="text-center">
                                @if($project['MPE_Donor'] == '') N/A
                                @else
                                    {{$project->donor->code}}
                                @endif
                            </td>
                            <td class="text-center">{{$project['Mobile']}}</td>
                            {{--<td class="text-center">{!! strlen($project['MPE_Location']) == 19 ? '<i class="fa fa-map-marker"></i>' : ($project['MPE_Location'] == '0' ? 'N/A' : $project['MPE_Location']) !!}</td>--}}
                            {{--<td class="text-center">{!! $project['MPE_Video'] == '0' ? 'N/A' : '<i class="fa fa-video-camera"></i>' !!}</td>--}}
                            <td class="text-center">
                                @if($project['MPE_Location'] != '0')
                                    <a  href="https://www.google.com/maps/search/?api=1&query={{$project['MPE_Location']}}"
                                        class="btn btn-warning icon-btn " target="_blank">
                                        <i class="fa fa-map-marker" ></i>
                                    </a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($project['MPE_Video'] != '0')
                                    <a  href="#" class="btn btn-info icon-btn " >
                                        <i class="fa fa-video-camera"></i>
                                    </a>
                                @endif
                            </td>
                            <td class="text-right">
                                <a href="{{route('admin_project', $project['id'])}}" class="btn btn-primary"><span
                                            class="fa fa-eye"></span>&nbsp;View</a>
                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                    <a href="{{route('edit.project', $project['id'])}}" class="btn btn-primary edit-btn"><span
                                                class="fa fa-edit"></span>&nbsp;Edit</a>
                                @endif
                                @if($user->roles->contains('name', 'Admin'))
                                    {!! Form::open(['route' => ['delete.project', $project['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                    {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$project['MicroProject_ID'].'\')'])}}
                                    {!! Form::close() !!}
                                    @if($project['MPE_Published'] == '1')
                                        {!! Form::open(['route' => 'unpublish.project' , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                        {{Form::text('id', $project['id'], ['class' => 'hidden'])}}
                                        {{Form::text('MicroProject_ID', $project['MicroProject_ID'], ['class' => 'hidden'])}}
                                        {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                        {!! Form::close() !!}
                                    @endif
                                @endif
                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                    <a href="{{route('add.image', $project['id'])}}" class="btn btn-primary edit-btn">
                                        <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
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
    @endif

    <div class="tab-pane fade" id="canceled">
    <div class="media">
        <div class="media-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tableCan"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Beneficiary</th>
                        <th scope="col" class="text-center">City</th>
                        <th scope="col" class="text-center">Type</th>

                        <th scope="col" class="text-center">Fund Date</th>
                        <th scope="col" class="text-center">Donor</th>

                        <th scope="col" class="text-center">Mobile</th>
                        <th scope="col" class="text-center">Location</th>
                        <th scope="col" class="text-center">Video</th>
                        <th scope="col" class="text-center" style="min-width: @if($user->roles->contains('name', 'Admin')) 386px @else 120px @endif">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projectsCanceled as $project)
                        <tr>
                            <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                            <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                            <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>

                            <td class="text-center">{{$project['place']['name']}}</td>
                            <td class="text-center">{{$project['type']['name']}}</td>
                            <td class="text-center">{{$project['MPE_FundedDate']}}</td>

                            <td class="text-center">
                                @if($project['MPE_Donor'] == '') N/A
                                @else
                                    {{$project->donor->code}}
                                @endif
                            </td>
                            <td class="text-center">{{$project['Mobile']}}</td>
                            {{--<td class="text-center">{!! strlen($project['MPE_Location']) == 19 ? '<i class="fa fa-map-marker"></i>' : ($project['MPE_Location'] == '0' ? 'N/A' : $project['MPE_Location']) !!}</td>--}}
                            {{--<td class="text-center">{!! $project['MPE_Video'] == '0' ? 'N/A' : '<i class="fa fa-video-camera"></i>' !!}</td>--}}
                            <td class="text-center">
                                @if($project['MPE_Location'] != '0')
                                    <a  href="https://www.google.com/maps/search/?api=1&query={{$project['MPE_Location']}}"
                                        class="btn btn-warning icon-btn " target="_blank">
                                        <i class="fa fa-map-marker" ></i>
                                    </a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($project['MPE_Video'] != '0')
                                    <a  href="#" class="btn btn-info icon-btn " >
                                        <i class="fa fa-video-camera"></i>
                                    </a>
                                @endif
                            </td>
                            <td class="text-right">
                                <a href="{{route('admin_project', $project['id'])}}" class="btn btn-primary"><span
                                            class="fa fa-eye"></span>&nbsp;View</a>
                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                    <a href="{{route('edit.project', $project['id'])}}" class="btn btn-primary edit-btn"><span
                                                class="fa fa-edit"></span>&nbsp;Edit</a>
                                @endif
                                @if($user->roles->contains('name', 'Admin'))
                                    {!! Form::open(['route' => ['delete.project', $project['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                    {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$project['MicroProject_ID'].'\')'])}}
                                    {!! Form::close() !!}
                                    @if($project['MPE_Published'] == '1')
                                        {!! Form::open(['route' => 'unpublish.project' , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                        {{Form::text('id', $project['id'], ['class' => 'hidden'])}}
                                        {{Form::text('MicroProject_ID', $project['MicroProject_ID'], ['class' => 'hidden'])}}
                                        {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                        {!! Form::close() !!}
                                    @endif
                                @endif
                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                    <a href="{{route('add.image', $project['id'])}}" class="btn btn-primary edit-btn">
                                        <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
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
    <div class="tab-pane fade" id="pending">
            <div class="media">
                <div class="media-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tablePnd"
                               style="width: 100%">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Beneficiary</th>
                                <th scope="col" class="text-center">City</th>
                                <th scope="col" class="text-center">Type</th>

                                <th scope="col" class="text-center">Fund Date</th>
                                <th scope="col" class="text-center">Donor</th>

                                <th scope="col" class="text-center">Mobile</th>
                                <th scope="col" class="text-center">Location</th>
                                <th scope="col" class="text-center">Video</th>
                                <th scope="col" class="text-center" style="min-width: @if($user->roles->contains('name', 'Admin')) 386px @else 120px @endif">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projectsPending as $project)
                                <tr>
                                    <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                                    <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                                    <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>

                                    <td class="text-center">{{$project['place']['name']}} </td>

                                    <td class="text-center">{{$project['type']['name']}}</td>
                                    <td class="text-center">{{$project['MPE_FundedDate']}}</td>

                                    <td class="text-center">
                                        @if($project['MPE_Donor'] == '') N/A
                                        @else
                                            {{$project->donor->code}}
                                        @endif
                                    </td>
                                    <td class="text-center">{{$project['Mobile']}}</td>
                                    {{--<td class="text-center">{!! strlen($project['MPE_Location']) == 19 ? '<i class="fa fa-map-marker"></i>' : ($project['MPE_Location'] == '0' ? 'N/A' : $project['MPE_Location']) !!}</td>--}}
                                    {{--<td class="text-center">{!! $project['MPE_Video'] == '0' ? 'N/A' : '<i class="fa fa-video-camera"></i>' !!}</td>--}}
                                    <td class="text-center">
                                        @if($project['MPE_Location'] != '0')
                                            <a  href="https://www.google.com/maps/search/?api=1&query={{$project['MPE_Location']}}"
                                                class="btn btn-warning icon-btn " target="_blank">
                                                <i class="fa fa-map-marker" ></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($project['MPE_Video'] != '0')
                                            <a  href="#" class="btn btn-info icon-btn " >
                                                <i class="fa fa-video-camera"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{route('admin_project', $project['id'])}}" class="btn btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('edit.project', $project['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            {!! Form::open(['route' => ['delete.project', $project['id']] , 'method' => 'DELETE', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                            {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$project['MicroProject_ID'].'\')'])}}
                                            {!! Form::close() !!}
                                            @if($project['MPE_Published'] == '1')
                                                {!! Form::open(['route' => 'unpublish.project' , 'method' => 'POST', 'style' => 'float:right;padding-left:10px;', 'enctype' => 'multipart/form-data']) !!}
                                                {{Form::text('id', $project['id'], ['class' => 'hidden'])}}
                                                {{Form::text('MicroProject_ID', $project['MicroProject_ID'], ['class' => 'hidden'])}}
                                                {{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                                {!! Form::close() !!}
                                            @endif
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('add.image', $project['id'])}}" class="btn btn-primary edit-btn">
                                                <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i> Image</a>
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
</div>
</section>

@stack('navbar_scripts')
<script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/dataTables.bootstrap.min.js"></script>
<script>
function ConfirmDelete(e) {
if (confirm("Do you really want to: \nDelete " + e + " ?"))
return true;
else
return false;
}
</script>
<script>
$(document).ready(function () {
$('#tableAll').DataTable({
"bPaginate": false,
"scrollX": true,
"aaSorting": []
});
$('#tableA').DataTable({
"bPaginate": false,
"scrollX": true,
"aaSorting": []
});
$('#tableH').DataTable({
"bPaginate": false,
"scrollX": true,
"aaSorting": []
});
$('#tableD').DataTable({
"bPaginate": false,
"scrollX": true,
"aaSorting": []
});
$('#tableCan').DataTable({
"bPaginate": false,
"scrollX": true,
"aaSorting": []
});
$('#tablePnd').DataTable({
    "bPaginate": false,
    "scrollX": true,
    "aaSorting": []
});
});
</script>
<script>
$('.btn-funded-conversion').click(function () {
let id = this.dataset.content;
if($(this).hasClass("btn-default")) {
$.post('/makeFundedRequest/'+id, {_token: '{{ csrf_token() }}'});
}else {
$.post('/cancelMakeFundedRequest/'+id, {_token: '{{ csrf_token() }}'});
}
$('button[data-content = "'+id+'"]').toggleClass("btn-success").toggleClass("btn-default");
});
</script>
<script>
var url = document.location.toString();
if (url.match('#')) {
$('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
}

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
window.location.hash = e.target.hash;
});
</script>
</body>
