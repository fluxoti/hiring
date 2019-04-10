<?php

namespace App\Repositories\HackerNews;

class ItemRepository extends Repository implements ItemRepositoryInterface
{
    public function find(int $id)
    {
        return $this->api->findItem($id);
    }

    public function lastId()
    {
        return $this->api->lastItemId();
    }

    public function storiesByType(string $type)
    {
        return $this->api->{$type.'Stories'}();
    }
}
