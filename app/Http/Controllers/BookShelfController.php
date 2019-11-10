<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookShelf\Main as PageService;

class BookShelfController extends Controller
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
        $read_books = $this->page_service->getReadBooksByUserId(1);
        $read_price = $this->page_service->sumBookPrices($read_books);

        $unread_books = $this->page_service->getUnReadBooksByUserId(1);
        $unread_price = $this->page_service->sumBookPrices($unread_books);

        return view('book.shelf.index', [
            'read_books' => $read_books,
            'read_price' => $read_price,
            'unread_books' => $unread_books,
            'unread_price' => $unread_price,
        ]);
    }
}
