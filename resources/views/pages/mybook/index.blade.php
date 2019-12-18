@extends('layouts.default')

@section('title', 'my本棚')
@section('description', 'my本棚で積読中の本と完読した本を見れます')

@section('content')
    <v-app>
        <v-btn color="primary">Primary</v-btn>
    </v-app>
    <div class="container">
        <div class="mb-2">
            <h2 class="heading_2 text-left">
                <i class="material-icons"></i>
                my本棚
            </h2>
            <p>
                {{ Auth::user()->name }}さんのすでに読み終えた本とまだ読み終えていない本を、それぞれ最大4冊表示しています。<br>
                一覧をみたい方は、それぞれのセクションの「一覧はこちら」をクリックしてください。
            </p>
        </div>
        <h3 class="heading_2 text-left">
            これから読む！
        </h3>
        <a href="/mybook/unread">一覧はこちら</a>
        @include('components.book_shelf', ['read' => false, 'books' => $unread_books])

        <h3 class="heading_2 text-left">読んだ！</h3>
        <a href="/mybook/read">一覧はこちら</a>
        @include('components.book_shelf', ['read' => true, 'books' => $read_books])
    </div>

@endsection
