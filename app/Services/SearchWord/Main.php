<?php
namespace App\Services\SearchWord;

use App\Models\Book;
use App\Repositories\Api\Book as BookClient;
use App\Services\BaseService;

class Main extends BaseService
{
    public function getLatestBooks($limit)
    {
        $books = Book::getLatest($limit);
        $result = collect([]);
        foreach ($books as $book_item) {
            $book = new BookClient(
                $book_item->title,
                $book_item->publisher,
                explode(',', $book_item->author),
                $book_item->url,
                $book_item->image_url,
                $book_item->price,
                $book_item->code
            );
            $result->push($book);
        }

        return $result;
    }
}
