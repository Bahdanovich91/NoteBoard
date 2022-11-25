<?php

namespace App\Exports;

use App\Models\Note;
use Maatwebsite\Excel\Concerns\FromCollection;

class NotesExport implements FromCollection
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Note::where('user_id', $this->id)->get();
    }
}
