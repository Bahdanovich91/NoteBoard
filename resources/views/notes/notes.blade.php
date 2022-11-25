@extends('layouts.app')

@section('title', 'Notes')

@section('content')

    @include('inc.header')

    <div id="notes" class="mt-4">
        <h2>All notes</h2>
        @foreach($data as $elem)
            <div class="alert alert-info">
                <h3>{{ $elem->name }}</h3>
                <p>{{ $elem->description }}</p>
                <a href="{{ route('selected_note', $elem->id) }}"><button>Open</button></a>
            </div>
        @endforeach

        <a href="{{ route('notes_delete') }}">
            <button>Delete all</button>
        </a>

        <div class="mt-4">
            <h4>Download Notes</h4>
            <a href="{{ route('download_txt') }}">
                <button>Download txt</button>
            </a>

            <a href="{{ route('download_excel') }}">
                <button>Download excel</button>
            </a>
        </div>

    </div>

@endsection
