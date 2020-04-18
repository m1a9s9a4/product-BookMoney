<?php
namespace App\Repositories\Api\Rakuten;

use App\Repositories\Api\Common\BaseSearchInterface;
use App\Repositories\Api\Rakuten\Book\Search;
use App\Services\Models\Book;

class BookSearch implements BaseSearchInterface
{
    const CLINET_NAME = '楽天';

    protected $client;

    public function __construct()
    {
        $this->client = new Search();
    }

    /**
     * @param string $word
     * @param int $max
     * @param int $page
     * @return \Illuminate\Support\Collection
     */
    public function get(string $word, int $max, int $page)
    {
        $response = $this->client->get($word, $max, $page);
        $books = collect([]);
        foreach (object_get($response, 'Items', []) as $item) {
            $book = object_get($item, 'Item', []);
            $books->add(new Book(
                $book->title,
                [$book->author],
                $book->itemPrice,
                $book->isbn,
                $book->itemUrl,
                $this->getImageUrl($book),
                $book->publisherName,
                self::CLINET_NAME
            ));
        }

        return $books;
    }

    /**
     * @param $book
     * @return mixed
     */
    private function getImageUrl($book): string
    {
        if ($book->largeImageUrl) {
            return $book->largeImageUrl;
        }

        if ($book->mediumImageUrl) {
            return $book->mediumImageUrl;
        }

        return $book->smallImageUrl;
    }
}
