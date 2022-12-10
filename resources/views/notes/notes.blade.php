@extends('layouts.app')

@section('title', 'Notes')

@section('content')

    @include('inc.header')

    <div class="list-group w-auto">

        <h1>All notes</h1>
        @foreach($data as $elem)
        <a href="{{ route('selected_note', $elem->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">{{ $elem->name }}</h6>
                    <p class="mb-0 opacity-75">{{ $elem->description }}</p>
                </div>
                <small class="opacity-50 text-nowrap">{{ $elem->created_at }}</small>
            </div>
        </a>
        @endforeach

        <div class="mt-3">
            <a href="{{ route('notes_delete') }}">
                <button type="submit" class="btn btn-danger mt-2">Delete all</button>
            </a>
        </div>

        <div class="mt-4">
            <h4>Download Notes</h4>
            <a href="{{ route('download_txt') }}">
                <button type="submit" class="btn btn-success mt-2">Download txt</button>
            </a>

            <a href="{{ route('download_excel') }}">
                <button type="submit" class="btn btn-success mt-2">Download excel</button>
            </a>
        </div>
    </div>

@endsection
