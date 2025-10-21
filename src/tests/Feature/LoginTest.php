<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function メールアドレスが未入力の場合はバリデーションエラーになる() {
        $formData = [
            'email' => '',
            'password' => 'password123',
        ];

        $response = $this->post('/login', $formData);

        $response->assertSessionHasErrors(['email']);

        $this->assertStringContainsString(
            'メールアドレスを入力してください',
            session('errors')->first('email')
        );
    }

    /** @test */
    public function パスワードが未入力の場合はバリデーションエラーになる() {
        $formData = [
            'email' => 'test@example.com',
            'password' => '',
        ];

        $response = $this->post('/login', $formData);

        $response->assertSessionHasErrors(['password']);

        $this->assertStringContainsString(
            'パスワードを入力してください',
            session('errors')->first('password')
        );
    }

    /** @test */
    public function 入力情報が間違ってる場合はバリデーションエラーになる() {
        $response = $this->post('/login', [
            'email' => 'no_user@example.com',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors(['login']);

        $this->assertStringContainsString(
            'ログイン情報が登録されていません',
            session('errors')->first('login')
        );
    }
}
