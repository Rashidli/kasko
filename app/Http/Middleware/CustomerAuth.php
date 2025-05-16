<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('customer')->check()) {
            if ($request->routeIs('dashboard.login*')) {
                return redirect()->route('cabinet.welcome');
            }

            return $next($request);
        }

        if ( ! $request->routeIs('dashboard.login*')) {
            return redirect()->route('dashboard.login');
        }

        return $next($request);
    }
}
