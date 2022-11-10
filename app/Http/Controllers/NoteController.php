<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return view('notes/note_create', ['data' => Note::all()]);
    }

    public function viewNoties()
    {
        return view('notes/notes', ['data' => Note::all()->where('user_id', Auth::user()->id)]);
    }

    public function store(NoteRequest $request)
    {
        $note = new Note();
        $note->name = $request->input('name');
        $note->description = $request->input('description');
        $note->user_id = Auth::user()->id;

        $note->save();

        return redirect()->route('note_create')->with('success', 'Added');
    }

    public function showSelectedNote($id)
    {
        return view('notes/selected_note', ['data' => Note::find($id)]);
    }

    public function editField($id)
    {
        return view('notes/note_update', ['data' => Note::find($id)]);
    }

    public function update($id, NoteRequest $request)
    {
        $note = Note::find($id);
        $note->name = $request->input('name');
        $note->description = $request->input('description');
        $note->save();

        return redirect()->route('selected_note', $id)->with('success', 'Updated');
    }

    public function delete($id) {
        Note::find($id)->delete();

        return redirect()->route('notes')->with('success', 'Note deleted');
    }

    public function deleteAll()
    {
        Note::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('note_create')->with('success', 'Notes deleted');
    }
}
