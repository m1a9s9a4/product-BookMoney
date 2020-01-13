<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBookStatusType extends Model
{
    const READ_ID = 1;
    const UNREAD_ID = 2;

    const STATUS_RELATIONS = [
        'read' => self::READ_ID,
        'unread' => self::UNREAD_ID,
    ];

    protected $table = 'user_book_status_type';

    protected $fillable = [
        'name',
    ];

    public function userBook()
    {
        return $this->hasMany(UserBook::class);
    }
}
