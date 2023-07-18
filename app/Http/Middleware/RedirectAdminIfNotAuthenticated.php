<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;

class RedirectAdminIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guard('admin')->check()) {
            return to_route('admin.login');
        }
        if ((!auth()->guard('admin')->user()->hasVerifiedEmail() && auth()->guard('admin')->user() instanceof MustVerifyEmail) && ! $request->routeIs('admin.logout')) {
            return to_route('admin.verification.notice');
        }
        return $next($request);
    }
}
