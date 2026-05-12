<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'news-index' ?>
    <script src="/js/jquery.js"></script>

    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="author" content="mai youssef">
    <title>Admin | News</title>
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
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/js/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
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
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                    <a class="btn btn-success" href="{{route('news.create')}}">
                        <i class="fa fa-plus-square"></i>&nbsp; Create new News</a>

                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTagModal">
                        <i class="fa fa-tags"></i>&nbsp; Add New Tag
                    </button>
                @endif
{{--                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))--}}
{{--                    <a class="btn btn-success" href="{{route('news.edition')}}">--}}
{{--                        <i class="fa fa-plus-square"></i>&nbsp; Editions</a>--}}
{{--                @endif--}}
            </div>
        </div>
        <div>
            <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative mt-5" id="tabList"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="ArticleTab"
                            class="ArticleTab nav-link {{ !request('tab') || request('tab') == 'Article' ? 'active' : '' }}"
                            data-bs-toggle="tab"
                            data-bs-target="#Article"
                            role="tab" aria-controls="Articles"
                            aria-selected="{{ !request('tab') || request('tab') == 'Article' ? 'true' : 'false' }}">
                        Articles <small>({{ $newsArticles->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="VideoTab" class="VideoTab nav-link" data-bs-toggle="tab" data-bs-target="#Video"
                            role="tab" aria-controls="Video" aria-selected="false">Videos
                        <small>({{ $newsVideos->count() }})</small>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="PendingTab" class="PendingTab nav-link" data-bs-toggle="tab"
                            data-bs-target="#Pending"
                            role="tab" aria-controls=pending" aria-selected="false"
                            aria-selected="false">Pending
                        <small>({{ $newsPending->count() }})</small>
                    </button>
                </li>
                @if($user->roles->contains('name', 'Admin'))
                    <li class="nav-item" role="presentation">
                        <button id="SubscriberTab" class="SubscriberTab nav-link" data-bs-toggle="tab"
                                data-bs-target="#Subscriber"
                                role="tab" aria-controls=Subscriber" aria-selected="false"
                                aria-selected="false">Subscribers
                            <small>({{ $newsSubscribers->count() }})</small>
                        </button>
                    </li>
                @endif
                <li class="nav-item" role="presentation">
                    <button id="TagsTab"
                            class="TagsTab nav-link {{ request('tab') == 'Tags' ? 'active' : '' }}"
                            data-bs-toggle="tab"
                            data-bs-target="#TagsPane"
                            role="tab"
                            aria-controls="TagsPane"
                            aria-selected="{{ request('tab') == 'Tags' ? 'true' : 'false' }}">
                        Tags <small>({{ $allTags->count() }})</small>
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-5">
                <div class="tab-pane fade {{ !request('tab') || request('tab') == 'Article' ? 'show active' : '' }}"
                     id="Article" role="tabpanel" aria-labelledby="ArticleTab" tabindex="0">
                    <table class="table w-100 table-striped table-bordered table-hover" id="tableArticle">
                        @if($newsArticles)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Date</th>
                                <th scope="col" class="text-center">Tags</th>
                                <th scope="col" class="text-center">Place</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newsArticles as $news)
                                <tr>
                                    <td class="text-center">{{$news['id']}}</td>
                                    <td class="text-center">{{ $news['english']['title'] ?? 'No Title' }}</td>
                                    <td class="text-center">{{ isset($news['date']) ? \Carbon\Carbon::parse($news['date'])->format('M d, Y') : 'N/A' }}</td>
                                    <td class="text-center">
                                        @foreach($news->tags as $tag)
                                            <span class="badge" >{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if(isset($news->place->name))
                                            {{ $news->place->name == 'All' ? 'Syria' : $news->place->name }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        @if(count($news->images) != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('news.show', $news['id'])}}"
                                           class="btn mb-2 btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('news.edit', [$news['id'], 'ref' => 'index'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('news.destroy', $news['id']) }}"
                                                  method="POST"
                                                  enctype="multipart/form-data"
                                                  class="float-pad">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$news['id']}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                                <form action="{{ route('news.offline') }}" method="POST" class="float-pad">
                                                    @csrf
                                                    <input type="hidden" name="id" class="float-pad" value="{{ $news['id'] }}">
                                                    <button type="submit" class="btn mb-2 icon-btn btn-danger offline_confirm" data-id="{{ $news['id'] }}">
                                                        <i class="fa fa-power-off"></i>
                                                    </button>
                                                </form>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('news.images.create', $news['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
                <div class="tab-pane show fade" id="Video" role="tabpanel" aria-labelledby="VideoTab"
                     tabindex="0">
                    <table class="table w-100 table-striped table-bordered table-hover" id="tableVideo">
                        @if($newsVideos)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Date</th>
                                <th scope="col" class="text-center">Tags</th>
                                <th scope="col" class="text-center">Place</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newsVideos as $news)
                                <tr>
                                    <td class="text-center">{{$news['id']}}</td>
                                    <td class="text-center">{{ $news['english']['title'] ?? 'No Title' }}</td>
                                    <td class="text-center">{{ isset($news['date']) ? \Carbon\Carbon::parse($news['date'])->format('M d, Y') : 'N/A' }}</td>
                                    <td class="text-center">
                                        @foreach($news->tags as $tag)
                                            <span class="badge">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if(isset($news->place->name))
                                            {{ $news->place->name == 'All' ? 'Syria' : $news->place->name }}
                                        @else
                                            N/A
                                        @endif
                                    </td>                                    <td class="text-end">
                                        <a href="{{route('news.show', $news['id'])}}"
                                           class="btn mb-2 btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('news.edit', [$news['id'], 'ref' => 'index'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('news.destroy', $news['id']) }}"
                                                  method="POST" class="float-pad"
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$news['id']}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('news.offline') }}" method="POST" class="float-pad ">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $news['id'] }}">
                                                <button type="submit" class="btn mb-2 icon-btn btn-danger offline_confirm">
                                                    <i class="fa fa-power-off"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('news.images.create', $news['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
                <div class="tab-pane show fade" id="Pending" role="tabpanel" aria-labelledby="PendingTab"
                     tabindex="0">
                    <table class="table w-100 table-striped table-bordered table-hover" id="tablePnd">
                        @if($newsPending)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Type</th> <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Date</th>
                                <th scope="col" class="text-center">Tags</th>
                                <th scope="col" class="text-center">Place</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newsPending as $news)
                                <tr>
                                    <td class="text-center">{{$news['id']}}</td>

                                    <td class="text-center">
                                        {{ $news->type == '3' ? 'Video' : 'Article' }}
                                    </td>

                                    <td class="text-center">{{ $news['english']['title'] ?? 'No Title' }}</td>
                                    <td class="text-center">{{ isset($news['date']) ? \Carbon\Carbon::parse($news['date'])->format('M d, Y') : 'N/A' }}</td>

                                    <td class="text-center">
                                        @foreach($news->tags as $tag)
                                            <span class="badge">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>

                                    <td>
                                        @if(isset($news->place->name))
                                            {{ $news->place->name == 'All' ? 'Syria' : $news->place->name }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        @if(count($news->images) != 0)
                                            <i class="fa fa-picture-o" style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('news.show', $news['id'])}}" class="btn mb-2 btn-primary">
                                            <span class="fa fa-eye"></span>&nbsp;View
                                        </a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('news.edit', [$news['id'], 'ref' => 'index'])}}" class="btn mb-2 btn-primary edit-btn">
                                                <span class="fa fa-edit"></span>&nbsp;Edit
                                            </a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('news.destroy', $news['id']) }}" method="POST" class="float-pad">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit" data-id="{{$news['id']}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'Photos Editor'))
                                            <a href="{{route('news.images.create', $news['id'])}}" class="btn mb-2 btn-primary edit-btn">
                                                <i class='fa-solid fa-plus-minus'></i> Image
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
                <div class="tab-pane show fade" id="Subscriber" role="tabpanel" aria-labelledby="SubscriberTab"
                     tabindex="0">
                    @if($newsSubscribers)
                        <div class="row">
                            <div class="col">
                                @if(count($newsSubscribers)>0)
                                    <button class="btn btn-success send-email mb-3">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Email
                                    </button>
                                @endif
                            </div>
                        </div>
                        <table class="table w-100 table-striped table-bordered table-hover" id="tableSub">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newsSubscribers as $sub)
                                <tr>
                                    <td><input type="checkbox" class="d-block user-checkbox" name="users[]"
                                               value="{{ $sub['mail'] }}" ></td>
                                    <td class="text-center">{{$sub['id']}}</td>
                                    <td class="text-center">{{$sub['mail']}}</td>
                                    <td class="text-end">
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('news.subscriber.destroy', $sub['id']) }}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$sub['id']}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="tab-pane fade" id="TagsPane" role="tabpanel" aria-labelledby="TagsTab" tabindex="0">
                    <table class="table w-100 table-striped table-bordered table-hover" id="tableTags">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allTags as $tag)
                            <tr>
                                <td class="text-center">{{ $tag->id }}</td>
                                <td class="text-center">
                                    <span class="badge">{{ $tag->name }}</span>
                                </td>
                                <td class="text-end">
                                    <button type="button"
                                            class="btn btn-primary btn-sm edit-tag-btn"
                                            data-id="{{ $tag->id }}"
                                            data-name="{{ $tag->name }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>

                                    <form action="{{ route('tags.destroy', $tag->id) }}" class="d-inline" method="POST"">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm show_confirm" data-id="Tag: {{ $tag->name }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="addTagModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create New Tag</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Tag Name</label>
                                    <input type="text" name="name" class="form-control" required placeholder="Enter tag name">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save Tag</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="editTagModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="editTagForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Tag</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="text-dark">Tag Name</label>
                                    <input type="text" name="name" id="editTagName" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update Tag</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stack('navbar_scripts')

