@if(count($books) > 0)
    <div class="book_shelf row">
        @foreach($books as $book)
            <div class="col-md-3 col-sm-6 col-6 p-3">
                <div class="card w-100">
                    <img src="{{ $book->image_url }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body">
                        <p class="card-title">
                            <a href="{{ $book->url }}">{{ $book->title }}</a>
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        @if(! $read)
                            <li class="list-group-item">
                                <a href="/user/book/read">読んだ！</a>
                            </li>
                        @endif
                        <li class="list-group-item">
                            <a href="{{ $book->url }}">Amazon</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="mt-5 mb-5 pt-3 pb-3 text-center alert-warning">
        まだ本が登録されていません。<br>
        登録される方は<a href="/search/">こちら</a>から検索してください。
    </p>
@endif
