<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    protected $table = 'user_books';

    protected $with = [
        'book',
    ];

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

    public function scopeBooks(Builder $builder, int $user_id)
    {
        return $builder
            ->where('user_id', $user_id);
    }

    public function scopeRead(Builder $builder, int $user_id)
    {
        return $builder
            ->where('user_id', $user_id)
            ->where('status_id', UserBookStatusType::READ_ID);
    }

    public function scopeUnread(Builder $builder, int $user_id)
    {
        return $builder
            ->where('user_id', $user_id)
            ->where('status_id', UserBookStatusType::UNREAD_ID);
    }
}
