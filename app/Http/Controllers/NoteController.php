<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note = Note::orderBy('id', 'desc')->get();
        return view('pages.note.index')->with('notes', $note);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'details' => 'required',
            'validity' => 'required',
        ]);

        $note = new Note;

        $note->name = $request->name;
        $note->details = $request->details;
        $note->validity = $request->validity;
        $note->save();
        session()->flash('success', 'New Note has added successfully !!');
        return redirect()->route('notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);

      return view('pages.note.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::find($id);
        return view('pages.note.edit')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:200',
            'details' => 'required',
            'validity' => 'required',
        ]);

        $note = Note::find($id);

        $note->name = $request->name;
        $note->details = $request->details;
        $note->validity = $request->validity;
        $note->save();
        session()->flash('success', 'Updated successfully !!');
        return redirect()->route('notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }

    public function delete($id)
    {
        $note = Note::find($id);
      if (!is_null($note)) {
        $note->delete();
      }

      session()->flash('success', 'note has deleted successfully !!');

      return redirect()->route('notes');
    }
}
