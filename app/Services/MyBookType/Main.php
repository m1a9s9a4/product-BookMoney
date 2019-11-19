<?php
namespace App\Services\MyBookType;

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

    public function getBooksByUserIdAndType(int $user_id, string $type)
    {
        if ($type === 'read') {
            /** @var Collection $books */
            $books = $this->user_book_condition->getReadByUserId($user_id);
        } elseif ($type === 'unread') {
            /** @var Collection $books */
            $books = $this->user_book_condition->getUnReadByUserId($user_id);
        } else {
            return collect();
        }

        return $books->pluck('book');
    }
}
