<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;
use Database\Seeders\NoteSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
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

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->post('/store', [
                'name' => 'Test User',
                'description' => 'test@example.com'
            ]);

        $response = $this->actingAs($user,)
            ->withSession(['banned' => false])
            ->get(route('selected_note', $id = 1));

        $response->assertStatus(200);
    }

    public function testNoteUpdateSubmit()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->post('/store', [
                'name' => 'Test User',
                'description' => 'test@example.com'
            ]);

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->post(route('note_update_submit', $id = 2), [
                'name' => '2',
                'description' => '2@example.com'
            ]);

        $this->assertDatabaseHas('notes', [
            'name' => '2',
            'description' => '2@example.com'
        ]);
    }

    public function testDeleteNote()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->post('/store', [
                'name' => 'name',
                'description' => 'sally@example.com'
            ]);
        $id = DB::table('notes')->where('name', 'name')->value('id');

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->get(route('note_delete', $id));

        $this->assertDatabaseMissing('notes', [
            'name' => 'name',
            'description' => 'sally@example.com'
        ]);
    }

    public function testDeleteAllNotes()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->post('/store', [
                'name' => 'Test',
                'description' => 'sally@example.com'
            ]);

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->get(route('notes_delete'));

        $this->assertDatabaseMissing('notes', [
            'name' => 'sally@example.com',
        ]);
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
