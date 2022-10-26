@extends('layouts.app')

@section('title', 'Home')

@section('body')
    <h1>Note</h1>

    <div>
        @include('inc.messages')
    </div>

    <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="form-group mt-4">
            <label for="name">Your name</label>
            <input type="text" name="name" id="name" placeholder="Your name" class="form-control">
        </div>
        <div class="form-group mt-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">save</button>
    </form>

    <div id="notes" class="mt-4">
        <h2>All notes</h2>
        @foreach($data as $elem)
            <div class="alert alert-info">
                <h3>{{ $elem->name }}</h3>
                <p>{{ $elem->description }}</p>
            </div>
        @endforeach
    </div>
@endsection
