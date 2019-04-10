<?php

namespace App\Repositories\HackerNews;

interface ItemRepositoryInterface
{
    public function find(int $id);

    public function lastId();

    public function storiesByType(string $type);
}
