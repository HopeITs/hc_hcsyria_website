<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f6f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f6f6f6">
    <title>Hope Center</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/micro_page_new.css" rel="stylesheet">
    {{--<link href="{{asset('css/main-new.css')}}" rel="stylesheet">--}}
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/js/jquery.mobile.custom.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.min.js"></script>

    <link href="/css/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/fancybox.config.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{--@stack('navbar_styles')--}}
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
                        <h3 class="title">Edit User</h3>
                        {{--{!! Form::open(['route' => ['update.project', $project->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}--}}
                        <form action="{{ route('update.user',[$userEdited->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                                <input type="hidden" name="id" id="user-id" value="">

                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <label for="name-input">Name</label>
                                    <input type="text" name="name" id="name-input" class="form-control"
                                           placeholder="Name" value="{{ $userEdited->name }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-lg-6 col-md-6 col-12">
                                    <label for="email-input">Email</label>
                                    <input type="email" name="email" id="email-input" class="form-control"
                                           placeholder="Email" value="{{ $userEdited->email }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="password-input">Password</label>
                                    <span>
            <i class="fa fa-eye-slash" id="password-toggle"
               onclick="togglePasswordVisibility()" style="float:right;"></i>
        </span>
                                    <input type="password" name="password" id="password-input" class="form-control"
                                           placeholder="Leaving this empty won't change the password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label>Role</label><br>
                                    <div class="btn-group flex-wrap w-100" data-toggle="buttons">
                                        @foreach($all_roles as $role)
                                            <input type="checkbox" class="btn-check" value="{{$role->id}}"
                                                   name="roles[]"
                                                   id="role_{{$role->id}}"
                                                   autocomplete="off"
                                                   @if(in_array($role->id, $user_roles)) checked @endif>
                                            <label class="btn btn-outline-primary"
                                                   for="role_{{$role->id}}">{{$role->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label>City</label><br>
                                    <div class="btn-group w-100" data-toggle="buttons">
                                        @foreach($all_places as $place)
                                            <input type="checkbox" class="btn-check" value="{{$place->id}}" name="places[]"
                                                   id="place_{{$place->id}}"
                                                   autocomplete="off"
                                                   @if(in_array($place->id, $user_places)) checked @endif>
                                            <label class="btn btn-outline-primary"
                                                   for="place_{{$place->id}}">{{$place->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label>Permissions</label><br>
                                    <div class="btn-group w-100 flex-wrap" data-toggle="buttons">
                                        @foreach($permissions as $permission)
                                            <input type="checkbox" class="btn-check" value="{{$permission->id}}"
                                                   name="permissions[]"
                                                   id="permission_{{$permission->id}}"
                                                   autocomplete="off"
                                                   @if(in_array($permission->id, $user_permissions)) checked @endif>
                                            <label class="btn btn-outline-primary"
                                                   for="permission_{{$permission->id}}">{{$permission->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label>Centers</label><br>
                                    <div class="btn-group w-100 flex-wrap" data-toggle="buttons">
                                        @foreach($centers as $center)
                                            <input type="radio" class="btn-check" value="{{$center->id}}"
                                                   name="centers[]"
                                                   id="center_{{$center->id}}"
                                                   autocomplete="off" @if(in_array($center->id, $user_centers)) checked @endif>
                                            <label class="btn btn-outline-primary"
                                                   for="center_{{$center->id}}">{{$center->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end" style="margin-top: 5vw;">
                                <button class="btn btn-primary" onclick="event.preventDefault();window.history.back();">
                                    <i
                                            class="fa fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" class="btn btn-info" style="margin-left: 15px;"><i
                                            class="fa fa-refresh"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
    {{--$(document).ready(function () {--}}
    {{--{{$userEdited[0]['roles']}}.forEach((element) =>--}}
    {{--alert(element.id));--}}
    {{--});--}}
</script>
@include('new.admin.scripts.popup-messages')
</body>
</html>
