@extends('layouts.default')

@section('title', 'my本棚')
@section('description', 'my本棚で積読中の本と読破した本を見れます')

@section('content')
    <div class="container">
        <v-row>
            <v-col cols="12" md="6" sm="12" xs="12" class="mb-2">
                <h3 class="heading_2 text-left">
                    読書冊数
                    <v-icon color="success">mdi-bookmark-check-outline</v-icon>
                </h3>
                <p class="text-right p-3 alert-info">
                    <span class="h2">{{ $read_books->count() }}</span> 冊読破中！
                </p>
                <h3 class="heading_2 text-left">
                    積読冊数
                    <v-icon color="blue-grey">mdi-book-multiple-outline</v-icon>
                </h3>
                <p class="text-right p-3 alert-info">
                    @if($unread_books->count() > 0)
                        <span class="h2">{{ $unread_books->count() }}</span> 冊積読中！
                    @else
                        積読はありません！おめでとうございます！
                    @endif
                </p>
            </v-col>
            <v-col cols="12" md="6" sm="12" xs="12" class="mb-2">
                <h3 class="heading_2 text-left">収支総額</h3>
                @if($total_price < 0)
                    <?php $color = 'text-danger' ?>
                @elseif($total_price > 0)
                    <?php $color = 'text-info' ?>
                @endif
                <p class="text-right h1 {{ $color ?? '' }}">
                    ¥{{ $total_price }}
                </p>

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
            </v-col>

        </v-row>



        <h3 class="heading_2 text-left">積読中！</h3>
        <a href="{{ route('mybooks', ['type' => 'unread']) }}">一覧はこちら</a>
        @include('components.book_shelf', ['read' => false, 'books' => $unread_books])

        <h3 class="heading_2 text-left">読んだ！</h3>
        <a href="{{ route('mybooks', ['type' => 'read']) }}">一覧はこちら</a>
        @include('components.book_shelf', ['read' => true, 'books' => $read_books])
    </div>

@endsection
