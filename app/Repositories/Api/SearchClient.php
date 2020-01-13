<?php

namespace App\Repositories\Api;

use App\Repositories\Api\GoogleBook as Client;

class SearchClient
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function search(string $word = '', int $max = 12, int $page = 0)
    {
        return $this->client->search($word, $max, $page);
    }
}
