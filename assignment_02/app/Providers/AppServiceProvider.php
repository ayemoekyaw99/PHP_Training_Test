<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         // Major
        $this->app->bind('App\Contracts\Services\MajorServiceInterface', 'App\Services\MajorService');
        $this->app->bind('App\Contracts\Dao\MajorDaoInterface', 'App\Dao\MajorDao');

        // // Student
        $this->app->bind('App\Contracts\Services\StudentServiceInterface', 'App\Services\StudentService');
        $this->app->bind('App\Contracts\Dao\StudentDaoInterface', 'App\Dao\StudentDao');
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}