<?php
namespace App\Services\MyBookType;

use App\Models\UserBook;
use App\Services\BaseService;
use Illuminate\Support\Collection;

class Main extends BaseService
{
    public function getBooksByUserIdAndType(int $user_id, string $type)
    {
        if ($type === 'read') {
            /** @var Collection $books */
            $books = UserBook::read($user_id)->get();
        } elseif ($type === 'unread') {
            /** @var Collection $books */
            $books = UserBook::unread($user_id)->get();
        } else {
            return collect();
        }

        return $books->pluck('book');
    }
}
