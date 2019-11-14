<?php
namespace App\Models\Conditions;

use App\Models\Resources\Eloquent\Book;
use Illuminate\Support\Arr;

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

    public function getByCode(string $code)
    {
        return $this->book
            ->where('code', $code)
            ->get();
    }

    public function save(array $input)
    {
        $this->book->title = Arr::get($input, 'title');
        $this->book->publisher = Arr::get($input, 'publisher');
        $this->book->author = Arr::get($input, 'author');
        $this->book->url = Arr::get($input, 'url');
        $this->book->image_url = Arr::get($input, 'image_url');
        $this->book->code = Arr::get($input, 'code');
        $this->book->save();
    }
}
