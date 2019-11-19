<?php
namespace App\Services\Balance;

use App\Services\BaseService;
use App\Models\Conditions\UserBookCondition;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class Main extends BaseService
{
    protected $user_book_condition;

    public function __construct(UserBookCondition $user_book_condition)
    {
        $this->user_book_condition = $user_book_condition;
    }

    public function calculateUnreadBooksByUserId(int $user_id)
    {
        /** @var Collection $user_books */
        $user_books = $this->user_book_condition->getUnReadByUserId($user_id);

        return $user_books
            ->pluck('book')
            ->pluck('price')
            ->pluck('price')
            ->sum();
    }

    public function calculateReadBooksByUserId(int $user_id)
    {
        /** @var Collection $user_books */
        $user_books = $this->user_book_condition->getReadByUserId($user_id);

        return $user_books
            ->pluck('book')
            ->pluck('price')
            ->pluck('price')
            ->sum();
    }

    public function countReadBooks(int $user_id)
    {
        return $this->user_book_condition->getReadByUserId($user_id)->count();
    }

    public function countUnreadBooks(int $user_id)
    {
        /** @var Collection $books */
        return $this->user_book_condition->getUnReadByUserId($user_id)->count();
    }

    public function getBooksGroupedByMonths(int $user_id)
    {
        /** @var Collection $books */
        $books = $this->user_book_condition->getUnReadByUserId($user_id);
        $grouped_books = $books->groupBy(function ($book) {
            return Carbon::parse($book->updated_at)->format('M');
        });

        return $grouped_books;
    }
}
