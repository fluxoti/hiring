<?php

namespace App\Repositories\HackerNews;

use App\API\HackerNewsAPI;

abstract class Repository
{
    protected $api;

    public function __construct(HackerNewsAPI $api)
    {
        $this->api = $api;
    }
}
