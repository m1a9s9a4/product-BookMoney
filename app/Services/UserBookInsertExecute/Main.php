<?php
namespace App\Services\UserBookInsertExecute;

use App\Services\BaseService;
use App\Models\Book;

class Main extends BaseService
{
    protected $book_condition;

    public function __construct(Book $book_condition)
    {
        $this->book_condition = $book_condition;
    }

    public function saveBook(array $input)
    {
        try {
            $this->book_condition->save($input);
        } catch (\Exception $e) {

        }
    }

    public function bookExists($code)
    {
        return Book::byCode($code)->exists();
    }
}
