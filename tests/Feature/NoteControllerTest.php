<?php

namespace Tests\Feature;

use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $note = new Note();
        $note->name = 'test name';
        $note->description = 'test description';

        $note->save();

        $response = $this->get('/notepad');

        $response->assertStatus(200);
        $response->assertSee([
            'test name',
            'test description'
        ]);
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

    public function testStoreValidationErrors()
    {
        $response = $this->followingRedirects()->post('/store');
        $response->assertStatus(200);
        $response->assertSee('The name field is required.');
        $response->assertSee('The description field is required.');
    }
}
