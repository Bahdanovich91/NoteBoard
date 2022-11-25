<?php

namespace App\Http\Controllers;

use App\Exports\NotesExport;
use App\Http\Requests\NoteRequest;
use App\Models\Comment;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('notes/selected_note', [
            'data' => Note::find($id),
            'comment' => Comment::all()->where('note_id', $id)
        ]);
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
        Note::where('user_id', '=', Auth::user()->id)->delete();

        return redirect()->route('notes')->with('success', 'Notes deleted');
    }

    public function download()
    {
        $notes = Note::all()->where('user_id', Auth::user()->id);

        $text = '';
        foreach ($notes as $note) {
            $text .= $note->name . "\n" . $note->description . "\n\n";
        }

        Storage::put('notes.txt', $text);

        return Storage::download('notes.txt', 'download');
    }

    public function downloadExcel()
    {
        $id = Auth::user()->id;

        return  Excel::download(new NotesExport($id), 'notes.xlsx');
    }
}
