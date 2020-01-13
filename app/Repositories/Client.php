<?php

namespace App\Repositories;

class Client
{
    public function get($url, $parameters)
    {
        $response = file_get_contents($url . '?' . http_build_query($parameters));

        return json_decode($response);
    }
}
