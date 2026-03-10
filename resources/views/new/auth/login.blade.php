<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('app.scss') }}" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <style>
        .btn-primary {
            text-transform: uppercase;
            border: 1px solid #CF142B;
            color: #fff;
            background-color: #CF142B;
            border-radius: 0.25rem;
        }
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: #fff!important;
            color: #CF142B!important;
            border-color: #CF142B!important;
            -webkit-box-shadow: none!important;
            box-shadow: none!important;
        }
        .form-control:focus {
            border-color: #CF142B;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .card,
        .card-header,
        .form-control {
            border-radius: 0;
        }
        .logo {
            margin: 25px 0;
            width: 50%
        }
        .form-group{
            /*padding-right: 40px;*/
        }
        @media screen and (max-width: 768px) {
            .logo {
                width: 70%;
            }
            .form-group{
                /*padding-right: unset;*/
            }

        }
        input {
            /*display: block;*/
            /*width: 90%;*/
            /*margin: 0 auto;*/
            /*border: none;*/
        }
        input::placeholder{
             -webkit-transform:translateY(0px);
             transform:translateY(0px);
             -webkit-transition:.5s;
         }
        input:hover,
        input:focus,
        input:active:focus {
            color: #CF142B;
            outline: none;
            border-bottom: 1px solid #CF142B;
        }
        input:hover::placeholder,input:focus::placeholder,input:active:focus::placeholder{
             color:#CF142B;
             position:relative;
             -webkit-transform:translateY(-20px);
             transform:translateY(-20px);

         }

        .email,
        .pwd{
            height: 32px;
            /*border: none;*/
            position:relative;
            z-index:1;
            border-bottom:1px solid rgba(0,0,0,.1);
            color:#858585;
            font-weight:lighter;
            -webkit-transition:.5s;
            transition:.5s;
        }
    </style>
</head>

<div class="container" style="margin-top: 5rem;">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-11 col-11">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <img src="/images/logos/hc.svg" class="logo">
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mb-4 d-flex justify-content-center">
                            {{--<label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>--}}

                            <div class="col-lg-6 col-md-7 col-12">
                                <input id="email" type="email" class="email form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4 d-flex justify-content-center">
                            {{--<label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

                            <div class="col-lg-6 col-md-7 col-12">
                                <div class="position-relative">
                                    <input id="password" type="password" class=" pwd form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>
                                    <span style="position: absolute; right: 2%; bottom: 25%; z-index: 1000;"> <i class="fa fa-eye-slash" id="password-toggle" onclick="togglePasswordVisibility()" style="float:right;"></i></span>
                                </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4 d-flex justify-content-center">
                            <div class="col-lg-6 col-md-7 col-12">
                                <div class="checkbox">
                                    <label>
                                        <input class="input-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 d-flex justify-content-center">
                            <div class="col-lg-6 col-md-7 col-12">
                                <button type="submit" class="btn-edit btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function togglePasswordVisibility() {
        let x = document.getElementById("password");
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