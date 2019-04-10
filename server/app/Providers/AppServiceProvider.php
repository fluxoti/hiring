<?php

namespace App\Providers;

use GuzzleHttp\Client;
use App\API\HackerNewsAPI;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;
use App\Repositories\HackerNews\{
    ItemRepository,
    UserRepository,
    CachedItemRepository,
    CachedUserRepository,
    ItemRepositoryInterface,
    UserRepositoryInterface
};

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

        $this->app->singleton(ItemRepositoryInterface::class, function ($app) {
            return new CachedItemRepository(
                $app->make('cache.store'),
                new ItemRepository($app->make(HackerNewsAPI::class))
            );
        });

        $this->app->singleton(UserRepositoryInterface::class, function ($app) {
            return new CachedUserRepository(
                $app->make('cache.store'),
                new UserRepository($app->make(HackerNewsAPI::class))
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Resource::withoutWrapping();
    }
}
