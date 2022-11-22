<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store($id, CommentRequest $request)
    {
        Comment::create([
            'note_id' => $id,
            'user_id' => Auth::id(),
            'text' => $request->input('text'),
        ]);

        return redirect()->route('selected_note', $id)->with('success', 'Added');
    }
}
