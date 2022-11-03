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

    public function showSelectedNote($id)
    {
        $note = new Note();
        return view('selected_note', ['data' => $note->find($id)]);
    }

    public function noteUpdate($id)
    {
        $note = new Note();
        return view('note_update', ['data' => $note->find($id)]);
    }

    public function noteUpdateSubmit($id, NoteRequest $request)
    {
        $note = Note::find($id);
        $note->name = $request->input('name');
        $note->description = $request->input('description');

        $note->save();

        return redirect()->route('selected_note', $id)->with('success', 'Updated');
    }

    public function deleteNote($id) {
        Note::find($id)->delete();

        return redirect()->route('notes')->with('success', 'Note deleted');
    }
}
