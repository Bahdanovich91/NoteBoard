@extends('layouts.app')

@if($data)
    @section('title', $data->name)

    @section('content')

        @include('inc.header')

        @include('inc.messages')

        <div id="notes" class="mt-4">
            <h2>Selected note</h2>
            <div class="form-group mt-2">
                <h3>{{ $data->name }}</h3>
                <p>{{ $data->description }}</p>
                <a href="{{ route('note_update', $data->id) }}">
                    <button  type="submit" class="btn btn-success mt-2">Edit</button>
                </a>
                <a href="{{ route('note_delete', $data->id) }}">
                    <button type="submit" class="btn btn-danger mt-2">Delete</button>
                </a>
                @include('inc.comments.comment_form')
            </div>
        </div>

    @endsection
@endif
