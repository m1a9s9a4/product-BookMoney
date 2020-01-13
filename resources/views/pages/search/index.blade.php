@extends('layouts.default')

@section('title', '書籍検索')
@section('description', 'my本棚に登録する書籍を検索するページです')

@section('content')
    <div class="container">
        <div id="searchBox">
            <h2 class="text-center">本を検索する</h2>
            <form action="/search/" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="本の名前, AmazonURL, バーコード番号" name="word">
                </div>
                <button class="btn btn-primary btn-lg btn-block" @click="searchKeyWord()">検索する</button>
            </form>

            @if($searched_word)
                @if($total > 0)
                    <div class="mt-5 book_card">
                        <h2 class="text-center heading_2"><span>{{ $searched_word }}</span>の検索結果</h2>
                        <div class="row p-1">
                            @foreach($searched_books as $book)
                                @card_book(['book' => $book])
                                @endcard_book
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="mt-5 mb-5 pt-3 pb-3 text-center alert-danger">検索結果がありません。</p>
                @endif
            @endif
        </div>

        @if(count($latest_books) > 0)
            <div class="mt-5 book_card">
                <h2 class="text-center heading_2">最近追加された本</h2>
                <div class="row p-1">
                    @foreach($latest_books as $book)
                        @card_book(['book' => $book])
                        @endcard_book
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
