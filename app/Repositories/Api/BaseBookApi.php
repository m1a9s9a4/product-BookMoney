<?php

namespace App\Repositories\Api;

interface BaseBookApi
{
    public function search(string $word, int $max);
}
