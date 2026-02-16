<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    /*
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param array ...$guards
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     * @throws \Illuminate\Auth\AuthenticationException
     */

    public function handle($request, Closure $next, ...$guards)
    {
//        if(!Auth::user()['active']){
//            Auth::logout();
//            return redirect('/login');
//        }
//        $this->authenticate($request, $guards);
//
//        return $next($request);
        if ($this->auth->guest())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('/login');
            }
        }
        return $next($request);
    }
}
