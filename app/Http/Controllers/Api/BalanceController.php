<?php
namespace App\Http\Controllers\Api;

use \App\Services\Balance\Main as PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends BaseController
{
    protected $page_service;

    public function __construct(PageService $page_service)
    {
        $this->page_service = $page_service;
    }

    public function main(Request $request)
    {
        $unread_price = $this->page_service->calculateUnreadBooksByUserId(Auth::id());
        $read_price = $this->page_service->calculateReadBooksByUserId(Auth::id());

        return [
            'unread_price' => number_format(0 - $unread_price),
            'read_price' => number_format($read_price),
            'total_price' => number_format($read_price - $unread_price),
        ];
    }
}
