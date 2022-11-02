@extends('layouts.app')

@section('title', 'Notes')

@section('content')

    @include('inc.header')

    <div id="notes"class="mt-4">
        <h2>All notes</h2>
        @foreach($data as $elem)
            <div class="alert alert-info">
                <h3>{{ $elem->name }}</h3>
                <p>{{ $elem->description }}</p>
            </div>
        @endforeach
    </div>

@endsection
