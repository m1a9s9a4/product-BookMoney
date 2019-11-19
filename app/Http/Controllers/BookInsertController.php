<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Models\Conditions\UserBookCondition;
use App\Models\Properties\UserBookStatusType;
use App\Services\UserBookInsertExecute\Main as PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookInsertController extends BaseController
{
    /** @var UserBookCondition $user_book_condition */
    protected $user_book_condition;

    protected $page_service;

    public function __construct(
        UserBookCondition $user_book_condition,
        PageService $page_service
    )
    {
        $this->user_book_condition = $user_book_condition;
        $this->page_service = $page_service;
    }

    public function main(Request $request)
    {
        if (! $book_id = $request->input('id')) {
            $this->page_service->saveBook($request->input());
        }

        try {
            $book = $this->page_service->getBookByCode($request->input('code'));
            $this->user_book_condition->save(Auth::id(), $book->id,UserBookStatusType::UNREAD_ID);
        } catch (\Exception $e) {

        }

        return redirect()->back(302);
    }
}
