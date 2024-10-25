<?php

namespace App\Providers;

use App\View\Composers\CategoriesComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use Illuminate\Support\Facades;

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
        Facades\View::composer('client.layouts.topnav', CategoriesComposer::class);
    }
}
