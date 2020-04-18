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
    /** @var string SALEになってるものに絞る */
    const SALES_SORT_PARAMETER = 'sales';

    const CATEGORY_ID = '001';

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $word
     * @param int $max
     * @param int $page
     * @return array|mixed
     */
    public function get(string $word = '', int $max = 10, int $page = 0)
    {
        $params = [
            self::APPLICATION_ID_PARAMETER => config('services.rakuten.application_id'),
            self::BOOK_CATEGORY_ID_PARAMETER => self::CATEGORY_ID,
            self::SORT_PARAMETER => self::SALES_SORT_PARAMETER,
            'hits' => $max,
            'page' => $page,
        ];

        if ($word) {
            $params[self::TITLE_PARAMETER] = $word;
        }

        return $this->client->get(self::BASE_URL, $params);
    }
}
