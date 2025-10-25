<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_メールアドレスが未入力の場合はバリデーションエラーになる() {
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

    public function test_パスワードが未入力の場合はバリデーションエラーになる() {
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

    public function test_入力情報が間違ってる場合はバリデーションエラーになる() {
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

    public function test_正しい情報を入力するとログインできる() {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }
}
