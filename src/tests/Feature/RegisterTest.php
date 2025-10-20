<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function 名前が未入力の場合はバリデーションエラーになる() {
        $formData = [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post('/register', $formData);

        $response->assertSessionHasErrors(['name']);

        $this->assertStringContainsString(
            'お名前を入力してください',
            session('errors')->first('name')
        );
    }

    /** @test */
    public function メールアドレスが未入力の場合はバリデーションエラーになる() {
        $formData = [
            'name' => 'テスト太郎',
            'email' => '',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post('/register', $formData);

        $response->assertSessionHasErrors(['email']);

        $this->assertStringContainsString(
            'メールアドレスを入力してください',
            session('errors')->first('email')
        );
    }

    /** @test */
    public function パスワードが未入力の場合はバリデーションエラーになる() {
        $formData = [
            'name' => 'テスト太郎',
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => '',
        ];

        $response = $this->post('/register', $formData);

        $response->assertSessionHasErrors(['password']);

        $this->assertStringContainsString(
            'パスワードを入力してください',
            session('errors')->first('password')
        );
    }

    /** @test */
    public function パスワードが7文字以下の場合はバリデーションエラーになる() {
        $formData = [
            'name' => 'テスト太郎',
            'email' => 'test@example.com',
            'password' => 'pass12',
            'password_confirmation' => 'pass12',
        ];

        $response = $this->post('/register', $formData);

        $response->assertSessionHasErrors(['password']);

        $this->assertStringContainsString(
            'パスワードは8文字以上で入力してください',
            session('errors')->first('password')
        );
    }

    /** @test */
    public function パスワードが一致しない場合はバリデーションエラーになる() {
        $formData = [
            'name' => 'テスト太郎',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password12',
        ];

        $response = $this->post('/register', $formData);

        $response->assertSessionHasErrors(['password']);

        $this->assertStringContainsString(
            'パスワードと一致しません',
            session('errors')->first('password')
        );
    }
}
