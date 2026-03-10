<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'users' ?>
    @include('admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .btn-group label {
            color: #333;
            background-color: #fff;
            border-color: #aaa
        }
        .btn-group .active {
            background-color: #428bca;
        }
        .title {
            color: #ffffff;
            background-color: #428bca;
        }
        #roles label , #places label{
            width: 181px;
            border-radius: 0;
            margin: 0;
        }
        #password-toggle {
            position: absolute;
            right: 0;
            margin: -23px 25px;
            cursor: pointer;
        }
        .edit-btn {
            float: right;
        }
        #cancel {
            float: right;
            margin-top: -30px;
        }
        .modal-dialog {
            margin-top: 100px !important;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<section style="padding-top: 30px;">
    <div class="container">
        @include('admin.messages')
    </div>
    <div class="container">
        <button class="btn btn-success" id="create-btn" data-toggle="modal">
            <i class="fa fa-plus-square"></i>&nbsp; Create new user
        </button>
        <div class="panel panel-default" style="margin-top: 30px">
            <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Active Users</h3>
            </div>
            <div class="panel-body" id="payment-panel">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Role</th>
                            <th scope="col" class="text-center">City</th>
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

                                <td class="text-center">
                                    {!!Form::open(['action'=>['UserController@delete', $activeUser['id']], 'method'=>'POST', 'style' => 'float:right;padding-left:10px;'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$activeUser['id'].'\')'])}}
                                    {!! Form::close() !!}
                                    <button class="btn btn-primary edit-btn" data-toggle="modal"
                                            data-content="{{$activeUser['id']}}">
                                        <i class="fa fa-edit"></i>&nbsp; Edit
                                    </button>
                                    {!! Form::open(['action' => 'UserController@deactivate', 'method' => 'POST', 'style' => 'float:right;padding-right:10px;', 'enctype' => 'multipart/form-data']) !!}
                                    {{Form::text('id', $activeUser['id'], ['class' => 'hidden'])}}
                                    {{Form::button('<i class="fa fa-ban"></i> deactivate', ['type' => 'submit', 'class' => 'btn btn-default'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default " style="margin-top: 30px">
            <div class="panel-heading main-color-bg-black">
                <h3 class="panel-title ">Inactive Users</h3>
            </div>
            <div class="panel-body" id="payment-panel">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
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

                                <td class="text-center">
                                    {{--{!!Form::open(['action'=>['UserController@delete', $inactiveUser['id']], 'method'=>'POST', 'style' => 'float:right;padding-left:10px;'])!!}--}}
                                    {{--{{Form::hidden('_method','DELETE')}}--}}
                                    {{--{{Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => 'return ConfirmDelete(\''.$inactiveUser['id'].'\')'])}}--}}
                                    {{--{!! Form::close() !!}--}}
                                    {{--<button class="btn btn-primary edit-btn" data-toggle="modal"--}}
                                            {{--data-content="{{$inactiveUser['id']}}">--}}
                                        {{--<i class="fa fa-edit"></i>&nbsp; Edit--}}
                                    {{--</button>--}}
                                    {!! Form::open(['action' => 'UserController@activate', 'method' => 'POST', 'style' => 'float:right;padding-right:10px;', 'enctype' => 'multipart/form-data']) !!}
                                    {{Form::text('id', $inactiveUser['id'], ['class' => 'hidden'])}}
                                    {{Form::button('<i class="fa fa-check"></i> activate', ['type' => 'submit', 'class' => 'btn btn-default'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="title"></h3>
                {!! Form::open(['route' => 'update.user', 'method' => 'POST', 'id' => 'modal-form', 'enctype' => 'multipart/form-data']) !!}
                <div class="row">
                    {{Form::text('id', '', ['class' => 'hidden', 'id' => 'user-id'])}}
                    <div class="form-group col-md-8 col-md-offset-2">
                        {{Form::label('name', 'User Name')}}
                        {{Form::text('name', '', ['class' => 'form-control', 'id' => 'name-input','placeholder' => 'Name', 'required'])}}
                    </div>
                    <div class="form-group col-md-8 col-md-offset-2">
                        {{Form::label('email', 'User Email')}}
                        {{Form::email('email', '', ['class' => 'form-control', 'id' => 'email-input', 'placeholder' => 'Email', 'required'])}}
                    </div>
                    <div class="form-group col-md-8 col-md-offset-2">
                        {{Form::label('password', 'User Password')}}
                        {{Form::password('password', ['class' => 'form-control', 'id' => 'password-input'])}}
                        <i class="fa fa-eye-slash" id="password-toggle" onclick="togglePasswordVisibility()"></i>
                    </div>
                    <div class="form-group col-md-8 col-md-offset-2">
                        <label>User Role</label><br>
                        <div class="btn-group" data-toggle="buttons" id="roles">
                            <label class="btn btn-primary" id="admin-lbl">
                                <input name="roles[]" type="checkbox" value="1">
                                Admin</label>

                            <label class="btn btn-primary" id="publish-lbl">
                                <input name="roles[]" type="checkbox" value="7">
                                Publisher</label>

                            <label class="btn btn-primary" id="english-lbl">
                                <input name="roles[]" type="checkbox" value="2">
                                English Editor</label>

                            <label class="btn btn-primary" id="checker-lbl">
                                <input name="roles[]" type="checkbox" value="6">
                                English Checker</label>

                            <label class="btn btn-primary" id="french-lbl">
                                <input name="roles[]" type="checkbox" value="3">
                                French Editor</label>

                            <label class="btn btn-primary" id="photos-lbl">
                                <input name="roles[]" type="checkbox" value="4">
                                Photos Editor</label>

                            <label class="btn btn-primary" id="viewer-lbl">
                                <input name="roles[]" type="checkbox" value="5">
                                Viewer</label>
                        </div>
                    </div>

                    <div class="form-group col-md-8 col-md-offset-2">
                        <label>User City</label><br>
                        <div class="btn-group" data-toggle="buttons" id="places">

                            <label class="btn btn-primary" id="aleppo-lbl">
                                <input name="places[]" type="checkbox" value="3">
                                Aleppo</label>

                            <label class="btn btn-primary" id="homs-lbl">
                                <input name="places[]" type="checkbox" value="1">
                                Homs</label>

                            <label class="btn btn-primary" id="damascus-lbl">
                                <input name="places[]" type="checkbox" value="2">
                                Damascus</label>

                            <label class="btn btn-primary" id="latakia-lbl">
                                <input name="places[]" type="checkbox" value="4">
                                Latakia</label>

                        </div>
                    </div>

                </div>
                {{Form::button('', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'submit-btn','style' => 'margin-top: 15px;'])}}
                {!! Form::close() !!}
                <button class="btn btn-default" id="cancel"><i class="fa fa-times"></i> Cancel</button>
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
    function ConfirmDelete(e) {
        if (confirm("Do you really want to: \nDelete " + e + " ?"))
            return true;
        else
            return false;
    }
</script>
<script>
    $(document).ready(function () {
        var users = <?php echo json_encode($users); ?>;
        $('#create-btn').click(function () {
            $('.title').text('Create User');
            $('#user-id').val('');
            $('#name-input').val('');
            $('#email-input').val('');
            $('#password-input').val('');
            $('#password-input').attr('required', '');
            $('#password-input').prop('placeholder', 'Password');
            $('#modal-form').attr('action', '/admin/users/store');
            $('#password-toggle').prop("checked", false);
            $('.btn-group label').removeClass('active');
            $('.btn-group label input').prop('checked', false);
            $('.btn-group label input').prop('checked', false);
            $('#submit-btn').html('<i class="fa fa-external-link"></i> Create');
            $('.modal').modal('show');
        });
        $('.edit-btn').click(function () {
            let id = this.dataset.content;
            let user = $.grep(users, function (e) {
                return e.id == id;
            });
            $('.title').text('Edit User');
            $('#user-id').val(user[0].id);
            $('#name-input').val(user[0].name);
            $('#email-input').val(user[0].email);
            $('#password-input').val('');
            $('#password-input').prop('placeholder', '(Leaving this empty wont change the password)');
            $('#password-input').removeAttr('required');
            $('#modal-form').attr('action', '/admin/users/update');
            $('#password-toggle').prop("checked", false);
            $('.btn-group label').removeClass('active');
            for(let i = 0; i < user[0].roles.length; i++) {
                switch (user[0].roles[i].name) {
                    case 'Admin':
                        $('#admin-lbl').addClass('active');
                        $('#admin-lbl input').prop('checked', true);
                        break;
                    case 'English Editor':
                        $('#english-lbl').addClass('active');
                        $('#english-lbl input').prop('checked', true);
                        break;
                    case 'French Editor':
                        $('#french-lbl').addClass('active');
                        $('#french-lbl input').prop('checked', true);
                        break;
                    case 'Photos Editor':
                        $('#photos-lbl').addClass('active');
                        $('#photos-lbl input').prop('checked', true);
                        break;
                    case 'Viewer':
                        $('#viewer-lbl').addClass('active');
                        $('#viewer-lbl input').prop('checked', true);
                        break;
                    case 'English Checker':
                        $('#checker-lbl').addClass('active');
                        $('#checker-lbl input').prop('checked', true);
                        break;
                    case 'Publisher':
                        $('#publish-lbl').addClass('active');
                        $('#publish-lbl input').prop('checked', true);
                        break;
                }
            }

            for(let i = 0; i < user[0].places.length; i++) {
                switch (user[0].places[i].name) {
                    case 'Aleppo':
                        $('#aleppo-lbl').addClass('active');
                        $('#aleppo-lbl input').prop('checked', true);
                        break;
                    case 'Homs':
                        $('#homs-lbl').addClass('active');
                        $('#homs-lbl input').prop('checked', true);
                        break;
                    case 'Damascus':
                        $('#damascus-lbl').addClass('active');
                        $('#damascus-lbl input').prop('checked', true);
                        break;
                    case 'Latakia':
                        $('#latakia-lbl').addClass('active');
                        $('#latakia-lbl input').prop('checked', true);
                        break;
                }
            }

            $('#submit-btn').html('<i class="fa fa-refresh"></i> Update');
            $('.modal').modal('show');
        });
        $('#cancel').click(function () {
            $('.modal').modal('hide');
        });
    });
</script>
