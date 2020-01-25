<?php
namespace App\Repositories\Api\Google\Book;

use App\Repositories\Api\Common\BaseSearchInterface;
use App\Repositories\Client;

class Search implements BaseSearchInterface
{
    const URL = 'https://www.googleapis.com/books/v1/volumes/';

    const PARAM_LETTER = 'q';

    protected $client;

    protected $validation;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function get(string $word = '', int $max = 12, int $page = 0)
    {
        $response = [];
        if ($word && $word !== '') {
            $response = $this->client->get(self::URL, [
                self::PARAM_LETTER => 'intitle:' . str_replace(' ', '+', $word),
                'maxResults' => $max,
                'startIndex' => $page,
                'orderBy' => 'newest'
            ]);
        }

        return $response;
    }
}
