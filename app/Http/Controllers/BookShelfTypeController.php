<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookShelfType\Main as PageService;
use Illuminate\Support\Facades\Auth;

class BookShelfTypeController extends Controller
{
    protected $page_service;

    public function __construct(PageService $page_service)
    {
        $this->page_service = $page_service;
    }

    public function main(string $type_name, Request $input)
    {
        $books = $this->page_service->getBooksByUserIdAndType(1, $type_name);
        $price = $books->pluck('price.price')->sum();
        $type = $type_name === 'read' ? '読んだ！' : 'まだ読んでない！';

        return view('book.shelf.type.index', [
            'type_name' => $type,
            'books' => $books,
            'price' => $price,
        ]);
    }
}
