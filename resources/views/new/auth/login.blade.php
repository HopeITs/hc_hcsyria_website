<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | Hope Center</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">

    <style>
        :root {
            --hope-red: #be1f24;
            --ink: #151922;
            --muted: #6d7480;
            --line: #e7e9ee;
            --surface: rgba(255, 255, 255, .92);
            --shadow: 0 28px 80px rgba(24, 29, 39, .16);
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: "Somar Sans", "Inter", "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at 15% 18%, rgba(207, 20, 43, .13), transparent 31rem),
                radial-gradient(circle at 90% 8%, rgba(21, 25, 34, .10), transparent 27rem),
                linear-gradient(135deg, #fff 0%, #f6f7f9 48%, #edf0f4 100%);
        }

        .login-page {
            position: relative;
            display: grid;
            min-height: 100vh;
            padding: 42px;
            place-items: center;
            overflow: hidden;
        }

        .login-page::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(90deg, rgba(255, 255, 255, .94), rgba(255, 255, 255, .72) 48%, rgba(255, 255, 255, .88)),
                url("/images/mission/background.jpg");
            background-position: center;
            background-size: cover;
            opacity: .9;
        }

        .login-shell {
            position: relative;
            z-index: 1;
            display: grid;
            width: min(1120px, 100%);
            min-height: 650px;
            grid-template-columns: minmax(0, 1fr) minmax(420px, .72fr);
            --top-row: 190px;
            --bottom-row: 110px;
            align-items: stretch;
            border: 1px solid rgba(255, 255, 255, .75);
            border-radius: 28px;
            background: rgba(255, 255, 255, .62);
            box-shadow: var(--shadow);
            overflow: hidden;
            backdrop-filter: blur(24px);
        }

        .brand-panel {
            position: relative;
            display: grid;
            grid-template-rows: var(--top-row) 1fr var(--bottom-row);
            align-items: stretch;
            padding: 52px;
            background: var(--hope-red);
            color: #fff;
            overflow: hidden;
        }

        .brand-panel::after {
            display: none;
        }

        .brand-mark {
            position: relative;
            z-index: 1;
            display: inline-flex;
            width: 185px;
            height: auto;
            align-items: center;
            justify-content: flex-start;
            align-self: center;
        }

        .brand-mark img {
            width: 100%;
            height: auto;
            display: block;
        }

        .brand-copy {
            position: relative;
            z-index: 1;
            max-width: 500px;
            align-self: center;
        }

        .brand-copy h1 {
            margin: 0;
            font-size: 50px;
            line-height: 1.15;
            font-weight: 800;
            text-transform: uppercase;
        }

        .brand-footer {
            position: relative;
            z-index: 1;
            margin: 0;
            font-size: 12px;
            color: rgba(255, 255, 255, .78);
            align-self: start;
            padding-top: 32px;
        }

        .auth-panel {
            display: grid;
            padding: 52px;
            background: var(--surface);
        }

        .auth-card {
            display: grid;
            grid-template-rows: var(--top-row) 1fr var(--bottom-row);
            width: 100%;
            height: 100%;
            margin: 0;
        }

        .auth-top,
        .auth-fields,
        .auth-actions {
            width: min(100%, 390px);
            justify-self: center;
        }

        .auth-top {
            align-self: center;
        }

        .auth-fields {
            align-self: center;
        }

        .auth-actions {
            align-self: start;
            padding-top: 14px;
        }

        .mobile-logo {
            display: none;
            width: 150px;
            margin: 0 auto 28px;
        }

        .auth-title {
            margin: 0;
            color: var(--ink);
            font-size: 34px;
            line-height: 1.15;
            font-weight: 800;
        }

        .auth-subtitle {
            margin: 12px 0 0;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.65;
        }

        .field {
            margin-bottom: 20px;
        }

        .field-label {
            display: block;
            margin-bottom: 9px;
            color: #343946;
            font-size: 13px;
            font-weight: 700;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            color: #9ca3af;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .auth-input {
            width: 100%;
            min-height: 56px;
            padding: 0 18px 0 48px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #fff;
            color: var(--ink);
            font-size: 15px;
            outline: none;
            transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease;
        }

        .auth-input:hover {
            border-color: #d2d6de;
        }

        .auth-input:focus {
            border-color: var(--hope-red);
            box-shadow: 0 0 0 4px rgba(207, 20, 43, .11);
            transform: translateY(-1px);
        }

        .auth-input.is-invalid {
            border-color: var(--hope-red);
        }

        .password-input {
            padding-right: 54px;
        }

        .password-toggle {
            position: absolute;
            right: 11px;
            top: 50%;
            display: inline-flex;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 12px;
            background: transparent;
            color: #5e6470;
            transform: translateY(-50%);
            cursor: pointer;
            transition: background-color .2s ease, color .2s ease;
        }

        .password-toggle:hover,
        .password-toggle:focus {
            background: #f2f3f6;
            color: var(--hope-red);
            outline: none;
        }

        .invalid-feedback {
            display: block;
            margin-top: 8px;
            color: var(--hope-red);
            font-size: 13px;
            font-weight: 600;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin: 6px 0 28px;
        }

        .remember {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            color: #414754;
            font-size: 14px;
            cursor: pointer;
            user-select: none;
        }

        .remember input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .remember-box {
            display: inline-flex;
            width: 22px;
            height: 22px;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccd1da;
            border-radius: 7px;
            background: #fff;
            color: #fff;
            transition: background-color .2s ease, border-color .2s ease, box-shadow .2s ease;
        }

        .remember input:checked + .remember-box {
            border-color: var(--hope-red);
            background: var(--hope-red);
            box-shadow: 0 8px 22px rgba(207, 20, 43, .22);
        }

        .remember input:focus + .remember-box {
            box-shadow: 0 0 0 4px rgba(207, 20, 43, .11);
        }

        .login-button {
            display: inline-flex;
            width: 100%;
            min-height: 52px;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 0;
            border-radius: 12px;
            background: var(--hope-red);
            color: #fff;
            box-shadow: none;
            font-size: 15px;
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color .2s ease, transform .2s ease;
        }

        .login-button:hover,
        .login-button:focus {
            color: #fff;
            background: #a7191d;
            outline: none;
            transform: translateY(-1px);
        }

        .auth-footer {
            margin-top: 26px;
            color: #8a909b;
            font-size: 12px;
            line-height: 1.6;
            text-align: center;
        }

        @media (max-width: 991px) {
            .login-page {
                padding: 24px;
            }

            .login-shell {
                min-height: auto;
                grid-template-columns: 1fr;
            }

            .brand-panel {
                min-height: 520px;
                grid-template-rows: 140px 1fr 90px;
            }

            .auth-panel {
                padding: 0 32px;
            }

            .auth-card {
                min-height: 520px;
                grid-template-rows: 140px 1fr 90px;
            }
        }

        @media (max-width: 575px) {
            .login-page {
                padding: 14px;
                place-items: stretch;
            }

            .login-shell {
                border-radius: 22px;
            }

            .auth-panel {
                padding: 0 22px;
            }

            .brand-panel {
                min-height: 460px;
                padding: 34px 28px;
                grid-template-rows: 120px 1fr 86px;
            }

            .brand-mark {
                width: 150px;
            }

            .brand-copy h1 {
                font-size: 38px;
            }

            .auth-card {
                min-height: 500px;
                grid-template-rows: 130px 1fr 86px;
            }

            .auth-title {
                font-size: 28px;
            }

            .auth-subtitle {
                margin-bottom: 28px;
            }

            .form-options {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <main class="login-page">
        <section class="login-shell" aria-label="Hope Center login">
            <aside class="brand-panel">
                <div class="brand-mark">
                    <img src="/images/logos/001_HC_W.svg" alt="Hope Center">
                </div>

                <div class="brand-copy">
                    <h1>Hcsyria dashboard login</h1>
                </div>

                <div class="brand-footer">Copyright © Christian Hope Center 2026</div>
            </aside>

            <section class="auth-panel">
                <form class="auth-card" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="auth-top">
                        <h2 class="auth-title">Sign in to continue</h2>
                    </div>

                    <div class="auth-fields">
                        <div class="field">
                            <label for="email" class="field-label">{{ __('Email') }}</label>
                            <div class="input-wrap">
                                <i class="fa fa-envelope input-icon" aria-hidden="true"></i>
                                <input id="email" type="email" class="auth-input{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="name@hcsyria.org" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
                            </div>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="field">
                            <label for="password" class="field-label">{{ __('Password') }}</label>
                            <div class="input-wrap">
                                <i class="fa fa-lock input-icon" aria-hidden="true"></i>
                                <input id="password" type="password" class="auth-input password-input{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter your password" name="password" autocomplete="current-password" required>
                                <button type="button" class="password-toggle" id="password-toggle" onclick="togglePasswordVisibility()" aria-label="Show password" aria-pressed="false">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </button>
                            </div>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-options">
                            <label class="remember">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="remember-box">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                                <span>{{ __('Remember Me') }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="auth-actions">
                        <button type="submit" class="login-button">
                            <span>{{ __('Login') }}</span>
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </section>
        </section>
    </main>

    <script>
        function togglePasswordVisibility() {
            var password = document.getElementById('password');
            var button = document.getElementById('password-toggle');
            var icon = button.querySelector('i');
            var isHidden = password.type === 'password';

            password.type = isHidden ? 'text' : 'password';
            button.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
            button.setAttribute('aria-pressed', isHidden ? 'true' : 'false');
            icon.className = isHidden ? 'fa fa-eye' : 'fa fa-eye-slash';
        }
    </script>
</body>
</html>
