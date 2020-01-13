<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Repositories\Api\SearchClient;
use Illuminate\Http\Request;

class SearchWordController extends Controller
{
    protected $search_client;

    public function __construct(SearchClient $search_client)
    {
        $this->search_client = $search_client;
    }

    public function main(Request $request)
    {
        $word = $request->input('word');
        $search_result = $this->search_client->search($word);
        $latest_books = Book::getLatest(5);

        return view('search.index', [
            'search_result' => $search_result,
            'latest_books' => $latest_books,
            'searched_word' => $word,
        ]);
    }
}
