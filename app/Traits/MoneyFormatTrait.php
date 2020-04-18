<?php
namespace App\Traits;

trait MoneyFormatTrait
{
    public function addMoneyPrefix($int)
    {
        return '¥' . (string)$int;
    }
}
