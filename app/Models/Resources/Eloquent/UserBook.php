<?php

namespace App\Models\Resources\Eloquent;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    protected $table = 'user_books';

    protected $fillable = ['user_id', 'book_id', 'status_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function status()
    {
        return $this->belongsTo(UserBookStatusType::class, 'status_id');
    }
}
