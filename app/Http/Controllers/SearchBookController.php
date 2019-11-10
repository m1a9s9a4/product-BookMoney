<?php
namespace App\Http\Controllers;

use App\Models\Conditions\BookCondition;
use Illuminate\Http\Request;

class SearchBookController extends Controller
{
    protected $book_condition;

    public function __construct(BookCondition $book_condition)
    {
        $this->book_condition = $book_condition;
    }

    public function main(Request $request)
    {
        $latest_books = $this->book_condition->getLatest();

        return view('search.book.index', [
            'latest_books' => $latest_books,
        ]);
    }
}
