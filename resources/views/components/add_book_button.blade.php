<li class="list-group-item p-1">
    <form action="/book/insert" method="post">
        @csrf
        <input type="hidden" name="title" value="{{$book->getTitle()}}">
        <input type="hidden" name="publisher" value="{{$book->getPublisher()}}">
        <input type="hidden" name="author" value="{{$book->getAuthorAsString()}}">
        <input type="hidden" name="url" value="{{$book->getUrl()}}">
        <input type="hidden" name="image_url" value="{{$book->getImageUrl()}}">
        <input type="hidden" name="code" value="{{$book->getCode()}}">

        <span v-if="isAdding" class="text-success">登録中...</span>
        <button type="submit" v-else class="btn btn-link text-left">{{$text}}</button>
    </form>
</li>
