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
                @endif
                @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                    <a class="btn btn-success" href="{{route('news.edition')}}">
                        <i class="fa fa-plus-square"></i>&nbsp; Editions</a>
                @endif
            </div>
        </div>
        <div>
            <ul class="nav nav-tabs d-lg-flex d-md-flex d-sm-flex d-block position-relative mt-5" id="tabList"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="ArticleTab" class="ArticleTab nav-link active" data-bs-toggle="tab"
                            data-bs-target="#Article"
                            role="tab" aria-controls="Articles" aria-selected="true">Articles
                        <small>({{ $newsArticles->count() }})</small>
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
            </ul>
            <div class="tab-content mt-5">
                <div class="tab-pane show active fade" id="Article" role="tabpanel" aria-labelledby="ArticleTab"
                     tabindex="0">
                    <table class="table table-striped table-bordered table-hover" id="tableArticle"
                           style="width: 100%">
                        @if($newsArticles)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Edition</th>
                                <th scope="col" class="text-center">Category</th>
                                <th scope="col" class="text-center">Place</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newsArticles as $news)
                                <tr>
                                    <td class="text-center">{{$news['id']}}</td>
                                    <td class="text-center">{{$news['english']['title']}}</td>
                                    <td class="text-center">{{$news['edition']['name']}}</td>
                                    <td class="text-center">{{$news['whatCategory']['name']}}</td>
                                    <td class="text-center">{{$news['place']['name']}}</td>
                                    <td class="text-end">
                                        @if(count($news->images) != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('news.show', $news['id'])}}"
                                           class="btn mb-2 btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('news.edit', $news['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('news.destroy', $news['id']) }}"
                                                  method="POST" style="float: right; padding-left: 10px"
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$news['id']}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                                <form action="{{ route('news.offline') }}"
                                                      method="POST"
                                                      style="float:right; padding-left:10px;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $news['id'] }}">
                                                    <button type="submit" class="btn mb-2 icon-btn btn-danger">
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
                    <table class="table table-striped table-bordered table-hover" id="tableVideo"
                           style="width: 100%">
                        @if($newsVideos)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Edition</th>
                                <th scope="col" class="text-center">Category</th>
                                <th scope="col" class="text-center">Place</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newsVideos as $news)
                                <tr>
                                    <td class="text-center">{{$news['id']}}</td>
                                    <td class="text-center">{{$news['english']['title']}}</td>
                                    <td class="text-center">{{$news['edition']['name']}}</td>
                                    <td class="text-center">{{$news['whatCategory']['name']}}</td>
                                    <td class="text-center">{{$news['place']['name']}}</td>
                                    <td class="text-end">
                                        <a href="{{route('news.show', $news['id'])}}"
                                           class="btn mb-2 btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('news.edit', $news['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('news.destroy', $news['id']) }}"
                                                  method="POST" style="float: right; padding-left: 10px"
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$news['id']}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('news.offline') }}" method="POST" style="float:right; padding-left:10px;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $news['id'] }}">
                                                <button type="submit" class="btn mb-2 icon-btn btn-danger">
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
                    <table class="table table-striped table-bordered table-hover" id="tablePnd"
                           style="width: 100%">
                        @if($newsPending)
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Edition</th>
                                <th scope="col" class="text-center">Category</th>
                                <th scope="col" class="text-center">Place</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newsPending as $news)
                                <tr>
                                    <td class="text-center">{{$news['id']}}</td>
                                    <td class="text-center">{{$news['english']['title']}}</td>
                                    <td class="text-center">{{$news['edition']['name']}}</td>
                                    <td class="text-center">{{$news['whatCategory']['name']}}</td>
                                    <td class="text-center">{{$news['place']['name']}}</td>
                                    <td class="text-end">
                                        @if(count($news->images) != 0)
                                            <i class="fa fa-picture-o"
                                               style="padding: 0.3vw 0.6vw;"></i>
                                        @endif
                                        <a href="{{route('news.show', $news['id'])}}"
                                           class="btn mb-2 btn-primary"><span
                                                    class="fa fa-eye"></span>&nbsp;View</a>
                                        @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                            <a href="{{route('news.edit', $news['id'])}}"
                                               class="btn mb-2 btn-primary edit-btn"><span
                                                        class="fa fa-edit"></span>&nbsp;Edit</a>
                                        @endif
                                        @if($user->roles->contains('name', 'Admin'))
                                            <form action="{{ route('news.destroy', $news['id']) }}"
                                                  method="POST" style="float: right; padding-left: 10px"
                                                  enctype="multipart/form-data">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn mb-2 btn-danger icon-btn show_confirm" type="submit"
                                                        data-id="{{$news['id']}}">
                                                    <i class="fa fa-trash-o"></i>
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
                        <table class="table table-striped table-bordered table-hover" id="tableSub"
                               style="width: 100%">
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
                                    <td><input type="checkbox" class="user-checkbox" name="users[]"
                                               value="{{ $sub['mail'] }}" style="display: block;"></td>
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
        tableArticle.buttons().container().appendTo('#tableArticle_wrapper .col-md-6:eq(0)');
        tableVideo.buttons().container().appendTo('#tableVideo_wrapper .col-md-6:eq(0)');
        tablePnd.buttons().container().appendTo('#tablePnd_wrapper .col-md-6:eq(0)');
        tableSub.buttons().container().appendTo('#tableSub_wrapper .col-md-6:eq(0)');
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
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
// var id = event.target.attributes['id'].nodeValue;
        var id = $(this).data("id");
        event.preventDefault();

        swal({
            title: `Are you sure you want to delete ` + id + `?`,
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
</script>
<script>
    $(document).ready(function () {
        let url1 = window.location.href;
        let url2 = new URL(url1);
        let tab = url2.searchParams.get("tab") + "Tab";
        let t = document.getElementById(tab);
        let tt = new bootstrap.Tab(t);
        tt.show();
    });
</script>
<script>
    $(function () {
        let url1 = window.location.href;
        let newurl = '';
        $('#ArticleTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('Article'))
                        newurl = url1.replace("Article", "Article");
                    else if (url1.includes('Video'))
                        newurl = url1.replace("Video", "Article");
                    else if (url1.includes('Pending'))
                        newurl = url1.replace("Pending", "Article");
                    else if (url1.includes('Subscriber'))
                        newurl = url1.replace("Subscriber", "Article");
                }
            }
            else {
                newurl = url1 + '?tab=Article';
                window.history.pushState({path: newurl}, '', newurl)
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#VideoTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('Article'))
                        newurl = url1.replace("Article", "Video");
                    else if (url1.includes('Video'))
                        newurl = url1.replace("Video", "Video");
                    else if (url1.includes('Pending'))
                        newurl = url1.replace("Pending", "Video");
                    else if (url1.includes('Subscriber'))
                        newurl = url1.replace("Subscriber", "Video");
                }
            }
            else {
                newurl = url1 + '?tab=Video';
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#PendingTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('Article'))
                        newurl = url1.replace("Article", "Pending");
                    else if (url1.includes('Video'))
                        newurl = url1.replace("Video", "Pending");
                    else if (url1.includes('Pending'))
                        newurl = url1.replace("Pending", "Pending");
                    else if (url1.includes('Subscriber'))
                        newurl = url1.replace("Subscriber", "Pending");
                }
            }
            else {
                newurl = url1 + '?tab=Pending';
            }
            window.history.pushState({path: newurl}, '', newurl);
        });
        $('#SubscriberTab').on('click', function () {
            if (url1.includes('tab')) {
                if (history.pushState) {
                    if (url1.includes('Article'))
                        newurl = url1.replace("Article", "Subscriber");
                    else if (url1.includes('Video'))
                        newurl = url1.replace("Video", "Subscriber");
                    else if (url1.includes('Pending'))
                        newurl = url1.replace("Pending", "Subscriber");
                    else if (url1.includes('Subscriber'))
                        newurl = url1.replace("Subscriber", "Subscriber");
                }
            }
            else {
                newurl = url1 + '?tab=Subscriber';
            }
            window.history.pushState({path: newurl}, '', newurl);
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
