@extends('layouts.default')

@section('title', '書籍検索')
@section('description', 'my本棚に登録する書籍を検索するページです')

@section('content')
    <div class="container">
        <h2 class="text-center">本を検索する</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="本の名前, AmazonURL, バーコード番号" v-model="keyword">
        </div>
        <button type="button" class="btn btn-primary btn-lg btn-block" @click="searchKeyWord()">検索する</button>

        <div v-if="isSearching" class="mt-5 mb-5">
            <scale-loader :loading="isSearching"></scale-loader>
        </div>

        <p v-if="message" class="mt-5 mb-5 pt-3 pb-3 text-center alert-danger" v-text="message"></p>

        <div v-if="books.length > 0" class="mt-5">
            <h2 class="text-cente heading_2"><span v-text="searchedKeyword"></span>の検索結果</h2>
            <div class="row p-1">
                <div v-for="book in books" class="w-100">
                    @include('components.card_book_js')
                </div>
            </div>
        </div>

        @if(count($latest_books) > 0)
            <div class="mt-5">
                <h2 class="text-center heading_2">最近登録された本</h2>
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
