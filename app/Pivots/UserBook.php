<?php
namespace App\Pivots;

use App\Models\Book;
use App\Models\User;
use App\Models\UserBookStatusType;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserBook extends Pivot
{
    protected $table = 'user_book';

    public function status()
    {
        return $this->belongsTo(UserBookStatusType::class, 'status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
