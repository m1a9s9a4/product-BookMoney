<?php
namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchWordController extends BaseController
{
    public function main(Request $request)
    {
        $keyword = $request->input('keyword');

        return Book::search($keyword);
    }
}
