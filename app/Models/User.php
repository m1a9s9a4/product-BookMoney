<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $with = [
        'books'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, UserBook::class);
    }

    public function readBooks()
    {
        return $this->books()->wherePivot('status_id', UserBookStatusType::READ_ID);
    }

    public function unreadBooks()
    {
        return $this->books()->wherePivot('status_id', UserBookStatusType::UNREAD_ID);
    }

    public function scopeFirstByEmail(Builder $builder, string $email)
    {
        return $builder->where('email', $email)->first();
    }
}
