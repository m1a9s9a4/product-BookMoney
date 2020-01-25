<?php
namespace App\Repositories\Api\Google\Book;

use App\Repositories\Api\Common\BaseValidateInterface;

class Validate implements BaseValidateInterface
{
    const FOR_SALE = 'FOR_SALE';
    const NOT_FOR_SALE = 'NOT_FOR_SALE';

    const ISBN = 'ISBN_13';

    public function hasIsbn($item): bool
    {
        foreach ($item->volumeInfo->industryIdentifiers as $identifier) {
            if ($this->isIsbn($identifier->type)) {
                return true;
            }
        }

        return false;
    }

    public function isIsbn($isbn): bool
    {
        return $isbn === self::ISBN;
    }

    public function isForSale($item): bool
    {
        $sale_info = $item->saleInfo;

        return $sale_info->saleability === self::FOR_SALE;
    }
}
