<?php

namespace App\Providers;

use App\Interfaces\Repository\ArticleInterface;
use App\Repositories\ArticleRepository;
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
        //TODO: Bind contracts here
        $this->app->bind(ArticleInterface::class, ArticleRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
