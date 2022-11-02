<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        return view('notepad', ['data' => Note::all()]);
    }

    public function viewNoties()
    {
        $user = Auth::user()->id;
        return view('notes', ['data' => Note::all()->where('user_id', $user)]);
    }

    public function store(NoteRequest $request)
    {
        $note = new Note();
        $note->name = $request->input('name');
        $note->description = $request->input('description');
        $note->user_id = Auth::user()->id;

        $note->save();

        return redirect()->route('notepad')->with('success', 'Added');
    }
}
