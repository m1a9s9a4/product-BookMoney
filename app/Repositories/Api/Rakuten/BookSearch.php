<?php
namespace App\Repositories\Api\Rakuten;

use App\Repositories\Api\Common\BaseSearchInterface;
use App\Repositories\Api\Rakuten\Book\Search;

class BookSearch implements BaseSearchInterface
{
    protected $client;

    public function __construct()
    {
        $this->client = new Search();
    }

    public function get(string $word, int $max, int $page)
    {
        $response = $this->client->get($word, $max, $page);
        foreach (object_get($response, 'Items', []) as $item) {
            $book = object_get($item, 'Item', []);
            dd($book);
        }
    }
}
