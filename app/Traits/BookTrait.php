<?php
namespace App\Traits;

use Illuminate\Support\Collection;

trait BookTrait
{
    /**
     * @param Collection $books
     * @return int
     */
    public function sumPrice(Collection $books): int
    {
        if ($books->isEmpty()) {
            return 0;
        }

        return number_format($books->pluck('price')->sum());
    }
}
