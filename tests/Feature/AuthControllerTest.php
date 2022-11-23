<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testRegister()
    {
        $user = $this->post(route('register_process'), [
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Test',
        ]);
    }

    public function testLogin()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user,)
            ->withSession(['banned' => false])
            ->assertAuthenticated($guard = null);
    }

    public function testLogout()
    {
        $user = User::factory()->create();
        $this->be($user);

        $this->get(route('logout'))
            ->assertRedirect(route('login'));
    }
}
