<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($role == 'Admin' && Auth::user()->role == 'Admin') {
            return $next($request);
        } else if ($role == 'Operator' && Auth::user()->role == 'Operator') {
            return $next($request);
        } else if ($role == 'member' && Auth::user()->role == 'Member') {
            return $next($request);
        } else if ($role == 'Admin&Operator') {
            if (Auth::user()->role == 'Admin') {
                return $next($request);
            } else if (Auth::user()->role == 'Operator') {
                return $next($request);
            }
        } else if ($role == 'Admin&Operator&Member') {
            if (Auth::user()->role == 'Admin') {
                return $next($request);
            } else if (Auth::user()->role == 'Operator') {
                return $next($request);
            } else if (Auth::user()->role == 'Member') {
                return $next($request);
            }
        }
        return back();
    }
}
