<div class="flrama__edit">
    <div class="edit__title">
        <h2>プロフィール設定</h2>
    </div>
    <form action="/mypage/profile" method="post" enctype="multipart/form-data" class="form">
        @csrf
        @method('patch')
        <div class="form__group">
            <div class="form__group--img">
                <img src="{{ $user->icon ? asset('storage/'.$user->icon) : asset('images/default-icon.png') }}" alt="アイコン">
            </div>
            <div class="form__button--icon">
                <input type="file" name="icon" accept="image/jpeg,image/png">
            </div>
            <div class="form__group--title">
                <span>ユーザー名</span>
            </div>
            <div class="form__group--content">
                <div class="form__group--input">
                    <input type="text" name="name">
                </div>
                <div class="form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group--title">
                <span>郵便番号</span>
            </div>
            <div class="form__group--content">
                <div class="form__group--input">
                    <input type="text" name="post_code">
                </div>
                <div class="form__error">
                    @error('post_code')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group--title">
                <span>住所</span>
            </div>
            <div class="form__group--content">
                <div class="form__group--input">
                    <input type="text" name="address">
                </div>
                <div class="form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group--title">
                <span>建物名</span>
            </div>
            <div class="form__group--content">
                <div class="form__group--input">
                    <input type="text" name="building">
                </div>
                <div class="form__error">
                    @error('building')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <button class="form__button--submit" type="submit">
            更新する
        </button>
    </form>
    </div>
</div>