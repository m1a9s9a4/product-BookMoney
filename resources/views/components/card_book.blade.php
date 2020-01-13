<div class="mb-1 col-md-3 col-sm-6 col-6 p-1">
    <div class="card book_card">
        <img src="{{ $book->getImageUrl() }}" class="card-img-top" alt="{{ $book->getTitle() }}">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ $book->getUrl() }}" target="_blank">{{ $book->getTitle() }}</a>
            </h5>
            <div class="card-text">
                <table>
                    <tr>
                        <th>出版社</th>
                        <td>{{ $book->getPublisher() }}</td>
                    </tr>
                    <tr>
                        <th>著 者</th>
                        <td>
                            {{ $book->getAuthorsAsString() }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="{{ $book->getUrl() }}" target="_blank">Amazonはこちら</a>
            </li>
            @include('components.add_book_button', ['text' => 'my本棚に登録する', 'book' => $book])
        </ul>
    </div>
</div>
