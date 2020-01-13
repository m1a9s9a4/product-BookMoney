<?php


namespace App\Repositories\Api;


use Illuminate\Support\Collection;

class BookShelf
{
    protected $books = [];
    protected $total = 0;

    public function __construct(Collection $books, int $total)
    {
        $this->books = $books;
        $this->total = $total;
    }

    /**
     * @return Collection
     */
    public function getBooks(): Collection
    {
        return $this->books ?? collect([]);
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total ?? 0;
    }
}
