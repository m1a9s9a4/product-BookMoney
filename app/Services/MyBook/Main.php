<?php
namespace App\Services\MyBook;

use App\Models\Conditions\UserBookCondition;
use App\Services\BaseService;
use Illuminate\Support\Collection;

class Main extends BaseService
{
    protected $user_book_condition;

    public function __construct(UserBookCondition $user_book_condition)
    {
        $this->user_book_condition = $user_book_condition;
    }

    public function getReadBooksByUserId(int $user_id)
    {
        /** @var Collection $user_books */
        $user_books = $this->user_book_condition->getReadByUserId($user_id);

        return $user_books->pluck('book');
    }

    public function getUnReadBooksByUserId(int $user_id)
    {
        /** @var Collection $user_books */
        $user_books = $this->user_book_condition->getUnReadByUserId($user_id);

        return $user_books->pluck('book');
    }

    public function sumBookPrices(Collection $books)
    {
        return $books->pluck('price')->pluck('price')->sum();
    }
}
