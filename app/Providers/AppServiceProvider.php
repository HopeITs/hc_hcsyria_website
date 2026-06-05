<?php

namespace App\Providers;

use App\User;
use App\WhoCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('public.navbar', function($view)
        {
            $view->with('navbarWhoCategories', WhoCategory::all());
        });
        view()->composer('*', function($view)
        {
            $view->with('user', User::with('roles')->find(Auth::id()));
        });
        app()->usePublicPath('');
        Paginator::useBootstrap();

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
            return '/www/www';
        });
    }
}
