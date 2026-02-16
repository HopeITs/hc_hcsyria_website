<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'successes-index' ?>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Successes</title>
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
</head>
<body>

@stack('navbar_body')

<section style="padding-top: 30px">
    <div class="container">
        @include('admin.messages')
    </div>
    <div class="container">
        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
            <a class="btn btn-success" href="{{route('successes.create')}}"><i
                        class="fa fa-plus-square"></i>&nbsp; Create new Success</a>
        @endif
        <ul class="nav nav-tabs">
            <li class="active"><a href="#disc" data-toggle="tab">DISC <small>({{ $sucdisc->count() }})</small></a></li>
            <li><a href="#study" data-toggle="tab">Study Zone <small>({{ $sucstudy->count() }})</small></a></li>

            <li><a href="#pending" data-toggle="tab">Pending <small>({{ $sucpending->count() }})</small></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="disc">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableDisc" style="width: 100%">
                                @if($sucdisc)
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Place</th>
                                        <th>Center</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($sucdisc as $success)
                                        <tbody>
                                        <tr>
                                            <td>{{$success['id']}}</td>
                                            <td>@if($success['sub_what_category_id'] == 0) N/A @else {{$success['subWhatCategory']['name']}} @endif</td>
                                            <td>{{$success['english']['title']}}</td>
                                            <td>{{$success['place']['name']}}</td>
                                            <td>@if($success['sz_center_id'] == 0) N/A @else {{$success['center']['name']}} @endif</td>

                                            <td class="text-right">
                                                <a href="{{route('successes.show', $success['id'])}}" class="btn btn-primary edit-btn">
                                                    <span class="fa fa-eye"></span>&nbsp;View</a>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('successes.edit', $success['id'])}}" class="btn btn-primary edit-btn">
                                                    <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('successes.destroy', $success['id']) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return ConfirmDelete({{$success['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                                {!! Form::open(['route' => 'successes.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                {{Form::hidden('id', $success['id'])}}
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
                            <table class="table table-striped table-bordered table-hover" id="tableStudy" style="width: 100%">
                                @if($sucstudy)
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Place</th>
                                        <th>Center</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($sucstudy as $success)
                                        <tbody>
                                        <tr>
                                            <td>{{$success['id']}}</td>
                                            <td>@if($success['sub_what_category_id'] == 0) N/A @else {{$success['subWhatCategory']['name']}} @endif</td>
                                            <td>{{$success['english']['title']}}</td>
                                            <td>{{$success['place']['name']}}</td>
                                            <td>@if($success['sz_center_id'] == 0) N/A @else {{$success['center']['name']}} @endif</td>

                                            <td class="text-right">
                                            <a href="{{route('successes.show', $success['id'])}}" class="btn btn-primary edit-btn">
                                                <span class="fa fa-eye"></span>&nbsp;View</a>
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('successes.edit', $success['id'])}}" class="btn btn-primary edit-btn">
                                                <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('successes.destroy', $success['id']) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return ConfirmDelete({{$success['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                            </form>
                                            {!! Form::open(['route' => 'successes.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                            {{Form::hidden('id', $success['id'])}}
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

            <div class="tab-pane fade" id="pending">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tablePending"
                                   style="width: 100%">
                                @if($sucpending)
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Project</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Place</th>
                                        <th>Center</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($sucpending as $success)
                                        <tbody>
                                            <tr>
                                            <td>{{$success['id']}}</td>
                                            <td>{{$success['whatCategory']['name']}}</td>
                                            <td>@if($success['sub_what_category_id'] == 0) N/A @else {{$success['subWhatCategory']['name']}} @endif</td>
                                            <td>{{$success['english']['title']}}</td>
                                            <td>{{$success['place']['name']}}</td>
                                            <td>@if($success['sz_center_id'] == 0) N/A @else {{$success['center']['name']}} @endif</td>

                                            <td class="text-right">
                                            <a href="{{route('successes.show', $success['id'])}}" class="btn btn-primary edit-btn">
                                            <span class="fa fa-eye"></span>&nbsp;View</a>
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('successes.edit', $success['id'])}}" class="btn btn-primary edit-btn">
                                            <span class="fa fa-edit"></span>&nbsp;Edit</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('successes.destroy', $success['id']) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return ConfirmDelete({{$success['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                            </form>
                                            {!! Form::open(['route' => 'successes.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                            {{Form::hidden('id', $success['id'])}}
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
        $('#tableDisc').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableStudy').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tablePending').DataTable({
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
</body>








{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
    {{--<?php $page = 'successes-index' ?>--}}
    {{--@include('admin.navbar')--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    {{--<meta name="author" content="judy dadaghlian">--}}
    {{--<title>Admin | Successes</title>--}}
    {{--<link href="/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link href="/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="/css/backend.css" rel="stylesheet">--}}
    {{--@stack('navbar_styles')--}}
    {{--<link rel="shortcut icon" href="/images/ico/favicon.ico">--}}
    {{--<style>--}}
        {{--.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {--}}
            {{--color: #428bca;--}}
            {{--border-top: 2px solid #428bca;--}}
        {{--}--}}
        {{--.nav-tabs {--}}
            {{--top: 100px;--}}
        {{--}--}}
        {{--.table-responsive {--}}
            {{--padding-top: 15px;--}}
        {{--}--}}
        {{--th,--}}
        {{--td {--}}
            {{--text-align: center;--}}
        {{--}--}}
        {{--form {--}}
            {{--float: right;--}}
            {{--margin-left: 4px--}}
        {{--}--}}
    {{--</style>--}}
{{--</head>--}}
{{--<body>--}}

{{--@stack('navbar_body')--}}

{{--<section style="padding-top: 30px">--}}
    {{--<div class="container">--}}
       {{--@include('admin.messages')--}}
    {{--</div>--}}
    {{--<div class="container">--}}
        {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
            {{--<a class="btn btn-success" href="{{route('successes.create')}}"><i--}}
                    {{--class="fa fa-plus-square"></i>&nbsp; Create new Success</a>--}}
        {{--@endif--}}
        {{--<ul class="nav nav-tabs">--}}
            {{--<li class="active"><a href="#disc"    data-toggle="tab">DISC <small>({{ $sucdisc->count() }})</small></a>       </li>--}}
            {{--<li>               <a href="#study"   data-toggle="tab">Study Zone <small>({{ $sucstudy->count() }})</small></a></li>--}}
            {{--<li>               <a href="#pending" data-toggle="tab">Pending <small>({{ $sucpending->count() }})</small></a> </li>--}}
        {{--</ul>--}}
        {{--<div class="tab-content">--}}
            {{--<div class="tab-pane active" id="disc">--}}
                {{--<div class="media">--}}
                    {{--<div class="media-body">--}}
                        {{--<div class="table-responsive">--}}
                            {{--<table class="table table-striped table-bordered table-hover" id="tableDisc" style="width: 100%">--}}
                                {{--@if($sucdisc)--}}
                                    {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th>ID</th>--}}
                                            {{--<th>Category</th>--}}
                                            {{--<th>Title</th>--}}
                                            {{--<th>Place</th>--}}
                                            {{--<th>Center</th>--}}
                                            {{--<th>Action</th>--}}
                                        {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--@foreach($sucdisc as $success)--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$success['id']}}</td>--}}
                                            {{--<td>@if($success['sub_what_category_id'] == 0) N/A @else {{$success['subWhatCategory']['name']}} @endif</td>--}}
                                            {{--<td>{{$success['english']['title']}}</td>--}}
                                            {{--<td>{{$success['place']['name']}}</td>--}}
                                            {{--<td>@if($success['sz_center_id'] == 0) N/A @else {{$success['center']['name']}} @endif</td>--}}

                                            {{--<td class="text-right">--}}
                                                {{--<a href="{{route('successes.show', $success['id'])}}" class="btn btn-primary edit-btn"><span--}}
                                                        {{--class="fa fa-eye"></span>&nbsp;View</a>--}}
                                                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                                                {{--<a href="{{route('successes.edit', $success['id'])}}" class="btn btn-primary edit-btn"><span--}}
                                                        {{--class="fa fa-edit"></span>&nbsp;Edit</a>--}}
                                                {{--@endif--}}
                                                {{--@if($user->roles->contains('name', 'Admin'))--}}
                                                {{--<form action="{{ route('successes.destroy', $success['id']) }}" method="POST">--}}
                                                    {{--@method('DELETE')--}}
                                                    {{--@csrf--}}
                                                    {{--<button class="btn btn-danger" onclick="return ConfirmDelete({{$success['id']}})"><i class="fa fa-trash-o"></i> Delete</button>--}}
                                                {{--</form>--}}
                                                {{--{!! Form::open(['route' => 'successes.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}--}}
                                                {{--{{Form::hidden('id', $success['id'])}}--}}
                                                {{--{{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}--}}
                                                {{--{!! Form::close() !!}--}}
                                                {{--@endif--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="tab-pane" id="study">--}}
                {{--<div class="media">--}}
                    {{--<div class="media-body">--}}
                        {{--<div class="table-responsive">--}}
                            {{--<table class="table table-striped table-bordered table-hover" id="tableStudy" style="width: 100%">--}}
                                {{--@if($sucstudy)--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>ID</th>--}}
                                        {{--<th>Category</th>--}}
                                        {{--<th>Title</th>--}}
                                        {{--<th>Place</th>--}}
                                        {{--<th>Center</th>--}}
                                        {{--<th>Action</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--@foreach($sucstudy as $success)--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$success['id']}}</td>--}}
                                            {{--<td>@if($success['sub_what_category_id'] == 0) N/A @else {{$success['subWhatCategory']['name']}} @endif</td>--}}
                                            {{--<td>{{$success['english']['title']}}</td>--}}
                                            {{--<td>{{$success['place']['name']}}</td>--}}
                                            {{--<td>@if($success['sz_center_id'] == 0) N/A @else {{$success['center']['name']}} @endif</td>--}}

                                            {{--<td class="text-right">--}}
                                                {{--<a href="{{route('successes.show', $success['id'])}}" class="btn btn-primary edit-btn"><span--}}
                                                        {{--class="fa fa-eye"></span>&nbsp;View</a>--}}
                                                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                                                {{--<a href="{{route('successes.edit', $success['id'])}}" class="btn btn-primary edit-btn"><span--}}
                                                        {{--class="fa fa-edit"></span>&nbsp;Edit</a>--}}
                                                {{--@endif--}}
                                                {{--@if($user->roles->contains('name', 'Admin'))--}}
                                                {{--<form action="{{ route('successes.destroy', $success['id']) }}" method="POST">--}}
                                                    {{--@method('DELETE')--}}
                                                    {{--@csrf--}}
                                                    {{--<button class="btn btn-danger" onclick="return ConfirmDelete({{$success['id']}})"><i class="fa fa-trash-o"></i> Delete</button>--}}
                                                {{--</form>--}}
                                                {{--{!! Form::open(['route' => 'successes.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}--}}
                                                {{--{{Form::hidden('id', $success['id'])}}--}}
                                                {{--{{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}--}}
                                                {{--{!! Form::close() !!}--}}
                                                {{--@endif--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="tab-pane" id="pending">--}}
                {{--<div class="media">--}}
                    {{--<div class="media-body">--}}
                        {{--<div class="table-responsive">--}}
                            {{--<table class="table table-striped table-bordered table-hover" id="tablePending" style="width: 100%">--}}
                                {{--@if($sucpending)--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>ID</th>--}}
                                        {{--<th>Project</th>--}}
                                        {{--<th>Category</th>--}}
                                        {{--<th>Title</th>--}}
                                        {{--<th>Place</th>--}}
                                        {{--<th>Center</th>--}}
                                        {{--<th>Action</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--@foreach($sucpending as $success)--}}
                                    {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$success['id']}}</td>--}}
                                            {{--<td>{{$success['whatCategory']['name']}}</td>--}}
                                            {{--<td>@if($success['sub_what_category_id'] == 0) N/A @else {{$success['subWhatCategory']['name']}} @endif</td>--}}
                                            {{--<td>{{$success['english']['title']}}</td>--}}
                                            {{--<td>{{$success['place']['name']}}</td>--}}
                                            {{--<td>@if($success['sz_center_id'] == 0) N/A @else {{$success['center']['name']}} @endif</td>--}}

                                            {{--<td class="text-right">--}}
                                                {{--<a href="{{route('successes.show', $success['id'])}}" class="btn btn-primary edit-btn">--}}
                                                    {{--<span class="fa fa-eye"></span>&nbsp;View</a>--}}
                                                {{--@if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
                                                {{--<a href="{{route('successes.edit', $success['id'])}}" class="btn btn-primary edit-btn">--}}
                                                    {{--<span class="fa fa-edit"></span>&nbsp;Edit</a>--}}
                                                {{--@endif--}}
                                                {{--@if($user->roles->contains('name', 'Admin'))--}}
                                                {{--<form action="{{ route('successes.destroy', $success['id']) }}" method="POST">--}}
                                                {{--@method('DELETE')--}}
                                                {{--@csrf--}}
                                                {{--<button class="btn btn-danger" onclick="return ConfirmDelete({{$success['id']}})"><i class="fa fa-trash-o"></i> Delete</button>--}}
                                                {{--</form>--}}
                                                {{--{!! Form::open(['route' => 'successes.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}--}}
                                                {{--{{Form::hidden('id', $success['id'])}}--}}
                                                {{--{{Form::button('<i class="fa fa-ban"></i> Offline', ['type' => 'submit', 'class' => 'btn btn-primary'])}}--}}
                                                {{--{!! Form::close() !!}--}}
                                                {{--@endif--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--</tbody>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

{{--@stack('navbar_scripts')--}}
{{--<script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>--}}
{{--<script type="text/javascript" src="/js/dataTables.bootstrap.min.js"></script>--}}
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('#tableDisc').DataTable({--}}
            {{--"bPaginate": false,--}}
            {{--"aaSorting": [],--}}
            {{--"sType": "string"--}}
        {{--});--}}
        {{--$('#tableStudy').DataTable({--}}
            {{--"bPaginate": false,--}}
            {{--"aaSorting": [],--}}
            {{--"sType": "string"--}}
        {{--});--}}
        {{--$('#tablePending').DataTable({--}}
            {{--"bPaginate": false,--}}
            {{--"aaSorting": [],--}}
            {{--"sType": "string"--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
{{--<script>--}}
    {{--function ConfirmDelete(e) {--}}
        {{--if (confirm("Do you really want to: \nDelete " + e + " ?"))--}}
            {{--return true;--}}
        {{--else--}}
            {{--return false;--}}
    {{--}--}}
{{--</script>--}}
{{--</body>--}}
