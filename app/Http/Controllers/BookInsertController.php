<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Models\Book;
use App\Models\UserBook;
use App\Models\UserBookStatusType;
use App\Services\UserBookInsertExecute\Main as PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookInsertController extends BaseController
{
    protected $user_book;

    protected $page_service;

    public function __construct(UserBook $user_book, PageService $page_service)
    {
        $this->user_book = $user_book;
        $this->page_service = $page_service;
    }

    public function main(Request $request)
    {
        if (! $this->page_service->bookExists($request->input('code'))) {
            $this->page_service->saveBook($request->input());
        }

        try {
            $book = Book::byCode($request->input('code'));
            $this->user_book->save([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'status_id' => UserBookStatusType::UNREAD_ID,
            ]);
        } catch (\Exception $e) {

        }

        return redirect()->back(302);
    }
}
