<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $user_type, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->hasPermission($user_type, $roles)) {
            return $next($request);
        }

        abort('404');
    }
}
