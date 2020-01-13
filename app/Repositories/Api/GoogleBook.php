<?php

namespace App\Repositories\Api;

use App\Repositories\Client;

class GoogleBook implements BaseBookApi
{
    const URL = 'https://www.googleapis.com/books/v1/volumes/';

    const PARAM_LETTER = 'q';

    const FOR_SALE = 'FOR_SALE';
    const NOT_FOR_SALE = 'NOT_FOR_SALE';

    const ISBN = 'ISBN_13';

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function search(string $word = '', int $max = 12, int $page = 0)
    {
        $response = [];
        if ($word && $word !== '') {
            $response = $this->client->get(self::URL, [
                self::PARAM_LETTER => 'intitle:' . str_replace(' ', '+', $word),
                'maxResults' => $max,
                'startIndex' => $page,
                'orderBy' => 'newest'
            ]);
        }

        return $this->convertToBookShelf($response);
    }

    protected function convertToBookShelf($response = [])
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
                $this->getIsbn($info)
            );
            $books->push($book);
        }

        return new BookShelf($books, $total);
    }

    private function validate($item)
    {
        $info = $item->volumeInfo;
        $sale_info = $item->saleInfo;
        if ($sale_info->saleability === self::NOT_FOR_SALE) {
            return false;
        }

        if (! $this->hasIsbn($info)) {
            return false;
        }

        return true;
    }

    private function getIsbn($info)
    {
        foreach ($info->industryIdentifiers as $industry_identifier) {
            if ($industry_identifier->type === self::ISBN) {
                return $industry_identifier->identifier;
            }
        }

        return '';
    }

    private function hasIsbn($info)
    {
        if (empty($info->industryIdentifiers)) {
            return false;
        }

        foreach ($info->industryIdentifiers as $industry_identifier) {
            if ($industry_identifier->type === self::ISBN) {
                return true;
            }
        }

        return false;
    }
}
