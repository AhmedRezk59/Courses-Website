<?php

namespace App\Http\Controllers\InstructorAuth;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\InstructorLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('instructor.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(InstructorLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('instructor.courses.status', CourseStatus::ACCEPTED->value);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('instructor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('instructor/login');
    }
}
