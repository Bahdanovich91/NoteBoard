@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @include('inc.header')

    <h1>NotePad</h1>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

    <div>
        <button>
            <a href="{{ route('note_create') }}">Note</a>
        </button>
    </div>
@endsection
