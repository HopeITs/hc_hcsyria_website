<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    if (session('locale') == 'fr') {
        $language = 'french';
    } else {
        $language = 'english';
    }
@endphp
<head>

    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="judy dadaghlian">
    <title>Micro Projects</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    @stack('navbar_styles')
    <style>
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
            color: #428bca;
            border-top: 2px solid #428bca;
        }
        @media screen and (max-width: 768px) {
            .nav-tabs > li {
                width: 33.33%;
                text-align: center;
            }
        }
         .nav-tabs {
             padding-top: 30px;
         }
        .table-responsive {
            padding-top: 15px
        }
    </style>
</head>
<body>

@stack('navbar_body')

<div style="padding-top: 30px;">
    <div class="container">
       @include('admin.messages')
    </div>

    <div class="container">
        <ul class="nav nav-tabs" style="position:static;">
            <li class="active"><a href="#all"  data-toggle="tab">All</a></li>
            <li><a href="#aleppo"  data-toggle="tab">Aleppo</a></li>
            <li><a href="#homs"  data-toggle="tab">Homs</a></li>
            <li><a href="#damascus"  data-toggle="tab">Damascus</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableAll"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beneficiary</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Statue</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Donor</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Video</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projectsAll as $project)
                                    <tr>
                                        <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                                        <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                                        <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>
                                        <td class="text-center">
                                            @if($project['MPE_City'] == '') N/A
                                            @else
                                                {{$project->place->name}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($project['MPE_Done'] == '0') Awaiting for Fund
                                            @elseif($project['MPE_Done'] == '1') Funded
                                            @elseif($project['MPE_Done'] == '2') Canceled
                                            @else N/A @endif
                                        </td>
                                        <td class="text-center">
                                            @if($project['MPE_Donor'] == '') N/A
                                            @else
                                                {{$project->donor->name}}
                                            @endif
                                        </td>
                                        <td class="text-center">{{$project['Mobile']}}</td>
                                        {{--<td class="text-center">{!! strlen($project['MPE_Location']) == 19 ? '<i class="fa fa-map-marker"></i>' : ($project['MPE_Location'] == '0' ? 'N/A' : $project['MPE_Location']) !!}</td>--}}
                                        {{--<td class="text-center">{!! $project['MPE_Video'] == '0' ? 'N/A' : '<i class="fa fa-video-camera"></i>' !!}</td>--}}
                                        <td class="text-center">
                                            @if($project['MPE_Location'] != '0')
                                                <a  href="https://www.google.com/maps/search/?api=1&query={{$project['MPE_Location']}}"
                                                    class="btn btn-danger icon-btn " target="_blank">
                                                    <i class="fa fa-map-marker" ></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($project['MPE_Video'] != '0')
                                                <a  href="#" class="btn btn-primary icon-btn " >
                                                    <i class="fa fa-video-camera"></i>
                                                </a>
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
            <div class="tab-pane fade" id="aleppo">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableA"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beneficiary</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Statue</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Donor</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Video</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projectsAleppo as $project)
                                    <tr>
                                        <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                                        <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                                        <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>
                                        <td class="text-center">
                                            @if($project['MPE_Done'] == '0') Awaiting for Fund
                                            @elseif($project['MPE_Done'] == '1') Funded
                                            @elseif($project['MPE_Done'] == '2') Canceled
                                            @else N/A @endif
                                        </td>
                                        <td class="text-center">
                                            @if($project['MPE_Donor'] == '') N/A
                                            @else
                                                {{$project->donor->name}}
                                            @endif
                                        </td>
                                        <td class="text-center">{{$project['Mobile']}}</td>
                                        {{--<td class="text-center">{!! strlen($project['MPE_Location']) == 19 ? '<i class="fa fa-map-marker"></i>' : ($project['MPE_Location'] == '0' ? 'N/A' : $project['MPE_Location']) !!}</td>--}}
                                        {{--<td class="text-center">{!! $project['MPE_Video'] == '0' ? 'N/A' : '<i class="fa fa-video-camera"></i>' !!}</td>--}}

                                        <td class="text-center">
                                            @if($project['MPE_Location'] != '0')
                                                <a  href="https://www.google.com/maps/search/?api=1&query={{$project['MPE_Location']}}"
                                                    class="btn btn-danger icon-btn " target="_blank">
                                                    <i class="fa fa-map-marker" ></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($project['MPE_Video'] != '0')
                                                <a  href="#" class="btn btn-primary icon-btn " >
                                                    <i class="fa fa-video-camera"></i>
                                                </a>
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
            <div class="tab-pane fade" id="homs">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableH"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beneficiary</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Statue</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Donor</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Video</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projectsHoms as $project)
                                    <tr>
                                        <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                                        <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                                        <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>
                                        <td class="text-center">
                                            @if($project['MPE_Done'] == '0') Awaiting for Fund
                                            @elseif($project['MPE_Done'] == '1') Funded
                                            @elseif($project['MPE_Done'] == '2') Canceled
                                            @else N/A @endif
                                        </td>
                                        <td class="text-center">
                                            @if($project['MPE_Donor'] == '') N/A
                                            @else
                                                {{$project->donor->name}}
                                            @endif
                                        </td>
                                        <td class="text-center">{{$project['Mobile']}}</td>
                                        {{--<td class="text-center">{!! strlen($project['MPE_Location']) == 19 ? '<i class="fa fa-map-marker"></i>' : ($project['MPE_Location'] == '0' ? 'N/A' : $project['MPE_Location']) !!}</td>--}}
                                        {{--<td class="text-center">{!! $project['MPE_Video'] == '0' ? 'N/A' : '<i class="fa fa-video-camera"></i>' !!}</td>--}}

                                        <td class="text-center">
                                            @if($project['MPE_Location'] != '0')
                                                <a  href="https://www.google.com/maps/search/?api=1&query={{$project['MPE_Location']}}"
                                                    class="btn btn-danger icon-btn " target="_blank">
                                                    <i class="fa fa-map-marker" ></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($project['MPE_Video'] != '0')
                                                <a  href="#" class="btn btn-primary icon-btn " >
                                                    <i class="fa fa-video-camera"></i>
                                                </a>
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
            <div class="tab-pane fade" id="damascus">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableD"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beneficiary</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Statue</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Donor</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Video</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projectsDamascus as $project)
                                    <tr>
                                        <th scope="row" class="text-center">{{$project['MicroProject_ID']}}</th>
                                        <td class="text-center">{{$project['english']['MPE_Name']}}</td>
                                        <td class="text-center">{{$project['MPE_BeneficiaryName']}}</td>
                                        <td class="text-center">
                                            @if($project['MPE_Done'] == '0') Awaiting for Fund
                                            @elseif($project['MPE_Done'] == '1') Funded
                                            @elseif($project['MPE_Done'] == '2') Canceled
                                            @else N/A @endif
                                        </td>
                                        <td class="text-center">
                                            @if($project['MPE_Donor'] == '') N/A
                                            @else
                                                {{$project->donor->name}}
                                            @endif
                                        </td>
                                        <td class="text-center">{{$project['Mobile']}}</td>
                                        {{--<td class="text-center">{!! strlen($project['MPE_Location']) == 19 ? '<i class="fa fa-map-marker"></i>' : ($project['MPE_Location'] == '0' ? 'N/A' : $project['MPE_Location']) !!}</td>--}}
                                        {{--<td class="text-center">{!! $project['MPE_Video'] == '0' ? 'N/A' : '<i class="fa fa-video-camera"></i>' !!}</td>--}}

                                        <td class="text-center">
                                            @if($project['MPE_Location'] != '0')
                                                <a  href="https://www.google.com/maps/search/?api=1&query={{$project['MPE_Location']}}"
                                                    class="btn btn-danger icon-btn " target="_blank">
                                                    <i class="fa fa-map-marker" ></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($project['MPE_Video'] != '0')
                                                <a  href="#" class="btn btn-primary icon-btn " >
                                                    <i class="fa fa-video-camera"></i>
                                                </a>
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
</div>


@stack('navbar_scripts')
{{--<script type="text/javascript" src="/js/jquery.js"></script>--}}
{{--<script type="text/javascript" src="/js/bootstrap.min.js"></script>--}}
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
            "bPaginate": false
        });
        $('#tableA').DataTable({
            "bPaginate": false
        });
        $('#tableH').DataTable({
            "bPaginate": false
        });
        $('#tableD').DataTable({
            "bPaginate": false
        });
    });
</script>
<script>
    $('.nav-tabs a[href="#aleppo"]').tab('show');
</script>
@stack('navbar-scripts')

