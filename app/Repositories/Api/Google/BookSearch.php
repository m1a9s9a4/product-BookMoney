<?php
namespace App\Repositories\Api\Google;

use App\Repositories\Api\Book;
use App\Repositories\Api\BookShelf;
use App\Repositories\Api\Common\BaseSearchInterface;
use App\Repositories\Api\Google\Book\Search;
use App\Repositories\Api\Google\Book\Validate;

class BookSearch implements BaseSearchInterface
{
    protected $search_client;

    protected $validation;

    public function __construct()
    {
        $this->search_client = new Search();
        $this->validation = new Validate();
    }

    public function get(string $word, int $max, int $page)
    {
        $response = $this->search_client->get($word, $max, $page);

        return $this->convertToBookShelf($response);
    }

    private function convertToBookShelf($response = [])
    {
        $total = 0;
        $items = [];
        if (! empty($response)) {
            $total = $response->totalItems;
            $items = $response->items;
        }

        $books = collect([]);
        foreach ($items as $item) {
            if (! $this->validate($item)) {
                continue;
            }

            $info = $item->volumeInfo;
            $sale_info = $item->saleInfo;
            $book = new Book(
                $info->title,
                $info->publisher,
                $info->authors,
                $info->infoLink,
                $info->imageLinks->thumbnail,
                $sale_info->listPrice->amount,
                $this->getIsbn($item)
            );
            $books->push($book);
        }

        return new BookShelf($books, $total);
    }

    private function validate($item)
    {
        if (! $this->validation->isForSale($item)) {
            return false;
        }

        if (! $this->validation->hasIsbn($item)) {
            return false;
        }

        return true;
    }

    private function getIsbn($item)
    {
        if ($this->validation->hasIsbn($item)) {
            foreach ($item->volumeInfo->industryIdentifiers as $identifier) {
                if ($this->validation->isIsbn($identifier->type)) {
                    return $identifier->identifier;
                }
            }
        }

        return '';
    }
}
