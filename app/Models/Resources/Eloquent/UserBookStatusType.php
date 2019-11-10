<?php
namespace App\Models\Resources\Eloquent;

use Illuminate\Database\Eloquent\Model;

class UserBookStatusType extends Model
{
    protected $table = 'user_book_status_type';

    protected $fillable = [
        'name',
    ];

    public function userBook()
    {
        return $this->hasMany(UserBook::class);
    }
}
