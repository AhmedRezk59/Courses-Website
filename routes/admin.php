<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\WebsiteSettingsController;
use App\Http\Controllers\Instructor\StreamController;
use App\Http\Middleware\RedirectAdminIfNotAuthenticated;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(RedirectAdminIfNotAuthenticated::class)->group(function () {
   Route::controller(DashboardController::class)->group(function () {
      Route::get('dashboard', 'dashboard')->name('dashboard');
      Route::get('users', 'users')->name('users');
      Route::get('admins', 'admins')->name('admins');
      Route::get('instructors', 'instructors')->name('instructors');
      Route::get('courses/{status?}', 'courses')->name('courses');
   });
   Route::resource('currencies', CurrencyController::class)->except(['show', 'destroy']);
   Route::resource('departments', DepartmentController::class)->except(['show']);

   Route::controller(CourseController::class)->name('courses.')->group(function () {
      Route::get('/course/{course}/show', 'show')->name('show');
      Route::post('/course/{course}/state/{state}', 'change')->name('change.state');
   });

   Route::controller(ProfileController::class)->group(function () {
      Route::get('profile', 'show')->name('profile');
      Route::put('profile/update', 'update')->name('profile.update');
   });

   Route::controller(LessonController::class)->name('lessons.')->group(function () {
      Route::get('/lesson/{lesson}/show', 'show')->name('show');
   }); 
   Route::controller(WebsiteSettingsController::class)->name('settings.')->group(function () {
      Route::get('/settings/index', 'index')->name('index');
      Route::put('/settings/update', 'update')->name('update');
   });

   Route::get('payments/index' , [PaymentController::class , 'index'])->name('payments.index');
   Route::get('get/lesson/{lesson}', [StreamController::class, 'getLessonForAdmin'])->name('get.lesson');
});
