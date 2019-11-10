<?php

namespace App\Models\Resources\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title', 'publisher', 'author', 'url', 'code'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, UserBook::class);
    }

    public function userBook()
    {
        return $this->hasMany(UserBook::class);
    }
}
