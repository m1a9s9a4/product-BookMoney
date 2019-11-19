<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Conditions\BookCondition;

class SearchWordController extends BaseController
{
    /** @var BookCondition $book_condition */
    protected $book_condition;

    /**
     * SearchBookController constructor.
     * @param BookCondition $book_condition
     */
    public function __construct(BookCondition $book_condition)
    {
        $this->book_condition = $book_condition;
    }

    public function main(Request $request)
    {
        $keyword = $request->input('keyword');

        return $this->book_condition->search($keyword);
    }
}
