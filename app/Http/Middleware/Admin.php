<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $roles = User::with('roles','permissions','places')->where('id',Auth::id())->get()[0]['roles'];
        if ($roles->contains('name', 'Admin')) {
            return $next($request);
        }
        return redirect('admin/unauthorized');
    }
}
