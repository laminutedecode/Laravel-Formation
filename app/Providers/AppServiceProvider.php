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
        //    $this->app->bind('SomeInterface', 'SomeImplementation');

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      // Code pour configurer des routes, des événements, etc.

    }
}
