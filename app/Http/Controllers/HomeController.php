<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Traits\BookTrait;
use App\Traits\MoneyFormatTrait;

class HomeController extends Controller
{
    use BookTrait,
        MoneyFormatTrait;

    public function main()
    {
        $read_books = Auth::user()->readBooks()->get();
        $unread_books = Auth::user()->unreadBooks()->get();
        $read_price = $this->sumPrice($read_books);
        $unread_price = $this->sumPrice($unread_books);
        $total_price = $read_price - $unread_price;

        return view('index', [
            'read_books' => $read_books,
            'read_price' => $read_price,
            'unread_books' => $unread_books,
            'unread_price' => $unread_price * -1,
            'total_price' => number_format($total_price),
        ]);
    }
}
