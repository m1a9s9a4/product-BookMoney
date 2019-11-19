<li class="list-group-item p-1">
    <form action="/book/insert" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$book->id}}">
        <input type="hidden" name="title" value="{{$book->title}}">
        <input type="hidden" name="publisher" value="{{$book->publisher}}">
        <input type="hidden" name="author" value="{{$book->author}}">
        <input type="hidden" name="url" value="{{$book->url}}">
        <input type="hidden" name="image_url" value="{{$book->image_url}}">
        <input type="hidden" name="code" value="{{$book->code}}">

        <span v-if="isAdding" class="text-success">登録中...</span>
        <button type="submit" v-else class="btn btn-link text-left">{{$text}}</button>
    </form>
</li>
