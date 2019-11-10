@extends('layouts.default')

@section('title', 'my本棚')
@section('description', 'my本棚で積読中の本と完読した本を見れます')

@section('content')

    <div class="container">
        <h2 class="heading_2 text-center">my本棚</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>種類</td>
                    <td>合計金額（円）</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>これから読む！</th>
                    <td>{{ number_format($unread_price) }}</td>
                </tr>
                <tr>
                    <th>読んだ！</th>
                    <td>{{ number_format($read_price) }}</td>
                </tr>
                <tr>
                    <th>合計！</th>
                    <td>{{ number_format($read_price - $unread_price) }}</td>
                </tr>
            </tbody>
        </table>
        <h3 class="heading_2 text-center">
            これから読む！
        </h3>
        <a href="/book/shelf/unread">一覧はこちら</a>
        @include('components.book_shelf', ['read' => false, 'books' => $unread_books])

        <h3 class="heading_2 text-center">読んだ！</h3>
        <a href="/book/shelf/read">一覧はこちら</a>
        @include('components.book_shelf', ['read' => true, 'books' => $read_books])
    </div>

@endsection
