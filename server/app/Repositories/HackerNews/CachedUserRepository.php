<?php

namespace App\Repositories\HackerNews;

use Illuminate\Contracts\Cache\Repository as CacheRepository;

class CachedUserRepository implements UserRepositoryInterface
{
    private $cache;

    private $repository;

    public function __construct(CacheRepository $cache, UserRepository $repository)
    {
        $this->cache = $cache;
        $this->repository = $repository;
    }

    public function find(string $username)
    {
        return $this->cache->tags('users')->remember(
            $username,
            now()->addHour(1),
            function () use ($username) {
                return $this->repository->find($username);
            }
        );
    }
}
