@extends('layouts.default')

@section('title', 'my本棚')
@section('description', 'my本棚で積読中の本と完読した本を見れます')

@section('content')
    <v-app>
        <v-btn color="primary">Primary</v-btn>
    </v-app>
    <div class="container">
        <div class="mb-2">
            <h3 class="heading_2 text-left">my本棚</h3>
            <p>
                {{ Auth::user()->name }}さんのすでに読み終えた本とまだ読み終えていない本を、それぞれ最大4冊表示しています。<br>
                一覧をみたい方は、それぞれのセクションの「一覧はこちら」をクリックしてください。
            </p>
        </div>
        <div>
            <h3 class="heading_2 text-left">収支総額</h3>
            @if($total_price < 0)
                <p class="text-right h1 text-danger">
                    ¥{{ $total_price }}
                </p>
            @elseif($total_price > 0)
                <p class="text-right h1 text-info">
                    ¥{{ $total_price }}
                </p>
            @else
                <p class="text-right h1">
                    ¥{{ $total_price }}
                </p>
            @endif
        </div>

        <h3>収支詳細</h3>
        <table class="table">
            <tbody class="text-right">
            <tr>
                <td>読んだ！</td>
                <td class="text-info">¥{{ number_format($read_price) }}</td>
            </tr>
            <tr>
                <td>積読中！</td>
                <td class="text-danger">¥{{ number_format(0 - $unread_price) }}</td>
            </tr>
            <tr>
                <td>合計！</td>
                @if($read_price > $unread_price)
                    <td class="text-info">¥{{ number_format($total_price) }}</td>
                @elseif($read_price < $unread_price)
                    <td class="text-danger">¥{{ number_format($total_price) }}</td>
                @else
                    <td>¥{{ number_format($total_price) }}</td>
                @endif
            </tr>
            </tbody>
        </table>

        <h3 class="heading_2 text-left">積読中！</h3>
        <a href="/mybook/unread">一覧はこちら</a>
        @include('components.book_shelf', ['read' => false, 'books' => $unread_books])

        <h3 class="heading_2 text-left">読んだ！</h3>
        <a href="/mybook/read">一覧はこちら</a>
        @include('components.book_shelf', ['read' => true, 'books' => $read_books])
    </div>

@endsection
