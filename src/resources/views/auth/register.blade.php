<div class="register__flrama">
    <div class="register__title">
        <h2>会員登録</h2>
    </div>
    <form action="/register" method="post" class="form">
        @csrf
        <div class="form__group">
            <div class="form__group--title">
                <span>ユーザー名</span>
            </div>
            <div class="form__group--content">
                <div class="form__group--input">
                    <input type="name" name="name">
                </div>
                <div class="form__error">
                    @error('name')
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
            <div class="form__group--title">
                <span>確認用パスワード</span>
            </div>
            <div class="form__group--content">
                <div class="form__group--input">
                    <input type="password" name="password_confirmation">
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
                登録する
            </button>
        </div>
        <div class="form__button--login">
            <a href="/login" class="form__login">
                ログインはこちら
            </a>
        </div>
    </form>
</div>