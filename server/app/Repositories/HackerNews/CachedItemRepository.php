<?php

namespace App\Repositories\HackerNews;

use Illuminate\Contracts\Cache\Repository as CacheRepository;

class CachedItemRepository implements ItemRepositoryInterface
{
    private $cache;

    private $repository;

    public function __construct(CacheRepository $cache, ItemRepository $repository)
    {
        $this->cache = $cache;
        $this->repository = $repository;
    }

    public function find(int $id)
    {
        return $this->cache->tags('items')
            ->remember($id, now()->addHour(1), function () use ($id) {
                return $this->repository->find($id);
            });
    }

    public function lastId()
    {
        return $this->repository->lastId();
    }

    public function storiesByType(string $type): array
    {
        return $this->cache->tags("items.$type")
            ->remember($type, now()->addMinutes(10), function () use ($type) {
                return $this->repository->storiesByType($type);
            });
    }
}
