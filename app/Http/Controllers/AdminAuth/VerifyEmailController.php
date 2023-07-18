<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminEmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(AdminEmailVerificationRequest $request): RedirectResponse
    {
        if (auth()->guard('admin')->user()->hasVerifiedEmail()) {
            return redirect('/');
        }

        auth()->guard('admin')->user()->markEmailAsVerified();

        return redirect('/');
    }
}
