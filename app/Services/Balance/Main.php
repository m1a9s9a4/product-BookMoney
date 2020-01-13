<?php
namespace App\Services\Balance;

use App\Services\BaseService;
use Illuminate\Support\Collection;

class Main extends BaseService
{
    public function calculate(Collection $books)
    {
        if ($books->isEmpty()) {
            return 0;
        }

        return $books
            ->pluck('price')
            ->sum();
    }
}
