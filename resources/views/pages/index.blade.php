@extends('layouts.default')

@section('title', 'my本棚')
@section('description', 'my本棚で積読中の本と読破した本を見れます')

@section('content')
    <div class="container">
        <div class="mb-2">
            <h3 class="heading_2 text-left">読書冊数</h3>
            <p class="text-right">
                <span class="h2">{{ $read_books->count() }}</span> 冊読破中！
            </p>
        </div>
        <div>
            <h3 class="heading_2 text-left">収支総額</h3>
            @if($total_price < 0)
                <?php $color = 'text-danger' ?>
            @elseif($total_price > 0)
                <?php $color = 'text-info' ?>
            @endif
            <p class="text-right h1 {{ $color ?? '' }}">
                ¥{{ $total_price }}
            </p>
        </div>

        <h3>収支詳細</h3>
        <table class="table">
            <tbody class="text-right">
            <tr>
                <td>読んだ！</td>
                <td class="text-info">¥{{ $read_price }}</td>
            </tr>
            <tr>
                <td>積読中！</td>
                <td class="text-danger">¥{{ $unread_price }}</td>
            </tr>
            <tr>
                <td>合計！</td>
                <td class="{{ $color ?? '' }}">¥{{ $total_price }}</td>
            </tr>
            </tbody>
        </table>

        <h3 class="heading_2 text-left">積読中！</h3>
        <a href="{{ route('mybooks', ['type' => 'unread']) }}">一覧はこちら</a>
        @include('components.book_shelf', ['read' => false, 'books' => $unread_books])

        <h3 class="heading_2 text-left">読んだ！</h3>
        <a href="{{ route('mybooks', ['type' => 'read']) }}">一覧はこちら</a>
        @include('components.book_shelf', ['read' => true, 'books' => $read_books])
    </div>

@endsection
