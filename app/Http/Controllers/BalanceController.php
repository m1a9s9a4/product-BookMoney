<?php
namespace App\Http\Controllers;

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
        $unread_price = $this->service->calculateUnreadBooksByUserId(Auth::id());
        $read_price = $this->service->calculateReadBooksByUserId(Auth::id());
        $total_price = $read_price - $unread_price ?? 0;

        $read_count = $this->service->countReadBooks(Auth::id());
        $unread_count = $this->service->countUnreadBooks(Auth::id());

        return view('balance.index', [
            'unread_price' => $unread_price,
            'read_price' => $read_price,
            'total_price' => $total_price,
            'read_count' => $read_count,
            'unread_count' => $unread_count,
        ]);
    }
}
