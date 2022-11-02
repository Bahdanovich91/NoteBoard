<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        return view('notepad', ['data' => Note::all()]);
    }

    public function viewNoties()
    {
        return view('notes', ['data' => Note::all()]);
    }

    public function store(NoteRequest $request)
    {
        $note = new Note();
        $note->name = $request->input('name');
        $note->description = $request->input('description');

        $note->save();

        return redirect()->route('notepad')->with('success', 'Added');
    }
}
