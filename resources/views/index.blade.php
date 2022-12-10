@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @include('inc.header')

    <h1>NotePad</h1>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

    <div>
        <a href="{{ route('note_create') }}">
            <button type="submit" class="btn btn-success mt-2">
                Note
            </button>
        </a>
    </div>
@endsection
