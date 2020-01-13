@extends('layouts.default')

@section('title', 'ホーム')
@section('description', '現在の本の読んだ金額と読んでない金額をみることが出来ます。')

@section('content')
    <div class="container balance">
        <div>
            <h3>収支総額</h3>
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

        <hr class="p-1">

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

        <div class="row">
            @if($total_price !== 0)
                <div class="col-md-6 col-sm-12">
                    <hr class="p-1">
                    <h3>金額</h3>
                    <div id="balanceChart">
                        <pie-chart read="{{ $read_price }}" unread="{{ $unread_price }}"></pie-chart>
                    </div>
                    @if($read_price < $unread_price)
                        <p class="mt-3 text-center">
                            どんどん自己投資をしましょう！
                        </p>
                    @endif
                </div>
            @endif

            @if($read_count > 0 || $unread_count > 0)
                <div class="col-md-6 col-sm-12">
                    <hr class="p-1">
                    <h3>書籍の数</h3>
                    <div id="bookCountChart">
                        <pie-chart read="{{ $read_count }}" unread="{{ $unread_count }}"></pie-chart>
                    </div>
                    @if($read_count < $unread_count)
                        <p class="mt-3 text-center">
                            ここからです！毎日少しずつ読んでいきましょう
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection
