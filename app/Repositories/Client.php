<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Log;

class Client
{
    public function get($url, $parameters)
    {
        $full_url = $url . '?' . http_build_query($parameters);
        try {
            $response = file_get_contents($full_url);
        } catch (\Exception $exception) {
            Log::alert('unable to access due to error.' . PHP_EOL
                . 'message: ' . $exception->getMessage() . PHP_EOL
                . 'url: ' . $full_url
            );
            return [];
        }

        return json_decode($response);
    }
}
