<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use File;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(\Illuminate\Http\Request $request) {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        // This section is the only change
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();

            // ADDED BY JUDY //
            if ($user->manager == 1)
            {
                $redirectTo = '/training/home';
            }

            // Make sure the user is active
            if ($user->active && $this->attemptLogin($request)) {
                // Send the normal successful login response
                return $this->sendLoginResponse($request);
            } else {
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);
                return redirect()
                    ->back()
                    ->withInput($request->only($this->username(), 'remember'))
                    ->withErrors(['password' => 'Your account is not activated, Please contact the website administrator']);
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * After a successful login, honor a `redirect` field (e.g. from the embedded
     * login form on the locked micro page) so the user is sent back there.
     * Only same-host URLs are allowed to prevent open-redirect abuse; returning
     * null falls through to the default intended/redirectPath behavior.
     */
    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {
        if ($request->filled('redirect')) {
            $redirect = $request->input('redirect');
            if (\Illuminate\Support\Str::startsWith($redirect, url('/'))) {
                return redirect($redirect);
            }
        }

        return null;
    }

    public function showLoginForm(\Illuminate\Http\Request $request)
    {
        // If a redirect target was supplied (e.g. from the locked micro page),
        // store it as the intended URL so the user is sent back there after login.
        // Only same-host URLs are allowed to prevent open-redirect abuse.
        if ($request->filled('redirect')) {
            $redirect = $request->query('redirect');
            if (\Illuminate\Support\Str::startsWith($redirect, url('/'))) {
                $request->session()->put('url.intended', $redirect);
            }
        }

        return view('new.auth.login');
    }

    public function logout(\Illuminate\Http\Request $request)
    {
        $redirect = null;
        if ($request->filled('redirect')) {
            $candidate = $request->input('redirect');
            if (\Illuminate\Support\Str::startsWith($candidate, url('/'))) {
                $redirect = $candidate;
            }
        }

        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect($redirect ?: '/home');
    }

    /**
     * Where to send the user after they log out.
     * Honors a `redirect` field (e.g. from the public micro page) so users
     * stay on the page they logged out from. Only same-host URLs are allowed
     * to prevent open-redirect abuse; otherwise the default behavior applies.
     */
    protected function loggedOut(\Illuminate\Http\Request $request)
    {
        if ($request->filled('redirect')) {
            $redirect = $request->input('redirect');
            if (\Illuminate\Support\Str::startsWith($redirect, url('/'))) {
                return redirect($redirect);
            }
        }
    }
}
