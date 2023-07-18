<?php

namespace App\Http\Controllers\InstructorAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return auth()->guard('instructor')->user()->hasVerifiedEmail()
                    ? redirect()->intended()
                    : view('instructor.auth.verify-email');
    }
}
