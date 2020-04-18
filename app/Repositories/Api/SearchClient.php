<?php

namespace App\Repositories\Api;

use App\Repositories\Api\Rakuten\BookSearch;

class SearchClient
{
    protected $client;

    public function __construct(BookSearch $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $word
     * @param int $max
     * @param int $page
     * @return \Illuminate\Support\Collection
     */
    public function search(string $word = '', int $max = 12, int $page = 0)
    {
        return $this->client->get($word, $max, $page);
    }
}
