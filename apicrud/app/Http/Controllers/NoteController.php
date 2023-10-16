<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\NoteResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteController extends Controller
{
   
    public function index(): JsonResource
    {
    //    $notes = Note::all();
    //    return response()->json($notes, 200);

    //   return response()->json($notes = Note::all(), 200);
    return  NoteResource::collection(Note::all());
    }

    
    public function store(NoteRequest $request):JsonResponse
    {
       $note = Note::create($request->all());
        return response()->json([
            'succes' => true,
            'data' => new NoteResource($note)
        ], 201);
    }


    public function show($id):JsonResource
    {
        $note = Note::find($id);
        
        // return response()->json($note, 200);

        return new NoteResource($note);
    }


  
    public function update(NoteRequest $request, $id):JsonResponse
    {
        $note = Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();

        return response()->json([
            'succes' => true,
            'data' => new NoteResource($note)
        ], 200);
    }

    public function destroy($id):JsonResponse
    {
        Note::find($id)->delete();
        return response()->json([
            'succes'=> true
        ], 200);
    }
}
