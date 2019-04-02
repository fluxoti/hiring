<?php

declare(strict_types=1);

namespace App\API;

use GuzzleHttp\Client;
use Illuminate\Support\Str;

class HackerNewsAPI
{
    private $client;

    private const STORIES = ['top', 'new', 'best', 'ask', 'show', 'job'];

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function findItem(int $id)
    {
        return $this->sendRequest("item/$id");
    }

    public function findUser(string $username)
    {
        return $this->sendRequest("user/$username");
    }

    public function lastItemId()
    {
        return $this->sendRequest('maxitem');
    }

    public function __call($method, $arguments)
    {
        $methodPrefix = Str::before($method, 'Stories');

        if (in_array($methodPrefix, self::STORIES)) {
            return $this->sendRequest(strtolower($method));
        }

        throw new \MethodNotFoundException();
    }

    private function sendRequest(string $path)
    {
        $response = $this->client->get("$path.json");

        return json_decode((string) $response->getBody());
    }
}
