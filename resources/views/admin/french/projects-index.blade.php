<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'french' ?>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | French Index</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus {
            color: #428bca;
            border-top: 2px solid #428bca;
        }

        .nav-tabs {
            top: 50px;
        }

        @media screen and (max-width: 768px) {
            .nav-tabs > li {
                width: 33.33%;
                text-align: center;
            }
        }

        .table-responsive {
            padding-top: 15px;
        }

        th,
        td {
            text-align: center;
        }

        .alert {
            margin-top: 40px;
            margin-bottom: 0;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<section>
    <div class="container">
        @include('admin.messages')
    </div>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#not-translated" data-toggle="tab">Need Translation</a></li>
            <li><a href="#translated-projects" data-toggle="tab">Translated Projects</a></li>
            <li><a href="#translated-initiatives" data-toggle="tab">Translated Initiatives</a></li>
            <li><a href="#translated-testimonies" data-toggle="tab">Translated Testimonies</a></li>
            <li><a href="#translated-successes" data-toggle="tab">Translated Successes</a></li>
            <li><a href="#translated-news" data-toggle="tab">Translated News</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="not-translated">
                <div class="media">
                    <div class="media-body">
                        @if(count($projectsNT) || count($initiativesNT) || count($testimoniesNT) || count($successesNT) || count($newsNT))
                            @if(count($projectsNT))
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="5" style="font-size: 18px;">Micro Projects</th>
                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <th>Project Name</th>
                                            <th>Beneficiary Name</th>
                                            <th>City</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        @foreach($projectsNT as $project)
                                            <tbody>
                                            <tr>
                                                <td>{{$project['MicroProject_ID']}}</td>
                                                <td>{{$project['english']['MPE_Name']}}</td>
                                                <td>{{$project['MPE_BeneficiaryName']}}</td>
                                                <td class="text-center">
                                                    @if($project['MPE_City'] == '') N/A
                                                    @else
                                                        {{$project->place->name}}
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{route('french.translate.project', $project['id'])}}"
                                                       class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Translate</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                            @if(count($initiativesNT))
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="4" style="font-size: 18px;">Initiatives</th>
                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        @foreach($initiativesNT as $initiative)
                                            <tbody>
                                            <tr>
                                                <td>{{$initiative['id']}}</td>
                                                <td>{{$initiative['english']['title']}}</td>
                                                <td>{{$initiative['whatCategory']['name']}}</td>
                                                <td class="text-right">
                                                    <a href="{{route('initiatives.french.create', $initiative['id'])}}"
                                                       class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Translate</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                            @if(count($testimoniesNT))
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="4" style="font-size: 18px;">Testimonies</th>
                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <th>Project Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        @foreach($testimoniesNT as $testimony)
                                            <tbody>
                                            <tr>
                                                <td>{{$testimony['id']}}</td>
                                                <td>{{$testimony['initiativeEnglish']['title']}}</td>
                                                <td class="text-right">
                                                    <a href="{{route('initiatives.testimonies.french.create', $testimony['id'])}}"
                                                       class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Translate</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                            @if(count($successesNT))
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="4" style="font-size: 18px;">Successes</th>
                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        @foreach($successesNT as $success)
                                            <tbody>
                                            <tr>
                                                <td>{{$success['id']}}</td>
                                                <td>{{$success['english']['title']}}</td>
                                                <td class="text-right">
                                                    <a href="{{route('successes.french.create', $success['id'])}}"
                                                       class="btn btn-primary edit-btn"><span
                                                            class="fa fa-edit"></span>&nbsp;Translate</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                            @if(count($newsNT))
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="4" style="font-size: 18px;">News</th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Edition</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            @foreach($newsNT as $news)
                                                <tbody>
                                                <tr>
                                                    <td>{{$news['id']}}</td>
                                                    <td>{{$news['english']['title']}}</td>
                                                    <td>{{$news['english']['edition']}}</td>
                                                    <td>{{$news['whatCategory']['name']}}</td>
                                                    <td class="text-right">
                                                        <a href="{{route('news.french.create', $news['id'])}}"
                                                           class="btn btn-primary edit-btn"><span
                                                                class="fa fa-edit"></span>&nbsp;Translate</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                @endif
                        @else
                            <div class="text-center">
                                <h4 style="padding-top: 20px">There is nothing to be translated</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="translated-projects">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableP"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beneficiary</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City</th>
                                    <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projectsT as $project)
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
                                        <td class="text-right">
                                            <a href="{{route('admin_french_project', $project['id'])}}"
                                               class="btn btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                            <a href="{{route('edit.french.project', $project['id'])}}"
                                               class="btn btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="translated-initiatives">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableI"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;title</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type</th>
                                    <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($initiativesT as $initiative)
                                    <tr>
                                        <th scope="row" class="text-center">{{$initiative['id']}}</th>
                                        <td class="text-center">{{$initiative['english']['title']}}</td>
                                        <td class="text-center">{{$initiative['whatCategory']['name']}}</td>
                                        <td class="text-right">
                                            <a href="{{route('initiatives.french.show', $initiative['id'])}}"
                                               class="btn btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                            <a href="{{route('initiatives.french.edit', $initiative['id'])}}"
                                               class="btn btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="translated-testimonies">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableT"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project Name</th>
                                    <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($testimoniesT as $testimony)
                                    <tr>
                                        <th scope="row" class="text-center">{{$testimony['id']}}</th>
                                        <td class="text-center">{{$testimony['english']['name']}}</td>
                                        <td class="text-right">
                                            <a href="{{route('initiatives.testimonies.french.show', $testimony['id'])}}"
                                               class="btn btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                            <a href="{{route('initiatives.testimonies.french.edit', $testimony['id'])}}"
                                               class="btn btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="translated-successes">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableS"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Success Title</th>
                                    <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($successesT as $success)
                                    <tr>
                                        <th scope="row" class="text-center">{{$success['id']}}</th>
                                        <td class="text-center">{{$success['english']['title']}}</td>
                                        <td class="text-right">
                                            <a href="{{route('successes.french.show', $success['id'])}}"
                                               class="btn btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                            <a href="{{route('successes.french.edit', $success['id'])}}"
                                               class="btn btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="translated-news">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableN"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Title</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edition</th>
                                    <th scope="col" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category</th>
                                    <th scope="col" class="text-center" style="min-width: 110px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($newsT as $news)
                                    <tr>
                                        <th scope="row" class="text-center">{{$news['id']}}</th>
                                        <td class="text-center">{{$news['english']['title']}}</td>
                                        <td class="text-center">{{$news['english']['edition']}}</td>
                                        <td class="text-center">{{$news['whatCategory']['name']}}</td>
                                        <td class="text-right">
                                            <a href="{{route('news.french.show', $news['id'])}}"
                                               class="btn btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                            <a href="{{route('news.french.edit', $news['id'])}}"
                                               class="btn btn-primary edit-btn"><span
                                                    class="fa fa-edit"></span>&nbsp;Edit</a>
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
        $('#tableP').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableI').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableT').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableS').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableN').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
    });
</script>
