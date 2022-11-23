<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->post(route('store_comment', $note->id), [
                'note_id' => $note->id,
                'user_id' => $user->id,
                'text' => 'test',
            ]);

        $this->assertDatabaseHas('comments', [
            'text' => 'test',
        ]);
    }

    public function testDelete()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create();
        $comment = Comment::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->get(route('comment_delete', [$comment->id, $note->id]));

        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id,
        ]);
    }
}
