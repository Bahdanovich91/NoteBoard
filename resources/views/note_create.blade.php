@extends('layouts.app')

@section('title', 'Note')

@section('content')

    @include('inc.header')

    <h1>Note</h1>

    <div>
        @include('inc.messages')
    </div>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group mt-2">
            <label for="name">Your name</label>
            <input type="text" name="name" id="name" placeholder="Your name" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">save</button>
    </form>

@endsection
