<?php

namespace App\Http\Controllers\InstructorAuth;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\InstructorEmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(InstructorEmailVerificationRequest $request): RedirectResponse
    {
        if (auth()->guard('instructor')->user()->hasVerifiedEmail()) {
            return redirect()->route('instructor.courses.status', CourseStatus::ACCEPTED->value);
        }

        auth()->guard('instructor')->user()->markEmailAsVerified();

        return redirect()->route('instructor.courses.status', CourseStatus::ACCEPTED->value);
    }
}
