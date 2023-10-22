<?php

namespace App\Providers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
    public function boot()
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        view()->composer(['welcome', 'dashboard'], 'App\Http\Controllers\PublicationController@composePublications');
        view()->composer(['dashboard'], 'App\Http\Controllers\CommentController@composeComments');
    }
}
