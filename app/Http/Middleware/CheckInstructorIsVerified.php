<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Instanceof_;

class CheckInstructorIsVerified
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

        if(auth()->guard('instructor')->user() Instanceof MustVerifyEmail && auth()->guard('instructor')->user()->hasVerifiedEmail()){
            return redirect()->route('instructor.dashboard');
        }

        return $next($request);
    }
}
