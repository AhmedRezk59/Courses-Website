<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Course;
use App\Observers\CommentObserver;
use App\Observers\CourseObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Comment::observe([
            CommentObserver::class
        ]);
    }
}
