<?php

namespace App\Repositories\Api\Common;

interface BaseSearchInterface
{
    public function get(string $word, int $max, int $page);
}
