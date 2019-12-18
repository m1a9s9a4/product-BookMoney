<?php
namespace App\Services\MyBook;

use App\Services\BaseService;
use Illuminate\Support\Collection;

class Main extends BaseService
{
    public function sumBookPrices(Collection $books)
    {
        if ($books->isEmpty()) {
            return 0;
        }

        return $books->pluck('book')->pluck('price')->pluck('price')->sum();
    }
}
