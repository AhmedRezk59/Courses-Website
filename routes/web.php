<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\Instructor\FileUploadController;
use App\Http\Controllers\Instructor\StreamController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\JoinCourseController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainPageController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('users.dashboard');

Route::get('terms', function () {
    return view('user.terms_privacy');
})->name('terms');

Route::middleware('auth')->group(function () {

    Route::controller(StreamController::class)->group(function () {
        Route::get('attachment/{lesson}','getAttachment')->name('get.attachment');
        Route::get('get/video/{lesson}/lesson',  'getLessonForUser')->name('user.get.lesson');
    });

    Route::controller(JoinCourseController::class)->group(function () {
        Route::post('pay/{course}/credit', 'pay')->name('join.pay');
        Route::post('pay/{course}/wallet', 'payWallet')->name('join.pay.wallet');

        Route::post('donotpay/{course}', 'noPay')->name('join.donot.pay');
    });


    Route::controller(CourseController::class)->name('courses.')->group(function () {
        Route::get('courses/mine', 'mine')->name('mine');
        Route::get('courses/{id}/view', 'contents')->name('course.contents');
        Route::get('lesson/{lesson}/view', 'lesson')->name('lesson.view');
    });
    Route::get('settings', [SettingController::class, 'view'])->name('settings');
    Route::post('user/avatar/upload', [FileUploadController::class, 'upload_avatar'])->name('user.upload.avatar');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::get('/send/{course}/certificate', [CourseController::class, 'sendCourseCompletionCertificate'])->name('certificate');
});

Route::controller(CourseController::class)->name('courses.')->group(function () {
    Route::get('courses', 'index')->name('all');
    Route::get('courses/{course}/show', 'show')->name('show');
    Route::get('courses/{course}/final/quiz', 'quiz')->name('quiz.final');
});
Route::controller(UserController::class)->group(function () {
    Route::get('user/page/{user?}', 'userPage')->name('user.page');
});
Route::get('/payments/verify/{payment?}', [JoinCourseController::class, 'payment_verify'])->name('payment-verify');
Route::post('subscribe', [SubscriberController::class, 'join'])->name('subscribe');
Route::controller(StreamController::class)->group(function () {
    Route::get('get/user/{user}/avatar',  'getuserAvatar')->name('get.avatar');
    Route::get('get/image/{course}/thumbinal',  'getThumbinal')->name('get.thumbinal.course');
    Route::get('get/image/{instructor}/avatar',  'getInstructorAvatar')->name('instructor.avatar');
    Route::get('get/trailer/{course}/user',  'getCourseTrailer')->name('user.get.trailer');
    Route::get('get/thumbinal/{course}/image',  'getCourseThumbinal')->name('user.get.thmbinal');
});
Route::controller(InstructorController::class)->group(function () {
    Route::get('instructor/{instructor}/page', 'show')->name('instructor.page');
});

require __DIR__ . '/admin.php';
require __DIR__ . '/adminAuth.php';
require __DIR__ . '/instructorAuth.php';
require __DIR__ . '/instructor.php';
require __DIR__ . '/auth.php';
