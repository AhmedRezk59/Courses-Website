<?php

use App\Http\Controllers\InstructorAuth\AuthenticatedSessionController;
use App\Http\Controllers\InstructorAuth\ConfirmablePasswordController;
use App\Http\Controllers\InstructorAuth\EmailVerificationNotificationController;
use App\Http\Controllers\InstructorAuth\EmailVerificationPromptController;
use App\Http\Controllers\InstructorAuth\NewPasswordController;
use App\Http\Controllers\InstructorAuth\PasswordController;
use App\Http\Controllers\InstructorAuth\PasswordResetLinkController;
use App\Http\Controllers\InstructorAuth\RegisteredUserController;
use App\Http\Controllers\InstructorAuth\VerifyEmailController;
use App\Http\Middleware\CheckInstructorIsVerified;
use App\Http\Middleware\RedirectInstructorIfAuthenticated;
use App\Http\Middleware\RedirectInstructorIfNotAuthenticated;
use Illuminate\Support\Facades\Route;

Route::middleware(RedirectInstructorIfAuthenticated::class)->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});
Route::middleware(CheckInstructorIsVerified::class)->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])->withoutMiddleware(CheckInstructorIsVerified::class)
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});
Route::middleware(RedirectInstructorIfNotAuthenticated::class)->prefix('instructor')->name('instructor.')->group(function () {

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
