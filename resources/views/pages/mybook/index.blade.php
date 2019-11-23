@extends('layouts.default')

@section('title', 'my本棚')
@section('description', 'my本棚で積読中の本と完読した本を見れます')

@section('content')

    <div class="container">
        <h2 class="heading_2 text-center">my本棚</h2>
        <h3 class="heading_2 text-center">
            これから読む！
        </h3>
        <a href="/mybook/unread">一覧はこちら</a>
        @include('components.book_shelf', ['read' => false, 'books' => $unread_books])

        <h3 class="heading_2 text-center">読んだ！</h3>
        <a href="/mybook/read">一覧はこちら</a>
        @include('components.book_shelf', ['read' => true, 'books' => $read_books])
    </div>

@endsection
