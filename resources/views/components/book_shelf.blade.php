@if(count($books) > 0)
    <v-row>
        @foreach($books as $book)
            <v-col cols="12" md="4" sm="12" xs="12">
                <book-card-component title="{{ $book->title }}" url="{{ $book->url }}" img="{{ $book->image_url }}" is_unread="{{ $read == 0 }}"></book-card-component>
            </v-col>
        @endforeach
    </v-row>
@else
    <p class="mt-5 mb-5 pt-3 pb-3 text-center alert-warning">
        まだ本が登録されていません。<br>
        登録される方は<a href="{{ route('search') }}">こちら</a>から検索してください。
    </p>
@endif
