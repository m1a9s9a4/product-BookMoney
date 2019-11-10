<?php

namespace App\Models\Conditions;

use App\Models\Resources\Eloquent\User;

class UserCondition extends BaseCondition
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getReadBooksById($user_id)
    {
        return $this->user
            ->where('id', $user_id)
            ->with(['books', 'user_books'])
            ->get();
    }
}
