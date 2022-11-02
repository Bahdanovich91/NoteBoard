<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testRegisterAndLogin()
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

        $this->get('/logout')
            ->assertRedirect('/login');
    }
}
