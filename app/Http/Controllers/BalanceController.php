<?php
namespace App\Http\Controllers;

use App\Models\UserBook;
use App\Services\Balance\Main as PageService;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    protected $service;

    public function __construct(PageService $service)
    {
        $this->service = $service;
    }

    public function main()
    {
        $read_books = UserBook::read(Auth::id());
        $unread_books = UserBook::unread(Auth::id());
        $read_price = $this->service->calculate($read_books->get());
        $unread_price = $this->service->calculate($unread_books->get());
        $total_price = $read_price - $unread_price;

        return view('balance.index', [
            'unread_price' => $unread_price,
            'read_price' => $read_price,
            'total_price' => $total_price,
            'read_count' => $read_books->count(),
            'unread_count' => $unread_books->count(),
        ]);
    }
}
