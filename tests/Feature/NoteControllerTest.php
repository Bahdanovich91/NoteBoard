<?php

namespace Tests\Feature;

use App\Models\Note;
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
            ->get(route('index'));

        $response->assertStatus(200);
    }

    public function testViewNoteCreatePage()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user,)
            ->withSession(['banned' => false])
            ->get(route('note_create'));

        $response->assertStatus(200);
    }

    public function testViewAllNotesPage()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user,)
            ->withSession(['banned' => false])
            ->get(route('notes'));

        $response->assertStatus(200);
    }

    public function testViewShowSelectedNote()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create();

        $response = $this->actingAs($user,)
            ->withSession(['banned' => false])
            ->get(route('selected_note', $note->id));

        $response->assertStatus(200);
    }

    public function testNoteUpdateSubmit()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->post(route('note_update_submit', $note->id), [
                'name' => 'test',
                'description' => 'test@example.com'
            ]);

        $this->assertDatabaseHas('notes', [
            'name' => 'test',
            'description' => 'test@example.com'
        ]);
    }

    public function testDelete()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->get(route('note_delete', $note->id));

        $this->assertDatabaseMissing('notes', [
            'id' => $note->id,
        ]);
    }

    public function testDeleteAll()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->get(route('notes_delete'));

        $this->assertDatabaseMissing('notes', [
            'user_id' => $user->id
        ]);
    }

    public function testStore()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->post(route('store'), [
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
