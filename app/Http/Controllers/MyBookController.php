<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyBook\Main as PageService;
use Illuminate\Support\Facades\Auth;
use App\Models\UserBook;

class MyBookController extends Controller
{
    protected $page_service;

    /**
     * BookShelfController constructor.
     * @param PageService $page_service
     */
    public function __construct(PageService $page_service)
    {
        $this->page_service = $page_service;
    }

    public function main(Request $request)
    {
        $read_books = UserBook::read(Auth::id())->get();
        $unread_books = UserBook::unread(Auth::id())->get();
        $read_price = $this->page_service->sumBookPrices($read_books);
        $unread_price = $this->page_service->sumBookPrices($unread_books);

        return view('mybook.index', [
            'read_books' => $read_books->pluck('book'),
            'read_price' => $read_price,
            'unread_books' => $unread_books->pluck('book'),
            'unread_price' => $unread_price,
        ]);
    }
}
