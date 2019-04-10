<?php

namespace App\Repositories\HackerNews;

class UserRepository extends Repository
{
    public function find(string $username)
    {
        return $this->api->findUser($username);
    }
}
