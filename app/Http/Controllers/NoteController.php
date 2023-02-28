<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Product;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $note = Note::create([
            'product_id' => $data['id'],
            'content' => $data['newNote']
        ]);

        return response()->json(compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
    }

}
