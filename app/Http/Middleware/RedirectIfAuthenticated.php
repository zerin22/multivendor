<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                $role = Auth()->user()->role;
                switch ($role) {
                  case 1:
                    return '/user/dashboard';
                    break;
                  case 2:
                    return '/admin/dashboard';
                    break;
                  case 3:
                    return '/venodr/dashboard';
                    break;
                  default:
                    return '/';
                  break;
                }
            }
        }

        return $next($request);
    }
}
