<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">COACHTECH</h1>
            <nav class="header__nav">
                <div class="header__nav--search">
                    <input type="text" name="name_search" placeholder="なにをお探しですか？">
                </div>
                <form action="/logout" method="post">
                    @csrf
                    <button class="nav__link">
                        ログアウト
                    </button>
                </form>
                <a href="/mypage" class="nav__link">マイページ</a>
                <a href="/sell" class="nav__button">出品</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>