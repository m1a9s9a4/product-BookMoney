<div class="mb-1 col-md-3 col-sm-6 p-1">
    <div class="card">
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
            @include('components.add_book_button', ['text' => 'my本棚に登録する', 'book_id' => $book->id])
        </ul>
    </div>
</div>
