<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user,)
            ->withSession(['banned' => false])
            ->get('/');

        $response->assertStatus(200);
    }

    public function testViewNoties()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user,)
            ->withSession(['banned' => false])
            ->get('/notes');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->post('/store', [
                'name' => 'Test User',
                'description' => 'test@example.com'
            ]);

        $this->assertDatabaseHas('notes', [
            'name' => 'Test User',
            'description' => 'test@example.com'
        ]);
    }

    public function testStoreValidationErrors()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->post(route('store'))
            ->assertInvalid([
            'name' => 'The name field is required.',
            'description' => 'The description field is required.'
        ]);
    }
}
