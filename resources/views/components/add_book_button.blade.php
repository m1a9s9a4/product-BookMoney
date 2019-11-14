<li class="list-group-item">
    <form action="/user/book/insert" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $book->id }}">
        <input type="hidden" name="title" value="{{ $book->title }}">
        <input type="hidden" name="publisher" value="{{ $book->publisher }}">
        <input type="hidden" name="author" value="{{ $book->author }}">
        <input type="hidden" name="url" value="{{ $book->url }}">
        <input type="hidden" name="image_url" value="{{ $book->image_url }}">
        <input type="hidden" name="code" value="{{ $book->code }}">
        <button type="submit" class="text-primary">{{ $text }}</button>
    </form>
</li>
