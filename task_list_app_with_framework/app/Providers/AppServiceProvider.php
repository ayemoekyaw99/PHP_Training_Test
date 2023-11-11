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
        $this->app->bind('App\Contracts\Services\TaskServiceInterface', 'App\Services\TaskService');
        $this->app->bind('App\Contracts\Dao\TaskDaoInterface', 'App\Dao\TaskDao');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}