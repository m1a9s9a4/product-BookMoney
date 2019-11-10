<?php
namespace App\Models\Conditions;

use App\Models\Resources\Eloquent\UserBook;
use App\Models\Properties\UserBookStatusType;

class UserBookCondition extends BaseCondition
{
    protected $user_book;

    /**
     * UserBookCondition constructor.
     * @param UserBook $user_book
     */
    public function __construct(UserBook $user_book)
    {
        return $this->user_book = $user_book;
    }

    public function getReadByUserId(int $user_id)
    {
        return $this->getByUserIdAndStatusId($user_id, UserBookStatusType::READ_ID);
    }

    public function getUnReadByUserId(int $user_id)
    {
        return $this->getByUserIdAndStatusId($user_id, UserBookStatusType::UNREAD_ID);
    }

    private function getByUserIdAndStatusId(int $user_id, int $status_id)
    {
        return $this->user_book
            ->where('user_id', $user_id)
            ->where('status_id', $status_id)
            ->with(['user', 'book', 'status', 'book.price'])
            ->get();
    }
}
