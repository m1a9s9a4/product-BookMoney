<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <a class="logo" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" class="logo-img">
        <span class="logo-text">{{ config('app.name') }}</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            @guest
                <a class="nav-item nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                @if (Route::has('register'))
                    <a class="nav-item nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                @endif
            @else
                <a href="{{ url('/mybook/') }}" class="nav-item nav-link">
                    my本棚
                </a>
                <a href="{{ url('/balance/') }}" class="nav-item nav-link">
                    収支表
                </a>
                <a href="{{ url('/mybook/unread/') }}" class="nav-item nav-link">
                    これから読む！本棚
                </a>
                <a href="{{ url('/mybook/read/') }}" class="nav-item nav-link">
                    読んだ！本棚
                </a>
                <a href="{{ url('/search/') }}" class="nav-item nav-link">
                    書籍検索
                </a>
                <a class="nav-item nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    {{ __('ログアウト') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</nav>
