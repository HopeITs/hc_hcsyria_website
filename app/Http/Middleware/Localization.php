<?php

namespace App\Http\Middleware;

use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Session::has('locale')){
            \App::setLocale(\Session::get('locale'));
        }else {
            session(['locale' => substr(\Request::server('HTTP_ACCEPT_LANGUAGE'),0,2)]);
            \App::setLocale(substr(\Request::server('HTTP_ACCEPT_LANGUAGE'),0,2));
        }
        return $next($request);
    }
}
