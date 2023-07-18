<?php

namespace App\Http\Controllers\InstructorAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if (auth()->guard('instructor')->user()->hasVerifiedEmail()) {
            return redirect()->intended();
        }

        auth()->guard('instructor')->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
