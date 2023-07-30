<?php

use App\Http\Controllers\Instructor\AnnouncementController;
use App\Http\Controllers\Instructor\CommentController;
use App\Http\Controllers\Instructor\DirectoryController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\DashboardController;
use App\Http\Controllers\Instructor\FileUploadController;
use App\Http\Controllers\Instructor\LessonController;
use App\Http\Controllers\Instructor\ProfileController;
use App\Http\Controllers\Instructor\StreamController;
use App\Http\Middleware\RedirectInstructorIfNotAuthenticated;
use Illuminate\Support\Facades\Route;

Route::prefix('instructor')->name('instructor.')->middleware(RedirectInstructorIfNotAuthenticated::class)->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard',  'dashboard')->name('dashboard');
        Route::get('courses/get/{status?}', 'courses')->name('courses.status');
    });

    Route::controller(FileUploadController::class)->group(function () {
        Route::post('course/uplaod/video', 'upload_video')->name('course.upload');
        Route::post('course/uplaod/image', 'upload_image')->name('course.upload.image');
        Route::post('course/uplaod/lesson', 'upload_lesson')->name('course.upload.lesson');
        Route::post('lesson/uplaod/attachment', 'upload_attachment')->name('lesson.upload.attachment');
    });

    Route::resource('courses', CourseController::class)->except(['index']);
    Route::resource('directories', DirectoryController::class)->except(['create', 'store', 'index', 'show']);
    Route::resource('lessons', LessonController::class)->except(['create', 'store', 'index']);

    Route::controller(DirectoryController::class)->group(function () {
        Route::get('course/{course}/directory/create', 'create')->name('directories.create');
        Route::post('course/{course}/directory/store', 'store')->name('directories.store');
    });
    Route::controller(LessonController::class)->group(function () {
        Route::get('course/{course}/directory/{directory}/create', 'create')->name('lessons.create');
        Route::post('course/{course}/directory/{directory}/store', 'store')->name('lessons.store');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'show')->name('profile');
        Route::put('profile/update', 'update')->name('profile.update');
    });
    Route::controller(StreamController::class)->group(function () {
        Route::get('course/{course}/video', 'getVideo')->name('play.video');
        Route::get('course/{course}/image', 'getImage')->name('get.thumbinal');
        Route::get('course/{lesson}/lesson', 'getLesson')->name('get.lesson');
    });
    Route::controller(AnnouncementController::class)->group(function () {
        Route::get('announcement/create/{course}','create')->name('announcement.create');
        Route::post('announcement/{course}/store', 'store')->name('announcement.store');
    });
    Route::controller(CommentController::class)->group(function () {
        Route::get('comments/index', 'index')->name('comments.index');
        Route::get('comments/{comment}/show', 'show')->name('comments.show');
        Route::post('comments/{comment}/add', 'add')->name('add.comment');
    });
});
