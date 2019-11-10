<?php
namespace App\Models\Resources\Eloquent;

use Illuminate\Database\Eloquent\Model;

class BookPrice extends Model
{
    protected $table = 'book_price';

    protected $fillable = [
        'book_id',
        'price',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
