<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;

class RedirectInstructorIfNotAuthenticated
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
        if (!auth()->guard('instructor')->check()) {
            return to_route('instructor.login');
        }
        if ((!auth()->guard('instructor')->user()->hasVerifiedEmail() && auth()->guard('instructor')->user() instanceof MustVerifyEmail) && !$request->routeIs('instructor.logout')) {
            return to_route('instructor.verification.notice');
        }
        return $next($request);
    }
}
