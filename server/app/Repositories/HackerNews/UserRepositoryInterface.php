<?php

namespace App\Repositories\HackerNews;

interface UserRepositoryInterface
{
    public function find(string $username);
}
