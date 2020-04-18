<?php
namespace App\Repositories\Api\Rakuten\Book;

use App\Repositories\Api\Common\BaseSearchInterface;
use App\Repositories\Client;

class Search implements BaseSearchInterface
{
    const BASE_URL = "https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404";

    const APPLICATION_ID_PARAMETER = 'applicationId';
    const TITLE_PARAMETER = 'title';
    const BOOK_CATEGORY_ID_PARAMETER = 'booksGenreId';
    const SORT_PARAMETER = 'sort';

    const CATEGORY_ID = '001';

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function get(string $word, int $max, int $page)
    {
        $response = [];
        if ($word && $word !== '') {
            $response = $this->client->get(self::BASE_URL, [
                self::APPLICATION_ID_PARAMETER => config('services.rakuten.application_id'),
                self::TITLE_PARAMETER => $word,
                self::BOOK_CATEGORY_ID_PARAMETER => self::CATEGORY_ID,
                self::SORT_PARAMETER => 'sales',
                'hits' => $max,
                'page' => $page,
            ]);
        }

        return $response;
    }
}
