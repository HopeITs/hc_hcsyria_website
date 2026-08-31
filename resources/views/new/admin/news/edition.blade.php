<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Admin | Editions</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/micro_page_new.css" rel="stylesheet">
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/js/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/js/buttons.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="/css/buttons.bootstrap5.min.css">
    <script type="text/javascript" src="/js/jszip.min.js"></script>
    <script type="text/javascript" src="/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="/js/buttons.colVis.min.js"></script>
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>

@stack('navbar_body')
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-md-11 col-sm-11 col-11">
            <div id="projects">
                <div class="row">
                    <div class="col">
                        @include('new.admin.messages')
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="title">Edition</h3>
                        <form action="{{ route('news.edition.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row mb-3">
                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <label for="name">Name <span class="red-color">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end" style="margin-bottom: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i
                                            class="fa fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" class="btn btn-info" style="margin-left: 15px;"><i
                                            class="fa fa-refresh"></i> Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-striped table-bordered table-hover" id="tableHope">
                            @if($editions)
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>French Name</th>
                                    <th>State</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach($editions as $edition)
                                    <tbody>
                                    <tr>
                                        <td>{{$edition['id']}}</td>
                                        <td>{{$edition['name']}}</td>
                                        <td>{{$edition['name_french']}}</td>
                                        <td>@if($edition['online'] == '0') Offline @else Online @endif </td>

                                        <td class="text-right">
                                            @if($user->roles->contains('name', 'Admin'))
                                                <form action="{{ route('news.edition.destroy', $edition['id']) }}"
                                                      enctype="multipart/form-data" method="POST"
                                                      style="float: right; padding-left: 10px ">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger icon-btn show_confirm"
                                                            type="submit"
                                                            data-id="{{$edition['id']}}">
                                                        <i class="fa fa-trash-o"></i></button>
                                                </form>
                                            @endif
                                            @if($user->roles->contains('name', 'Admin') || $user->roles->contains('name', 'English Editor'))
                                                    @if($edition['online'] == '0')
                                                        <form action="{{ route('news.edition.online') }}" method="POST" style="float:right;padding-left:10px;" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="ID" value="{{ $edition['id'] }}">
                                                            <button type="submit" class="btn btn-info"><i class="fa fa-power-off"></i></button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('news.edition.offline') }}" method="POST" style="float:right;padding-left:10px;" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="ID" value="{{ $edition['id'] }}">
                                                            <button type="submit" class="btn btn-danger icon-btn"><i class="fa fa-power-off"></i></button>
                                                        </form>
                                                    @endif
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

@stack('navbar_scripts')
<script>
    // $(document).ready(function () {
    //     tableHope = new DataTable('#tableHope', {
    //         "scrollX": true,
    //         "bPaginate": false,
    //         "lengthMenu": false
    //     })
    // });
</script>
<script>
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        var id = $(this).data("id");
        event.preventDefault();

        swal({
            title: `Are you sure you want to delete Edition ` + id +`?`,
            showCancelButton: true,
            confirmButtonText: 'Delete',
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
    // if (e) {
    //     alert('yes');
    //     return true;
    // }
    // if (confirm("Do you really want to: \nDelete " + e + " ?"))
    //     return true;
    // else
    //     return false;
    // }

    // ).catch(swal.noop);
    // }
    // ;
</script>
@include('new.admin.scripts.popup-messages')
</body>
</html>
