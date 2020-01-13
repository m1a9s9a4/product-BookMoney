<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserBookStatusType;
use Illuminate\Http\Request;
use App\Services\MyBookType\Main as PageService;
use Illuminate\Support\Facades\Auth;

class MyBookTypeController extends Controller
{
    protected $page_service;

    public function __construct(PageService $page_service)
    {
        $this->page_service = $page_service;
    }

    public function main(string $type_name, Request $input)
    {
        $status_id = UserBookStatusType::STATUS_RELATIONS[$type_name] ?? null;
        if (is_null($status_id)) {
            abort(404);
        }

        $books = $status_id == UserBookStatusType::READ_ID ? Auth::user()->readBooks()->get() : Auth::user()->unreadBooks()->get();
        $price = $books->pluck('price')->sum();
        $type = $type_name === 'read' ? '読んだ' : '積読中';

        return view('mybook.type.index', [
            'type_name' => $type,
            'books' => $books,
            'price' => $price,
        ]);
    }
}
