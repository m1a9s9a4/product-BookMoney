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
            <h2 class="text-center"><span v-text="searchedKeyword"></span>の検索結果</h2>
            <div class="row">
                <div class="card mt-2 col-md-3 col-sm-6 col-xs-12" v-for="book in books">
                    <img :src="book.image_url" class="card-img-top" :alt="book.title">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a :href="book.url" v-text="book.title"></a>
                        </h5>
                        <div class="card-text">
                            <table>
                                <tr>
                                    <th>出版社</th>
                                    <td v-text="book.publisher"></td>
                                </tr>
                                <tr>
                                    <th>著者</th>
                                    <td v-text="book.author"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a :href="book.url">Amazonはこちら</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/user/book/insert">my本棚への登録はこちら</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @if(count($latest_books) > 0)
            <div class="mt-5">
                <h2 class="text-center">最近登録された本</h2>
                <div class="row p-1">
                    @foreach($latest_books as $book)
                        <div class="card mb-1 col-md-3 col-sm-6 col-xs-12">
                            <img src="{{ $book->image_url }}" class="card-img-top" alt="{{ $book->title }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ $book->url }}">{{ $book->title }}</a>
                                </h5>
                                <div class="card-text">
                                    <table>
                                        <tr>
                                            <th>出版社</th>
                                            <td>{{ $book->publisher }}</td>
                                        </tr>
                                        <tr>
                                            <th>著者</th>
                                            <td>{{ $book->author }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="{{ $book->url }}">Amazonはこちら</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/user/book/insert">my本棚への登録はこちら</a>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
