<?php
namespace App\Repositories\Api\Common;

interface BaseValidateInterface
{
    public function hasIsbn($info): bool;
    public function isIsbn($isbn): bool;
    public function isForSale($string): bool;
}
