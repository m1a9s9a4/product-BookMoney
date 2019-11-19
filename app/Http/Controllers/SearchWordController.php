<?php
namespace App\Http\Controllers;

use App\Models\Conditions\BookCondition;
use Illuminate\Http\Request;

class SearchWordController extends Controller
{
    protected $book_condition;

    public function __construct(BookCondition $book_condition)
    {
        $this->book_condition = $book_condition;
    }

    public function main(Request $request)
    {
        $word = $request->input('word');
        $search_result = $this->book_condition->search($word);
        $latest_books = $this->book_condition->getLatest();

        return view('search.index', [
            'search_result' => $search_result,
            'latest_books' => $latest_books,
            'searched_word' => $word,
        ]);
    }
}