<script>
    $(document).ready(function () {
        tableArticle = new DataTable('#tableArticle', {
// responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableVideo = new DataTable('#tableVideo', {
// responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tablePnd = new DataTable('#tablePnd', {
// responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ]
        });
        tableSub = new DataTable('#tableSub', {
// responsive: true,
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
        });
        tableTags = new DataTable('#tableTags', {
            "scrollX": true,
            buttons: ['excel', 'pdf', 'colvis'],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']]
        });
        tableArticle.buttons().container().appendTo('#tableArticle_wrapper .col-md-6:eq(0)');
        tableVideo.buttons().container().appendTo('#tableVideo_wrapper .col-md-6:eq(0)');
        tablePnd.buttons().container().appendTo('#tablePnd_wrapper .col-md-6:eq(0)');
        tableSub.buttons().container().appendTo('#tableSub_wrapper .col-md-6:eq(0)');
        tableTags.buttons().container().appendTo('#tableTags_wrapper .col-md-6:eq(0)');

        $(document).on('click', '.edit-tag-btn', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            $('#editTagName').val(name);
            $('#editTagForm').attr('action', '/admin/tags/update/' + id);
            $('#editTagModal').modal('show');
        });
    });
</script>
<script>
    $(".selectAll").on("click", function (e) {
        if ($(this).is(":checked")) {
            tableSub.rows().select();
        } else {
            tableSub.rows().deselect();
        }
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.show_confirm', function (event) {
            var form = $(this).closest("form");
            var id = $(this).data("id");
            event.preventDefault();

            swal({
                title: "Are you sure you want to delete " + id + "?",
                text: "This action cannot be undone!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#C92228",
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result) {
                    form.submit();
                }
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal('Cancelled');
                }
            });
        });

        $(document).on('click', '.offline_confirm', function (event) {
            var form = $(this).closest("form");
            var id = $(this).data("id");
            event.preventDefault();

            swal({
                title: "Make News #" + id + " Offline?",
                text: "It will be moved to the Pending tab for review.",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#C92228",
                confirmButtonText: 'Yes, make it offline',
            }).then((result) => {
                if (result) {
                    form.submit();
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        let urlParams = new URLSearchParams(window.location.search);
        let tabParam = urlParams.get("tab");

        if (tabParam) {
            $('.nav-tabs button').removeClass('active').attr('aria-selected', 'false');
            $('.tab-pane').removeClass('show active');

            let tabElement = document.getElementById(tabParam + "Tab");
            let paneId = tabParam === 'Tags' ? 'TagsPane' : tabParam;
            let paneElement = document.getElementById(paneId);

            if (tabElement && paneElement) {
                $(tabElement).addClass('active').attr('aria-selected', 'true');
                $(paneElement).addClass('show active');

                $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust().draw();
            }
        }

        $('.nav-tabs button').on('click', function () {
            let targetTab = $(this).attr('id').replace('Tab', '');
            let currentUrl = new URL(window.location.href);

            currentUrl.searchParams.set("tab", targetTab);

            window.history.pushState({ path: currentUrl.href }, '', currentUrl.href);
        });
    });
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".send-email").click(function () {
        var selectRowsCount = $("input[class='user-checkbox']:checked").length;
        if (selectRowsCount > 0) {
            var ids = $.map($("input[class='user-checkbox']:checked"), function (c) {
                return c.value;
            });
            $.ajax({
                    type: 'POST',
                    url: "{{ route('ajax.send.email') }}",
                    data: {ids: ids},
                    beforeSend: function () {
                        swal('Sending...');
                    },
                    success: function (data) {
                        swal(data.success);
                    },
                }
            );
        } else {
            swal("If you don't select any of the subscribers, email will be send to all subscribers !!");
            swal({
                title: `Email will be send to all subscribers if you don't select specific ones ?`,
                showCancelButton: true,
                confirmButtonText: 'Send',
// dangerMode: true,
            }).then((result) => {
                if (result) {
                    $.ajax({
                            type: 'POST',
                            url: "{{ route('ajax.send.email.all') }}",
                            beforeSend: function () {
                                swal('Sending...');
                            },
                        success: function (data) {
                            swal(data.success);
                            if (data.failed.length > 0) {
                                alert('Failed to send to:\n' + data.failed.join("\n"));
                            }
                        },
                        }
                    );
                }
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                    )
                }
            });
        }
    });
    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    });
</script>
@stack('fancyVideo')
</body>
</html>
{{--<script type="text/javascript">--}}
{{--function sendMail() {--}}
{{--var selectRowsCount = $("input[class='user-checkbox']:checked").length;--}}
{{--if (selectRowsCount > 0) {--}}
{{--var ids = $.map($("input[class='user-checkbox']:checked"), function (c) {--}}
{{--return c.value;--}}
{{--});--}}
{{--var queryString = 'ids={' + ids.join(',') + '}';--}}
{{--// var myJsonString = JSON.stringify(ids);--}}

{{--$.ajax({--}}
{{--type: 'GET',--}}
{{--dataType: 'json',--}}
{{--headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
{{--url:'http://'+location.host+'/users-send-email',--}}
{{--data: queryString,--}}
{{--// contentType: "application/json",--}}
{{--success: function (data) {--}}
{{--alert(data.success);--}}
{{--}--}}
{{--});--}}
{{--} else {--}}
{{--alert("Please select at least one user from list.");--}}
{{--}--}}
{{--console.log(selectRowsCount);--}}
{{--console.log(ids);--}}
{{--}--}}
{{--</script>--}}
{{--@stack('fancyVideo')--}}
{{--</body>--}}
