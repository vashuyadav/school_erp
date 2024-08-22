<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Classes;
use App\Observers\ClassObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Classes::observe(ClassObserver::class);
    }
}
