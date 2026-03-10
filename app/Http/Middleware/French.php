<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class French
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
        if ($roles->contains('name', 'French Editor') || $roles->contains('name', 'Admin')) {
            return $next($request);
        }
        return redirect('admin/unauthorized');
    }
}
