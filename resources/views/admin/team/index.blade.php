<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'team' ?>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Admin | Our Team</title>
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
            top: 100px;
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
            <a class="btn btn-success" href="{{route('team.create')}}"><i
                    class="fa fa-plus-square"></i>&nbsp; Create new Member</a>
        @endif
        <ul class="nav nav-tabs">
            <li class="active"><a href="#hope" data-toggle="tab">Hope Aleppo</a></li>
            <li><a href="#hope_h" data-toggle="tab">Hope Homs</a></li>
            <li><a href="#hope_d" data-toggle="tab">Hope Damascus</a></li>
            <li><a href="#study" data-toggle="tab">Study Zone</a></li>
            <li><a href="#disc" data-toggle="tab">DISC</a></li>
            <li><a href="#children" data-toggle="tab">Children Uni</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="hope">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableHope"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Position</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank</th>
                                    <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hope as $profile)
                                    <tr>
                                        <th scope="row" class="text-center">{{$profile['id']}}</th>
                                        <td class="text-center">{{$profile['first_name'].' '.$profile['last_name']}}</td>
                                        <td class="text-center">{{$profile['position']}}</td>
                                        <td class="text-center">{{$profile['inactive']}}</td>
                                        <td class="text-center">{{$profile['rank']}}</td>

                                        <td class="text-right">
                                            <a href="{{route('team.show', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('team.edit', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Edit</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('team.destroy', $profile['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$profile['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
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
            <div class="tab-pane fade" id="hope_h">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableHope_h"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Position</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank</th>
                                    <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hope_h as $profile)
                                    <tr>
                                        <th scope="row" class="text-center">{{$profile['id']}}</th>
                                        <td class="text-center">{{$profile['first_name'].' '.$profile['last_name']}}</td>
                                        <td class="text-center">{{$profile['position']}}</td>
                                        <td class="text-center">{{$profile['inactive']}}</td>
                                        <td class="text-center">{{$profile['rank']}}</td>

                                        <td class="text-right">
                                            <a href="{{route('team.show', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('team.edit', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Edit</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('team.destroy', $profile['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$profile['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
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
            <div class="tab-pane fade" id="hope_d">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableHope_d"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Position</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank</th>
                                    <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hope_d as $profile)
                                    <tr>
                                        <th scope="row" class="text-center">{{$profile['id']}}</th>
                                        <td class="text-center">{{$profile['first_name'].' '.$profile['last_name']}}</td>
                                        <td class="text-center">{{$profile['position']}}</td>
                                        <td class="text-center">{{$profile['inactive']}}</td>
                                        <td class="text-center">{{$profile['rank']}}</td>

                                        <td class="text-right">
                                            <a href="{{route('team.show', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('team.edit', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Edit</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('team.destroy', $profile['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$profile['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
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
            <div class="tab-pane fade" id="study">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableStudy"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Position</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank</th>
                                    <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($study as $profile)
                                    <tr>
                                        <th scope="row" class="text-center">{{$profile['id']}}</th>
                                        <td class="text-center">{{$profile['first_name'].' '.$profile['last_name']}}</td>
                                        <td class="text-center">{{$profile['position']}}</td>
                                        <td class="text-center">{{$profile['inactive']}}</td>
                                        <td class="text-center">{{$profile['rank']}}</td>

                                        <td class="text-right">
                                            <a href="{{route('team.show', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('team.edit', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Edit</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('team.destroy', $profile['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$profile['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
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
            <div class="tab-pane fade" id="disc">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableDisc"
                                   style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                        <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                        <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Position</th>
                                        <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                                        <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank</th>
                                        <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($disc as $profile)
                                    <tr>
                                        <th scope="row" class="text-center">{{$profile['id']}}</th>
                                        <td class="text-center">{{$profile['first_name'].' '.$profile['last_name']}}</td>
                                        <td class="text-center">{{$profile['position']}}</td>
                                        <td class="text-center">{{$profile['inactive']}}</td>
                                        <td class="text-center">{{$profile['rank']}}</td>

                                        <td class="text-right">
                                            <a href="{{route('team.show', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                            class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('team.edit', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                            class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('team.destroy', $profile['id']) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                                <button class="btn btn-danger" onclick="return ConfirmDelete({{$profile['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
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

            <div class="tab-pane fade" id="children">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableChildren"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Position</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank</th>
                                    <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($children as $profile)
                                    <tr>
                                        <th scope="row" class="text-center">{{$profile['id']}}</th>
                                        <td class="text-center">{{$profile['first_name'].' '.$profile['last_name']}}</td>
                                        <td class="text-center">{{$profile['position']}}</td>
                                        <td class="text-center">{{$profile['inactive']}}</td>
                                        <td class="text-center">{{$profile['rank']}}</td>

                                        <td class="text-right">
                                            <a href="{{route('team.show', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('team.edit', $profile['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Edit</a>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('team.destroy', $profile['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$profile['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
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
    </div>
</section>

@stack('navbar_scripts')
<script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tableHope').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableHope_h').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableHope_d').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableStudy').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableDisc').DataTable({
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
