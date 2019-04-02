<?php

namespace App\Providers;

use GuzzleHttp\Client;
use App\API\HackerNewsAPI;
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
        $this->app->singleton(HackerNewsAPI::class, function () {
            $client = new Client(config('services.hacker_news'));

            return new HackerNewsAPI($client);
        });
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
