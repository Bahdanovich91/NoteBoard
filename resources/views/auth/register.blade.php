@extends('layouts.app')

@section('title', 'Registration')

@section('content')

    <h1>Registration</h1>

    <div>
        @include('inc.messages')
    </div>

    <form action="{{ route("register_process") }}" method="POST">
        @csrf
        <div class="form-group mt-4">
            <label for="name">Your name</label>
            <input type="text" name="name" id="name" placeholder="Your name">
        </div>
        <div class="form-group mt-4">
            <label for="email">Email</label>
            <input id="email" name="email" type="text" placeholder="Email" />
        </div>

        <div class="form-group mt-4">
            <label for="password">Email</label>
            <input id="password" name="password" type="password" placeholder="password" />
        </div>

        <div class="form-group mt-4">
            <label for="password_confirmation">Email</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="password_confirmation" />
        </div>

        <div>
            <a href="{{ route("login") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Есть аккаунт?</a>
        </div>

        <button type="submit" class="btn btn-success mt-2">save</button>
    </form>
@endsection
