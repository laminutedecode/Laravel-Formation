<?php

namespace App\Providers;

use App\Models\Article;
use App\Policies\ArticlePolicy;
use App\Services\ArticleService;
use Illuminate\Support\ServiceProvider;

class ArticleProvider extends ServiceProvider
{
    /**
     * Register services.
     */

     protected $policies = [
        Article::class => ArticlePolicy::class
     ];

     public function register(): void
     {
        $this->app->singleton(ArticleService::class, function () {
            return new ArticleService();
        });
     }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
