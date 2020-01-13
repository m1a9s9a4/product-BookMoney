<?php
namespace App\Http\Controllers;

use App\Models\UserBookStatusType;
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
        return abort(404);

        $books = Auth::user()->books();
        $read_books = $books->wherePivot('status_id', UserBookStatusType::READ_ID)->get();
        $unread_books = $books->wherePivot('status_id', UserBookStatusType::UNREAD_ID)->get();
        $read_price = $this->service->calculate($read_books);
        $unread_price = $this->service->calculate($unread_books);
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
