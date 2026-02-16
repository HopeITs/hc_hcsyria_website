<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class English
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
        $roles = User::with('roles')->where('id',Auth::id())->get()[0]['roles'];
        if ($roles->contains('name', 'English Editor') ||
            $roles->contains('name', 'Photos Editor') ||
            $roles->contains('name', 'Admin') ||
            $roles->contains('name', 'Viewer')) {
            return $next($request);
        }
        return redirect('admin/unauthorized');
    }
}
