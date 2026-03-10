<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'users' ?>
    <script src="/js/jquery.js"></script>

    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="mai youssef">
    <title>Admin | Users</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

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
                <a class="btn btn-success" href="{{route('users.create')}}">
                    <i class="fa fa-plus-square"></i>&nbsp; Create new User</a>
            </div>
        </div>
        <div class="card">
            <div class="card-title main-color-bg">Active Users</div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover w-100" id="tableActive">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Role</th>
                        <th scope="col" class="text-center">City</th>
                        <th scope="col" class="text-center">Permission</th>
                        <th scope="col" class="text-center">Center</th>
                        <th scope="col" class="text-center" style="width: 272px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($activeUsers as $activeUser)
                        <tr>
                            <th scope="row" class="text-center">{{$activeUser['id']}}</th>
                            <td class="text-center">{{$activeUser['name']}}</td>
                            <td class="text-center">{{$activeUser['email']}}</td>
                            <td class="text-center">@foreach($activeUser->roles as $i => $role) @if($i>0) {{','}} @endif {{ $role['name'] }} @endforeach</td>
                            <td class="text-center">@foreach($activeUser->places as $i => $place) @if($i>0) {{','}} @endif {{ $place['name'] }} @endforeach</td>
                            <td class="text-center">@foreach($activeUser->permissions as $i => $permission) @if($i>0) {{','}} @endif {{ $permission['name'] }} @endforeach</td>
                            <td class="text-center">@foreach($activeUser->centers as $i => $center) @if($i>0) {{','}} @endif {{ $center['name'] }} @endforeach</td>

                            <td class="text-end">
                                <form action="{{ route('delete.user', $activeUser['id']) }}"
                                      method="POST"
                                      style="float: right;"
                                      enctype="multipart/form-data">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn mb-2 btn-danger edit-btn icon-btn show_confirm"
                                            type="submit"
                                            data-id="{{$activeUser['id']}}">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                                <a href="{{route('edit.user', $activeUser['id'])}}"
                                   class="btn mb-2 btn-primary edit-btn"><span
                                            class="fa fa-edit"></span>&nbsp;Edit</a>
                                <form action="{{ action('App\Http\Controllers\UserController@deactivate') }}"
                                      method="POST"
                                      style="float:right;"
                                      enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $activeUser['id'] }}">

                                    <button type="submit" class="btn mb-2 btn-danger edit-btn">
                                        <i class="fa fa-ban"></i> deactivate
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-title  main-color-bg-black">Inactive Users</div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover w-100" id="tableNotActive">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inactiveUsers as $inactiveUser)
                        <tr>
                            <th scope="row" class="text-center">{{$inactiveUser['id']}}</th>
                            <td class="text-center">{{$inactiveUser['name']}}</td>
                            <td class="text-center">{{$inactiveUser['email']}}</td>

                            <td class="text-end">
                                <form action="{{ action('App\Http\Controllers\UserController@activate') }}"
                                      method="POST"
                                      style="float:right;padding-right:10px;"
                                      enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $inactiveUser['id'] }}">

                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> activate
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stack('navbar_scripts')
<script>
    function togglePasswordVisibility() {
        let x = document.getElementById("password-input");
        let passToggle = $('#password-toggle');
        if (x.type === "password") {
            x.type = "text";
            passToggle.removeClass('fa-eye-slash');
            passToggle.addClass('fa-eye');
        } else {
            passToggle.removeClass('fa-eye');
            passToggle.addClass('fa-eye-slash');
            x.type = "password";
        }
    }
