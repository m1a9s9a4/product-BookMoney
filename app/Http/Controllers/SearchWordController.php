<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchWordController extends Controller
{
    public function main(Request $request)
    {
        $word = $request->input('word');
        $search_result = Book::search($word);
        $latest_books = Book::getLatest(5);

        return view('search.index', [
            'search_result' => $search_result,
            'latest_books' => $latest_books,
            'searched_word' => $word,
        ]);
    }
}
