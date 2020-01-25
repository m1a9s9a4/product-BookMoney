<?php

namespace App\Providers;

use App\Repositories\Api\Common\BaseSearchInterface;
use App\Repositories\Api\Google\BookSearch;
use Illuminate\Support\Facades\Blade;
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
        $this->app->singleton(BaseSearchInterface::class, function ($app) {
            return new BookSearch();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('components.card_book', 'card_book');
        if (\App::environment(['staging', 'production'])) {
            \URL::forceScheme('https');
        }
    }
}
