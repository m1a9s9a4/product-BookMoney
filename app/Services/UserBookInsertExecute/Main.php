<?php
namespace App\Services\UserBookInsertExecute;

use App\Models\Conditions\BookCondition;
use App\Services\BaseService;

class Main extends BaseService
{
    protected $book_condition;

    public function __construct(BookCondition $book_condition)
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

    public function getBookByCode($code)
    {
        return $this->book_condition
            ->getByCode($code)
            ->first();
    }
}
