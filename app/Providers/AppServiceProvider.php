<?php

namespace App\Providers;

use Elasticsearch\Client;
use App\Interfaces\UserService;
use App\Services\EloquentUserService;
use Illuminate\Support\ServiceProvider;
use App\Services\ElasticsearchUserService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserService::class, function ($app) {
            if (! config('services.search.enabled')) {
                return new EloquentUserService();
            }

            return new ElasticsearchUserService(
                $app->make(Client::class)
            );
        });
    }
}