</script>
<script>
    $(document).ready(function () {
        {{--var users = <?php echo json_encode($users); ?>;--}}
        {{--$('#create-btn').click(function () {--}}
            {{--$('.title').text('Create User');--}}
            {{--$('#user-id').val('');--}}
            {{--$('#name-input').val('');--}}
            {{--$('#email-input').val('');--}}
            {{--$('#password-input').val('');--}}
            {{--$('#password-input').attr('required', '');--}}
            {{--$('#password-input').prop('placeholder', 'Password');--}}
            {{--$('#modal-form').attr('action', '/admin/users/store');--}}
            {{--$('#password-toggle').prop("checked", false);--}}
            {{--$('.btn-group label').removeClass('active');--}}
            {{--$('.btn-group label input').prop('checked', false);--}}
            {{--$('.btn-group label input').prop('checked', false);--}}
            {{--$('#submit-btn').html('<i class="fa fa-external-link"></i> Create');--}}
            {{--$('.modal').modal('show');--}}
        {{--});--}}
        {{--$('.edit-btn').click(function () {--}}
            {{--let id = this.dataset.content;--}}
            {{--let user = $.grep(users, function (e) {--}}
                {{--return e.id == id;--}}
            {{--});--}}
            {{--$('.title').text('Edit User');--}}
            {{--$('#user-id').val(user[0].id);--}}
            {{--$('#name-input').val(user[0].name);--}}
            {{--$('#email-input').val(user[0].email);--}}
            {{--$('#password-input').val('');--}}
            {{--$('#password-input').prop('placeholder', '(Leaving this empty wont change the password)');--}}
            {{--$('#password-input').removeAttr('required');--}}
            {{--$('#modal-form').attr('action', '/admin/users/update');--}}
            {{--$('#password-toggle').prop("checked", false);--}}
            {{--$('.btn-group label').removeClass('active');--}}
            {{--for (let i = 0; i < user[0].roles.length; i++) {--}}
                {{--switch (user[0].roles[i].name) {--}}
                    {{--case 'Admin':--}}
                        {{--$('#admin-lbl').addClass('active');--}}
                        {{--$('#admin-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                    {{--case 'English Editor':--}}
                        {{--$('#english-lbl').addClass('active');--}}
                        {{--$('#english-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                    {{--case 'French Editor':--}}
                        {{--$('#french-lbl').addClass('active');--}}
                        {{--$('#french-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                    {{--case 'Photos Editor':--}}
                        {{--$('#photos-lbl').addClass('active');--}}
                        {{--$('#photos-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                    {{--case 'Viewer':--}}
                        {{--$('#viewer-lbl').addClass('active');--}}
                        {{--$('#viewer-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                    {{--case 'English Checker':--}}
                        {{--$('#checker-lbl').addClass('active');--}}
                        {{--$('#checker-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                    {{--case 'Publisher':--}}
                        {{--$('#publish-lbl').addClass('active');--}}
                        {{--$('#publish-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                {{--}--}}
            {{--}--}}

            {{--for (let i = 0; i < user[0].places.length; i++) {--}}
                {{--switch (user[0].places[i].name) {--}}
                    {{--case 'Aleppo':--}}
                        {{--$('#aleppo-lbl').addClass('active');--}}
                        {{--$('#aleppo-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                    {{--case 'Homs':--}}
                        {{--$('#homs-lbl').addClass('active');--}}
                        {{--$('#homs-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                    {{--case 'Damascus':--}}
                        {{--$('#damascus-lbl').addClass('active');--}}
                        {{--$('#damascus-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                    {{--case 'Latakia':--}}
                        {{--$('#latakia-lbl').addClass('active');--}}
                        {{--$('#latakia-lbl input').prop('checked', true);--}}
                        {{--break;--}}
                {{--}--}}
            {{--}--}}

            {{--$('#submit-btn').html('<i class="fa fa-refresh"></i> Update');--}}
            {{--$('.modal').modal('show');--}}
        {{--});--}}
        {{--$('#cancel').click(function () {--}}
            {{--$('.modal').modal('hide');--}}
        {{--});--}}
    });
</script>
<script>
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        var id = $(this).data("id");
        event.preventDefault();

        swal({
            title: `Are you sure you want to delete ` + id + `?`,
            // icon: "warning",
            // buttons: true,
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
        tableActive = new DataTable('#tableActive', {
            // responsive: true,
            "scrollX": true,
            "paging":   false,
            "info":     false
        });
        tableNotActive = new DataTable('#tableNotActive', {
            // responsive: true,
            "scrollX": true,
            "paging":   false,
            "info":     false
        });
    });
</script>
</body>
</html>
