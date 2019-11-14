@extends('layouts.default')

@section('title', 'my本棚')
@section('description', 'my本棚で積読中の本と完読した本を見れます')

@section('content')

    <div class="container">
        <h3 class="heading_2 text-center">{{ $type_name }}本棚</h3>
        <p class="text-center"><span class="font-weight-bold">{{ number_format($price) }}</span>円分あります</p>
        @include('components.book_shelf', ['read' => false, 'books' => $books])
    </div>

@endsection
