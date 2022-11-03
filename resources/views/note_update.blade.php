@extends('layouts.app')

@section('title', 'Editing a note')

@section('content')

    @include('inc.header')

    <h1>Editing a note</h1>

    <div>
        @include('inc.messages')
    </div>

    <form action="{{ route('note_update_submit', $data->id) }}" method="POST">
        @csrf
        <div class="form-group mt-2">
            <label for="name">Your name</label>
            <input type="text" name="name" id="name" value="{{$data->name}}" placeholder="Your name"
                   class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Description"
                      class="form-control">{{$data->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>

@endsection
