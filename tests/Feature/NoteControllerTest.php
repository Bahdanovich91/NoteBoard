<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $this->post('/store', [
            'name' => 'Test User',
            'description' => 'test@example.com'
        ]);

        $this->assertDatabaseHas('notes', [
            'name' => 'Test User',
            'description' => 'test@example.com'
        ]);
    }

    public function testValidationErrors()
    {
        $response = $this->followingRedirects()->post('/store');
        $response->assertStatus(200);
        $response->assertSee('The name field is required.');
        $response->assertSee('The description field is required.');
    }
}
