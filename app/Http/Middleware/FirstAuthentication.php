<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirstAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $boolean)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($boolean == "false" && Auth::user()->first_connection) {
            var_dump("U can't access at this route !");

            return redirect()->route('first_auth');
        } elseif ($boolean == "true" && !Auth::user()->first_connection) {
            var_dump("U can't access at this route !");

            if (Auth::user()->hasAccess('oza')) {
                return redirect()->route('admin.clients');
            } else {
                return redirect()->route('dashboard.home');
            }
        }

        return $next($request);
    }
}
