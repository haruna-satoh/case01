<div class="login__flrama">
    <div class="login__title">
        <h2>ログイン</h2>
    </div>
    <form action="/login" method="post" class="form" novalidate>
        @csrf
        <div class="form__group">
            <div class="form__group--content">
                <div class="form__error">
                    @error('login')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group--title">
                <span>メールアドレス</span>
            </div>
            <div class="form__group--content">
                <div class="form__group--input">
                    <input type="email" name="email">
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group--title">
                <span>パスワード</span>
            </div>
            <div class="form__group--content">
                <div class="form__group--input">
                    <input type="password" name="password">
                </div>
                <div class="form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button--submit" type="submit">
                ログインする
            </button>
        </div>
        <div class="form__button--register">
            <a href="/register" class="form__register">
                会員登録はこちら
            </a>
        </div>
    </form>
</div>