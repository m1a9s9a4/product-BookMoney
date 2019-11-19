<?php

namespace App\Models\Conditions;

use App\Models\Resources\Eloquent\User;
use Illuminate\Support\Arr;

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

    public function save($array)
    {
        $this->user->name = Arr::get($array, 'name', null);
        $this->user->email = Arr::get($array, 'email', null);
        $this->user->password = Arr::get($array, 'password', null);
        return $this->user->save();
    }

    public function where(string $key, string $value)
    {
        return $this->user->where($key, $value);
    }
}
