<?php
namespace App\Http\Controllers;

use App\Repositories\Api\SearchClient;
use Illuminate\Http\Request;
use App\Services\SearchWord\Main as PageService;

class SearchWordController extends Controller
{
    const DEFAULT_SEARCH_WORD = '';

    const DEFAULT_PER_PAGE = 12;

    protected $search_client;

    protected $page_service;

    public function __construct(
        SearchClient $search_client,
        PageService $page_service
    )
    {
        $this->search_client = $search_client;
        $this->page_service = $page_service;
    }

    public function main(Request $request, int $page = 1)
    {
        $word = $request->input('word') ?? self::DEFAULT_SEARCH_WORD;
        $search_result = $this->search_client->search($word, self::DEFAULT_PER_PAGE, $page);

        return view('search.index', [
            'total' => $search_result->getTotal(),
            'searched_books' => $search_result->getBooks(),
            'searched_word' => $word,
        ]);
    }
}
