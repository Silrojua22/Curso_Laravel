@extends('layouts.app')

@section('content')

{{-- Mostar errores de manera mas generalista --}}

{{-- @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif --}}

<a href="{{route('note.index')}}">Back</a>
    <form method="POST" action="{{ route('note.store') }}">
        @csrf
        <label>Title:</label>
        <input type="text" name='title'> <br />
        @error('title')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label>Description:</label>
        <input type="text" name='description'> <br />
        @error('description')
            <p style="color:red">{{ $message }}</p>
       @enderror
        <input type="submit" value='Create'>
    </form>
@endsection