<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'news-index' ?>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="jean khechfe">
    <title>Admin | NEWS</title>
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
</head><!--/head-->
<body>

@stack('navbar_body')

<section style="padding-top: 30px">
    <div class="container">
       @include('admin.messages')
    </div>
    <div class="container">
        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
            <a class="btn btn-success" href="{{route('news.create')}}">
                <i class="fa fa-plus-square"></i>&nbsp; Create new News</a>
        @endif

            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                <a class="btn btn-success" href="{{route('news.edition')}}">
                    <i class="fa fa-plus-square"></i>&nbsp; Editions</a>
            @endif



        <ul class="nav nav-tabs">
            <li class="active"><a href="#Articles" data-toggle="tab">Articles</a></li>
            <li><a href="#products" data-toggle="tab">Products</a></li>
            <li><a href="#ShortParagraphs" data-toggle="tab">ShortParagraphs</a></li>
            <li><a href="#Videos" data-toggle="tab">Videos</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="Articles">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableHope" style="width: 100%">
                                @if($newsArticles)
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Edition</th>
                                            <th>Category</th>
                                            <th>Place</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($newsArticles as $news)
                                        <tbody>
                                        <tr>
                                            <td>{{$news['id']}}</td>
                                            <td>{{$news['english']['title']}}</td>
                                            <td>{{$news['edition']['name']}}</td>
                                            <td>{{$news['whatCategory']['name']}}</td>
                                            <td>{{$news['place']['name']}}</td>

                                            <td class="text-right">
                                                <a href="{{route('news.show', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('news.edit', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                    <a href="{{route('news.images.create', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('news.destroy', $news['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$news['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                                {!! Form::open(['route' => 'news.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                {{Form::hidden('id', $news['id'])}}
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
            <div class="tab-pane" id="products">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableProduct" style="width: 100%">
                                @if($newsProducts)
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Edition</th>
                                        <th>Category</th>
                                        <th>Place</th>
                                        <th>Project ID</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($newsProducts as $news)
                                        <tbody>
                                        <tr>
                                            <td>{{$news['id']}}</td>
                                            <td>{{$news['english']['title']}}</td>
                                            <td>{{$news['edition']['name']}}</td>
                                            <td>{{$news['whatCategory']['name']}}</td>
                                            <td>{{$news['place']['name']}}</td>
                                            <td>{{$news['project_id']}}</td>

                                            <td class="text-right">
                                                <a href="{{route('news.show', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('news.edit', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                    <a href="{{route('news.images.create', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('news.destroy', $news['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$news['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                                {!! Form::open(['route' => 'news.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                {{Form::hidden('id', $news['id'])}}
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
            <div class="tab-pane" id="ShortParagraphs">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableReport" style="width: 100%">
                                @if($newsShortParagraphs)
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Edition</th>
                                        <th>Category</th>
                                        <th>Place</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($newsShortParagraphs as $news)
                                        <tbody>
                                        <tr>
                                            <td>{{$news['id']}}</td>
                                            <td>{{$news['english']['title']}}</td>
                                            <td>{{$news['edition']['name']}}</td>
                                            <td>{{$news['whatCategory']['name']}}</td>
                                            <td>{{$news['place']['name']}}</td>

                                            <td class="text-right">
                                                <a href="{{route('news.show', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('news.edit', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                    <a href="{{route('news.images.create', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('news.destroy', $news['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$news['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                                {!! Form::open(['route' => 'news.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                {{Form::hidden('id', $news['id'])}}
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
            <div class="tab-pane" id="Videos">
                <div class="media">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tableReport" style="width: 100%">
                                @if($newsVideos)
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Edition</th>
                                        <th>Category</th>
                                        <th>Place</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($newsVideos as $news)
                                        <tbody>
                                        <tr>
                                            <td>{{$news['id']}}</td>
                                            <td>{{$news['english']['title']}}</td>
                                            <td>{{$news['edition']['name']}}</td>
                                            <td>{{$news['whatCategory']['name']}}</td>
                                            <td>{{$news['place']['name']}}</td>

                                            <td class="text-right">
                                                <a href="{{route('news.show', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-eye"></span>&nbsp;View</a>
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                <a href="{{route('news.edit', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                                    <a href="{{route('news.images.create', $news['id'])}}" class="btn btn-primary edit-btn"><span
                                                            class="fa fa-plus-square"></span> <span class="fa fa-minus-square"></span>&nbsp;Images</a>
                                                @endif
                                                @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('news.destroy', $news['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete({{$news['id']}})"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                                {!! Form::open(['route' => 'news.offline' , 'method' => 'POST', 'style' => 'float:right;', 'enctype' => 'multipart/form-data']) !!}
                                                {{Form::hidden('id', $news['id'])}}
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

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tableHope').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableSuccess').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableProduct').DataTable({
            "bPaginate": false,
            "aaSorting": []
        });
        $('#tableReport').DataTable({
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
