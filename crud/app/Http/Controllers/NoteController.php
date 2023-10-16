<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Note;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
  public function index(): View
  {
    $notes = Note::all();
    return view('note.index', compact('notes'));
  }

  public function create(): View
  {
    return view('note.create');
  }

  public function store(NoteRequest $request): RedirectResponse
  {
    // $note = new Note;
    // $note->title = $request->title;
    // $note->description = $request->description;
    // $note->save();

    // Note::create([
    //     'title'=> $request->title;
    //     'description'=> $request->description;
    // ])

    //Validaciones    
    // $request->validate([
    //   'title' => 'required | max:255 | min: 3',
    //   'description' => 'required | max:255 | min:3',
    // ]); 

    

    Note::create($request->all());
    
    return redirect()->route('note.index')->with('succes', 'Note created');
  }

  public function edit(Note $note) : View
  {
    // $myNote = Note::find($note);
    return view('note.edit', compact('note'));
  }


  public function update(NoteRequest $request, Note $note): RedirectResponse
  {
    //Validaciones
    // $request->validate([
    //   'title' => 'required | max:255 | min: 3',
    //   'description' => 'required | max:255 | min:3',
    // ]); 

    $note->update($request->all());

//    $note = Note::find($note);
//    $note->title = $request->title;
//    $note->description = $request->description;
//    $note->save();
    return redirect()->route('note.index')->with('succes', 'Note updated');
  }

  public function show(Note $note) : View
  {
    return view('note.show', compact('note'));
  }

  public function destroy(Note $note) : RedirectResponse
  {
    $note->delete();
    return redirect()->route('note.index')->with('danger', 'Note deleted');
  }
}






  /*

  C = Create
  R = Read
  U = Update
  D = Delete

  */ 