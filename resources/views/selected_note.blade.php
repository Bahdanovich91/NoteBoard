@extends('layouts.app')

@section('title', $data->name)

@section('content')

    @include('inc.header')

    @include('inc.messages')

    <div id="notes" class="mt-4">
        <h2>Selected note</h2>
        <div class="alert alert-info">
            <h3>{{ $data->name }}</h3>
            <p>{{ $data->description }}</p>
            <a href="{{ route('note_update', $data->id) }}">
                <button>Edit</button>
            </a>
        </div>
    </div>

@endsection
