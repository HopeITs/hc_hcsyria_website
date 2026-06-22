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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="/css/login-new-design.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
</head>
<body>
    <main class="login-page">
        <section class="login-shell" aria-label="Hope Center login">
            <aside class="brand-panel">
                <div class="brand-mark">
                    <img src="/images/logos/001_HC_W.svg" alt="Hope Center">
                </div>

                <div class="brand-copy">
                    <h1>Hcsyria<br>dashboard<br>login</h1>
                </div>

                <div class="brand-footer">Copyright © Christian Hope Center {{ date('Y') }}</div>
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
