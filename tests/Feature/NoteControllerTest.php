<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_store()
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
}
