<?php
namespace App\Http\Controllers\Api;

use \App\Services\Balance\Main as PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserBook;

class BalanceController extends BaseController
{
    protected $page_service;

    public function __construct(PageService $page_service)
    {
        $this->page_service = $page_service;
    }

    public function main(Request $request)
    {
        $read_books = UserBook::read(Auth::id());
        $unread_books = UserBook::unread(Auth::id());
        $read_price = $this->page_service->calculate($read_books->get());
        $unread_price = $this->page_service->calculate($unread_books->get());

        return [
            'unread_price' => number_format(0 - $unread_price),
            'read_price' => number_format($read_price),
            'total_price' => number_format($read_price - $unread_price),
        ];
    }
}
