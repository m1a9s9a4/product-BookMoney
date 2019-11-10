<?php
namespace App\Models\Conditions;

use App\Models\Resources\Eloquent\Book;

class BookCondition extends BaseCondition
{
    /**
     * @var Book
     */
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function search(string $keyword)
    {
        $query_string = '%' . $keyword . '%';

        return $this->book
            ->where('title', 'iLIKE', $query_string)
            ->orWhere('publisher', 'iLIKE', $query_string)
            ->orWhere('author', 'iLIKE', $query_string)
            ->orWhere('code', 'iLIKE', $query_string)
            ->get();
    }

    public function getLatest()
    {
        return $this->book
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }


}
